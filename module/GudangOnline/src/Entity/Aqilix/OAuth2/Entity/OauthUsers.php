<?php

namespace Aqilix\OAuth2\Entity;

/**
 * OauthUsers
 */
class OauthUsers
{
    /**
     * @var string|null
     */
    private $password;

    /**
     * @var string|null
     */
    private $firstName;

    /**
     * @var string|null
     */
    private $lastName;

    /**
     * @var string
     */
    private $username;

    /**
     * @var \User\Entity\Account
     */
    private $account;


    /**
     * Set password.
     *
     * @param string|null $password
     *
     * @return OauthUsers
     */
    public function setPassword($password = null)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set firstName.
     *
     * @param string|null $firstName
     *
     * @return OauthUsers
     */
    public function setFirstName($firstName = null)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string|null $lastName
     *
     * @return OauthUsers
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return OauthUsers
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set account.
     *
     * @param \User\Entity\Account|null $account
     *
     * @return OauthUsers
     */
    public function setAccount(\User\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account.
     *
     * @return \User\Entity\Account|null
     */
    public function getAccount()
    {
        return $this->account;
    }
}
