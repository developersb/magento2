<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Backend\Controller\Adminhtml\System\Store;

<<<<<<< HEAD
use Magento\Framework\App\Request\Http as HttpRequest;
=======
use Magento\Framework\App\Action\HttpPostActionInterface;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;

/**
 * Delete store view.
 */
class DeleteStorePost extends \Magento\Backend\Controller\Adminhtml\System\Store implements HttpPostActionInterface
{
    /**
     * Delete store view post action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws NotFoundException
     */
    public function execute()
    {
        /** @var HttpRequest $request */
        $request = $this->getRequest();
        /** @var \Magento\Backend\Model\View\Result\Redirect $redirectResult */
        $redirectResult = $this->resultFactory->create(
            ResultFactory::TYPE_REDIRECT
        );
        if (!$request->isPost()) {
            throw new NotFoundException(__('Page not found.'));
        }

        $itemId = $request->getParam('item_id');
        if (!($model = $this->_objectManager->create(\Magento\Store\Model\Store::class)->load($itemId))) {
            $this->messageManager->addErrorMessage(__('Something went wrong. Please try again.'));
            return $redirectResult->setPath('adminhtml/*/');
        }
        if (!$model->isCanDelete()) {
            $this->messageManager->addErrorMessage(__('This store view cannot be deleted.'));
            return $redirectResult->setPath('adminhtml/*/editStore', ['store_id' => $model->getId()]);
        }

        if (!$this->_backupDatabase()) {
            return $redirectResult->setPath('*/*/editStore', ['store_id' => $itemId]);
        }

        try {
            $model->delete();

            $this->messageManager->addSuccessMessage(__('You deleted the store view.'));
            return $redirectResult->setPath('adminhtml/*/');
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager
                ->addExceptionMessage($e, __('Unable to delete the store view. Please try again later.'));
        }
        return $redirectResult->setPath('adminhtml/*/editStore', ['store_id' => $itemId]);
    }
}
