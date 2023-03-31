<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin();
    $currentRoles = $model->getRolesArray();
    $possibleRoles = ArrayHelper::map($model->getPossibleNewRoles(), 'name', 'name');
    ?>
    <label><b>Roles: </b><?= $model->roles ?></label>
    
    <?php   if (!empty($possibleRoles)) {
                array_unshift($possibleRoles, '');
                echo $form->field($model, 'new_role')->dropDownList($possibleRoles); 
            }
            if (!empty($currentRoles)) {
                array_unshift($currentRoles, '');
                echo $form->field($model, 'delete_role')->dropDownList($currentRoles);
            }
    ?>

    <div class="form-group mt-3">
        
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>