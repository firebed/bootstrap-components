<?php


namespace Firebed\Components\Livewire\Traits;


/**
 * Trait SendsNotifications
 *
 * @method dispatchBrowserEvent($event, $data = null)
 *
 * @package Firebed\Components\Livewire\Traits
 */
trait SendsNotifications
{
    use SendsDialogNotifications;
    use SendsToastNotifications;

    public static string $SUCCESS = 'success';
    public static string $INFO    = 'info';
    public static string $WARNING = 'warning';
    public static string $ERROR   = 'error';
}
