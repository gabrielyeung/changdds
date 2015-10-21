(function () {
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

  // http://stackoverflow.com/questions/7717527/jquery-smooth-scrolling-when-clicking-an-anchor-link
  var $root = $('html, body');
  $('a').click(function() {
      $root.animate({
          scrollTop: $( $.attr(this, 'href') ).offset().top
      }, 500);
      return false;
  });

  // http://stackoverflow.com/questions/28452235/make-a-nav-bar-stick-to-the-top-when-scrolling-with-css
  // http://jsfiddle.net/CriddleCraddle/Wj9dD/
  $(window).scroll(function () {
    //if you hard code, then use console.log to determine when you want the nav bar to stick.  
    var offset = $(window).scrollTop();
    //console.log(offset)
    var $aboutus_nav = $('.aboutus-content .page-nav');
    var $patientinfo_nav = $('.patientinfo-content .page-nav');
    if (offset > 152) {
      $aboutus_nav.addClass('navbar-fixed');
      $patientinfo_nav.addClass('navbar-fixed');
    }
    else {
      $aboutus_nav.removeClass('navbar-fixed');
      $patientinfo_nav.removeClass('navbar-fixed');
    }
  });
})();