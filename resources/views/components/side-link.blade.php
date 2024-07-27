@props(["active"=>false,"href"=>""])

@php
$classes = ($active == false) 
            ? "text group-hover:bg-sky-900 group-hover:text-neutral-50 px-5 py-3 rounded flex" 
            : "text bg-sky-900 text-neutral-50 px-5 py-3 rounded flex"
@endphp

<a href="{{$href}}" class="group">
  <div {{$attributes->merge(["class"=>$classes])}}>{{$slot}}</div>
</a>