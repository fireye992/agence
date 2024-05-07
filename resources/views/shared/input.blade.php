@php
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(['max-w-md mx-auto gap-2', $class])>
    <label for="{{ $name }}"class="block mb-2 text-sm font-medium text-gray-900"
    >
        {{ $label }}</label>
    @if ($type == 'textarea')
        <textarea
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
            type="{{ "$type" }}" id="{{ $name }}" name="{{ $name }}"> {{ old($name, $value) }} </textarea>
    @else
        <input
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            type="{{ "$type" }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @endif
    @error($name)
        <div class="text-red-500 text-sm italic">
            {{ $message }}
        </div>
    @enderror
</div>
