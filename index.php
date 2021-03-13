<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Simple House Template</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
    <link href="css/templatemo-style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="ilMio.css">


    
</head>
<!--

Simple House

https://templatemo.com/tm-539-simple-house

-->



<style type="text/css">
    .bgForDescription {
        background:#F7FCE2;
    }
    </style>


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
                                <h1 class="tm-site-title">Mercato di javed</h1>
                                <h6 class="tm-site-description">ciao sto realizzando questo sito web</h6>
                            </div>
                        </div>

                        <nav class="col-md-6 col-12 tm-nav">
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

                        
                    </div>
                </div>
            </div>
        </div>

        <main>
            <header class="row tm-welcome-section">
                <h2 class="col-12 text-center tm-section-title">Realizzato da javed-Enterprise</h2>
                <p class="col-12 text-center"> in questa pagina vengono mostrati gli elementi presenti nel database </p>
            </header>


            <!-- Gallery -->



            

           
             <?php 

                    $connection = mysqli_connect("remotemysql.com","JQGxKmZtbe","5g0uKMH8Kw","JQGxKmZtbe");
                    $query = "SELECT DISTINCT prodotti.nome_p,prodotti.descirizione_p,prodotti.prezzo_p,prodotti.img,categorie.nome_c,negozi.nome_n FROM prodotti,categorie,offrire,negozi WHERE prodotti.id_c = categorie.id_c AND prodotti.id_p = offrire.id_p AND offrire.id_n = negozi.id_n";
                    $result = mysqli_query($connection,$query);
                    echo'<div class="row tm-gallery">';
                    echo'<div id="tm-gallery-page-pizza" class="tm-gallery-page">';
                    if(mysqli_num_rows($result) != 0){
                  

                        while($row = mysqli_fetch_array($result)){
                           
                           echo'<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
                          echo' <figure>';
                               echo"<img src='$row[3]' alt='Image' class='img-fluid tm-gallery-img' />";
                              echo' <figcaption>';

                            echo "<div class='bgForDescription'>";

                              $titolo = "<h4 class='tm-gallery-title'> $row[0] </h4>";
                              echo $titolo;
                                  $descrizione = "<p class='tm-gallery-description'>$row[1]</p>";
                                  echo $descrizione;
                                  $categoria = "<h4 class='tm-gallery-description'>categoria :  $row[4] </h4>";
                                echo $categoria;
                                $negozio = "<h4 class='text-light bg-dark'> da '$row[5]'</h4>";
                                  echo $negozio;
                                  $prezzo = "<p class='tm-gallery-price'>prezzo : $row[2]€</p>";
                                  echo $prezzo;

                                  echo'</div>';
                                  
                               echo'</figcaption>';
                           echo'</figure>';
                       echo'</article>';
                    }
                    

                    }else{
                        echo "nessun elemento presente nel database.";
                    }
                    echo'</div>';
                    echo'</div>';



                    mysqli_close($connection);
             ?>




              <!-- gallery page 1 -->

        </main>

        <footer class="tm-footer text-center">
            <p>Copyright &copy; 2021 javed-enterprise


        </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle click on paging links
            $('.tm-paging-link').click(function(e) {
                e.preventDefault();

                var page = $(this).text().toLowerCase();
                $('.tm-gallery-page').addClass('hidden');
                $('#tm-gallery-page-' + page).removeClass('hidden');
                $('.tm-paging-link').removeClass('active');
                $(this).addClass("active");
            });
        });
    </script>
</body>

</html>