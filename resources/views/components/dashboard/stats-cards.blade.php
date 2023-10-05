<article class="bd_dashboard-stat-1 rounded-xl shadow-xl overflow-hidden">
    <div class="flex justify-center gap-3 2xl:gap-10 items-center py-10 px-6 h-full">
        <div class="text-white">
            <p class="text-3xl md:text-4xl xl:text-2xl">Media Voti</p>
            <h2 class="text-5xl md:text-7xl lg:text-8xl xl:text-3xl 2k:text-7xl font-bold">{{ number_format($averageVote, 2) }}</h2>
        </div>
        <div class="h-auto w-28 md:w-40 lg:w-48 xl:w-28 2k:w-40">
            <img src="{{ asset('storage/images/votes-icon-dashboard.png') }}" alt="messages icon"
                class="w-full h-full invert">
        </div>
    </div>
</article>

<article class="bd_dashboard-stat-2 rounded-xl shadow-xl overflow-hidden">
    <div class="flex justify-center gap-3 2xl:gap-10 items-center py-10 px-6 h-full">
        <div class="text-white">
            <p class="text-3xl md:text-4xl xl:text-2xl">Conta Messaggi</p>
            <h2 class="text-5xl md:text-7xl lg:text-8xl xl:text-3xl 2k:text-7xl font-bold">{{ $totalMessagesCount }}</h2>
        </div>
        <div class="h-auto w-28 md:w-40 lg:w-48 xl:w-28 2k:w-40">
            <img src="{{ asset('storage/images/message-icon-dashboard.png') }}" alt="messages icon"
                class="w-full h-full invert">
        </div>
    </div>
</article>

<article class="bd_dashboard-stat-3 rounded-xl shadow-xl overflow-hidden">
    <div class="flex justify-center gap-3 2xl:gap-10 items-center py-10 px-6 h-full">
        <div class="text-white">
            <p class="text-3xl md:text-4xl xl:text-2xl">Conta Recensioni</p>
            <h2 class="text-5xl md:text-7xl lg:text-8xl xl:text-3xl 2k:text-7xl font-bold">{{ $totalReviewsCount }}</h2>
        </div>
        <div class="h-auto w-28 md:w-40 lg:w-48 xl:w-28 2k:w-40">
            <img src="{{ asset('storage/images/reviews-icon-dashboard.png') }}" alt="reviews icon"
                class="w-full h-full invert">
        </div>
    </div>
</article>
