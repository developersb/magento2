<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
namespace Magento\Paypal\Controller\Adminhtml\Express;

use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\Translate\InlineInterface;
use Magento\Framework\View\Result\LayoutFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Paypal\Model\Adminhtml\Express;
use Magento\Backend\App\Action;
use Magento\Sales\Api\OrderManagementInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Controller\Adminhtml\Order;
use Psr\Log\LoggerInterface;

/**
 * Makes a payment authorization for Paypal Express
 * when payment action is order.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Authorization extends Order
{
    /**
<<<<<<< HEAD
     * Authorization level of a basic admin session
=======
     * Authorization level of a basic admin session.
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_Paypal::authorization';

    /**
     * @var Express
     */
    private $express;

    /**
     * @param Action\Context $context
     * @param Registry $coreRegistry
     * @param FileFactory $fileFactory
     * @param InlineInterface $translateInline
     * @param PageFactory $resultPageFactory
     * @param JsonFactory $resultJsonFactory
     * @param LayoutFactory $resultLayoutFactory
     * @param RawFactory $resultRawFactory
     * @param OrderManagementInterface $orderManagement
     * @param OrderRepositoryInterface $orderRepository
     * @param LoggerInterface $logger
     * @param Express $express
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        Action\Context $context,
        Registry $coreRegistry,
        FileFactory $fileFactory,
        InlineInterface $translateInline,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory,
        LayoutFactory $resultLayoutFactory,
        RawFactory $resultRawFactory,
        OrderManagementInterface $orderManagement,
        OrderRepositoryInterface $orderRepository,
        LoggerInterface $logger,
        Express $express
    ) {
        $this->express = $express;

        parent::__construct(
            $context,
            $coreRegistry,
            $fileFactory,
            $translateInline,
            $resultPageFactory,
            $resultJsonFactory,
            $resultLayoutFactory,
            $resultRawFactory,
            $orderManagement,
            $orderRepository,
            $logger
        );
    }

    /**
     * Authorize full order payment amount.
     *
     * @return Redirect
     */
    public function execute(): Redirect
    {
        $resultRedirect = $this->resultRedirectFactory->create();
<<<<<<< HEAD
        if ($order = $this->_initOrder()) {
=======
        $order = $this->_initOrder();
        if ($order !== false) {
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
            try {
                $this->express->authorizeOrder($order);
                $this->orderRepository->save($order);
                $this->messageManager->addSuccessMessage(__('Payment authorization has been successfully created.'));
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
<<<<<<< HEAD
            } catch (\Exception $e) {
=======
            } catch (\Throwable $e) {
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
                $this->messageManager->addErrorMessage(__('Unable to make payment authorization.'));
            }

            $resultRedirect->setPath('sales/order/view', ['order_id' => $order->getId()]);
        } else {
            $resultRedirect->setPath('sales/order/index');
        }

        return $resultRedirect;
    }
}
