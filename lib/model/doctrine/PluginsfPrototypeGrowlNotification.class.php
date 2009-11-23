<?php

/**
 * PluginsfPrototypeGrowlNotification 
 * 
 * @uses BasesfPrototypeGrowlNotification
 * @package sfPrototypeGrowlNotifier
 * @copyright Copyright (C) 2009 Ben Morris
 * @author Ben Morris <ben@poppinphresh.com
 */
abstract class PluginsfPrototypeGrowlNotification extends BasesfPrototypeGrowlNotification
{
  public function asArray()
  {
    return array(
      'id' => $this->id,
      'type' => $this->type,
      'message' => $this->message,
      'options' => array(
        'header' => $this->header,
        'speedin' => $this->speed_in,
        'speedout' => $this->speed_out,
        'life' => $this->life,
        'sticky' => $this->sticky,
        'className' => $this->class_name,
        'acknowledgeReceipt' => $this->acknowledge_receipt,
      )
    );
  }

  public function markAsDisplayed()
  {
    $this->received = true;
  }
}
