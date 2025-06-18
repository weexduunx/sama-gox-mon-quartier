<div>
    <div class="bg-white shadow-md rounded-xl">
        <div class="p-6 border-gray-200 border-b">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-gray-900 text-xl">Événements du Quartier</h2>
                <button wire:click="showNewEventForm" class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-lg cursor-pointer text-white transition-colors">
                    + Nouvel Événement
                </button>
            </div>
        </div>
        <div class="p-6">
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif

            <div class="space-y-4" id="eventsList">
                @forelse ($events as $event)
                    <div class="hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition-colors">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900">{{ $event['title'] }}</h3>
                                <p class="text-gray-600 text-sm">{{ $event['description'] }}</p>
                                <div class="flex items-center space-x-4 mt-2 text-gray-600 text-sm">
                                    <span>📅 {{ \Carbon\Carbon::parse($event['date'])->format('d/m/Y') }}</span>
                                    <span>🕐 {{ $event['time'] }}</span>
                                    <span>📍 {{ $event['location'] }}</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="bg-purple-100 px-2 py-1 rounded-full text-purple-800 text-xs">{{ $event['type'] }}</span>
                                <button wire:click="editEvent({{ $event['id'] }})" class="text-purple-600 hover:text-purple-800 text-sm">Modifier</button>
                                <button wire:click="deleteEvent({{ $event['id'] }})" class="text-red-600 hover:text-red-800 text-sm">Supprimer</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 text-center py-4">Aucun événement planifié.</p>
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
                    <form wire:submit.prevent="saveEvent" class="space-y-4">
                        <div>
                            <label for="title" class="block font-medium text-gray-700 text-sm">Titre de l'événement</label>
                            <input type="text" id="title" wire:model="title" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full">
                            @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="date" class="block font-medium text-gray-700 text-sm">Date</label>
                            <input type="date" id="date" wire:model="date" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full">
                            @error('date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="time" class="block font-medium text-gray-700 text-sm">Heure</label>
                            <input type="time" id="time" wire:model="time" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full">
                            @error('time') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="location" class="block font-medium text-gray-700 text-sm">Lieu</label>
                            <input type="text" id="location" wire:model="location" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full">
                            @error('location') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="type" class="block font-medium text-gray-700 text-sm">Type</label>
                            <select id="type" wire:model="type" required class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full">
                                <option value="Réunion">Réunion</option>
                                <option value="Communautaire">Communautaire</option>
                                <option value="Autre">Autre</option>
                            </select>
                            @error('type') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="description" class="block font-medium text-gray-700 text-sm">Description</label>
                            <textarea id="description" wire:model="description" required rows="3" class="mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 w-full"></textarea>
                            @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" wire:click="closeModal" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-gray-700">Annuler</button>
                            <button type="submit" class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-md text-white">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>