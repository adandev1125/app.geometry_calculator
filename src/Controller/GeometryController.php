<?php

namespace App\Controller;

use GeometryFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GeometryController extends AbstractController
{
  // Returns json formatted triangle object
  public function triangle($a, $b, $c): Response
  {
    $triangle = GeometryFactory::createGeometry('triangle');
    $triangle->set_triangle_edges($a, $b, $c);

    $array_data = $triangle->get_array_data();

    $json_response = new JsonResponse($array_data);

    return $json_response;
  }

  // Returns json formatted circle object
  public function circle($radius): Response
  {
    $circle = GeometryFactory::createGeometry('circle');
    $circle->set_circle_radius($radius);

    $array_data = $circle->get_array_data();

    $json_response = new JsonResponse($array_data);

    return $json_response;
  }

  // Returns json formatted test result of sum of diameters and surfaces
  public function sum_test(): Response
  {
    $circle = GeometryFactory::createGeometry('circle');
    $circle->set_circle_radius(2);

    $triangle = GeometryFactory::createGeometry('triangle');
    $triangle->set_triangle_edges(3, 4, 5);

    $sum_of_circumference = $circle->sum_circumference($triangle);
    $sum_of_surface = $circle->sum_surface($triangle);

    $json_response = new JsonResponse(
      array(
        'circle' => $circle->get_array_data(),
        'triangle' => $triangle->get_array_data(),
        'sum of surface' => round($sum_of_surface, 2),
        'sum of circumference' => round($sum_of_circumference, 2),
      )
    );

    return $json_response;
  }
}