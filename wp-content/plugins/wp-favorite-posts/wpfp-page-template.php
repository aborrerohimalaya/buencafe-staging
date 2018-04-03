<?php
    $wpfp_before = "";
    //echo "<div class='wpfp-span'>";
    if (!empty($user)) {
        if (wpfp_is_user_favlist_public($user)) {
            $wpfp_before = "$user's Favorite Posts.";
        } else {
            $wpfp_before = "$user's list is not public.";
        }
    }

    if ($wpfp_before):
        echo '<div class="wpfp-page-before">'.$wpfp_before.'</div>';
    endif;

    if ($favorite_post_ids) {

      $i = 0;
      $j = 0;

      if (!isset($i)) {
        $i = 0;
      }

      if (!isset($j)) {
        $j = 0;
      }

		$favorite_post_ids = array_reverse($favorite_post_ids);
        $post_per_page = wpfp_get_option("post_per_page");
        $page = intval(get_query_var('paged'));

        $qry = array('post__in' => $favorite_post_ids, 'posts_per_page'=> $post_per_page, 'orderby' => 'post__in', 'paged' => $page);
        // custom post type support can easily be added with a line of code like below.
        //$qry['post_type'] = array('post', 'receta', 'candybar', 'deco', 'descargable', 'juegos');
        $qry['post_type'] = $_GET['tipo'];
        query_posts($qry);
        
        while ( have_posts() ) : the_post();

        if($j == 0) echo '<div class="box">';
        $i = 1;
    ?>

    <?php
      //if (get_post_type() == $_GET['tipo']):
        get_template_part( 'loop');
      //endif 
    ?>

    <?php
        $j++;

        if($j == 2) {
        $i = 0;
          echo '</div>';
          $j = 0;
        }

        if($wp_query->current_post == $wp_query->post_count && $j == 4 ) echo '</div>';

        endwhile;

        wp_reset_query();

    } else {
        // $wpfp_options = wpfp_get_options();
        // echo "<ul><li>";
        // echo $wpfp_options['favorites_empty'];
        // echo "</li></ul>";
    }

    //echo '<p>'.wpfp_clear_list_link().'</p>';
    //echo "</div>";
    wpfp_cookie_warning();
