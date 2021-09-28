<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <script src="./js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./css/style1.css" />    
    <script src="./js/notifiche.js"></script>
</head>
<body>
    <header>            
        <nav class="navbar fixed-top navbar-expand-md navbar-dark">
            <a class="navbar-brand" href="#">
                <img src="./utils/LogoBiblioteca.png" alt="logo">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav">
                    <a <?php isActive("index.php");?> href="index.php" class="nav-item nav-link">Home</a>
                    <?php if(isUserLoggedIn() && getUserRole() != "cliente"){?>
                        <a <?php isActive("login.php");?> href="login.php" class="nav-item nav-link">Modifica Articoli</a>
                    <?php }?>
                        <a <?php isActive("contatti.php");?> href="contatti.php" class="nav-item nav-link">Contatti</a>
                    <?php if(isUserLoggedIn()){?>
                        <a <?php isActive("carrello.php");?> href="carrello.php" class="nav-item nav-link">Carrello</a>
                    <?php }?>
                </div>
                <div class="navbar-nav">
                    <?php if(isUserLoggedIn()){?>
                            <a <?php isActive("logout.php");?> class="nav-item nav-link" href="logout.php">Logout</a>
                    <?php } else {?>
                            <a <?php isActive("login.php");?> class="nav-item nav-link" href="login.php">Login</a>
                    <?php }?>
                </div>
            </div>
        </nav>
    </header>
    <div class="notifica">
        <span class="notifica-close" onclick="this.parentElement.style.display='none';">&times;</span>
        <p class=al></p>
    </div>
    <main>
        <?php if(isset($templateParams["nome"])){
            require($templateParams["nome"]);
        }?>
    </main>
    <footer class="page-footer font-small pt-4">
    <div class="container text-center text-md-left">
    <div class="row">
    <div class="col-md-3 col-lg-3 col-xl-4 mx-auto mt-3">
        <h3 class="text-uppercase mb-4 font-weight-bold">Biblioteca Macis</h3>
        <p>Biblioteca Macis è una biblioteca, un centro di lettura, un laboratorio didattico e multimediale per bambine e bambini da 0 a 14 anni.</p>
        </div>
        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-4 col-lg-3 col-xl-5 mx-auto mt-3">
            <h5 class="text-uppercase mb-4 font-weight-bold">Contatti</h5>
            <p><i class="fas mr-3"></i>Indirizzo: Via S. Mama 175, Ravenna, RA 48120, IT</p>
            <p><i class="fas mr-3"></i>Email: bibliotecaMacis@gmail.com</p>
            <p><i class="fas mr-3"></i>Telefono: 0544 468325</p>
        </div>
    </div>
    </div>
    </footer>
</body>
</html>