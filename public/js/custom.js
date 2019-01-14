$.noConflict();

$(function(){
	//tooltip
   $("[data-toggle='tooltip']").hover(function(){
   	   $(this).tooltip();
   })

   //comment-form
   $("form").submit(function(e){
      e.preventDefault();
   })

   //submit button default disabled

   $("#submit-comment").click(function(e){
   	 e.preventDefault();
     alert('ready')
     $.ajax(
     	   {
     	   	 url:$(this).parent().attr('action'),
     	   	 type: 'POST',
     	   	 data: $(this).parent().serialize(),
     	   	 success: function(result){
               alert(result);
     	   	 }
     	   }
     	);

   })

})