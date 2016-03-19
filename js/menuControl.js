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

var currentPage = "home";

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
        currentPage = "lunch";
    });
    
        
    $("#mdinner").click(function(){
        $("#lunch").hide();
        $("#dinner").show();
        $("#aboutus").hide();
        $("#contactus").hide(); 
        $("#shopping-cart").hide();
        $("#nutrition").hide();
        $("#home").hide();
        currentPage = "dinner";
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
    
    $("#mhome").click(function(){
        $("#lunch").hide();
        $("#dinner").hide();
        $("#aboutus").hide();
        $("#contactus").hide();
        $("#shopping-cart").hide();
        $("#nutrition").hide(); 
        $("#home").show();
        currentPage = "home";
    });
    
    $("#mshopping-cart").click(function(){
        $("#lunch").hide();
        $("#dinner").hide();
        $("#aboutus").hide();
        $("#contactus").hide();
        $("#shopping-cart").show();
        $("#nutrition").hide(); 
        $("#home").hide();
        if(typeof localStorage["userfullname"] != "undefined")
        {
            $.ajax({
                url: "php/loadOpenShoppingCart.php",
                type: "POST",
                dataType: "JSON",
                data: {},      
                success: function(data) {
                    setShoppingCartTable(data);        
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#errorSignUp").text(jqXHR.statusText);
                }
            });            
        }
    });
    
    $("#madmin").click(function(){
        window.location.href = "http://localhost/admin.php";    
    });
    
    
    //adding products to shopping cart
    $("btn[id^=addCart]").click(function(){    
        if(typeof localStorage["userfullname"] == "undefined"){
            $('#login').modal();
            return;
        }
        var id = $(this).attr("data-id");
        $.ajax({
             url: "php/shoppingCart.php",
             type: "POST",
             dataType: "JSON",
             data: {"dishId" : id},      
             success: function(data) {
                setShoppingCartTable(data);        
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
    
    
    $('#continue_shopping').click(function(){
        $("#shopping-cart").hide();
        $("#"+currentPage).show();
    });

});

function computeTotal(){
    total =0;
    $('td[id^=prod_price_cart_]').each(function(){total+=parseFloat($(this).text())});
    $('#totalRow').html("<td colspan=2><strong>Total</strong></td><td><strong>$ " + total + "</strong></td>");
}    

function setShoppingCartTable(data){
    table = '<table id="myShoppingCart" class="table table-striped">';
    for(row in data)
    {
        table += "<tr><td>" + data[row]['dishName'] + "</td>" +
        "<td><input data-id = '"+data[row]['dishId']+"' data-uprice='"+data[row]['uprice']+ "' class='prod_qty_cart' type='text' value ='" + data[row]['quantity'] + "'></td>" +
        "<td id='prod_price_cart_" +data[row]['dishId']+ "' >" + data[row]['price'] + "</td><tr>";
    }
    table = table + "<tr id='totalRow' ></tr></table>";
                    
    $('#myShoppingCart').html(table);
    computeTotal();
    $('#myShoppingCart').on("change", '.prod_qty_cart', function(evt) {
        qty = evt.target.value;
        price = evt.target.dataset.uprice;
        id = '#prod_price_cart_' + evt.target.dataset.id;
        $(id).html(qty * price);
        computeTotal();
     });
     $("#lunch").hide();
     $("#dinner").hide();
     $("#home").hide();
     $("#shopping-cart").show();
}