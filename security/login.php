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
use mata\user\widgets\Connect;

/**
 * @var yii\web\View                   $this
 * @var mata\user\models\LoginForm $model
 * @var mata\user\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;

use matacms\theme\simple\assets\LoginAsset;
loginAsset::register($this);

?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Log in to MATA CMS</h3>
		</div>

		<div id="header-spacer"> Error message applicable to both fields below</div>

		<div class="panel-body">
			<?php $form = ActiveForm::begin([
				'id'                     => 'login-form',
				'enableAjaxValidation'   => true,
				'enableClientValidation' => false,
				'validateOnBlur'         => false,
				'validateOnType'         => false,
				'validateOnChange'       => false,
				]) ?>

				<?= $form->beginField($model, 'login') ?>
				<span class="input input--ichiro">
					<label class="input__label input__label--ichiro control-label" for="login-form-login">
						<span class="input__label-content input__label-content--ichiro">Username</span>
					</label>
					<input class="input__field input__field--ichiro form-control" name="login-form[login]" type="text" id="login-form-login" tabindex="1"/>
				</span>
				<!-- <div class="help-block"></div> -->
				<?= $form->endField(); ?>


				<?= $form->beginField($model, 'password') ?>
				<span class="input input--ichiro input--filled">
					<label class="input__label input__label--ichiro control-label" for="login-form-password">
						<span class="input__label-content input__label-content--ichiro"><?= \Yii::t('user', 'Password'); ?></span>
					</label>
					<input class="input__field input__field--ichiro form-control" name="login-form[password]" type="password" id="login-form-password" tabindex="2"/>
				</span>
				<!-- <div class="help-block"></div> -->
				<?= $form->endField(); ?>

				<div class="row" id="submit-remember-me-container">
					<div class="five columns">
						<?= $form->field($model, 'rememberMe')->checkbox(['label'=>'<div><i class="fa fa-dribbble">&#10004;</i></div><span>'.$model->getAttributeLabel('rememberMe'). '</span>', 'tabindex'=>"4"]) ?>
					</div>
					<div class="seven columns">
						<?= Html::submitButton(Yii::t('user', 'LOG IN'), ['class' => 'btn btn-primary btn-block', 'tabindex' => '3']) ?>
					</div>
				</div>
				<?php ActiveForm::end(); ?>
			</div>
			<div id="forgotten-password-bar" class="row">
				<div class="six columns">
					<?= $module->enablePasswordRecovery ? Html::a(Yii::t('user', 'Forgot password?'), ['/user/recovery/request'], ['tabindex' => '5']) : '' ?>
				</div>
				<div class="six columns">
					<div id="get-in-touch-container"> <span> No account? </span> <a href=""> Get in touch </a> </div>
					<div id="footer-caption"> <span> Created by </span><img src="http://placehold.it/26/ffffff/" alt="Qi Interactive Ltd"/> </div>
				</div>
			</div>
		</div>

		<?= Connect::widget([
			'baseAuthUrl' => ['/user/security/auth']
			]) ?>
		</div>
