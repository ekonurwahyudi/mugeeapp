<?php
/**
 * Template Name: Reset Password Page Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage FreelanceEngine
 * @since FreelanceEngine 1.0
 */

    global $post;
    get_header();
?>


<div class="container page-container">
    <!-- block control  -->
    <div class="row block-posts block-page">
        <div class="col-md-8 col-sm-12 col-xs-12 posts-container" id="left_content">
            <div class="blog-content">
                <form role="form" id="resetpass_form" class="signin_form">
                    <input type="hidden" id="user_login" name="user_login" value="<?php if(isset($_GET['user_login'])) echo $_GET['user_login'] ?>" />
                    <input type="hidden" id="user_key" name="user_key" value="<?php if(isset($_GET['key'])) echo $_GET['key'] ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="control-label title-plan" for="new_password">
                                    <?php _e('Password Baru', ET_DOMAIN) ?>
                                </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="password" class="form-control text-field" id="new_password" name="new_password" placeholder="<?php _e('Masukan Password Baru', ET_DOMAIN);?>">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="control-label title-plan" for="re_new_password">
                                    <?php _e('Ulangi Password', ET_DOMAIN) ?>
                                </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="password" class="form-control text-field" id="re_new_password" name="re_new_password" placeholder="<?php _e('Ulangi password', ET_DOMAIN);?>">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-submit btn-submit-login-form">
                                    <?php _e('Reset', ET_DOMAIN) ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div><!-- end page content -->
        </div><!-- LEFT CONTENT -->
        <div class="col-md-4 col-sm-12 col-xs-12 page-sidebar blog-sidebar" id="right_content">
            <?php get_sidebar('page'); ?>
        </div><!-- RIGHT CONTENT -->
    </div>
    <!--// block control  -->
</div>
<?php
    get_footer();
?>