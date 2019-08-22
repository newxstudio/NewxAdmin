$(function(){
	var pageNum_x = 0;

	for (var i = 0; i < $('.runPage_x').length; i++) {
		$('.runPage_x').eq(i).css('z-index',7-2*i);
		$('.runPage_x').eq(i).children('.bookBox_x').css('z-index',7-2*i);
		$('.runPage_x').eq(i).children('img').css('z-index',6-2*i);
	};

	$('.nextBtn_x').bind('click',function(){
			if ( pageNum_x <= 2 ) {
				runNext(pageNum_x);
			pageNum_x++;
			};
			console.log(pageNum_x);					
	});

	function runNext(index){
		$('.runPage_x').eq(index).addClass('runClass_x');
		zIndexNext(index,$('.runPage_x').eq(index));
	}

	function zIndexNext(index,element){
		if ( index >= 1 ) {
			element.css('z-index',3+2*index);
		};	
		setTimeout(function(){
			if (index==0) {
				element.css('z-index',3+2*index);
			};
			element.children('.bookBox_x').css('z-index',2+2*index);
			element.children('img').css('z-index',3+2*index);		
		},1000);
	}

	$('.lastBtn_x').bind('click',function(){
			if ( pageNum_x >= 1 ) {				
			pageNum_x--;
			runLast(pageNum_x);
			};
			console.log(pageNum_x);					
	});

	function runLast(index){
		$('.runPage_x').eq(index).removeClass('runClass_x');
		zIndexLast(index,$('.runPage_x').eq(index));
	}

	function zIndexLast(index,element){
		if (index == 0) {
			element.css('z-index',7-2*index);
		};
		setTimeout(function(){
			element.css('z-index',7-2*index);
			element.children('.bookBox_x').css('z-index',7-2*index);
			element.children('img').css('z-index',6-2*index);		
		},1000);
	}
});