<x-admin.app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ isset($slide2) ? 'Update' : 'Create' }} Package Slide 2
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray shadow-md rounded-lg">
                    <div class="p-4 border-b">
                        <h3 class="text-xl font-semibold text-white">{{ isset($slide2) ? 'Update' : 'Create' }} Package Slide 2</h3>
                    </div>
                    <div class="p-6">
                        <!-- Form Start -->
                        <form action="{{ isset($slide2) ? route('admin.itinerary.slide2.update', $slide2->id) : route('admin.itinerart.slide2.store', $packages->id) }}" method="POST">
                            @csrf
                            @if(isset($slide2))
                                @method('PUT')
                            @endif
                            <div class="space-y-4">

                              
                                <x-text-input type="hidden" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="package_id" name="package_id" value="{{ $packages->id}}" />
                                <!-- Experience Description -->
                                <div>
                                    <x-input-label for="Experience_Description" class="block text-sm font-medium text-gray-700">Slide 2 Experience Description</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Experience_Description" name="Experience_Description" placeholder="Enter Slide 2 Experience Description" value="{{ old('Experience_Description', isset($slide2) ? $slide2->Experience_Description : '') }}" />
                                </div>

                                <!-- Experience Media Link -->
                                <div>
                                    <x-input-label for="Experience_Media_Link" class="block text-sm font-medium text-gray-700">Experience Media Link</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Experience_Media_Link" name="Experience_Media_Link" value="{{ old('Experience_Media_Link', isset($slide2) ? $slide2->Experience_Media_Link : '') }}" />
                                </div>

                                <!-- Point 1 Heading -->
                                <div>
                                    <x-input-label for="Point_1_Heading" class="block text-sm font-medium text-gray-700">Point 1 Heading</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_1_Heading" name="Point_1_Heading" value="{{ old('Point_1_Heading', isset($slide2) ? $slide2->Point_1_Heading : '') }}" />
                                </div>

                                <!-- Point 1 Details -->
                                <div>
                                    <x-input-label for="Point_1_Details" class="block text-sm font-medium text-gray-700">Point 1 Details</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_1_Details" name="Point_1_Details" value="{{ old('Point_1_Details', isset($slide2) ? $slide2->Point_1_Details : '') }}" />
                                </div>

                                <!-- Point 2 Heading -->
                                <div>
                                    <x-input-label for="Point_2_Heading" class="block text-sm font-medium text-gray-700">Point 2 Heading</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_2_Heading" name="Point_2_Heading" value="{{ old('Point_2_Heading', isset($slide2) ? $slide2->Point_2_Heading : '') }}" />
                                </div>

                                <!-- Point 2 Details -->
                                <div>
                                    <x-input-label for="Point_2_Details" class="block text-sm font-medium text-gray-700">Point 2 Details</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_2_Details" name="Point_2_Details" value="{{ old('Point_2_Details', isset($slide2) ? $slide2->Point_2_Details : '') }}" />
                                </div>

                                <!-- Point 3 Heading -->
                                <div>
                                    <x-input-label for="Point_3_Heading" class="block text-sm font-medium text-gray-700">Point 3 Heading</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_3_Heading" name="Point_3_Heading" value="{{ old('Point_3_Heading', isset($slide2) ? $slide2->Point_3_Heading : '') }}" />
                                </div>

                                <!-- Point 3 Details -->
                                <div>
                                    <x-input-label for="Point_3_Details" class="block text-sm font-medium text-gray-700">Point 3 Details</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_3_Details" name="Point_3_Details" value="{{ old('Point_3_Details', isset($slide2) ? $slide2->Point_3_Details : '') }}" />
                                </div>

                                <!-- Point 4 Heading -->
                                <div>
                                    <x-input-label for="Point_4_Heading" class="block text-sm font-medium text-gray-700">Point 4 Heading</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_4_Heading" name="Point_4_Heading" value="{{ old('Point_4_Heading', isset($slide2) ? $slide2->Point_4_Heading : '') }}" />
                                </div>

                                <!-- Point 4 Details -->
                                <div>
                                    <x-input-label for="Point_4_Details" class="block text-sm font-medium text-gray-700">Point 4 Details</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_4_Details" name="Point_4_Details" value="{{ old('Point_4_Details', isset($slide2) ? $slide2->Point_4_Details : '') }}" />
                                </div>

                                <!-- Point 5 Heading -->
                                <div>
                                    <x-input-label for="Point_5_Heading" class="block text-sm font-medium text-gray-700">Point 5 Heading</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_5_Heading" name="Point_5_Heading" value="{{ old('Point_5_Heading', isset($slide2) ? $slide2->Point_5_Heading : '') }}" />
                                </div>

                                <!-- Point 5 Details -->
                                <div>
                                    <x-input-label for="Point_5_Details" class="block text-sm font-medium text-gray-700">Point 5 Details</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_5_Details" name="Point_5_Details" value="{{ old('Point_5_Details', isset($slide2) ? $slide2->Point_5_Details : '') }}" />
                                </div>

                                <!-- Point 6 Heading -->
                                <div>
                                    <x-input-label for="Point_6_Heading" class="block text-sm font-medium text-gray-700">Point 6 Heading</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_6_Heading" name="Point_6_Heading" value="{{ old('Point_6_Heading', isset($slide2) ? $slide2->Point_6_Heading : '') }}" />
                                </div>

                                <!-- Point 6 Details -->
                                <div>
                                    <x-input-label for="Point_6_Details" class="block text-sm font-medium text-gray-700">Point 6 Details</x-input-label>
                                    <x-text-input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" id="Point_6_Details" name="Point_6_Details" value="{{ old('Point_6_Details', isset($slide2) ? $slide2->Point_6_Details : '') }}" />
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-4">
                                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
                                        {{ isset($slide2) ? 'Update' : 'Create' }} Slide
                                    </button>
                                </div>

                            </div>
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin.app-layout>
