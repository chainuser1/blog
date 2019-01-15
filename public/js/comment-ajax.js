
$(document).ready(function(){
	
   //submit button default disabled
   $("#comment-submit").click(function(e){
   	  $.ajaxSetup({
       headers: {
     	  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }
      });
    $(".status").text("Sending comment to..."+$("#comment-submit").attr('data-url'));
     
     //ajax goes here
     $.ajax({
     	url:$("#comment-submit").attr('data-url'),
        type:'POST',
        data: {text: $('textarea[name="text"]').val()},
        // dataType:'json',
        success: function(data){
           $(".status").text(data.message)
        }
     }).always(function(){
     	location.reload()
     });

   })
})