location_actual();
function location_actual(){
    var urlCompleta = window.location.href;
    //console.log(urlCompleta);
    //console.log(window.location.search);
    var valores = window.location.search;

    var sub = valores.slice(4, 20);
    //console.log(sub);
    //return;
    $.post("panel/ajax/index.php?op=buscar_nombre",{sub:sub},function(data, status)
	{
	    data = JSON.parse(data);

		//console.log(data.nombre);
        $("#nombre_invitacion").text(data.nombre);

	});
}
        
        
        
        document.addEventListener('DOMContentLoaded', () => {
   
           //===
           // VARIABLES
           //===
           const DATE_TARGET = new Date('11/16/2025 0:01 AM');
           // DOM for render
           const SPAN_DAYS = document.querySelector('span#days');
           const SPAN_HOURS = document.querySelector('span#hours');
           const SPAN_MINUTES = document.querySelector('span#minutes');
           const SPAN_SECONDS = document.querySelector('span#seconds');
           // Milliseconds for the calculations
           const MILLISECONDS_OF_A_SECOND = 1000;
           const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
           const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;
           const MILLISECONDS_OF_A_DAY = MILLISECONDS_OF_A_HOUR * 24
   
           //===
           // FUNCTIONS
           //===
   
           /**
           * Method that updates the countdown and the sample
           */
           function updateCountdown() {
               // Calcs
               const NOW = new Date()
               const DURATION = DATE_TARGET - NOW;
               const REMAINING_DAYS = Math.floor(DURATION / MILLISECONDS_OF_A_DAY);
               const REMAINING_HOURS = Math.floor((DURATION % MILLISECONDS_OF_A_DAY) / MILLISECONDS_OF_A_HOUR);
               const REMAINING_MINUTES = Math.floor((DURATION % MILLISECONDS_OF_A_HOUR) / MILLISECONDS_OF_A_MINUTE);
               const REMAINING_SECONDS = Math.floor((DURATION % MILLISECONDS_OF_A_MINUTE) / MILLISECONDS_OF_A_SECOND);
               // Thanks Pablo Monteserín (https://pablomonteserin.com/cuenta-regresiva/)
   
               // Render
               SPAN_DAYS.textContent = REMAINING_DAYS;
               SPAN_HOURS.textContent = REMAINING_HOURS;
               SPAN_MINUTES.textContent = REMAINING_MINUTES;
               SPAN_SECONDS.textContent = REMAINING_SECONDS;
           }
   
           //===
           // INIT
           //===
           updateCountdown();
           // Refresh every second
           setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
        });