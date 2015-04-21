<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use mata\modulemenu\models\Module as ModuleModel;
use mata\helpers\MataModuleHelper;
use yii\web\HttpException;
use yii\helpers\Html;

$modules = ModuleModel::find()->orderBy('Order ASC, Id ASC')->all();

$menuItems = [];
$subNav = [];

foreach ($modules as $moduleEntry) {
	$module = Yii::$app->getModule($moduleEntry->Id);

	// Not every module should be loaded as a Yii module
	if ($module == null || !$module->canShowInNavigation() || $module->getNavigation() == null) {
		\Yii::info(sprintf("Module %s not added to navigation - either not a Yii module, or canShowInNavigation == false", $moduleEntry->Name), 
			\matacms\theme\simple\Theme::LOG_CATEGORY);
		continue;
	}

	$moduleAssetBundle = $module->getModuleAssetBundle();
	$asset = $moduleAssetBundle::register($this);


	if (!file_exists($asset->sourcePath . $module->mataConfig->icon)) {
		echo $asset->sourcePath . $module->mataConfig->icon;
	}

	if (is_array($module->getNavigation())) {

		$subNav[$module->id] = [];

		foreach ($module->getNavigation() as $navigationItem) {

			$subNav[$module->id][] = [
			'label' => $navigationItem["label"],
			'url' => $navigationItem["url"],
			'icon' =>  $asset->sourcePath . $navigationItem["icon"],
			'class' => isset($navigationItem["class"]) ? $navigationItem["class"] : null
			];
		}

		$menuItems[] = sprintf("<li><a data-module-name='%s' data-subnav='%s' title='%s' href='javascript:void(0)'>%s%s</a></li>", 
			$module->id, $module->id, $module->getDescription(), file_get_contents($asset->sourcePath . $module->mataConfig->icon), $module->getName());

	} else {
		$menuItems[] = sprintf("<li><a data-module-name='%s' title='%s' href='%s'>%s%s</a></li>", 
			$module->id, $module->getDescription(), $module->getNavigation(), file_get_contents($asset->sourcePath . $module->mataConfig->icon), $module->getName());
	}
	
}

if (empty($menuItems))
	return;

?>

<header class="cd-header">
	<div id="progress-bar"></div>
	<div id="header-content-container">

		<a href="#" class="cd-3d-nav-trigger">
			Menu
			<span></span>
		</a>
	</div>
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

