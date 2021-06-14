<?php


namespace Firebed\Components\Livewire\Traits;


trait WithCustomPaginationView
{
    public function paginationView(): string
    {
        return 'bs::pagination.livewire-paginator';
    }
}