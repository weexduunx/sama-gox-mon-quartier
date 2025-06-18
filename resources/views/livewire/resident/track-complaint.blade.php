<div class="mx-auto px-4 sm:px-6 lg:px-8 py-8 max-w-2xl bg-white shadow-xl rounded-2xl mt-10">
    <h2 class="mb-6 font-bold text-3xl text-gray-900 text-center">Signaler un Problème</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="submitComplaint" class="space-y-6">
        <div>
            <label for="name" class="block font-medium text-gray-700 text-sm mb-2">Votre nom</label>
            <input type="text" id="name" wire:model="name" required
                   class="px-4 py-3 border border-gray-300 focus:border-orange-500 rounded-xl focus:ring-2 focus:ring-orange-500 focus:ring-opacity-20 w-full transition-all">
            @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="type" class="block font-medium text-gray-700 text-sm mb-2">Type de problème</label>
            <select id="type" wire:model="type" required
                    class="px-4 py-3 border border-gray-300 focus:border-orange-500 rounded-xl focus:ring-2 focus:ring-orange-500 focus:ring-opacity-20 w-full transition-all">
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
            <label for="description" class="block font-medium text-gray-700 text-sm mb-2">Description du problème</label>
            <textarea id="description" wire:model="description" required rows="3"
                      class="px-4 py-3 border border-gray-300 focus:border-orange-500 rounded-xl focus:ring-2 focus:ring-orange-500 focus:ring-opacity-20 w-full transition-all resize-none"></textarea>
            @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="address" class="block font-medium text-gray-700 text-sm mb-2">Adresse concernée</label>
            <input type="text" id="address" wire:model="address" required
                   class="px-4 py-3 border border-gray-300 focus:border-orange-500 rounded-xl focus:ring-2 focus:ring-orange-500 focus:ring-opacity-20 w-full transition-all">
            @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('resident.home') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl font-medium text-gray-700 transition-all">
                Annuler
            </a>
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 px-6 py-3 rounded-xl font-medium text-white transition-all">
                Signaler
            </button>
        </div>
    </form>
</div>