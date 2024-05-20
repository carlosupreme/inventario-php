<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class DeleteModal extends Component
{
    public $modalId;
    public $identifier;
    public $open = false;
    public $action;
    public $title;
    public $content;
    public $actionName;

    #[On('selectItem')]
    public function selectItem($identifier): void
    {
        $this->identifier = $identifier;
        $this->open = true;
    }

    public function confirm(): void
    {
        $this->dispatch($this->action, $this->identifier);
    }

    #[On('actionCompleted')]
    public function actionCompleted(): void
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
