
$('#confirmDelete').on('show.bs.modal', function(e) {
    //get data-id attribute of the clicked element
    var categoryName = $(e.relatedTarget).data('category_name');
    var route = $(e.relatedTarget).data('category_destroy_route');

    $("#cName").val(categoryName);
    $("#confirmDelete").val(categoryName);
    $("#delForm").attr('action',  route);
});



