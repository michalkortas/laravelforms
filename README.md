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
## Support
Laravel 7 is only supported version at this time
## Installation
<code>composer require michalkortas/laravelforms</code>

Register new ServiceProvider (only if not exists - Laravel register it automatically, but who knows?) in config/app.php
```php
michalkortas\BladeForms\LaravelFormsServiceProvider::class
```
## Example
### Text input
Inserted text component
```php
<x-form-text label="This is simple text label" name="text-input" value="" />
```
Gives text input
```html
<div class="form-group">
    <label>This is simple text label</label>
    <input value="" type="text" name="text-input" class="form-control" placeholder="This is simple text label">
</div>
```

### Select input
Inserted select component
```php
$options = [1=>"one", 2=>"two", 3=>"three"];
<x-form-select label="This is simple text label" name="select-input" value="2" :options="$options" />
```
Gives select input
```html
<div class="form-group">
    <label>This is simple text label</label>
    <select name="select-input" class="form-control">
        <option value="1">one</option>
        <option selected="&quot;selected&quot;" value="2">two</option>
        <option value="3">three</option>
    </select>
</div>
```
