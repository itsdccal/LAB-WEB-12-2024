@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Inventory Logs</h1>
    </div>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="py-3 px-6 bg-gray-100">Product</th>
                <th class="py-3 px-6 bg-gray-100">Category</th>
                <th class="py-3 px-6 bg-gray-100">Log Type</th>
                <th class="py-3 px-6 bg-gray-100">Quantity</th>
                <th class="py-3 px-6 bg-gray-100">Date</th>
                <th class="py-3 px-6 bg-gray-100">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventoryLogs as $log)
                <tr class="border-b text-center">
                    <td class="py-3 px-6">{{ $log->product->name }}</td>
                    <td class="py-3 px-6">{{ $log->product->category->name ?? 'No Category' }}</td>
                    <td class="py-3 px-6">{{ ucfirst($log->type) }}</td>
                    <td class="py-3 px-6">{{ $log->quantity }}</td>
                    <td class="py-3 px-6">{{ \Carbon\Carbon::parse($log->date)->format('d-m-Y H:i') }}</td>
                    <td class="py-3 px-6 flex justify-center space-x-4">
                        <!-- Tombol Delete -->
                        <form action="{{ route('inventorylogs.destroy', $log->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this log?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 font-medium transition duration-200 border-b-2 border-transparent hover:border-red-500">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $inventoryLogs->links() }}
    </div>
@endsection