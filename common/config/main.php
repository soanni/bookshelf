<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'modules' => [
        'class' => 'kartik\social\Module',
        'disqus' => [
            'settings' => ['shortname' => 'DISQUS_SHORTNAME']
        ],
        'facebook' => [
            'appId' => '1682848841952647',
            'secret' => '8918b4b78150aac0a40d97889f984ed9'
        ],
        'google' => [
            'clientId' => 'GOOGLE_API_CLIENT_ID',
            'pageId' => 'GOOGLE_PLUS_PAGE_ID',
            'profileId' => 'GOOGLE_PLUS_PROFILE_ID',
        ],
        'googleAnalytics' => [
            'id' => 'TRACKING_ID',
            'domain' => 'TRACKING_DOMAIN',
        ],
        'twitter' => [
            'screenName' => 'TWITTER_SCREEN_NAME'
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
