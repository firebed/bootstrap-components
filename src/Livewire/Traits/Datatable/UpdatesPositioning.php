<?php


namespace Firebed\Components\Livewire\Traits\Datatable;


use Firebed\Components\Livewire\Traits\SendsNotifications;
use Illuminate\Support\Facades\DB;

/**
 * Trait UpdatesPositioning
 * @package Firebed\Components\Livewire\Traits\Datatable
 *
 * @mixin SendsNotifications
 */
trait UpdatesPositioning
{
    public function moveUp($id): void
    {
        $target = $this->findModel($id);

        $previous = $this->getModelAt($target->position - 1);
        if ($previous) {
            $this->swapModels($target, $previous);
        }
    }

    public function moveDown($id): void
    {
        $target = $this->findModel($id);

        $next = $this->getModelAt($target->position + 1);
        if ($next) {
            $this->swapModels($target, $next);
        }
    }

    private function swapModels($target, $dest): void
    {
        $temp = $target->position;
        $target->position = $dest->position;
        $dest->position = $temp;

        DB::transaction(function () use ($target, $dest) {
            $target->save();
            $dest->save();
        });

        $this->showSuccessToast('Position updated!');
    }

    abstract protected function getModelAt(int $index);

    abstract protected function findModel(int $id);
}
