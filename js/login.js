$(document).ready(function(){
    
    //logs in the page
    $('#loginBtn').click(function(e) {
         var formData = ConvertFormToJSON("#loginForm");
         $.ajax({
             url: "php/login.php",
             type: "POST",
             dataType: "JSON",
             data: formData,     //formData is sent as a JSON-object through post method to the server 
             success: function(data) {
                        //the variable data is what is gotten back from the server
                        if(typeof data["error"] !== 'undefined')
                        {
                            $("#loginError").html(data["error"]).css("color","red");                               
                        }
                        else
                        {
                            $('#loginuser').html(data["userfullname"] + " <span class='glyphicon glyphicon-user' aria-hidden='true'></span>");
                             
                            localStorage["firstname"] = data["firstname"];
                            localStorage["lastname"] = data["lastname"];
                            localStorage["email"] = data["email"];
                            localStorage["address"] = data["address"];
                            localStorage["province"] = data["province"];
                            localStorage["zipcode"] = data["zipcode"];
                            localStorage["phonenumber"] = data["phonenumber"];
                            localStorage["city"] = data["city"];
                            localStorage["password"] = data["password"];     
                            localStorage["userid"] = data["userid"];
                            $('#userinfoName').html(localStorage["firstname"] + " " + localStorage["lastname"]);                      
                            $("#mshopping-cart").html("<a href='#'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></button></a>");
                            $('#loginuser').attr("data-target", "#userinfo");
                            $("#loginError").html("").css("color","black");
                            $('#login').modal('hide');
                        }
             },
             error: function(jqXHR, textStatus, errorThrown) {
                $("#loginError").text(jqXHR.statusText);
             }
         });
    });
    

    //showing user info to allow edition of certain fields(defined within HTML form) 
    $('#loginuser').click(function(e){
        if($('#loginuser').text().trim() !== "log in")
        {
            $("#userinfoFeedback").html("");
            e.preventDefault();
            $('#userinfoFname').val(localStorage["firstname"]);
            $('#userinfoLname').val(localStorage["lastname"]);
            $('#userinfoEmail').val(localStorage["email"]);
            $('#userinfoAddress').val(localStorage["address"]);
            $('#userinfoProvince').val(localStorage["province"]);
            $('#userinfoZipcode').val(localStorage["zipcode"]);
            $('#userinfoPhone').val(localStorage["phonenumber"]);
            $('#userinfoCity').val(localStorage["city"]);
            $('#userinfoPwd').val(localStorage["password"]);
            $('#userinfoName').val(localStorage["firstname"] + " " +localStorage["lastname"]);    
        }        
    });

    //loging out and clearing the session variables, both PHP and JS
    $('#logout').click(function(e){
        e.preventDefault();
        $('#loginuser').html("log in <span class='glyphicon glyphicon-user' aria-hidden='true'></span>");
        $("#mshopping-cart").html("");
        $('#loginuser').attr("data-target", "#login");
        $('#userinfo').modal('hide');
        destroy_session();
        localStorage.clear();
    });
    
    //updating user data
    $('#updateBtn').click(function(e){
        e.preventDefault();
        var formData = ConvertFormToJSON("#userinfoForm");
        $.ajax({
            url: "php/update.php",
            type: "POST",
            dataType: "JSON",
            data: formData,
            success: function(data) {
                	    $("#userinfoFeedback").html(data["msg"]);                               
            },
            error: function(jqXHR, textStatus, errorThrown) {
                        $("#p1").text(jqXHR.statusText);
                   }
        });
    });    
    
    $("#signupBtn").click(function(e){
        e.preventDefault();
        var formData = ConvertFormToJSON("#signupForm");
        $.ajax({
             url: "php/signup.php",
             type: "POST",
             dataType: "JSON",
             data: formData,     //formData is sent as a JSON-object through post method to the server 
             success: function(data) {
                 if(typeof data['error'] == 'undefined') 
                    $('#signup').modal('hide'); 
                 else
                     $('#errorSignUp').html(data['error']).css("color","red");
             },
             error: function(jqXHR, textStatus, errorThrown) {
                $("#loginError").text(jqXHR.statusText);
             }
         });
    });        
    
    
    
});

function ConvertFormToJSON(form){
    var array = $(form).serializeArray();
    var json = {};
    $.each(array, function() {
        json[this.name] = this.value || '';
    });
    return json;
}

function destroy_session(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET','php/logout.php', true);
    xmlhttp.send(null);
}