<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Banco') }}
        </h2>
    </x-slot>
    <table class="table mt-4">
        <thead class="thread-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">ISPB</th>
        </tr>
        </thead>
        <tbody>

        @if($bancos)
            @foreach($bancos as $banco)
            <tr>
                <td>{{$banco->id}}</td>
                <td>{{$banco->nome}}</td>
                <td>{{$banco->ispb}}</td>
                <td>
                    <a href="/banco/edit/{{$banco->id}}" class="btn btn-link">Editar</a>
                    <a href="/banco/destroy/{{$banco->id}}" class="btn btn-outline-danger">Excluir</a>
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
            <a href="/banco/create" role="button" class="btn btn-dark">ADICIONAR BANCO</a>
        </div>
    </div>
</x-app-layout>
