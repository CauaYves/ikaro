<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Studio;

class StudioController extends Controller
{
    public function index()
    {
      $registros = Studio::all();
      return view ('admin.studio.index', compact('registros'));
    }

    public function salvar()
    {
      return view ('admin.studio.salvar');
    }

    public function editar($id)
    {
      $registro = Studio::find($id);
      return view ('admin.studio.editar', compact('registro'));
    }

    public function gravar(Request $request)
    {
      $registro = new Studio();
      $registro->nome = $request['nome'];
      $registro->cep = $request['cep'];
      $registro->rua = $request['rua'];
      $registro->numero = $request['numero'];
      $registro->complemento = $request['complemento'];
      $registro->bairro = $request['bairro'];
      $registro->cidade = $request['cidade'];
      $registro->uf = $request['uf'];
      $registro->ibge = $request['ibge'];
      $registro->telefone = $request['telefone'];
      $registro->celular = $request['celular'];
      $registro->email = $request['email'];

      $arquivo = $request->file('imagem');
      if ($arquivo) {
          $aleatorio = rand(11111,99999);
          $diretorio = "img/studio/";
          $extensao = $arquivo->guessClientExtension();
          $nome = "_img_".$aleatorio.".".$extensao;
          $arquivo->move($diretorio, $nome);

          $registro->imagem = $diretorio.$nome;
      }

      $registro->save();
      \Session::flash('success', 'Registro gravado com sucesso!');
      return redirect()->route('admin.studio.index');
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Studio::find($id);
      $registro = new Studio();
      $registro->nome = $request['nome'];
      $registro->cep = $request['cep'];
      $registro->rua = $request['rua'];
      $registro->numero = $request['numero'];
      $registro->complemento = $request['complemento'];
      $registro->bairro = $request['bairro'];
      $registro->cidade = $request['cidade'];
      $registro->uf = $request['uf'];
      $registro->ibge = $request['ibge'];
      $registro->telefone = $request['telefone'];
      $registro->celular = $request['celular'];
      $registro->email = $request['email'];

      $arquivo = $request->file('imagem');
      if ($arquivo) {
          $aleatorio = rand(11111,99999);
          $diretorio = "img/studio/";
          $extensao = $arquivo->guessClientExtension();
          $nome = "_img_".$aleatorio.".".$extensao;
          $arquivo->move($diretorio, $nome);

          $registro->imagem = $diretorio.$nome;
      }

      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.studio.index');
    }

    public function deletar($id)
    {
      Studio::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.studio.index');
    }
}
