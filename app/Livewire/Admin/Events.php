<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Event; // Importer le modèle Event

class Events extends Component
{
    public $events = [];
    public $showModal = false;
    public $editingEventId = null;
    public $modalTitle = '';

    // Form properties for new/editing event
    public $title;
    public $date;
    public $time;
    public $location;
    public $type;
    public $description;

    protected $rules = [
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required|string|max:10',
        'location' => 'required|string|max:255',
        'type' => 'nullable|string|in:Réunion,Communautaire,Autre', // Rendu nullable
        'description' => 'nullable|string|min:10', // Rendu nullable
    ];

    public function mount()
    {
        $this->loadEvents();
    }

    private function loadEvents()
    {
        // Charger les événements à venir, triés par date
        $this->events = Event::where('date', '>=', now()->toDateString())
                              ->orderBy('date')
                              ->orderBy('time')
                              ->get();
    }

    public function showNewEventForm()
    {
        $this->resetValidation();
        $this->reset(['title', 'date', 'time', 'location', 'type', 'description', 'editingEventId']);
        $this->modalTitle = 'Nouvel Événement';
        $this->showModal = true;
    }

    public function editEvent($id)
    {
        $this->resetValidation();
        $event = Event::find($id);
        if ($event) {
            $this->editingEventId = $event->id;
            $this->title = $event->title;
            $this->date = $event->date->format('Y-m-d'); // Assurez-vous que la date est au bon format pour l'input HTML
            $this->time = $event->time;
            $this->location = $event->location;
            $this->type = $event->type;
            $this->description = $event->description;
            $this->modalTitle = 'Modifier l\'Événement';
            $this->showModal = true;
        }
    }

    public function saveEvent()
    {
        $this->validate();

        if ($this->editingEventId) {
            // Mise à jour d'un événement existant
            $event = Event::find($this->editingEventId);
            if ($event) {
                $event->update([
                    'title' => $this->title,
                    'date' => $this->date,
                    'time' => $this->time,
                    'location' => $this->location,
                    'type' => $this->type,
                    'description' => $this->description,
                ]);
                session()->flash('message', 'Événement mis à jour avec succès.');
            }
        } else {
            // Ajout d'un nouvel événement
            Event::create([
                'title' => $this->title,
                'date' => $this->date,
                'time' => $this->time,
                'location' => $this->location,
                'type' => $this->type,
                'description' => $this->description,
            ]);
            session()->flash('message', 'Nouvel événement ajouté avec succès.');
        }

        $this->showModal = false;
        $this->reset(['title', 'date', 'time', 'location', 'type', 'description', 'editingEventId']);
        $this->loadEvents(); // Recharger les données
    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            session()->flash('message', 'Événement supprimé.');
            $this->loadEvents(); // Recharger les données
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
        $this->reset(['title', 'date', 'time', 'location', 'type', 'description', 'editingEventId']);
    }

    public function render()
    {
        return view('livewire.admin.events');
    }
}