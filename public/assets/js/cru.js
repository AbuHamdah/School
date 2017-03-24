 function edit_row(id , table)
    {
        $("#edit_"+id).hide(); 
		
                          if(table=="contact_table"){
							  
                              var c=0;
                        var elemant = $("#edit_"+id).parent().parent() ; 
                      elemant.children().each(function (va){
                    
                    var item = $(this).text();
                          
                              if(c==1){
                                $(this).html("<input type='text' class='form-control con' value ="+item+">"); 
                                  $('.con').val(item);
							  }
                            c+=1;
                          });
                           
                        $("#save_"+id).show();
                         $("#delete_"+id).hide();
                        $("#cancel_"+id).show();
                          }
                          if(table=="be_option_table"){
							  
                              var c=0;
                        var elemant = $("#edit_"+id).parent().parent() ; 
                      elemant.children().each(function (va){
                    
                    var item = $(this).text();
                          
                              if(c <=2 ){
                                  if(c !=0){
                                $(this).html("<input type='text' class='form-control con"+c+"' value ="+item+">"); 
                                       $('.con'+c).val(item);
                                  }
							  }
                            c+=1;
                          });
                           
                        $("#save_"+id).show();
                         $("#delete_"+id).hide();
                        $("#cancel_"+id).show();
                          }
                   else if(table=="student_table"){
							  
                              var c=0;
                        var elemant = $("#edit_"+id).parent().parent() ; 
                      elemant.children().each(function (va){
                    
                    var item = $(this).text();
                          
                              if(c<=4){
                                $(this).html("<input type='text' class='form-control' value ="+item+">");   
							  }
                            c+=1;
                          });
                           
                        $("#save_"+id).show();
                         $("#delete_"+id).hide();
                        $("#cancel_"+id).show();
                          }
         else if(table=="massi_table"){
							  
                              var c=0;
                        var elemant = $("#edit_"+id).parent().parent() ; 
                      elemant.children().each(function (va){
                    
                    var item = $(this).text();
                         
                              if(c>3){
                                  if($(this).children().val() != 'Edit' && $(this).children().val() != 'Delete' ){
                                $(this).html("<input type='text' class='form-control' value ="+item+">");   
							  }}
                            c+=1;
                          });
                           
                        $("#save_"+id).show();
                         $("#delete_"+id).hide();
                        $("#cancel_"+id).show();
                          }
		else if(table=="attend_table"){
							  
                              var c=0;
                        var elemant = $("#edit_"+id).parent().parent() ; 
                      elemant.children().each(function (va){
                    
                    var item = $(this).text();
                          
                              if(c<=5){
								if(c!=0){
									if(c!=1){
										if(c==3){
											$(this).html("<input id='rt' type='text' class='form-control' value ="+item+">"); 
										}
										else if(c==2){
											$(this).html("<input id='da' type='text' class='form-control' value ="+item+">"); 
										
										}
										else{
                                $(this).html("<input type='text' class='form-control' value ="+item+">");   
										
							  }}}}
                            c+=1;
                          });
                           
                        $("#save_"+id).show();
                         $("#delete_"+id).hide();
                        $("#cancel_"+id).show();
                          }
		else if(table=="attendan_table"){
							  
                              var c=0;
                        var elemant = $("#edit_"+id).parent().parent() ; 
                      elemant.children().each(function (va){
                    
                    var item = $(this).text();
                          
                              if(c<=5){
								if(c!=0){
									if(c!=1){
										if(c!=2){
										
                                $(this).html("<input type='text' class='form-control' value ="+item+">");   
										
							  }}}}
                            c+=1;
                          });
                           
                        $("#save_"+id).show();
                         $("#delete_"+id).hide();
                        $("#cancel_"+id).show();
                          }
		  else if(table=="question_table"){
							  
                              var c=0;
                        var elemant = $("#edit_"+id).parent().parent() ; 
                      elemant.children().each(function (va){
                    
                    var item = $(this).text();
                          
                              if(c<=7){
                                $(this).html("<input type='text' class='form-control' value ="+item+">");   
							  }
                            c+=1;
                          });
                           
                        $("#save_"+id).show();
                         $("#delete_"+id).hide();
                        $("#cancel_"+id).show();
                          }
		else if(table=="leave"){
							  
                              var c=0;
                        var elemant = $("#edit_"+id).parent().parent() ; 
                      elemant.children().each(function (va){
                    
                    var item = $(this).text();
                          
                              if(c<=3){
                                $(this).html("<input type='text' class='form-control' value ="+item+">");   
							  }
                            c+=1;
                          });
                           
                        $("#save_"+id).show();
                         $("#delete_"+id).hide();
                        $("#cancel_"+id).show();
                          }
                       
    }
          
            function save_row(id , table){
                
                if(table=="contact_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveClass", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}
                if(table=="be_option_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveBehaviour_option", {id : id , name : y[0] , message : y[1]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i <=1){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}
                if(table=="behaviour_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveBehaviour_type", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}
                if(table=="observation_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveObservation_type", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}
                 else if(table=="bus_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveBus", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}
                     else if(table=="grade2_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveControlGrade", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}
   else if(table=="week_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveWeek", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}       
else if(table=="term_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveTerm", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
} 
else if(table=="year_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveYear", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
} 
                else if(table=="de_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveDepartment", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
} 
                        else if(table=="subject2_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/ControlsaveSubject", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}
                        else if(table=="assi_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveAssigment", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}
                        else if(table=="position_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/savePosition", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}
                        else if(table=="location_table"){
                   var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveLocation", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
}
else if(table=="subject_table"){
	 var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveSubject", {id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
	
}	
else if(table=="massi_table"){
	 var y=[] ;
    var x =0 ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            x++;
                          
                         });
                     if(x == 6 ) {
                       $.get("/school/public/saveMassign", {id : id , mark1 : y[0] , name1 : y[1]},
                            
                   function(response){
                            
                             alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                         
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                        if($(this).val() != 'Save' && $(this).val() != 'Cancel' && $(this).val() != 'Delete' && $(this).val() != 'Edit' ){
                               $(this).parent().html($(this).val());  
                        
                             
                         i+=1 ;
                        }
                    });
                         
                       });
                     }
    else if(x == 8 ) {
                       $.get("/school/public/saveMassign", {id : id , mark1 : y[0] , name1 : y[1] , mark2 : y[2] , name2 : y[3]},
                            
                   function(response){
                            
                              alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                         
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                        if($(this).val() != 'Save' && $(this).val() != 'Cancel' && $(this).val() != 'Delete' && $(this).val() != 'Edit' ){
                               $(this).parent().html($(this).val());  
                        
                             
                         i+=1 ;
                        }
                    });
                         
                       });
                     }
     else if(x == 10 ) {
                       $.get("/school/public/saveMassign", {id : id , mark1 : y[0] , name1 : y[1] , mark2 : y[2] , name2 : y[3] , mark3 : y[4] , name3 : y[5]},
                            
                   function(response){
                        
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                         
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                        if($(this).val() != 'Save' && $(this).val() != 'Cancel' && $(this).val() != 'Delete' && $(this).val() != 'Edit' ){
                               $(this).parent().html($(this).val());  
                        
                             
                         i+=1 ;
                        }
                    });
                       });
                     }
     else if(x == 12 ) {
                       $.get("/school/public/saveMassign", {id : id , mark1 : y[0] , name1 : y[1] , mark2 : y[2] , name2 : y[3] , mark3 : y[4] , name3 : y[5] , mark4 : y[6] , name4 : y[7]},
                            
                   function(response){
                            
                              alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                         
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                        if($(this).val() != 'Save' && $(this).val() != 'Cancel' && $(this).val() != 'Delete' && $(this).val() != 'Edit' ){
                               $(this).parent().html($(this).val());  
                        
                             
                         i+=1 ;
                        }
                    });
                         
                       });
                     }
    else if(x == 14 ) {
                       $.get("/school/public/saveMassign", {id : id , mark1 : y[0] , name1 : y[1] , mark2 : y[2] , name2 : y[3] , mark3 : y[4] , name3 : y[5] , mark4 : y[6] , name4 : y[7]  , mark5 : y[8] , name5 : y[9]},
                            
                   function(response){
                            
                             alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                         
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                        if($(this).val() != 'Save' && $(this).val() != 'Cancel' && $(this).val() != 'Delete' && $(this).val() != 'Edit' ){
                               $(this).parent().html($(this).val());  
                        
                             
                         i+=1 ;
                        }
                    });
                       });
                     }
    else if(x == 16 ) {
                       $.get("/school/public/saveMassign", {id : id , mark1 : y[0] , name1 : y[1] , mark2 : y[2] , name2 : y[3] , mark3 : y[4] , name3 : y[5] , mark4 : y[6] , name4 : y[7]  , mark5 : y[9] , name5 : y[9]  , mark6 : y[10] , name6 : y[11]},
                            
                   function(response){
                            
                         alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                         
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                        if($(this).val() != 'Save' && $(this).val() != 'Cancel' && $(this).val() != 'Delete' && $(this).val() != 'Edit' ){
                               $(this).parent().html($(this).val());  
                        
                             
                         i+=1 ;
                        }
                    });
                         
                       });
                     }
    
	
}
				else if(table=="student_table"){
	 var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveStudent", {id : id , first : y[1] , second : y[2] , last : y[3] , mobile : y[4] },

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i<=4){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
	
}
							else if(table=="question_table"){
	 var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveQuestion", {id : id , title : y[1] , first : y[2] , second : y[3] , third : y[4] , last : y[5] , true_q : y[6] , mark : y[7] },

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i<=7){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
	
}
				else if(table=="social_table"){
	 var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       
                       $.get("/school/public/saveSocial",{id : id , name : y[0]},

                   function(response){
                            
                            alert("the data was correctly saved");
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i==0){
                               $(this).parent().html($(this).val());  
                        
                             }
                        
                         i+=1 ;
                         
                    });
                         
                       });
	
}	
				else if(table=="attend_table"){
	  var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       console.log(y);
                       $.get("/school/public/saveAttendance", {id : id  , dat : y[0] ,note : y[1] ,traid: y[2],leave: y[3]},

                   function(response){
                       
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i<=3){
								 
                               $(this).parent().html($(this).val());  
                        
							 }
                        
                         i+=1 ;
                         
                    });
                         
                       });
	
	
}
				else if(table=="attendan_table"){
	  var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       console.log(y);
                       $.get("/school/public/saveattendance", {id : id  , dat : y[0] ,note : y[1] ,traid: y[2]},

                   function(response){
                       
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i<=2){
								 
                               $(this).parent().html($(this).val());  
                        
							 }
                        
                         i+=1 ;
                         
                    });
                         
                       });
															  }
			else if(table=="leave"){
	  var y=[] ;
                         $("#save_"+id).parent().parent().children().children().each(function(val){

                           y[val] = $(this).val()  ;  
                            
                          
                         });
                       console.log(y);
                       $.get("/school/public/saveleave", {id : id  , dat : y[0] ,reason : y[1] ,depart: y[2] , back:y[3]},

                   function(response){
                       
                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();
                            var i = 0 ;
                            var val = [] ;
                        $("#save_"+id).parent().parent().children().children().each(function(va){
                         
                             if(i<=3){
								 
                               $(this).parent().html($(this).val());  
                        
							 }
                        
                         i+=1 ;
                         
                    });
                         
                       });
															  }
			}

               
