@props(['src'])

<div class="w-full mx-auto">
    <img src="{{ $src ?? config('ordering.menu.no_image') }} "
         style="max-width: 150px; width: auto; height: 100px;" 
         {{ $attributes->merge(['class' => 'rounded-md object-contain']) }} 
         alt="">
</div>
