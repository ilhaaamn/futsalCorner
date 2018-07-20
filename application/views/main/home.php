<!-- Content -->
<div class="container">
    <!-- Carousel -->
    <div id="carousel" class="carousel slide item" data-ride="carousel" style="width: 100%; height: 500px; margin-top: 80px">
        <ol class="carousel-indicators">
            <?php
                $count = 0;
                foreach ($result as $row) {
                    ?>
                    <li data-target="#carousel" data-slide-to="<?php echo $count?>"></li>
                    <?php
                    $count++;
                }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            $count = 0;
            foreach ($result as $row) {
                ?>
                <div class="carousel-item <?php if ($count == 0) echo 'active'?>">
                    <img class="d-block w-100" src="<?php echo base_url().$row->picture; ?>" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $row->nama?></h5>
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <p><?php echo $row->description?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $count++;
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Booking -->
    <div class="col-md-12 text-center content" id="book">
        <h2>Calling All Futsal Player!</h2>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam ducimus rem distinctio sint qui, deserunt accusamus officiis earum molestiae sequi adipisci laudantium quas cum nam facilis id temporibus quibusdam velit.</p>
            </div>
        </div>

        <button class="btn btn-info my-2 my-sm-0" type="submit" style="font-size: 15px">BOOK NOW</button>
    </div>

    <!-- Facillities -->
    <div class="col-md-12 text-center content" id="facillities">
        <h2>FutsalCorner's Facillities</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3 content">
                    <img src="<?php echo base_url('assets/img/Facillities/futsal-court-5-futsal-pictures.png')?>" alt="" style="width: 10em">
                    <h5>3 Futsal Courts</h5>
                </div>
                <div class="col-md-3 content">
                    <img src="<?php echo base_url()?>assets/img/Facillities/futsal-court-male-public-carpark.png" alt="" style="width: 10em">
                    <h5>Public Car Park</h5>
                </div>
                <div class="col-md-3 content">
                    <img src="<?php echo base_url()?>assets/img/Facillities/futsal-court-male-female-toilet.png" alt="" style="width: 10em">
                    <h5>Female and Male Toilet</h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 content">
                    <img src="<?php echo base_url()?>assets/img/Facillities/futsal-court-vending-machines.png" alt="" style="width: 10em">
                    <h5>Vending Machine</h5>
                </div>
                <div class="col-md-3 content">
                    <img src="<?php echo base_url()?>assets/img/Facillities/futsal-court-shower-facilities.png" alt="" style="width: 10em">
                    <h5>Shower Facillities</h5>
                </div>
                <div class="col-md-3 content">
                    <img src="<?php echo base_url()?>assets/img/Facillities/futsal-court-opening-hours.png" alt="" style="width: 10em">
                    <h5>Opening Hours : 9AM - 9PM</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Rates -->
    <div class="col-md-12 text-center content" id="book">
        <h2>Futsal Court Rates</h2>
        <div class="row">
            <div class="col-md-4 offset-2 text-right">
                <h3>Members Rates</h3>
                <?php
                    foreach ($result as $row) {
                        ?>
                        <h4><u><?php echo $row->nama?></u></h4>
                        <span><?php echo "Rp ".number_format($row->member_price,2,',','.')?></span><br><br>
                        <?php
                    }
                ?>
            </div>
            <div class="col-md-4 text-left">
                <h3>Public Rates</h3>
                <?php
                foreach ($result as $row) {
                    ?>
                    <h4><u><?php echo $row->nama?></u></h4>
                    <span><?php echo "Rp ".number_format($row->public_price,2,',','.')?></span><br><br>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
