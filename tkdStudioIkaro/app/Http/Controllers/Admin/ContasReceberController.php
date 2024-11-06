<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contasreceber;
use App\Aluno;
use App\Atividade;
use App\Descontoaluno;
use App\Turma;
use DB;
use Response;
use Carbon\Carbon;

class ContasReceberController extends Controller
{
  public function index()
  {
    $hoje = date('Y-m-d');
		$tempo = date('Y-m-d', strtotime('+5 days', strtotime($hoje)));

    $receber = DB::table('contasrecebers')
    ->join('atividades', 'atividades.id', '=', 'contasrecebers.atividade_id')
    ->join('valoratividades', 'valoratividades.atividade_id', '=', 'atividades.id')
    ->join('alunos', 'alunos.id', '=', 'contasrecebers.aluno_id')
    ->select('contasrecebers.parcela AS parcela',
              'contasrecebers.id AS id',
              'contasrecebers.vencimento AS vencimento',
              'atividades.nome AS atividade',
              'valoratividades.valor AS valorAtividade',
              DB::raw('DATE_FORMAT(NOW(), "%Y-%m-%d") AS hoje'),
              DB::raw('DATEDIFF(NOW(), contasrecebers.vencimento) AS diaAtraso'),
              DB::raw('(valoratividades.valor + (valoratividades.valor * 0.02 * DATEDIFF(NOW(), contasrecebers.vencimento))) AS juros'),
              DB::raw('IF(DATEDIFF(NOW(), contasrecebers.vencimento) > 0,
                  CAST((valoratividades.valor + (valoratividades.valor * 0.02 * DATEDIFF(NOW(), contasrecebers.vencimento)))
                      AS DECIMAL (8 , 2 )),
                  contasrecebers.parcela) AS valorReceber'),
              'valoratividades.ano AS ano',
              'contasrecebers.qnd_parcela AS qnd_parcela',
              'contasrecebers.status AS status',
              'alunos.nome AS aluno')
    ->where('contasrecebers.vencimento', '<=', $tempo)
    ->get();
		// $receber = Contasreceber::with('aluno')->where('status', '<>', '1')->where('vencimento', '<=', $tempo)->orderBy('vencimento')->get();

    return view ('admin.contas_receber.index', compact('receber', 'hoje'));
  }

  public function atividadeAluno(Request $request)
  {
		$alunoAtividade = DB::table('alunosturmas')
    ->join('turmas', 'turmas.id', '=', 'alunosturmas.turma_id')
    ->join('atividades', 'atividades.id', '=', 'turmas.atividade_id')
    ->select('atividades.id AS atividade_id', 'atividades.nome AS atividade')
    ->where('alunosturmas.aluno_id', $request['aluno_id'])
    ->get();

		return Response::json($alunoAtividade);
	}

  public function descontoAluno(Request $request)
  {
    $alunoDesconto = DB::table('descontoalunos')
    ->select('descontoalunos.aluno_id AS aluno_id',
              'descontoalunos.atividade_id AS atividade_id',
              'descontoalunos.valor AS valor')
    ->where('descontoalunos.aluno_id', $request['aluno_id'])
    ->where('descontoalunos.atividade_id', $request['atividade_id'])
    ->get();

    return Response::json($alunoDesconto);
  }

  public function atividadeValor(Request $request)
  {
    $ano = date('Y');
    $valorAtividade = DB::table('atividades')
    ->join('descontoalunos', 'descontoalunos.atividade_id', '=', 'atividades.id')
    ->join('valoratividades', 'valoratividades.atividade_id', '=', 'atividades.id')
    ->select('atividades.id AS desconto_id',
                'valoratividades.valor AS valorAtividade',
                'descontoalunos.valor AS valorDesconto',
                DB::raw('(valoratividades.valor - descontoalunos.valor) AS totalPagar'))
    ->where('valoratividades.ano', $ano)
    ->where('descontoalunos.aluno_id', $request['aluno_id'])
    ->where('atividades.id', $request['desconto_id'])
    ->get();

    return Response::json($valorAtividade);
  }

