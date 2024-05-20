<?php 
require_once('../Connessione/funzioni.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .box-shadow {
            box-shadow: 10px 10px 5px lightblue;
        }

        .mostra {
            display: block;
        }

        .nascondi {
            display: none;
        }
    </style>
</head>

<body style="background-color: cadetblue;" class="mostra">

    <div class="justify-content-center align-items-center text-center mt-4 ">
        <img src="../images/logoCasaDesign.png" alt="alt" style="width: 300px; border-radius:15px">
        <button class="btn btn-success " style="margin-left:10px; margin-right:10px" id="goToAccediUtente">Accedi</button>
        <button class="btn btn-success " style="margin-left:10px; margin-right:10px" id="goToAccediRegistrati">Registrati</button>
        <button class="btn btn-success " style="margin-left:10px; margin-right:10px" id="goToAccediAdmin">Amministrazione</button>

    </div>

    <div class="container nascondi  " id="divLoginUtente">
        <div class="container d-flex justify-content-center align-items-center " style="height: 100vh;">
            <div class="bg-white" style="width: 500px; height: 400px; border-radius: 15px;">
                <h2 class="text-center mt-3"><strong>Accedi al tuo account</strong></h2>
                <br><br><br>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="container" style="width: 80%;">
                        <label for="usernameAccedi">Username <span style="color:red" data-bs-toggle="tooltip"
                                data-bs-html="true" title="Campo obbligatorio">*</span></label>
                        <input type="text" class="form-control" placeholder="" name="usernameAccedi" id="usernameAccediLogin" required>

                        <label for="passwordAccedi" class="mt-3">Password <span style="color:red" data-bs-toggle="tooltip"
                                data-bs-html="true" title="Campo obbligatorio">*</span></label>
                        <input type="password" id="passwordAccediLogin" name="passwordAccedi" class="form-control" required>

                        <button type="submit" class="btn btn-primary  btn-block mt-3" style="width: 100%;">Accedi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container nascondi " id="divRegistrati">
        <div class="container d-flex justify-content-center align-items-center " style="height: 100vh;">
            <div class="bg-white" style="width: 500px; height: 400px; border-radius: 15px;">
                <h2 class="text-center mt-3"><strong>Crea il tuo account</strong></h2>
                <br><br>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="container" style="width: 80%;">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nomeRegistrati">Nome <span style="color:red" data-bs-toggle="tooltip"
                                        data-bs-html="true" title="Campo obbligatorio">*</span></label>
                                <input type="text" class="form-control" placeholder="" name="nomeRegistrati" id="nomeRegistrati" required>
                            </div>
                            <div class="col">
                                <label for="cognomeRegistrati">Cognome <span style="color:red" data-bs-toggle="tooltip"
                                        data-bs-html="true" title="Campo obbligatorio">*</span></label>
                                <input type="text" class="form-control" placeholder="" name="cognomeRegistrati" id="cognomeRegistrati" required>
                            </div>
                        </div>
                        <label for="usernameRegistrati">Username <span style="color:red" data-bs-toggle="tooltip"
                                data-bs-html="true" title="Campo obbligatorio">*</span></label>
                        <input type="text" class="form-control" placeholder="" name="usernameRegistrati" id="usernameRegistrati" required>

                        <label for="passwordRegistrati" class="mt-3">Password <span style="color:red" data-bs-toggle="tooltip"
                                data-bs-html="true" title="Campo obbligatorio">*</span></label>
                        <input type="password" id="passwordRegistrati" name="passwordRegistrati" class="form-control" required>

                        <label for="passwordRegistrati" class="mt-3">Ripeti Password <span style="color:red" data-bs-toggle="tooltip"
                                data-bs-html="true" title="Campo obbligatorio">*</span></label>
                        <input type="password" id="passwordRegistrati1" name="passwordRegistrati1" class="form-control" required>

                        <button type="submit" id="bntRegistrati" class="btn btn-primary  btn-block mt-3" style="width: 100%;">Registrati</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="nascondi" id="divLoginAdmin">
        <div class="container d-flex justify-content-center align-items-center " style="height: 100vh;">
            <div class="bg-white" style="width: 500px; height: 400px; border-radius: 15px;">
                <h2 class="text-center mt-3"><strong>Accedi al tuo account Admin</strong></h2>
                <br><br><br>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="container" style="width: 80%;">
                        <label for="usernameAdmin">Username <span style="color:red;" data-bs-toggle="tooltip"
                                data-bs-html="true" title="Campo obbligatorio">*</span></label>
                        <input type="text" class="form-control" placeholder="" name="usernameAdmin" id="usernameAdmin" required>

                        <label for="passwordAdmin" class="mt-3">Password <span style="color:red" data-bs-toggle="tooltip"
                                data-bs-html="true" title="Campo obbligatorio">*</span></label>
                        <input type="password" id="passwordAdmin" name="passwordAdmin" class="form-control" required>

                        <button type="submit" class="btn btn-primary  btn-block mt-3" style="width: 100%;">Accedi</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php
    require('../Connessione/connessione.php');
    require('../Connessione/funzioni.php');
    // Verifica se il metodo di richiesta è POST per il form di accesso utente
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Controlla se il form è per l'accesso utente o per la registrazione
        if (isset($_POST["usernameAccedi"]) && isset($_POST["passwordAccedi"])) {
            // Form di accesso utente
            echo '<div class="alert alert-success" role="alert">
                Hai effettuato l\'accesso con successo!
            </div>';
            echo "<p>Username: {$_POST['usernameAccedi']}</p>";
            echo "<p>Password: {$_POST['passwordAccedi']}</p>";
        }
    }
    ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        const divLoginAdmin = document.getElementById("divLoginAdmin");
        const divLoginUtente = document.getElementById("divLoginUtente");
        const divRegistrati = document.getElementById("divRegistrati");

        const goToAccediUtente = document.getElementById("goToAccediUtente");
        const goToAccediAdmin = document.getElementById("goToAccediAdmin");
        const goToAccediRegistrati = document.getElementById("goToAccediRegistrati");


        goToAccediAdmin.onclick = () => {
            divLoginAdmin.classList.remove("nascondi");
            divLoginAdmin.classList.add("mostra");

            divLoginUtente.classList.remove("mostra");
            divLoginUtente.classList.add("nascondi");

            divRegistrati.classList.remove("mostra");
            divRegistrati.classList.add("nascondi");
        }

        goToAccediUtente.onclick = () => {

            divLoginUtente.classList.remove("nascondi");
            divLoginUtente.classList.add("mostra");

            divLoginAdmin.classList.remove("mostra");
            divLoginAdmin.classList.add("nascondi");

            divRegistrati.classList.remove("mostra");
            divRegistrati.classList.add("nascondi");
        }

        goToAccediRegistrati.onclick = () => {

            divRegistrati.classList.remove("nascondi");
            divRegistrati.classList.add("mostra");

            divLoginAdmin.classList.remove("mostra");
            divLoginAdmin.classList.add("nascondi");

            divLoginUtente.classList.remove("mostra");
            divLoginUtente.classList.add("nascondi");
        }


        let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
       

    </script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["usernameAccedi"]) && isset($_POST["passwordAccedi"])) {
        $username = $_POST["usernameAccedi"];
        $password = $_POST["passwordAccedi"];
        
        if (loginUtente($username, $password)) {
            echo '<script>window.location.href = "./utente.php";</script>';
            $_SESSION['username'] = $username;
            exit;
        } else {
            echo '<div class="alert alert-danger" role="alert">Login fallito</div>';
        }
    } elseif (isset($_POST["usernameRegistrati"]) && isset($_POST["passwordRegistrati"]) && isset($_POST["passwordRegistrati1"])) {
        if ($_POST["passwordRegistrati1"] == $_POST["passwordRegistrati"]) {
            $usernameRegistrati=$_POST["usernameRegistrati"];
            $nomeRegistrati=$_POST["nomeRegistrati"];
            $cognomeRegistrati=$_POST["cognomeRegistrati"];
            $passwordRegistrati=$_POST["passwordRegistrati"];
            
            if(registerUtente($usernameRegistrati,$passwordRegistrati,0,0,$nomeRegistrati,$cognomeRegistrati)){ 
                echo '<div class="alert alert-info" role="alert">
                    La registrazione è stata effettuata con successo!
                </div>';
                echo '<script>goToAccediUtente.click();</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Registrazione fallita</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Password non coincidono</div>';
        }
    } elseif (isset($_POST["usernameAdmin"]) && isset($_POST["passwordAdmin"])) {
        $username = $_POST["usernameAdmin"];
        $password = $_POST["passwordAdmin"];
        
        if (checkAdmin($username, $password)) {
            echo '<script>window.location.href = "./admin.php";</script>';
            $_SESSION['username'] = $username; 
            exit; 
        } else {
            
            echo '<div class="alert alert-danger" role="alert">Login amministratore fallito</div>';
        }
    } else {
       
        echo '<div class="alert alert-warning" role="alert">Nessuna azione eseguita.</div>';
    }
}
?>


</body>

</html>