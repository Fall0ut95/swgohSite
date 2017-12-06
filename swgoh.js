$(document).ready(function() {
    $('#example').DataTable();
} );

function getGuild(){
	var input = document.getElementsByTagName('select');
	var value1 = input[0].options[input[0].selectedIndex].value;
	var value2 = input[1].options[input[1].selectedIndex].value;
	var value3 = input[2].options[input[2].selectedIndex].value;

	if (value1 == 'blank' || value2 == 'blank' || value3 == 'blank') {
		alert('Please answer all questions!');
	} else if (value1 == 'casual') {
		if (value2 == 'level1' || value2 == 'level2' || value2 == 'level3') {
			alert('BF');
		}else if (value2 == 'level4' || value2 == 'level5') {
			alert('Lonestar');
		}
	} else if (value1 == 'committed') {
		if (value2 == 'level1' || value2 == 'level2') {
			alert('SCH');
		}else if (value2 == 'level3') {
			if (value3 == 'level1' || value3 == 'level2') {
				alert('LSD');
			}else if (value3 == 'level3') {
				alert('DR or LSD');
			}else {
				alert('DR');
			}
		}else if (value2 == 'level4') {
			if (value3 == 'level1', 'level2', 'level3', 'level4', 'level5', 'level6') {
				alert('GtP or LS');
			}
		}else if (value2 == 'level5') {
			if (value3 == 'level1', 'level2', 'level3', 'level4', 'level5', 'level6') {
				alert('SB');
			}
		}
	}// end of if/else statement
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
