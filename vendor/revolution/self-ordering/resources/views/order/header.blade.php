<header class="p-10 text-white text-center bg-gradient-to-l from-orange-500 to-yellow-300">
    <h1 class="text-3xl">{{ config('app.name', 'Laravel') }}</h1>
    <div>
        {{ __('テーブル : ') }}{{ session('table') }}
    </div>
    @include('ordering::order.info')
    @include('ordering::order.history')
</header>
