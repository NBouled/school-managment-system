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
            <x-form.edit title="Edit Exam" :route="route('teacher.courses.exams.update', [$course, $exam])">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="title" :value="__('Title')"/>
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$exam->title"
                                      autofocus autocomplete="title"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="status" :value="__('Status')"/>
                        <x-select name="status" :value="$exam->status" :options="\App\Enum\ExamStatus::cases()"  />

                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="start" :value="__('Start')"/>
                        <x-text-input id="start" class="block mt-1 w-full" type="datetime-local" name="start" :value="$exam->start"
                                      autofocus autocomplete="start"/>
                    </div>
                    <div>
                        <x-input-label for="end" :value="__('End')"/>
                        <x-text-input id="end" class="block mt-1 w-full" type="datetime-local" name="end" :value="$exam->end"
                                      autofocus autocomplete="end"/>
                    </div>
                </div>
                <div>
                    <x-input-label for="text" :value="__('Description')"/>
                    <x-textarea name="description" :value="$exam->description"/>
                </div>
            </x-form.edit>
        </div>
    </div>
</x-app-layout>
