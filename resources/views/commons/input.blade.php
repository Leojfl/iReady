@php
    $inputClass=$inputClass??'';
    $labelClass=$labelClass??'';
    $id = isset($id)?$id:$name;
    $type = isset($type)?$type:'text';
    $value=$value??null;
    $propertiesInput=$properties??[];
@endphp
<div class="form-group">
    <input type="{{$type}}"
           autocomplete="off"
           class="{{ strpos($inputClass, 's/n') !== false?'':'form-control' }} {{$inputClass}} {{$errors->has($name)?'is-invalid':''}}"
           name="{{$name}}"
           id="{{$id}}"
           value="{{old($name,$value)}}"
    @foreach($propertiesInput as $key => $property )
        {{$property.' '}}
        @endforeach

    >
    <label class="{{ strpos($labelClass, 's/n') !== false?'':'label-control' }} {{$labelClass}}" for="{{$id}}">{{$label}}</label>

    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{$errors->first($name)}}
        </div>
    @endif
    @isset($help)
        <small class="form-text text-muted">
            {{$help}}
        </small>
    @endisset
</div>
