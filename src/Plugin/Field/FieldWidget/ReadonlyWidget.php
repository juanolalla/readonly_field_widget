<?php

namespace Drupal\readonly_field_widget\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\WidgetInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Displays fields in read only mode using their default formatter.
 *
 * @FieldWidget(
 *   id = "readonly",
 *   label = @Translation("Readonly widget"),
 *   multiple_values = true
 * )
 */
class ReadonlyWidget extends WidgetBase implements WidgetInterface {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    return $items->view();
  }
}
