  $('button.schedule-btn').click(function(){$('#apptModal').modal('toggle')});

  var $form = $('form');

  $('#apptForm-send-btn').click(function() {$form.submit();});

  $form.validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      // console.log('bad');
    } else {
      // everything looks good!
      // console.log('looks good');

      function complete() {
        $('#apptForm-success-msg').fadeIn();
      }
      $('#apptForm').fadeOut(300, "linear", complete);
      $('#apptForm-send-btn').fadeOut();

      $.post($(this).attr('action'), $(this).serialize(), function(response){
            // do something here on success
      },'json');
      return false;
    }
  });