@php
    $class ??= null;
@endphp
<div @class(['form-check form-switch', $class])>
    <input type="hidden" value="0" name="{{ $name }}">
    <input @checked(old($name, $value ?? false)) type="checkbox" value="1" name="{{ $name }}" class="form-check-input"
        @error($name) is-invalid @enderror" role="switch" id="{{ $name }}">
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
    @error($name)
        <div class="text-red-500 text-sm italic">
            {{ $message }}
        </div>
    @enderror
</div>
{{-- <label for="toggle" class="inline-flex relative items-center cursor-pointer">
    <input type="checkbox" id="toggle" class="sr-only peer">
    <div
        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
    </div>
</label> --}}
