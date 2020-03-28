<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Summit Empowerment - FREE EMPOWERMENT TRAINING</title>

    <!-- Font Awesome Icons -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic'
          rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- About Section -->
<section class="page-section" style="background-color: #009688; padding-top: auto; padding-bottom: auto;" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">WELCOME TO TEL AVIV</h2>
                <hr class="divider light my-4">
                <p class="text-white-50 mb-4">Welcome to my Whatsapp Free training. Share this link to your friends
                    until the bar is filled to join the free training on the Whatsapp group</p><br>

                <div class="progress">
                    <div class="progress-bar" id="progress-bar" style="width:1%"></div>
                </div>
                <br>

                <a class="whatsapp btn btn-light btn-xl js-scroll-trigger" id="whatsapp"
                   href="whatsapp://send?text=https://chillyfacts.com/create-whatsapp-share-button-on-websites"
                   data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i> SHARE NOW</a><br><br>

                <a class="final btn btn-secondary btn-xl js-scroll-trigger" id="final"
                   href="https://chat.whatsapp.com/CcRzr7WWYZYAD68s4umBgU">Join Free Training</a>

            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="bg-light py-5">
    <div class="container">
        <div class="small text-center text-muted">Copyright &copy; 2020 - Smallville Technologies</div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/creative.min.js"></script>
<script>
    var cl1 = 0;
    var max_val = 10;
    $('document').ready(function () {
        $('#final').hide();
        $('#whatsapp').click(function () {
            cl1++;
            var widh = cl1 * 5.5;
            var elem = document.getElementById("progress-bar");
            elem.style.width = widh + `%`;
            if (cl1 > 19 - 1) {
                $('#final').show();
                var ck = document.getElementById("final");
                ck.click();
            }
        });
        $('#final').click(function (e) {
            if (cl1 < max_val) {
                alert("You have to share to your 10 friends/groups for Verification. " + eval(parseInt(max_val) - parseInt(cl1)) + " Group/Friend remaining");
                e.preventDefault();
            }
        });
    });

</script>

<script type="">
    var cl1 = 0;
    var max_val = 10;
    $('document').ready(function () {

        $('.whatsapp').click(function () {
            cl1++;
        });
        $('.final').click(function (e) {
            if (cl1 < max_val) {
                alert(" You have to share to your 10 friends/groups on WhatsApp for Verification. " + eval(parseInt(max_val) - parseInt(cl1)) + " Group/Friend remaining");
                e.preventDefault();
            }
        });

    });
</script>
<script type="">// changing progressbar when button is clicked
    $(".whatsapp").click(function () {
        animateProgress(parseInt($(this).data('diff')));
    });

    function animateProgress(diff) {
        var currValue = $("#progress").val();
        var toValue = currValue + diff;

        toValue = toValue < 0 ? 0 : toValue;
        toValue = toValue > 100 ? 100 : toValue;

        $("#progress").animate({'value': toValue}, 500);
    }
</script>

</body>

</html>
