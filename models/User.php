<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $authKey
 * @property string $password write-only password
 * @property string $Host [char(255)]
 * @property string $User [char(32)]
 * @property string $Select_priv [enum('N', 'Y')]
 * @property string $Insert_priv [enum('N', 'Y')]
 * @property string $Update_priv [enum('N', 'Y')]
 * @property string $Delete_priv [enum('N', 'Y')]
 * @property string $Create_priv [enum('N', 'Y')]
 * @property string $Drop_priv [enum('N', 'Y')]
 * @property string $Reload_priv [enum('N', 'Y')]
 * @property string $Shutdown_priv [enum('N', 'Y')]
 * @property string $Process_priv [enum('N', 'Y')]
 * @property string $File_priv [enum('N', 'Y')]
 * @property string $Grant_priv [enum('N', 'Y')]
 * @property string $References_priv [enum('N', 'Y')]
 * @property string $Index_priv [enum('N', 'Y')]
 * @property string $Alter_priv [enum('N', 'Y')]
 * @property string $Show_db_priv [enum('N', 'Y')]
 * @property string $Super_priv [enum('N', 'Y')]
 * @property string $Create_tmp_table_priv [enum('N', 'Y')]
 * @property string $Lock_tables_priv [enum('N', 'Y')]
 * @property string $Execute_priv [enum('N', 'Y')]
 * @property string $Repl_slave_priv [enum('N', 'Y')]
 * @property string $Repl_client_priv [enum('N', 'Y')]
 * @property string $Create_view_priv [enum('N', 'Y')]
 * @property string $Show_view_priv [enum('N', 'Y')]
 * @property string $Create_routine_priv [enum('N', 'Y')]
 * @property string $Alter_routine_priv [enum('N', 'Y')]
 * @property string $Create_user_priv [enum('N', 'Y')]
 * @property string $Event_priv [enum('N', 'Y')]
 * @property string $Trigger_priv [enum('N', 'Y')]
 * @property string $Create_tablespace_priv [enum('N', 'Y')]
 * @property string $ssl_type [enum('', 'ANY', 'X509', 'SPECIFIED')]
 * @property string $ssl_cipher [blob]
 * @property string $x509_issuer [blob]
 * @property string $x509_subject [blob]
 * @property string $max_questions [int unsigned]
 * @property string $max_updates [int unsigned]
 * @property string $max_connections [int unsigned]
 * @property string $max_user_connections [int unsigned]
 * @property string $plugin [char(64)]
 * @property string $authentication_string
 * @property string $password_expired [enum('N', 'Y')]
 * @property int $password_last_changed [timestamp]
 * @property string $password_lifetime [smallint unsigned]
 * @property string $account_locked [enum('N', 'Y')]
 * @property string $Create_role_priv [enum('N', 'Y')]
 * @property string $Drop_role_priv [enum('N', 'Y')]
 * @property string $Password_reuse_history [smallint unsigned]
 * @property string $Password_reuse_time [smallint unsigned]
 * @property string $Password_require_current [enum('N', 'Y')]
 * @property string $User_attributes [json]
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     * @throws Exception
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     * @throws Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}