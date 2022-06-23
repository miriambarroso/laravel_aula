<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuário') }}
        </h2>
    </x-slot>
    <table class="table">
        <thead class="thread-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ROLE</th>
            </tr>
        </thead>
        <tbody>
                @if($users)
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>
                            <a href="/user/edit/{{$user->id}}" class="btn btn-link">Editar</a>
                            <a href="/user/destroy/{{$user->id}}" class="btn btn-outline-danger">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
        </tbody>
    </table>
    <hr>
    <div class="row d-flex justify-content-between ">
        <div class="flex items-center justify-between mt-4">
            <x-button style="background-color: transparent; border-width: 1px !important; border-color: rgb(31 41 55 / var(--tw-bg-opacity)) !important; color: rgb(31 41 55 / var(--tw-bg-opacity)) !important" onclick='history.go(-1)'>
                {{ __('VOLTAR') }}
            </x-button>
            <a href="/user/create" role="button" class="btn btn-dark">ADICIONAR USUÁRIO</a>
        </div>
    </div>
</x-app-layout>
