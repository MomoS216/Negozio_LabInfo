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

    <div class="container " id="divLoginUtente">
        <div class="container d-flex justify-content-center align-items-center " style="height: 100vh;">
            <div class="bg-white" style="width: 500px; height: 600px; border-radius: 15px;">
                <h2 class="text-center mt-3"><strong>Accedi al tuo account</strong></h2>
                <br><br><br>
                <form method="POST" action="../php/login.php">
                    <div class="container" style="width: 80%;">
                        <label for="usernameAccedi">Username <span style="color:red" data-bs-toggle="tooltip"
                                data-bs-html="true" title="Campo obbligatorio">*</span></label>
                        <input type="text" class="form-control" placeholder="" name="usernameAccedi" id="usernameAccediLogin" required>
    
                        <label for="passwordAccedi" class="mt-3">Password <span style="color:red" data-bs-toggle="tooltip"
                                data-bs-html="true" title="Campo obbligatorio">*</span></label>
                        <input type="password" id="passwordAccediLogin"  name="passwordAccedi" class="form-control" required>
    
                        <button type="submit" class="btn btn-primary  btn-block mt-3" style="width: 100%;" >Accedi </button>
                    </div>
                </form>
                

                

                <!-- Paragrafo aggiunto al fondo del div -->
                <div class="container mt-auto" style="width: 80%;">
                    <p class="" style="margin-top:225px">Sei l'amministratore? <button type="button"
                            id="goToAccediAdmin" class="btn btn-outline-primary btn-sm">
                            gestione negozio
                        </button></p>
                </div>
            </div>
        </div>
    </div>


    <div class="nascondi" id="divLoginAdmin">
        <div class="container d-flex justify-content-center align-items-center " style="height: 100vh;">
            <div class="bg-white" style="width: 500px; height: 600px; border-radius: 15px;">
                <h2 class="text-center mt-3"><strong>Accedi al tuo account Admin</strong></h2>
                <br><br><br>
                <form method="POST" action="../php/registrazione.php">
                <div class="container" style="width: 80%;">
                        <label for="usernameRegistrazione">Username <span style="color:red;" data-bs-toggle="tooltip"
                            data-bs-html="true" title="Campo obbligatorio">*</span></label>
                    <input type="text" class="form-control" placeholder="" name="usernameRegistrazione" id="usernameRegistrazione" required>

                    <label for="passwordRegistrazione" class="mt-3">Password <span style="color:red" data-bs-toggle="tooltip"
                            data-bs-html="true" title="Campo obbligatorio">*</span></label>
                    <input type="password" id="passwordRegistrazione" name="passwordRegistrazione" class="form-control" required>

                    <button type="submit" class="btn btn-primary  btn-block mt-3" style="width: 100%;" >Accedi </button>
                    </form>
                   
                </div>

                <!-- Paragrafo aggiunto al fondo del div -->
                <div class="container mt-auto" style="width: 80%;">
                    <p class="" style="margin-top:225px">Non sei l'amministratore? <button type="button"
                            id="goToAccediUtente" class="btn btn-outline-primary btn-sm">
                            Scopri il negozio!
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>




        const divLoginAdmin = document.getElementById("divLoginAdmin");
        const divLoginUtente = document.getElementById("divLoginUtente");

        const goToAccediUtente = document.getElementById("goToAccediUtente");
        const goToAccediAdmin = document.getElementById("goToAccediAdmin");

        goToAccediAdmin.onclick = () => {

            divLoginUtente.classList.remove("mostra");
            divLoginUtente.classList.add("nascondi");

            divLoginAdmin.classList.remove("nascondi");
            divLoginAdmin.classList.add("mostra");

        }

        goToAccediUtente.onclick = () => {

            divLoginAdmin.classList.remove("mostra");
            divLoginAdmin.classList.add("nascondi");

            divLoginUtente.classList.remove("nascondi");
            divLoginUtente.classList.add("mostra");
        }



        let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        
    </script>


<?php
// Verifica se il metodo di richiesta è POST per il form di accesso utente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controlla se il form è per l'accesso utente o per la registrazione
    if (isset($_POST["usernameAccedi"]) && isset($_POST["passwordAccedi"])) {
        // Form di accesso utente
        echo '<div class="alert alert-success" role="alert">
            Hai effettuato l\'accesso con successo!
        </div>';
    } elseif (isset($_POST["usernameRegistrazione"]) && isset($_POST["passwordRegistrazione"])) {
        // Form di registrazione
        echo '<div class="alert alert-info" role="alert">
            La registrazione è stata effettuata con successo!
        </div>';
    } else {
        // Nessun form è stato inviato
        echo '<div class="alert alert-warning" role="alert">
            Nessuna azione eseguita.
        </div>';
    }
}
?>




</body>

</html>
