
$(document).ready(function(){
        $(".click").click(function(){
            $("#staticBackdropSign").modal('hide');
            
        });
});
$(document).ready(function(){
        $(".loss").click(function(){
                        $("#staticBackdropLogin").modal('hide');

            
        });
});
$(document).ready(function(){
$(".fa-search").click(function(){
    $(".inp").toggle();
});
  
});
$(".sign").on('show.bs.modal', function (e) {
    $("#staticBackdropSign").modal("hide");
});

$(document).ready(function() {
    $(".staff").click(function() {
        $(".bb").hide();
        $(".cc").show();
        $(this).css({ "background-color":"#00B398" , "color":"#fff"})
        $(".owner").css({ "background-color":"transparent" , "color":"gray"})

    });
});
$(document).ready(function() {
    $(".owner").click(function() {
        $(".cc").hide();
         $(".bb").show();
        $(this).css({ "background-color":"#002C7F" , "color":"#fff"})
        $(".staff").css({ "background-color":"transparent" , "color":"gray"})

    });
});