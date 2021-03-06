!function () {
    'use strict';
    if ('undefined' != typeof window && window.addEventListener) {
      var e,
      t,
      n,
      o = Object.create(null),
      i = function () {
        clearTimeout(t),
        t = setTimeout(e, 100)
      },
      r = function () {
      },
      u = function (e) {
        function t(e) {
          var t;
          return void 0 !== e.protocol ? t = e : (t = document.createElement('a')).href = e,
          t.protocol.replace(/:/g, '') + t.host
        }
        var n,
        o,
        i;
        return window.XMLHttpRequest && (n = new XMLHttpRequest, o = t(location), i = t(e), n = void 0 === n.withCredentials && '' !== i && i !== o ? XDomainRequest || void 0 : XMLHttpRequest),
        n
      },
      s = 'http://www.w3.org/1999/xlink';
      e = function () {
        var e,
        t,
        n,
        d,
        a,
        l,
        c,
        h,
        m,
        f,
        w = 0;
        function v() {
          var e;
          0 == (w -= 1) && (r(), window.addEventListener('resize', i, !1), window.addEventListener('orientationchange', i, !1), window.MutationObserver ? ((e = new MutationObserver(i)).observe(document.documentElement, {
            childList: !0,
            subtree: !0,
            attributes: !0
          }), r = function () {
            try {
              e.disconnect(),
              window.removeEventListener('resize', i, !1),
              window.removeEventListener('orientationchange', i, !1)
            } catch (t) {
            }
          })  : (document.documentElement.addEventListener('DOMSubtreeModified', i, !1), r = function () {
            document.documentElement.removeEventListener('DOMSubtreeModified', i, !1),
            window.removeEventListener('resize', i, !1),
            window.removeEventListener('orientationchange', i, !1)
          }))
        }
        function b(e) {
          return function () {
            !0 !== o[e.base] && (e.useEl.setAttributeNS(s, 'xlink:href', '#' + e.hash), e.useEl.hasAttribute('href') && e.useEl.setAttribute('href', '#' + e.hash))
          }
        }
        function E(e) {
          return function () {
            var t,
            n = document.body,
            o = document.createElement('x');
            e.onload = null,
            o.innerHTML = e.responseText,
            (t = o.getElementsByTagName('svg') [0]) && (t.setAttribute('aria-hidden', 'true'), t.style.position = 'absolute', t.style.width = 0, t.style.height = 0, t.style.overflow = 'hidden', n.insertBefore(t, n.firstChild)),
            v()
          }
        }
        function g(e) {
          return function () {
            e.onerror = null,
            e.ontimeout = null,
            v()
          }
        }
        for (r(), m = document.getElementsByTagName('use'), a = 0; a < m.length; a += 1) {
          try {
            t = m[a].getBoundingClientRect()
          } catch (L) {
            t = !1
          }
          e = (h = (d = m[a].getAttribute('href') || m[a].getAttributeNS(s, 'href') || m[a].getAttribute('xlink:href')) && d.split ? d.split('#')  : [
            '',
            ''
          ]) [0],
          n = h[1],
          l = t && 0 === t.left && 0 === t.right && 0 === t.top && 0 === t.bottom,
          t && 0 === t.width && 0 === t.height && !l ? (m[a].hasAttribute('href') && m[a].setAttributeNS(s, 'xlink:href', d), e.length && (!0 !== (f = o[e]) && setTimeout(b({
            useEl: m[a],
            base: e,
            hash: n
          }), 0), void 0 === f && void 0 !== (c = u(e)) && (f = new c, o[e] = f, f.onload = E(f), f.onerror = g(f), f.ontimeout = g(f), f.open('GET', e), f.send(), w += 1)))  : l ? e.length && o[e] && setTimeout(b({
            useEl: m[a],
            base: e,
            hash: n
          }), 0)  : void 0 === o[e] ? o[e] = !0 : o[e].onload && (o[e].abort(), delete o[e].onload, o[e] = !0)
        }
        m = '',
        w += 1,
        v()
      },
      n = function () {
        window.removeEventListener('load', n, !1),
        t = setTimeout(e, 0)
      },
      'complete' !== document.readyState ? window.addEventListener('load', n, !1)  : n()
    }
  }();
  