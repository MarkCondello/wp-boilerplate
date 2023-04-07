import domReady from '@roots/sage/client/dom-ready';
import 'foundation-sites';
import 'what-input';
/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  $(document).foundation();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
