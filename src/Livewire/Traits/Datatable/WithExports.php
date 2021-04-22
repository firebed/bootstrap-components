<?php


namespace Firebed\Livewire\Traits\Datatable;


use Firebed\Livewire\Traits\SendsNotifications;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Trait WithExports
 * @package Firebed\Livewire\Traits\Datatable
 *
 * @mixin Component
 * @mixin WithSelections
 * @mixin SendsNotifications
 */
trait WithExports
{
    public function exportSelected(): null|BinaryFileResponse
    {
        if ($this->doesntHaveSelections()) {
            $this->showWarningToast('No rows selected!');
            $this->skipRender();
            return null;
        }

        $file = $this->export();
        if ($file) {
            $this->showSuccessToast('Excel ready!');
        }

        return $file;
    }

    abstract protected function export(): null|BinaryFileResponse;
}