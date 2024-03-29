<?php

namespace TALLKit\Components\Forms;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use TALLKit\Concerns\PrepareOptions;

class Select extends Field
{
    use PrepareOptions;

    /**
     * @var mixed
     */
    public $selectedKey;

    /**
     * @var array|bool|null
     */
    protected $choices;

    /**
     * @var bool
     */
    public $multiple;

    /**
     * @var bool
     */
    public $emptyOption;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  mixed  $options
     * @param  string|array|int|null  $itemValue
     * @param  string|array|int|null  $itemText
     * @param  mixed  $bind
     * @param  string|null  $modifier
     * @param  mixed  $default
     * @param  array|bool|null  $choices
     * @param  bool|null  $multiple
     * @param  bool|null  $emptyOption
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @param  bool|null  $groupable
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $options = null,
        $itemValue = null,
        $itemText = null,
        $bind = null,
        $modifier = null,
        $default = null,
        $choices = null,
        $multiple = null,
        $emptyOption = null,
        $showErrors = null,
        $theme = null,
        $groupable = null,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null
    ) {
        parent::__construct(
            $name,
            $label,
            $modifier,
            $showErrors,
            $theme,
            $groupable ?? true,
            $prependText,
            $prependIcon,
            $appendText,
            $appendIcon
        );

        $this->setOptions($options, $itemValue, $itemText);

        if ($this->isNotWired()) {
            $this->selectedKey = $this->getFieldValue($bind, $default);

            if ($this->selectedKey instanceof Collection) {
                $this->selectedKey = $this->selectedKey->pluck($this->itemValue)->toArray();
            }

            if ($this->selectedKey instanceof Arrayable) {
                $this->selectedKey = $this->selectedKey->toArray();
            }
        }

        $this->choices = $choices;
        $this->multiple = $multiple ?? false;
        $this->emptyOption = $emptyOption ?? true;
    }

    /**
     * Check if the option is selected.
     *
     * @param  mixed  $key
     * @return bool
     */
    public function isSelected($key = null)
    {
        if ($this->isWired()) {
            return false;
        }

        if (is_null($key)) {
            return empty(Arr::wrap($this->selectedKey));
        }

        return in_array($key, Arr::wrap($this->selectedKey));
    }

    /**
     * Choices options.
     *
     * @return array
     */
    public function choicesOptions()
    {
        if (! $this->choices) {
            return [];
        }

        $encoded = json_encode((object) (is_array($this->choices) ? $this->choices : []));

        return $this->attributes
            ->mergeOnlyThemeProvider($this->themeProvider, 'choices')
            ->merge(['x-init' => 'setup('.$encoded.')'], false)
            ->getAttributes();
    }
}
