<?php
// src/Twig/Component/NavLink.php
namespace App\Twig\Component;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('nav_link')]
final class NavLink
{
    public string $routeName;
    public string $text;
    public string $icon;
}
