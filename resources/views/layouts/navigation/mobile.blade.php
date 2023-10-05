<nav id="mobilebar" class="fixed z-10 bottom-5 left-5 right-5 h-24 transition-transform translate-y-0 xl:-translate-y-[-150%]" role="navigation">
    <div class="h-full px-3 py-4 overflow-y-hidden flex flex-row items-center justify-between dark:bg-gray-800">
        <section class="flex flex-row">
            <ul class="flex flex-row items-center gap-4">
                {{-- Route Dashboard --}}
                <li class="flex flex-col items-center">
                    <a href="{{ route('user.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 hover:shadow-md group {{ Route::currentRouteName() == 'user.dashboard' ? 'bg-gray-100 shadow-md' : '' }}">
                       <i class="fa-solid fa-table-list text-lg leading-5 w-5 h-5 transition duration-75 group-hover:text-bd_primary-color {{ Route::currentRouteName() == 'user.dashboard' ? 'text-bd_primary-color' : 'text-gray-500' }}"></i>
                    </a>
                    <span class="text-sm">Dashboard</span>
                </li>

                {{-- Route Stats --}}
                <li class="hidden sm:flex sm:flex-col sm:items-center">
                    <a href="{{ route('user.stats') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 hover:shadow-md group {{ Route::currentRouteName() == 'user.stats' ? 'bg-gray-100 shadow-md' : '' }}">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-bd_primary-color {{ Route::currentRouteName() == 'user.stats' ? 'text-bd_primary-color' : 'text-gray-500' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                           <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                    </a>
                    <span class="text-sm">Statistiche</span>
                </li>

                {{-- Route Messages --}}
                <li class="hidden sm:flex sm:flex-col sm:items-center">
                    <a href="{{ route('user.messages') }}"
                    class="flex items-center relative p-2 text-gray-900 rounded-lg hover:bg-gray-100 hover:shadow-md group {{ Route::currentRouteName() == 'user.messages' ? 'bg-gray-100 shadow-md' : '' }}">
                        <i class="fa-solid fa-envelope w-5 h-5 text-xl leading-5 transition duration-75 group-hover:text-bd_primary-color {{ Route::currentRouteName() == 'user.messages' ? 'text-bd_primary-color' : 'text-gray-500' }}"></i>
                    </a>
                    <span class="text-sm">Messaggi</span>
                </li>

                {{-- Route Reviews --}}
                <li class="hidden sm:flex sm:flex-col sm:items-center">
                    <a href="{{ route('user.reviews') }}"
                    class="flex items-center relative p-2 text-gray-900 rounded-lg hover:bg-gray-100 hover:shadow-md group {{ Route::currentRouteName() == 'user.reviews' ? 'bg-gray-100 shadow-md' : '' }}">
                       <svg class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-bd_primary-color {{ Route::currentRouteName() == 'user.reviews' ? 'text-bd_primary-color' : 'text-gray-500' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                          <path d="M18 0H6a2 2 0 0 0-2 2h14v12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z"/>
                          <path d="M14 4H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM2 16v-6h12v6H2Z"/>
                       </svg>
                    </a>
                    <span class="text-sm">Recensioni</span>
                </li>
            </ul>

            <ul class="flex flex-row pl-4 gap-2 sm:ml-4 space-x-2 font-medium sm:border-l border-black dark:border-gray-700">
                @if(auth()->user() && !auth()->user()->userDetail)
                    {{-- Route Create Doctor Profile --}}
                    <li class="flex flex-col items-center">
                        <a href="{{ route('user.create') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 hover:shadow-md group {{ Route::currentRouteName() == 'user.create' ? 'bg-gray-100 shadow-md' : '' }}">
                            <svg class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-bd_primary-color {{ Route::currentRouteName() == 'user.create' ? 'text-bd_primary-color' : 'text-gray-500 ' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 17 20">
                              <path d="M7.958 19.393a7.7 7.7 0 0 1-6.715-3.439c-2.868-4.832 0-9.376.944-10.654l.091-.122a3.286 3.286 0 0 0 .765-3.288A1 1 0 0 1 4.6.8c.133.1.313.212.525.347A10.451 10.451 0 0 1 10.6 9.3c.5-1.06.772-2.213.8-3.385a1 1 0 0 1 1.592-.758c1.636 1.205 4.638 6.081 2.019 10.441a8.177 8.177 0 0 1-7.053 3.795Z"/>
                           </svg>
                        </a>
                        <span class="text-sm">Crea Profilo</span>
                    </li>
                @else
                {{-- Route Edit Doctor Profile --}}
                <li class="flex flex-col items-center">
                    <a href="{{ route('user.edit') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 hover:shadow-md group {{ Route::currentRouteName() == 'user.edit' ? 'bg-gray-100 shadow-md' : '' }}">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-bd_primary-color {{ Route::currentRouteName() == 'user.edit' ? 'text-bd_primary-color' : 'text-gray-500' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                        </svg>
                    </a>
                    <span class="text-sm">Edita profilo</span>
                </li>
                {{-- Route Sponsorships Doctor Profile --}}
                <li class="flex flex-col items-center">
                    <a href="{{ route('user.sponsorships') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 hover:shadow-md group {{ Route::currentRouteName() == 'user.sponsorships' ? 'bg-gray-100 shadow-md' : '' }}">
                        <svg class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-bd_sponsorships-color {{ Route::currentRouteName() == 'user.sponsorships' ? 'text-bd_sponsorships-color' : 'text-gray-500 ' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 17 20">
                            <path d="M7.958 19.393a7.7 7.7 0 0 1-6.715-3.439c-2.868-4.832 0-9.376.944-10.654l.091-.122a3.286 3.286 0 0 0 .765-3.288A1 1 0 0 1 4.6.8c.133.1.313.212.525.347A10.451 10.451 0 0 1 10.6 9.3c.5-1.06.772-2.213.8-3.385a1 1 0 0 1 1.592-.758c1.636 1.205 4.638 6.081 2.019 10.441a8.177 8.177 0 0 1-7.053 3.795Z"/>
                        </svg>
                    </a>
                    <span class="text-sm">Sponsor</span>
                </li>
                @endif
            </ul>

        </section>

        <section class="ml-10">
            <ul>
                <li class="flex flex-col items-center">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="userMenuMobileButton"
                        aria-expanded="false" data-dropdown-toggle="userMenuMobileDropdown" data-dropdown-placement="bottom" data-dropdown-offset-distance="10" data-dropdown-offset-skidding="-75">
                        <span class="sr-only">Open user menu</span>
                        <div class="bd_overlay-img rounded-full w-[3.15rem] h-[3.1rem]">
                            <img class="w-12 h-12 rounded-full object-center object-cover"
                                src="{{ Auth::user()->userDetail ? asset('storage/' . Auth::user()->userDetail->profile_picture) : asset('storage/' . 'images/default-profile-picture.jpg') }}"
                                alt="{{ Auth::user()->name }}'s picture">
                        </div>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="userMenuMobileDropdown" class="z-10 hidden xl:hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-56 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div class="font-medium ">{{ Auth::user()->name }}</div>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 sm:hidden" aria-labelledby="dropdownInform">
                            <li>
                                <a href="{{ route('user.stats') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">
                                    Statistiche
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.messages') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">
                                    Messaggi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.reviews') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">
                                    Recensioni
                                </a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <ul>
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">
                                        Impostazioni Utente
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                            Disconnetti
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>

        </section>
    </div>
</nav>
