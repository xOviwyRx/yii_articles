<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper as HelpersVarDumper;

class SignupForm extends Model {
    public $username;
    public $password;
    public $password_repeat;
    public $email;
    public $full_name;

    public function rules(){
        return [
            [['username', 'password', 'password_repeat'], 'required'],
            [['username'], 'string', 'min' => 4, 'max' => 16],
            [['password', 'password_repeat'], 'string', 'min' => 4],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['email', 'email', 'message'=>"The email isn't correct"],
            ['full_name', 'string', 'max' => 255]
        ];
    }

    public function signup(){
        $user = new User();
        $user->username = $this->username;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->auth_key = \Yii::$app->security->generateRandomString();
        $user->email = $this->email;
        $user->full_name = $this->full_name;

        if ($user->save()){
            $auth = \Yii::$app->authManager;
            $regularUser = $auth->getRole('regular_user');
            $auth->assign($regularUser, $user->getId());
            return true;
        }

        \Yii::error(message: "User was not saved. " . HelpersVarDumper::dumpAsString($user->errors));
        return false;
    }
}