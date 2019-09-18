@extends('principal')

@section('script')
     <script src="{{ url('/js/jquery.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap.min.js') }}"></script>
@stop

@section('conteudo')

<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body">
            <h3> Deseja remover a turma? <br><br><b>{{ $turma->nome }}</b></h3>
        </div>
        <div class="modal-footer">
            <a href="{{ action('TurmaController@confirmar', $turma->id) }}" type="button" class="btn btn-success">Sim</a>
            <a href="{{ action('TurmaController@listar') }}" type="button" class="btn btn-danger">Não</a>
        </div>
    </div>
</div>
@stop
