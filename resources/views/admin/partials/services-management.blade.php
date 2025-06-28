<table class="min-w-full border border-gray-200 rounded-lg">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-3 border-b">Service Name</th>
            <th class="p-3 border-b">Category</th>
            <th class="p-3 border-b">Price</th>
            <th class="p-3 border-b">Professional</th>
            <th class="p-3 border-b">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
        <tr class="hover:bg-gray-50">
            <td class="p-3 border-b">{{ $service->name }}</td>
            <td class="p-3 border-b">{{ $service->category->name ?? 'N/A' }}</td>
            <td class="p-3 border-b">{{ $service->price }}</td>
            <td class="p-3 border-b">{{ $service->professional->name ?? 'N/A' }}</td>
            <td class="p-3 border-b space-x-2">
                <a href="" class="text-blue-600 hover:underline">Edit</a>
                <form action="" method="POST" class="inline"
                      onsubmit="return confirm('Delete this service?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
