<?php

namespace App\Livewire\Resident;

use Livewire\Component;

class Home extends Component
{
    // Propriétés pour stocker les données des événements et annonces (simulées ici)
    public $upcomingEvents = [];
    public $announcements = [];

    // Propriétés pour la gestion de la modale avec Alpine.js
    public $showModal = false;
    public $modalTitle = '';
    public $modalContent = '';

    public function mount()
    {
        // Initialiser avec des données si nécessaire
        $this->upcomingEvents = [
            [
                'title' => 'Assemblée Générale du Quartier',
                'date' => '2025-06-20',
                'time' => '15:00',
                'location' => 'Place du marché'
            ],
            [
                'title' => 'Journée de Salubrité',
                'date' => '2025-06-25',
                'time' => '08:00',
                'location' => 'Tout le quartier'
            ]
        ];

        $this->announcements = [
            [
                'title' => 'Nouveaux horaires de collecte des déchets',
                'content' => 'Les déchets seront collectés tous les mardis et vendredis à partir de 6h.',
                'date' => '2025-06-15'
            ],
            [
                'title' => 'Travaux d\'éclairage public',
                'content' => 'Installation de nouveaux lampadaires sur l\'avenue principale du 20 au 25 juin.',
                'date' => '2025-06-12'
            ]
        ];
    }

    // Méthodes pour afficher le contenu des modales (utilisées par Alpine.js)
    public function showEventsModal()
    {
        $content = '<div class="space-y-4">
            <h4 class="font-semibold text-gray-900 text-lg mb-4">Événements à venir</h4>';
        foreach ($this->upcomingEvents as $event) {
            $content .= '<div class="bg-gradient-to-r from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200">
                <h5 class="font-medium text-gray-900 mb-2">' . e($event['title']) . '</h5>
                <div class="flex items-center space-x-4 text-gray-600 text-sm">
                    <span>📅 ' . (new \DateTime($event['date']))->format('d/m/Y') . '</span>
                    <span>🕐 ' . e($event['time']) . '</span>
                </div>
                <p class="text-gray-600 text-sm mt-1">📍 ' . e($event['location']) . '</p>
            </div>';
        }
        $content .= '<div class="flex justify-end pt-4">
            <button @click="showModal = false" class="bg-purple-500 hover:bg-purple-600 px-6 py-3 rounded-xl font-medium text-white transition-all">
                Fermer
            </button>
        </div></div>';

        $this->modalTitle = 'Événements du Quartier';
        $this->modalContent = $content;
        $this->showModal = true;
    }

    public function showContactModal()
    {
        $content = '
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
                                <p class="font-medium text-gray-900">Heures d\'ouverture</p>
                                <p class="text-indigo-600 text-sm">Lun-Ven: 8h-17h | Sam: 8h-13h</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end pt-4">
                    <button @click="showModal = false" class="bg-blue-500 hover:bg-blue-600 px-6 py-3 rounded-xl font-medium text-white transition-all">
                        Fermer
                    </button>
                </div>
            </div>
        ';
        $this->modalTitle = 'Contact';
        $this->modalContent = $content;
        $this->showModal = true;
    }

    public function showInfoModal()
    {
        $content = '<div class="space-y-4">
            <h4 class="font-semibold text-gray-900 text-lg mb-4">Informations du Quartier</h4>';
        foreach ($this->announcements as $announcement) {
            $content .= '<div class="bg-gradient-to-r from-indigo-50 to-indigo-100 p-4 rounded-xl border border-indigo-200">
                <h5 class="font-medium text-gray-900 mb-2">' . e($announcement['title']) . '</h5>
                <p class="text-gray-600 text-sm mb-2">' . e($announcement['content']) . '</p>
                <p class="text-indigo-600 text-xs">📅 ' . (new \DateTime($announcement['date']))->format('d/m/Y') . '</p>
            </div>';
        }
        $content .= '<div class="flex justify-end pt-4">
            <button @click="showModal = false" class="bg-indigo-500 hover:bg-indigo-600 px-6 py-3 rounded-xl font-medium text-white transition-all">
                Fermer
            </button>
        </div></div>';

        $this->modalTitle = 'Informations';
        $this->modalContent = $content;
        $this->showModal = true;
    }

    public function showCommunityModal()
    {
        $content = '
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
                    <button @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-xl font-medium text-gray-800 transition-all">
                        Fermer
                    </button>
                </div>
            </div>
        ';
        $this->modalTitle = 'Communauté';
        $this->modalContent = $content;
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.resident.home');
    }
}