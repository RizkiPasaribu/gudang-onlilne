<?php

namespace Aqilix\OAuth2\Entity;

/**
 * OauthScopes
 */
class OauthScopes
{
    /**
     * @var string
     */
    private $type = 'supported';

    /**
     * @var string|null
     */
    private $scope;

    /**
     * @var string|null
     */
    private $clientId;

    /**
     * @var int|null
     */
    private $isDefault;

    /**
     * @var int
     */
    private $id;


    /**
     * Set type.
     *
     * @param string $type
     *
     * @return OauthScopes
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set scope.
     *
     * @param string|null $scope
     *
     * @return OauthScopes
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
     * Set clientId.
     *
     * @param string|null $clientId
     *
     * @return OauthScopes
     */
    public function setClientId($clientId = null)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId.
     *
     * @return string|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set isDefault.
     *
     * @param int|null $isDefault
     *
     * @return OauthScopes
     */
    public function setIsDefault($isDefault = null)
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Get isDefault.
     *
     * @return int|null
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
