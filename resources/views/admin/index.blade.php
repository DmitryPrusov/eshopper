@extends('admin.layout.admin')
@section('content')
    <h3> Админ</h3>
    @if(Session::has('message'))
        <div class="alert alert-info">
            {{ Session::get('message') }}
        </div>
    @endif
@endsection



