<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Campeonato;
use App\Artemarcial;

class CampeonatoController extends Controller
{
    public function index()
    {
      $registros = Campeonato::orderBy('diaCampeonato', 'DESC')->get();
      return view ('admin.campeonato.index', compact('registros'));
    }

    public function salvar()
    {
      $arteMarcial = Artemarcial::all();
      return view ('admin.campeonato.salvar', compact('arteMarcial'));
    }

    public function editar($id)
    {
      $arteMarcial = Artemarcial::all();
      $registro = Campeonato::find($id);
      return view ('admin.campeonato.editar', compact('registro', 'arteMarcial'));
    }

    public function gravar(Request $request)
    {
      $registro = new Campeonato();
      $registro->nome = $request['nome'];
      $registro->artemarcial_id = $request['artemarcial_id'];
      $registro->diaCampeonato = $request['diaCampeonato'];
      $registro->statusCampeonato = $request['statusCampeonato'];
      $registro->save();
      \Session::flash('success', 'Registro gravado com sucesso!');
      return redirect()->route('admin.campeonato.index');
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Campeonato::find($id);
      $registro->nome = $request['nome'];
      $registro->artemarcial_id = $request['artemarcial_id'];
      $registro->diaCampeonato = $request['diaCampeonato'];
      $registro->statusCampeonato = $request['statusCampeonato'];
      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.campeonato.index');
    }

    public function deletar($id)
    {
      Campeonato::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.campeonato.index');
    }
}
