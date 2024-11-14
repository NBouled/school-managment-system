<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-3 shadow mb-10">
                <div class="text-xl border-b-gray-200 border-b">
                    Course Details
                </div>
                <div class="p-4 grid grid-cols-4">
                    <div>
                        <span class="block font-bold">Name</span>
                        <span class="block">{{$course->name}}</span>
                    </div>
                    <div>
                        <span class="block font-bold">Description</span>
                        <span class="block">{{$course->description}}</span>
                    </div>
                    <div>
                        <span class="block font-bold">Credits</span>
                        <span class="block">{{$course->credits}}</span>
                    </div>
                    <div>
                        <span class="block font-bold">Teacher</span>
                        <span class="block">{{$course->teacher->name}}</span>
                        <span class="block">{{$course->teacher->email}}</span>
                    </div>
                </div>
            </div>


            <h1>Table students</h1>
        </div>
    </div>
</x-app-layout>
