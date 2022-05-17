@extends('layout')
@section('content')
    <div id="createBanco">
        <h1 class="text-center">CRIAR NOVO BANCO</h1>
        <hr>
        <div id="formBanco" class="">
            <form name="formCadBanco" id="formCadBanco" method="post" action="{{'banco'}}">
                @csrf
                <div>
                    <label for="nome">Nome</label><br>
                    <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do banco:"><br>
                </div>
                <div>
                    <label for="numero">Número</label><br>
                    <input class="form-control" type="text" name="numero" id="numero" placeholder="Número do banco:" data-inputmask="99 99999 9999"><br>
                </div>
                <div>
                    <label for="ispb">ISPB</label><br>
                    <input class="form-control" max="999999999" type="text" name="ispb" id="ispb" placeholder="ISPB:"><br>
                </div>

            </form>
        </div>
        <div>
            <button type="submit" class="btn btn-dark">ADICIONAR BANCO</button>
        </div>
    </div>
@endsection
