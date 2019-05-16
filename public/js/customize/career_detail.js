var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;
$(".info_link").click (function () {
  if (user) {
    window.location = redirect_path + "/career_detail_info?id=" + $(this).data('id')
  } else {
    window.location = redirect_path + "/career-detail_info?id=" + $(this).data('id')
  }
});