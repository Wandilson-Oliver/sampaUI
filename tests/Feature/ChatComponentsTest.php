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
            ->assertSee('rounded-bl-sm border border-border bg-surface text-secondary', false)
            ->assertSee('grid min-h-0 overflow-hidden rounded-default', false)
            ->assertSee('chat:open-conversation', false)
            ->assertSee('SampaUI.chatComposer', false)
            ->assertSee('SampaUI.chatConversation', false)
            ->assertSee('aria-label="Voltar para conversas"', false);
    }

    public function test_chat_sidebar_search_model_goes_to_input(): void
    {
        $html = $this->blade('<x-sampaui::chat-sidebar wire:model.live="search" />');

        $html->assertSee('wire:model.live="search"', false)
            ->assertSee('name="chat_search"', false);
    }

    public function test_chat_components_support_empty_typing_counter_and_links(): void
    {
        $sidebar = $this->blade(<<<'BLADE'
<x-sampaui::chat-sidebar :conversations="[
    ['id' => 10, 'name' => 'Ana', 'typing' => true, 'href' => '/chat/10', 'unread' => 120],
]" />
BLADE);

        $sidebar->assertSee('href="/chat/10"', false)
            ->assertSee('Digitando...')
            ->assertSee('99+')
            ->assertSee('id: 10', false);

        $this->blade('<x-sampaui::chat-conversation empty />')
            ->assertSee('Nenhuma mensagem ainda')
            ->assertSee('bi bi-chat-left-dots', false);

        $this->blade('<x-sampaui::chat-composer max-length="500" show-counter />')
            ->assertSee('maxlength="500"', false)
            ->assertSee('x-text="valueLength"', false)
            ->assertSee('aria-label="Enviar mensagem"', false);
    }
}
