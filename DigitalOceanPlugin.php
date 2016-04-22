<?php

namespace Craft;

class DigitalOceanPlugin extends BasePlugin
{
    /**
     * Require the vendor autoload
     */
    public function init()
    {
        require_once(CRAFT_PLUGINS_PATH . 'digitalocean/vendor/autoload.php');

        parent::init();
    }

    /**
     * Get Name
     */
    public function getName()
    {
        return 'Digital Ocean';
    }

    /**
     * Plugins description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return 'Digital Ocean Provider for OAuth';
    }

    /**
     * Get Version
     */
    public function getVersion()
    {
        return '1.0.0';
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
     * Documentation URL
     *
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/venveo/craft-digital-ocean';
    }

    /**
     * URL to releases.json
     *
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/venveo/craft-digital-ocean/master/releases.json';
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
     * Get OAuth providers
     *
     * @return array
     */
    public function getOauthProviders()
    {
        require_once(CRAFT_PLUGINS_PATH . 'digitalocean/providers/DigitalOcean.php');

        return [
            'Dukt\OAuth\Providers\DigitalOcean',
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