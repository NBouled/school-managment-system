<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User Index') }}
            </h2>
            <div>
                <a
                    href="{{route('users.create')}}"
                    class="float-right flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                    Create
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ( session('success') )
                <div class="font-medium text-sm bg-green-50 text-green-600 dark:text-green-400 p-4">
                    {{   session('success')  }}
                </div>
            @endif
            <div class="py-8">
                <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
                    <h2 class="text-2xl leading-tight">
                        Users
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
                                    User Name
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Role
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Date of Birth
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Created at
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <a href="#" class="relative block">
                                                    <img alt="profil" src="#"
                                                         class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                                </a>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$user->name}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$user->role}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$user->date_of_birth}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$user->created_at}}
                                        </p>
                                    </td>

                                    {{--                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">--}}
                                    {{--                                    <span--}}
                                    {{--                                        class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">--}}
                                    {{--                                        <span aria-hidden="true"--}}
                                    {{--                                              class="absolute inset-0 bg-green-200 rounded-full opacity-50">--}}
                                    {{--                                        </span>--}}
                                    {{--                                        <span class="relative">--}}
                                    {{--                                               {{$user->date_of_birth}}--}}
                                    {{--                                        </span>--}}
                                    {{--                                    </span>--}}
                                    {{--                                </td>--}}
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
