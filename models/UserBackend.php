<?php

namespace app\models;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "userbackend".
 *
 * @property int $Uid 用户ID
 * @property string $username 用户名
 * @property string $password_hash 密码
 * @property string $auth_key 认证
 * @property string $email 邮箱
 * @property int $Authority 权限等级
 * @property string $created_at 建立时间
 * @property string $updated_at 修改时间
 */
class Userbackend extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */


    /**
     * @inheritdoc
     * 根据user_backend表的主键（Uid）获取用户
     */
    public static function findIdentity($id)
    {
        return static::findOne(['Uid' => $id]);
    }

    /**
     * @inheritdoc
     * 根据access_token获取用户，相关文档 http://www.manks.top/yii2-restful-api.html
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * @inheritdoc
     * 用以标识 Yii::$app->user->id 的返回值
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     * 获取auth_key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     * 验证auth_key
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


    /**
     * 为model的password_hash字段生成密码的hash值
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }


    /**
     * 生成 "remember me" 认证key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }


    /**
     * 根据user_backend表的username获取用户
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    /**
     * 验证密码的准确性
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {

        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }




    public static function tableName()
    {
        return 'userbackend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'auth_key', 'Authority', 'created_at', 'updated_at'], 'required'],
            [['Authority'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'auth_key', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Uid' => 'Uid',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'Authority' => 'Authority',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
