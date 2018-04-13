<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\common\models\Express]].
 *
 * @see \common\models\Express
 */
class ExpressQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Express[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Express|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
