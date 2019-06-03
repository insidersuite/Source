var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;

$(".offer").click(function () {	
    var id = $(this).data('source');
    var status = $(this).data('status');
    if (status != false) {
        window.location = redirect_path + "/offer"
    }
});