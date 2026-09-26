
$('.container').imagesLoaded( function() {
  $("#exzoom").exzoom({
        autoPlay: false,
    });
  $("#exzoom").removeClass('hidden')
});
	
$(function() {
/*================================
Magnific Popup
==================================*/ 
$('.popup').magnificPopup({
	type: 'image',
	gallery:{
	enabled:true
	}
});

/*----magnificPopup video view----*/
$('.video-popup').magnificPopup({
	type: 'iframe',
	gallery:{
	enabled:true
	}
});		

/*----pdf view----*/		
$('.iframe-popup').magnificPopup({
	type: 'iframe'
});		
		
});	
	
//zoom-user---
$(document).ready(function() {
	$('.userimg').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});
});	
	
