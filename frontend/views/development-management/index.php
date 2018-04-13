<?php
/**
 * Created by PhpStorm.
 * User: chuhuongwang
 * Date: 2017/11/13
 * Time: 17:24
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row" style="margin-top: 67px">
    <p style="text-align:right; padding-right: 70px"><span style="color: red">*</span>注意保密，请勿随意泄露~</p>
    <div class="panel-heading">
        <table class="table table-striped">
            <caption><b>测试环境：</b></caption>
            <tbody>
            <tr>
                <td style="width: 250px">测试auth_id </td>
                <td><?= $test_auth[0]['auth_id']?></td>
            </tr>
            <tr>
                <td style="width: 250px">测试auth_key</td>
                <td><?= $test_auth[0]['auth_key']?></td>
            </tr>
            <tr>
                <td style="width: 250px">测试环境地址</td>
                <td>https://api-sandbox.next.ylb.net</td>
            </tr>
            </tbody>
        </table>
    </div>


    <div class="panel-heading">
        <table class="table table-striped">
            <caption><b>正式环境：</b></caption>
            <tbody>
            <tr>
                <td style="width: 250px">正式auth_id</td>
                <td>234234</td>
            </tr>
            <tr>
                <td style="width: 250px"> 正式auth_key</td>
                <td>J435F84353NF7EH</td>
            </tr>
            <tr>
                <td style="width: 250px">正式环境地址</td>
                <td>https://api.next.ylb.net</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
