<?php


namespace App\Filament\Resources;

use App\Models\Student;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\StudentResource\Pages;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Students';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nim')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\Select::make('fakultas')
                    ->options([
                        'FTI' => 'FTI',
                        'FIK' => 'FIK',
                        'FEB' => 'FEB',
                        'STIT' => 'STIT',
                    ])
                    ->required(),
                Forms\Components\Select::make('jurusan')
                    ->options([
                        'Teknik Industri' => 'Teknik Industri',
                        'Teknik Kimia' => 'Teknik Kimia',
                        'Teknik Informatika' => 'Teknik Informatika',
                        'Manajemen Informatika' => 'Manajemen Informatika',
                        'Manajemen' => 'Manajemen',
                        'Akuntansi' => 'Akuntansi',
                        'Bisnis Digital' => 'Bisnis Digital',
                        'Pendidikan Agama' => 'Pendidikan Agama',
                        'PAUD' => 'PAUD',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('fakultas'),
                Tables\Columns\TextColumn::make('jurusan'),
            ])
             ->actions([
                Tables\Actions\ViewAction::make(),   // 🔍 tombol detail
                Tables\Actions\EditAction::make(),   // ✏️ tombol edit
                Tables\Actions\DeleteAction::make(), // 🗑️ tombol delete
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);

    }


    public static function getPages(): array
    {
        return [

            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}

