<div class="form-group {{$groupClass ?? ''}}">
    @isset($label)
        <label @isset($id) for="{{$id}}" @endisset @isset($labelClass) class="{{$labelClass}}" @endisset>{{$label ?? ''}}</label>
    @endisset

    <input
        value="{{old($name ?? '') ?? $value}}"
        type="text"
        @isset($id) id="{{$id}}" @endisset
        @isset($name) name="{{$name}}" @endisset
        class="form-control @isset($class) {{$class}} @endisset @isset($name) @error($name) is-invalid @enderror @endisset"
        @if($required) required @endif
        @if($disabled) disabled @endif
        @if($autofocus) autofocus @endif
        @if($readonly) readonly @endif
        {{$attributes}}
    >

        <div class="btn-group w-100 btn-group-toggle" data-toggle="buttons">
            <label class="btn w-50 btn-light btn-radio @if((old($name ?? '') ?? $value == false)) active @endif">
                <input
                    type="radio"
                    @isset($name) name="{{$name}}" @endisset
                    value="{{$valueFalse}}"
                    autocomplete="off"
                    @if(($data->$name ?? true) == true) checked @endif
                    class="@error($name) is-invalid @enderror"
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    @if($readonly) readonly @endif>
                {{$textFalse}}
            </label>
            <label class="btn w-50 btn-light btn-radio @if((old($name ?? '') ?? $value == true)) active @endif">
                <input
                    type="radio"
                    @isset($name) name="{{$name}}" @endisset
                    value="{{$valueFalse}}"
                    autocomplete="off"
                    @if(($data->$name ?? true) == true) checked @endif
                    class="@error($name) is-invalid @enderror"
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    @if($readonly) readonly @endif>
                {{$textFalse}}
            </label>
        </div>


        @isset($name)
            @error($name)
                <span class="invalid-feedback {{$feedbackClass}}" role="alert">
                    <strong>{{ ucfirst($message ?? '') }}</strong>
                </span>
            @enderror
        @endisset
</div>
