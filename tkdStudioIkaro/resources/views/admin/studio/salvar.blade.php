@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.studio.index') }}">Studio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Salvar</li>
      </ol>
    </nav><br>

    <form action="{{ route('admin.studio.gravar') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @include('admin.studio._form')
      <br>
      <button type="submit" class="btn btn-outline-success btn-lg">
        <i class="far fa-save"></i> Gravar
      </button>
    </form>
  </div>
@endsection
