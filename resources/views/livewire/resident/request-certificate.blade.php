<div class="mx-auto px-4 sm:px-6 lg:px-8 py-8 max-w-2xl bg-white shadow-xl rounded-2xl mt-10">
    <h2 class="mb-6 font-bold text-3xl text-gray-900 text-center">Demande de Certificat de Résidence</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="submitCertificateRequest" class="space-y-6">
        <div>
            <label for="name" class="block font-medium text-gray-700 text-sm mb-2">Nom complet</label>
            <input type="text" id="name" wire:model="name" required
                   class="px-4 py-3 border border-gray-300 focus:border-senegal-green rounded-xl focus:ring-2 focus:ring-senegal-green focus:ring-opacity-20 w-full transition-all">
            @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="address" class="block font-medium text-gray-700 text-sm mb-2">Adresse</label>
            <input type="text" id="address" wire:model="address" required
                   class="px-4 py-3 border border-gray-300 focus:border-senegal-green rounded-xl focus:ring-2 focus:ring-senegal-green focus:ring-opacity-20 w-full transition-all">
            @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="phone" class="block font-medium text-gray-700 text-sm mb-2">Téléphone</label>
            <input type="tel" id="phone" wire:model="phone" required
                   class="px-4 py-3 border border-gray-300 focus:border-senegal-green rounded-xl focus:ring-2 focus:ring-senegal-green focus:ring-opacity-20 w-full transition-all">
            @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="purpose" class="block font-medium text-gray-700 text-sm mb-2">Motif de la demande</label>
            <select id="purpose" wire:model="purpose" required
                    class="px-4 py-3 border border-gray-300 focus:border-senegal-green rounded-xl focus:ring-2 focus:ring-senegal-green focus:ring-opacity-20 w-full transition-all">
                <option value="">Sélectionner...</option>
                <option value="Emploi">Emploi</option>
                <option value="Banque">Banque</option>
                <option value="École">École</option>
                <option value="Autre">Autre</option>
            </select>
            @error('purpose') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('resident.home') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl font-medium text-gray-700 transition-all">
                Annuler
            </a>
            <button type="submit" class="bg-senegal-green hover:bg-green-700 px-6 py-3 rounded-xl font-medium text-white transition-all">
                Envoyer la demande
            </button>
        </div>
    </form>
</div>