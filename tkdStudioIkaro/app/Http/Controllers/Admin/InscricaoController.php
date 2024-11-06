<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Atleta;
use App\Academia;
use App\Modalidade;
use App\Categoria;
use App\Inscricao;
use App\Campeonato;
use DB;

class InscricaoController extends Controller
{
    public function index($id)
    {
      $campeonato = Campeonato::find($id);
      $registros = DB::select("SELECT
                    CONCAT(atletas.nome,
                            ' / ',
                            TIMESTAMPDIFF(YEAR, nascimento, NOW()),
                            ' anos / ',
                            atletas.sexo,
                            ' / ',
                            atletas.peso,
                            'Kg / ',
                            graduacaos.nomeGraduacao) AS atleta,
                    modalidades.nome AS modalidade,
                    inscricaos.id AS inscricao_id,
                    CONCAT(categorias.nome,
                            ' / ',
                            categorias.sexo,
                            ' / ',
                            categorias.menorPeso,
                            'kg - ',
                            categorias.maiorPeso,
                            'kg / ',
                            categorias.graduacaoMenor,
                            'º - ',
                            categorias.graduacaoMaior,
                            'º / ',
                            categorias.idadeMenor,
                            ' anos - ',
                            categorias.idadeMaior,
                            ' anos') AS categoria
                FROM
                    inscricaos
                        INNER JOIN
                    atletas ON atletas.id = inscricaos.atleta_id
                        INNER JOIN
                    modalidades ON modalidades.id = inscricaos.modalidade_id
                        INNER JOIN
                    categorias ON categorias.id = inscricaos.categoria_id
                        INNER JOIN
                    graduacaos ON graduacaos.id = atletas.graduacao_id
                        INNER JOIN
                    campeonatos ON campeonatos.id = inscricaos.campeonato_id
                WHERE
                    campeonatos.id = :id
                Order By atletas.nome", ['id' => $id]);
      return view ('admin.inscricao.index', compact('registros', 'campeonato'));
    }

    public function categoriaPesoFaixaIdade($id)
    {
      $categoria = DB::table('categorias')->select('*')->groupBy('nome')->get();
      $campeonato = Campeonato::find($id);
      $modalidade = Modalidade::where('campeonato_id', $id)->get();;
      return view ('admin.inscricao.categoriaPesoFaixaIdade', compact('campeonato', 'categoria', 'modalidade'));
    }

    public function filtroCategoriaPesoFaixaIdade(Request $request, $id)
    {
      $categoria = DB::table('categorias')->select('*')->groupBy('nome')->get();
      $campeonato = Campeonato::find($id);
      $modalidade = Modalidade::where('campeonato_id', $id)->get();
      $filtro = DB::table('inscricaos')
      ->join('atletas', 'atletas.id', '=', 'inscricaos.atleta_id')
      ->join('categorias', 'categorias.id', '=', 'inscricaos.categoria_id')
      ->join('campeonatos', 'campeonatos.id', '=', 'inscricaos.campeonato_id')
      ->join('graduacaos', 'graduacaos.id', '=', 'atletas.graduacao_id')
      ->join('modalidades', 'modalidades.id', '=', 'inscricaos.modalidade_id')
      ->join('academias', 'academias.id', '=', 'atletas.academia_id')
      ->select('inscricaos.id AS inscricao_id',
                'atletas.nome AS atleta',
                'atletas.peso AS peso',
                'graduacaos.nomeGraduacao AS graduacao',
                'academias.nome AS academia',
                'graduacaos.corpoFaixa AS corpoFaixa',
                'graduacaos.pontaFaixa AS pontaFaixa',
                'categorias.nome AS categoria',
                'categorias.menorPeso AS menorPeso',
                'categorias.maiorPeso AS maiorPeso',
                'modalidades.nome AS modalidade')
      ->where('campeonatos.id', $id)
      ->where(function ($query) use ($request) {
                if ($request['categoria'] <> '') {
                    $query->where('categorias.nome', $request['categoria']);
                } else {
                    $query->where('categorias.nome', '<>', '');
                }
            })
      ->where(function ($query) use ($request) {
                if ($request['sexo'] <> '') {
                    $query->where('categorias.sexo', $request['sexo']);
                } else {
                    $query->where('categorias.sexo', '<>', '');
                }
            })
      ->where(function ($query) use ($request) {
                if ($request['menorPeso'] <> '') {
                    $query->where('categorias.menorPeso', '>=', $request['menorPeso']);
                } else {
                    $query->where('categorias.menorPeso', '<>', '');
                }
            })
      ->where(function ($query) use ($request) {
                if ($request['maiorPeso'] <> '') {
                    $query->where('categorias.maiorPeso', '<=', $request['maiorPeso']);
                } else {
                    $query->where('categorias.maiorPeso', '<>', '');
                }
            })
      ->where(function ($query) use ($request) {
                if ($request['graduacaoMenor'] <> '') {
                    $query->where('categorias.graduacaoMenor', '<=', $request['graduacaoMenor']);
                } else {
                    $query->where('categorias.graduacaoMenor', '<>', '');
                }
            })
      ->where(function ($query) use ($request) {
                if ($request['graduacaoMaior'] <> '') {
                    $query->where('categorias.graduacaoMaior', '>=', $request['graduacaoMaior']);
                } else {
                    $query->where('categorias.graduacaoMaior', '<>', '');
                }
            })
      ->where(function ($query) use ($request) {
                if ($request['idadeMenor'] <> '') {
                    $query->where('categorias.idadeMenor', '>=', $request['idadeMenor']);
                } else {
                    $query->where('categorias.idadeMenor', '<>', '');
                }
            })
      ->where(function ($query) use ($request) {
                if ($request['idadeMaior'] <> '') {
                    $query->where('categorias.idadeMaior', '<=', $request['idadeMaior']);
                } else {
                    $query->where('categorias.idadeMenor', '<>', '');
                }
            })
      ->where(function ($query) use ($request) {
                if ($request['modalidade'] <> '') {
                    $query->where('modalidades.nome', $request['modalidade']);
                } else {
                    $query->where('modalidades.nome', '<>', '');
                }
            })
      ->get();

      return view ('admin.inscricao.filtroCategoriaPesoFaixaIdade', compact('campeonato', 'filtro', 'categoria', 'modalidade'));
    }

    public function academia($id)
    {
      $modalidade = Modalidade::where('campeonato_id', $id)->get();
      $campeonato = Campeonato::find($id);
      $academia = Academia::all();
      return view ('admin.inscricao.academia', compact('campeonato', 'academia', 'modalidade'));
    }

    public function listaInscritosCategoriaLuta($id)
    {
      $inscricao = DB::select("SELECT
                            inscricaos.id AS inscricao_id,
                            atletas.id AS atleta_id,
                            atletas.nome AS atleta,
                            atletas.peso AS peso,
                            categorias.id AS categoria_id,
                            categorias.nome AS categoria,
                            categorias.sexo AS sexo,
                            categorias.menorPeso AS menorPeso,
                            categorias.maiorPeso AS maiorPeso,
                            categorias.graduacaoMenor AS graduacaoMenor,
                            categorias.graduacaoMaior AS graduacaoMaior,
                            categorias.idadeMenor AS idadeMenor,
                            categorias.idadeMaior AS idadeMaior,
                            modalidades.id AS modalidade_id,
                            modalidades.nome AS modalidade,
                            campeonatos.id AS campeonato_id,
                            campeonatos.nome AS campeonato,
                            graduacaos.corpoFaixa AS corpoFaixa,
                            graduacaos.pontaFaixa AS pontaFaixa,
                            academias.nome AS academia
                        FROM
                            inscricaos
                                INNER JOIN
                            categorias ON categorias.id = inscricaos.categoria_id
                                INNER JOIN
                            atletas ON atletas.id = inscricaos.atleta_id
                                INNER JOIN
                            modalidades ON modalidades.id = inscricaos.modalidade_id
                                INNER JOIN
                            campeonatos ON campeonatos.id = inscricaos.campeonato_id
                                INNER JOIN
                            graduacaos ON graduacaos.id = atletas.graduacao_id
                                INNER JOIN
                            academias ON academias.id = atletas.academia_id
                        WHERE
                            campeonatos.id = :id
                        AND
                            modalidades.nome = 'Kyorugui'", ['id' => $id]);

    $campeonato = Campeonato::find($id);
    $categoria = DB::select("SELECT
                            inscricaos.id AS inscricao_id,
                            categorias.id AS categoria_id,
                            categorias.nome AS categoria,
                            categorias.sexo AS sexo,
                            categorias.menorPeso AS menorPeso,
                            categorias.maiorPeso AS maiorPeso,
                            categorias.graduacaoMenor AS graduacaoMenor,
                            categorias.graduacaoMaior AS graduacaoMaior,
                            categorias.idadeMenor AS idadeMenor,
                            categorias.idadeMaior AS idadeMaior,
                            modalidades.id AS modalidade_id
                        FROM
                            inscricaos
                                INNER JOIN
                            categorias ON categorias.id = inscricaos.categoria_id
                                INNER JOIN
                            modalidades ON modalidades.id = inscricaos.modalidade_id
                                INNER JOIN
                            campeonatos ON campeonatos.id = inscricaos.campeonato_id
                        WHERE
                            campeonatos.id = :id
                        AND
                            modalidades.nome = 'Kyorugui'
                        GROUP BY categorias.id
                        ORDER BY categorias.id, categorias.sexo, categorias.maiorPeso", ['id' => $id]);

    return view ('admin.inscricao.listaInscritosCategoriaLuta', compact('inscricao', 'categoria', 'campeonato'));
    }

    public function listaInscritosCategoriaPoomsae($id)
    {
      $inscricao = DB::select("SELECT
                            inscricaos.id AS inscricao_id,
                            atletas.id AS atleta_id,
                            atletas.nome AS atleta,
                            atletas.peso AS peso,
                            categorias.id AS categoria_id,
                            categorias.nome AS categoria,
                            categorias.sexo AS sexo,
                            categorias.menorPeso AS menorPeso,
                            categorias.maiorPeso AS maiorPeso,
                            categorias.graduacaoMenor AS graduacaoMenor,
                            categorias.graduacaoMaior AS graduacaoMaior,
                            categorias.idadeMenor AS idadeMenor,
                            categorias.idadeMaior AS idadeMaior,
                            modalidades.id AS modalidade_id,
                            modalidades.nome AS modalidade,
                            campeonatos.id AS campeonato_id,
                            campeonatos.nome AS campeonato,
                            graduacaos.corpoFaixa AS corpoFaixa,
                            graduacaos.pontaFaixa AS pontaFaixa,
                            academias.nome AS academia
                        FROM
                            inscricaos
                                INNER JOIN
                            categorias ON categorias.id = inscricaos.categoria_id
                                INNER JOIN
                            atletas ON atletas.id = inscricaos.atleta_id
                                INNER JOIN
                            modalidades ON modalidades.id = inscricaos.modalidade_id
                                INNER JOIN
                            campeonatos ON campeonatos.id = inscricaos.campeonato_id
                                INNER JOIN
                            graduacaos ON graduacaos.id = atletas.graduacao_id
                                INNER JOIN
                            academias ON academias.id = atletas.academia_id
                        WHERE
                            campeonatos.id = :id
                        AND
                            modalidades.nome = 'Poomsae'", ['id' => $id]);

    $campeonato = Campeonato::find($id);
    $categoria = DB::select("SELECT
                            inscricaos.id AS inscricao_id,
                            categorias.id AS categoria_id,
                            categorias.nome AS categoria,
                            categorias.sexo AS sexo,
                            categorias.menorPeso AS menorPeso,
                            categorias.maiorPeso AS maiorPeso,
                            categorias.graduacaoMenor AS graduacaoMenor,
                            categorias.graduacaoMaior AS graduacaoMaior,
                            categorias.idadeMenor AS idadeMenor,
                            categorias.idadeMaior AS idadeMaior,
                            modalidades.id AS modalidade_id
                        FROM
                            inscricaos
                                INNER JOIN
                            categorias ON categorias.id = inscricaos.categoria_id
                                INNER JOIN
                            modalidades ON modalidades.id = inscricaos.modalidade_id
                                INNER JOIN
                            campeonatos ON campeonatos.id = inscricaos.campeonato_id
                        WHERE
                            campeonatos.id = :id
                        AND
                            modalidades.nome = 'Poomsae'
                        GROUP BY categorias.id
                        ORDER BY categorias.id, categorias.sexo, categorias.maiorPeso", ['id' => $id]);

    return view ('admin.inscricao.listaInscritosCategoriaPoomsae', compact('inscricao', 'categoria', 'campeonato'));
    }

    public function filtroAcademia(Request $request, $id)
    {
      $campeonato = Campeonato::find($id);
      $academia = Academia::all();
      $filtro = DB::table('inscricaos')
      ->join('atletas', 'atletas.id', '=', 'inscricaos.atleta_id')
      ->join('categorias', 'categorias.id', '=', 'inscricaos.categoria_id')
      ->join('campeonatos', 'campeonatos.id', '=', 'inscricaos.campeonato_id')
      ->join('graduacaos', 'graduacaos.id', '=', 'atletas.graduacao_id')
      ->join('academias', 'academias.id', '=', 'atletas.academia_id')
      ->join('modalidades', 'modalidades.id', '=', 'inscricaos.modalidade_id')
      ->select('inscricaos.id AS inscricao_id',
                'atletas.nome AS atleta',
                'atletas.peso AS peso',
                'academias.nome AS academia',
                'graduacaos.nomeGraduacao AS graduacao',
                'graduacaos.corpoFaixa AS corpoFaixa',
                'graduacaos.pontaFaixa AS pontaFaixa',
                'categorias.nome AS categoria',
                'categorias.menorPeso AS menorPeso',
                'categorias.maiorPeso AS maiorPeso',
                'modalidades.nome AS modalidade')
      ->where('campeonatos.id', $id)
      ->where('academias.id', $request['academia_id'])
      ->get();

      return view ('admin.inscricao.filtroAcademia', compact('campeonato', 'filtro', 'academia'));
    }

    public function salvar($id)
    {
      $campeonato = Campeonato::find($id);
      $campeonato_id = $id;
      $atleta = Atleta::orderBy('nome')->get();
      $modalidade = Modalidade::where('campeonato_id', $id)->get();
      return view ('admin.inscricao.salvar', compact('atleta', 'modalidade', 'campeonato_id', 'campeonato'));
    }

    public function editar($id)
    {
      $registro = Inscricao::find($id);
      return view ('admin.inscricao.editar', compact('registro'));
    }

    public function gravar(Request $request)
    {
      $atleta = DB::table('atletas')
      ->join('graduacaos', 'graduacaos.id', '=', 'atletas.graduacao_id')
      ->join('academias', 'academias.id', '=', 'atletas.academia_id')
      ->select('atletas.id AS atleta_id',
                'atletas.nome AS atleta',
                'atletas.peso AS peso',
                'atletas.sexo AS sexo',
                'academias.nome AS academina',
                DB::raw('IF(graduacaos.nomeGraduacao <> "Dan",
                      CAST(LEFT(graduacaos.nomeGraduacao, 2) AS DECIMAL (0)),
                      -99) AS graduacao'),
                'graduacaos.corpoFaixa AS corpoFaixa',
                'graduacaos.pontaFaixa AS pontaFaixa',
                DB::raw('TIMESTAMPDIFF(YEAR, nascimento, NOW()) AS idade'))
      ->where('atletas.id', $request['atleta_id'])
      ->first();
      $categoria = DB::table('categorias')
      ->select('categorias.id AS categoria_id')
      ->where('menorPeso', '<=', $atleta->peso)
      ->where('maiorPeso', '>=', $atleta->peso)
      ->where('graduacaoMenor', '>=', $atleta->graduacao)
      ->where('graduacaoMaior', '<=', $atleta->graduacao)
      ->where('sexo', $atleta->sexo)
      ->where('idadeMenor', '<=', $atleta->idade)
      ->where('idadeMaior', '>=', $atleta->idade)
      ->first();

      if (Inscricao::where('atleta_id', $request['atleta_id'])->where('modalidade_id', $request['modalidade_id'])->where('campeonato_id', $request['campeonato_id'])->where('categoria_id', $categoria->categoria_id)->count()) {
        \Session::flash('warning', 'Não foi possível efetuar esse cadastro, pois o atleta já foi incluido no torneio para a modalidade informada!');
      } else {
        $registro = new Inscricao();
        $registro->atleta_id = $request['atleta_id'];
        $registro->modalidade_id = $request['modalidade_id'];
        $registro->campeonato_id = $request['campeonato_id'];
        $registro->categoria_id = $categoria->categoria_id;
        $registro->save();
        \Session::flash('success', 'Registro gravado com sucesso!');
      }
      return redirect()->route('admin.inscricao.index', $request['campeonato_id']);
    }

    public function atualizar(Request $request, $id)
    {
      $registro = Inscricao::find($id);
      $registro->atleta_id = $request['atleta_id'];
      $registro->modalidade_id = $request['modalidade_id'];
      $registro->campeonato_id = $request['campeonato_id'];
      $registro->categoria_id = $request['categoria_id'];
      $registro->update();
      \Session::flash('success', 'Registro atualizado com sucesso!');
      return redirect()->route('admin.inscricao.index');
    }

    public function deletar($id)
    {
      $inscricao = Inscricao::find($id);
      Inscricao::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.inscricao.index', $inscricao->campeonato_id);
    }

    public function etiqueta($id)
    {
        $registros = DB::select(DB::raw(
            "SELECT 
                atletas.nome AS atleta,
                atletas.sexo AS sexo,
                atletas.peso AS peso,
                TIMESTAMPDIFF(YEAR, nascimento, NOW()) AS idade,
                categorias.nome AS categoria,
                graduacaos.nomeGraduacao AS nomeGraduacao,
                graduacaos.corpoFaixa AS corpoFaixa,
                graduacaos.pontaFaixa AS pontaFaixa,
                academias.nome AS academia,
                IF(COUNT(atletas.id) > 1,
                    'Kyorugui/Poomsae',
                    modalidades.nome) AS modalidade
            FROM
                inscricaos
                    INNER JOIN
                atletas ON atletas.id = inscricaos.atleta_id
                    INNER JOIN
                campeonatos ON campeonatos.id = inscricaos.campeonato_id
                    INNER JOIN
                modalidades ON modalidades.id = inscricaos.modalidade_id
                    INNER JOIN
                categorias ON categorias.id = inscricaos.categoria_id
                    INNER JOIN
                graduacaos ON graduacaos.id = atletas.graduacao_id
                    INNER JOIN
                academias ON academias.id = atletas.academia_id
            WHERE
                campeonatos.id = '$id'
            GROUP BY atletas.nome"
        ));

        return view('admin.inscricao.etiqueta', compact('registros'));
    }
}
