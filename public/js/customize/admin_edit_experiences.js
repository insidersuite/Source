var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;
$(".delete").click(function () {
    var id = $(this).attr('id');
    alert("Are you sure to remove this experience link?");
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'delete_edit_experience',
        data: { 'id': id},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (e) {
            location.reload(true);
        }
    });
});
$(".edit").click(function () {
    window.location = redirect_path + "/admin/upload_exp_image?id="+parent_id;
});
