<?php


namespace app\controllers;

use app\models\Dialog;
use app\models\Message;
use app\models\User;
use yii\web\NotFoundHttpException;

class DialogController extends AppController
{
    public function actionDialogs()
    {

        $user = \Yii::$app->user->identity;
        $friendId = \Yii::$app->request->get('id');
        $friend = User::find()->where(['id' => $friendId])->limit(1)->one();
        $users = User::find()->where(['!=', 'id', $user->id])->all();
        $dialogForm = new Message();


        if($friendId)
        {
            $userMessages = Dialog::find()->where("user_id = {$user->id} AND friend_id = {$friendId}")->orderBy('datetime DESC')->all();
            $opponentMessages = Dialog::find()->where(['user_id' => $friendId, 'friend_id' => $user->id])->orderBy('datetime DESC')->all();
        }

        if(\Yii::$app->request->post('Message'))
        {
            $dialog = new Dialog();
            $dialog->user_id = $user->id;
            $dialog->friend_id = $friendId;
            $dialog->text = \Yii::$app->request->post('Message')['message'];
            $dialog->save();
            return $this->refresh();
        }

        return $this->render('dialogs', compact('users', 'userMessages', 'opponentMessages', 'friend', 'dialogForm'));
    }
}