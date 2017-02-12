@extends('admin.layout.admin')

@section('content');

    <h3> Добавить товар</h3>


   <div class="row">
       <div class="col-md-6 col-md-offset-3">

           {!! Form::open(['route' =>'product.store', 'method' => 'post', 'id' => 'upload',  'files' => true]) !!}
           <div class="form-group">
               {{ Form::label('name', 'Название товара') }}
               {{ Form::text('name', null, array('class' => 'form-control')) }}
           </div>
           <div class="form-group">
               {{ Form::label('description', 'Описание') }}
               {{ Form::text('description', null, array('class' => 'form-control')) }}
           </div>
           <div class="form-group">
               {{ Form::label('price', 'Цена') }}
               {{ Form::text('price', null, array('class' => 'form-control')) }}
           </div>
           <div class="form-group">
               {{ Form::label('size', 'Размер') }}
               {{ Form::select('size', ['small' => 'S', 'medium' => 'M', 'large' => 'L'], null,  array('class' => 'form-control')) }}
           </div>
           <div class="form-group">
               {{ Form::label('category_id', 'Категория') }}
               {{ Form::select('category_id', [1 => 'men'],  null, array('class' => 'form-control')) }}
           </div>
           <div class="form-group">
               {{ Form::label('images', 'Изображения ') }}
               {{  Form::file('images[]', array ('multiple'=>true ,'class' => 'form-control')) }}

               {{--{{ Form::file('images', array('class' => 'form-control')) }}--}}
           </div>

           {{  Form::submit('Создать', array ('class' => 'btn btn-success'))  }}
           {!! Form::close() !!}
       </div>
   </div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{--<script>--}}
    {{--var form = document.getElementById('upload');--}}
    {{--var request = new XMLHttpRequest();--}}

    {{--form.addEventListener('submit', function(e){--}}
        {{--e.preventDefault();--}}
        {{--var formdata = new FormData(form);--}}
        {{--request.open('post', 'admin/product');--}}
        {{--request.addEventListener("load", transferComplete);--}}
        {{--request.send(formdata);--}}
    {{--});--}}

    {{--function transferComplete(data){--}}
        {{--response = JSON.parse(data.currentTarget.response);--}}
        {{--if(response.success){--}}
            {{--document.getElementById('message').innerHTML = "Successfully Uploaded Files!";--}}
        {{--}--}}
    {{--}--}}
{{--</script>--}}



    @endsection



