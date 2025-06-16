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
                <flux:dropdown class="lg:block" position="bottom" align="start">
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
@push('scripts')
<script>
    // Data storage
    let certificates = [{
            id: 1,
            applicant: "Fatou Diop",
            address: "Rue 12, Médina",
            phone: "77 123 45 67",
            requestDate: "2025-06-10",
            status: "En attente",
            purpose: "Emploi"
        },
        {
            id: 2,
            applicant: "Mamadou Fall",
            address: "Avenue Bourguiba, Médina",
            phone: "76 987 65 43",
            requestDate: "2025-06-08",
            status: "Approuvé",
            purpose: "Banque"
        }
    ];

    let complaints = [{
            id: 1,
            complainant: "Aminata Sow",
            type: "Nuisance sonore",
            description: "Musique forte tous les soirs après 22h",
            address: "Rue 8, Médina",
            date: "2025-06-12",
            status: "Ouvert",
            priority: "Moyenne"
        },
        {
            id: 2,
            complainant: "Ousmane Ndiaye",
            type: "Voirie",
            description: "Nids de poule dangereux sur la route principale",
            address: "Avenue Cheikh Anta Diop",
            date: "2025-06-11",
            status: "En cours",
            priority: "Haute"
        }
    ];

    let residents = [{
            id: 1,
            name: "Aïssatou Ba",
            address: "Rue 15, Médina",
            phone: "77 555 66 77",
            profession: "Commerçante",
            family: 4,
            registrationDate: "2023-03-15"
        },
        {
            id: 2,
            name: "Ibrahima Sarr",
            address: "Avenue Malick Sy",
            phone: "76 444 55 66",
            profession: "Enseignant",
            family: 6,
            registrationDate: "2022-11-20"
        }
    ];

    let events = [{
            id: 1,
            title: "Assemblée Générale du Quartier",
            date: "2025-06-20",
            time: "15:00",
            location: "Place du marché",
            description: "Discussion sur les projets d'amélioration du quartier",
            type: "Réunion"
        },
        {
            id: 2,
            title: "Journée de Salubrité",
            date: "2025-06-25",
            time: "08:00",
            location: "Tout le quartier",
            description: "Nettoyage collectif des rues et espaces publics",
            type: "Communautaire"
        }
    ];

    // Tab switching
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            const tabName = this.dataset.tab;

            // Update active tab
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active', 'border-senegal-green', 'text-senegal-green');
                btn.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700',
                    'hover:border-gray-300');
            });

            this.classList.add('active', 'border-senegal-green', 'text-senegal-green');
            this.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700',
                'hover:border-gray-300');

            // Show corresponding content
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            document.getElementById(tabName + '-section').classList.remove('hidden');

            // Load content based on tab
            switch (tabName) {
                case 'certificates':
                    loadCertificates();
                    break;
                case 'complaints':
                    loadComplaints();
                    break;
                case 'residents':
                    loadResidents();
                    break;
                case 'events':
                    loadEvents();
                    break;
            }
        });
    });

    // Load certificates
    function loadCertificates() {
        const container = document.getElementById('certificatesList');
        container.innerHTML = certificates.map(cert => `
            <div class="hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition-colors">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h3 class="font-medium text-gray-900">${cert.applicant}</h3>
                        <p class="text-gray-600 text-sm">${cert.address}</p>
                        <p class="text-gray-600 text-sm">Téléphone: ${cert.phone}</p>
                        <p class="text-gray-600 text-sm">Motif: ${cert.purpose}</p>
                        <p class="mt-1 text-gray-500 text-xs">Demandé le ${new Date(cert.requestDate).toLocaleDateString('fr-FR')}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="px-2 py-1 text-xs rounded-full ${cert.status === 'Approuvé' ? 'bg-green-100 text-green-800' : cert.status === 'Rejeté' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800'}">${cert.status}</span>
                        <button onclick="approveCertificate(${cert.id})" class="text-green-600 hover:text-green-800 text-sm">✓</button>
                        <button onclick="rejectCertificate(${cert.id})" class="text-red-600 hover:text-red-800 text-sm">✕</button>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Load complaints
    function loadComplaints() {
        const container = document.getElementById('complaintsList');
        container.innerHTML = complaints.map(complaint => `
            <div class="hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition-colors">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h3 class="font-medium text-gray-900">${complaint.complainant}</h3>
                        <p class="font-medium text-gray-700 text-sm">${complaint.type}</p>
                        <p class="mt-1 text-gray-600 text-sm">${complaint.description}</p>
                        <p class="text-gray-600 text-sm">Adresse: ${complaint.address}</p>
                        <p class="mt-1 text-gray-500 text-xs">Signalé le ${new Date(complaint.date).toLocaleDateString('fr-FR')}</p>
                    </div>
                    <div class="flex flex-col items-end space-y-2">
                        <span class="px-2 py-1 text-xs rounded-full ${complaint.priority === 'Haute' ? 'bg-red-100 text-red-800' : complaint.priority === 'Moyenne' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800'}">${complaint.priority}</span>
                        <span class="px-2 py-1 text-xs rounded-full ${complaint.status === 'Résolu' ? 'bg-green-100 text-green-800' : complaint.status === 'Fermé' ? 'bg-gray-100 text-gray-800' : 'bg-blue-100 text-blue-800'}">${complaint.status}</span>
                        <button onclick="resolveComplaint(${complaint.id})" class="text-green-600 hover:text-green-800 text-sm">Résoudre</button>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Load residents
    function loadResidents() {
        const container = document.getElementById('residentsList');
        container.innerHTML = residents.map(resident => `
            <div class="hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition-colors">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h3 class="font-medium text-gray-900">${resident.name}</h3>
                        <p class="text-gray-600 text-sm">${resident.address}</p>
                        <p class="text-gray-600 text-sm">Téléphone: ${resident.phone}</p>
                        <p class="text-gray-600 text-sm">Profession: ${resident.profession}</p>
                        <p class="text-gray-600 text-sm">Membres de famille: ${resident.family}</p>
                        <p class="mt-1 text-gray-500 text-xs">Enregistré le ${new Date(resident.registrationDate).toLocaleDateString('fr-FR')}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="editResident(${resident.id})" class="text-blue-600 hover:text-blue-800 text-sm">Modifier</button>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Load events
    function loadEvents() {
        const container = document.getElementById('eventsList');
        container.innerHTML = events.map(event => `
            <div class="hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition-colors">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h3 class="font-medium text-gray-900">${event.title}</h3>
                        <p class="text-gray-600 text-sm">${event.description}</p>
                        <div class="flex items-center space-x-4 mt-2 text-gray-600 text-sm">
                            <span>📅 ${new Date(event.date).toLocaleDateString('fr-FR')}</span>
                            <span>🕐 ${event.time}</span>
                            <span>📍 ${event.location}</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="bg-purple-100 px-2 py-1 rounded-full text-purple-800 text-xs">${event.type}</span>
                        <button onclick="editEvent(${event.id})" class="text-purple-600 hover:text-purple-800 text-sm">Modifier</button>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Modal functions
    function showModal(title, content) {
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalContent').innerHTML = content;
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }

    // Form functions
    function showNewCertificateForm() {
        const content = `
            <form onsubmit="addCertificate(event)" class="space-y-4">
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Nom du demandeur</label>
                    <input type="text" name="applicant" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-senegal-green rounded-md focus:ring-senegal-green w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Adresse</label>
                    <input type="text" name="address" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-senegal-green rounded-md focus:ring-senegal-green w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Téléphone</label>
                    <input type="tel" name="phone" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-senegal-green rounded-md focus:ring-senegal-green w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Motif</label>
                    <select name="purpose" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-senegal-green rounded-md focus:ring-senegal-green w-full">
                        <option value="">Sélectionner...</option>
                        <option value="Emploi">Emploi</option>
                        <option value="Banque">Banque</option>
                        <option value="École">École</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-gray-700">Annuler</button>
                    <button type="submit" class="bg-senegal-green hover:bg-green-700 px-4 py-2 rounded-md text-white">Ajouter</button>
                </div>
            </form>
        `;
        showModal('Nouvelle Demande de Certificat', content);
    }

    function showNewComplaintForm() {
        const content = `
            <form onsubmit="addComplaint(event)" class="space-y-4">
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Nom du plaignant</label>
                    <input type="text" name="complainant" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Type de plainte</label>
                    <select name="type" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full">
                        <option value="">Sélectionner...</option>
                        <option value="Nuisance sonore">Nuisance sonore</option>
                        <option value="Voirie">Voirie</option>
                        <option value="Éclairage">Éclairage</option>
                        <option value="Déchets">Déchets</option>
                        <option value="Sécurité">Sécurité</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Description</label>
                    <textarea name="description" required rows="3" class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full"></textarea>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Adresse concernée</label>
                    <input type="text" name="address" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Priorité</label>
                    <select name="priority" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full">
                        <option value="Basse">Basse</option>
                        <option value="Moyenne" selected>Moyenne</option>
                        <option value="Haute">Haute</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-gray-700">Annuler</button>
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-md text-white">Ajouter</button>
                </div>
            </form>
        `;
        showModal('Nouvelle Plainte', content);
    }

    function showNewResidentForm() {
        const content = `
            <form onsubmit="addResident(event)" class="space-y-4">
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Nom complet</label>
                    <input type="text" name="name" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Adresse</label>
                    <input type="text" name="address" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Téléphone</label>
                    <input type="tel" name="phone" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Profession</label>
                    <input type="text" name="profession" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Nombre de membres de la famille</label>
                    <input type="number" name="family" required min="1" class="mt-1 px-3 py-2 border border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-gray-700">Annuler</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md text-white">Ajouter</button>
                </div>
            </form>
        `;
        showModal('Nouveau Résident', content);
    }

    function showNewEventForm() {
        const content = `
            <form onsubmit="addEvent(event)" class="space-y-4">
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Titre de l'événement</label>
                    <input type="text" name="title" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Date</label>
                    <input type="date" name="date" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Heure</label>
                    <input type="time" name="time" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Lieu</label>
                    <input type="text" name="location" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Type</label>
                    <select name="type" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full">
                        <option value="Réunion">Réunion</option>
                        <option value="Communautaire">Communautaire</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 text-sm">Description</label>
                    <textarea name="description" required rows="3" class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full"></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-gray-700">Annuler</button>
                    <button type="submit" class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-md text-white">Ajouter</button>
                </div>
            </form>
        `;
        showModal('Nouvel Événement', content);
    }

    // Add logic
    function addCertificate(event) {
        event.preventDefault();
        const form = event.target;
        certificates.push({
            id: certificates.length + 1,
            applicant: form.applicant.value,
            address: form.address.value,
            phone: form.phone.value,
            requestDate: new Date().toISOString(),
            status: "En attente",
            purpose: form.purpose.value
        });
        closeModal();
        loadCertificates();
    }

    function addComplaint(event) {
        event.preventDefault();
        const form = event.target;
        complaints.push({
            id: complaints.length + 1,
            complainant: form.complainant.value,
            type: form.type.value,
            description: form.description.value,
            address: form.address.value,
            date: new Date().toISOString(),
            status: "Ouvert",
            priority: form.priority.value
        });
        closeModal();
        loadComplaints();
    }

    function addResident(event) {
        event.preventDefault();
        const form = event.target;
        residents.push({
            id: residents.length + 1,
            name: form.name.value,
            address: form.address.value,
            phone: form.phone.value,
            profession: form.profession.value,
            family: parseInt(form.family.value),
            registrationDate: new Date().toISOString()
        });
        closeModal();
        loadResidents();
    }

    function addEvent(event) {
        event.preventDefault();
        const form = event.target;
        events.push({
            id: events.length + 1,
            title: form.title.value,
            date: form.date.value,
            time: form.time.value,
            location: form.location.value,
            description: form.description.value,
            type: form.type.value
        });
        closeModal();
        loadEvents();
    }

    // Status updates
    function approveCertificate(id) {
        const cert = certificates.find(c => c.id === id);
        if (cert) {
            cert.status = 'Approuvé';
            loadCertificates();
        }
    }

    function rejectCertificate(id) {
        const cert = certificates.find(c => c.id === id);
        if (cert) {
            cert.status = 'Rejeté';
            loadCertificates();
        }
    }

    function resolveComplaint(id) {
        const comp = complaints.find(c => c.id === id);
        if (comp) {
            comp.status = 'Résolu';
            loadComplaints();
        }
    }

    // Init: load default tab
    window.addEventListener('DOMContentLoaded', () => {
        document.querySelector('[data-tab="certificates"]').click();
    });
</script>
@endpush
