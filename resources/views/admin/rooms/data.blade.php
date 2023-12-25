<table>
    <tr>
        <th class="py-2 px-4 border-b">Room Number</th>
        <th class="py-2 px-4 border-b">Price</th>
        <th class="py-2 px-4 border-b">Avalability</th>
        <th class="py-2 px-4 border-b">wifi</th>
        <th class="py-2 px-4 border-b">gym</th>
        <th class="py-2 px-4 border-b">breakfast</th>
        <th class="py-2 px-4 border-b">park</th>
        <th class="py-2 px-4 border-b">smoking</th>
        <th class="py-2 px-4 border-b">pool</th>
    </tr>
    @foreach ($rooms as $index => $room)
    <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
        <td class="py-2 px-4 border-b">{{ $room->roomNum }}</td>
        <td class="py-2 px-4 border-b">${{ $room->price }}</td>
        <td class="py-2 px-4 border-b">{{ $room->availability ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b">{{ $room->wifi ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b">{{ $room->gym ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b">{{ $room->breakfast ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b">{{ $room->park ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b">{{ $room->smoking ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b">{{ $room->pool ? 'Yes' : 'No' }}</td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $rooms->links('vendor.pagination.tailwind', ['selected' => 'rooms']) }}
</div>
