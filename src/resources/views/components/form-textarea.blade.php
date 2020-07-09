<div class="form-group {{$groupClass ?? ''}}">
    @isset($label)
        <label @isset($id) for="{{$id}}" @endisset @isset($labelClass) class="{{$labelClass}}" @endisset>{{$label ?? ''}}</label>
    @endisset

    <textarea
        @isset($id) id="{{$id}}" @endisset
        @isset($name) name="{{$name}}" @endisset
        class="form-control @isset($class) {{$class}} @endisset @isset($name) @error($name) is-invalid @enderror @endisset"
        placeholder="{{$placeholder ?? $label ?? ''}}"
        {{$attributes}}
    >{{old($name ?? '') ?? $value}}</textarea>

    @isset($name)
        @error($name)
            <span class="invalid-feedback {{$feedbackClass}}" role="alert">
                <strong>{{ ucfirst($message ?? '') }}</strong>
            </span>
        @enderror
    @endisset
</div>
