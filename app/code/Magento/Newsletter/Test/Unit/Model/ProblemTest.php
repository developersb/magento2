<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Newsletter\Test\Unit\Model;

use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Newsletter\Model\Problem as ProblemModel;
use Magento\Newsletter\Model\Queue;
use Magento\Newsletter\Model\ResourceModel\Problem as ProblemResource;
use Magento\Newsletter\Model\Subscriber;
use Magento\Newsletter\Model\SubscriberFactory;

<<<<<<< HEAD
=======
/**
 * Class ProblemTest
 */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
class ProblemTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Context|\PHPUnit_Framework_MockObject_MockObject
     */
    private $contextMock;

    /**
     * @var Registry|\PHPUnit_Framework_MockObject_MockObject
     */
    private $registryMock;

    /**
     * @var SubscriberFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    private $subscriberFactoryMock;

    /**
     * @var Subscriber|\PHPUnit_Framework_MockObject_MockObject
     */
    private $subscriberMock;

    /**
     * @var ProblemResource|\PHPUnit_Framework_MockObject_MockObject
     */
    private $resourceModelMock;

    /**
     * @var AbstractDb|\PHPUnit_Framework_MockObject_MockObject
     */
    private $abstractDbMock;

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var ProblemModel
     */
    private $problemModel;

<<<<<<< HEAD
=======
    /**
     * @inheritdoc
     */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    protected function setUp()
    {
        $this->contextMock = $this->getMockBuilder(Context::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->registryMock = $this->getMockBuilder(Registry::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->subscriberFactoryMock = $this->getMockBuilder(SubscriberFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->subscriberMock = $this->getMockBuilder(Subscriber::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->resourceModelMock = $this->getMockBuilder(ProblemResource::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->abstractDbMock = $this->getMockBuilder(AbstractDb::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->resourceModelMock->expects($this->any())
            ->method('getIdFieldName')
            ->willReturn('id');

        $this->objectManager = new ObjectManager($this);

        $this->problemModel = $this->objectManager->getObject(
            ProblemModel::class,
            [
                'context' => $this->contextMock,
                'registry' => $this->registryMock,
                'subscriberFactory' => $this->subscriberFactoryMock,
                'resource' => $this->resourceModelMock,
                'resourceCollection' => $this->abstractDbMock,
                'data' => [],
            ]
        );
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    public function testAddSubscriberData()
    {
        $subscriberId = 1;
        $this->subscriberMock->expects($this->once())
            ->method('getId')
            ->willReturn($subscriberId);

        $result = $this->problemModel->addSubscriberData($this->subscriberMock);

        self::assertEquals($result, $this->problemModel);
        self::assertEquals($subscriberId, $this->problemModel->getSubscriberId());
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    public function testAddQueueData()
    {
        $queueId = 1;
        $queueMock =  $this->getMockBuilder(Queue::class)
            ->disableOriginalConstructor()
            ->getMock();
        $queueMock->expects($this->once())
            ->method('getId')
            ->willReturn($queueId);

        $result = $this->problemModel->addQueueData($queueMock);

        self::assertEquals($result, $this->problemModel);
        self::assertEquals($queueId, $this->problemModel->getQueueId());
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    public function testAddErrorData()
    {
        $exceptionMessage = 'Some message';
        $exceptionCode = 111;
        $exception = new \Exception($exceptionMessage, $exceptionCode);

        $result = $this->problemModel->addErrorData($exception);

        self::assertEquals($result, $this->problemModel);
        self::assertEquals($exceptionMessage, $this->problemModel->getProblemErrorText());
        self::assertEquals($exceptionCode, $this->problemModel->getProblemErrorCode());
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    public function testGetSubscriberWithNoSubscriberId()
    {
        self::assertNull($this->problemModel->getSubscriber());
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    public function testGetSubscriber()
    {
        $this->setSubscriber();
        self::assertEquals($this->subscriberMock, $this->problemModel->getSubscriber());
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    public function testUnsubscribeWithNoSubscriber()
    {
        $this->subscriberMock->expects($this->never())
            ->method('__call')
            ->with($this->equalTo('setSubscriberStatus'));

        $result = $this->problemModel->unsubscribe();

        self::assertEquals($this->problemModel, $result);
    }

<<<<<<< HEAD
=======
    /**
     * @return void
     */
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    public function testUnsubscribe()
    {
        $this->setSubscriber();
        $this->subscriberMock->expects($this->at(1))
            ->method('__call')
            ->with($this->equalTo('setSubscriberStatus'), $this->equalTo([Subscriber::STATUS_UNSUBSCRIBED]))
            ->willReturnSelf();
        $this->subscriberMock->expects($this->at(2))
            ->method('__call')
            ->with($this->equalTo('setIsStatusChanged'))
            ->willReturnSelf();
        $this->subscriberMock->expects($this->once())
            ->method('save');

        $result = $this->problemModel->unsubscribe();

        self::assertEquals($this->problemModel, $result);
    }

    /**
     * Sets subscriber to the Problem model
     */
    private function setSubscriber()
    {
        $subscriberId = 1;
        $this->problemModel->setSubscriberId($subscriberId);
        $this->subscriberFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->subscriberMock);
        $this->subscriberMock->expects($this->once())
            ->method('load')
            ->with($subscriberId)
            ->willReturnSelf();
    }
}
