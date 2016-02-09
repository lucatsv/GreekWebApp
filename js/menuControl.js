$(document).ready(function(){
    
    $("#lunch").hide();
    $("#dinner").hide();
    $("#aboutus").hide();
    $("#contactus").hide(); 
    $("#home").show();
    
    $("#mlunch").click(function(){
        $("#lunch").show();
        $("#dinner").hide();
        $("#aboutus").hide();
        $("#contactus").hide(); 
        $("#home").hide();
    });
    
        
    $("#mdinner").click(function(){
        $("#lunch").hide();
        $("#dinner").show();
        $("#aboutus").hide();
        $("#contactus").hide(); 
        $("#home").hide();
    });
    
     $("#maboutus").click(function(){
        $("#lunch").hide();
        $("#dinner").hide();
        $("#aboutus").show();
        $("#contactus").hide(); 
        $("#home").hide();
    });   
    
     $("#mcontactus").click(function(){
        $("#lunch").hide();
        $("#dinner").hide();
        $("#aboutus").hide();
        $("#contactus").show(); 
        $("#home").hide();
    });   
    
    
     $("#mhome").click(function(){
        $("#lunch").hide();
        $("#dinner").hide();
        $("#aboutus").hide();
        $("#contactus").hide(); 
        $("#home").show();
    });
    
     
});



