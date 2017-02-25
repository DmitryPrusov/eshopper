@extends('admin.layout.admin')
@section('content');
<h3> Список товаров</h3>

<ul>
    @forelse($products as $product)
        <li>
            <h4> Название товара: {{$product->name}}</h4>
        </li>
    @empty
        <h3> Нет товаров</h3>
    @endforelse
</ul>
    {{$products->links()}}
@endsection


