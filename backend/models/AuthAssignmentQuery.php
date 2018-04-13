<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[\common\models\ultron\AuthAssignment]].
 *
 * @see \common\models\ultron\AuthAssignment
 */
class AuthAssignmentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ultron\AuthAssignment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ultron\AuthAssignment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function getItemName($userid)
    {
        $data=$this->select('item_name')->where(['user_id'=>$userid])->asArray()->all();
        $res='';
        foreach($data as $value){
            $res.=$value['item_name'].',';
        }
        $item=explode(',',$res);
       return $item;
    }
}
