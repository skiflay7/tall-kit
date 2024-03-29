@if (is_array($html))
    <x-html
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'html', 'attrs') }}
        :options="$html"
        :theme="$theme"
    >
    @isset ($head)
        <x-slot name="head">
            {{ $head }}
        </x-slot>
    @endisset
@endif
<div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header') }}>
        <x-logo
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'logo') }}
            :image="$logoImage"
            :name="$logoName"
            :url="$logoUrl"
            :route="$logoRoute"
            :theme="$theme"
        >
            {{ $logo ?? '' }}
        </x-logo>
    </div>

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'card') }}>
        <x-messages
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'messages') }}
            :session="$messageSession"
            :theme="$theme"
        />

        {{ $slot }}
    </div>
</div>
@if (is_array($html))
    </x-html>
@endif