function cancel_row(id , table){
   if(table=="contact_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelClass", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.name); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
     if(table=="be_option_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelBehaviour_option", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.name); 
                             }
                             if(i==1){
                                $(this).parent().html(obj.message); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
     if(table=="behaviour_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelBehaviour_type", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.name); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
     if(table=="observation_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelObservation_type", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.name); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
     else if(table=="bus_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelBus", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.value); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
       else if(table=="grade2_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelControlGrade", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.value); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
    else if(table=="week_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelWeek", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.value); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
    else if(table=="term_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelTerm", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.value); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
    else if(table=="year_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelYear", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.value); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
    else if(table=="de_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelDepartment", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.value); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
        else if(table=="subject2_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/ControlcancelSubject", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.value); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
        else if(table=="position_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelPosition", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.value); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
        else if(table=="location_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelLocation", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.value); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
        else if(table=="assi_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelAssigment", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                         if(i==0){
                                $(this).parent().html(obj.value); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
       else if(table=="subject_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelSubject", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                             if(i==0){
                                $(this).parent().html(obj.name); 
                             }
                    
                            
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
        else if(table=="attend_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelattend", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                              
							 if(i==0){
                                $(this).parent().html(obj.Date); 
                             }
							 if(i==1){
                                $(this).parent().html(obj.Note); 
                             }
							 if(i==3){
                                $(this).parent().html(obj.Tardiness); 
                             }
                            if(i==2){
                                $(this).parent().html(obj.Leave); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
    else if(table=="massi_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelMassign", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
                         if(i<=12){
                           if($(this).val() != 'Save' && $(this).val() != 'Cancel' && $(this).val() != 'Delete' && $(this).val() != 'Edit' ){ 
                             if(i==0){
                                $(this).parent().html(obj.mark1); 
                             }
							 if(i==1){
                                $(this).parent().html(obj.name1); 
                             }  
                              if(i==2){
                                $(this).parent().html(obj.mark2); 
                             }
							 if(i==3){
                                $(this).parent().html(obj.name2); 
                             } 
                              if(i==4){
                                $(this).parent().html(obj.mark3); 
                             }
							 if(i==5){
                                $(this).parent().html(obj.name3); 
                             } 
                              if(i==6){
                                $(this).parent().html(obj.mark4); 
                             }
							 if(i==7){
                                $(this).parent().html(obj.name4); 
                             } 
						 if(i==8){
                                $(this).parent().html(obj.mark5); 
                             }
							 if(i==9){
                                $(this).parent().html(obj.name5); 
                             } 
                              if(i==10){
                                $(this).parent().html(obj.mark6); 
                             }
							 if(i==11){
                                $(this).parent().html(obj.name6); 
                             } 
                       i+=1 ;
                         }}
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
  else if(table=="attendan_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelAttend", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                              
							 if(i==0){
                                $(this).parent().html(obj.Date); 
                             }
							 if(i==1){
                                $(this).parent().html(obj.Note); 
                             }
							 if(i==2){
                                $(this).parent().html(obj.Tardiness); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
	
         else if(table=="student_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelStudent", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                              if(i==0){
                                $(this).parent().html(obj.id); 
                             }
                    if(i==1){
                                $(this).parent().html(obj.First); 
                             }
							 if(i==2){
                                $(this).parent().html(obj.Middle); 
                             }
							 if(i==3){
                                $(this).parent().html(obj.Last); 
                             }
							 if(i==4){
                                $(this).parent().html(obj.mobile); 
                             }
                            
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
		
         else if(table=="question_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelQuestion", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=8){
                            
                              if(i==0){
                                $(this).parent().html(obj.id); 
                             }
                    if(i==1){
                                $(this).parent().html(obj.title); 
                             }
							 if(i==2){
                                $(this).parent().html(obj.firsr_choice); 
                             }
							 if(i==3){
                                $(this).parent().html(obj.seond_choice); 
                             }
							 if(i==4){
                                $(this).parent().html(obj.third_choice); 
                             }
                            if(i==5){
                                $(this).parent().html(obj.last_choice); 
                             }
							 if(i==6){
                                $(this).parent().html(obj.true_choice); 
                             }
							 if(i==7){
                                $(this).parent().html(obj.mark); 
                             }
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
		
         else if(table=="social_table"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelSocial", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=5){
                            
                           
                    if(i==0){
                                $(this).parent().html(obj.Title); 
                             }
						
                            
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
	
        else if(table=="leave"){
    var obj = "" ;
     var i = 0 ;
    $.get("/school/public/cancelLeave", {id : id }, 

    function(data){
		
        obj = JSON.parse(data);
        console.log(obj);
          $("#cancel_"+id).parent().parent().children().children().each(function(){
               
                         if(i<=3){
                            
                              if(i==0){
                                $(this).parent().html(obj.Date); 
                             }
                    if(i==1){
                                $(this).parent().html(obj.Reason); 
                             }
							 if(i==2){
                                $(this).parent().html(obj.Depart); 
                             }
							 if(i==3){
                                $(this).parent().html(obj.Back); 
                             }
							
							
                            
                       i+=1 ;
                         }
           
                    });

                            $("#save_"+id).hide();
                            $("#edit_"+id).show();
                            $("#delete_"+id).show();
                            $("#cancel_"+id).hide();                     
              });
              
  
	}
		
}
function delete_row(id , table ){
    
    $('#confirm').modal();
	$('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData('+id+' , '+table+');">Delete</a>');


}     
function deleteData(id , table){
                    var element = $('#delete_'+id);
                   
                   
                    var info = 'id=' + id;
                   if(table == 1){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/deleteClass",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }
	    else if(table == 20){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/deleteBus",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }
     else if(table == 21){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/deleteControlGrade",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }
     else if(table == 22){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/deleteWeek",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }
     else if(table == 23){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/deleteYear",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }
     else if(table == 24){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/deleteTerm",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }
     else if(table == 25){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/deleteDepartment",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }
    else if(table == 30){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/ControldeleteSubject",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }
    else if(table == 31){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/deleteLocation",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }
    else if(table == 32){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/deletePosition",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }

    else if(table == 34){
                        $.ajax({
                            type: "GET",
                            url: "/school/public/deleteAssigment",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
				   }
	else if(table == 2){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteQuestion",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
	else if(table == 3){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteStudent",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
	else if(table == 4){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteAttend",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
		else if(table == 5){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteSocial",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
	else if(table == 6){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteattend",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
	else if(table == 7){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteleave",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
	else if(table == 15){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/Deletestudent",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
    	else if(table == 60){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteMassign",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
    else if(table == 160){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteBehaviour_type",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
    else if(table == 161){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteObservation_type",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
    else if(table == 162){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteBehaviour_option",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
	else if(table == 16){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/Deleteparent",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
	else if(table == 17){
		   $.ajax({
                            type: "GET",
                            url: "/school/public/Deleteemployee",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
	
	else{
				   $.ajax({
                            type: "GET",
                            url: "/school/public/deleteSubject",
                            data: info,
                            
                            success: function(){
                                
                         element.parent().parent().hide();
                                
                            }
                        });
		
	}
                   
  $("#successMessage").html("Record With id "+id+" Deleted successfully!");
  $('#confirm').modal('hide'); // now close modal
}  

