@extends('layout')
@section('content')
    <div id="createBanco">
        <h1 class="text-center">@if(isset($banco)) ATUALIZAR BANCO @else CRIAR NOVO BANCO @endif</h1>
        <hr>
        <div id="formBanco" class="">
            @if(isset($banco))
                <form name="formCadBanco" id="formEditBanco" method="post" action="{{"banco/$banco->id"}}">
                    @method('PUT')
                @else
                <form name="formCadBanco" id="formCadBanco" method="post" action="{{'banco'}}">
            @endif
                    @csrf
                    <div>
                        <label for="nome">Nome</label><br>
                        <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do banco:" required value="{{$banco->nome ?? ''}}"><br>
                    </div>
                    <div>
                        <label for="numero">Número</label><br>
                        <input class="form-control" type="text" name="numero" id="numero" placeholder="Número do banco:" data-inputmask="99 99999 9999" required value="{{$banco->numero ?? ''}}"><br>
                    </div>
                    <div>
                        <label for="ispb">ISPB</label><br>
                        <input class="form-control" max="999999999" type="text" name="ispb" id="ispb" placeholder="ISPB:" required value="{{$banco->ispb ?? ''}}"><br>
                    </div>

                </form>
        </div>
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif
        <div>
            <button type="submit" class="btn btn-dark">@if(isset($banco)) ATUALIZAR BANCO @else ADICIONAR BANCO @endif</button>
        </div>
    </div>
@endsection
