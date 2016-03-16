Array.prototype.contains = function(v) {
    for(var i = 0; i < this.length; i++) {
        if(this[i][1] === v) return true;
    }
    return false;
};

Array.prototype.unique = function() {
    var arr = [];
    for(var i = 0; i < this.length; i++) {
        if(!arr.contains(this[i][1])) {
            arr.push(this[i]);
        }
    }
    return arr; 
}


$(document).ready(function() {
    
    $("#lunch").hide();
    $("#dinner").hide();
    $("#aboutus").hide();
    $("#contactus").hide();
    $("#shopping-cart").hide(); 
    $("#nutrition").hide();
    $("#home").show();
    $("#shopping-cart").hide();
    
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
    
    
    
    //adding products to shopping cart
    $("btn[id^=addCart]").click(function(){    
        var id = $(this).attr("data-id");
        $.ajax({
             url: "php/shoppingCart.php",
             type: "POST",
             dataType: "JSON",
             data: {"dishId" : id},      
             success: function(data) {
                if(typeof localStorage["firstname"] != "undefined")
                {
                    //$('#myShoppingCart').append("<tr><td colspan=2><strong>Total</strong></td><td><strong>$ " + data["total"][0]["price"] + "</strong></td><tr>");
                    table = '<table id="myShoppingCart" class="table table-striped">';
                    for(row in data)
                    {
                        //console.log(data[row]['dishName']);
                        table += "<tr><td>" + data[row]['dishName'] + "</td>" +
                        "<td><input data-id = '"+data[row]['dishId']+"' data-uprice='"+data[row]['uprice']+ "' class='prod_qty_cart' type='text' value ='" + data[row]['quantity'] + "'></td>" +
                        "<td id='prod_price_cart_" +data[row]['dishId']+ "' >" + data[row]['price'] + "</td><tr>";
                    }
                    table = table + "<tr id='totalRow' ></tr></table>";
                    
                    $('#myShoppingCart').html(table);
                    computeTotal();
                    //$('#myShoppingCart').append("<tr><td colspan=2><strong>Total</strong></td><td><strong>$ " + data["total"][0]["price"] + "</strong></td><tr>");
                    $('#myShoppingCart').on("change", '.prod_qty_cart', function(evt) {
                        qty = evt.target.value;
                        price = evt.target.dataset.uprice;
                        id = '#prod_price_cart_' + evt.target.dataset.id;
                        $(id).html(qty * price);
                        
                        computeTotal();
                    });
                }
                else
                    console.log("User must log in to add product into shopping cart!");
             },
             error: function(jqXHR, textStatus, errorThrown) {
                $("#errorSignUp").text(jqXHR.statusText);
             }
         });
    });
    

    //checking out shopping cart    
    $("#buy").click(function(){
          $.ajax({
             url: "php/closeShoppingCart.php",
             type: "POST",
             dataType: "JSON",
             data: {"msg" : "close shopping cart"},      
             success: function(data) {
                    console.log(data["msg"]);
                    $('#myShoppingCart').html("<h2>" + data["cartOwner"][0]["USERNAME"]+ "<br />Your order has been processed<br />Thank you!</h2>")
             },
             error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
                console.log(textStatus);
                $("#errorSignUp").text(jqXHR.statusText);
             }
         });
    });

});

function computeTotal(){
    total =0;
    $('td[id^=prod_price_cart_]').each(function(){total+=parseFloat($(this).text())});
    $('#totalRow').html("<td colspan=2><strong>Total</strong></td><td><strong>$ " + total + "</strong></td>");
}    
