$(function() {

  /*============ Count To ============*/
  $(window).on('scroll', function() {
      $('.timer').each(function() { 
        if( $(this).text() != $(this).attr('data-to') ) {
          $(this).countTo();
        }
      });
    
  });
  
  /*==========================================*/

  function displaySelectFieldsAsBlock() {

    if( $(window).width() <= 750 ) {
      $('.img1').attr('src', 'images/1.jpg');
      $('.img2').attr('src', 'images/2.jpg');
      $('.img3').attr('src', 'images/3.jpg');
      $('.img4').attr('src', 'images/4.jpg');
      $('.img5').attr('src', 'images/5.jpg');
      $('.img6').attr('src', 'images/5.jpg');
    }
    if( $(window).width() >= 751 ) {
      $('.img1').attr('src', 'images/article-1.jpg');
      $('.img2').attr('src', 'images/article-2.jpg');
      $('.img3').attr('src', 'images/article-3.jpg');
      $('.img4').attr('src', 'images/article-4.jpg');
      $('.img5').attr('src', 'images/article-5.jpg');
      $('.img6').attr('src', 'images/article-5.jpg');
    }

    if( navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1 ) {
      if( $(window).width() <= 767 ) {
        $('select.search-select').css({marginTop: "10px"})
      }
      if( $(window).width() >= 520) {
          $('.hidden-sm.btns-first').css({  marginTop: "-176px !important"});
          $('.hidden-sm.btns-second').css({marginTop: "-176px !important"});

      }
      if( $(window).width() >= 992) {
          $('.hidden-sm.btns-first').css({marginTop: "0px !important"});
          $('.hidden-sm.btns-second').css({marginTop: "0px !important"});
      }

    }

  }

  displaySelectFieldsAsBlock();

  $( window ).resize(function() {
    displaySelectFieldsAsBlock();
  });

  /**
   * Achat ou Location 
   */
   $('.btn-achat').click(function(e) {
      e.preventDefault();
      $('.btn-location').find('input[type="radio"]').attr('checked', false);
      $(this).find('input[type="radio"]').attr('checked', true);
   });
   $('.btn-location').click(function(e) {
      e.preventDefault();
      $('.btn-achat').find('input[type="radio"]').attr('checked', false);
      $(this).find('input[type="radio"]').attr('checked', true);
   });
  
});
