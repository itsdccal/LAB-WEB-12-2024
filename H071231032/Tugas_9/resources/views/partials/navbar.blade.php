<nav class="bg-blue-600 p-4 text-white">
    <div class="container mx-auto flex justify-between">
        <a href="{{ route('products.index') }}" class="font-bold">Product Management</a>
        <div class="space-x-4">
            <a href="{{ route('products.index') }}" class="pb-1 border-b-2 border-transparent hover:border-white transition-all duration-300">
                Products
            </a>
            <a href="{{ route('categories.index') }}" class="pb-1 border-b-2 border-transparent hover:border-white transition-all duration-300">
                Categories
            </a>
            <a href="{{ route('inventorylogs.index') }}" class="pb-1 border-b-2 border-transparent hover:border-white transition-all duration-300">
                Inventory Logs
            </a>
        </div>
    </div>
</nav>