@php
  $logo = get_field('logo', 'options');
@endphp

<header class="navigation">
  <div class="container">
    <div class="wrap">
      <div class="nav-wrapper">
        <!-- TOP LAYER -->
        <div class="flex justify-between items-center">
          <a
            href="<?php echo(function_exists('pll_home_url') ? pll_home_url() : home_url()); ?>"
            title="Retour à la page d'accueil"
            class="max-w-[160px] md:max-w-[240px]"
          >
            <img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}" />
          </a>

          <div class="flex items-center gap-2">
            <a
              href="#"
              title="Rechercher"
              class="block relative bg-purple-300 rounded-full w-[36px] md:w-[50px] h-[36px] md:h-[50px] hover:bg-purple-200 duration-200"
            >
              <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                @include('svg.magnifying-glass')
              </span>
            </a>

            <button
              type="button"
              class="burger block md:hidden relative bg-purple-300 rounded-full w-[36px] h-[36px] cursor-pointer hover:bg-purple-200 duration-200"
            >
              <div
                class="burger-trigger --flat"
              >
                <span></span>
                <span></span>
                <span></span>
              </div>
            </button>
          </div>
        </div>

        <!-- BOTTOM LAYER -->
        @if (has_nav_menu('primary_navigation'))
          <nav 
            class="nav-primary"
            aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}"
          >
            {!!
              wp_nav_menu(array(
                'theme_location' => 'primary_navigation',
                'walker' => new Custom_Walker_Nav_Menu(),
                'menu_class' => 'nav',
                'echo' => false
              ));            
            !!}
          </nav>
        @endif
      </div>
    </div>
  </div>
</header>

@if (has_nav_menu('mobile_navigation'))
  <nav class="nav-mobile">
    <button
      type="button"
      class="help-wanted"
    >
      @include('svg.alex-face')
      <span class="text-xs xs:text-base font-medium whitespace-nowrap pl-[65px]">
        Comment puis-je vous aider ?
      </span>
    </button>

    {!!
      wp_nav_menu(array(
        'theme_location' => 'mobile_navigation',
        'walker' => new Custom_Walker_Nav_Menu(),
        'menu_class' => 'nav',
        'echo' => false
      ));            
    !!}
  </nav>
@endif

<div class="curtain"></div>