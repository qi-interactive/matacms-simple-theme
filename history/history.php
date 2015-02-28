<?php 
use mata\user\models\User;
use matacms\assets\HistoryAsset;

HistoryAsset::register($this);

?>

<ol class="revisions">
	<?php foreach ($revisions as $revision): 
	$user = User::find($revision->CreatedBy)->one();
	$author = $user != null ? $user->getLabel() : "Deleted user";
	$message = $revision->Revision == 1 ? "created this document" : "wrote this version";
	
	?>

	<li>

		<a href="revision=<?php echo $revision->Revision ?>">
			<span class="avatar">
				<img src="http://gravatar.com/avatar/<?= $user->profile->gravatar_id ?>?s=24" class="img-rounded" alt="<?= $user->username ?>"/>
			</span>
			<span class="author">
				<?php echo $author; ?>
			</span>

			<span class="message">
				<?php echo $message; ?>
			</span>

			<span title="<?php echo $revision->DateCreated; ?>" class="date">
			</span>
		</li>
	</li>

<?php endforeach; ?>

</ol>