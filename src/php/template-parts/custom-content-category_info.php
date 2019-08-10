<?php if(!empty($item['category'])) { ?>
<div class="row justify-content-center">
    <div class="col-11 col-md-10 ">
        <div class="post-nav-wrap mt-5 mt-xxl-6">
            <div class="kategorie row justify-content-center">
                <div class="col-12 col-lg-8 col-xxl-6 mb-5 mb-lg-0 info-wrapp d-flex justify-content-between">
                    <?php if(!empty($item['category'])) { ?><span><b>KATEGORIA:</b><?php echo $item['category']; ?><?php };?></span>
                    <?php if(!empty($item['projektant'])) { ?><span><b>PROJEKTANT:</b><?php echo $item['projektant']; ?><?php };?></span>
                    <?php if(!empty($item['year'])) { ?><span><b>ROK:</b><?php echo $item['year']; ?><?php };?></span>
                </div>
            </div>
            <div class="prev-post">
                <?php 
                    next_post_link('
                    <h2>%link</h2>
                    ', '< %title', false);
                ?>
            </div>

            <div class="next-post">
                <?php 
                    previous_post_link('
                    <h2>%link</h2>
                    ', '%title >', false);
                ?>
            </div>
        </div>
    </div>
</div>
<?php }else { ?>
    <div class="row justify-content-center">
    <div class="col-11 col-md-10 ">
        <div class="post-nav-wrap mt-5 mt-xxl-6">
            <div class="prev-post">
                <?php 
                    next_post_link('
                    <h2>%link</h2>
                    ', '< %title', false);
                ?>
            </div>

            <div class="next-post">
                <?php 
                    previous_post_link('
                    <h2>%link</h2>
                    ', '%title >', false);
                ?>
            </div>
        </div>
    </div>
</div>
<?php }; ?>