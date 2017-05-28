<?php
    et_get_mobile_header();
?>
<section class="section-wrapper section-project section-archive-project">
    <div class="list-link-tabs-page">
        <div class="container">
         
        </div>
    </div>
    <div class="project-wrapper">
        <div class="search-normal-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="search-wrap">
                            <span class="icon-form-search icon-search"></span>
                            <input type="text" name="s" value="" placeholder="<?php _e("Cari Ikan", ET_DOMAIN); ?>" class="search-normal-input keyword search">
                        </div>
                    </div>
                   
                
                    <div class="form-group">
                        <label><?php _e("Project Type", ET_DOMAIN); ?></label>
                        <?php 
                                ae_tax_dropdown( 'project_type' , 
                                      array(  'attr' => 'data-chosen-width="90%" data-chosen-disable-search="1"  data-placeholder="'.__("All types", ET_DOMAIN).'"', 
                                              'class' => 'type-filter', 
                                              'hide_empty' => true, 
                                              'hierarchical' => true , 
                                              'id' => 'project_type' , 
                                              'show_option_all' => __("All types", ET_DOMAIN),
                                              'value' => 'slug'
                                          ) 
                                );
                            ?> 
                    </div>
                    <?php 
                    $max_slider = ae_get_option('fre_slide_max_budget', 2000);
                    ?>
                    <div class="form-group">
                        <label><?php _e("Budget", ET_DOMAIN); ?></label>
                        <input id="et_budget" type="text" name="et_budget" class="slider-ranger" value="" data-slider-min="0" 
                            data-slider-max="<?php echo $max_slider; ?>" data-slider-step="5" 
                            data-slider-value="[0,1500]"
                        /> 
                        <input type="hidden" name="budget" id="budget" value= "" />
                    </div>
                   
        
        <div class="list-project-wrapper">
            <?php
                query_posts(array('post_type' => PROJECT, 'post_status' => 'publish')) ;
                get_template_part('mobile/list', 'projects'); 
                wp_reset_query();
            ?>
        </div>
        <script type="text/template" id="project-no-result">
            <div class="col-md-12 no-result">
                <p class="alert alert-info">
                    <i class="fa fa-info-circle"></i>&nbsp;<?php _e("Maaf Nama ikan tidak ada.", ET_DOMAIN); ?>
                </p>
            </div>  
        </script>
    </div>
</section>
<?php
    et_get_mobile_footer();
?>