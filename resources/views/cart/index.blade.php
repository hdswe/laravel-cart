@foreach($items as $item)

    {{--{{}}   <?php echo(); ?>--}}

    <h1>{{$item->item->name}}</h1>
    <ul>
        <li>Count : {{$item->count}}</li>
        <li>Price : {{$item->item->price}}</li>
        <li>type : {{$item->item->type->name}}</li>
    </ul>

@endforeach

<h1>Total : {{$total}}</h1>
