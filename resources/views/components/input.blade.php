<div>
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    <div class="mt-2 relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
            {{ $slot }}
        </div>
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}" value="{{ $value }}" required
            class="bg-transparent caret-gray-500 border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5">
    </div>
</div>
