@extends('layout')
@section('content')
    <div id="createAgencia" class="d-flex flex-column flex-nowrap justify-content-center mt-2">
        <h1 class="text-center">@if(isset($agencia)) ATUALIZAR AGÊNCIA @else CRIAR NOVO AGÊNCIA @endif</h1>
        <hr>
        <div class="row justify-content-center">
            @if(isset($agencia))
                <form name="formEditAgencia" id="formEditAgencia" method="post" action="{{"agencia/$agencia->id"}}" class="col-6">
                    @method('PUT')
            @else
                <form name="formCadAgencia" id="formCadAgencia" method="post" action="{{'store'}}" class="col-6">
                     @endif
                    @csrf
                    <div id="formAgencia" class="justify-content-center form-group">
                        <div class="form-group required col-12">
                            <label class="control-label" for="agencia">Nome</label><br>
                            <input class="form-control" type="text" name="agencia" id="agencia" placeholder="Agência"  value="{{$agencia->agencia ?? ''}}" required><br>
                        </div>
                        <div class="form-group required col-12">
                            <label class="control-label" for="numero">Número</label><br>
                            <input class="form-control" type="text" name="numero" id="numero" placeholder="Número do agencia" data-inputmask="99 99999 9999" value="{{$agencia->numero ?? ''}}"  required><br>
                        </div>
                        <div class="form-group required col-12">
                            <label class="control-label" for="ispb">ISPB</label><br>
                            <input class="form-control" max="999999999" type="text" name="ispb" id="ispb" placeholder="ISPB"  value="{{$agencia->ispb ?? ''}}" required><br>
                        </div>
                    </div>
                    @if(isset($errors) && count($errors)>0)
                        <div class="text-center mt-4 mb-4 p-2 alert-danger">
                            @foreach($errors->all() as $erro)
                                {{$erro}}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark">@if(isset($agencia)) ATUALIZAR AGÊNCIA @else ADICIONAR AGÊNCIA @endif</button>
                    </div>
                </form>
        </div>
    </div>
@endsection
