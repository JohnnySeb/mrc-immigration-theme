<button
  role="tab"
  tabindex="0"
  aria-controls="{{ $name }}"
  id="{{ $name }}-tab"
  class="-mb-px px-4 py-2 text-sm font-medium text-gray-700 border border-b-0 rounded-t focus:outline-none"
  x-on:click="active = '{{ $name }}'"
  x-bind:class="{ 'bg-white': active === '{{ $name }}', 'bg-gray-200 border-transparent': active !== '{{ $name }}' }"
>
  {{ $slot }}
</button>
