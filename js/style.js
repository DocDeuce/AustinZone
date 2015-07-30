/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Navigation


//   $(document).ready(function(){
//	   $(window).bind('scroll', function() {
//	   var navHeight = $( window ).height() - 40;
//			 if ($(window).scrollTop() > navHeight) {
//				 $('nav').addClass('fixed');
//			 }
//			 else {
//				 $('nav').removeClass('fixed');
//			 }
//		});
//	});

// Grab as much info as possible 
// outside the scroll handler for performace reasons.


//var header             = document.querySelector('header'),
//    header_height      = getComputedStyle(header).height.split('px')[0],
//    navi               = header.querySelector('nav'),
//    navi_height        = getComputedStyle(navi).height.split('px')[0],
//    fix_class          = 'is--fixed';
//    
//
//
function stickyScroll(e) {

  if( window.pageYOffset > (top_height - navi_height ) / 2 ) {
    title.classList.add(fix_class);
    console.log("yo");
  }

  if( window.pageYOffset < (top_height - navi_height ) / 2 ) {
    title.classList.remove(fix_class);
    console.log("oy");
  }
}
//
//// Scroll handler to toggle classes.
//window.addEventListener('scroll', stickyScroll, false);