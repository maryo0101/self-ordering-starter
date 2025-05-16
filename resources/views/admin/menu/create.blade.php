<x-ordering-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            メニュー登録
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-white">商品名</label>
                        <input type="text" name="name" class="w-full p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-white">価格</label>
                        <input type="number" name="price" class="w-full p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-white">カテゴリ</label>
                        <input type="text" name="category" class="w-full p-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-white">説明 (任意)</label>
                        <textarea name="description" class="w-full p-2 rounded"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image">画像</label>
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                            登録
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-ordering-dashboard-layout>