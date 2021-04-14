<?php


namespace Firebed\Livewire\Traits;


use Illuminate\Support\Collection;

trait HasDatatable
{
    public array $selected  = [];
    public bool  $selectAll = false;

    public string $sortField     = '';
    public string $sortDirection = '';

    public function updatedSelectAll($selectAll): void
    {
        $this->selected = $selectAll
            ? $this->getModels()->pluck('id')->map(fn($id) => (string)$id)
            : [];
    }

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
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