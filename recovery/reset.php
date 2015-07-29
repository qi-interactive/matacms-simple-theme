<?php

/*
 * This file is part of the mata project.
 *
 * (c) mata project <http://github.com/mata>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var mata\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Reset your password');
$this->params['breadcrumbs'][] = $this->title;

use matacms\theme\simple\assets\RecoveryAsset;

$recoveryAsset = RecoveryAsset::register($this);

?>

<div class="row">

	<h1 class="logo">
        <img src="<?= $recoveryAsset->baseUrl ?>/images/login/gear-mata-logo@2x.png" alt="mata-cms"/>
	</h1>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
		</div>


		<?php if ($model->hasErrors()):
		$firstError = current(current($model->getErrors()));
		?>
		<div style="display: block" id="header-spacer"><?= $firstError ?></div>

	   <?php endif;?>

	   <?php if (\Yii::$app->getModule('user')->enableFlashMessages): ?>
           <?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
               <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>
                   <div style="display: block" id="header-spacer">
                       <?= $message ?>
                   </div>
               <?php endif ?>
           <?php endforeach ?>
       <?php endif ?>

       <div class="panel-body">
		   <?php $form = ActiveForm::begin([
			   'id'                     => 'password-recovery-form',
			   'enableAjaxValidation'   => true,
			   'enableClientValidation' => false
		   ]); ?>

		   <?= $form->field($model, 'password')->passwordInput() ?>

		   <?= Html::submitButton(Yii::t('user', 'Finish'), ['class' => 'btn btn-success btn-block']) ?><br>

		   <?php ActiveForm::end(); ?>
		</div>
		<div id="footer-bar" class="row">
			<div class="twelve columns">
				<div id="footer-caption"> <span> Created by </span><a href="http://qi-interactive.com/" target="blank"><img src="<?= $recoveryAsset->baseUrl ?>/images/login/qi-logo@2x.png" alt="Qi Interactive Ltd"/> </a></div>
			</div>
		</div>
	</div>
</div>
