<?php

namespace App\Filament\ContentBlocks;

use Closure;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use League\CommonMark\Input\MarkdownInput;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\AbstractContentBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\Concerns\HasBackgroundColour;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\Concerns\HasBlockStyle;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\BackgroundColourField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\BlockStyleField;
use Statikbe\FilamentFlexibleContentBlocks\FilamentFlexibleBlocksConfig;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasContentBlocks;

class AccordionBlock extends AbstractContentBlock
{
    use HasBackgroundColour;
    use HasBlockStyle;

    public ?string $main_title;
    public ?string $summary;
    public ?array $repeater_items;


    /**
     * Create a new component instance.
     */
    public function __construct(HasContentBlocks $record, ?array $blockData)
    {
        parent::__construct($record, $blockData);

        $this->main_title = $blockData['main_title'] ?? null;
        $this->summary = $blockData['summary'] ?? null;
        $this->repeater_items = $blockData['accordion_item'] ?? null;

        $this->backgroundColourType = $blockData['background_colour'] ?? null;
        $this->setBlockStyle($blockData);
    }

    public static function getIcon(): string
    {
        return 'heroicon-o-queue-list';
    }

    /**
     * {@inheritDoc}
     */
    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            TextInput::make('main_title')
                ->label(static::getFieldLabel(trans('content-blocks.form_component.content_blocks.accordion.main_title'))),
            RichEditor::make('summary')
                ->label(static::getFieldLabel(trans('content-blocks.form_component.content_blocks.accordion.summary')))
                ->extraAttributes([
                    'style' => 'height: 150px;',
                ])
                ->disableToolbarButtons([
                    'attachFiles',
                    'blockquote',
                    'codeBlock',
                    'h2',
                    'h3',
                ]),
            Repeater::make('accordion_item')
                ->label(trans('content-blocks.form_component.content_blocks.accordion.items'))
                ->schema([
                    TextInput::make('title')
                        ->label(static::getFieldLabel(trans('content-blocks.form_component.content_blocks.accordion.item_title')))
                        ->required(),
                    RichEditor::make('content')
                        ->label(static::getFieldLabel(trans('content-blocks.form_component.content_blocks.accordion.item_content')))
                        ->required(),
                ])
                ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                ->addActionLabel(trans('content-blocks.form_component.content_blocks.accordion.add_item'))
                ->collapsible(),
            Grid::make(2)->schema([
                BackgroundColourField::create(static::class),
                BlockStyleField::create(static::class),
            ]),
        ];
    }

    public function getSearchableContent(): array
    {
        $searchable = [];

        $this->addSearchableContent($searchable, $this->repeater_items->title);
        $this->addSearchableContent($searchable, $this->repeater_items->content);

        return $searchable;
    }

    public static function getNameSuffix(): string
    {
        return 'accordion';
    }

    public static function getName(): string
    {
        return 'Accordion';
    }

    public static function getLabel(): string
    {
        $name = static::getNameSuffix();

        return trans("content-blocks.form_component.content_blocks.{$name}.label");
    }

    public static function getFieldLabel(string $field): string
    {
        return $field;
    }

    public function render()
    {
        return view("content-blocks.accordion");
    }

    public static function visible(): bool|Closure
    {
        //only show block when templates are set in the config:
        return ! empty(FilamentFlexibleBlocksConfig::getTemplatesConfig(static::class));
    }
}
