require('bootstrap');
import jQuery from 'jquery'
import datetimepicker from 'jquery-datetimepicker'

(function ($) {
  $(function () {
    $.datetimepicker.setLocale('ja');
    // console.log('test');
    dateTimePicker();

    function dateTimePicker() {
      const $target = $('.datetimepicker');
      if ($target.length) {
        $target.datetimepicker({
          format: 'Y-m-d H:i:s'
        });
      }
    }
  })
}(jQuery));