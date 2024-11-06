<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resultado;
use App\Campeonato;
use App\Categoria;
use App\Inscricao;
use App\Atleta;
use App\Modalidade;
use App\Academia;
use DB;

class ResultadoController extends Controller
{
    public function index($id)
    {
      $campeonato_id = $id;
      $registros = DB::table('resultados')
      ->join('inscricaos', 'inscricaos.id', '=', 'resultados.inscricao_id')
      ->join('atletas', 'atletas.id', '=', 'inscricaos.atleta_id')
      ->join('campeonatos', 'campeonatos.id', '=', 'resultados.campeonato_id')
      ->join('graduacaos', 'graduacaos.id', '=', 'atletas.graduacao_id')
      ->join('academias', 'academias.id', '=', 'atletas.academia_id')
      ->join('categorias', 'categorias.id', '=', 'inscricaos.categoria_id')
      ->join('modalidades', 'modalidades.id', '=', 'inscricaos.modalidade_id')
      ->select('atletas.nome AS atleta',
                'academias.nome AS academia',
                'graduacaos.corpoFaixa AS corpoFaixa',
                'graduacaos.pontaFaixa AS pontaFaixa',
                'categorias.nome AS categoria',
                'modalidades.nome AS modalidade',
                'resultados.id AS resultado_id',
                'resultados.classificacao AS classificacao',
                'resultados.tipoConfronto AS tipoConfronto')
      ->where('campeonatos.id', $id)
      ->orderBy('atletas.nome')
      ->orderBy('academias.nome')
      ->get();

      return view ('admin.resultado.index', compact('registros', 'campeonato_id'));
    }

    public function salvar($id)
    {
      $campeonato_id = $id;
      $atleta = DB::table('inscricaos')
      ->join('atletas', 'atletas.id', '=', 'inscricaos.atleta_id')
      ->join('modalidades', 'modalidades.id', '=', 'inscricaos.modalidade_id')
      ->select('inscricaos.id AS inscricao_id',
                'atletas.id AS atleta_id',
                'atletas.nome AS atleta',
                'modalidades.id AS modalidade_id',
                'modalidades.nome AS modalidade')
      ->where('inscricaos.campeonato_id', $id)
      ->orderBy('atletas.nome')
      ->get();

      return view ('admin.resultado.salvar', compact('atleta', 'campeonato_id'));
    }

    public function gravar(Request $request)
    {
      $registro = new Resultado();
      $registro->campeonato_id = $request['campeonato_id'];
      $registro->inscricao_id = $request['inscricao_id'];
      $registro->classificacao = $request['classificacao'];
      $registro->tipoConfronto = $request['tipoConfronto'];

      if ($request['classificacao'] == '1' && $request['tipoConfronto'] == 'luta') {
        $registro->pontuacao = 10;
      } elseif ($request['classificacao'] == '2' && $request['tipoConfronto'] == 'luta') {
        $registro->pontuacao = 5;
      } elseif ($request['classificacao'] == '3' && $request['tipoConfronto'] == 'luta') {
        $registro->pontuacao = 3;
      } elseif ($request['classificacao'] == '1' && $request['tipoConfronto'] == 'poomsae') {
        $registro->pontuacao = 10;
      }elseif ($request['classificacao'] == '2' && $request['tipoConfronto'] == 'poomsae') {
        $registro->pontuacao = 5;
      } elseif ($request['classificacao'] == '3' && $request['tipoConfronto'] == 'poomsae') {
        $registro->pontuacao = 3;
      } elseif ($request['classificacao'] == '1' && $request['tipoConfronto'] == 'WO') {
        $registro->pontuacao = 1;
      }

      $registro->save();

      \Session::flash('success', 'Registro gravado com sucesso!');
      return redirect()->route('admin.resultado.index', $registro->campeonato_id);
    }

    public function deletar($id)
    {
      $resultado = Resultado::find($id);
      Resultado::find($id)->delete();
      \Session::flash('success', 'Registro deletado com sucesso!');
      return redirect()->route('admin.resultado.index', $resultado->campeonato_id);
    }

