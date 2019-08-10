<?php
$proces = $item['proces_text'];
?>
<div class="row justify-content-center">
    <div class="col-11 col-md-10 ">
        <div class="process-main-container">
            <div class="proces-tittle mb-6">
                <h1>ETAPY PROJEKTOWANIA</h1>
            </div>
            <div class="proces-items-container">
           
                    <div class="col-12 col-xl-5 pl-xl-0">
                    <?php 
                foreach($proces as $key=>$proces_text) :
                    $project_tittle = $proces_text['tittle'];
                    $project_text = $proces_text['text'];
                ?>
                <div class="proces-item row">
                            <div class="text col-12 ">
                                <h1><?php echo $project_tittle ?></h1>
                                <p><?php echo $project_text ?> </p>
                            </div>
                        </div>
                <?php endforeach; ?>
                    </div>
                    <div class="col-xl-2"></div>
                    <div class="col-12 col-xl-5 pr-xl-0">
                    <?php 
                foreach($proces as $key=>$proces_text) :
                    $project_tittle = $proces_text['tittle_right'];
                    $project_text = $proces_text['text_right'];
                ?>
                <div class="proces-item row">
                            <div class="text col-12 ">
                                <h1><?php echo $project_tittle ?></h1>
                                <p><?php echo $project_text ?> </p>
                            </div>
                        </div>
                <?php endforeach; ?>
                    </div>
                </div>

        </div>
    </div>
</div>