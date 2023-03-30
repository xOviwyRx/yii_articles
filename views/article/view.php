<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Article $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="text-muted mb-0">
            <small>Category: 
                <b><?= $model->getCategoryName() ?></b>
            </small>
    </p>
    <p class="text-muted">
        <small>Created At: 
            <b><?= Yii::$app->formatter->asRelativeTime($model->created_at) ?></b>
            By: <?= $model->createdBy->username ?>
        </small>
    </p>
    <p>
        <?php if (Yii::$app->user->can('update')): ?>
            <?= Html::a('Update', ['update', 'slug' => $model->slug], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
            <?php if (Yii::$app->user->can('delete')): ?>
                <?= Html::a('Delete', ['delete', 'slug' => $model->slug], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
        
    </p>
    
    <div>
        <?= $model->getEncodedBody() ?>
    </div>


</div>
