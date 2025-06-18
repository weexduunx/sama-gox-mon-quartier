<div>
    <!-- Navigation -->
    <nav class="shadow-lg text-white gradient-bg">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="flex justify-center items-center bg-white rounded-full w-10 h-10">
                        <span class="font-bold text-senegal-green text-lg">🏛️</span>
                    </div>
                    <h1 class="font-bold text-xl">Sama Gox - Mon Quartier</h1>
                </div>
                @auth
                    <flux:dropdown class="lg:block" position="bottom" align="start">
                        {{-- Correction ici: auth()->user() au lieu de auth() - > user() --}}
                        <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                                        icon:trailing="chevrons-up-down" />
    
                        <flux:menu class="w-[220px]">
                            <flux:menu.radio.group>
                                <div class="p-0 text-sm font-normal">
                                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                        <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                            <span
                                                class="flex h-full w-full items-center justify-center rounded-lg bg-white text-black dark:bg-neutral-700 dark:text-white">
                                                {{-- Correction ici: auth()->user()->initials() --}}
                                                {{ auth()->user()->initials() }}
                                            </span>
                                        </span>
    
                                        <div class="grid flex-1 text-start text-sm leading-tight">
                                            {{-- Correction ici: auth()->user()->name et auth()->user()->email --}}
                                            <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                            <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </flux:menu.radio.group>
    
                            <flux:menu.separator />
    
                            <flux:menu.radio.group>
                                {{-- Assurez-vous que la route 'settings.profile' existe --}}
                                <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                                    {{ __('Settings') }}</flux:menu.item>
                            </flux:menu.radio.group>
    
                            <flux:menu.separator />
    
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                                    class="w-full">
                                    {{ __('Log Out') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                @else
                    {{-- Si l'utilisateur n'est pas authentifié, vous pouvez afficher des liens de connexion/inscription --}}
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Se connecter</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white hover:text-gray-200">S'inscrire</a>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Dashboard -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-8 max-w-7xl">
        <div class="gap-6 grid grid-cols-1 md:grid-cols-4 mb-8">
            <div class="bg-white shadow-md p-6 rounded-xl card-hover">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium text-gray-600 text-sm">Certificats en attente</p>
                        <p class="font-bold text-senegal-green text-3xl">{{ $pendingCertificatesCount }}</p>
                    </div>
                    <div class="flex justify-center items-center bg-senegal-green bg-opacity-10 rounded-lg w-12 h-12">
                        <span class="text-2xl">📄</span>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md p-6 rounded-xl card-hover">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium text-gray-600 text-sm">Plaintes ouvertes</p>
                        <p class="font-bold text-orange-500 text-3xl">{{ $openComplaintsCount }}</p>
                    </div>
                    <div class="flex justify-center items-center bg-orange-100 rounded-lg w-12 h-12">
                        <span class="text-2xl">⚠️</span>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md p-6 rounded-xl card-hover">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium text-gray-600 text-sm">Résidents enregistrés</p>
                        <p class="font-bold text-blue-500 text-3xl">{{ $totalResidentsCount }}</p>
                    </div>
                    <div class="flex justify-center items-center bg-blue-100 rounded-lg w-12 h-12">
                        <span class="text-2xl">👥</span>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md p-6 rounded-xl card-hover">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium text-gray-600 text-sm">Événements ce mois</p>
                        <p class="font-bold text-purple-500 text-3xl">{{ $monthlyEventsCount }}</p>
                    </div>
                    <div class="flex justify-center items-center bg-purple-100 rounded-lg w-12 h-12">
                        <span class="text-2xl">📅</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-md mb-6 rounded-xl">
            <div class="border-gray-200 border-b">
                <nav class="flex space-x-8 px-6">
                    <button wire:click="setActiveTab('certificates')"
                        class="px-1 py-4 border-b-2 font-medium text-sm tab-button cursor-pointer {{ $activeTab == 'certificates' ? 'active border-senegal-green text-senegal-green' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Certificats de Résidence
                    </button>
                    <button wire:click="setActiveTab('complaints')"
                        class="px-1 py-4 border-b-2 font-medium text-sm tab-button cursor-pointer {{ $activeTab == 'complaints' ? 'active border-senegal-green text-senegal-green' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Plaintes et Réclamations
                    </button>
                    <button wire:click="setActiveTab('residents')"
                        class="px-1 py-4 border-b-2 font-medium text-sm tab-button cursor-pointer {{ $activeTab == 'residents' ? 'active border-senegal-green text-senegal-green' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Registre des Résidents
                    </button>
                    <button wire:click="setActiveTab('events')"
                        class="px-1 py-4 border-b-2 font-medium text-sm tab-button cursor-pointer {{ $activeTab == 'events' ? 'active border-senegal-green text-senegal-green' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Événements
                    </button>
                </nav>
            </div>
        </div>

        @if ($activeTab == 'certificates')
            @livewire('admin.certificates', key('certificates-component'))
        @elseif ($activeTab == 'complaints')
            @livewire('admin.complaints', key('complaints-component'))
        @elseif ($activeTab == 'residents')
            @livewire('admin.residents', key('residents-component'))
        @elseif ($activeTab == 'events')
            @livewire('admin.events', key('events-component'))
        @endif
    </div>

</div>

