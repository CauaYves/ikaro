<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turma;
use App\Alunosturma;
use App\Aluno;
use App\Descontoaluno;
use DB;

class AlunoTurmaController extends Controller
{
  public function index($id)
  {
    $turma = Turma::find($id);
    $aluno = Aluno::all();
    $registros = Alunosturma::with('turma', 'aluno')->where('turma_id', $id)->orderBy('id')->get();
    return view ('admin.alunos_turma.index', compact('registros', 'turma', 'aluno'));
  }

  public function salvar($id)
  {
    $turma = Turma::find($id);
    return view ('admin.alunos_turma.salvar', compact('turma'));
  }

  public function editar($id)
  {
    $registro = Alunosturma::find($id);
    $aluno = Aluno::all();
    $turma = Turma::find($registro->turma_id);

    return view ('admin.alunos_turma.editar', compact('registro', 'turma', 'aluno'));
  }

  public function gravar(Request $request)
  {
    $turma = Turma::find($request['turma_id']);
    $validaDesconto = Descontoaluno::where('aluno_id', $request['aluno_id'])->where('atividade_id', $turma->atividade_id)->first();
    $validaTurma = Alunosturma::where('turma_id', $request['turma_id'])->where('aluno_id', $request['aluno_id'])->first();
    $aluno = Aluno::find($request['aluno_id']);
    if (isset($validaTurma)) {
      \Session::flash('warning', 'Não foi possível efetuar o cadastro, pois o aluno '. $aluno->nome .' já está nesta turma!');
    } else {
      if (empty($validaDesconto)) {
        $registro = new Descontoaluno();
        $registro->atividade_id = $turma->atividade_id;
        $registro->aluno_id = $request['aluno_id'];
        $registro->valor = 0.00;
        $registro->save();

        $registro = new Alunosturma();
        $registro->turma_id = $request['turma_id'];
        $registro->aluno_id = $request['aluno_id'];
        $registro->bloqueado = $request['bloqueado'];
        $registro->motivoBloqueio = $request['motivoBloqueio'];
        $registro->save();
        \Session::flash('success', 'Registro gravado com sucesso!');
      } else {
        $registro = new Alunosturma();
        $registro->turma_id = $request['turma_id'];
        $registro->aluno_id = $request['aluno_id'];
        $registro->bloqueado = $request['bloqueado'];
        $registro->motivoBloqueio = $request['motivoBloqueio'];
        $registro->save();
        \Session::flash('success', 'Registro gravado com sucesso!');
      }
    }
    return redirect()->back();
  }

  public function atualizar(Request $request, $id)
  {
    $registro = Alunosturma::find($id);
    $registro->turma_id = $request['turma_id'];
    $registro->aluno_id = $request['aluno_id'];
    $registro->bloqueado = $request['bloqueado'];
    $registro->motivoBloqueio = $request['motivoBloqueio'];
    $registro->update();
    \Session::flash('success', 'Registro atualizado com sucesso!');
    return redirect()->route('admin.alunos_turma.index', $registro->turma_id);
  }

  public function deletar($id)
  {
    Alunosturma::find($id)->delete();
    \Session::flash('success', 'Registro deletado com sucesso!');
    return redirect()->back();
  }
}
