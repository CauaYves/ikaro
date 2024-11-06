<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Site\HomeController@index')->name('site.home.index');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware'=>'auth'], function(){
  Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home.index');

  Route::prefix('/admin/academia')->group(function () {
      Route::get('/', 'Admin\AcademiaController@index')->name('admin.academia.index');
      Route::get('/salvar', 'Admin\AcademiaController@salvar')->name('admin.academia.salvar');
      Route::post('/gravar', 'Admin\AcademiaController@gravar')->name('admin.academia.gravar');
      Route::get('/editar/{id}', 'Admin\AcademiaController@editar')->name('admin.academia.editar');
      Route::put('/atualizar/{id}', 'Admin\AcademiaController@atualizar')->name('admin.academia.atualizar');
      Route::get('/deletar/{id}', 'Admin\AcademiaController@deletar')->name('admin.academia.deletar');
  });

  Route::prefix('/admin/arte_marcial')->group(function () {
      Route::get('/', 'Admin\ArteMarcialController@index')->name('admin.arte_marcial.index');
      Route::get('/salvar', 'Admin\ArteMarcialController@salvar')->name('admin.arte_marcial.salvar');
      Route::post('/gravar', 'Admin\ArteMarcialController@gravar')->name('admin.arte_marcial.gravar');
      Route::get('/editar/{id}', 'Admin\ArteMarcialController@editar')->name('admin.arte_marcial.editar');
      Route::put('/atualizar/{id}', 'Admin\ArteMarcialController@atualizar')->name('admin.arte_marcial.atualizar');
      Route::get('/deletar/{id}', 'Admin\ArteMarcialController@deletar')->name('admin.arte_marcial.deletar');
  });

  Route::prefix('/admin/atleta')->group(function () {
      Route::get('/', 'Admin\AtletaController@index')->name('admin.atleta.index');
      // Route::get('/autocomplete', 'Admin\AtletaController@autocomplete')->name('admin.atleta.autocomplete');
      Route::get('/salvar', 'Admin\AtletaController@salvar')->name('admin.atleta.salvar');
      Route::post('/gravar', 'Admin\AtletaController@gravar')->name('admin.atleta.gravar');
      Route::get('/editar/{id}', 'Admin\AtletaController@editar')->name('admin.atleta.editar');
      Route::put('/atualizar/{id}', 'Admin\AtletaController@atualizar')->name('admin.atleta.atualizar');
      Route::get('/deletar/{id}', 'Admin\AtletaController@deletar')->name('admin.atleta.deletar');
  });

  Route::prefix('/admin/graduacao')->group(function () {
      Route::get('/', 'Admin\GraduacaoController@index')->name('admin.graduacao.index');
      Route::get('/salvar', 'Admin\GraduacaoController@salvar')->name('admin.graduacao.salvar');
      Route::post('/gravar', 'Admin\GraduacaoController@gravar')->name('admin.graduacao.gravar');
      Route::get('/editar/{id}', 'Admin\GraduacaoController@editar')->name('admin.graduacao.editar');
      Route::put('/atualizar/{id}', 'Admin\GraduacaoController@atualizar')->name('admin.graduacao.atualizar');
      Route::get('/deletar/{id}', 'Admin\GraduacaoController@deletar')->name('admin.graduacao.deletar');
  });

  Route::prefix('/admin/categoria')->group(function () {
      Route::get('/{id}', 'Admin\CategoriaController@index')->name('admin.categoria.index');
      Route::get('/salvar/{id}', 'Admin\CategoriaController@salvar')->name('admin.categoria.salvar');
      Route::post('/gravar', 'Admin\CategoriaController@gravar')->name('admin.categoria.gravar');
      Route::get('/editar/{id}', 'Admin\CategoriaController@editar')->name('admin.categoria.editar');
      Route::put('/atualizar/{id}', 'Admin\CategoriaController@atualizar')->name('admin.categoria.atualizar');
      Route::get('/deletar/{id}', 'Admin\CategoriaController@deletar')->name('admin.categoria.deletar');
  });


  Route::prefix('/admin/campeonato')->group(function () {
      Route::get('/', 'Admin\CampeonatoController@index')->name('admin.campeonato.index');
      Route::get('/salvar', 'Admin\CampeonatoController@salvar')->name('admin.campeonato.salvar');
      Route::post('/gravar', 'Admin\CampeonatoController@gravar')->name('admin.campeonato.gravar');
      Route::get('/editar/{id}', 'Admin\CampeonatoController@editar')->name('admin.campeonato.editar');
      Route::put('/atualizar/{id}', 'Admin\CampeonatoController@atualizar')->name('admin.campeonato.atualizar');
      Route::get('/deletar/{id}', 'Admin\CampeonatoController@deletar')->name('admin.campeonato.deletar');
  });

  Route::prefix('/admin/modalidade')->group(function () {
    Route::get('/{id}', 'Admin\ModalidadeController@index')->name('admin.modalidade.index');
    Route::get('/salvar/{id}', 'Admin\ModalidadeController@salvar')->name('admin.modalidade.salvar');
    Route::post('/gravar', 'Admin\ModalidadeController@gravar')->name('admin.modalidade.gravar');
    Route::get('/editar/{id}', 'Admin\ModalidadeController@editar')->name('admin.modalidade.editar');
    Route::put('/atualizar/{id}', 'Admin\ModalidadeController@atualizar')->name('admin.modalidade.atualizar');
    Route::get('/deletar/{id}', 'Admin\ModalidadeController@deletar')->name('admin.modalidade.deletar');
  });

  Route::prefix('/admin/inscricao')->group(function () {
      Route::get('/{id}', 'Admin\InscricaoController@index')->name('admin.inscricao.index');
      Route::get('/categoriaPesoFaixaIdade/{id}', 'Admin\InscricaoController@categoriaPesoFaixaIdade')->name('admin.inscricao.categoriaPesoFaixaIdade');
      Route::get('/listaInscritosCategoriaLuta/{id}', 'Admin\InscricaoController@listaInscritosCategoriaLuta')->name('admin.inscricao.listaInscritosCategoriaLuta');
      Route::get('/listaInscritosCategoriaPoomsae/{id}', 'Admin\InscricaoController@listaInscritosCategoriaPoomsae')->name('admin.inscricao.listaInscritosCategoriaPoomsae');
      Route::get('/filtroCategoriaPesoFaixaIdade/{id}', 'Admin\InscricaoController@filtroCategoriaPesoFaixaIdade')->name('admin.inscricao.filtroCategoriaPesoFaixaIdade');
      Route::get('/academia/{id}', 'Admin\InscricaoController@academia')->name('admin.inscricao.academia');
      Route::get('/filtroAcademia/{id}', 'Admin\InscricaoController@filtroAcademia')->name('admin.inscricao.filtroAcademia');
      Route::get('/salvar/{id}', 'Admin\InscricaoController@salvar')->name('admin.inscricao.salvar');
      Route::post('/gravar', 'Admin\InscricaoController@gravar')->name('admin.inscricao.gravar');
      Route::get('/editar/{id}', 'Admin\InscricaoController@editar')->name('admin.inscricao.editar');
      Route::put('/atualizar/{id}', 'Admin\InscricaoController@atualizar')->name('admin.inscricao.atualizar');
      Route::get('/deletar/{id}', 'Admin\InscricaoController@deletar')->name('admin.inscricao.deletar');

      Route::get('/etiqueta/{id}', 'Admin\InscricaoController@etiqueta')->name('etiqueta');
  });

  Route::prefix('/admin/resultado')->group(function () {
      Route::get('/{id}', 'Admin\ResultadoController@index')->name('admin.resultado.index');
      Route::get('/salvar/{id}', 'Admin\ResultadoController@salvar')->name('admin.resultado.salvar');
      Route::post('/gravar', 'Admin\ResultadoController@gravar')->name('admin.resultado.gravar');
      Route::get('/relatorioResultado/{id}', 'Admin\ResultadoController@relatorioResultado')->name('admin.resultado.relatorioResultado');
      Route::get('/deletar/{id}', 'Admin\ResultadoController@deletar')->name('admin.resultado.deletar');
      Route::get('/campecaoPorCategoria/{id}', 'Admin\ResultadoController@campecaoPorCategoria')->name('admin.resultado.campecaoPorCategoria');
      Route::get('/listaCampecaoPorCategoria/{id}', 'Admin\ResultadoController@listaCampecaoPorCategoria')->name('admin.resultado.listaCampecaoPorCategoria');
      Route::get('/equipeCampea/{id}', 'Admin\ResultadoController@equipeCampea')->name('admin.resultado.equipeCampea');
  });

  Route::prefix('/admin/studio')->group(function () {
      Route::get('/', 'Admin\StudioController@index')->name('admin.studio.index');
      Route::get('/salvar', 'Admin\StudioController@salvar')->name('admin.studio.salvar');
      Route::post('/gravar', 'Admin\StudioController@gravar')->name('admin.studio.gravar');
      Route::get('/editar/{id}', 'Admin\StudioController@editar')->name('admin.studio.editar');
      Route::put('/atualizar/{id}', 'Admin\StudioController@atualizar')->name('admin.studio.atualizar');
      Route::get('/deletar/{id}', 'Admin\StudioController@deletar')->name('admin.studio.deletar');
  });

  Route::prefix('/admin/atividade')->group(function () {
      Route::get('/', 'Admin\AtividadeController@index')->name('admin.atividade.index');
      Route::get('/salvar', 'Admin\AtividadeController@salvar')->name('admin.atividade.salvar');
      Route::post('/gravar', 'Admin\AtividadeController@gravar')->name('admin.atividade.gravar');
      Route::get('/editar/{id}', 'Admin\AtividadeController@editar')->name('admin.atividade.editar');
      Route::put('/atualizar/{id}', 'Admin\AtividadeController@atualizar')->name('admin.atividade.atualizar');
      Route::get('/deletar/{id}', 'Admin\AtividadeController@deletar')->name('admin.atividade.deletar');
  });

  Route::prefix('/admin/atividade/valor_atividade')->group(function () {
      Route::get('/{id}', 'Admin\ValorAtividadeController@index')->name('admin.valor_atividade.index');
      Route::get('/salvar/{id}', 'Admin\ValorAtividadeController@salvar')->name('admin.valor_atividade.salvar');
      Route::post('/gravar', 'Admin\ValorAtividadeController@gravar')->name('admin.valor_atividade.gravar');
      Route::get('/editar/{id}', 'Admin\ValorAtividadeController@editar')->name('admin.valor_atividade.editar');
      Route::put('/atualizar/{id}', 'Admin\ValorAtividadeController@atualizar')->name('admin.valor_atividade.atualizar');
      Route::get('/deletar/{id}', 'Admin\ValorAtividadeController@deletar')->name('admin.valor_atividade.deletar');
  });

  Route::prefix('/admin/instrutor')->group(function () {
    Route::get('/', 'Admin\InstrutorController@index')->name('admin.instrutor.index');
    Route::get('/salvar', 'Admin\InstrutorController@salvar')->name('admin.instrutor.salvar');
    Route::post('/gravar', 'Admin\InstrutorController@gravar')->name('admin.instrutor.gravar');
    Route::get('/editar/{id}', 'Admin\InstrutorController@editar')->name('admin.instrutor.editar');
    Route::put('/atualizar/{id}', 'Admin\InstrutorController@atualizar')->name('admin.instrutor.atualizar');
    Route::get('/deletar/{id}', 'Admin\InstrutorController@deletar')->name('admin.instrutor.deletar');
  });

  Route::prefix('/admin/aluno')->group(function () {
    Route::get('/', 'Admin\AlunoController@index')->name('admin.aluno.index');
    Route::get('/salvar', 'Admin\AlunoController@salvar')->name('admin.aluno.salvar');
    Route::post('/gravar', 'Admin\AlunoController@gravar')->name('admin.aluno.gravar');
    Route::get('/editar/{id}', 'Admin\AlunoController@editar')->name('admin.aluno.editar');
    Route::put('/atualizar/{id}', 'Admin\AlunoController@atualizar')->name('admin.aluno.atualizar');
    Route::get('/deletar/{id}', 'Admin\AlunoController@deletar')->name('admin.aluno.deletar');
  });

  Route::prefix('/admin/aluno/desconto_aluno')->group(function () {
    Route::get('/{id}', 'Admin\DescontoAlunoController@index')->name('admin.desconto_aluno.index');
    Route::get('/salvar/{id}', 'Admin\DescontoAlunoController@salvar')->name('admin.desconto_aluno.salvar');
    Route::post('/gravar', 'Admin\DescontoAlunoController@gravar')->name('admin.desconto_aluno.gravar');
    Route::get('/editar/{id}', 'Admin\DescontoAlunoController@editar')->name('admin.desconto_aluno.editar');
    Route::put('/atualizar/{id}', 'Admin\DescontoAlunoController@atualizar')->name('admin.desconto_aluno.atualizar');
    Route::get('/deletar/{id}', 'Admin\DescontoAlunoController@deletar')->name('admin.desconto_aluno.deletar');
  });

  Route::prefix('/admin/instrutor/turma')->group(function () {
    Route::get('/{id}', 'Admin\TurmaController@index')->name('admin.turma.index');
    Route::get('/salvar/{id}', 'Admin\TurmaController@salvar')->name('admin.turma.salvar');
    Route::post('/gravar', 'Admin\TurmaController@gravar')->name('admin.turma.gravar');
    Route::get('/editar/{id}', 'Admin\TurmaController@editar')->name('admin.turma.editar');
    Route::put('/atualizar/{id}', 'Admin\TurmaController@atualizar')->name('admin.turma.atualizar');
    Route::get('/deletar/{id}', 'Admin\TurmaController@deletar')->name('admin.turma.deletar');
  });

  Route::prefix('/admin/instrutor/turma/horarios_turma')->group(function () {
    Route::get('/{id}', 'Admin\HorarioTurmaController@index')->name('admin.horarios_turma.index');
    Route::get('/salvar/{id}', 'Admin\HorarioTurmaController@salvar')->name('admin.horarios_turma.salvar');
    Route::post('/gravar', 'Admin\HorarioTurmaController@gravar')->name('admin.horarios_turma.gravar');
    Route::get('/editar/{id}', 'Admin\HorarioTurmaController@editar')->name('admin.horarios_turma.editar');
    Route::put('/atualizar/{id}', 'Admin\HorarioTurmaController@atualizar')->name('admin.horarios_turma.atualizar');
    Route::get('/deletar/{id}', 'Admin\HorarioTurmaController@deletar')->name('admin.horarios_turma.deletar');
  });

  Route::prefix('/admin/instrutor/turma/alunos_turma')->group(function () {
    Route::get('/{id}', 'Admin\AlunoTurmaController@index')->name('admin.alunos_turma.index');
    Route::get('/salvar/{id}', 'Admin\AlunoTurmaController@salvar')->name('admin.alunos_turma.salvar');
    Route::post('/gravar', 'Admin\AlunoTurmaController@gravar')->name('admin.alunos_turma.gravar');
    Route::get('/editar/{id}', 'Admin\AlunoTurmaController@editar')->name('admin.alunos_turma.editar');
    Route::put('/atualizar/{id}', 'Admin\AlunoTurmaController@atualizar')->name('admin.alunos_turma.atualizar');
    Route::get('/deletar/{id}', 'Admin\AlunoTurmaController@deletar')->name('admin.alunos_turma.deletar');
  });

  Route::prefix('/admin/contas_pagar')->group(function () {
		Route::get('/', 'Admin\ContasPagarController@index')->name('admin.contas_pagar.index');
		Route::get('/adicionar', 'Admin\ContasPagarController@adicionar')->name('admin.contas_pagar.adicionar');
		Route::get('/autocomplete', 'Admin\ContasPagarController@autocomplete')->name('admin.contas_pagar.autocomplete');
		Route::post('/salvar', 'Admin\ContasPagarController@salvar')->name('admin.contas_pagar.salvar');
		Route::get('/editar/{id}', 'Admin\ContasPagarController@editar')->name('admin.contas_pagar.editar');
		Route::put('/alterar/{id}', 'Admin\ContasPagarController@alterar')->name('admin.contas_pagar.alterar');
		Route::get('/baixa/{id}', 'Admin\ContasPagarController@baixa')->name('admin.contas_pagar.baixa');
		Route::put('/alteraBaixa/{id}', 'Admin\ContasPagarController@alteraBaixa')->name('admin.contas_pagar.alteraBaixa');
		Route::get('/deletar/{id}', 'Admin\ContasPagarController@deletar')->name('admin.contas_pagar.deletar');
		Route::get('/listar', 'Admin\ContasPagarController@listar')->name('admin.contas_pagar.listar');
	});

  Route::prefix('/admin/contas_receber')->group(function () {
		Route::get('/', 'Admin\ContasReceberController@index')->name('admin.contas_receber.index');
		Route::get('/atividadeAluno', 'Admin\ContasReceberController@atividadeAluno')->name('admin.contas_receber.atividadeAluno');
		Route::get('/descontoAluno', 'Admin\ContasReceberController@descontoAluno')->name('admin.contas_receber.descontoAluno');
		Route::get('/atividadeValor', 'Admin\ContasReceberController@atividadeValor')->name('admin.contas_receber.atividadeValor');
		Route::get('/adicionar', 'Admin\ContasReceberController@adicionar')->name('admin.contas_receber.adicionar');
		Route::post('/salvar', 'Admin\ContasReceberController@salvar')->name('admin.contas_receber.salvar');
		Route::get('/editar/{id}', 'Admin\ContasReceberController@editar')->name('admin.contas_receber.editar');
		Route::put('/alterar/{id}', 'Admin\ContasReceberController@alterar')->name('admin.contas_receber.alterar');
		Route::get('/baixa/{id}', 'Admin\ContasReceberController@baixa')->name('admin.contas_receber.baixa');
		Route::put('/alteraBaixa/{id}', 'Admin\ContasReceberController@alteraBaixa')->name('admin.contas_receber.alteraBaixa');
		Route::get('/deletar/{id}', 'Admin\ContasReceberController@deletar')->name('admin.contas_receber.deletar');
		Route::get('/listar', 'Admin\ContasReceberController@listar')->name('admin.contas_receber.listar');
		Route::get('/relatorio_receber/{id}', 'Admin\ContasReceberController@relatorio_receber')->name('admin.contas_receber.relatorio_receber');
		Route::get('/relatorio/{id}', 'Admin\ContasReceberController@relatorio')->name('admin.contas_receber.relatorio');
	});
});
