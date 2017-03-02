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
<div class="col-aldnoah-6">
          <div class="callout callout--blue callout--larger hero" style="background-image: url(<?php print trim(render($content['field_background_image'])); ?>);"><a href="" class="callout__details">
              <h3 class="mini"><?php print render($content['field_mini_title']); ?></h3>
              <h2 class="larger"><?php print render($content['field_larger_title']); ?></h2>
              <?php print render($content['field_callout_content']); ?></a>
              <div class="callout__share">
                <h3 class="mini"><span>Share +</span></h3>
              <?php
                $block = module_invoke('menu', 'block_view', 'menu-nav-social'); 
                print render($block['content']);
               ?>
              </div><img src=<?php print trim(render($content['field_background_image'])); ?> alt="undefined">
          </div>
        </div>

