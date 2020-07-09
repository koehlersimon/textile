<?php
namespace SIMONKOEHLER\Textile\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class ParseViewHelper extends AbstractViewHelper
{

    use CompileWithRenderStatic;

    public function initializeArguments(){
       $this->registerArgument('content', 'string', 'The content to parse', true);
    }

   public static function renderStatic(
       array $arguments,
       \Closure $renderChildrenClosure,
       RenderingContextInterface $renderingContext
   ) {
       $systemRoot = \TYPO3\CMS\Core\Core\Environment::getPublicPath();
       $parserLocation = $systemRoot.'/typo3conf/ext/textile/Resources/Private/Libs/php-textile-master/src/Netcarver/Textile/';
       require_once $parserLocation.'DataBag.php';
       require_once $parserLocation.'Tag.php';
       require_once $parserLocation.'Parser.php';
       $parser = new \Netcarver\Textile\Parser();
       return $parser->parse($arguments['content']);
   }

   // Todo: Create functionality to render dynamic links to internal pages and records!
   /*
   private function renderTypoLinks(){

   }
   */

}
