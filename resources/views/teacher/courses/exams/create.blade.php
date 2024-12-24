<x-app-layout>
    <x-slot name="header">
            <div class="flex justify-between align-middle">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{$course->name}}
                </h2>
            </div>
    </x-slot>

    <div class="py-12">
        @if ( session('success') )
            <div class="font-medium text-sm bg-green-50 text-green-600 dark:text-green-400 p-4">
                {{   session('success')  }}
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-form.create title="Create Exam" :route="route('teacher.courses.exams.store', $course)">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="title" :value="__('Title')"/>
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                                      autofocus autocomplete="title"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="status" :value="__('Status')"/>
                        <x-select name="status" :options="\App\Enum\ExamStatus::cases()"  />
                        <x-input-error :messages="$errors->get('status')" class="mt-2"/>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="start" :value="__('Start')"/>
                        <x-text-input id="start" class="block mt-1 w-full" type="datetime-local" name="start" :value="old('Start')"
                                      autofocus autocomplete="start"/>
                        <x-input-error :messages="$errors->get('start')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="end" :value="__('End')"/>
                        <x-text-input id="end" class="block mt-1 w-full" type="datetime-local" name="end" :value="old('End')"
                                      autofocus autocomplete="end"/>
                        <x-input-error :messages="$errors->get('end')" class="mt-2"/>
                    </div>
                </div>
                <div>
                    <x-input-label for="text" :value="__('Description')"/>
                    <x-textarea name="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>
            </x-form.create>
        </div>
    </div>
</x-app-layout>
