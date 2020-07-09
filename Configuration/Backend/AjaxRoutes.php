<?php
use SIMONKOEHLER\Textile\Controller;

return [
    'previewMarkdown' => [
        'path' => '/preview/markup',
        'target' => Controller\PreviewController::class . '::markdown'
    ],
];
