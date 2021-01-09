
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Utilisation du framework CSS "PureCSS" -->
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
    <!-- Utilisation du système de grille de "PureCSS" -->
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Kiemtao</title>
</head>
<body>
    <div id="layout" class="pure-g">
        <div class="sidebar pure-u-1 pure-u-md-1-4">
            <div class="header">
                <h1 class="brand-title">Kiemtaos</h1>
                <h2 class="brand-tagline">Le partage d'un sentiment à sa communauté.</h2>

                <p>
                    Il permet de lancer des échanges, des discussions, des prises de conscience au sein de la communauté. Il est donc utile pour soi et pour les autres.
                </p>

                <nav class="nav">
                    <ul class="nav-list">
                    <?='<li class="nav-item">
                            <a class="pure-button" href="./index.php">Liste</a>
                        </li>'; ?>
                    <?php if (empty($_SESSION['connectedUser'])): ?>
                        <?='<li class="nav-item">
                            <a class="pure-button" href="./login.php">Login</a></li>';?>
                        <?php else: ?>
                            <?='<li class="nav-item">
                            <a class="pure-button" href="./add.php">Ajout</a>
                        </li>'; ?>
                            <?= '<li class="nav-item">
                            <a class="pure-button" href="./logout.php">Logout</a>
                        </li>' ; ?>
                        
                        <?php endif; ?>
                    </ul>
                </nav>
                <?php if (!empty($_SESSION['connectedUser'])): ?>
                <?= "<p>Connecté en tant que <strong>". $_SESSION['connectedUser']."</strong> ( ".$_SESSION['connectedUserDetails']['email'].") </p>";?>
                <?php endif; ?>
            </div>
        </div>
        <div class="content pure-u-1 pure-u-md-3-4">
            <div>