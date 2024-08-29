<div x-data="{
    open: false,
    options: [],
    selected: '',
    placeholder: '',
    init() {
        this.placeholder = this.$el.querySelector('button').innerText
        this.selected = this.placeholder
    },
    select(option) {
        this.selected = option
        this.open = false
    }
}"
x-init="init()"
x-on:click.away="open = false"
class="relative w-full"
x-bind:class="{ 'ring-1 ring-blue-500': open }"
>
    <select name="" id="" class="hidden">
        @if ($attributes->get('options'))
            @foreach ($attributes->get('options') as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        @endif
    </select>

    <button
      type="button"
      class="relative w-full px-4 py-2 cursor-pointer block rounded bg-white border text-left ring-offset-0 transition-all duration-300 ease-in focus:border-blue-500 focus:outline-0 focus:ring-0 focus:ring-blue-500"
      x-on:click="open = !open"
    >
        {{ $attributes->get('placeholder') ?? 'Select an option' }}
    </button>
    <ul
      class="absolute w-full z-30 mt-1 max-h-60 overflow-auto rounded bg-white py-1 shadow ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
      tabindex="-1"
      role="listbox"
      aria-labelledby="listbox-label"
      x-show="open"
      x-on:click.away="open = false"
      x-on:keydown.escape="open = false"
      x-transition:enter="transition ease-out duration-100"
      x-transition:enter-start="transform opacity-0 scale-95"
      x-transition:enter-end="transform opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-75"
      x-transition:leave-start="transform opacity-100 scale-100"
      x-transition:leave-end="transform opacity-0 scale-95"
    >
        @if ($attributes->get('options'))
            @foreach ($attributes->get('options') as $value => $label)
                <li
                  class="relative cursor-pointer select-none py-2 xl:px-6 px-4 hover:text-white hover:bg-blue-500 transition ease-in"
                  role="option"
                  x-on:click="select('{{ $value }}')"
                >{{ $label }}</li>
            @endforeach
        @endif
    </ul>
</div>
