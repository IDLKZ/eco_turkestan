<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Place;
use App\Models\User;
use App\Models\UserPlace;
use Livewire\Component;

class AddUserPlace extends Component
{
    public User $user;
    public $search;
    public $places;
    public $userPlaces;

    public function mount($user)
    {
        $this->userPlaces = $user->user_places;
    }
    public function updatedSearch()
    {
        if ($this->search == '') {
            $this->places = [];
        } else {
            $this->places = Place::where('title_ru', 'like', '%'.$this->search.'%')->get();
        }
    }



    public function addPlace($place_id)
    {
        UserPlace::updateOrCreate([
           'user_id' => $this->user->id,
            'place_id' => $place_id
        ]);
        $this->renderPlaces();
    }
    public function deletePlace($id)
    {
        UserPlace::destroy($id);
        $this->renderPlaces();
    }

    public function renderPlaces()
    {
        $this->userPlaces = UserPlace::with('place')->where('user_id', $this->user->id)->get();
    }
    public function submit()
    {

        return redirect(route('user.index'));
    }
    public function render()
    {
        return view('livewire.admin.user.add-user-place');
    }
}
