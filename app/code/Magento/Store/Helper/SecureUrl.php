<?php
/***
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Store\Helper;

use Magento\Framework\Store\StoreManagerInterface;
use Magento\Framework\Store\ScopeInterface;

class SecureUrl implements \Magento\Framework\App\Router\SecureUrlInterface
{
    /** @var \Magento\Framework\App\Config\ScopeConfigInterface */
    private $scopeConfig;
    /** @var \Magento\Framework\Url\SecurityInfoInterface */
    private $urlSecurityInfo;
    /** @var StoreManagerInterface */
    private $storeManager;

    /**
     * @param \Magento\Framework\App\ResponseFactory $responseFactory
     * @param \Magento\Framework\UrlInterface $url
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Framework\Url\SecurityInfoInterface $urlSecurityInfo
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\App\ResponseFactory $responseFactory,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Url\SecurityInfoInterface $urlSecurityInfo,
        StoreManagerInterface $storeManager
    ) {

        $this->scopeConfig = $scopeConfig;
        $this->urlSecurityInfo = $urlSecurityInfo;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return string
     */
    public function getCurrentSecureUrl(\Magento\Framework\App\RequestInterface $request)
    {
        $alias = $request->getAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS) || $request->getPathInfo();
        return $this->storeManager->getStore()->getBaseUrl('link', true) . ltrim($alias, '/');
    }

    /**
     * {@inheritdoc}
     *
     * @param string $path
     * @return bool
     */
    public function shouldBeSecure($path)
    {
        return parse_url(
            $this->scopeConfig->getValue(
                StoreManagerInterface::XML_PATH_UNSECURE_BASE_URL,
                ScopeInterface::SCOPE_STORE
            ),
            PHP_URL_SCHEME
        ) === 'https'
        || $this->scopeConfig->isSetFlag(
            StoreManagerInterface::XML_PATH_SECURE_IN_FRONTEND,
            ScopeInterface::SCOPE_STORE
        ) && parse_url(
            $this->scopeConfig->getValue(
                StoreManagerInterface::XML_PATH_SECURE_BASE_URL,
                ScopeInterface::SCOPE_STORE
            ),
            PHP_URL_SCHEME
        ) == 'https' && $this->urlSecurityInfo->isSecure($path);
    }
}
