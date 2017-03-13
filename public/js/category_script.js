
$('#confirmDelete').on('show.bs.modal', function(e) {

    var categoryName = $(e.relatedTarget).data('category_name');
    var route = $(e.relatedTarget).data('category_destroy_route');

    $("#cName").val(categoryName);
    $("#confirmDelete").val(categoryName);
    $("#delForm").attr('action',  route);
});



