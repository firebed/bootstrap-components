<?php


namespace Firebed\Components\Livewire\Traits\Datatable;

use Firebed\Components\Livewire\Traits\SendsNotifications;
use Livewire\Component;

/**
 * Trait DeletesRows
 * @package Firebed\Components\Livewire\Traits\Datatable
 *
 * @mixin Component
 * @mixin WithSelections
 * @mixin SendsNotifications
 */
trait DeletesRows
{
    public bool $showConfirmDelete = false;

    public function confirmDelete(): void
    {
        $this->skipRender();

        if ($this->doesntHaveSelections()) {
            $this->showWarningToast('No rows were selected!');
            return;
        }

        $this->showConfirmDelete = true;
    }

    public function hideConfirmDelete(): void
    {
        $this->showConfirmDelete = false;
    }

    public function delete(): void
    {
        if ($this->doesntHaveSelections()) {
            $this->showWarningToast('No rows were selected!');
            $this->skipRender();
            return;
        }

        $this->hideConfirmDelete();

        $count = $this->deleteRows();
        if ($count === NULL) {
            // Nothing to do here, developer will manually handle this.
            return;
        }

        $this->clearSelections();

        if (property_exists($this, 'model') && method_exists($this, 'makeEmptyModel')) {
            $this->model = $this->makeEmptyModel();
        }

        $this->showSuccessToast("Delete successful!", "$count row were affected.");
    }

    abstract protected function deleteRows(): ?int;
}
