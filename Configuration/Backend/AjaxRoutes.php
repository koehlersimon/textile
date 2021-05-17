<?php
use SIMONKOEHLER\Textile\Controller;
return [
    'previewMarkup' => [
        'path' => '/preview/markup',
        'target' => Controller\PreviewController::class . '::markup'
    ],
];
