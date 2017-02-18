$(document).ready(function () {
    ////----- Open the modal to CREATE a link -----////
    $('#btn-add').click(function () {
        // передаем кнопке сохранить значение add
        $('#btn-save').val("add");
        // обновляем
        $('#modalFormData').trigger("reset");

        $('#brandEditorModal').modal('show');
    });

    ////----- Open the modal to UPDATE a link -----////
    $('body').on('click', '.open-modal', function () {
        var brand_id = $(this).val();
        $.get('admin/brand' + brand_id, function (data) {
            $('#brand_id').val(data.id);
            $('#brand_name ').val(data.brand);
            $('#btn-save').val("update");
            $('#linkEditorModal').modal('show');
        })
    });

    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // не допускаем автоматического сохранения
        e.preventDefault();
        var formData = {
            brand: $('#brand_name').val(),

        };
        // берем состояние - это либо add, либо update
               var state = $('#btn-save').val();

        var type = "POST";
        var brand_id = $('#brand_id').val();
        var ajaxurl = 'admin/brand';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'admin/brand/' + brand_id;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var brand = '<tr id="brand' + data.id + '"><td>' + data.id + '</td><td>' + data.brand + '</td>';
                brand += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button> ';
                brand += '<button class="btn btn-danger delete-link" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    $('#brands-list').append(link);
                } else {
                    $("#brand" + brand_id).replaceWith(brand);
                }
                $('#modalFormData').trigger("reset");
                $('#linkEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    ////----- DELETE a link and remove from the page -----////
    $('.delete-link').click(function () {
        var brand_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: 'admin/brand/' + brand_id,
            success: function (data) {
                console.log(data);
                $("#brand" + brand_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});