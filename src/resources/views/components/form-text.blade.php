<div class="form-group {{$groupClass ?? ''}}">
    @isset($label)
        <label @isset($id) for="{{$id}}" @endisset @isset($labelClass) class="{{$labelClass}}" @endisset>{{$label ?? ''}}</label>
    @endisset

    <input
        value="{{old($name ?? '') ?? $value}}"
        type="{{$type}}"
        @isset($id) id="{{$id}}" @endisset
        @isset($name) name="{{$name}}" @endisset
        class="form-control @isset($class) {{$class}} @endisset @isset($name) @error($name) is-invalid @enderror @endisset"
        placeholder="{{$placeholder ?? $label ?? ''}}"
        {{$attributes}}
    >

        @isset($name)
            @error($name)
                <span class="invalid-feedback {{$feedbackClass}}" role="alert">
                    <strong>{{ ucfirst($message ?? '') }}</strong>
                </span>
            @enderror
        @endisset
</div>
