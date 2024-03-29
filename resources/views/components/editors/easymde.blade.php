<x-field {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :theme="$theme"
>
    @if ($label || isset($labelContent))
        <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
            <x-label
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label-text') }}
                :label="$label"
                :theme="$theme"
            >
                {{ $labelContent ?? '' }}
            </x-label>
        </label>
    @endif

    <x-loading {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }} />

    <x-textarea
        {{ $attributes->mergeThemeProvider($themeProvider, 'editor') }}
        :name="$name"
        :id="$id"
        :label="false"
        :modifier="$modifier"
        :default="$slot->isEmpty() ? $default : $slot"
        :show-errors="$showErrors"
        :theme="$theme"
        :groupable="false"
    />
</x-field>
