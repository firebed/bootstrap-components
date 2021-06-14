<?php


namespace Firebed\Components\Livewire\Traits;


trait SendsDialogNotifications
{
    public static string $DIALOG_NOTIFICATION = 'dialog-notification';

    public function showSuccessDialog(string $title, string $content = ""): void
    {
        $this->showDialog(self::$SUCCESS, $title, $content);
    }

    public function showInfoDialog(string $title, string $content = ""): void
    {
        $this->showDialog(self::$INFO, $title, $content);
    }

    public function showWarningDialog(string $title, string $content = ""): void
    {
        $this->showDialog(self::$WARNING, $title, $content);
    }

    public function showErrorDialog(string $title, string $content = ""): void
    {
        $this->showDialog(self::$ERROR, $title, $content);
    }

    public function showDialog(string $type, string $title, string $content = ""): void
    {
        $this->dispatchBrowserEvent(self::$DIALOG_NOTIFICATION, compact('type', 'title', 'content'));
    }
}
