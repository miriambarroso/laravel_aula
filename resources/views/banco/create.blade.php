<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(isset($banco)) ATUALIZAR BANCO @else CRIAR NOVO BANCO @endif
        </h2>
    </x-slot>
    <div id="createBanco" class="d-flex flex-column flex-nowrap justify-content-center mt-2">
        <div class="row justify-content-center">
            @if(isset($banco))
                <form name="formEditBanco" id="formEditBanco" method="post" action="/banco/update/{{$banco->id}}" class="col-6">
                    @method('PUT')
            @else
                <form name="formCadBanco" id="formCadBanco" method="post" action="store" class="col-6">
            @endif
                    @csrf
                    <div id="formBanco" class="justify-content-center form-group">
                        <div class="form-group required col-12">
                            <label class="control-label" for="nome">Nome</label><br>
                            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do banco"  value="{{$banco->nome ?? ''}}" required><br>
                        </div>
                        <div class="form-group required col-12">
                            <label class="control-label" for="numero">Número</label><br>
                            <input class="form-control" type="text" name="numero" id="numero" placeholder="Número do banco" data-inputmask="99 99999 9999" value="{{$banco->numero ?? ''}}"  required><br>
                        </div>
                        <div class="form-group required col-12">
                            <label class="control-label" for="ispb">ISPB</label><br>
                            <input class="form-control" max="999999999" type="text" name="ispb" id="ispb" placeholder="ISPB"  value="{{$banco->ispb ?? ''}}" required><br>
                        </div>
                    </div>
                    @if(isset($errors) && count($errors)>0)
                        <div class="text-center mt-4 mb-4 p-2 alert-danger">
                            @foreach($errors->all() as $erro)
                                {{$erro}}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex items-center justify-center mt-4">
                        <x-button class="btn btn-close-white ml-4" stile="color:white;" onclick='history.go(-1)'>
                            {{ __('VOLTAR') }}
                        </x-button>

                        <x-button class="ml-4">
                            @if(isset($banco)) ATUALIZAR BANCO @else ADICIONAR BANCO @endif
                        </x-button>
                    </div>
                </form>
        </div>
    </div>
</x-app-layout>

