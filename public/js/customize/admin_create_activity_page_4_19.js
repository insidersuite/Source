var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;
$("#content").summernote({height: 300});
$("#content").summernote({focus: false});
$('#content').summernote('fontName', 'Arial');
$("#start_time").wickedpicker();
if (type == "new") {
    $("#content").summernote('code', "");
    $("#parking").prop("checked", false);
    $("#status").prop("checked", false);
    $("#provided").val();
    $("#bring").val();
    $("#there").val();
    $("#know").val();
} else {
    var activity = $(".page-content").data('activity');
    var practical = $(".page-content").data('practical');
    $("#content").summernote('code', activity.content);
    if(activity.status == "true") {
        $("#status").prop("checked", true);
    } else {
        $("#status").prop("checked", false);
    }
    if(practical.parking == "true") {
        $("#parking").prop("checked", true);
    } else {
        $("#parking").prop("checked", false);
    }
    if (practical.start_time == 'null') {
        $('#start_time').wickedpicker('time');
    } else {
        $('#start_time').val(practical.start_time);
    }    
    $("#bring").val(practical.bring);
    $("#provided").val(practical.provided);
    $(".section_post").attr('style', 'display: block;');
    
    $("#there").val(practical.there);
    $("#know").val(practical.know);
}

$("#update").click(function () {
    if ($("#main-form").valid()) {
        var status = ""; var parking = "";
        if($("#status").is(":checked")) { status = "true"; } else { status = "false"; }
        if($("#parking").is(":checked")) { parking = "true"; } else { parking = "false"; }
        var act = $(".page-content").data('activity');

        var data = {
            "act_id": act.id,
            "city": offer_id,
            "name": $("#name").val(),
            "address": $("#address").val(),
            "longitude": $("#longitude").val(),
            "latitude": $("#latitude").val(),
            "category": $("#category").val(),
            "indsider_rate": $("#insider_rate").val(),
            "insider_rate": $("#insider_rate").val(),
            "language": $("#language").val(),
            "content": $("#content").summernote('code'),
            "min_capacity": $("#min_capacity").val(),
            "provided": $("#provided").val(),
            "group_size": $("#group_size").val(),
            "total_hours": $("#total_hours").val(),
            "start_time": $("#start_time").val(),
            "status": status,
            "parking": parking,
            "bring": $("#bring").val(),
            "timestamp": $("#timestamp").val(),
            "there": $("#there").val(),
            "know": $("#know").val()
        };
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'update_activity',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                console.log(e);
                window.location = redirect_path + "/admin/activities?id="+offer_id
            }
        });        
    } else {
        alert("Please complete the information fields.");
    }    
});
$('#save').click(function () {
    if ($("#main-form").valid()) {
        var status = ""; var parking = "";
        if($("#status").is(":checked")) { status = "true"; } else { status = "false"; }
        if($("#parking").is(":checked")) { parking = "true"; } else { parking = "false"; }
        
        var data = {
            "city": offer_id,
            "name": $("#name").val(),
            "address": $("#address").val(),
            "longitude": $("#longitude").val(),
            "latitude": $("#latitude").val(),
            "category": $("#category").val(),
            "indsider_rate": $("#insider_rate").val(),
            "language": $("#language").val(),
            "content": $("#content").summernote('code'),
            "min_capacity": $("#min_capacity").val(),
            "room_nb": $("#room").val(),
            "provided": $("#provided").val(),
            "insider_rate": $("#insider_rate").val(),
            "group_size": $("#group_size").val(),
            "total_hours": $("#total_hours").val(),
            "start_time": $("#start_time").val(),
            "status": status,
            "parking": parking,
            "bring": $("#bring").val(),
            "timestamp": $("#timestamp").val(),
            "there": $("#there").val(),
            "know": $("#know").val()
        };
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'save_activity',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                window.location = redirect_path + "/admin/activities?id="+offer_id
            }
        });
    } else {
        alert("Please complete the information fields.");
    }
});

function loadingOut(loading) {
	setTimeout(() => loading.out(), 3000);
}

var csvUpload = document.getElementById('csv_upload');
csvUpload.addEventListener('change', handleFile, false);

var rABS = true; // true: readAsBinaryString ; false: readAsArrayBuffer

function handleFile(e) {
  var files = e.target.files, f = files[0];

  var formData = new FormData();
  formData.append('file', f);
  if (type == "new") {
    formData.append('id', id);
  } else {
    var act = $(".page-content").data('activity');
    formData.append('id', act.id);
  }
  var loading = new Loading({ discription: 'Waiting...' });
  $.ajax({
    url: 'create_calendar_activity',
    type:"POST",
    processData:false,
    contentType: false,
    data: formData,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(e){
        loadingOut(loading);
        alert(e);
        console.log(e);
    }
  });
//   var reader = new FileReader();
//   reader.onload = function(e) {
//     var data = e.target.result;
//     if(!rABS) data = new Uint8Array(data);
//     var workbook = XLSX.read(data, {type: rABS ? 'binary' : 'array'});
    
//     var first_sheet_name = workbook.SheetNames[0];
//     var worksheet = workbook.Sheets[first_sheet_name];
//     var data = XLSX.utils.sheet_to_json(worksheet);    
//     var elements = [];
//     var id_ = "";
//     data.forEach(element => {
//         if (type == "new") {
//             element['activity_id'] = id;
//             id_ = id;
//         } else {
//             var act = $(".page-content").data('activity');
//             element['activity_id'] = act.id;
//             id_ = act.id;
//         }
//         var res = element.check_in.split(".");
//         element.check_in = res[2] + "-" + res[0] + "-" + res[1];
//         elements.push(element);
//     });
//     console.log(id_);
//     $.ajax({
//             type: 'post',
//             dataType: 'json',
//             url: 'create_calendar_activity',
//             data: {elements: elements, id: id_},
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (e) {
//                 console.log(e);
//             }
//         });
//     /* DO SOMETHING WITH workbook HERE */
//   };
//   if(rABS) reader.readAsBinaryString(f); else reader.readAsArrayBuffer(f);
}

$("#slider_images").click(function () {
    var id = 0;
    if (type == "new") {
        id = 0;
    } else {
        var accom = $(".page-content").data('activity');
        id = accom.id;
    } 
    window.location = redirect_path + "/admin/activity_slider_images?id="+id+"&offer_id="+offer_id;
});
