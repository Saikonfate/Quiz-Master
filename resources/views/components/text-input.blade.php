@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-200 bg-white text-primary focus:border-accent focus:ring-accent rounded-md shadow-sm']) }}>
