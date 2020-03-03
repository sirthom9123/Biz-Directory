<script type="text/javascript">
     function setIdle(cb, seconds) {
    var timer; 
    var interval = seconds * 1000;
    function refresh() {
            clearInterval(timer);
            timer = setTimeout(cb, interval);
    };
    $(document).on('keypress click mousemove', refresh);
    refresh();
}

setIdle(function() {
    location.href = 'out.php?session_expired=1';
}, 6);
</script