{{--
  Title: Image & text
  Category: blocs-Tolle
  Icon: image-flip-horizontal
--}}

@php
  extract(get_fields());

  if (! empty($image)) {
    $image = wp_get_attachment_image(
      $image['id'],
      'full',
      false,
      array('class' => 'inline-block')
  );
}
@endphp

<section class="relative {{! empty($image) ? 'min-h-[56vw]' : '' }} {{ $bgcolor == 'bg-blue-800' ? 'bg-blue-800' : '' }} {{ $bgcolor == 'bg-purple-700' ? 'bg-purple-700' : '' }}  {{ $bgcolor == 'bg-blue-100' ? 'bg-blue-100' : '' }}  {{ $bgcolor == 'bg-white' ? 'bg-white' : '' }}">
  <div class="container relative z-20">
    <div class="padd">
      <div class="wrap">
        <div class="flex flex-col {{ $reverse ? 'md:flex-row-reverse' : 'md:flex-row' }}">
          <!-- Image -->
          @if (! empty($image))
            <div class="w-full pt-0 md:pt-10 md:w-1/2 text-center {{ $reverse ? 'md:pl-4 xl:pl-10' : 'md:pr-4 xl:pr-10' }} insight ghost delay--2">
              {!! $image !!}
            </div>
          @endif

          <!-- Text -->
          <div class="w-full {{ ! empty($image) ? 'pt-10 md:w-1/2' : '' }} {{ ! empty($image) && $reverse ? 'md:pr-4 xl:pr-10' : 'md:pl-4 xl:pl-10' }}">
            @if ($title)
              <h2 class="insight ghost delay--2">
                {!! $title !!}
              </h2>
            @endif

            @if ($text)
              <div class="insight ghost delay--2">
                {!! $text !!}
              </div>
            @endif

            @if ($link)
              <div class="button-wrapper insight ghost delay--2">
                <a 
                  href="{{ $link['url'] }}" 
                  target="{{ $link['target'] }}" 
                  title="{{ $link['title'] }}" 
                  class="btn"
                >
                  <span class="btn-text">{!! $link['title'] !!}</span>
                </a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Dotted lines -->
  @if (! empty($image))
    @if ($reverse)
      @include('svg.dotted-lines-03')
    @else
      @include('svg.dotted-lines-02')
    @endif
  @endif
</section>