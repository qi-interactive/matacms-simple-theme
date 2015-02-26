<?php

use yii\bootstrap\Alert;

echo Alert::widget([
    'options' => [
        'class' => "alert-$level",
    ],
    'body' => $message,
]);


