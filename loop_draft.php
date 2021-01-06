 <div class="col-md-4">
   <article id="post-<?php the_id(); ?>" <?php  post_class('news');  ?>>
     <div class="news_pic">
       <a href="<?php the_permalink(); ?>">
         <?php the_post_thumbnail('medium'); ?>
       </a>
     </div>
     <!-- /End news-pic -->
     <div class="news_meta">
       <?php the_category();  ?>
     </div>
     <!-- /End news-meta -->
     <h2 class="news_title"><a href="<?php the_permalink(); ?> "><php the_title(); ?></a></h2>
     <div class="news_desc">
       <?php the_excerpt(); ?>
       <p><a href="<?php the_permalink(); ?> ">[続きを読む]</a></p>
     </div>
   </article>
 </div>
 <!-- /End col-md-4 -->