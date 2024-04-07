@php
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(['form-group', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    @if ($type == 'textarea')
        <textarea
            class="form-control block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error($name) bg-red-70 @enderror"
            type="{{ "$type" }}" id="{{ $name }}" name="{{ $name }}"> {{ old($name, $value) }} </textarea>
    @else
        <input
            class="form-control block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error($name) bg-red-70 @enderror"
            type="{{ "$type" }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @endif
    @error($name)
        <div class="text-red-500 text-sm italic">
            {{ $message }}
        </div>
    @enderror
</div>
