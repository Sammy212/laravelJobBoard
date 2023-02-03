@props(['tagsCsv']) {{--take in the tags as props and fix in an array --}}

@php
    $tags = explode(',', $tagsCsv);
    // explode function to split the string from db to an array
@endphp

<ul class="flex">
    @foreach ($tags as $tag) {{-- loop through the tags array --}}
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            {{-- able to filter by tag name | tag is clickable--}}
            <a href="/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>
