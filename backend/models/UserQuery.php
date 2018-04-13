<?php

namespace backend\models;

use yii\helpers\ArrayHelper;

/**
 * This is the ActiveQuery class for [[\common\models\AcUser]].
 *
 * @see \common\models\AcUser
 */
class UserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    public function getUserName($user_id)
    {
        return $this->select('username')->where(['id' => $user_id])->asArray()->one();
    }

    /**
     * 按名字查询
     * @version 1.0
     * @param $name
     * @return $this
     */
    public function getQueryByName($name)
    {
        return $this->select('id')->where(['like', 'username', $name]);
    }

    /**
     * @version 1.0
     * @param $ids
     * @return array
     */
    public function getNameMapByIds($ids)
    {
        $map = [];

        $list = $this->where(['id' => $ids])->select(['id', 'username'])->all();

        if (!empty($list)) {
            $map = ArrayHelper::map($list, 'id', 'username');
        }

        return $map;
    }

    /**
     * @inheritdoc
     * @return \common\models\AcUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\AcUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * 获取所有部门中我部门之外的所有的人
     */
    public function getNotMyDepPeList($item_name)
    {
        return $this->joinWith('authAssignment au')
            ->select('id,username')
            ->Where(['!=', 'au.item_name', $item_name])
            ->andWhere(['like', 'au.item_name', '部门'])
            ->all();
    }


    /**
     * 获取所有部门中我部门的所有的人
     */
    public function getMyDepPeList($item_name)
    {
        return $this->joinWith('authAssignment au')
            ->select('id,username')
            ->Where(['au.item_name' => $item_name])
            ->all();
    }

    public function getId($username)
    {
        $userid = $this->select('id')->where(['username' => $username])->asArray()->one();
        return $userid['id'];
    }

    public function getData($data)
    {
        $userid = $this->select('id')->where(['like','username', $data])->orFilterWhere(['id' => $data])->asArray()->one();
        return $userid['id'];
    }

}