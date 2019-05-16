//-------------------Variables---------------------------


var loading_page = new Loading({discription: 'Waiting...'});

$(window).load(function() {
   loadingOut(loading_page);
});

var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;

console.log(redirect_path);

var ms = $('#invite_email').magicSuggest({
  placeholder: "Input friend's address.",
  allowDuplicates: false,
  useTabKey: true
});

$("#send_invite").click(function () {

  console.log($("#invite_content").val());

  var radioValue = $("input[name='radiotitle']:checked").val();
  if(radioValue){
    var data = {
      "emails": ms.getValue(),
      "message": $("#invite_message").val(),
      "content": $("#invite_content").val(),
      "exp_id": invite_exp_id,
      "radiotitle_custom": radioValue
    };
    console.log(data['content']);
    $.ajax({
      type: 'post',
      dataType: 'json',
      url: 'send_invite_email',
      data: data,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (e) {
          console.log(e);   
          window.location.href = redirect_path+"/offers";
      }
    });

  } else {
      alert('Please check "Who did you travel with?"');
  }
  
});

$("#skip_invite").click(function () {
  var radioValue = $("input[name='radiotitle']:checked").val();
  if(radioValue){
      window.location.href = redirect_path+"/offers";
  } else {
      alert('Please check "Who did you travel with?"');
  }
    
});

function loadingOut(loading) {
  setTimeout(() => loading.out(), 3000);
}
