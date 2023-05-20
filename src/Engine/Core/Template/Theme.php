<?php

namespace App\Engine\Core\Template;

use Exception;

class Theme
{
    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%'
    ];

    private array $templatePathEnv = [
        'Admin' => APP_DIR . 'Admin/View/',
        'Cms' => APP_DIR . 'Content/themes/default/',
    ];

    protected array $data = [];

    public string $url = '';


    public function header(?string $name = null): void
    {
        $name = $name ? sprintf(self::RULES_NAME_FILE['header'], $name) : 'header';

        $this->loadTemplateFile($name);
    }

    public function footer(string $name = null): void
    {
        $name = $name ? sprintf(self::RULES_NAME_FILE['footer'], $name) : 'footer';

        $this->loadTemplateFile($name);
    }

    public function sidebar(string $name = null): void
    {
        $name = $name ? sprintf(self::RULES_NAME_FILE['sidebar'], $name): 'sidebar';

        $this->loadTemplateFile($name);
    }

    public function block(string $name = null , array $data = []): void
    {
        $name ? $this->loadTemplateFile($name, $data) : 'block';

    }

    /**
     * @throws Exception
     */
    public function loadTemplateFile(string $nameFile, array $data = []): void
    {
//        $templateFile = APP_DIR . 'Content/themes/default/' . $nameFile . '.php';
        $templateFile = $this->templatePathEnv[$_SERVER['ENV']] . $nameFile . '.php';

        if (is_file($templateFile)){
            extract($data);
            require_once $templateFile;
        } else {
            throw new Exception(sprintf('View file %s does not exist!', $templateFile));
        }
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
