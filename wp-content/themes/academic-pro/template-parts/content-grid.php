<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="course-selection clear">
        <div class="pull-left no-of-courses">
            <?php  
            if( is_singular() )
                return;

            global $wp_query;

            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
            ?>
            <span><?php esc_html_e( 'Showing', 'academic-pro' ); ?></span><span><?php echo absint( $paged ) . ' - ' . absint( $wp_query->max_num_pages ); ?></span>of<span><?php echo absint( $wp_query->found_posts ); ?> <?php esc_html_e( 'Results', 'academic-pro' ); ?></span>
        </div><!-- end .pull-left -->

        <div class="pull-right course-category">
            <div class="pull-left">
                <select id="grid-cat">
                    <?php 
                    $cat_id = get_query_var( 'cat' ); 
                    $category = get_category( $cat_id );
                    $cat_slug = $category->slug;
                    ?>
                    <option value="<?php echo $cat_slug; ?>" >Select category</option>
                    <?php
                    $options = academic_pro_get_theme_options();
                    $archive_grid_cat = ! empty( $options['archive_grid_category'] ) ? $options['archive_grid_category'] : '';
                    foreach ( $archive_grid_cat as $archive_grid_category ) {
                        $archive_category = get_category( $archive_grid_category );
                        $output = '<option value="' . $archive_category->slug . '" ';
                        $output .= ( get_query_var( 'cat' ) == $archive_category->term_id ) ? 'selected' : '';
                        $output .= '>' . $archive_category->name . '</option>';
                        echo $output;
                    }
                    ?>
                </select>
            </div><!-- end .pul-left -->

            <div class="pull-left">
                <ul class="tabs">
                    <?php $options = academic_pro_get_theme_options(); ?>
                    <li class="tab-link <?php echo ( $options['archive_grid_layout'] == 'list' ) ? 'active' : ''; ?>" data-tab="tab-1">
                        <i class="fa fa-th-list"></i>
                    </li>
                    <li class="tab-link <?php echo ( $options['archive_grid_layout'] == 'grid' ) ? 'active' : ''; ?>" data-tab="tab-2">
                        <i class="fa fa-th-large"></i>
                    </li>
                </ul><!-- end .tabs -->
            </div><!-- end .pul-left -->
        </div><!-- end .pull-right -->
    </div><!-- end .course-selection -->

    <div class="courses-list three-col">
        <div id="tab-1" class="tab-content row list-view <?php echo ( $options['archive_grid_layout'] == 'list' ) ? 'active' : ''; ?>">
            <div class="row">
                <?php 
                while( have_posts() ) : the_post(); ?>
                    <div class="column-wrapper">
                        <div class="course-item">   
                            <div class="image-wrapper"> 
                                <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( $size = 'academic-pro-category-image', array( 'alt' => get_the_title() ) ); ?>
                                </a>
                                <?php else :
                                    echo '<a href="' . esc_url( get_the_permalink() ) . '"><img src="' . get_template_directory_uri() . '/assets/uploads/no-featured-image-450x338.png"></a>';
                                endif; ?>
                            </div><!-- end .image-wrapper -->
                            <div class="course-contents-wrapper">
                                <div class="category-name">
                                    <span><?php the_category( ' / '); ?></span>
                                </div><!-- end .posted-on -->
                                <div class="slide-title">
                                    <h3><a href="<?php the_permalink(); ?>" class="color-black"><?php the_title(); ?></a></h3>
                                </div><!-- end .slide-title -->
                                <div class="slide-footer-content clear">
                                    <div class="pull-left">
                                        <div class="comments"><i class="fa fa-comment"></i><?php echo absint( get_comments_number() ); ?></div>
                                        <div class="users"><i class="fa fa-user"></i><?php echo absint( academic_pro_get_post_views( get_the_id() ) );?></div>
                                    </div><!-- end .pull-left -->
                                </div><!-- end .slide-description -->
                            </div><!-- end .course-contents-wrapper -->
                        </div><!-- end .course-item -->
                    </div><!-- end .column-wrapper -->
                <?php endwhile; ?>

            </div><!-- end .row -->
        </div><!-- end #tab-1 -->

        <div id="tab-2" class="tab-content row <?php echo ( $options['archive_grid_layout'] == 'grid' ) ? 'active' : ''; ?>">
            <div class="row">
                <?php 
                $i = 1; $j=1;
                $count_value = get_queried_object();
                $count = $count_value->count;
                while( have_posts() ) : the_post(); ?>
                    <div class="column-wrapper">
                        <div class="course-item">    
                            <div class="image-wrapper"> 
                                <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( $size = 'academic-pro-category-image', array( 'alt' => get_the_title() ) ); ?>
                                </a>
                                <?php else :
                                    echo '<a href="' . esc_url( get_the_permalink() ) . '"><img src="' . get_template_directory_uri() . '/assets/uploads/no-featured-image-450x338.png"></a>';
                                endif; ?>
                            </div><!-- end .image-wrapper -->
                            <div class="course-contents-wrapper">
                                <div class="category-name">
                                    <span><?php the_category( ' / ' ); ?></span>
                                </div><!-- end .posted-on -->
                                <div class="slide-title">
                                    <h3><a href="<?php the_permalink(); ?>" class="color-black"><?php the_title(); ?></a></h3>
                                </div><!-- end .slide-title -->
                                <div class="slide-footer-content clear">
                                    <div class="pull-left">
                                        <div class="comments"><i class="fa fa-comment"></i><?php echo absint( get_comments_number() ); ?></div>
                                        <div class="users"><i class="fa fa-user"></i><?php echo absint( academic_pro_get_post_views( get_the_id() ) );?></div>
                                    </div><!-- end .pull-left -->
                                </div><!-- end .slide-description -->
                            </div><!-- end .course-contents-wrapper -->
                        </div><!-- end .course-item -->
                    </div><!-- end .column-wrapper -->
                    <?php 
                    if ( ( $i % 3 == 0 ) && ( $j != $count ) ): ?>
                        </div><!-- end .row -->
                        <div class="row">
                    <?php endif; $i++; $j++; 
                endwhile; ?>
            </div><!-- end .row -->
        </div><!-- end #tab-2 -->
    </div><!-- end .courses-list -->

</article><!-- #post-## -->
<script type="text/javascript">
    jQuery( 'select#grid-cat' ).change( function(){
    var cat_slug = this.value;

    function getBaseURL() {
        var url = location.href;  // entire url including querystring - also: window.location.href;
        var baseURL = url.substring(0, url.indexOf('/', 14));


        if (baseURL.indexOf('http://localhost') != -1) {
            // Base Url for localhost
            var url = location.href;  // window.location.href;
            var pathname = location.pathname;  // window.location.pathname;
            var index1 = url.indexOf(pathname);
            var index2 = url.indexOf("/", index1 + 1);
            var baseLocalUrl = url.substr(0, index2);

            return baseLocalUrl + '/category/' + cat_slug;
        } else {
            // Root Url for domain name
            return baseURL + '/category/' + cat_slug;
        }

    }

    // url location
    location.replace( getBaseURL() );

    });
</script>