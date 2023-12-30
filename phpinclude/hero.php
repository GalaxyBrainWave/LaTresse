<section id="hero">
    <div class="herotext_container">
        <div class="herotext_widthcontrol">
            <h2 class="hero_h2_main_variation">
                <span class="ochrebg">
                    <?= $h2 ?>
                </span>
            </h2>
            <?php 
                if (isset($h3)) { ?>
                    <span class="ochrebg">
                        <?= $h3 ?>  
                    </span>
            <?php
                }
            ?>

            <h1 class="hero_h1_main_variation">
                <span class="ochrebg">
                <?= $h1 ?>
                </span>
            </h1>
            <a href="adhesion.html">
                <button class="button_adhere pointer">
                    <p>Adhérer</p>
                    <img src="img/icons/chevron_right.svg" alt="">
                </button>
            </a>
        </div>
    </div>
</section>