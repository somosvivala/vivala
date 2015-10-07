@extends('cuidar')

@section('content')
<div class="foto-fundo foto-header" style="background-image:url('/img/querocuidar.png');">
    <h2>Cuide do Brasil</h2>
    <h3>Faça trabalhos voluntários e desenvolva o país.</h3>
    <div class="col-sm-12">
        <a class="btn">
            Como funciona
        </a>
    </div>
</div>
<h4> Já sabe qual causa ajudar? </h4>
{{-- Incluir filtro com resultados de causas --}}
@endsection
