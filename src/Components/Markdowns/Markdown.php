<?php

namespace TALLKit\Components\Markdowns;

use Illuminate\Support\Facades\Cache;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;
use TALLKit\Components\BladeComponent;

class Markdown extends BladeComponent
{
    /**
     * @var array
     */
    protected $options;

    /**
     * @var int|bool|null
     */
    protected $ttl;

    /**
     * Create a new component instance.
     *
     * @param  array  $options
     * @param  int|bool|null  $ttl
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = [
            'html_input' => 'allow',
            'allow_unsafe_links' => true,
        ],
        $ttl = 3600,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->options = $options;
        $this->ttl = $ttl;
    }

    /**
     * To Html.
     *
     * @param  string  $markdown
     * @return string
     */
    public function toHtml($markdown)
    {
        if (! $this->ttl) {
            return $this->converter()->convertToHtml($markdown);
        }

        $key = base64_encode(serialize(compact('markdown') + $this->options));

        return Cache::remember('markdown.'.$key, $this->ttl, function () use ($markdown) {
            return $this->converter()->convertToHtml($markdown);
        });
    }

    /**
     * Converter.
     *
     * @return \League\CommonMark\MarkdownConverterInterface
     */
    protected function converter()
    {
        $config = $this->options;
        $blocks = $config['blocks'] ?? [];
        $inlines = $config['inlines'] ?? [];
        $delimiters = $config['delimiters'] ?? [];
        $renderers = $config['renderers'] ?? [];
        $extensions = $config['extensions'] ?? [];
        $listeners = $config['listeners'] ?? [];

        unset($config['blocks']);
        unset($config['inlines']);
        unset($config['delimiters']);
        unset($config['renderers']);
        unset($config['extensions']);
        unset($config['listeners']);

        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());

        foreach ($blocks as $block) {
            $environment->addBlockStartParser(is_array($block) ? $block[0] : $block, is_array($block) ? $block[1] ?? 0 : 0);
        }

        foreach ($inlines as $inline) {
            $environment->addInlineParser(is_array($inline) ? $inline[0] : $inline, is_array($inline) ? $inline[1] ?? 0 : 0);
        }

        foreach ($delimiters as $delimiter) {
            $environment->addDelimiterProcessor($delimiter);
        }

        foreach ($renderers as $renderer) {
            if (is_array($renderer)) {
                $environment->addRenderer($renderer[0], $renderer[1], $renderer[2] ?? 0);
            }
        }

        foreach ($extensions as $extension) {
            $environment->addExtension($extension);
        }

        foreach ($listeners as $listener) {
            if (is_array($listener)) {
                $environment->addEventListener($listener[0], $listener[1], $listener[2] ?? 0);
            }
        }

        return new MarkdownConverter($environment);
    }
}