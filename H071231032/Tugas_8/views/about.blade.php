@extends('layouts.master')

@section('title', 'About')

@section('content')
    <!-- Specs Section -->
    <section class="specs-section container mx-auto my-5 px-4" id="specs">
        <h2 class="mb-4 text-center text-3xl font-semibold">Specifications</h2>
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-md overflow-hidden">
                <tbody class="divide-y">
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Processor</th>
                        <td class="p-4 text-gray-700">
                            | CPU Speed: 3.39GHz, 3.1GHz, 2.9GHz, 2.2GHz | CPU Type: Octa-Core
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Display</th>
                        <td class="p-4 text-gray-700">
                            | Size: 6.8", 172.2mm | Resolution: 3120x1440 | Technology: Dynamic AMOLED 2X
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Battery</th>
                        <td class="p-4 text-gray-700">
                            | Capacity: 5000mAh | Type: Li-Ion | Charging: 45W Fast Charging, 15W Wireless Charging
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Camera</th>
                        <td class="p-4 text-gray-700">
                            | Main: 200 MP + 50 MP + 12 MP + 10 MP | Front: 12 MP | Zoom: 100x Space Zoom
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Storage & RAM</th>
                        <td class="p-4 text-gray-700">
                            | Storage Options: 256GB, 512GB, 1TB | RAM: 12GB, 16GB
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Operating System</th>
                        <td class="p-4 text-gray-700">
                            | OS: Android 14 with One UI 6.0
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Connectivity</th>
                        <td class="p-4 text-gray-700">
                            | 5G Support | Wi-Fi 6E | Bluetooth 5.3 | USB Type-C
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Security</th>
                        <td class="p-4 text-gray-700">
                            | Fingerprint Sensor: In-Display | Face Recognition
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Dimensions & Weight</th>
                        <td class="p-4 text-gray-700">
                            | Dimensions: 162.3 x 77.2 x 8.9 mm | Weight: 233g
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="reviews-section container mx-auto my-5 px-4" id="reviews">
        <h2 class="mb-4 text-center text-3xl font-semibold">Customer Reviews</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">John Doe</h5>
                <p class="mt-2 text-gray-600">The Galaxy S24 Ultra is a game changer. The camera quality is top-notch, and the performance is blazing fast!</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">Jane Smith</h5>
                <p class="mt-2 text-gray-600">I've been using this phone for a week, and I'm impressed with the battery life and display quality. Highly recommended!</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">Alex Johnson</h5>
                <p class="mt-2 text-gray-600">Absolutely love the 100x Space Zoom feature! It’s a unique experience for photography lovers like me.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">Sarah Williams</h5>
                <p class="mt-2 text-gray-600">The performance is smooth, and the storage options are a lifesaver. Perfect for power users!</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">Michael Brown</h5>
                <p class="mt-2 text-gray-600">Best purchase I’ve made in years! The processor speed and camera are exactly as described.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">Emily Davis</h5>
                <p class="mt-2 text-gray-600">Love the sleek design and vibrant display. It makes everyday tasks enjoyable!</p>
            </div>
        </div>
    </section>
@endsection