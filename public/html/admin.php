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
                Exclusive Home Design (Amministrazione)
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
                    <a class="nav-link" href="" style="color:white">Sedie</a>
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

    <div class="container">

        <h1 style="margin-top:100px" class="mb-3">Gestione Magazzino</h1>
        <div class="row justify-content-center text-center">
            <div class="col">
                <button type="button" class="btn btn-success" style="width: 300px;" id="addArticolo" data-toggle="modal" data-target="#modalAddArticolo">
                    Aggiungi Articolo
                </button>
            </div>
        </div>

        <hr>
        <h1>Articoli</h1>

        <?php
        require("../Connessione/connessione.php");
        require_once("../Connessione/funzioni.php");

        $prodotti = selezionaProdotti();

        if (count($prodotti) > 0) {
            echo "<table class='table table-dark table-striped' id='tableArticoli'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Descrizione</th>";
            echo "<th>Prezzo</th>";
            echo "<th>Stock</th>";
            echo "<th>Azioni</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($prodotti as $prodotto) {
                echo "<tr>";
                echo "<td><strong>" . $prodotto['ID_Prodotto'] . "</strong></td>";
                echo "<td>" . $prodotto['Nome'] . "</td>";
                echo "<td>" . $prodotto['Descrizione'] . "</td>";
                echo "<td>" . $prodotto['Prezzo'] . "</td>";
                echo "<td>" . $prodotto['Stock'] . "</td>";
                echo "<td class='col-2'>";
                echo "<form method='post' action='gestisciProdotti.php' style='display:inline;'>";
                echo "<input type='hidden' name='azione' value='cancella'>";
                echo "<input type='hidden' name='nome_prodotto' value='" . $prodotto['Nome'] . "'>";
                echo "<button type='submit' class='btn'><img src='/public/images/bin.png' alt='cancella' width='30px'></button>";
                echo "</form>";
                echo "<form method='post' action='gestisciProdotti.php' style='display:inline;'>";
                echo "<input type='hidden' name='azione' value='modifica'>";
                echo "<input type='hidden' name='id_prodotto' value='" . $prodotto['ID_Prodotto'] . "'>";
                echo "<button type='submit' class='btn'><img src='/public/images/modify2.png' alt='modifica' width='30px'></button>";
                echo "</form>";
                echo "<form method='post' action='gestisciProdotti.php' style='display:inline;'>";
                echo "<input type='hidden' name='azione' value='restock'>";
                echo "<input type='hidden' name='nome_prodotto' value='" . $prodotto['Nome'] . "'>";
                echo "<button type='submit' class='btn'><img src='/public/images/restock.png' alt='restock' width='30px'></button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nessun prodotto trovato.</p>";
        }
        ?>

        <hr>

        <h1>Utenti Registrati</h1>
        <p style="font-size:20px">Gestisci i permessi</p>


        <div class="row">
            <div class="col-2">
                <p><strong>Ruolo: </strong> </p>
                <p> - 0: no admin</p>
                <p> - 1: admin</p>
            </div>
            <div class="col-2">
                <p><strong>Stato: </strong></p>
                <p> - 0: no abilitato</p>
                <p> - 1: abilitato</p>
            </div>
        </div>


        <?php
        require("../Connessione/connessione.php");
        require_once("../Connessione/funzioni.php");

        $result = selezionaUtenti();

        if (count($result) > 0) {
            echo "<table class='table table-dark table-striped' id='tabellaUtenti'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Cognome</th>";
            echo "<th>Username</th>";
            echo "<th>Ruolo</th>";
            echo "<th>Stato</th>";
            echo "<th>Abilita Admin</th>";
            echo "<th>Abilita Utente</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($result as $utente) {
                echo "<tr>";
                echo "<td><strong>" . $utente['ID_Utente'] . "</strong></td>";
                echo "<td>" . $utente['Nome'] . "</td>";
                echo "<td>" . $utente['Cognome'] . "</td>";
                echo "<td>" . $utente['Username'] . "</td>";
                echo "<td>" . $utente['Ruolo'] . "</td>";
                echo "<td>" . $utente['Stato'] . "</td>";
                echo "<td>";
                echo "<form method='post' action='gestisciUtenti.php' style='display:inline;'>";
                echo "<input type='hidden' name='azione' value='abilita_admin'>";
                echo "<input type='hidden' name='id_utente' value='" . $utente['ID_Utente'] . "'>";
                echo "<button type='submit' class='btn btn-primary'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check' viewBox='0 0 16 16'>
                <path d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z'/>
              </svg> </button>";
                echo "</form>";
                echo "<form method='post' action='gestisciUtenti.php' style='display:inline;'>";
                echo "<input type='hidden' name='azione' value='togli_admin'>";
                echo "<input type='hidden' name='id_utente' value='" . $utente['ID_Utente'] . "'>";
                echo "<button type='submit' style='margin-left:10px' class='btn btn-danger'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708'/>
              </svg> </button>";
                echo "</form>";
                echo "</td>";
                echo "<td>";
                echo "<form method='post' action='gestisciUtenti.php' style='display:inline;'>";
                echo "<input type='hidden' name='azione' value='abilita_utente'>";
                echo "<input type='hidden' name='id_utente' value='" . $utente['ID_Utente'] . "'>";
                echo "<button type='submit' class='btn btn-primary'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check' viewBox='0 0 16 16'>
                <path d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z'/>
              </svg> </button>";
                echo "</form>";
                echo "<form method='post' action='gestisciUtenti.php' style='display:inline;'>";
                echo "<input type='hidden' name='azione' value='togli_utente'>";
                echo "<input type='hidden' name='id_utente' value='" . $utente['ID_Utente'] . "'>";
                echo "<button type='submit' style='margin-left:10px' class='btn btn-danger'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708'/>
              </svg> </button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nessun prodotto trovato.</p>";
        }
        ?>
        <hr>
        <h1>Ordini degli utenti </h1>
        <p><strong>Stato: </strong> </p>
        <p> - 0: non evaso </p>
        <p> - 1: evaso</p>

        <?php
        require("../Connessione/connessione.php");
        require_once("../Connessione/funzioni.php");

        $result2 = getAllOrdini();

        if ($result2) {
            echo "<table class='table table-dark table-striped' id='tabellaUtenti'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>ID_Utente</th>";
            echo "<th>Data_Ordine</th>";
            echo "<th>Stato</th>";
            echo "<th>Evadi / non Evadi</th>";
            echo "<th></th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($result2 as $ordine) {
                echo "<tr>";
                echo "<td><strong>" . $ordine['ID_Ordine'] . "</strong></td>";
                echo "<td>" . $ordine['ID_Utente'] . "</td>";
                echo "<td>" . $ordine['Data_Ordine'] . "</td>";
                echo "<td>" . $ordine['Stato'] . "</td>";
                echo "<td>";
                echo "<form method='post' action='evadiOrdini.php' style='display:inline;'>";
                echo "<input type='hidden' name='azione' value='evadi'>";
                echo "<input type='hidden' name='id_utente' value='" . $ordine['ID_Utente'] . "'>";
                echo "<button type='submit' class='btn btn-primary'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check' viewBox='0 0 16 16'>
        <path d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z'/>
        </svg> </button>";
                echo "</form>";
                echo "<form method='post' action='evadiOrdini.php' style='display:inline;'>";
                echo "<input type='hidden' name='azione' value='non_evadi'>";
                echo "<input type='hidden' name='id_utente' value='" . $ordine['ID_Utente'] . "'>";
                echo "<button type='submit' style='margin-left:10px' class='btn btn-danger'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
        <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708'/>
        </svg> </button>";
                echo "</form>";
                echo "</td>";
                echo "<td> </td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nessun prodotto trovato.</p>";
        }
        ?>

