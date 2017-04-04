<?php
/*
* Extension: Getting around template path hints like Joomla style in Magento
* Version: 0.1.0
* Author: Dinkar Prajapati
* Date Created: 05/04/2017
* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)
* Copyright 2017 Pradino. All Rights Reserved.
*/
class Pradino_Templatehints_Block_Template extends Mage_Core_Block_Template
{
  public function getShowTemplateHints()
  {
      if (is_null(self::$_showTemplateHints)) {
          self::$_showTemplateHints = Mage::getStoreConfig(self::XML_PATH_DEBUG_TEMPLATE_HINTS)
              && Mage::helper('core')->isDevAllowed();
          self::$_showTemplateHintsBlocks = Mage::getStoreConfig(self::XML_PATH_DEBUG_TEMPLATE_HINTS_BLOCKS)
              && Mage::helper('core')->isDevAllowed();
      }

      if($this->getRequest()->getParam('th') == 1) {
        self::$_showTemplateHints = 1;
        self::$_showTemplateHintsBlocks = 1;
      }

      return self::$_showTemplateHints;
  }
}
