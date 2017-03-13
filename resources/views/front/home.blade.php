@extends('layout.main')


@section('content')

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Новенькое в магазине</h2>
                    @forelse ($products as $product)
                       <?php $image = $product->images()->first(); ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{route('item', $product->id)}}" > <img height="300" src="{{url('images', $image->image_name)}}" alt="" /> </a>
                                    <h2>$ {{$product->price}}</h2>
                                    <p>{{$product->name}}</p>
                                    <a href="{{route('cart.edit', $product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        @empty
                        <h1>Нет товаров!</h1>
                        @endforelse

                </div><!--features_items-->
                {{$products->render()}}
                {{--<ul class="pagination">--}}
                    {{--<li class="active"><a href="">1</a></li>--}}
                    {{--<li><a href="">2</a></li>--}}
                    {{--<li><a href="">3</a></li>--}}
                    {{--<li><a href="">&raquo;</a></li>--}}
                {{--</ul>--}}



            </div>
        </div>
    </div>
</section>

    @endsection