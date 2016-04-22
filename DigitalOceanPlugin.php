<?php

namespace Craft;

require_once(CRAFT_PLUGINS_PATH . 'digitalocean/vendor/autoload.php');

class DigitalOceanPlugin extends BasePlugin
{
    /**
     * Get Name
     */
    public function getName()
    {
        return Craft::t('Digital Ocean');
    }

    /**
     * Plugins description.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Digital Ocean Provider for OAuth');
    }

    /**
     * Get Version
     */
    public function getVersion()
    {
        return '2.0.0';
    }

    /**
     * Get Developer
     */
    public function getDeveloper()
    {
        return 'Venveo';
    }

    /**
     * Get Developer URL
     */
    public function getDeveloperUrl()
    {
        return 'https://www.venveo.com';
    }

    /**
     * Returns required plugins
     *
     * @return array Required plugins
     */
    public function getRequiredPlugins()
    {
        return array(
            array(
                'name' => "OAuth",
                'handle' => 'oauth',
                'url' => 'https://dukt.net/craft/oauth',
                'version' => '2.0.0'
            )
        );
    }

    /**
     * Get OAuth Providers
     */
    public function getOauthProviders()
    {
        require_once(CRAFT_PLUGINS_PATH . 'digitalocean/providers/DigitalOcean.php');

        return [
            'Dukt\OAuth\Providers\Azure',
        ];

    }

    /**
     * Remove all tokens related to this plugin when uninstalled
     */
    public function onBeforeUninstall()
    {
        if (isset(craft()->oauth)) {
            craft()->oauth->deleteTokensByPlugin('digitalocean');
        }
    }
}