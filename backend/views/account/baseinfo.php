<?php
/**
 * @var $this yii\web\View
 */
$this->title = '基本资料';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    基本信息
                    </h5>
            </div>
            <div class="ibox-content">
                <form method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-lg-2 control-label">用户名</label>

                        <div class="col-lg-10"><p class="form-control-static"><?= $model->username?></p></div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label">邮箱</label>

                        <div class="col-lg-10"><p class="form-control-static"><?= $model->email?></p></div>
                    </div>


<!--                    <div class="hr-line-dashed"></div>-->
<!--                    <div class="form-group">-->
<!--                        <div class="col-sm-4 col-sm-offset-2">-->
<!--                            <button class="btn btn-primary" type="submit">保存</button>-->
<!--                        </div>-->
<!--                    </div>-->
                </form>
            </div>
        </div>
    </div>
</div>
