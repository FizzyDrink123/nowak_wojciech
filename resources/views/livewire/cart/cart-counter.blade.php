<span>
    <button type="button" class="inline-flex realtive p-3 text-sm font-medium text-center text-gray-500 bg-white hover:text-gray-700 focus:outline-none rounded-lg focus:outline-none">
        <span class="sm:invisible">__('cart.cart-counter'):</span>
        <x-icon name="shopping-cart" class="w-5 h-5"/>
        @if($count > 0)
        <div class="inline-flex -top-1 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900">{{ $count }}</div>
        @endif
    </button>
</span>