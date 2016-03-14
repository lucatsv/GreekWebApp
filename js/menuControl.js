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
    
    
    $("btn[id^=addCart]").click(function(){    
        var id = $(this).attr("name");
             
        $.ajax({
             url: "php/item.php",
             type: "POST",
             dataType: "JSON",
             data: {"dishId" : id},      
             success: function(data) {
                //data = {0:["Baklava",2,2.15],1:["Kataifi",3,2.00]}
                
                if(typeof window.orderList == "undefined")
                    var orderList = [];
                else
                    orderList = window.orderList;
                    
                orderList.push([id, data["dishName"], data["price"]]);
                 
                window.orderList = orderList; 
                
                var orderListUnique = [];
                
                orderListUnique = orderList.unique();     
                var amount = [0];
                for(i =0;i<orderListUnique.length;i++)
                {
                    for(j =0;j<orderList.length;j++)
                    {
                        if(orderListUnique[i][1] == orderList[j][1])
                        {
                            if(typeof amount[i] == "undefined")
                                amount[i] = 0;
                            amount[i]++;
                        }
                    }
                    $("#row_prod_"+id).remove();
                    $('#totalRow').before("<tr id='row_prod_"+id+"'><td>"+ orderListUnique[i][1]+"</td><td id='total_prod_"+id+"'>" + amount[i] + "</td><td class='itemPrice'>$ "+amount[i] * orderListUnique[i][2]+
                    " <button class='add_prod btn btn-default'>+</button><button class='rem_prod btn btn-default'>-</button>"+"</td></tr>");  //add stuff to shopping cart
                }
                var total = 0;
                $('.itemPrice').each(function(index,value){total += parseFloat($(value).html().substring(2,100))})
                $('#totalDue').html('$ ' + total);  //updates total due
                
                
                // display a msg box telling that the order has been successfully added to shopping cart
                

             },
             error: function(jqXHR, textStatus, errorThrown) {
                $("#errorSignUp").text(jqXHR.statusText);
             }
         });
    });
});

