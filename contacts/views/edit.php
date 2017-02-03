<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Contact Group</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			<?php if(validation_errors()){?>
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
                <form role="form" method="post" action=""  id="form-contact">
                                       
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
                                            <input class="form-control" placeholder="Email Address" name="email" id="email" value="<?php echo $contact->email; ?>">
                                        </div>
										
										<div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" placeholder="Phone Number" name="phone" id="phone"  value="<?php echo $contact->phone; ?>">
                                        </div>
										
										<div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" placeholder="Company Name" name="company" id="company"  value="<?php echo $contact->company; ?>">
                                        </div>
                                        
                                        <button type="submit"  class="btn btn-default">Save Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                               
                                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
