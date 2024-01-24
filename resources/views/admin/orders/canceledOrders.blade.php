<div class="pagination mb-7  pagination-canceled">
    {{ $items->links('vendor.pagination.tailwind', ['selected' => 'item']) }}
</div>
@foreach ($items as $index => $item)
    <div class="card-2 w-full block mb-5 h-fit p-2 text-slate-950">
        <div class="orderHeadings">
            <a href="#" class="font-bold text-blue-600">#{{$item->receipt_id}} </a>
            @if ($item->status == 'paid' or $item->status == 'completed')
                <i class="bg-lime-100 text-green-600 p-1 rounded-md ml-3">{{$item->status}}</i>
                @elseif($item->status == 'created')
                <i class="bg-cyan-100 text-blue-600 p-1 rounded-md ml-3">{{$item->status}}</i>
                @elseif($item->status == 'in-shipment')
                <i class="bg-yellow-100 text-orange-600 p-1 rounded-md ml-3">{{$item->status}}</i>
                @elseif($item->status == 'canceled')
                <i class="bg-pink-100 text-red-600 p-1 rounded-md ml-3">{{$item->status}}</i>
            @endif
        </div>
        <div class="orderDetails">
            <table class="mt-3">
                <tr class="mb-3">
                    <th class="w-36">Item preview</th>
                    <th class="w-1/3">Order details</th> 
                    <th class=" w-1/3">Ship to</th> 
                    <th>Shiping nfo</th>
                </tr>
            <tr>
                <td>
                    <img class="w-20" src="/assets/products/{{$item->prevImg}}" alt="">
                </td>
                <td class="text-sm">
                    <span><b>Creted at :  </b> {{$item->created_at}}</span><br>
                    <span><b>Last update :  </b> {{$item->updated_at}}</span><br>
                    <span><b>Total Price :  </b> ${{$item->bill}}</span>
                </td>
                <td>
                    <span>Customer Shipping Address</span>
                </td>
                <td class="text-sm">
                    <span><b>status : </b> @if($item->status ==='created' or $item->status ==='canceled') Not-Submited @else Submited @endif</span><br>
                    <span><b> agent :</b> @if($item->status ==='created' or $item->status ==='canceled') - @else JNE @endif</span><br>
                    <span><b>Tracking Number :</b> @if($item->status ==='created' or $item->status ==='canceled') - @else NO RESI @endif</span><br>
                    <span><b>Tracking status :</b> @if($item->status ==='created' or $item->status ==='canceled') - @elseif($item->status ==='in-shipment') In Delivery @else delivered @endif</span><br>
                    <span><b>Customer name :</b> {{$item->name}} </span><br>
                </td>
            </tr>
            </table>
            <button class="bg-blue-400 text-white p-1 pl-3 pr-3 rounded-md">Action</button>
        </div>
    </div>
@endforeach
<div class="pagination mb-7 pagination-canceled">
    {{ $items->links('vendor.pagination.tailwind', ['selected' => 'item']) }}
</div>