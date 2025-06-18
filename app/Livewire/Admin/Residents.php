<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Resident; // N'oubliez pas d'importer le modèle Resident

class Residents extends Component
{
    public $residents = [];
    public $search = '';
    public $showModal = false;
    public $editingResident = null; // Stockera le modèle Eloquent
    public $modalTitle = '';

    // Form properties for new/editing resident
    public $name;
    public $address;
    public $phone;
    public $profession;
    public $family;
    // Pas besoin de $registrationDate ici car c'est une propriété du modèle qui est définie automatiquement lors de la création

    protected $rules = [
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'profession' => 'nullable|string|max:255',
        'family' => 'required|integer|min:1',
    ];

    public function mount()
    {
        // Charger les données initiales depuis la base de données
        $this->loadResidents();
    }

    private function loadResidents()
    {
        $this->residents = Resident::all(); // Récupère une collection Eloquent
    }

    public function showNewResidentForm()
    {
        $this->resetValidation();
        $this->reset(['name', 'address', 'phone', 'profession', 'family']);
        $this->editingResident = null; // Important pour indiquer un nouvel enregistrement
        $this->modalTitle = 'Nouveau Résident';
        $this->showModal = true;
    }

    public function editResident($id)
    {
        $this->resetValidation();
        // Récupérer le résident depuis la base de données
        $res = Resident::find($id);
        if ($res) {
            $this->editingResident = $res; // Stocker le modèle Eloquent
            $this->name = $res->name;
            $this->address = $res->address;
            $this->phone = $res->phone;
            $this->profession = $res->profession;
            $this->family = $res->family;
            $this->modalTitle = 'Modifier le Résident';
            $this->showModal = true;
        }
    }

    public function saveResident()
    {
        $this->validate();

        if ($this->editingResident) {
            // Mise à jour d'un résident existant
            $this->editingResident->update([
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'profession' => $this->profession,
                'family' => $this->family,
                // 'registration_date' n'est pas mis à jour ici car c'est la date d'enregistrement initiale
            ]);
            session()->flash('message', 'Résident mis à jour avec succès.');
        } else {
            // Ajout d'un nouveau résident
            Resident::create([
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'profession' => $this->profession,
                'family' => $this->family,
                'registration_date' => now()->toDateString(), // Enregistrer la date d'enregistrement actuelle
            ]);
            session()->flash('message', 'Nouveau résident ajouté avec succès.');
        }

        $this->showModal = false;
        $this->reset(['name', 'address', 'phone', 'profession', 'family', 'editingResident']);
        // Recharger la liste des résidents depuis la base de données après une modification
        $this->loadResidents();
    }

    public function deleteResident($id)
    {
        $resident = Resident::find($id);
        if ($resident) {
            $resident->delete();
            session()->flash('message', 'Résident supprimé avec succès.');
            // Recharger la liste des résidents
            $this->loadResidents();
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
        $this->reset(['name', 'address', 'phone', 'profession', 'family', 'editingResident']);
    }

    public function getFilteredResidentsProperty()
    {
        $query = Resident::query();

        if (!empty($this->search)) {
            $searchLower = strtolower($this->search);
            $query->where(function($q) use ($searchLower) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%' . $searchLower . '%'])
                  ->orWhereRaw('LOWER(address) LIKE ?', ['%' . $searchLower . '%'])
                  ->orWhereRaw('LOWER(phone) LIKE ?', ['%' . $searchLower . '%']);
            });
        }

        // Retourne une collection d'objets Resident, pas un tableau
        return $query->get();
    }

    public function render()
    {
        return view('livewire.admin.residents', [
            'filteredResidents' => $this->filteredResidents,
        ]);
    }
}