<?php
/**
 * PluginsfPrototypeGrowlNotificationTable 
 * 
 * @uses Doctrine_Table
 * @package sfPrototypeGrowlNotifier
 * @copyright Copyright (C) 2009 Ben Morris
 * @author Ben Morris <ben@poppinphresh.com>
 */
class PluginsfPrototypeGrowlNotificationTable extends Doctrine_Table
{
  public function getNotificationsByUser($userId, $active = true)
  {
    $q = $this->createQuery('n')
      ->addWhere('n.user_id = ?', $userId)
      ->addWhere('n.received = ?', false);

    if ($active) {
      $q->addWhere('n.expiry > ? OR n.expiry is null', date('Y-m-d H:i:s'));
    }

    return $q->execute();
  }

  public function acknowledgeNotification($id, $userId)
  {
    Doctrine_Query::create()
      ->update('sfPrototypeGrowlNotification')
      ->set('received', 'true') // Doctrine doesn't like boolean false with Postgres
      ->addWhere('id = ?', $id)
      ->addWhere('user_id = ?', $userId)
      ->execute();
  }
}
