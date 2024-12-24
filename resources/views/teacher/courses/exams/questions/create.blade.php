<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{$course->name}} - {{$exam->title}}
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
            <x-form.create title="Create Question" :route="route('teacher.courses.exams.questions.store', [$course, $exam])">
                <div>
                    <x-input-label for="text" :value="__('Text')"/>
                    <x-text-input id="text" class="block mt-1 w-full" type="text" name="text" :value="old('text')"
                                  autofocus autocomplete="text"/>
                    <x-input-error :messages="$errors->get('text')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="text" :value="__('Image')"/>
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"
                                  autofocus autocomplete="image"/>
                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="text" :value="__('Description')"/>
                    <x-textarea name="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>
                <hr>
                <h3 class="font-medium text-lg">{{__('options')}}</h3>
                <div class="p-5">
                    <div id="options-container">
                        <div class="grid-cols-3 grid gap-4 option-row">
                            <div>
                                <x-input-label for="options[s1][text]" :value="__('Text')"/>
                                <x-text-input id="options[1][text]" class="block mt-1 w-full" type="text" name="options[1][text]" :value="old('options[1][text]')"
                                              autofocus autocomplete="text"/>
                                <x-input-error :messages="$errors->get('options.1.text.')" class="mt-2"/>
                            </div>
                            <div>
                                <x-input-label for="options[1][is_answer]" :value="__('Is answer')"/>
                                <x-select name="options[1][is_answer]" :options="['true', 'false']"  />
                                <x-input-error :messages="$errors->get('options.1.is_answer')" class="mt-2"/>
                            </div>
                            <div class="flex-col flex items-center justify-center">
                                <button type="button" id="delete-option-btn" class="delete-option-btn bg-red-300 hover:bg-red-400 px-3 py-2 rounded-full" >{{__('Delete')}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center items-center my-10">
                        <button type="button" onclick="addOption()" id="add-option-btn" class="bg-green-300 hover:bg-green-400 px-3 py-2 rounded-full">{{__('Add option')}}</button>
                    </div>
                </div>
            </x-form.create>
        </div>
    </div>
    <script>
        function addOption(){
            const optionsContainer = document.getElementById('options-container');
            const optionsRow = optionsContainer.querySelector('.option-row')

            const index = optionsContainer.getElementsByClassName('option-row').length + 1;

            const cloned = optionsRow.cloneNode(true);

            let newRow = document.createElement('div')

            newRow.innerHTML = cloned.innerHTML.replace(/\[1\]/g, `[${index}]`)

            newRow.classList.add('option-row','grid-cols-3', 'grid', 'gap-4', 'my-4');

            optionsContainer.appendChild(newRow);
        }

        function deleteOption(event) {
            // Check if the clicked item is delete button
            if (event.target && event.target.classList.contains('delete-option-btn')) {
                const optionRow = event.target.closest('.option-row'); // get the closest parent with 'option-row' class

                // Check if this is the only option left, if so, don't delete
                if (optionRow.parentElement.children.length > 1) {
                    optionRow.remove();
                } else {
                    alert("You cannot delete all the options.");
                }
            }
        }

        // Attach the event listener for the delete option
        document.getElementById('options-container').addEventListener('click', deleteOption);
    </script>
</x-app-layout>
