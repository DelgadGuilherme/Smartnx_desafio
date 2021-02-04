<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request){

        $cpf = $request->cpf;
        $senha = $request->senha;
        
        $usuarios = usuario::where('cpf', '=', $cpf)->where('senha', '=', $senha)->first();
        
        if(@$usuarios->id != null){
            @session_start(); #recupera da tabalas os dados
            $_SESSION['id_usuario'] = $usuarios->id;
            $_SESSION['cpf_usuario'] = $usuarios->cpf;
            $_SESSION['nome_usuario'] = $usuarios->nome;
            $_SESSION['nivel_usuario'] = $usuarios->nivel;

            if($_SESSION['nivel_usuario'] == 'admin'){
                return view('painel-admin.index');
            }
    	    

        }else{
            echo "<script language='javascript'> window.alert('Dados Incorretos!') </script>";
            return view('index');
        }
        
       
    }


    public function logout(){
       @session_start();
       @session_destroy();
       return view('index');
    }

}


