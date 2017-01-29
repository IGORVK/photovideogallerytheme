<?php
$picture =  esc_attr(get_option('contact_form_picture'));
$phone = esc_attr( get_option( 'phone_number' ) );
$mail = get_bloginfo('admin_email');

?>
<div class="wraper-igo-contact-form">


           <div class="row">
               <h1 class="title-igo-contact-form">get in touch</h1>
               <div class="col-md-1"></div>
               <div class="col-md-5 ">
                   <div class="row">
                       <div class="col-xs-12 ">
                            <div class="igo-contacts text-center">
                                <div class="image-igo-contact-form">
                                    <img src="<?php echo $picture; ?>" alt="">
                                </div>
                                <div class="contact-wrapper">
                                    <?php if( !empty( $phone ) ): ?>
                                        <div class="phone">
                                            <a href="tel:<?php echo $phone; ?>" target="_blank"><?php echo $phone; ?></a>
                                        </div>
                                    <?php endif; ?>
                                   <?php if( !empty( $mail) ): ?>
                                        <div class="mail">
                                            <a href="mailto:<?php echo $mail; ?>" target="_blank"><?php echo $mail; ?></span></a>
                                        </div>
                                    <?php endif; ?>
                                </div><!--.contact-wrapper-->
                            </div><!--.igo-contacts-->
                       </div><!--.col-xs-12-->
                   </div><!--.row-->
               </div><!--.col-md-5-->
               <div class="col-md-5 ">
                   <div class="row">
                       <div class="col-xs-12 ">
                            <form id="igo-contact-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" >
                                            <small class="text-danger form-control-msg">Your Name is Required</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Wedding Date" id="date" name="date" >
                                            <small class="text-danger form-control-msg">Wedding Date is Required</small>
                                        </div>
                                    </div><!--.col-md-6-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email" id="email" name="email" >
                                            <small class="text-danger form-control-msg">Your Email is Required</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Venue" id="venue" name="venue" >
                                            <small class="text-danger form-control-msg">A Venue is Required</small>
                                        </div>
                                    </div><!--.col-md-6-->
                                </div><!--.row-->

                                <div class="form-group">
                                    <textarea   class="form-control"  placeholder="Tell us about your wedding" id="message" name="message"></textarea>
                                    <small class="text-danger form-control-msg">A Message is Required</small>
                                </div>

                                <button type="submit" class="btn btn-default pull-right">Submit</button>

                                <small class="text-info form-control-msg js-form-submission">Submission in process, please wait..</small>
                                <small class="text-success form-control-msg js-form-success">Message Successfully submitted, thank you!</small>
                                <small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try again!</small>

                            </form>
                       </div><!--.col-xs-12-->
                   </div><!--.row-->
               </div><!--.col-md-5-->
               <div class="col-md-1 "></div>

           </div><!--.row-->



</div>