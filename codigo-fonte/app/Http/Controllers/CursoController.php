<?php

namespace App\Http\Controllers;

use Request;

// Classes de Modelo
use App\Curso;
use App\Turma;
use App\Nivel;

class CursoController extends Controller {

    public function listar() { 

  		$cursos = Curso::all();
        $niveis = Nivel::select('id', 'abreviatura')->get();
        return view('curso')->with('cursos', $cursos)->with('niveis', $niveis);
  	}	

	public function cadastrar() { 

		$niveis = Nivel::orderBy('id')->get();
        return view('cursoCadastrar')->with('niveis', $niveis);
	}	

	public function editar($id) { 

		// Filtra parâmetro para garantir que é um número
        if(is_numeric($id)) {
            $curso = Curso::find($id);

            // Verifica se existe um curso com o 'id' recebido por parâmetro
            if(empty($curso)) {
            	$msg = "Curso não encontrado para o id=".$id."!";

		        return view('messagebox')->with('tipo', 'alert alert-warning')
		            ->with('titulo', 'OPERAÇÃO INVÁLIDA')
	                ->with('msg', $msg)
	                ->with('acao', "/curso");
            }

            $niveis = Nivel::orderBy('id')->get();
            return view('cursoEditar')->with('curso', $curso)->with('niveis', $niveis);
        }
        else {
            $msg = "Parâmetro via URL Inválido!";

	        return view('messagebox')->with('tipo', 'alert alert-warning')
                ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                ->with('msg', $msg)
                ->with('acao', "/curso");
        }
	}

	public function salvar($id) { 

		// INSERT
        if($id == 0) {
            $objCurso = new Curso();
            $objCurso->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objCurso->abreviatura = mb_strtoupper(Request::input('abreviatura'), 'UTF-8');
            // Obtém Id Nivel
            $arr = explode(" ", Request::input('nivel'));
            $objCurso->id_nivel = $arr[0];
            // Fim
            $objCurso->tempo = Request::input('tempo');;
            $objCurso->ativo = 1;

            $objCurso->save();
        }
        // UPDATE
        else {
            $objCurso = Curso::find($id);

            // Verifica se existe um curso com o 'id' recebido por parâmetro
            if(empty($objCurso)) {
                $msg = "Curso não encontrado para o id=".$id."!";

		        return view('messagebox')->with('tipo', 'alert alert-warning')
		            ->with('titulo', 'OPERAÇÃO INVÁLIDA')
	                ->with('msg', $msg)
	                ->with('acao', "/curso");
            }

            $objCurso->nome = mb_strtoupper(Request::input('nome'), 'UTF-8');
            $objCurso->abreviatura = mb_strtoupper(Request::input('abreviatura'), 'UTF-8');
            // Obtém Id Nivel
            $arr = explode(" ", Request::input('nivel'));
            $objCurso->id_nivel = $arr[0];
            // Fim
            $objCurso->tempo = Request::input('tempo');
            // Obtém Ativo/Inativo
            $ativo = Request::input('ativo');
            if (strcmp($ativo, "ATIVO") == 0) { $objCurso->ativo = 1; }
            else { $objCurso->ativo = 0; }

            $objCurso->save();
        }

        return redirect()->action('CursoController@listar')->withInput();
	}		

	public function remover($id) { 

		if(is_numeric($id)) {
            $curso = Curso::find($id);

            if(empty($curso)) {
                $msg = "Curso não encontrado para o ID=".$id."!";
                return view('messagebox')->with('tipo', 'alert alert-warning')
                    ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                    ->with('msg', $msg)
                    ->with('acao', "/curso");
            }

            $total_turmas = Turma::where('id_curso', $id)->count();

            if($total_turmas == 0) {
                return view('cursoRemover')->with("curso", $curso);
            }
            else {

                $msg = "Existem turmas vinculadas ao curso '$curso->nome' que impedem sua exclusão!";

                return view('messagebox')->with('tipo', 'alert alert-danger')
                        ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                        ->with('msg', $msg)
                        ->with('acao', "/curso");
            }
        }

        $msg = "Parâmetro via URL Inválido!";
        return view('messagebox')->with('tipo', 'alert alert-warning')
            ->with('titulo', 'OPERAÇÃO INVÁLIDA')
            ->with('msg', $msg)
            ->with('acao', "/curso");
	}

	public function confirmar($id) { 

		$objCurso = Curso::find($id);

        if(empty($objCurso)) {
        	$msg = "Curso não encontrado para o ID=".$id."!";
            return view('messagebox')->with('tipo', 'alert alert-warning')
                ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                ->with('msg', $msg)
                ->with('acao', "/curso");
        }

        $objCurso->delete();

        return redirect()->action('CursoController@listar');
	}
}
