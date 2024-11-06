<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Atividade;

class AtividadeController extends Controller
{
  public function index()
  {
    $registros = Atividade::orderBy('nome')->get();
    return view ('admin.atividade.index', compact('registros'));
  }

  public function salvar()
  {
    return view ('admin.atividade.salvar');
  }

  public function editar($id)
  {
    $registro = Atividade::find($id);
    return view ('admin.atividade.editar', compact('registro'));
  }

  public function gravar(Request $request)
  {
    $registro = new Atividade();
    $registro->nome = $request['nome'];
    $registro->save();
    \Session::flash('success', 'Registro gravado com sucesso!');
    return redirect()->route('admin.atividade.index');
  }

  public function atualizar(Request $request, $id)
  {
    $registro = Atividade::find($id);
    $registro->nome = $request['nome'];
    $registro->update();
    \Session::flash('success', 'Registro atualizado com sucesso!');
    return redirect()->route('admin.atividade.index');
  }

  public function deletar($id)
  {
    Atividade::find($id)->delete();
    \Session::flash('success', 'Registro deletado com sucesso!');
    return redirect()->route('admin.atividade.index');
  }
}
