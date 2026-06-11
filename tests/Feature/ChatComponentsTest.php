<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class ChatComponentsTest extends TestCase
{
    public function test_chat_components_render_together(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::chat-layout height="36rem">
    <x-slot:sidebar>
        <x-sampaui::chat-sidebar
            title="Atendimento"
            subtitle="2 conversas"
            :conversations="[
                ['name' => 'Ana Souza', 'preview' => 'Enviei os documentos.', 'time' => '09:42', 'status' => 'online', 'unread' => 2, 'active' => true],
                ['name' => 'Bruno Lima', 'preview' => 'Podemos falar hoje?', 'time' => '08:15'],
            ]"
        />
    </x-slot:sidebar>

    <x-sampaui::chat-conversation name="Ana Souza" subtitle="Online agora">
        <x-sampaui::chat-message time="09:40">Bom dia.</x-sampaui::chat-message>
        <x-sampaui::chat-message from="me" time="09:41" status="Lida">Bom dia, Ana.</x-sampaui::chat-message>
        <x-sampaui::chat-message from="system">Atendimento transferido.</x-sampaui::chat-message>

        <x-slot:composer>
            <x-sampaui::chat-composer wire:submit.prevent="sendMessage" wire:model.live="message" />
        </x-slot:composer>
    </x-sampaui::chat-conversation>
</x-sampaui::chat-layout>
BLADE);

        $html->assertSee('Atendimento')
            ->assertSee('Ana Souza')
            ->assertSee('Enviei os documentos.')
            ->assertSee('Bom dia.')
            ->assertSee('Atendimento transferido.')
            ->assertSee('wire:submit.prevent="sendMessage"', false)
            ->assertSee('wire:model.live="message"', false)
            ->assertSee('rounded-br-sm bg-primary text-white', false)
            ->assertSee('rounded-bl-sm bg-white text-secondary', false)
            ->assertSee('grid min-h-0 overflow-hidden rounded-default', false);
    }

    public function test_chat_sidebar_search_model_goes_to_input(): void
    {
        $html = $this->blade('<x-sampaui::chat-sidebar wire:model.live="search" />');

        $html->assertSee('wire:model.live="search"', false)
            ->assertSee('name="chat_search"', false);
    }
}
