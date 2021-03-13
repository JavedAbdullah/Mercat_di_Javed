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
                                <h6 class="tm-site-description">ciao sto facendo questo sito web</h6>
                            </div>
                        </div>
                        <nav class="col-md-6 col-12 tm-nav">
                            <ul class="tm-nav-ul">
                                <li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Home</a></li>
                                <li class="tm-nav-li"><a href="inserisci.php" class="tm-nav-link active">inserisci</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <main>
            <header class="row tm-welcome-section">
                <h2 class="col-12 text-center tm-section-title">ecco il negozio inserito</h2>
                
            </header>
            <?php
                $id_n = $_GET["id_n"];
                $nome_negozio = $_GET["nome_n"];
                $via = $_GET["via"];
                $cap= $_GET["cap"];
                $num_civico = $_GET["num_civico"];

                $connection = mysqli_connect("remotemysql.com","JQGxKmZtbe","5g0uKMH8Kw","JQGxKmZtbe");
                $query = "SELECT `id_n`, `nome_n`, `via`, `n_civico`, `cap` FROM `negozi` WHERE id_n = $id_n and nome_n = '$nome_negozio' and via = '$via' and n_civico =  $num_civico and cap=$cap";
                $result = mysqli_query($connection,$query);
                if(mysqli_num_rows($result) != 0){
                  echo "il negozio esiste, inserisci un'altro";  
                }else{
                    $query = "INSERT INTO `negozi`(`id_n`, `nome_n`, `via`, `n_civico`, `cap`) VALUES ($id_n,'$nome_negozio','$via',$num_civico ,$cap)";
                    $result = mysqli_query($connection,$query);
                    echo "il negozio  ||".$nome_negozio."|| e' stato inserito correttamente"."<br>";
                    echo "id negozio ".$id_n."\n"."<br>"; 
                    echo "in ".$via."\n"."<br>";
                    echo "cap: ". $cap."\n"."<br>";
                    echo "numero civico : " .$num_civico."\n"."<br>";
                }
             


                mysqli_close($connection);
            
            
            ?>

           

        </main>

        <footer class="tm-footer text-center">
            <p>Copyright &copy; 2021 javed-enterprise</p>
        </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
</body>

</html>