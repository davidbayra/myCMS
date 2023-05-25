<?php

namespace App\Engine\Core\Template;

use App\Engine\Core\Template\Theme;
use function PHPUnit\Framework\once;

class View
{
    private array $templatePathEnv = [
        'Admin' => APP_DIR . 'Admin/View/',
        'Cms' => APP_DIR . 'Content/themes/default/',
    ];

    public function __construct(protected $theme = new Theme())
    {
    }

    public function render($template, $vars = []): void
    {
        $templatePath = $this->templatePathEnv[$_SERVER['ENV']] . $template . '.php';

        if (!is_file($templatePath)) {
            throw new \InvalidArgumentException(
                sprintf('Template %s not found in %s', $template, $templatePath)
            );
        }

        $this->theme->setData($vars);
        extract($vars);

        ob_start();
        ob_implicit_flush(0);

        try {
            require $templatePath;
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }

        $buffer =  ob_get_clean();

    }

    private function getTemplatePath($template, $env = 'Cms'): string
    {
        return $this->templatePathEnv[$env] . $template . '.php';
    }
}
