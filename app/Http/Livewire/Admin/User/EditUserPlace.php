<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class EditUserPlace extends Component
{
    public User $user;
    public $name;
    public $email;
    public $password;
    public $status;
    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|nullable',
            "status" => ""
        ];
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->status = $user->status;
    }

    public function submit()
    {
        $validatedData = $this->validate();
        if ($validatedData['password'] != null)
        {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            $validatedData['password'] = $this->user->password;
        }
        $this->user->edit($validatedData);
        return redirect(route('user.index'));
    }
    public function render()
    {
        return view('livewire.admin.user.edit-user-place');
    }
}
