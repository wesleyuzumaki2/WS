@extends('principal')

@section('script')
    <script src="{{ url('/js/jquery.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap.min.js') }}"></script>
@stop

@section('conteudo')

<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body">
            <h3> Deseja remover o curso? <br><br><b>{{ $curso->nome }}</b></h3>
        </div>
        <div class="modal-footer">
            <a href="{{ action('CursoController@confirmar', $curso->id) }}" type="button" class="btn btn-success">Sim</a>
            <a href="{{ action('CursoController@listar') }}" type="button" class="btn btn-danger">Não</a>
        </div>
    </div>
</div>
@stop
