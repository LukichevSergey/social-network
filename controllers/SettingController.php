<?php


namespace app\controllers;


use app\models\Password;

class SettingController extends AppController
{
    public function actionSettings()
    {
        $user = \Yii::$app->user->identity;
        $passwordForm = new Password();
        $request = \Yii::$app->request->post('Password');

        if($request)
        {
            if(\Yii::$app->user->identity->password == sha1($request['oldPassword']))
            {

                if($request['newPassword'] == $request['doubleNewPassword'])
                {
                    $user->password = sha1($request['newPassword']);
                    $user->save();
                    \Yii::$app->session->setFlash('success', 'Пароль успешно изменен');
                    return $this->refresh();
                }else
                {
                    \Yii::$app->session->setFlash('danger', 'Новые пароли не совпадают');
                }
            }else
            {
                \Yii::$app->session->setFlash('danger', 'Вы ввели не верный пароль');
            }
        }

        return $this->render('settings', compact('passwordForm', 'user'));
    }
}