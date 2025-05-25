<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuoteResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(2)
            ->schema([
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        TextEntry::make('content')
                            ->columnSpanFull(),
                    ]),

                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        TextEntry::make('author.name')
                            ->url(fn ($record) => AuthorResource::getUrl('view', ['record' => $record->author]))
                            ->label('Author'),
                        TextEntry::make('author.profession')
                            ->label('Profession'),

                        ImageEntry::make('author.avatar_url')
                            ->label('Avatar')
                            ->visible(fn ($record) => $record->author->avatar_url),

                        TextEntry::make('book.title')
                            ->label('Book')
                            ->visible(fn ($record) => $record->book)
                            ->columnSpanFull(),
                        TextEntry::make('book.author')
                            ->label('Book Author')
                            ->visible(fn ($record) => $record->book && $record->book->author),
                        TextEntry::make('book.publication_year')
                            ->label('Publication Year')
                            ->visible(fn ($record) => $record->book && $record->book->publication_year),
                    ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('author_id')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('profession')
                            ->maxLength(255),
                    ])
                    ->required(),

                Forms\Components\Select::make('book_id')
                    ->relationship('book', 'title')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('author')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('publication_year')
                            ->maxLength(4),
                        Forms\Components\TextInput::make('isbn')
                            ->maxLength(20),
                    ]),

                Forms\Components\MarkdownEditor::make('content')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'heading',
                        'italic',
                        'redo',
                        'strike',
                        'undo',
                        'orderedList',
                        'bulletList',
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content')
                    ->tooltip(fn (string $state) => $state)
                    ->limit(60)
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('book.title')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('author_id')
                    ->label('Author')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('book_id')
                    ->label('Book')
                    ->relationship('book', 'title')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListQuotes::route('/'),
            'create' => Pages\CreateQuote::route('/create'),
            'view' => Pages\ViewQuote::route('/{record}'),
            'edit' => Pages\EditQuote::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
