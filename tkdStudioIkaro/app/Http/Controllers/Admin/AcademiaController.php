<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Academia;

class AcademiaController extends Controller
{
    public function index()
    {
      $registros = Academia::all();
      return view ('admin.academia.index', compact('registros'));
    }

    public function salvar()
    {
      return view ('admin.academia.salvar');
    }

    public function editar($id)
    {
      $registro = Academia::find($id);
      return view ('admin.academia.editar', compact('registro'));
    }

    public function gravar(Request $request)
    {
      $registro = new Academia();
      $registro->nome = $request['nome'];
      $registro->save();
      \Session::flash('success', 'Registro gravado com sucesso!');
      return redirect()->route('admin.academia.index');
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Academia::find($id);
      $registro->nome = $request['nome'];
      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.academia.index');
    }

    public function deletar($id)
    {
      Academia::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.academia.index');
    }
}
