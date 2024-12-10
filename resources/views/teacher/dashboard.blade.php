<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome ') . auth()->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <h3 class="text-xl font-semibold">My courses</h3>
                </div>
                @foreach($courses as $course)
                    <a href="{{route('teacher.courses.show', $course)}}"  class="block p-3 text-gray-900 hover:text-blue-700 cursor-pointer dark:text-gray-100">
                        {{ $course->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
