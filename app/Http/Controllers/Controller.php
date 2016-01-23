<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use EasyWeChat\Foundation\Application;

class Controller extends BaseController
{
    public function index(){
        return $this->__getJssdkContent();
    }


    private function __getJssdkContent(){
        $options = [
            'app_id'  => env('WX_APPID'),         // AppID
            'secret'  => env('WX_APPSECRET'),     // AppSecret
            'token'   => '',          // Token
            'aes_key' => '',                    // EncodingAESKey
        ];

        $app = new Application($options);
        $js = $app['js'];

        $jsContent = $js->config([
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'onMenuShareQZone',
            'startRecord',
            'stopRecord',
            'onVoiceRecordEnd',
            'playVoice',
            'pauseVoice',
            'stopVoice',
            'onVoicePlayEnd',
            'uploadVoice',
            'downloadVoice',
            'chooseImage',
            'previewImage',
            'uploadImage',
            'downloadImage',
            'translateVoice',
            'getNetworkType',
            'openLocation',
            'getLocation',
            'hideOptionMenu',
            'showOptionMenu',
            'hideMenuItems',
            'showMenuItems',
            'hideAllNonBaseMenuItem',
            'showAllNonBaseMenuItem',
            'closeWindow',
            'scanQRCode',
            'chooseWXPay',
            'openProductSpecificView',
            'addCard',
            'chooseCard',
            'openCard'
        ], true);

        return '<script type="text/javascript" charset="utf-8">wx.config('. $jsContent .');</script>';
    }
}
