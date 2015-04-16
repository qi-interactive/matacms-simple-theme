<?php
$this->title = 'My MATA Application';
?>

<style type="text/css">

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
        top: 0px;
        position: absolute;
    }

    #progress-bar.success {
      /*  background: #78b572;*/
      background: inherit;
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
