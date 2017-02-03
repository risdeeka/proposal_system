
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	.error{
		color:#a94442;
	}
	
	</style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Signup</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			<?php if($this->session->flashdata('alert_success')){ ?>
                    <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('alert_success'); ?>
										
										</div>
				<?php }elseif(validation_errors()){?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo validation_errors(); ?>
										</div>
				
				<?php } elseif(isset($error)){ ?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $error; ?>
										</div>
				<?php } ?>
                <form role="form" id="signup_form" method="post" action="<?php echo site_url('sessions/signup'); ?>">
                                       
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" placeholder="First Name" name="first_name" id="first_name">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" placeholder="Last Name" name="last_name" id="last_name">
                                        </div>
										<div class="form-group">
                                            <label>Email Address</label>
                                            <input class="form-control" placeholder="Email Address" name="email" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirmation Password</label>
                                            <input type="password" class="form-control" placeholder="Confirmation Password" name="passwordc" id="passwordc">
                                        </div>
                                        
                                        <div class="form-group">
										<label class="checkbox-inline">
                                                <input type="checkbox" id="agree" name="agree">I agree with <a href="#" >terms and conditions</a>
												<br id ="tc" />
                                            </label>
                                            
                                            
                                           
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                               
                                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
	
	<script>
	$(document).ready(function(){
		
jQuery.validator.addMethod("custom_email",  function(value, element) {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    }, "Please add valid email address");
		$('#signup_form').validate(
		{
		
		rules:{
		first_name:{required:true},	
		last_name:{required:true},
		email:{
		required:true,
		custom_email:true,
		remote :  {
        url :  "<?php echo site_url('sessions/check_email'); ?>",
        type :  "post",
        data :  {
          email :  function() {
            return $( "#email" ).val();
          }
        }
      
	  
	  }
	  
	  },
		password:{required:true,minlength:10,maxlength:25},
		passwordc:{required : true,equalTo:"#password"},
		agree:{required:true}
			
		}
		
		,
		
        errorPlacement: function(error, element) {
		
    
	if(element.attr('id') == 'agree'){
		
		error.insertAfter($('#tc'));
	}
	else error.insertAfter(element);
  }		
		,
        success: function(label,element) {
                label.hide();
				
            },		
		
		
		
		highlight: function(element, errorClass, validClass) {
    $(element).parent( ".form-group" ).addClass('has-error').removeClass('has-success');
    
  },
  unhighlight: function(element, errorClass, validClass) {
   $(element).parent( ".form-group" ).addClass('has-success').removeClass('has-error');
  }
  ,
		
	messages : {
                email :  {
                    remote :  "Email already taken"
                }
            }
	
		
		
		});
		
	});
	</script>

</body>

</html>
