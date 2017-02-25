@extends('admin.layout.admin')

@section('content')
@if(isset($products))

    <h3>Товары в категории</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th >Товары </th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr><td>{{$product->name}}</td></tr>
        @empty
            <tr><td>Нет товаров</td></tr>
        @endforelse
        </tbody>
    </table>
@endif

    @endsection