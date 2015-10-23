<?php
/**
 * Template Name: Customer center
 *
 * @package WordPress
 * @subpackage PSBusinessParks
 * @since PSBusinessParks 1.0
 */

get_header();

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>

<div class="page-container customer-center">
    <section class="page-path">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <p><a href="<?=home_url()?>">Home</a> / <b>Customer center</b></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-image" style="background-image: url('<?=$image[0]?>');"></section>
    <section class="page-split2 greyed">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-8">
                        <h1><?=get_field( 'title_customer_feedback', $post->ID )?></h1>
                        <p><?=get_field( 'description_customer_feedback', $post->ID )?></p>
                    </div>

                    <div class="col-xs-4">
                        <div class="call-us text-center">
                            <p><b>CALL US TODAY</b><strong><?=get_field( 'phone', $post->ID )?></strong></p>
                            <button type="button" class="btn red-btn">Email us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="customer-actions">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    foreach ( get_field( "blue_blocks", $post->ID ) as $value ) {
                        ?>
                        <div class="col-xs-12 col-sm-4">
                            <a href="<?=$value['url']?>" class="columns text-center">
                                <div class="amenity-image">
                                    <img src="<?=$value['icon']?>" alt="">
                                </div>
                                <p><?=$value['title']?> <span class="icon-chevron-right"></span></p>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <h2><?=get_field( 'title', $post->ID )?></h2>
                        <p><?=get_field( 'description', $post->ID )?></p>
                        <div class="downloadable">
                            <div class="table">
                                <?php
                                foreach ( get_field( "files", $post->ID ) as $value ) {
                                    ?>
                                    <div class="table-row">
                                        <div class="table-cell">
                                            <a href="<?=$value['file']?>" target="_blank" class="table-cell"><img src="<?=get_template_directory_uri()?>/images/download.png" alt=""></a>
                                        </div>
                                        <div class="table-cell">
                                            <a href="<?=$value['file']?>" target="_blank" class="cyaned"><b><?=$value['title']?></b></a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <h2><?=get_field( "title_insurance_programs", $post->ID )?></h2>
                        <?=get_field( "description_insurance_programs", $post->ID )?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="refer greyed">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <div class="full-width-text">
                            <h2><?=get_field( "title_refer_and_earn_cash", $post->ID )?></h2>
                            <p><?=get_field( "description_refer_and_earn_cash", $post->ID )?></p>
                            <button type="button" class="btn red-btn">refer now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
?>