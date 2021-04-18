<?php


namespace Firebed\Livewire\Traits\Datatable;


use Illuminate\Support\Collection;

/**
 * Trait WithSelections
 * @package Firebed\Livewire\Traits\Datatable
 *
 * @method void skipRender()
 */
trait WithSelections
{
    public array $selected  = [];
    public bool  $selectAll = false;

    public function updatedSelectAll($selectAll): void
    {
        $this->selected = $selectAll
            ? $this->getModels()->pluck('id')->map(fn($id) => (string)$id)->all()
            : [];

        if ($this->shouldSkipRender()) {
            $this->skipRender();
        }
    }

    public function updatedSelected(): void
    {
        if ($this->shouldSkipRender()) {
            $this->skipRender();
        }
    }

    protected function doesntHaveSelections(): bool
    {
        return !$this->hasSelections();
    }

    protected function hasSelections(): bool
    {
        return filled($this->selected);
    }

    public function clearSelections(): void
    {
        $this->selectAll = false;
        $this->selected = [];
    }

    private function shouldSkipRender(): bool
    {
        return property_exists($this, 'skipRenderOnSelections')
            ? $this->skipRenderOnSelections
            : true;
    }

    abstract protected function getModels(): Collection;
}
