<?php


namespace Firebed\Livewire\Traits\Datatable;


/**
 * Trait WithSorting
 * @package Firebed\Livewire\Traits\Datatable
 *
 * @property ?array queryString
 */
trait WithSorting
{
    public string $sortField     = '';
    public string $sortDirection = 'asc';

    public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    protected function setSorting($field, $direction): void
    {
        $this->sortField = $field;
        $this->sortDirection = $direction;
    }

    public function getQueryString()
    {
        $queryString = method_exists($this, 'queryString')
            ? $this->queryString()
            : $this->queryString;

        return array_merge([
            'sortField'     => ['except' => ''],
            'sortDirection' => ['except' => 'asc']
        ], $queryString);
    }
}