<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Room for') }} {{ $hotel->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-x-scroll shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="text-2xl font-bold mb-4">Update Room Details</div>
                        <div class="p-8 text-gray-900 dark:text-gray-100">
                            @if (session('success'))
                                <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4 relative">
                                    {{ session('success') }}
                                    <button id="cut-button" class="absolute top-0 right-0 p-1 text-white" onclick="removeMessage()">✖</button>
                                </div>
                            @endif

                            <form action="{{ route('admin.hotels.rooms.update', [$hotel->id, $room->id]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="overflow-x-auto">
                                    <table class="min-w-full bg-gray text-white border border-gray-800">
                                        <thead class="bg-black">
                                            <tr class="bg-black-800">
                                                <th class="py-2 px-4 border border-gray-600">{{ __('Room Name') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{ __('Capacity') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{ __('No of Bed') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{ __('AC_TYPE') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{ __('Amenities') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{ __('Price') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{ __('Pick Season Price') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{ __('Off Season Price') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{ __('Status') }}</th>
                                                <th class="py-2 px-4 border border-gray-600">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dynamic_field">
                                            <tr id="row0" class="row_item">
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="name" value="{{ $room->name }}">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="capacity" value="{{ $room->capacity }}">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="bed" value="{{ $room->bed }}">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <select class="form-select mt-1 block  bg-gray-800 text-white" name="ac_type">
                                                        <option value="AC" {{ $room->ac_type === 'AC' ? 'selected' : '' }}>{{ __('AC') }}</option>
                                                        <option value="Non-AC" {{ $room->ac_type === 'Non-AC' ? 'selected' : '' }}>{{ __('Non-AC') }}</option>
                                                    </select>
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <select class="form-select mt-1 block  bg-gray-800 text-white" name="amenities">
                                                        <option value="Coffee Kit" {{ $room->amenities === 'Coffee Kit' ? 'selected' : '' }}>{{ __('Coffee Kit') }}</option>
                                                        <option value="Geyser" {{ $room->amenities === 'Geyser' ? 'selected' : '' }}>{{ __('Geyser') }}</option>
                                                        <option value="Wi-Fi" {{ $room->amenities === 'Wi-Fi' ? 'selected' : '' }}>{{ __('Wi-Fi') }}</option>
                                                        <option value="TV" {{ $room->amenities === 'TV' ? 'selected' : '' }}>{{ __('TV') }}</option>
                                                    </select>
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="price" value="{{ $room->price }}">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="pick_season_price" value="{{ $room->pick_season_price }}">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <input type="text" class="form-input mt-1 block w-full bg-gray-800 text-white" name="off_season_price" value="{{ $room->off_season_price }}">
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <select class="form-select mt-1 block  bg-gray-800 text-white" name="status">
                                                        <option value="Available" {{ $room->status === 'Available' ? 'selected' : '' }}>{{ __('Available') }}</option>
                                                        <option value="Booked" {{ $room->status === 'Booked' ? 'selected' : '' }}>{{ __('Booked') }}</option>
                                                        <option value="Inactive" {{ $room->status === 'Inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                                    </select>
                                                </td>
                                                <td class="py-2 px-4 border border-gray-600">
                                                    <button type="button" class="btn btn-danger btn_remove">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        {{ __('Remove') }}
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="inline-flex items-center mt-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <button type="submit" class="btn btn-primary">{{ __('Update Room') }}</button>
                                </div>
                            </form>
                        </div>

                        <script>
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
