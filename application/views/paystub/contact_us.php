<div class="contact_form_wrapper">
    <h3 class="contact_title">Please send us your message and we will respond you immedialtely with your question.<br> Or support@paystubscheck.com</br></h3>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <form name="contact_form" id="contact_form" method="POST">
                <div class="form-group">
                    <label for="name" class="sr-only">Your Name</label>
                    <input type="text" class="form-control" id="name" name="contact_name" placeholder="What's Your Name?*" data-error=".nameerror">
                    <div class="nameerror"></div>
                </div>
                <div class="form-group">
                    <label for="email" class="sr-only">Your Email</label>
                    <input type="email" class="form-control" id="email" name="contact_email" placeholder="What's Your Email?*" data-error=".emailerror">
                    <div class="emailerror"></div>
                </div>
                <div class="form-group">
                    <label for="contact_number" class="sr-only">Your Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_no" placeholder="What's Your Number?" data-error=".numbererror">
                    <div class="numbererror"></div>
                </div>
                <div class="form-group">
                    <label for="contact_question" class="sr-only">Your Question</label>
                    <textarea name="contact_question" id="contact_question" placeholder="How Can We Help?" class="form-control" rows="3" data-error=".faqerror"></textarea>
                    <div class="faqerror"></div>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="<?= $captcha_key; ?>" required></div>
                    <div class="captchaerror error">Please check this captcha code</div>
                </div>
                <button class="btn btn-default contact_form_submit">Submit</button>
            </form>
        </div>
    </div>
</div>