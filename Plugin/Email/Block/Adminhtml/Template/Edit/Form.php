<?php
/**
 * Copyright © 2016 FireGento e.V.
 * See LICENSE.md bundled with this module for license details.
 */
namespace FireGento\MageSetup\Plugin\Email\Block\Adminhtml\Template\Edit;

use FireGento\MageSetup\Plugin\Email\Model\Source\Variables;

/**
 * Class Variables
 *
 * @package FireGento\MageSetup\Plugin\Email\Block\Adminhtml\Template\Edit
 */
class Form
{
    /**
     * Retrieve variables to insert into email
     *
     * @param \Magento\Email\Block\Adminhtml\Template\Edit\Form $subject
     * @param array $result
     *
     * @return array
     */
    public function afterGetVariables(\Magento\Email\Block\Adminhtml\Template\Edit\Form $subject, $result)
    {
        $additionalConfigValues = Variables::getAdditionalConfigVariables();
        $optionArray = [];
        foreach ($additionalConfigValues as $variable) {
            $optionArray[] = [
                'value' => '{{config path="' . $variable['value'] . '"}}',
                'label' => $variable['label'],
            ];
        }
        if ($optionArray) {
            $result[] = [
                'label' => __('Imprint'),
                'value' => $optionArray,
            ];
        }
        return $result;
    }
}
