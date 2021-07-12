<?php

namespace Apiato\Core\Generator\Commands;

use Apiato\Core\Generator\GeneratorCommand;
use Apiato\Core\Generator\Interfaces\ComponentsGenerator;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Str;
use LogicException;

class FactoryGenerator extends GeneratorCommand implements ComponentsGenerator
{
    /**
     * User required/optional inputs expected to be passed while calling the command.
     * This is a replacement of the `getArguments` function "which reads from the console whenever it's called".
     *
     * @var array
     */
    public array $inputs = [
        ['model', 'm', InputOption::VALUE_OPTIONAL, 'The model that the factory applies to'],
    ];

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'apiato:generate:factory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Factory file for a Container';

    /**
     * The type of class being generated.
     */
    protected string $fileType = 'Factory';

    /**
     * The structure of the file path.
     */
    protected string $pathStructure = '{section-name}/{container-name}/Data/Factories/*';

    /**
     * The structure of the file name.
     */
    protected string $nameStructure = '{file-name}';

    /**
     * The name of the stub file.
     */
    protected string $stubName = 'factory.stub';

    /**
     * @return array
     */
    public function getUserInputs()
    {
        $model = $this->checkParameterOrAsk('model', 'Enter the name of the model that the factory applies to.', $this->containerName);

        return [
            'path-parameters' => [
                'section-name' => $this->sectionName,
                'container-name' => $this->containerName,
            ],
            'stub-parameters' => [
                '_section-name' => Str::lower($this->sectionName),
                'section-name' => $this->sectionName,
                '_container-name' => Str::lower($this->containerName),
                'container-name' => $this->containerName,
                'class-name' => $this->fileName,
                'model' => $model,
            ],
            'file-parameters' => [
                'file-name' => $this->fileName,
            ],
        ];
    }

    /**
     * Get the default file name for this component to be generated
     */
    public function getDefaultFileName(): string
    {
        return $this->containerName . 'Factory';
    }
}
