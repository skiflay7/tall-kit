<?php

namespace TALLKit\Components\Tables;

use TALLKit\Components\BladeComponent;

class Cell extends BladeComponent
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * @var string
     */
    public $align;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $text
     * @param  string|bool|null  $align
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $align = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->align = $align ?? 'left';
    }
}
