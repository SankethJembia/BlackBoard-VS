$(document).ready(function(){

    $(".navAction").on("click",function(){
    
    var mainc=$("#mainContainer");  //referencing the style classes from landing page
    var navb=$("#Navbar");          //referencing the style classes from landing page 

        
           if(mainc.hasClass("leftpadding")){   //check if it has the padding 
              
            navb.hide();                      //if it has padding then it will hide


           }else{
           
            navb.show();                     //if not it adds the paddding and show the navigation
           
        }
           mainc.toggleClass("leftpadding");    //for toggling the padding





     });
});