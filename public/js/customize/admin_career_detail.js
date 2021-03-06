var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;
$("#department").summernote({height: 100});
$('#department').summernote('fontName', 'Arial');
$("#description").summernote({height: 300});
$('#description').summernote('fontName', 'Arial');

var career = $(".page-content").data("source");
var career_img = "";
if (career == "") {
   $("#department").summernote('code', "");
   $("#description").summernote('code', "");
   $("#title_description").val("");
} else {
    $("#department").summernote('code', career.department);
    $("#description").summernote('code', career.description);
    $("#title_description").val(career.title_description);
}

$("#file_upload").on('change', function() {
  var formdata = new FormData();
  formdata.append('file', this.files[0]);  
  $.ajax({
    type: 'post',
    dataType: 'json',
    url: 'career_img',
    data: formdata,
    processData: false,
    contentType: false,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function (e) {		
        career_img = e;
        $("#banner_img").attr("style", "padding:50px 85px 50px 95px");
        $("#banner_img").html("Image uploaded!");
    }
  });
});

$("#save").click(function () {    
    var newCareer = {
        'department': $("#department").summernote('code'),
        'description': $("#description").summernote('code'),
        'title_description': $("#title_description").val(),
        'banner_img': career_img,
        'id': 0
    };
    if (type != "new") {    
        newCareer.id = career.id;
    }    
    if (newCareer.title != "" && newCareer.content != "") {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'save_career',
            data: {'data': newCareer},
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {                
                alert("success!");
                setTimeout(function(){window.location = redirect_path + "/admin/careers";}, 1000);                        
            }
        });
    } else {
        alert("Please fill all the fields!");
    }
});

$("#view").click(function () {    
    setTimeout(function(){window.location = redirect_path + "/admin/departments?id="+career.id;}, 1000);   
});