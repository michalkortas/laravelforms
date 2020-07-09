<?php

namespace michalkortas\LaravelForms\View\Components;

use Illuminate\View\Component;

class Number extends Component
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
    public $id;

    /**
     * Create a new component instance.
     *
     * @param null $name
     * @param null $label
     * @param null $placeholder
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
        $placeholder = null,
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
        $this->placeholder = $placeholder;
        $this->groupClass = $groupClass;
        $this->labelClass = $labelClass;
        $this->feedbackClass = $feedbackClass;
        $this->model = $model;
        $this->modelKey = $modelKey;
        $this->class = $class;

        if($this->model !== [] && $this->value === null)
        {
            $relationRoute = explode('.', $this->modelKey ?? '');

            if(count($relationRoute) > 1)
            {
                $this->value = $this->model;

                foreach ($relationRoute as $part)
                {
                    if(isset($this->value->{$part}))
                        $this->value = $this->value->{$part};
                    else
                        $this->value = null;
                }
            }
            else
            {
                $this->value = $this->model->{$this->modelKey ?? $this->name};
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravelforms::components.form-number');
    }
}
