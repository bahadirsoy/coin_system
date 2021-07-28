<?php
    session_start();
?>

<nav>
    <ul class="d-flex justify-content-between">
        <div class="d-flex justify-content-start">
            <li><a class="active fw-bold" href="#home"> Hoşgeldin <?php echo $_SESSION['departmantName']; ?> </a></li>
            <li><a href="#news">Geçmiş</a></li>
            <li><a href="#contact">Profil</a></li>
        </div>

        <div class="d-flex justify-content-start">
            <li><a class="" href="#contact">İstekler</a></li>
            <li><a class="" href="mainTaskDemand.php">İstek Gönder</a></li>
            <li><a class="" href="./Actions/logout.php">Çıkış yap</a></li>
        </div>
    </ul>
</nav>