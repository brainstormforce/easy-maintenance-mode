    jQuery(document).ready(function(){
        function tick() {
        var to = "1 jan 2018";
        var xmas = new Date(to);
        var now = new Date();
        var timeDiff = xmas.getTime() - now.getTime();

        var seconds = Math.floor(timeDiff / 1000);
        var minutes = Math.floor(seconds / 60);
        var hours = Math.floor(minutes / 60);
        var days = Math.floor(hours / 24);
        hours %= 24;
        minutes %= 60;
        seconds %= 60;

        document.getElementById("daysBox").textContent = days;
        document.getElementById("hoursBox").textContent = hours;
        document.getElementById("minsBox").textContent = minutes;
        document.getElementById("secsBox").textContent = seconds;                
    }
    setInterval(tick, 1000);    
 });