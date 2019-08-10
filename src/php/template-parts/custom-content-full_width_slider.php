<?php
$slides = $item['slides'];
$type = $item['slider_type'];
?>

<?php if(is_page('pracownia')) { ?>
<div class="logo-slider row <?php echo ($type != 'type_1') ? 'justify-content-end' : ''; ?>">
    <div class="logo-slider-container position-relative col-12 px-0">
        <!-- <div class="swiper-container swiper2">
            <div class="swiper-wrapper">
                <?php 
                        foreach($slides as $key=>$image) :
                            $image_slide = $image['image_slider']['url'];
                            $image_slide_mobile = $image['image_slider_mobile']['url'];
                        ?>
                <div class="swiper-slide">
                            <a href="#" class="d-flex position-relative h-100 overflow-hidden">
                                <img class="img-fluid mx-auto w-80 d-none d-md-block" src="<?php echo $image_slide; ?>" alt="">
                                <img class="img-fluid mx-auto w-80 d-md-none" src="<?php echo (empty($image_slide_mobile)) ? $image_slide : $image_slide_mobile; ?>" alt="">
                            </a>
                        </div>
                <div class="swiper-slide">
                    <a href="#" class="d-flex position-relative h-100 overflow-hidden">
                             <img class="img-fluid mx-auto w-80 d-none d-md-block" src="<?php echo $image_slide; ?>" alt="">
                        <img class="img-fluid mx-auto w-80 d-md-none"
                            src="<?php echo (empty($image_slide_mobile)) ? $image_slide : $image_slide_mobile; ?>"
                            alt="">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div> -->
        <div class="slider">
            <div class="slide-track">
                <?php 
                        foreach($slides as $key=>$image) :
                            $image_slide = $image['image_slider']['url'];
                            $image_slide_mobile = $image['image_slider_mobile']['url'];
                        ?>
                <div class="slide">
                    <img src="<?php echo $image_slide; ?>" class="img-fluid mx-auto" alt="" />
                </div>
                <?php endforeach; ?>

            </div>
        </div>
        <img src="<?php echo IMG_DIR; ?>/poplawskifoto.png" alt="" class="popla" />
    </div>
</div>
<?php }else { ?>

<div class="row <?php echo ($type != 'type_1') ? 'justify-content-end' : ''; ?>">
    <div class="position-relative col-12 px-0">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php 
                foreach($slides as $key=>$image) :
                    $image_slide = $image['image_slider']['url'];
                    $image_slide_mobile = $image['image_slider_mobile']['url'];
                ?>
                <div class="swiper-slide">
                    <a href="#" class="d-block position-relative w-100 h-100 overflow-hidden">
                        <img class="img-fluid d-none d-md-block w-100 w-100" src="<?php echo $image_slide; ?>" alt="">
                        <img class="img-fluid d-md-none w-100 w-100"
                            src="<?php echo (empty($image_slide_mobile)) ? $image_slide : $image_slide_mobile; ?>"
                            alt="">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if($type == 'type_2') : ?>
        <div class="swiper-nav ml-md-4">
            <div class="swiper-nav-button swiper-nav-button-prev swiper-button-white">
                <img src="<?php echo IMG_DIR; ?>/arrow.svg" alt="" class="img-fluid">
            </div>
            <div class="swiper-nav-button swiper-nav-button-next swiper-button-white">
                <img src="<?php echo IMG_DIR; ?>/arrow.svg" alt="" class="img-fluid">
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php }; ?>