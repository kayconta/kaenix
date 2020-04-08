$(function(){

            var t = 17;
            var com = setInterval(function(){
              t--;
            var but = document.getElementById('but');
            if (t == 0) {

               but.click( true ); 
            }

            },1000);

      
            
 });