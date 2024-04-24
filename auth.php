<?php
defined('_VALID') or die('not allowed');

// Memulai session
session_start();

function init_login() {
    // 
    $nama = 'admin';
    $pass = 'admin';
    //
    if (isset($_POST['nama']) && isset($_POST['pass'])) {
        $n = trim($_POST['nama']);
        $p = trim($_POST['pass']);
        if ( ($n === $nama) && ($p === $pass) ) {
            // Set session
            $_SESSION['nlogin'] = $n;
            $_SESSION['time'] = time();
            ?>
            <script type="text/javascript">
            document.location.href="./";
            </script>
            <?php
        } else {
            echo 'Nama/Password Tidak Sesuai';
            return false;
        }
    }
}

function validate() {
    if (!isset($_SESSION['nlogin']) || !isset($_SESSION['time']) ) { ?>
        <div class="inner">
        <form action="" method="post">
        <table border=0 cellpadding=5>
        <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" /></td>
        </tr>
        <tr>
        <td>Password</td>
        <td><input type="password" name="pass" /></td>
        </tr>
        <tr>
        <td></td>
        <td><input type="submit" value="LOGIN" /></td>
        </tr>
        </table>
        </form>
        </div>
    <?php
        exit;
    }
    if (isset($_GET['m']) && $_GET['m'] == 'logout') {
        // Hapus session
        unset($_SESSION['nlogin']);
        unset($_SESSION['time']);
        ?>
        <script type="text/javascript">
        document.location.href="./";
        </script>
        <?php
    }
}
?>
