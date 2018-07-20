<div class="container">
    <div class="col-md-12 content text-center" style="background-color: grey; color: white; margin-top: 80px">
        <h4>Your Booking List</h4>
        <table class="table table-striped table-bordered mt-4">
            <tr class="table-secondary" style="color: black"><td><strong>No</strong></td><td><strong>Date</strong></td><td><strong>Status</strong></td><td><strong>Price</strong></td></tr>
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
                </tr>
            <?php $no++;}?>
        </table>
        <p>*Please wait until our admin verified your book.</p>
    </div>
</div>
