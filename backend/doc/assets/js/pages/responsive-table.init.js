!(function (e) {
  'use strict';
  var n = function () {};
  (n.prototype.init = function () {
    e('.table-rep-plugin').responsiveTable('update');
  }),
    (e.ResponsiveTable = new n()),
    (e.ResponsiveTable.Constructor = n);
})(window.jQuery),
  (function (e) {
    'use strict';
    window.jQuery.ResponsiveTable.init();
  })();
