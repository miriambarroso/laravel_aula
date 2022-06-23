<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agência') }}
        </h2>
    </x-slot>
    <table class="table">
        <thead class="thread-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">BANCO</th>
                <th scope="col">ENDEREÇO</th>
                <th scope="col">TELEFONE 1</th>
                <th scope="col">TELEFONE 2</th>
            </tr>
        </thead>
        <tbody>
                @if($agencias)
                    @foreach($agencias as $agencia)
                    <tr>
                        <td>{{$agencia->id}}</td>
                        <td>{{$agencia->nome_agencia}}</td>
                        <td>{{$agencia->relBanco? $agencia->relBanco->nome : 'Excluído'}}</td>
                        <td>{{$agencia->endereco}}</td>
                        <td>{{$agencia->fone}}</td>
                        <td>{{$agencia->fone1}}</td>
                        <td>
                            <a href="/agencia/edit/{{$agencia->id}}" class="btn btn-link">Editar</a>
                            <a href="/agencia/destroy/{{$agencia->id}}" class="btn btn-outline-danger">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
        </tbody>
    </table>
    <hr>
    <div class="row d-flex justify-content-between align-items-center">

        <div class="flex items-center justify-between mt-4">
            <x-button style="background-color: transparent; border-width: 1px !important; border-color: rgb(31 41 55 / var(--tw-bg-opacity)) !important; color: rgb(31 41 55 / var(--tw-bg-opacity)) !important" onclick='history.go(-1)'>
                {{ __('VOLTAR') }}
            </x-button>
            <a href="/agencia/create" role="button" class="btn btn-dark">ADICIONAR AGÊNCIA</a>
        </div>
    </div>
</x-app-layout>
