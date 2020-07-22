<?php
namespace SIMONKOEHLER\Textile\Controller;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Http\HtmlResponse;

class PreviewController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * function markdown
     *
     * @return void
     */
    public function markdown(\Psr\Http\Message\ServerRequestInterface $request)
    {
        $queryParams = $request->getQueryParams();
        $systemRoot = \TYPO3\CMS\Core\Core\Environment::getPublicPath();
        $parserLocation = $systemRoot.'/typo3conf/ext/textile/Resources/Private/Libs/php-textile-master/src/Netcarver/Textile/';
        require_once $parserLocation.'DataBag.php';
        require_once $parserLocation.'Tag.php';
        require_once $parserLocation.'Parser.php';
        $parser = new \Netcarver\Textile\Parser();
        $content = $request->getParsedBody()['bodytext'];
        return new HtmlResponse($parser->parse($content));
    }

}
