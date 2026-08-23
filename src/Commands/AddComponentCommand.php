<?php

namespace SampaUI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use SampaUI\Support\ComponentRegistry;

class AddComponentCommand extends Command
{
    protected $signature = 'sampaui:add
        {components?* : Componentes a serem copiados para o projeto (ex: button modal datatable)}
        {--all : Copiar todos os 48 componentes disponíveis}
        {--force : Sobrescrever arquivos de componentes existentes}
        {--path= : Caminho customizado para salvar os componentes}';

    protected $description = 'Copia o código-fonte Blade dos componentes SampaUI diretamente para o seu projeto (estilo shadcn).';

    public function handle(): int
    {
        $all = (bool) $this->option('all');
        $components = (array) $this->argument('components');
        $force = (bool) $this->option('force');
        $targetDir = $this->option('path')
            ? base_path((string) $this->option('path'))
            : resource_path('views/components/sampaui');

        $available = ComponentRegistry::all();
        $sourceDir = dirname(__DIR__, 2).'/resources/views/components';

        if ($all) {
            $componentsToCopy = array_keys($available);
        } elseif (! empty($components)) {
            $componentsToCopy = $components;
        } else {
            $this->components->error('Por favor, informe ao menos um componente ou use a opção --all.');
            $this->line('Exemplo: <fg=cyan>php artisan sampaui:add button modal table</>');
            $this->line('Exemplo: <fg=cyan>php artisan sampaui:add --all</>');

            return self::FAILURE;
        }

        File::ensureDirectoryExists($targetDir);

        $copied = 0;
        $skipped = 0;

        foreach ($componentsToCopy as $slug) {
            $slug = strtolower(trim($slug));
            $sourceFile = $sourceDir.'/'.$slug.'.blade.php';
            $targetFile = $targetDir.'/'.$slug.'.blade.php';

            if (! File::exists($sourceFile)) {
                $this->components->warn("Componente '{$slug}' não encontrado no catálogo SampaUI.");
                $skipped++;
                continue;
            }

            if (File::exists($targetFile) && ! $force) {
                $this->components->warn("Componente '{$slug}' já existe em {$targetFile}. Use --force para sobrescrever.");
                $skipped++;
                continue;
            }

            File::copy($sourceFile, $targetFile);
            $this->components->info("✔ Componente <x-sampaui::{$slug} /> copiado para: {$targetFile}");
            $copied++;
        }

        $this->newLine();
        $this->components->info("Total: {$copied} componente(s) adicionado(s) com sucesso.");

        return self::SUCCESS;
    }
}
