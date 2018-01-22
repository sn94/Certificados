
    
    $(document).ready(function(){
        
        function  acccionDropDown( ar ){
            
            $(ar).filter("div:visible").css("color","red");
            
   if(  $("li.custom-dropdown  div:visible").length > 0 ){
     $("li.custom-dropdown  div:visible").hide();
   }else{    $("li.custom-dropdown  div:hidden").show(); }
      
  }  
    $(function(){
     /**
     Aplicando los backgrounds correspondiente a cada menu con submenus **/
     /*Obtener color original **/
   
     $("ul.content-dropdown").parent().css("background-color","#111518");
      $("ul.content-dropdown").css("background-color", "#212528" );
       $("ul.content-dropdown, li.custom-dropdown a").css("border-bottom-color", "#fff" );
      $("ul.content-dropdown, li.custom-dropdown a").css("border-bottom-style", "solid" );
       $("ul.content-dropdown, li.custom-dropdown a").css("border-bottom-width", "1px" );
      
    $("li.custom-dropdown a").click(
      function( evento ){
     var padre= $(this).parent(); 
     
   if(  $(padre).find("ul:visible").length > 0 ){  $(padre).find("ul:visible").hide();
   }else{    $(padre).find("ul:hidden").show(); }
      
  } );
    
      
      
   
    });
  
   
        /** **/
    });
    
    
    
 