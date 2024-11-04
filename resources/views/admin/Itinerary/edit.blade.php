<x-admin.app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Update packages') }}
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
                            <h3 class="text-lg font-semibold">{{ __('Update Package') }}</h3>
                        </div>
                        <form action="{{ route('admin.itinerary.update', $packages->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $packages->id }}">

                            <div class="mb-4">
                                <x-input-label for="package_name" class="block text-sm font-medium text-gray-700">
                                    {{ __('Package Name') }}
                                </x-input-label>
                                <x-text-input type="text" id="package_name" name="package_name"
                                    value="{{ old('package_name', $packages->package_name) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="day" class="block text-sm font-medium text-gray-700">
                                    {{ __('No of Days') }}
                                </x-input-label>
                                <x-text-input type="number" id="day" name="day"
                                    value="{{ old('day', $packages->day) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="night" class="block text-sm font-medium text-gray-700">
                                    {{ __('No of Nights') }}
                                </x-input-label>
                                <x-text-input type="number" id="night" name="night"
                                    value="{{ old('night', $packages->night) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="package_img" class="block text-sm font-medium text-gray-700">
                                    {{ __('Package Image') }}
                                </x-input-label>
                                <x-text-input type="file" id="package_img" name="package_img" accept="image/*"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                                    onchange="previewImage(event)" />
                                <img width="100" height="80" class="mt-3 hidden" id="disp_package_img" alt="Preview Image">
                                @if ($packages->package_img)
                                    <img src="{{ asset('package_image/' . $packages->package_img) }}" class="mt-3" id="current_image" alt="Current Image" width="100" height="80">
                                @endif
                            </div>

                            <div class="mb-4">
                                <x-input-label for="package_status" class="block text-sm font-medium text-gray-700">
                                    {{ __('Package Status') }}
                                </x-input-label>
                                <select id="package_status" name="package_status"
                                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring focus:ring-blue-200 dark:focus:ring-blue-500">
                                    <option value="Upcoming" {{ $packages->package_status == 'Upcoming' ? 'selected' : '' }}>
                                        {{ __('Upcoming') }}
                                    </option>
                                    <option value="Active" {{ $packages->package_status == 'Active' ? 'selected' : '' }}>
                                        {{ __('Active') }}
                                    </option>
                                    <option value="Inactive" {{ $packages->package_status == 'Inactive' ? 'selected' : '' }}>
                                        {{ __('Inactive') }}
                                    </option>
                                </select>
                            </div>

                            <div class="flex items-center justify-end mb-4">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    {{ __('Update Package') }}
                                </button>
                            </div>
                        </form>

                        <div class="mt-4 mb-3">
                            <x-input-label class="block text-sm font-medium text-gray-700">Website Details</x-input-label>
                            <hr class="my-2">
                            <div class="flex flex-wrap">
                                @foreach (['slide2.php?id=2' => 'Slide 2 <br>About Us', 
                                            'slide6.php?id=2' => 'Slide 6 <br>Payment Policy', 
                                            'slide9.php?id=2' => 'Slide 9 <br>Connect With Us', 
                                            'slide10.php?id=2' => 'Slide 10 <br>Review & Award', 
                                            'slide11.php?id=2' => 'Slide 11 <br>Why Carnival'] as $link => $title)
                                    <a href="{{ $link }}" class="bg-blue-500 text-white rounded-md px-4 py-2 m-2 hover:bg-blue-600">
                                        {!! $title !!}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-4 mb-3">
                            <x-input-label class="block text-sm font-medium text-gray-700">Slide (Set Pre-Loaded Package)</x-input-label>
                            <hr class="my-2">
                            <div class="flex flex-wrap">
                                @foreach (['slide1.php?id=2' => 'Slide 1 <br>Slider',
                                            'package_inclusion.php?id=2' => 'Slide 3 <br>Package Inclusion', 
                                            'package_exclusion.php?id=2' => 'Slide 3 <br>Package Exclusion', 
                                            'slide4.php?id=2' => 'Slide 4 <br>Activity Details', 
                                            'slide5.php?id=2' => 'Slide 5 <br>Special Experiences', 
                                            'slide7.php?id=2' => 'Slide 7 <br>Best Scenic Places', 
                                            'slide8.php?id=2' => 'Slide 8 <br>Adventure Activities'] as $link => $title)
                                    <a href="{{ $link }}" class="bg-blue-500 text-white rounded-md px-4 py-2 m-2 hover:bg-blue-600">
                                        {!! $title !!}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-4 mb-5">
                            <x-input-label class="block text-sm font-medium text-gray-700">Day Wise Itinerary</x-input-label>
                            <hr class="my-2">
                            <div class="flex flex-wrap">
                                @for ($day = 1; $day <= 4; $day++)
                                    <a href="day.php?id=2&day={{ $day }}" class="bg-blue-500 text-white rounded-md px-4 py-2 m-2 hover:bg-blue-600">Day {{ $day }}</a>
                                @endfor
                            </div>
                        </div>

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
                imgPreview.classList.remove('hidden');
            }
            if (image) {
                reader.readAsDataURL(image);
            }
        }
    </script>
</x-admin.app-layout>
