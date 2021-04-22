<?php


namespace Firebed\Livewire\Traits;


trait WithCustomPaginationView
{
    public function paginationView(): string
    {
        return 'bs::pagination.livewire-paginator';
    }
}