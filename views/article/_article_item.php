<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

//* @var $model \app\models\Article */

?>
<div>
    <a class="text-decoration-none link-success" href="<?= Url::to(['/article/view', 'slug' => $model->slug])?>">
        <h3><?= Html::encode($model->title) ?></h3>
    </a>
    
    <div>
        <?= StringHelper::truncateWords($model->getEncodedBody(), 40) ?>
    </div>
    <div class="d-flex mt-3 justify-content-between">
        <p class="text-muted mb-0">
            <small>Category: 
                <b><?= $model->getCategoryName() ?></b>
            </small>
        </p>
        <p class="text-muted mb-0">
            <small>Created At: 
                <b><?= Yii::$app->formatter->asRelativeTime($model->created_at) ?></b>
                By: <?= $model->createdBy->username ?>
            </small>
        </p>
    </div>
    <hr>
</div>