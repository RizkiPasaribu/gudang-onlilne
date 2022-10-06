<?php

namespace Aqilix\OAuth2\Entity;

/**
 * OauthRefreshTokens
 */
class OauthRefreshTokens
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
     * @var \DateTime
     */
    private $expires = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     */
    private $scope;

    /**
     * @var string
     */
    private $refreshToken;


    /**
     * Set clientId.
     *
     * @param string $clientId
     *
     * @return OauthRefreshTokens
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
     * @return OauthRefreshTokens
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
     * Set expires.
     *
     * @param \DateTime $expires
     *
     * @return OauthRefreshTokens
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
     * @return OauthRefreshTokens
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
     * Set refreshToken.
     *
     * @param string $refreshToken
     *
     * @return OauthRefreshTokens
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;

        return $this;
    }

    /**
     * Get refreshToken.
     *
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }
}
