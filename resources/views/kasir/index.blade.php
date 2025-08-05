@extends('layouts.app')

@section('title', 'Kasir')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold text-bluesky-dark mb-6">Kasir</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Daftar Barang -->
        <div>
            <h3 class="text-lg font-medium text-gray-700 mb-3">Daftar Barang</h3>
            <div class="space-y-3">
                @foreach($barangs as $barang)
                <div class="border border-gray-200 rounded-lg p-3 hover:bg-gray-50" 
                     onclick="addToCart({{ $barang->id }}, '{{ $barang->nama_barang }}', {{ $barang->harga }})">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="font-medium">{{ $barang->nama_barang }}</h4>
                            <p class="text-sm text-gray-600">Rp {{ number_format($barang->harga, 0, ',', '.') }}</p>
                        </div>
                        <span class="text-bluesky">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Keranjang Belanja -->
        <div>
            <h3 class="text-lg font-medium text-gray-700 mb-3">Keranjang Belanja</h3>
            <form id="checkoutForm" action="{{ route('kasir.checkout') }}" method="POST">
                @csrf
                <div class="border border-gray-200 rounded-lg p-4 mb-4">
                    <div id="cartItems" class="space-y-3">
                        <!-- Item akan ditambahkan di sini via JavaScript -->
                        <p id="emptyCartMessage" class="text-gray-500 text-center py-4">Belum ada barang di keranjang</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg mb-4">
                    <div class="flex justify-between mb-2">
                        <span class="font-medium">Total Barang:</span>
                        <span id="totalQuantity" class="font-medium">0</span>
                    </div>
                    <div class="flex justify-between text-lg">
                        <span class="font-bold">Total Harga:</span>
                        <span id="totalPrice" class="font-bold">Rp 0</span>
                    </div>
                </div>
                
                <button type="submit" id="checkoutButton" disabled
                        class="w-full bg-bluesky hover:bg-bluesky-dark text-white py-2 px-4 rounded disabled:opacity-50 disabled:cursor-not-allowed">
                    Checkout
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    let cart = [];
    
    function addToCart(id, name, price) {
        const existingItem = cart.find(item => item.id === id);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ id, name, price, quantity: 1 });
        }
        
        updateCartDisplay();
    }
    
    function updateCartDisplay() {
        const cartItemsEl = document.getElementById('cartItems');
        const emptyCartMessage = document.getElementById('emptyCartMessage');
        const totalQuantityEl = document.getElementById('totalQuantity');
        const totalPriceEl = document.getElementById('totalPrice');
        const checkoutButton = document.getElementById('checkoutButton');
        
        // Clear cart items
        cartItemsEl.innerHTML = '';
        
        if (cart.length === 0) {
            emptyCartMessage.style.display = 'block';
            totalQuantityEl.textContent = '0';
            totalPriceEl.textContent = 'Rp 0';
            checkoutButton.disabled = true;
            return;
        }
        
        emptyCartMessage.style.display = 'none';
        
        let totalQuantity = 0;
        let totalPrice = 0;
        
        cart.forEach(item => {
            totalQuantity += item.quantity;
            totalPrice += item.price * item.quantity;
            
            const itemEl = document.createElement('div');
            itemEl.className = 'flex justify-between items-center border-b border-gray-100 pb-2';
            itemEl.innerHTML = `
                <div>
                    <h4 class="font-medium">${item.name}</h4>
                    <p class="text-sm text-gray-600">Rp ${item.price.toLocaleString('id-ID')} x ${item.quantity}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <input type="hidden" name="items[${item.id}][id]" value="${item.id}">
                    <input type="number" name="items[${item.id}][quantity]" value="${item.quantity}" min="1" 
                           class="w-16 border border-gray-300 rounded py-1 px-2" 
                           onchange="updateQuantity(${item.id}, this.value)">
                    <button type="button" onclick="removeItem(${item.id})" class="text-red-500 hover:text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            `;
            cartItemsEl.appendChild(itemEl);
        });
        
        totalQuantityEl.textContent = totalQuantity;
        totalPriceEl.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
        checkoutButton.disabled = false;
    }
    
    function updateQuantity(id, newQuantity) {
        const item = cart.find(item => item.id === id);
        if (item) {
            item.quantity = parseInt(newQuantity);
            updateCartDisplay();
        }
    }
    
    function removeItem(id) {
        cart = cart.filter(item => item.id !== id);
        updateCartDisplay();
    }
</script>
@endsection