
<?php
include_once '../models/Connection.php';
include_once '../controllers/NoticiasService.php';
include_once '../models/Noticia.php';

$service = new NoticiasService();


$noticias = $service->read_noticias();

if (!empty($noticias)) {
    ?>

    <section class="section section-lg pt-lg-0 mt--200">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row row-grid">
                        <?php
                        $con = 0;
                        while ($noticia = array_shift($noticias)) {
                            ?>
                            <div class="col-lg-4">

                                <div class="card card-lift--hover shadow border-0 text-justify ">
                                    <img src="../funciones/imgNoticias/<?= $noticia->getFoto(); ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="text-primary text-uppercase"><?=
                                            $noticia->getEncabezado();
                                            ?></h6>
                                        <p class="description"><?= $noticia->getDescripcion(); ?></p>
                                        <a href="<?= $noticia->getLink(); ?>" class="btn <?php
                                        if ($con == 0) {
                                            echo "btn-primary";
                                        }else if($con == 1) {
                                            echo "btn-success";
                                        }else{
                                            echo "btn-warning";
                                        }
                                        $con++;
                                        ?> btn-primary" target="_black" >Leer Más</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
}
?>