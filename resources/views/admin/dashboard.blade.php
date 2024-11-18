<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome') }} {{auth()->user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid-cols-1 p-2 sm:grid-cols-3 grid gap-4">
                    @foreach($data as $key => $value)
                        <div class="flex align-middle gap-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg p-6 text-gray-900 dark:text-gray-100">
                            @if($key === "Courses")
                                <x-heroicon-m-computer-desktop class="w-6 h-6"  />
                            @elseif($key === 'Teachers')
                                <x-heroicon-s-user class="w-6 h-6"  />
                            @elseif($key === 'Students')
                                <x-heroicon-c-academic-cap class="w-6 h-6"  />
                            @endif
                            {{ $key }}
                            {{$value}}
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
</x-app-layout>
