<h1>Регистрация</h1>
<?php
use \yii\widgets\ActiveForm;
use yii\jui\DatePicker;
?>

<?php $form = ActiveForm::begin(['class' => 'form-horizontal']) ?>

<?= $form->field($model, 'login')->textInput(['placeholder' => 'Введите логин']) ?>
<?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите Email']) ?>
<?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Введите пароль']) ?>
<?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите имя']) ?>
<?= $form->field($model, 'surname')->textInput(['placeholder' => 'Введите фамилию']) ?>
<?= $form->field($model, 'dateOfBirth')->textInput(['type' => 'date']) ?>
<?= $form->field($model, 'country')->textInput(['placeholder' => 'Введите страну проживания']) ?>


<div><button type="submit" class="btn btn-primary">Регистрация</button></div>

<?php ActiveForm::end() ?>