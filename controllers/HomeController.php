<?php


namespace app\controllers;
use app\models\Login;
use app\models\Signup;
use Yii;


class HomeController extends AppController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSignup()
    {
        $model = new Signup();

        if(isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');
            // $model->email = $_POST['Signup']['email']

            if($model->validate() && $model->signUp())
            {
                return $this->goHome();
            }
        }

        return $this->render('register', ['model' => $model]);
    }

    public function actionLogin()
    {

        $login_model = new Login();

        if(Yii::$app->request->post('Login'))
        {
            $login_model->attributes = Yii::$app->request->post('Login');

            if ($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login', compact('login_model'));
    }

    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest)
        {
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }
}