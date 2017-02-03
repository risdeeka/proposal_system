</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/morrisjs/morris.min.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>
	 <script src="<?php echo base_url(); ?>assets/vendor/select2/js/select2.js"></script>
	 <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
	
	  <script type="text/javascript">
$(document).ready(function() {
  $("#contacts").select2();
  $(".delete_from_group").click(function(){
	var text = "Are you sure.Do you want to remove  from this group?";
	return confirm(text);  
	  
  });
   $(".delete").click(function(){
	var text = "Are you sure.Do you want to delete this contact?";
	return confirm(text);  
	  
  });

  
  jQuery.validator.addMethod("custom_email",  function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, "Please add valid email address");
		$('#form-my-profile').validate(
		{
		
		rules:{
		first_name:{required:true},	
		last_name:{required:true},
		new_password:{minlength:10,maxlength:25},
		new_passwordv:{equalTo:"#new_password"}
			
		},		
        success: function(label,element) { label.hide(); },		
		
		highlight: function(element, errorClass, validClass) {
    $(element).parent( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).parent( ".form-group" ).addClass('has-success').removeClass('has-error');
  },
   submitHandler: function(form) {
    // do other things for a valid form
    form.submit();
	return false;
  }
  
	
		
		
		});
		$('#form-contact-group').validate({
		success: function(label,element) {label.hide();  },			
		
		highlight: function(element, errorClass, validClass) {
    $(element).parent( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).parent( ".form-group" ).addClass('has-success').removeClass('has-error');
  },
   submitHandler: function(form) {
    // do other things for a valid form
    form.submit();
	return false;
  }	
			
		});
        
		$("#form-contact-group").submit(function(e){
e.preventDefault();
    
    return false;
});
		
		
		$('#form-contact').validate(
		{
		
		rules:{
		first_name:{required:true},	
		last_name:{required:true},
		email:{required:true,custom_email:true},
		phone:{required:true},
		company:{required:true}
		},		
        success: function(label,element) { label.hide(); },		
		
		highlight: function(element, errorClass, validClass) {
    $(element).parent( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).parent( ".form-group" ).addClass('has-success').removeClass('has-error');
  },
   submitHandler: function(form) {
    // do other things for a valid form
    form.submit();
	return false;
  }
  
	
		
		
		});
		
  $("#form-contact").submit(function(e){
e.preventDefault();
    
    return false;
});
		$('#form-existing').validate({
		success: function(label,element) {label.hide();  },			
		
		highlight: function(element, errorClass, validClass) {
    $(element).parent( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).parent( ".form-group" ).addClass('has-success').removeClass('has-error');
  }	,
   submitHandler: function(form) {
    // do other things for a valid form
    form.submit();
	return false;
  }
			
		});
$("#form-existing").submit(function(e){
e.preventDefault();
    
    return false;
});
		});
</script>

</body>

</html>