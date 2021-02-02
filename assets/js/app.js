jQuery( document ).ready(function($) {
  $(window).on("load resize scroll",function(e){
	  var $siteNavigation = $('#site-navigation');
	  var $siteBrandingHeight = $('#site-branding').height(); 
	  var isPositionFixed = ($siteNavigation.css('position') == 'fixed');
	  if ( ($(this).scrollTop() > $siteBrandingHeight && !isPositionFixed) || ($(this).scrollTop() > $siteBrandingHeight && 'scroll' != e.handleObj.origType) ){
	  	if ( 0 < $('#wpadminbar').length && 'fixed' == $('#wpadminbar').css('position') ) {
	  		let $adminBarHeight = $('#wpadminbar').height();
	  		$siteNavigation.css({'position': 'fixed', 'top': $adminBarHeight});
	  		$('#masthead').css({'padding-bottom': ($siteNavigation.height() + $adminBarHeight) });
	  	} else {
	  		$siteNavigation.css({'position': 'fixed', 'top': '0px'});
	  		$('#masthead').css({'padding-bottom': $siteNavigation.height() });
	  	}
	  }
	  if ($(this).scrollTop() < $siteBrandingHeight && isPositionFixed || ($(this).scrollTop() < $siteBrandingHeight && 'scroll' != e.handleObj.origType) ){
	    $siteNavigation.css({'position': 'relative', 'top': '0px'}); 
	    $('#masthead').css({'padding-bottom':'0px' });
	  }
	});
	$('.dropdown-toggle').click(function() {
		if ($(this).next('.dropdown-menu').is(':visible')) window.location = $(this).attr('href');
	});
});
