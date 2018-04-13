<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[PeopleCheck]].
 *
 * @see PeopleCheck
 */
class PeopleCheckQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PeopleCheck[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PeopleCheck|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
