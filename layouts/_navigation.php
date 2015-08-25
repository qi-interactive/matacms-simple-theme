<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\HttpException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$userAccessibleModules = ArrayHelper::getColumn(\Yii::$app->moduleAccessibilityManager->getModulesByUser(\Yii::$app->user->getId()), 'ModuleId');
$moduleMenuItems = \Yii::$app->moduleMenuManager->getMenuItems($userAccessibleModules, $this);

$menuItems = $moduleMenuItems['menuItems'];
$subNav = $moduleMenuItems['subNav'];

if (empty($menuItems))
	return;

?>

<header class="cd-header">
	<div id="progress-bar"></div>
	<div id="header-inner-container" class="header-inner-container">
		<h1 id="header-inner-container-header"></h1>
		<div id="header-inner-versions" class="hi-icon-effect-2">
			<div class="hi-icon hi-icon-cog"></div>
		</div>
		<div>
			<a class="back-btn" href="#">

				<svg version="1.1" id="back-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
				<polyline fill="none" stroke="#9FA7B7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
				23,28.6 19.4,24.9 23,21.3 "/>
				<polyline fill="none" stroke="#9FA7B7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
				19.4,24.9 31.6,24.9 31.6,28.7 "/>
			</svg>

			Back To List View  </a>
		</div>
	</div>
	<div id="header-content-container">

		<a href="#" class="cd-3d-nav-trigger">
			Menu
			<span></span>
		</a>
	</div>
	<div class="modal-backdrop fade"></div>
</header> <!-- .cd-header -->


<style>


	.cd-3d-nav li, .cd-3d-nav-container .cd-marker {
		width: <?php echo 100 / count($menuItems) ?>%;
	}

</style>

<nav class="cd-3d-nav-container">

	<?php
	echo Nav::widget([
		'options' => ['class' => 'cd-3d-nav'],
		'items' => $menuItems,
		]);
		?>

		<span class="cd-marker"></span>
	</nav> <!-- .cd-3d-nav-container -->

	<div id="subnav-overlay">
		<?php foreach ($subNav as $module => $items ):
		?>

		<div id="subnav-<?php echo $module ?>" class="subnav-item">

			<?php

			foreach ($items as $item):
				?>

			<li><a href="<?= $item["url"] ?>" <?php if(isset($item["class"])) echo 'class="' . $item['class']  . '"'; ?>>
				<?= file_get_contents($item["icon"]) ?>
				<?= $item["label"] ?></a></li>
			<?php endforeach; ?>

		</div>

	<?php endforeach; ?>
</div>
