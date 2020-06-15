<?php global $alpas_opt;
/**
 * Post Format: Chat
 * @package Alpas
 */

if ( isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] == 1 ) {
    $blogimg_size = "alpas_single_thumb";
}elseif ( isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] == 2 ) {
    $blogimg_size = "alpas_single_thumb";
}else {
    $blogimg_size = "full";
} ?>
<div <?php post_class(); ?>>
    <div class="single-blog-post">
        <?php if(has_post_thumbnail()) { ?>
            <div class="entry-thumbnail">
                <a href="<?php the_permalink() ?>">
                    <img src="<?php the_post_thumbnail_url($blogimg_size) ?>" alt="<?php echo esc_attr__('blog image', 'alpas')?>">
                </a>
            </div>
        <?php } ?>

        <div class="post-content">
            <div class="post_type_icon">
                <i class="fa fa-comments"></i>
            </div>
            <ul class="entry-meta">
                <li>
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ) ?>">
                        <?php the_author() ?>
                    </a>
                </li>
                <li>
                    <?php echo esc_html(get_the_date('F d, Y')) ?>
                </li>
                <li>
                    <?php comments_number(); ?>
                </li>
            </ul>

            <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

            <?php the_excerpt() ?>
            
            <a href="<?php the_permalink() ?>" class="read-more-btn">
                <?php if(isset($alpas_opt['post_read_more'] ) && !$alpas_opt['post_read_more'] == ''){ echo esc_html($alpas_opt['post_read_more']); }else{ echo esc_html__('Read More','alpas'); } ?>
                <i class="flaticon-add-1"></i>
            </a>
        </div>
    </div>
</div>
