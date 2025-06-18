<div>
    <section class="relative overflow-hidden gradient-bg">
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
                <p class="mb-2 text-2xl text-white">Quartier Nimzat Sant Yalla</p>
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
                        <span>+221 77 467 30 68</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="text-center mb-16 animate-slide-up">
                <h2 class="mb-4 font-bold text-4xl text-gray-900">Services Disponibles</h2>
                <p class="mx-auto max-w-2xl text-gray-600 text-lg">
                    Accédez facilement aux services essentiels de votre quartier
                </p>
            </div>

            <div class="gap-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
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
                    <a href="{{ route('resident.request-certificate') }}" class="bg-green-800 hover:bg-green-700 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl flex justify-center">
                        Faire une demande
                    </a>
                </div>

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
                    <a href="{{ route('resident.track-complaint') }}" class="bg-orange-500 hover:bg-orange-600 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl flex justify-center">
                        Signaler
                    </a>
                </div>

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
                    <button wire:click="showEventsModal" class="bg-purple-500 hover:bg-purple-600 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl">
                        Voir les événements
                    </button>
                </div>

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
                    <button wire:click="showContactModal" class="bg-blue-500 hover:bg-blue-600 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl">
                        Contacter
                    </button>
                </div>

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
                    <button wire:click="showInfoModal" class="bg-indigo-500 hover:bg-indigo-600 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl">
                        Voir les infos
                    </button>
                </div>

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
                    <button wire:click="showCommunityModal" class="bg-pink-500 hover:bg-pink-600 shadow-lg py-3 rounded-xl w-full font-medium text-white transition-all hover:shadow-xl">
                        Participer
                    </button>
                </div>
            </div>
        </div>
    </section>

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

    <footer class="bg-[#028b44] py-12 text-white">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="gap-8 grid grid-cols-1 md:grid-cols-3">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="flex justify-center items-center bg-senegal-green rounded-full w-10 h-10">
                            <span class="font-bold text-lg">🏛️</span>
                        </div>
                        <h3 class="font-bold text-xl">Délégué de Quartier</h3>
                    </div>
                    <p class="text-gray-200">
                        Au service des résidents du quartier Nimzat Sant Yalla pour un cadre de vie meilleur.
                    </p>
                </div>
                <div>
                    <h4 class="mb-4 font-semibold">Contact</h4>
                    <div class="space-y-2 text-gray-100">
                        <p>📍 Quartier Nimzat Sant Yalla, Keur Massar Nord</p>
                        <p>📞 +221 77 123 45 67</p>
                        <p>✉️ delegue.nsy@quartier.sn</p>
                    </div>
                </div>
                <div>
                    <h4 class="mb-4 font-semibold">Heures d'ouverture</h4>
                    <div class="space-y-2 text-gray-100">
                        <p>Lundi - Vendredi: 8h - 17h</p>
                        <p>Samedi: 8h - 13h</p>
                        <p>Urgences: 24h/24</p>
                    </div>
                </div>
            </div>
            <div class="border-green-300 border-t mt-8 pt-8 text-center text-gray-50">
                <p>&copy; {{date('Y')}} Designed & Developed by Idrissa Ndiouck. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <div x-data="{ showModal: @entangle('showModal') }" x-show="showModal" x-transition.opacity
         class="z-50 fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm" style="display: none;">
        <div class="flex justify-center items-center p-4 min-h-screen">
            <div @click.outside="showModal = false" class="glass-effect shadow-2xl rounded-2xl w-full max-w-md animate-slide-up">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-semibold text-gray-900 text-xl" x-text="$wire.modalTitle"></h3>
                        <button @click="showModal = false" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <span class="text-2xl">&times;</span>
                        </button>
                    </div>
                    <div x-html="$wire.modalContent">
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@assets
<style>
    /* Styles spécifiques à cette page, si non inclus dans le layout principal */
    .gradient-bg { background: linear-gradient(135deg, #009649 0%, #01ad8b 100%); }
    .card-hover {
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    .card-hover:hover {
        transform: translateY(-4px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    .animate-fade-in { animation: fadeIn 0.8s ease-out; }
    .animate-slide-up { animation: slideUp 0.6s ease-out; }
    .animate-float { animation: float 3s ease-in-out infinite; }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .service-icon {
        background: linear-gradient(135deg, #00A651 0%, #00D4AA 100%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
@endassets
