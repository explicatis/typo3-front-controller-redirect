<?php declare(strict_types=1);

namespace Explicatis\Typo3FrontControllerRedirect;

class RewriteTypo3FrontController
{
    public static function rewrite(): void
    {
        copy(__DIR__ . '/../new_index.php', 'public/index.php');
    }
}
