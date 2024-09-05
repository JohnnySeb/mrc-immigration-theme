{{--
  Title: Header Home
  Category: blocs-Tolle
  Icon: welcome-view-site
--}}

@php
  extract(get_fields());
@endphp

<section class="relative overflow-hidden">
  <div class="container relative z-30">
    <div class="padd --top">
      <div class="wrap">
        <div class="flex flex-col-reverse md:flex-row">
          <div class="w-full md:w-1/2 pr-10">
            @include('svg.alex-01')
          </div>
          <div class="w-full md:w-1/2">
            @if ($title)
              <h1 class="insight md:pt-10 md:pl-6">
                {!! $title !!}
              </h1>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('svg.dotted-lines-01')
  @include('svg.wave-01')
</section>