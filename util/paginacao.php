<?php if ($num_paginas > 1) { 
    $anterior = $pagina;
    $seginte = $pagina;
    if ($anterior > 0) {
        $anterior--;
    }
    if ($seginte < $num_paginas-1) {
        $seginte++;
    }
?>
<nav>
    <ul class="pagination">
        <li class="waves-effect anterior-proximo">
            <a href="<?php echo $rota ?>?pagina=<?php echo $anterior ?>" aria-label="Anterior"> 
            <i class="ti-angle-left"></i>
            </a>
        </li>
        
        <?php for ($i = 0; $i < $num_paginas; $i++) {
            $estilo ="";
            if ($pagina == $i){
            $estilo = "activado";
            }
        ?>
        <li ><a href="<?php echo $rota ?>?pagina=<?php echo $i?>" class="page-link <?php echo $estilo ?>"><?php echo $i+1 ?> </a></li>
        <?php } ?>

        <li class="waves-effect anterior-proximo">
        <a href="<?php echo $rota ?>?pagina=<?php echo $seginte?>" aria-label="Seguinte"> 
            <i class="ti-angle-right"></i>
        </a>
    </li>
    </ul>
</nav>
<?php } ?>