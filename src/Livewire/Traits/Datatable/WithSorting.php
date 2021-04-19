<?php


namespace Firebed\Livewire\Traits\Datatable;


/**
 * Trait WithSorting
 * @package Firebed\Livewire\Traits\Datatable
 *
 */
trait WithSorting
{
    public string $sortField     = '';
    public string $sortDirection = 'asc';

    protected $queryString = [
        'sortField'     => ['except' => ''],
        'sortDirection' => ['except' => 'asc']
    ];

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
}