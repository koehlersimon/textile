<?php
namespace SIMONKOEHLER\Textile\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
       $objectManager = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
       $uriBuilder = $objectManager->get(\TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder::class);

       // Find all link shortcodes
       if (preg_match_all('/\[link(.*?)\]/', $arguments['content'], $matches )) {
            $matches = array_key_exists( 1 , $matches) ? $matches[1] : array();
            foreach ($matches as $match) {
                $parts = explode(":",$match);
                if($parts[2] && $parts[2] !== ''){
                    $target = ' target="'.$parts[2].'"';
                }
                if($parts[3] && $parts[3] !== ''){
                    $classes = ' class="'.$parts[3].'"';
                }
                $uri = $uriBuilder->reset()->setTargetPageUid(trim($parts[0]))->build();
                $toReplace = "/\[link".$match."\]/";
                if($uri !== ''){
                    $arguments['content'] = preg_replace($toReplace,'<a href="'.$uri.'" '.$target.$classes.'>'.$parts[1].'</a>', $arguments['content']);
                }
                else{
                    $arguments['content'] = preg_replace($toReplace,$parts[1], $arguments['content']);
                }
            }
        }
       return $parser->parse($arguments['content']);
   }

}
