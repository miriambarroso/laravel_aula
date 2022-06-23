<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(isset($user)) ATUALIZAR USUÁRIO @else CRIAR NOVO USUÁRIO @endif
        </h2>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('user.store') }}">
    @csrf

        @if (\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
            <div class="mt-4">
                <x-label for="role" :value="__('Role')" />

                <select class="form-control custom-select"  name="role" id="role" required>
                    @foreach(\App\Models\User::getRoles() as $role)
                        <option value="{{$role}}" @if(isset($user) && $user->role == $role) selected @endif>{{$role}}</option><br>
                    @endforeach
                </select>
            </div>
        @endif

    <!-- Name -->
        <div class="mt-4">
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="isset($user)? $user->name : ''" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="isset($user)? $user->email : ''" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full"
                     type="password"
                     name="password"
                     required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation" class="block mt-1 w-full"
                     type="password"
                     name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-between mt-4">
            <x-button style="background-color: transparent; border-width: 1px !important; border-color: rgb(31 41 55 / var(--tw-bg-opacity)) !important; color: rgb(31 41 55 / var(--tw-bg-opacity)) !important" onclick='history.go(-1)'>
                {{ __('VOLTAR') }}
            </x-button>
            <x-button class="ml-4">
                {{ __('Cadastrar') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
