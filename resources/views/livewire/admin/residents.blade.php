<div>
    <div class="bg-white shadow-md rounded-xl">
        <div class="p-6 border-gray-200 border-b">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-gray-900 text-xl">Registre des Résidents</h2>
                <button wire:click="showNewResidentForm" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg cursor-pointer text-white transition-colors">
                    + Nouveau Résident
                </button>
            </div>
        </div>
        <div class="p-6">
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif

            <div class="mb-4">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Rechercher un résident..." class="px-4 py-2 border border-gray-300 focus:border-transparent rounded-lg focus:ring-2 focus:ring-senegal-green w-full">
            </div>
            <div class="space-y-4" id="residentsList">
                @forelse ($filteredResidents as $resident)
                    <div class="hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition-colors">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900">{{ $resident['name'] }}</h3>
                                <p class="text-gray-600 text-sm">{{ $resident['address'] }}</p>
                                <p class="text-gray-600 text-sm">Téléphone: {{ $resident['phone'] }}</p>
                                <p class="text-gray-600 text-sm">Profession: {{ $resident['profession'] }}</p>
                                <p class="text-gray-600 text-sm">Membres de famille: {{ $resident['family'] }}</p>
                                <p class="mt-1 text-gray-500 text-xs">Enregistré le {{ \Carbon\Carbon::parse($resident['registrationDate'])->format('d/m/Y') }}</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button wire:click="editResident({{ $resident['id'] }})" class="text-blue-600 hover:text-blue-800 text-sm">Modifier</button>
                                <button wire:click="deleteResident({{ $resident['id'] }})" class="text-red-600 hover:text-red-800 text-sm">Supprimer</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 text-center py-4">Aucun résident trouvé.</p>
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
                    <form wire:submit.prevent="saveResident" class="space-y-4">
                        <div>
                            <label for="name" class="block font-medium text-gray-700 text-sm">Nom complet</label>
                            <input type="text" id="name" wire:model="name" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                            @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="address" class="block font-medium text-gray-700 text-sm">Adresse</label>
                            <input type="text" id="address" wire:model="address" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                            @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="phone" class="block font-medium text-gray-700 text-sm">Téléphone</label>
                            <input type="tel" id="phone" wire:model="phone" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                            @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="profession" class="block font-medium text-gray-700 text-sm">Profession</label>
                            <input type="text" id="profession" wire:model="profession" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                            @error('profession') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="family" class="block font-medium text-gray-700 text-sm">Nombre de membres de la famille</label>
                            <input type="number" id="family" wire:model="family" required min="1" class="mt-1 px-3 py-2 border border-gray-300 focus:border-blue-500 rounded-md focus:ring-blue-500 w-full">
                            @error('family') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" wire:click="closeModal" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-gray-700">Annuler</button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md text-white">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>