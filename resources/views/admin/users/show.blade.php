<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-3 shadow">
                <div class="text-xl border-b-gray-200 border-b">
                    User Details
                </div>
                <div class="p-4">
                    <span class="block">{{$user->name}}</span>
                    <span class="block">{{$user->email}}</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
