<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

//* @var $model \app\models\Article */

?>
<div>
    <a href="<?= Url::to(['/article/view', 'slug' => $model->slug])?>">
        <h3><?= Html::encode($model->title) ?></h3>
    </a>
    
    <div>
        <?= StringHelper::truncateWords($model->getEncodedBody(), 40) ?>
    </div>
    <hr>
</div>