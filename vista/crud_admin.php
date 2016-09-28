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
        <style>
            .block-btn{
                width: 100%;
            }
        </style>
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
                        <div class="collapsible-header"><i class="material-icons">group_work</i>Empresas</div>
                        <div class="collapsible-body">
                            <a class="btn blue waves-effect waves-light block-btn" id="company">Company</a>
                            <a class="btn blue waves-effect waves-light block-btn" id="center">Center</a>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">contacts</i>Usuarios</div>
                        <div class="collapsible-body">
                            <a class="btn waves-effect waves-light block-btn" id="feedback">Feedback</a>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">picture_in_picture</i>Eventos</div>
                        <div class="collapsible-body">
                            <a class="btn green darken-4 waves-effect waves-light block-btn" id="resource">Resource</a>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">settings</i>Settings</div>
                        <div class="collapsible-body">
                            <a class="btn orange darken-4 waves-effect waves-light block-btn" id="level">Level</a>
                        </div>
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

            $('#center, #company').click(function () {
                url = "../logica/crud_" + $(this).attr('id') + ".php";
                $('.progress').children('div').toggleClass('determinate').toggleClass('indeterminate');
                $('#content').load(url, function () {
                    $('.progress').children('div').toggleClass('determinate').toggleClass('indeterminate');
                });
            });
        });
    </script>
</html>

