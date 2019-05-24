var redirect_path = window.location.protocol + "//" + window.location.host;
$("#content").summernote({height: 300});
$('#content').summernote('fontName', 'Arial');

// by Dong 2_26
var options_check_in = {
  now: "12:00", //hh:mm 24 hour format only, defaults to current time
  twentyFour: false, //Display 24 hour format, defaults to false
  upArrow: 'wickedpicker__controls__control-up', //The up arrow class selector to use, for custom CSS
  downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
  close: 'wickedpicker__close', //The close class selector to use, for custom CSS
  hoverState: 'hover-state', //The hover state class to use, for custom CSS
  title: 'Timepicker', //The Wickedpicker's title,
  showSeconds: false, //Whether or not to show seconds,
  secondsInterval: 1, //Change interval for seconds, defaults to 1
  minutesInterval: 1, //Change interval for minutes, defaults to 1
  beforeShow: null, //A function to be called before the Wickedpicker is shown
  show: null, //A function to be called when the Wickedpicker is shown
  clearable: false, //Make the picker's input clearable (has clickable "x")
}; 
var options_check_out = {
  now: "14:00", //hh:mm 24 hour format only, defaults to current time
  twentyFour: false, //Display 24 hour format, defaults to false
  upArrow: 'wickedpicker__controls__control-up', //The up arrow class selector to use, for custom CSS
  downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
  close: 'wickedpicker__close', //The close class selector to use, for custom CSS
  hoverState: 'hover-state', //The hover state class to use, for custom CSS
  title: 'Timepicker', //The Wickedpicker's title,
  showSeconds: false, //Whether or not to show seconds,
  secondsInterval: 1, //Change interval for seconds, defaults to 1
  minutesInterval: 1, //Change interval for minutes, defaults to 1
  beforeShow: null, //A function to be called before the Wickedpicker is shown
  show: null, //A function to be called when the Wickedpicker is shown
  clearable: false, //Make the picker's input clearable (has clickable "x")
}; 
$("#check_in").wickedpicker(options_check_in);
$("#check_out").wickedpicker(options_check_out);
// end

if (type == "new") {
    $("#content").summernote('code', "");
    $("#breakfast").prop("checked", false);
    $("#jacuzzi").prop("checked", false);
    $("#gym").prop("checked", false);
    $("#status").prop("checked", false);
    $("#note").val();
} else {
    var accommodation = $(".page-content").data('accom');
    var practical = $(".page-content").data('practical');
    $("#content").summernote('code', accommodation.content);
    if(accommodation.status == "true") {
        $("#status").prop("checked", true);        
    } else {
        $("#status").prop("checked", false);
    }
    if(practical.breakfast == "true") {
        $("#breakfast").prop("checked", true);
        $("#breakfast_t").attr('style', 'display: block');        
        $("#breakfast_t").val(practical.breakfast_t);
    } else {
        $("#breakfast").prop("checked", false);
        $("#breakfast_t").attr('style', 'display: none');
    }
    if(practical.jacuzzi_access == "true") {
        $("#jacuzzi").prop("checked", true);
        $("#jacuzzi_t").attr('style', 'display: block');        
        $("#jacuzzi_t").val(practical.jacuzzi_t);
    } else {
        $("#jacuzzi").prop("checked", false);
        $("#jacuzzi_t").attr('style', 'display: none');
    }
    if(practical.gym_access == "true") {
        $("#gym").prop("checked", true);
        $("#gym_t").attr('style', 'display: block');
        $("#gym_t").val(practical.gym_t);
    } else {
        $("#gym").prop("checked", false);
        $("#gym_t").attr('style', 'display: none');
    }
    // by Dong 2_26
    $("#check_in").val(practical.check_in); 
    $("#check_out").val(practical.check_out);
    // end
    $("#note").val(practical.note);
    $(".section_post").attr('style', 'display: block;');
    
}

