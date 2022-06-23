<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(isset($user)){{ $user->name}} @endif
        </h2>
    </x-slot>
        <div class="card mt-4">
            <div class="card-body px-5">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf

                    <input type="hidden" name="id" value="{{$user->id}}"/>

                <!-- Name -->
                    <div>
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                    </div>


                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Current Password')" />

                        <x-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('New Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                 type="password"
                                 name="password_confirmation" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <x-button style="background-color: transparent; border-width: 1px !important; border-color: rgb(31 41 55 / var(--tw-bg-opacity)) !important; color: rgb(31 41 55 / var(--tw-bg-opacity)) !important" onclick='history.go(-1)'>
                            {{ __('VOLTAR') }}
                        </x-button>
                        <x-button>
                            {{ __('ATUALIZAR') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
