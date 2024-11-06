<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turma;
use App\Horariosturma;

class HorarioTurmaController extends Controller
{
  public function index($id)
  {
    $turma = Turma::find($id);
    $registros = Horariosturma::with('turma')->where('turma_id', $id)->orderBy('id')->get();
    return view ('admin.horarios_turma.index', compact('registros', 'turma'));
  }

  public function salvar($id)
  {
    $turma = Turma::find($id);
    return view ('admin.horarios_turma.salvar', compact('turma'));
  }

  public function editar($id)
  {
    // dd('teste');
    $registro = Horariosturma::find($id);
    $turma = Turma::find($registro->turma_id);
    // dd($turma);
    return view ('admin.horarios_turma.editar', compact('registro', 'turma'));
  }

  public function gravar(Request $request)
  {
    $registro = new Horariosturma();
    $registro->turma_id = $request['turma_id'];
    $registro->diaSemana = $request['diaSemana'];
    $registro->horarioEntrada = $request['horarioEntrada'];
    $registro->horarioSaida = $request['horarioSaida'];
    $registro->save();
    \Session::flash('success', 'Registro gravado com sucesso!');
    return redirect()->route('admin.horarios_turma.index', $registro->turma_id);
  }

  public function atualizar(Request $request, $id)
  {
    $registro = Turma::find($id);
    $registro->turma_id = $request['turma_id'];
    $registro->diaSemana = $request['diaSemana'];
    $registro->horarioEntrada = $request['horarioEntrada'];
    $registro->horarioSaida = $request['horarioSaida'];
    $registro->update();
    \Session::flash('success', 'Registro atualizado com sucesso!');
    return redirect()->route('admin.horarios_turma.index', $registro->turma_id);
  }

  public function deletar($id)
  {
    Horariosturma::find($id)->delete();
    \Session::flash('success', 'Registro deletado com sucesso!');
    return redirect()->route('admin.horarios_turma.index');
  }
}
