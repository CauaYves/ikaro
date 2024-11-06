<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Atividade;
use App\Valoratividade;

class ValorAtividadeController extends Controller
{
  public function index($id)
  {
    $atividade = $id;
    $registros = Valoratividade::with('atividade')->where('atividade_id', $id)->orderBy('ano', 'DESC')->get();
    return view ('admin.valor_atividade.index', compact('registros', 'atividade'));
  }

  public function salvar($id)
  {
    $atividade = Atividade::find($id);
    $ano = date('Y');
    return view ('admin.valor_atividade.salvar', compact('ano', 'atividade'));
  }

  public function editar($id)
  {
    $atividade = Atividade::find($id);
    $registro = Valoratividade::find($id);
    return view ('admin.valor_atividade.editar', compact('registro', 'atividade'));
  }

  public function gravar(Request $request)
  {
    $registro = new Valoratividade();
    $registro->atividade_id = $request['atividade_id'];
    $registro->valor = str_replace(",", ".", $request['valor']);
    $registro->ano = $request['ano'];
    $registro->save();
    \Session::flash('success', 'Registro gravado com sucesso!');
    return redirect()->route('admin.valor_atividade.index', $registro->atividade_id);
  }

  public function atualizar(Request $request, $id)
  {
    $registro = Valoratividade::find($id);
    $registro->atividade_id = $request['atividade_id'];
    $registro->valor = str_replace(",", ".", $request['valor']);
    $registro->ano = $request['ano'];
    $registro->update();
    \Session::flash('success', 'Registro atualizado com sucesso!');
    return redirect()->route('admin.valor_atividade.index', $registro->atividade_id);
  }

  public function deletar($id)
  {
    Valoratividade::find($id)->delete();
    \Session::flash('success', 'Registro deletado com sucesso!');
    return redirect()->route('admin.valor_atividade.index');
  }
}
