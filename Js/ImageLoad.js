var dir = "SliderImages/";
var fileextension = ".jpg";
$.ajax({
    //This will retrieve the contents of the folder if the folder is configured as 'browsable'
    url: dir,
    success: function (data) {
        //List all .png file names in the page
        $(data).find("a:contains(" + fileextension + ")").each(function () {
            var filename = this.href.replace(window.location, "").replace("http://", "");
            $(".topimage").append("<img src='SliderImages/" + filename + "' style='width:100%;'>");
            
        });
    }
});