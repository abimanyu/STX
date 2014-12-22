/*
Name: 			Forms / Advanced - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	1.3.0
*/

(function( $ ) {

	'use strict';

	$("#form_submit").submit(function(event){
				
		event.preventDefault();
		
		var values = $(this).serialize();
		var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
		
		$.ajax({
			url: "ajax.php?p=add",
			type: "POST",
			data: values,
			success: function(response){
				var notice = new PNotify({
					title: 'Notification',
					text: 'Penambahan data berhasil di lakukan.',
					type: 'success',
					addclass: 'stack-bar-bottom',
					stack: stack_bar_bottom,
					width: "60%"
				});

				$("#isi_table").html(response);

				$("#form_submit")[0].reset();
			}
		 });
	});


}).apply( this, [ jQuery ]);

(function( $ ) {

	'use strict';

	var datatableInit = function() {
		var $table = $('#datatable-tabletools');

		$table.dataTable({
			sDom: "<'text-right mb-md'T>" + $.fn.dataTable.defaults.sDom,
			oTableTools: {
				sSwfPath: $table.data('swf-path'),
				aButtons: [
					{
						sExtends: 'pdf',
						sButtonText: 'PDF'
					},
					{
						sExtends: 'csv',
						sButtonText: 'CSV'
					},
					{
						sExtends: 'xls',
						sButtonText: 'Excel'
					},
					{
						sExtends: 'print',
						sButtonText: 'Print',
						sInfo: 'Tekan CTR+P untuk print dan ESC untuk keluar'
					}
				]
			}
		});

	};

	$(function() {
		datatableInit();
	});

}).apply( this, [ jQuery ]);

(function($) {


	/*
	Multi Select: Toggle All Button
	*/
	function multiselect_selected($el) {
		var ret = true;
		$('option', $el).each(function(element) {
			if (!!!$(this).prop('selected')) {
				ret = false;
			}
		});
		return ret;
	}

	function multiselect_selectAll($el) {
		$('option', $el).each(function(element) {
			$el.multiselect('select', $(this).val());
		});
	}

	function multiselect_deselectAll($el) {
		$('option', $el).each(function(element) {
			$el.multiselect('deselect', $(this).val());
		});
	}

	function multiselect_toggle($el, $btn) {
		if (multiselect_selected($el)) {
			multiselect_deselectAll($el);
			$btn.text("Select All");
		}
		else {
			multiselect_selectAll($el);
			$btn.text("Deselect All");
		}
	}

	$("#c_type-toggle").click(function(e) {
		e.preventDefault();
		multiselect_toggle($("#c_type"), $(this));
	});

}(jQuery));
