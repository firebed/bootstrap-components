<?php


namespace Firebed\Livewire\Traits;


trait SendsToastNotifications
{
    public static string $TOAST_NOTIFICATION  = 'toast-notification';

    public function showSuccessToast(string $title, string $content = "", bool $autohide = true, int $delay = 5000): void
    {
        $this->showToast(self::$SUCCESS, $title, $content, $autohide, $delay);
    }

    public function showInfoToast(string $title, string $content = "", bool $autohide = true, int $delay = 5000): void
    {
        $this->showToast(self::$INFO, $title, $content, $autohide, $delay);
    }

    public function showWarningToast(string $title, string $content = "", bool $autohide = true, int $delay = 5000): void
    {
        $this->showToast(self::$WARNING, $title, $content, $autohide, $delay);
    }

    public function showErrorToast(string $title, string $content = "", bool $autohide = true, int $delay = 5000): void
    {
        $this->showToast(self::$ERROR, $title, $content, $autohide, $delay);
    }

    public function showToast(string $type, string $title, string $content = "", bool $autohide = true, int $delay = 5000): void
    {
        $this->dispatchBrowserEvent(self::$TOAST_NOTIFICATION, compact('type', 'title', 'content', 'autohide', 'delay'));
    }
}
