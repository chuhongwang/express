<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\common\models\UsersSign]].
 *
 * @see \common\models\UsersSign
 */
class UsersSignQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\UsersSign[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\UsersSign|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}