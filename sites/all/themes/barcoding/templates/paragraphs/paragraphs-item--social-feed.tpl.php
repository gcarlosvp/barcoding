<?php

/**
 * @file
 * Default theme implementation for a single paragraph item.
 *
 * Available variables:
 * - $content: An array of content items. Use render($content) to print them
 *   all, or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity
 *   - entity-paragraphs-item
 *   - paragraphs-item-{bundle}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened into
 *   a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<?php
   $socialmedia = trim(render($content['field_social_media']));
   //print $socialmedia;
    if($socialmedia == 'nomedia'){ ?>
       <li>
           <?php print render($content['field_social_content']); ?>
           <?php print render($content['field_logo_image']); ?>
        </li>
    
<?php }else{ ?>


<li>
    <a href="<?php print trim(render($content['field_social_link'])); ?>" target="_blank" class="social__bubble social__bubble--<?php print trim(render($content['field_social_media'])); ?>">
                  <div class="social__icon">
                      <svg class="symbol symbol-<?php print trim(render($content['field_social_media'])); ?>">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php print trim(render($content['field_social_media'])); ?>"></use>
                      </svg>
                  </div></a>
                <?php print render($content['field_social_content']); ?>
</li>

<?php } ?>