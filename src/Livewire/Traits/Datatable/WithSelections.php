<?php


namespace Firebed\Livewire\Traits\Datatable;


use Illuminate\Support\Collection;

trait WithSelections
{
    public array $selected  = [];
    public bool  $selectAll = false;

    public function updatedSelectAll($selectAll): void
    {
        $this->selected = $selectAll
            ? $this->getModels()->pluck('id')->map(fn($id) => (string)$id)
            : [];
    }

    protected function doesntHaveSelections(): bool
    {
        return !$this->hasSelections();
    }

    protected function hasSelections(): bool
    {
        return filled($this->selected);
    }

    abstract protected function getModels(): Collection;
}