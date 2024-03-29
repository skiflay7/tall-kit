<?php

namespace TALLKit\Components\Editors;

use Illuminate\Support\Str;

class Editor extends AbstractEditor
{
    /**
     * Get component key.
     *
     * @return string
     */
    protected function getComponentKey()
    {
        return $this->provider ?? 'tinymce';
    }

    /**
     * Json options.
     *
     * @return string
     */
    public function jsonOptions(...$args)
    {
        $editor = app(__NAMESPACE__.'\\'.Str::studly($this->getComponentKey()));

        return $editor->jsonOptions(...$args);
    }
}
