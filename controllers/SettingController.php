<?php


namespace app\controllers;


use app\models\ImageUpload;
use app\models\Password;
use app\models\User;
use yii\web\UploadedFile;

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

    public function actionAvatar($id)
    {
        $model = new ImageUpload;

        if(\Yii::$app->request->isPost)
        {
            $user = User::findOne($id);
            $file = UploadedFile::getInstance($model, 'image');

            if($user->saveImage($model->uploadFile($file, $user->avatar)))
            {
                return $this->redirect(['home/user']);
            }

        }

        return $this->render('avatar', compact('model'));
    }
}