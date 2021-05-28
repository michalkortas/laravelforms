<?php

namespace michalkortas\LaravelForms\View\Components;

use Illuminate\View\Component;
use michalkortas\LaravelForms\Services\GetValueService;

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
    public $optionTextSeparator;
    /**
     * @var string
     */
    public $optionValueKey;
    /**
     * @var null
     */
    public $model;
    /**
     * @var null
     */
    public $class;
    /**
     * @var null
     */
    public $modelKey;
    /**
     * @var null
     */
    public $id;

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
     * @param string $optionTextSeparator
     * @param null $groupClass
     * @param null $labelClass
     * @param null $feedbackClass
     * @param array $model
     * @param null $modelKey
     * @param null $class
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
        $optionTextSeparator = ' ',
        $groupClass = null,
        $labelClass = null,
        $feedbackClass = null,
        $model = [],
        $modelKey = null,
        $class = null
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
        $this->optionTextSeparator = $optionTextSeparator;
        $this->value = $value;
        $this->groupClass = $groupClass;
        $this->labelClass = $labelClass;
        $this->feedbackClass = $feedbackClass;
        $this->model = $model;
        $this->modelKey = $modelKey;
        $this->class = $class;

        $this->value = GetValueService::getValue($this);

        if(!is_array($this->optionTextKey))
        {
            $this->optionTextKey = [$this->optionTextKey];
        }


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
