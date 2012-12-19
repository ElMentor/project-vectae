$(document).ready(function(){
	            $("#movableBox").draggable({ handle: ".deplaceur"});
	            $('#movableBox .closer').click(function() {
	            	$("#movableBox").hide();
	            
	            
	            });
        	});
        
        
function swap(page){
        workzone = document.getElementById('workZone');
        if (document.getElementById(page)) {
            var cells = workzone.getElementsByTagName("div"); 
            for (var i = 0; i < cells.length; i++) { 
                cells[i].style.zIndex = '0';
            }
            document.getElementById(page).style.zIndex = '2';
        }
    }