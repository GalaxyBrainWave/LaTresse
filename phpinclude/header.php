<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/main.css">

    <?php
        if (isset($map)) { ?>
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
            <script src="https://unpkg.com/leaflet/dist/leaflet.js" defer></script>
            <script defer>
                var map = L.map('mapid').setView([51.505, -0.09], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    maxZoom: 19,
                }).addTo(map);
            </script>
    <?php
        }
    ?>

    <title>La Tresse - Accueil</title>

</head>

<body>








    <header>
        <a href="index.php">
            <img class="header_logo" src="img/logo/logo1.png" alt="Logo de la Tresse">
        </a>
        <nav>
            <img id="nav_burger" class="pointer" src="img/icons/burger3.png" alt="burger menu icon">            
            <div id="menu_container"> <!-- display hidden on small screens, d:block from 900px, d property manipulated in js -->
                <ul>
                    <li id="navbar_submenu_container"> 
                        <p id="nav_decouvrir">
                            Découvrir la Tresse
                            <svg id="icon_menu_down" fill="#182E49" width="6px" height="6px" viewBox="0 0 16 16"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <path d="M5.843 6.05l2.121 2.122 2.122-2.122L11.5 7.464 7.964 11 4.43 7.464 5.843 6.05zM16 8c0 4.418-3.59 8-8 8-4.418 0-8-3.59-8-8 0-4.418 3.59-8 8-8 4.418 0 8 3.59 8 8zm-2 0c0-3.307-2.686-6-6-6-3.307 0-6 2.686-6 6 0 3.307 2.686 6 6 6 3.307 0 6-2.686 6-6z" fill-rule="evenodd"></path> </g></svg>
                        </p>
                        <ul class="navbar_submenu">
                            <li>
                                <a href="historique.php">Historique</a>
                            </li>
                            <li>
                                <a href="services.php">Services</a>
                            </li>
                            <li>
                                <a href="communaute.php">Communauté</a>
                            </li>
                            <li>
                                <a href="cartographie.php">Cartographie</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="tierslieux.php">Tiers-Lieux</a>
                    </li>
                    <li>
                        <a href="projets.php">Projets</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a class="nav_actualites" href="actualites.php">Actualités</a>
                    </li>
                    <li>
                        <a class="nav_connexion" href="connexion.php">NomRS</a>
                    </li>
                </ul>
                <img id="close_button" class="pointer" src="img/icons/close.png" alt="burger menu icon">
            </div>

        </nav>
    </header>

    <main>