
function validateForm() {
    var telephone = document.getElementById("tel").value;
    //(604)724-6861, 6047246861, 604724 6861, 604724-6861,604 724-6861,604-724-6861 
    if(telephone.match(/^\([0-9]{3}\)[-," "]?[0-9]{3}[-," "]?[0-9]{4}$/) || telephone.match(/^[0-9]{3}[-," "]?[0-9]{3}[-," "]?[0-9]{4}$/))
       $('#error_tel').html("");
    else
        $('#error_tel').html("Invalid phone. Phone phormat should be (XXX)XXX-XXXX");    
        
        
    var postalCode = $("#postcode").val();
    if(postalCode.match(/^[AaBbCcEeGgHhJjKkLlMmNnPpRrSsTtVvXxYy]{1}\d{1}[A-Z,a-z]{1}[" "]?\d{1}[A-Z,a-z]{1}\d{1}$/))
       $('#error_postcode').html("");
    else
        $('#error_postcode').html("Invalid Postal Code.");    
    
    var password = $("#password").val();
    if(password.match(/^([a-zA-Z0-9@*#]{6,15})$/))
       $('#error_password').html("");
    else
        $('#error_password').html("Password should have at least 6 characters and no more than 15. It should includes special character.");    
    
        
}

