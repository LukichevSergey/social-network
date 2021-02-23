<?php


namespace app\models;


use yii\base\Model;

class Message extends Model
{
    public $message;

    public function rules()
    {
        return [
            [['message'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'message' => 'Ваше сообщение'
        ];
    }
}