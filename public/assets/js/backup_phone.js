jQuery(function() {
if( jQuery("#1").val() !== null ){
jQuery( "#1" ).keyup(function() {

var str= $(this).val();

$.get('include/check.php' , {data : str},
function(response){
    jQuery("#exampleInputcountry").val(response) ;

});
});
}
else{
if(jQuery("#2").val() != " "){
jQuery( "#2" ).keyup(function() {

var str= $(this).val();

$.get('include/check.php' , {data : str},
function(response){
    jQuery("#exampleInputcountry").val(response) ;

});
});

}
else {
if(jQuery("#3").val() != " "){
jQuery( "#3" ).keyup(function() {

var str= $(this).val();

$.get('include/check.php' , {data : str},
function(response){
    jQuery("#exampleInputcountry").val(response) ;

});
});

}

}
}
        $('.openModal').click(function(){
        var id = $(this).attr('id');
        $.ajax({url:"include/modal.php?id="+id,success:function(result){
            $(".modal-body").html(result);
        }});
    });

                       }); 
