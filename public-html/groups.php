<?php
	$db_data = array();
	$dbGroupsList = phpFetchAllDB('SELECT * FROM groups', $db_data);
?>

<div class="row">
    <div class="col-lg-6">
        <h5>Groups</h5>
    </div>
    <div class="col-lg-6">
        <a href="gate.php?module=group" class="btn btn-success float-right mt-2" role="button">Create new group</a>
    </div>
</div>

<div class="row">
	<div class="col-lg-12">
		<table class="table">

			<?php foreach ($dbGroupsList as $dbGroupRow) { ?>
				<tr>
					<td class="group_header">
						<a href="gate.php?module=posts&gid=<?php echo $dbGroupRow['group_id']; ?>">
							<?php echo $dbGroupRow["group_name"]; ?>
						</a>
					</td>
				</tr>
			<?php } ?>

		</table>
	</div>
</div>