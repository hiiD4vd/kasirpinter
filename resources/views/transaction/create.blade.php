@extends('layouts.index')

@section('content')
    <form action="{{ route('transaction.store') }}" method="POST">
        @csrf

        @if (session('success'))
            <script>
                if (confirm("{{ session('success') }}\nApakah Anda ingin mencetak resi sekarang?")) {
                    window.open("{{ route('receipt.print', $transaction->id) }}", "_blank");
                }
            </script>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h5>User</h5>
        <div class="user-entry mb-3">
            <label for="id_user" class="form-label">Nama User</label>
            <select class="form-control" name="id_user" id="id_user" required>
                <option value="">-- Pilih User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="items-section">
            <h5>Produk</h5>
            <div class="item-entry mb-3">
                <label for="product_id" class="form-label">Produk</label>
                <select class="form-control product-select" name="products[0][id]" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                    @endforeach
                </select>

                <label for="quantity" class="form-label">Jumlah</label>
                <input type="number" class="form-control quantity-input" name="products[0][quantity]" min="1"
                    required>

                <input type="hidden" class="price-input" name="products[0][price]" value="0">
                <input type="hidden" class="subtotal-input" name="products[0][subtotal]" value="0">
            </div>
        </div>

        <div class="mb-3">
            <label for="tema_diskon" class="form-label">Tema Diskon</label>
            <select class="form-control" id="tema_diskon" name="tema_diskon">
                <option value="" data-persentase="0">-- Tidak Ada Diskon --</option>
                @foreach ($diskon as $d)
                    <option value="{{ $d->tema_diskon }}" data-persentase="{{ $d->persentase }}">
                        {{ $d->tema_diskon }} ({{ $d->persentase }}%)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="text" class="form-control" id="total" name="total" readonly>
        </div>

        <button type="button" id="add-item" class="btn btn-secondary">Tambah Produk</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script>
        function calculateTotal() {
            let total = 0;

            document.querySelectorAll('.item-entry').forEach((entry, index) => {
                const productSelect = entry.querySelector('.product-select');
                const quantityInput = entry.querySelector('.quantity-input');
                const priceInput = entry.querySelector('.price-input');
                const subtotalInput = entry.querySelector('.subtotal-input'); // Ambil input hidden untuk subtotal

                const price = parseFloat(productSelect.selectedOptions[0].getAttribute('data-price')) || 0;
                const quantity = parseInt(quantityInput.value) || 0;

                // Menghitung subtotal
                const subtotal = price * quantity;
                subtotalInput.value = subtotal.toFixed(2); // Menyimpan nilai subtotal ke input hidden
                priceInput.value = price.toFixed(2); // Menyimpan harga ke input hidden

                total += subtotal; // Akumulasi total
            });

            const diskonSelect = document.getElementById('tema_diskon');
            const persentaseDiskon = parseFloat(diskonSelect.selectedOptions[0].getAttribute('data-persentase')) || 0;
            const totalDiskon = total * (persentaseDiskon / 100);
            total -= totalDiskon;

            document.getElementById('total').value = total.toFixed(2);
        }

        function attachListeners() {
            document.querySelectorAll('.product-select, .quantity-input').forEach(input => {
                input.removeEventListener('change', calculateTotal);
                input.addEventListener('change', calculateTotal);
            });

            document.getElementById('tema_diskon').addEventListener('change', calculateTotal);
        }

        let productIndex = 1;

        document.getElementById('add-item').addEventListener('click', function() {
            const itemSection = document.getElementById('items-section');
            const newItemEntry = document.createElement('div');
            newItemEntry.classList.add('item-entry', 'mb-3');
            newItemEntry.innerHTML = `
        <label for="product_id" class="form-label">Produk</label>
        <select class="form-control product-select" name="products[${productIndex}][id]" required>
            @foreach ($products as $product)
                <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
            @endforeach
        </select>

        <label for="quantity" class="form-label">Jumlah</label>
        <input type="number" class="form-control quantity-input" name="products[${productIndex}][quantity]" min="1" required>

        <input type="hidden" class="price-input" name="products[${productIndex}][price]" value="0">
        <input type="hidden" class="subtotal-input" name="products[${productIndex}][subtotal]" value="0">
    `;
            itemSection.appendChild(newItemEntry);

            productIndex++;
            attachListeners();
        });

        // Jalankan listeners saat pertama kali
        attachListeners();
    </script>
@endsection
