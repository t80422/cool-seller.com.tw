<!DOCTYPE html>
<html lang="en-GB" class="no-js">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Industrial &#8211; Industry and Engineering WordPress Theme</title>
  <meta name="robots" content="noindex, nofollow" />
  <style>
    img:is([sizes="auto" i], [sizes^="auto," i]) {
      contain-intrinsic-size: 3000px 1500px;
    }
  </style>
  <link rel="dns-prefetch" href="//code.jivosite.com" />
  <link rel="dns-prefetch" href="//fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
  <link
    rel="alternate"
    type="application/rss+xml"
    title="Industrial &raquo; Feed"
    href="feed/index.htm" />
  <link
    rel="alternate"
    type="application/rss+xml"
    title="Industrial &raquo; Comments Feed"
    href="comments/feed/index.htm" />
  <script type="text/javascript">
    /* <![CDATA[ */
    window._wpemojiSettings = {
      baseUrl: "https:\/\/s.w.org\/public/images\/core\/emoji\/15.0.3\/72x72\/",
      ext: ".png",
      svgUrl: "https:\/\/s.w.org\/public/images\/core\/emoji\/15.0.3\/svg\/",
      svgExt: ".svg",
      source: {
        concatemoji: "https:\/\/industrial.themechampion.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.7.1",
      },
    };
    /*! This file is auto-generated */
    !(function(i, n) {
      var o, s, e;

      function c(e) {
        try {
          var t = {
            supportTests: e,
            timestamp: new Date().valueOf()
          };
          sessionStorage.setItem(o, JSON.stringify(t));
        } catch (e) {}
      }

      function p(e, t, n) {
        e.clearRect(0, 0, e.canvas.width, e.canvas.height),
          e.fillText(t, 0, 0);
        var t = new Uint32Array(
            e.getImageData(0, 0, e.canvas.width, e.canvas.height).data
          ),
          r =
          (e.clearRect(0, 0, e.canvas.width, e.canvas.height),
            e.fillText(n, 0, 0),
            new Uint32Array(
              e.getImageData(0, 0, e.canvas.width, e.canvas.height).data
            ));
        return t.every(function(e, t) {
          return e === r[t];
        });
      }

      function u(e, t, n) {
        switch (t) {
          case "flag":
            return n(
                e,
                "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f",
                "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f"
              ) ?
              !1 :
              !n(
                e,
                "\ud83c\uddfa\ud83c\uddf3",
                "\ud83c\uddfa\u200b\ud83c\uddf3"
              ) &&
              !n(
                e,
                "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f",
                "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"
              );
          case "emoji":
            return !n(
              e,
              "\ud83d\udc26\u200d\u2b1b",
              "\ud83d\udc26\u200b\u2b1b"
            );
        }
        return !1;
      }

      function f(e, t, n) {
        var r =
          "undefined" != typeof WorkerGlobalScope &&
          self instanceof WorkerGlobalScope ?
          new OffscreenCanvas(300, 150) :
          i.createElement("canvas"),
          a = r.getContext("2d", {
            willReadFrequently: !0
          }),
          o = ((a.textBaseline = "top"), (a.font = "600 32px Arial"), {});
        return (
          e.forEach(function(e) {
            o[e] = t(a, e, n);
          }),
          o
        );
      }

      function t(e) {
        var t = i.createElement("script");
        (t.src = e), (t.defer = !0), i.head.appendChild(t);
      }
      "undefined" != typeof Promise &&
        ((o = "wpEmojiSettingsSupports"),
          (s = ["flag", "emoji"]),
          (n.supports = {
            everything: !0,
            everythingExceptFlag: !0
          }),
          (e = new Promise(function(e) {
            i.addEventListener("DOMContentLoaded", e, {
              once: !0
            });
          })),
          new Promise(function(t) {
            var n = (function() {
              try {
                var e = JSON.parse(sessionStorage.getItem(o));
                if (
                  "object" == typeof e &&
                  "number" == typeof e.timestamp &&
                  new Date().valueOf() < e.timestamp + 604800 &&
                  "object" == typeof e.supportTests
                )
                  return e.supportTests;
              } catch (e) {}
              return null;
            })();
            if (!n) {
              if (
                "undefined" != typeof Worker &&
                "undefined" != typeof OffscreenCanvas &&
                "undefined" != typeof URL &&
                URL.createObjectURL &&
                "undefined" != typeof Blob
              )
                try {
                  var e =
                    "postMessage(" +
                    f.toString() +
                    "(" + [JSON.stringify(s), u.toString(), p.toString()].join(
                      ","
                    ) +
                    "));",
                    r = new Blob([e], {
                      type: "text/javascript"
                    }),
                    a = new Worker(URL.createObjectURL(r), {
                      name: "wpTestEmojiSupports",
                    });
                  return void(a.onmessage = function(e) {
                    c((n = e.data)), a.terminate(), t(n);
                  });
                } catch (e) {}
              c((n = f(s, u, p)));
            }
            t(n);
          })
          .then(function(e) {
            for (var t in e)
              (n.supports[t] = e[t]),
              (n.supports.everything =
                n.supports.everything && n.supports[t]),
              "flag" !== t &&
              (n.supports.everythingExceptFlag =
                n.supports.everythingExceptFlag && n.supports[t]);
            (n.supports.everythingExceptFlag =
              n.supports.everythingExceptFlag && !n.supports.flag),
            (n.DOMReady = !1),
            (n.readyCallback = function() {
              n.DOMReady = !0;
            });
          })
          .then(function() {
            return e;
          })
          .then(function() {
            var e;
            n.supports.everything ||
              (n.readyCallback(),
                (e = n.source || {}).concatemoji ?
                t(e.concatemoji) :
                e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)));
          }));
    })((window, document), window._wpemojiSettings);
    /* ]]> */
  </script>
  <link
    rel="stylesheet"
    id="jquery.prettyphoto-css"
    href="/wp-content/plugins/wp-video-lightbox/css/prettyPhoto.css?ver=6.7.1"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="video-lightbox-css"
    href="<?= base_url('wp-content/plugins/wp-video-lightbox/wp-video-lightbox.css?ver=6.7.1') ?>"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="js_composer_front-css"
    href="<?= base_url('wp-content/plugins/vc-composer/assets/css/js_composer.min.css?ver=7.4') ?>"
    type="text/css"
    media="all" />
  <style id="wp-emoji-styles-inline-css" type="text/css">
    img.wp-smiley,
    img.emoji {
      display: inline !important;
      border: none !important;
      box-shadow: none !important;
      height: 1em !important;
      width: 1em !important;
      margin: 0 0.07em !important;
      vertical-align: -0.1em !important;
      background: none !important;
      padding: 0 !important;
    }
  </style>
  <link
    rel="stylesheet"
    id="wp-block-library-css"
    href="<?= base_url('wp-includes/css/dist/block-library/style.min.css?ver=6.7.1') ?>"
    type="text/css"
    media="all" />
  <style id="classic-theme-styles-inline-css" type="text/css">
    /*! This file is auto-generated */
    .wp-block-button__link {
      color: #fff;
      background-color: #32373c;
      border-radius: 9999px;
      box-shadow: none;
      text-decoration: none;
      padding: calc(0.667em + 2px) calc(1.333em + 2px);
      font-size: 1.125em;
    }

    .wp-block-file__button {
      background: #32373c;
      color: #fff;
      text-decoration: none;
    }
  </style>
  <style id="global-styles-inline-css" type="text/css">
    :root {
      --wp--preset--aspect-ratio--square: 1;
      --wp--preset--aspect-ratio--4-3: 4/3;
      --wp--preset--aspect-ratio--3-4: 3/4;
      --wp--preset--aspect-ratio--3-2: 3/2;
      --wp--preset--aspect-ratio--2-3: 2/3;
      --wp--preset--aspect-ratio--16-9: 16/9;
      --wp--preset--aspect-ratio--9-16: 9/16;
      --wp--preset--color--black: #000000;
      --wp--preset--color--cyan-bluish-gray: #abb8c3;
      --wp--preset--color--white: #ffffff;
      --wp--preset--color--pale-pink: #f78da7;
      --wp--preset--color--vivid-red: #cf2e2e;
      --wp--preset--color--luminous-vivid-orange: #ff6900;
      --wp--preset--color--luminous-vivid-amber: #fcb900;
      --wp--preset--color--light-green-cyan: #7bdcb5;
      --wp--preset--color--vivid-green-cyan: #00d084;
      --wp--preset--color--pale-cyan-blue: #8ed1fc;
      --wp--preset--color--vivid-cyan-blue: #0693e3;
      --wp--preset--color--vivid-purple: #9b51e0;
      --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,
          rgba(6, 147, 227, 1) 0%,
          rgb(155, 81, 224) 100%);
      --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,
          rgb(122, 220, 180) 0%,
          rgb(0, 208, 130) 100%);
      --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,
          rgba(252, 185, 0, 1) 0%,
          rgba(255, 105, 0, 1) 100%);
      --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,
          rgba(255, 105, 0, 1) 0%,
          rgb(207, 46, 46) 100%);
      --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,
          rgb(238, 238, 238) 0%,
          rgb(169, 184, 195) 100%);
      --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,
          rgb(74, 234, 220) 0%,
          rgb(151, 120, 209) 20%,
          rgb(207, 42, 186) 40%,
          rgb(238, 44, 130) 60%,
          rgb(251, 105, 98) 80%,
          rgb(254, 248, 76) 100%);
      --wp--preset--gradient--blush-light-purple: linear-gradient(135deg,
          rgb(255, 206, 236) 0%,
          rgb(152, 150, 240) 100%);
      --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,
          rgb(254, 205, 165) 0%,
          rgb(254, 45, 45) 50%,
          rgb(107, 0, 62) 100%);
      --wp--preset--gradient--luminous-dusk: linear-gradient(135deg,
          rgb(255, 203, 112) 0%,
          rgb(199, 81, 192) 50%,
          rgb(65, 88, 208) 100%);
      --wp--preset--gradient--pale-ocean: linear-gradient(135deg,
          rgb(255, 245, 203) 0%,
          rgb(182, 227, 212) 50%,
          rgb(51, 167, 181) 100%);
      --wp--preset--gradient--electric-grass: linear-gradient(135deg,
          rgb(202, 248, 128) 0%,
          rgb(113, 206, 126) 100%);
      --wp--preset--gradient--midnight: linear-gradient(135deg,
          rgb(2, 3, 129) 0%,
          rgb(40, 116, 252) 100%);
      --wp--preset--font-size--small: 13px;
      --wp--preset--font-size--medium: 20px;
      --wp--preset--font-size--large: 36px;
      --wp--preset--font-size--x-large: 42px;
      --wp--preset--font-family--inter: "Inter", sans-serif;
      --wp--preset--font-family--cardo: Cardo;
      --wp--preset--spacing--20: 0.44rem;
      --wp--preset--spacing--30: 0.67rem;
      --wp--preset--spacing--40: 1rem;
      --wp--preset--spacing--50: 1.5rem;
      --wp--preset--spacing--60: 2.25rem;
      --wp--preset--spacing--70: 3.38rem;
      --wp--preset--spacing--80: 5.06rem;
      --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
      --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
      --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
      --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1),
        6px 6px rgba(0, 0, 0, 1);
      --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
    }

    :where(.is-layout-flex) {
      gap: 0.5em;
    }

    :where(.is-layout-grid) {
      gap: 0.5em;
    }

    body .is-layout-flex {
      display: flex;
    }

    .is-layout-flex {
      flex-wrap: wrap;
      align-items: center;
    }

    .is-layout-flex> :is(*, div) {
      margin: 0;
    }

    body .is-layout-grid {
      display: grid;
    }

    .is-layout-grid> :is(*, div) {
      margin: 0;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    :where(.wp-block-columns.is-layout-grid) {
      gap: 2em;
    }

    :where(.wp-block-post-template.is-layout-flex) {
      gap: 1.25em;
    }

    :where(.wp-block-post-template.is-layout-grid) {
      gap: 1.25em;
    }

    .has-black-color {
      color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-color {
      color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-color {
      color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-color {
      color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-color {
      color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-color {
      color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-color {
      color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-color {
      color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-color {
      color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-color {
      color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-color {
      color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-color {
      color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-background-color {
      background-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-background-color {
      background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-background-color {
      background-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-background-color {
      background-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-background-color {
      background-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-background-color {
      background-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-background-color {
      background-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-background-color {
      background-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-background-color {
      background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-background-color {
      background-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-border-color {
      border-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-border-color {
      border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-border-color {
      border-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-border-color {
      border-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-border-color {
      border-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-border-color {
      border-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-border-color {
      border-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-border-color {
      border-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-border-color {
      border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-border-color {
      border-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
    }

    .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
      background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
    }

    .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-orange-to-vivid-red-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
    }

    .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
      background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
    }

    .has-cool-to-warm-spectrum-gradient-background {
      background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
    }

    .has-blush-light-purple-gradient-background {
      background: var(--wp--preset--gradient--blush-light-purple) !important;
    }

    .has-blush-bordeaux-gradient-background {
      background: var(--wp--preset--gradient--blush-bordeaux) !important;
    }

    .has-luminous-dusk-gradient-background {
      background: var(--wp--preset--gradient--luminous-dusk) !important;
    }

    .has-pale-ocean-gradient-background {
      background: var(--wp--preset--gradient--pale-ocean) !important;
    }

    .has-electric-grass-gradient-background {
      background: var(--wp--preset--gradient--electric-grass) !important;
    }

    .has-midnight-gradient-background {
      background: var(--wp--preset--gradient--midnight) !important;
    }

    .has-small-font-size {
      font-size: var(--wp--preset--font-size--small) !important;
    }

    .has-medium-font-size {
      font-size: var(--wp--preset--font-size--medium) !important;
    }

    .has-large-font-size {
      font-size: var(--wp--preset--font-size--large) !important;
    }

    .has-x-large-font-size {
      font-size: var(--wp--preset--font-size--x-large) !important;
    }

    :where(.wp-block-post-template.is-layout-flex) {
      gap: 1.25em;
    }

    :where(.wp-block-post-template.is-layout-grid) {
      gap: 1.25em;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    :where(.wp-block-columns.is-layout-grid) {
      gap: 2em;
    }

    :root :where(.wp-block-pullquote) {
      font-size: 1.5em;
      line-height: 1.6;
    }
  </style>
  <link
    rel="stylesheet"
    id="contact-form-7-css"
    href="/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=6.0.3"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="rs-plugin-settings-css"
    href="/wp-content/plugins/revslider/public/assets/css/rs6.css?ver=6.4.3"
    type="text/css"
    media="all" />
  <style id="rs-plugin-settings-inline-css" type="text/css">
    #rs-demo-id {}
  </style>
  <link
    rel="stylesheet"
    id="woocommerce-layout-css"
    href="/wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=9.6.1"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="woocommerce-smallscreen-css"
    href="/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=9.6.1"
    type="text/css"
    media="only screen and (max-width: 768px)" />
  <link
    rel="stylesheet"
    id="woocommerce-general-css"
    href="/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=9.6.1"
    type="text/css"
    media="all" />
  <style id="woocommerce-inline-inline-css" type="text/css">
    .woocommerce form .form-row .required {
      visibility: visible;
    }
  </style>
  <link
    rel="stylesheet"
    id="brands-styles-css"
    href="/wp-content/plugins/woocommerce/assets/css/brands.css?ver=9.6.1"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="bootstrap-css"
    href="/wp-content/themes/industrial/assets/css/bootstrap.min.css"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="fontawesome-css"
    href="/wp-content/themes/industrial/assets/css/font-awesome.min.css"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="strock-css"
    href="/wp-content/themes/industrial/assets/css/strock-icon.css"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="set1-css"
    href="/wp-content/themes/industrial/assets/css/set1.css"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="industrial-style-css"
    href="/wp-content/themes/industrial/style.css"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="industrial-responsive-css"
    href="/wp-content/themes/industrial/assets/css/responsive.css"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="woocommerce-css"
    href="/wp-content/themes/industrial/woocommerce/woocommerce.css"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="fonts-css"
    href="/css?family=Open+Sans%3A400%2C300%2C400i%2C500%2C600%2C700%2C800%2C900%7CRaleway%3A400%2C100%2C200%2C300%2C500%2C600%2C800%2C700%2C900%7CAlegreya%3A400%2C400i%2C700%2C700i%2C900%2C900i%7CRoboto%3A400%2C100%2C100italic%2C300%2C300italic%2C400italic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic&#038;subset=latin%2Clatin-ext"
    type="text/css"
    media="all" />
  <link
    rel="preload"
    as="style"
    href='https://fonts.googleapis.com/css?family="Open%20Sans",%20sans-serif&display=swap&ver=1738934645' />
  <link
    rel="stylesheet"
    href='https://fonts.googleapis.com/css?family="Open%20Sans",%20sans-serif&display=swap&ver=1738934645'
    media="print"
    onload="this.media='all'" />
  <noscript>
    <link
      rel="stylesheet"
      href='https://fonts.googleapis.com/css?family="Open%20Sans",%20sans-serif&display=swap&ver=1738934645' />
  </noscript>
  <script type="text/javascript" id="jquery-core-js-extra">
    /* <![CDATA[ */
    var header_fixed_setting = {
      "industrial-fixed_header": "1"
    };
    /* ]]> */
  </script>
  <script
    type="text/javascript"
    src="/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
    id="jquery-core-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/wp-video-lightbox/js/jquery.prettyPhoto.js?ver=3.1.6"
    id="jquery.prettyphoto-js"></script>
  <script type="text/javascript" id="video-lightbox-js-extra">
    /* <![CDATA[ */
    var vlpp_vars = {
      prettyPhoto_rel: "wp-video-lightbox",
      animation_speed: "fast",
      slideshow: "5000",
      autoplay_slideshow: "false",
      opacity: "0.80",
      show_title: "true",
      allow_resize: "true",
      allow_expand: "true",
      default_width: "640",
      default_height: "480",
      counter_separator_label: "\/",
      theme: "pp_default",
      horizontal_padding: "20",
      hideflash: "false",
      wmode: "opaque",
      autoplay: "false",
      modal: "false",
      deeplinking: "false",
      overlay_gallery: "true",
      overlay_gallery_max: "30",
      keyboard_shortcuts: "true",
      ie6_fallback: "true",
    };
    /* ]]> */
  </script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/wp-video-lightbox/js/video-lightbox.js?ver=3.1.6"
    id="video-lightbox-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/revslider/public/assets/js/rbtools.min.js?ver=6.4.3"
    id="tp-tools-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/revslider/public/assets/js/rs6.min.js?ver=6.4.3"
    id="revmin-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.7.0-wc.9.6.1"
    id="jquery-blockui-js"
    data-wp-strategy="defer"></script>
  <script type="text/javascript" id="wc-add-to-cart-js-extra">
    /* <![CDATA[ */
    var wc_add_to_cart_params = {
      ajax_url: "\/wp-admin\/admin-ajax.php",
      wc_ajax_url: "\/?wc-ajax=%%endpoint%%",
      i18n_view_cart: "View basket",
      cart_url: "https:\/\/industrial.themechampion.com",
      is_cart: "",
      cart_redirect_after_add: "no",
    };
    /* ]]> */
  </script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=9.6.1"
    id="wc-add-to-cart-js"
    data-wp-strategy="defer"></script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4-wc.9.6.1"
    id="js-cookie-js"
    defer="defer"
    data-wp-strategy="defer"></script>
  <script type="text/javascript" id="woocommerce-js-extra">
    /* <![CDATA[ */
    var woocommerce_params = {
      ajax_url: "\/wp-admin\/admin-ajax.php",
      wc_ajax_url: "\/?wc-ajax=%%endpoint%%",
    };
    /* ]]> */
  </script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=9.6.1"
    id="woocommerce-js"
    defer="defer"
    data-wp-strategy="defer"></script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/vc-composer/assets/js/vendors/woocommerce-add-to-cart.js?ver=7.4"
    id="vc_woocommerce-add-to-cart-js-js"></script>
  <script></script>
  <link rel="https://api.w.org/" href="wp-json/index.htm" />
  <link
    rel="alternate"
    title="JSON"
    type="application/json"
    href="/wp-json/wp/v2/pages/117" />
  <link
    rel="EditURI"
    type="application/rsd+xml"
    title="RSD"
    href="xmlrpc.php?rsd" />
  <meta name="generator" content="WordPress 6.7.1" />
  <meta name="generator" content="WooCommerce 9.6.1" />
  <link rel="canonical" href="index.htm" />
  <link rel="shortlink" href="index.htm" />
  <link
    rel="alternate"
    title="oEmbed (JSON)"
    type="application/json+oembed"
    href="/wp-json/oembed/1.0/embed?url=https%3A%2F%2Findustrial.themechampion.com%2F" />
  <link
    rel="alternate"
    title="oEmbed (XML)"
    type="text/xml+oembed"
    href="/wp-json/oembed/1.0/embed-1?url=https%3A%2F%2Findustrial.themechampion.com%2F&#038;format=xml" />
  <meta name="generator" content="Redux 4.5.6" />
  <script>
    WP_VIDEO_LIGHTBOX_VERSION = "1.9.11";
    WP_VID_LIGHTBOX_URL =
      "https://industrial.themechampion.com/wp-content/plugins/wp-video-lightbox";

    function wpvl_paramReplace(name, string, value) {
      // Find the param with regex
      // Grab the first character in the returned string (should be ? or &)
      // Replace our href string with our new value, passing on the name and delimeter

      var re = new RegExp("[\?&]" + name + "=([^&#]*)");
      var matches = re.exec(string);
      var newString;

      if (matches === null) {
        // if there are no params, append the parameter
        newString = string + "?" + name + "=" + value;
      } else {
        var delimeter = matches[0].charAt(0);
        newString = string.replace(re, delimeter + name + "=" + value);
      }
      return newString;
    }
  </script>
  <noscript>
    <style>
      .woocommerce-product-gallery {
        opacity: 1 !important;
      }
    </style>
  </noscript>
  <meta
    name="generator"
    content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress." />
  <meta
    name="generator"
    content="Powered by Slider Revolution 6.4.3 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
  <style class="wp-fonts-local" type="text/css">
    @font-face {
      font-family: Inter;
      font-style: normal;
      font-weight: 300 900;
      font-display: fallback;
      src: url("wp-content/plugins/woocommerce/assets/fonts/Inter-VariableFont_slnt,wght.woff2") format("woff2");
      font-stretch: normal;
    }

    @font-face {
      font-family: Cardo;
      font-style: normal;
      font-weight: 400;
      font-display: fallback;
      src: url("wp-content/plugins/woocommerce/assets/fonts/cardo_normal_400.woff2") format("woff2");
    }
  </style>
  <link
    rel="icon"
    href="/wp-content/uploads/2017/02/favicon-16x16.png"
    sizes="32x32" />
  <link
    rel="icon"
    href="/wp-content/uploads/2017/02/favicon-16x16.png"
    sizes="192x192" />
  <link
    rel="apple-touch-icon"
    href="/wp-content/uploads/2017/02/favicon-16x16.png" />
  <meta
    name="msapplication-TileImage"
    content="https://industrial.themechampion.com/wp-content/uploads/2017/02/favicon-16x16.png" />
  <script type="text/javascript">
    function setREVStartSize(e) {
      //window.requestAnimationFrame(function() {
      window.RSIW =
        window.RSIW === undefined ? window.innerWidth : window.RSIW;
      window.RSIH =
        window.RSIH === undefined ? window.innerHeight : window.RSIH;
      try {
        var pw = document.getElementById(e.c).parentNode.offsetWidth,
          newh;
        pw = pw === 0 || isNaN(pw) ? window.RSIW : pw;
        e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
        e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
        e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
        e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
        e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
        e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
        e.mh =
          e.mh === undefined || e.mh == "" || e.mh === "auto" ?
          0 :
          parseInt(e.mh, 0);
        if (e.layout === "fullscreen" || e.l === "fullscreen")
          newh = Math.max(e.mh, window.RSIH);
        else {
          e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
          for (var i in e.rl)
            if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
          e.gh =
            e.el === undefined ||
            e.el === "" ||
            (Array.isArray(e.el) && e.el.length == 0) ?
            e.gh :
            e.el;
          e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
          for (var i in e.rl)
            if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

          var nl = new Array(e.rl.length),
            ix = 0,
            sl;
          e.tabw = e.tabhide >= pw ? 0 : e.tabw;
          e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
          e.tabh = e.tabhide >= pw ? 0 : e.tabh;
          e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
          for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
          sl = nl[0];
          for (var i in nl)
            if (sl > nl[i] && nl[i] > 0) {
              sl = nl[i];
              ix = i;
            }
          var m =
            pw > e.gw[ix] + e.tabw + e.thumbw ?
            1 :
            (pw - (e.tabw + e.thumbw)) / e.gw[ix];
          newh = e.gh[ix] * m + (e.tabh + e.thumbh);
        }
        if (window.rs_init_css === undefined)
          window.rs_init_css = document.head.appendChild(
            document.createElement("style")
          );
        document.getElementById(e.c).height = newh + "px";
        window.rs_init_css.innerHTML +=
          "#" + e.c + "_wrapper { height: " + newh + "px }";
      } catch (e) {
        console.log("Failure at Presize of Slider:" + e);
      }
      //});
    }
  </script>
  <style
    id="industrial_option-dynamic-css"
    title="dynamic-css"
    class="redux-options-output">
    .t-logo {
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 0px;
      margin-left: 0px;
    }

    .nav-t-holder .nav-t-footer ul.nav>li ul.sub-menu li {
      background: #d62b2b;
    }

    nav.main_menu .nav-holder .nav-t-footer ul.nav>li ul.sub-menu li:hover>a {
      background: #c63a3a;
    }

    .industMobileHeader .nav-t-footer ul.nav>li>a {
      border-bottom: 1px solid;
    }

    .nav-t-holder .nav-t-footer ul.nav>li:hover a,
    .nav-t-holder .nav-t-footer ul.nav li.active a,
    .service-info a h4:hover,
    .nav-holder .nav-footer ul.nav>li:hover a,
    .nav-holder .nav-footer ul.nav>li.active a,
    .our-sol-wrapper p span.none,
    .single-blog-post .meta-info .content-box .post-links li i,
    .team .box-img .caption a {
      color: #fab90a;
    }

    .req-button a,
    .req-button .submit,
    .slick-dots li.slick-active button,
    .tt-gallery-1-search,
    .news-evn-img .event-date,
    .custom-heading.wpb_content_element h2.heading-title:before,
    .section_header2 h2:before,
    .get-t-touch .submit-n-now .submit,
    .contactus-button2 a,
    .about-tab-box .vc_tta-tabs-container ul.vc_tta-tabs-list li:before,
    .about-tab-box .vc_tta-tabs-container ul.vc_tta-tabs-list li:before,
    .about-tab-box .vc_tta-tabs-container ul.vc_tta-tabs-list li:before,
    .team:hover .team-content,
    .blog-side-shop h2.widget-title:after,
    .service-tab-box ul.c-brochure li,
    .service-tab-box ul.c-brochure li a i,
    .single-service-pdf,
    .project-post-info .info-text a,
    .single-blog-post a.more-link,
    .comments-area .comment-form .form-submit input#submit,
    .woocommerce ul.products li.product .button,
    .woocommerce .cart .button,
    .woocommerce .cart input.button,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .section_header h2:before,
    .woocommerce-checkout .form-row.place-order .button,
    .touch .touch_bg .touch_middle .input_form form .submit,
    .req-page-area form .submit,
    .about-tab-box .vc_tta-tabs-container ul.vc_tta-tabs-list li.active:before,
    .about-tab-box .vc_tta-tabs-container ul.vc_tta-tabs-list li:hover:before,
    .service-t-content .btn2,
    .carousel-prev,
    .carousel-next {
      background-color: #FFF100;
    }

    .req-button a,
    .get-t-touch .submit-n-now .submit,
    .contactus-button2 a,
    .team:hover .team-content,
    .single-blog-post a.more-link,
    .req-page-area form .submit,
    .home-tw-test .slick-dots li.slick-active button {
      border-color: #FFF100;
    }

    .widget-contact-list ul li i,
    .service-info h6 a,
    .service-info p a,
    .widget.about-us-widget a,
    .widget-contact-list ul li a:hover,
    .widget-contact-list ul li i,
    .breadcumb-wrapper span a,
    .single-sidebar-widget .popular-post .content span,
    .single-sidebar-widget .popular-post .content a h4:hover,
    .testimonial-p .media-body a,
    .single-service-contact a,
    .project-scop .scope-item li,
    .project-scop .scope-item li:before,
    .single-blog-post .meta-info .content-box .post-links li:hover i,
    .single-blog-post h6,
    h3.entry-title a:hover,
    .woocommerce ul.products li.product a,
    a.shipping-calculator-button,
    .woocommerce .row_inner_wrapper .col-lg-12.return-customer a,
    .touch h6,
    .home-tw-sec-tw .btn,
    .faq-left-box .single-faq-left .icon-box,
    .widget-contact-list ul li i,
    .diff-offer-wrapper3 .diff-offer h2 a,
    .service-info h6 a,
    .widget-contact-list ul li a:hover,
    .breadcumb-wrapper {
      color: #51c5e9;
    }

    .req-button a:hover,
    .nav-t-holder .nav-t-footer ul.nav>li ul.sub-menu li:hover>a,
    .req-button .submit:before,
    .get-t-touch .submit-n-now .submit:hover,
    .submit:before,
    .widget-contact h4:after,
    .get-in-touch h4:after,
    .widget-links h4:after,
    .nav-t-holder .nav-t-footer ul.nav>li ul.sub-menu li:hover>a,
    .blog-side-shop span.input-group-addon,
    .blog-side-shop span.input-group-addon button,
    .noclass-other .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a,
    .single-sidebar-widget .special-links li:hover a,
    .single-sidebar-widget .special-links li.active a,
    .single-blog-post a.more-link:hover,
    .comment-form .form-submit input#submit:hover,
    .comment-form .form-submit input#submit:focus,
    .woocommerce .cart .button,
    .woocommerce .cart input.button:hover,
    .proceed-to-checkout a.checkout-button.button.alt.wc-forward:hover,
    .woocommerce-checkout .form-row.place-order .button:hover,
    .touch .touch_bg .touch_middle .input_form form .submit:hover,
    .req-page-area form .submit:hover,
    .home-tw-sec-tw .btn,
    a.view-all.slide_learn_btn.view_project_btn,
    .about-tab-box .vc_tta-tabs-container ul.vc_tta-tabs-list li.vc_active,
    .about-tab-box .vc_tta-tabs-container ul li:hover,
    .newsletter .req-button,
    section.no-results.not-found span.input-group-addon {
      background-color: #51c5e9;
    }

    .req-button a:hover,
    .service-info a h4,
    .get-t-touch .submit-n-now .submit:hover,
    .contactus-button2 a:hover,
    .req-button .submit:focus,
    .single-blog-post a.more-link:hover,
    .comment-form .form-submit input#submit:hover,
    .comment-form .form-submit input#submit:focus,
    .proceed-to-checkout a.checkout-button.button.alt.wc-forward:hover,
    .woocommerce-checkout .form-row.place-order .button:hover,
    .touch .touch_bg .touch_top-con ul .item .media .media-left a,
    .touch .touch_bg .touch_middle .input_form form .submit:hover,
    .req-page-area form .submit:hover,
    .newsletter .req-button {
      border-color: #51c5e9;
    }

    hr,
    abbr,
    acronym,
    dfn,
    table,
    table>thead>tr>th,
    table>tbody>tr>th,
    table>tfoot>tr>th,
    table>thead>tr>td,
    table>tbody>tr>td,
    table>tfoot>tr>td,
    fieldset,
    select,
    textarea,
    input[type="date"],
    input[type="datetime"],
    input[type="datetime-local"],
    input[type="email"],
    input[type="month"],
    input[type="number"],
    input[type="password"],
    input[type="search"],
    input[type="tel"],
    input[type="text"],
    input[type="time"],
    input[type="url"],
    input[type="week"],
    .left-sidebar .content-area,
    .left-sidebar .sidebar,
    .right-sidebar .content-area,
    .right-sidebar .sidebar,
    .site-header,
    .ind-menu.ind-menu-mobile,
    .ind-menu.ind-menu-mobile li,
    .blog .hentry,
    .archive .hentry,
    .search .hentry,
    .page-header .page-title,
    .archive-title,
    .client-logo img,
    #comments .comment-list .pingback,
    .page-title-wrap,
    .page-header-wrap,
    .portfolio-prev i,
    .portfolio-next i,
    #secondary .widget.widget_nav_menu ul li.current-menu-item a,
    .icon-button,
    .woocommerce nav.woocommerce-pagination ul,
    .woocommerce nav.woocommerce-pagination ul li,
    woocommerce div.product .woocommerce-tabs ul.tabs:before,
    .woocommerce #content div.product .woocommerce-tabs ul.tabs:before,
    .woocommerce-page div.product .woocommerce-tabs ul.tabs:before,
    .woocommerce-page #content div.product .woocommerce-tabs ul.tabs:before,
    .woocommerce div.product .woocommerce-tabs ul.tabs li:after,
    .woocommerce div.product .woocommerce-tabs ul.tabs li:before,
    .woocommerce table.cart td.actions .coupon .input-text,
    .woocommerce #content table.cart td.actions .coupon .input-text,
    .woocommerce-page table.cart td.actions .coupon .input-text,
    .woocommerce-page #content table.cart td.actions .coupon .input-text,
    .woocommerce form.checkout_coupon,
    .woocommerce form.login,
    .woocommerce form.register,
    .shop-elements i,
    .testimonial .testimonial-content,
    .breadcrumbs,
    .woocommerce-cart .cart-collaterals .cart_totals table td,
    .woocommerce-cart .cart-collaterals .cart_totals table th,
    .carousel-prev,
    .carousel-next,
    .recent-news-meta,
    .woocommerce ul.products li.product a img,
    .woocommerce div.product div.images img {
      border-color: #e9e9e9;
    }

    .site {
      background-color: #ffffff;
    }

    body {
      font-family: "Open Sans", sans-serif;
    }

    p {
      font-family: "Open Sans", sans-serif;
    }

    footer.sec-padding.footer-bg.footer-bg3 {
      background-image: url("/public/images/home/footer_bg.png");
    }

    .indurial-solution-text h2 {
      color: #ffffff;
    }
  </style>
  <style type="text/css" data-type="vc_custom-css">
    span.vc_tta-title-icon {
      padding: 8px;
      background: #e5e5e5;
      float: left;
      margin: -2px 10px 0px !important;
      margin-left: -30px !important;
      left: 0;
      position: relative;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      color: #fff;
    }

    .vc_tta.vc_tta-accordion .vc_tta-controls-icon-position-left .vc_tta-controls-icon {
      left: 8px !important;
    }

    .vc_tta .vc_tta-controls-icon {
      height: 9px !important;
      width: 9px !important;
    }

    .carousel-prev,
    .carousel-next {
      position: static;
      display: inline-flex !important;
      margin: 0 auto;
      text-align: center;
      color: #000;
      margin-left: 47%;
      margin-right: -45%;
      margin-top: 50px;
      text-decoration: none;
      border: none;
      width: 35px;
      height: 35px;
    }

    .carousel-prev i,
    .carousel-next i {
      color: #000;
      margin-top: 5px;
    }

    .vc_row[data-vc-full-width] {
      overflow: visible;
    }
  </style>
  <style type="text/css" data-type="vc_shortcodes-custom-css">
    .vc_custom_1629088961697 {
      margin-top: 0px !important;
      margin-bottom: 0px !important;
      padding-top: 80px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630999843644 {
      margin-bottom: 100px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1634363665720 {
      margin-top: 100px !important;
    }

    .vc_custom_1630993121063 {
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630558559420 {
      margin-bottom: 40px !important;
      padding-top: 80px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1629088762752 {
      margin-top: 0px !important;
      margin-bottom: 0px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630401411829 {
      margin-top: 15px !important;
      margin-bottom: 15px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630502729197 {
      margin-top: 0px !important;
      margin-bottom: 10px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630557628299 {
      border-top-width: 1px !important;
      border-top-color: #eeeeee !important;
      border-top-style: solid !important;
    }

    .vc_custom_1630557637043 {
      margin-top: 0px !important;
      margin-bottom: 15px !important;
      padding-top: 80px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1628929584462 {
      background-image: url(wp-content/uploads/2017/02/ser-bg1.jpg) !important;
    }

    .vc_custom_1630993128378 {
      padding-top: 80px !important;
      padding-bottom: 60px !important;
    }

    .vc_custom_1630993054684 {
      margin-bottom: 0px !important;
    }

    .vc_custom_1630401165630 {
      margin-top: 0px !important;
      margin-bottom: 15px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630407270357 {
      margin-top: 15px !important;
      margin-bottom: 30px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630407063090 {
      margin-top: 0px !important;
      margin-bottom: 15px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630413750140 {
      margin-top: 15px !important;
      margin-bottom: 55px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630993061833 {
      margin-bottom: 0px !important;
    }

    .vc_custom_1630413840805 {
      margin-top: 0px !important;
      margin-bottom: 0px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630413975559 {
      margin-top: 15px !important;
      margin-bottom: 50px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630558570987 {
      margin-top: 0px !important;
      margin-bottom: 0px !important;
      padding-top: 0px !important;
      padding-bottom: 30px !important;
    }

    .vc_custom_1630479658907 {
      margin-top: 0px !important;
      margin-bottom: 0px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630479764157 {
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630479429288 {
      margin-top: 0px !important;
      margin-bottom: 15px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630479403090 {
      margin-top: 15px !important;
      margin-bottom: 30px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630479777183 {
      margin-top: 0px !important;
      margin-bottom: 10px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630481037762 {
      margin-top: 0px !important;
      margin-bottom: 15px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630481067149 {
      margin-top: 15px !important;
      margin-bottom: 30px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630481053036 {
      margin-top: 0px !important;
      margin-bottom: 15px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }

    .vc_custom_1630481082469 {
      margin-top: 15px !important;
      margin-bottom: 30px !important;
      padding-top: 0px !important;
      padding-bottom: 0px !important;
    }
  </style>
  <noscript>
    <style>
      .wpb_animate_when_almost_visible {
        opacity: 1;
      }
    </style>
  </noscript>
</head>

<body
  class="home page-template-default page page-id-117 theme-industrial woocommerce-no-js header-tmc_header_1 header-fixed-on header-normal wpb-js-composer js-comp-ver-7.4 vc_responsive">
  <div class="main-wrapper">
    <a class="skip-link screen-reader-text" href="#content"></a>
    <header id="header" class="stricky header1">
      <div class="wel-t-band">
        <div class="container">
          <div class="row wel-band-bg">
            <div class="col-md-6 pull-left col col-sm-12">
              <p class="TopText">
                Welcome to Leader in Industrial Solution since 1990
              </p>
            </div>
            <div class="col-md-6 pull-right text-right col-sm-12">
              <p class="TopText">
                Global Certificate: <span>ISO 9001:2015</span>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row pad-logo logo-wrapper">
          <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 t-logo">
            <a href="/" title="Industrial" rel="home">
              <img
                src="/public/images/home/logo.png"
                class="img-responsive"
                alt="" />
            </a>
          </div>
          <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 text-right">
            <div class="top-two-right">
              <div class="req-button text-right">
                <a href="<?=site_url('contact')?>" class="submit">請求報價</a>
              </div>
              
              <div class="top-panel">
                <div class="touch_top touch_top_pad">
                  <ul class="nav">
                    <li class="item item-ad">
                      <div class="media">
                        <div class="blue-color media-left">
                          <a href="mailto:info@industx.com"><i class="icon icon-Pointer"></i></a>
                        </div>
                        <div class="media-body">
                          <p>
                            Email Address <br /><span>
                              info@invax.com.tw</span>
                          </p>
                        </div>
                      </div>
                    </li>

                    <li class="item item-phone">
                      <div class="media">
                        <div class="blue-color media-left">
                          <a href="tel:18004567890"><i class="icon icon-Phone2"></i></a>
                        </div>
                        <div class="media-body">
                          <p>Call Us <br /><span>(02)2788-5218 </span></p>
                        </div>
                      </div>
                    </li>

                    <li class="mobile-link">
                      <div class="widget-t widget-t-search">
                        <div class="widget-t-inner">
                          <form
                            role="search"
                            method="get"
                            class="search-form search-form-sidebar"
                            action="<?= site_url('products/index') ?>">
                            <div class="input-group">
                              <input
                                type="search"
                                value=""
                                name="s"
                                class="form-control"
                                placeholder="請輸入關鍵字搜尋123"
                                required="" />

                              <span class="input-group-addon">
                                <button type="submit">
                                  <i class="icon icon-Search"></i>
                                </button>
                              </span>
                            </div>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <nav
        id="main-navigation-wrapper"
        class="navbar navbar-default header-navigation main_menu nav-home-three stricky">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
              <div class="logo">
                <a href="index.htm" title="Industrial" rel="home">
                  <img
                    src="/wp-content/uploads/2025/02/logo2.png"
                    class="img-responsive"
                    alt="" /></a>
              </div>
              <div class="cmn-toggle-switch">
                <span></span>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="toggle-block">
                <div class="toggle-block-container">
                  <div class="main-nav">
                    <ul id="Primary" class="nav navbar-nav">
                      <li class="menu-item">
                        <a href="/">首頁</a>
                      </li>

                      <li class="menu-item">
                        <a href="/about">關於英碩</a>
                      </li>

                      <li class="menu-item menu-item-has-children">
                        <a href="/products">公司產品</a>

                        <i class="fa fa-chevron-right"></i>

                        <ul class="sub-menu">
                          <?php foreach (config('App')->menu_pmcs as $pmc): ?>
                            <?php if (isset($pmc['pmc_Enabled']) && $pmc['pmc_Enabled'] == 1): ?>
                              <li class="menu-item">
                                <a href="<?= site_url('products/index_sub/' . $pmc['pmc_Id']) ?>"><?= $pmc['pmc_Name'] ?></a>
                              </li>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </ul>
                      </li>

                      <li class="menu-item">
                        <a href="/support">技術支援</a>
                      </li>

                      <li class="menu-item">
                        <a href="/news">活動訊息</a>
                      </li>

                      <li class="menu-item">
                        <a href="/contact">聯絡我們</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="nav-search pull-right text-right">
                <div class="nav-search pull-right text-right" style="margin-top: 8px;">
                  <div class="widget-t widget-t-search">
                    <div class="widget-t-inner">
                      <form
                        role="search"
                        method="get"
                        class="search-form search-form-sidebar"
                        action="<?= site_url('products/global-search') ?>">
                        <div class="input-group" style="border: 1px solid #7B838E; border-radius: 4px; height: 36px;">
                          <input
                            type="search"
                            value=""
                            name="keyword"
                            class="form-control"
                            placeholder="請輸入關鍵字搜尋"
                            required=""
                            style="border: none; border-radius: 4px; height: 100%;" />
                          <span class="input-group-addon" style="height: 100%;">
                            <button type="submit" style="border: none; background: transparent; height: 100%;">
                              <i class="icon icon-Search"></i>
                            </button>
                          </span>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!-- End mainmenu -->
    </header>
  </div>
  <!-- #page -->
  <div id="btt"><i class="fa fa-angle-double-up"></i></div>

  <script type="text/html" id="wpb-modifications">
    window.wpbCustomElement = 1;
  </script>
  <link
    href="css-1?family=Roboto:400%2C700%2C500%7COpen+Sans:400"
    rel="stylesheet"
    property="stylesheet"
    media="all"
    type="text/css" />

  <script type="text/javascript">
    (function() {
      var c = document.body.className;
      c = c.replace(/woocommerce-no-js/, "woocommerce-js");
      document.body.className = c;
    })();
  </script>
  <script type="text/javascript">
    if (typeof revslider_showDoubleJqueryError === "undefined") {
      function revslider_showDoubleJqueryError(sliderID) {
        var err = "<div class='rs_error_message_box'>";
        err += "<div class='rs_error_message_oops'>Oops...</div>";
        err += "<div class='rs_error_message_content'>";
        err +=
          "You have some jquery.js library include that comes after the Slider Revolution files js inclusion.<br>";
        err +=
          "To fix this, you can:<br>&nbsp;&nbsp;&nbsp; 1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on";
        err +=
          "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jQuery.js inclusion and remove it";
        err += "</div>";
        err += "</div>";
        var slider = document.getElementById(sliderID);
        slider.innerHTML = err;
        slider.style.display = "block";
      }
    }
  </script>
  <link
    rel="stylesheet"
    id="wc-blocks-style-css"
    href="/wp-content/plugins/woocommerce/assets/client/blocks/wc-blocks.css?ver=wc-9.6.1"
    type="text/css"
    media="all" />
  <link
    rel="stylesheet"
    id="vc_tta_style-css"
    href="/wp-content/plugins/vc-composer/assets/css/js_composer_tta.min.css?ver=7.4"
    type="text/css"
    media="all" />
  <script
    type="text/javascript"
    src="/wp-includes/js/dist/hooks.min.js?ver=4d63a3d491d11ffd8ac6"
    id="wp-hooks-js"></script>
  <script
    type="text/javascript"
    src="/wp-includes/js/dist/i18n.min.js?ver=5e580eb46a90c2b997e6"
    id="wp-i18n-js"></script>
  <script type="text/javascript" id="wp-i18n-js-after">
    /* <![CDATA[ */
    wp.i18n.setLocaleData({
      "text direction\u0004ltr": ["ltr"]
    });
    /* ]]> */
  </script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=6.0.3"
    id="swv-js"></script>
  <script type="text/javascript" id="contact-form-7-js-before">
    /* <![CDATA[ */
    var wpcf7 = {
      api: {
        root: "https:\/\/industrial.themechampion.com\/wp-json\/",
        namespace: "contact-form-7\/v1",
      },
      cached: 1,
    };
    /* ]]> */
  </script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/contact-form-7/includes/js/index.js?ver=6.0.3"
    id="contact-form-7-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/themes/industrial/assets/js/libs.js"
    id="libs-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/themes/industrial/assets/js/owl.carousel.min.js"
    id="carousel-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/themes/industrial/assets/js/imagelightbox.min.js"
    id="imagelightbox-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/themes/industrial/assets/js/theme.js"
    id="industrial-theme-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/woocommerce/assets/js/sourcebuster/sourcebuster.min.js?ver=9.6.1"
    id="sourcebuster-js-js"></script>
  <script type="text/javascript" id="wc-order-attribution-js-extra">
    /* <![CDATA[ */
    var wc_order_attribution = {
      params: {
        lifetime: 1.0e-5,
        session: 30,
        base64: false,
        ajaxurl: "https:\/\/industrial.themechampion.com\/wp-admin\/admin-ajax.php",
        prefix: "wc_order_attribution_",
        allowTracking: true,
      },
      fields: {
        source_type: "current.typ",
        referrer: "current_add.rf",
        utm_campaign: "current.cmp",
        utm_source: "current.src",
        utm_medium: "current.mdm",
        utm_content: "current.cnt",
        utm_id: "current.id",
        utm_term: "current.trm",
        utm_source_platform: "current.plt",
        utm_creative_format: "current.fmt",
        utm_marketing_tactic: "current.tct",
        session_entry: "current_add.ep",
        session_start_time: "current_add.fd",
        session_pages: "session.pgs",
        session_count: "udata.vst",
        user_agent: "udata.uag",
      },
    };
    /* ]]> */
  </script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/woocommerce/assets/js/frontend/order-attribution.min.js?ver=9.6.1"
    id="wc-order-attribution-js"></script>
  <script
    type="text/javascript"
    src="/widget/9wYDHSG0bT?ver=1.3.6.1"
    id="jivosite_widget_code-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/vc-composer/assets/js/dist/js_composer_front.min.js?ver=7.4"
    id="wpb_composer_front_js-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/vc-composer/assets/lib/vc_accordion/vc-accordion.min.js?ver=7.4"
    id="vc_accordion_script-js"></script>
  <script
    type="text/javascript"
    src="/wp-content/plugins/vc-composer/assets/lib/vc-tta-autoplay/vc-tta-autoplay.min.js?ver=7.4"
    id="vc_tta_autoplay_script-js"></script>
</body>

</html>