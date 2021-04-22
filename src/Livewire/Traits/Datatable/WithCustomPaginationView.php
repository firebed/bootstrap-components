<?php


namespace Firebed\Livewire\Traits\Datatable;


trait WithCustomPaginationView
{
    public function paginationView(): string
    {
        return 'bs::paginator';
    }
}