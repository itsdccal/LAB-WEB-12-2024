@extends('templates/master')

@section('title', 'Data Produk')

@section('header-button')
    <div class="text-center">
        <h2 class="h4">List Product</h2>
        <div class="d-flex justify-content-between align-items-center mt-4" style="height: 50px; gap: 20px;">
            <!-- Filter Form -->
            <form method="GET" action="{{ url('/product') }}" class="d-flex">
                <select name="filter" class="form-control mr-2">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($allCategories as $cat)
                        <option value="{{ $cat->id }}" {{ request('filter') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                <!-- Button Filter dengan Ikon -->
                <button type="submit" class="btn btn-info d-flex align-items-center">
                    <i class="bi bi-funnel" style="margin-right: 5px;"></i> Filter Category
                </button>
            </form>
            
            <!-- Button Tambah Data -->
            <a href="{{ url('/product/create') }}" class="btn btn-primary d-flex align-items-center" style="height: 100%;">
                <i class="bi bi-plus-circle" style="margin-right: 5px;"></i> Tambah Data
            </a>
        </div>
    </div>
@endsection

@section('content')
    <table class="table table-bordered mt-4" style="border-collapse: collapse; width: 100%; font-size: 14px;">
        <thead class="thead-light" style="font-weight: bold; text-align: center;">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID_PRODUCT</th>
                <th scope="col">PRODUCT NAME</th>
                <th scope="col">CATEGORY NAME</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">PRICE</th>
                <th scope="col">STOCK</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp

            @forelse ($products as $product)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        <a href="{{ url("/product/$product->id") }}" class="text-decoration-none text-primary">
                            {{ $product->id }}
                        </a>
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stok }}</td>
                    <td class="d-flex align-items-center justify-content-center" style="gap: 10px;">
                        <!-- Button Edit dengan Ikon -->
                        <a href="{{ url("/product/$product->id/edit") }}" class="btn btn-warning btn-sm d-flex align-items-center">
                            <i class="bi bi-pencil-square" style="margin-right: 5px;"></i> Edit
                        </a>
                        
                        <!-- Button Hapus dengan Ikon -->
                        <form method="POST" action="{{ url("/product/$product->id") }}" 
                            onsubmit="return confirm('Apakah kamu yakin ingin menghapus data?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                <i class="bi bi-trash" style="margin-right: 5px;"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data yang ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
