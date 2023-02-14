<?php

function generateMetadataWith($title) {
    return '<meta charset="UTF-8">
    <meta name="author" content="Pablo Caamaño">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link rel="stylesheet" href="css/index.css">';
}

function generateNavbar() {
    return "<nav>
        <ul>
            <li class='logo'><a href='#'>Simple Blog</a></li>
        </ul>
    </nav>";
}

function generateFooter() {
    return "<footer>
        <p>Desarrollado por <a href='http://pablocaamano.com.ar' target='_blank'>Pablo Caamaño</a></p>
    </footer>";
}
?>