<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong>Send email to active users</strong>
        </div>
        <div class="card-body card-block">
        <?php echo form_open_multipart("admin/sendMessagetoactiveuser", 'id="active_users"'); ?>
            <div class="form-group">
                <label for="subject" >Mesage Subject</label>
                <input class="form-control" id="subject" name="message_subject" placeholder="subject">
            </div>
            <div class="form-group">
                <label for="description" >Your Message</label>
                <textarea class="form-control" id="description" name="user_message"></textarea>
            </div>
            <button class="btn btn-primary  offer_form_submit" type="submit"> <i class="fa fa-send"></i> send</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
