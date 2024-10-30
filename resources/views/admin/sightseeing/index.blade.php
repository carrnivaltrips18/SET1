<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sightseen List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-12">
                @if (session('success'))
                    <div id="session-message" class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
            <div class="bg-white dark:bg-gray-800 overflow-x-scroll shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <button type="button" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-150 ease-in-out"
                            id="openAddsightseenModal">
                            {{ __('Add sightseen') }}
                        </button>
                    </div>

                    <!-- Modal for Adding Hotel Category -->
                    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="addsightseenModal">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96">
                            <div class="px-4 py-2 border-b">
                                <h4 class="text-lg font-semibold">{{ __('Add sightseen') }}</h4>
                                <button type="button" class="text-gray-500 hover:text-gray-700 close"
                                    aria-label="Close">&times;</button>
                            </div>
                            <form action="{{ route('admin.sightseeing.store') }}" method="POST">
                                @csrf
                                <div class="p-4">
                                    <x-input-label class="block text-sm font-medium mb-1">{{__('Destination') }}</x-input-label>
                                    <x-text-input type="text" name="destination"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
                                    <x-input-label class="block text-sm font-medium mb-1 mt-4">{{__('Location') }}</x-input-label>
                                    <x-text-input type="text" name="location"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
                                </div>
                                <div class="flex justify-between p-4 border-t">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded">{{__('Save') }}</button>
                                    <button type="button"
                                        class="bg-gray-300 text-black px-4 py-2 rounded close">{{__('Close') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <script>
                        // Handle opening and closing the add category modal
                        document.getElementById('openAddsightseenModal').onclick = () => {
                            document.getElementById('addsightseenModal').classList.remove('hidden');
                        };
                        document.querySelectorAll('.close').forEach(btn => {
                            btn.onclick = () => {
                                btn.closest('.fixed').classList.add('hidden');
                            };
                        });
                    </script>
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('SL.NO') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Destination') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('location') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Add sightseeing') }}</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Actions') }}</th>
                            </tr>
                        </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                                @foreach ($sightseeing as $key => $sightseen)
                                <tr>
        
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ ++$key }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{__($sightseen->destination)}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sightseen->location }}</td>
                                    
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            <a href="{{ route('admin.sightseeingimg.index', ['id' => $sightseen->id]) }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition duration-150 ease-in-out">
                                                {{__('Add Sightseeing Piont') }}
                                            </a>
                                        </td>
                                   
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        <button type="button" class="inline-flex text-indigo-600 hover:text-indigo-900"
                                            id="openEditSightseenModal{{ $sightseen->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px"
                                                fill="#fff" class="mr-1">
                                                <path
                                                    d="M3 17.25V21h3.75l10.65-10.65-3.75-3.75L3 17.25zM20.71 7.04a1.004 1.004 0 0 0 0-1.42l-2.29-2.29a1.004 1.004 0 0 0-1.42 0l-1.29 1.29 3.75 3.75 1.29-1.29z" />
                                            </svg>
                                            {{ __('Edit') }}
                                        </button>

                                        <!-- Modal for Editing Hotel Category -->
                                        <div class="fixed inset-0 flex items-center justify-center z-50 hidden"
                                            id="editSightseenModal{{ $sightseen->id }}">
                                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96">
                                                <div class="px-4 py-2 border-b">
                                                    <h4 class="text-lg font-semibold">{{ __('Update Sightseen') }}
                                                    </h4>
                                                    <button type="button"
                                                        class="text-gray-500 hover:text-gray-700 close">&times;</button>
                                                </div>
                                                <form
                                                    action="{{ route('admin.sightseeing.update', $sightseen->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="p-4">
                                                        <x-input-label
                                                            class="block text-sm font-medium mb-1">{{__('Destination') }}</x-input-label>
                                                        <x-text-input type="text" name="destination"
                                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                                            value="{{ $sightseen->destination }}"/>
                                                        <x-input-label class="block text-sm font-medium mb-1 mt-4">{{__('Location') }}</x-input-label>
                                                        <x-text-input type="text" name="location"
                                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                                            value="{{ $sightseen->location }}"/>
                                                    </div>
                                                    <div class="flex justify-between p-4 border-t">
                                                        <button type="submit"
                                                            class="bg-blue-500 text-white px-4 py-2 rounded">{{__('Update') }}</button>
                                                        <button type="button"
                                                            class="bg-gray-300 text-black px-4 py-2 rounded close">{{__('Close') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <script>
                                            // Handle opening and closing the edit category modal
                                            document.getElementById('openEditSightseenModal{{ $sightseen->id }}').onclick = () => {
                                                document.getElementById('editSightseenModal{{ $sightseen->id }}').classList.remove('hidden');
                                            };
                                            document.querySelectorAll('.close').forEach(btn => {
                                                btn.onclick = () => {
                                                    btn.closest('.fixed').classList.add('hidden');
                                                };
                                            });
                                        </script>

                                        {{-- delete --}}
                                        <form action="{{ route('admin.sightseeing.delete', $sightseen->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
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
                </div>
            </div>
        </div>
        <script>
            // Check if the session message exists
            const sessionMessage = document.getElementById('session-message');
            if (sessionMessage) {
                // Set a timeout to fade out the message after 3 seconds
                setTimeout(() => {
                    sessionMessage.classList.add('opacity-0');
                    setTimeout(() => {
                        sessionMessage.remove();
                    }, 500); // Wait for the fade-out transition to finish
                }, 5000); // 3000ms = 5 seconds
            }
        </script>
    </div>
</x-admin.app-layout>

