@extends('template.painel-admin')
@section('title', 'Editar Clientes')
@section('content')

<h6 class="mb-4"><i>EDIÇÃO DE CLIENTES</i></h6><hr>
<form method="POST" action="{{route('clientes.editar', $item)}}">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="InputnOME">Nome</label>
                    <input value="{{$item->nome}}" type="text" class="form-control" id="nome" name="nome" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="InputCNPJ">CNPJ</label>
                    <input value="{{$item->cnpj}}" type="text" class="form-control" id="cnpj" name="cnpj">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="InputRazaoSocial">Razao Social</label>
                    <input value="{{$item->razao_social}}" type="text" class="form-control" id="razao_social" name="razao_social">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="InputData">Data Inclusão</label>
                    <input value="{{$item->data_inclusao}}" type="text" class="form-control" id="data_inclusao" name="data_inclusao">
                </div>
            </div>
        </div>
        <p>
        <input value="{{$item->cnpj}}" type="hidden" name="oldcnpj">       
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>
@endsection