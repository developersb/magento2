<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Config\Block\System\Config\Form\Field;

use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Stdlib\DateTime\DateTimeFormatterInterface;

/**
 * Backend system config datetime field renderer
 *
 * @api
 * @since 100.0.2
 */
class Notification extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * @var DateTimeFormatterInterface
     */
    protected $dateTimeFormatter;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param DateTimeFormatterInterface $dateTimeFormatter
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        DateTimeFormatterInterface $dateTimeFormatter,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->dateTimeFormatter = $dateTimeFormatter;
    }

    /**
     * Returns element html
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $element->setValue($this->_cache->load('admin_notifications_lastcheck'));
        $format = $this->_localeDate->getDateTimeFormat(
            \IntlDateFormatter::MEDIUM
        );
<<<<<<< HEAD
        return $this->dateTimeFormatter->formatObject($this->_localeDate->date((int)$element->getValue()), $format);
=======
        return $this->dateTimeFormatter->formatObject($this->_localeDate->date((int) $element->getValue()), $format);
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    }
}
