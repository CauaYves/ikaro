<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aluno;
use App\Atividade;
use App\Descontoaluno;

class DescontoAlunoController extends Controller
{
  public function index($id)
  {
    $aluno = $id;
    $registros = Descontoaluno::with('atividade', 'aluno')->where('aluno_id', $aluno)->get();
    return view ('admin.desconto_aluno.index', compact('registros', 'aluno'));
  }

  public function salvar($id)
  {
    $aluno = $id;
    $alunos = Aluno::find($id);
    $atividade = Atividade::orderBy('nome')->get();
    return view ('admin.desconto_aluno.salvar', compact('atividade', 'aluno', 'alunos'));
  }

  public function editar($id)
  {
    $registro = Descontoaluno::find($id);
    $aluno = $registro->aluno_id;
    $alunos = Aluno::find($registro->aluno_id);
    $atividade = Atividade::orderBy('nome')->get();
    return view ('admin.desconto_aluno.editar', compact('registro', 'aluno', 'alunos', 'atividade'));
  }

  public function gravar(Request $request)
  {
    if (Descontoaluno::where('atividade_id', $request['atividade_id'])->where('aluno_id', $request['aluno_id'])->count() == 0) {
      $registro = new Descontoaluno();
      $registro->atividade_id = $request['atividade_id'];
      $registro->aluno_id = $request['aluno_id'];
      $registro->valor = str_replace(",", ".", $request['valor']);
      $registro->save();
      \Session::flash('success', 'Registro gravado com sucesso!');
    } else {
      $atividade = Atividade::find($request['atividade_id']);
      \Session::flash('warning', 'Já existe um desconto informando para '.$atividade->nome.'! Favor escolher outra atividade ou editar a já cadastrada.');
    }
    return redirect()->route('admin.desconto_aluno.index', $request['aluno_id']);
  }

  public function atualizar(Request $request, $id)
  {
    $registro = Descontoaluno::find($id);
    $registro->atividade_id = $request['atividade_id'];
    $registro->aluno_id = $request['aluno_id'];
    $registro->valor = str_replace(",", ".", $request['valor']);
    $registro->update();
    \Session::flash('success', 'Registro atualizado com sucesso!');
    return redirect()->route('admin.desconto_aluno.index', $registro->aluno_id);
  }

  public function deletar($id)
  {
    $descontoAluno = Descontoaluno::find($id);
    Descontoaluno::find($id)->delete();
    \Session::flash('success', 'Registro deletado com sucesso!');
    return redirect()->route('admin.desconto_aluno.index', $descontoAluno->aluno_id);
  }
}
