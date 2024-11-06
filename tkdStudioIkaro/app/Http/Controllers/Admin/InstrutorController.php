<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instrutor;
use App\Studio;

class InstrutorController extends Controller
{
    public function index()
    {
      $registros = Instrutor::orderBy('nome')->get();
      return view ('admin.instrutor.index', compact('registros'));
    }

    public function salvar()
    {
      $studio = Studio::all();
      return view ('admin.instrutor.salvar', compact('studio'));
    }

    public function editar($id)
    {
      $studio = Studio::all();
      $registro = Instrutor::find($id);
      return view ('admin.instrutor.editar', compact('registro', 'studio'));
    }

    public function gravar(Request $request)
    {
      $registro = new Instrutor();
      $registro->nome = $request['nome'];
      $registro->nascimento = $request['nascimento'];
      $registro->sexo = $request['sexo'];
      $registro->rg = $request['rg'];
      $registro->cpf = $request['cpf'];
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
      $registro->studio_id = $request['studio_id'];

      $arquivo = $request->file('imagem');
      if ($arquivo) {
          $aleatorio = rand(11111,99999);
          $diretorio = "img/instrutor/";
          $extensao = $arquivo->guessClientExtension();
          $nome = "_img_".$aleatorio.".".$extensao;
          $arquivo->move($diretorio, $nome);

          $registro->imagem = $diretorio.$nome;
      }
      $registro->save();
      \Session::flash('success', 'Registro gravado com sucesso!');
      return redirect()->route('admin.instrutor.index');
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Instrutor::find($id);
      $registro = new Instrutor();
      $registro->nome = $request['nome'];
      $registro->nascimento = $request['nascimento'];
      $registro->sexo = $request['sexo'];
      $registro->rg = $request['rg'];
      $registro->cpf = $request['cpf'];
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
      $registro->studio_id = $request['studio_id'];

      $arquivo = $request->file('imagem');
      if ($arquivo) {
          $aleatorio = rand(11111,99999);
          $diretorio = "img/instrutor/";
          $extensao = $arquivo->guessClientExtension();
          $nome = "_img_".$aleatorio.".".$extensao;
          $arquivo->move($diretorio, $nome);

          $registro->imagem = $diretorio.$nome;
      }
      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.instrutor.index');
    }

    public function deletar($id)
    {
      Instrutor::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.instrutor.index');
    }
}
