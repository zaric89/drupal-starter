<?php

namespace Drupal\ed_slider\Plugin\Block;

use Drupal\Core\Link;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Url;
use Drupal\file\Entity\File;
use Drupal\node\Entity\Node;

/**
 * Class MainSliderBlock.
 *
 * @package Drupal\ed_slider\Plugin\Block
 *
 * @Block(
 * id = "main_slider_block",
 * admin_label=@Translation("Main Slider Block"),
 * )
 */
class MainSliderBlock extends BlockBase {

  /**
   *
   */
  public function build() {
    $data = $this->getMainSlides();

    $slides = [];

    foreach ($data as $slide) {
      $file = File::load($slide->field_image_target_id);

      // $image = [
      //                '#theme' => 'image_style',
      //                '#style_name' => 'spotlight_timeline',
      //                '#uri' => $file->getFileUri(),
      //                '#title' => $file->getFilename(),
      //            ];
      $image_url = file_create_url($file->getFileUri());

      if (empty($slide->field_cta_button_title)) {
        $link = '';
      }
      else {
        $url = Url::fromUri($slide->field_cta_button_uri, ['attributes' => ['class' => ['e-btn', 'white']]]);
        $link = Link::fromTextAndUrl($slide->field_cta_button_title, $url)->toString();
      }

      $slides[] = [
        'title' => $slide->title,
        'image' => $image_url,
        'description' => empty($slide->body_value) ? '' : $slide->body_value,
        'link' => $link,
      ];
    }

    $build = [
      '#theme' => 'hp_slider',
      '#slides' => $slides,
      '#cache' => [
    // Seconds.
        'max-age' => 10,
      ],
    ];

    return $build;
  }

  /**
   *
   */
  private function getMainSlides() {
    // Get the language code:
    $language = \Drupal::languageManager()->getCurrentLanguage(LanguageInterface::TYPE_CONTENT)->getId();

    // Get translated nodes.
    $db = \Drupal::database();
    $query = $db->select('node_field_data', 'n');
    $query->fields('n', ['nid', 'title']);
    $query->join('node__field_image', 'ni', 'n.nid=ni.entity_id');
    $query->leftJoin('node__body', 'b', 'n.nid=b.entity_id');
    $query->leftJoin('node__field_cta_button', 'cta', 'n.nid=cta.entity_id');
    $query->addField('ni', 'field_image_target_id');
    $query->addField('b', 'body_value');
    $query->fields('cta', ['field_cta_button_uri', 'field_cta_button_title']);
    $query->condition('n.type', 'hp_slider');
    $query->condition('n.status', Node::PUBLISHED);
    $query->condition('n.langcode', $language);
    $query->orderBy('n.created', 'DESC');

    $data = $query->execute()->fetchAll();

    return $data;
  }

}
