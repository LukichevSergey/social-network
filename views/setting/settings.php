<h2>Настройки</h2>
<?php use \yii\widgets\ActiveForm; ?>
<?= \app\widgets\Alert::widget() ?>
<?php $form = ActiveForm::begin([
    'id' => 'my-form',
    'enableClientValidation' => true, //Отключение клиентской валидации
    'options' => [
        'class' => 'form-horizontal',
    ],
    'fieldConfig' => [
        'template' => "{label} \n <div class='col-md-5'>{input}</div> \n <div class='col-md-5'>{hint}</div> \n 
                <div class='col-md-5'>{error}</div>",
        'labelOptions' => ['class' => 'col-md-2 control-label']
    ]
]) ?>

<?= $form->field($passwordForm, 'oldPassword')->passwordInput() ?>
<?= $form->field($passwordForm, 'newPassword')->passwordInput() ?>
<?= $form->field($passwordForm, 'doubleNewPassword')->passwordInput() ?>


<div><button type="submit" class="btn btn-primary">Сменить пароль</button></div>

<?php ActiveForm::end() ?>