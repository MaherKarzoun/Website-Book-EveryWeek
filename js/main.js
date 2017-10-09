$(document).ready(function(){
	var Bottom = $(window).height() ; 
	$(".signUp td:even").css({"right": "-300px","position": "relative"});
	$(".signUp td:odd").css({"right": "300px","position": "relative"});
	$(".freeAccount").click(function(){
		 $(".signUp td").animate({"opacity" : 1, "right" : 0}, 800);	
	});

	$("p.more").slideUp();
	
	$("#search").keyup(function(){
		var name=$("#search").val();
			if ($.trim(name)!=="") {
				$.post('../db/suggestions.php',{suggestion: name},function(data,status){
				  if ($.trim(data)!=="") {
					var array = data.split(",");
					lsit='';
					for (var s = array.length - 1; s >= 0; s--) {
						lsit+="<li><a href=''>"+array[s]+"</a></li>"
						}
					$("#showSuggestions").html("<ul>"+lsit+"</ul>");
				  }else{
				  	$("#showSuggestions").html("");
				  }
				});	
			}else{
				$("#showSuggestions").html("");	
			}
	});

	$("label.seeMore").click(function() {
		var more = $(this).parent().children("p.more");
		if($(this).text()=="see more"){
			$(this).text("see less");
			more.slideDown(1000);
		}else{
			$(this).text("see more");
			more.slideUp(1000);
		}

	});

	$("#img-nav-side").click(function() {
		$("nav.adv").slideToggle("fast");
		if(! $(".artiles").hasClass("maxWidth")){
			$(".artiles").removeClass("normalWidth").addClass("maxWidth");
			
		}else{
			$(".artiles").addClass("normalWidth").removeClass("maxWidth");
		}
	
	});


	$("input[type!='submit']").on({
	    	focus:function(){
	        $(this).css("background-color","#e6f7ff");
	        $(this).css("border","2px #00aeff solid");
		    },
	    	blur:function(){
	        $(this).css("background-color","#ffffff");
	       	$(this).css("border","1px black solid");
		    }
	    });


	$.fn.revealOnScroll = function(direction, speed) {
		return this.each(function() {	
			var objectOffsetTop = $(this).offset().top;
			
			if (!$(this).hasClass("hide-reveal")) {
				if (direction == "right") {
					$(this).css({
						"opacity"	: 0,
						"right"		: "400px",
						"position"	: "relative"
					});
				} else {
					$(this).css({
						"opacity"	: 0,
						"right"		: "-400px",
						"position"	: "relative"
					});	
				} 
				$(this).addClass("hide-reveal");	
			}
			if (!$(this).hasClass("reveal-animation-complete")) {
				
				if (Bottom > objectOffsetTop) {
					$(this).animate({"opacity" : 1, "right" : 0}, speed).addClass("reveal-animation-complete");
				} 
			}
		});
	}

	$.fn.rollingOnScroll =function(){
		return $(this).each(function() {
			var obj =$(this);
			var objectOffsetTop = obj.offset().top;
			if (! obj.hasClass("hide-rolling")) {
			      obj.slideUp().addClass("hide-rolling");
				}
			if (Bottom > objectOffsetTop) {	
				if(! obj.hasClass("rolling-animation-complete") ){
				  obj.slideDown(500).addClass("rolling-animation-complete");
				}
			}	
		});
	}


	function revealCommand(){
		$("img.reveal").revealOnScroll("right", 400);
		$("ul.reveal li:odd").revealOnScroll("right", 800);
		$("ul.reveal li:even").revealOnScroll("left", 800);

	}

	function rollingCommand(){
		$("img.rolling").rollingOnScroll();
	}

	rollingCommand();
	revealCommand();


	$(window).scroll(function(){
		Bottom = $(window).scrollTop() + $(window).height() ;  
		revealCommand(); 
		rollingCommand();
	});







});
