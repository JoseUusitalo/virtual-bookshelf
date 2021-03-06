<?php
/**
 * A generic view for showing a list of comments for the data shown on this page. (User/Product/Review)
 * This is a view that is to be added at the bottom of pages that allow commenting and must not be used as "standalone" page.
 * @author Ilkka
 */

// disallow direct access.
if ($this->uri->uri_string()==="commentlist"){
	show_404();
}
else
{
?>
<hr>

<div id="commentlist"></div>

<script type="text/javascript" src="../../../js/commentlist.js"></script>
<script type="text/javascript" src="../../../js/r2p.js"></script>
<script type="text/javascript" src="../../../lib/sorttable.js"></script>

<script type="text/javascript">
	if (!putIntoSessionStorage("comments_json", JSON.stringify(<?php echo $comments ;?>)))
	{
		// Do it the old fashioned way.
		<?php echo 'var comments_json = JSON.stringify(' . $comments . ');' ;?>
	}
	createCommentList(<?php
					// In an attempt to improve security the user admin status is echoed here instead of being stored in sessionStorage.
					// PHP echos boolean variables as int.
					echo (int) $user_is_admin;
				   ?>);
</script>
<?php
}
?>