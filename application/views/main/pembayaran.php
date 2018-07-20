<!-- Content -->
<div class="container">
    <div class="col-md-12 content" style="background-color: dimgray; color: white; margin-top: 80px">
        <?php echo form_open_multipart('pembayaran');?>
            <div class="form-group">
                <fieldset>
                    <legend><h5><strong>UPLOAD BUKTI TRANSFER</strong></h5></legend>
                    <div class="row">
                        <div class="col-lg-2 col-md-4">
                            <input type="text" name="id_book" value="<?php echo $id_book?>" size="20" hidden>
                            <input type="file" name="userfile" size="20">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Upload</button>
                </fieldset>
            </div>
        </form>
    </div>
</div>