$("#breakfast").click(function () {
    if($("#breakfast").is(":checked")) {
        $("#breakfast_t").attr('style', 'display: block');
    } else {
        $("#breakfast_t").attr('style', 'display: none');
    }
});
$("#gym").click(function () {
    if($("#gym").is(":checked")) {
        $("#gym_t").attr('style', 'display: block');
    } else {
        $("#gym_t").attr('style', 'display: none');
    }
});
$("#jacuzzi").click(function () {
    if($("#jacuzzi").is(":checked")) {
        $("#jacuzzi_t").attr('style', 'display: block');
    } else {
        $("#jacuzzi_t").attr('style', 'display: none');
    }
});
$("#update").click(function () {
    if ($("#main-form").valid()) {
        var breakfast = ""; var jacuzzi = ""; var gym = ""; 
        if($("#status").is(":checked")) { status = "true"; } else { status = "false"; }
        if($("#breakfast").is(":checked")) { breakfast = "true"; } else { breakfast = "false"; }
        if($("#jacuzzi").is(":checked")) { jacuzzi = "true"; } else { jacuzzi = "false"; }
        if($("#gym").is(":checked")) { gym = "true"; } else { gym = "false"; }
        var accom = $(".page-content").data('accom');
        var data = {
            "city": offer_id,
            "name": $("#name").val(),
            "address": $("#address").val(),
            "longitude": $("#longitude").val(),
            "latitude": $("#latitude").val(),
            "category": $("#category").val(),
            "insider_rate": $("#insider_rate").val(),
            "content": $("#content").summernote('code'),
            "room_nb": $("#room").val(),
            "check_in": $("#check_in").val(),
            "check_out": $("#check_out").val(),
            "status": status,
            "max_capacity": $("#max_capacity").val(),
            //"min_capacity": $("#min_capacity").val(),
            "min_day_booking": $("#min_day_booking").val(),
            "timestamp": $("#timestamp").val(),
            "breakfast": breakfast,
            "breakfast_t": "",
            "jacuzzi": jacuzzi,
            "jacuzzi_t": "",
            "gym": gym,
            "gym_t": "",
            "note": $("#note").val()
        };
        if(breakfast == 'true') {
            data.breakfast_t = $("#breakfast_t").val();
        }
        if(jacuzzi == 'true') {
            data.jacuzzi_t = $("#jacuzzi_t").val();
        }
        if(gym == 'true') {
            data.gym_t = $("#gym_t").val();
        }
        if (type == "new") {
            data.accom_id = id;
        } else {
            var accom = $(".page-content").data('accom');
            data.accom_id = accom.id;
        }        
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'update_accommodation',
            data: data,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                window.location = redirect_path + "/admin/accomodations?id="+offer_id
            }
        });
    } else {
        alert("Please complete the information fields.");
    }    
});

$('#save').click(function() {
    if (type == "new") {
        if (confirm('Do you wanna to leave write content?')) {
            var breakfast = ""; var jacuzzi = ""; var gym = ""; 
            if($("#status").is(":checked")) { status = "true"; } else { status = "false"; }
            if($("#breakfast").is(":checked")) { breakfast = "true"; } else { breakfast = "false"; }
            if($("#jacuzzi").is(":checked")) { jacuzzi = "true"; } else { jacuzzi = "false"; }
            if($("#gym").is(":checked")) { gym = "true"; } else { gym = "false"; }
            var data = {
                "city": offer_id,
                "name": $("#name").val(),
                "address": $("#address").val(),
                "longitude": $("#longitude").val(),
                "latitude": $("#latitude").val(),
                "category": $("#category").val(),
                "insider_rate": $("#insider_rate").val(),
                "content": $("#content").summernote('code'),
                "room_nb": $("#room").val(),
                "check_in": $("#check_in").val(),
                "check_out": $("#check_out").val(),
                "status": status,
                "max_capacity": $("#max_capacity").val(),
                //"min_capacity": $("#min_capacity").val(),
                "min_day_booking": $("#min_day_booking").val(),
                
                "timestamp": $("#timestamp").val(),
                "breakfast": breakfast,
                "breakfast_t": "",
                "jacuzzi": jacuzzi,
                "jacuzzi_t": "",
                "gym": gym,
                "gym_t": "",                
                "note": $("#note").val()
            };
            if(breakfast == 'true') {
                data.breakfast_t = $("#breakfast_t").val();
            }
            if(jacuzzi == 'true') {
                data.jacuzzi_t = $("#jacuzzi_t").val();
            }
            if(gym == 'true') {
                data.gym_t = $("#gym_t").val();
            }
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'save_accommodation',
                data: data,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (e) {
                    window.location = redirect_path + "/admin/accomodations?id="+offer_id
                }
            });
        } else {
            // Do nothing!
        }
    }
});

