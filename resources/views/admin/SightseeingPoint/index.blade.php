<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Sightseeing :  :location', ['location' => $sightseeing->location]) }}
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

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
             <label class="block text-white font-semibold">{{__('List Sightseeing : :location', ['location' => $sightseeing->location]) }}</label>
                    @foreach ($sightseeingPoints as $point)
                        <div class="border border-gray-300 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="flex-1 px-2">
                                    <input type="text" class="form-control w-full border border-gray-300 rounded" name="destination_point[]" value="{{ old('destination_point.'.$loop->index, $point->destination_point) }}" placeholder="Sightseeing Point" required>
                                </div>
                                <div class="flex-1 px-2">
                                    <input type="text" class="form-control w-full border border-gray-300 rounded" name="description[]" value="{{ old('description.'.$loop->index, $point->description) }}" placeholder="Description">
                                </div>
                                <div class="px-2">
                                    <form action="{{ route('admin.shightseeingpoint.delete', ['sightseeing' => $sightseeing->id, 'id' => $point->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mt-2 px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this point?')">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('admin.shightseeingpoint.update', ['id' => $sightseeing->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="sightseeing_id" value="{{ old('sightseeing_id', $sightseeing->id) }}">
                <input type="hidden" name="destination" value="{{ old('destination', $sightseeing->destination) }}">
                <input type="hidden" name="location_wise" value="{{ old('location_wise', $sightseeing->location) }}">

                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    
                    <label class="block text-white font-semibold">{{__('Save Sightseeing : :location', ['location' => $sightseeing->location]) }}</label>
                    <div id="dynamic_field" class="mt-4 space-y-4">
                       
                        <div class="border border-gray-300 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="flex-1 px-2">
                                    <input type="text" class="form-control w-full border border-gray-300 rounded" name="destination_point[]" placeholder="Sightseeing Point">
                                </div>
                                <div class="flex-1 px-2">
                                    <input type="text" class="form-control w-full border border-gray-300 rounded" name="description[]" placeholder="Description">
                                </div>
                                <div class="px-2">
                                    
                                    <button type="button" id="add" class="mt-2 px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600" onclick="addRow()">
                                        <i class="fa fa-plus-square"></i>{{__('Add') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                       
                    



                    </div>
                    <div class="flex justify-between mt-6">
                        <button type="submit" name="activity_update" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                           {{__('Update/Save')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let rowCounter = {{ count($sightseeingPoints) }}; // Row counter based on existing points
        function addRow() {
            rowCounter++;
            const newRow = `
                <div class="border border-gray-300 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-1 px-2">
                            <input type="text" class="form-control w-full border border-gray-300 rounded" name="destination_point[]" placeholder="Sightseeing Point" required>
                        </div>
                        <div class="flex-1 px-2">
                            <input type="text" class="form-control w-full border border-gray-300 rounded" name="description[]" placeholder="Description">
                        </div>
                        <div class="px-2">
                            <button type="button" class="mt-2 px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600" onclick="removeRow(this)">Remove</button>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById('dynamic_field').insertAdjacentHTML('beforeend', newRow);
        }

        function removeRow(button) {
            const row = button.closest('.border');
            row.remove();
        }
    </script>
</x-admin.app-layout>
