@extends('admin.layout.admin')
@section('content');

    <div class="panel panel-primary">
        <div class="panel-heading">Бренды
            <button id="btn_add" name="btn_add" class="btn btn-default pull-left">Добавить новый бренд</button>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                </tr>
                </thead>
                <tbody id="brands-list" name="brands-list">
                @foreach ($brands as $brand)
                    <tr id="brand{{$brand->id}}">
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td>
                            <button class="btn btn-warning btn-detail open_modal" value="{{$brand->id}}">Редактировать</button>
                            <button class="btn btn-danger btn-delete delete-brand" value="{{$brand->id}}">Удалить</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Бренд</h4>
                </div>
                <div class="modal-body">
                    <form id="frmBrands" name="frmBrands" class="form-horizontal" novalidate="">
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label">Название</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="brand_name" name="brand_name" placeholder="Название бренда" value="">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Сохранить изменения</button>
                    <input type="hidden" id="brand_id" name="brand_id" value="0">
                </div>
            </div>
        </div>
    </div>
<meta name="_token" content="{!! csrf_token() !!}" />


@endsection







{{--<ul>--}}
    {{--@forelse($brands as $brand)--}}
        {{--<li>--}}
            {{--<h4> Название бренда: {{$brand->brand_name}}</h4>--}}
        {{--</li>--}}
    {{--@empty--}}
        {{--<h3> Нет брендов</h3>--}}
    {{--@endforelse--}}
{{--</ul>--}}






