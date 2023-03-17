$(document).ready(function(){
  
  $('.skip').click(function (e) { 
    let url = $(this).parents(".sim").attr("data-url");
    window.location = $(this).parents(".sim").attr("data-url") + "/simstart.php";
    
  });
  $("input.name").keypress(function (e) { 
    if(e.key == "Enter"){
        let val = $(this).val();
        let url = $(this).parents(".sim").attr("data-url");
        if(val == '')return;
     $.post("username.php", {val,id:1},
        function (data, textStatus, jqXHR) {
            console.log()
           window.location = url + "/simstart.php";
        }
     );
    }
   });
   //////////////////////////////////////////////////
   $('body').on("click",".subject button",function (e) { 
     let id = $(this).parents('.subject').attr("data-id");
     $.post("subjects.php", {id},
      function (data, textStatus, jqXHR) {
        $(".con").empty();
       $(".con").append(data); 
      }
      
     );
   });
});






