<?php
    require_once "phpinclude/rs_pagetop.php";

    $accueil_active = '';
    $projets_active = '';
    $reseau_active = 'navbar-active';
    $creer_active = '';
    $profil_active = '';
    $notifications_active = '';

?>

    <title>La Tresse - Réseau</title>

</head>

<body class="rslayout rsreseau">

<?php
    require_once "phpinclude/rs_header.php";
?>





  <main class="rscontent">
    <div class="rscards_header">
      <h2>Le réseau de La Tresse</h2>
      <p>Nombre total de membres&nbsp;: <span class="members_number">128</span></p>
      
    </div>

    <div class="rs_cards_container">

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

      <div class="rs_card">
        <img src="../img/rs/banner.png" alt="bannière de l'utilisateur" class="rs_card_banner">
        <img src="../img/rs/alf.jpg" alt="photo de profil" class="rs_card_profile_pic">
        <div class="rs_card_middle">
          <h3>Jean Durand</h3>
          <div class="rs_card_location">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#fffced" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
            <p>Cotignac</p>
          </div>
          <p>Star Trek Fan</p>
          <p>Membre depuis le 21/05/2023</p>
        </div>
        <div class="participation_score_title">
          <!-- <svg fill="#fffced" width="16px" height="16px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><rect height="6" width="19" x="23.00574" y="56"></rect><rect height="5.00001" transform="translate(-4.73979 10.43222) rotate(-45)" width="19.00002" x="0.72289" y="8.43754"></rect><rect height="19.00004" transform="translate(8.19277 41.39323) rotate(-45)" width="4.99998" x="51.56245" y="1.30705"></rect><path d="M44.55634,9.7066,41.865,9.59253a5.05767,5.05767,0,0,0-4.28314,1.43164l-5.50446,5.50446-5.75354-5.75354a3.8392,3.8392,0,0,0-3.85785-.90894A3.618,3.618,0,0,1,18.855,8.963l-.85388-.85388L7.39447,18.7157l1.728,1.728-.11408,2.69123A5.05776,5.05776,0,0,0,10.44,27.41809l9.61243,9.61243a4.98517,4.98517,0,0,1,1.69067-3.25891l-2.99493-2.99494.70709-.70709,3.12824,3.12823a4.94908,4.94908,0,0,1,1.42236-.54058V28.96332l-1.72217-1.72217.70709-.70715,1.01508,1.01507V22.19922a3.60983,3.60983,0,0,1,3.14258-3.625,3.506,3.506,0,0,1,.99078.0448l-1.22949-1.22949.70715-.7071L29.413,18.47858a3.54221,3.54221,0,0,1,3.40339-1.90827,3.60085,3.60085,0,0,1,3.1748,3.332,3.55741,3.55741,0,0,1,1.8252-.332,3.62038,3.62038,0,0,1,3.18945,3.66309v3.42383a5.00355,5.00355,0,0,1,3.8161,3.62518l2.78851-2.78851.7071.70715L45.00226,31.5163c.00012.01373.0036.02655.0036.04034v3.32007a3.96267,3.96267,0,0,0,2.37891-1.12848l6.84014-6.84015a3.839,3.839,0,0,0,.90888-3.85785,3.61818,3.61818,0,0,1,.9032-3.61108l.85388-.85388L46.2843,7.97864Z"></path><path d="M29.88043,21.68951a2.49081,2.49081,0,0,0-2.72583-2.18866,2.598,2.598,0,0,0-2.24225,2.62964V33.48785a4,4,0,0,0-4,4v9.67347a3.83915,3.83915,0,0,0,2.08521,3.3706,3.618,3.618,0,0,1,1.91479,3.192v1.20758h15V52.48785L41.896,50.66547a5.05755,5.05755,0,0,0,2.01635-4.041V31.48785a4,4,0,0,0-4-4V23.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.49273,2.49273,0,0,0-2.68231,2.09906h.45843V38.0401h-1V22.59674h.5V20.16528a2.62152,2.62152,0,0,0-2.27612-2.6676,2.50036,2.50036,0,0,0-2.72388,2.49017v1.70166h.5V37.13287h-1V21.68951ZM25.31152,42.0401h-1v-8h1ZM39.41235,27.79834h1V38.2417h-1Z"></path></g></svg> -->
          <p>Score de participation</p>
        </div>
        <div class="participation_score">
          <p>370</p>
        </div>
      </div>

    </div>
  </main>

    
  <script src="../js/burger.js"></script>
</body>
</html>