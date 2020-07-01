<div class="form-group {{$groupClass ?? ''}}">
    @isset($label)
        <label @isset($id) for="{{$id}}" @endisset @isset($labelClass) class="{{$labelClass}}" @endisset>{{$label ?? ''}}</label>
    @endisset

    <textarea
        @isset($id) id="{{$id}}" @endisset
        @isset($rows) rows="{{$rows}}" @endisset
        @isset($cols) cols="{{$cols}}" @endisset
        @isset($maxlength) maxlength="{{$maxlength}}" @endisset
        @isset($name) name="{{$name}}" @endisset
        @isset($pattern) pattern="{{$pattern}}" @endisset
        class="form-control @isset($class) {{$class}} @endisset @isset($name) @error($name) is-invalid @enderror @endisset"
        placeholder="{{$placeholder ?? $label ?? ''}}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        @if($autofocus) autofocus @endif
        @if($readonly) readonly @endif
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
