<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Ui\Test\Unit\Controller\Adminhtml\Index;

use Magento\Ui\Controller\Adminhtml\Index\Render;
<<<<<<< HEAD
=======
use Magento\Ui\Model\UiComponentTypeResolver;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;

/**
 * Test for Magento\Ui\Controller\Adminhtml\Index\Render
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class RenderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Render
     */
    private $render;

    /**
     * @var ObjectManagerHelper
     */
    private $objectManagerHelper;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $requestMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $responseMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $uiFactoryMock;

    /**
     * @var \Magento\Backend\App\Action\Context|\PHPUnit_Framework_MockObject_MockObject
     */
    private $contextMock;

    /**
     * @var \Magento\Framework\AuthorizationInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $authorizationMock;

    /**
     * @var \Magento\Backend\Model\Session|\PHPUnit_Framework_MockObject_MockObject
     */
    private $sessionMock;

    /**
     * @var \Magento\Framework\App\ActionFlag|\PHPUnit_Framework_MockObject_MockObject
     */
    private $actionFlagMock;

    /**
     * @var \Magento\Backend\Helper\Data|\PHPUnit_Framework_MockObject_MockObject
     */
    private $helperMock;

    /**
     * @var ContextInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $uiComponentContextMock;

    /**
     * @var \Magento\Framework\View\Element\UiComponent\DataProvider\DataProviderInterface|
     *      \PHPUnit_Framework_MockObject_MockObject
     */
    private $dataProviderMock;

    /**
     * @var \Magento\Framework\View\Element\UiComponentInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $uiComponentMock;

    /**
<<<<<<< HEAD
=======
     * @var \PHPUnit_Framework_MockObject_MockObject|UiComponentTypeResolver
     */
    private $uiComponentTypeResolverMock;

    /**
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @var \Magento\Framework\Controller\Result\JsonFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    private $resultJsonFactoryMock;

    /**
     * @var \Psr\Log\LoggerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $loggerMock;

<<<<<<< HEAD
    /**
     * @inheritdoc
     */
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    protected function setUp()
    {
        $this->requestMock = $this->getMockBuilder(\Magento\Framework\App\Request\Http::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->responseMock = $this->getMockBuilder(\Magento\Framework\App\Response\Http::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->contextMock = $this->getMockBuilder(\Magento\Backend\App\Action\Context::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->uiFactoryMock = $this->getMockBuilder(\Magento\Framework\View\Element\UiComponentFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->authorizationMock = $this->getMockBuilder(\Magento\Framework\AuthorizationInterface::class)
            ->getMockForAbstractClass();
        $this->sessionMock = $this->getMockBuilder(\Magento\Backend\Model\Session::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->actionFlagMock = $this->getMockBuilder(\Magento\Framework\App\ActionFlag::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->helperMock = $this->getMockBuilder(\Magento\Backend\Helper\Data::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->uiComponentContextMock = $this->getMockForAbstractClass(
            ContextInterface::class
        );
        $this->dataProviderMock = $this->getMockForAbstractClass(
            \Magento\Framework\View\Element\UiComponent\DataProvider\DataProviderInterface::class
        );
        $this->uiComponentMock = $this->getMockForAbstractClass(
            \Magento\Framework\View\Element\UiComponentInterface::class,
            [],
            '',
            false,
            true,
            true,
            ['render']
        );

        $this->resultJsonFactoryMock = $this->getMockBuilder(
            \Magento\Framework\Controller\Result\JsonFactory::class
        )
            ->disableOriginalConstructor()
            ->getMock();

        $this->loggerMock = $this->getMockForAbstractClass(\Psr\Log\LoggerInterface::class);

        $this->contextMock->expects($this->any())
            ->method('getRequest')
            ->willReturn($this->requestMock);
        $this->contextMock->expects($this->any())
            ->method('getResponse')
            ->willReturn($this->responseMock);
        $this->contextMock->expects($this->any())
            ->method('getAuthorization')
            ->willReturn($this->authorizationMock);
        $this->contextMock->expects($this->any())
            ->method('getSession')
            ->willReturn($this->sessionMock);
        $this->contextMock->expects($this->any())
            ->method('getActionFlag')
            ->willReturn($this->actionFlagMock);
        $this->contextMock->expects($this->any())
            ->method('getHelper')
            ->willReturn($this->helperMock);
        $this->uiComponentContextMock->expects($this->once())
            ->method('getDataProvider')
            ->willReturn($this->dataProviderMock);
        $this->uiComponentTypeResolverMock = $this->getMockBuilder(UiComponentTypeResolver::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->objectManagerHelper = new ObjectManagerHelper($this);

        $this->render = $this->objectManagerHelper->getObject(
            \Magento\Ui\Controller\Adminhtml\Index\Render::class,
            [
                'context' => $this->contextMock,
                'factory' => $this->uiFactoryMock,
                'contentTypeResolver' => $this->uiComponentTypeResolverMock,
                'resultJsonFactory' => $this->resultJsonFactoryMock,
                'logger' => $this->loggerMock,
            ]
        );
    }

    public function testExecuteAjaxRequestException()
    {
        $name = 'test-name';
        $renderedData = '<html>data</html>';

        $this->requestMock->expects($this->any())
            ->method('getParam')
            ->with('namespace')
            ->willReturn($name);
        $this->requestMock->expects($this->any())
            ->method('getParams')
            ->willReturn([]);
        $this->responseMock->expects($this->once())
            ->method('appendBody')
            ->willThrowException(new \Exception('exception'));

        $jsonResultMock = $this->getMockBuilder(\Magento\Framework\Controller\Result\Json::class)
            ->disableOriginalConstructor()
            ->setMethods(['setData'])
            ->getMock();

        $this->resultJsonFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($jsonResultMock);

<<<<<<< HEAD
        $this->objectManagerHelper = new ObjectManagerHelper($this);

        $this->render = $this->objectManagerHelper->getObject(
            \Magento\Ui\Controller\Adminhtml\Index\Render::class,
            [
                'context' => $this->contextMock,
                'factory' => $this->uiFactoryMock,
                'resultJsonFactory' => $this->resultJsonFactoryMock,
                'logger' => $this->loggerMock
            ]
        );
=======
        $jsonResultMock->expects($this->once())
            ->method('setData')
            ->willReturnSelf();

        $this->loggerMock->expects($this->once())
            ->method('critical')
            ->willReturnSelf();

        $this->dataProviderMock->expects($this->once())
            ->method('getConfigData')
            ->willReturn([]);

        $this->uiComponentMock->expects($this->once())
            ->method('render')
            ->willReturn($renderedData);
        $this->uiComponentMock->expects($this->once())
            ->method('getChildComponents')
            ->willReturn([]);
        $this->uiComponentMock->expects($this->once())
            ->method('getContext')
            ->willReturn($this->uiComponentContextMock);
        $this->uiFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->uiComponentMock);

        $this->render->executeAjaxRequest();
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    }

    public function testExecuteAjaxRequestException()
    {
        $namespace = 'test-name';
        $renderedData = '<html>data</html>';

        $this->prepareComponent($namespace, $renderedData);
        $this->responseMock->expects($this->once())
            ->method('appendBody')
            ->willThrowException(new \Exception('exception'));
        $jsonResultMock = $this->getMockBuilder(\Magento\Framework\Controller\Result\Json::class)
            ->disableOriginalConstructor()
            ->setMethods(['setData'])
            ->getMock();
        $this->resultJsonFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($jsonResultMock);
        $jsonResultMock->expects($this->once())
            ->method('setData')
            ->willReturnSelf();
        $this->loggerMock->expects($this->once())
            ->method('critical')
            ->willReturnSelf();

        $this->render->executeAjaxRequest();
    }

    public function testExecuteAjaxJsonRequest()
    {
        $namespace = 'test-name';
        $renderedData = '{"data": "test"}';
        $acceptType = 'json';

        $this->prepareComponent($namespace, $renderedData, $acceptType);
        $this->responseMock->expects($this->any())
            ->method('appendBody')
            ->with($renderedData);
        $this->responseMock->expects($this->once())
            ->method('setHeader')
            ->with('Content-Type', 'application/json')
            ->willReturnSelf();

<<<<<<< HEAD
        $this->render->executeAjaxRequest();
    }

    public function testExecuteAjaxRequest()
    {
        $namespace = 'test-name';
        $renderedData = '<html>data</html>';

        $this->prepareComponent($namespace, $renderedData);
        $this->responseMock->expects($this->any())
            ->method('appendBody')
            ->with($renderedData);
        $this->responseMock->expects($this->never())
            ->method('setHeader')
            ->with('Content-type', 'application/json')
            ->willReturnSelf();
=======
        $this->uiComponentMock->expects($this->once())
            ->method('render')
            ->willReturn($renderedData);
        $this->uiComponentMock->expects($this->once())
            ->method('getChildComponents')
            ->willReturn([]);
        $this->uiComponentMock->expects($this->any())
            ->method('getContext')
            ->willReturn($this->uiComponentContextMock);
        $this->uiFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->uiComponentMock);
        $this->uiComponentTypeResolverMock->expects($this->once())
            ->method('resolve')
            ->with($this->uiComponentContextMock)
            ->willReturn('application/json');
        $this->responseMock->expects($this->once())->method('setHeader')
            ->with('Content-Type', 'application/json', true);
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3

        $this->render->executeAjaxRequest();
    }

    /**
     * @param array $dataProviderConfig
     * @param bool|null $isAllowed
     * @param int $authCallCount
     * @dataProvider executeAjaxRequestWithoutPermissionsDataProvider
     */
    public function testExecuteAjaxRequestWithoutPermissions(array $dataProviderConfig, $isAllowed, $authCallCount = 1)
    {
        $name = 'test-name';
        $renderedData = '<html>data</html>';

        $this->requestMock->expects($this->any())
            ->method('getParam')
            ->with('namespace')
            ->willReturn($name);
        $this->requestMock->expects($this->any())
            ->method('getParams')
            ->willReturn([]);
        if ($isAllowed === false) {
            $this->requestMock->expects($this->once())
                ->method('isAjax')
                ->willReturn(true);
        }
        $this->responseMock->expects($this->never())
            ->method('setRedirect');
        $this->responseMock->expects($this->any())
            ->method('appendBody')
            ->with($renderedData);

        $this->dataProviderMock->expects($this->once())
            ->method('getConfigData')
            ->willReturn($dataProviderConfig);

        $this->authorizationMock->expects($this->exactly($authCallCount))
            ->method('isAllowed')
            ->with(isset($dataProviderConfig['aclResource']) ? $dataProviderConfig['aclResource'] : null)
            ->willReturn($isAllowed);

        $this->uiComponentMock->expects($this->any())
            ->method('render')
            ->willReturn($renderedData);
        $this->uiComponentMock->expects($this->any())
            ->method('getChildComponents')
            ->willReturn([]);
        $this->uiComponentMock->expects($this->any())
            ->method('getContext')
            ->willReturn($this->uiComponentContextMock);
        $this->uiComponentContextMock->expects($this->any())
            ->method('getAcceptType')
            ->willReturn('html');
        $this->uiFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->uiComponentMock);

        $this->render->executeAjaxRequest();
    }

    /**
     * @return array
     */
    public function executeAjaxRequestWithoutPermissionsDataProvider()
    {
        $aclResource = 'Magento_Test::index_index';
        return [
            [
                'dataProviderConfig' => ['aclResource' => $aclResource],
                'isAllowed' => true
            ],
            [
                'dataProviderConfig' => ['aclResource' => $aclResource],
                'isAllowed' => false
            ],
            [
                'dataProviderConfig' => [],
                'isAllowed' => null,
                'authCallCount' => 0
            ],
        ];
    }

    /**
     * Prepare component mock.
     *
     * @param string $namespace
     * @param string $renderedData
     * @param string $acceptType
     * @return void
     */
    private function prepareComponent($namespace, $renderedData, $acceptType = 'html')
    {
        $this->requestMock->expects($this->any())
            ->method('getParam')
            ->with('namespace')
            ->willReturn($namespace);
        $this->requestMock->expects($this->any())
            ->method('getParams')
            ->willReturn([]);
        $this->dataProviderMock->expects($this->once())
            ->method('getConfigData')
            ->willReturn([]);
        $this->uiComponentMock->expects($this->once())
            ->method('render')
            ->willReturn($renderedData);
        $this->uiComponentMock->expects($this->once())
            ->method('getChildComponents')
            ->willReturn([]);
        $this->uiComponentMock->expects($this->exactly(2))
            ->method('getContext')
            ->willReturn($this->uiComponentContextMock);
        $this->uiComponentContextMock->expects($this->once())
            ->method('getAcceptType')
            ->willReturn($acceptType);
        $this->uiFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->uiComponentMock);
    }
}
