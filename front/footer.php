<!-- Footer -->
</div>
</div>
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Attractif 2014</p>
        </div>
    </div>
</footer>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
<script type="text/javascript">
    var temps = <?php echo $secondes; ?>;
    var timer = setInterval('CompteaRebour()', 1000);
    function CompteaRebour() {

        temps--;
        j = parseInt(temps);
        h = parseInt(temps / 3600);
        m = parseInt((temps % 3600) / 60);
        s = parseInt((temps % 3600) % 60);
        document.getElementById('timer').innerHTML =
                ' <div class="inline"><span class="hour">' + (h < 10 ? "0" + h : h) + '</span><p>HEURES</p></div> ' +
                ' <div class="inline"><span class="min">' + (m < 10 ? "0" + m : m) + '</span><p>MINUTES</p></div> ' +
                ' <div class="inline"><span class="sec">' + (s < 10 ? "0" + s : s) + '</span><p>SECONDES</p></div> ';
        if ((s == 0 && m == 0 && h == 0)) {
            clearInterval(timer);
            url = "<?php echo $redirection; ?>"
            Redirection(url)
        }
    }
    function Redirection(url) {
        setTimeout("window.location=url", 500)
    }
</script>
<script type="text/javascript" src="js/mfcarousel.js"></script>
<script>
    $(function() {
        $(".mfcarousel").MFCarousel({
            btnNext: ".next",
            btnPrev: ".prev"
        });
    });
</script>
</body>
</html>