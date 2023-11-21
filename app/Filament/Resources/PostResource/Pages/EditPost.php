<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\DeleteAction::make(),
//            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
            PreviewAction::make(),
        ];
    }

    protected function getPreviewModalView(): string
    {
        return 'posts.index';
    }

    protected function getPreviewModalDataRecordKey(): string
    {
        return 'post';
    }
}
