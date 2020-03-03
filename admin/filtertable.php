<script type="text/javascript" language="javascript" src="js1/jquery.dataTables.js"></script>
<script type="text/javascript">
		  /**** Specific JS for this page ****/
		  // Datatables
		    $(document).ready(function() {
		    
		      var dontSort = [];
		                $('#datatable_example thead th').each( function () {
		                    if ( $(this).hasClass( 'no_sort' )) {
		                        dontSort.push( { "bSortable": false } );
		                    } else {
		                        dontSort.push( null );
		                    }
		      } );
		      $('#datatable_example').dataTable( {
		        "sDom": "<'row-fluid table_top_bar'<'span12'<'to_hide_phone' f>>>t<'row-fluid control-group full top' <'span4 to_hide_tablet'l><'span8 pagination'p>>",
		         "aaSorting": [[ 1, "asc" ]],
		        "bPaginate": true,

		        "sPaginationType": "full_numbers",
		        "bJQueryUI": false,
		        "aoColumns": dontSort,
		        
		      } );
		      $.extend( $.fn.dataTableExt.oStdClasses, {
		        "s`": "dataTables_wrapper form-inline"
		      } );

		       $(".chzn-select, .dataTables_length select").chosen({
		                   disable_search_threshold: 10

		        });
		    });
</script>