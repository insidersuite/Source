$(".delete").click(function () {
    var id = $(this).attr('id');
    alert("Are you sure to remove this slider image?");
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'delete_slider_image',
        data: { 'id': id},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (e) {
            location.reload(true);
        }
    });
});

$("#upload_slider").click(function () {
    var id = $(this).data('id');
    $('input#file_upload').trigger('click');
    
});

$("#file_upload").on('change', function() {  
    var id = $('input#accom_id').val();
    var o_id = $('input#offer_id').val();
    var formdata = new FormData();
    formdata.append('file', this.files[0]);
    formdata.append('accom_id', id);
    formdata.append('offer_id', o_id);
    
    $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'accom_img',
      data: formdata,
      processData: false,
      contentType: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (e) {
        console.log(e);
        location.reload(true);
      }
    });
});