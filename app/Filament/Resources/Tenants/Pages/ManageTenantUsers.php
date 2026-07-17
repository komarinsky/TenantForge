<?php

namespace App\Filament\Resources\Tenants\Pages;

use App\Filament\Resources\Tenants\TenantResource;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Components\EmbeddedTable;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ManageTenantUsers extends Page implements HasTable
{
    use InteractsWithRecord;
    use InteractsWithTable;

    protected static string $resource = TenantResource::class;

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    public function getDefaultActionRecord(Action $action): ?Model
    {
        if ($action->getTable()) {
            return null;
        }

        return $this->getRecord();
    }

    public function getTitle(): string|Htmlable
    {
        return 'Users';
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            EmbeddedTable::make(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->records(fn (?string $search): Collection => $this->getRecord()->run(
                fn () => User::query()
                    ->when(
                        $search,
                        fn ($query, $search) => $query->where(
                            fn ($query) => $query
                                ->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                        )
                    )
                    ->latest()
                    ->get()
                    ->each(fn (User $user) => $user->setConnection(null))
            ))
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),
            ])
            ->headerActions([
                Action::make('createUser')
                    ->label('Add user')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email / login')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->required()
                            ->maxLength(255),
                    ])
                    ->action(function (array $data): void {
                        $this->getRecord()->run(function () use ($data): void {
                            Validator::make($data, [
                                'name' => ['required', 'string', 'max:255'],
                                'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
                                'password' => ['required', 'string', 'min:8'],
                            ])->validate();

                            User::create($data);
                        });
                    }),
            ]);
    }
}
