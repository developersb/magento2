<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Customer\Controller\Adminhtml\Index;

use Magento\Backend\Model\Session;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use PHPUnit\Framework\Constraint\Constraint;
use Magento\Framework\Message\MessageInterface;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
=======
use Magento\Framework\App\Request\Http as HttpRequest;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
use Magento\TestFramework\TestCase\AbstractBackendController;

/**
 * @magentoAppArea adminhtml
 */
class MassDeleteTest extends AbstractBackendController
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * Base controller URL
     *
     * @var string
     */
    private $baseControllerUrl = 'http://localhost/index.php/backend/customer/index/index';

<<<<<<< HEAD
=======
    /**
     * @inheritDoc
     *
     * @throws \Magento\Framework\Exception\AuthenticationException
     */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    protected function setUp()
    {
        parent::setUp();
        $this->customerRepository = Bootstrap::getObjectManager()->get(CustomerRepositoryInterface::class);
    }

    /**
     * @inheritDoc
     */
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
     * Validates failure attempts to delete customers from grid.
     *
     * @param array|null $ids
     * @param Constraint $constraint
     * @param string|null $messageType
     * @magentoDataFixture Magento/Customer/_files/five_repository_customers.php
     * @magentoDbIsolation disabled
     * @dataProvider failedRequestDataProvider
     */
    public function testFailedMassDeleteAction($ids, Constraint $constraint, $messageType)
    {
        $this->massDeleteAssertions($ids, $constraint, $messageType);
    }

    /**
     * Validates success attempt to delete customer from grid.
     *
     * @param array $emails
     * @param Constraint $constraint
     * @param string $messageType
     * @magentoDataFixture Magento/Customer/_files/five_repository_customers.php
     * @magentoDbIsolation disabled
     * @dataProvider successRequestDataProvider
     */
    public function testSuccessMassDeleteAction(array $emails, Constraint $constraint, string $messageType)
    {
        $ids = [];
        foreach ($emails as $email) {
            /** @var CustomerInterface $customer */
            $customer = $this->customerRepository->get($email);
            $ids[] = $customer->getId();
        }

        $this->massDeleteAssertions(
            $ids,
            $constraint,
            $messageType
        );
    }

    /**
     * Performs required request and assertions.
     *
     * @param array|null $ids
     * @param Constraint $constraint
     * @param string|null $messageType
     */
    private function massDeleteAssertions($ids, Constraint $constraint, $messageType)
    {
<<<<<<< HEAD
        /** @var \Magento\Framework\Data\Form\FormKey $formKey */
        $formKey = $this->_objectManager->get(\Magento\Framework\Data\Form\FormKey::class);

        $requestData = [
            'selected' => $ids,
            'namespace' => 'customer_listing',
            'form_key' => $formKey->getFormKey()
        ];

        $this->getRequest()->setParams($requestData);
        $this->getRequest()->setMethod('POST');
=======
        $requestData = [
            'selected' => $ids,
            'namespace' => 'customer_listing',
        ];

        $this->getRequest()->setParams($requestData)->setMethod(HttpRequest::METHOD_POST);
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
        $this->dispatch('backend/customer/index/massDelete');
        $this->assertSessionMessages(
            $constraint,
            $messageType
        );
        $this->assertRedirect($this->stringStartsWith($this->baseControllerUrl));
    }

    /**
     * Provides sets of data for unsuccessful attempts.
     *
     * @return array
     */
    public function failedRequestDataProvider(): array
    {
        return [
            [
                'ids' => [],
<<<<<<< HEAD
                'constraint' => self::equalTo(['Please select item(s).']),
=======
                'constraint' => self::equalTo(['An item needs to be selected. Select and try again.']),
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
                'messageType' => MessageInterface::TYPE_ERROR,
            ],
            [
                'ids' => [111],
                'constraint' => self::isEmpty(),
                'messageType' => null,
            ],
            [
                'ids' => null,
<<<<<<< HEAD
                'constraint' => self::equalTo(['Please select item(s).']),
=======
                'constraint' => self::equalTo(['An item needs to be selected. Select and try again.']),
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
                'messageType' => MessageInterface::TYPE_ERROR,
            ]
        ];
    }

    /**
     * Provides sets of data for successful attempts.
     *
     * @return array
     */
    public function successRequestDataProvider(): array
    {
        return [
            [
                'customerEmails' => ['customer1@example.com'],
                'constraint' => self::equalTo(['A total of 1 record(s) were deleted.']),
                'messageType' => MessageInterface::TYPE_SUCCESS,
            ],
            [
                'customerEmails' => ['customer2@example.com', 'customer3@example.com'],
                'constraint' => self::equalTo(['A total of 2 record(s) were deleted.']),
                'messageType' => MessageInterface::TYPE_SUCCESS,
            ],
        ];
    }
}
