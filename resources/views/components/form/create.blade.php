@props(['route' => '', 'title' => ''])

<form method="POST" class="space-y-5 bg-white p-3 mb-4 rounded-2xl" action="{{$route}}" >
    @csrf
    <h2 class="text-xl font-semibold flex gap-2 items-center"><x-heroicon-s-plus-circle class="h-7 w-7 text-blue-600 " /> {{$title}}</h2>
        {{$slot}}
    <div class="flex items-center justify-end">
        <x-primary-button class="ms-3">
            {{ __('Create') }}
        </x-primary-button>
    </div>
</form>
