<?php

namespace michalkortas\LaravelForms\View\Components;

use Illuminate\View\Component;

class Boolean extends Component
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
     * Create a new component instance.
     *
     * @param null $id
     * @param null $name
     * @param null $label
     * @param null $value
     * @param bool $required
     * @param bool $readonly
     * @param bool $disabled
     * @param null $groupClass
     * @param null $labelClass
     * @param null $feedbackClass
     * @param bool $valueFalse
     * @param bool $valueTrue
     * @param string $textFalse
     * @param string $textTrue
     * @param string $togglerClass
     */
    public function __construct(
        $id = null,
        $name = null,
        $label = null,
        $value = null,
        $required = false,
        $readonly = false,
        $disabled = false,
        $groupClass = null,
        $labelClass = null,
        $feedbackClass = null,
        $valueFalse = false,
        $valueTrue = true,
        $textFalse = 'O',
        $textTrue = 'I',
        $togglerClass = 'btn-light'
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
        $this->groupClass = $groupClass;
        $this->labelClass = $labelClass;
        $this->feedbackClass = $feedbackClass;
        $this->valueFalse = $valueFalse;
        $this->valueTrue = $valueTrue;
        $this->textFalse = $textFalse;
        $this->textTrue = $textTrue;
        $this->togglerClass = $togglerClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravelforms::components/form-boolean');
    }
}
