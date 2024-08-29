<fieldset>
  @if ($attributes->has('legend'))
    <legend class="mb-1 text-xs uppercase font-semibold">{{ $attributes->get('legend') }}</legend>
  @endif

  @if ($attributes->has('options'))
    @foreach ($attributes->get('options') as $value => $label)
      <div>
        <input type="radio" name="{{ $attributes->get('name') }}" id="{{ $value }}">
        <label for="{{ $value }}">{{ $label }}</label>
      </div>
    @endforeach
  @endif
</fieldset>
