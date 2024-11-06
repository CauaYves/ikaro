<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modalidade;
use App\Campeonato;

class ModalidadeController extends Controller
{
    public function index($id)
    {
      $campeonato = Campeonato::find($id);
      $registros = Modalidade::where('campeonato_id', $id)->get();
      return view ('admin.modalidade.index', compact('registros', 'campeonato'));
    }

    public function salvar($id)
    {
      $campeonato = Campeonato::find($id);
      return view ('admin.modalidade.salvar', compact('campeonato'));
    }

    public function editar($id)
    {
      $registro = Modalidade::find($id);
      return view ('admin.modalidade.editar', compact('registro'));
    }

    public function gravar(Request $request)
    {
      $registro = new Modalidade();
      $registro->nome = $request['nome'];
      $registro->campeonato_id = $request['campeonato_id'];
      $registro->save();
      \Session::flash('success', 'Registro gravado com sucesso!');
      return redirect()->route('admin.modalidade.index', $registro->campeonato_id);
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Modalidade::find($id);
      $registro->nome = $request['nome'];
      $registro->campeonato_id = $request['campeonato_id'];
      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.modalidade.index', $registro->campeonato_id);
    }

    public function deletar($id)
    {
      Modalidade::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.modalidade.index');
    }
}
