<?php

/**
 * notify actions.
 *
 * @package    prototypeGrowlNotifierPlugin
 * @subpackage notifier
 * @author     Ben Morris <ben@poppinphresh.com>
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class prototypeGrowlNotifierActions extends sfActions
{
 /**
  * Executes getNotifications action
  *
  * Returns a json encoded string of active notifications
  *
  * @param sfRequest $request A request object
  */
  public function executeGetNotifications(sfWebRequest $request)
  {
    $this->notifications = $this->getUser()->getNotifications();

    // Mark all notifications as read
    foreach ($this->notifications as $notification) {
      if (!$notification->acknowledge_receipt) {
        $notification->markAsDisplayed();
      }
    }
    $this->notifications->save();

    $this->setLayout(false);
    $this->getResponse()->setContentType('text/javascript');
  }

  /**
   * executeAcknowledgeNotification 
   * 
   * Acknowledges receipt of a notification
   *
   * @param sfWebRequest $request A request object
   */
  public function executeAcknowledgeNotification(sfWebRequest $request)
  {
    $id = $request->getParameter('id', false);

    if ($id) {
      $this->getUser()->acknowledgeNotification($id);
    }

    return sfView::NONE;
  }

}
