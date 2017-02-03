<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Profile</h1>
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
                <form role="form" method="post" action="<?php echo site_url('my_profile/index');?>" id="form-my-profile">
                                       
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" placeholder="First Name" name="first_name" id="first_name" value="<?php echo $contact->first_name; ?>">
                                        </div>
										
										<div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" placeholder="Last Name" name="last_name" id="last_name" value="<?php echo $contact->last_name; ?>">
                                        </div>
										
										<div class="form-group">
                                            <label>Email Address</label>
                                            <p class="form-control-static" ><?php echo $contact->email; ?></a>
                                        </div>
										
										<fieldset>
										<h3>Change Password</h3>
										<div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" type="password" placeholder="New Password" name="new_password" id="new_password" value="">
                                        </div>
										<div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" type="password" placeholder="Confirm Password" name="new_passwordv" id="new_passwordv" value="">
                                        </div>
										</fieldset>
										
										
										
                                        
                                        <button type="button" id="my_profile_but" class="btn btn-default">Save Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                               
                                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
