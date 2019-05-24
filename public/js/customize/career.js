var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;
$(".career").click (function () {  
  var id = $(this).data('id');
  if (user) {
    window.location = redirect_path + "/career_detail?id="+id
  } else {
    window.location = redirect_path + "/career-detail?id="+id
  }    
});

