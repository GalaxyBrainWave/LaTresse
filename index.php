<?php
    include "phpinclude/header.php";
?>


<section id="hero">
    <div class="herotext_container">
        <p id="maintitle">
            <span class="ochrebg">
            &nbsp; La Tresse &nbsp;
            </span>
        </p>
        <h3>
            <span class="ochrebg">
                (Premier) tiers-lieu de <br>
                familles rurales 83
            </span>
        </h3>
        <h1>
            <span class="ochrebg">
                Créer du lien social à travers des tiers-lieux <br>
                et s'inscrire dans le cadre de l'éducation <br>
                populaire auprès de publics divers et de <br>
                générations différentes
            </span>
        </h1>
        <a href="adhesion.html">
            <button class="button_adhere pointer">
                <p>Adhérer</p>
                <img src="img/icons/chevron_right.svg" alt="">
            </button>
        </a>
    </div>
</section>

<?php
    include "phpinclude/nouveau.php";
?>

<section id="actualites">
    <div class="actualites_container">
        <div class="button_yellow_edging_container">
            <a href="actualites.php">
                <button class="button_yellow pointer">
                    <p>Actualités <span>de la Tresse</span></p>
                    <img src="img/icons/chevron_right_bluetext.svg" alt="">
                </button>
            </a>
            <div class="actualites_edging w100"></div>
        </div>

        <article class="actualites_card">
            <div class="actualites_card_left"></div>
            <div class="actualites_card_right">
                <h5>Titre article</h5>
                <p class="actualites_card_date">16 juin 2023</p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias ...Lorem, ipsum dolor sit amet.
                </p>
                <div class="button_actualites_card_container">
                    <a href="#" class="button_actualites_card">
                        Lire
                    </a>
                </div>

            </div>
        </article>
    </div>
</section>
<div class="center">
    <div class="long_edging w90"></div>
</div>

<section class="landing_tierslieux">

    <article>
        <div class="landing_tierslieux_heading_container">
            <div class="landing_tierslieux_heading">
                Qu'est-ce qu'un tiers-lieu&nbsp;? 
            </div>
        </div>
        <img src="img/tierslieu320-800.jpg" alt="Tiers-Lieu" class="landing_tierslieux_img">
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta. 
        </p>
        <a href="tierslieux.html">
            <div class="center">
                <p class="landing_tierslieux_button">
                    En savoir plus
                </p>
            </div>
        </a>
    </article>

    <article>
        <div class="landing_tierslieux_heading_container">
            <div class="landing_tierslieux_heading">
                Qu'est-ce qu'un tiers-lieu&nbsp;? 
            </div>
        </div>
        <img src="img/tierslieu320-800.jpg" alt="Tiers-Lieu" class="landing_tierslieux_img">
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione quos, obcaecati molestias assumenda similique, soluta. 
        </p>
        <a href="tierslieux.html">
            <div class="center">
                <p class="landing_tierslieux_button">
                    En savoir plus
                </p>
            </div>
        </a>
    </article>

</section>

<?php
    include "phpinclude/footer.php";
?>