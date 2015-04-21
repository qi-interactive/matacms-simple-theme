<?php

use yii\bootstrap\Alert;

?>

<div class="container">

<?php

echo Alert::widget([
    'options' => [
        'class' => "alert-$level",
    ],
    'body' => $message,
]);

?>
</div>

