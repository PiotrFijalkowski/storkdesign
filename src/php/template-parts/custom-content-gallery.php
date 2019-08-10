<?php
$images = $item['image'];
?>

<div class="row justify-content-center">
    <div class="col-11 col-md-10 col-xxl-6 p-0">
        <div class="swiper-container">
            <div class="swiper-wrapper d-flex flex-column">
                <?php 
                foreach($images as $key=>$image) :
                    $image = $image['gallery_image']['url'];
                ?>
                <div class="project-item my-4">
                        <img class="img-fluid w-100 w-100" src="<?php echo $image; ?>" alt=""> </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
