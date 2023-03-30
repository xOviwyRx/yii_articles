<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
    <div class="d-flex justify-content-between">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('create')): ?>
        <p>
            <?= Html::a('Create New Article', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>
    </div>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'itemView' => '_article_item'
    ]); ?>


</div>
