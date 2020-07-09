mod.wizards.newContentElement.wizardItems.common {
    elements {
        textile {
            iconIdentifier = textile-icon
            title = LLL:EXT:textile/Resources/Private/Language/locallang.xlf:textile.widget.title
            description = LLL:EXT:textile/Resources/Private/Language/locallang.xlf:textile.widget.description
            tt_content_defValues {
                CType = textile
            }
        }
    }
    show := addToList(textile)
}

//mod.web_layout.tt_content.preview.textile = EXT:textile/Resources/Private/Templates/Preview/H1_Home.html
