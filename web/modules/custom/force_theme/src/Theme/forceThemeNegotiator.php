<?php

namespace Drupal\force_theme\Theme;

use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\Routing\Route;
use Drupal\Core\Theme\ThemeNegotiatorInterface;

class forceThemeNegotiator implements ThemeNegotiatorInterface
{
    /**
     * Project's theme name.
     */
    protected $front_theme;

    /**
     * The constructor.
     *
     * @param string $front_theme
     */
    public function __construct()
    {
        $this->front_theme = 'drupal_starter';
    }

    /**
     * {@inheritdoc}
     */
    public function applies(RouteMatchInterface $route_match) {
        $route = $route_match->getRouteObject();

        if (!$route instanceof Route) {
            return FALSE;
        }

        $session = \Drupal::service('user.private_tempstore')->get('force_theme');

        $last_theme_active = $session->get('active_theme', FALSE);
        $current_route = $route_match->getRouteName();
        $routes_applicable = ['node.add', 'entity.node.edit_form', 'entity.user.edit_form'];
        $should_consider_front_theme = in_array($current_route, $routes_applicable);

        return $last_theme_active == $this->front_theme && $should_consider_front_theme ? TRUE : FALSE;
    }

    /**
     * {@inheritdoc}
     */
    public function determineActiveTheme(RouteMatchInterface $route_match) {
        return $this->front_theme;
    }

}
