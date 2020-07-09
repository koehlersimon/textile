<?php
namespace SIMONKOEHLER\Textile\Form\Element;

use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;

class MarkdownPreview extends AbstractFormElement
{
    public function render()
    {
        // Custom TCA properties and other data can be found in $this->data, for example the above
        // parameters are available in $this->data['parameterArray']['fieldConf']['config']['parameters']
        $result = $this->initializeResultArray();
        $result['html'] .= '<script src="../typo3conf/ext/textile/Resources/Public/JavaScript/Editor.js"></script>';
        $result['html'] .= '<div id="markdown-preview" style="background:white;padding:20px;border-radius:5px;"></div>';
        return $result;
    }
}
