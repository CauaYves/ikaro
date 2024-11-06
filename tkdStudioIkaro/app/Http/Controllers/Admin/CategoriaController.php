<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;

class CategoriaController extends Controller
{
    public function index($id)
    {
      $categoria_id = $id;
      $registros = Categoria::where('artemarcial_id', $id)->orderBy('nome')->orderBy('sexo')->get();
      return view ('admin.categoria.index', compact('registros', 'categoria_id'));
    }

    public function salvar($id)
    {
      $categoria_id = $id;
      return view ('admin.categoria.salvar', compact('categoria_id'));
    }

    public function editar($id)
    {
      $registro = Categoria::find($id);
      return view ('admin.categoria.editar', compact('registro'));
    }

    public function gravar(Request $request)
    {
      $registro = new Categoria();
      $registro->artemarcial_id = $request['artemarcial_id'];
      $registro->nome = $request['nome'];
      $registro->sexo = $request['sexo'];
      $registro->menorPeso = $request['menorPeso'];
      $registro->maiorPeso = $request['maiorPeso'];
      $registro->graduacaoMenor = $request['graduacaoMenor'];
      $registro->graduacaoMaior = $request['graduacaoMaior'];
      $registro->idadeMenor = $request['idadeMenor'];
      $registro->idadeMaior = $request['idadeMaior'];
      $registro->save();
      \Session::flash('success', 'Registro gravado com sucesso!');
      return redirect()->route('admin.categoria.index', $registro->artemarcial_id);
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Categoria::find($id);
      $registro->nome = $request['nome'];
      $registro->sexo = $request['sexo'];
      $registro->menorPeso = $request['menorPeso'];
      $registro->maiorPeso = $request['maiorPeso'];
      $registro->graduacaoMenor = $request['graduacaoMenor'];
      $registro->graduacaoMaior = $request['graduacaoMaior'];
      $registro->idadeMenor = $request['idadeMenor'];
      $registro->idadeMaior = $request['idadeMaior'];
      $registro->artemarcial_id = $request['artemarcial_id'];
      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.categoria.index', $registro->artemarcial_id);
    }

    public function deletar($id)
    {
      $registro = Categoria::find($id);
      Categoria::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.categoria.index', $registro->artemarcial_id);
    }
}
