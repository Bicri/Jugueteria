<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
//echo $path;
$components = explode('/', $path);
$first_part = $components[2];
//echo "<br>".$first_part;
?>
<nav class="nav">

    <div class="Logo" style="margin-left:90px;">


    </div>
    <div class="OpcMenu">
        <a href="./Ventas.php" class="<?php echo ($first_part == "Ventas.php") ? "active" : "" ?>"> INICIO </a>
        <div class="admin">
            <a href="./Administracion.php" class="<?php echo ($first_part == "Administracion.php" || $first_part == "ListaCompras.php" || $first_part == "JuguetesTop.php") ? "active" : "" ?>"> ADMINISTRACIÓN </a>
            <div class="submenu">
                <a href="./ListaCompras.php" class="active2"> Lista de compras </a>
                <a href="./JuguetesTop.php" class="active2"> Juguetes top </a>
            </div>
        </div>
        <div class="utili">
            <a href="./Utilidad.php" class="<?php echo ($first_part == "Utilidad.php") || ($first_part == "Utilidad2.php") ? "active" : "" ?>"> UTILIDAD </a>
            <div class="submenu">
                <a href="./Utilidad2.php" class="active2"> Por periodo </a>                
            </div>
        </div>
        <a href="./Alertas.php" class="<?php echo ($first_part == "Alertas.php") ? "active" : "" ?>"> ALERTAS</a>
        <a href="" id="gastos"> GASTOS</a>
    </div>
</nav>