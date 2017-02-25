$(document).ready(function ()  {

    var url = "/admin/brand";
//display modal form for product editing
    $(document).on('click','.open_modal',function(){
        var brand_id = $(this).val();

        $.get(url + '/' + brand_id, function (data) {
            //success data
            console.log(data);
            $('#brand_id').val(data.id);
            $('#brand_name').val(data.brand_name);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        })
    });



//display modal form for creating new product
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmBrands').trigger("reset");
        $('#myModal').modal('show');
    });

//delete product and remove it from list
    $(document).on('click','.delete-brand',function(){
        var brand_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({

            type: "DELETE",
            url: url + '/' + brand_id,
            success: function (data) {
                console.log(data);
                $("#brand" + brand_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

//create new product / update existing product
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();

        var formData = {
            brand_name: $('#brand_name').val(),

        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var brand_id = $('#brand_id').val();
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + brand_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var brand = '<tr id="brand' + data.id + '"><td>' + data.id + '</td><td>' + data.brand_name + '</td>';
                brand += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Редактировать</button>';
                brand += ' <button class="btn btn-danger btn-delete delete-brand" value="' + data.id + '">Удалить</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#brands-list').append(brand);
                }else{ //if user updated an existing record

                    $("#brand" + brand_id).replaceWith(brand);
                }

                $('#frmBrands').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
} )