[
<?php $nb = count($notifications); $i = 0; foreach ($notifications as $notification): $i++ ?>
  <?php echo json_encode($notification->asArray()); echo $nb == $i ? '' : ',' ?>
<?php endforeach; ?>
]
