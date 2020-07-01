<div class="form-group {{$groupClass ?? ''}}">
    @isset($label)
        <label @isset($id) for="{{$id}}" @endisset @isset($labelClass) class="{{$labelClass}}" @endisset>{{$label ?? ''}}</label>
    @endisset

    <div class="btn-group w-100 btn-group-toggle" data-toggle="buttons">
        <label class="btn w-50 {{$togglerClass}} btn-radio {{ $isSelected($valueFalse) ? 'active' : '' }}">
            <input
                type="radio"
                @isset($name) name="{{$name}}" @endisset
                value="{{$valueFalse}}"
                autocomplete="off"
                {{ $isSelected($valueFalse) ? 'checked' : '' }}
                class="@error($name) is-invalid @enderror"
                @if($required) required @endif
                @if($disabled) disabled @endif
                @if($readonly) readonly @endif>
            {{$textFalse}}
        </label>
        <label class="btn w-50 {{$togglerClass}} btn-radio {{ $isSelected($valueTrue) ? 'active' : '' }}">
            <input
                type="radio"
                @isset($name) name="{{$name}}" @endisset
                value="{{$valueTrue}}"
                autocomplete="off"
                {{ $isSelected($valueTrue) ? 'checked' : '' }}
                class="@error($name) is-invalid @enderror"
                @if($required) required @endif
                @if($disabled) disabled @endif
                @if($readonly) readonly @endif>
            {{$textTrue}}
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
