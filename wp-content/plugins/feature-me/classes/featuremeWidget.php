<?php
/********************************************************************************
 *  Copyright 2012-2013 Ian Banks
 *******************************************************************************
 *
 *      Table of Contents
 *
 *      0.0 - featuremeWidget
 *      1.0 - featuremeWidget
 *      1.1 - widget
 *      1.2 - form
 *      1.3 - generateCSS
 *
 *
 ********************************************************************************/


class featuremeWidget extends WP_Widget
{

    /**
     * 1.0 - featuremeWidget
     * Assigns widget classname and description
     */
    public function featuremeWidget()
    {
        $widget_options = array(

            'classname' => 'feature-me',
            'description' => 'A simple widget that allows you to feature any page or post on your website.',
        );

        parent::WP_WIDGET('feature_me', 'Feature Me CTA', $widget_options);
    }

    /**
     * 1.1 - widget
     * Output to the front-end widget area
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        extract($args, EXTR_SKIP);
        $title = ($instance['title']) ? esc_attr(strip_tags($instance['title'])) : "";
        $type = ($instance['type']) ? esc_attr(strip_tags($instance['type'])) : "";
        $type_link = ($instance['type_link']) ? esc_attr(strip_tags($instance['type_link'])) : "";
        switch($type_link){
            case "default":
                $linkText = "Learn More";
                break;
            case "custom":
                $linkText = esc_attr(strip_tags($instance['linkText']));
                break;
            case "none":
                break;
        }
        $copy = (isset($instance['copy'])) ? esc_attr(strip_tags($instance['copy'])) : "excerpt";
        $body = ($instance['body']) ? esc_attr(strip_tags($instance['body'])) : "";
        $use_image = ($instance['use_image']) ? esc_attr(strip_tags($instance['use_image'])) : "t";
        $feature = ($instance['feature']) ? esc_attr(strip_tags($instance['feature'])) : "";
        $class = ($instance['class']) ? esc_attr(strip_tags($instance['class'])) : "";
        $type_url = ($instance['type_url'])? esc_attr(strip_tags($instance['type_url'])): "";
        $linkURL = ($instance['linkURL'])? esc_attr(strip_tags($instance['linkURL'])) : "";
        if(strpos($linkURL,'http://')===false){
            $linkURL= 'http://'.$linkURL;
        }
        $header_link = ($instance['header_link'])? esc_attr(strip_tags($instance['header_link'])):"false";

        $fm_url;
        $useLink; //bool to determine whether or not to use a link

        //wp_enqueue_style("featureme-css", plugins_url("feature-me") . "/featureme.css");

        ?>
        <article class="feature-me <?php echo $class; ?>">
            <?php echo $before_widget;

            $the_feature = new WP_QUERY(array('p' => $feature, 'post_type' => array('post', 'page', 'company', 'events', 'markets', 'news', 'partners', 'products', 'resources', 'services', 'unified_experience', 'management_and_board', 'news', 'events'), 'posts_per_page' => '1'));

            while ($the_feature->have_posts()):$the_feature->the_post();

                //Heading Title Output
                switch (true) {
                    //Default Title
                    case ($type == "default"):
                        //Generate link for header
                        if($header_link=="true"){
                            //Generate default link via permalink
                            if($type_url=="default"){
                                echo $before_title.'<a href="'.get_permalink().'"\>'.the_title('','',false).'</a>'.$after_title;
                            }
                            //Generate custom link via text linkURL field
                            else{
                                echo $before_title.'<a href="'.$linkURL.'">'.$title.'</a>'.$after_title;
                            }
                        }
                        else{
                            echo $before_title.$title.$after_title;
                        }
                        break;

                    case ($type == "custom")://Custom Title
                        //Generate Link for Header
                        if($header_link=="true"){
                            //Generate default link via permalink
                            if($type_url=="default"){
                                echo $before_title.'<a href="'.get_permalink().'"\>'.$title.'</a>'.$after_title;
                            }
                            //Generate custom link via text linkURL field
                            else{
                                echo $before_title.'<a href="'.$linkURL.'">'.$title.'</a>'.$after_title;
                            }
                        }else{
                            echo $before_title . $title . $after_title;
                        }
                        break;

                    //No Title
                    case ($type == "none"):
                        break;
                }

                echo $before_details;

                if ($use_image == 't') { ?>
                    <a href="<?php if($type_url=="default"){ the_permalink();} else{ echo $linkURL;} ?>" title="<?php
                    echo
                    $title;
                    ?>">
                    <?php the_post_thumbnail($instance->thumb_size, array('class' => 'featureme-thumb')); } ?></a>

                <?php

                echo $before_excerpt;

                ?>

                <a href="<?php if($type_url=="default"){ the_permalink();} else{ echo $linkURL;} ?>" title="<?php
                echo
                $title;
                ?>">

                <?php

                switch ($copy) {
                    case 'excerpt':
                        the_excerpt();
                        break;
                    case 'custom':
                        echo "<p>".$body."</p>";
                        break;
                    case 'none':
                        break;
                }

                ?>

                </a>

                <?php

                echo $after_excerpt;

                if($type_link != "none"): ?>
                <a href="<?php if($type_url=="default"){ the_permalink();} else{ echo $linkURL;} ?>"
                      class="feature-me-link fmBtn"><?php echo $before_link; ?><?php echo $linkText; ?><?php echo $after_link; ?></a>

                <?php echo $after_details; ?>
        <?php
            endif;
            endwhile;
            wp_reset_query();
            ?>
            <?php echo $after_widget; ?>

            <a href="<?php if($type_url=="default"){ the_permalink();} else{ echo $linkURL;} ?>" title="<?php
                echo
                $title;
                ?>">
            <?php echo $after_li; ?>
            </a>
        </article>

    <?php
    } //end widget

    /**
     * 1.2 - form
     * Admin form code
     *
     * @param array $instance
     *
     * @return string|void
     */
    public function form($instance)
    {
        $featured_id = $instance['feature'];
        //var_dump($instance);

        echo $this->generateCSS(); //generate CSS to page
        /**
         * @todo enqueue css
         */
        ?>
        <script>
            jQuery(document).ready(function($){

                fm_listen('widget-<?php echo $this->id; ?>');

                $('.fm_widget').on('click',function(){
                    //console.log($(this).attr('id'));
                    var id = "widget-"+$(this).attr('id');
                    fm_listen(id);
                });

            });
        </script>

        <div class="fm_widget" id="<?php echo $this->id; ?>">
        <h3 class="title">1. Select a Post or Page</h3>
        <p>
            <label for="<?php echo $this->get_field_id('feature'); ?>"><strong class="description">Select a Page or Post
                    to feature:</strong><br/></label>
            <select name="<?php echo $this->get_field_name('feature'); ?>" class="feature-me-select"
                    style="width:100%;" id="<?php echo $this->get_field_id('feature') ?>">

                <option selected="selected" value="<?php echo esc_attr($instance['feature']); ?>"><?php
                    $selected_feature = new WP_QUERY(array('p' => $featured_id, 'post_type' => array('post', 'page', 'company', 'events', 'markets', 'news', 'partners', 'products', 'resources', 'services', 'unified_experience', 'management_and_board', 'news', 'events'), 'posts_per_page' => '1'));
                    while ($selected_feature->have_posts()): $selected_feature->the_post();
                        echo the_title();
                        if ($instance['type'] == "default") {
                            $instance['title'] = the_title('', '', false);
                        }

                    endwhile;
                    wp_reset_query();?></option>

                <optgroup label="Pages">
                    <?php

                    //PAGES

                    $feature_list_pages = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'page'));
                    while ($feature_list_pages->have_posts()): $feature_list_pages->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>

                <optgroup label="Unified Experience">
                    <?php

                    // UNIFIED EXPERIENCE

                    $feature_list_pages = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'unified_experience'));
                    while ($feature_list_pages->have_posts()): $feature_list_pages->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>

                <optgroup label="Products">
                    <?php

                    // PRODUCTS

                    $feature_list_pages = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'products'));
                    while ($feature_list_pages->have_posts()): $feature_list_pages->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>

                <optgroup label="Markets">
                    <?php

                    // MARKETS

                    $feature_list_pages = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'markets'));
                    while ($feature_list_pages->have_posts()): $feature_list_pages->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>

                <optgroup label="Services">
                    <?php

                    // SERVICES

                    $feature_list_pages = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'services'));
                    while ($feature_list_pages->have_posts()): $feature_list_pages->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>

                <optgroup label="Resources">
                    <?php

                    // RESOURCES

                    $feature_list_pages = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'resources'));
                    while ($feature_list_pages->have_posts()): $feature_list_pages->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>

                <optgroup label="Partners">
                    <?php

                    // PARTNERS

                    $feature_list_pages = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'management_and_board'));
                    while ($feature_list_pages->have_posts()): $feature_list_pages->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>

                <optgroup label="Company">
                    <?php

                    // COMPANY

                    $feature_list_pages = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'company'));
                    while ($feature_list_pages->have_posts()): $feature_list_pages->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>

                <optgroup label="Posts">
                    <?php

                    // POSTS

                    $feature_list_posts = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'post'));

                    while ($feature_list_posts->have_posts()): $feature_list_posts->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>

                <optgroup label="News">
                    <?php

                    // NEWS

                    $feature_list_posts = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'news'));

                    while ($feature_list_posts->have_posts()): $feature_list_posts->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>

                <optgroup label="Events">
                    <?php

                    // EVENTS

                    $feature_list_posts = new WP_QUERY(array('posts_per_page' => '-1', 'orderby' => 'title', 'order' => 'ASC', 'post_type' => 'events'));

                    while ($feature_list_posts->have_posts()): $feature_list_posts->the_post();
                        ?>

                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </optgroup>
            </select>
        </p>
        <div class="divide">&nbsp;</div>

        <h3 class="title">2. Choose Content Options</h3>
        <h4 class="title">Heading Title</h4>
        <p><input type="radio" name="<?php echo $this->get_field_name('type'); ?>" value="default"
                  class="<?php echo $this->get_field_id('type'); ?>"
                  id="<?php echo $this->get_field_id('type'); ?>_1" <?php if ($instance['type'] == "default" || $instance['type'] == "") { ?> checked="checked" <?php } ?>  />
            <label for="<?php echo $this->get_field_id('type'); ?>_1">Default Title</label>
            &nbsp;
            <!--No Title-->
            <input type="radio" name="<?php echo $this->get_field_name('type'); ?>" value="none"
                   class="<?php echo $this->get_field_id('type'); ?>"
                   id="<?php echo $this->get_field_id('type'); ?>_2" <?php if ($instance['type'] == "none") { ?> checked="checked" <?php } ?>  />
            <label for="<?php echo $this->get_field_id('type'); ?>_2">Hide Title</label>
            <!--/No Title-->
            &nbsp;
            <!--Custom-->
            <input type="radio" name="<?php echo $this->get_field_name('type'); ?>" value="custom"
                   class="<?php echo $this->get_field_id('type'); ?>"
                   id="<?php echo $this->get_field_id('type'); ?>_3" <?php if ($instance['type'] == "custom") { ?> checked="checked" <?php } ?>  />
            <label for="<?php echo $this->get_field_id('type'); ?>_3">Custom</label>
            <!--/Custom Title-->
        </p>

        <!--Custom Title Field-->
        <div id="<?php echo $this->get_field_id('title'); ?>">
            <p><input type="text" placeholder="Enter a title." id="<?php echo $this->get_field_id('title'); ?>"
                      name="<?php echo $this->get_field_name('title'); ?>"
                      value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;"/>
            </p>
        </div>
        <!--/Custom Title Field-->


        <div class="divide">&nbsp;</div>

        <h4 class="title">Body Copy</h4>

        <p>
            <!--Default Body-->
            <input type="radio" class="<?php echo $this->get_field_id('copy'); ?>"
                   id="<?php echo $this->get_field_id('copy'); ?>_1" value="excerpt"
                   name="<?php echo $this->get_field_name('copy'); ?>"
                   <?php if (esc_attr($instance['copy']) == 'excerpt' || esc_attr($instance['copy']) == ''){
                   ?>checked="checked"<?php } ?>  />
            <label for="<?php echo $this->get_field_id('copy'); ?>_1">Default
                <small>(Excerpt)</small>
            </label>
            <!--/Default Body-->
            &nbsp;
            <!--No Body-->
            <input type="radio" class="<?php echo $this->get_field_id('copy'); ?>"
                   id="<?php echo $this->get_field_id('copy'); ?>_2" value="none"
                   name="<?php echo $this->get_field_name('copy'); ?>"
                   <?php if (esc_attr($instance['copy']) == 'none'){ ?>checked="checked"<?php } ?>  />
            <label for="<?php echo $this->get_field_id('copy'); ?>_2">Hide</label>
            <!--/No Body-->
            &nbsp;
            <!--Custom Body-->
            <input type="radio" class="<?php echo $this->get_field_id('copy'); ?>"
                   id="<?php echo $this->get_field_id('copy'); ?>_3" value="custom"
                   name="<?php echo $this->get_field_name('copy'); ?>"
                   <?php if (esc_attr($instance['copy']) == 'custom'){ ?>checked="checked"<?php } ?>  />
            <label for="<?php echo $this->get_field_id('copy'); ?>_3">Custom</label>
            <!--/Custom Body-->
        </p>

        <div id="<?php echo $this->get_field_id('body'); ?>">
            <p><textarea id="<?php echo $this->get_field_id('body'); ?>"
                         name="<?php echo $this->get_field_name('body'); ?>"
                         style="width:100%;"
                         placeholder="Customize your content."><?php echo
                    esc_attr($instance['body']); ?></textarea></p>
        </div>


        <div class="divide">&nbsp;</div>

        <h3 class="title">3. Choose Image Options</h3>
        <h4 class="title">Featured Image</h4>
        <p><input type="radio" id="<?php echo $this->get_field_id('use_image'); ?>_1"
                  name="<?php echo $this->get_field_name('use_image'); ?>"
                  value="t" <?php if ($instance['use_image'] == 't' || $instance['use_image'] == '') { ?> checked="checked" <?php } ?>  />
            <label
                for="<?php echo $this->get_field_id('use_image'); ?>_1">On
                <small>(default)</small>
            </label>
            &nbsp;<input type="radio" id="<?php echo $this->get_field_id('use_image'); ?>_2"
                         name="<?php echo $this->get_field_name('use_image'); ?>"
                         value="f" <?php if ($instance['use_image'] == 'f') { ?> checked="checked" <?php } ?>  /> <label
                for="<?php echo $this->get_field_id('use_image'); ?>_2">Off</label></p>
        <!--<div class="<?php echo $this->get_field_id('image_preview') ?>"><?php echo get_the_post_thumbnail( $instance['feature'], array(150, 226)); ?> </div>
