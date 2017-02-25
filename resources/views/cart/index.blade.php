@extends('layout.cart_layout')
@section ('title')
    Корзина
    @endsection

@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Главная</a></li>
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
                    <td class="total">Промежуточная сумма</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $cartItem)
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="images/cart/one.png" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$cartItem->name}}</a></h4>

                    </td>
                    <td class="cart_price">
                        <p>{{$cartItem->price}}</p>
                    </td>


                    <td class="cart_size">
                        <p>{{$cartItem->options->has('size')?$cartItem->options->size:''}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href=""> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$cartItem->qty}}" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href=""> - </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">$59</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
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
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

    @endsection