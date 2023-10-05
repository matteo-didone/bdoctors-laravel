@section('title', 'Messaggi ricevuti')

<x-app-layout>
    <section class="p-8 w-full space-y-4 md:space-y-0">
        {{ $messages->links('vendor.pagination.tailwind') }}

        {{-- From mobile to lg --}}
        <div class="w-full p-4 bg-white rounded-xl shadow-md lg:hidden">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($messages as $message)
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-1 min-w-0">
                            <p class="text-base font-semibold text-gray-900 truncate">
                                {{ $message->guest_name }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $message->guest_email }}
                            </p>
                        </div>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                            <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                            </svg>
                            {{ $message->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <p class="truncate-custom text-sm mt-8 text-center">{{ $message->content }}</p>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- From lg to full --}}
        <div class="w-full rounded-xl bg-white shadow-md overflow-y-scroll hidden lg:block">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 w-1/6">
                            Visitatore
                            <span class="block font-normal text-gray-500">+ Email</span>
                        </th>
                        <th scope="col" class="px-6 py-3 w-3/6">
                            Messaggio
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 w-1/6">
                            Ricevuto
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                <div class="text-base font-semibold">{{ $message->guest_name }}</div>
                                <div class="font-normal text-gray-500">{{ $message->guest_email }}</div>
                            </th>
                            <td class="px-6 py-4">
                                <p class="truncate-custom text-sm">{{ $message->content }}</p>
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                {{ $message->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>
