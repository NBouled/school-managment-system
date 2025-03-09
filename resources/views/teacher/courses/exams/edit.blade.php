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
                        <x-input-error :messages="$errors->get('status')" class="mt-2"/>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="start" :value="__('Start')"/>
                        <x-text-input id="start" class="block mt-1 w-full" type="datetime-local" name="start" :value="$exam->start"
                                      autofocus autocomplete="start"/>
                        <x-input-error :messages="$errors->get('start')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="end" :value="__('End')"/>
                        <x-text-input id="end" class="block mt-1 w-full" type="datetime-local" name="end" :value="$exam->end"
                                      autofocus autocomplete="end"/>
                        <x-input-error :messages="$errors->get('end')" class="mt-2"/>
                    </div>
                </div>
                <div>
                    <x-input-label for="text" :value="__('Description')"/>
                    <x-textarea name="description" :value="$exam->description"/>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>
            </x-form.edit>

            <hr>
            <div class="py-8">
                <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
                    <h2 class="text-2xl leading-tight">
                        {{__('Questions')}}
                    </h2>
                    <div class="text-end">
                        <form
                            class="flex flex-col justify-center w-3/4 max-w-sm space-y-3 md:flex-row md:w-full md:space-x-3 md:space-y-0">
                            <div class=" relative ">
                                <input type="text" id="&quot;form-subscribe-Filter"
                                       class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                       placeholder="name"/>
                            </div>
                            <button
                                class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                type="submit">
                                Filter
                            </button>
                            <x-nav-button name="Create Question" :route="route('teacher.courses.exams.questions.create', [$course, $exam])" />
                        </form>
                    </div>
                </div>
                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                        <table class="min-w-full leading-normal">
                            <thead>
                            <tr>
                                <th scope="col"
                                    class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    {{__('Id')}}
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    {{__('Text')}}
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    {{__('Actions')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$question->id}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$question->text}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 flex gap-2 items-center">

{{--                                        <a href="{{route('teacher.courses.exams.show', [$course,$exam])}}"--}}
{{--                                           class="text-gray-600 hover:text-gray-900">--}}
{{--                                            View--}}
{{--                                        </a>--}}
                                        <a href="{{route('teacher.courses.exams.questions.edit', [$course,$exam, $question])}}"
                                           class="text-indigo-600 hover:text-indigo-900">
                                            Edit
                                        </a>

{{--                                        <form method="POST" action="{{ route('teacher.courses.exams.destroy', [$course,$exam]) }}"--}}
{{--                                              id="deleteForm">--}}
{{--                                            @method('DELETE')--}}
{{--                                            @csrf--}}
{{--                                            <button type="submit" class="text-red-600 hover:text-red-900"--}}
{{--                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this?')) this.form.submit();">--}}
{{--                                                Delete--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
