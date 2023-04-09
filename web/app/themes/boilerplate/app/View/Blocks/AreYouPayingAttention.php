<?php
namespace App\View\Blocks;

class AreYouPayingAttention {
  public function __construct()
  {
    add_action('init', [$this, 'adminAssets']);
  }
  public function adminAssets()
  {
    register_block_type('sgy/are-you-paying-attention', [
      "name"=> "sgy/are-you-paying-attention",
      "title"=> "Are you paying attention?",
      "icon"=> "smiley",
      "category"=> "common",
      "description"=> "Give your audience a chance to test what they have learnt...",

      'render_callback' => [$this, 'theHTML'], // this is where we delegate saving the block to PHP
      // If we are not using the render_callback, we could enqueue the scripts for the front end using the .json file like this: "viewScript": [ "file:./build/view.js", "example-shared-view-script" ],
    ]);
  }
  public function theHTML($attrs)
  {
    if (!is_admin()):
      // echo '<pre>';
      // var_dump($attrs);
      // echo '</pre>';
      // Load the assets when the block is rendered on the front end
      // wp_enqueue_script('attentionfrontend', plugin_dir_url(__FILE__) . '/build/frontend.js', ['wp-element']); // wp-element is WP's version of React
    endif;
    ob_start(); // anything that comes after this function is added to the buffer?>
    <div class="paying-attention-block">
      <pre style="display:none;"><?= wp_json_encode($attrs) ?></pre> <!-- Load props data into pre tag -->
    </div>
  <?php
    return ob_get_clean();
  }
}

// adding data as an attribute produces malformed data eg:  data-block-details=<?= wp_json_encode($attrs)