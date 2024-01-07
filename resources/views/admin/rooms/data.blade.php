<table>
    <tr>
        <th class="py-2 px-4 border-b"># Room Number</th>
        <th class="py-2 px-4 border-b">Price</th>
        <th class="py-2 px-4 border-b">Avalability</th>
        <th class="py-2 px-4 border-b">wifi</th>
        <th class="py-2 px-4 border-b">gym</th>
        <th class="py-2 px-4 border-b">breakfast</th>
        <th class="py-2 px-4 border-b">park</th>
        <th class="py-2 px-4 border-b">smoking</th>
        <th class="py-2 px-4 border-b">pool</th>
        <th class="py-2 px-4 border-b">Type</th>
        <th class="py-2 px-4 border-b text-center">Action</th>
    </tr>
    @foreach ($rooms as $index => $room)
    <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
        <td class="py-2 px-4 border-b">{{ $room->roomNum }}</td>
        <td class="py-2 px-4 border-b">${{ $room->price }}</td>
        <td class="py-2 px-4 border-b {{ $room->availability ? 'text-green-600' : 'text-red-500' }}">{{ $room->availability ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b {{ $room->wifi ? 'text-green-600' : 'text-red-500' }}">{{ $room->wifi ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b {{ $room->gym ? 'text-green-600' : 'text-red-500' }}">{{ $room->gym ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b {{ $room->breakfast ? 'text-green-600' : 'text-red-500' }}">{{ $room->breakfast ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b {{ $room->park ? 'text-green-600' : 'text-red-500' }}">{{ $room->park ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b {{ $room->smoking ? 'text-green-600' : 'text-red-500' }}">{{ $room->smoking ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b {{ $room->pool ? 'text-green-600' : 'text-red-500' }}">{{ $room->pool ? 'Yes' : 'No' }}</td>
        <td class="py-2 px-4 border-b">{{$room->roomType}}</td>
        <td class="py-2 px-4 border-b action">
            <button class="w-10 text-xl bg-green-300 text-orange-100 rounded-sm"><i class="bi bi-eye"></i></button>
            <button class="w-10 text-xl bg-blue-300 text-white rounded-sm"><i class="bi bi-pencil-square"></i></button>
            <form action="/admin/rooms/delete" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$room->roomNum}}">
                <button class="w-10 text-xl bg-red-500 text-white rounded-sm"><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $rooms->links('vendor.pagination.tailwind', ['selected' => 'rooms']) }}
</div>
