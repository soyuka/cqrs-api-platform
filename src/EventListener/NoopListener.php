<?php
namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

final class NoopListener {
    public function onKernelView(GetResponseForControllerResultEvent $event): void {
        return;
    }

    public function onKernelRequest(GetResponseEvent $event): void {
        return;
    }
}
