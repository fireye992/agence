@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(['relative flex w-full', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" multiple>
    @foreach ($options as $k => $v )
    <option @selected($value->contains($k)) value="{{ $k }}" >{{ $v }}</option>   
    {{-- <option @selected($value->contains($k)) value="{{ $k }}" class="text-black {{ $value->contains($k) ? 'text-blue-400 bg-gray-800' : '' }}">{{ $v }}</option> --}}  
    @endforeach
    </select>
    @error($name)
        <div class="text-red-500 text-sm italic">
            {{ $message }}
        </div>
    @enderror
</div>
