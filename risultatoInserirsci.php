<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Simple House - About Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
    <link href="css/templatemo-style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="ilMio.css">
</head>
<!--

Simple House

https://templatemo.com/tm-539-simple-house

-->

<body>

    <div class="container">
        <!-- Top box -->
        <!-- Logo & Site Name -->
        <div class="placeholder">
            <div class="parallax-window" data-parallax="scroll" data-image-src="img/simple-house-01.jpg">
                <div class="tm-header">
                    <div class="row tm-header-inner">
                        <div class="col-md-6 col-12">
                            <img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
                            <div class="tm-site-text-box">
                                <h1 class="tm-site-title">mercato di javed</h1>
                                <h6 class="tm-site-description">ciao sto facendo questo sito wb</h6>
                            </div>
                        </div>
                        <ul class="tm-nav-ul">
                               
                              

                               
                               <div class="navbar">
                               <li><a href="index.php" class="">Home</a></li>
                               </div>


                       <div class="dropdown">
                   <button class="dropbtn">inserisci elementi 
                        <i class="fa fa-caret-down"></i>
                   </button>
                   <div class="dropdown-content">
                   <a href="inserisci.php" class="tm-nav-link active">inserisci prodotto</a>
                       <a href="inserisciNegozio.php">inserisci negozio</a>
                       <a href="inserisciCategoria.php">inserisci categoria</a>
                    </div>


                   </div> 
                   <div class="dropdown">
                   <button class="dropbtn">elimina elementi 
                        <i class="fa fa-caret-down"></i>
                   </button>
                   <div class="dropdown-content">
                   <a href="eliminaProdotto.php" class="tm-nav-link active">elimina prodotto</a>
                       <a href="elimina_negozio.php">elimina negozio</a>
                       <a href="elimina_categoria.php">elimina categoria</a>
                    </div>
                   </div> 


                       </ul>
                        </nav>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <main>
            <header class="row tm-welcome-section">
                <h2 class="col-12 text-center tm-section-title">ecco il prodotto che hai inserito</h2>
            </header>

            <?php


            //id_p  nome_p  prezzo   url    categoria   descrizione
            $id_p = $_GET["id_p"];
            $nome_p  = $_GET["nome_p"];
            $prezzo = $_GET["prezzo"];
            $url = $_GET["url"];
            $categoria = $_GET["categoria"];
            $descrizione = $_GET["descrizione"];
            $negozio = $_GET["negozio"];
            $offerta = $_GET["offerta"];
            $num_pezzi = $_GET["num_pezzi"];
            $data_time =  date('Y-m-d');

           

            $negozio_nome = $negozio;
            $categoria_nome= $categoria;

            /* 
            SELECT * FROM `prodotti` WHERE
             prodotti.id_p = $id_p AND prodotti.nome_p = "$nome_p" AND 
             prodotti.descirizione_p = "$descrizione" 
             and prodotti.prezzo_p = $prezzo 
            
            */


            $connection = mysqli_connect("remotemysql.com","JQGxKmZtbe","5g0uKMH8Kw","JQGxKmZtbe");
            $query = ' SELECT * FROM `prodotti` WHERE
             prodotti.id_p = "$id_p" AND prodotti.nome_p = "$nome_p" AND 
             prodotti.descirizione_p = "$descrizione" 
             and prodotti.prezzo_p = "$prezzo"';
             $result = mysqli_query($connection,$query);
             
          
                $query_categoria_id = "SELECT categorie.id_c FROM categorie WHERE categorie.nome_c = '$categoria'";
                $risultatoCategoria_id = mysqli_query($connection,$query_categoria_id );
                
                while($row = mysqli_fetch_array($risultatoCategoria_id)){
                    $categoria = $row[0];
                }
                
                $query_negozio_id = "SELECT `id_n` FROM `negozi` WHERE negozi.nome_n = '$negozio'";
                $risultatoNegozio_id = mysqli_query($connection, $query_negozio_id );
                while($row = mysqli_fetch_array($risultatoNegozio_id )){
                    $negozio = $row[0];
                }
                
            if(mysqli_num_rows($result) != 0){
                echo"il prodotto &egrave gi&egrave presente nel database";
            }else{
                $query = "INSERT INTO `prodotti`(`id_p`, `nome_p`, `descirizione_p`, `prezzo_p`, `id_c`, `img`) VALUES ($id_p,'$nome_p', '$descrizione', $prezzo,$categoria, '$url')";
                $result = mysqli_query($connection,$query);
            }
            echo $negozio;//provaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa

            $negozio =  intval($negozio);
            $categoria = intval($categoria);

            $query_offrire_negozio = "SELECT * FROM `offrire` WHERE offrire.id_p =$categoria AND offrire.id_n = $negozio";
            $risultato_query_negozio = mysqli_query($connection,$query_offrire_negozio);

            if(mysqli_num_rows($risultato_query_negozio) != 0){
                echo"il prodotto esiste nel negozio selezionato";
            }else{
               
                // echo "sono sopra"."\n";
                $query_finale_offerta = "INSERT INTO `offrire`(`id_p`, `id_n`, `num_pezzi`, `data_offerta`, `offerta`) VALUES ($id_p,$negozio,$num_pezzi,'$data_time', $offerta)";
                // echo "sono sotto"."\n";
                $result_offerta = mysqli_query($connection,$query_finale_offerta);
                // echo "prima di dentro"."\n";
                // echo $result_offerta;
                // echo "sono dentro";
                // echo $categoria."\n";
               
                // echo $num_pezzi."\n";
                // echo $data_time."\n";
                // echo $offerta."\n";
                //$categoria,$negozio,$num_pezzi,'$data_time', $offerta
                //44,11,32432,'2021-03-12', 1
            }

            
            

                echo'<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
                echo' <figure>';
                     echo"<img src='$url' alt='Image' class='img-fluid tm-gallery-img' />";
                    echo' <figcaption>';

                  echo "<div class='bgForDescription'>";

                    $titolo = "<h4 class='tm-gallery-title'>$nome_p </h4>";
                    echo $titolo;
                        $descrizione = "<p class='tm-gallery-description'>$descrizione</p>";
                        echo $descrizione;
                        $categoria_nome= "<h4 class='tm-gallery-description'>categoria :  $categoria_nome </h4>";
                      echo$categoria_nome;

                      $negozio_nome = "<h4 class='tm-gallery-description'>negozio  :  $negozio_nome  </h4>";
                      echo $negozio_nome;
                    
                        $prezzo = "<p class='tm-gallery-price'>prezzo : $prezzo €</p>";
                        echo $prezzo;

                        echo'</div>';
                        
                     echo'</figcaption>';
                 echo'</figure>';
             echo'</article>';

           
          
            mysqli_close($connection);
            
           
   
            
            
            
            ?>


        </main>

        <footer class="tm-footer text-center">
            <p>Copyright &copy; 2021 javed-interprise</p>
        </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
</body>

</html>

