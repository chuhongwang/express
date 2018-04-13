<?php
namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Password reset request form
 */
class PasswordForm extends Model
{
    public $id;
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['oldPassword', 'required', 'message' => '请输入旧密码'],
            ['newPassword', 'required', 'message' => '请输入新密码'],
            ['newPassword', 'string', 'min' => 6, 'tooShort' => '新密码长度至少为6个字符'],
            ['confirmPassword', 'compare', 'compareAttribute'=>'newPassword','message'=>'两次输入的密码不一致'],
        ];
    }

    public function changePassword(){
        $id = Yii::$app->user->id;
        $user =  User::findIdentity($id);
        if($user->validatePassword($this->oldPassword)){
            $user->setPassword($this->newPassword);
            if($user->save()){
                return true;
            }else{
                return false;
            }
        }else{
            Yii::$app->session->setFlash('error','旧密码错误' . $this->oldPassword);
            return false;
        }
    }

    public function changeUserPassword($id){
        $manager_id = Yii::$app->user->id;
        $manager = User::findIdentity($manager_id);

        if($manager){
            $user = User::findIdentity($id);

            $user->setPassword($this->newPassword);
            if($user->save()){
                Yii::$app->session->setFlash('success','修改密码成功');
                return true;
            }else{
                return false;
            }
        } else {
            Yii::$app->session->setFlash('error','您无此权限,请联系管理员!');
        }

    }
}
