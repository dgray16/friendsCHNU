<?php
namespace app\models\user;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

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
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const SCENARIO_REGISTER = 'register';

    public $password;
    public $password_repeat;

    private $image;

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

    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            self::SCENARIO_REGISTER => ['email', 'password', 'password_repeat']
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['password', 'password_repeat'], 'required', 'on' => self::SCENARIO_REGISTER],
            ['password_repeat', 'validateRepeat'],
            ['email', 'email'],
            ['email', 'unique'],
            ['username', 'default', 'value' => 'empty'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['avatar', 'file']
        ];
    }


    public function validateRepeat($attribute, $params)
    {
        if ($this->password !== $this->password_repeat) {
            $this->addError($attribute, Yii::t('common', 'Password must match'));
        }
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
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
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
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getInfo()
    {
        return $this->hasOne(UserInfo::className(), ['user_id' => 'id']);
    }

    public function upload()
    {
        $this->image = UploadedFile::getInstance($this, 'avatar');

        if ($this->image instanceof UploadedFile) {
            $path = Yii::getAlias('@webroot/uploads/avatar');
            $uploadPath = Yii::getAlias('@webroot/uploads');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath);
            }


            if (!is_dir($path)) {
                mkdir($path);
            }


            if (!$this->isNewRecord and $this->getOldAttribute('avatar')) {
                if (file_exists($path . '/' . $this->getOldAttribute('avatar'))) {
                    unlink($path . '/' . $this->getOldAttribute('avatar'));
                }
            }

            $fileName = md5(microtime()) . '.' . $this->image->extension;

            $this->image->saveAs($path . '/' . $fileName);
            $this->avatar = $fileName;

            return;
        }

        $this->avatar = $this->getOldAttribute('avatar');
    }

    public function getAvatarUrl()
    {
        if ($this->avatar) {
            return '/uploads/avatar/' . $this->avatar;
        }

        return '/images/no-avatar.jpg';
    }
}

?>