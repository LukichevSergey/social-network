<?php


namespace app\models;
use yii\db\ActiveRecord;

class Dialog extends ActiveRecord
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

    public function addDialog($user_id, $friend_id)
    {
        $dialog = new Dialog();
        $dialog->user_id = $user_id;
        $dialog->friend_id = $friend_id;
        $dialog->text = $this->message;
        $dialog->save();
    }
}