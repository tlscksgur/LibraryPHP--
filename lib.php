<?php

function ss() {
    return $_SESSION['ss'] ?? false;
}

function script($script){
    echo "<script>$script</script>";
}

function alert($msg) {
    script("alert('$msg')");
}

function move($uri, $msg = null) {
    if($msg) alert($msg);
    script("location.href='$uri'");
}

function back($msg = null) {
    if($msg) alert($msg);
    script("history.back()");
}

function views($page, $data=[]) {
    extract($data);
    require_once "../views/templeted/header.php";
    require_once "../views/$page.php";
    require_once "../views/templeted/footer.php";
}