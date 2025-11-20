var current_slide = 1;		

var slides_counter='';
var max_num = 3;
var timeout = 5000;

function start_sliders_interval(){
	if(slides_counter==''){
		slides_counter=window.setInterval('rotate_slides()',timeout);
	}
}

function stop_sliders_interval(){
	if(slides_counter!=''){
		window.clearInterval(slides_counter);
		slides_counter='';
	}
}
function call_slide(slide_num){	
	var n = 1;
	while(n<=max_num){
		if(slide_num == n){		
			document.getElementById('slide'+n+'_1').style.display = 'block';
			document.getElementById('slide'+n+'_2').style.display = 'block';
			document.getElementById('but_'+n).className = 'act';
			
		}
		else {
			document.getElementById('slide'+n+'_1').style.display = 'none';
			document.getElementById('slide'+n+'_2').style.display = 'none';
			document.getElementById('but_'+n).className = '';		
		}
		n++
	}	
}

function rotate_slides() {
	current_slide = current_slide + 1;
	if(current_slide > max_num) current_slide = 1;			
	call_slide(current_slide);
}
