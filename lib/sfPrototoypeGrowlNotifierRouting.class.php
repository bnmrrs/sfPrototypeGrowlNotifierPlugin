<?php

class sfPrototypeGrowlNotifierRouting 
{
  static public function addRouteForUpdate(sfEvent $event)
  {
    $event->getSubject()->prependRoute('sf_prototype_growl_notifier_notifications',
      new sfRequestRoute('/get_notifications', array(
        'module' => 'prototypeGrowlNotifier', 
        'action' => 'getNotifications'
    )));

    $event->getSubject()->prependRoute('sf_prototype_growl_notifier_acknowledge_notification',
      new sfRequestRoute('/acknowledge_notification', array(
        'module' => 'prototypeGrowlNotifier', 
        'action' => 'acknowledgeNotification'
    )));
  }
}
