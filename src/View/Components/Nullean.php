<?php

namespace michalkortas\LaravelForms\View\Components;

use Illuminate\View\Component;
use michalkortas\LaravelForms\Services\GetValueService;

class Nullean extends Component
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
     * @var string
     */
    public $togglerClass;
    /**
     * @var string
     */
    public $textTrue;
    /**
     * @var string
     */
    public $textFalse;
    /**
     * @var bool
     */
    public $valueTrue;
    /**
     * @var bool
     */
    public $valueFalse;
    /**
     * @var string
     */
    public $textNull;
    /**
     * @var array
     */
    public $model;
    /**
     * @var null
     */
    public $modelKey;
    /**
     * @var null
     */
    public $class;
    /**
     * @var null
     */
    public $valueNull;

    /**
     * Create a new component instance.
     *
     * @param null $id
     * @param null $name
     * @param null $label
     * @param null $value
     * @param null $groupClass
     * @param null $labelClass
     * @param null $feedbackClass
     * @param int $valueFalse
     * @param int $valueTrue
     * @param null $valueNull
     * @param string $textFalse
     * @param string $textTrue
     * @param string $textNull
     * @param string $togglerClass
     * @param array $model
     * @param null $modelKey
     * @param null $class
     */
    public function __construct(
        $id = null,
        $name = null,
        $label = null,
        $value = null,
        $groupClass = null,
        $labelClass = null,
        $feedbackClass = null,
        $valueFalse = 0,
        $valueTrue = 1,
        $valueNull = null,
        $textFalse = 'No',
        $textTrue = 'Yes',
        $textNull = '?',
        $togglerClass = 'btn-secondary',
        $model = [],
        $modelKey = null,
        $class = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->groupClass = $groupClass;
        $this->labelClass = $labelClass;
        $this->feedbackClass = $feedbackClass;
        $this->valueFalse = $valueFalse;
        $this->valueTrue = $valueTrue;
        $this->valueNull = $valueNull;
        $this->textFalse = $textFalse;
        $this->textTrue = $textTrue;
        $this->textNull = $textNull;
        $this->togglerClass = $togglerClass;
        $this->model = $model;
        $this->modelKey = $modelKey;
        $this->class = $class;

        $this->value = GetValueService::getValue($this);
    }

    /**
     * Determine if the given option is the current selected option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isTrue($option)
    {
        if($this->value === '1' || $this->value === true || $this->value === $this->valueTrue)
            return $option == $this->value;
    }

    /**
     * Determine if the given option is the current selected option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isFalse($option)
    {
        if($this->value === '0' || $this->value === false || $this->value === $this->valueFalse)
            return $option == $this->value;
    }

    /**
     * Determine if the given option is the current selected option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isNullable($option)
    {
        if($this->value === null || $this->value == '' || $this->value === $this->valueNull)
            return $option === $this->value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravelforms::components/form-nullean');
    }
}
