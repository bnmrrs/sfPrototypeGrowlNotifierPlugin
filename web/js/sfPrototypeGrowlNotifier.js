var sfPrototypeGrowlNotifier = Class.create({
  updateUrl: null,
  acknowledgeUrl: null,
  growler: null,
  displayedNotifications: {},

  initialize: function(updateUrl, acknowledgeUrl, updateInterval)  {
    this.updateUrl = updateUrl;
    this.acknowledgeUrl = acknowledgeUrl;
    this.growler = new k.Growler({ location: 'br' });

    this.update();

    this.updater = new PeriodicalExecuter(this.update.bind(this), updateInterval);
  },

  update: function()  {
    new Ajax.Request(this.updateUrl, {
      method: 'get',
      requestHeaders: { Accept: 'text/javascript' },
      onSuccess: this.handleResponse.bind(this)
    });
  },

  handleResponse: function(transport) {
    growls = transport.responseText.evalJSON();

    growls.each(function(growl) {
      if ( ! (growl.id in this.displayedNotifications)) {

        if (growl.options.acknowledgeReceipt) {
          growl.options.destroyed = this.acknowledgeGrowl.bind(this, growl);
        }

        this.growler[growl.type](growl.message, growl.options);
      }

      this.displayedNotifications[growl.id] = true;
    }.bind(this));
  },

  acknowledgeGrowl: function(growl) {
    new Ajax.Request(this.acknowledgeUrl, {
      method: 'get',
      parameters: { id: growl.id }
    });
  }
});
