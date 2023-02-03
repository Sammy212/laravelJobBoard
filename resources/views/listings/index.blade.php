<x-layout>

    @include('partials._hero')
    @include('partials._search')

        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

            {{-- conditionals for listings in array --}}

            {{-- if and for each --}}
            {{-- @if(count($listings) == 0)
                <p>
                    No Listings found
                </p>
            @endif
            @foreach($listings as $listing)
                <h2>
                    {{$listing['title']}}
                </h2>
                <p>
                    {{$listing['description']}}
                </p>
            @endforeach --}}

            {{-- Unless and foreach --}}

            @unless (count($listings) == 0)
                @foreach ($listings as $listing)
                    <x-listing-card :listing="$listing" />
                @endforeach
            @endunless
        </div>
        <div class="mt-6 p-4">
            {{-- pagination links --}}
            {{$listings->links()}}
        </div>

</x-layout>
