<?php

namespace Drupal\Tests\readonly_field_widget\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\readonly_field_widget\Plugin\Field\FieldWidget\ReadonlyWidget;

/**
 * Class ReadonlyWidgetTest
 *
 * @coversDefaultClass \Drupal\readonly_field_widget\Plugin\Field\FieldWidget\ReadonlyWidget
 * @group readonly_field_widget
 */
class ReadonlyWidgetTest extends UnitTestCase {

  /**
   * @covers ::fieldTypes
   */
  public function testSomething() {

  }

  /**
   * Test the logic to get the field types with a default formatter.
   *
   * @dataProvider providerTestFieldTypes
   */
  public function testFieldTypes($definitions, $expected) {
    $this->assertSame($expected, ReadonlyWidget::fieldTypes($definitions));
  }

  public function providerTestFieldTypes() {
    return [
      [
        [
          'field_type_1' => [
            'other_key' => 'other_value',
            'default_formatter' => 'formatter1',
          ],
          'field_type_2' => [
            'other_key' => 'another_value',
          ]
        ],
        ['field_type_1'],
      ],
      [
        [
          'field_type_1' => [
            'other_key' => 'other_value',
            'default_formatter' => 'formatter1',
          ],
          'field_type_2' => [
            'default_formatter' => 'formatter2',
          ]
        ],
        ['field_type_1', 'field_type_2'],
      ],
      [
        [
          'field_type_1' => [
            'other_key' => 'other_value',
          ],
          'field_type_2' => [
            'other_key' => 'another_value',
          ]
        ],
        [],
      ],
    ];
  }
}
