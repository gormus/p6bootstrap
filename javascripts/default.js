(function ($, Drupal, window, document, undefined) {
  // Avoid `console` errors in browsers that lack a console.
  // https://github.com/h5bp/html5-boilerplate/blob/master/dist/js/plugins.js
  var method;
  var noop = function () {};
  var methods = [
      'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
      'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
      'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
      'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }


  // To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.p6bootstrap = {
    attach: function(context, settings) {
      // Check if it is front page.
      // @see stanford_bootstrap_preprocess_page() in template.php
      var isFront = false;
      if ((typeof(settings.StanfordBootstrap) !== 'undefined') && settings.StanfordBootstrap !== null) {
        if ((typeof(settings.StanfordBootstrap.isFront) !== 'undefined') && settings.StanfordBootstrap.isFront !== null) {
          isFront = settings.StanfordBootstrap.isFront;
        }
      }





      // Place your code here.





      // Fix Status report table.
      $('table.system-status-report', context).once('table-system-status', function() {
        $(this).addClass('table');
      });
    }
  };


  // Enable Bootstrap for tableDragChangedWarning.
  Drupal.theme.prototype.tableDragChangedWarning = function() {
    return '<div class="tabledrag-changed-warning messages warning alert alert-warning">' + Drupal.theme('tableDragChangedMarker') + ' ' + Drupal.t('Changes made in this table will not be saved until the form is submitted.') + '</div>';
  };
})(jQuery, Drupal, this, this.document);
