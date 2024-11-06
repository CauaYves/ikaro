<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artemarcial;

class ArteMarcialController extends Controller
{
    public function index()
    {
      $registros = Artemarcial::all();
      return view ('admin.arte_marcial.index', compact('registros'));
    }

    public function salvar()
    {
      return view ('admin.arte_marcial.salvar');
    }

    public function editar($id)
    {
      $registro = Artemarcial::find($id);
      return view ('admin.arte_marcial.editar', compact('registro'));
    }

    public function gravar(Request $request)
    {
      $registro = new Artemarcial();
      $registro->nome = $request['nome'];
      $registro->save();
      \Session::flash('success', 'Registro gravado com sucesso!');
      return redirect()->route('admin.arte_marcial.index');
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Artemarcial::find($id);
      $registro->nome = $request['nome'];
      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.arte_marcial.index');
    }

    public function deletar($id)
    {
      Artemarcial::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.arte_marcial.index');
    }
}
