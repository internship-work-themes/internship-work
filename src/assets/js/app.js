import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

//import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
import './lib/foundation-explicit-pieces';

$(document).foundation();

/**
 * Collapsing Nav-Bar when scrolling
 */
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 55 || document.documentElement.scrollTop > 55) {
    document.getElementById("mobile-menu").className = "site-navigation top-bar cell full scrolled-down";
    document.getElementById("logo-desktop").className = "site-logo scrolled-down";

  } else {
    document.getElementById("mobile-menu").className = "site-navigation cell full top-bar";
    document.getElementById("logo-desktop").className = "site-logo";
  }
}