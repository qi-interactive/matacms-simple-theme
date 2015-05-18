<?php 

use mata\user\models\User;
use matacms\theme\simple\assets\HistoryAsset;
use matacms\environment\models\ItemEnvironment;
use matacms\theme\simple\assets\ModuleIndexAsset;

HistoryAsset::register($this);

$returnUri = Yii::$app->request->get('returnURI');

?>

<h3>Versions of <?= \Yii::$app->controller->id ?>: Sample Name</h3>

<ol class="revisions overlay-list-container">
	<?php foreach ($revisions as $revision): 
	$user = User::find($revision->CreatedBy)->one();
	$author = $user != null ? $user->getLabel() : "Deleted user";
	$message = $revision->Revision == 1 ? "created this document" : "wrote this version";
	?>

	<li>

		<a href="<?= $returnUri ?>&revision=<?= $revision->Revision ?>">
			<?php if($user->profile->getMediaAvatar()): ?>
				<span class="avatar">
					<img src="<?= $user->profile->getMediaAvatar()->URI ?>" alt="<?= $user->username ?>"/>
				</span>
			<?php endif; ?>
			<div class="text-container">
				<span class="author">
					<?php echo $author; ?>
				</span>

				<span class="message">
					<?php echo $message; ?>
				</span>


				<span title="<?php echo $revision->DateCreated; ?>" class="date">
				</span>
			</div>

			<?php

			$ie = ItemEnvironment::find()->where([
				"DocumentId" => $revision->DocumentId,
				"Revision" => $revision->Revision,
				])->one();

			if ($ie != null):

				?>
			<div class="list-version-container <?= strtolower($ie->Status) ?>" style="margin-right: -98px;"> 
				<div class="fadding-container"> </div>
				<div class="list-version-inner-container">
					<div class="version-status"> 

						<span>
							<?= $ie->Status ?>
						</span>
					</div>

				</div>
			</div>
		<?php endif; ?>

	</a>
</li>

<?php endforeach; ?>

</ol>
