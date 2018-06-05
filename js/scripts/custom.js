/**
 * File custom.js.
 *
 * Handles custom JavaScript for the site.
 */

(function ($) {

  $('.ddd-featured-posts').slick({
    centerMode: true,
    slidesToShow: 1,
    rows: 0,
    centerPadding: '240px',
    autoplay: true,
    autoplaySpeed: 4000,
    dots: false,
    arrows: false
  });

  $('.blog__author-image').click(function() {
    var author = $(this).data('author');
    $('input[name="blog-filter"][value="' + author + '"]').trigger('click');
    $(this).toggleClass('checked');
  });

})(jQuery);
