<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Car List') }}
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
                function removeMessage() {
                    const message = document.getElementById('success-message');
                    if (message) {
                        message.style.display = 'none';
                    }
                }
                setTimeout(() => {
                    removeMessage();
                }, 5000);
            </script>
        @endif
            <div class="bg-white dark:bg-gray-800 overflow-x-scroll shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    <div class="flex justify-between mb-4">
                        <a href="{{ route('admin.cars.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-150 ease-in-out">
                            {{__('Add Car') }}
                        </a>
                        <form method="GET" action="{{ route('admin.hotel.rooms.list') }}" class="flex items-center">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search by car_type..." class="border rounded p-2 mr-2 text-white bg-gray-800 placeholder-gray-400">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
                        </form>
                    </div>
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('SL.NO') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('car type') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Destination') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('pickup Location') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('pickup sightseeing point') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('drop location') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __(' drop sightseeing point') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('price') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Actions') }}</th>
                            </tr>
                        </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                                @foreach ($cars as $key => $car)
                                <tr>
        
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ ++$key }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{__($car->car_type)}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $car->destination }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $car->pickup_location_wise }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $car->pickup_sightseen_point }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $car->drop_location_wise }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $car->drop_sightseen_point }}</td>
        
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{__($car->price)}}
                                    </td>  
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="flex items-center text-indigo-600 hover:text-indigo-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" fill="#fff" class="mr-1">
                                                <path d="M3 17.25V21h3.75l10.65-10.65-3.75-3.75L3 17.25zM20.71 7.04a1.004 1.004 0 0 0 0-1.42l-2.29-2.29a1.004 1.004 0 0 0-1.42 0l-1.29 1.29 3.75 3.75 1.29-1.29z" />
                                            </svg>
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('admin.cars.delete', $car->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="flex items-center text-red-600 hover:text-red-900 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" fill="#fff" class="mr-1">
                                                    <path d="M6 21h12a2 2 0 0 0 2-2V7H4v12a2 2 0 0 0 2 2zm3-14h6v2H9v-2zm0 4h6v8H9v-8zm-3-3h12V4H6v4z" />
                                                </svg>
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                    
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                         <!-- Pagination Links -->
                     {{ $cars->links() }} 
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>

