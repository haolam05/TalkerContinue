<h5>Create new group</h5>
<hr>

<div class="row">
	<div class="col-lg-12">
		<form name="formGroup" action="group.ctrl.php" method="POST" novalidate>
			<div class="form-group">
				<label for="formGroupName">Group name</label>
				<input  type="text" 
                        class="form-control 
                            <?php if ($_SESSION['msgid']!='401' && $_SESSION['msgid']!='') { 
                                    echo 'is-valid'; 
                                } else { 
                                    echo (phpShowInputFeedback($_SESSION['msgid'])[0]); 
                                } 
                            ?>" 
                        id="formGroupName" 
                        name="formGroupName" 
                        placeholder="Enter group name" 
                        onkeyup="jsGroupValidateName('formGroupName')"
                        value="<?php echo $_SESSION['group_name'] ?>">

				<?php if ($_SESSION["msgid"]=="401") { ?>
					<div class="invalid-feedback">
					    <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
					</div>
				<?php } ?>
			</div>

			<button type="submit" id="formGroupSubmit" name="formGroupSubmit" class="btn btn-primary btn-success mb-5">Submit</button>
		</form>
	</div>
</div>

<?php $_SESSION['group_name']='' ?> 

<script src="group.js"></script>