<div class="row">
    <div class="col-lg-6">
        <h5><?php echo phpGetGroupName($_GET["gid"]); ?></h5>
    </div>
    <div class="col-lg-6">
        <?php if (phpGetGroupOwnerID($_GET["gid"]) == $_SESSION["uid"]) { ?>
            <a href="gate.php?module=group&gid=<?php echo $_GET["gid"]; ?>" class="btn btn-primary btn-sm float-right mt-3" role="button">Settings</a>
        <?php } ?>
    </div>
</div>
<hr>

<div class="row">
	<div class="col-lg-12">
		<form name="formPosts" action="posts.ctrl.php" method="POST" novalidate>

			<div class="form-group">
				<label for="formPostsContent">Create new post</label>
				<textarea   class="form-control" 
                            id="formPostsContent" 
                            name="formPostsContent" 
                            placeholder="Write the post here. Tags are not allowed." 
                            onkeyup="jsPostsValidateTextArea('formPostsContent')"
                            ><?php echo $_SESSION['posts_content']; ?></textarea>
            </div>

            <input type="hidden" id="formPostsGroupID" name="formPostsGroupID" value="<?php echo $_GET["gid"]; ?>">

			<button type="submit" id="formPostsSubmit" name="formPostsSubmit" class="btn btn-primary btn-success mb-5">Send</button>
		</form>
	</div>
</div>

<?php
    $db_data = array($_GET["gid"]);
    $dbPostsList = phpFetchAllDB('SELECT * FROM posts WHERE post_group_id = ? ORDER BY post_date DESC', $db_data);
?>

<p><strong>Latest posts</strong></p>

<div class="row">
  <div class="col-lg-12">
        <?php foreach ($dbPostsList as $dbPostRow) { ?>
            <div class="message_header">
                FROM: <?php echo phpGetUserEmail($dbPostRow["post_author_id"]); ?>
                | DATE: <?php echo $dbPostRow["post_date"]; ?>
            </div>
            <div class="message_content" id="databasePostsContent<?php echo $dbPostRow['post_id']; ?>">
                <?php echo $dbPostRow["post_content"]; ?>
            </div>

            <form action="posts.edit.ctrl.php" method="POST" novalidate>
                <div class="form-group form_posts_content">
                    <textarea   class="form-control 
                                    <?php 
                                    if ($_SESSION['msgid']!='501' && $_SESSION['msgid']!='') { 
                                        echo 'is-valid'; 
                                    } else { 
                                        echo (phpShowInputFeedback($_SESSION['msgid'])[0]); 
                                    } 
                                ?>" 
                                id="formPostsContentEdited<?php echo $dbPostRow['post_id'] ?>" 
                                name="formPostsContentEdited<?php echo $dbPostRow['post_id'] ?>" 
                                onkeyup="jsPostsValidateTextArea('formPostsContentEdited<?php echo $dbPostRow['post_id'] ?>')"
                                hidden
                    ><?php echo $dbPostRow["post_content"]; ?></textarea>

                    <?php if ($_SESSION["msgid"]=="501") { ?>
                        <div class="invalid-feedback">
                            <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                        </div>
                    <?php } ?>
                </div>

                <input type="hidden" id="formPostsGroupID" name="formPostsGroupID" value="<?php echo $_GET['gid']; ?>">
                <input type="hidden" id="formPostsPostID" name="formPostsPostID" value="<?php echo $dbPostRow["post_id"]; ?>">

                <?php if ($dbPostRow["post_author_id"] == $_SESSION["uid"]) { ?>
                    <a  href="#formPostsContentEdited<?php echo $dbPostRow['post_id']; ?>" 
                        id="formPostsEditButton<?php echo $dbPostRow['post_id']; ?>"
                        class="btn btn-primary btn-sm" 
                        role="button"
                        onclick='showTextAreaByPostId("<?php echo $dbPostRow["post_id"]; ?>")'
                    >Edit</a>
                <?php } ?>
            </form>

        <?php } ?>
  </div>
</div>

<?php $_SESSION['posts_content']='' ?>

<script src="posts.js"></script>