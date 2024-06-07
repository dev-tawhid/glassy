<?php get_header();?>

       <!-- Body start  -->


       <div class="hero-section">
            <img class="mw-100" src="<?php echo get_template_directory_uri()?>/img/hero.jpg" alt="">
       </div>


       <!-- Article Section  -->


       <div class="article-section py-5">
        <div class="container">

        <h2 class="mb-3 text-center">Blog Posts</h2>

            <div class="article-wrap">
                <div class="article-container three-columns">


                <?php  while(have_posts()){ 
                    the_post();
                    ?>

                    <article class="post-item">

                            <div class="post-thumbnail">
                                <a href="<?php the_permalink()?>">
                                    <?php the_post_thumbnail('blog-img',array(
                                        'class' => 'img-responsive'
                                    ))?>
                                </a>
                            </div>
                            <h3 class="post-title"><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                            <div class="post-meta">
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                                <span class="post-author">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
                                <span class="post-category">Category: <?php echo get_the_category_list(', '); ?></span>
                            </div>
                        <div class="post-content">
                            <p class="post-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 25); // Limiting to 20 words ?>
                            </p>
                            </p>
                        </div>
                        <a href="<?php the_permalink()?>" class="read-more btn-outline">Read More</a>
                    </article>

                <?php  } ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Article section end  -->


   <?php get_footer()?>