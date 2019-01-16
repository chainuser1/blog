
$(document).ready(function(){
	 $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }
      });
   //submit button default disabled
   $("#comment-submit").click(function(e){
   	  
    $(this).siblings(".status").text("Sending comment to..."+$("#comment-submit").attr('data-url'));
     
     //ajax goes here
     $.ajax({
     	url:$("#comment-submit").attr('data-url'),
        type:'POST',
        data: {text: $('textarea[name="text"]').val()},
        // dataType:'json',
        success: function(data){
           $(this).siblings(".status").text(data.message)
        }
     }).always(function(){
     	location.reload()
     });

   })
  function ajax_like(status, url){
       $.ajax({
          url: url,
          type: 'POST',
          data: {status: status},
          success: function(data){
            alert(data.msg)
          }
       });
    }
   //like functionality 
   //update status asynchronously
   
   $('a.status').click(function(e){
         var url=$(this).attr('data-url');
         var num = parseInt($(this).siblings(".number-likes").text());
         num++;
         $(this).siblings(".number-likes").text(num);
         ajax_like(1,url)
     })
})