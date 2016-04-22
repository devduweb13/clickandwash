function fetch_select(val) {
   $.ajax({
     type: 'post',
     url: '/clickandwash/modeles/liste',
     data: {
       get_option:val
     },
     success: function (response) {
       document.getElementById("modele_id").innerHTML=response;
     }
   });
 }
