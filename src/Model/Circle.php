<?php

namespace App\Model;

use CircleInterface;
use Geometry;

/**
 * Circle class
 * Extended from Geometry class
 */
class Circle extends Geometry implements CircleInterface
{
  private $radius;
  private const PI = 3.14;

  public function __construct()
  {
    parent::__construct("circle");
  }

  public function set_circle_radius($radius)
  {
    $this->radius = $radius;
  }

  public function calculate_circumference(): float
  {
    return 2 * self::PI * $this->radius;
  }

  public function calculate_surface(): float
  {
    return self::PI * ($this->radius ** 2);
  }

  public function get_array_data(): array
  {
    $array = [];

    $array['type'] = $this->type;
    $array['radius'] = $this->radius;
    $array['surface'] = round($this->calculate_surface(), 2);
    $array['circumference'] = round($this->calculate_circumference(), 2);

    return $array;
  }
}