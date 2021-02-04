@extends('template.painel-admin')
@section('title', 'Clientes')
@section('content')
<?php 
$today = date("d.m.y");  
?>
<h6 class="mb-4"><i>CADASTRO DE CLIENTES</i></h6><hr>
<form method="POST" action="{{route('clientes.insert')}}">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Razao Social</label>
                    <input type="text" class="form-control" id="razao_social" name="razao_social">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Data Inclusão</label>
                    <input value="{{$today}}"type="text" class="form-control" id="data_inclusao" name="data_inclusao">
                </div>
            </div>
        </div>
        <p>
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>
@endsection