    public function relatorioResultado($id)
    {
      $academia = DB::select("SELECT
                          academia_id AS academia_id,
                          academia AS academia,
                          MAX(pontuacao) AS pontuacao
                      FROM
                          (SELECT
                              academia_id AS academia_id,
                                  academia AS academia,
                                  SUM(pontuacao) AS pontuacao
                          FROM
                              (SELECT
                              academias.id AS academia_id,
                                  academias.nome AS academia,
                                  SUM(resultados.pontuacao) AS pontuacao
                          FROM
                              resultados
                          INNER JOIN inscricaos ON inscricaos.id = resultados.inscricao_id
                          INNER JOIN atletas ON atletas.id = inscricaos.atleta_id
                          INNER JOIN campeonatos ON campeonatos.id = resultados.campeonato_id
                          INNER JOIN graduacaos ON graduacaos.id = atletas.graduacao_id
                          INNER JOIN academias ON academias.id = atletas.academia_id
                          INNER JOIN categorias ON categorias.id = inscricaos.categoria_id
                          INNER JOIN modalidades ON modalidades.id = inscricaos.modalidade_id
                          WHERE
                              campeonatos.id = :id1
                                  AND resultados.tipoConfronto = 'luta'
                          GROUP BY academias.nome , atletas.nome UNION ALL SELECT
                              academias.id AS academia_id,
                                  academias.nome AS academia,
                                  SUM(resultados.pontuacao) AS pontuaca
                          FROM
                              resultados
                          INNER JOIN inscricaos ON inscricaos.id = resultados.inscricao_id
                          INNER JOIN atletas ON atletas.id = inscricaos.atleta_id
                          INNER JOIN campeonatos ON campeonatos.id = resultados.campeonato_id
                          INNER JOIN graduacaos ON graduacaos.id = atletas.graduacao_id
                          INNER JOIN academias ON academias.id = atletas.academia_id
                          INNER JOIN categorias ON categorias.id = inscricaos.categoria_id
                          INNER JOIN modalidades ON modalidades.id = inscricaos.modalidade_id
                          WHERE
                              campeonatos.id = :id2
                                  AND resultados.tipoConfronto = 'poomsae'
                                  AND atletas.id NOT IN (SELECT
                                      atletas.id
                                  FROM
                                      resultados
                                  INNER JOIN inscricaos ON inscricaos.id = resultados.inscricao_id
                                  INNER JOIN atletas ON atletas.id = inscricaos.atleta_id
                                  GROUP BY atletas.id
                                  HAVING COUNT(atletas.id) > 1)
                          GROUP BY academias.nome , atletas.nome) AS tbl_resultado_academia
                          GROUP BY academia_id) AS tbl_max_valor_academia
                      GROUP BY academia
                      ORDER BY pontuacao DESC", ['id1' => $id, 'id2' => $id]);

      $campeonato_id = $id;
      $campeonato = Campeonato::find($id);
      $registros = DB::table('resultados')
      ->join('inscricaos', 'inscricaos.id', '=', 'resultados.inscricao_id')
      ->join('atletas', 'atletas.id', '=', 'inscricaos.atleta_id')
      ->join('campeonatos', 'campeonatos.id', '=', 'resultados.campeonato_id')
      ->join('graduacaos', 'graduacaos.id', '=', 'atletas.graduacao_id')
      ->join('academias', 'academias.id', '=', 'atletas.academia_id')
      ->join('categorias', 'categorias.id', '=', 'inscricaos.categoria_id')
      ->join('modalidades', 'modalidades.id', '=', 'inscricaos.modalidade_id')
      ->select('atletas.nome AS atleta',
                'academias.id AS academia_id',
                'academias.nome AS academia',
                'graduacaos.corpoFaixa AS corpoFaixa',
                'graduacaos.pontaFaixa AS pontaFaixa',
                'categorias.nome AS categoria',
                'modalidades.nome AS modalidade',
                'resultados.id AS resultado_id',
                DB::raw('SUM(resultados.pontuacao) as totalPontos'),
                'resultados.classificacao AS classificacao',
                'resultados.tipoConfronto AS tipoConfronto',
                'resultados.pontuacao AS pontuacao')
      ->where('campeonatos.id', $id)
      ->groupBy('atletas.nome')
      ->groupBy('academias.nome')
      ->get();

      return view ('admin.resultado.relatorioResultado', compact('registros', 'campeonato_id', 'campeonato', 'academia'));
    }

    public function campecaoPorCategoria($id)
    {
      $categoria = Categoria::groupBy('nome')->get();
      $modalidade = Modalidade::all();
      $academia = Academia::all();
      $campeonato_id = $id;
      return view ('admin.resultado.campecaoPorCategoria', compact('campeonato_id', 'categoria', 'modalidade', 'academia'));
    }

    public function listaCampecaoPorCategoria(Request $request, $id)
    {
      $campeonato = Campeonato::find($id);
      $categoria = Categoria::groupBy('nome')->get();
      $modalidade = Modalidade::all();
      $academia = Academia::all();
      $campeonato_id = $id;
      $registros = DB::table('resultados')
      ->join('inscricaos', 'inscricaos.id', '=', 'resultados.inscricao_id')
      ->join('atletas', 'atletas.id', '=', 'inscricaos.atleta_id')
      ->join('campeonatos', 'campeonatos.id', '=', 'resultados.campeonato_id')
      ->join('graduacaos', 'graduacaos.id', '=', 'atletas.graduacao_id')
      ->join('academias', 'academias.id', '=', 'atletas.academia_id')
      ->join('categorias', 'categorias.id', '=', 'inscricaos.categoria_id')
      ->join('modalidades', 'modalidades.id', '=', 'inscricaos.modalidade_id')
      ->select('atletas.nome AS atleta',
                'academias.nome AS academia',
                'graduacaos.corpoFaixa AS corpoFaixa',
                'graduacaos.pontaFaixa AS pontaFaixa',
                'categorias.nome AS categoria',
                'modalidades.nome AS modalidade',
                'resultados.id AS resultado_id',
                'resultados.classificacao AS classificacao',
                'resultados.tipoConfronto AS tipoConfronto')
      ->where('campeonatos.id', $id)
      ->orderBy('atletas.nome')
      ->orderBy('academias.nome')
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
      ->where(function ($query) use ($request) {
                if ($request['classificacao'] <> '') {
                    $query->where('resultados.classificacao', $request['classificacao']);
                } else {
                    $query->where('resultados.classificacao', '<>', '');
                }
            })
      ->orderBy('atletas.nome')
      ->get();

      return view ('admin.resultado.listaCampecaoPorCategoria', compact('registros', 'campeonato_id', 'categoria', 'modalidade', 'campeonato', 'academia'));
    }

    public function equipeCampea($id)
    {
      $campeonato = Campeonato::find($id);
      $registros = DB::select("SELECT
                          academia_id AS academia_id,
                          academia AS academia,
                          MAX(pontuacao) AS pontuacao
                      FROM
                          (SELECT
                              academia_id AS academia_id,
                                  academia AS academia,
                                  SUM(pontuacao) AS pontuacao
                          FROM
                              (SELECT
                              academias.id AS academia_id,
                                  academias.nome AS academia,
                                  SUM(resultados.pontuacao) AS pontuacao
                          FROM
                              resultados
                          INNER JOIN inscricaos ON inscricaos.id = resultados.inscricao_id
                          INNER JOIN atletas ON atletas.id = inscricaos.atleta_id
                          INNER JOIN campeonatos ON campeonatos.id = resultados.campeonato_id
                          INNER JOIN graduacaos ON graduacaos.id = atletas.graduacao_id
                          INNER JOIN academias ON academias.id = atletas.academia_id
                          INNER JOIN categorias ON categorias.id = inscricaos.categoria_id
                          INNER JOIN modalidades ON modalidades.id = inscricaos.modalidade_id
                          WHERE
                              campeonatos.id = :id1
                                  AND resultados.tipoConfronto = 'luta'
                          GROUP BY academias.nome , atletas.nome UNION ALL SELECT
                              academias.id AS academia_id,
                                  academias.nome AS academia,
                                  SUM(resultados.pontuacao) AS pontuaca
                          FROM
                              resultados
                          INNER JOIN inscricaos ON inscricaos.id = resultados.inscricao_id
                          INNER JOIN atletas ON atletas.id = inscricaos.atleta_id
                          INNER JOIN campeonatos ON campeonatos.id = resultados.campeonato_id
                          INNER JOIN graduacaos ON graduacaos.id = atletas.graduacao_id
                          INNER JOIN academias ON academias.id = atletas.academia_id
                          INNER JOIN categorias ON categorias.id = inscricaos.categoria_id
                          INNER JOIN modalidades ON modalidades.id = inscricaos.modalidade_id
                          WHERE
                              campeonatos.id = :id2
                                  AND resultados.tipoConfronto = 'poomsae'
                                  AND atletas.id NOT IN (SELECT
                                      atletas.id
                                  FROM
                                      resultados
                                  INNER JOIN inscricaos ON inscricaos.id = resultados.inscricao_id
                                  INNER JOIN atletas ON atletas.id = inscricaos.atleta_id
                                  GROUP BY atletas.id
                                  HAVING COUNT(atletas.id) > 1)
                          GROUP BY academias.nome , atletas.nome) AS tbl_resultado_academia
                          GROUP BY academia_id) AS tbl_max_valor_academia
                      GROUP BY academia
                      ORDER BY pontuacao DESC", ['id1' => $id, 'id2' => $id]);

      return view ('admin.resultado.equipeCampea', compact('registros', 'campeonato'));
    }

}
