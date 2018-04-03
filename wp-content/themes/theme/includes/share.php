<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */

// http://stackoverflow.com/questions/10690019/link-to-pin-it-on-pinterest-without-generating-a-button

/*
<a href="//pinterest.com/pin/create/link/?url=http%3A%2F%2Fwww.flickr.com%2Fphotos%2Fkentbrew%2F6851755809%2F&media=http%3A%2F%2Ffarm8.staticflickr.com%2F7027%2F6851755809_df5b2051c9_z.jpg&description=Next%20stop%3A%20Pinterest">Pin it</a>
*/
?>
<!-- <span class="share"><span class="noText">Compartir</span><span>
  <a class="fb" href="javascript:fbShare('<?php the_permalink(); ?>', 'Compartir BuenCafe', 'Compartir BuenCafe', '<?php the_permalink(); ?>', 520, 350)">Fb</a>
  <a class="tw" href="javascript:twShare('http://twitter.com/share?text=<?php the_title(); ?>', 'Compartir BuenCafe', 'Compartir BuenCafe', '<?php the_permalink(); ?>', 520, 350)">Tw</a>
</span></span> -->

<a class="fb" href="javascript:fbShare('<?php the_permalink(); ?>', 'Compartir BuenCafe', 'Compartir BuenCafe', '<?php the_permalink(); ?>', 520, 350)">
<span class="share"><span class="noText">Compartir</span><span>
</span></span>
</a>

  
  
  <!-- <a href="//es.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red" data-pin-height="28"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_28.png" /></a> -->

<script>
function twShare(url, title, descr, image, winWidth, winHeight) {
  var width  = 575,
  height = 400,
  left   = ($(window).width()  - width)  / 2,
  top    = ($(window).height() - height) / 2,
  opts   = 'status=1' +
  ',width='  + width  +
  ',height=' + height +
  ',top='    + top    +
  ',left='   + left;
  window.open(url, 'twitter', opts);
}
</script>

<script>
function fbShare(url, title, descr, image, winWidth, winHeight) {
  var winTop = (screen.height / 2) - (winHeight / 2);
  var winLeft = (screen.width / 2) - (winWidth / 2);

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      var share_link = 'http://m.facebook.com/sharer.php?u=' + encodeURI(url);
    }else{
      var share_link = 'http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image
    }
  window.open(share_link, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}
</script>