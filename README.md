# laravelforms
A simple library to make Laravel Blade forms faster and easier. 
Every component returns full form control with Bootstrap CSS classes. 
Out of the box supports Laravel validation errors.

### Supported form input components
- Checkbox
- Color
- Date
- DateTime
- Email
- Hidden
- Number
- Password
- Phone
- Radio
- Select
- Select Multiple
- Text
- Textarea
- Url 

## Licence
MIT
## Documentation & usage 
Documentation is available on package website https://webroad.dev/packages/laravelforms/documentation

Packagist: https://packagist.org/packages/michalkortas/laravelforms
## Support
Laravel 7 is only supported version at this time
## Installation
<code>composer require michalkortas/laravelforms</code>

Register new ServiceProvider (only if not exists - Laravel register it automatically, but who knows?) in config/app.php
```php
michalkortas\LaravelForms\LaravelFormsServiceProvider::class
```

## Last changes (v1.1.x)
- Added support for Laravel Models
- Removed unused parameters

## Example
### Simple Text input
Inserted Text component
```php
<x-form-text label="This is simple text label" name="text-input" value="" />
```
HTML output:
```html
<div class="form-group">
    <label>This is simple text label</label>
    <input value="" type="text" name="text-input" class="form-control" placeholder="This is simple text label">
</div>
```

### Simple Select input
Inserted Select component
```php
$options = [1=>"one", 2=>"two", 3=>"three"];
<x-form-select label="This is simple text label" name="select-input" value="2" :options="$options" />
```
HTML output:
```html
<div class="form-group">
    <label>This is simple text label</label>
    <select name="select-input" class="form-control">
        <option value="1">one</option>
        <option selected="selected" value="2">two</option>
        <option value="3">three</option>
    </select>
</div>
```

### Using Laravel Models
You can also use Laravel Models to fill every inputs. 

#### Simple inputs
```php
<x-form-text :model="$model" name="translation" label="String translation" />
```
HTML output:
```html
<div class="form-group ">
    <label>String translation</label>
    <input type="text" name="translation" value="First value" class="form-control" placeholder="String translation">
</div>
```

Object key is set by "name" attribute. If you want to change it, use "model-key" attribute instead. This can be also relation path (separator: ".""), eg. <em>firstrelation.second.id</em>
```php
<x-form-text :model="$model" model-key="otherkey" name="translation" label="String translation" />
```
HTML output:
```html
<div class="form-group ">
    <label>String translation</label>
    <input type="text" name="translation" value="Other value" class="form-control" placeholder="String translation">
</div>
```
#### Inputs with multiple values (eg. select multiple, checkbox)
If you want to get data from your Pivot relation to check multiple options, pass via model-key attribute relation path to related table. Last part of this path is a table field, that should be use to <a href="https://laravel.com/docs/7.x/collections#method-pluck">verify checked/selected state</a>. 
```php
<x-form-checkbox :model="$model" model-key="departments.id" :options="$departments" label="Select department" />
