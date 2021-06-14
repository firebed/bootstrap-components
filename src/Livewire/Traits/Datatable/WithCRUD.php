<?php


namespace Firebed\Components\Livewire\Traits\Datatable;


use Firebed\Components\Livewire\Traits\SendsNotifications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

/**
 * Trait WithCRUD
 * @package Firebed\Components\Livewire\Traits\Datatable
 *
 * @mixin Component
 * @mixin SendsNotifications
 */
trait WithCRUD
{
    public Model $model;
    public bool  $showEditingModal = false;

    public function mountWithCRUD(): void
    {
        $this->model = $this->makeEmptyModel();
    }

    public function renderingMountWithCRUD(): void
    {
        if (!$this->showEditingModal && $this->model->getKey()) {
            $this->model = $this->makeEmptyModel();
        }
    }

    public function create(): void
    {
        $this->clearErrors();

        $this->model = $this->makeEmptyModel();
        $this->showEditingModal = true;
    }

    public function edit(int $id): void
    {
        $this->clearErrors();

        $this->model = $this->findModel($id);
        $this->showEditingModal = true;
    }

    public function save(): void
    {
        $this->validate();

        DB::transaction(fn() => $this->model->save());

        $this->showSuccessToast('Model saved!');
        $this->showEditingModal = false;
    }

    abstract protected function makeEmptyModel();

    abstract protected function findModel($id);

    private function clearErrors(): void
    {
        if ($this->getErrorBag()->isEmpty()) {
            $this->skipRender();
        } else {
            $this->resetValidation();
        }
    }
}
