@extends('principal')

@section('cabecalho')
<div id="m_texto">
        <img src=" {{ url('/img/homep_ico.png') }}" >
        &nbsp;Menu Principal
</div>
@stop

@section('conteudo')
<div class='row'>

    <div class='col-sm-6' style="text-align: center">
        <a href="/curso">
            <img src="{{ url('/img/curso_ico.png') }}">
        </a>
        <h3> Cursos </h3>
    </div>

    <div class='col-sm-6' style="text-align: center">
        <a href="/turma">
            <img src="{{ url('/img/turma_ico.png') }}">
        </a>
        <h3> Turmas </h3>
    </div>

</div>

@stop
