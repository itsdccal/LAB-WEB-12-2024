@extends('layout.master')

@section('title', 'Inventory Log')
@section('header', 'Inventory Log')

@section('content')

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
               
                <th>Quantity</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($log as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->product ? $log->product->name : 'Product not found' }}</td>
                 
                    <td>{{ $log->quantity }}</td>
                    <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteInventoryLogModal{{ $log->id }}">
                            Delete
                        </button>
                    </td>
                </tr>

                @include('modals.delete_inventorylog', ['log' => $log])
            @endforeach
        </tbody>
    </table>
@endsection