-->

        <div class="divide">&nbsp;</div>
        <h3 class="title">4. Customize CTA Link Options</h3>
        <h4 class="title">CTA Link Title
            <small class="description">Default is "Learn More"</small>
        </h4>
        <!--Link Title Options-->
        <p>
            <!--Default Link Title-->
            <input type="radio" name="<?php echo $this->get_field_name('type_link'); ?>" value="default"
                   class="<?php echo $this->get_field_id('type_link'); ?>"
                   id="<?php echo $this->get_field_id('type_link'); ?>_1" <?php if ($instance['type_link'] == "default" || $instance['type_link'] == "") { ?> checked="checked" <?php } ?>  />
            <label for="<?php echo $this->get_field_id('type_link'); ?>_1">Default</label>
            <!--/Default Link Title-->
            &nbsp;
            <!--No Link Title-->
            <input type="radio" name="<?php echo $this->get_field_name('type_link'); ?>" value="none"
                   class="<?php echo $this->get_field_id('type_link'); ?>"
                   id="<?php echo $this->get_field_id('type_link'); ?>_2" <?php if ($instance['type_link'] == "none") { ?> checked="checked" <?php } ?>  />
            <label for="<?php echo $this->get_field_id('type_link'); ?>_2">Hide</label>
            <!--/No Link Title-->
            &nbsp;
            <!--Custom Link Title-->
            <input type="radio" name="<?php echo $this->get_field_name('type_link'); ?>" value="custom"
                   class="<?php echo $this->get_field_id('type_link'); ?>"
                   id="<?php echo $this->get_field_id('type_link'); ?>_3" <?php if ($instance['type_link'] == "custom") { ?> checked="checked" <?php } ?>  />
            <label for="<?php echo $this->get_field_id('type_link'); ?>_3">Custom</label>
            <!--/Custom Link Title-->
        </p>

        <p><input type="text" name="<?php echo $this->get_field_name('linkText'); ?>"
                  id="<?php echo $this->get_field_id('linkText'); ?>"
                  value="<?php echo esc_attr($instance['linkText']); ?>" placeholder="Read More!, Act Now!"
                  style="width:100%;"/></p>
        <!--/Link Title Options-->

        <div class="divide">&nbsp;</div>

        <h4 class="title">Link Customization
            <small class="description">Default is Post/Page URL.</small>
        </h4>
        <!--URL Options-->
        <p>
            <!--Default URL-->
            <input type="radio" name="<?php echo $this->get_field_name('type_url'); ?>" value="default"
                   class="<?php echo $this->get_field_id('type_url'); ?>"
                   id="<?php echo $this->get_field_id('type_url'); ?>_1" <?php if ($instance['type_url'] == "default" || $instance['type_url'] == "") { ?> checked="checked" <?php } ?>  />
            <label for="<?php echo $this->get_field_id('type_url'); ?>_1">Default</label>
            <!--/Default URL-->
            &nbsp;
            <!--Custom Link Title-->
            <input type="radio" name="<?php echo $this->get_field_name('type_url'); ?>" value="custom"
                   class="<?php echo $this->get_field_id('type_url'); ?>"
                   id="<?php echo $this->get_field_id('type_url'); ?>_3" <?php if ($instance['type_url'] == "custom") { ?> checked="checked" <?php } ?>  />
            <label for="<?php echo $this->get_field_id('type_url'); ?>_3">Custom</label>
            <!--/Custom Link Title-->
        </p>

        <p><input type="text" name="<?php echo $this->get_field_name('linkURL'); ?>"
                  id="<?php echo $this->get_field_id('linkURL'); ?>"
                  class="linkURL"
                  value="<?php echo esc_attr($instance['linkURL']); ?>"
                  placeholder="http://example.com, example.com, /"
                  style="width:100%;" /></p>
        <!--/Link Title Options-->

        <div class="divide">&nbsp;</div>
        <!--Link Heading-->
        <h4 class="title">Make the Heading Title a Link?</h4>

        <p><input type="radio" name="<?php echo $this->get_field_name('header_link'); ?>" value="true"
                  class="<?php echo $this->get_field_id('header_link'); ?>"
                  id="<?php echo $this->get_field_id('header_link'); ?>_1" <?php if ($instance['header_link'] == "true" || $instance['header_link'] == "") { ?> checked="checked" <?php } ?>  />
            <label for="<?php echo $this->get_field_id('header_link'); ?>_1">Yes</label>
            &nbsp;
            <input type="radio" name="<?php echo $this->get_field_name('header_link'); ?>" value="false"
                   class="<?php echo $this->get_field_id('header_link'); ?>"
                   id="<?php echo $this->get_field_id('header_link'); ?>_2" <?php if ($instance['header_link'] == "false") { ?> checked="checked" <?php } ?>  />
            <label for="<?php echo $this->get_field_id('header_link'); ?>_2">No</label></p>
        <!--/Link Heading-->

        <div class="divide">&nbsp;</div>

        <h3 class="title">Advanced</h3>
        <p><label for="<?php echo $this->get_field_id('class'); ?>"><strong>Custom CSS class:</strong><br/>
                <small>You can add a CSS class to add custom styling</small>
            </label>
            <input type="text" name="<?php echo $this->get_field_name('class'); ?>"
                   value="<?php echo esc_attr($instance['class']); ?>" style="width:100%;"/>
        </p>

        <div class="divide">&nbsp;</div>

        <p><strong>Like this plugin?</strong><br/>
            How about a small donation?</p>
        <p align="center" style="margin-bottom:50px;">
            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3W7QBVPH6V7HW"
               target="_blank"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"
                                    alt="PayPal - The safer, easier way to pay online!"/></a></p>
        <p>If you like Feature Me, <a href=\"http://wordpress.org/support/view/plugin-reviews/feature-me\">please rate it.</a></p>


        </div><!--/fm_widget-->
    <?php
    } //form

    /**
     * 1.3 - generateCSS
     * Adds CSS to page for widgets
     *
     * @todo enqueue css so it doesn't duplicate each time.
     * @return string
     */
    private function generateCSS()
    {
        $id = $this->id;
        $css = <<<EOD
            <style>
			.divide{
				/*border-bottom:1px solid #7de0ff;*/
				border-bottom:1px dotted #ccc;
				box-shadow:0 1px 0 #fff;
				width:100%;
				height:1px;
				margin:20px 0 20px 0;
			}

			a img{
				border:none;
			}
			.$id-options{
			    /*display:none;*/
			    width:80%;
                margin:-10px auto 0 auto;
			}
		</style>
EOD;
        return $css;
    }

} //featureme