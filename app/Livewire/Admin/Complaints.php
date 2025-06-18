<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Complaint; // Importer le modèle Complaint

class Complaints extends Component
{
    public $complaints = [];
    public $showModal = false;
    public $editingComplaintId = null;
    public $modalTitle = '';

    // Form properties for new/editing complaint
    public $complainant;
    public $type;
    public $description;
    public $address;
    public $priority = 'Moyenne';
    public $status = 'Ouvert';

    protected $rules = [
        'complainant' => 'nullable|string|max:255', // Rendu nullable pour correspondre à la migration
        'type' => 'required|string|in:Nuisance sonore,Voirie,Éclairage,Déchets,Sécurité,Autre',
        'description' => 'required|string|min:10',
        'address' => 'required|string|max:255',
        'priority' => 'required|string|in:Basse,Moyenne,Haute',
        'status' => 'required|string|in:Ouvert,En cours,Résolu,Fermé',
    ];

    public function mount()
    {
        $this->loadComplaints();
    }

    private function loadComplaints()
    {
        $this->complaints = Complaint::orderBy('created_at', 'desc')->get();
    }

    public function showNewComplaintForm()
    {
        $this->resetValidation();
        $this->reset(['complainant', 'type', 'description', 'address', 'priority', 'status', 'editingComplaintId']);
        $this->modalTitle = 'Nouvelle Plainte';
        $this->showModal = true;
    }

    public function editComplaint($id)
    {
        $this->resetValidation();
        $complaint = Complaint::find($id);
        if ($complaint) {
            $this->editingComplaintId = $complaint->id;
            $this->complainant = $complaint->complainant;
            $this->type = $complaint->type;
            $this->description = $complaint->description;
            $this->address = $complaint->address;
            $this->priority = $complaint->priority;
            $this->status = $complaint->status;
            $this->modalTitle = 'Modifier la Plainte';
            $this->showModal = true;
        }
    }

    public function saveComplaint()
    {
        $this->validate();

        if ($this->editingComplaintId) {
            // Mise à jour d'une plainte existante
            $complaint = Complaint::find($this->editingComplaintId);
            if ($complaint) {
                $complaint->update([
                    'complainant' => $this->complainant,
                    'type' => $this->type,
                    'description' => $this->description,
                    'address' => $this->address,
                    'priority' => $this->priority,
                    'status' => $this->status,
                ]);
                session()->flash('message', 'Plainte mise à jour avec succès.');
            }
        } else {
            // Ajout d'une nouvelle plainte
            Complaint::create([
                'complainant' => $this->complainant,
                'type' => $this->type,
                'description' => $this->description,
                'address' => $this->address,
                'priority' => $this->priority,
                'status' => $this->status, // sera 'Ouvert' par défaut
                'date' => now()->toDateString(),
            ]);
            session()->flash('message', 'Nouvelle plainte ajoutée avec succès.');
        }

        $this->showModal = false;
        $this->reset(['complainant', 'type', 'description', 'address', 'priority', 'status', 'editingComplaintId']);
        $this->loadComplaints(); // Recharger les données
    }

    public function resolveComplaint($id)
    {
        $complaint = Complaint::find($id);
        if ($complaint) {
            $complaint->update(['status' => 'Résolu']);
            session()->flash('message', 'Plainte marquée comme résolue.');
            $this->loadComplaints(); // Recharger les données
        }
    }

    public function deleteComplaint($id)
    {
        $complaint = Complaint::find($id);
        if ($complaint) {
            $complaint->delete();
            session()->flash('message', 'Plainte supprimée.');
            $this->loadComplaints(); // Recharger les données
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
        $this->reset(['complainant', 'type', 'description', 'address', 'priority', 'status', 'editingComplaintId']);
    }

    public function render()
    {
        return view('livewire.admin.complaints');
    }
}