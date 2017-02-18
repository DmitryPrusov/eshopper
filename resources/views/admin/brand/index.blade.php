@extends('admin.layout.admin')
@section('content');
<h3> Список Брендов</h3>

    <div class="container">

        <div class="card card-block">
            {{--<h2 class="card-title">Laravel AJAX Examples--}}
                {{--<small>via jQuery .ajax()</small>--}}
            {{--</h2>--}}
            {{--<p class="card-text">Learn how to handle ajax with Laravel and jQuery.</p>--}}
            <button id="btn-add" name="btn-add" class="btn btn-primary ">Добавить новый бренд</button>
        </div>

        <div>
            <table class="table table-inverse">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Бренд</td>
                    {{--<th>Description</th>--}}
                    <td>Редактировать или удалить</td>
                </tr>
                </thead>
                <tbody id="links-list" name="links-list">
                @foreach ($brands as $brand)
                    <tr id="link{{$brand->id}}">
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->brand_name}}</td>
                        {{--<td>{{$link->description}}</td>--}}
                        <td>
                            <button class="btn btn-info open-modal" value="{{$brand->id}}">Редактировать
                            </button>
                            <button class="btn btn-danger delete-link" value="{{$brand->id}}">Удалить
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="brandEditorModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="brandEditorModalLabel">Редактор Брендов</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="inputLink" class="col-sm-2 control-label">Бренд</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="link" name="link"
                                               placeholder="Enter URL" value="">
                                    </div>
                                </div>

{{--                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Описание</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="description" name="description"
                                               placeholder="Enter Link Description" value="">
                                    </div>
                                </div>--}}
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Сохранить изменения
                            </button>
                            <input type="hidden" id="link_id" name="link_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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






