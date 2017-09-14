function myfunction1() 
		{
			var amount =  100;
			var id_value = document.getElementById('id_value');
			id_value.value = amount;
		}
function myfunction2() 
		{
			var amount =  500;
			var id_value = document.getElementById('id_value');
			id_value.value=amount;
		}
function myfunction3() 
		{
			var amount =  1000;
			var id_value = document.getElementById('id_value');
			id_value.value=amount;
		}
function myfunction4() 
		{
			var amount =  2000;
			var id_value = document.getElementById('id_value');
			id_value.value=amount;
		}
function myfunction5() 
		{
var amount =  5000;
var id_value = document.getElementById('id_value');
id_value.value=amount;
		}

function countChar(val) 
	{
        var len = val.value.length;
        if (len >= 1000) 
		{
            val.value = val.value.substring(0, 1000);
        } 
		else 
		{
            $('#charNum').text(1000 - len);
        }
    }





$(document).ready(function()
		{
            var s= document.getElementById('card_msg2');
            s.innerHTML = 'Teachers Day';
        $(".display").hide();
        $("#Card3dis").show();
        $("#smallPic>img").click(function(){
        $(".display").hide();
        $(("#"+this.id +"dis")).show();			
		var cardnameintext = this.id;
		var id_value2 = document.getElementById('cardname');
		
		
		
		
        id_value2.value = cardnameintext;
		
		
		var formHandle =  document.forms[0];
		formHandle.onclick = processForm;
		function processForm(){
		
		$("#cardselectiondisplay").html(($("#cardname").val())+"");
		console.log("hi");
		$("#card_msg").hide();
		
		
		var check = ($("#cardname").val());
		console.log(check);
		if (check =="Card1")
		{
			var  cardreal = "Father's Day";
					
	    }
		else if (check =="Card2")
		{
			var  cardreal = "Happy Birthday";
	    }
		else if (check =="Card3")
		{
			var  cardreal = "Teachers Day";
	    }
		else if (check =="Card4")
		{
			var  cardreal = "Happy Friendship Day";					
	    }
		else if (check =="Card5")
		{
			var  cardreal = "Happy Anniversary";					
	    }
		else if (check =="Card6")
		{
			var  cardreal = "Women's Day";					
	    }
		else if (check =="Card7")
		{
			var  cardreal = "Holding Hands";					
	    }
		else if (check =="Card8")
		{
			var  cardreal = "Wedding Rings";					
	    }
		else if (check =="Card9")
		{
			var  cardreal = "Wedding Cake";
				
	    }
		else if (check =="Card10")
		{
			var  cardreal = "Rings & Rose";
						
	    }
		else if (check =="Card11")
		{
			var  cardreal = "Finger Puppets";
				
	    }
		else if (check =="Card12")
		{
			var  cardreal = "Bride & Groom";
					
	    }
		else if (check =="Card13")
		{
			var  cardreal = "Valentines Couple";
				
	    }
		else if (check =="Card14")
		{
			var  cardreal = "Red Heart";
					
	    }
		else if (check =="Card15")
		{
			var  cardreal = "Heart and Cupids";
				
	    }
		else if (check =="Card16")
		{
			var  cardreal = "Valentines Rose";
						
	    }
		else if (check =="Card17")
		{
			var  cardreal = "Couple Umbrella";					
	    }
		else if (check =="Card18")
		{
			var  cardreal = "Mouse & Heart";					
	    }
		else if (check =="Card19")
		{
			var  cardreal = "White Rabbit";
					
	    }
		else if (check =="Card20")
		{
			var  cardreal = "Glass Pebbles";
					
	    }
		else if (check =="Card21")
		{
			var  cardreal = "Little Bird";					
	    }
		else if (check =="Card22")
		{
			var  cardreal = "Baby Fox";
	    }
		else if (check =="Card23")
		{
			var  cardreal = "White Flower";					
	    }
		else if (check =="Card24")
		{
			var  cardreal = "Butterfly";					
	    }
        else if (check =="Card25")
        {
            var  cardreal = "Merry Christmas";
        }
        else if (check =="Card26")
        {
            var  cardreal = "Happy Vacation";
        }
        else if (check =="Card27")
        {
            var  cardreal = "Happy New Year";
        }
        else if (check =="Card28")
        {
            var  cardreal = "Happy Easter";
        }
        else if (check =="Card29")
        {
            var  cardreal = "Canada Day";
        }
        else if (check =="Card30")
        {
            var  cardreal = "Mothers Day";
        }

		var s= document.getElementById('card_msg2');
        s.innerHTML = cardreal;		
	}
		
		
		
		
        });
		});
function myFunction() 
		{
         $('#charNum').text(1000);

        }
 



	
 