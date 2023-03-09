<?php
    if (isset($_REQUEST['volver'])){
        echo "<br>1. <a href='alta.php'>Alta</a>";
        echo "<br>2. <a href='baja.php'>Baja</a>";
        echo "<br>3. <a href='consulta.php'>Consulta</a>";
        echo "<br>4. <a href='modifica2.php'>Modifica</a>";
        echo "<br><form><a href='login_form.html/><input type='button' value='SORTIR'></a>";
    }else{
    echo("<form action='test.php' method='post'>
            Login: <input name='login'>
            <br>
            Password: <input type='password' name='pass'>
            <br>
            <input type='submit' value='ALTA' name='alta2'>
            </form>");
        echo "<br><form action='alta.php' method='post'><input type='submit' name='volver' value='TORNAR'>";
    }
?>