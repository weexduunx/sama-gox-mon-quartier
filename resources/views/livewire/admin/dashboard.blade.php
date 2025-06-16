<div>
    <!-- Navigation -->
    <nav class="shadow-lg text-white gradient-bg">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="flex justify-center items-center bg-white rounded-full w-10 h-10">
                        <span class="font-bold text-senegal-green text-lg">🏛️</span>
                    </div>
                    <h1 class="font-bold text-xl">Délégué de Quartier</h1>
                </div>
                <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                        icon:trailing="chevrons-up-down"
                    />
    
                    <flux:menu class="w-[220px]">
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                        <span
                                            class="flex h-full w-full items-center justify-center rounded-lg bg-white text-black dark:bg-neutral-700 dark:text-white"
                                        >
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>
    
                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>
    
                        <flux:menu.separator />
    
                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                        </flux:menu.radio.group>
    
                        <flux:menu.separator />
    
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                {{ __('Log Out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            </div>
        </div>
    </nav>

    <!-- Dashboard -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-8 max-w-7xl">
        <!-- Stats Cards -->
        <div class="gap-6 grid grid-cols-1 md:grid-cols-4 mb-8">
            <div class="bg-white shadow-md p-6 rounded-xl card-hover">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium text-gray-600 text-sm">Certificats en attente</p>
                        <p class="font-bold text-senegal-green text-3xl" id="pendingCertificates">12</p>
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
                        <p class="font-bold text-orange-500 text-3xl" id="openComplaints">8</p>
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
                        <p class="font-bold text-blue-500 text-3xl" id="totalResidents">1,247</p>
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
                        <p class="font-bold text-purple-500 text-3xl" id="monthlyEvents">5</p>
                    </div>
                    <div class="flex justify-center items-center bg-purple-100 rounded-lg w-12 h-12">
                        <span class="text-2xl">📅</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="bg-white shadow-md mb-6 rounded-xl">
            <div class="border-gray-200 border-b">
                <nav class="flex space-x-8 px-6">
                    <button class="px-1 py-4 border-b-2 font-medium text-sm tab-button active" data-tab="certificates">
                        Certificats de Résidence
                    </button>
                    <button class="px-1 py-4 border-b-2 font-medium text-sm tab-button" data-tab="complaints">
                        Plaintes et Réclamations
                    </button>
                    <button class="px-1 py-4 border-b-2 font-medium text-sm tab-button" data-tab="residents">
                        Registre des Résidents
                    </button>
                    <button class="px-1 py-4 border-b-2 font-medium text-sm tab-button" data-tab="events">
                        Événements
                    </button>
                </nav>
            </div>
        </div>

        <!-- Content Sections -->

        <!-- Certificates Section -->
        <div id="certificates-section" class="animate-fade-in tab-content">
            <div class="bg-white shadow-md rounded-xl">
                <div class="p-6 border-gray-200 border-b">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-gray-900 text-xl">Demandes de Certificats de Résidence</h2>
                        <button
                            class="bg-senegal-green hover:bg-green-700 px-4 py-2 rounded-lg text-white transition-colors"
                            onclick="showNewCertificateForm()">
                            + Nouvelle Demande
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4" id="certificatesList">
                        <!-- Certificate requests will be populated here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Complaints Section -->
        <div id="complaints-section" class="hidden tab-content">
            <div class="bg-white shadow-md rounded-xl">
                <div class="p-6 border-gray-200 border-b">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-gray-900 text-xl">Plaintes et Réclamations</h2>
                        <button
                            class="bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-lg text-white transition-colors"
                            onclick="showNewComplaintForm()">
                            + Nouvelle Plainte
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4" id="complaintsList">
                        <!-- Complaints will be populated here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Residents Section -->
        <div id="residents-section" class="hidden tab-content">
            <div class="bg-white shadow-md rounded-xl">
                <div class="p-6 border-gray-200 border-b">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-gray-900 text-xl">Registre des Résidents</h2>
                        <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white transition-colors"
                            onclick="showNewResidentForm()">
                            + Nouveau Résident
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="mb-4">
                        <input type="text" id="residentSearch" placeholder="Rechercher un résident..."
                            class="px-4 py-2 border border-gray-300 focus:border-transparent rounded-lg focus:ring-2 focus:ring-senegal-green w-full">
                    </div>
                    <div class="space-y-4" id="residentsList">
                        <!-- Residents will be populated here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Events Section -->
        <div id="events-section" class="hidden tab-content">
            <div class="bg-white shadow-md rounded-xl">
                <div class="p-6 border-gray-200 border-b">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-gray-900 text-xl">Événements du Quartier</h2>
                        <button
                            class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-lg text-white transition-colors"
                            onclick="showNewEventForm()">
                            + Nouvel Événement
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4" id="eventsList">
                        <!-- Events will be populated here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="hidden z-50 fixed inset-0 bg-black bg-opacity-50">
        <div class="flex justify-center items-center p-4 min-h-screen">
            <div class="bg-white shadow-xl rounded-xl w-full max-w-md">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-semibold text-lg" id="modalTitle">Titre</h3>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                            <span class="text-2xl">&times;</span>
                        </button>
                    </div>
                    <div id="modalContent">
                        <!-- Modal content will be populated here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

 
</div>
