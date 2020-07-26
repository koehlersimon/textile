<?php
namespace SIMONKOEHLER\Textile\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;

class ParseViewHelper extends AbstractViewHelper {

    use CompileWithRenderStatic;

    public function initializeArguments(){
       $this->registerArgument('content', 'string', 'The content to parse', true);
       $this->registerArgument('disableLinks', 'boolean', 'Disables rendering of internal links to pages', false);
       $this->registerArgument('defaultLabel', 'string', 'The default label text for links without a label', false);
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
       if (!$arguments['disableLinks'] && preg_match_all('/\[link(.*?)\]/', $arguments['content'], $matches )) {
            $matches = array_key_exists( 1 , $matches) ? $matches[1] : array();
            foreach ($matches as $match) {
                $parts = explode(":",$match);
                if(count($parts) >= 2 && is_numeric($parts[1])){

                    $uri = $uriBuilder->reset()->setTargetPageUid(trim($parts[1]))->build();
                    $toReplace = "/\[link".$match."\]/";

                    if(!$parts[2] || $parts[2] === '' && $arguments['defaultLabel']){
                        $parts[2] = $arguments['defaultLabel'];
                    }
                    if($parts[3] && $parts[3] !== ''){
                        $target = ' target="'.$parts[3].'"';
                    }
                    if($parts[4] && $parts[4] !== ''){
                        $classes = ' class="'.$parts[4].'"';
                    }

                    if($uri !== ''){
                        $arguments['content'] = preg_replace($toReplace,'<a href="'.$uri.'" '.$target.$classes.'>'.$parts[2].'</a>', $arguments['content']);
                    }
                    else{
                        $arguments['content'] = preg_replace($toReplace,$parts[2], $arguments['content']);
                    }

                }
                else{
                    $arguments['content'] = $arguments['content'];
                }
            }
        }

       return $parser->parse($arguments['content']);
   }


}
