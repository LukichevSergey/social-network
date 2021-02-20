<?php


namespace app\controllers;

use app\models\Friend;
use yii\data\Pagination;
use app\models\User;

class FriendController extends AppController
{
    public function actionUsers()
    {
        $id = \Yii::$app->user->identity->id;
        $friendRequests = User::findBySql("SELECT user.id, name, surname, dateofbirth, country FROM user LEFT JOIN friend ON user.id = friend.friend_id WHERE (user_id = {$id}) AND accepted = 0")->all();
        $friends = User::findBySql("SELECT user.id, name, surname, dateofbirth, country FROM user LEFT JOIN friend ON user.id = friend.friend_id WHERE (user_id = {$id}) AND accepted = 1")->all();

        $sort = trim(\Yii::$app->request->get('sort'));

        switch ($sort)
        {
            case 'alphabetically':
                $query = User::find()->where(['!=', 'id', \Yii::$app->user->identity->id])->orderBy('name');
                break;
            case 'ascending':
                $query = User::find()->where(['!=', 'id', \Yii::$app->user->identity->id])->orderBy('dateofbirth DESC');
                break;
            case 'descending':
                $query = User::find()->where(['!=', 'id', \Yii::$app->user->identity->id])->orderBy('dateofbirth');
                break;
            case 'by-country':
                $query = User::find()->where(['!=', 'id', \Yii::$app->user->identity->id])->orderBy('country');
                break;
            default:
                $query = User::find()->where(['!=', 'id', \Yii::$app->user->identity->id]);
        }

        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $users = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('users', compact('users', 'pages', 'friendRequests', 'friends'));
    }

    public function actionFriends($id)
    {
        $friends = User::findBySql("SELECT user.id, name, surname, dateofbirth, country FROM user LEFT JOIN friend ON user.id = friend.friend_id WHERE (user_id = {$id}) AND accepted = 1")->all();
        $friendRequests = User::findBySql("SELECT user.id, name, surname, dateofbirth, country FROM user LEFT JOIN friend ON user.id = friend.user_id WHERE friend_id = {$id} AND accepted = 0")->all();

        return $this->render('friends', compact('friends', 'friendRequests'));
    }

    public function actionRequest($user_id, $friend_id)
    {
        $trueRequest = Friend::find()->where(["user_id" => $user_id, "friend_id" => $friend_id])->one();
        $backRequest = Friend::find()->where(["user_id" => $friend_id, "friend_id" => $user_id])->one();

        if(\Yii::$app->request->get('accepted') == 1)
        {
            if($backRequest)
            {
                $backRequest->delete();
                $trueRequest->user_id = $friend_id;
                $trueRequest->friend_id = $user_id;
                $trueRequest->accepted = 1;
                $trueRequest->save();
            }

        } else
        {
            if($backRequest)
                $backRequest->delete();

            if($trueRequest)
                $trueRequest->delete();
        }

        return $this->goBack(['friend/friends', 'id' => $friend_id]);
    }

    public function actionAdd($id)
    {
        $friend = new Friend();
        $friend->user_id = \Yii::$app->user->identity->id;
        $friend->friend_id = $id;
        $friend->accepted = 0;
        $friend->save();

        return $this->goBack(['friend/users']);
    }
}