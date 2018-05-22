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

  /**
   * Gets all field types that can use the Readonly widget.
   *
   * In ReadonlyWidget::formElement() the field is rendered using its default
   * formatter as the form element array. This would not work for a field type
   * that does not provide a default formatter, resulting in a PHP error. For
   * that reason we are filtering the field types allowed for this widget.
   *
   * @see readonly_field_widget.module
   * @see Implements hook_field_widget_info_alter()
   */
  public static function fieldTypes() {
    $field_types = \Drupal::service('plugin.manager.field.field_type')->getDefinitions();
    $field_types = array_filter($field_types, function ($item) {
      return isset($item['default_formatter']);
    });
    return array_keys($field_types);
  }
}
