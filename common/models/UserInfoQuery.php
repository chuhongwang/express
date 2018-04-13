<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserInfo]].
 *
 * @see UserInfo
 */
class UserInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
    return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function getMaxUserId($sex)
    {
        $result = $this->select('max(ui_id) as ui_id')
            ->andWhere(['sex' => $sex])
            ->asArray()
            ->one();
        $reset_ui_id = $sex == 1 ? 8051 : 6051;

        $ui_id = empty($result['ui_id']) ? $reset_ui_id : $result['ui_id'] + 1;

        return $ui_id;
    }
}
