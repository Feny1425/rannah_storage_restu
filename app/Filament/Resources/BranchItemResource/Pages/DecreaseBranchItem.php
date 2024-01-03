<?php

namespace App\Filament\Resources\BranchItemResource\Pages;

use App\Filament\Resources\BranchItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class DecreaseBranchItem extends EditRecord
{
    protected static string $resource = BranchItemResource::class;
    protected static ?string $title = "decrease";
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['quantity'] = '';
     
        return $data;
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['quantity'] = $data['quantity'] - $record['quantity'];
        $record->update($data);
        
        return $record;
    }
    protected function getForms(): array
    {
        return [
            'form' => $this->form(static::getResource()::form(
                $this->makeForm()
                    ->operation('decrease')
                    ->model($this->getRecord())
                    ->statePath($this->getFormStatePath())
                    ->columns($this->hasInlineLabels() ? 1 : 2)
                    ->inlineLabel($this->hasInlineLabels()),
            )),
        ];
    }
}
