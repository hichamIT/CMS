
tinymce.init({ selector: 'textarea' });

$(document).ready(function(){
    
    
    $('#selectallbox').click(function(event){

        if (this.checked) {

            $('.checkboxes').each(function(){
                this.checked = true;
            });

        } else {
            $('.checkboxes').each(function () {
                this.checked = false;
            });
        } 

    });

    var div_box = "<div id='load-screen'><div id='loading'></div></div>";
    $("body").prepend(div_box);
   
    $("#load-screen").delay(500).fadeOut(500,function(){
        $(this).remove();
    });

});


function loadUserOligne() {
    
    $.get("function.php?online=result", function(data) {
        $(".useronline").text(data);
    });

}

setInterval(function () {
    loadUserOligne();
},500);




