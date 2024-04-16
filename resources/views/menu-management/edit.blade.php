<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Errors all --}}
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('menus.update', ['menu' => $menu->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="block">
                                <span
                                    class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                                    Name
                                </span>
                                <input type="text" name="name"
                                    class="mt-2 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                    placeholder="Menu name" value="{{ $menu->name }}" />
                            </label>
                        </div>
                        <div class="mb-3">
                            <label class="block">
                                <span>
                                    URL
                                </span>
                                <input type="text" name="url"
                                    class="mt-2 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                    placeholder="Menu url" value="{{ $menu->url }}" />
                        </div>
                        <div class="mb-3">
                            <label class="block">
                                <span>
                                    Position
                                </span>
                                <input type="number" name="position"
                                    class="mt-2 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                    placeholder="Menu position" value="{{ $menu->position }}" />
                        </div>
                        <div class="mt-5">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 duration-200 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
