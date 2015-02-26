<?php
$this->title = 'My MATA Application';
?>

<style type="text/css">

    body.loading, body.loading *, body.loading a  {
        cursor: url(111095-glowing-green-neon-icon-business-cursor.png), progress;
    }

    #submenus {
        height: 300px;
        width: 100%;
        background: #222636;
    }

    .cd-3d-nav li a::before {
        transition: left 0.2s;
    }

    .cd-3d-nav li a.hovered::before {
        left: -50%;
    }

    #progress-bar {
        height: 3px;
        width: 0px;
        background: #b471a3;
        opacity:0;
        transition: all 0.4s;
    }

    #progress-bar.success {
        background: #78b572;
    }

    #header-content-container {
        width: 90%;
        margin: auto;
    }

    header.cd-header {
        width: 100%;

    }

</style>


<iframe src="site/welcome" id="mata-content"></iframe>
<!-- 
    <h1>3D Rotating Navigation</h1>
    <a class="cd-article-btn" href="http://codyhouse.co/?p=468">
        <span>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
                <style type="text/css">
                    .cd-nugget-info-arrow{fill:#383838;}
                </style>
                <polygon class="cd-nugget-info-arrow" points="15,7 4.4,7 8.4,3 7,1.6 0.6,8 0.6,8 0.6,8 7,14.4 8.4,13 4.4,9 15,9 "></polygon>
            </svg>
        </span>
        Article &amp; Download
    </a>
    <br/><br/><br/><br/>
    <a onclick="showLoader()" class="cd-article-btn" href="#">
        Show loader
    </a>
    <br/><br/><br/><br/>
    <a onclick="simulateLoader()" class="cd-article-btn" href="#">
        Simulate loading
    </a> -->
    <!-- all your content here -->



<script src="./3D Rotating Navigation   CodyHouse_files/jquery-2.1.1.js"></script>
<script src="./3D Rotating Navigation   CodyHouse_files/main.js"></script> <!-- Resource jQuery -->
<script>
    function showLoader() {
        $("body").addClass("loading")
    }

    // $(".cd-3d-nav a").on("mouseover", function() {
    //  $(this).addClass("hovered")
    // }).on("mouseout", function() {
    //  $(this).removeClass("hovered")
    // })




function simulateLoader() {
    $("#progress-bar").width("0%").removeClass("success")

    setTimeout(function() {

        $("#progress-bar").css("opacity", 1)

        setTimeout(function() {
            $("#progress-bar").width("30%")
        }, 100)

        setTimeout(function() {
            $("#progress-bar").width("40%");
        }, 300)

        setTimeout(function() {
            $("#progress-bar").width("60%");
        }, 500)

        setTimeout(function() {
            $("#progress-bar").width("80%");
        }, 1000)

        setTimeout(function() {
            $("#progress-bar").width("100%")

            setTimeout(function() {
                $("#progress-bar").addClass("success")
            }, 150)

            setTimeout(function() {
                $("#progress-bar").css("opacity", 0)
            }, 900)

        }, 1200)
    }, 400)

}

</script>
