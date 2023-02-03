{{-- check for the message --}}
@if(session()->has('message'))
{{-- Combination of Alpine Js and Tailwind to give style and fuction to the flash Messahe --}}
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform-translate-x-1/2 bg-laravel text-white px-20 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif

