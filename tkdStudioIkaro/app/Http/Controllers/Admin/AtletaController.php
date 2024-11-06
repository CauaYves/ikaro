<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Atleta;
use App\Artemarcial;
use App\Graduacao;
use App\Academia;
use DB;

class AtletaController extends Controller
{
    public function index()
    {
      $registros = DB::table('atletas')
      ->join('graduacaos', 'graduacaos.id', '=', 'atletas.graduacao_id')
      ->join('academias', 'academias.id', '=', 'atletas.academia_id')
      ->select('atletas.id AS atleta_id',
                'atletas.nome AS atleta',
                'atletas.peso AS peso',
                'atletas.imagem AS imagem',
                'academias.nome AS academina',
                'graduacaos.nomeGraduacao AS graduacao',
                'graduacaos.corpoFaixa AS corpoFaixa',
                'graduacaos.pontaFaixa AS pontaFaixa',
                DB::raw('TIMESTAMPDIFF(YEAR, nascimento, NOW()) AS idade'))
      ->get();
      return view ('admin.atleta.index', compact('registros'));
    }

    public function salvar()
    {
      $arteMarcial = Artemarcial::all();
      $graduacao = Graduacao::all();
      $academia = Academia::all();
      return view ('admin.atleta.salvar', compact('arteMarcial', 'graduacao', 'academia'));
    }

    public function editar($id)
    {
      $registro = Atleta::find($id);
      $arteMarcial = Artemarcial::all();
      $graduacao = Graduacao::all();
      $academia = Academia::all();
      return view ('admin.atleta.editar', compact('registro', 'arteMarcial', 'graduacao', 'academia'));
    }

    public function gravar(Request $request)
    {
      if (Atleta::where('nome', $request['nome'])->count()) {
        \Session::flash('warning', 'Não foi possível concluir esse cadastro, pois o atleta já consta em nossa base de dados!');
      } else {
        $registro = new Atleta();
        $registro->nome = $request['nome'];
        $registro->nascimento = $request['nascimento'];
        $registro->sexo = $request['sexo'];
        $registro->peso = $request['peso'];
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
        $registro->artemarcial_id = $request['artemarcial_id'];
        $registro->graduacao_id = $request['graduacao_id'];
        $registro->academia_id = $request['academia_id'];

        $arquivo = $request->file('imagem');
        if ($arquivo) {
            $aleatorio = rand(11111,99999);
            $diretorio = "img/atleta/";
            $extensao = $arquivo->guessClientExtension();
            $nome = "_img_".$aleatorio.".".$extensao;
            $arquivo->move($diretorio, $nome);

            $registro->imagem = $diretorio.$nome;
        }
        $registro->save();
        \Session::flash('success', 'Registro gravado com sucesso!');
      }
      return redirect()->route('admin.atleta.index');
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Atleta::find($id);
      $registro->nome = $request['nome'];
      $registro->nascimento = $request['nascimento'];
      $registro->sexo = $request['sexo'];
      $registro->peso = $request['peso'];
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
      $registro->artemarcial_id = $request['artemarcial_id'];
      $registro->graduacao_id = $request['graduacao_id'];
      $registro->academia_id = $request['academia_id'];

      $arquivo = $request->file('imagem');
      if ($arquivo) {
          $aleatorio = rand(11111,99999);
          $diretorio = "img/atleta/";
          $extensao = $arquivo->guessClientExtension();
          $nome = "_img_".$aleatorio.".".$extensao;
          $arquivo->move($diretorio, $nome);

          $registro->imagem = $diretorio.$nome;
      }
      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.atleta.index');
    }

    public function deletar($id)
    {
      Atleta::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.atleta.index');
    }
}
