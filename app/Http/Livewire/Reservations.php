<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reservation;

class Reservations extends Component
{
    public $reservations;
    public $search;

    public $reservation_id;
    public $name;
    public $event;
    public $venue;

    public function render()
    {
        $this->reservations = Reservation::where('name', 'like',  '%'.$this->search.'%')->orderBy('reservation_id', 'desc')->get();

        return view('livewire.reservations');
    }

    protected $rules = [
        'name' => 'required|min:2',
        'event' => 'required',
        'venue' => 'nullable',
    ];

    protected $validationAttributes = [
        'name' => 'Client\'s Name',
        'event' => 'Type of Event',
        'venue' => 'nullable',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function set($id = null)
    {
        if (!$id)
        {
            $this->reset();
        }
        else
        {
            $reservation = Reservation::find($id)->toArray();

            foreach ($reservation as $column => $value)
            {
                $this->$column = $reservation[$column];
            }
        }
    }

    public function store()
    {
        $validated = $this->validate();

        Reservation::updateOrCreate(['reservation_id' => $this->reservation_id], $validated);

        session()->flash('success', 'Record has been successfully saved.');
    }

    public function delete($id)
    {
        Reservation::find($id)->delete();

        session()->flash('deleted', 'Record has been removed and deleted.');
    }
}
