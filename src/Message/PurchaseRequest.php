<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\Ideal\Message;

/**
 * iDeal Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('issuer', 'amount', 'currency', 'returnUrl', 'language', 'expirationPeriod');

        $data = $this->getBaseData('AcquirerTrxReq');
        $data->Issuer->issuerID = $this->getIssuer();
        $data->Merchant->merchantID = $this->getMerchantId();
        $data->Merchant->subID = $this->getSubId();
        $data->Merchant->merchantReturnURL = $this->getReturnUrl();
        $data->Transaction->purchaseID = $this->getTransactionId();
        $data->Transaction->amount = $this->getAmount();
        $data->Transaction->currency = $this->getCurrency();
        $data->Transaction->expirationPeriod = $this->getExpirationPeriod();
        $data->Transaction->language = $this->getLanguage();
        $data->Transaction->description = $this->getDescription();
        $data->Transaction->entranceCode = sha1(uniqid());

        return $data;
    }

    public function parseResponse(\Omnipay\Common\Message\RequestInterface $request, $data){
        return new PurchaseResponse($request, $data);
    }
}
