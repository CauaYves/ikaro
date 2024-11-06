<li class="nav-item fonte_li dropdown">
    <a id="navbarDropdown" class="nav-link text-white dropdown-toggle color grow circle threed" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Torneio <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

        <a class="dropdown-item color grow circle threed" href="{{ route('admin.academia.index') }}">Academia</a>
        <a class="dropdown-item color grow circle threed" href="{{ route('admin.atleta.index') }}">Atleta</a>
        <a class="dropdown-item color grow circle threed" href="{{ route('admin.arte_marcial.index') }}">Arte Marcial</a>
        <a class="dropdown-item color grow circle threed" href="{{ route('admin.campeonato.index') }}">Torneio</a>
        <a class="dropdown-item color grow circle threed" href="{{ route('admin.graduacao.index') }}">Graduação</a>

    </div>
</li>

<li class="nav-item fonte_li dropdown">
    <a id="navbarDropdown" class="nav-link text-white dropdown-toggle color grow circle threed" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Controle Academia <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

        <a class="dropdown-item color grow circle threed" href="{{ route('admin.instrutor.index') }}">Instrutor</a>
        <a class="dropdown-item color grow circle threed" href="{{ route('admin.studio.index') }}">Studio</a>
        <a class="dropdown-item color grow circle threed" href="{{ route('admin.aluno.index') }}">Alunos</a>
        <a class="dropdown-item color grow circle threed" href="{{ route('admin.atividade.index') }}">Atividade</a>

    </div>
</li>

<li class="nav-item fonte_li dropdown">
    <a id="navbarDropdown" class="nav-link text-white dropdown-toggle color grow circle threed" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Controle Financeiro <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

        <a class="dropdown-item color grow circle threed" href="{{ route('admin.contas_pagar.index') }}">Contas a Pagar</a>
        <a class="dropdown-item color grow circle threed" href="{{ route('admin.contas_receber.index') }}">Contas a Receber</a>

    </div>
</li>
