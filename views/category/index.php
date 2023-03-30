<?php

use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <div class="d-flex justify-content-between align-items-end">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php if (Yii::$app->user->can('create')): ?>
            <p>
                <?= Html::a('Create New Category', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        <?php endif; ?>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php 
    $columns = [['class' => 'yii\grid\SerialColumn'], 'title'];
    if (Yii::$app->user->can('create', 'update', 'delete')) {
        $columns[] = [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Category $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
                ];
        }
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns
    ]); ?>


</div>
