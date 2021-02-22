<?php


namespace app\models;
use yii\base\Model;

class Password extends Model
{
    public $oldPassword;
    public $newPassword;
    public $doubleNewPassword;

    public function rules()
    {
        return [
            [['oldPassword', 'newPassword', 'doubleNewPassword'], 'required'],
            ['newPassword', 'string', 'min' => 2, 'max' => 10]
        ];
    }

    public function attributeLabels()
    {
        return [
            'oldPassword' => 'Ваш старый пароль',
            'newPassword' => 'Ваш новый пароль',
            'doubleNewPassword' => 'Повторите ваш новый пароль',
        ];
    }
}