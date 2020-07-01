<?php

namespace michalkortas\LaravelForms\View\Components;

use Illuminate\View\Component;

class Color extends Component
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
    public $placeholder;
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
    public $pattern;
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
     * Create a new component instance.
     *
     * @param null $id
     * @param null $name
     * @param null $label
     * @param null $placeholder
     * @param null $value
     * @param bool $required
     * @param bool $readonly
     * @param bool $disabled
     * @param bool $autofocus
     * @param null $pattern
     * @param null $groupClass
     * @param null $labelClass
     * @param null $feedbackClass
     */
    public function __construct(
        $id = null,
        $name = null,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = false,
        $readonly = false,
        $disabled = false,
        $autofocus = false,
        $pattern = null,
        $groupClass = null,
        $labelClass = null,
        $feedbackClass = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
        $this->autofocus = $autofocus;
        $this->pattern = $pattern;
        $this->groupClass = $groupClass;
        $this->labelClass = $labelClass;
        $this->feedbackClass = $feedbackClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravelforms::components.form-color');
    }
}
