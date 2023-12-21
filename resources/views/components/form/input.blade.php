@props(['name', 'type'=>'text', 'value'=>''])
<x-form.wrapper>
    <x-form.label :name="$name"/>
    <input
        id="{{$name}}"
        type="{{$type}}"
        class="form-control"
        name="{{$name}}"
        value="{{old($name, $value)}}"
    >
    <x-error :name="$name" />
</x-form.wrapper>
