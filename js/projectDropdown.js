/**
 * Swaps between + and - on the projects tab
 *
 * 
 *
 * 
 */


	// JavaScript Document
jQuery(document).ready(function($) {
	"use strict";
	$('.panel').on('show.bs.collapse', function () {
         $(this).addClass('active');
		 $(this).find('.plusminus').html("-");
		 
    });

    $('.panel').on('hide.bs.collapse', function () {
         $(this).removeClass('active');
		 $(this).find('.plusminus').html("+");
    });
});
