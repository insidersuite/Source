var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;
var ms = $('#invite_mail').magicSuggest({
    placeholder: "Enter e-mail addresses",
    allowDuplicates: false,
    useTabKey: true,
    vtype: 'email'
  });
var isValid = "false";
$(ms).on('selectionchange', function(e,m){
  if(this.isValid()) {
    $("#invite_mail").attr('style', 'border: 1px solid #dcdada;');
    isValid = "true";
  }
});
$("#invite_button").click(function () {
    if (isValid == "true") {
        var data = {
            'emails': ms.getValue(), 
            'link':$("#share_link").val()
        };
        console.log(data);
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'send_sponsor_mail',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                location.reload(true);
            }
        });      
    } else {
        $("#invite_mail").attr('style', 'border: 1px solid red;');
        isValid = "false";
    }
});