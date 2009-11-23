<?php

/**
 * notify components.
 *
 * @package    prototypeGrowlNotifierPlugin
 * @subpackage notifier
 * @author     Ben Morris <ben@poppinphresh.com>
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class prototypeGrowlNotifierComponents extends sfComponents
{
  /**
   * executeNotify 
   *
   * Adds the required javascript and stylesheets
   */
  public function executeNotify()
  {
    $this->updateInterval = sfConfig::get('sf_prototype_growl_notifier_update_interval', 10);

    $this->getResponse()->addJavascript('/sfPrototypeGrowlNotifierPlugin/js/growler.js');
    $this->getResponse()->addJavascript('/sfPrototypeGrowlNotifierPlugin/js/sfPrototypeGrowlNotifier.js');
    $this->getResponse()->addStylesheet('/sfPrototypeGrowlNotifierPlugin/css/growler.css');
  }
}
