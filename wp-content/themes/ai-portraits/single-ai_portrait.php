<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <?php if (function_exists('the_custom_logo')) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            </h1>
            <?php if (get_bloginfo('description')) : ?>
                <p class="site-description"><?php bloginfo('description'); ?></p>
            <?php endif; ?>
        <?php endif; ?>
        
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => 'ai_portraits_fallback_menu'
            ));
            ?>
        </nav>
    </div>
</header>

<main class="main-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="portrait-container">
                
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('portrait-large'); ?>" 
                         alt="<?php the_title_attribute(); ?>" 
                         class="portrait-image">
                <?php endif; ?>
                
                <h1 class="portrait-title"><?php the_title(); ?></h1>
                
                <?php if (get_the_content()) : ?>
                    <div class="portrait-description">
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>
                
                <div class="portrait-meta">
                    <h3>Portrait Details</h3>
                    <div class="meta-grid">
                        
                        <?php $style_description = get_post_meta(get_the_ID(), '_style_description', true); ?>
                        <?php if ($style_description) : ?>
                            <div class="meta-item">
                                <span class="meta-label">Artistic Style:</span>
                                <span class="meta-value"><?php echo esc_html($style_description); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php $mood = get_post_meta(get_the_ID(), '_mood', true); ?>
                        <?php if ($mood) : ?>
                            <div class="meta-item">
                                <span class="meta-label">Mood/Emotion:</span>
                                <span class="meta-value"><?php echo esc_html($mood); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php $ai_model = get_post_meta(get_the_ID(), '_ai_model', true); ?>
                        <?php if ($ai_model) : ?>
                            <div class="meta-item">
                                <span class="meta-label">AI Model:</span>
                                <span class="meta-value"><?php echo esc_html($ai_model); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php $generation_date = get_post_meta(get_the_ID(), '_generation_date', true); ?>
                        <?php if ($generation_date) : ?>
                            <div class="meta-item">
                                <span class="meta-label">Generated:</span>
                                <span class="meta-value"><?php echo esc_html(date('F j, Y', strtotime($generation_date))); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php $technique = get_post_meta(get_the_ID(), '_technique', true); ?>
                        <?php if ($technique) : ?>
                            <div class="meta-item technique-full">
                                <span class="meta-label">Technique/Parameters:</span>
                                <span class="meta-value"><?php echo esc_html($technique); ?></span>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                </div>
                
                <?php echo get_portrait_navigation(); ?>
                
            </article>
            
            <div class="related-portraits">
                <h3>More AI Portraits</h3>
                <div class="portrait-grid">
                    <?php
                    $related_portraits = new WP_Query(array(
                        'post_type' => 'ai_portrait',
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'rand'
                    ));
                    
                    while ($related_portraits->have_posts()) : $related_portraits->the_post();
                    ?>
                        <article class="portrait-card">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('portrait-medium'); ?>
                                <?php endif; ?>
                                <div class="portrait-card-content">
                                    <h4 class="portrait-card-title"><?php the_title(); ?></h4>
                                    <div class="portrait-card-excerpt">
                                        <?php 
                                        $style_description = get_post_meta(get_the_ID(), '_style_description', true);
                                        if ($style_description) {
                                            echo esc_html(wp_trim_words($style_description, 10));
                                        }
                                        ?>
                                    </div>
                                </div>
                            </a>
                        </article>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            
        <?php endwhile; ?>
    </div>
</main>

<footer class="site-footer">
    <div class="container">
        <nav class="footer-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'container' => false,
                'fallback_cb' => false
            ));
            ?>
        </nav>
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

<style>
.technique-full {
    grid-column: 1 / -1;
}

.related-portraits {
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid #ecf0f1;
}

.related-portraits h3 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 2rem;
    font-size: 1.5rem;
}
</style>