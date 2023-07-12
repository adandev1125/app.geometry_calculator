<?php

namespace App\Model;

use Geometry;

/**
 * Triangle class
 * Extended from Geometry
 */
class Triangle extends Geometry
{
  private $a;
  private $b;
  private $c;

  public function __construct()
  {
    parent::__construct("triangle");
  }

  public function set_triangle_edges($a, $b, $c)
  {
    $this->a = $a;
    $this->b = $b;
    $this->c = $c;
  }

  public function calculate_circumference(): float
  {
    return $this->a + $this->b + $this->c;
  }

  public function calculate_surface(): float
  {
    $s = ($this->a + $this->b + $this->c) / 2;
    $surface = sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));

    return $surface;
  }

  public function get_array_data(): array
  {
    $array = [];

    $array['type'] = $this->type;
    $array['a'] = $this->a;
    $array['b'] = $this->b;
    $array['c'] = $this->c;
    $array['surface'] = round($this->calculate_surface(), 2);
    $array['circumference'] = round($this->calculate_circumference(), 2);

    return $array;
  }
}