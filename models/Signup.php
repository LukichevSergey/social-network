<?php


namespace app\models;
use yii\base\Model;

class Signup extends Model
{
    public $login;
    public $email;
    public $password;
    public $name;
    public $surname;
    public $country;
    public $dateOfBirth;


    public function rules()
    {
        return [
            [['login', 'email', 'password', 'name', 'surname', 'dateOfBirth', 'country'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User'],
            ['password', 'string', 'min' => 2, 'max' => 10]
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин:',
            'email' => 'Email:',
            'name' => 'Имя:',
            'surname' => 'Фамилия:',
            'counrty' => 'Страна:',
            'dateOfBirth' => 'Дата рождения:',
            'password' => 'Пароль:',
            'country' => 'Страна проживания:',
        ];
    }

    public function signUp()
    {
        $user = new User();
        $user->login = $this->login;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->country = $this->country;
        $user->email = $this->email;
        $user->dateofbirth = $this->dateOfBirth;
        $user->setPassword($this->password);
        return $user->save(); //вернет true или false
    }

}