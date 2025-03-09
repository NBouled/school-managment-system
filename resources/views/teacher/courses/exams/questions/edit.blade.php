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
            <x-form.edit  title="Update Question" :route="route('teacher.courses.exams.questions.update', [$course, $exam, $question])">
                <div>
                    <x-input-label for="text" :value="__('Text')"/>
                    <x-text-input id="text" class="block mt-1 w-full" type="text" name="text" :value="$question->text"
                                  autofocus autocomplete="text"/>
                    <x-input-error :messages="$errors->get('text')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="text" :value="__('Image')"/>
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"
                                  autofocus autocomplete="image"/>
                    @if ($question->image)
                        <img src="{{ asset($question->image) }}" alt="Current Image" class="mt-2 w-32 h-32 object-cover">
                    @endif
                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="text" :value="__('Description')"/>
                    <x-textarea name="description" :value="$question->description"/>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>
                <hr>
                <h3 class="font-medium text-lg">{{__('options')}}</h3>
                <div class="p-5">
                    <div id="options-container">
                        @foreach($question->options as $index => $option)
                            <div class="grid-cols-3 grid gap-4 option-row">
                                <div>
                                    <x-input-label for="options[{{ $index }}][text]" :value="__('Text')"/>
                                    <x-text-input id="options[{{ $index }}][text]" class="block mt-1 w-full" type="text" name="options[{{ $index }}][text]" :value="old('options.' . $index . '.text', $option['text'])" autofocus autocomplete="text"/>
                                    <x-input-error :messages="$errors->get('options.' . $index . '.text')" class="mt-2"/>
                                </div>
                                <div>
                                    <x-input-label for="options[{{ $index }}][is_answer]" :value="__('Is answer')"/>
                                    <x-select
                                        name="options[{{ $index }}][is_answer]"
                                        :options="['true', 'false']"
                                        :value="old('options.' . $index . '.is_answer', $option['is_answer'])"
                                    />
                                    <x-input-error :messages="$errors->get('options.' . $index . '.is_answer')" class="mt-2"/>
                                </div>
                                <div class="flex-col flex items-center justify-center">
                                    <button type="button" class="delete-option-btn bg-red-300 hover:bg-red-400 px-3 py-2 rounded-full">{{__('Delete')}}</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-center items-center my-10">
                        <button type="button" onclick="addOption()" id="add-option-btn" class="bg-green-300 hover:bg-green-400 px-3 py-2 rounded-full">{{__('Add option')}}</button>
                    </div>
                </div>
            </x-form.edit>
        </div>
    </div>
    <script>
        function addOption() {
            const optionsContainer = document.getElementById('options-container');

            // Find the first option-row to clone
            const firstOptionRow = optionsContainer.querySelector('.option-row');

            // Calculate the new index
            const index = optionsContainer.getElementsByClassName('option-row').length + 1;

            // Clone the first option-row
            const clonedRow = firstOptionRow.cloneNode(true);

            // Update the name and id attributes for the cloned row with the new index
            const inputs = clonedRow.querySelectorAll('input, select');

            inputs.forEach(input => {
                // Update the name and id attributes with the new index
                const nameAttr = input.getAttribute('name');
                if (nameAttr) {
                    input.setAttribute('name', nameAttr.replace(/\[\d+\]/g, `[${index}]`));
                }

                const idAttr = input.getAttribute('id');
                if (idAttr) {
                    input.setAttribute('id', idAttr.replace(/\[\d+\]/g, `[${index}]`));
                }
            });

            // Optionally, reset the values (so that the new row starts with empty fields)
            clonedRow.querySelectorAll('input, select').forEach(element => {
                element.value = '';
            });

            // Add the new cloned row to the options container
            optionsContainer.appendChild(clonedRow);
        }

        document.getElementById('options-container').addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-option-btn')) {
                const optionRow = event.target.closest('.option-row');
                if (optionRow.parentElement.children.length > 1) {
                    optionRow.remove();
                } else {
                    alert("You cannot delete all the options.");
                }
            }
        });
    </script>
</x-app-layout>
