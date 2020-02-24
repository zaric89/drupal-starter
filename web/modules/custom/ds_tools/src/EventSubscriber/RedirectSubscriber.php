<?php

namespace Drupal\ds_tools\EventSubscriber;

use Drupal\Core\Url;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 *
 */
class RedirectSubscriber implements EventSubscriberInterface {

  /**
   *
   */
  public static function getSubscribedEvents() {
    return [
      KernelEvents::RESPONSE => [
                ['errorPagesRedirect', 0],
      ],
    ];
  }

  /**
   *
   */
  public function errorPagesRedirect(FilterResponseEvent $event) {
    $response = $event->getResponse();

    if ($response->getStatusCode() == '404') {
      $url = Url::fromRoute('ds_tools.page_not_found')->toString();

      $event->setResponse(new RedirectResponse($url));
    }
    elseif ($response->getStatusCode() == '403') {
      $url = Url::fromRoute('ds_tools.page_access_denied')->toString();

      $event->setResponse(new RedirectResponse($url));
    }
  }

}
