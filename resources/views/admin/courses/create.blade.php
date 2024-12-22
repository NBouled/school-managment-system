<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" class="space-y-4" action="{{ route('courses.store') }}">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                   autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="name" :value="__('Description')"/>
                    <x-textarea name="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="name" :value="__('Credits')"/>
                    <x-text-input step="10" id="credits" class="block mt-1 w-full" type="number" name="credits" :value="old('credits')"
                                   autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('credits')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="teacher_id" :value="__('Teacher')"/>
                    <select name="teacher_id">
                        <option value="0">select option</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('teacher_id')" class="mt-2"/>
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
