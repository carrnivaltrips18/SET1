<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Room for') }} {{ $hotel->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-x-scroll shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="text-2xl font-bold mb-4">{{__('Add Room Detals') }}</div>
                        <div class="p-8 text-gray-900 dark:text-gray-100">
                            @if (session('success'))
                            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4 relative">
                                {{ session('success') }}
                                <button id="cut-button" class="absolute top-0 right-0 p-1 text-white" onclick="removeMessage()">{{__('✖') }}</button>
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
                                }, 5000);
                            </script>
                        @endif
                        
                            <form action="{{ route('admin.hotels.rooms.store', $hotel->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                <input type="hidden" name="hotel_name" value="{{ $hotel->name }}">
                                <input type="hidden" name="destination" value="{{ $hotel->destination }}">
                                <input type="hidden" name="location_wise" value="{{ $hotel->location_wise }}">
                                <input type="hidden" name="category_wise" value="{{ $hotel->category_wise }}">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full bg-gray text-white border border-gray-800">
                                        <thead class="bg-black">
                                            <tr class="bg-black-800">
                                                <th class="py-2 px-4 border border-gray-600">{{__('Room Name') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{__('Capacity') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{__('No of Bed') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{__('AC') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{__('Amenities') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{__('Season Price') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{__('Pick Season Price') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{__('Off Season Price') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{__('Status') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{__('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dynamic_field">

                                            <tr id="row0" class="row_item">
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text"
                                                        class="form-input mt-1 block w-full bg-gray-800 text-white"
                                                        name="{{__('name[]') }}" >
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text"
                                                        class="form-input mt-1 block w-full bg-gray-800 text-white"
                                                        name="{{__('capacity[]') }}">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text"
                                                        class="form-input mt-1 block w-full bg-gray-800 text-white"
                                                        name="{{__('bed[]') }}">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <select class="form-select mt-1 block bg-gray-800 text-white"
                                                        name="{{__('ac_type[]') }}">
                                                        <option value="AC">{{__('AC') }}</option>
                                                        <option value="Non-AC">{{__('Non-AC') }}</option>
                                                    </select>
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <select class="form-select mt-1 block bg-gray-800 text-white"
                                                        name="amenities[]">
                                                        <option value="Coffee Kit">{{__('Coffee Kit') }}</option>
                                                        <option value="Geyser">{{__('Geyser') }}</option>
                                                        <option value="Wi-Fi">{{__('Wi-Fi') }}</option>
                                                        <option value="TV">{{__('TV') }}</option>
                                                    </select>
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text"
                                                        class="form-input mt-1 block w-full bg-gray-800 text-white"
                                                        name="price[]">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text"
                                                        class="form-input mt-1 block w-full bg-gray-800 text-white"
                                                        name="pick_season_price[]">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text"
                                                        class="form-input mt-1 block w-full bg-gray-800 text-white"
                                                        name="off_season_price[]">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <select class="form-select mt-1 block bg-gray-800 text-white"
                                                        name="status[]">
                                                        <option value="Available">{{__('Available') }}</option>
                                                        <option value="Booked">{{__('Booked') }}</option>
                                                        <option value="Inactive">{{__('Inactive') }}</option>
                                                    </select>
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <button type="button" id="add" class="btn btn-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 4v16m8-8H4" />
                                                        </svg>
                                                        {{__('Add') }}
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="inline-flex items-center mt-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <button type="submit" class="btn btn-primary">{{__('Update Room') }}</button>
                                </div>
                            </form>
                        </div>

                        <script>
                            document.getElementById('add').addEventListener('click', function() {
                                var newRow = `
                                        <tr class="row_item">
                                            <td class="py-2 px-4 border border-gray-600">
                                                <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="{{__('name[]') }}">
                                            </td>
                                            <td class="py-2 px-4 border border-gray-600">
                                                <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="{{__('capacity[]') }}">
                                            </td>
                                            <td class="py-2 px-4 border border-gray-600">
                                                <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="{{__('bed[]') }}">
                                            </td>
                                            <td class="py-2 px-4 border border-gray-600">
                                                <select class="form-select mt-1 block w-full bg-gray-800 text-white" name="{{__('ac_type[]') }}">
                                                    <option value="AC">{{__('AC') }}</option>
                                                    <option value="Non-AC">{{__('Non-AC') }}</option>
                                                </select>
                                            </td>
                                            <td class="py-2 px-4 border border-gray-600">
                                                <select class="form-select mt-1 block w-full bg-gray-800 text-white" name="{{__('amenities[]') }}">
                                                    <option value="Coffee Kit">{{__('Coffee Kit') }}</option>
                                                    <option value="Geyser">{{__('Geyser') }}</option>
                                                    <option value="Wi-Fi">{{__('Wi-Fi') }}</option>
                                                    <option value="TV">{{__('TV') }}</option>
                                                </select>
                                            </td>
                                            <td class="py-2 px-4 border border-gray-600">
                                                <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="{{__('price[]') }}">
                                            </td>
                                            <td class="py-2 px-4 border border-gray-600">
                                                <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="{{__('pick_season_price[]') }}">
                                            </td>
                                            <td class="py-2 px-4 border border-gray-600">
                                                <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="{{__('off_season_price[]') }}">
                                            </td>
                                            <td class="py-2 px-4 border border-gray-600">
                                                <select class="form-select mt-1 block w-full bg-gray-800 text-white" name="{{__('status[]') }}">
                                                    <option value="Available">{{__('Available') }}</option>
                                                    <option value="Booked">{{__('Booked') }}</option>
                                                    <option value="Inactive">{{__('Inactive') }}</option>
                                                </select>
                                            </td>
                                            <td class="py-2 px-4 border border-gray-600">
                                                 <button type="button" class="btn btn-danger btn_remove">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        {{__('Remove') }}
                                                    </button>
                                            </td>
                                        </tr>
                                    `;
                                // Insert the new row below the last row in the table body
                                document.getElementById('dynamic_field').insertAdjacentHTML('beforeend', newRow);
                            });
                            document.addEventListener('click', function(e) {
                                if (e.target.classList.contains('btn_remove')) {
                                    e.target.closest('tr').remove();
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
