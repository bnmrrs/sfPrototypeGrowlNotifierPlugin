<script type="text/javascript">
  var notifier = new sfPrototypeGrowlNotifier(
    '<?php echo url_for('@sf_prototype_growl_notifier_notifications', true); ?>',
    '<?php echo url_for('@sf_prototype_growl_notifier_acknowledge_notification', true); ?>',
    <?php echo $updateInterval; ?>
  );
</script>
