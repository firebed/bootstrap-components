<?php


namespace Firebed\Livewire\Traits;


use Illuminate\Support\Collection;

trait HasDatatable
{
    public array $selected  = [];
    public bool  $selectAll = false;

    public function updatedSelectAll($selectAll): void
    {
        $this->selected = $selectAll
            ? $this->getModels()->pluck('id')->map(fn($id) => (string)$id)
            : [];
    }

    abstract protected function getModels(): Collection;
}