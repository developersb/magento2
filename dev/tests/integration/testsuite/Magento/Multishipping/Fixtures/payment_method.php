<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\ObjectManager;
use Magento\Quote\Api\Data\PaymentInterface;

/**
 * @var Magento\Quote\Model\Quote $quote
 */

if (empty($quote)) {
    throw new \Exception('$quote should be defined in the parent fixture');
}

/** @var ObjectManager $objectManager */
$objectManager = Bootstrap::getObjectManager();

/** @var PaymentInterface $payment */
$payment = $objectManager->create(PaymentInterface::class);
$payment->setMethod('checkmo');

$quote->setPayment($payment);
