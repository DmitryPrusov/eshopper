@extends('admin.layout.admin')
@section('content')
<h3> Категории</h3>

<div class="panel panel-primary">
    {{--<a class="btn btn-default" data-toggle="modal" href="#category"> </a>--}}
        <button id="btn_add" name="btn_add" class="btn btn-default pull-left" href="#category"  data-toggle="modal">Добавить категорию</button>
    <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Название категории</td>
                <td>Действия</td>
            </tr>
            </thead>
            <tbody id="categories-list" name="categories-list">
            @foreach ($categories as $category)
                <tr id="category{{$category->id}}">
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('category.show', $category->id)}}">{{$category->name}}</a></td>
                    <td>
                        <button class="btn btn-warning" href="#edit_category" data-toggle="modal"
                        >Редактировать</button>
                        <button class="btn btn-danger btn-delete delete-product"
                                data-category_name="{{ $category->name }}"
                                data-category_destroy_route="{{ route('category.destroy', $category->id) }}"
                                data-toggle="modal"  href="#confirmDelete" >Удалить</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="category">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Добавить новую</h4>
</div>
{!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
<div class="modal-body">
<div class="form-group">
{{ Form::label('name', 'Название') }}
{{ Form::text('name', null, array('class' => 'form-control')) }}
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
<button type="submit" class="btn btn-primary">Сохранить изменения</button>
</div>
{!! Form::close() !!}
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="edit_category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Редактировать</h4>
            </div>
            {!! Form::model($category,['method' => 'PATCH',  'action' => ['CategoriesController@update', $category->id]]) !!}
            <div class="modal-body">
                <div class="form-group">
                    {{ Form::label('name', 'Название') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Подтвердите удаление</h4>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить? Действие необратимо</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                {!! Form::open(['method' => 'DELETE', 'id' => 'delForm']) !!}
                <button type="submit" class="btn btn-danger">Удалить</button>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>



    {{--<script>--}}
    {{--$(document).on("click", ".btn btn-warning", function (e) {--}}
    {{--e.preventDefault();--}}
       {{--var _self = $(this);--}}
        {{--var id = _self.data('id');--}}
        {{--var name= _self.data('name');--}}
        {{--$("#id").val(id);--}}
        {{--$("#name").val(name);--}}
    {{--$(_self.attr('href')).modal('show');--}}
    {{--});--}}
    {{--</script>--}}

<!




{{--<div class="navbar">--}}
    {{--<a class="navbar-brand" href="#">Категории </a>--}}
    {{--<ul class="nav navbar-nav">--}}
        {{--@if(!empty($categories))--}}
            {{--@forelse($categories as $category)--}}
                {{--<li class="active">--}}{{----}}
                    {{--<a href="{{route('category.show',$category->id)}}">{{$category->name}}</a>--}}
                {{--</li>--}}
            {{--@empty--}}
                {{--<li>Ничего нет </li>--}}
            {{--@endforelse--}}
        {{--@endif--}}
    {{--</ul>--}}

    {{--<a class="btn btn-primary pull-right navbar-right" data-toggle="modal" href="#category">Добавить категорию</a>--}}
    {{--<div class="modal fade" id="category">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                    {{--<h4 class="modal-title">Добавить новую</h4>--}}
                {{--</div>--}}
                {{--{!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="form-group">--}}
                        {{--{{ Form::label('name', 'Название') }}--}}
                        {{--{{ Form::text('name', null, array('class' => 'form-control')) }}--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>--}}
                    {{--<button type="submit" class="btn btn-primary">Сохранить изменения</button>--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
            {{--</div><!-- /.modal-content -->--}}
        {{--</div><!-- /.modal-dialog -->--}}
    {{--</div><!-- /.modal -->--}}
{{--</div>--}}

{{--products--}}
{{--@if(isset($products))--}}

    {{--<h3>Товары</h3>--}}
    {{--<table class="table table-hover">--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th>Товары</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@forelse($products as $product)--}}
            {{--<tr><td>{{$product->name}}</td></tr>--}}
        {{--@empty--}}
            {{--<tr><td>Нет товаров</td></tr>--}}
        {{--@endforelse--}}
        {{--</tbody>--}}
    {{--</table>--}}
{{--@endif--}}
@endsection

