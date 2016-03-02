<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\theme\simple;

use matacms\settings\models\Setting;
use yii\web\ServerErrorHttpException;

class Theme {

	const LOG_CATEGORY = __CLASS__;

	public static function getTypeKitCode()
	{
		$typeKitCode = Setting::getDb()->cache(function ($db) {
		    return Setting::findValue('MATACMS_TYPEKIT_CODE');
		}, null, new \matacms\cache\caching\MataLastUpdatedTimestampDependency());

		if(empty($typeKitCode))
			throw new ServerErrorHttpException('Setting for MATACMS_TYPEKIT_CODE is not defined');

		return $typeKitCode;
	}

}
