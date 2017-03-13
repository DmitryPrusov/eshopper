@extends('layout.cart_layout')
@section ('title')
    Корзина
    @endsection

@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href={{route('index')}}>Главная</a></li>
                <li class="active">Корзина</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Товар</td>
                    <td class="description"></td>
                    <td class="price">Цена</td>
                    <td class="size">Размер</td>
                    <td class="quantity">Количество</td>
                    <td class="total">Действия</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $cartItem)
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="{{$cartItem->id}}" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$cartItem->name}}</a></h4>

                    </td>
                    <td class="cart_price">
                        <p>{{$cartItem->price}}</p>
                    </td>


                    <td class="cart_size">

                        {!! Form::open(['route' => ['cart.update', $cartItem->rowId], 'method' => 'patch']) !!}

                        <div > {!! Form::select('size', ['small'=>'Small','medium'=>'Medium','large'=>'Large'] , $cartItem->options->has('size')?$cartItem->options->size:'' ) !!}
                        </div>


                    </td>



                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                             {{--{!! Form::open(['route' => ['cart.update', $cartItem->rowId], 'method' => 'patch']) !!}--}}
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$cartItem->qty}}" autocomplete="off" size="2">
                            {{--<div class="form-group">--}}
                                {{--{{ Form::label('quantity', 'Количество') }}--}}
                                {{--{{ Form::text('quantity', $cartItem->qty, array('class' => 'form-control')) }}--}}
                            {{--</div>--}}
                            {{--<input type="submit" class="btn btn-sm btn-default" value="ok">--}}
                            {{--{!! Form::close() !!}--}}
                            {{--<input class="cart_quantity_input" type="text" name="quantity" value="{{$cartItem->qty}}" autocomplete="off" size="2">--}}
                        </div>
                    </td>
                    <td class="cart_actions">
                        <input type="submit" class="btn btn-sm btn-default" value="Редактировать">
                        {!! Form::close() !!}


                    </td>
                    <td class="cart_delete">

                        <form action="{{route('cart.destroy', $cartItem->rowId)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input class="btn-danger" type="submit" value="удалить">
                        {{--<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>--}}
                        </form>
                    </td>
                </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">

        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="total_area">
                    <ul>
                        <li>Доставка <span>бесплатно</span></li>
                        <li>Всего к оплате: <span>{{Cart::subtotal()}}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Оплата</a>

                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
    @endsection