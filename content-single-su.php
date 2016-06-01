<?php
/**
 * @package sparkling
 */

 $fields = array(
		 'past_week' => 'What have you been working on over the past two weeks?',
		 'next_two_weeks' => 'For the next two weeks I will be concentrating on...',
		 'broadcast' => 'Do you have anything that needs to be posted or broadcast?',
		 'support' => 'What I need from staff in the way of support...',
		 'meetings' => 'Did you attend any meetings or conferences last week?',
		 'audience' => 'Who/what was the target audience?',
		 'relevant_points' => 'What were the most relevant points to remember?',
		 'follow-up' => 'Is there any required follow-up activity?',
		 'contacts' => 'Did you meet anyone that CLIR should stay in touch with via e-bulletins, etc? Anyone who might be interested in sponsoring CLIR/DLF?',
		 'attend_again' => 'Would you attend again?',
 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_post_thumbnail( 'sparkling-featured', array( 'class' => 'single-featured' )); ?>
	<div class="post-inner-content">
		<header class="entry-header page-header">

			<h1 class="entry-title "><?php the_title(); ?></h1>

			<div class="entry-meta">
				<?php sparkling_posted_on(); ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( esc_html__( ', ', 'sparkling' ) );
					if ( $categories_list && sparkling_categorized_blog() ) :
				?>
				<span class="cat-links"><i class="fa fa-folder-open-o"></i>
					<?php printf( esc_html__( ' %1$s', 'sparkling' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>
				<?php edit_post_link( esc_html__( 'Edit', 'sparkling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>

			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php foreach ($fields as $field => $question): ?>
				<?php if (get_field($field)): ?>
    			<h2><?php echo $question; ?></h2>
    			<?php the_field($field); ?>
					<?php endif; ?>
				<?php endforeach; ?>

			<?php
				wp_link_pages( array(
					'before'            => '<div class="page-links">'.esc_html__( 'Pages:', 'sparkling' ),
					'after'             => '</div>',
					'link_before'       => '<span>',
					'link_after'        => '</span>',
					'pagelink'          => '%',
					'echo'              => 1
	       		) );
	    	?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">

	    	<?php if(has_tag()) : ?>
	      <!-- tags -->
	      <div class="tagcloud">

	          <?php
	              $tags = get_the_tags(get_the_ID());
	              foreach($tags as $tag){
	                  echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a> ';
	              } ?>

	      </div>
	      <!-- end tags -->
	      <?php endif; ?>

		</footer><!-- .entry-meta -->
	</div>

	<?php if (get_the_author_meta('description')) :  ?>
		<div class="post-inner-content secondary-content-box">
      <!-- author bio -->
      <div class="author-bio content-box-inner">

        <!-- avatar -->
        <div class="avatar">
            <?php echo get_avatar(get_the_author_meta('ID') , '60'); ?>
        </div>
        <!-- end avatar -->

        <!-- user bio -->
        <div class="author-bio-content">

          <h4 class="author-name"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_the_author_meta('display_name'); ?></a></h4>
          <p class="author-description">
              <?php echo get_the_author_meta('description'); ?>
          </p>

        </div><!-- end .author-bio-content -->

      </div><!-- end .author-bio  -->

		</div>
		<?php endif; ?>

</article><!-- #post-## -->
