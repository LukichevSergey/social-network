<?php


namespace app\controllers;

use app\models\Dialog;
use app\models\User;

class DialogController extends AppController
{
    public function actionDialogs()
    {

        $user = \Yii::$app->user->identity;
        $friendId = \Yii::$app->request->get('id');
        $friend = User::find()->where(['id' => $friendId])->limit(1)->one();
        $users = User::find()->where(['!=', 'id', $user->id])->all();
        $dialogForm = new Dialog();

        if($friendId)
        {
            $userMessages = Dialog::find()->where("user_id = {$user->id} AND friend_id = {$friendId}")->all();
            $opponentMessages = Dialog::find()->where(['user_id' => $friendId, 'friend_id' => $user->id])->all();
        }

        if(\Yii::$app->request->post('Dialog'))
        {
            $dialogForm->addDialog($user->id, $friendId);
            return $this->refresh();
        }

        return $this->render('dialogs', compact('users', 'userMessages', 'opponentMessages', 'friend', 'dialogForm'));
    }
}