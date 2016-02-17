$(document).ready(function() {
    
    $("#lunch").hide();
    $("#dinner").hide();
    $("#aboutus").hide();
    $("#contactus").hide();
    $("#shopping-cart").hide(); 
    $("#nutrition").hide();
    $("#home").show();
    
    $("#mlunch").click(function(){
        $("#lunch").show();
        $("#dinner").hide();
        $("#aboutus").hide();
        $("#contactus").hide(); 
        $("#shopping-cart").hide();  
        $("#nutrition").hide();       
        $("#home").hide();
    });
    
        
    $("#mdinner").click(function(){
        $("#lunch").hide();
        $("#dinner").show();
        $("#aboutus").hide();
        $("#contactus").hide(); 
        $("#shopping-cart").hide();
        $("#nutrition").hide();
        $("#home").hide();
    });
    
    $("#maboutus").click(function(){
        $("#lunch").hide();
        $("#dinner").hide();
        $("#aboutus").show();
        $("#contactus").hide(); 
        $("#shopping-cart").hide();
        $("#nutrition").hide();
        $("#home").hide();
    });   
    
     $("#mcontactus").click(function(){
        $("#lunch").hide();
        $("#dinner").hide();
        $("#aboutus").hide();
        $("#contactus").show(); 
        $("#shopping-cart").hide();
        $("#nutrition").hide();
        $("#home").hide();
    });   
    
    $("#mnutrition").click(function(){
        $("#lunch").hide();
        $("#dinner").hide();
        $("#aboutus").hide();
        $("#contactus").hide(); 
        $("#home").hide();
        $("#nutrition").show();
    });
    
    $("#mhome").click(function(){
        $("#lunch").hide();
        $("#dinner").hide();
        $("#aboutus").hide();
        $("#contactus").hide();
        $("#shopping-cart").hide();
        $("#nutrition").hide(); 
        $("#home").show();
    });
    
    $("#mshopping-cart").click(function(){
        $("#lunch").hide();
        $("#dinner").hide();
        $("#aboutus").hide();
        $("#contactus").hide();
        $("#shopping-cart").show();
        $("#nutrition").hide(); 
        $("#home").hide();
    });
    
    
    $("btn[id^=addCart]").click(function(){    
        var id = $(this).attr("name");
        
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
                    $('#signup').hide(); 
                 else
                     $('#errorSignUp').html(data['error']).css("color","red");
             },
             error: function(jqXHR, textStatus, errorThrown) {
                $("#loginError").text(jqXHR.statusText);
             }
         });
    });    
});


