<?php

namespace App\Http\Livewire\Admin;

use App\Models\Place;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\UserPlace as AdminUserPlace;

class UserPlace extends Component
{
    public $search;
    public $places;
    public $roles;
    public $name;
    public $email;
    public $password;
    public $role_id = 1;
    public bool $isShow = false;
    public $checkedPlaces = [];

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'role_id' => 'required'
    ];

    public function toggle()
    {
        $this->isShow = !$this->isShow;
        if (!$this->isShow) {
            $this->checkedPlaces = [];
        }
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount()
    {
        $this->roles = Role::all();
    }
    public function updatedSearch()
    {
        if ($this->search == '') {
            $this->places = [];
        } else {
            $this->places = Place::where('title_ru', 'like', '%'.$this->search.'%')->get();
        }
    }

    public function submit()
    {
        $validatedData = $this->validate();
        if (!empty($this->checkedPlaces)) {
            $user = User::add($validatedData);
            foreach ($this->checkedPlaces as $checkedPlace) {
                AdminUserPlace::create([
                   'user_id' => $user->id,
                    'place_id' => $checkedPlace
                ]);
            }
        } else {
            User::add($validatedData);
        }
        return redirect(route('user.index'));
    }
    public function render()
    {
        return view('livewire.admin.user-place');
    }
}
