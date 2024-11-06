<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turma;
use App\Atividade;
use App\Instrutor;

class TurmaController extends Controller
{
  public function index($id)
  {
    $instrutor = $id;
    $registros = Turma::with('atividade', 'instrutor')->where('instrutor_id', $id)->orderBy('created_at', 'DESC')->get();
    return view ('admin.turma.index', compact('registros', 'instrutor'));
  }

  public function salvar($id)
  {
    $instrutor = Instrutor::find($id);
    $atividade = Atividade::all();
    return view ('admin.turma.salvar', compact('instrutor', 'atividade'));
  }

  public function editar($id)
  {
    $instrutor = Instrutor::find($id);
    $registro = Turma::find($id);
    $atividade = Atividade::all();
    return view ('admin.turma.editar', compact('registro', 'instrutor', 'atividade'));
  }

  public function gravar(Request $request)
  {
    $registro = new Turma();
    $registro->atividade_id = $request['atividade_id'];
    $registro->instrutor_id = $request['instrutor_id'];
    $registro->nome = strtoupper($request['nome']);
    $registro->save();
    \Session::flash('success', 'Registro gravado com sucesso!');
    return redirect()->route('admin.turma.index', $registro->instrutor_id);
  }

  public function atualizar(Request $request, $id)
  {
    $registro = Turma::find($id);
    $registro->atividade_id = $request['atividade_id'];
    $registro->instrutor_id = $request['instrutor_id'];
    $registro->nome = strtoupper($request['nome']);
    $registro->update();
    \Session::flash('success', 'Registro atualizado com sucesso!');
    return redirect()->route('admin.turma.index', $registro->instrutor_id);
  }

  public function deletar($id)
  {
    Turma::find($id)->delete();
    \Session::flash('success', 'Registro deletado com sucesso!');
    return redirect()->route('admin.turma.index');
  }
}
