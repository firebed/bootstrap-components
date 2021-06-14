<?php


namespace Firebed\Components\Livewire\Traits\Datatable;

use Firebed\Components\Livewire\Traits\SendsNotifications;
use Livewire\Component;

/**
 * Trait TogglesVisibility
 * @package Firebed\Components\Livewire\Traits\Datatable
 *
 * @mixin Component
 * @mixin WithSelections
 * @mixin SendsNotifications
 */
trait TogglesVisibility
{
    public function setVisibility(bool $visible): void
    {
        if ($this->doesntHaveSelections()) {
            $this->showWarningToast('No rows were selected!');
            $this->skipRender();
            return;
        }

        $count = $this->updateVisibility($visible);
        $this->showSuccessToast("Visibility updated!", "$count rows were affected.");
    }

    abstract protected function updateVisibility($visible): int;
}
