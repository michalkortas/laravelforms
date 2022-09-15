<?php

namespace michalkortas\LaravelForms\Services;

class GetValueService
{
    public static function getValue($model)
    {

        if(!empty(old($model->modelKey ?? $model->name))) {
            return old($model->modelKey ?? $model->name);
        }

        if($model->model !== [] && $model->value === null)
        {
            $value = data_get($model->model, $model->modelKey ?? $model->name);

            return $value;
        }

        if($model->value !== null)
        {
            return $model->value;
        }

        return null;
    }
}
