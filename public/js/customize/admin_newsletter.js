var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;
$("#addNew").click(function () {
    window.location = redirect_path + "/admin/newsletter_detail?id=0"
});

$(".edit").click(function () {
    var id = $(this).data('id');
    window.location = redirect_path + "/admin/newsletter_detail?id="+id
});

$(".delete").click(function () {
    var id = $(this).data('id');
    alert("Do you really want to remove this newsletter?");
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'delete_newsletter',
        data: {'id': id},
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (e) {
            location.reload(true);
        }
    });
});
