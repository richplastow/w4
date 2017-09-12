w4
==

+ __Last update:__  2017/09/12
+ __Version:__      0.0.16


#### A collection of HTML snippets, for seamless webpage loads

[Homepage](http://richplastow.com/w4/) &nbsp;
[GitHub](https://github.com/richplastow/w4) &nbsp;
[NPM](https://www.npmjs.com/package/w4)

+ [a4:](a4.md) Keeps html-tag class names updated with w4 state
  [test](http://richplastow.com/w4/support/a4-test.html)
+ [b4:](b4.md) Checks whether the current browser is supported
  [test](http://richplastow.com/w4/support/b4-test.html)
+ [i4:](i4.md) Triggers an event when the fonts you specify load
  [test](http://richplastow.com/w4/support/i4-test.html)
+ [p4:](p4.md) Attempts to preload a sequence of asset-bundles
  [test](http://richplastow.com/w4/support/p4-test.html)




Author
------

Created by Rich Plastow, during development of richplastow.com.

+ __Homepage:__     [richplastow.com](http://richplastow.com)
+ __LinkedIn:__     [richardplastow](https://linkedin.com/in/richardplastow)
+ __GitHub:__       [richplastow](https://github.com/richplastow)
+ __Twitter:__      [@RichPlastow](https://twitter.com/RichPlastow)
+ __Location:__     Brighton, UK




Tested
------

+ __Android:__           Android Browser 2+, Chrome 34+, Firefox 51+, Samsung 3+
+ __iOS 9:__             UC Browser 10
+ __iOS 4:__             Safari 4
+ __Windows 10:__        Edge 14+, IE 11
+ __Windows 7:__         IE 10, Yandex 14
+ __Windows XP:__        Firefox 3+, Chrome 15+, Safari 4+, Opera 10+, IE 6+
+ __OS X Snow Leopard:__ Safari 4+




Changelog
---------

+ 0.0.1       Initial README.md, package.json, index.html, -4.js
+ 0.0.2       Proper homepage link
+ 0.0.3       Initial npm publish
+ 0.0.4       Rename -4 to w4 and rename DashFour to W4
+ 0.0.5       With b4, which checks that the current browser is supported
+ 0.0.6       Improved links
+ 0.0.7       With i4, which runs a callback when the fonts you specify load
+ 0.0.8       With a4, which keeps html-tag class names updated with w4 state
+ 0.0.9       a4 has CustomEvent polyfill for IE
+ 0.0.10      With p4, which attempts to preload a sequence of asset-bundles
+ 0.0.11      Added .npmignore for slimline NPM package
+ 0.0.12      Minor text amends
+ 0.0.13      Minor text amends
+ 0.0.14      b4 outputs to `<html class="...">`, not window.b4
+ 0.0.16      b4 has new class-names and lots of unit tests
+ 0.0.16      i4 has no callback, just the 'i4-ok' or 'i4-fail' events
