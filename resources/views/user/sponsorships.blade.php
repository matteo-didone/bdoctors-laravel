<x-app-layout>
    <section class="p-8" id="servicePlans">
        @if ($hasActiveSponsorship)
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">Attenzione!</span> Hai gia una promozione attiva in questo momento, quando sara finita potrai acquistarne un altra!
                </div>
            </div>
        @endif

        <div class="mx-auto max-w-screen-2xl text-center flex flex-col 2xl:text-start 2xl:h-[36rem]">
            <div class="bd_text-col lg:mr-6">
                <span class="py-4 font-normal uppercase text-xl bd_introductive-title">
                    Aumenta la tua visibilità...
                </span>
                <h3 class="mb-8 px-6 lg:px-32 xl:p-0 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white">
                    Scegli il piano giusto per te e raggiungi più pazienti
                </h3>
                <p class="mb-12 text-lg font-normal text-gray-500 sm:px-16 lg:px-48 xl:p-0 dark:text-gray-200">
                    I piani di sponsorizzazione B Doctors ti consentono di aumentare la visibilità del tuo profilo e
                    raggiungere più pazienti. Con un profilo sponsorizzato, il tuo profilo apparirà in Homepage
                    nella sezione "Medici in Evidenza" e verrà posizionato sempre prima di
                    quello di un medico non sponsorizzato che soddisfa le stesse caratteristiche di ricerca.
                    <br>
                    Scegli il piano di sponsorizzazione che fa per te e inizia a farti conoscere da più persone!
                </p>
            </div>
            <div class="mt-12 flex flex-row items-center gap-6 lg:flex-row lg:justify-center 2xl:m-0 lg:items-start db-sponsor-plans">
                @foreach($sponsors as $sponsor)
                <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{ $sponsor->plan_name }}</h5>
                    <div class="flex items-baseline text-gray-900 dark:text-white">
                        <span class="text-3xl font-semibold">€</span>
                        <span class="text-5xl font-extrabold tracking-tight">{{ $sponsor->price }}</span>
                        <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">~{{ $sponsor->duration_time }} ore</span>
                    </div>
                    <ul role="list" class="space-y-5 my-7">
                        <li class="flex space-x-3 items-center">
                            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Apparirai primo nelle ricerche</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">avrai un badge scintillante vicino al tuo nome</span>
                        </li>
                    </ul>
                    @if ($hasActiveSponsorship)
                    @else
                        <form action="{{ route('user.generate') }}" method="post">
                            @csrf
                            <input type="hidden" name="sponsorship_id" value="{{ $sponsor->id }}">
                            <button type="submit" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center bd_btn">Scegli questo piano</button>
                        </form>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>

