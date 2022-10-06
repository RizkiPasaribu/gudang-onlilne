<?php

namespace Aqilix\OAuth2\Entity;

/**
 * OauthJwt
 */
class OauthJwt
{
    /**
     * @var string|null
     */
    private $subject;

    /**
     * @var string|null
     */
    private $publicKey;

    /**
     * @var string
     */
    private $clientId;


    /**
     * Set subject.
     *
     * @param string|null $subject
     *
     * @return OauthJwt
     */
    public function setSubject($subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject.
     *
     * @return string|null
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set publicKey.
     *
     * @param string|null $publicKey
     *
     * @return OauthJwt
     */
    public function setPublicKey($publicKey = null)
    {
        $this->publicKey = $publicKey;

        return $this;
    }

    /**
     * Get publicKey.
     *
     * @return string|null
     */
    public function getPublicKey()
    {
        return $this->publicKey;
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
