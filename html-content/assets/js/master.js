jQuery(document).ready(function($){
	/*Category accordian list*/
	var singleCategory = $(".single-category-widg");
	if(singleCategory.length){
		singleCategory.find(".posts-list").hide();
		singleCategory.find(".active-cat").find(".posts-list").show();
		var expandIcon = singleCategory.find(".expand-posts");
		expandIcon.on("click",function(){
			$(this).closest("li").toggleClass("active-cat");
			$(this).next("ul").slideToggle("normal");
		});
	}
	/*Responsive menu toggle*/
	$(".menu-toggler,.arrow").on('click',function(e){
		e.preventDefault();
		$(this).next("ul").slideToggle();
	});
});//jQuery