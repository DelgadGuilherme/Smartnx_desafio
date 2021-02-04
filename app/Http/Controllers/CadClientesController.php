<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\usuario;
use Illuminate\Http\Request;

class CadClientesController extends Controller
{
    public function index(){
        $tabela = cliente::orderby('id', 'desc')->paginate();
        return view('painel-admin.clientes.index', ['itens' => $tabela]); 
    }

    public function create(){
        return view('painel-admin.clientes.create');
    }

    public function insert(Request $request){
        $tabela = new cliente();
        $tabela->nome = $request->nome;
        $tabela->cnpj = $request->cnpj;
        $tabela->razao_social = $request->razao_social;
        $tabela->data_inclusao = $request->data_inclusao;

        $itens = cliente::where('cnpj', '=', $request->cnpj)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Cliente já cadastrado!') </script>";
            return view('painel-admin.clientes.create');
        }

        $tabela->save();
        return redirect()->route('clientes.index');
    }

    public function edit(cliente $item){
        return view('painel-admin.clientes.edit',['item' => $item]);
    }
    
    public function editar(Request $request, cliente $item){
        $item->nome = $request->nome;
        $item->cnpj = $request->cnpj;
        $item->razao_social = $request->razao_social;
        $item->data_inclusao = $request->data_inclusao;

        $oldcnpj = $request->oldcnpj;

        if($oldcnpj != $request->cnpj){
            $itens = cliente::where('cnpj', '=', $request->cnpj)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('CNPJ já cadastrado!') </script>";
                return view('painel-admin.clientes.edit', ['item' => $item]);
            }
        }
        
        $item->save();
        return redirect()->route('clientes.index');
    }

    public function delete(cliente $item){
        $item->delete();
        return redirect()->route('clientes.index');
    }

    public function modal($id){
        $item = cliente::orderby('id', 'desc')->paginate();
        return view('painel-admin.clientes.index', ['itens' => $item, 'id' => $id]);
    }


}
