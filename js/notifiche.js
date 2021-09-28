$(document).ready(function () {
    setInterval(function(){
        $.ajax({
            url: './notifiche.php',
            type: 'POST',
            success: function(data){
                if(data != "0"){
                    $('.notifica').css( "display", "inherit");
                    $('.al').html(data);
                }
            },
        });
        }, 1000);

    var screenXs = 767;

    if (window.innerWidth <= screenXs) {
        $(".navbar").addClass("navbar-static-top");
    } else {
        $(".navbar").addClass("navbar-default");
    }

    $(window).resize(function () {
        if (window.innerWidth <= screenXs) {
            $(".navbar").removeClass("navbar-default");
            $(".navbar").addClass("navbar-static-top");
        } else {
            $(".navbar").removeClass("navbar-static-top");
            $(".navbar").addClass("navbar-default");
        }
    });
});