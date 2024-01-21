<table>
    <tr>
        <th class="py-2 px-4 border-b">PREVIEW</th>
        <th class="py-2 px-4 border-b">ITEM NAME</th>
        <th class="py-2 px-4 border-b">PRICE</th>
        <th class="py-2 px-4 border-b">STOCK</th>
        <th class="py-2 px-4 border-b text-center w-32">ACTION</th>
    </tr>
    @foreach ($items as $index => $item)
    <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
        <td class="py-2 px-4 border-b w-10"><img class="w-10" src="/assets/products/{{ $item->prevImg}}.jpg" alt=""></td>
        <td class="py-2 px-4 border-b ">{{ $item->item_name }}</td>
        <td class="py-2 px-4 border-b w-12">$ {{ $item->price }}</td>
        <td class="py-2 px-4 border-b w-12">{{ $item->stock }}</td>
        <td class="py-2 px-4 action">
            <button class="w-10 text-xl bg-green-300 text-orange-100 rounded-sm"><i class="bi bi-eye"></i></button>
            <button class="w-10 text-xl bg-blue-300 text-white rounded-sm"><i class="bi bi-pencil-square"></i></button>
            <form action="/admin/rooms/delete" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$item->product_id}}">
                <button class="w-10 text-xl bg-red-500 text-white rounded-sm"><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $items->links('vendor.pagination.tailwind', ['selected' => 'item']) }}
</div>