  public function listar(Request $request)
  {
    $hoje = date('Y-m-d');
		$nome = $request->nome;
		$cpf = $request->cpf;
		$cliente = Aluno::where('nome', 'like', '%'.$request->nome.'%')->first();
		$inicio = $request->dt_inicial;
		$fim = $request->dt_final;
		$status = $request->status;

		if ($nome != '') {
			$listaCliente = [
				['aluno_id', '=', $cliente->id]
			];
		} else {
			$listaCliente = [
				['aluno_id', '<>', '']
			];
		}

		if ($cpf != '') {
			$listaCPF = [
				['aluno_id', '=', $cliente->id]
			];
		} else {
			$listaCPF = [
				['aluno_id', '<>', '']
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

		$receber = Contasreceber::with('aluno')
		->where($listaCliente)
		->where($listaCPF)
		->where($listaInicio)
		->where($listafim)
		->where($listaStatus)
		->orderBy('vencimento')
		->get();
		return view ('admin.contas_receber.listar', compact('receber', 'hoje'));
  }

  public function adicionar()
  {
    $aluno = Aluno::all();
		return view ('admin.contas_receber.adicionar', compact('aluno'));
  }

  public function salvar(Request $request)
  {
    $aleatorio = "#cod@".rand(111111111,999999999);
    // $parcela = str_replace(',', '.', str_replace('.', '', $request['parcela']));
		$parcela = $request['parcela'];
		$condicaoPagamento = $request['condicao_pagamento'];
		$qnd = $request['qnd_parcela'];
    $cliente = $request['aluno_id'];
		$tempo = $request['tempo'];
		$mensalidade_id = $request['mensalidade_id'];
		$vencimento = $request['vencimento'];
		$formaPagamento = $request['formaPagamento'];
		if ($condicaoPagamento == 0) {
			for ($i=0; $i < $request['qnd_parcela']; $i++) {
				$receber = new Contasreceber();
				$receber->parcela = $parcela;
				$receber->atividade_id = $mensalidade_id;
				$receber->qnd_parcela = $i;
				$receber->vencimento = date('Y-m-d', strtotime('+'.$tempo*$i.' days', strtotime($vencimento)));
				$receber->formaPagamento = $formaPagamento;
				$receber->aluno_id = $cliente;
				$receber->aleatorio = $aleatorio;

				$receber->save();
			}
		} else {
			for ($i=1; $i <= $request['qnd_parcela']; $i++) {
				$receber = new Contasreceber();
				$receber->parcela = $parcela;
				$receber->atividade_id = $mensalidade_id;
				$receber->qnd_parcela = $i;
				$receber->vencimento = date('Y-m-d', strtotime('+'.$tempo*$i.' days', strtotime($vencimento)));
				$receber->formaPagamento = $formaPagamento;
				$receber->aluno_id = $cliente;
				$receber->aleatorio = $aleatorio;

				$receber->save();
			}
		}

		\Session::flash('success', 'Programação de recebimento efetuada com sucesso!');
		return redirect()->route('admin.contas_receber.index');
  }

  public function editar($id)
  {
    $aluno = Aluno::all();
    $receber = DB::table('contasrecebers')
    ->join('atividades', 'atividades.id', '=', 'contasrecebers.atividade_id')
    ->join('valoratividades', 'valoratividades.atividade_id', '=', 'atividades.id')
    ->join('alunos', 'alunos.id', '=', 'contasrecebers.aluno_id')
    ->select('contasrecebers.parcela AS parcela',
              'contasrecebers.id AS id',
              'contasrecebers.vencimento AS vencimento',
              'atividades.nome AS atividade',
              'valoratividades.valor AS valorAtividade',
              DB::raw('DATE_FORMAT(NOW(), "%Y-%m-%d") AS hoje'),
              DB::raw('DATEDIFF(NOW(), contasrecebers.vencimento) AS diaAtraso'),
              DB::raw('(valoratividades.valor + (valoratividades.valor * 0.02 * DATEDIFF(NOW(), contasrecebers.vencimento))) AS juros'),
              DB::raw('IF(DATEDIFF(NOW(), contasrecebers.vencimento) > 0,
                  CAST((valoratividades.valor + (valoratividades.valor * 0.02 * DATEDIFF(NOW(), contasrecebers.vencimento)))
                      AS DECIMAL (8 , 2 )),
                  contasrecebers.parcela) AS valorReceber'),
              'valoratividades.ano AS ano',
              'contasrecebers.qnd_parcela AS qnd_parcela',
              'contasrecebers.status AS status',
              'contasrecebers.aluno_id AS aluno_id',
              'alunos.nome AS aluno')
    ->where('contasrecebers.id', $id)
    ->first();
		// $receber = Contasreceber::with('aluno')->where('id', $id)->first();
		return view ('admin.contas_receber.editar', compact('receber', 'aluno'));
  }

  public function alterar(Request $request, $id)
  {
    // $parcela = str_replace(',', '.', str_replace('.', '', $request['parcela']));
    $parcela = $request['parcela'];
		$cliente = Aluno::where('nome', 'like', '%'.$request['nome'].'%')->first();
		$receber = Contasreceber::with('aluno')->where('id', $id)->first();
		$receber->aluno_id = $request['aluno_id'];
		$receber->formaPagamento = $request['formaPagamento'];
		$receber->vencimento = $request['vencimento'];
		$receber->parcela = $parcela;

		$receber->update();

		\Session::flash('success', 'Programação de recebimento atualizada com sucesso!');
		return redirect()->route('admin.contas_receber.index');
  }

  public function baixa($id)
  {
    $receber = Contasreceber::find($id);
		return view ('admin.contas_receber.baixa', compact('receber'));
  }

  public function alteraBaixa(Request $request, $id)
  {
    $receber = Contasreceber::find($id);
		$receber->status = $request['status'];

		$receber->update();

		\Session::flash('success', 'Programação de recebimento baixada com sucesso!');
		return redirect()->route('admin.contas_receber.index');
  }

  public function deletar($id)
  {
    Contasreceber::find($id)->delete();

		\Session::flash('success', 'Programação de recebimento deletada com sucesso!');
		return redirect()->route('admin.contas_receber.index');
  }

  public function relatorio($id)
  {
    $empresa = Studio::all();
		$validacao = Contasreceber::where('id', $id)->first();
		$receber = Contasreceber::with('aluno')->where('aleatorio', $validacao->aleatorio)->get();
		$total = Contasreceber::where('aleatorio', $validacao->aleatorio)->sum('parcela');

		return view ('admin.contas_receber.relatorio', compact('empresa', 'receber', 'total'));
  }
}
