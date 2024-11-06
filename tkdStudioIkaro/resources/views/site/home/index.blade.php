@extends('layouts.site')

@section('content')
  <div class="container">
    {{-- <div class="row"> --}}
      @include('layouts.componentes.site.cards')
      @include('layouts.componentes.site.featurette')
      @include('layouts.componentes.site.gallery')
      @include('layouts.componentes.site.mapa_contato')
    {{-- </div> --}}
  </div>
@endsection
