<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Package List') }}
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

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between mb-4">
                        <a href="{{ route('admin.itinerary.form') }}" class="bg-green-500 text-white px-4 py-2 rounded">
                            {{ __('Create New Package') }}
                        </a>
                        <form method="GET" action="{{ route('admin.itinerary.list') }}" class="flex items-center">
                            <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search By Packages..." class="border rounded p-2 mr-2 text-white bg-gray-800 placeholder-gray-400">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{__('Search') }}</button>
                        </form>
                    </div>
                    

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-500 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('SL.NO') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Image') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Package Name') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Day') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Night') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Status') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Website') }}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                            @foreach ($packages as $key => $package)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ ++$key }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        <img width="60" src="{{ asset('package_image/' . $package->package_img) }}" alt="">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $package->package_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $package->day }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $package->night }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $package->package_status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 flex items-center">
                                        <a class="bg-blue-500 text-white px-4 py-2 rounded" href="http://localhost/carrnivaltrips/carrnivaltrips/carrnivalpackage/index.php?id=2" target="_blank">{{ __('Preview Demo') }}</a>
                                        <a href="https://wa.me/YOUR_NUMBER" target="_blank"
                                        class="ml-2 bg-green-500 p-2 rounded-full">
                                        <svg height="25px" width="25px" version="1.1" id="Capa_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 58 58"
                                            xml:space="preserve">
                                            <g>
                                                <path style="fill:#2CB742;" d="M0,58l4.988-14.963C2.457,38.78,1,33.812,1,28.5C1,12.76,13.76,0,29.5,0S58,12.76,58,28.5
                                                    S45.24,57,29.5,57c-4.789,0-9.299-1.187-13.26-3.273L0,58z" />
                                                    <path style="fill:#FFFFFF;" d="M47.683,37.985c-1.316-2.487-6.169-5.331-6.169-5.331c-1.098-0.626-2.423-0.696-3.049,0.42
                                                    c0,0-1.577,1.891-1.978,2.163c-1.832,1.241-3.529,1.193-5.242-0.52l-3.981-3.981l-3.981-3.981c-1.713-1.713-1.761-3.41-0.52-5.242
                                                    c0.272-0.401,2.163-1.978,2.163-1.978c1.116-0.627,1.046-1.951,0.42-3.049c0,0-2.844-4.853-5.331-6.169
                                                    c-1.058-0.56-2.357-0.364-3.203,0.482l-1.758,1.758c-5.577,5.577-2.831,11.873,2.746,17.45l5.097,5.097l5.097,5.097
                                                    c5.577,5.577,11.873,8.323,17.45,2.746l1.758-1.758C48.048,40.341,48.243,39.042,47.683,37.985z" />
                                            </g>
                                        </svg>
                                    </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        <div class="flex justify-between">
                                            <a class="bg-blue-500 text-white px-2 py-1 rounded flex items-center" href="{{ route('admin.itinerary.edit', $package->id) }}">
                                                <!-- Update Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M3 17.25V21h3.75l10.65-10.65-3.75-3.75L3 17.25zM20.71 7.04a1.004 1.004 0 0 0 0-1.42l-2.29-2.29a1.004 1.004 0 0 0-1.42 0l-1.29 1.29 3.75 3.75 1.29-1.29z" />
                                                </svg>
                                                {{ __('Update') }}
                                            </a>
                                            <form action="{{ route('admin.itinerary.delete', $package->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded flex items-center">
                                                    <!-- Delete Icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M6 21h12a2 2 0 0 0 2-2V7H4v12a2 2 0 0 0 2 2zm3-14h6v2H9v-2zm0 4h6v8H9v-8zm-3-3h12V4H6v4z" />
                                                    </svg>
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    
                                    
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    {{ $packages->links() }} <!-- This will display pagination controls -->
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
