<div class="form-group {{$groupClass ?? ''}}">
    @isset($label)
        <label @isset($id) @endisset @isset($labelClass) class="{{$labelClass}}" @endisset>{{$label ?? ''}}</label>
    @endisset

    @if($empty)
        <option value="{{$emptyOptionValue ?? null}}">{{$emptyOptionText ?? '---'}}</option>
    @endif

    @if(is_object($options))
        @foreach($options ?? [] as $object)
            <div class="form-check @if($inline) form-check-inline @endif">
                <input
                    id="{{$name}}_val_{{$object->$optionValueKey}}"
                    type="checkbox"
                    value="{{$object->$optionValueKey}}"
                    @isset($id) id="{{$id}}" @endisset
                    @isset($name) name="{{$name}}" @endisset
                    class="form-check-input @isset($class) {{$class}} @endisset @isset($name) @error($name) is-invalid @enderror @endisset"
                    {{$attributes}} {{ $isSelected($object->$optionValueKey) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{$name}}_val_{{$object->$optionValueKey}}">
                    @foreach($optionTextKey ?? [] as $optionText)
                        @php
                            $parts = explode('.', $optionText ?? '');
                            $option = $object->$optionText;

                            if(count($parts) > 1)
                            {
                                $option = $object;

                                foreach ($parts as $part)
                                {
                                    if(isset($option->{$part}))
                                        $option = $option->{$part};
                                    else
                                        $option = null;
                                }
                            }
                        @endphp
                        @if(!$loop->first) {{$optionTextSeparator}} @endif {{$option}}
                    @endforeach
                </label>
            </div>
        @endforeach
    @elseif(is_array($options))
        @foreach($options ?? [] as $optionValue => $optionText)
            <div class="form-check @if($inline) form-check-inline @endif">
                <input
                    id="{{$name}}_val_{{$optionValue}}"
                    type="checkbox"
                    value="{{$optionValue}}"
                    @isset($id) id="{{$id}}" @endisset
                    @isset($name) name="{{$name}}" @endisset
                    class="form-check-input @isset($class) {{$class}} @endisset @isset($name) @error($name) is-invalid @enderror @endisset"
                    {{$attributes}} {{ $isSelected($optionValue) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{$name}}_val_{{$optionValue}}">
                    {{$optionText}}
                </label>
            </div>
        @endforeach
    @endif

    @isset($name)
        @error($name)
        <span class="invalid-feedback {{$feedbackClass}}" role="alert">
                <strong>{{ ucfirst($message ?? '') }}</strong>
            </span>
        @enderror
    @endisset
</div>
