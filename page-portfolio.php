<?php
/*
Template Name: Portfolio
*/
?>

<div class='container content'>

  <div class='portfolio_list'>
    <?php 
    $type=$_GET['type']; 
    $current_a = ''; $current_b = ''; $current_c = ''; $current_d = ''; 
    switch ($type) {
      default : { 
        query_posts('posts_per_page=40'); 
        $current_a = 'class="l_current"'; 
        break; 
      }
      case 'web' : { 
        query_posts('posts_per_page=40&tag=web'); 
        $current_b = 'class="l_current"'; 
        break; 
      }
      case 'print' : { 
        query_posts('posts_per_page=40&tag=print'); 
        $current_c = 'class="l_current"'; 
        break; 
      }
      case 'logo' : { 
        query_posts('posts_per_page=40&tag=logo'); 
        $current_d = 'class="l_current"'; 
        break; 
      }
    }
    ?>
    <!--
    <ul id='port_ul_sort'>
      <li <?php echo $current_a; ?> id='port_li_all'><span id='<?php echo get_bloginfo("wpurl")."/portfolio/"; ?>'>All</span></li>       
      <li <?php echo $current_b; ?> id='port_li_web'><span id='<?php echo add_query_arg( 'type', 'web', get_bloginfo("wpurl")."/portfolio/"); ?>'>Web</span></li>
      <li <?php echo $current_c; ?> id='port_li_print'><span id='<?php echo add_query_arg( 'type', 'print', get_bloginfo("wpurl")."/portfolio/"); ?>'>Print</span></li>
      <li <?php echo $current_d; ?> id='port_li_logo'><span id='<?php echo add_query_arg( 'type', 'logo', get_bloginfo("wpurl")."/portfolio/"); ?>'>Logo</span></li>
    </ul>
    -->
    <?php //include( 'portfolio_left_nav.php' ); ?>
    <ul id='ul_pfolio'>           
      <?php
      $num = 0;
      while ( have_posts() ) : the_post(); 
        $num++;
      ?>
        <li class="port_thumb<?php echo $num; ?>">        
          <?php 
          $url_endpoint = get_permalink($id);
          $url_endpoint = parse_url( $url_endpoint );
          $url_endpoint = $url_endpoint['path'];
          $url_endpoint = explode("portfolio/", $url_endpoint);
          $url_endpoint = $url_endpoint[1]; 
          $url_endpoint = substr($url_endpoint, 0, -1);
          ?>
          <div class='port_left_thu'>
            <a id="<?php the_ID(); ?>" class="<?php echo ($num - 1); ?>" rel="<?php echo $url_endpoint; ?>" href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
              <div class='blanc'></div>
            </a>
          </div>
          <div class='port_left_txt'>
            <a id="<?php the_ID(); ?>" class="<?php echo ($num - 1); ?>" rel="<?php echo $url_endpoint; ?>" href="<?php the_permalink(); ?>">
              <h4 class='port_left_h4'>
                <?php
                /*
                $posttags = get_the_tags();
                if ($posttags) {
                  foreach($posttags as $tag) {
                    echo '<span>' . $tag->name . '</span> ';
                    $tag = $tag->name;
                  }
                }
                */
                //the_title();
                ?>
              </h4>
            </a>
            <p>
            <?php //echo '<span>' . $tag . '</span>: '; echo get_post_meta($post->ID, $description, true); ?>
            </p>
          </div>
        </li>
      <?php
      endwhile;   
      ?>  
    </ul> 
  </div>

  <div class='portfolio_entry'>
    <?php 
    $first_load = 1; 
    //include('portfolio_entry.php'); 
    ?>    
  </div>

</div>