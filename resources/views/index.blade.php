@extends('layouts.app')

@section('content')
    @include('partials.page-header')

    <div class="container mx-auto flex flex-col space-y-10">
        {{-- Buttons --}}
        <div>
            <h2 class="mb-2 text-xl font-semibold">Buttons</h2>
            <x-button x-data="" x-on:click="alert('Alpine data!')">
                Default
            </x-button>
            <x-button type="primary">
                Primary
            </x-button>
        </div>

        {{-- Inputs --}}
        <div>
            <h2 class="mb-2 text-xl font-semibold">Inputs</h2>

            <div class="grid grid-cols-1 divide-y">
                {{-- Select --}}
                <div class="py-6">
                    <h3 class="mb-2">Select</h3>
                    <div class="max-w-sm">
                      <x-input.select class="select" :options="[
                          'select-1' => 'Option 1',
                          'select-2' => 'Option 2',
                          'select-3' => 'Option 3',
                          'select-4' => 'Option 4',
                          'select-5' => 'Option 5',
                      ]"
                      ></x-input.select>
                    </div>
                </div>
                {{-- Radio --}}
                <div class="py-6">
                    <h3 class="mb-2">Radio</h3>
                    <x-input.radio name="example" legend="Example Radio" :options="[
                        'radio-1' => 'Option 1',
                        'radio-2' => 'Option 2',
                        'radio-3' => 'Option 3',
                        'radio-4' => 'Option 4',
                        'radio-5' => 'Option 5',
                    ]"
                    ></x-input.radio>
                </div>
                {{-- Checkbox --}}
                <div class="py-6">
                    <h3 class="mb-2">Checkbox</h3>
                    <x-input.checkbox legend="Example Checkbox" :options="[
                        'checkbox-1' => 'Option 1',
                        'checkbox-2' => 'Option 2',
                        'checkbox-3' => 'Option 3',
                        'checkbox-4' => 'Option 4',
                        'checkbox-5' => 'Option 5',
                    ]"
                    ></x-input.checkbox>
                </div>
            </div>
        </div>

        {{-- Modals --}}
        <div>
            <h2 class="mb-2 text-xl">Modals</h2>

        </div>

        {{-- Tabs --}}
        <div>
            <h2 class="mb-2 text-xl">Tabs</h2>
            @php
                $tabs = [
                    'tab-1' => 'Tab 1',
                    'tab-2' => 'Tab 2',
                    'tab-3' => 'Tab 3',
                ];
            @endphp
            <x-tabs active="{{ array_key_first($tabs) }}">
                <x-slot:tabs>
                  @foreach ($tabs as $name => $label)
                    <x-tabs.tab :name="$name">
                        {{ $label }}
                    </x-tabs.tab>
                  @endforeach
                </x-slot:tabs>

                <x-slot:content>
                  @foreach ($tabs as $name => $label)
                    <x-tabs.content :name="$name">
                      <p>{{ $label }} content</p>
                    </x-tabs.content>
                  @endforeach
                </x-slot:content>
            </x-tabs>
        </div>

        {{-- Sharing --}}
        <div>
            <h2 class="mb-2 text-xl">Sharing (preview)</h2>
            <x-button type="primary"
              x-data=""
              x-on:click="if (window.navigator.canShare) {
                window.navigator.share({
                  url: 'https://example.org',
                  title: 'Example',
                  text: 'An example of sharing',
                })
                .then(() => console.log('Share was successful.'))
                .catch((error) => console.log('Sharing failed', error));
              } else {
                console.log(`Your system doesn't support sharing files.`);
              }"
            >
              Share
          </x-button>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('sections.sidebar')
@endsection
