<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use EasyWeChat\Foundation\Application;

class Controller extends BaseController
{
    public function index(Request $request){
        $url = ($request->input('url'));
        return $this->__getJssdkContent($url);
    }


    private function __getJssdkContent($url){
        $options = [
            'app_id'  => env('WX_APPID'),         // AppID
            'secret'  => env('WX_APPSECRET'),     // AppSecret
            'token'   => '',          // Token
            'aes_key' => '',                    // EncodingAESKey
        ];

        $app = new Application($options);
        $js = $app['js'];
        $js->setUrl($url);

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
        ], env('WX_JSSDK_DEBUG', 'false'));

        return 'wx.config('. $jsContent .');';
    }
}
