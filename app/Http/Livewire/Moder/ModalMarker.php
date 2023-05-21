<?php

namespace App\Http\Livewire\Moder;

use App\Models\Breed;
use App\Models\Category;
use App\Models\Event;
use App\Models\Sanitary;
use App\Models\Status;
use App\Models\Type;
use Livewire\Component;

class ModalMarker extends Component
{
    public $search;
    public $events;
    public $sanitaries;
    public $categories;
    public $types;
    public $breeds;
    public $statuses;
    public $geocode;
    public $category_id;
    public $type_id;
    public $breed_id;
    public $sanitary_id;
    public $event_id;
    public $status_id;
    public $height;
    public $diameter;
    public $age;
    public $landing_date;

    public function updatedSearch()
    {
        if ($this->search == '') {
            $this->breeds = [];
        } else {
            $this->breeds = Breed::where('title_ru', 'like', '%'.$this->search.'%')->get();
        }
    }

    protected $rules = [
        'event_id' => 'required',
        'sanitary_id' => 'required',
        'type_id' => 'required',
        'category_id' => 'required',
        'height' => 'required',
        'diameter' => 'required',
        'breed_id' => 'required',
        'landing_date' => 'nullable',
        'status_id' => 'nullable',
        'geocode' => 'required'
    ];
    protected $validationAttributes = [
        'event_id' => 'хозяйственное мероприятие',
        'sanitary_id' => 'состояние',
        'type_id' => 'вид насаждения',
        'height' => 'высота',
        'diameter' => 'диаметр',
        'breed_id' => 'порода',
        'geocode' => 'маркер'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount()
    {
        $this->events = Event::all();
        $this->sanitaries = Sanitary::all();
        $this->categories = Category::all();
        $this->types = Type::all();
        $this->statuses = Status::all();
    }

    public function submit()
    {
        $validatedData = $this->validate();
        dd($validatedData);
    }
    public function render()
    {
        return view('livewire.moder.modal-marker');
    }
}
