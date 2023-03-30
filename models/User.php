<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 * @property string|null $email 
 * @property string|null $full_name 
 * 
 * @property Article[] $articles 
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'auth_key', 'access_token'], 'required'],
            [['username'], 'string', 'min' => 4, 'max' => 55],
            [['password', 'auth_key', 'access_token', 'full_name'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['username'], 'unique', 'message'=>'Username already exist. Please try another one.']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'email' => 'Email',
            'full_name' => 'Full Name'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['access_token' => $token])->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getArticles()
	{
            return $this->hasMany(Article::class, ['created_by' => 'id']);
    }

    public function addRole($role){
        // $this->roles = Yii::$app->authManager->getRolesByUser($this->id);
    }

    public function deleteRole($role){

    }

    public function getRoles(){
        $roles = Yii::$app->authManager->getRolesByUser($this->id);
        $role_names = array_map(function ($role) { return $role->name; }, $roles);
        return implode(", ", $role_names);
    }

    public function getPossibleRoles(){
        $existingRoles = Yii::$app->authManager->getRolesByUser($this->id);
        $allRoles = Yii::$app->authManager->getRoles();
        $possibleRoles = [];
        foreach ($allRoles as $role){
            if (!in_array($role, $existingRoles)){
                $possibleRoles[] = $role;
            }
        }
        return $possibleRoles;

        // return array_diff(Yii::$app->authManager->getRoles(), $existingRoles);
    }
}
