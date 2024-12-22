<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex justify-between align-middle">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{$course->name}}
                </h2>
            </div>
            <div>
                <a href="{{route('teacher.courses.exams.create', $course)}}">Create Exam</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        {{--Exams list--}}


        @if ( session('success') )
            <div class="font-medium text-sm bg-green-50 text-green-600 dark:text-green-400 p-4">
                {{   session('success')  }}
            </div>
        @endif
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

                <div class="py-8">
                    <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
                        <h2 class="text-2xl leading-tight">
                            Enrolled Students
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
                                        Student ID
                                    </th>
                                    <th scope="col"
                                        class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Enrolled at
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($students as $student)
                                    <tr>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$student->id}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$student->name}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$student->email}}
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$student->created_at}}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
