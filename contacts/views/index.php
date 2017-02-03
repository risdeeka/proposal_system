
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contacts</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div class="row">
						<a href="<?php echo site_url('contacts/add'); ?>" class="btn btn-primary btn-lg" style="margin-bottom:10px;float:right">Add Contact</a>
                        </div> 
            <div class="row">
			<?php if($this->session->flashdata('alert_success')){ ?>
                    <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('alert_success'); ?>
										
										</div>
				<?php }elseif($this->session->flashdata('alert_error')){ ?>
                    <div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $this->session->flashdata('alert_error'); ?>
										
										</div>
				<?php }elseif(isset($error)){ ?>
				<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $error; ?>
										</div>
				<?php } ?>
                <div class="panel panel-default">
                        <div class="panel-heading">
						  
						
						
                            <div class="row">
							<div class="table-responsive">
							    <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            
                                            <th>First Name</th>
											<th>Last Name</th>
                                            <th>Email Address</th>
											<th>Phone Number</th>
											<th>Company</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									if($contacts){
										foreach($contacts as $contact){
											?>
                                        <tr>
                                            <td><?php echo $contact->first_name; ?></td>
											<td><?php echo $contact->last_name; ?></td>
                                            <td><?php echo $contact->email; ?></td>
											 <td><?php echo $contact->phone; ?></td>
											  <td><?php echo $contact->company; ?></td>
                                            <td>
											<a href="<?php echo site_url('contacts/edit/'.$contact->contact_id); ?>" title="Edit" >
											<i class="fa fa-pencil"></i>
											</a>
											<a href="<?php echo site_url('contacts/delete/'.$contact->contact_id); ?>" title="Delete" class="delete" >
											<i class="fa fa-trash"></i>
											</a>
											</td>
                                        </tr>
										<?php }
									}
                                      ?>									
                                    </tbody>
                                </table>

                             </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /#page-wrapper -->

    
