<div>
    <div class="bg-white shadow-md rounded-xl">
        <div class="p-6 border-gray-200 border-b">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-gray-900 text-xl">Plaintes et Réclamations</h2>
                <button wire:click="showNewComplaintForm" class="bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-lg cursor-pointer text-white transition-colors">
                    + Nouvelle Plainte
                </button>
            </div>
        </div>
        <div class="p-6">
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif

            <div class="space-y-4" id="complaintsList">
                @forelse ($complaints as $complaint)
                    <div class="hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition-colors">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900">{{ $complaint['complainant'] }}</h3>
                                <p class="font-medium text-gray-700 text-sm">{{ $complaint['type'] }}</p>
                                <p class="mt-1 text-gray-600 text-sm">{{ $complaint['description'] }}</p>
                                <p class="text-gray-600 text-sm">Adresse: {{ $complaint['address'] }}</p>
                                <p class="mt-1 text-gray-500 text-xs">Signalé le {{ \Carbon\Carbon::parse($complaint['date'])->format('d/m/Y') }}</p>
                            </div>
                            <div class="flex flex-col items-end space-y-2">
                                <span class="px-2 py-1 text-xs rounded-full {{ $complaint['priority'] === 'Haute' ? 'bg-red-100 text-red-800' : ($complaint['priority'] === 'Moyenne' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">{{ $complaint['priority'] }}</span>
                                <span class="px-2 py-1 text-xs rounded-full {{ $complaint['status'] === 'Résolu' ? 'bg-green-100 text-green-800' : ($complaint['status'] === 'Fermé' ? 'bg-gray-100 text-gray-800' : 'bg-blue-100 text-blue-800') }}">{{ $complaint['status'] }}</span>
                                @if ($complaint['status'] !== 'Résolu' && $complaint['status'] !== 'Fermé')
                                    <button wire:click="resolveComplaint({{ $complaint['id'] }})" class="text-green-600 hover:text-green-800 text-sm">Résoudre</button>
                                @endif
                                <button wire:click="editComplaint({{ $complaint['id'] }})" class="text-blue-600 hover:text-blue-800 text-sm">Modifier</button>
                                <button wire:click="deleteComplaint({{ $complaint['id'] }})" class="text-red-600 hover:text-red-800 text-sm">Supprimer</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 text-center py-4">Aucune plainte ouverte.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div x-data="{ showModal: @entangle('showModal') }" x-show="showModal" x-transition.opacity
         class="z-50 fixed inset-0 bg-black bg-opacity-50" style="display: none;">
        <div class="flex justify-center items-center p-4 min-h-screen">
            <div @click.outside="showModal = false" class="bg-white shadow-xl rounded-xl w-full max-w-md">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-semibold text-lg">{{ $modalTitle }}</h3>
                        <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <span class="text-2xl">&times;</span>
                        </button>
                    </div>
                    <form wire:submit.prevent="saveComplaint" class="space-y-4">
                        <div>
                            <label for="complainant" class="block font-medium text-gray-700 text-sm">Nom du plaignant</label>
                            <input type="text" id="complainant" wire:model="complainant" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full">
                            @error('complainant') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="type" class="block font-medium text-gray-700 text-sm">Type de plainte</label>
                            <select id="type" wire:model="type" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full">
                                <option value="">Sélectionner...</option>
                                <option value="Nuisance sonore">Nuisance sonore</option>
                                <option value="Voirie">Voirie</option>
                                <option value="Éclairage">Éclairage</option>
                                <option value="Déchets">Déchets</option>
                                <option value="Sécurité">Sécurité</option>
                                <option value="Autre">Autre</option>
                            </select>
                            @error('type') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="description" class="block font-medium text-gray-700 text-sm">Description</label>
                            <textarea id="description" wire:model="description" required rows="3" class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full"></textarea>
                            @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="address" class="block font-medium text-gray-700 text-sm">Adresse concernée</label>
                            <input type="text" id="address" wire:model="address" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full">
                            @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="priority" class="block font-medium text-gray-700 text-sm">Priorité</label>
                            <select id="priority" wire:model="priority" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full">
                                <option value="Basse">Basse</option>
                                <option value="Moyenne">Moyenne</option>
                                <option value="Haute">Haute</option>
                            </select>
                            @error('priority') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="status" class="block font-medium text-gray-700 text-sm">Statut</label>
                            <select id="status" wire:model="status" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-orange-500 rounded-md focus:ring-orange-500 w-full">
                                <option value="Ouvert">Ouvert</option>
                                <option value="En cours">En cours</option>
                                <option value="Résolu">Résolu</option>
                                <option value="Fermé">Fermé</option>
                            </select>
                            @error('status') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" wire:click="closeModal" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-gray-700">Annuler</button>
                            <button type="submit" class="bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-md text-white">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>