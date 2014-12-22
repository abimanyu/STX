(function( $ ) {

  'use strict';

  $('#DynamicSection').each(function() {
      var $wr = $('#DynamicInput', this);
      $("#TombolDynamic", $(this)).click(function(e) {
          $('.form-group', $wr).clone(true).appendTo($wr).find('input').val( i++ );
      });
  });
}).apply( this, [ jQuery ]);

$(function() {
	$("#customer").autocomplete({
		source: "ajax.php?ac=customer&",
		minLength: 1, 
		focus: function( event, ui ) {
           $( "#customer" ).val( ui.item.nama );
              return false;
           },
    select: function( event, ui ) {
       $( "#customer" ).val( ui.item.nama );
       $( "#idx" ).val( ui.item.CID );
       $( "#corp" ).val( ui.item.corp );
       $( "#alamat" ).val( ui.item.alamat );
       return false;
    } 
  }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		return $( "<li class='btn-link'>" )
		.append( "<a>" + item.nama + " - " +item.corp +"</a>" )
		.appendTo( ul );
	};
});

$(document).ready(function() { 
  $("#roll1").autocomplete({
    source: "ajax.php?ac=customer&",
    minLength: 1, 
    focus: function( event, ui ) {
           $( "#roll1" ).val( ui.item.nama );
              return false;
           },
        select: function( event, ui ) {
           $( "#roll1" ).val( ui.item.nama );
           return false;
        } 
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
    return $( "<li class='btn-link'>" )
    .append( "<a>" + item.nama + " - " +item.corp +"</a>" )
    .appendTo( ul );
  };
});

(function( $ ) {

  'use strict';

  var format_duit = function(num){
    var str = num.toString().replace("Rp. ", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(",") > 0) {
      parts = str.split(",");
      str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
      if(str[j] != ".") {
        output.push(str[j]);
        if(i%3 == 0 && j < (len - 1)) {
          output.push(".");
        }
        i++;
      }
    }
    formatted = output.reverse().join("");
    return("Rp. " + formatted + ((parts) ? "," + parts[1].substr(0, 2) : ""));
  };

  $(function(){
    $("#harga").keyup(function(e){
        $(this).val(format_duit($(this).val()));
    });
  });

  var format_angka = function(num){
    var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(",") > 0) {
      parts = str.split(",");
      str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
      if(str[j] != ".") {
        output.push(str[j]);
        if(i%3 == 0 && j < (len - 1)) {
          output.push(".");
        }
        i++;
      }
    }
    formatted = output.reverse().join("");
    return(formatted + ((parts) ? "," + parts[1].substr(0, 10) : ""));
  };

  $(function(){
    $("#format_angka").keyup(function(e){
        $(this).val(format_angka($(this).val()));
    });
  });
  

}).apply( this, [ jQuery ]);
