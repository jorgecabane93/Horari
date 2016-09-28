<?php
$page_title = "CRUD Admin";
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $page_title; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- JAVASCRIPT--> 
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <!-- Compiled and minified  MATERIALIZE JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>


        <!-- CSS -->
        <!-- Compiled and minified materialize CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <!-- -------------------NAV BAR---------------------------------- -->
        <nav>
            <div class="nav-wrapper blue">
                <a href="#" class="brand-logo">CRUD Admin Horari</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
        <!-- --------------------NAV BAR---------------------------------- -->

        <!-- -------------------CONTENT----------------------------------- -->
        <div class="row">
            <div class="progress">
                <div class="determinate blue" style="width: 100%;"></div>
            </div> 
            <!-- ------------------SIDE BAR----------------------------- -->
            <div class="col m2">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Categoria I</div>
                        <div class="collapsible-body">
                            <a class="btn" id="center">Center</a>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">place</i>Categoria II</div>
                        <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">whatshot</i>Categoria III</div>
                        <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                    </li>
                </ul>
            </div>
            <!-- ------------------SIDE BAR----------------------------- -->
            <div class="col m10 card-panel" id="content">
                Area de display de crud
            </div>
        </div>
        <!-- -------------------CONTENT----------------------------------- -->
    </body>
    <script>
        $(document).ready(function () {
            $('.collapsible').collapsible({
                accordion: false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });

            $('#center').click(function () {
                $('.progress').children('div').toggleClass('determinate').toggleClass('indeterminate');
                $('#content').load("../logica/crud_center.php", function () {
                    $('.progress').children('div').toggleClass('determinate').toggleClass('indeterminate');
                });
            });
        });
    </script>
</html>

