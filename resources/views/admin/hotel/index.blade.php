<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hotel Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <h1 class="text-2xl font-bold mb-4">{{__('Add Hotel') }}</h1>
                        <form action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <x-input-label for="destination"
                                    class="block text-sm font-medium mb-1">{{__('Destination') }}</x-input-label>
                                <x-text-input type="text"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                    id="destination" name="destination" value="{{ $hotelCategory->destination }}"
                                    readonly />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="location_wise" class="block text-sm font-medium mb-1">{{__('Hotel Location') }}</x-input-label>
                                <x-text-input type="text"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                    id="location_wise" name="location_wise" value="{{ $hotelCategory->location_wise }}"
                                    readonly />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="category_wise" class="block text-sm font-medium mb-1">{{__('Hotel
                                    Type') }}</x-input-label>
                                <x-text-input type="text"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                    id="category_wise" name="category_wise" value="{{ $hotelCategory->category_wise }}"
                                    readonly />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="name" class="block text-sm font-medium mb-1">{{__('Hotel
                                    Name') }}</x-input-label>
                                <x-text-input type="text"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                    id="name" name="name"/>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="no_of_room" class="block text-sm font-medium mb-1">{{__('Number Of Rooms
                                    Available') }}</x-input-label>
                                <x-text-input type="text"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                    id="no_of_room" name="no_of_room"/>
                            </div>

                            <div class="flex space-x-4 mb-4">
                                @foreach (['img1', 'img2', 'img3'] as $img)
                                    <div class="flex-1">
                                        <x-input-label for="{{ $img }}"
                                            class="block text-sm font-medium mb-1">{{__('Hotel Image') }}
                                            {{ $loop->index + 1 }}</x-input-label>
                                        <input type="file"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                            id="{{ $img }}" name="{{ $img }}">
                                        <img width="100" height="80" class="mt-3" id="disp_{{ $img }}">
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Submit
                            </button>
                        </form>
                    </div>

                    <script>
                        function previewImage(input, imgId) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(event) {
                                    document.getElementById(imgId).src = event.target.result;
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }

                        @foreach (['img1', 'img2', 'img3'] as $img)
                            document.getElementById('{{ $img }}').addEventListener('change', function() {
                                previewImage(this, 'disp_{{ $img }}');
                            });
                        @endforeach
                    </script>

                    
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
