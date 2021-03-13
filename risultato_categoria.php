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
                <h2 class="col-12 text-center tm-section-title">ecco la categoria inserita</h2>
            </header>

            <?php
                  $id_c = $_GET["id_c"];
                  $nome_c = $_GET["nome_c"];
                  $connection = mysqli_connect("remotemysql.com","JQGxKmZtbe","5g0uKMH8Kw","JQGxKmZtbe");
                  $query = "SELECT `id_c`, `nome_c` FROM `categorie` WHERE id_c = $id_c and nome_c = '$nome_c'";
                  $result = mysqli_query($connection,$query);
                  if(mysqli_num_rows($result) != 0){
                    echo "la categoria esiste, inseriscine un'altro"; 
                  }else{
                    $query = "INSERT INTO `categorie`(`id_c`, `nome_c`) VALUES ($id_c,'$nome_c')";
                    $result = mysqli_query($connection,$query);
                    echo"id categoria : ".$id_c."<br>";
                    echo"nome categoria : ".$nome_c."<br>";
                  }
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