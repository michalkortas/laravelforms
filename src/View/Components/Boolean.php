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
     * @param null $id
     * @param null $name
     * @param null $label
     * @param null $value
     * @param null $groupClass
     * @param null $labelClass
     * @param null $feedbackClass
     * @param bool $valueFalse
     * @param bool $valueTrue
     * @param string $textFalse
     * @param string $textTrue
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
        $valueFalse = false,
        $valueTrue = true,
        $textFalse = 'No',
        $textTrue = 'Yes',
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
        $this->textFalse = $textFalse;
        $this->textTrue = $textTrue;
        $this->togglerClass = $togglerClass;
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
        return view('laravelforms::components/form-boolean');
    }
}
