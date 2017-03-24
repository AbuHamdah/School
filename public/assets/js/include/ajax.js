 $(document).ready(function() {
   function loaddata()
    {
	
	$.ajax({
			type: 'post',
			url: 'user.php',
			success: function (response) {

			$( '#user' ).html(response);
            

			}
		   });}
  });
       
	
    </script>
    <td><input name="username" class="1" type="text" style="align:center"></td><td><input class="2" name="password" type="text" style="align:center"></td><td><input class="3" name="email" type="text" style="align:center"></td><td><input class="4" name="date" type="text" style="align:center"></td><td><input name="id" type="hidden" class="5" ></td><td><input id="sub" type="submit" value="save" name="save"></td>');
      var edi_id = elemen.attr("id");
            var inform = 'ed_id=' + edi_id;
	          $.ajax({
			type: 'GET',
			url: 'edit.php',
            data:inform,
			success: function (data) {
            var obj = JSON.parse(data);
            var user= obj.username;
            var pass= obj.password;
            var emil= obj.email;
            var dat = obj.date;
            var editId= obj.id;
			$( '.1' ).val(user);
            $( '.2' ).val(pass);
            $( '.3' ).val(emil);
            $( '.4' ).val(dat);
            $( '.5' ).val(editId);
            
        $('form').on('submit', function (e) {

          e.preventDefault();
        }
        $(this).parent().parent().children().children().each(function(){
                                                                 
                var value = $(this).val()  ;  
                alert($(this).attr('name'));                                                  
               x+=value;
               x+=",";
            var y = x.split(",");  
            var data_to_send = $.serialize(y);

        
           
                
                
                
                
                
                
                
                
                
			});
		   }}
			);