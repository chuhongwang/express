<?php
$this->title = 'API文档';
?>
<style>
#api_change_list a{
  font-size: 14px !important;
}
#content_main{
  margin-top: 60px;
  margin-left:-20px;
}
</style>
<div id="content_main">
<div class="col-md-3" id="api_change_list">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-id="1" class="api_change" data-parent="#accordion"
             href="#collapseOne">
              一 概述
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in">
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-id="2" class="api_change" data-parent="#accordion"
             href="#collapseTwo">
              二 说明
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse">
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-id="3" class="api_change" data-parent="#accordion"
             href="#collapseThree">
              三 名词解释
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse">
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion"
             href="#collapseFour">
                      四 业务场景
          </a>
        </h4>
      </div>
      <div id="collapseFour" class="panel-collapse collapse">
        <div class="panel-body">
          <div class="panel-heading">
              <h4 class="panel-title">
                  <a href="javascript:;" class="api_change" data-id='4'>
                      流程一
                  </a>
              </h4>
          </div>
          <div class="panel-heading">
              <h4 class="panel-title">
                  <a href="javascript:;" class="api_change" data-id='5'>
                      流程二
                  </a>
              </h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-9  col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading" id="api_title">概述</div>
        <div class="panel-body">
            <p id="api_content">
            概述概述概述概述概述概述概述概述概述概述概述概述
            </p>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.bootcss.com/jquery/2.2.2/jquery.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<?php
$js = <<<JS
$(".api_change").click(function(){
   id=$(this).attr('data-id');
    switch(id)
    {
        case '1':
          $("#api_title").html('概述');
          $("#api_content").html('<h1>123</h1><p>概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概述概</p>');
          break;
        case '2':
          $("#api_title").html('说明');
          $("#api_content").html('说明');
          break;
        case '3':
          $("#api_title").html('名词解释');
          $("#api_content").html('名词解释');
          break;
        case '4':
          $("#api_title").html('业务场景 场景1');
          $("#api_content").html('业务场景 场景1');
          break;
        case '5':
          $("#api_title").html('业务场景 场景2');
          $("#api_content").html('业务场景 场景2');
          break;
        default:
          $("#api_title").html('');
          $("#api_content").html('');
          break;
    }
});
JS;
$this->registerJs($js);
?>