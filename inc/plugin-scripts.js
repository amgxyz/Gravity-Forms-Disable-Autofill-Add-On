/*
* Function that parses input fields
*/
jQuery(document).ready(function($){
  if ($.browser.chrome) {
		//autcomplete_false();
		$("input").each(function() {
	    	//alert("ello");
	    	$(this).attr('autocomplete', 'false'); //FALSE AS OF 2015
	    }); // .each

	    $("form").each(function() {
	    	//alert("ello");
	    	$(this).attr('autocomplete', 'false'); //FALSE AS OF 2015
	    }); // .each

	} else {
		//autcomplete_off();
		$("input").each(function() {
	    	//alert("ello");
	    	$(this).attr('autocomplete', 'off');
	    }); // .each

	    $("form").each(function() {
	    	//alert("ello");
	    	$(this).attr('autocomplete', 'off');
	    }); // .each

	} // end if
}); //.ready
