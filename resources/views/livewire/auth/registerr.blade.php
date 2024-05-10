{{-- @include( 'layouts.app' )
<div>
    <input wire:model="name" type="text" required>
    <input wire:model="email" type="email" required>
    <input wire:model="password" type="password" required>
    <input wire:model="password_confirmation" type="password" required>
    <select wire:model="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
    <span class="inline-flex rounded-md">
        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 acti
            {{ Auth::user()?->name ?? '' }}
    </span>
    
    <button type="submit" wire:click="register">Register</button>
    <label>
        <input type="checkbox" wire:model="terms">
        I agree to the Terms and Conditions
    </label>
    @error('terms') <span class="error">{{ $message }}</span> @enderror
    
    
</div> --}}
@include('layouts.app')

<div>
    <input wire:model="name" type="text" required>
    <input wire:model="email" type="email" required>
    <input wire:model="password" type="password" required>
    <input wire:model="password_confirmation" type="password" required>
    <select wire:model="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>

    <!-- Affichage du nom de l'utilisateur actuellement connecté -->
    <span class="inline-flex rounded-md">
        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 acti">
            {{ Auth::user()->name ?? '' }}
        </button>
    </span>

    <button type="submit" wire:click="register">Register</button>
    <label>
        <input type="checkbox" wire:model="terms">
        I agree to the Terms and Conditions
    </label>
    @error('terms') <span class="error">{{ $message }}</span> @enderror
</div>