<hr>
    </div>

    <!--MODALE ADD ARTICOLO-->
    <div class="modal fade" id="modalAddArticolo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <form action="./addNewProdotto.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Aggiungi Articolo</h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-white">
                        <label for="nomeArticolo">Nome Articolo</label>
                        <input type="text" id="nomeArticolo" name="nomeArticolo" class="form-control">

                        <label for="descrizioneArticolo" class="mt-3">Descrizione Articolo</label>
                        <textarea class="form-control" id="descrizioneArticolo" name="descrizioneArticolo" rows="3"></textarea>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="prezzoArticolo">Prezzo Articolo</label>
                                <input type="number" id="prezzoArticolo" name="prezzoArticolo" class="form-control">
                            </div>
                            <div class="col">
                                <label for="stockArticolo">Stock Articolo</label>
                                <input type="number" id="stockArticolo" name="stockArticolo" class="form-control">
                            </div>
                            <div class="col">
                                <label for="nomeImmagine">Nome Immagine: </label>
                                <input type="text" id="nomeImmagine" name="nomeImmagine" class="form-control" placeholder="includi il formato">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                        <button type="submit" class="btn btn-primary">Aggiungi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--FINE MODALE ADD ARTICOLO-->


    <!--MODALE MODIFICA ARTICOLO-->
    <div class="modal fade" id="modalModificaArticolo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <form action="./addNewProdotto.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="exampleModalLabel">MODIFICA ARTICOLO ESISTENTE</h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-white">
                        <label for="nomeArticolo">Nome Articolo</label>
                        <input type="text" id="nomeArticolo" name="nomeArticolo" class="form-control">

                        <label for="descrizioneArticolo" class="mt-3">Descrizione Articolo</label>
                        <textarea class="form-control" id="descrizioneArticolo" name="descrizioneArticolo" rows="3"></textarea>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="prezzoArticolo">Prezzo Articolo</label>
                                <input type="number" id="prezzoArticolo" name="prezzoArticolo" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                        <button type="submit" class="btn btn-primary">Aggiungi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--FINE MODALE MODIFICA ARTICOLO-->



    <!--MODALE AREA PRIVATA -->
    <div class="modal fade  " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Area Privata</h5>
                    <button type="button" id="modalClose" class="btn btn-danger" data-dismiss="modal" aria-label="">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenuto del modale -->
                    <div class="container" style="width: 80%;">
                        <div class="row justify-content-center text-center">
                            <div class="col">
                                <button type="button" class="btn btn-light" id="btnChangeUsername">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                        <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-light" id="btnChangePassword">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                        <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5" />
                                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                    </svg>
                                </button>
                                <div></div>
                            </div>
                        </div>
                        <div class="row justify-content-center text-center">
                            <div class="col mt-4">
                                <button type="button" class="btn btn-light" id="btnStorico">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>
                                <div id="divStorico"><!--DIV  storico ordini--></div>

                            </div>
                            <div class="col mt-4">
                                <button type="button" class="btn btn-light" id="btnFatture">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                        <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27m.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0z" />
                                        <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5" />
                                    </svg>
                                </button>
                            </div>
                            <div id="divFatture"><!--DIV  fatture--></div>>
                        </div>
                        <hr style="color:white" class="mt-4">



                        <div id="divSubModale" class="container">

                            <div id="divChangeUsername" class="nascondi">
                                <label for="usernameAccedi" class="text-white">Username nuovo: </label>
                                <input type="text" class="form-control" placeholder="" id="usernameNuovo">
                                <!--INPUT USERNAME NUOVO-->
                                <button type="button" class="btn btn-primary mt-3 btn-sm mb-3" style="width: 100%;" id="invioUsernameNuovo">Aggiorna Username</button> <!--BOTTONE USERNAME NUOVO-->
                            </div>

                            <div id="divChangePassword" class="nascondi">
                                <label for="usernameAccedi" class="text-white">Password attuale: </label>
                                <input type="text" class="form-control mb-2" placeholder="" id="passwordAttuale">
                                <!--INPUT password attuale-->
                                <label for="usernameAccedi" class="text-white">Password Nuova: </label>
                                <input type="text" class="form-control mb-2" placeholder="" id="passwordNuova1">
                                <!--PRIMO INPUT PASSWORD-->
                                <label for="usernameAccedi" class="text-white">Conferma Password Nuova: </label>
                                <input type="text" class="form-control mb-2" placeholder="" id="passwordNuova2">
                                <!--SECONDO INPUT PASSWORD-->
                                <button type="button" class="btn btn-primary mt-3 btn-sm mb-3" style="width: 100%;" id="invioPasswordNuova">Aggiorna password</button> <!--BOTTONE PASSWORD NUOVO-->
                            </div>
                        </div>

                        <script>
                            const areaPrivata = document.getElementById("modalClose");
                            const divAreaPrivata = document.getElementById("divSubModale");
                            const divChangeUsername = document.getElementById("divChangeUsername");
                            const divChangePassword = document.getElementById("divChangePassword");

                            const usernameNuovo = document.getElementById("usernameNuovo");
                            const invioUsernameNuovo = document.getElementById("invioUsernameNuovo");

                            //---------
                            const passwordAttuale = document.getElementById("passwordAttuale");
                            const passwordNuova1 = document.getElementById("passwordNuova1");
                            const passwordNuova2 = document.getElementById("passwordNuova2");
                            const invioPasswordNuova = document.getElementById("invioPasswordNuova");

                            const btnChangeUsername = document.getElementById("btnChangeUsername");
                            const btnChangePassword = document.getElementById("btnChangePassword");

                            areaPrivata.onclick = () => {

                                divChangePassword.classList.remove("mostra");
                                divChangePassword.classList.add("nascondi");

                                divChangeUsername.classList.remove("mostra");
                                divChangeUsername.classList.add("nascondi");


                            }

                            btnChangeUsername.onclick = () => {
                                divChangePassword.classList.remove("mostra");
                                divChangePassword.classList.add("nascondi");

                                divChangeUsername.classList.remove("nascondi");
                                divChangeUsername.classList.add("mostra");
                            }

                            btnChangePassword.onclick = () => {
                                divChangeUsername.classList.remove("mostra");
                                divChangeUsername.classList.add("nascondi");

                                divChangePassword.classList.remove("nascondi");
                                divChangePassword.classList.add("mostra");
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--FINE MODALE AREA PRIVATA-->






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>