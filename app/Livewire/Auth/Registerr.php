<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Registerr extends Component
{
    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.app');
    }

    public function register()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'string', 'in:user,admin'],
        ]);
    
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
    
            $user->assignRole($data['role']);
    
            // Redirect to dashboard or wherever you want
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            // Handle the error appropriately
            session()->flash('error', 'There was a problem creating your account: ' . $e->getMessage());
            return redirect()->back();
        }
    }
    public function updated($propertyName)
{
    $this->validateOnly($propertyName, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6'],
        'password_confirmation' => ['required', 'string', 'same:password'],
        'role' => ['required', 'string', 'in:user,admin'],
    ]);
}

}