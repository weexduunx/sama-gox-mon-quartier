<div>
    <div class="bg-white shadow-md rounded-xl">
        <div class="p-6 border-gray-200 border-b">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-gray-900 text-xl">Demandes de Certificats de Résidence</h2>
                <button wire:click="showNewCertificateForm" class="bg-green-800 hover:bg-green-700 px-4 py-2 rounded-lg text-white transition-colors cursor-pointer">
                    + Nouvelle Demande
                </button>
            </div>
        </div>
        <div class="p-6">
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif

            <div class="space-y-4" id="certificatesList">
                @forelse ($certificates as $cert)
                    <div class="hover:bg-gray-50 p-4 border border-gray-200 rounded-lg transition-colors">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900">{{ $cert['applicant'] }}</h3>
                                <p class="text-gray-600 text-sm">{{ $cert['address'] }}</p>
                                <p class="text-gray-600 text-sm">Téléphone: {{ $cert['phone'] }}</p>
                                <p class="text-gray-600 text-sm">Motif: {{ $cert['purpose'] }}</p>
                                <p class="mt-1 text-gray-500 text-xs">Demandé le {{ \Carbon\Carbon::parse($cert['requestDate'])->format('d/m/Y') }}</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="px-2 py-1 text-xs rounded-full {{ $cert['status'] === 'Approuvé' ? 'bg-green-100 text-green-800' : ($cert['status'] === 'Rejeté' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">{{ $cert['status'] }}</span>
                                @if ($cert['status'] === 'En attente')
                                    <button wire:click="approveCertificate({{ $cert['id'] }})" class="text-green-600 hover:text-green-800 text-sm">✓</button>
                                    <button wire:click="rejectCertificate({{ $cert['id'] }})" class="text-red-600 hover:text-red-800 text-sm">✕</button>
                                @endif
                                <button wire:click="editCertificate({{ $cert['id'] }})" class="text-blue-600 hover:text-blue-800 text-sm">Modifier</button>
                                <button wire:click="deleteCertificate({{ $cert['id'] }})" class="text-red-600 hover:text-red-800 text-sm">Supprimer</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 text-center py-4">Aucune demande de certificat en attente.</p>
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
                    <form wire:submit.prevent="saveCertificate" class="space-y-4">
                        <div>
                            <label for="applicant" class="block font-medium text-gray-700 text-sm">Nom du demandeur</label>
                            <input type="text" id="applicant" wire:model="applicant" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-senegal-green rounded-md focus:ring-senegal-green w-full">
                            @error('applicant') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="address" class="block font-medium text-gray-700 text-sm">Adresse</label>
                            <input type="text" id="address" wire:model="address" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-senegal-green rounded-md focus:ring-senegal-green w-full">
                            @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="phone" class="block font-medium text-gray-700 text-sm">Téléphone</label>
                            <input type="tel" id="phone" wire:model="phone" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-senegal-green rounded-md focus:ring-senegal-green w-full">
                            @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="purpose" class="block font-medium text-gray-700 text-sm">Motif</label>
                            <select id="purpose" wire:model="purpose" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-senegal-green rounded-md focus:ring-senegal-green w-full">
                                <option value="">Sélectionner...</option>
                                <option value="Emploi">Emploi</option>
                                <option value="Banque">Banque</option>
                                <option value="École">École</option>
                                <option value="Autre">Autre</option>
                            </select>
                            @error('purpose') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        @if ($editingCertificateId)
                        <div>
                            <label for="status" class="block font-medium text-gray-700 text-sm">Statut</label>
                            <select id="status" wire:model="status" required class="mt-1 px-3 py-2 border border-gray-300 focus:border-senegal-green rounded-md focus:ring-senegal-green w-full">
                                <option value="En attente">En attente</option>
                                <option value="Approuvé">Approuvé</option>
                                <option value="Rejeté">Rejeté</option>
                            </select>
                            @error('status')
                                <span class="text-red-500 text-xs mt-1">{{ $errors->first('status') }}</span>
                            @enderror
                        </div>
                        @endif
                        <div class="flex justify-end space-x-3">
                            <button type="button" wire:click="closeModal" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-gray-700">Annuler</button>
                            <button type="submit" class="bg-senegal-green hover:bg-green-700 px-4 py-2 rounded-md text-white">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>