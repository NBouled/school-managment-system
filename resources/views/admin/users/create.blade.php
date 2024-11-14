<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf


                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                   autofocus autocomplete="email"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div>
                    <x-input-label for="date_of_birth" :value="__('Date of Birth')"/>
                    <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth"
                                  :value="old('date_of_birth')"  autofocus autocomplete="date_of_birth"/>
                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2"/>
                </div>


                <div>
                    <x-input-label for="role" :value="__('Role')"/>
                    <select name="role">
                        @foreach(\App\Enum\UserRole::cases() as $role)
                            <option value="{{$role->value}}">{{$role->value}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2"/>
                </div>


                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')"/>

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                   autocomplete="current-password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>


                <div>
                    <x-input-label for="street" :value="__('Street')"/>
                    <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')"
                                   autofocus autocomplete="street"/>
                    <x-input-error :messages="$errors->get('street')" class="mt-2"/>
                </div>

                <div>
                    <x-input-label for="house_number" :value="__('house_number')"/>
                    <x-text-input id="house_number" class="block mt-1 w-full" type="text" name="house_number"
                                  :value="old('house_number')"  autofocus autocomplete="house_number"/>
                    <x-input-error :messages="$errors->get('house_number')" class="mt-2"/>
                </div>

                <div>
                    <x-input-label for="zip_code" :value="__('zip_code')"/>
                    <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code"
                                  :value="old('zip_code')"  autofocus autocomplete="zip_code"/>
                    <x-input-error :messages="$errors->get('zip_code')" class="mt-2"/>
                </div>

                <div>
                    <x-input-label for="city" :value="__('city')"/>
                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                                   autofocus autocomplete="city"/>
                    <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                </div>

                <div>
                    <x-input-label for="country" :value="__('Country')"/>
                    <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                                  :value="old('country')"  autofocus autocomplete="country"/>
                    <x-input-error :messages="$errors->get('country')" class="mt-2"/>
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
