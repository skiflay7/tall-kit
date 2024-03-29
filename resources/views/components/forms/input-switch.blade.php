<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :theme="$theme"
>
    <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
        @if ($value === 1 && $isNotWired() && !Str::endsWith($name, '[]'))
            <input type="hidden" value="0" name="{{ $name }}" />
        @endif

        <input
            {{ $attributes->mergeThemeProvider($themeProvider, 'checkbox') }}
            type="checkbox"
            value="{{ $value }}"

            @if ($name)
                name="{{ $name }}"
            @endif

            @if ($isModel() && $name)
                x-model{!! $modelModifier($modifier) !!}="{{ $modelName($name) }}"
            @endif

            @if ($isWired() && $name)
                wire:model{!! $wireModifier($modifier) !!}="{{ $name }}"
            @endif

            @if ($checked)
                checked="checked"
            @endif
        />

        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'switch') }}></div>

        <x-label
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label-text') }}
            :label="$label"
            :theme="$theme"
        >
            {{ $slot }}
        </x-label>
    </label>
</x-field>
