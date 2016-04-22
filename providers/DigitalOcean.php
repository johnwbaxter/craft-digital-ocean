<?php

namespace Dukt\OAuth\Providers;

use Craft\Craft;
use Craft\UrlHelper;
use Craft\Oauth_ResourceOwnerModel;
use Dukt\OAuth\Providers\BaseProvider;

class DigitalOcean extends BaseProvider
{
    /**
     * Plugin Name.
     *
     * @return string
     */
    public function getName()
    {
        return 'Digital Ocean';
    }

    /**
     * Icon URL.
     *
     * @return mixed
     */
    public function getIconUrl()
    {
        return UrlHelper::getResourceUrl('digitalocean/icon.svg');
    }

    /**
     * OAuth Version.
     *
     * @return int
     */
    public function getOauthVersion()
    {
        return 2;
    }

    /**
     * Create the Provider for OAuth
     *
     * @return \ChrisHemmings\OAuth2\Client\Provider\DigitalOcean
     */
    public function createProvider()
    {
        return new \ChrisHemmings\OAuth2\Client\Provider\DigitalOcean([
            'clientId' => $this->providerInfos->clientId,
            'clientSecret' => $this->providerInfos->clientSecret,
        ]);
    }

    /**
     * Get URL to manage resources.
     *
     * @return string
     */
    public function getManagerUrl()
    {
        return 'https://cloud.digitalocean.com/settings/api/applications';
    }

    /**
     * URL to the scope documentation.
     * 
     * @return string
     */
    public function getScopeDocsUrl()
    {
        return 'https://developers.digitalocean.com/documentation/oauth/#scopes';
    }
}