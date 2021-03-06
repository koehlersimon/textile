<?php
namespace SIMONKOEHLER\Textile\Form\Element;

use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;

class MarkupPreview extends AbstractFormElement
{
    public function render()
    {
        $result = $this->initializeResultArray();
        $result['html'] .= '<div id="markup-preview" style="background:white;padding:20px;border-radius:5px;"></div>';
        $result['html'] .= '<script src="../typo3conf/ext/textile/Resources/Public/JavaScript/Editor.js"></script>';
        return $result;
    }
}
