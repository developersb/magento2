<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Analytics\Model\Connector\ResponseHandler;

use Magento\Analytics\Model\AnalyticsToken;
<<<<<<< HEAD
use Magento\Analytics\Model\Connector\Http\ConverterInterface;
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
use Magento\Analytics\Model\Connector\Http\ResponseHandlerInterface;

/**
 * Stores access token to MBI that received in body.
 */
class SignUp implements ResponseHandlerInterface
{
    /**
     * @var AnalyticsToken
     */
    private $analyticsToken;

    /**
<<<<<<< HEAD
     * @var ConverterInterface
     */
    private $converter;

    /**
     * @param AnalyticsToken $analyticsToken
     * @param ConverterInterface $converter
     */
    public function __construct(
        AnalyticsToken $analyticsToken,
        ConverterInterface $converter
    ) {
        $this->analyticsToken = $analyticsToken;
        $this->converter = $converter;
=======
     * @param AnalyticsToken $analyticsToken
     */
    public function __construct(
        AnalyticsToken $analyticsToken
    ) {
        $this->analyticsToken = $analyticsToken;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    }

    /**
     * @inheritdoc
     */
    public function handleResponse(array $body)
    {
        if (isset($body['access-token']) && !empty($body['access-token'])) {
            $this->analyticsToken->storeToken($body['access-token']);
            return $body['access-token'];
        }

        return false;
    }
}
