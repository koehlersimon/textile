<?php
namespace SIMONKOEHLER\Textile\UserFuncs;

class Markdown{

    public function preview($PA, $fObj) {
        //$videoType = $PA['row']['videotype'][0];
        $formField  = '<div class="form-control-wrap">';
        $formField .= '<textarea class="form-control" name="' . $PA['itemFormElName'] . '" onchange="' . htmlspecialchars(implode('', $PA['fieldChangeFunc'])) . '">';
        $formField .= htmlspecialchars($PA['itemFormElValue']).'</textarea>';
        //$formField .= '';
        //$formField .= $PA['onFocus'];
        return $formField;
    }

}
