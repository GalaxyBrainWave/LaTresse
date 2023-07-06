<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">

        <title>La Tresse - Dashboard Admin</title>

    </head>

    <body>

        <header class="header-admin">

            <img src="./img/Logo La Tresse Offical.png" alt="Logo de La Tresse">

            <nav id="menu-admin">

                <ul>

                    <li>
                        <a href="#">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="460.298px" height="460.297px" viewBox="0 0 460.298 460.297" style="enable-background:new 0 0 460.298 460.297;" xml:space="preserve"><g><g><path d="M230.149,120.939L65.986,256.274c0,0.191-0.048,0.472-0.144,0.855c-0.094,0.38-0.144,0.656-0.144,0.852v137.041c0,4.948,1.809,9.236,5.426,12.847c3.616,3.613,7.898,5.431,12.847,5.431h109.63V303.664h73.097v109.64h109.629c4.948,0,9.236-1.814,12.847-5.435c3.617-3.607,5.432-7.898,5.432-12.847V257.981c0-0.76-0.104-1.334-0.288-1.707L230.149,120.939z"/><path d="M457.122,225.438L394.6,173.476V56.989c0-2.663-0.856-4.853-2.574-6.567c-1.704-1.712-3.894-2.568-6.563-2.568h-54.816c-2.666,0-4.855,0.856-6.57,2.568c-1.711,1.714-2.566,3.905-2.566,6.567v55.673l-69.662-58.245c-6.084-4.949-13.318-7.423-21.694-7.423c-8.375,0-15.608,2.474-21.698,7.423L3.172,225.438c-1.903,1.52-2.946,3.566-3.14,6.136c-0.193,2.568,0.472,4.811,1.997,6.713l17.701,21.128c1.525,1.712,3.521,2.759,5.996,3.142c2.285,0.192,4.57-0.476,6.855-1.998L230.149,95.817l197.57,164.741c1.526,1.328,3.521,1.991,5.996,1.991h0.858c2.471-0.376,4.463-1.43,5.996-3.138l17.703-21.125c1.522-1.906,2.189-4.145,1.991-6.716C460.068,229.007,459.021,226.961,457.122,225.438z"/></g></g></svg>
                            Accueil
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m46 512h60c8.291 0 15-6.709 15-15v-61c0-8.291-6.709-15-15-15h-15v-60h150v60h-15c-8.291 0-15 6.709-15 15v61c0 8.291 6.709 15 15 15h60c8.291 0 15-6.709 15-15v-61c0-8.291-6.709-15-15-15h-15v-60h150v60h-15c-8.291 0-15 6.709-15 15v61c0 8.291 6.709 15 15 15h60c8.291 0 15-6.709 15-15v-61c0-8.291-6.709-15-15-15h-15v-75c0-8.291-6.709-15-15-15h-135v-30h-90v30h-135c-8.291 0-15 6.709-15 15v75h-15c-8.291 0-15 6.709-15 15v61c0 8.291 6.709 15 15 15z"/><path d="m271 172.211v98.789h33.627c3.204-6.859 8.297-12.777 15.225-16.494 43.887-23.555 71.148-68.965 71.148-118.506 0-74.443-60.557-136-135-136s-135 61.557-135 136c0 49.541 27.261 94.951 71.147 118.521 6.929 3.71 12.023 9.622 15.227 16.479h33.626v-98.789l-25.605-25.605c-5.859-5.859-5.859-15.352 0-21.211s15.352-5.859 21.211 0l19.394 19.394 19.395-19.395c5.859-5.859 15.352-5.859 21.211 0s5.859 15.352 0 21.211z"/></g></svg>
                            Projets
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m151.033 55.7c0-30.713-24.987-55.7-55.7-55.7-73.894 3.06-73.873 108.352 0 111.4 30.714 0 55.7-24.987 55.7-55.7z"/><path d="m190.667 223.867v-17.133c-5.252-126.505-185.462-126.407-190.667-.001v17.133c0 8.284 6.716 15 15 15h160.667c8.284.001 15-6.715 15-14.999z"/><path d="m472.367 55.7c0-30.713-24.987-55.7-55.7-55.7-73.894 3.06-73.873 108.352 0 111.4 30.713 0 55.7-24.987 55.7-55.7z"/><path d="m416.667 111.4c-52.567 0-95.333 42.767-95.333 95.333v17.133c0 8.284 6.716 15 15 15h160.666c8.284 0 15-6.716 15-15v-17.133c0-52.566-42.766-95.333-95.333-95.333z"/><path d="m94.267 272.067c0-1.07.02-2.135.04-3.2h-30c-1.194 64.3 29.976 122.392 78.244 157.768 4.312-9.154 9.7-17.703 16-25.488-39.048-29.525-64.284-76.353-64.284-129.08z"/><path d="m189.804 124.461c39.896-18.684 92.496-18.684 132.392 0 7.114-8.159 15.264-15.391 24.245-21.489-53.095-29.899-127.786-29.898-180.881 0 8.98 6.098 17.13 13.331 24.244 21.489z"/><path d="m417.693 268.867c1.165 53.589-24.4 102.267-64.244 132.28 6.3 7.784 11.687 16.334 16 25.488 48.266-35.373 79.439-93.47 78.244-157.768z"/><path d="m311.7 328.833c0-30.713-24.987-55.7-55.7-55.7-73.894 3.06-73.873 108.352 0 111.4 30.713 0 55.7-24.986 55.7-55.7z"/><path d="m256 384.533c-52.567 0-95.333 42.767-95.333 95.333v17.134c0 8.284 6.716 15 15 15h160.667c8.284 0 15-6.716 15-15v-17.133c-.001-52.567-42.767-95.334-95.334-95.334z"/></g></svg>
                            Réseau
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <svg id="Layer_1" enable-background="new 0 0 512.001 512.001" height="512" viewBox="0 0 512.001 512.001" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m151.034 328.834c0-30.713-24.987-55.7-55.7-55.7-73.894 3.06-73.873 108.352 0 111.4 30.714 0 55.7-24.987 55.7-55.7z"/><path d="m472.368 328.834c0-30.713-24.987-55.7-55.7-55.7-73.894 3.06-73.873 108.352 0 111.4 30.713 0 55.7-24.987 55.7-55.7z"/><path d="m311.701 328.834c0-30.713-24.987-55.7-55.7-55.7-73.894 3.06-73.873 108.352 0 111.4 30.713 0 55.7-24.987 55.7-55.7z"/><path d="m155.08 405.638c-61.089-50.046-155.452-5.423-155.079 74.23v17.132c0 8.284 6.716 15 15 15h118.247c-1.665-4.695-2.58-9.741-2.58-15v-17.133c0-27.76 9.078-53.436 24.412-74.229z"/><path d="m416.668 384.534c-22.602 0-43.388 7.912-59.746 21.104 15.335 20.793 24.412 46.469 24.412 74.229v17.133c0 5.258-.915 10.305-2.58 15h118.247c8.284 0 15-6.716 15-15v-17.133c0-52.567-42.766-95.333-95.333-95.333z"/><path d="m256.001 384.534c-52.567 0-95.333 42.767-95.333 95.333v17.133c0 8.284 6.716 15 15 15h160.667c8.284 0 15-6.716 15-15v-17.133c-.001-52.567-42.767-95.333-95.334-95.333z"/><path d="m138.075 4.394c-5.857-5.857-15.355-5.858-21.213 0s-5.858 15.355 0 21.213l16.066 16.067c5.859 5.859 15.356 5.856 21.213 0 5.858-5.858 5.858-15.355 0-21.213z"/><path d="m132.927 132.927-16.066 16.067c-5.857 5.858-5.857 15.355 0 21.213 5.86 5.859 15.357 5.856 21.213 0l16.066-16.067c5.857-5.858 5.857-15.355 0-21.213-5.858-5.858-15.354-5.858-21.213 0z"/><path d="m97.52 102.3h22.722c19.902-.793 19.887-29.215 0-30h-22.722c-19.902.793-19.887 29.215 0 30z"/><path d="m379.074 41.674 16.066-16.067c5.857-5.858 5.857-15.355 0-21.213-5.858-5.857-15.356-5.857-21.213 0l-16.067 16.067c-5.857 5.858-5.857 15.355 0 21.213 5.858 5.856 15.355 5.859 21.214 0z"/><path d="m373.927 170.207c5.856 5.856 15.353 5.86 21.213 0 5.858-5.858 5.858-15.355 0-21.213l-16.066-16.067c-5.858-5.858-15.355-5.858-21.213 0s-5.858 15.355 0 21.213z"/><path d="m376.76 87.3c0 8.284 6.716 15 15 15h22.722c19.902-.793 19.887-29.215 0-30h-22.722c-8.284 0-15 6.716-15 15z"/><path d="m208.868 191.734c2.597 62.544 91.694 62.496 94.267 0v-2.133h-94.267z"/><path d="m208.868 159.601h94.267c0-9.577 3.74-18.702 10.282-25.703 47.862-49.869 11.737-134.081-57.417-133.897-69.151-.184-105.28 84.039-57.415 133.897 6.542 7.001 10.283 16.126 10.283 25.703z"/></g></svg>
                            Créer un projet
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m256 94.457031c-49.238281 0-89.300781 40.058594-89.300781 89.300781 0 49.238282 40.0625 89.296876 89.300781 89.296876s89.300781-40.058594 89.300781-89.296876c0-49.242187-40.0625-89.300781-89.300781-89.300781zm0 0"/><path d="m256 0c-141.160156 0-256 114.839844-256 256 0 65.3125 24.597656 124.976562 64.996094 170.253906 8.652344-37.992187 28.507812-72.65625 57.5-99.660156 20.347656-18.953125 44.15625-33.136719 69.890625-41.957031-33.4375-21.160157-55.6875-58.46875-55.6875-100.878907 0-65.785156 53.519531-119.300781 119.300781-119.300781s119.296875 53.515625 119.296875 119.300781c0 42.390626-22.230469 79.6875-55.644531 100.851563 27.875 9.546875 53.425781 25.398437 74.875 46.847656 26.207031 26.207031 44.300781 59.148438 52.457031 94.8125 40.414063-45.277343 65.015625-104.949219 65.015625-170.269531 0-141.160156-114.839844-256-256-256zm0 0"/><path d="m91.101562 451.648438c44.578126 37.632812 102.128907 60.351562 164.898438 60.351562s120.320312-22.722656 164.898438-60.351562c-4.105469-37.296876-20.867188-72.261719-47.582032-98.976563-31.34375-31.34375-73.007812-48.605469-117.316406-48.605469-84.390625 0-155.738281 64.378906-164.898438 147.582032zm0 0"/></svg>
                            Mon profil
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <svg id="Capa_1" enable-background="new 0 0 511.156 511.156" height="512" viewBox="0 0 511.156 511.156" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m184.904 465.044c11.999 27.127 39.154 46.112 70.674 46.112s58.674-18.985 70.674-46.112z"/><path d="m255.573 48.836c20.8 0 40.772 3.67 59.306 10.389v-2.283c0-31.398-25.544-56.942-56.941-56.942h-4.719c-31.398 0-56.942 25.544-56.942 56.942v2.254c18.524-6.699 38.49-10.36 59.296-10.36z"/><path d="m442.747 435.044h-374.338c-7.082 0-13.569-4.776-15.042-11.704-1.458-6.859 1.668-13.629 8.01-16.559 1.505-.976 12.833-8.897 24.174-32.862 20.829-44.01 25.201-106.005 25.201-150.263 0-79.855 64.967-144.82 144.821-144.82 79.665 0 144.512 64.652 144.82 144.245.007.191.011.383.011.575 0 44.258 4.372 106.253 25.201 150.263 11.341 23.965 22.668 31.887 24.174 32.862 6.342 2.93 9.469 9.699 8.01 16.559-1.473 6.927-7.959 11.704-15.042 11.704zm7.2-28.157h.01z"/></svg>
                            Notifications
                        </a>
                    </li>

                </ul>

            </nav>

        </header>