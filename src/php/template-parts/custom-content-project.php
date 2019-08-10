<?php
$images = $item['image'];
$type = $item['slider_type'];
?>

<div class="row <?php echo ($type != 'type_1') ? 'justify-content-end' : ''; ?>">
    <div class="position-relative <?php echo ($type != 'type_1') ? 'col-12 px-0 pr-xl-0 ' : 'col-12 px-0'; ?>">
        <div class="swiper-container">
            <div class="swiper-wrapper d-flex flex-column">
                <?php 
                foreach($images as $key=>$image) :
                    $image_project = $image['project_image']['url'];
                    $image_project_mobile = $image['project_image_mobile']['url'];
                    $project_tittle = $image['tittle'];
                    $link = $image['link']['url'];
                ?>
                <div class="project-item my-4">
                    <a href="<?php echo $link ?>" class="d-block position-relative w-100 h-100 ">
                        <div class="project-over">
                            <h1 class="project-over-number"><?php echo $project_tittle ?></h1>
                            <p class="project-over-details">Kliknij aby zobaczyć więcej</p>
                        </div>
                        <img class="img-fluid d-none d-md-block w-100 w-100" src="<?php echo $image_project; ?>" alt="">
                        <img class="img-fluid d-md-none w-100 w-100" src="<?php echo (empty($image_project_mobile)) ? $image_project : $image_project_mobile; ?>" alt="">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if($type == 'type_2') : ?>
        <div class="swiper-nav ml-md-4">
            <div class="swiper-nav-button swiper-nav-button-prev">
                <img src="<?php echo IMG_DIR; ?>/arrow.svg" alt="" class="img-fluid">
            </div>
            <div class="swiper-nav-button swiper-nav-button-next">
                <img src="<?php echo IMG_DIR; ?>/arrow.svg" alt="" class="img-fluid">
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
