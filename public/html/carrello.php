<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .mostra {
            display: block;
        }


        .nascondi {
            display: none;
        }
    </style>
</head>



<body style="background-color: rgb(230, 230, 230);">

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Exclusive Home Design
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>

    <!-- Offcanvas menu -->
    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
            <h4 class="offcanvas-title" style="color:white" id="offcanvasDarkNavbarLabel">Categorie</h4>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html" style="color:white">Home</a>
                </li>
                <li>
                    <hr class="dropdown-divider" style="color:white">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" style="color:white">Divani</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" style="color:white">Letti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" style="color:white">Scrivanie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color:white">Mensole</a>
                </li>

                <li>
                    <hr class="dropdown-divider" style="color:white">
                </li>
            </ul>

            <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>

        </div>
    </div>
    <!--FINE OFFCANVAS-->


    <button type="button" class="btn btn-danger" id="back" onclick="window.location.href='utente.php'" style="margin-left:50px; margin-top:80px">
        < </button>

            <div class="container">
                <h1>Prodotti nel carrello </h1>

                <script>
                    window.onload = () => {

                        console.log(sessionStorage.getItem("carrello"));
                    }
                </script>

                <?php
                require("../Connessione/connessione.php");
                require_once("../Connessione/funzioni.php");

                // Avvia la sessione
                session_start();
               
                if (isset($_SESSION['carrello']) && is_array($_SESSION['carrello'])) {
                    $totCart = 0;
                    echo "<table class='table table-dark table-striped' id='tableArticoli'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Nome</th>";
                    echo "<th>Descrizione</th>";
                    echo "<th>Prezzo</th>";
                    echo "<th>Elimina</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    foreach ($_SESSION['carrello'] as $ID_Prodotto) {
                        // Ottieni i dettagli del prodotto per l'ID
                        $prodotto = selezionaProdottoPerID($ID_Prodotto);
                        if (!empty($prodotto)) {
                            echo "<tr>";
                            echo "<td>" . $ID_Prodotto . "</td>";
                            echo "<td>" . $prodotto['Nome'] . "</td>";
                            echo "<td>" . $prodotto['Descrizione'] . "</td>";
                            echo "<td>" . $prodotto['Prezzo'] . "</td>";
                            echo "<td>";
                            echo "<form method='POST' action='rimuovi_prodotto.php' style='display:inline;'>";
                            echo "<input type='hidden' name='ID_Prodotto' value='" . $ID_Prodotto . "'>";
                            echo "<button type='submit' class='btn btn-danger btn-sm'>X</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                            $totCart += $prodotto['Prezzo'];
                        }
                    }

                    echo "</tbody>";
                    echo "</table>";
                    echo "<p class='' style='font-size:20px; text-align:right; margin-right:10px'>Totale carrello: " . $totCart . " € ㅤㅤㅤ</p>";
                    echo "<form method='POST' action='prova.php'>";
                    echo "<input type='hidden' name='carrello' value='" . json_encode($_SESSION['carrello']) . "'>";//Sessione carrello per prova.php
                    echo "<button type='submit' class='btn btn-success btn-sm' id='invioAcquista' style='width:100%'>Acquista Ora</button>";
                    echo "</form>";
                } else {
                    echo "<p>Nessun prodotto aggiunto.</p>";
                }
                ?>



            </div>



            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>