<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sama Gox - Mon Quartier</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite('resources/css/app.css', 'resources/js/app.js')
        <!-- Styles -->
  
      
    </head>
    {{-- <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5  dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
      

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body> --}}
    <body class="bg-gradient-to-br from-gray-50 via-white to-green-50 min-h-screen">
        <!-- Hero Section -->
        <section class="relative overflow-hidden gradient-bg">
            <!-- Background decorative elements -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full animate-float"></div>
                <div class="absolute top-32 right-20 w-20 h-20 bg-yellow-300 rounded-full animate-float" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-20 left-1/4 w-16 h-16 bg-white rounded-full animate-float" style="animation-delay: 2s;"></div>
            </div>
            
            <div class="relative mx-auto px-4 sm:px-6 lg:px-8 py-20 max-w-7xl">
                <div class="text-center animate-fade-in">
                    <div class="flex justify-center mb-6">
                        <div class="flex justify-center items-center bg-white rounded-full w-20 h-20 shadow-lg">
                            <span class="text-4xl">🏛️</span>
                        </div>
                    </div>
                    <h1 class="mb-4 font-bold text-5xl text-white md:text-6xl">
                        Délégué de Quartier
                    </h1>
                    <p class="mb-2 text-2xl text-white">Quartier Médina</p>
                    <p class="mx-auto mb-8 max-w-2xl text-lg text-white/90">
                        Votre point de contact pour tous les services administratifs et communautaires du quartier
                    </p>
                    <div class="flex justify-center items-center space-x-4 text-white/80">
                        <div class="flex items-center space-x-2">
                            <span class="text-xl">📍</span>
                            <span>Dakar, Sénégal</span>
                        </div>
                        <div class="w-1 h-4 bg-white/50"></div>
                        <div class="flex items-center space-x-2">
                            <span class="text-xl">📞</span>
                            <span>+221 77 123 45 67</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Services Grid -->
        <section class="py-20">
            <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
                <div class="text-center mb-16 animate-slide-up">
                    <h2 class="mb-4 font-bold text-4xl text-gray-900">Services Disponibles</h2>
                    <p class="mx-auto max-w-2xl text-gray-600 text-lg">
                        Accédez facilement aux services essentiels de votre quartier
                    </p>
                </div>
    
                <div class="gap-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Certificate Request -->
                    <div class="glass-effect shadow-xl p-8 rounded-2xl card-hover animate-slide-up">
                        <div class="flex justify-center mb-6">
                            <div class="flex justify-center items-center bg-gradient-to-br from-green-100 to-green-200 rounded-2xl w-16 h-16">
                                <span class="text-3xl service-icon">📄</span>
                            </div>
                        </div>
                        <h3 class="mb-4 font-semibold text-center text-gray-900 text-xl">Certificat de Résidence</h3>
                        <p class="mb-6 text-center text-gray-600">
                            Demandez votre certificat de résidence en ligne pour vos démarches administratives
                        </p>
                        <button onclick="openCertificateRequest()" class="bg-senegal-green hover:bg-green-700 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl">
                            Faire une demande
                        </button>
                    </div>
    
                    <!-- File Complaint -->
                    <div class="glass-effect shadow-xl p-8 rounded-2xl card-hover animate-slide-up" style="animation-delay: 0.1s;">
                        <div class="flex justify-center mb-6">
                            <div class="flex justify-center items-center bg-gradient-to-br from-orange-100 to-orange-200 rounded-2xl w-16 h-16">
                                <span class="text-3xl">⚠️</span>
                            </div>
                        </div>
                        <h3 class="mb-4 font-semibold text-center text-gray-900 text-xl">Signaler un Problème</h3>
                        <p class="mb-6 text-center text-gray-600">
                            Signalez les problèmes du quartier: voirie, éclairage, nuisances, etc.
                        </p>
                        <button onclick="openComplaintForm()" class="bg-orange-500 hover:bg-orange-600 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl">
                            Signaler
                        </button>
                    </div>
    
                    <!-- Events -->
                    <div class="glass-effect shadow-xl p-8 rounded-2xl card-hover animate-slide-up" style="animation-delay: 0.2s;">
                        <div class="flex justify-center mb-6">
                            <div class="flex justify-center items-center bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl w-16 h-16">
                                <span class="text-3xl">📅</span>
                            </div>
                        </div>
                        <h3 class="mb-4 font-semibold text-center text-gray-900 text-xl">Événements</h3>
                        <p class="mb-6 text-center text-gray-600">
                            Consultez les événements et activités organisés dans le quartier
                        </p>
                        <button onclick="showEvents()" class="bg-purple-500 hover:bg-purple-600 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl">
                            Voir les événements
                        </button>
                    </div>
    
                    <!-- Contact -->
                    <div class="glass-effect shadow-xl p-8 rounded-2xl card-hover animate-slide-up" style="animation-delay: 0.3s;">
                        <div class="flex justify-center mb-6">
                            <div class="flex justify-center items-center bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl w-16 h-16">
                                <span class="text-3xl">📞</span>
                            </div>
                        </div>
                        <h3 class="mb-4 font-semibold text-center text-gray-900 text-xl">Contact Direct</h3>
                        <p class="mb-6 text-center text-gray-600">
                            Contactez directement le délégué pour vos questions urgentes
                        </p>
                        <button onclick="showContact()" class="bg-blue-500 hover:bg-blue-600 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl">
                            Contacter
                        </button>
                    </div>
    
                    <!-- Information -->
                    <div class="glass-effect shadow-xl p-8 rounded-2xl card-hover animate-slide-up" style="animation-delay: 0.4s;">
                        <div class="flex justify-center mb-6">
                            <div class="flex justify-center items-center bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-2xl w-16 h-16">
                                <span class="text-3xl">📢</span>
                            </div>
                        </div>
                        <h3 class="mb-4 font-semibold text-center text-gray-900 text-xl">Informations</h3>
                        <p class="mb-6 text-center text-gray-600">
                            Accédez aux annonces et informations importantes du quartier
                        </p>
                        <button onclick="showInfo()" class="bg-indigo-500 hover:bg-indigo-600 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl">
                            Voir les infos
                        </button>
                    </div>
    
                    <!-- Community -->
                    <div class="glass-effect shadow-xl p-8 rounded-2xl card-hover animate-slide-up" style="animation-delay: 0.5s;">
                        <div class="flex justify-center mb-6">
                            <div class="flex justify-center items-center bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl w-16 h-16">
                                <span class="text-3xl">🤝</span>
                            </div>
                        </div>
                        <h3 class="mb-4 font-semibold text-center text-gray-900 text-xl">Communauté</h3>
                        <p class="mb-6 text-center text-gray-600">
                            Participez à la vie communautaire et aux initiatives du quartier
                        </p>
                        <button onclick="showCommunity()" class="bg-pink-500 hover:bg-pink-600 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl">
                            Participer
                        </button>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Quick Stats -->
        <section class="bg-gray-50 py-16">
            <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
                <div class="gap-8 grid grid-cols-1 md:grid-cols-4 text-center">
                    <div class="animate-slide-up">
                        <div class="mb-2 font-bold text-3xl text-senegal-green">1,247</div>
                        <div class="text-gray-600">Résidents enregistrés</div>
                    </div>
                    <div class="animate-slide-up" style="animation-delay: 0.1s;">
                        <div class="mb-2 font-bold text-3xl text-orange-500">24h</div>
                        <div class="text-gray-600">Temps de réponse moyen</div>
                    </div>
                    <div class="animate-slide-up" style="animation-delay: 0.2s;">
                        <div class="mb-2 font-bold text-3xl text-purple-500">95%</div>
                        <div class="text-gray-600">Taux de satisfaction</div>
                    </div>
                    <div class="animate-slide-up" style="animation-delay: 0.3s;">
                        <div class="mb-2 font-bold text-3xl text-blue-500">24/7</div>
                        <div class="text-gray-600">Service disponible</div>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Footer -->
        <footer class="bg-gray-900 py-12 text-white">
            <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
                <div class="gap-8 grid grid-cols-1 md:grid-cols-3">
                    <div>
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="flex justify-center items-center bg-senegal-green rounded-full w-10 h-10">
                                <span class="font-bold text-lg">🏛️</span>
                            </div>
                            <h3 class="font-bold text-xl">Délégué de Quartier</h3>
                        </div>
                        <p class="text-gray-300">
                            Au service des résidents du quartier Médina pour un cadre de vie meilleur.
                        </p>
                    </div>
                    <div>
                        <h4 class="mb-4 font-semibold">Contact</h4>
                        <div class="space-y-2 text-gray-300">
                            <p>📍 Quartier Médina, Dakar</p>
                            <p>📞 +221 77 123 45 67</p>
                            <p>✉️ delegue.medina@quartier.sn</p>
                        </div>
                    </div>
                    <div>
                        <h4 class="mb-4 font-semibold">Heures d'ouverture</h4>
                        <div class="space-y-2 text-gray-300">
                            <p>Lundi - Vendredi: 8h - 17h</p>
                            <p>Samedi: 8h - 13h</p>
                            <p>Urgences: 24h/24</p>
                        </div>
                    </div>
                </div>
                <div class="border-gray-700 border-t mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2025 Délégué de Quartier Médina. Tous droits réservés.</p>
                </div>
            </div>
        </footer>
    
        <!-- Modal -->
        <div id="modal" class="hidden z-50 fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm">
            <div class="flex justify-center items-center p-4 min-h-screen">
                <div class="glass-effect shadow-2xl rounded-2xl w-full max-w-md animate-slide-up">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-semibold text-gray-900 text-xl" id="modalTitle">Titre</h3>
                            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
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
    
        {{-- <script>
            // Sample data
            const upcomingEvents = [
                {
                    title: "Assemblée Générale du Quartier",
                    date: "2025-06-20",
                    time: "15:00",
                    location: "Place du marché"
                },
                {
                    title: "Journée de Salubrité",
                    date: "2025-06-25",
                    time: "08:00",
                    location: "Tout le quartier"
                }
            ];
    
            const announcements = [
                {
                    title: "Nouveaux horaires de collecte des déchets",
                    content: "Les déchets seront collectés tous les mardis et vendredis à partir de 6h.",
                    date: "2025-06-15"
                },
                {
                    title: "Travaux d'éclairage public",
                    content: "Installation de nouveaux lampadaires sur l'avenue principale du 20 au 25 juin.",
                    date: "2025-06-12"
                }
            ];
    
            // Modal functions
            function showModal(title, content) {
                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalContent').innerHTML = content;
                document.getElementById('modal').classList.remove('hidden');
            }
    
            function closeModal() {
                document.getElementById('modal').classList.add('hidden');
            }
    
            // Service functions
            function openCertificateRequest() {
                const content = `
                    <form onsubmit="submitCertificateRequest(event)" class="space-y-4">
                        <div>
                            <label class="block font-medium text-gray-700 text-sm mb-2">Nom complet</label>
                            <input type="text" name="name" required class="px-4 py-3 border border-gray-300 focus:border-senegal-green rounded-xl focus:ring-2 focus:ring-senegal-green focus:ring-opacity-20 w-full transition-all">
                        </div>
                        <div>
                            <label class="block font-medium text-gray-700 text-sm mb-2">Adresse</label>
                            <input type="text" name="address" required class="px-4 py-3 border border-gray-300 focus:border-senegal-green rounded-xl focus:ring-2 focus:ring-senegal-green focus:ring-opacity-20 w-full transition-all">
                        </div>
                        <div>
                            <label class="block font-medium text-gray-700 text-sm mb-2">Téléphone</label>
                            <input type="tel" name="phone" required class="px-4 py-3 border border-gray-300 focus:border-senegal-green rounded-xl focus:ring-2 focus:ring-senegal-green focus:ring-opacity-20 w-full transition-all">
                        </div>
                        <div>
                            <label class="block font-medium text-gray-700 text-sm mb-2">Motif de la demande</label>
                            <select name="purpose" required class="px-4 py-3 border border-gray-300 focus:border-senegal-green rounded-xl focus:ring-2 focus:ring-senegal-green focus:ring-opacity-20 w-full transition-all">
                                <option value="">Sélectionner...</option>
                                <option value="Emploi">Emploi</option>
                                <option value="Banque">Banque</option>
                                <option value="École">École</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <div class="flex justify-end space-x-3 pt-4">
                            <button type="button" onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl font-medium text-gray-700 transition-all">
                                Annuler
                            </button>
                            <button type="submit" class="bg-senegal-green hover:bg-green-700 px-6 py-3 rounded-xl font-medium text-white transition-all">
                                Envoyer la demande
                            </button>
                        </div>
                    </form>
                `;
                showModal('Demande de Certificat de Résidence', content);
            }
    
            function openComplaintForm() {
                const content = `
                    <form onsubmit="submitComplaint(event)" class="space-y-4">
                        <div>
                            <label class="block font-medium text-gray-700 text-sm mb-2">Votre nom</label>
                            <input type="text" name="name" required class="px-4 py-3 border border-gray-300 focus:border-orange-500 rounded-xl focus:ring-2 focus:ring-orange-500 focus:ring-opacity-20 w-full transition-all">
                        </div>
                        <div>
                            <label class="block font-medium text-gray-700 text-sm mb-2">Type de problème</label>
                            <select name="type" required class="px-4 py-3 border border-gray-300 focus:border-orange-500 rounded-xl focus:ring-2 focus:ring-orange-500 focus:ring-opacity-20 w-full transition-all">
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
                            <label class="block font-medium text-gray-700 text-sm mb-2">Description du problème</label>
                            <textarea name="description" required rows="3" class="px-4 py-3 border border-gray-300 focus:border-orange-500 rounded-xl focus:ring-2 focus:ring-orange-500 focus:ring-opacity-20 w-full transition-all resize-none"></textarea>
                        </div>
                        <div>
                            <label class="block font-medium text-gray-700 text-sm mb-2">Adresse concernée</label>
                            <input type="text" name="address" required class="px-4 py-3 border border-gray-300 focus:border-orange-500 rounded-xl focus:ring-2 focus:ring-orange-500 focus:ring-opacity-20 w-full transition-all">
                        </div>
                        <div class="flex justify-end space-x-3 pt-4">
                            <button type="button" onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl font-medium text-gray-700 transition-all">
                                Annuler
                            </button>
                            <button type="submit" class="bg-orange-500 hover:bg-orange-600 px-6 py-3 rounded-xl font-medium text-white transition-all">
                                Signaler
                            </button>
                        </div>
                    </form>
                `;
                showModal('Signaler un Problème', content);
            }
    
            function showEvents() {
                const content = `
                    <div class="space-y-4">
                        <h4 class="font-semibold text-gray-900 text-lg mb-4">Événements à venir</h4>
                        ${upcomingEvents.map(event => `
                            <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200">
                                <h5 class="font-medium text-gray-900 mb-2">${event.title}</h5>
                                <div class="flex items-center space-x-4 text-gray-600 text-sm">
                                    <span>📅 ${new Date(event.date).toLocaleDateString('fr-FR')}</span>
                                    <span>🕐 ${event.time}</span>
                                </div>
                                <p class="text-gray-600 text-sm mt-1">📍 ${event.location}</p>
                            </div>
                        `).join('')}
                        <div class="flex justify-end pt-4">
                            <button onclick="closeModal()" class="bg-purple-500 hover:bg-purple-600 px-6 py-3 rounded-xl font-medium text-white transition-all">
                                Fermer
                            </button>
                        </div>
                    </div>
                `;
                showModal('Événements du Quartier', content);
            }
    
            function showContact() {
                const content = `
                    <div class="space-y-6">
                        <div class="text-center">
                            <div class="flex justify-center mb-4">
                                <div class="flex justify-center items-center bg-blue-100 rounded-full w-16 h-16">
                                    <span class="text-3xl">📞</span>
                                </div>
                            </div>
                            <h4 class="font-semibold text-gray-900 text-lg mb-4">Contactez le Délégué</h4>
                        </div>
                        <div class="space-y-4">
                            <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                                <div class="flex items-center space-x-3">
                                    <span class="text-xl">📱</span>
                                    <div>
                                        <p class="font-medium text-gray-900">Téléphone</p>
                                        <p class="text-blue-600">+221 77 123 45 67</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                                <div class="flex items-center space-x-3">
                                    <span class="text-xl">✉️</span>
                                    <div>
                                        <p class="font-medium text-gray-900">Email</p>
                                        <p class="text-green-600">delegue.medina@quartier.sn</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 p-4 rounded-xl border border-indigo-200">
                                <div class="flex items-center space-x-3">
                                    <span class="text-xl">🕐</span>
                                    <div>
                                        <p class="font-medium text-gray-900">Heures d'ouverture</p>
                                        <p class="text-indigo-600 text-sm">Lun-Ven: 8h-17h | Sam: 8h-13h</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end pt-4">
                            <button onclick="closeModal()" class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-xl font-medium text-white transition-all">
                                Fermer
                            </button>
                        </div>
                    </div>
                `;
                showModal('Contact', content);
            }
    
            function showInfo() {
                const content = `
                    <div class="space-y-4">
                        <h4 class="font-semibold text-gray-900 text-lg mb-4">Informations du Quartier</h4>
                        ${announcements.map(announcement => `
                            <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 p-4 rounded-xl border border-indigo-200">
                                <h5 class="font-medium text-gray-900 mb-2">${announcement.title}</h5>
                                <p class="text-gray-600 text-sm mb-2">${announcement.content}</p>
                                <p class="text-indigo-600 text-xs">📅 ${new Date(announcement.date).toLocaleDateString('fr-FR')}</p>
                            </div>
                        `).join('')}
                        <div class="flex justify-end pt-4">
                            <button onclick="closeModal()" class="bg-indigo-500 hover:bg-indigo-600 px-6 py-3 rounded-xl font-medium text-white transition-all">
                                Fermer
                            </button>
                        </div>
                    </div>
                `;
                showModal('Informations', content);
            }
    
            function showCommunity() {
                const content = `
                    <div class="space-y-6">
                                        <div class="text-center">
                            <div class="flex justify-center mb-4">
                                <div class="flex justify-center items-center bg-pink-100 rounded-full w-16 h-16">
                                    <span class="text-3xl">🤝</span>
                                </div>
                            </div>
                            <h4 class="font-semibold text-gray-900 text-lg mb-4">Participez à la vie du quartier</h4>
                            <p class="text-gray-600 text-sm">Rejoignez les actions communautaires et les groupes citoyens pour un quartier plus solidaire.</p>
                        </div>
                        <div class="text-center pt-6">
                            <a href="mailto:delegue.medina@quartier.sn" class="bg-pink-500 hover:bg-pink-600 px-6 py-3 rounded-xl font-medium text-white transition-all inline-block">
                                S’impliquer maintenant
                            </a>
                        </div>
                        <div class="flex justify-end pt-6">
                            <button onclick="closeModal()" class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-xl font-medium text-gray-800 transition-all">
                                Fermer
                            </button>
                        </div>
                    </div>
                `;
                showModal('Communauté', content);
            }
    
            // Simulations d’envoi de formulaire
            function submitCertificateRequest(event) {
                event.preventDefault();
                const form = event.target;
                alert(`Demande envoyée pour ${form.name.value}. Le certificat sera traité sous 24h.`);
                closeModal();
            }
    
            function submitComplaint(event) {
                event.preventDefault();
                const form = event.target;
                alert(`Plainte enregistrée concernant ${form.type.value}. Merci pour votre signalement.`);
                closeModal();
            }
        </script> --}}
    </body>
</html>
