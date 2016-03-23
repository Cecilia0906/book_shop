
       
$( document ).ready(function() {

      //  $('#datepicker1').pickmeup();
      
      $.fn.populateSelect = function(values){
          var options = '';
          
          $.each(values, function(key,row){
              
              options += '<option value="'+ row.value +'" >' + row.text + '</option>';
              
          });
          
          $(this).html(options);
      }
      
      $('#pais_id').change(function(){
          $('#provincia_id').empty();
          var id = $(this).val();
          
          if(id == ''){
              
              $('#provincia_id').empty();
              $('#ciudad_id').empty();
   
          } else {
             
              $.getJSON('/provinces/'+ id,null,function(values){
                  $('#provincia_id').populateSelect(values);
                  
              });
              
          }
     
      });
      
      
      $('#provincia_id').change(function(){
          var id = $(this).val();
          if(id == ''){
              
              $('#ciudad_id').empty();              
 
          } else {
              $.getJSON('/cities/'+ id,null,function(values){
                  $('#ciudad_id').populateSelect(values);
                  
              });
              
          }
   
      });
      
      
      
      
      
    



});


