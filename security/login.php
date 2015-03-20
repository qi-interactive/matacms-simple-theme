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
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
			</div>
			<div class="panel-body">
				<?php $form = ActiveForm::begin([
					'id'                     => 'login-form',
					'enableAjaxValidation'   => true,
					'enableClientValidation' => false,
					'validateOnBlur'         => false,
					'validateOnType'         => false,
					'validateOnChange'       => false,
					]) ?>

					<?= $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]) ?>

					<?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])->passwordInput()->label(Yii::t('user', 'Password') . ($module->enablePasswordRecovery ? ' (' . Html::a(Yii::t('user', 'Forgot password?'), ['/user/recovery/request'], ['tabindex' => '5']) . ')' : '')) ?>

					<?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>

					<?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-primary btn-block', 'tabindex' => '3']) ?>

					<?php ActiveForm::end(); ?>
				</div>
			</div>
			<?php if ($module->enableConfirmation): ?>
				<p class="text-center">
					<?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
				</p>
			<?php endif ?>
			<?= Connect::widget([
				'baseAuthUrl' => ['/user/security/auth']
				]) ?>
			</div>
		</div>

		<section class="content">
			<h2>Ichiro</h2>
			<span class="input input--ichiro">
				<input class="input__field input__field--ichiro" type="text" id="input-25" />
				<label class="input__label input__label--ichiro" for="input-25">
					<span class="input__label-content input__label-content--ichiro">Bird's Color</span>
				</label>
			</span>
			<span class="input input--ichiro">
				<input class="input__field input__field--ichiro" type="text" id="input-26" />
				<label class="input__label input__label--ichiro" for="input-26">
					<span class="input__label-content input__label-content--ichiro">Wing Span</span>
				</label>
			</span>
			<span class="input input--ichiro">
				<input class="input__field input__field--ichiro" type="text" id="input-27" />
				<label class="input__label input__label--ichiro" for="input-27">
					<span class="input__label-content input__label-content--ichiro">Beak Length</span>
				</label>
			</span>
		</section>

		<script>
			/*!
			* classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

 /*jshint browser: true, strict: true, undef: true */
 /*global define: false */

 ( function( window ) {

 	'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
	return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
	hasClass = function( elem, c ) {
		return elem.classList.contains( c );
	};
	addClass = function( elem, c ) {
		elem.classList.add( c );
	};
	removeClass = function( elem, c ) {
		elem.classList.remove( c );
	};
}
else {
	hasClass = function( elem, c ) {
		return classReg( c ).test( elem.className );
	};
	addClass = function( elem, c ) {
		if ( !hasClass( elem, c ) ) {
			elem.className = elem.className + ' ' + c;
		}
	};
	removeClass = function( elem, c ) {
		elem.className = elem.className.replace( classReg( c ), ' ' );
	};
}

function toggleClass( elem, c ) {
	var fn = hasClass( elem, c ) ? removeClass : addClass;
	fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );



(function() {
	// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
	if (!String.prototype.trim) {
		(function() {
			// Make sure we trim BOM and NBSP
			var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
			String.prototype.trim = function() {
				return this.replace(rtrim, '');
			};
		})();
	}

	[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
		// in case the input is already filled..
		if( inputEl.value.trim() !== '' ) {
			classie.add( inputEl.parentNode, 'input--filled' );
		}

		// events:
		inputEl.addEventListener( 'focus', onInputFocus );
		inputEl.addEventListener( 'blur', onInputBlur );
	} );

	function onInputFocus( ev ) {
		classie.add( ev.target.parentNode, 'input--filled' );
	}

	function onInputBlur( ev ) {
		if( ev.target.value.trim() === '' ) {
			classie.remove( ev.target.parentNode, 'input--filled' );
		}
	}
})();


</script>
