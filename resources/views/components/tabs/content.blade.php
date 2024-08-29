<div
  role="tabpanel"
  tabindex="0"
  aria-labelledby="{{ $name }}-tab"
  id="{{ $name }}"
  class="p-4 border rounded-b"
  x-show="active === '{{ $name }}'"
>
  {{ $slot }}
</div>
