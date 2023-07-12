<?php
use App\Model\Circle;
use App\Model\Triangle;

/**
 * Factory class for instantiating geometry objects with type
 */
class GeometryFactory
{
  public static function createGeometry($type): Geometry
  {
    switch ($type) {
      case 'circle':
        return new Circle();
      case 'triangle':
        return new Triangle();
      default:
        throw new InvalidArgumentException('Invalid geometry type');
    }
  }
}