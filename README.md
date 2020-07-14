# Markdown content with "Textile" for TYPO3 (textile)

[![Twitter Follow](https://img.shields.io/twitter/follow/koehlersimon.svg?style=social)](https://twitter.com/koehlersimon)
[![Donate](https://img.shields.io/badge/paypal-donate-yellow.svg)](https://paypal.me/typo3freelancer)  

*This extension is a BETA version and NOT available in the official TYPO3 repository yet. Please download it only here for testing purposes.*

## Features
- Provides a new content element of type "Markdown" wich lets you create Textile Markdown language code
- Provides a handy ViewHelper to use "<f:textile.parse>" in your own extensions!
- Based on the "Textile" Markdown parser: https://textile-lang.com/
- Renders shortcodes of internal links to pages!

### Official documentation:
You will find the official documentation als in German and Spanish here:
https://simon-koehler.com/en/products/textile

## Installation
Install the extension by downloading it in the extension manager or on https://extensions.typo3.org/extension/textile/.

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

## How to insert an internal link

The shortcode functin is pretty simple. You can define the page UID of your desired target page, a link title, target and CSS classes.
Use the syntac below in your Markdown code:

```markdown
[link:4:Labeltext:_blank:my-css-class]
```
### HTML output:

```html
<a href="/yourpageslug/" target="_blank" class="my-css-class">Labeltext</a>
```

## Support & Service

If you have any problems with the extension, please let me know! Since this is open source, I only guarantee 100% expert support when I get paid, but I also like to support the community. Please don't hesitate to open an issue here on GitHub or send a message: https://simon-koehler.com/en/contact

## Do you want to learn TYPO3? Here's what you need:
Video Training TYPO3 9 LTS (German language)
https://www.digistore24.com/redir/246076/GOCHILLA/
