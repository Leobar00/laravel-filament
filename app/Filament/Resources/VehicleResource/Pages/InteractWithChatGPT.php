<?php

// App/Filament/Resources/VehicleResource/Pages/InteractWithChatGPT.php

namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Resources\VehicleResource;
use App\Http\Controllers\OpenAIController;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Button;


class InteractWithChatGPT extends Page
{
    protected static string $view = 'filament.resources.vehicle-resource.pages.interact-with-chatgpt';
    protected static string $resource = VehicleResource::class;

    protected function getFormSchema(): array
    {
        return [
            Textarea::make('prompt')
                ->label('Prompt for ChatGPT')
                ->required(),

            Button::make('Ask ChatGPT')
                ->action('submit')
        ];
    }

    public function submit()
    {
        $response = (new OpenAIController())->askOpenAI(request());

        $this->notify('success', 'Response received from ChatGPT');
        $this->form->fill([
            'response' => $response,
        ]);
    }
}
