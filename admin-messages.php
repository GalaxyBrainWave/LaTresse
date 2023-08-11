<?php
    session_name("latresse-php");
    session_start();

    // if (!isset($_SESSION["userid"])) {
    //     header("Location: ./register.php");
    //     exit;
    // }

    // if (isset($_SESSION["userid"])) {
        // require_once "./modules/config.php";

        // $sql = "SELECT * FROM messages ORDER BY msg_id DESC";

        // $query = $pdo-> prepare($sql);
        // $query-> setFetchMode(PDO::FETCH_ASSOC);

        // if ($query-> execute()) {
        //     $results = $query-> fetchAll();
        // };
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
                    <h2>Mes messages</h2>
                </div>

                <div class="table-section">

                    <table>

                        <thead>

                            <tr>
                                <th>Auteur</th>
                                <th>Email</th>
                                <th>Objet</th>
                                <th>Date d'envoi</th>
                                <th>Voir le message</th>
                            </tr>

                        </thead>

                        <tbody>

                        <?php if (isset($results)) :
                            $i = 1;
                            foreach ($results as $ligne) : ?>

                                <tr>
                                    <td>
                                        <?= $ligne["msg_first_name"]; ?>
                                    </td>
                                    <td>
                                        <?= $ligne["msg_email"]; ?>
                                    </td>
                                    <td>
                                        <?= $ligne["msg_object"]; ?>
                                    </td>
                                    <td>
                                        <?= $ligne["msg_creation_date"]; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="see-message" data-target="#message-<?= $i; ?>">
                                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="m3.59 16.54 11 11a2 2 0 0 0 2.82 0l11-11a2 2 0 0 0 -2.82-2.83l-9.59 9.59-9.59-9.59a2 2 0 1 0 -2.82 2.83z"/><path d="m14.59 18.29a2 2 0 0 0 2.82 0l11-11a2 2 0 0 0 -2.82-2.83l-9.59 9.59-9.59-9.59a2 2 0 0 0 -2.82 2.83z"/></svg>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="tr-message" id="message-<?= $i; ?>">
                                    <td colspan="4" class="td-message">
                                        <h5><?= "Message : " . $ligne["msg_content"] . ""; ?></h5>
                                    </td>
                                    <td class="td-message">
                                        <button type="button" class="close-message" data-target="#message-<?= $i; ?>">
                                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="m6.41 18.29 9.59-9.59 9.59 9.59a2 2 0 0 0 2.82 0 2 2 0 0 0 0-2.83l-11-11a2 2 0 0 0 -2.82 0l-11 11a2 2 0 0 0 2.82 2.83z"/><path d="m3.59 27.54a2 2 0 0 0 2.82 0l9.59-9.54 9.59 9.59a2 2 0 0 0 2.82 0 2 2 0 0 0 0-2.83l-11-11a2 2 0 0 0 -2.82 0l-11 11a2 2 0 0 0 0 2.78z"/></svg>
                                        </button>
                                    </td>
                                </tr>

                            <?php 
                                $i++;
                                endforeach;
                        endif; ?>

                        </tbody>

                    </table>

                </div>

            </article>

        </section>


    </main>

<?php
    require_once "./includes/footer-admin.php";
?>