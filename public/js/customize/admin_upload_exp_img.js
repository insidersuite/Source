var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;
$("#edit").click(function () {
    var id = $(this).data('id');
    $("#img_path").attr("data-id", id);
    $(".pip").html("");
    $("#modal-experience-image").modal('show');
});
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
$("#save_exp_img").click(function () {
    var id = $("#img_path").data('id');
    var array_imgs = [];
    var x = document.getElementById("upload_images");
    var y = x.getElementsByTagName("span");
    for (var i = 0; i < y.length; i ++) {        
        array_imgs.push(y[i].children[0].src);
    }
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: '/admin/save_exp_link_imgs',
        data: {'id': id, 'src': array_imgs, 'category': $("#category").val()},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (e) {
            $("#modal-experience-image").modal('hide');
            location.reload(true);
        }
    });
});
$("#img_path").on('change', function(e) {
    var files = e.target.files, filesLength = files.length;    
    for (var i = 0; i < filesLength; i++) {
        var f = files[i];        
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><p class=\"remove\">Remove image</p>" +
            "</span>").insertAfter("#img_path");
            $(".remove").click(function(){
            $(this).parent(".pip").remove();
            });
        });
        fileReader.readAsDataURL(f);
    }   
});