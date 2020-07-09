<?php

namespace michalkortas\LaravelForms\View\Components;

use Illuminate\View\Component;

class SelectMultiple extends Component
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
     * @var array
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
     * Create a new component instance.
     *
     * @param null $id
     * @param null $name
     * @param null $label
     * @param array $value
     * @param bool $empty
     * @param array $options
     * @param null $emptyOptionValue
     * @param null $emptyOptionText
     * @param string $optionValueKey
     * @param string $optionTextKey
     * @param null $groupClass
     * @param null $labelClass
     * @param null $feedbackClass
     * @param array $model
     * @param null $modelKey
     * @param null $class
     * @param string $pluck
     */
    public function __construct(
        $id = null,
        $name = null,
        $label = null,
        $value = [],
        $empty = false,
        $options = [],
        $emptyOptionValue = null,
        $emptyOptionText = null,
        $optionValueKey = 'id',
        $optionTextKey = 'name',
        $groupClass = null,
        $labelClass = null,
        $feedbackClass = null,
        $model = [],
        $modelKey = null,
        $class = null,
        $pluck = 'id'
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
        $this->groupClass = $groupClass;
        $this->labelClass = $labelClass;
        $this->feedbackClass = $feedbackClass;
        $this->model = $model;
        $this->modelKey = $modelKey;
        $this->class = $class;

        if($this->model !== [] && $this->value === [])
        {
            if($this->modelKey !== null)
            {
                $relationRoute = explode('.', $this->modelKey ?? '');

                if(count($relationRoute) > 1)
                {
                    $this->value = $this->model;

                    $i = 1;

                    foreach ($relationRoute as $part)
                    {
                        if(count($relationRoute) > $i)
                        {
                            if(isset($this->value->{$part}))
                                $this->value = $this->value->{$part};
                            else
                                $this->value = null;
                        }
                        else
                        {
                            $pluck = $part;
                        }

                        $i++;
                    }

                    $this->value = $this->value->pluck($pluck)->all();
                }
                else
                {
                    $this->value = $this->model->{$this->modelKey};
                }
            }
            else
            {
                if($this->name !== null)
                {
                    $relationName = explode('[]', $this->name)[0];
                    $this->value = $this->model->{$relationName}->pluck('id')->all();
                }
            }
        }

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
        return in_array($option, $this->value ?? []);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('laravelforms::components.form-select-multiple');
    }
}
