<header>
    <a href="index.php"><img src="https://cdn.svgporn.com/logos/nightwatch.svg" alt="logo nightwatch for example"></a>
    <?php if(isset($_SESSION['auth']['firstname']) && !empty($_SESSION['auth']['firstname'])): ?>    
    <p class="student-logged">
    <?php echo "Bienvenue <span class='user'>". $_SESSION['auth']['firstname'] . "</span>"; ?>
    <?php 
    if($_SESSION['auth']['picture']) 
        echo "<span class ='profile'><img src='assets/images/profile/".$_SESSION['auth']['picture']."'></span>";
    else 
        echo "<span class ='profile'><img src='assets/images/profile/person_default.png'></span>"; 
    ?>   
    </p>
    <?php endif;?>
    <nav>
        <ul>
            <?php if(!isset($_SESSION['auth']['firstname'])): ?>
                <li class="nav login"><a href="login.php">Connexion</a></li>
                <li class="nav registration"><a href="register.php">Inscription</a></li>
            <?php else: ?>
                <li class="nav logout"><a href="logout.php">Déconnexion</a></li>
            <?php endif;?>
        </ul>
    </nav>
</header>