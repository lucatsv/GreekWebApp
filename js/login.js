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
                        if(data["status"] == "error")
                        {
                            $("#loginError").html(data["error"]).css("color","red");                               
                        }
                        else
                        {
                            $('#loginuser').html(data["userfullname"] + " <span class='glyphicon glyphicon-user' aria-hidden='true'></span>");
                             
                            localStorage["userfullname"] = data["userfullname"];
                            
                            $('#userinfoName').html(data["userfullname"]);                      
                          
                            if(data["admin"] == 1) {
                                $("#madmin").html("<a href='#'><span class='glyphicon glyphicon-cog' aria-hidden='true'></button></a>");
                                $("#mshopping-cart").html("");
                                localStorage["admin"] = 1;
                            }
                            else if ((data["admin"] == 0)){
                                $("#madmin").html("");
                                $("#mshopping-cart").html("<a href='#'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></button></a>");
                                localStorage["admin"] = 0;
                            }
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
    
    
    if(typeof localStorage["userfullname"] != "undefined"){
        $('#loginuser').html(localStorage["userfullname"] + " <span class='glyphicon glyphicon-user' aria-hidden='true'></span>");

            if(localStorage["admin"] == 1) {
                $("#madmin").html("<a href='#'><span class='glyphicon glyphicon-cog' aria-hidden='true'></button></a>");
                $("#mshopping-cart").html("");
                localStorage["admin"] = 1;
            }
            else if ((localStorage["admin"] == 0)){
                $("#madmin").html("");
                $("#mshopping-cart").html("<a href='#'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></button></a>");
                localStorage["admin"] = 0;
            }
            $('#loginuser').attr("data-target", "#userinfo");
            $("#loginError").html("").css("color","black");
            $('#login').modal('hide');        
    }
        

    //showing user info to allow edition of certain fields(defined within HTML form) 
    $('#loginuser').click(function(e){
        if($('#loginuser').text().trim() !== "log in")
        {
            $("#userinfoFeedback").html("");
            e.preventDefault();

            $.ajax({
                url: "php/userData.php",
                type: "POST",
                dataType: "JSON",
                data: {},    
                success: function(data) {
                    $('#userinfoFname').val(data[0]["FirstName"]);
                    $('#userinfoLname').val(data[0]["LastName"]);
                    $('#userinfoEmail').val(data[0]["email"]);
                    $('#userinfoAddress').val(data[0]["Address"]);
                    $('#userinfoProvince').val(data[0]["Province"]);
                    $('#userinfoZipcode').val(data[0]["Zipcode"]);
                    $('#userinfoPhone').val(data[0]["phoneNumber"]);
                    $('#userinfoCity').val(data[0]["City"]);
                    $('#userinfoPwd').val(data[0]["Password"]);
                    $('#userinfoName').html(localStorage["userfullname"]);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#loginError").text(jqXHR.statusText);
                }
            });
        }        
    });

    //loging out and clearing the session variables, both PHP and JS
    $('#logout').click(function(e){
        e.preventDefault();
        $('#loginuser').html("log in <span class='glyphicon glyphicon-user' aria-hidden='true'></span>");
        $("#mshopping-cart").html("");
        $("#madmin").html("");        
        $('#loginuser').attr("data-target", "#login");
        $('#userinfo').modal('hide');
        
        $("#shopping-cart").hide();
        $("#home").show();
        
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
             data: formData,    
             success: function(data) {
                 if(typeof data['error'] == 'undefined') {
                    $('#signup').modal('hide');
                    $('#loginUsername').val(formData['username']); 
                 }
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