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
<script src="js/owl-carousel/owl.carousel.js"></script>
<script>
    //SLIDER
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });

    //Timer
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

    //owl carousel


    $(document).ready(function() {

        //Sort random function
        function random(owlSelector) {
            owlSelector.children().sort(function() {
                return Math.round(Math.random()) - 0.5;
            }).each(function() {
                $(this).appendTo(owlSelector);
            });
        }

        $("#owl-demo").owlCarousel({
            navigation: true,
            navigationText: [
                "<i class='glyphicon glyphicon-chevron-left'></i>",
                "<i class='glyphicon glyphicon-chevron-right'></i>"
            ],
            beforeInit: function(elem) {
                //Parameter elem pointing to $("#owl-demo")
                random(elem);
            }

        });

    });


</script>
</body>
</html>