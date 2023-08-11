<?php
    session_name("latresse-php");
    session_start();

    // if (!isset($_SESSION["userid"])) {
    //     header("Location: ./register.php");
    //     exit;
    // }
    
    require_once "./includes/header-admin.php";
?>

    <main id="main-dash">

        <!-- Date et heure -->

        <section id="datetime">

            <article id="date-hour">
                <div id="date">
                    <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m512 169c0-33.41 0-56.783 0-59 0-24.813-20.187-45-45-45h-6v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-100v55c0 8.284-6.716 15-15 15s-15-6.716-15-15c0-16.839 0-63.232 0-80 0-8.284-6.716-15-15-15s-15 6.716-15 15v25h-36c-24.813 0-45 20.187-45 45v59z"/><path d="m0 199v243c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45 0-6.425 0-146.812 0-243-9.335 0-506.836 0-512 0zm144 208h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm128 128h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-32c-8.284 0-15-6.716-15-15s6.716-15 15-15h32c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/></g></svg>
                    <h5><?php date_default_timezone_set("Europe/Paris"); echo date('d/m/Y'); ?></h5>
                </div>
                <div id="hour">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M437.02,74.981C388.668,26.629,324.38,0,256,0S123.332,26.629,74.98,74.981C26.628,123.333,0,187.62,0,256s26.628,132.668,74.98,181.019C123.332,485.37,187.62,512,256,512s132.668-26.629,181.02-74.981C485.372,388.667,512,324.38,512,256S485.372,123.332,437.02,74.981z M256,461.752c-113.453,0-205.752-92.3-205.752-205.752c0-0.186,0.006-0.37,0.007-0.554c0-0.047-0.007-0.092-0.007-0.139c0-0.079,0.01-0.155,0.012-0.233c0.499-112.093,91.086-203.29,202.944-204.79c0.234-0.011,0.466-0.035,0.703-0.035c0.142,0,0.28,0.017,0.421,0.021c0.558-0.004,1.114-0.021,1.673-0.021c113.453,0,205.752,92.3,205.752,205.752S369.453,461.752,256,461.752z"/></g></g><g><g><path d="M412.287,268.36c-8.366,0-15.148-6.782-15.148-15.148c0-8.366,6.782-15.148,15.148-15.148h18.259c-8.576-84.076-76.762-150.773-161.492-157.035v15.895c0,8.366-6.782,15.148-15.148,15.148c-8.366,0-15.148-6.782-15.148-15.148V81.391c-83.476,8.18-149.969,75.102-157.492,158.766h16.352c8.366,0,15.148,6.782,15.148,15.148c0,8.366-6.782,15.148-15.148,15.148H81.142c6.965,85.011,74.791,153.045,159.71,160.342v-19.203c0-8.366,6.782-15.148,15.148-15.148c8.366,0,15.148,6.782,15.148,15.148v19.203c85.614-7.357,153.853-76.451,159.867-162.435H412.287z M317.32,216.102l-50.608,50.609c-2.841,2.841-6.693,4.437-10.711,4.437c-4.017,0-7.871-1.596-10.711-4.437l-88.093-88.093c-5.916-5.915-5.916-15.506,0-21.422c5.915-5.916,15.506-5.916,21.422,0l77.383,77.382L295.9,194.68c5.915-5.916,15.506-5.916,21.422,0C323.236,200.595,323.236,210.187,317.32,216.102z"/></g></g></svg>
                    <h5><?php date_default_timezone_set("Europe/Paris"); echo date('H:m:s'); ?></h5>
                </div>
            </article>

        </section>

        <!-- Tableau de gestion -->

        <section class="content-section">

            <article class="card-section">

                <div class="title-section">
                    <h2>Ecrire mon article</h2>
                </div>

                <div class="blog-creation">

                    <form action="" method="post" class="blog-section" enctype="multipart/form-data">

                        <div class="title-img">
                            <input type="text" name="title" id="title1" placeholder="Titre de l'article">
                            <input type="file" name="img-container" id="img-container" accept=".png, .jpg, .jpeg" placeholder="Choisir une image">
                        </div>

                        <div class="text-editor">
                            <textarea name="text-edit" id="text-edit" cols="30" rows="11" placeholder="Ecrire l'article"></textarea>
                        </div>

                        <div id="section-plus">

                        </div>

                        <div class="bottom-form">

                            <div class="add-section">
                                <button type="button" id="section-more">
                                    Ajouter une section
                                    <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m467 211h-166v-166c0-24.853-20.147-45-45-45s-45 20.147-45 45v166h-166c-24.853 0-45 20.147-45 45s20.147 45 45 45h166v166c0 24.853 20.147 45 45 45s45-20.147 45-45v-166h166c24.853 0 45-20.147 45-45s-20.147-45-45-45z"/></g></svg>
                                </button>
                            </div>

                            <div class="send-help">

                                <div class="blog-button">
                                    <button>
                                        <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m256 512c-24.813 0-45-20.187-45-45s20.187-45 45-45 45 20.187 45 45-20.187 45-45 45z"/><path d="m256 390.002c-24.813 0-44.999-20.187-44.999-45v-102.998c0-24.813 20.186-45 44.999-45 14.803 0 28.583-5.926 38.802-16.687 10.195-10.748 15.389-24.856 14.618-39.719-1.441-27.802-24.412-50.021-52.297-50.585-.374-.008-.75-.012-1.123-.012-26.631 0-49.299 19.583-52.98 45.979-.345 2.475-.52 5.005-.52 7.522 0 24.813-20.187 45-45 45s-45-20.187-45-45c0-6.69.468-13.416 1.391-19.99 10.026-71.877 72.415-124.95 145.053-123.482 74.821 1.515 136.474 61.212 140.356 135.903v.002c2.062 39.76-11.873 77.528-39.238 106.349-16.331 17.205-36.571 30.002-59.062 37.435v65.284c.001 24.813-20.187 44.999-45 44.999z"/></g></g></svg>
                                        Aide
                                    </button>
                                </div>

                                <div class="blog-button">
                                    <button>
                                        <svg id="Capa_1" enable-background="new 0 0 511.997 511.997" height="512" viewBox="0 0 511.997 511.997" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m511.967 47.546c-.612-9.754-10.503-16.825-20.57-12.972-2.558 1.031 21.188-15.597-340.098 241.698-3.952 2.815-6.298 7.367-6.298 12.218v175c0 6.909 4.735 12.977 11.531 14.593 6.747 1.604 13.733-1.629 16.865-7.843 5.555-11.024 54.694-108.535 63.008-125.032l271.481-286.397c2.891-3.05 4.344-7.131 4.081-11.265z"/><path d="m261.209 362.649-7.363 14.61 112.214 83.278c8.313 6.17 20.262 2.246 23.287-7.669l101.359-332.326z"/><path d="m133.896 251.836 244.5-174.125-368.746 140.767c-5.801 2.215-9.638 7.775-9.65 13.984-.012 6.21 3.803 11.785 9.596 14.022l105.443 40.723c.404-14.044 7.374-27.193 18.857-35.371z"/></g></svg>
                                        Publier
                                    </button>
                                </div>

                                <div class="blog-button">
                                    <button>
                                        <svg id="Capa_1" enable-background="new 0 0 511.997 511.997" height="512" viewBox="0 0 511.997 511.997" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m511.967 47.546c-.612-9.754-10.503-16.825-20.57-12.972-2.558 1.031 21.188-15.597-340.098 241.698-3.952 2.815-6.298 7.367-6.298 12.218v175c0 6.909 4.735 12.977 11.531 14.593 6.747 1.604 13.733-1.629 16.865-7.843 5.555-11.024 54.694-108.535 63.008-125.032l271.481-286.397c2.891-3.05 4.344-7.131 4.081-11.265z"/><path d="m261.209 362.649-7.363 14.61 112.214 83.278c8.313 6.17 20.262 2.246 23.287-7.669l101.359-332.326z"/><path d="m133.896 251.836 244.5-174.125-368.746 140.767c-5.801 2.215-9.638 7.775-9.65 13.984-.012 6.21 3.803 11.785 9.596 14.022l105.443 40.723c.404-14.044 7.374-27.193 18.857-35.371z"/></g></svg>
                                        Publier en tant que projet
                                    </button>
                                </div>
                            </div>

                        </div>
                        
                    </form>

                </div>

            </article>

        </section>


    </main>

<?php
    require_once "./includes/footer-admin.php";
?>