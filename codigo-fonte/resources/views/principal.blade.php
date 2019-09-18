<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Minicurso Laravel</title>

        <!-- Bootstrap - CSS -->
        <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">
        
        <!-- Custom styles for this template -->
        <link href="{{ url('/css/theme.css') }}" rel="stylesheet">

        <!-- Bootstrap Java Script -->
        <script src="{{ url('/js/jquery-3.3.1.slim.js') }}"></script>
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>
        
        @yield('script')
        
    </head>

    <body role="document">
        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">SCT - Sistema de Cursos e Turmas</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                                <a href="{{ url('/') }}"> Home </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container theme-showcase" role="main">

            <div class="page-header">

                <div class="page-header">
                    <h1 class="form-signin-heading">
                        @yield('cabecalho')
                    </h1>
                </div>

                @yield('conteudo')

            </div>
            <b>&copy;2018
                &nbsp;&nbsp;&raquo;&nbsp;&nbsp;
                Gil Eduardo de Andrade
                &nbsp;&nbsp;&raquo;&nbsp;&nbsp;
                versão 1.0
            </b>
    </body>
</html>
