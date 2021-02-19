<h1>Авторизация</h1>
<?php use \yii\widgets\ActiveForm; ?>

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


<?= $form->field($login_model, 'email')->textInput() ?>
<?= $form->field($login_model, 'password')->passwordInput() ?>


<div><button type="submit" class="btn btn-primary">Авторизация</button></div>

<?php ActiveForm::end() ?>