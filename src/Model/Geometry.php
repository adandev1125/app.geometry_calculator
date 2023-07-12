<?php

/**
 * Base class for all geometries like circles and triangles
 */
abstract class Geometry
{
  protected $type;

  public function __construct(string $type)
  {
    $this->type = $type;
  }

  // set edges of a triangle
  public function set_triangle_edges($a, $b, $c) {}

  // set radius of a circle
  public function set_circle_radius($radius) {}

  // calculate circumference of this geometry
  public abstract function calculate_circumference(): float;

  // calculate surface(area) of this geometry
  public abstract function calculate_surface(): float;

  // returns summary of this geometry as an array format
  public abstract function get_array_data(): array;

  // calculates sum of circumference of this geometry and geometry b
  public function sum_circumference(Geometry $b): float
  {
    return $this->calculate_circumference() + $b->calculate_circumference();
  }

  // calculates sum of surface of this geometry and geometry b
  public function sum_surface(Geometry $b): float
  {
    return $this->calculate_surface() + $b->calculate_surface();
  }
}