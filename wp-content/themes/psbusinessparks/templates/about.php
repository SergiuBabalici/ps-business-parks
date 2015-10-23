<?php
/**
 * Template Name: About
 *
 * @package WordPress
 * @subpackage PSBusinessParks
 * @since PSBusinessParks 1.0
 */

get_header();

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>
<div class="page-container about">
    <section class="page-path">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <p><a href="<?=home_url()?>">Home</a> / <b>About</b></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-image" style="background-image: url('<?=$image[0]?>');"></section>
    <section class="greyed">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 full-width-text">
                        <h2><?=get_field('front_title', $post->ID)?></h2>
                        <p><?=$post->post_content?></p>

                        <button type="button" class="btn red-btn"><?=get_field('button_title', $post->ID)?></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table equal-height-cells">
                            <div class="table-row">

                                <?php
                                $i=1;
                                foreach ( get_field( 'options', $post->ID ) as $key => $value ){
                                    ?>
                                    <div class="table-cell column greyed text-center">
                                        <div class="column-body">
                                            <div class="amenity-image">
                                                <img src="<?=$value['icon']?>">
                                            </div>
                                            <h3><?=$value['title']?></h3>
                                            <p><?=$value['description']?></p>
                                        </div>
                                    </div>
                                    <?php
                                    if ( ( $i % 3 ) != 0 ){
                                        ?>
                                        <div class="table-cell empty-cell">&nbsp;</div>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        </div>
                                        <div class="table-row">
                                            <div class="table-cell empty-cell"></div>
                                            <div class="table-cell empty-cell"></div>
                                            <div class="table-cell empty-cell"></div>
                                            <div class="table-cell empty-cell"></div>
                                            <div class="table-cell empty-cell"></div>
                                        </div>
                                        <div class="table-row">
                                        <?php
                                        $i=0;
                                    }
                                    $i++;
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include ( "inc/blocks/testimonials.php" );
?>
</div>

<?php
get_footer();
?>