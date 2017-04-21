

<div class='popup-modal' data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <?php $image = get_field('popup_image', 'option'); ?>
  <img src="<?php echo $image; ?>" alt="">
  <?php the_field('popup_text', 'option'); ?>
  <button data-remodal-action="confirm" class="remodal-confirm">Got it</button>
</div>
