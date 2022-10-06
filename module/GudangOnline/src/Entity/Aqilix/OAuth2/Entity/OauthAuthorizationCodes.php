<?php

namespace Aqilix\OAuth2\Entity;

/**
 * OauthAuthorizationCodes
 */
class OauthAuthorizationCodes
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string|null
     */
    private $userId;

    /**
     * @var string|null
     */
    private $redirectUri;

    /**
     * @var \DateTime
     */
    private $expires = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     */
    private $scope;

    /**
     * @var string|null
     */
    private $idToken;

    /**
     * @var string
     */
    private $authorizationCode;


    /**
     * Set clientId.
     *
     * @param string $clientId
     *
     * @return OauthAuthorizationCodes
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

    /**
     * Set userId.
     *
     * @param string|null $userId
     *
     * @return OauthAuthorizationCodes
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
     * Set redirectUri.
     *
     * @param string|null $redirectUri
     *
     * @return OauthAuthorizationCodes
     */
    public function setRedirectUri($redirectUri = null)
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * Get redirectUri.
     *
     * @return string|null
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * Set expires.
     *
     * @param \DateTime $expires
     *
     * @return OauthAuthorizationCodes
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires.
     *
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set scope.
     *
     * @param string|null $scope
     *
     * @return OauthAuthorizationCodes
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
     * Set idToken.
     *
     * @param string|null $idToken
     *
     * @return OauthAuthorizationCodes
     */
    public function setIdToken($idToken = null)
    {
        $this->idToken = $idToken;

        return $this;
    }

    /**
     * Get idToken.
     *
     * @return string|null
     */
    public function getIdToken()
    {
        return $this->idToken;
    }

    /**
     * Get authorizationCode.
     *
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }
}
