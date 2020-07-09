# Markdown Parser Textile for TYPO3 (textile)

## Features
- Provides a new content element of type "Markdown" wich lets you create Textile Markdown language code
- Provides a handy ViewHelper to use "<f:textile.parse>" in your own extensions!
- Based on the "Textile" Markdown parser: https://textile-lang.com/

## Installation

Install the extension by downloading it in the extension manager or on https://extensions.typo3.org/extension/ce_timeline/.

## Basic configuration

If you want to use the Markdown content element:

- Install the extension
- Clear caches
- Include static TypoScript Setup
- Include Page TS from page properties
- Create a new content element with the content element wizard

If you want to use the ViewHelper only:

- Install the extension
- Clear caches
- Insert {namespace textile=SIMONKOEHLER\Textile\ViewHelpers} on top of your fluid templates
- Use the ViewHelper like this: <textile:parse content="{bodytext}"/>

Here's a more detailed documentation:
https://simon-koehler.com/en/products/textile

## Support & Service

If you have any problems with the extension, please let me know! Since this is open source, I only guarantee 100% expert support when I get paid, but I also like to support the community. Please don't hesitate to open an issue here on GitHub or send a message: https://simon-koehler.com/en/contact

## Do you want to learn TYPO3? Here's what you need:
Video Training TYPO3 9 LTS (German language)
https://www.digistore24.com/redir/246076/GOCHILLA/