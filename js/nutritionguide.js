$(document).ready(function() {
   
     $("img[name='nutrition-guide']").click(function(){
    
         $.ajax({
             url: "php/nutritionguide.php",
             type: "POST",
             dataType: "JSON",
             data: {"dishName" : $(this).attr('alt')},     //formData is sent as a JSON-object through post method to the server 
             success: function(data) {
                        //the variable data is what is got back from the server
                    $('#nutrition-guide').dialog({
                                            modal: true,
                                            title: data['dishName'],
                                            open: function() {
                                                $('.ui-dialog-titlebar').css('background', 'rgba(36,64,242,0.75)');
                                                $('.ui-dialog-titlebar').css('font-weight', 'bold');
                                                $(this).html("<p>"+ data['description']+"</p>");
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
