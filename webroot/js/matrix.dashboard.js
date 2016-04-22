$(document).ready(function(){

	maruti.peity();

	// === BOUCLE MOIS ===/
    var fact = [];
    for (var i = 1; i < 13; i += 1) {
			$.ajax({
		       url : '../ajax/retourca.php',
					 async: false,
					 type : 'POST',
		       data : 'id_users=' + users_id + '&jours=' + i, // On fait passer nos variables, exactement comme en GET, au script more_com.php
		       dataType : 'text',
					 success: function(data) {
                                    returnedvalue = data;
                                   }
		        });

						fact.push([i,returnedvalue]);

                              }



	// === Make chart === //
    var plot = $.plot($(".chart"),
           [ { data: fact, label: "CA facturé", color: "#ee7951"} ], {
               series: {
                   lines: { show: false },
                   points: { show: false }
               },
               grid: {
								 hoverable: true,
								 clickable: false,
								 show:true
							       },
               yaxis: {
								 min: 0,
								 max: 1000
							        },
							 bars: {
                     show: true,
										 align:'center',
                     lineWidth: 0,
                     fill: true,
										 barWidth: 0.5,
                     fillColor: { colors: [ { opacity: 0.8 }, { opacity: 0.1 } ] }
                     }
		   });

	// === Point hover in chart === //
    var previousPoint = null;
    $(".chart").bind("plothover", function (event, pos, item) {

        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;

                $('#tooltip').fadeOut(200,function(){
					$(this).remove();
				});
                var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);

if (x == 1.00) {x = "janvier"}
if (x == 2.00) {x = "février"}
if (x == 3.00) {x = "mars"}
if (x == 4.00) {x = "avril"}
if (x == 5.00) {x = "mai"}
if (x == 6.00) {x = "juin"}
if (x == 7.00) {x = "juillet"}
if (x == 8.00) {x = "aout"}
if (x == 9.00) {x = "septembre"}
if (x == 10.00) {x = "octobre"}
if (x == 11.00) {x = "novembre"}
if (x == 12.00) {x = "décembre"}

                maruti.flot_tooltip(item.pageX, item.pageY,item.series.label + " du mois de " + x + " = " + y + "€");
            }

        } else {
			$('#tooltip').fadeOut(200,function(){
					$(this).remove();
				});
            previousPoint = null;
        }
    });


});


maruti = {
		// === Peity charts === //
		peity: function(){
			$.fn.peity.defaults.line = {
				strokeWidth: 1,
				delimeter: ",",
				height: 25,
				max: null,
				min: 0,
				width: 50
			};
			$.fn.peity.defaults.bar = {
				delimeter: ",",
				height: 25,
				max: null,
				min: 0,
				width: 50
			};
			$(".peity_line_good span").peity("line", {
				colour: "#57a532",
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
				colour: "#4fb9f0"
			});
		},

		// === Tooltip for flot charts === //
		flot_tooltip: function(x, y, contents) {

			$('<div id="tooltip">' + contents + '</div>').css( {
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
}
