<div class="container">
    <div class="col-md-12 content text-center" style="background-color: grey; color: white; margin-top: 80px">
        <h4>All Booking List</h4>
        <table class="table table-striped table-bordered mt-4">
            <tr class="table-secondary" style="color: black"><td><strong>No</strong></td><td><strong>Date</strong></td><td><strong>Status</strong></td><td><strong>Price</strong></td><td><strong>Action</strong></td></tr>
            <?php
            $no=1;
            foreach($data_booking as $data){?>
                <tr>
                    <td><?=$no;?></td><td><?=$data->date;?></td>
                    <?php
                    if ($data->status == 'pending') {
                    ?>
                    <td class="table-danger" style="color: black">
                        <?php
                        }
                        else {
                        ?>
                    <td class="table-success" style="color: black">
                        <?php
                        }
                        ?>
                        <?=$data->status;?>
                    </td>
                    <td><?=$data->price;?></td>
                    <td>
                    <?php if ($data->status != 'Verified') { ?>
                        <a role="button" class="btn btn-success" href="<?php echo base_url('Booking/updateBooking/') . $data->id_booking ?>">Verify</a>
                        <?php
                    }
                    ?>
                        <?php
                            foreach ($data_pembayaran as $pembayaran) {
                                if ($pembayaran->id_booking == $data->id_booking) {
                                    ?>
                                    <a role="button" class="btn btn-warning"
                                       href="<?php echo base_url() . $pembayaran->bukti_transfer ?>">View Payment</a>
                                    <?php
                                }
                            }
                        ?>
                    </td>
                </tr>
                <?php $no++;}?>
        </table>
        <p>*Please verified all of the book.</p>
    </div>
</div>

