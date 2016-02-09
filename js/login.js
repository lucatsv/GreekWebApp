$(document).ready(function(){

    $('#loginBtn').click(function(e) {
        var formData = ConvertFormToJSON("#loginForm");
        $.ajax({
            url: "php/login.php",
            type: "POST",
            dataType: "JSON",
            data: formData,
            success: function(data) {
                        var listData = "";
                        for(var key in data) {
                            //listData += key + ":" + data[key] + " ";
                            listData += data[key] + " ";
                        }
                        $('#loginuser').html(listData + " <span class='glyphicon glyphicon-user' aria-hidden='true'></span>");
                        $('#loginuser').attr("data-target", "#userinfo");
                        $('#login').modal('hide');
                        //window.location.replace("http://stackoverflow.com");

                    },
            error: function(jqXHR, textStatus, errorThrown) {
                        $("#p1").text(jqXHR.statusText);
                    }
        });        
    });
    
    $('#logout').click(function(e){
        e.preventDefault();
        $('#loginuser').html("log in <span class='glyphicon glyphicon-user' aria-hidden='true'></span>");
        $('#loginuser').attr("data-target", "#login");
        $('#userinfo').modal('hide');
    });
    
    $('#updateBtn').click(function(e){
        var formData = ConvertFormToJSON("#userinfoForm");
        //e.preventDefault();
        $.ajax({
           url: "php/update.php",
           type: "POST",
           dataType: "JSON",
           data: formData,
           success: function(data) {
                        var listdata = "";
                        for(var key in data) {
                            listdata += " " + data[key];   
                        }   
                        $('#userinfoFeedback').html(listdata);
                        
                        $('#userinfo').modal('hide').delay( 1000 );
                    },
           error: function(jqXHR, textStatus, errorThrown) {
                        $("#userinfoFeedback").text(jqXHR.statusText);
                  }
        });
    });
   
});
    
function ConvertFormToJSON(form){
    var array = $(form).serializeArray();
    var json = {};
    jQuery.each(array, function() {
        json[this.name] = this.value || '';
    });
    return json;
}

       
