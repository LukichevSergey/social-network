<?php


namespace app\controllers;

use yii\data\Pagination;
use app\models\User;

class FriendController extends AppController
{
    public function actionUsers()
    {

        $sort = trim(\Yii::$app->request->get('sort'));

        switch ($sort)
        {
            case 'alphabetically':
                $query = User::find()->orderBy('name');
                break;
            case 'ascending':
                $query = User::find()->orderBy('dateofbirth DESC');
                break;
            case 'descending':
                $query = User::find()->orderBy('dateofbirth');
                break;
            case 'by-country':
                $query = User::find()->orderBy('country');
                break;
            default:
                $query = User::find();
        }

        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $users = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('users', compact('users', 'pages'));
    }
}