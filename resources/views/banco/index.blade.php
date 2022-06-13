<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Banco') }}
        </h2>
    </x-slot>
    <table class="table">
        <thead class="thread-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">ISPB</th>
        </tr>
        </thead>
        <tbody>
        <script>
            @foreach($banco as $bancos)
                {{$bancos->nome}}
            @endforeach
        </script>
        <tr>
            <th scope="row"></th>
            <th scope="row"></th>
            <th scope="row"></th>
        </tr>
        </tbody>
    </table>

    <hr>
    <div class="row d-flex justify-content-between align-items-center">
        <div class="col-auto">
            <a href="/" role="button" class="btn btn-primary">HOME</a>
        </div>
        <div class="col-auto">
            <a href="/banco/create" role="button" class="btn btn-dark">ADICIONAR BANCO</a>
        </div>
    </div>
</x-app-layout>
