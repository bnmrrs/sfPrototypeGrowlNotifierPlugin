<?php

/**
 * @package symfony
 * @subpackage sfPrototypeUserNotifier
 * @author Ben Morris <ben@poppinphresh.com>
 */

class sfPrototypeGrowlNotifierUser extends sfGuardSecurityUser
{
  public function getNotifications()
  {
    return Doctrine::getTable('sfPrototypeGrowlNotification')
      ->getNotificationsByUser($this->getGuardUser()->id);
  }

  public function acknowledgeNotification($id)
  {
    Doctrine::getTable('sfPrototypeGrowlNotification')
      ->acknowledgeNotification($id, $this->getGuarduser()->id);
  }
}
