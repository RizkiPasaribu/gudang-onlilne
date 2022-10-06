<?php

namespace Aqilix\OAuth2\Entity;

/**
 * OauthClients
 */
class OauthClients
{
    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var string
     */
    private $redirectUri;

    /**
     * @var string|null
     */
    private $grantTypes;

    /**
     * @var string|null
     */
    private $scope;

    /**
     * @var string|null
     */
    private $userId;

    /**
     * @var string
     */
    private $clientId;


    /**
     * Set clientSecret.
     *
     * @param string $clientSecret
     *
     * @return OauthClients
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * Get clientSecret.
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Set redirectUri.
     *
     * @param string $redirectUri
     *
     * @return OauthClients
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * Get redirectUri.
     *
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * Set grantTypes.
     *
     * @param string|null $grantTypes
     *
     * @return OauthClients
     */
    public function setGrantTypes($grantTypes = null)
    {
        $this->grantTypes = $grantTypes;

        return $this;
    }

    /**
     * Get grantTypes.
     *
     * @return string|null
     */
    public function getGrantTypes()
    {
        return $this->grantTypes;
    }

    /**
     * Set scope.
     *
     * @param string|null $scope
     *
     * @return OauthClients
     */
    public function setScope($scope = null)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Get scope.
     *
     * @return string|null
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set userId.
     *
     * @param string|null $userId
     *
     * @return OauthClients
     */
    public function setUserId($userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId.
     *
     * @return string|null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set clientId.
     *
     * @param string $clientId
     *
     * @return OauthClients
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId.
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }
}
