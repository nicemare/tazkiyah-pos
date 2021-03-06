<?php

use common\models\User;
use yii\helpers\Html;
use common\components\widgets\ZeedActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ZeedActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->input('email', ['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Leave this field blank if you do not want to change the password', 'minlength' => 6]) ?>

    <?= $form->field($model, 'role')->dropDownList(User::getRoleAsArray()); ?>

    <?= $form->field($model, 'status')->dropDownList(User::getStatusAsArray()); ?>

    <div class="ln_solid"></div>

    <div class="form-group">
        <div class="col-md-7 col-sm-6 col-xs-12 col-md-offset-3">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ZeedActiveForm::end(); ?>

</div>
