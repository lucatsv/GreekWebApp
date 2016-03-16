$(document).ready(function() {
   
     $("img[name='nutrition-guide']").click(function(){
         $.ajax({
             url: "php/productData.php",
             type: "POST",
             dataType: "JSON",
             data: {"dishId" : $(this).attr('data-id')},     //formData is sent as a JSON-object through post method to the server 
             success: function(data) {
                        //the variable data is what is got back from the server
                    $('#nutrition-guide').dialog({
                                            modal: true,
                                            title: data['dishName'],
                                            open: function() {
                                                $('.ui-dialog-titlebar').css('background', 'rgba(36,64,242,0.75)');
                                                $('.ui-dialog-titlebar').css('font-weight', 'bold');
                                                $(this).html("<p>"+ data['description']+"</p>" +
                                                "<p><strong>Nutrition facts</strong></p>" +
                                                "<table class='table table-condensed'>" +
                                                "<tr><td>Calories</td><td>"+data['CALORIES']+"</td></tr>"+
                                                "<tr><td>Daily Value </td><td>"+data['DAILY_VALUE']+"%</td></tr>"+
                                                "<tr><td>Sodium</td><td>"+data['SODIUM']+" g</td></tr>"+    
                                                "<tr><td>Calcium</td><td>"+data['CALCIUM']+" g</td></tr>"+
                                                "<tr><td>Iron</td><td>"+data['IRON']+" g</td></tr></table>");
                                                }
                                             /*  ,
                                             buttons: {
                                                    "buy": function () {
                                                        $(this).dialog("close")
                                                    }
                                             }
                                             */
                                        }); 
                                        $('.ui-dialog-titlebar-close').html('x');
             },
             error: function(jqXHR, textStatus, errorThrown) {
                $("#errorSignUp").text(jqXHR.statusText);
             }
         });
         
     });
    
    
});
