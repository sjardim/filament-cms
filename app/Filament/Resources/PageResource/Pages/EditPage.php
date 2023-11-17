<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

class EditPage extends EditRecord
{
    use HasPreviewModal;

    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
//            Actions\ForceDeleteAction::make(),
//            Actions\RestoreAction::make(),
            PreviewAction::make(),
        ];
    }

    protected function getPreviewModalView()
    {
        $record = $this->getRecord();

        return view('pages.preview', [
            'page' => $this->getRecord(),
            'title' => $record->title,
        ]);
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'page';
    }
}
