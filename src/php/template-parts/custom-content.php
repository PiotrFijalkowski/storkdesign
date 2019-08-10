<div class="body-wrapper <?php echo (is_front_page()) ? 'mt-0' : '' ?> ">
<?php 
/*
<div data-ng-view></div>
<script type="text/ng-template" id="mieszkanie.html">   
    <div>mieszkanie</div>
</script>
*/

$content = get_field('content', $page);
if (is_array($content)) :
    foreach ($content as $key => $item) :

        $width = $item['settings']['width'];
        $id = $item['settings']['id'];
        $extra_classes = $item['settings']['extra_classes'];
        $disabled = $item['settings']['disable'];
        $layout = $item['acf_fc_layout'];

        if (!$disabled) : ?>
            <?php if ($id) : ?>
                <a id="<?php echo $id; ?>" class="anchor"></a>
            <?php endif; ?>
            <div class="custom-content custom-content-<?php echo $layout; ?> <?php echo $extra_classes; ?> <?php echo $id ?: ''; ?>">
                <div class="container<?php echo ($width == 'full') ? '-fluid' : ''; ?>">
                    <?php
                    set_query_var('item', $item);
                    get_template_part('template-parts/custom-content', $layout);
                    ?>
                </div>
            </div>

        <?php
        endif;
    endforeach;
endif;
?>
</div>
<?php 