$("#dialog_image").on('change', function() {
    var formdata = new FormData();
    formdata.append('file', this.files[0]);
    if (type == "new") {
        formdata.append('accom_id', id);
        formdata.append('offer_id', offer_id);
    } else {
        var accom = $(".page-content").data('accom');
        formdata.append('accom_id', accom.id);
        formdata.append('offer_id', offer_id);
    }
    $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'accom_banner_img',
      data: formdata,
      processData: false,
      contentType: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (e) {
        console.log(e);
      }
    });
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
    var accom = $(".page-content").data('accom');
    formData.append('id', accom.id);
  }
  var loading = new Loading({ discription: 'Loading...' });
  $.ajax({
    url: 'create_calendar_accommodation',
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
//             element['accom_id'] = id;
//             id_ = id;
//         } else {
//             var accom = $(".page-content").data('accom');
//             element['accom_id'] = accom.id;
//             id_ = id;
//         }
//         console.log(element.check_in);
//         var res = element.check_in.split(".");
//         element.check_in = res[2] + "-" + res[0] + "-" + res[1];
//         var res1 = element.check_out.split(".");
//         element.check_out = res1[2] + "-" + res1[0] + "-" + res1[1];
//         elements.push(element);
//     });    
//     $.ajax({
//         type: 'post',
//         dataType: 'json',
//         url: 'create_calendar_accommodation',
//         data: {elements: elements, id: id_},
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//             success: function (e) {                
//                 console.log(e);
//         }
//     });
//     /* DO SOMETHING WITH workbook HERE */
//   };
//   if(rABS) reader.readAsBinaryString(f); else reader.readAsArrayBuffer(f);
}

$("#experience_image").click(function () {
    $("#title").val("");
    $("#modal-experience-image").modal('show');
});
var exp_img_path = "";
$("#img_path").on('change', function() {
    if (count != 8) {
        var formdata = new FormData();
        formdata.append('file', this.files[0]);
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'accom_exp_img',
            data: formdata,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                exp_img_path = e;
            }
        });
    } else {
        alert("You can upload only 8 experiences");
        $("#modal-experience-image").modal('hide');
    }
    
});

$("#save_exp_img").click(function() {
    var data = {
        accom_id: "",
        path: exp_img_path,
        title: $("#title").val()
    };
    if (type == 'new') {
        data.accom_id = id;
    } else{ 
        var accom = $(".page-content").data('accom');
        data.accom_id = accom.id;
    }    
    if (data.path != "") {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'create_exp_accom',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                count = e;
                $("#modal-experience-image").modal('hide');
            }
        });
    }
});
$("#experience_images").click(function () {
    var id = 0;
    if (type == "new") {
        id = 0;;
    } else {
        var accom = $(".page-content").data('accom');
        id = accom.id;
    } 
    window.location = redirect_path + "/admin/edit_accom_experience?id="+id;
});

$("#slider_images").click(function () {
    var id = 0;
    if (type == "new") {
        id = 0;;
    } else {
        var accom = $(".page-content").data('accom');
        id = accom.id;
    } 
    window.location = redirect_path + "/admin/slider_images?id="+id+"&offer_id="+offer_id;
});