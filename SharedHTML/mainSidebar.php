<?php
    session_start();
?>

<nav>
    <ul class="d-flex justify-content-between">
        <div class="d-flex justify-content-start">
            <?php
                $sessionId = $_SESSION['id'];
            ?>
            <li><a class="active fw-bold" href="./mainPage.php"> Hoşgeldin <?php echo $_SESSION['departmantName']; ?> </a></li>
            <li><a href="#news">İşler</a></li>
            <li><a href="./mainProfile.php?id=<?php echo $sessionId; ?>">Profil</a></li>
        </div>

        <div class="d-flex justify-content-start">
            <li><a class="" href="./mainTaskDemands.php">İstekler</a></li>
            <li><a class="" href="mainTaskDemand.php">İstek Gönder</a></li>
            <li><a class="" href="./Actions/logout.php">Çıkış yap</a></li>
        </div>
    </ul>
</nav>