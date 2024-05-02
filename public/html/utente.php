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

            <button class="btn btn-success" style="margin-left: 65%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg> Carrello
            </button>
            <button type="button" class="btn btn-success" id="areaPrivata" data-toggle="modal" data-target="#exampleModal">
                Area Privata
            </button>

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

    <div class="container">
        <h1 style="margin-top:100px" class="mb-3">Categorie</h1>
        <div class="row justify-content-center text-center">
            <div class="col">
                <button class="btn btn-success" style="width: 300px;">Divani</button>
            </div>
            <div class="col">
                <button class="btn btn-success" style="width: 300px;">Letti</button>
            </div>
            <div class="col">
                <button class="btn btn-success" style="width: 300px;">Scrivanie</button>
            </div>
            <div class="col">
                <button class="btn btn-success" style="width: 300px;">Mensole</button>
            </div>
        </div>
        <hr>

        <h1 class="mt-5">Articoli in sconto</h1>
<div class="container">
    <div class="row justify-content-center">
        <?php
        require("../Connessione/connessione.php");
        require_once("../Connessione/funzioni.php");
        $prodotti = selezionaProdotti();

        if (count($prodotti) > 0) {
            foreach ($prodotti as $prodotto) {
                echo "<div class='col mt-2 mb-2'>";
                echo "<div class='card h-100' style='width: 18rem;'>"; // Imposta l'altezza massima per la card
                echo "<img src='" . $prodotto['Immagine'] . "' class='card-img-top' alt=''>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $prodotto['Nome'] . "</h5>";
                echo "<div style='height: 100px; overflow-y: auto;'>"; // Imposta l'altezza massima per il testo della descrizione
                echo "<p class='card-text'>" . $prodotto['Descrizione'] . "</p>";
                echo "</div>"; // Fine del div per il testo della descrizione
                echo "<h4>" . $prodotto['Prezzo'] . " €</h4>";
                echo "<div class='d-flex justify-content-between align-items-center mt-auto'>";
                echo "<div>";
                echo "<a href='#' class='btn btn-primary'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>
                <path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z' />
                <path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0' />
            </svg>";
                echo "</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>"; // Fine del card-body
                echo "</div>"; // Fine della card
                echo "</div>"; // Fine della col
            }
        }
        ?>
    </div>
</div>



        <hr>
        <h1>Divani </h1>
        <hr>
        <h1>Letti</h1>
        <hr>
        <h1>Scrivanie</h1>
        <hr>
        <h1>Sedie</h1>
        <hr>
        <h2 class="mt-5">Metodi di pagamento</h2>
        <div class="row">
            <div class="col  text-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z" />
                    <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5" />
                </svg> <br>
                <p>Credit Card</p>
            </div>
            <div class="col  text-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-paypal" viewBox="0 0 16 16">
                    <path d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.35.35 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91q.57-.403.993-1.005a4.94 4.94 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.7 2.7 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.7.7 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016q.326.186.548.438c.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.87.87 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.35.35 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32z" />
                </svg> <br>
                <p>PayPal</p>
            </div>
            <div class="col  text-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-envelope-paper" viewBox="0 0 16 16">
                    <path d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267zm13 .566v5.734l-4.778-2.867zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083zM1 13.116V7.383l4.778 2.867L1 13.117Z" />
                </svg> <br>
                <p>Bonifico Bancario</p>
            </div>
        </div>
        <hr>
    </div>

    <!--MODALE -->
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

    <!--FINE MODALE-->






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>