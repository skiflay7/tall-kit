@empty ($_COOKIE[$name])
    <div {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'container')
            ->merge(['x-init' => 'setup(\''.$name.'\', '.$expires.')'])
            ->merge($events())
        }}
    >
        <x-modal
            {{ $attributes->mergeThemeProvider($themeProvider, 'modal') }}
            :name="$name.'-modal'"
            :overlay="$overlay"
            :closeable="$closeable"
            :align="$align"
            :transition="$transition"
            :theme="$theme"
        >
            @if ($slot->isEmpty())
                <x-section
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'section') }}
                    :title="__($title ?? 'This site uses cookies')"
                    :subtitle="$subtitle"
                    :theme="$theme"
                >
                    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}>
                        @isset ($content)
                            {{ $content }}
                        @else
                            {!! __($description ?? 'Hi! Our website uses cookies so that we can optimize the service we provide you. By using our website, you agree to their use.') !!}
                            <a {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'link')->merge(['href' => $url]) }}>
                                {!! __($more ?? 'To learn more, read our cookie policy.') !!}
                            </a>
                        @endisset
                    </div>

                    @isset ($button)
                        {{ $button }}
                    @else
                        <x-button
                            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'button') }}
                            :click="'$dispatch(\''.$name.'-close\')'"
                            :text="__($buttonText ?? 'I agree')"
                            :icon="$buttonIcon"
                            :icon-left="$buttonIconLeft"
                            :icon-right="$buttonIconRight"
                            :color="$buttonColor"
                            :rounded="$buttonRounded"
                            :shadow="$buttonShadow"
                            :outlined="$buttonOutlined"
                            :link-text="$buttonLinkText"
                            :bordered="$buttonBordered"
                            :tooltip="$buttonTooltip"
                            :theme="$theme"
                        />
                    @endisset

                    <x-slot name="actions">
                        {{ $actions ?? '' }}
                    </x-slot>
                </x-section>
            @else
                {{ $slot }}
            @endif
        </x-modal>
    </div>
@endempty
