<div class="form-group {{$groupClass ?? ''}}">
    @isset($label)
        <label @isset($id) for="{{$id}}" @endisset @isset($labelClass) class="{{$labelClass}}" @endisset>{{$label ?? ''}}</label>
    @endisset

    <div class="w-100 btn-group btn-group-toggle nullean-input" data-toggle="buttons">
        <label style="width: 33.33%" class="btn false-option {{$togglerClass}} {{ $isFalse($valueFalse) ? 'active' : '' }}">
            <input
                type="radio"
                @isset($name) name="{{$name}}" @endisset
                value="{{$valueFalse}}"
                autocomplete="off"
                {{ $isFalse($valueFalse) ? 'checked' : '' }}
                class="@error($name) is-invalid @enderror" {{$attributes}}>
            {{$textFalse}}
        </label>
        <label style="width: 33.33%" class="btn nullable-option {{$togglerClass}} {{ $isNullable($valueNull) ? 'active' : '' }}">
            <input
                type="radio"
                @isset($name) name="{{$name}}" @endisset
                value="{{$valueNull}}"
                autocomplete="off"
                {{ $isNullable($valueNull) ? 'checked' : '' }}
                class="@error($name) is-invalid @enderror" {{$attributes}}>
            {{$textNull}}
        </label>
        <label style="width: 33.33%" class="btn true-option {{$togglerClass}} {{ $isTrue($valueTrue) ? 'active' : '' }}">
            <input
                type="radio"
                @isset($name) name="{{$name}}" @endisset
                value="{{$valueTrue}}"
                autocomplete="off"
                {{ $isTrue($valueTrue) ? 'checked' : '' }}
                class="@error($name) is-invalid @enderror" {{$attributes}}>
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
