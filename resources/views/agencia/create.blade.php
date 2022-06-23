<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(isset($agencia)) ATUALIZAR AGÊNCIA @else CRIAR NOVO AGÊNCIA @endif
        </h2>
    </x-slot>
    <div id="createAgencia" class="d-flex flex-column flex-nowrap justify-content-center">
        <div class="row justify-content-center my-4">
            @if(isset($agencia))
                <form name="formEditAgencia" id="formEditAgencia" method="post" action="{{"/agencia/$agencia->id"}}" class="col-6">
                    @method('PUT')
            @else
                <form name="formCadAgencia" id="formCadAgencia" method="post" action="{{'store'}}" class="col-6">
                     @endif
                    @csrf
                    <div id="formAgencia" class="justify-content-center form-group">
                        <div class="form-group required col-12">
                            <label class="control-label" for="nome_agencia">Nome da Agência</label><br>
                            <input class="form-control" type="text" name="nome_agencia" id="nome_agencia" placeholder="Agência"  value="{{$agencia->nome_agencia ?? ''}}" required><br>
                        </div>
                        <div class="form-group required col-12">
                            <label class="control-label" for="agencia">Código</label><br>
                            <input class="form-control" type="text" name="agencia" id="agencia" placeholder="Código da Agência"  value="{{$agencia->agencia ?? ''}}" required><br>
                        </div>
                        <div class="form-group required col-12">
                            <label class="control-label" for="banco_id">Banco</label><br>
                            <select class="form-control custom-select"  name="banco_id" id="banco_id" required>
                                @foreach(\App\Models\Banco::all() as $banco)
                                    <option value="{{$banco->id}}" @if(isset($agencia) && $banco->id == $agencia->banco_id) selected @endif>{{$banco->nome}}</option><br>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group required col-7">
                                <label class="control-label" for="fone">Telefone</label><br>
                                <input class="form-control" type="fone" name="fone" id="fone" placeholder="Telefone da agencia"  data-inputmask="99999999999" value="{{$agencia->fone ?? ''}}"  required><br>
                            </div>
                            <div class="form-group required col-5">
                                <label class="control-label" for="tipo">Tipo</label><br>
                                <select class="form-control custom-select"  name="tipo" id="tipo" required>
                                        @foreach(\App\Models\Agencia::type() as $id=>$typeName)
                                        <option value="{{$id}}" @if(isset($agencia) && $id == $agencia->tipo) selected @endif>{{$typeName}}</option><br>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group required col-7">
                                <label class="control-label" for="fone1">Telefone 2</label><br>
                                <input class="form-control" type="text" name="fone1" id="fone1" placeholder="Telefone 2 da agencia"  data-inputmask="99999999999" value="{{$agencia->fone1 ?? ''}}"  required><br>
                            </div>
                            <div class="form-group required col-5">
                                <label class="control-label" for="tipo1">Tipo 2</label><br>
                                <select class="form-control custom-select"  name="tipo1" id="tipo1" required>
                                @foreach(\App\Models\Agencia::type() as $id=>$typeName)
                                        <option value="{{$id}}" @if(isset($agencia) && $id == $agencia->tipo) selected @endif>{{$typeName}}</option><br>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group required col-12">
                            <label class="control-label" for="endereco">Endereço</label><br>
                            <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço da Agência"  value="{{$agencia->endereco ?? ''}}" required><br>
                        </div>
                    </div>
                    @if(isset($errors) && count($errors)>0)
                        <div class="text-center mt-4 mb-4 p-2 alert-danger">
                            @foreach($errors->all() as $erro)
                                {{$erro}}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex items-center justify-between mt-4">
                        <x-button style="background-color: transparent; border-width: 1px !important; border-color: rgb(31 41 55 / var(--tw-bg-opacity)) !important; color: rgb(31 41 55 / var(--tw-bg-opacity)) !important" onclick='history.go(-1)'>
                            {{ __('VOLTAR') }}
                        </x-button>
                        <button type="submit" class="btn btn-success">@if(isset($agencia)) ATUALIZAR AGÊNCIA @else ADICIONAR AGÊNCIA @endif</button>
                    </div>
                </form>
        </div>
    </div>
</x-app-layout>

