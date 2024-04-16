<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Landing Page Editor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-5 flex justify-between items-center mb-3">
                <h2 class="text-lg font-medium text-gray-900">Hero Section</h2>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('landing.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div div class="mb-3">
                            <label class="block">
                                <span
                                    class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                                    Title
                                </span>
                                <input type="text" name="title" id="titleInput"
                                    class="mt-2 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                    placeholder="Title" maxlength="45"
                                    value="{{ $landings['hero.title']->value ?? '' }}" />
                                <div class="text-sm font-thin mt-1" id="titleCount">0/45</div>
                            </label>

                        </div>
                        <div class="mb-3">
                            <label class="block">
                                <span
                                    class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                                    Subtitle
                                </span>
                                <input type="text" name="subtitle" id="subtitleInput"
                                    class="mt-2 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                    placeholder="Subtitle" maxlength="110"
                                    value="{{ $landings['hero.subtitle']->value ?? '' }}" />

                                <div class="text-sm font-thin mt-1" id="subtitleCount">0/110</div>
                            </label>
                        </div>
                        <div class="mb-3">
                            {{-- Save button --}}
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 duration-200 text-white font-bold py-2 px-5 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Handler untuk input title
            $('#titleInput').on('input', function() {
                countCharacters('#titleInput', '#titleCount', 45);
            });

            // Handler untuk input subtitle
            $('#subtitleInput').on('input', function() {
                countCharacters('#subtitleInput', '#subtitleCount', 110);
            });

            // Hitung karakter saat dokumen selesai dimuat
            countCharacters('#titleInput', '#titleCount', 45);
            countCharacters('#subtitleInput', '#subtitleCount', 110);
        });

        function countCharacters(inputId, countId, maxLength) {
            var textLength = $(inputId).val().length;
            $(countId).text(textLength + '/' + maxLength);

            if (textLength == maxLength) {
                $(countId).addClass('text-red-500');
                $(countId).text(textLength + '/' + maxLength + ' (batas maksimal ' + maxLength + ' karakter)');
            } else {
                $(countId).removeClass('text-red-500');
            }
        }
    </script>

</x-app-layout>
