(function( $ ) {
	
	'use strict';
	var decodeEntities = (function() {
	var element = document.createElement('div');

	function decodeHTMLEntities (str) {
	    if(str && typeof str === 'string') {
	      str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
	      str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
	      element.innerHTML = str;
	      str = element.textContent;
	      element.textContent = '';
	    }

	    return str;	
	}

	  return decodeHTMLEntities;
	})();
	
	//AUTO COMPLETE customer
	$(function() {
		$("#customer").autocomplete({
			source: "../ajax.php?ac=customer&",
			minLength: 2, 
			focus: function( event, ui ) {
	           $( "#customer" ).val( decodeEntities( ui.item.nama ));
	              return false;
	           },
	    select: function( event, ui ) {
	       $( "#customer" ).val( decodeEntities( ui.item.nama ));
	       $( "#customer_id" ).val( decodeEntities( ui.item.CID ));
	       $( "#corp" ).val( decodeEntities( ui.item.corp ));
	       $( "#alamat" ).val( decodeEntities( ui.item.alamat ));
	       return false;
	    } 
	  }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li class='btn-link'>" )
			.append( "<a><span class='text-tertiary'>" + item.nama + "</span> <span class='text-muted'>" +item.corp +"</span></a>" )
			.appendTo( ul );
		};
	});

	//AUTO COMPLETE corp
	$(function() {
		$("#corp").autocomplete({
			source: "../ajax.php?ac=customer&",
			minLength: 2, 
			focus: function( event, ui ) {
	           $( "#corp" ).val( decodeEntities( ui.item.corp ));
	              return false;
	           },
	    select: function( event, ui ) {
	       $( "#customer" ).val( decodeEntities( ui.item.nama ));
	       $( "#customer_id" ).val( decodeEntities( ui.item.CID ));
	       $( "#corp" ).val( decodeEntities( ui.item.corp ));
	       $( "#alamat" ).val( decodeEntities( ui.item.alamat ));
	       return false;
	    } 
	  }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li class='btn-link'>" )
			.append( "<a><span class='text-tertiary'>" + item.corp +"</span></a>" )
			.appendTo( ul );
		};
	});

	//AUTO COMPLETE Jenis Kain
	$(document.body).on('focus', '#jeniskain' ,function() { 
		$(this).autocomplete({
		    source: "../ajax.php?ac=kain&",
		    minLength: 1, 
		    focus: function( event, ui ) {
		    	$( this ).val( decodeEntities( ui.item.kain ));
		    	return false;
		    },
		    select: function( event, ui ) {
		    	$( this ).val( decodeEntities( ui.item.kain ));
		    	return false;
		    }
		}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		    return $( "<li class='btn-link'>" )
		    .append( "<a>" + item.kain + "</a>" )
		    .appendTo( ul );
		};
		
	});

	//CLONE DIV
	$('#DynamicSection').each(function() {
      var $wr = $('#DynamicInput', this);
      $("#TombolDynamic", $(this)).click(function(e) {
          	$('.form-group:first-child', $wr)
	        .clone()
	        .find("input:text").val("").end()
	        .appendTo($wr);
      	});
  	});

  	//FORMAT_DUIT
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

  	$(document.body).on('focus', '.format_duit' ,function() { 
		$(this).keyup(function(e){
			$(this).val(format_duit($(this).val()));
		});
	});

	// FORMAT_ANGKA
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

	$(document.body).on('focus', '.format_angka' ,function() { 
		$(this).keyup(function(e){
			$(this).val(format_angka($(this).val()));
			//untuk menghitung sum
			//calculateSum();
		});
	});

    /*
    //UNTUK MENGHITUNG SUM
    function calculateSum() {
	    var sum=0;
	        $(".format_angka#roll").each(function() {
	        if(!isNaN(this.value) && this.value.length!=0) {
	            sum+=parseFloat(this.value);
	        }
	    });
	    $("#total").html(sum.toFixed(0));
	}
	*/

	$(".ellipsis").text(function(index, currentText) {
		if(currentText.length > 50)	{
		  currentText = currentText.substr(0,50) + "...";
		}
		return currentText;
	});


}).apply( this, [ jQuery ]);

(function( $ ) {

	'use strict';

	$("#confirmed").click(function(event){
				
		event.preventDefault();
		
		//var values = $(this).serialize();
		var sbg_id = $(this).parent().data('id');
		
		$.ajax({
			url: "../ajax.php?ac=sbg_confirm&",
			type: "POST",			
			data: {"sbg_id": sbg_id},
			success: function(response){
				var notice = new PNotify({
					title: 'Notification',
					text: 'Process Pembelian Grey.',
					icon: 'fa fa-spin fa-spinner'
				});

				$("#confirm-div").html(response);
			}
		 });
	});


}).apply( this, [ jQuery ]);

(function( $ ) {

	'use strict';

	$("#canceled").click(function(event){
				
		event.preventDefault();
		
		//var values = $(this).serialize();
		var sbg_id = $(this).parent().data('id');
		
		$.ajax({
			url: "../ajax.php?ac=sbg_cancel&",
			type: "POST",			
			data: {"sbg_id": sbg_id},
			success: function(response){
				var notice = new PNotify({
					title: 'Notification',
					text: 'Pembelian Grey Canceled.',
					icon: 'fa fa-spin fa-spinner'
				});

				$("#confirm-div").html(response);
			}
		 });
	});


}).apply( this, [ jQuery ]);