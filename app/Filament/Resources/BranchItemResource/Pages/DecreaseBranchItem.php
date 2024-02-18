<?php

namespace App\Filament\Resources\BranchItemResource\Pages;

use App\Filament\Resources\BranchItemResource;
use App\Models\Stockables\BranchItem;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DecreaseBranchItem extends EditRecord
{
    protected static string $resource = BranchItemResource::class;

    protected function authorizeAccess(): void
    {
        $user = Auth::user();
        abort_if(!$user->can('decrease BranchItem'), 403);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {

        $record = BranchItem::find($data['id']);
        $item = $record->item;
        static::editName($item);


        $data['max'] = $data['quantity'];
        $data['quantity'] = '';

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['quantity'] = $record['quantity'] - $data['quantity'];
        $record->update($data);
        $item = $record->item;
        static::editName($item);

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


    public static ?string $t = "sd";

    public function getTitle(): string
    {
        return static::$t;
    }

    public static function editName($model)
    {
        switch (app()->getLocale()) {
            case "en":
                static::$t = "Dispatch " . $model->name_en;
                break;
            case "ar":
                static::$t = "إخراج " . $model->name;
                break;
        }
    }
}
