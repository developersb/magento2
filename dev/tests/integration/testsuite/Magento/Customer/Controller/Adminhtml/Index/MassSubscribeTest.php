<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Customer\Controller\Adminhtml\Index;

use Magento\Backend\Model\Session;
use Magento\Framework\Message\MessageInterface;
use Magento\Newsletter\Model\Subscriber;
use Magento\Newsletter\Model\SubscriberFactory;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;

/**
 * @magentoAppArea adminhtml
 */
class MassSubscribeTest extends \Magento\TestFramework\TestCase\AbstractBackendController
{
    /**
     * Base controller URL
     *
     * @var string
     */
    protected $baseControllerUrl = 'http://localhost/index.php/backend/customer/index/index';

    protected function tearDown()
    {
        /**
         * Unset customer data
         */
        Bootstrap::getObjectManager()->get(Session::class)->setCustomerData(null);

        /**
         * Unset messages
         */
        Bootstrap::getObjectManager()->get(Session::class)->getMessages(true);
    }

    /**
     * Tests subscriber status of customers.
     *
     * @magentoDataFixture Magento/Customer/_files/five_repository_customers.php
     * @magentoDbIsolation disabled
     */
    public function testMassSubscriberAction()
    {
        /** @var SubscriberFactory $subscriberFactory */
        $subscriberFactory = Bootstrap::getObjectManager()->get(SubscriberFactory::class);
        $customerRepository = Bootstrap::getObjectManager()->get(CustomerRepositoryInterface::class);

        $this->assertNull(
            $subscriberFactory->create()
                ->loadByEmail('customer1@example.com')
                ->getSubscriberStatus()
        );
        $this->assertNull(
            $subscriberFactory->create()
                ->loadByEmail('customer2@example.com')
                ->getSubscriberStatus()
        );

        /** @var CustomerInterface $customer1 */
        $customer1 = $customerRepository->get('customer1@example.com');
        /** @var CustomerInterface $customer2 */
        $customer2 = $customerRepository->get('customer2@example.com');

<<<<<<< HEAD
        /** @var \Magento\Framework\Data\Form\FormKey $formKey */
        $formKey = $this->_objectManager->get(\Magento\Framework\Data\Form\FormKey::class);

=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        $params = [
            'selected' => [
                $customer1->getId(),
                $customer2->getId(),
            ],
            'namespace' => 'customer_listing',
<<<<<<< HEAD
            'form_key' => $formKey->getFormKey()
        ];

        $this->getRequest()->setParams($params);
        $this->getRequest()->setMethod('POST');
=======
        ];
        $this->getRequest()->setParams($params);
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3

        $this->dispatch('backend/customer/index/massSubscribe');

        // Assertions
        $this->assertRedirect($this->stringStartsWith($this->baseControllerUrl));
        $this->assertSessionMessages(
            self::equalTo(['A total of 2 record(s) were updated.']),
            MessageInterface::TYPE_SUCCESS
        );
        $this->assertEquals(
            Subscriber::STATUS_SUBSCRIBED,
            $subscriberFactory->create()
                ->loadByEmail('customer1@example.com')
                ->getSubscriberStatus()
        );
        $this->assertEquals(
            Subscriber::STATUS_SUBSCRIBED,
            $subscriberFactory->create()
                ->loadByEmail('customer2@example.com')
                ->getSubscriberStatus()
        );
    }

    /**
     * @magentoAppIsolation enabled
     * @magentoDbIsolation enabled
     */
    public function testMassSubscriberActionNoSelection()
    {
<<<<<<< HEAD
        /** @var \Magento\Framework\Data\Form\FormKey $formKey */
        $formKey = $this->_objectManager->get(\Magento\Framework\Data\Form\FormKey::class);

        $params = [
            'namespace' => 'customer_listing',
            'form_key' => $formKey->getFormKey()
        ];

        $this->getRequest()->setParams($params);
        $this->getRequest()->setMethod('POST');
=======
        $params = [
            'namespace' => 'customer_listing'
        ];

        $this->getRequest()->setParams($params);
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        $this->dispatch('backend/customer/index/massSubscribe');

        $this->assertRedirect($this->stringStartsWith($this->baseControllerUrl));
        $this->assertSessionMessages(
<<<<<<< HEAD
            self::equalTo(['Please select item(s).']),
=======
            self::equalTo(['An item needs to be selected. Select and try again.']),
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            MessageInterface::TYPE_ERROR
        );
    }
}
