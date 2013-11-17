<?php

use Hybridauth\Hybridauth;

/**
 * Class HybridAuthComponent
 */
class HybridAuthComponent extends CApplicationComponent
{
    /**
     * @var string
     */
    public $action;
    /**
     * @var boolean
     */
    public $debugMode = false;
    /**
     * @var array
     */
    public $providers = array();

    /**
     * @var Hybridauth
     */
    private $hybridAuth;

    /**
     * Initialize the component
     */
    public function init()
    {
        if (null === $this->action) {
            throw new CException('Property "action" is not set for HybridAuth Component.');
        }

        $config = array(
            'base_url'   => Yii::app()->createAbsoluteUrl($this->action),
            'providers'  => $this->providers,
            'debug_mode' => $this->debugMode,
        );

        $this->hybridAuth = new Hybridauth($config);
    }

    /**
     * @return Hybridauth
     */
    public function getHybridAuth()
    {
        return $this->hybridAuth;
    }

    /**
     * @param string $providerId
     * @param array  $parameters
     *
     * @return mixed
     */
    public function authenticate($providerId, array $parameters = array())
    {
        return $this->hybridAuth->authenticate($providerId, $parameters);
    }
}