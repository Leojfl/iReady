@php
    /** @var $name */

    $options= $options??[];
    $disabled=$disabled??false;
    $id = $id??$name
@endphp
<div class="form-group {{ $divClass??'' }}">
    <select {{ $disabled?'disabled':'' }}
            id="{{$id}}"
            class="form-control {{ $selectClass??'' }}"
            name="{{$name}}">
        @foreach($options as $key=> $option)
            <option class="{{ $optionClass??'' }}"
                    value="{{$key}}"  {{($selected==$key)?'selected':''}}>{{$option}}</option>
        @endforeach
    </select>

    <label class="label-control {{ $labelClass??'' }}"
           for="{{$id}}">{{$label}}</label>
</div>
