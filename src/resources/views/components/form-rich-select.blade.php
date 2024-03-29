<div class="form-group {{$groupClass ?? ''}}">
    <div class="row">
        <div class="col-md-4">
            <label>Wyszukaj klienta</label>
            <input class="form-control filterSelect" value="" placeholder="Wyszukaj klienta">
        </div>
        <div class="col-md-8">
            @isset($label)
                <label @isset($id) for="{{$id}}" @endisset @isset($labelClass) class="{{$labelClass}}" @endisset>{{$label ?? ''}}</label>
            @endisset
            <select
                @isset($id) id="{{$id}}" @endisset
            @isset($name) name="{{$name}}" @endisset
                class="form-control @isset($class) {{$class}} @endisset @isset($name) @error($name) is-invalid @enderror @endisset"
                {{$attributes}}
            >
                @if($empty)
                    <option value="{{$emptyOptionValue ?? null}}">{{$emptyOptionText ?? '---'}}</option>
                @endif

                @if(is_object($options))
                    @foreach($options ?? [] as $object)
                        <option {{ $isSelected($object->$optionValueKey) ? 'selected' : '' }} value="{{$object->$optionValueKey}}">

                            @foreach($optionTextKey ?? [] as $optionText)
                                @php
                                    $option = data_get($object, $optionText);
                                @endphp
                                @if(!$loop->first) {{$optionTextSeparator}} @endif {{$option}}
                            @endforeach
                        </option>
                    @endforeach
                @elseif(is_array($options))
                    @foreach($options ?? [] as $optionValue => $optionText)
                        <option {{ $isSelected($optionValue) ? 'selected' : '' }} value="{{$optionValue}}">{{$optionText}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>


    @isset($name)
        @error($name)
            <span class="invalid-feedback {{$feedbackClass}}" role="alert">
                <strong>{{ ucfirst($message ?? '') }}</strong>
            </span>
        @enderror
    @endisset
</div>
