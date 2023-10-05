@section('title', 'Recensioni ricevute')

<x-app-layout>
    <section class="p-8 w-full space-y-4 md:space-y-0">
        {{ $reviews->links() }}

        {{-- From mobile to lg --}}
        <div class="w-full p-4 bg-white rounded-xl shadow-md lg:hidden">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($reviews as $review)
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-1 min-w-0">
                            <p class="text-base font-semibold text-gray-900 truncate">
                                {{ $review->guest_name }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $review->guest_email }}
                            </p>
                        </div>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                            <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                            </svg>
                            {{ $review->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <div class="mt-8 text-center">
                        <h3 class="font-bold text-lg">{{ $review->title }}</h3>
                        <p class="truncate-custom text-sm ">{{ $review->content }}</p>
                    </div>
                    <div class="flex items-center gap-1 justify-center mt-4">
                        {{-- Yellow stars --}}
                        @for ($i = 1; $i <= $review->vote->vote; $i++)
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                        @endfor

                        {{-- Gray stars --}}
                        @for ($i = $review->vote->vote + 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                        @endfor
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- From lg to full --}}
        <div class="w-full rounded-xl bg-white shadow-md overflow-y-scroll hidden lg:block">
            <table class="w-full text-sm text-left text-gray-900 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 w-1/6">
                            Visitatore
                            <span class="block font-normal text-gray-500">+ Email</span>
                        </th>
                        <th scope="col" class="px-6 py-3 w-3/6">
                            Messaggio
                        </th>
                        <th scope="col" class="px-6 py-3  w-1/6">
                            Voto
                        </th>
                        <th scope="col" class="px-6 py-3 w-1/6">
                            Ricevuto
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                <div class="text-base font-semibold">{{ $review->guest_name }}</div>
                                <div class="font-normal text-gray-500">{{ $review->guest_email }}</div>
                            </th>
                            <td class="px-6 py-4">
                                <h3 class="font-bold text-lg">{{ $review->title }}</h3>
                                <p class="truncate-custom text-sm">{{ $review->content }}</p>
                            </td>
                            <td class="px-6 py-4 bg-gray-50">
                                <div class="flex items-center space-x-1">
                                    {{-- Yellow stars --}}
                                    @for ($i = 1; $i <= $review->vote->vote; $i++)
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                    @endfor

                                    {{-- Gray stars --}}
                                    @for ($i = $review->vote->vote + 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                    @endfor
                                </div>
                            </td>
                            <td class="px-6 py-4 dark:bg-gray-800">
                                {{ $review->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $reviews->links() }}
    </section>
</x-app-layout>
