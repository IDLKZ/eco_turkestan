<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Place;
use Livewire\Component;

class SidebarFilter extends Component
{
    public $areas;
    public $places = [];
    public $selectedAreas = [];
    protected $listeners = ['areaChanged' => 'areaChangedEvent'];
    public function mount()
    {
        $this->areas = Area::all();
    }
    public function areaChangedEvent($areaId)
    {
        if (in_array($areaId, $this->selectedAreas)) {
            // Remove the element from the array
            unset($this->selectedAreas[array_search($areaId, $this->selectedAreas)]);
        } else {
            // Add the element to the array
            array_push($this->selectedAreas,$areaId);
        }
        $this->loadPlaces();
    }

    public function loadPlaces(){
        if(count($this->selectedAreas) > 0){
            $this->places = Place::whereIn("area_id",$this->selectedAreas)->get();
        }
        else{
            $this->places = [];
        }


    }



    public function render()
    {
        return view('livewire.sidebar-filter');
    }
}
