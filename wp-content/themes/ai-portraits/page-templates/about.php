<?php
/*
Template Name: About Page
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Learn about our AI-generated portrait collection, the technology behind digital art creation, and the artistic vision driving this innovative gallery.">
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
        <article class="blog-post">
            <h1>About Our AI Portrait Collection</h1>
            
            <div class="blog-post-content">
                <p>Welcome to our curated collection of AI-generated portrait art, where technology meets creativity to produce stunning visual representations of human beauty and emotion. Each portrait in our gallery represents the intersection of artificial intelligence and artistic vision, created using cutting-edge machine learning models trained on vast datasets of artistic masterworks.</p>
                
                <h2>The Art of AI Generation</h2>
                <p>Our portraits are generated using state-of-the-art artificial intelligence models, including Stable Diffusion, DALL-E, and Midjourney. These sophisticated systems analyze millions of artistic works to understand composition, lighting, color theory, and human anatomy, allowing them to create original portraits that capture both technical excellence and emotional depth.</p>
                
                <p>Each image undergoes a careful curation process where we select only the most compelling and aesthetically pleasing results. We focus on portraits that demonstrate:</p>
                
                <ul>
                    <li><strong>Technical Excellence:</strong> Proper proportions, realistic lighting, and high-quality rendering</li>
                    <li><strong>Artistic Merit:</strong> Compelling composition, interesting use of color, and emotional resonance</li>
                    <li><strong>Uniqueness:</strong> Each portrait offers a distinct personality and visual story</li>
                    <li><strong>Cultural Sensitivity:</strong> Respectful representation that celebrates human diversity</li>
                </ul>
                
                <h2>Our Creative Process</h2>
                <p>The creation process begins with carefully crafted prompts that specify artistic style, mood, composition, and aesthetic preferences. We experiment with various parameters including:</p>
                
                <ul>
                    <li>Artistic styles ranging from classical realism to contemporary digital art</li>
                    <li>Lighting conditions that enhance mood and drama</li>
                    <li>Color palettes that evoke specific emotions</li>
                    <li>Composition techniques that draw the viewer's attention</li>
                </ul>
                
                <p>Each generated portrait is then evaluated for quality, uniqueness, and artistic value before being added to our collection. We provide detailed metadata for each piece, including the AI model used, generation parameters, and artistic interpretation.</p>
                
                <h2>Technology and Innovation</h2>
                <p>The portraits in our collection represent the current state of AI art generation technology. We utilize multiple AI platforms to ensure diversity in style and approach:</p>
                
                <ul>
                    <li><strong>Stable Diffusion:</strong> For detailed, customizable portrait generation with fine control over artistic parameters</li>
                    <li><strong>DALL-E:</strong> For creative interpretations and unique artistic perspectives</li>
                    <li><strong>Midjourney:</strong> For stylized and emotionally evocative portrait art</li>
                    <li><strong>Custom Models:</strong> Fine-tuned models specialized for portrait generation</li>
                </ul>
                
                <h2>Artistic Philosophy</h2>
                <p>We believe that AI-generated art represents a new frontier in creative expression. While these portraits are created by machines, they are guided by human creativity, aesthetic judgment, and artistic vision. Each piece in our collection has been selected not just for technical quality, but for its ability to evoke emotion and capture the essence of human beauty in its many forms.</p>
                
                <p>Our collection celebrates diversity, featuring portraits that represent different ethnicities, ages, expressions, and artistic styles. We are committed to showcasing the full spectrum of human beauty while maintaining the highest standards of artistic and ethical integrity.</p>
                
                <h2>The Future of Digital Art</h2>
                <p>As AI technology continues to evolve, we are excited to explore new possibilities in digital portrait creation. We regularly update our collection with new pieces that showcase the latest developments in AI art generation, ensuring that our gallery remains at the forefront of this rapidly advancing field.</p>
                
                <p>We invite you to explore our collection and witness the remarkable capabilities of AI-assisted creativity. Each portrait tells a story, captures a moment, and represents the endless possibilities that emerge when human creativity collaborates with artificial intelligence.</p>
                
                <h2>Contact and Collaboration</h2>
                <p>We are always interested in connecting with artists, technologists, and art enthusiasts who share our passion for AI-generated art. Whether you're interested in learning more about our process, discussing the future of digital art, or exploring potential collaborations, we welcome your engagement with our growing community.</p>
                
                <p>Thank you for visiting our AI portrait collection. We hope these images inspire you and provide a glimpse into the exciting future of digital creativity.</p>
            </div>
        </article>
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