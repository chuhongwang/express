<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\common\models\HistoryRecord]].
 *
 * @see \common\models\HistoryRecord
 */
class HistoryRecordQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\HistoryRecord[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\HistoryRecord|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
