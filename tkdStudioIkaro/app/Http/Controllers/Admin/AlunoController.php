<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
      $registros = Aluno::all();
      return view ('admin.aluno.index', compact('registros'));
    }

    public function salvar()
    {
      return view ('admin.aluno.salvar');
    }

    public function editar($id)
    {
      $registro = Aluno::find($id);
      return view ('admin.aluno.editar', compact('registro'));
    }

    public function gravar(Request $request)
    {
      $registro = new Aluno();
      $registro->nome = $request['nome'];
      $registro->nascimento = $request['nascimento'];
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

      $arquivo = $request->file('imagem');
      if ($arquivo) {
          $aleatorio = rand(11111,99999);
          $diretorio = "img/aluno/";
          $extensao = $arquivo->guessClientExtension();
          $nome = "_img_".$aleatorio.".".$extensao;
          $arquivo->move($diretorio, $nome);

          $registro->imagem = $diretorio.$nome;
      }

      $registro->save();
      \Session::flash('success', 'Registro gravado com sucesso!');
      return redirect()->route('admin.aluno.index');
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Aluno::find($id);
      $registro->nome = $request['nome'];
      $registro->nascimento = $request['nascimento'];
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

      $arquivo = $request->file('imagem');
      if ($arquivo) {
          $aleatorio = rand(11111,99999);
          $diretorio = "img/aluno/";
          $extensao = $arquivo->guessClientExtension();
          $nome = "_img_".$aleatorio.".".$extensao;
          $arquivo->move($diretorio, $nome);

          $registro->imagem = $diretorio.$nome;
      }
      
      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.aluno.index');
    }

    public function deletar($id)
    {
      Aluno::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.aluno.index');
    }
}
