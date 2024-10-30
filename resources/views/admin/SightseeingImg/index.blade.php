<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Sightseeing : :location', ['location' => $sightseeing->location]) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4 relative">
                {{ session('success') }}
                <button id="cut-button" class="absolute top-1 right-2 p-1 text-white"
                    onclick="removeMessage()">x</button>
            </div>

            <script>
                // Function to remove the success message
                function removeMessage() {
                    const message = document.getElementById('success-message');
                    if (message) {
                        message.style.display = 'none';
                    }
                }
                // Set a timer to remove the message after 5 seconds
                setTimeout(() => {
                    removeMessage();
                }, 1500);
            </script>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-lg font-bold">{{ __("Update Sightseeing") }}</h1>

                    <form action="{{ route('admin.sightseeingimg.store',['id' => $sightseeing->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <input type="hidden" id="sightseeing_id" name="sightseeing_id"
                                value="{{ old('sightseeing_id', $sightseeing->id) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-gray-300"
                                readonly>
                        </div>
                        <div class="mb-4">
                            <label for="destination"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Destination') }}</label>
                            <input type="text" id="destination" name="destination"
                                value="{{ old('destination', $sightseeing->destination) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-gray-300"
                                readonly>
                        </div>
                        <div class="mb-4">
                            <label for="location_wise"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('location_wise') }}</label>
                            <input type="text" id="location_wise" name="location_wise"
                                value="{{ old('location_wise', $sightseeing->location) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-gray-300"
                                readonly>
                        </div>

                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Choose Images') }}</label>
                            <input type="file" id="name" name="name[]" accept="image/*,video/*" multiple
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-gray-300">
                        </div>

                        <div class="flex justify-between mt-6">
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                {{ __('Upload') }}
                            </button>
                        
                            <a href="{{ Route('admin.shightseeingpoint.update', ['id' => $sightseeing->id])}}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                {{ __('Add Sightseen') }}
                            </a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-admin.app-layout>