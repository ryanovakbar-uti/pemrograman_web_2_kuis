$("#close").on("click", function () {
    window.location.href = '/dashboard/categories'
});
$("#xClose").on("click", function () {
    window.location.href = '/dashboard/categories'
});

$(document).on('click', '.formModalCreate', function () {
    $("#nameCreate").val("");
    $("#slugCreate").val("");
});

$(document).on('click', '.formModalEdit', function () {
    var category_id = $(this).val();

    $.ajax({
        type: 'GET',
        url: '/dashboard/categories/' + category_id + '/edit',
        success: function (response) {
            $("#category_id").val(category_id);
            $("#nameEdit").val(response.category.name);
            $("#slugEdit").val(response.category.slug);
        }
    });
});