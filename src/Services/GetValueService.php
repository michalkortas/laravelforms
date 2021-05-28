<?php

namespace michalkortas\LaravelForms\Services;

class GetValueService
{
    public static function getValue($model)
    {
        if($model->model !== [] && $model->value === null)
        {
            $value = data_get($model->model, $model->modelKey ?? $model->name);
        }

        return $value ?? null;
    }
}
