<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */

?>
<p><?php echo icl_translate('wpml_custom', 'Compartir', 'Compartir') ?>
  <!-- FACEBOOK -->
  <a href="javascript:fbShare('<?php the_permalink(); ?>', 'Compartir BuenCafe', 'Compartir BuenCafe', '<?php the_permalink(); ?>', 520, 350)" class="fb noText">fb</a>
  <!-- TWITTER -->
  <a href="javascript:twShare('http://twitter.com/share?text=<?php the_title(); ?>', 'Compartir BuenCafe', 'Compartir BuenCafe', '<?php the_permalink(); ?>', 520, 350)" class="tw noText">tw</a> 
  <!-- MAIL -->
  <a class="mail noText" href="mailto:direccion@destinatario.com?body=<?php the_permalink(); ?>&Subject=<?php the_title(); ?>">mail</a>
</p>

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