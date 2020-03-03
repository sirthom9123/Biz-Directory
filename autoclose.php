<script src="js//jquery-1.11.0.min.js"></script>
<script>
	$(document).ready(function () {
	      $('.alert-autocloseable-success').show();
	    $('.alert-autocloseable-warning').hide();
	    $('.alert-autocloseable-danger').show();
	    $('.alert-autocloseable-info').hide();


	    $('.alert-autocloseable-success').delay(9000).fadeOut( "slow", function() 
	      {
	        // Animation complete.
	        $('#autoclosable-btn-success').prop("disabled", false);
	      });


	      $('.alert-autocloseable-danger').delay(9000).fadeOut( "slow", function() 
	      {
	        // Animation complete.
	        $('#autoclosable-btn-danger').prop("disabled", false);
	      });

	      $('.alert-autocloseable-warning').delay(9000).fadeOut( "slow", function() 
	      {
	        // Animation complete.
	        $('#autoclosable-btn-warning').prop("disabled", false);
	      });

	     $('.alert-autocloseable-info').delay(9000).fadeOut( "slow", function() 
	      {
	        // Animation complete.
	        $('#autoclosable-btn-info').prop("disabled", false);
	      });

	    $(document).on('click', '.close', function () {
	      $(this).parent().hide();
	      });
	});
</script>