<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
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
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
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
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
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
        </flux:header>

        {{ $slot }}

        @fluxScripts
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
    </body>
</html>
