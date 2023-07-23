<?php
    $map = true;
    include "phpinclude/header.php";

    $h2 = "La Tresse&nbsp;: un tiers-lieu multisite";
    // il faudra gérer le problème d'affichage

    $h1 = "La Tresse ectetur elit. Ratione quos, obcaecati molestias assumenda similique, soluta odit enim voluptates saepe libero deserunt reprehenderit in laboriosam eligendi nam tempora voluptas quaerat recusandae.";

    include "phpinclude/hero.php";
    include "phpinclude/longedging.php";
?>

<div class="main_content">
    
    <div class="carto-p">
    <h2>Cartographie</h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. 
    </p>
    </div>

    <div id="mapid" style="height: 500px; width: 100%;"></div>

    <section id="carto_cards">
        
        <div class="carto_cards_container1">
            <div class="cartocard">
                <div class="cartocard_left">
                    <h4>TIERS-LIEUX</h4>
                    <h3>Espaces de vie</h3>
                    <p>
                    Lieu de convivialité dans un cadre de brasserie avec des jeux, lieu d’échange, lieu de joie et de brassage générationnel et de cultures («bouillon de culture»), de formation (Tiers-Lieu d’innovation sociétale)...
                    </p>
                </div>

                <div class="center">
                    <img class="cartocard_img" src="img/cartocard.png" alt="description">
                </div>
                <div class="center">
                    <img class="cartocard_img" src="img/cartocard.png" alt="description">
                </div>
            </div>
        </div>

        <div class="carto_cards_container1">
            <div class="cartocard">
                <div class="cartocard_left">
                    <h4>TIERS-LIEUX</h4>
                    <h3>Des apprenants</h3>
                    <p>
                    Lieu de convivialité dans un cadre de brasserie avec des jeux, lieu d’échange, lieu de joie et de brassage générationnel et de cultures («bouillon de culture»), de formation (Tiers-Lieu d’innovation sociétale)...Lieu de co-création et de travail à l’attention des usagers et des nomades, mise en place de modules de qualifications pour les métiers de demain, de conférences et d’événements, d’apprentissage et transmission, de services – accès internet, ordinateurs, outils de partage, paper-board, …
                    </p>
                </div>

                <div class="center">
                    <img class="cartocard_img" src="img/cartocard.png" alt="description">
                </div>
                <div class="center">
                    <img class="cartocard_img" src="img/cartocard.png" alt="description">
                </div>
            </div>
        </div>

        <div class="carto_cards_container1">
            <div class="cartocard">
                <div class="cartocard_left">
                    <h4>TIERS-LIEUX</h4>
                    <h3>Éphémères</h3>
                    <p>
                    Lieux éphémères pour l’organisation des activités événementielles par le partenariat, par le « faire-avec », avec les associations et les entreprises. Créer de nouveaux modèles économiques en tenant compte des tendances disruptives…
                    </p>
                </div>

                <div class="center">
                    <img class="cartocard_img" src="img/cartocard.png" alt="description">
                </div>
                <div class="center">
                    <img class="cartocard_img" src="img/cartocard.png" alt="description">
                </div>
            </div>
        </div>
        
        
    </section>
</div>



<?php
    include "phpinclude/longedging.php";
    include "phpinclude/footer.php";
?>