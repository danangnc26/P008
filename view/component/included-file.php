	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url ?>assets/js/jquery-1.11.3.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap-theme.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.js"></script>
	<!-- BOOTSTRAP -->

	<!-- STYLES -->
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/css/styles.css">
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/plugin/font-awesome/css/font-awesome.min.css">

	<!-- STYLES -->

	<!-- DATATABLES -->
	<!-- BOOTSTRAP -->
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/js/dataTables/dataTables.bootstrap.css">

	<script src="<?php echo base_url ?>assets/js/dataTables/jquery.dataTables.min.js"></script>

	<script src="<?php echo base_url ?>assets/js/dataTables/dataTables.bootstrap.min.js"></script>

	<script src="<?php echo base_url ?>assets/js/dataTables/fnReloadAjax.js"></script>

	<!-- DATATABLES -->

	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/plugin/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
	<script src="<?php echo base_url ?>assets/plugin/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

	<script type="text/javascript">
		function makeid()
		{
			var text = "";
			var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

			for( var i=0; i < 6; i++ )
				text += possible.charAt(Math.floor(Math.random() * possible.length));

			return text;
		}
	</script>

	<link href="<?php echo base_url ?>assets/plugin/signature/jquery.signaturepad.css" rel="stylesheet">
	<script src="<?php echo base_url ?>assets/plugin/signature/numeric-1.2.6.min.js"></script> 
	<script src="<?php echo base_url ?>assets/plugin/signature/bezier.js"></script> 
	<script src="<?php echo base_url ?>assets/plugin/signature/jquery.signaturepad.js"></script> 
	<script>
	    $(document).ready(function() {
	      $('#smoothed-variableStrokeWidth').signaturePad({drawOnly:true, drawBezierCurves:true, variableStrokeWidth:true, lineTop:200});
	    });
	</script> 