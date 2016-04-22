$("input[name='tva_ass']:checked").each(
    function() {
    $(".tva_ass").toggle("slow");
    }
);

$( "input[name='tva_ass']" ).change(function() {
$(".tva_ass").toggle("slow");
});



   $(function() {
       $('#prestation-id').searchableOptionList({
           maxHeight: '250px'
       });
   });


   jQuery('#la1,#la2,#lm1,#lm2').datetimepicker({
      datepicker:false,
     format:'H:i',
     step : 15
   });



      jQuery(document).ready(function(){


        // === jQuery Peity === //
      	$.fn.peity.defaults.line = {
      		strokeWidth: 1,
      		delimeter: ",",
      		height: 24,
      		max: null,
      		min: 0,
      		width: 50
      	};
      	$.fn.peity.defaults.bar = {
      		delimeter: ",",
      		height: 24,
      		max: null,
      		min: 0,
      		width: 50
      	};
      	$(".peity_line_good span").peity("line", {
      		colour: "#B1FFA9",
      		strokeColour: "#459D1C"
      	});
      	$(".peity_line_bad span").peity("line", {
      		colour: "#FFC4C7",
      		strokeColour: "#BA1E20"
      	});
      	$(".peity_line_neutral span").peity("line", {
      		colour: "#CCCCCC",
      		strokeColour: "#757575"
      	});
      	$(".peity_bar_good span").peity("bar", {
      		colour: "#459D1C"
      	});
      	$(".peity_bar_bad span").peity("bar", {
      		colour: "#BA1E20"
      	});
      	$(".peity_bar_neutral span").peity("bar", {
      		colour: "#757575"
      	});

        $.ajax({
             url : '/clickandwash/webroot/ajax/test_click.php',
             async: false,
             type : 'POST',
             dataType : 'text',
             data : 'id_users=' + $( "select[name='society_id']").val()  ,
             success: function(data) {
                                      returnedvalue = data;
                                      if(returnedvalue == 1)
                                      {
                                      $( "input[name='click']").val(1)  ;
                                      }
                                      else
                                      {
                                       $( "input[name='click']").val(0)  ;
                                      }
                                     }
              });

$( "select[name='society_id']").change(function() {
        $.ajax({
             url : '/clickandwash/webroot/ajax/test_click.php',
             async: false,
             type : 'POST',
             dataType : 'text',
             data : 'id_users=' + $( "select[name='society_id']").val()  ,
             success: function(data) {
                                      returnedvalue = data;
                                      if(returnedvalue == 1)
                                      {
                                      $( "input[name='click']").val(1) ;
                                      }
                                      else
                                      {
                                       $( "input[name='click']").val(0)  ;
                                      }
                                     }
              });


  });





function popupErreurHeure ()
{
  var imgsrc = $(this).attr('data-image');
  $.gritter.add({
    title:	'Attention une erreur s\'est produite',
    text:	'Il y a une incohérence dans vos horaires ',
    image: imgsrc,
    sticky: false
  });
}


        /*LUNDI*/

        $( "input[name='lm1']").change(function() {
        if ($( "input[name='lm2']").val() < $(this).val()  && $( "input[name='lm2']").val() != "" && $(this) != "" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='lm2']").change(function() {
        if ($( "input[name='lm1']").val() > $(this).val()  && $( "input[name='lm1']").val() != ""  && $(this) != "" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }

        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='lm2']").change(function() {
        if ($( "input[name='la1']").val() < $(this).val()  && $( "input[name='la1']").val() != ""  && $(this) != "" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }

        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='la1']").change(function() {
        if ($( "input[name='lm2']").val() > $(this).val()   && $( "input[name='lm2']").val() != "" )
        {
           popupErreurHeure ();
           $(this).css('border','red 1px solid');
           $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='la1']").change(function() {
        if ($( "input[name='la2']").val() < $(this).val()   && $( "input[name='la2']").val() != ""  )
        {
          popupErreurHeure (); $(this).css('border','red 1px solid');
           $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='la2']").change(function() {
        if ($( "input[name='la1']").val() > $(this).val()  && $( "input[name='la1']").val() != ""  && $(this) != "" )
        {
          popupErreurHeure (); $(this).css('border','red 1px solid');
           $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });



        /*MARDI*/

        $( "input[name='mm1']").change(function() {
        if ($( "input[name='mm2']").val() < $(this).val()  && $( "input[name='mm2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='mm2']").change(function() {
        if ($( "input[name='mm1']").val() > $(this).val() && $( "input[name='mm1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='mm2']").change(function() {
        if ($( "input[name='ma1']").val() < $(this).val() && $( "input[name='ma1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='ma1']").change(function() {
        if ($( "input[name='ma2']").val() < $(this).val() && $( "input[name='ma2']").val() != ""  && $(this) !=""  )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='ma1']").change(function() {
        if ($( "input[name='mm2']").val() > $(this).val() && $( "input[name='mm2']").val() != ""  && $(this) !=""  )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='ma2']").change(function() {
        if ($( "input[name='ma1']").val() > $(this).val() && $( "input[name='ma1']").val() != ""  && $(this) !=""  )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        /*MERCREDI*/

        $( "input[name='mem1']").change(function() {
        if ($( "input[name='mem2']").val() < $(this).val() && $( "input[name='lm2']").val() != ""  && $(this) !=""  )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='mem2']").change(function() {
        if ($( "input[name='mem1']").val() > $(this).val() && $( "input[name='lm2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='mem2']").change(function() {
        if ($( "input[name='mea1']").val() > $(this).val() && $( "input[name='mea1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='mea1']").change(function() {
        if ($( "input[name='mea2']").val() < $(this).val() && $( "input[name='mea2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='mea1']").change(function() {
        if ($( "input[name='mem2']").val() > $(this).val() && $( "input[name='mem2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='mea2']").change(function() {
        if ($( "input[name='mea1']").val() > $(this).val() && $( "input[name='mea1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        /*JEUDI*/

        $( "input[name='jm1']").change(function() {
        if ($( "input[name='jm2']").val() < $(this).val() && $( "input[name='jm2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='jm2']").change(function() {
        if ($( "input[name='jm1']").val() > $(this).val() && $( "input[name='jm1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='jm2']").change(function() {
        if ($( "input[name='ja1']").val() < $(this).val() && $( "input[name='ja1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='ja1']").change(function() {
        if ($( "input[name='ja2']").val() < $(this).val() && $( "input[name='ja2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='ja1']").change(function() {
        if ($( "input[name='jm2']").val() > $(this).val() && $( "input[name='jm2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='ja2']").change(function() {
        if ($( "input[name='ja1']").val() > $(this).val() && $( "input[name='ja1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        /*VENDREDI*/

        $( "input[name='vm1']").change(function() {
        if ($( "input[name='vm2']").val() < $(this).val() && $( "input[name='vm2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='vm2']").change(function() {
        if ($( "input[name='vm1']").val() > $(this).val() && $( "input[name='vm1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='vm2']").change(function() {
        if ($( "input[name='va1']").val() < $(this).val() && $( "input[name='va1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='va1']").change(function() {
        if ($( "input[name='va2']").val() < $(this).val() && $( "input[name='va2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='va1']").change(function() {
        if ($( "input[name='vm2']").val() > $(this).val() && $( "input[name='vm2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='va2']").change(function() {
        if ($( "input[name='va1']").val() > $(this).val() && $( "input[name='va1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        /*SAMEDI*/

        $( "input[name='sm1']").change(function() {
        if ($( "input[name='sm2']").val() < $(this).val() && $( "input[name='sm2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='sm2']").change(function() {
        if ($( "input[name='sm1']").val() > $(this).val() && $( "input[name='sm1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='sm2']").change(function() {
        if ($( "input[name='sa1']").val() < $(this).val() && $( "input[name='sa1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='sa1']").change(function() {
        if ($( "input[name='sa2']").val() < $(this).val() && $( "input[name='sa2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='sa1']").change(function() {
        if ($( "input[name='sm2']").val() > $(this).val() && $( "input[name='sm2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='sa2']").change(function() {
        if ($( "input[name='sa1']").val() > $(this).val() && $( "input[name='sa1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        /*DIMANCE*/

        $( "input[name='dm1']").change(function() {
        if ($( "input[name='dm2']").val() < $(this).val() && $( "input[name='dm2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='dm2']").change(function() {
        if ($( "input[name='dm1']").val() > $(this).val() && $( "input[name='dm1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='dm2']").change(function() {
        if ($( "input[name='da1']").val() < $(this).val() && $( "input[name='da1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='da1']").change(function() {
        if ($( "input[name='da2']").val() < $(this).val() && $( "input[name='da2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

        $( "input[name='da1']").change(function() {
        if ($( "input[name='dm2']").val() > $(this).val() && $( "input[name='dm2']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });


        $( "input[name='da2']").change(function() {
        if ($( "input[name='da1']").val() > $(this).val() && $( "input[name='da1']").val() != ""  && $(this) !="" )
        {
          popupErreurHeure ();
          $(this).css('border','red 1px solid');
          $(this).val('');
        }
        else
        {
          $(this).css('border','1px solid #ccc');
        }
        });

      });
