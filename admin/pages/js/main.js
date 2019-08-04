

var degrees = 1, flagR = 0, flagL = 0;
function rotateright(el){
    if(flagL!=0){
        degrees = degrees+2;
        flagL=0;
    }
    console.log("Right = "+degrees); 
	var elem = document.getElementById(el);
	if(navigator.userAgent.match("Chrome")){
		elem.style.WebkitTransform = "rotate("+degrees+"deg)";
	} else if(navigator.userAgent.match("Firefox")){
		elem.style.MozTransform = "rotate("+degrees+"deg)";
	} else if(navigator.userAgent.match("MSIE")){
		elem.style.msTransform = "rotate("+degrees+"deg)";
	} else if(navigator.userAgent.match("Opera")){
		elem.style.OTransform = "rotate("+degrees+"deg)";
	} else {
		elem.style.transform = "rotate("+degrees+"deg)";
	}
	
	++degrees;
    localStorage.setItem("degrees", degrees);
	if(degrees > 359){
		degrees = 1;
	}
    flagR++;
}
function rotateleft(el){
    if(flagR!=0){
        degrees = degrees-2;
        flagR=0;
    }

    console.log("Left = "+degrees); 
	var elem = document.getElementById(el);
	if(navigator.userAgent.match("Chrome")){
		elem.style.WebkitTransform = "rotate("+degrees+"deg)";
	} else if(navigator.userAgent.match("Firefox")){
		elem.style.MozTransform = "rotate("+degrees+"deg)";
	} else if(navigator.userAgent.match("MSIE")){
		elem.style.msTransform = "rotate("+degrees+"deg)";
	} else if(navigator.userAgent.match("Opera")){
		elem.style.OTransform = "rotate("+degrees+"deg)";
	} else {
		elem.style.transform = "rotate("+degrees+"deg)";
	}
	
	--degrees;
    localStorage.setItem("degrees", degrees);
	if(degrees > 359){
		degrees = 1;
	}
    flagL++;
}   

var zoomLevel = 100;
var maxZoomLevel = 200;
var minZoomLevel = 10;
var flag=0;
function zoom(zm) {
    var img=document.getElementById("pic");
    if(zm > 1){
        if(zoomLevel < maxZoomLevel){
            zoomLevel++;
            localStorage.setItem("zoom", zoomLevel);
        }else{
            return;
        }
    }else if(zm < 1){
        if(zoomLevel > minZoomLevel){
            zoomLevel--;
            localStorage.setItem("zoom", zoomLevel);
        }else{
            return;
        }
    }
    wid = img.width;
    ht = img.height;
    img.style.width = (wid*zm)+"px";
    img.style.height = (ht*zm)+"px";
	if(flag==0)
	{
		console.log(img.style.top);
		img.style.marginLeft = -(img.width/2) + "px";
		img.style.marginTop = -(img.height/2) + "px";
		img.style.left = (img.width-70) + "px";
		img.style.top = -(img.width+90) + "px";
		console.log(img.style.top);
		flag=1;
	}
	else
	{
		img.style.marginLeft = -(img.width/2) + "px";
		img.style.marginTop = -(img.height/2) + "px";
	}
}   
        var startx = 0
			var starty = 0
			var dist = 0
			var touchobj;
		function startDrag(e) {
			
			var drag_area = document.getElementById('drag_area')
			
            // determine event object
            if (!e) {
                var e = window.event;
            }

            // IE uses srcElement, others use target
            var targ = e.target ? e.target : e.srcElement;
			touchobj = e.changedTouches[0] // reference first touch point (ie: first finger)
			startx = parseInt(touchobj.clientX)
			starty = parseInt(touchobj.clientY)
            if (targ.className != 'dragme') {return};
            // calculate event X, Y coordinates
                offsetX = startx;
                offsetY = starty;
				console.log(startx+" "+starty);
            // assign default values for top and left properties
            if(!targ.style.left) { targ.style.left='0px'};
            if (!targ.style.top) { targ.style.top='0px'};

            // calculate integer values for top and left 
            // properties
            coordX = parseInt(targ.style.left);
            coordY = parseInt(targ.style.top);
			console.log(coordX+" "+coordY);
            drag = true;

            // move div element
			
                drag_area.addEventListener('touchmove', function(e){
				console.log("Event started and moving");
				dragDiv();
				e.preventDefault()
			}, false);

        }
        function dragDiv(e) {
            if (!drag) {return};
            if (!e) { var e= window.event};
            var targ=e.target?e.target:e.srcElement;
            // move div element
            left=coordX+parseInt(e.changedTouches[0].clientX)-offsetX+'px';
            top=coordY+parseInt(e.changedTouches[0].clientY)-offsetY+'px';
			console.log(coordX+" "+parseInt(e.changedTouches[0].clientX)+" "+offsetX);
			console.log(coordY+" "+parseInt(e.changedTouches[0].clientY)+" "+offsetY);
            targ.style.left=coordX+parseInt(e.changedTouches[0].clientX)-offsetX+'px';
            targ.style.top=coordY+parseInt(e.changedTouches[0].clientY)-offsetY+'px';
            localStorage.setItem("left", left);
            localStorage.setItem("top", top);
            return false;
        }
        function stopDrag() {
            drag=false;
        }
        window.onload = function(e) {
			var drag_area = document.getElementById('drag_area')
            if(localStorage.left)
            {
                
            }
            drag_area.addEventListener('touchstart', function(e){
				console.log("Event started");
				startDrag();
				e.preventDefault()
			}, false)
            
            drag_area.addEventListener('touchend', function(e){
				console.log("Event stoped");
				stopDrag();
				e.preventDefault()
			}, false)
            
        }

   