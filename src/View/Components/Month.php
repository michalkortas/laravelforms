<?php

namespace michalkortas\LaravelForms\View\Components;

use Illuminate\View\Component;
use michalkortas\LaravelForms\Services\GetValueService;

class Month extends Component
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
    public $class;
    /**
     * @var null
     */
    public $modelKey;
    /**
     * @var array
     */
    public $model;
    /**
     * @var null
     */
    public $id;

    /**
     * Create a new component instance.
     *
     * @param null $name
     * @param null $label
     * @param null $value
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
        $this->groupClass = $groupClass;
        $this->labelClass = $labelClass;
        $this->feedbackClass = $feedbackClass;
        $this->model = $model;
        $this->modelKey = $modelKey;
        $this->class = $class;

        $this->value = GetValueService::getValue($this);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravelforms::components.form-month');
    }
}
