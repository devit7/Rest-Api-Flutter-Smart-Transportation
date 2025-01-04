<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HalteResource\Pages;
use App\Filament\Resources\HalteResource\RelationManagers;
use App\Models\Halte;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class HalteResource extends Resource
{
    protected static ?string $model = Halte::class;
    protected static ?string $navigationIcon = 'heroicon-s-building-office-2';
    protected static ?string $navigationGroup = 'Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('namaHalte'),
                TextColumn::make('lokasihalte'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHaltes::route('/'),
            'create' => Pages\CreateHalte::route('/create'),
            'edit' => Pages\EditHalte::route('/{record}/edit'),
        ];
    }
}
