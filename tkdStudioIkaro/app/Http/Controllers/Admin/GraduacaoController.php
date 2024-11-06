<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Graduacao;
use App\Cor;

class GraduacaoController extends Controller
{
    public function index()
    {
      $registros = Graduacao::all();
      return view ('admin.graduacao.index', compact('registros'));
    }

    public function salvar()
    {
      $cor = Cor::all();
      return view ('admin.graduacao.salvar', compact('cor'));
    }

    public function editar($id)
    {
      $cor = Cor::all();
      $registro = Graduacao::find($id);
      return view ('admin.graduacao.editar', compact('registro', 'cor'));
    }

    public function gravar(Request $request)
    {
      $registro = new Graduacao();
      $registro->nomeGraduacao = $request['nomeGraduacao'];
      $registro->corpoFaixa = $request['corpoFaixa'];
      $registro->pontaFaixa = $request['pontaFaixa'];
      $registro->save();
      \Session::flash('success', 'Registro gravado com sucesso!');
      return redirect()->route('admin.graduacao.index');
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Graduacao::find($id);
      $registro->nomeGraduacao = $request['nomeGraduacao'];
      $registro->corpoFaixa = $request['corpoFaixa'];
      $registro->pontaFaixa = $request['pontaFaixa'];
      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.graduacao.index');
    }

    public function deletar($id)
    {
      Graduacao::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.graduacao.index');
    }
}
