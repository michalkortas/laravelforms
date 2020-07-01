<?php

namespace michalkortas\LaravelForms\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * @var null
     */
    public $name;
    /**
     * @var null
     */
    public $label;
    /**
     * @var null
     */
    public $value;
    /**
     * @var bool
     */
    public $readonly;
    /**
     * @var bool
     */
    public $required;
    /**
     * @var bool
     */
    public $disabled;
    /**
     * @var bool
     */
    public $autofocus;
    /**
     * @var null
     */
    public $groupClass;
    /**
     * @var null
     */
    public $labelClass;
    /**
     * @var null
     */
    public $feedbackClass;
    /**
     * @var null
     */
    public $id;
    /**
     * @var null
     */
    public $emptyOptionText;
    /**
     * @var null
     */
    public $emptyOptionValue;
    /**
     * @var bool
     */
    public $empty;
    /**
     * @var array
     */
    public $options;
    /**
     * @var string
     */
    public $optionTextKey;
    /**
     * @var string
     */
    public $optionValueKey;

    /**
     * Create a new component instance.
     *
     * @param null $id
     * @param null $name
     * @param null $label
     * @param null $value
     * @param bool $empty
     * @param array $options
     * @param null $emptyOptionValue
     * @param null $emptyOptionText
     * @param string $optionValueKey
     * @param string $optionTextKey
     * @param bool $required
     * @param bool $readonly
     * @param bool $disabled
     * @param bool $autofocus
     * @param null $groupClass
     * @param null $labelClass
     * @param null $feedbackClass
     */
    public function __construct(
        $id = null,
        $name = null,
        $label = null,
        $value = null,
        $empty = false,
        $options = [],
        $emptyOptionValue = null,
        $emptyOptionText = null,
        $optionValueKey = 'id',
        $optionTextKey = 'name',
        $required = false,
        $readonly = false,
        $disabled = false,
        $autofocus = false,
        $groupClass = null,
        $labelClass = null,
        $feedbackClass = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->options = $options;
        $this->empty = $empty;
        $this->emptyOptionValue = $emptyOptionValue;
        $this->emptyOptionText = $emptyOptionText;
        $this->optionValueKey = $optionValueKey;
        $this->optionTextKey = $optionTextKey;
        $this->value = $value;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
        $this->autofocus = $autofocus;
        $this->groupClass = $groupClass;
        $this->labelClass = $labelClass;
        $this->feedbackClass = $feedbackClass;
    }

    /**
     * Determine if the given option is the current selected option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isSelected($option)
    {
        return $option == $this->value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravelforms::components.form-select');
    }
}
