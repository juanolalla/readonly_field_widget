<?php

namespace Drupal\Tests\readonly_field_widget\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\readonly_field_widget\Plugin\Field\FieldWidget\ReadonlyWidget;

class ReadonlyWidgetTest extends UnitTestCase {

  /**
   * Test the logic to get the field types with a default formatter.
   *
   * @covers \Drupal\readonly_field_widget\Plugin\Field\FieldWidget\ReadonlyWidget::fieldTypes
   *
   * @dataProvider providerTestFieldTypes
   */
  public function testFieldTypes($definitions, $expected) {
    /*$definitions = [
      'field_type_1' => [
        'other_key' => 'other_value',
        'default_formatter' => 'formatter1',
      ],
      'field_type_2' => [
        'other_key' => 'another_value',
      ]
    ];

    $expected = [
      'field_type_1',
    ];*/

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