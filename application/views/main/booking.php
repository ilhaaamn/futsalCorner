<?php
$timezone = date_default_timezone_get();
?>
<!-- Content -->
<div class="container">
    <!-- Booking -->

    <div class="col-md-12 content" style="background-color: dimgray; color: white; margin-top: 80px">
        <?php
            if (!isset($date)) {
                ?>
                <form class="ml-3" method="post" action="<?php echo base_url('booking') ?> ">
                    <div class="form-group">
                        <fieldset>
                            <legend><h5><strong>DATE</strong></h5></legend>
                            <div class="row">
                                <div class="col-lg-2 col-md-4">
                                    <input name="bookdate" class="form-control" type="date"
                                           value="">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </fieldset>
                    </div>
                </form>
                <?php
            }
        ?>
        <?php
            if (isset($date)) {
                ?>
        <form  class="ml-3" method="post" action="<?php echo base_url('booking/newBooking') ?>">
           <div class="form-group">
                <fieldset>
                   <legend><h5><strong>DATE</strong></h5></legend>
                   <div class="row">
                       <div class="col-lg-2 col-md-4">
                           <input name="bookdate" class="form-control" type="date" value="<?php echo $date?>" readonly>
                       </div>
                   </div>
               </fieldset>
                <fieldset class="mt-3">
                        <legend><h5><strong>COURT</strong></h5></legend>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-warning btn-lg" onclick="showText(0)">
                                <input type="radio" name="court" id="option1" value="FF001">Court 1
                            </label>
                            <label class="btn btn-warning btn-lg" onclick="showText(1)">
                                <input type="radio" name="court" id="option2" value="FF002">Court 2
                            </label>
                            <label class="btn btn-warning btn-lg" onclick="showText(2)">
                                <input type="radio" name="court" id="option3" value="FF003">Court 3
                            </label>
                        </div>
                </fieldset>
                <fieldset class="mt-3">
                    <legend><h5><strong>TIME</strong></h5></legend>
                    <div class="col-md-10 btn-group-toggle" data-toggle="buttons" id="jadwalcourt1" style="display: none;">
                        <?php
                        $found = Array(
                            '1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0, '7' => 0, '8' => 0, '9' => 0, '10' => 0, '11' => 0, '12' => 0
                        );

                        foreach ($jadwal_booking as $item) {
                            $count = 1;
                            $court = 'FF001';
                            echo "\n";
                            foreach ($detail_booking as $detail) {
                                $count = 1;
                                foreach ($jadwal as $value) {
                                    if ($detail->id_booking == $item->id_booking && $court == $detail->id_field && $detail->id_jadwal == $value->id_jadwal) {
                                        $found[$count] = 1;
                                    }
                                    $count++;
                                }
                            }
                        }

                        $count = 1;
                        foreach ($jadwal as $value) {
                            if ($found[$count] == 1) {
                                ?>
                                <label class="btn btn-sm btn-primary mx-1 my-1 disabled" style="font-size: large">
                                    <input type="checkbox" name="jadwal[]" value="<?php echo $value->id_jadwal; ?>" disabled><?php echo $value->jadwal_jam; ?>
                                </label>
                                <?php
                            } else {
                                ?>
                                <label class="btn btn-sm btn-outline-light mx-1 my-1" style="font-size: large">
                                    <input type="checkbox" name="jadwal[]"
                                           value="<?php echo $value->id_jadwal; ?>"><?php echo $value->jadwal_jam; ?>
                                </label>
                                <?php
                            }
                            $count++;
                        }
                        ?>
                    </div>
                    <div class="col-md-10 btn-group-toggle" data-toggle="buttons" id="jadwalcourt2" style="display: none;">
                        <?php
                        $found = Array(
                            '1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0, '7' => 0, '8' => 0, '9' => 0, '10' => 0, '11' => 0, '12' => 0
                        );

                        foreach ($jadwal_booking as $item) {
                            $count = 1;
                            $court = 'FF002';
                            echo "\n";
                            foreach ($detail_booking as $detail) {
                                $count = 1;
                                foreach ($jadwal as $value) {
                                    if ($detail->id_booking == $item->id_booking && $court == $detail->id_field && $detail->id_jadwal == $value->id_jadwal) {
                                        $found[$count] = 1;
                                    }
                                    $count++;
                                }
                            }
                        }

                        $count = 1;
                        foreach ($jadwal as $value) {
                            if ($found[$count] == 1) {
                                ?>
                                <label class="btn btn-sm btn-primary mx-1 my-1 disabled" style="font-size: large">
                                    <input type="checkbox" name="jadwal[]"
                                           value="<?php echo $value->id_jadwal; ?>"><?php echo $value->jadwal_jam; ?>
                                </label>
                                <?php
                            } else {
                                ?>
                                <label class="btn btn-sm btn-outline-light mx-1 my-1" style="font-size: large">
                                    <input type="checkbox" name="jadwal[]"
                                           value="<?php echo $value->id_jadwal; ?>"><?php echo $value->jadwal_jam; ?>
                                </label>
                                <?php
                            }
                            $count++;
                        }
                        ?>
                    </div>
                    <div class="col-md-10 btn-group-toggle" data-toggle="buttons" id="jadwalcourt3" style="display: none;">
                        <?php
                        $found = Array(
                            '1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0, '7' => 0, '8' => 0, '9' => 0, '10' => 0, '11' => 0, '12' => 0
                        );

                        foreach ($jadwal_booking as $item) {
                            $count = 1;
                            $court = 'FF003';
                            echo "\n";
                            foreach ($detail_booking as $detail) {
                                $count = 1;
                                foreach ($jadwal as $value) {
                                    if ($detail->id_booking == $item->id_booking && $court == $detail->id_field && $detail->id_jadwal == $value->id_jadwal) {
                                        $found[$count] = 1;
                                    }
                                    $count++;
                                }
                            }
                        }

                        $count = 1;
                        foreach ($jadwal as $value) {
                            if ($found[$count] == 1) {
                                ?>
                                <label class="btn btn-sm btn-primary mx-1 my-1 disabled" style="font-size: large">
                                    <input type="checkbox" name="jadwal[]"
                                           value="<?php echo $value->id_jadwal; ?>"><?php echo $value->jadwal_jam; ?>
                                </label>
                                <?php
                            } else {
                                ?>
                                <label class="btn btn-sm btn-outline-light mx-1 my-1" style="font-size: large">
                                    <input type="checkbox" name="jadwal[]"
                                           value="<?php echo $value->id_jadwal; ?>"><?php echo $value->jadwal_jam; ?>
                                </label>
                                <?php
                            }
                            $count++;
                        }
                        ?>
                    </div>
                </fieldset>

            <button type="submit" class="btn btn-success btn-lg mt-3" style="font-size: 20px; width: 30%">BOOK</button>
           </div>
        </form>
                <?php
            }
        ?>

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
