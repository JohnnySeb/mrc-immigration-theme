<div
  role="tablist"
  x-data="{ active: 'tab-1' }"
>
  <ul class="flex space-x-2">
    {{ $tabs }}
  </ul>
  {{ $content }}
</div>
