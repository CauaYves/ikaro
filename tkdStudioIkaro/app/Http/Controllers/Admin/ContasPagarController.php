<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contaspagar;

class ContasPagarController extends Controller
{
  public function index()
  {
    $hoje = date('Y-m-d');
		$dataFinal = date('Y-m-d', strtotime('+5 days', strtotime($hoje)));
		$pagar = Contaspagar::where('status', '<>', '1')->where('vencimento', '<=', $dataFinal)->orderBy('vencimento')->get();

		return view ('admin.contas_pagar.index', compact('pagar', 'hoje'));
  }

  public function autocomplete(Request $request)
  {
		$term = $request->term;
		$data = Contaspagar::where('fornecedor', 'like','%'.$term.'%')
		->orderBy('fornecedor')
		->take(1)
		->get();
		$results = array();
		foreach ($data as $key => $v) {
			$results[] = ['id' =>  $v->id, 'value' => $v->fornecedor];
		}
		return response()->json($results);
	}

  public function listar(Request $request)
  {
    $hoje = date('Y-m-d');
		$fornecedor = $request->fornecedor;
		$inicio = $request->dt_inicial;
		$fim = $request->dt_final;
		$status = $request->status;

		if ($fornecedor != '') {
			$listaFornecedor = [
				['fornecedor', '=', $fornecedor]
			];
		} else {
			$listaFornecedor = [
				['fornecedor', '<>', '']
			];
		}

		if ($inicio != '') {
			$listaInicio = [
				['vencimento', '>=', $inicio]
			];
		} else {
			$listaInicio = [
				['vencimento', '<>', '']
			];
		}

		if ($fim != '') {
			$listafim = [
				['vencimento', '<=', $fim]
			];
		} else {
			$listafim = [
				['vencimento', '<>', '']
			];
		}

		if ($status != '3') {
			$listaStatus = [
				['status', '=', $status]
			];
		} else {
			$listaStatus = [
				['status', '<>', '']
			];
		}

		$pagar = Contaspagar::where($listaFornecedor)
		->where($listaInicio)
		->where($listafim)
		->where($listaStatus)
		->orderBy('vencimento')
		->get();
		return view ('admin.contas_pagar.listar', compact('pagar', 'hoje'));
  }

  public function adicionar()
  {
    return view ('admin.contas_pagar.adicionar');
  }

  public function salvar(Request $request)
  {
    $parcela = str_replace(',', '.', str_replace('.', '', $request['parcela']));
		$aleatorio = "#cod@".rand(111111111,999999999);
		$condicaoPagamento = $request['condicao_pagamento'];
		$qnd = $request['qnd_parcela'];
		$tempo = $request['tempo'];
		$vencimento = $request['vencimento'];
		$formaPagamento = $request['formaPagamento'];

    if ($condicaoPagamento == 0) {
			for ($i=0; $i < $request['qnd_parcela']; $i++) {
				$pagar = new Contaspagar();
				$pagar->parcela = $parcela / $qnd;
				$pagar->qnd_parcela = $i;
				$pagar->vencimento = date('Y-m-d', strtotime('+'.$tempo*$i.' days', strtotime($vencimento)));
				$pagar->formaPagamento = $formaPagamento;
				$pagar->fornecedor = $request['fornecedor'];
				$pagar->aleatorio = $aleatorio;

				$pagar->save();
			}
		} else {
			for ($i=1; $i <= $request['qnd_parcela']; $i++) {
				$pagar = new Contaspagar();
				$pagar->parcela = $parcela / $qnd;
				$pagar->qnd_parcela = $i;
				$pagar->vencimento = date('Y-m-d', strtotime('+'.$tempo*$i.' days', strtotime($vencimento)));
				$pagar->formaPagamento = $formaPagamento;
				$pagar->fornecedor = $request['fornecedor'];
				$pagar->aleatorio = $aleatorio;

				$pagar->save();
			}
		}

		\Session::flash('success', 'Programação de pagamento efetuada com sucesso!');
		return redirect()->route('admin.contas_pagar.index');
  }

  public function editar($id)
  {
    $pagar = Contaspagar::find($id);
		return view ('admin.contas_pagar.editar', compact('pagar'));
  }

  public function alterar(Request $request, $id)
  {
    $parcela = str_replace(',', '.', str_replace('.', '', $request['parcela']));
		$pagar = Pagar::find($id);
		$pagar->fornecedor = $request['fornecedor'];
		$pagar->formaPagamento = $request['formaPagamento'];
		$pagar->vencimento = $request['vencimento'];
		$pagar->parcela = $parcela;

		$pagar->update();

		\Session::flash('success', 'Programação de pagamento atualizada com sucesso!');
		return redirect()->route('admin.contas_pagar.index');
  }

  public function baixa($id)
  {
    $pagar = Pagar::find($id);
		return view ('pagar.baixa', compact('pagar'));
  }

  public function alteraBaixa(Request $request, $id)
  {
    $pagar = Pagar::find($id);
		$pagar->status = $request['status'];

		$pagar->update();

		\Session::flash('success', 'Programação de pagamento baixada com sucesso!');
		return redirect()->route('admin.contas_pagar.index');
  }

  public function deletar($id)
  {
    Pagar::find($id)->delete();

		\Session::flash('success', 'Programação de pagamento deletada com sucesso!');
		return redirect()->route('admin.contas_pagar.index');
  }
}
