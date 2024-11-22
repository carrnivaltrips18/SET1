<x-admin.app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ isset($slide) ? 'Update' : 'Create' }} Package Slide 1
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100"> --}}
                    {{-- <div class="p-6"> --}}
                        <div class="bg-gray shadow-md rounded-lg">
                            <div class="p-4 border-b">
                                <h3 class="text-xl font-semibold text-white">{{ isset($packages) ? 'Update' : 'Create' }} Package Slide 1</h3>
                            </div>
                            <div class="p-6">
                                <!-- form start -->
                                <form action="{{ isset($packages) ? route('admin.itinerary.slide1.update', $packages->id) : route('admin.itinerary.slide1.store', $packages->id) }}" method="POST" enctype="multipart/form-data" class="p-4">
                                    @csrf
                                    @if(isset($packages))
                                        @method('PUT') <!-- Use PUT for updates -->
                                    @endif

                                    <div class="space-y-4">
                                        <!-- Package Name -->
                                        <div>
                                            <x-input-label for="package_name" class="block text-sm font-medium text-gray-700">Package Name</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="package_name" name="package_name" placeholder="Enter Package Name" value="{{ old('package_name', isset($packages) ? $packages->package_name : '') }}"  />
                                        </div>

                                        <!-- Slider 1 -->
                                        <div>
                                            <x-input-label for="s1_text1" class="block text-sm font-medium text-gray-700">Slider1 Text1</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_text1" name="s1_text1" value="{{ old('s1_text1', isset($packages) ? $packages->s1_text1 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s1_anim_text2" class="block text-sm font-medium text-gray-700">Slider1 Animation Text2</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_anim_text2" name="s1_anim_text2" value="{{ old('s1_anim_text2', isset($packages) ? $packages->s1_anim_text2 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s1_text3" class="block text-sm font-medium text-gray-700">Slider1 Text3</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_text3" name="s1_text3" value="{{ old('s1_text3', isset($packages) ? $packages->s1_text3 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s1_square_box_text" class="block text-sm font-medium text-gray-700">Slider1 Square Box Text</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_square_box_text" name="s1_square_box_text" value="{{ old('s1_square_box_text', isset($packages) ? $packages->s1_square_box_text : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s1_btn1" class="block text-sm font-medium text-gray-700">Slider1 Button 1</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_btn1" name="s1_btn1" value="{{ old('s1_btn1', isset($packages) ? $packages->s1_btn1 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s1_btn2" class="block text-sm font-medium text-gray-700">Slider1 Button 2</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_btn2" name="s1_btn2" value="{{ old('s1_btn2', isset($packages) ? $packages->s1_btn2 : '') }}" />
                                        </div>

                                        <!-- Slider 1 Image -->
                                        <div>
                                            <x-input-label for="s1_img" class="block text-sm font-medium text-gray-700">Slider1 Image</x-input-label>
                                            <x-text-input type="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s1_img" name="s1_img" />
                                            @if(isset($packages) && $packages->s1_img)
                                                <img width="100" height="80" class="mt-3" id="disp_s1_img" src="{{ asset('slide_images/'.$packages->s1_img) }}" />
                                            @else
                                                <img width="100" height="80" class="mt-3" id="disp_s1_img" src="{{ asset('img/default.jpg') }}" />
                                            @endif
                                        </div>

                                        <!-- Repeat similar code for Slider 2 and 3 -->
                                        <!-- Slider 2 -->
                                        <div>
                                            <x-input-label for="s2_text1" class="block text-sm font-medium text-gray-700">Slider2 Text1</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_text1" name="s2_text1" value="{{ old('s2_text1', isset($packages) ? $packages->s2_text1 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s2_anim_text2" class="block text-sm font-medium text-gray-700">Slider2 Animation Text2</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_anim_text2" name="s2_anim_text2" value="{{ old('s2_anim_text2', isset($packages) ? $packages->s2_anim_text2 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s2_text3" class="block text-sm font-medium text-gray-700">Slider2 Text3</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_text3" name="s2_text3" value="{{ old('s2_text3', isset($packages) ? $packages->s2_text3 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s2_square_box_text" class="block text-sm font-medium text-gray-700">Slider2 Square Box Text</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_square_box_text" name="s2_square_box_text" value="{{ old('s2_square_box_text', isset($packages) ? $packages->s2_square_box_text : '') }}" />
                                        </div>
                                        <div>
                                            <x-input-label for="s2_btn1" class="block text-sm font-medium text-gray-700">Slider1 Button 1</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_btn1" name="s2_btn1" value="{{ old('s2_btn1', isset($packages) ? $packages->s2_btn1 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s2_btn2" class="block text-sm font-medium text-gray-700">Slider1 Button 2</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_btn2" name="s2_btn2" value="{{ old('s2_btn2', isset($packages) ? $packages->s2_btn2 : '') }}" />
                                        </div>

                                        <!-- Slider 2 Image -->
                                        <div>
                                            <x-input-label for="s2_img" class="block text-sm font-medium text-gray-700">Slider2 Image</x-input-label>
                                            <x-text-input type="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s2_img" name="s2_img" />
                                            @if(isset($packages) && $packages->s2_img)
                                                <img width="100" height="80" class="mt-3" id="disp_s2_img" src="{{ asset('slide_images/'.$packages->s2_img) }}" />
                                            @else
                                                <img width="100" height="80" class="mt-3" id="disp_s2_img" src="{{ asset('img/default.jpg') }}" />
                                            @endif
                                        </div>

                                        <!-- Slider 3 -->
                                        <div>
                                            <x-input-label for="s3_text1" class="block text-sm font-medium text-gray-700">Slider3 Text1</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_text1" name="s3_text1" value="{{ old('s3_text1', isset($packages) ? $packages->s3_text1 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s3_anim_text2" class="block text-sm font-medium text-gray-700">Slider3 Animation Text2</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_anim_text2" name="s3_anim_text2" value="{{ old('s3_anim_text2', isset($packages) ? $packages->s3_anim_text2 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s3_text3" class="block text-sm font-medium text-gray-700">Slider3 Text3</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_text3" name="s3_text3" value="{{ old('s3_text3', isset($packages) ? $packages->s3_text3 : '') }}" />
                                        </div>
                                        <div>
                                            <x-input-label for="s3_square_box_text" class="block text-sm font-medium text-gray-700">Slider3 Square Box Text</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_square_box_text" name="s3_square_box_text" value="{{ old('s3_square_box_text', isset($packages) ? $packages->s3_square_box_text : '') }}" />
                                        </div>
                                        <div>
                                            <x-input-label for="s3_btn1" class="block text-sm font-medium text-gray-700">Slider1 Button 1</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_btn1" name="s3_btn1" value="{{ old('s3_btn1', isset($packages) ? $packages->s3_btn1 : '') }}" />
                                        </div>

                                        <div>
                                            <x-input-label for="s3_btn2" class="block text-sm font-medium text-gray-700">Slider1 Button 2</x-input-label>
                                            <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_btn2" name="s3_btn2" value="{{ old('s3_btn2', isset($packages) ? $packages->s3_btn2 : '') }}" />
                                        </div>

                                        <!-- Slider 3 Image -->
                                        <div>
                                            <x-input-label for="s3_img" class="block text-sm font-medium text-gray-700">Slider3 Image</x-input-label>
                                            <x-text-input type="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="s3_img" name="s3_img" />
                                            @if(isset($packages) && $packages->s3_img)
                                                <img width="100" height="80" class="mt-3" id="disp_s3_img" src="{{ asset('slide_images/'.$packages->s3_img) }}" />
                                            @else
                                                <img width="100" height="80" class="mt-3" id="disp_s3_img" src="{{ asset('img/default.jpg') }}" />
                                            @endif
                                        </div>

                                    </div>

                                    <!-- Hidden Fields -->
                                    <input type="hidden" id="id" name="id" value="{{ isset($packages) ? $packages->id : '' }}">

                                    <div class="mt-4">
                                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
                                            {{ isset($packages) ? 'Update' : 'Create' }} Package Slide
                                        </button>
                                    </div>
                                </form>
                                <!-- form end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Show Image Previews -->
    <script>
        function previewImage(inputId, imgId) {
            var file = document.getElementById(inputId).files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById(imgId).src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file); // Convert file to data URL
            }
        }

        // Add event listeners for image inputs
        document.getElementById('s1_img').addEventListener('change', function() {
            previewImage('s1_img', 'disp_s1_img');
        });

        document.getElementById('s2_img').addEventListener('change', function() {
            previewImage('s2_img', 'disp_s2_img');
        });

        document.getElementById('s3_img').addEventListener('change', function() {
            previewImage('s3_img', 'disp_s3_img');
        });
    </script>
</x-admin.app-layout>
