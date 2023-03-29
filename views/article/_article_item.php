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
    <p class="text-muted text-end">
        <small>Created At: 
            <b><?= Yii::$app->formatter->asRelativeTime($model->created_at) ?></b>
            By: <?= $model->createdBy->username ?>
        </small>
    </p>
    <hr>
</div>