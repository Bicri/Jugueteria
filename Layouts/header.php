<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
//echo $path;
$components = explode('/', $path);
$first_part = $components[2];
//echo "<br>".$first_part;
?>
    <nav class="nav">
        <div class="Logo">
            <a href="./Ventas.php" style="color:black; border:1px solid lightgray" > LOGO</a>
        </div>
        <div class="OpcMenu">
            <a href="./Ventas.php" class="<?php echo ($first_part=="Ventas.php") ? "active":""?>"> INICIO </a>
            <div class="admin">
                <a href="./Administracion.php" class="<?php echo ($first_part=="Administracion.php") ? "active":""?>"> ADMINISTRACIÓN </a>
                <div class="submenu">
                    <a href="./ListaCompras.php" class="active2"> ListaCompras </a>
                    <a href="./JuguetesTop.php" class="active2"> JuguetesTop </a>
                </div>
            </div>

            <a href="./Utilidad.php" class="<?php echo ($first_part=="Utilidad.php") ? "active":""?>"> UTILIDAD </a>
            <a href="./CostosIndirectos.php" class="<?php echo ($first_part=="CostosIndirectos.php") ? "active":""?>"> COSTOS INDIRECTOS</a>
        </div>
    </nav>


