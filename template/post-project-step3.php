<?php
    global $user_ID;
    $step = 3;

    $disable_plan = ae_get_option('disable_plan', false);
    if($disable_plan) $step--;
    if($user_ID) $step--;
    $post = '';
    if(isset($_REQUEST['id'])) {
        $post = get_post($_REQUEST['id']);
        if($post) {
            global $ae_post_factory;
            $post_object = $ae_post_factory->get($post->post_type);
            echo '<script type="data/json"  id="edit_postdata">'. json_encode($post_object->convert($post)) .'</script>';
        }

    }
    //$current_skills = get_the_terms( $profile, 'skill' );
?>
<div class="step-wrapper step-post" id="step-post">
    <a href="#" class="step-heading active">
        <span class="number-step"><?php if($step > 1 ) echo $step; else echo '<i class="fa fa-rocket"></i>'; ?></span>
        <span class="text-heading-step"><?php _e("Masukkan Data Ikan yang akan dijual", ET_DOMAIN); ?></span>
        <i class="fa fa-caret-right"></i>
    </a>
    <div class="step-content-wrapper content" style="<?php if($step != 1) echo "display:none;" ?>" >
        <form class="post" role="form" class="validateNumVal">
            
            <!-- project title -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="post_title" class="control-label title-plan">
                            <?php _e("Nama Ikan", ET_DOMAIN); ?>
                            <br/>
                            <span><?php _e("Masukkan nama ikan", ET_DOMAIN); ?></span>
                        </label>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <input type="text" class="input-item form-control text-field" id="post_title" placeholder="<?php _e("Nama Ikan", ET_DOMAIN); ?>" name="post_title">
                    </div>
                </div>
            </div>
            <!--// project title -->

            <!-- project budget -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="et_budget" class="control-label title-plan">
                            <?php printf(__("Harga (%s)", ET_DOMAIN), fre_currency_sign(false) ); ?>
                        </label>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <input step="5" required type="number" class="input-item form-control text-field is_number numberVal" id="et_budget" placeholder="<?php _e("Harga Ikan", ET_DOMAIN); ?>" name="et_budget" min="1">
                    </div>
                </div>
            </div>
            <!--// project budget -->

            <!-- file attachment -->
            <div class="form-group">
                <div class="row" id="gallery_place">
                    <div class="col-md-4">
                        <label for="carousel_browse_button" class="control-label title-plan">
                            <?php _e("Upload Gambar Ikan", ET_DOMAIN); ?><br/>
                            <span>
                            <?php _e("Format file: Png, Jpg", ET_DOMAIN); ?>
                            </span>
                        </label>
                    </div>

                    <div class="edit-gallery-image col-md-8 col-sm-12" id="gallery_container">
                       <ul class="gallery-image carousel-list" id="image-list">
                            <li>
                                <div class="plupload_buttons" id="carousel_container">
                                    <span class="img-gallery" id="carousel_browse_button">
                                        <a href="#" class="add-img"><?php _e("Upload foto", ET_DOMAIN); ?> <i class="fa fa-plus"></i></a>
                                    </span>
                                </div>
                            </li>
                        </ul>
                        <span class="et_ajaxnonce" id="<?php echo wp_create_nonce( 'ad_carousels_et_uploader' ); ?>"></span>
                    </div>
                </div>
            </div>
            <!--//file attachment -->

            <!-- project description -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="post_content" class="control-label title-plan">
                            <?php _e("Deskripsi Ikan", ET_DOMAIN); ?>
                            <br />
                            <span><?php _e("Deskripsikan ikan yang anda jual/lelang", ET_DOMAIN); ?></span>
                        </label>
                    </div>

                    <div class="col-md-8 col-sm-12">
                        <?php wp_editor( '', 'post_content', ae_editor_settings()  );  ?>
                    </div>
                </div>
            </div>
            <!--// project description -->
            <?php do_action( 'ae_submit_post_form', PROJECT, $post ); ?>

            <!-- Captcha -->
            <?php if(ae_get_option('gg_captcha') && !current_user_can( 'manage_options' )){ ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-sm-8">
                            <div class="gg-captcha">
                                <?php ae_gg_recaptcha(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-submit-login-form"><?php _e("Upload Ikan", ET_DOMAIN); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Step 3 / End -->
