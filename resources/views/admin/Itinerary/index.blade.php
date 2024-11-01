<x-admin.app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add Itinerary') }}
            </h2>
            <a href="{{ route('admin.itinerary.list') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                {{ __('View Itineraries') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto p-4">
                        @if (session('success'))
                        <div id="session-message" class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="px-6 py-4 border-b">
                            <h3 class="text-lg font-semibold"> {{ __('Add Package') }}</h3>
                        </div>
                        <form action="{{ route('admin.itinerary.store') }}" method="POST" enctype="multipart/form-data"
                            class="p-6">
                            @csrf

                            <div class="mb-4">
                                <x-input-label for="package_name" class="block text-sm font-medium text-gray-700">
                                    {{ __('Package Name') }}</x-input-label>
                                <x-text-input type="text" id="package_name" name="package_name"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="day" class="block text-sm font-medium text-gray-700">
                                    {{ __('No of Days') }}</x-input-label>
                                <x-text-input type="number" id="day" name="day"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="night" class="block text-sm font-medium text-gray-700">
                                    {{ __('No of Nights') }} </x-input-label>
                                <x-text-input type="number" id="night" name="night"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="package_img" class="block text-sm font-medium text-gray-700">
                                    {{ __('Package Image') }}</x-input-label>
                                <x-text-input type="file" id="package_img" name="package_img" accept="image/*"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                                    onchange="previewImage(event)" />
                                <img width="100" height="80" class="mt-3 hidden" id="disp_package_img"
                                    alt="Preview Image">
                            </div>

                            <div class="mb-4">
                                <x-input-label for="package_status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Package Status') }}
                                </x-input-label>
                                <select id="package_status" name="package_status"
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring focus:ring-blue-200 dark:focus:ring-blue-500">
                                    <option value="Upcoming">{{ __('Upcoming') }}</option>
                                    <option value="Active">{{ __('Active') }}</option>
                                    <option value="Inactive">{{ __('Inactive') }}</option>
                                </select>
                            </div>

                            <div class="flex items-center justify-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">{{ __('Add Package') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const image = event.target.files[0];
            const imgPreview = document.getElementById('disp_package_img');
            const reader = new FileReader();
            reader.onload = function() {
                imgPreview.src = reader.result;
                imgPreview.classList.remove('hidden'); // Show the image
            }
            if (image) {
                reader.readAsDataURL(image);
            }
        }
    </script>
</x-admin.app-layout>