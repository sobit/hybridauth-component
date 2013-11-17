hybridauth-component
=====================

Component for [Yii Framework][1] based application which provides simple configuration interface for [HybridAuth library][2].

Installation
------------

Add dependency to your ```composer.json``` file:

```json
{
    "require": {
        "sobit/hybridauth-component": "dev-master"
    }
}
```

Update your ```protected/config/main.php``` file:

```php
<?php

Yii::setPathOfAlias('vendor', dirname(__FILE__) . '/../../vendor');

return array(
    'components' => array(
        'auth' => array(
            'class'     => 'vendor.sobit.hybridauth-component.HybridAuthComponent',
            'action'    => 'controller/action',
            'debugMode' => false,
            'providers' => array(
                'Google' => array(
                    'enabled' => true,
                    'keys'    => array('id' => '', 'secret' => ''),
                ),
                'Facebook' => array(
                    'enabled' => true,
                    'keys'    => array('id' => '', 'secret' => ''),
                    'scope'   => 'email, user_about_me, user_birthday, user_hometown',
                ),
                'Twitter' => array(
                    'enabled' => true,
                    'keys'    => array('id' => '', 'secret' => ''),
                ),
            ),
        ),
    ),
);
```

Usage
-----

Example:

```php
$twitter = Yii::app()->auth->authenticate('Twitter');
$userProfile = $twitter->getUserProfile();
echo sprintf('Hi there, %s!', $userProfile->displayName);
$twitter->setUserStatus('Hello, World!');
$userContacts = $twitter->getUserContacts();
```

[1]: https://github.com/yiisoft/yii "Yii Framework"
[2]: https://github.com/swiftmailer/swiftmailer "Swift Mailer"
