<?php

declare(strict_types=1);

use Mckenziearts\Notify\Enums\NotificationModel;
use Mckenziearts\Notify\Enums\NotificationType;

return [

    /*
    |--------------------------------------------------------------------------
    | Notification timeout
    |--------------------------------------------------------------------------
    |
    | Defines the number of seconds during which the notification will be visible.
    | You can set a default timeout or customize for each message type.
    |
    */

    'timeout' => env('NOTIFY_TIMEOUT', 5000),

    /*
    |--------------------------------------------------------------------------
    | Preset Messages
    |--------------------------------------------------------------------------
    |
    | Define any preset messages here that can be reused.
    | Available model: connect, drake, emotify, smiley, toast
    |
    */

    'preset-messages' => [
        'createuser' => [
            'type' => NotificationType::Success,
            'model' => NotificationModel::Toast,
            'title' => 'User Created',
            'message' => 'Thank you for using KynoCloud!',
            'duration' => 5000,
        ],
        'login' => [
            'type' => NotificationType::Success,
            'model' => NotificationModel::Toast,
            'title' => 'Login Successful',
            'message' => 'Welcome back!',
            'duration' => 5000,
        ],
        'logout' => [
            'type' => NotificationType::Info,
            'model' => NotificationModel::Toast,
            'message' => 'See you later!',
            'duration' => 5000,
        ],
        'error' => [
            'type' => NotificationType::Error,
            'model' => NotificationModel::Toast,
            'title' => 'Error',
            'message' => 'An error occurred.',
            'duration' => 5000,
        ],
    ],

];
