<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Catalog\Test\Unit\Controller\Adminhtml\Product\Attribute;

use Magento\Catalog\Controller\Adminhtml\Product\Attribute\Validate;
use Magento\Framework\Serialize\Serializer\FormData;
use Magento\Catalog\Model\ResourceModel\Eav\Attribute;
use Magento\Catalog\Test\Unit\Controller\Adminhtml\Product\AttributeTest;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Framework\Serialize\Serializer\FormData;
use Magento\Framework\Controller\Result\Json as ResultJson;
use Magento\Framework\Controller\Result\JsonFactory as ResultJsonFactory;
use Magento\Framework\Escaper;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\View\LayoutFactory;
use Magento\Framework\View\LayoutInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ValidateTest extends AttributeTest
{
    /**
     * @var ResultJsonFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $resultJsonFactoryMock;

    /**
     * @var ResultJson|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $resultJson;

    /**
     * @var LayoutFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $layoutFactoryMock;

    /**
     * @var ObjectManagerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $objectManagerMock;

    /**
     * @var Attribute|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $attributeMock;

    /**
     * @var AttributeSet|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $attributeSetMock;

    /**
     * @var Escaper|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $escaperMock;

    /**
     * @var LayoutInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $layoutMock;

    /**
     * @var FormData|\PHPUnit_Framework_MockObject_MockObject
     */
<<<<<<< HEAD
    private $formDataSerializer;
=======
    private $formDataSerializerMock;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3

    protected function setUp()
    {
        parent::setUp();
        $this->resultJsonFactoryMock = $this->getMockBuilder(ResultJsonFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->resultJson = $this->getMockBuilder(ResultJson::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->layoutFactoryMock = $this->getMockBuilder(LayoutFactory::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->objectManagerMock = $this->getMockBuilder(ObjectManagerInterface::class)
            ->getMockForAbstractClass();
        $this->attributeMock = $this->getMockBuilder(Attribute::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->attributeSetMock = $this->getMockBuilder(AttributeSet::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->escaperMock = $this->getMockBuilder(Escaper::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->layoutMock = $this->getMockBuilder(LayoutInterface::class)
            ->getMockForAbstractClass();
<<<<<<< HEAD
        $this->formDataSerializer = $this->getMockBuilder(FormData::class)
=======
        $this->formDataSerializerMock = $this->getMockBuilder(FormData::class)
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ->disableOriginalConstructor()
            ->getMock();

        $this->contextMock->expects($this->any())
            ->method('getObjectManager')
            ->willReturn($this->objectManagerMock);
    }

    /**
     * {@inheritdoc}
     */
    protected function getModel()
    {
        return $this->objectManager->getObject(
            Validate::class,
            [
                'context' => $this->contextMock,
                'attributeLabelCache' => $this->attributeLabelCacheMock,
                'coreRegistry' => $this->coreRegistryMock,
                'resultPageFactory' => $this->resultPageFactoryMock,
                'resultJsonFactory' => $this->resultJsonFactoryMock,
                'layoutFactory' => $this->layoutFactoryMock,
                'multipleAttributeList' => ['select' => 'option'],
<<<<<<< HEAD
                'formDataSerializer' => $this->formDataSerializer,
=======
                'formDataSerializer' => $this->formDataSerializerMock,
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ]
        );
    }

    public function testExecute()
    {
        $serializedOptions = '{"key":"value"}';
        $this->requestMock->expects($this->any())
            ->method('getParam')
            ->willReturnMap([
                ['frontend_label', null, 'test_frontend_label'],
                ['attribute_code', null, 'test_attribute_code'],
                ['new_attribute_set_name', null, 'test_attribute_set_name'],
                ['serialized_options', '[]', $serializedOptions],
            ]);
        $this->objectManagerMock->expects($this->exactly(2))
            ->method('create')
            ->willReturnMap([
                [\Magento\Catalog\Model\ResourceModel\Eav\Attribute::class, [], $this->attributeMock],
                [\Magento\Eav\Model\Entity\Attribute\Set::class, [], $this->attributeSetMock]
            ]);
        $this->attributeMock->expects($this->once())
            ->method('loadByCode')
            ->willReturnSelf();
        $this->requestMock->expects($this->once())
            ->method('has')
            ->with('new_attribute_set_name')
            ->willReturn(true);
        $this->attributeSetMock->expects($this->once())
            ->method('setEntityTypeId')
            ->willReturnSelf();
        $this->attributeSetMock->expects($this->once())
            ->method('load')
            ->willReturnSelf();
        $this->attributeSetMock->expects($this->once())
            ->method('getId')
            ->willReturn(false);
        $this->resultJsonFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->resultJson);
        $this->resultJson->expects($this->once())
            ->method('setJsonData')
            ->willReturnSelf();

        $this->assertInstanceOf(ResultJson::class, $this->getModel()->execute());
    }

    /**
     * @dataProvider provideUniqueData
     * @param array $options
     * @param boolean $isError
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function testUniqueValidation(array $options, $isError)
    {
        $serializedOptions = '{"key":"value"}';
        $countFunctionCalls = ($isError) ? 6 : 5;
        $this->requestMock->expects($this->exactly($countFunctionCalls))
            ->method('getParam')
            ->willReturnMap([
                ['frontend_label', null, null],
                ['attribute_code', null, "test_attribute_code"],
                ['new_attribute_set_name', null, 'test_attribute_set_name'],
                ['message_key', null, Validate::DEFAULT_MESSAGE_KEY],
                ['serialized_options', '[]', $serializedOptions],
            ]);

<<<<<<< HEAD
        $this->formDataSerializer->expects($this->once())
=======
        $this->formDataSerializerMock
            ->expects($this->once())
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ->method('unserialize')
            ->with($serializedOptions)
            ->willReturn($options);

        $this->objectManagerMock->expects($this->once())
            ->method('create')
            ->willReturn($this->attributeMock);

        $this->attributeMock->expects($this->once())
            ->method('loadByCode')
            ->willReturnSelf();

        $this->requestMock->expects($this->once())
            ->method('has')
            ->with('new_attribute_set_name')
            ->willReturn(false);

        $this->resultJsonFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->resultJson);

        $this->resultJson->expects($this->once())
            ->method('setJsonData')
            ->willReturnSelf();

        $this->assertInstanceOf(ResultJson::class, $this->getModel()->execute());
    }

    /**
     * @return array
     */
    public function provideUniqueData()
    {
        return [
            'no values' => [
                [
                    'option' => [
                        'delete' => [
                            "option_0" => "",
                            "option_1" => "",
                            "option_2" => "",
                        ],
                    ],
<<<<<<< HEAD

                ],
                false,
=======
                ], false
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ],
            'valid options' => [
                [
                    'option' => [
                        'value' => [
                            "option_0" => [1, 0],
                            "option_1" => [2, 0],
                            "option_2" => [3, 0],
                        ],
                        'delete' => [
                            "option_0" => "",
                            "option_1" => "",
                            "option_2" => "",
                        ],
                    ],
<<<<<<< HEAD
                ],
                false,
=======
                ], false
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ],
            'duplicate options' => [
                [
                    'option' => [
                        'value' => [
                            "option_0" => [1, 0],
                            "option_1" => [1, 0],
                            "option_2" => [3, 0],
                        ],
                        'delete' => [
                            "option_0" => "",
                            "option_1" => "",
                            "option_2" => "",
                        ],
                    ],
<<<<<<< HEAD
                ],
                true,
=======
                ], true
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ],
            'duplicate and deleted' => [
                [
                    'option' => [
                        'value' => [
                            "option_0" => [1, 0],
                            "option_1" => [1, 0],
                            "option_2" => [3, 0],
                        ],
                        'delete' => [
                            "option_0" => "",
                            "option_1" => "1",
                            "option_2" => "",
                        ],
<<<<<<< HEAD
                    ],
                ],
                false,
            ],
            'empty and deleted' => [
                [
                    'option' => [
                        'value' => [
                            "option_0" => [1, 0],
                            "option_1" => [2, 0],
                            "option_2" => ["", ""],
                        ],
                        'delete' => [
                            "option_0" => "",
                            "option_1" => "",
                            "option_2" => "1",
                        ],
                    ],
                ],
                false,
=======
                    ],
                ], false
            ],
            'empty and deleted' => [
                [
                    'option' => [
                        'value' => [
                            "option_0" => [1, 0],
                            "option_1" => [2, 0],
                            "option_2" => ["", ""],
                        ],
                        'delete' => [
                            "option_0" => "",
                            "option_1" => "",
                            "option_2" => "1",
                        ],
                    ],
                ], false
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ],
        ];
    }

    /**
     * Check that empty admin scope labels will trigger error.
     *
     * @dataProvider provideEmptyOption
     * @param array $options
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function testEmptyOption(array $options, $result)
    {
        $serializedOptions = '{"key":"value"}';
        $this->requestMock->expects($this->any())
            ->method('getParam')
            ->willReturnMap([
                ['frontend_label', null, null],
                ['frontend_input', 'select', 'multipleselect'],
                ['attribute_code', null, "test_attribute_code"],
                ['new_attribute_set_name', null, 'test_attribute_set_name'],
                ['message_key', Validate::DEFAULT_MESSAGE_KEY, 'message'],
                ['serialized_options', '[]', $serializedOptions],
            ]);

<<<<<<< HEAD
        $this->formDataSerializer->expects($this->once())
=======
        $this->formDataSerializerMock
            ->expects($this->once())
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ->method('unserialize')
            ->with($serializedOptions)
            ->willReturn($options);

        $this->objectManagerMock->expects($this->once())
            ->method('create')
            ->willReturn($this->attributeMock);

        $this->attributeMock->expects($this->once())
            ->method('loadByCode')
            ->willReturnSelf();

        $this->resultJsonFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->resultJson);

        $this->resultJson->expects($this->once())
            ->method('setJsonData')
            ->willReturnArgument(0);

        $response = $this->getModel()->execute();
        $responseObject = json_decode($response);
        $this->assertEquals($responseObject, $result);
    }

    /**
     * Dataprovider for testEmptyOption.
     *
     * @return array
     */
    public function provideEmptyOption()
    {
        return [
            'empty admin scope options' => [
                [
                    'option' => [
                        'value' => [
                            "option_0" => [''],
                        ],
                    ],
                ],
                (object) [
                    'error' => true,
                    'message' => 'The value of Admin scope can\'t be empty.',
                ],
            ],
            'not empty admin scope options' => [
                [
                    'option' => [
                        'value' => [
                            "option_0" => ['asdads'],
                        ],
                    ],
                ],
                (object) [
                    'error' => false,
<<<<<<< HEAD
                ],
=======
                ]
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ],
            'empty admin scope options and deleted' => [
                [
                    'option' => [
                        'value' => [
                            "option_0" => [''],
                        ],
                        'delete' => [
                            'option_0' => '1',
                        ],
                    ],
                ],
                (object) [
                    'error' => false,
                ],
            ],
            'empty admin scope options and not deleted' => [
                [
                    'option' => [
                        'value' => [
                            "option_0" => [''],
                        ],
                        'delete' => [
                            'option_0' => '0',
                        ],
                    ],
                ],
                (object) [
                    'error' => true,
                    'message' => 'The value of Admin scope can\'t be empty.',
                ],
            ],
        ];
    }

    /**
<<<<<<< HEAD
     * @return void
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function testExecuteWithOptionsDataError()
    {
        $serializedOptions = '{"key":"value"}';
        $message = "The attribute couldn't be validated due to an error. Verify your information and try again. "
            . "If the error persists, please try again later.";
        $this->requestMock->expects($this->any())
            ->method('getParam')
            ->willReturnMap([
                ['frontend_label', null, 'test_frontend_label'],
                ['attribute_code', null, 'test_attribute_code'],
                ['new_attribute_set_name', null, 'test_attribute_set_name'],
                ['message_key', Validate::DEFAULT_MESSAGE_KEY, 'message'],
                ['serialized_options', '[]', $serializedOptions],
            ]);

<<<<<<< HEAD
        $this->formDataSerializer->expects($this->once())
=======
        $this->formDataSerializerMock
            ->expects($this->once())
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ->method('unserialize')
            ->with($serializedOptions)
            ->willThrowException(new \InvalidArgumentException('Some exception'));

<<<<<<< HEAD
        $this->objectManagerMock->expects($this->once())
=======
        $this->objectManagerMock
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ->method('create')
            ->willReturnMap([
                [\Magento\Catalog\Model\ResourceModel\Eav\Attribute::class, [], $this->attributeMock],
                [\Magento\Eav\Model\Entity\Attribute\Set::class, [], $this->attributeSetMock]
            ]);

<<<<<<< HEAD
        $this->attributeMock->expects($this->once())
            ->method('loadByCode')
            ->willReturnSelf();
        $this->attributeSetMock->expects($this->never())
=======
        $this->attributeMock
            ->method('loadByCode')
            ->willReturnSelf();
        $this->attributeSetMock
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ->method('setEntityTypeId')
            ->willReturnSelf();
        $this->resultJsonFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($this->resultJson);
        $this->resultJson->expects($this->once())
            ->method('setJsonData')
            ->with(json_encode([
                'error' => true,
<<<<<<< HEAD
                'message' => $message,
=======
                'message' => $message
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            ]))
            ->willReturnSelf();

        $this->getModel()->execute();
    }
}
