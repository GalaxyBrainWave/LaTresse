<?php
    session_name("latresse-php");
    session_start();

    require_once "./Model/User.php";

    if (!empty($_POST)) {
        if (isset($_POST["first-name"]) && isset($_POST["last-name"]) && isset($_POST["email"]) && isset($_POST["hash"])) {
            if (strlen($_POST["hash"]) > 7) {

                $options = ["cost" => 12];
                $newUser = new User();
                $newUser->firstName = trim($_POST["first-name"]);
                $newUser->lastName = trim($_POST["last-name"]);
                $newUser->email = trim($_POST["email"]);
                $newUser->hashPass = password_hash(trim($_POST["hash"]), PASSWORD_DEFAULT, $options);

                if ($newUser->save()) {
                    $alert = "L'utilisateur a bien été enregistré !";
                } else {
                    $alert = "L'utilisateur n'a pas été enregistré correctement !";
                }
            } else {
                $alert = "Le mot de passe n'est pas assez long !";
            }
        } else {
            $alert = "Les données obligatoires n'ont pas été rentrées correctement.";
        }
    }

    if (!empty($_POST)) {
        if (isset($_POST["email-login"]) && isset($_POST["hash-login"])) {
            
            $options = ["cost" => 12];
            
            $email_log = strip_tags(trim($_POST["email-login"]));
            $password = password_hash(trim($_POST["hash-login"]), PASSWORD_DEFAULT, $options);

            $regUser = new User();
            $regUser->connectUser($email_log);
        }
    }

    require_once "./includes/header-admin.php";
?>


        <main>
            <section id="register">
                <h2>S'inscrire</h2>

                <?php if (isset($alert)): ?>
                    <p><?= $alert; ?></p>
                <?php endif; ?>
                
                <form action="" method="post">
                    <div>
                        <label for="first-name">Prénom *</label>
                        <input type="text" name="first-name" id="first-name" placeholder="Prénom" autocomplete="given-name">
                    </div>
                    <div>
                        <label for="last-name">Nom *</label>
                        <input type="text" name="last-name" id="last-name" placeholder="Nom de famille" autocomplete="family-name">
                    </div>
                    <div>
                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" placeholder="Email" autocomplete="email">
                    </div>
                    <div>
                        <label for="hash">Mot de passe *</label>
                        <input type="password" name="hash" id="hash" placeholder="Mot de passe" autocomplete="current-password">
                    </div>
                    <div>
                        <button type="submit" name="register">S'inscrire</button>
                    </div>
                </form>
            </section>
            <section id="connect">
                <h2>Se connecter</h2>
                <form action="" method="post">
                    <div>
                        <label for="email">Email *</label>
                        <input type="email" name="email-login" id="email-login" placeholder="Email" autocomplete="email">
                    </div>
                    <div>
                        <label for="hash">Mot de passe *</label>
                        <input type="password" name="hash-login" id="hash-login" placeholder="Mot de passe" autocomplete="current-password">
                    </div>
                    <div>
                        <a href="#">Mot de passe oublié</a>
                    </div>
                    <div>
                        <button type="submit" name="login">Se connecter</button>
                    </div>
                </form>
            </section>
            
        </main>

<?php
    require_once "./includes/footer-admin.php";
?>