<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Braintree\Model\Ui;

use Magento\Braintree\Gateway\Config\Config;
use Magento\Braintree\Gateway\Request\PaymentDataBuilder;
use Magento\Braintree\Model\Adapter\BraintreeAdapterFactory;
use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\Session\SessionManagerInterface;

/**
 * Class ConfigProvider
 */
class ConfigProvider implements ConfigProviderInterface
{
    const CODE = 'braintree';

    const CC_VAULT_CODE = 'braintree_cc_vault';

    /**
     * @var Config
     */
    private $config;

    /**
     * @var BraintreeAdapterFactory
     */
    private $adapterFactory;

    /**
     * @var string
     */
    private $clientToken = '';

    /**
     * @var SessionManagerInterface
     */
    private $session;

    /**
     * Constructor
     *
     * @param Config $config
     * @param BraintreeAdapterFactory $adapterFactory
     * @param SessionManagerInterface $session
     */
    public function __construct(
        Config $config,
        BraintreeAdapterFactory $adapterFactory,
        SessionManagerInterface $session
    ) {
        $this->config = $config;
        $this->adapterFactory = $adapterFactory;
        $this->session = $session;
    }

    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */
    public function getConfig()
    {
        $storeId = $this->session->getStoreId();
        return [
            'payment' => [
                self::CODE => [
                    'isActive' => $this->config->isActive($storeId),
                    'clientToken' => $this->getClientToken(),
                    'ccTypesMapper' => $this->config->getCcTypesMapper(),
                    'sdkUrl' => $this->config->getSdkUrl(),
                    'countrySpecificCardTypes' => $this->config->getCountrySpecificCardTypeConfig($storeId),
                    'availableCardTypes' => $this->config->getAvailableCardTypes($storeId),
                    'useCvv' => $this->config->isCvvEnabled($storeId),
                    'environment' => $this->config->getEnvironment($storeId),
                    'kountMerchantId' => $this->config->getKountMerchantId($storeId),
                    'hasFraudProtection' => $this->config->hasFraudProtection($storeId),
                    'merchantId' => $this->config->getMerchantId($storeId),
<<<<<<< HEAD
                    'ccVaultCode' => self::CC_VAULT_CODE
=======
                    'ccVaultCode' => self::CC_VAULT_CODE,
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
                ],
                Config::CODE_3DSECURE => [
                    'enabled' => $this->config->isVerify3DSecure($storeId),
                    'thresholdAmount' => $this->config->getThresholdAmount($storeId),
<<<<<<< HEAD
                    'specificCountries' => $this->config->get3DSecureSpecificCountries($storeId)
=======
                    'specificCountries' => $this->config->get3DSecureSpecificCountries($storeId),
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
                ],
            ],
        ];
    }

    /**
     * Generate a new client token if necessary
     * @return string
     */
    public function getClientToken()
    {
        if (empty($this->clientToken)) {
            $params = [];

            $storeId = $this->session->getStoreId();
            $merchantAccountId = $this->config->getMerchantAccountId($storeId);
            if (!empty($merchantAccountId)) {
                $params[PaymentDataBuilder::MERCHANT_ACCOUNT_ID] = $merchantAccountId;
            }

            $this->clientToken = $this->adapterFactory->create($storeId)
                ->generate($params);
        }

        return $this->clientToken;
    }
}
