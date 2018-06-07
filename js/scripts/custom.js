/**
 * File custom.js.
 *
 * Handles custom JavaScript for the site.
 */

(function ($) {

  $('.menu-toggle').click(function() {
		$(this).toggleClass('active');
    $('#' + $(this).attr('aria-controls')).slideToggle();
	});

  $('.ddd-featured-posts').slick({
    centerMode: true,
    slidesToShow: 1,
    rows: 0,
    centerPadding: '240px',
    autoplay: true,
    autoplaySpeed: 4000,
    dots: false,
    arrows: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          cnterMode: false,
          centerPadding: '0px'
        }
      },
    ]
  });

  function filterBlog() {
    var checkedAuthors = '';
    $('input[name="blog-filter"]:checked').each(function(key, val) {

      if ( key > 0 ) {
        checkedAuthors += '+' + $(this).val();
      } else {
        checkedAuthors += $(this).val();
      }

    });

    if ( checkedAuthors ) {
      var authorParam = 'author=' + checkedAuthors;
    } else {
      var authorParam = '';
    }

    var selectedMonth = $('select[name="date-filter"] option:selected').data('month');
    var selectedYear = $('select[name="date-filter"] option:selected').data('year');

    if ( selectedMonth && selectedYear ) {
      var monthParam = 'month=' + selectedMonth + '&';
      var yearParam = 'year=' + selectedYear;
    } else {
      var monthParam = '';
      var yearParam = '';
    }

    if ( authorParam !== '' && monthParam !== '' ) {
      var params = authorParam + '&' + monthParam + yearParam;
    } else if ( authorParam == '' && monthParam !== '' ) {
      var params = monthParam + yearParam;
    } else if ( authorParam !== '' && monthParam == '' ) {
      var params = authorParam;
    } else {
      var params = '';
    }

    var url = window.location.protocol + "//" + window.location.host + "/blog/?" + params
    window.location.href = url;
  }

  $('.blog__author-image').click(function() {
    var author = $(this).data('author');
    $('input[name="blog-filter"][value="' + author + '"]').trigger('click');
    $(this).toggleClass('checked');

    filterBlog();
  });

  $('.blog__date-filter__box').change(function() {
    filterBlog();
  });

  $('.widget-title').click(function() {
    $(this).parent().toggleClass('show');
  });

  $('.widget .gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.parent().parent().find('figcaption').text();
			}
		}
	});

})(jQuery);
