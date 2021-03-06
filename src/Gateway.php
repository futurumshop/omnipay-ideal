<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\Ideal;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;

/**
 * iDeal Gateway
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'iDeal';
    }

    public function getDefaultParameters()
    {
        return array(
            'acquirer' => array('', 'ing', 'rabobank'),
            'merchantId' => '',
            'publicKeyPath' => '',
            'privateKeyPath' => '',
            'privateKeyPassphrase' => '',
            'testMode' => false,
            'language' => '',
            'description' => '',
            'expirationPeriod' => '',
            'returnURL' => ''
        );
    }

    public function getAcquirer()
    {
        return $this->getParameter('acquirer');
    }

    public function setAcquirer($value)
    {
        return $this->setParameter('acquirer', $value);
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getSubId()
    {
        return $this->getParameter('subId');
    }

    public function setSubId($value)
    {
        return $this->setParameter('subId', $value);
    }

    public function getPublicKeyPath()
    {
        return $this->getParameter('publicKeyPath');
    }

    public function setPublicKeyPath($value)
    {
        return $this->setParameter('publicKeyPath', $value);
    }

    public function getPrivateKeyPath()
    {
        return $this->getParameter('privateKeyPath');
    }

    public function setPrivateKeyPath($value)
    {
        return $this->setParameter('privateKeyPath', $value);
    }

    public function getPrivateKeyPassphrase()
    {
        return $this->getParameter('privateKeyPassphrase');
    }

    public function setPrivateKeyPassphrase($value)
    {
        return $this->setParameter('privateKeyPassphrase', $value);
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    public function setExpirationPeriod($value)
    {
        return $this->setParameter('expirationPeriod', $value);
    }

    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
    }

    public function setReturnUrl($value)
    {
        return $this->setParameter('returnURL', $value);
    }

    public function fetchIssuers(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Ideal\Message\FetchIssuersRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Ideal\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Ideal\Message\CompletePurchaseRequest', $parameters);
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function completeAuthorize(array $options = []): RequestInterface
    {
        return parent::completeAuthorize($options);
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function authorize(array $options = []): RequestInterface
    {
        return parent::authorize($options);
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function void(array $options = []): RequestInterface
    {
        return parent::void($options);
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function capture(array $options = []): RequestInterface
    {
        return parent::capture($options);
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function createCard(array $options = []): RequestInterface
    {
        return parent::createCard($options);
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function updateCard(array $options = []): RequestInterface
    {
        return parent::updateCard($options);
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function deleteCard(array $options = []): RequestInterface
    {
        return parent::deleteCard($options);
    }

    /**
     * @param array $options
     * @return RequestInterface
     */
    public function refund(array $options = []): RequestInterface
    {
        return parent::refund($options);
    }
}
