<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Statistic Results</title>
</head>
<body>
<div class="container mx-auto p-8">
    <h1 class="text-2xl font-bold mb-4">Statistic Results</h1>

    <!-- Task 1 Table -->
    <div class="mb-8">
        <h2 class="text-xl font-bold mb-2">Task 1 Results</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-100 border-b">Id</th>
                    <th class="px-4 py-2 bg-gray-100 border-b">name</th>
                    <th class="px-4 py-2 bg-gray-100 border-b">count of bookings</th>
                    <!-- Add more table headers as needed -->
                </tr>
                </thead>
                <tbody class="text-center">
                <!-- Iterate over the task 1 results and populate the table rows -->
                @foreach ($data['task1'] as $key)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $key['id'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $key['name'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $key['bookings_count'] }}</td>
                        <!-- Add more table cells as needed -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Task 2 Table -->
    <div class="mb-8">
        <h2 class="text-xl font-bold mb-2">Task 2 Results</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-100 border-b">hotel id</th>
                    <th class="px-4 py-2 bg-gray-100 border-b">hotel name</th>
                    <th class="px-4 py-2 bg-gray-100 border-b">rejection rate (%)</th>
                    <th class="px-4 py-2 bg-gray-100 border-b">count of rejections</th>
                    <!-- Add more table headers as needed -->
                </tr>
                </thead>
                <tbody class="text-center">
                <!-- Iterate over the task 2 results and populate the table rows -->
                @foreach ($data['task2'] as $key)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $key['hotel_id'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $key['hotel_name'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $key['rejection_rate'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $key['total_rejections'] }}</td>
                        <!-- Add more table cells as needed -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Task 3 Table -->
    <div>
        <h2 class="text-xl font-bold mb-2">Task 3 Results</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-100 border-b">customer id</th>
                    <th class="px-4 py-2 bg-gray-100 border-b">count of rejects</th>
                    <!-- Add more table headers as needed -->
                </tr>
                </thead>
                <tbody class="text-center">
                <!-- Iterate over the task 3 results and populate the table rows -->
                @foreach ($data['task3'] as $key)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $key['customer_id'] }}</td>
                        <td class="px-4 py-2 border-b">{{ $key['rejects'] }}</td>
                        <!-- Add more table cells as needed -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
