@props(['name'])

<x-form.field>
    <x-form.label name="{{$name}}"/>

    <textarea
        class="border border-gray-200 p-2 w-full rounded"
        name="{{$name}}" id="{{$name}}"
        {{-- value="{{old($name)}}" --}}
        required
        {{$atributes}}
    >{{ $slot ?? old($name) }}

    <x-form.error name="{{$name}}"/>
</x-form.field>
