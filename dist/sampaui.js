function Qs(ue) {
  return ue && ue.__esModule && Object.prototype.hasOwnProperty.call(ue, "default") ? ue.default : ue;
}
function $s(ue) {
  if (Object.prototype.hasOwnProperty.call(ue, "__esModule")) return ue;
  var xe = ue.default;
  if (typeof xe == "function") {
    var F = function _() {
      var M = !1;
      try {
        M = this instanceof _;
      } catch {
      }
      return M ? Reflect.construct(xe, arguments, this.constructor) : xe.apply(this, arguments);
    };
    F.prototype = xe.prototype;
  } else F = {};
  return Object.defineProperty(F, "__esModule", { value: !0 }), Object.keys(ue).forEach(function(_) {
    var M = Object.getOwnPropertyDescriptor(ue, _);
    Object.defineProperty(F, _, M.get ? M : {
      enumerable: !0,
      get: function() {
        return ue[_];
      }
    });
  }), F;
}
var cn = { exports: {} }, Js = cn.exports, xl;
function _t() {
  return xl || (xl = 1, (function(ue, xe) {
    (function(F, _) {
      ue.exports = _();
    })(Js, (function() {
      var F = navigator.userAgent, _ = navigator.platform, M = /gecko\/\d/i.test(F), R = /MSIE \d/.test(F), N = /Trident\/(?:[7-9]|\d{2,})\..*rv:(\d+)/.exec(F), P = /Edge\/(\d+)/.exec(F), B = R || N || P, z = B && (R ? document.documentMode || 6 : +(P || N)[1]), te = !P && /WebKit\//.test(F), Q = te && /Qt\/\d+\.\d+/.test(F), K = !P && /Chrome\/(\d+)/.exec(F), he = K && +K[1], ne = /Opera\//.test(F), Se = /Apple Computer/.test(navigator.vendor), de = /Mac OS X 1\d\D([8-9]|\d\d)\D/.test(F), ge = /PhantomJS/.test(F), W = Se && (/Mobile\/\w+/.test(F) || navigator.maxTouchPoints > 2), X = /Android/.test(F), U = W || X || /webOS|BlackBerry|Opera Mini|Opera Mobi|IEMobile/i.test(F), G = W || /Mac/.test(_), se = /\bCrOS\b/.test(F), Z = /win/i.test(_), fe = ne && F.match(/Version\/(\d*\.\d*)/);
      fe && (fe = Number(fe[1])), fe && fe >= 15 && (ne = !1, te = !0);
      var ye = G && (Q || ne && (fe == null || fe < 12.11)), Xe = M || B && z >= 9;
      function ae(e) {
        return new RegExp("(^|\\s)" + e + "(?:$|\\s)\\s*");
      }
      var Le = function(e, t) {
        var i = e.className, r = ae(t).exec(i);
        if (r) {
          var n = i.slice(r.index + r[0].length);
          e.className = i.slice(0, r.index) + (n ? r[1] + n : "");
        }
      };
      function Ee(e) {
        for (var t = e.childNodes.length; t > 0; --t)
          e.removeChild(e.firstChild);
        return e;
      }
      function Ne(e, t) {
        return Ee(e).appendChild(t);
      }
      function L(e, t, i, r) {
        var n = document.createElement(e);
        if (i && (n.className = i), r && (n.style.cssText = r), typeof t == "string")
          n.appendChild(document.createTextNode(t));
        else if (t)
          for (var a = 0; a < t.length; ++a)
            n.appendChild(t[a]);
        return n;
      }
      function ee(e, t, i, r) {
        var n = L(e, t, i, r);
        return n.setAttribute("role", "presentation"), n;
      }
      var $;
      document.createRange ? $ = function(e, t, i, r) {
        var n = document.createRange();
        return n.setEnd(r || e, i), n.setStart(e, t), n;
      } : $ = function(e, t, i) {
        var r = document.body.createTextRange();
        try {
          r.moveToElementText(e.parentNode);
        } catch {
          return r;
        }
        return r.collapse(!0), r.moveEnd("character", i), r.moveStart("character", t), r;
      };
      function be(e, t) {
        if (t.nodeType == 3 && (t = t.parentNode), e.contains)
          return e.contains(t);
        do
          if (t.nodeType == 11 && (t = t.host), t == e)
            return !0;
        while (t = t.parentNode);
      }
      function Ue(e) {
        var t = e.ownerDocument || e, i;
        try {
          i = e.activeElement;
        } catch {
          i = t.body || null;
        }
        for (; i && i.shadowRoot && i.shadowRoot.activeElement; )
          i = i.shadowRoot.activeElement;
        return i;
      }
      function it(e, t) {
        var i = e.className;
        ae(t).test(i) || (e.className += (i ? " " : "") + t);
      }
      function Pt(e, t) {
        for (var i = e.split(" "), r = 0; r < i.length; r++)
          i[r] && !ae(i[r]).test(t) && (t += " " + i[r]);
        return t;
      }
      var w = function(e) {
        e.select();
      };
      W ? w = function(e) {
        e.selectionStart = 0, e.selectionEnd = e.value.length;
      } : B && (w = function(e) {
        try {
          e.select();
        } catch {
        }
      });
      function c(e) {
        return e.display.wrapper.ownerDocument;
      }
      function j(e) {
        return _e(e.display.wrapper);
      }
      function _e(e) {
        return e.getRootNode ? e.getRootNode() : e.ownerDocument;
      }
      function Te(e) {
        return c(e).defaultView;
      }
      function $e(e) {
        var t = Array.prototype.slice.call(arguments, 1);
        return function() {
          return e.apply(null, t);
        };
      }
      function nt(e, t, i) {
        t || (t = {});
        for (var r in e)
          Object.prototype.hasOwnProperty.call(e, r) && (i !== !1 || !Object.prototype.hasOwnProperty.call(t, r)) && (t[r] = e[r]);
        return t;
      }
      function Ke(e, t, i, r, n) {
        t == null && (t = e.search(/[^\s\u00a0]/), t == -1 && (t = e.length));
        for (var a = r || 0, o = n || 0; ; ) {
          var u = e.indexOf("	", a);
          if (u < 0 || u >= t)
            return o + (t - a);
          o += u - a, o += i - o % i, a = u + 1;
        }
      }
      var Ve = function() {
        this.id = null, this.f = null, this.time = 0, this.handler = $e(this.onTimeout, this);
      };
      Ve.prototype.onTimeout = function(e) {
        e.id = 0, e.time <= +/* @__PURE__ */ new Date() ? e.f() : setTimeout(e.handler, e.time - +/* @__PURE__ */ new Date());
      }, Ve.prototype.set = function(e, t) {
        this.f = t;
        var i = +/* @__PURE__ */ new Date() + e;
        (!this.id || i < this.time) && (clearTimeout(this.id), this.id = setTimeout(this.handler, e), this.time = i);
      };
      function We(e, t) {
        for (var i = 0; i < e.length; ++i)
          if (e[i] == t)
            return i;
        return -1;
      }
      var qe = 50, Je = { toString: function() {
        return "CodeMirror.Pass";
      } }, st = { scroll: !1 }, Ce = { origin: "*mouse" }, It = { origin: "+move" };
      function wt(e, t, i) {
        for (var r = 0, n = 0; ; ) {
          var a = e.indexOf("	", r);
          a == -1 && (a = e.length);
          var o = a - r;
          if (a == e.length || n + o >= t)
            return r + Math.min(o, t - n);
          if (n += a - r, n += i - n % i, r = a + 1, n >= t)
            return r;
        }
      }
      var Ft = [""];
      function dt(e) {
        for (; Ft.length <= e; )
          Ft.push(Pe(Ft) + " ");
        return Ft[e];
      }
      function Pe(e) {
        return e[e.length - 1];
      }
      function ze(e, t) {
        for (var i = [], r = 0; r < e.length; r++)
          i[r] = t(e[r], r);
        return i;
      }
      function bt(e, t, i) {
        for (var r = 0, n = i(t); r < e.length && i(e[r]) <= n; )
          r++;
        e.splice(r, 0, t);
      }
      function lr() {
      }
      function O(e, t) {
        var i;
        return Object.create ? i = Object.create(e) : (lr.prototype = e, i = new lr()), t && nt(t, i), i;
      }
      var H = /[\u00df\u0587\u0590-\u05f4\u0600-\u06ff\u3040-\u309f\u30a0-\u30ff\u3400-\u4db5\u4e00-\u9fcc\uac00-\ud7af]/;
      function E(e) {
        return /\w/.test(e) || e > "" && (e.toUpperCase() != e.toLowerCase() || H.test(e));
      }
      function h(e, t) {
        return t ? t.source.indexOf("\\w") > -1 && E(e) ? !0 : t.test(e) : E(e);
      }
      function p(e) {
        for (var t in e)
          if (e.hasOwnProperty(t) && e[t])
            return !1;
        return !0;
      }
      var g = /[\u0300-\u036f\u0483-\u0489\u0591-\u05bd\u05bf\u05c1\u05c2\u05c4\u05c5\u05c7\u0610-\u061a\u064b-\u065e\u0670\u06d6-\u06dc\u06de-\u06e4\u06e7\u06e8\u06ea-\u06ed\u0711\u0730-\u074a\u07a6-\u07b0\u07eb-\u07f3\u0816-\u0819\u081b-\u0823\u0825-\u0827\u0829-\u082d\u0900-\u0902\u093c\u0941-\u0948\u094d\u0951-\u0955\u0962\u0963\u0981\u09bc\u09be\u09c1-\u09c4\u09cd\u09d7\u09e2\u09e3\u0a01\u0a02\u0a3c\u0a41\u0a42\u0a47\u0a48\u0a4b-\u0a4d\u0a51\u0a70\u0a71\u0a75\u0a81\u0a82\u0abc\u0ac1-\u0ac5\u0ac7\u0ac8\u0acd\u0ae2\u0ae3\u0b01\u0b3c\u0b3e\u0b3f\u0b41-\u0b44\u0b4d\u0b56\u0b57\u0b62\u0b63\u0b82\u0bbe\u0bc0\u0bcd\u0bd7\u0c3e-\u0c40\u0c46-\u0c48\u0c4a-\u0c4d\u0c55\u0c56\u0c62\u0c63\u0cbc\u0cbf\u0cc2\u0cc6\u0ccc\u0ccd\u0cd5\u0cd6\u0ce2\u0ce3\u0d3e\u0d41-\u0d44\u0d4d\u0d57\u0d62\u0d63\u0dca\u0dcf\u0dd2-\u0dd4\u0dd6\u0ddf\u0e31\u0e34-\u0e3a\u0e47-\u0e4e\u0eb1\u0eb4-\u0eb9\u0ebb\u0ebc\u0ec8-\u0ecd\u0f18\u0f19\u0f35\u0f37\u0f39\u0f71-\u0f7e\u0f80-\u0f84\u0f86\u0f87\u0f90-\u0f97\u0f99-\u0fbc\u0fc6\u102d-\u1030\u1032-\u1037\u1039\u103a\u103d\u103e\u1058\u1059\u105e-\u1060\u1071-\u1074\u1082\u1085\u1086\u108d\u109d\u135f\u1712-\u1714\u1732-\u1734\u1752\u1753\u1772\u1773\u17b7-\u17bd\u17c6\u17c9-\u17d3\u17dd\u180b-\u180d\u18a9\u1920-\u1922\u1927\u1928\u1932\u1939-\u193b\u1a17\u1a18\u1a56\u1a58-\u1a5e\u1a60\u1a62\u1a65-\u1a6c\u1a73-\u1a7c\u1a7f\u1b00-\u1b03\u1b34\u1b36-\u1b3a\u1b3c\u1b42\u1b6b-\u1b73\u1b80\u1b81\u1ba2-\u1ba5\u1ba8\u1ba9\u1c2c-\u1c33\u1c36\u1c37\u1cd0-\u1cd2\u1cd4-\u1ce0\u1ce2-\u1ce8\u1ced\u1dc0-\u1de6\u1dfd-\u1dff\u200c\u200d\u20d0-\u20f0\u2cef-\u2cf1\u2de0-\u2dff\u302a-\u302f\u3099\u309a\ua66f-\ua672\ua67c\ua67d\ua6f0\ua6f1\ua802\ua806\ua80b\ua825\ua826\ua8c4\ua8e0-\ua8f1\ua926-\ua92d\ua947-\ua951\ua980-\ua982\ua9b3\ua9b6-\ua9b9\ua9bc\uaa29-\uaa2e\uaa31\uaa32\uaa35\uaa36\uaa43\uaa4c\uaab0\uaab2-\uaab4\uaab7\uaab8\uaabe\uaabf\uaac1\uabe5\uabe8\uabed\udc00-\udfff\ufb1e\ufe00-\ufe0f\ufe20-\ufe26\uff9e\uff9f]/;
      function C(e) {
        return e.charCodeAt(0) >= 768 && g.test(e);
      }
      function l(e, t, i) {
        for (; (i < 0 ? t > 0 : t < e.length) && C(e.charAt(t)); )
          t += i;
        return t;
      }
      function d(e, t, i) {
        for (var r = t > i ? -1 : 1; ; ) {
          if (t == i)
            return t;
          var n = (t + i) / 2, a = r < 0 ? Math.ceil(n) : Math.floor(n);
          if (a == t)
            return e(a) ? t : i;
          e(a) ? i = a : t = a + r;
        }
      }
      function m(e, t, i, r) {
        if (!e)
          return r(t, i, "ltr", 0);
        for (var n = !1, a = 0; a < e.length; ++a) {
          var o = e[a];
          (o.from < i && o.to > t || t == i && o.to == t) && (r(Math.max(o.from, t), Math.min(o.to, i), o.level == 1 ? "rtl" : "ltr", a), n = !0);
        }
        n || r(t, i, "ltr");
      }
      var D = null;
      function k(e, t, i) {
        var r;
        D = null;
        for (var n = 0; n < e.length; ++n) {
          var a = e[n];
          if (a.from < t && a.to > t)
            return n;
          a.to == t && (a.from != a.to && i == "before" ? r = n : D = n), a.from == t && (a.from != a.to && i != "before" ? r = n : D = n);
        }
        return r ?? D;
      }
      var I = /* @__PURE__ */ (function() {
        var e = "bbbbbbbbbtstwsbbbbbbbbbbbbbbssstwNN%%%NNNNNN,N,N1111111111NNNNNNNLLLLLLLLLLLLLLLLLLLLLLLLLLNNNNNNLLLLLLLLLLLLLLLLLLLLLLLLLLNNNNbbbbbbsbbbbbbbbbbbbbbbbbbbbbbbbbb,N%%%%NNNNLNNNNN%%11NLNNN1LNNNNNLLLLLLLLLLLLLLLLLLLLLLLNLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLN", t = "nnnnnnNNr%%r,rNNmmmmmmmmmmmrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrmmmmmmmmmmmmmmmmmmmmmnnnnnnnnnn%nnrrrmrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrmmmmmmmnNmmmmmmrrmmNmmmmrr1111111111";
        function i(f) {
          return f <= 247 ? e.charAt(f) : 1424 <= f && f <= 1524 ? "R" : 1536 <= f && f <= 1785 ? t.charAt(f - 1536) : 1774 <= f && f <= 2220 ? "r" : 8192 <= f && f <= 8203 ? "w" : f == 8204 ? "b" : "L";
        }
        var r = /[\u0590-\u05f4\u0600-\u06ff\u0700-\u08ac]/, n = /[stwN]/, a = /[LRr]/, o = /[Lb1n]/, u = /[1n]/;
        function s(f, v, y) {
          this.level = f, this.from = v, this.to = y;
        }
        return function(f, v) {
          var y = v == "ltr" ? "L" : "R";
          if (f.length == 0 || v == "ltr" && !r.test(f))
            return !1;
          for (var T = f.length, A = [], q = 0; q < T; ++q)
            A.push(i(f.charCodeAt(q)));
          for (var Y = 0, V = y; Y < T; ++Y) {
            var oe = A[Y];
            oe == "m" ? A[Y] = V : V = oe;
          }
          for (var pe = 0, le = y; pe < T; ++pe) {
            var ve = A[pe];
            ve == "1" && le == "r" ? A[pe] = "n" : a.test(ve) && (le = ve, ve == "r" && (A[pe] = "R"));
          }
          for (var Fe = 1, ke = A[0]; Fe < T - 1; ++Fe) {
            var Re = A[Fe];
            Re == "+" && ke == "1" && A[Fe + 1] == "1" ? A[Fe] = "1" : Re == "," && ke == A[Fe + 1] && (ke == "1" || ke == "n") && (A[Fe] = ke), ke = Re;
          }
          for (var Qe = 0; Qe < T; ++Qe) {
            var yt = A[Qe];
            if (yt == ",")
              A[Qe] = "N";
            else if (yt == "%") {
              var rt = void 0;
              for (rt = Qe + 1; rt < T && A[rt] == "%"; ++rt)
                ;
              for (var Rt = Qe && A[Qe - 1] == "!" || rt < T && A[rt] == "1" ? "1" : "N", Mt = Qe; Mt < rt; ++Mt)
                A[Mt] = Rt;
              Qe = rt - 1;
            }
          }
          for (var ct = 0, Ot = y; ct < T; ++ct) {
            var Ct = A[ct];
            Ot == "L" && Ct == "1" ? A[ct] = "L" : a.test(Ct) && (Ot = Ct);
          }
          for (var gt = 0; gt < T; ++gt)
            if (n.test(A[gt])) {
              var ht = void 0;
              for (ht = gt + 1; ht < T && n.test(A[ht]); ++ht)
                ;
              for (var ot = (gt ? A[gt - 1] : y) == "L", Nt = (ht < T ? A[ht] : y) == "L", Vr = ot == Nt ? ot ? "L" : "R" : y, xr = gt; xr < ht; ++xr)
                A[xr] = Vr;
              gt = ht - 1;
            }
          for (var St = [], $t, Dt = 0; Dt < T; )
            if (o.test(A[Dt])) {
              var ca = Dt;
              for (++Dt; Dt < T && o.test(A[Dt]); ++Dt)
                ;
              St.push(new s(0, ca, Dt));
            } else {
              var ar = Dt, Or = St.length, Nr = v == "rtl" ? 1 : 0;
              for (++Dt; Dt < T && A[Dt] != "L"; ++Dt)
                ;
              for (var Lt = ar; Lt < Dt; )
                if (u.test(A[Lt])) {
                  ar < Lt && (St.splice(Or, 0, new s(1, ar, Lt)), Or += Nr);
                  var ei = Lt;
                  for (++Lt; Lt < Dt && u.test(A[Lt]); ++Lt)
                    ;
                  St.splice(Or, 0, new s(2, ei, Lt)), Or += Nr, ar = Lt;
                } else
                  ++Lt;
              ar < Dt && St.splice(Or, 0, new s(1, ar, Dt));
            }
          return v == "ltr" && (St[0].level == 1 && ($t = f.match(/^\s+/)) && (St[0].from = $t[0].length, St.unshift(new s(0, 0, $t[0].length))), Pe(St).level == 1 && ($t = f.match(/\s+$/)) && (Pe(St).to -= $t[0].length, St.push(new s(0, T - $t[0].length, T)))), v == "rtl" ? St.reverse() : St;
        };
      })();
      function b(e, t) {
        var i = e.order;
        return i == null && (i = e.order = I(e.text, t)), i;
      }
      var S = [], x = function(e, t, i) {
        if (e.addEventListener)
          e.addEventListener(t, i, !1);
        else if (e.attachEvent)
          e.attachEvent("on" + t, i);
        else {
          var r = e._handlers || (e._handlers = {});
          r[t] = (r[t] || S).concat(i);
        }
      };
      function re(e, t) {
        return e._handlers && e._handlers[t] || S;
      }
      function ie(e, t, i) {
        if (e.removeEventListener)
          e.removeEventListener(t, i, !1);
        else if (e.detachEvent)
          e.detachEvent("on" + t, i);
        else {
          var r = e._handlers, n = r && r[t];
          if (n) {
            var a = We(n, i);
            a > -1 && (r[t] = n.slice(0, a).concat(n.slice(a + 1)));
          }
        }
      }
      function me(e, t) {
        var i = re(e, t);
        if (i.length)
          for (var r = Array.prototype.slice.call(arguments, 2), n = 0; n < i.length; ++n)
            i[n].apply(null, r);
      }
      function ce(e, t, i) {
        return typeof t == "string" && (t = { type: t, preventDefault: function() {
          this.defaultPrevented = !0;
        } }), me(e, i || t.type, e, t), Be(t) || t.codemirrorIgnore;
      }
      function De(e) {
        var t = e._handlers && e._handlers.cursorActivity;
        if (t)
          for (var i = e.curOp.cursorActivityHandlers || (e.curOp.cursorActivityHandlers = []), r = 0; r < t.length; ++r)
            We(i, t[r]) == -1 && i.push(t[r]);
      }
      function Ie(e, t) {
        return re(e, t).length > 0;
      }
      function et(e) {
        e.prototype.on = function(t, i) {
          x(this, t, i);
        }, e.prototype.off = function(t, i) {
          ie(this, t, i);
        };
      }
      function Ae(e) {
        e.preventDefault ? e.preventDefault() : e.returnValue = !1;
      }
      function He(e) {
        e.stopPropagation ? e.stopPropagation() : e.cancelBubble = !0;
      }
      function Be(e) {
        return e.defaultPrevented != null ? e.defaultPrevented : e.returnValue == !1;
      }
      function Ge(e) {
        Ae(e), He(e);
      }
      function lt(e) {
        return e.target || e.srcElement;
      }
      function at(e) {
        var t = e.which;
        return t == null && (e.button & 1 ? t = 1 : e.button & 2 ? t = 3 : e.button & 4 && (t = 2)), G && e.ctrlKey && t == 1 && (t = 3), t;
      }
      var Kt = (function() {
        if (B && z < 9)
          return !1;
        var e = L("div");
        return "draggable" in e || "dragDrop" in e;
      })(), ur;
      function Bi(e) {
        if (ur == null) {
          var t = L("span", "​");
          Ne(e, L("span", [t, document.createTextNode("x")])), e.firstChild.offsetHeight != 0 && (ur = t.offsetWidth <= 1 && t.offsetHeight > 2 && !(B && z < 8));
        }
        var i = ur ? L("span", "​") : L("span", " ", null, "display: inline-block; width: 1px; margin-right: -1px");
        return i.setAttribute("cm-text", ""), i;
      }
      var Ir;
      function hn(e) {
        if (Ir != null)
          return Ir;
        var t = Ne(e, document.createTextNode("AخA")), i = $(t, 0, 1).getBoundingClientRect(), r = $(t, 1, 2).getBoundingClientRect();
        return Ee(e), !i || i.left == i.right ? !1 : Ir = r.right - i.right < 3;
      }
      var yr = `

b`.split(/\n/).length != 3 ? function(e) {
        for (var t = 0, i = [], r = e.length; t <= r; ) {
          var n = e.indexOf(`
`, t);
          n == -1 && (n = e.length);
          var a = e.slice(t, e.charAt(n - 1) == "\r" ? n - 1 : n), o = a.indexOf("\r");
          o != -1 ? (i.push(a.slice(0, o)), t += o + 1) : (i.push(a), t = n + 1);
        }
        return i;
      } : function(e) {
        return e.split(/\r\n?|\n/);
      }, dn = window.getSelection ? function(e) {
        try {
          return e.selectionStart != e.selectionEnd;
        } catch {
          return !1;
        }
      } : function(e) {
        var t;
        try {
          t = e.ownerDocument.selection.createRange();
        } catch {
        }
        return !t || t.parentElement() != e ? !1 : t.compareEndPoints("StartToEnd", t) != 0;
      }, pn = (function() {
        var e = L("div");
        return "oncopy" in e ? !0 : (e.setAttribute("oncopy", "return;"), typeof e.oncopy == "function");
      })(), pt = null;
      function sr(e) {
        if (pt != null)
          return pt;
        var t = Ne(e, L("span", "x")), i = t.getBoundingClientRect(), r = $(t, 0, 1).getBoundingClientRect();
        return pt = Math.abs(i.left - r.left) > 1;
      }
      var zt = {}, At = {};
      function Jt(e, t) {
        arguments.length > 2 && (t.dependencies = Array.prototype.slice.call(arguments, 2)), zt[e] = t;
      }
      function Dr(e, t) {
        At[e] = t;
      }
      function br(e) {
        if (typeof e == "string" && At.hasOwnProperty(e))
          e = At[e];
        else if (e && typeof e.name == "string" && At.hasOwnProperty(e.name)) {
          var t = At[e.name];
          typeof t == "string" && (t = { name: t }), e = O(t, e), e.name = t.name;
        } else {
          if (typeof e == "string" && /^[\w\-]+\/[\w\-]+\+xml$/.test(e))
            return br("application/xml");
          if (typeof e == "string" && /^[\w\-]+\/[\w\-]+\+json$/.test(e))
            return br("application/json");
        }
        return typeof e == "string" ? { name: e } : e || { name: "null" };
      }
      function ti(e, t) {
        t = br(t);
        var i = zt[t.name];
        if (!i)
          return ti(e, "text/plain");
        var r = i(e, t);
        if (Vt.hasOwnProperty(t.name)) {
          var n = Vt[t.name];
          for (var a in n)
            n.hasOwnProperty(a) && (r.hasOwnProperty(a) && (r["_" + a] = r[a]), r[a] = n[a]);
        }
        if (r.name = t.name, t.helperType && (r.helperType = t.helperType), t.modeProps)
          for (var o in t.modeProps)
            r[o] = t.modeProps[o];
        return r;
      }
      var Vt = {};
      function Ql(e, t) {
        var i = Vt.hasOwnProperty(e) ? Vt[e] : Vt[e] = {};
        nt(t, i);
      }
      function Cr(e, t) {
        if (t === !0)
          return t;
        if (e.copyState)
          return e.copyState(t);
        var i = {};
        for (var r in t) {
          var n = t[r];
          n instanceof Array && (n = n.concat([])), i[r] = n;
        }
        return i;
      }
      function gn(e, t) {
        for (var i; e.innerMode && (i = e.innerMode(t), !(!i || i.mode == e)); )
          t = i.state, e = i.mode;
        return i || { mode: e, state: t };
      }
      function ma(e, t, i) {
        return e.startState ? e.startState(t, i) : !0;
      }
      var ft = function(e, t, i) {
        this.pos = this.start = 0, this.string = e, this.tabSize = t || 8, this.lastColumnPos = this.lastColumnValue = 0, this.lineStart = 0, this.lineOracle = i;
      };
      ft.prototype.eol = function() {
        return this.pos >= this.string.length;
      }, ft.prototype.sol = function() {
        return this.pos == this.lineStart;
      }, ft.prototype.peek = function() {
        return this.string.charAt(this.pos) || void 0;
      }, ft.prototype.next = function() {
        if (this.pos < this.string.length)
          return this.string.charAt(this.pos++);
      }, ft.prototype.eat = function(e) {
        var t = this.string.charAt(this.pos), i;
        if (typeof e == "string" ? i = t == e : i = t && (e.test ? e.test(t) : e(t)), i)
          return ++this.pos, t;
      }, ft.prototype.eatWhile = function(e) {
        for (var t = this.pos; this.eat(e); )
          ;
        return this.pos > t;
      }, ft.prototype.eatSpace = function() {
        for (var e = this.pos; /[\s\u00a0]/.test(this.string.charAt(this.pos)); )
          ++this.pos;
        return this.pos > e;
      }, ft.prototype.skipToEnd = function() {
        this.pos = this.string.length;
      }, ft.prototype.skipTo = function(e) {
        var t = this.string.indexOf(e, this.pos);
        if (t > -1)
          return this.pos = t, !0;
      }, ft.prototype.backUp = function(e) {
        this.pos -= e;
      }, ft.prototype.column = function() {
        return this.lastColumnPos < this.start && (this.lastColumnValue = Ke(this.string, this.start, this.tabSize, this.lastColumnPos, this.lastColumnValue), this.lastColumnPos = this.start), this.lastColumnValue - (this.lineStart ? Ke(this.string, this.lineStart, this.tabSize) : 0);
      }, ft.prototype.indentation = function() {
        return Ke(this.string, null, this.tabSize) - (this.lineStart ? Ke(this.string, this.lineStart, this.tabSize) : 0);
      }, ft.prototype.match = function(e, t, i) {
        if (typeof e == "string") {
          var r = function(o) {
            return i ? o.toLowerCase() : o;
          }, n = this.string.substr(this.pos, e.length);
          if (r(n) == r(e))
            return t !== !1 && (this.pos += e.length), !0;
        } else {
          var a = this.string.slice(this.pos).match(e);
          return a && a.index > 0 ? null : (a && t !== !1 && (this.pos += a[0].length), a);
        }
      }, ft.prototype.current = function() {
        return this.string.slice(this.start, this.pos);
      }, ft.prototype.hideFirstChars = function(e, t) {
        this.lineStart += e;
        try {
          return t();
        } finally {
          this.lineStart -= e;
        }
      }, ft.prototype.lookAhead = function(e) {
        var t = this.lineOracle;
        return t && t.lookAhead(e);
      }, ft.prototype.baseToken = function() {
        var e = this.lineOracle;
        return e && e.baseToken(this.pos);
      };
      function we(e, t) {
        if (t -= e.first, t < 0 || t >= e.size)
          throw new Error("There is no line " + (t + e.first) + " in the document.");
        for (var i = e; !i.lines; )
          for (var r = 0; ; ++r) {
            var n = i.children[r], a = n.chunkSize();
            if (t < a) {
              i = n;
              break;
            }
            t -= a;
          }
        return i.lines[t];
      }
      function wr(e, t, i) {
        var r = [], n = t.line;
        return e.iter(t.line, i.line + 1, function(a) {
          var o = a.text;
          n == i.line && (o = o.slice(0, i.ch)), n == t.line && (o = o.slice(t.ch)), r.push(o), ++n;
        }), r;
      }
      function vn(e, t, i) {
        var r = [];
        return e.iter(t, i, function(n) {
          r.push(n.text);
        }), r;
      }
      function Xt(e, t) {
        var i = t - e.height;
        if (i)
          for (var r = e; r; r = r.parent)
            r.height += i;
      }
      function Ye(e) {
        if (e.parent == null)
          return null;
        for (var t = e.parent, i = We(t.lines, e), r = t.parent; r; t = r, r = r.parent)
          for (var n = 0; r.children[n] != t; ++n)
            i += r.children[n].chunkSize();
        return i + t.first;
      }
      function kr(e, t) {
        var i = e.first;
        e: do {
          for (var r = 0; r < e.children.length; ++r) {
            var n = e.children[r], a = n.height;
            if (t < a) {
              e = n;
              continue e;
            }
            t -= a, i += n.chunkSize();
          }
          return i;
        } while (!e.lines);
        for (var o = 0; o < e.lines.length; ++o) {
          var u = e.lines[o], s = u.height;
          if (t < s)
            break;
          t -= s;
        }
        return i + o;
      }
      function ri(e, t) {
        return t >= e.first && t < e.first + e.size;
      }
      function mn(e, t) {
        return String(e.lineNumberFormatter(t + e.firstLineNumber));
      }
      function J(e, t, i) {
        if (i === void 0 && (i = null), !(this instanceof J))
          return new J(e, t, i);
        this.line = e, this.ch = t, this.sticky = i;
      }
      function Me(e, t) {
        return e.line - t.line || e.ch - t.ch;
      }
      function xn(e, t) {
        return e.sticky == t.sticky && Me(e, t) == 0;
      }
      function yn(e) {
        return J(e.line, e.ch);
      }
      function Mi(e, t) {
        return Me(e, t) < 0 ? t : e;
      }
      function Oi(e, t) {
        return Me(e, t) < 0 ? e : t;
      }
      function xa(e, t) {
        return Math.max(e.first, Math.min(t, e.first + e.size - 1));
      }
      function Oe(e, t) {
        if (t.line < e.first)
          return J(e.first, 0);
        var i = e.first + e.size - 1;
        return t.line > i ? J(i, we(e, i).text.length) : $l(t, we(e, t.line).text.length);
      }
      function $l(e, t) {
        var i = e.ch;
        return i == null || i > t ? J(e.line, t) : i < 0 ? J(e.line, 0) : e;
      }
      function ya(e, t) {
        for (var i = [], r = 0; r < t.length; r++)
          i[r] = Oe(e, t[r]);
        return i;
      }
      var Ni = function(e, t) {
        this.state = e, this.lookAhead = t;
      }, Yt = function(e, t, i, r) {
        this.state = t, this.doc = e, this.line = i, this.maxLookAhead = r || 0, this.baseTokens = null, this.baseTokenPos = 1;
      };
      Yt.prototype.lookAhead = function(e) {
        var t = this.doc.getLine(this.line + e);
        return t != null && e > this.maxLookAhead && (this.maxLookAhead = e), t;
      }, Yt.prototype.baseToken = function(e) {
        if (!this.baseTokens)
          return null;
        for (; this.baseTokens[this.baseTokenPos] <= e; )
          this.baseTokenPos += 2;
        var t = this.baseTokens[this.baseTokenPos + 1];
        return {
          type: t && t.replace(/( |^)overlay .*/, ""),
          size: this.baseTokens[this.baseTokenPos] - e
        };
      }, Yt.prototype.nextLine = function() {
        this.line++, this.maxLookAhead > 0 && this.maxLookAhead--;
      }, Yt.fromSaved = function(e, t, i) {
        return t instanceof Ni ? new Yt(e, Cr(e.mode, t.state), i, t.lookAhead) : new Yt(e, Cr(e.mode, t), i);
      }, Yt.prototype.save = function(e) {
        var t = e !== !1 ? Cr(this.doc.mode, this.state) : this.state;
        return this.maxLookAhead > 0 ? new Ni(t, this.maxLookAhead) : t;
      };
      function Da(e, t, i, r) {
        var n = [e.state.modeGen], a = {};
        Fa(
          e,
          t.text,
          e.doc.mode,
          i,
          function(f, v) {
            return n.push(f, v);
          },
          a,
          r
        );
        for (var o = i.state, u = function(f) {
          i.baseTokens = n;
          var v = e.state.overlays[f], y = 1, T = 0;
          i.state = !0, Fa(e, t.text, v.mode, i, function(A, q) {
            for (var Y = y; T < A; ) {
              var V = n[y];
              V > A && n.splice(y, 1, A, n[y + 1], V), y += 2, T = Math.min(A, V);
            }
            if (q)
              if (v.opaque)
                n.splice(Y, y - Y, A, "overlay " + q), y = Y + 2;
              else
                for (; Y < y; Y += 2) {
                  var oe = n[Y + 1];
                  n[Y + 1] = (oe ? oe + " " : "") + "overlay " + q;
                }
          }, a), i.state = o, i.baseTokens = null, i.baseTokenPos = 1;
        }, s = 0; s < e.state.overlays.length; ++s) u(s);
        return { styles: n, classes: a.bgClass || a.textClass ? a : null };
      }
      function ba(e, t, i) {
        if (!t.styles || t.styles[0] != e.state.modeGen) {
          var r = ii(e, Ye(t)), n = t.text.length > e.options.maxHighlightLength && Cr(e.doc.mode, r.state), a = Da(e, t, r);
          n && (r.state = n), t.stateAfter = r.save(!n), t.styles = a.styles, a.classes ? t.styleClasses = a.classes : t.styleClasses && (t.styleClasses = null), i === e.doc.highlightFrontier && (e.doc.modeFrontier = Math.max(e.doc.modeFrontier, ++e.doc.highlightFrontier));
        }
        return t.styles;
      }
      function ii(e, t, i) {
        var r = e.doc, n = e.display;
        if (!r.mode.startState)
          return new Yt(r, !0, t);
        var a = Jl(e, t, i), o = a > r.first && we(r, a - 1).stateAfter, u = o ? Yt.fromSaved(r, o, a) : new Yt(r, ma(r.mode), a);
        return r.iter(a, t, function(s) {
          Dn(e, s.text, u);
          var f = u.line;
          s.stateAfter = f == t - 1 || f % 5 == 0 || f >= n.viewFrom && f < n.viewTo ? u.save() : null, u.nextLine();
        }), i && (r.modeFrontier = u.line), u;
      }
      function Dn(e, t, i, r) {
        var n = e.doc.mode, a = new ft(t, e.options.tabSize, i);
        for (a.start = a.pos = r || 0, t == "" && Ca(n, i.state); !a.eol(); )
          bn(n, a, i.state), a.start = a.pos;
      }
      function Ca(e, t) {
        if (e.blankLine)
          return e.blankLine(t);
        if (e.innerMode) {
          var i = gn(e, t);
          if (i.mode.blankLine)
            return i.mode.blankLine(i.state);
        }
      }
      function bn(e, t, i, r) {
        for (var n = 0; n < 10; n++) {
          r && (r[0] = gn(e, i).mode);
          var a = e.token(t, i);
          if (t.pos > t.start)
            return a;
        }
        throw new Error("Mode " + e.name + " failed to advance stream.");
      }
      var wa = function(e, t, i) {
        this.start = e.start, this.end = e.pos, this.string = e.current(), this.type = t || null, this.state = i;
      };
      function ka(e, t, i, r) {
        var n = e.doc, a = n.mode, o;
        t = Oe(n, t);
        var u = we(n, t.line), s = ii(e, t.line, i), f = new ft(u.text, e.options.tabSize, s), v;
        for (r && (v = []); (r || f.pos < t.ch) && !f.eol(); )
          f.start = f.pos, o = bn(a, f, s.state), r && v.push(new wa(f, o, Cr(n.mode, s.state)));
        return r ? v : new wa(f, o, s.state);
      }
      function Sa(e, t) {
        if (e)
          for (; ; ) {
            var i = e.match(/(?:^|\s+)line-(background-)?(\S+)/);
            if (!i)
              break;
            e = e.slice(0, i.index) + e.slice(i.index + i[0].length);
            var r = i[1] ? "bgClass" : "textClass";
            t[r] == null ? t[r] = i[2] : new RegExp("(?:^|\\s)" + i[2] + "(?:$|\\s)").test(t[r]) || (t[r] += " " + i[2]);
          }
        return e;
      }
      function Fa(e, t, i, r, n, a, o) {
        var u = i.flattenSpans;
        u == null && (u = e.options.flattenSpans);
        var s = 0, f = null, v = new ft(t, e.options.tabSize, r), y, T = e.options.addModeClass && [null];
        for (t == "" && Sa(Ca(i, r.state), a); !v.eol(); ) {
          if (v.pos > e.options.maxHighlightLength ? (u = !1, o && Dn(e, t, r, v.pos), v.pos = t.length, y = null) : y = Sa(bn(i, v, r.state, T), a), T) {
            var A = T[0].name;
            A && (y = "m-" + (y ? A + " " + y : A));
          }
          if (!u || f != y) {
            for (; s < v.start; )
              s = Math.min(v.start, s + 5e3), n(s, f);
            f = y;
          }
          v.start = v.pos;
        }
        for (; s < v.pos; ) {
          var q = Math.min(v.pos, s + 5e3);
          n(q, f), s = q;
        }
      }
      function Jl(e, t, i) {
        for (var r, n, a = e.doc, o = i ? -1 : t - (e.doc.mode.innerMode ? 1e3 : 100), u = t; u > o; --u) {
          if (u <= a.first)
            return a.first;
          var s = we(a, u - 1), f = s.stateAfter;
          if (f && (!i || u + (f instanceof Ni ? f.lookAhead : 0) <= a.modeFrontier))
            return u;
          var v = Ke(s.text, null, e.options.tabSize);
          (n == null || r > v) && (n = u - 1, r = v);
        }
        return n;
      }
      function Vl(e, t) {
        if (e.modeFrontier = Math.min(e.modeFrontier, t), !(e.highlightFrontier < t - 10)) {
          for (var i = e.first, r = t - 1; r > i; r--) {
            var n = we(e, r).stateAfter;
            if (n && (!(n instanceof Ni) || r + n.lookAhead < t)) {
              i = r + 1;
              break;
            }
          }
          e.highlightFrontier = Math.min(e.highlightFrontier, i);
        }
      }
      var Aa = !1, er = !1;
      function eu() {
        Aa = !0;
      }
      function tu() {
        er = !0;
      }
      function Ii(e, t, i) {
        this.marker = e, this.from = t, this.to = i;
      }
      function ni(e, t) {
        if (e)
          for (var i = 0; i < e.length; ++i) {
            var r = e[i];
            if (r.marker == t)
              return r;
          }
      }
      function ru(e, t) {
        for (var i, r = 0; r < e.length; ++r)
          e[r] != t && (i || (i = [])).push(e[r]);
        return i;
      }
      function iu(e, t, i) {
        var r = i && window.WeakSet && (i.markedSpans || (i.markedSpans = /* @__PURE__ */ new WeakSet()));
        r && e.markedSpans && r.has(e.markedSpans) ? e.markedSpans.push(t) : (e.markedSpans = e.markedSpans ? e.markedSpans.concat([t]) : [t], r && r.add(e.markedSpans)), t.marker.attachLine(e);
      }
      function nu(e, t, i) {
        var r;
        if (e)
          for (var n = 0; n < e.length; ++n) {
            var a = e[n], o = a.marker, u = a.from == null || (o.inclusiveLeft ? a.from <= t : a.from < t);
            if (u || a.from == t && o.type == "bookmark" && (!i || !a.marker.insertLeft)) {
              var s = a.to == null || (o.inclusiveRight ? a.to >= t : a.to > t);
              (r || (r = [])).push(new Ii(o, a.from, s ? null : a.to));
            }
          }
        return r;
      }
      function au(e, t, i) {
        var r;
        if (e)
          for (var n = 0; n < e.length; ++n) {
            var a = e[n], o = a.marker, u = a.to == null || (o.inclusiveRight ? a.to >= t : a.to > t);
            if (u || a.from == t && o.type == "bookmark" && (!i || a.marker.insertLeft)) {
              var s = a.from == null || (o.inclusiveLeft ? a.from <= t : a.from < t);
              (r || (r = [])).push(new Ii(
                o,
                s ? null : a.from - t,
                a.to == null ? null : a.to - t
              ));
            }
          }
        return r;
      }
      function Cn(e, t) {
        if (t.full)
          return null;
        var i = ri(e, t.from.line) && we(e, t.from.line).markedSpans, r = ri(e, t.to.line) && we(e, t.to.line).markedSpans;
        if (!i && !r)
          return null;
        var n = t.from.ch, a = t.to.ch, o = Me(t.from, t.to) == 0, u = nu(i, n, o), s = au(r, a, o), f = t.text.length == 1, v = Pe(t.text).length + (f ? n : 0);
        if (u)
          for (var y = 0; y < u.length; ++y) {
            var T = u[y];
            if (T.to == null) {
              var A = ni(s, T.marker);
              A ? f && (T.to = A.to == null ? null : A.to + v) : T.to = n;
            }
          }
        if (s)
          for (var q = 0; q < s.length; ++q) {
            var Y = s[q];
            if (Y.to != null && (Y.to += v), Y.from == null) {
              var V = ni(u, Y.marker);
              V || (Y.from = v, f && (u || (u = [])).push(Y));
            } else
              Y.from += v, f && (u || (u = [])).push(Y);
          }
        u && (u = Ea(u)), s && s != u && (s = Ea(s));
        var oe = [u];
        if (!f) {
          var pe = t.text.length - 2, le;
          if (pe > 0 && u)
            for (var ve = 0; ve < u.length; ++ve)
              u[ve].to == null && (le || (le = [])).push(new Ii(u[ve].marker, null, null));
          for (var Fe = 0; Fe < pe; ++Fe)
            oe.push(le);
          oe.push(s);
        }
        return oe;
      }
      function Ea(e) {
        for (var t = 0; t < e.length; ++t) {
          var i = e[t];
          i.from != null && i.from == i.to && i.marker.clearWhenEmpty !== !1 && e.splice(t--, 1);
        }
        return e.length ? e : null;
      }
      function ou(e, t, i) {
        var r = null;
        if (e.iter(t.line, i.line + 1, function(A) {
          if (A.markedSpans)
            for (var q = 0; q < A.markedSpans.length; ++q) {
              var Y = A.markedSpans[q].marker;
              Y.readOnly && (!r || We(r, Y) == -1) && (r || (r = [])).push(Y);
            }
        }), !r)
          return null;
        for (var n = [{ from: t, to: i }], a = 0; a < r.length; ++a)
          for (var o = r[a], u = o.find(0), s = 0; s < n.length; ++s) {
            var f = n[s];
            if (!(Me(f.to, u.from) < 0 || Me(f.from, u.to) > 0)) {
              var v = [s, 1], y = Me(f.from, u.from), T = Me(f.to, u.to);
              (y < 0 || !o.inclusiveLeft && !y) && v.push({ from: f.from, to: u.from }), (T > 0 || !o.inclusiveRight && !T) && v.push({ from: u.to, to: f.to }), n.splice.apply(n, v), s += v.length - 3;
            }
          }
        return n;
      }
      function La(e) {
        var t = e.markedSpans;
        if (t) {
          for (var i = 0; i < t.length; ++i)
            t[i].marker.detachLine(e);
          e.markedSpans = null;
        }
      }
      function Ta(e, t) {
        if (t) {
          for (var i = 0; i < t.length; ++i)
            t[i].marker.attachLine(e);
          e.markedSpans = t;
        }
      }
      function Hi(e) {
        return e.inclusiveLeft ? -1 : 0;
      }
      function Ri(e) {
        return e.inclusiveRight ? 1 : 0;
      }
      function wn(e, t) {
        var i = e.lines.length - t.lines.length;
        if (i != 0)
          return i;
        var r = e.find(), n = t.find(), a = Me(r.from, n.from) || Hi(e) - Hi(t);
        if (a)
          return -a;
        var o = Me(r.to, n.to) || Ri(e) - Ri(t);
        return o || t.id - e.id;
      }
      function Ba(e, t) {
        var i = er && e.markedSpans, r;
        if (i)
          for (var n = void 0, a = 0; a < i.length; ++a)
            n = i[a], n.marker.collapsed && (t ? n.from : n.to) == null && (!r || wn(r, n.marker) < 0) && (r = n.marker);
        return r;
      }
      function Ma(e) {
        return Ba(e, !0);
      }
      function Pi(e) {
        return Ba(e, !1);
      }
      function lu(e, t) {
        var i = er && e.markedSpans, r;
        if (i)
          for (var n = 0; n < i.length; ++n) {
            var a = i[n];
            a.marker.collapsed && (a.from == null || a.from < t) && (a.to == null || a.to > t) && (!r || wn(r, a.marker) < 0) && (r = a.marker);
          }
        return r;
      }
      function Oa(e, t, i, r, n) {
        var a = we(e, t), o = er && a.markedSpans;
        if (o)
          for (var u = 0; u < o.length; ++u) {
            var s = o[u];
            if (s.marker.collapsed) {
              var f = s.marker.find(0), v = Me(f.from, i) || Hi(s.marker) - Hi(n), y = Me(f.to, r) || Ri(s.marker) - Ri(n);
              if (!(v >= 0 && y <= 0 || v <= 0 && y >= 0) && (v <= 0 && (s.marker.inclusiveRight && n.inclusiveLeft ? Me(f.to, i) >= 0 : Me(f.to, i) > 0) || v >= 0 && (s.marker.inclusiveRight && n.inclusiveLeft ? Me(f.from, r) <= 0 : Me(f.from, r) < 0)))
                return !0;
            }
          }
      }
      function qt(e) {
        for (var t; t = Ma(e); )
          e = t.find(-1, !0).line;
        return e;
      }
      function uu(e) {
        for (var t; t = Pi(e); )
          e = t.find(1, !0).line;
        return e;
      }
      function su(e) {
        for (var t, i; t = Pi(e); )
          e = t.find(1, !0).line, (i || (i = [])).push(e);
        return i;
      }
      function kn(e, t) {
        var i = we(e, t), r = qt(i);
        return i == r ? t : Ye(r);
      }
      function Na(e, t) {
        if (t > e.lastLine())
          return t;
        var i = we(e, t), r;
        if (!fr(e, i))
          return t;
        for (; r = Pi(i); )
          i = r.find(1, !0).line;
        return Ye(i) + 1;
      }
      function fr(e, t) {
        var i = er && t.markedSpans;
        if (i) {
          for (var r = void 0, n = 0; n < i.length; ++n)
            if (r = i[n], !!r.marker.collapsed) {
              if (r.from == null)
                return !0;
              if (!r.marker.widgetNode && r.from == 0 && r.marker.inclusiveLeft && Sn(e, t, r))
                return !0;
            }
        }
      }
      function Sn(e, t, i) {
        if (i.to == null) {
          var r = i.marker.find(1, !0);
          return Sn(e, r.line, ni(r.line.markedSpans, i.marker));
        }
        if (i.marker.inclusiveRight && i.to == t.text.length)
          return !0;
        for (var n = void 0, a = 0; a < t.markedSpans.length; ++a)
          if (n = t.markedSpans[a], n.marker.collapsed && !n.marker.widgetNode && n.from == i.to && (n.to == null || n.to != i.from) && (n.marker.inclusiveLeft || i.marker.inclusiveRight) && Sn(e, t, n))
            return !0;
      }
      function tr(e) {
        e = qt(e);
        for (var t = 0, i = e.parent, r = 0; r < i.lines.length; ++r) {
          var n = i.lines[r];
          if (n == e)
            break;
          t += n.height;
        }
        for (var a = i.parent; a; i = a, a = i.parent)
          for (var o = 0; o < a.children.length; ++o) {
            var u = a.children[o];
            if (u == i)
              break;
            t += u.height;
          }
        return t;
      }
      function zi(e) {
        if (e.height == 0)
          return 0;
        for (var t = e.text.length, i, r = e; i = Ma(r); ) {
          var n = i.find(0, !0);
          r = n.from.line, t += n.from.ch - n.to.ch;
        }
        for (r = e; i = Pi(r); ) {
          var a = i.find(0, !0);
          t -= r.text.length - a.from.ch, r = a.to.line, t += r.text.length - a.to.ch;
        }
        return t;
      }
      function Fn(e) {
        var t = e.display, i = e.doc;
        t.maxLine = we(i, i.first), t.maxLineLength = zi(t.maxLine), t.maxLineChanged = !0, i.iter(function(r) {
          var n = zi(r);
          n > t.maxLineLength && (t.maxLineLength = n, t.maxLine = r);
        });
      }
      var Hr = function(e, t, i) {
        this.text = e, Ta(this, t), this.height = i ? i(this) : 1;
      };
      Hr.prototype.lineNo = function() {
        return Ye(this);
      }, et(Hr);
      function fu(e, t, i, r) {
        e.text = t, e.stateAfter && (e.stateAfter = null), e.styles && (e.styles = null), e.order != null && (e.order = null), La(e), Ta(e, i);
        var n = r ? r(e) : 1;
        n != e.height && Xt(e, n);
      }
      function cu(e) {
        e.parent = null, La(e);
      }
      var hu = {}, du = {};
      function Ia(e, t) {
        if (!e || /^\s*$/.test(e))
          return null;
        var i = t.addModeClass ? du : hu;
        return i[e] || (i[e] = e.replace(/\S+/g, "cm-$&"));
      }
      function Ha(e, t) {
        var i = ee("span", null, null, te ? "padding-right: .1px" : null), r = {
          pre: ee("pre", [i], "CodeMirror-line"),
          content: i,
          col: 0,
          pos: 0,
          cm: e,
          trailingSpace: !1,
          splitSpaces: e.getOption("lineWrapping")
        };
        t.measure = {};
        for (var n = 0; n <= (t.rest ? t.rest.length : 0); n++) {
          var a = n ? t.rest[n - 1] : t.line, o = void 0;
          r.pos = 0, r.addToken = gu, hn(e.display.measure) && (o = b(a, e.doc.direction)) && (r.addToken = mu(r.addToken, o)), r.map = [];
          var u = t != e.display.externalMeasured && Ye(a);
          xu(a, r, ba(e, a, u)), a.styleClasses && (a.styleClasses.bgClass && (r.bgClass = Pt(a.styleClasses.bgClass, r.bgClass || "")), a.styleClasses.textClass && (r.textClass = Pt(a.styleClasses.textClass, r.textClass || ""))), r.map.length == 0 && r.map.push(0, 0, r.content.appendChild(Bi(e.display.measure))), n == 0 ? (t.measure.map = r.map, t.measure.cache = {}) : ((t.measure.maps || (t.measure.maps = [])).push(r.map), (t.measure.caches || (t.measure.caches = [])).push({}));
        }
        if (te) {
          var s = r.content.lastChild;
          (/\bcm-tab\b/.test(s.className) || s.querySelector && s.querySelector(".cm-tab")) && (r.content.className = "cm-tab-wrap-hack");
        }
        return me(e, "renderLine", e, t.line, r.pre), r.pre.className && (r.textClass = Pt(r.pre.className, r.textClass || "")), r;
      }
      function pu(e) {
        var t = L("span", "•", "cm-invalidchar");
        return t.title = "\\u" + e.charCodeAt(0).toString(16), t.setAttribute("aria-label", t.title), t;
      }
      function gu(e, t, i, r, n, a, o) {
        if (t) {
          var u = e.splitSpaces ? vu(t, e.trailingSpace) : t, s = e.cm.state.specialChars, f = !1, v;
          if (!s.test(t))
            e.col += t.length, v = document.createTextNode(u), e.map.push(e.pos, e.pos + t.length, v), B && z < 9 && (f = !0), e.pos += t.length;
          else {
            v = document.createDocumentFragment();
            for (var y = 0; ; ) {
              s.lastIndex = y;
              var T = s.exec(t), A = T ? T.index - y : t.length - y;
              if (A) {
                var q = document.createTextNode(u.slice(y, y + A));
                B && z < 9 ? v.appendChild(L("span", [q])) : v.appendChild(q), e.map.push(e.pos, e.pos + A, q), e.col += A, e.pos += A;
              }
              if (!T)
                break;
              y += A + 1;
              var Y = void 0;
              if (T[0] == "	") {
                var V = e.cm.options.tabSize, oe = V - e.col % V;
                Y = v.appendChild(L("span", dt(oe), "cm-tab")), Y.setAttribute("role", "presentation"), Y.setAttribute("cm-text", "	"), e.col += oe;
              } else T[0] == "\r" || T[0] == `
` ? (Y = v.appendChild(L("span", T[0] == "\r" ? "␍" : "␤", "cm-invalidchar")), Y.setAttribute("cm-text", T[0]), e.col += 1) : (Y = e.cm.options.specialCharPlaceholder(T[0]), Y.setAttribute("cm-text", T[0]), B && z < 9 ? v.appendChild(L("span", [Y])) : v.appendChild(Y), e.col += 1);
              e.map.push(e.pos, e.pos + 1, Y), e.pos++;
            }
          }
          if (e.trailingSpace = u.charCodeAt(t.length - 1) == 32, i || r || n || f || a || o) {
            var pe = i || "";
            r && (pe += r), n && (pe += n);
            var le = L("span", [v], pe, a);
            if (o)
              for (var ve in o)
                o.hasOwnProperty(ve) && ve != "style" && ve != "class" && le.setAttribute(ve, o[ve]);
            return e.content.appendChild(le);
          }
          e.content.appendChild(v);
        }
      }
      function vu(e, t) {
        if (e.length > 1 && !/  /.test(e))
          return e;
        for (var i = t, r = "", n = 0; n < e.length; n++) {
          var a = e.charAt(n);
          a == " " && i && (n == e.length - 1 || e.charCodeAt(n + 1) == 32) && (a = " "), r += a, i = a == " ";
        }
        return r;
      }
      function mu(e, t) {
        return function(i, r, n, a, o, u, s) {
          n = n ? n + " cm-force-border" : "cm-force-border";
          for (var f = i.pos, v = f + r.length; ; ) {
            for (var y = void 0, T = 0; T < t.length && (y = t[T], !(y.to > f && y.from <= f)); T++)
              ;
            if (y.to >= v)
              return e(i, r, n, a, o, u, s);
            e(i, r.slice(0, y.to - f), n, a, null, u, s), a = null, r = r.slice(y.to - f), f = y.to;
          }
        };
      }
      function Ra(e, t, i, r) {
        var n = !r && i.widgetNode;
        n && e.map.push(e.pos, e.pos + t, n), !r && e.cm.display.input.needsContentAttribute && (n || (n = e.content.appendChild(document.createElement("span"))), n.setAttribute("cm-marker", i.id)), n && (e.cm.display.input.setUneditable(n), e.content.appendChild(n)), e.pos += t, e.trailingSpace = !1;
      }
      function xu(e, t, i) {
        var r = e.markedSpans, n = e.text, a = 0;
        if (!r) {
          for (var o = 1; o < i.length; o += 2)
            t.addToken(t, n.slice(a, a = i[o]), Ia(i[o + 1], t.cm.options));
          return;
        }
        for (var u = n.length, s = 0, f = 1, v = "", y, T, A = 0, q, Y, V, oe, pe; ; ) {
          if (A == s) {
            q = Y = V = T = "", pe = null, oe = null, A = 1 / 0;
            for (var le = [], ve = void 0, Fe = 0; Fe < r.length; ++Fe) {
              var ke = r[Fe], Re = ke.marker;
              if (Re.type == "bookmark" && ke.from == s && Re.widgetNode)
                le.push(Re);
              else if (ke.from <= s && (ke.to == null || ke.to > s || Re.collapsed && ke.to == s && ke.from == s)) {
                if (ke.to != null && ke.to != s && A > ke.to && (A = ke.to, Y = ""), Re.className && (q += " " + Re.className), Re.css && (T = (T ? T + ";" : "") + Re.css), Re.startStyle && ke.from == s && (V += " " + Re.startStyle), Re.endStyle && ke.to == A && (ve || (ve = [])).push(Re.endStyle, ke.to), Re.title && ((pe || (pe = {})).title = Re.title), Re.attributes)
                  for (var Qe in Re.attributes)
                    (pe || (pe = {}))[Qe] = Re.attributes[Qe];
                Re.collapsed && (!oe || wn(oe.marker, Re) < 0) && (oe = ke);
              } else ke.from > s && A > ke.from && (A = ke.from);
            }
            if (ve)
              for (var yt = 0; yt < ve.length; yt += 2)
                ve[yt + 1] == A && (Y += " " + ve[yt]);
            if (!oe || oe.from == s)
              for (var rt = 0; rt < le.length; ++rt)
                Ra(t, 0, le[rt]);
            if (oe && (oe.from || 0) == s) {
              if (Ra(
                t,
                (oe.to == null ? u + 1 : oe.to) - s,
                oe.marker,
                oe.from == null
              ), oe.to == null)
                return;
              oe.to == s && (oe = !1);
            }
          }
          if (s >= u)
            break;
          for (var Rt = Math.min(u, A); ; ) {
            if (v) {
              var Mt = s + v.length;
              if (!oe) {
                var ct = Mt > Rt ? v.slice(0, Rt - s) : v;
                t.addToken(
                  t,
                  ct,
                  y ? y + q : q,
                  V,
                  s + ct.length == A ? Y : "",
                  T,
                  pe
                );
              }
              if (Mt >= Rt) {
                v = v.slice(Rt - s), s = Rt;
                break;
              }
              s = Mt, V = "";
            }
            v = n.slice(a, a = i[f++]), y = Ia(i[f++], t.cm.options);
          }
        }
      }
      function Pa(e, t, i) {
        this.line = t, this.rest = su(t), this.size = this.rest ? Ye(Pe(this.rest)) - i + 1 : 1, this.node = this.text = null, this.hidden = fr(e, t);
      }
      function Wi(e, t, i) {
        for (var r = [], n, a = t; a < i; a = n) {
          var o = new Pa(e.doc, we(e.doc, a), a);
          n = a + o.size, r.push(o);
        }
        return r;
      }
      var Rr = null;
      function yu(e) {
        Rr ? Rr.ops.push(e) : e.ownsGroup = Rr = {
          ops: [e],
          delayedCallbacks: []
        };
      }
      function Du(e) {
        var t = e.delayedCallbacks, i = 0;
        do {
          for (; i < t.length; i++)
            t[i].call(null);
          for (var r = 0; r < e.ops.length; r++) {
            var n = e.ops[r];
            if (n.cursorActivityHandlers)
              for (; n.cursorActivityCalled < n.cursorActivityHandlers.length; )
                n.cursorActivityHandlers[n.cursorActivityCalled++].call(null, n.cm);
          }
        } while (i < t.length);
      }
      function bu(e, t) {
        var i = e.ownsGroup;
        if (i)
          try {
            Du(i);
          } finally {
            Rr = null, t(i);
          }
      }
      var ai = null;
      function vt(e, t) {
        var i = re(e, t);
        if (i.length) {
          var r = Array.prototype.slice.call(arguments, 2), n;
          Rr ? n = Rr.delayedCallbacks : ai ? n = ai : (n = ai = [], setTimeout(Cu, 0));
          for (var a = function(u) {
            n.push(function() {
              return i[u].apply(null, r);
            });
          }, o = 0; o < i.length; ++o)
            a(o);
        }
      }
      function Cu() {
        var e = ai;
        ai = null;
        for (var t = 0; t < e.length; ++t)
          e[t]();
      }
      function za(e, t, i, r) {
        for (var n = 0; n < t.changes.length; n++) {
          var a = t.changes[n];
          a == "text" ? ku(e, t) : a == "gutter" ? _a(e, t, i, r) : a == "class" ? An(e, t) : a == "widget" && Su(e, t, r);
        }
        t.changes = null;
      }
      function oi(e) {
        return e.node == e.text && (e.node = L("div", null, null, "position: relative"), e.text.parentNode && e.text.parentNode.replaceChild(e.node, e.text), e.node.appendChild(e.text), B && z < 8 && (e.node.style.zIndex = 2)), e.node;
      }
      function wu(e, t) {
        var i = t.bgClass ? t.bgClass + " " + (t.line.bgClass || "") : t.line.bgClass;
        if (i && (i += " CodeMirror-linebackground"), t.background)
          i ? t.background.className = i : (t.background.parentNode.removeChild(t.background), t.background = null);
        else if (i) {
          var r = oi(t);
          t.background = r.insertBefore(L("div", null, i), r.firstChild), e.display.input.setUneditable(t.background);
        }
      }
      function Wa(e, t) {
        var i = e.display.externalMeasured;
        return i && i.line == t.line ? (e.display.externalMeasured = null, t.measure = i.measure, i.built) : Ha(e, t);
      }
      function ku(e, t) {
        var i = t.text.className, r = Wa(e, t);
        t.text == t.node && (t.node = r.pre), t.text.parentNode.replaceChild(r.pre, t.text), t.text = r.pre, r.bgClass != t.bgClass || r.textClass != t.textClass ? (t.bgClass = r.bgClass, t.textClass = r.textClass, An(e, t)) : i && (t.text.className = i);
      }
      function An(e, t) {
        wu(e, t), t.line.wrapClass ? oi(t).className = t.line.wrapClass : t.node != t.text && (t.node.className = "");
        var i = t.textClass ? t.textClass + " " + (t.line.textClass || "") : t.line.textClass;
        t.text.className = i || "";
      }
      function _a(e, t, i, r) {
        if (t.gutter && (t.node.removeChild(t.gutter), t.gutter = null), t.gutterBackground && (t.node.removeChild(t.gutterBackground), t.gutterBackground = null), t.line.gutterClass) {
          var n = oi(t);
          t.gutterBackground = L(
            "div",
            null,
            "CodeMirror-gutter-background " + t.line.gutterClass,
            "left: " + (e.options.fixedGutter ? r.fixedPos : -r.gutterTotalWidth) + "px; width: " + r.gutterTotalWidth + "px"
          ), e.display.input.setUneditable(t.gutterBackground), n.insertBefore(t.gutterBackground, t.text);
        }
        var a = t.line.gutterMarkers;
        if (e.options.lineNumbers || a) {
          var o = oi(t), u = t.gutter = L("div", null, "CodeMirror-gutter-wrapper", "left: " + (e.options.fixedGutter ? r.fixedPos : -r.gutterTotalWidth) + "px");
          if (u.setAttribute("aria-hidden", "true"), e.display.input.setUneditable(u), o.insertBefore(u, t.text), t.line.gutterClass && (u.className += " " + t.line.gutterClass), e.options.lineNumbers && (!a || !a["CodeMirror-linenumbers"]) && (t.lineNumber = u.appendChild(
            L(
              "div",
              mn(e.options, i),
              "CodeMirror-linenumber CodeMirror-gutter-elt",
              "left: " + r.gutterLeft["CodeMirror-linenumbers"] + "px; width: " + e.display.lineNumInnerWidth + "px"
            )
          )), a)
            for (var s = 0; s < e.display.gutterSpecs.length; ++s) {
              var f = e.display.gutterSpecs[s].className, v = a.hasOwnProperty(f) && a[f];
              v && u.appendChild(L(
                "div",
                [v],
                "CodeMirror-gutter-elt",
                "left: " + r.gutterLeft[f] + "px; width: " + r.gutterWidth[f] + "px"
              ));
            }
        }
      }
      function Su(e, t, i) {
        t.alignable && (t.alignable = null);
        for (var r = ae("CodeMirror-linewidget"), n = t.node.firstChild, a = void 0; n; n = a)
          a = n.nextSibling, r.test(n.className) && t.node.removeChild(n);
        qa(e, t, i);
      }
      function Fu(e, t, i, r) {
        var n = Wa(e, t);
        return t.text = t.node = n.pre, n.bgClass && (t.bgClass = n.bgClass), n.textClass && (t.textClass = n.textClass), An(e, t), _a(e, t, i, r), qa(e, t, r), t.node;
      }
      function qa(e, t, i) {
        if (Ua(e, t.line, t, i, !0), t.rest)
          for (var r = 0; r < t.rest.length; r++)
            Ua(e, t.rest[r], t, i, !1);
      }
      function Ua(e, t, i, r, n) {
        if (t.widgets)
          for (var a = oi(i), o = 0, u = t.widgets; o < u.length; ++o) {
            var s = u[o], f = L("div", [s.node], "CodeMirror-linewidget" + (s.className ? " " + s.className : ""));
            s.handleMouseEvents || f.setAttribute("cm-ignore-events", "true"), Au(s, f, i, r), e.display.input.setUneditable(f), n && s.above ? a.insertBefore(f, i.gutter || i.text) : a.appendChild(f), vt(s, "redraw");
          }
      }
      function Au(e, t, i, r) {
        if (e.noHScroll) {
          (i.alignable || (i.alignable = [])).push(t);
          var n = r.wrapperWidth;
          t.style.left = r.fixedPos + "px", e.coverGutter || (n -= r.gutterTotalWidth, t.style.paddingLeft = r.gutterTotalWidth + "px"), t.style.width = n + "px";
        }
        e.coverGutter && (t.style.zIndex = 5, t.style.position = "relative", e.noHScroll || (t.style.marginLeft = -r.gutterTotalWidth + "px"));
      }
      function li(e) {
        if (e.height != null)
          return e.height;
        var t = e.doc.cm;
        if (!t)
          return 0;
        if (!be(document.body, e.node)) {
          var i = "position: relative;";
          e.coverGutter && (i += "margin-left: -" + t.display.gutters.offsetWidth + "px;"), e.noHScroll && (i += "width: " + t.display.wrapper.clientWidth + "px;"), Ne(t.display.measure, L("div", [e.node], null, i));
        }
        return e.height = e.node.parentNode.offsetHeight;
      }
      function rr(e, t) {
        for (var i = lt(t); i != e.wrapper; i = i.parentNode)
          if (!i || i.nodeType == 1 && i.getAttribute("cm-ignore-events") == "true" || i.parentNode == e.sizer && i != e.mover)
            return !0;
      }
      function _i(e) {
        return e.lineSpace.offsetTop;
      }
      function En(e) {
        return e.mover.offsetHeight - e.lineSpace.offsetHeight;
      }
      function Ga(e) {
        if (e.cachedPaddingH)
          return e.cachedPaddingH;
        var t = Ne(e.measure, L("pre", "x", "CodeMirror-line-like")), i = window.getComputedStyle ? window.getComputedStyle(t) : t.currentStyle, r = { left: parseInt(i.paddingLeft), right: parseInt(i.paddingRight) };
        return !isNaN(r.left) && !isNaN(r.right) && (e.cachedPaddingH = r), r;
      }
      function Zt(e) {
        return qe - e.display.nativeBarWidth;
      }
      function Sr(e) {
        return e.display.scroller.clientWidth - Zt(e) - e.display.barWidth;
      }
      function Ln(e) {
        return e.display.scroller.clientHeight - Zt(e) - e.display.barHeight;
      }
      function Eu(e, t, i) {
        var r = e.options.lineWrapping, n = r && Sr(e);
        if (!t.measure.heights || r && t.measure.width != n) {
          var a = t.measure.heights = [];
          if (r) {
            t.measure.width = n;
            for (var o = t.text.firstChild.getClientRects(), u = 0; u < o.length - 1; u++) {
              var s = o[u], f = o[u + 1];
              Math.abs(s.bottom - f.bottom) > 2 && a.push((s.bottom + f.top) / 2 - i.top);
            }
          }
          a.push(i.bottom - i.top);
        }
      }
      function ja(e, t, i) {
        if (e.line == t)
          return { map: e.measure.map, cache: e.measure.cache };
        if (e.rest) {
          for (var r = 0; r < e.rest.length; r++)
            if (e.rest[r] == t)
              return { map: e.measure.maps[r], cache: e.measure.caches[r] };
          for (var n = 0; n < e.rest.length; n++)
            if (Ye(e.rest[n]) > i)
              return { map: e.measure.maps[n], cache: e.measure.caches[n], before: !0 };
        }
      }
      function Lu(e, t) {
        t = qt(t);
        var i = Ye(t), r = e.display.externalMeasured = new Pa(e.doc, t, i);
        r.lineN = i;
        var n = r.built = Ha(e, r);
        return r.text = n.pre, Ne(e.display.lineMeasure, n.pre), r;
      }
      function Ka(e, t, i, r) {
        return Qt(e, Pr(e, t), i, r);
      }
      function Tn(e, t) {
        if (t >= e.display.viewFrom && t < e.display.viewTo)
          return e.display.view[Er(e, t)];
        var i = e.display.externalMeasured;
        if (i && t >= i.lineN && t < i.lineN + i.size)
          return i;
      }
      function Pr(e, t) {
        var i = Ye(t), r = Tn(e, i);
        r && !r.text ? r = null : r && r.changes && (za(e, r, i, In(e)), e.curOp.forceUpdate = !0), r || (r = Lu(e, t));
        var n = ja(r, t, i);
        return {
          line: t,
          view: r,
          rect: null,
          map: n.map,
          cache: n.cache,
          before: n.before,
          hasHeights: !1
        };
      }
      function Qt(e, t, i, r, n) {
        t.before && (i = -1);
        var a = i + (r || ""), o;
        return t.cache.hasOwnProperty(a) ? o = t.cache[a] : (t.rect || (t.rect = t.view.text.getBoundingClientRect()), t.hasHeights || (Eu(e, t.view, t.rect), t.hasHeights = !0), o = Bu(e, t, i, r), o.bogus || (t.cache[a] = o)), {
          left: o.left,
          right: o.right,
          top: n ? o.rtop : o.top,
          bottom: n ? o.rbottom : o.bottom
        };
      }
      var Xa = { left: 0, right: 0, top: 0, bottom: 0 };
      function Ya(e, t, i) {
        for (var r, n, a, o, u, s, f = 0; f < e.length; f += 3)
          if (u = e[f], s = e[f + 1], t < u ? (n = 0, a = 1, o = "left") : t < s ? (n = t - u, a = n + 1) : (f == e.length - 3 || t == s && e[f + 3] > t) && (a = s - u, n = a - 1, t >= s && (o = "right")), n != null) {
            if (r = e[f + 2], u == s && i == (r.insertLeft ? "left" : "right") && (o = i), i == "left" && n == 0)
              for (; f && e[f - 2] == e[f - 3] && e[f - 1].insertLeft; )
                r = e[(f -= 3) + 2], o = "left";
            if (i == "right" && n == s - u)
              for (; f < e.length - 3 && e[f + 3] == e[f + 4] && !e[f + 5].insertLeft; )
                r = e[(f += 3) + 2], o = "right";
            break;
          }
        return { node: r, start: n, end: a, collapse: o, coverStart: u, coverEnd: s };
      }
      function Tu(e, t) {
        var i = Xa;
        if (t == "left")
          for (var r = 0; r < e.length && (i = e[r]).left == i.right; r++)
            ;
        else
          for (var n = e.length - 1; n >= 0 && (i = e[n]).left == i.right; n--)
            ;
        return i;
      }
      function Bu(e, t, i, r) {
        var n = Ya(t.map, i, r), a = n.node, o = n.start, u = n.end, s = n.collapse, f;
        if (a.nodeType == 3) {
          for (var v = 0; v < 4; v++) {
            for (; o && C(t.line.text.charAt(n.coverStart + o)); )
              --o;
            for (; n.coverStart + u < n.coverEnd && C(t.line.text.charAt(n.coverStart + u)); )
              ++u;
            if (B && z < 9 && o == 0 && u == n.coverEnd - n.coverStart ? f = a.parentNode.getBoundingClientRect() : f = Tu($(a, o, u).getClientRects(), r), f.left || f.right || o == 0)
              break;
            u = o, o = o - 1, s = "right";
          }
          B && z < 11 && (f = Mu(e.display.measure, f));
        } else {
          o > 0 && (s = r = "right");
          var y;
          e.options.lineWrapping && (y = a.getClientRects()).length > 1 ? f = y[r == "right" ? y.length - 1 : 0] : f = a.getBoundingClientRect();
        }
        if (B && z < 9 && !o && (!f || !f.left && !f.right)) {
          var T = a.parentNode.getClientRects()[0];
          T ? f = { left: T.left, right: T.left + Wr(e.display), top: T.top, bottom: T.bottom } : f = Xa;
        }
        for (var A = f.top - t.rect.top, q = f.bottom - t.rect.top, Y = (A + q) / 2, V = t.view.measure.heights, oe = 0; oe < V.length - 1 && !(Y < V[oe]); oe++)
          ;
        var pe = oe ? V[oe - 1] : 0, le = V[oe], ve = {
          left: (s == "right" ? f.right : f.left) - t.rect.left,
          right: (s == "left" ? f.left : f.right) - t.rect.left,
          top: pe,
          bottom: le
        };
        return !f.left && !f.right && (ve.bogus = !0), e.options.singleCursorHeightPerLine || (ve.rtop = A, ve.rbottom = q), ve;
      }
      function Mu(e, t) {
        if (!window.screen || screen.logicalXDPI == null || screen.logicalXDPI == screen.deviceXDPI || !sr(e))
          return t;
        var i = screen.logicalXDPI / screen.deviceXDPI, r = screen.logicalYDPI / screen.deviceYDPI;
        return {
          left: t.left * i,
          right: t.right * i,
          top: t.top * r,
          bottom: t.bottom * r
        };
      }
      function Za(e) {
        if (e.measure && (e.measure.cache = {}, e.measure.heights = null, e.rest))
          for (var t = 0; t < e.rest.length; t++)
            e.measure.caches[t] = {};
      }
      function Qa(e) {
        e.display.externalMeasure = null, Ee(e.display.lineMeasure);
        for (var t = 0; t < e.display.view.length; t++)
          Za(e.display.view[t]);
      }
      function ui(e) {
        Qa(e), e.display.cachedCharWidth = e.display.cachedTextHeight = e.display.cachedPaddingH = null, e.options.lineWrapping || (e.display.maxLineChanged = !0), e.display.lineNumChars = null;
      }
      function $a(e) {
        return K && X ? -(e.body.getBoundingClientRect().left - parseInt(getComputedStyle(e.body).marginLeft)) : e.defaultView.pageXOffset || (e.documentElement || e.body).scrollLeft;
      }
      function Ja(e) {
        return K && X ? -(e.body.getBoundingClientRect().top - parseInt(getComputedStyle(e.body).marginTop)) : e.defaultView.pageYOffset || (e.documentElement || e.body).scrollTop;
      }
      function Bn(e) {
        var t = qt(e), i = t.widgets, r = 0;
        if (i)
          for (var n = 0; n < i.length; ++n)
            i[n].above && (r += li(i[n]));
        return r;
      }
      function qi(e, t, i, r, n) {
        if (!n) {
          var a = Bn(t);
          i.top += a, i.bottom += a;
        }
        if (r == "line")
          return i;
        r || (r = "local");
        var o = tr(t);
        if (r == "local" ? o += _i(e.display) : o -= e.display.viewOffset, r == "page" || r == "window") {
          var u = e.display.lineSpace.getBoundingClientRect();
          o += u.top + (r == "window" ? 0 : Ja(c(e)));
          var s = u.left + (r == "window" ? 0 : $a(c(e)));
          i.left += s, i.right += s;
        }
        return i.top += o, i.bottom += o, i;
      }
      function Va(e, t, i) {
        if (i == "div")
          return t;
        var r = t.left, n = t.top;
        if (i == "page")
          r -= $a(c(e)), n -= Ja(c(e));
        else if (i == "local" || !i) {
          var a = e.display.sizer.getBoundingClientRect();
          r += a.left, n += a.top;
        }
        var o = e.display.lineSpace.getBoundingClientRect();
        return { left: r - o.left, top: n - o.top };
      }
      function Ui(e, t, i, r, n) {
        return r || (r = we(e.doc, t.line)), qi(e, r, Ka(e, r, t.ch, n), i);
      }
      function Ut(e, t, i, r, n, a) {
        r = r || we(e.doc, t.line), n || (n = Pr(e, r));
        function o(q, Y) {
          var V = Qt(e, n, q, Y ? "right" : "left", a);
          return Y ? V.left = V.right : V.right = V.left, qi(e, r, V, i);
        }
        var u = b(r, e.doc.direction), s = t.ch, f = t.sticky;
        if (s >= r.text.length ? (s = r.text.length, f = "before") : s <= 0 && (s = 0, f = "after"), !u)
          return o(f == "before" ? s - 1 : s, f == "before");
        function v(q, Y, V) {
          var oe = u[Y], pe = oe.level == 1;
          return o(V ? q - 1 : q, pe != V);
        }
        var y = k(u, s, f), T = D, A = v(s, y, f == "before");
        return T != null && (A.other = v(s, T, f != "before")), A;
      }
      function eo(e, t) {
        var i = 0;
        t = Oe(e.doc, t), e.options.lineWrapping || (i = Wr(e.display) * t.ch);
        var r = we(e.doc, t.line), n = tr(r) + _i(e.display);
        return { left: i, right: i, top: n, bottom: n + r.height };
      }
      function Mn(e, t, i, r, n) {
        var a = J(e, t, i);
        return a.xRel = n, r && (a.outside = r), a;
      }
      function On(e, t, i) {
        var r = e.doc;
        if (i += e.display.viewOffset, i < 0)
          return Mn(r.first, 0, null, -1, -1);
        var n = kr(r, i), a = r.first + r.size - 1;
        if (n > a)
          return Mn(r.first + r.size - 1, we(r, a).text.length, null, 1, 1);
        t < 0 && (t = 0);
        for (var o = we(r, n); ; ) {
          var u = Ou(e, o, n, t, i), s = lu(o, u.ch + (u.xRel > 0 || u.outside > 0 ? 1 : 0));
          if (!s)
            return u;
          var f = s.find(1);
          if (f.line == n)
            return f;
          o = we(r, n = f.line);
        }
      }
      function to(e, t, i, r) {
        r -= Bn(t);
        var n = t.text.length, a = d(function(o) {
          return Qt(e, i, o - 1).bottom <= r;
        }, n, 0);
        return n = d(function(o) {
          return Qt(e, i, o).top > r;
        }, a, n), { begin: a, end: n };
      }
      function ro(e, t, i, r) {
        i || (i = Pr(e, t));
        var n = qi(e, t, Qt(e, i, r), "line").top;
        return to(e, t, i, n);
      }
      function Nn(e, t, i, r) {
        return e.bottom <= i ? !1 : e.top > i ? !0 : (r ? e.left : e.right) > t;
      }
      function Ou(e, t, i, r, n) {
        n -= tr(t);
        var a = Pr(e, t), o = Bn(t), u = 0, s = t.text.length, f = !0, v = b(t, e.doc.direction);
        if (v) {
          var y = (e.options.lineWrapping ? Iu : Nu)(e, t, i, a, v, r, n);
          f = y.level != 1, u = f ? y.from : y.to - 1, s = f ? y.to : y.from - 1;
        }
        var T = null, A = null, q = d(function(Fe) {
          var ke = Qt(e, a, Fe);
          return ke.top += o, ke.bottom += o, Nn(ke, r, n, !1) ? (ke.top <= n && ke.left <= r && (T = Fe, A = ke), !0) : !1;
        }, u, s), Y, V, oe = !1;
        if (A) {
          var pe = r - A.left < A.right - r, le = pe == f;
          q = T + (le ? 0 : 1), V = le ? "after" : "before", Y = pe ? A.left : A.right;
        } else {
          !f && (q == s || q == u) && q++, V = q == 0 ? "after" : q == t.text.length ? "before" : Qt(e, a, q - (f ? 1 : 0)).bottom + o <= n == f ? "after" : "before";
          var ve = Ut(e, J(i, q, V), "line", t, a);
          Y = ve.left, oe = n < ve.top ? -1 : n >= ve.bottom ? 1 : 0;
        }
        return q = l(t.text, q, 1), Mn(i, q, V, oe, r - Y);
      }
      function Nu(e, t, i, r, n, a, o) {
        var u = d(function(y) {
          var T = n[y], A = T.level != 1;
          return Nn(Ut(
            e,
            J(i, A ? T.to : T.from, A ? "before" : "after"),
            "line",
            t,
            r
          ), a, o, !0);
        }, 0, n.length - 1), s = n[u];
        if (u > 0) {
          var f = s.level != 1, v = Ut(
            e,
            J(i, f ? s.from : s.to, f ? "after" : "before"),
            "line",
            t,
            r
          );
          Nn(v, a, o, !0) && v.top > o && (s = n[u - 1]);
        }
        return s;
      }
      function Iu(e, t, i, r, n, a, o) {
        var u = to(e, t, r, o), s = u.begin, f = u.end;
        /\s/.test(t.text.charAt(f - 1)) && f--;
        for (var v = null, y = null, T = 0; T < n.length; T++) {
          var A = n[T];
          if (!(A.from >= f || A.to <= s)) {
            var q = A.level != 1, Y = Qt(e, r, q ? Math.min(f, A.to) - 1 : Math.max(s, A.from)).right, V = Y < a ? a - Y + 1e9 : Y - a;
            (!v || y > V) && (v = A, y = V);
          }
        }
        return v || (v = n[n.length - 1]), v.from < s && (v = { from: s, to: v.to, level: v.level }), v.to > f && (v = { from: v.from, to: f, level: v.level }), v;
      }
      var Fr;
      function zr(e) {
        if (e.cachedTextHeight != null)
          return e.cachedTextHeight;
        if (Fr == null) {
          Fr = L("pre", null, "CodeMirror-line-like");
          for (var t = 0; t < 49; ++t)
            Fr.appendChild(document.createTextNode("x")), Fr.appendChild(L("br"));
          Fr.appendChild(document.createTextNode("x"));
        }
        Ne(e.measure, Fr);
        var i = Fr.offsetHeight / 50;
        return i > 3 && (e.cachedTextHeight = i), Ee(e.measure), i || 1;
      }
      function Wr(e) {
        if (e.cachedCharWidth != null)
          return e.cachedCharWidth;
        var t = L("span", "xxxxxxxxxx"), i = L("pre", [t], "CodeMirror-line-like");
        Ne(e.measure, i);
        var r = t.getBoundingClientRect(), n = (r.right - r.left) / 10;
        return n > 2 && (e.cachedCharWidth = n), n || 10;
      }
      function In(e) {
        for (var t = e.display, i = {}, r = {}, n = t.gutters.clientLeft, a = t.gutters.firstChild, o = 0; a; a = a.nextSibling, ++o) {
          var u = e.display.gutterSpecs[o].className;
          i[u] = a.offsetLeft + a.clientLeft + n, r[u] = a.clientWidth;
        }
        return {
          fixedPos: Hn(t),
          gutterTotalWidth: t.gutters.offsetWidth,
          gutterLeft: i,
          gutterWidth: r,
          wrapperWidth: t.wrapper.clientWidth
        };
      }
      function Hn(e) {
        return e.scroller.getBoundingClientRect().left - e.sizer.getBoundingClientRect().left;
      }
      function io(e) {
        var t = zr(e.display), i = e.options.lineWrapping, r = i && Math.max(5, e.display.scroller.clientWidth / Wr(e.display) - 3);
        return function(n) {
          if (fr(e.doc, n))
            return 0;
          var a = 0;
          if (n.widgets)
            for (var o = 0; o < n.widgets.length; o++)
              n.widgets[o].height && (a += n.widgets[o].height);
          return i ? a + (Math.ceil(n.text.length / r) || 1) * t : a + t;
        };
      }
      function Rn(e) {
        var t = e.doc, i = io(e);
        t.iter(function(r) {
          var n = i(r);
          n != r.height && Xt(r, n);
        });
      }
      function Ar(e, t, i, r) {
        var n = e.display;
        if (!i && lt(t).getAttribute("cm-not-content") == "true")
          return null;
        var a, o, u = n.lineSpace.getBoundingClientRect();
        try {
          a = t.clientX - u.left, o = t.clientY - u.top;
        } catch {
          return null;
        }
        var s = On(e, a, o), f;
        if (r && s.xRel > 0 && (f = we(e.doc, s.line).text).length == s.ch) {
          var v = Ke(f, f.length, e.options.tabSize) - f.length;
          s = J(s.line, Math.max(0, Math.round((a - Ga(e.display).left) / Wr(e.display)) - v));
        }
        return s;
      }
      function Er(e, t) {
        if (t >= e.display.viewTo || (t -= e.display.viewFrom, t < 0))
          return null;
        for (var i = e.display.view, r = 0; r < i.length; r++)
          if (t -= i[r].size, t < 0)
            return r;
      }
      function Tt(e, t, i, r) {
        t == null && (t = e.doc.first), i == null && (i = e.doc.first + e.doc.size), r || (r = 0);
        var n = e.display;
        if (r && i < n.viewTo && (n.updateLineNumbers == null || n.updateLineNumbers > t) && (n.updateLineNumbers = t), e.curOp.viewChanged = !0, t >= n.viewTo)
          er && kn(e.doc, t) < n.viewTo && hr(e);
        else if (i <= n.viewFrom)
          er && Na(e.doc, i + r) > n.viewFrom ? hr(e) : (n.viewFrom += r, n.viewTo += r);
        else if (t <= n.viewFrom && i >= n.viewTo)
          hr(e);
        else if (t <= n.viewFrom) {
          var a = Gi(e, i, i + r, 1);
          a ? (n.view = n.view.slice(a.index), n.viewFrom = a.lineN, n.viewTo += r) : hr(e);
        } else if (i >= n.viewTo) {
          var o = Gi(e, t, t, -1);
          o ? (n.view = n.view.slice(0, o.index), n.viewTo = o.lineN) : hr(e);
        } else {
          var u = Gi(e, t, t, -1), s = Gi(e, i, i + r, 1);
          u && s ? (n.view = n.view.slice(0, u.index).concat(Wi(e, u.lineN, s.lineN)).concat(n.view.slice(s.index)), n.viewTo += r) : hr(e);
        }
        var f = n.externalMeasured;
        f && (i < f.lineN ? f.lineN += r : t < f.lineN + f.size && (n.externalMeasured = null));
      }
      function cr(e, t, i) {
        e.curOp.viewChanged = !0;
        var r = e.display, n = e.display.externalMeasured;
        if (n && t >= n.lineN && t < n.lineN + n.size && (r.externalMeasured = null), !(t < r.viewFrom || t >= r.viewTo)) {
          var a = r.view[Er(e, t)];
          if (a.node != null) {
            var o = a.changes || (a.changes = []);
            We(o, i) == -1 && o.push(i);
          }
        }
      }
      function hr(e) {
        e.display.viewFrom = e.display.viewTo = e.doc.first, e.display.view = [], e.display.viewOffset = 0;
      }
      function Gi(e, t, i, r) {
        var n = Er(e, t), a, o = e.display.view;
        if (!er || i == e.doc.first + e.doc.size)
          return { index: n, lineN: i };
        for (var u = e.display.viewFrom, s = 0; s < n; s++)
          u += o[s].size;
        if (u != t) {
          if (r > 0) {
            if (n == o.length - 1)
              return null;
            a = u + o[n].size - t, n++;
          } else
            a = u - t;
          t += a, i += a;
        }
        for (; kn(e.doc, i) != i; ) {
          if (n == (r < 0 ? 0 : o.length - 1))
            return null;
          i += r * o[n - (r < 0 ? 1 : 0)].size, n += r;
        }
        return { index: n, lineN: i };
      }
      function Hu(e, t, i) {
        var r = e.display, n = r.view;
        n.length == 0 || t >= r.viewTo || i <= r.viewFrom ? (r.view = Wi(e, t, i), r.viewFrom = t) : (r.viewFrom > t ? r.view = Wi(e, t, r.viewFrom).concat(r.view) : r.viewFrom < t && (r.view = r.view.slice(Er(e, t))), r.viewFrom = t, r.viewTo < i ? r.view = r.view.concat(Wi(e, r.viewTo, i)) : r.viewTo > i && (r.view = r.view.slice(0, Er(e, i)))), r.viewTo = i;
      }
      function no(e) {
        for (var t = e.display.view, i = 0, r = 0; r < t.length; r++) {
          var n = t[r];
          !n.hidden && (!n.node || n.changes) && ++i;
        }
        return i;
      }
      function si(e) {
        e.display.input.showSelection(e.display.input.prepareSelection());
      }
      function ao(e, t) {
        t === void 0 && (t = !0);
        var i = e.doc, r = {}, n = r.cursors = document.createDocumentFragment(), a = r.selection = document.createDocumentFragment(), o = e.options.$customCursor;
        o && (t = !0);
        for (var u = 0; u < i.sel.ranges.length; u++)
          if (!(!t && u == i.sel.primIndex)) {
            var s = i.sel.ranges[u];
            if (!(s.from().line >= e.display.viewTo || s.to().line < e.display.viewFrom)) {
              var f = s.empty();
              if (o) {
                var v = o(e, s);
                v && Pn(e, v, n);
              } else (f || e.options.showCursorWhenSelecting) && Pn(e, s.head, n);
              f || Ru(e, s, a);
            }
          }
        return r;
      }
      function Pn(e, t, i) {
        var r = Ut(e, t, "div", null, null, !e.options.singleCursorHeightPerLine), n = i.appendChild(L("div", " ", "CodeMirror-cursor"));
        if (n.style.left = r.left + "px", n.style.top = r.top + "px", n.style.height = Math.max(0, r.bottom - r.top) * e.options.cursorHeight + "px", /\bcm-fat-cursor\b/.test(e.getWrapperElement().className)) {
          var a = Ui(e, t, "div", null, null), o = a.right - a.left;
          n.style.width = (o > 0 ? o : e.defaultCharWidth()) + "px";
        }
        if (r.other) {
          var u = i.appendChild(L("div", " ", "CodeMirror-cursor CodeMirror-secondarycursor"));
          u.style.display = "", u.style.left = r.other.left + "px", u.style.top = r.other.top + "px", u.style.height = (r.other.bottom - r.other.top) * 0.85 + "px";
        }
      }
      function ji(e, t) {
        return e.top - t.top || e.left - t.left;
      }
      function Ru(e, t, i) {
        var r = e.display, n = e.doc, a = document.createDocumentFragment(), o = Ga(e.display), u = o.left, s = Math.max(r.sizerWidth, Sr(e) - r.sizer.offsetLeft) - o.right, f = n.direction == "ltr";
        function v(le, ve, Fe, ke) {
          ve < 0 && (ve = 0), ve = Math.round(ve), ke = Math.round(ke), a.appendChild(L("div", null, "CodeMirror-selected", "position: absolute; left: " + le + `px;
                             top: ` + ve + "px; width: " + (Fe ?? s - le) + `px;
                             height: ` + (ke - ve) + "px"));
        }
        function y(le, ve, Fe) {
          var ke = we(n, le), Re = ke.text.length, Qe, yt;
          function rt(ct, Ot) {
            return Ui(e, J(le, ct), "div", ke, Ot);
          }
          function Rt(ct, Ot, Ct) {
            var gt = ro(e, ke, null, ct), ht = Ot == "ltr" == (Ct == "after") ? "left" : "right", ot = Ct == "after" ? gt.begin : gt.end - (/\s/.test(ke.text.charAt(gt.end - 1)) ? 2 : 1);
            return rt(ot, ht)[ht];
          }
          var Mt = b(ke, n.direction);
          return m(Mt, ve || 0, Fe ?? Re, function(ct, Ot, Ct, gt) {
            var ht = Ct == "ltr", ot = rt(ct, ht ? "left" : "right"), Nt = rt(Ot - 1, ht ? "right" : "left"), Vr = ve == null && ct == 0, xr = Fe == null && Ot == Re, St = gt == 0, $t = !Mt || gt == Mt.length - 1;
            if (Nt.top - ot.top <= 3) {
              var Dt = (f ? Vr : xr) && St, ca = (f ? xr : Vr) && $t, ar = Dt ? u : (ht ? ot : Nt).left, Or = ca ? s : (ht ? Nt : ot).right;
              v(ar, ot.top, Or - ar, ot.bottom);
            } else {
              var Nr, Lt, ei, ha;
              ht ? (Nr = f && Vr && St ? u : ot.left, Lt = f ? s : Rt(ct, Ct, "before"), ei = f ? u : Rt(Ot, Ct, "after"), ha = f && xr && $t ? s : Nt.right) : (Nr = f ? Rt(ct, Ct, "before") : u, Lt = !f && Vr && St ? s : ot.right, ei = !f && xr && $t ? u : Nt.left, ha = f ? Rt(Ot, Ct, "after") : s), v(Nr, ot.top, Lt - Nr, ot.bottom), ot.bottom < Nt.top && v(u, ot.bottom, null, Nt.top), v(ei, Nt.top, ha - ei, Nt.bottom);
            }
            (!Qe || ji(ot, Qe) < 0) && (Qe = ot), ji(Nt, Qe) < 0 && (Qe = Nt), (!yt || ji(ot, yt) < 0) && (yt = ot), ji(Nt, yt) < 0 && (yt = Nt);
          }), { start: Qe, end: yt };
        }
        var T = t.from(), A = t.to();
        if (T.line == A.line)
          y(T.line, T.ch, A.ch);
        else {
          var q = we(n, T.line), Y = we(n, A.line), V = qt(q) == qt(Y), oe = y(T.line, T.ch, V ? q.text.length + 1 : null).end, pe = y(A.line, V ? 0 : null, A.ch).start;
          V && (oe.top < pe.top - 2 ? (v(oe.right, oe.top, null, oe.bottom), v(u, pe.top, pe.left, pe.bottom)) : v(oe.right, oe.top, pe.left - oe.right, oe.bottom)), oe.bottom < pe.top && v(u, oe.bottom, null, pe.top);
        }
        i.appendChild(a);
      }
      function zn(e) {
        if (e.state.focused) {
          var t = e.display;
          clearInterval(t.blinker);
          var i = !0;
          t.cursorDiv.style.visibility = "", e.options.cursorBlinkRate > 0 ? t.blinker = setInterval(function() {
            e.hasFocus() || _r(e), t.cursorDiv.style.visibility = (i = !i) ? "" : "hidden";
          }, e.options.cursorBlinkRate) : e.options.cursorBlinkRate < 0 && (t.cursorDiv.style.visibility = "hidden");
        }
      }
      function oo(e) {
        e.hasFocus() || (e.display.input.focus(), e.state.focused || _n(e));
      }
      function Wn(e) {
        e.state.delayingBlurEvent = !0, setTimeout(function() {
          e.state.delayingBlurEvent && (e.state.delayingBlurEvent = !1, e.state.focused && _r(e));
        }, 100);
      }
      function _n(e, t) {
        e.state.delayingBlurEvent && !e.state.draggingText && (e.state.delayingBlurEvent = !1), e.options.readOnly != "nocursor" && (e.state.focused || (me(e, "focus", e, t), e.state.focused = !0, it(e.display.wrapper, "CodeMirror-focused"), !e.curOp && e.display.selForContextMenu != e.doc.sel && (e.display.input.reset(), te && setTimeout(function() {
          return e.display.input.reset(!0);
        }, 20)), e.display.input.receivedFocus()), zn(e));
      }
      function _r(e, t) {
        e.state.delayingBlurEvent || (e.state.focused && (me(e, "blur", e, t), e.state.focused = !1, Le(e.display.wrapper, "CodeMirror-focused")), clearInterval(e.display.blinker), setTimeout(function() {
          e.state.focused || (e.display.shift = !1);
        }, 150));
      }
      function Ki(e) {
        for (var t = e.display, i = t.lineDiv.offsetTop, r = Math.max(0, t.scroller.getBoundingClientRect().top), n = t.lineDiv.getBoundingClientRect().top, a = 0, o = 0; o < t.view.length; o++) {
          var u = t.view[o], s = e.options.lineWrapping, f = void 0, v = 0;
          if (!u.hidden) {
            if (n += u.line.height, B && z < 8) {
              var y = u.node.offsetTop + u.node.offsetHeight;
              f = y - i, i = y;
            } else {
              var T = u.node.getBoundingClientRect();
              f = T.bottom - T.top, !s && u.text.firstChild && (v = u.text.firstChild.getBoundingClientRect().right - T.left - 1);
            }
            var A = u.line.height - f;
            if ((A > 5e-3 || A < -5e-3) && (n < r && (a -= A), Xt(u.line, f), lo(u.line), u.rest))
              for (var q = 0; q < u.rest.length; q++)
                lo(u.rest[q]);
            if (v > e.display.sizerWidth) {
              var Y = Math.ceil(v / Wr(e.display));
              Y > e.display.maxLineLength && (e.display.maxLineLength = Y, e.display.maxLine = u.line, e.display.maxLineChanged = !0);
            }
          }
        }
        Math.abs(a) > 2 && (t.scroller.scrollTop += a);
      }
      function lo(e) {
        if (e.widgets)
          for (var t = 0; t < e.widgets.length; ++t) {
            var i = e.widgets[t], r = i.node.parentNode;
            r && (i.height = r.offsetHeight);
          }
      }
      function Xi(e, t, i) {
        var r = i && i.top != null ? Math.max(0, i.top) : e.scroller.scrollTop;
        r = Math.floor(r - _i(e));
        var n = i && i.bottom != null ? i.bottom : r + e.wrapper.clientHeight, a = kr(t, r), o = kr(t, n);
        if (i && i.ensure) {
          var u = i.ensure.from.line, s = i.ensure.to.line;
          u < a ? (a = u, o = kr(t, tr(we(t, u)) + e.wrapper.clientHeight)) : Math.min(s, t.lastLine()) >= o && (a = kr(t, tr(we(t, s)) - e.wrapper.clientHeight), o = s);
        }
        return { from: a, to: Math.max(o, a + 1) };
      }
      function Pu(e, t) {
        if (!ce(e, "scrollCursorIntoView")) {
          var i = e.display, r = i.sizer.getBoundingClientRect(), n = null, a = i.wrapper.ownerDocument;
          if (t.top + r.top < 0 ? n = !0 : t.bottom + r.top > (a.defaultView.innerHeight || a.documentElement.clientHeight) && (n = !1), n != null && !ge) {
            var o = L("div", "​", null, `position: absolute;
                         top: ` + (t.top - i.viewOffset - _i(e.display)) + `px;
                         height: ` + (t.bottom - t.top + Zt(e) + i.barHeight) + `px;
                         left: ` + t.left + "px; width: " + Math.max(2, t.right - t.left) + "px;");
            e.display.lineSpace.appendChild(o), o.scrollIntoView(n), e.display.lineSpace.removeChild(o);
          }
        }
      }
      function zu(e, t, i, r) {
        r == null && (r = 0);
        var n;
        !e.options.lineWrapping && t == i && (i = t.sticky == "before" ? J(t.line, t.ch + 1, "before") : t, t = t.ch ? J(t.line, t.sticky == "before" ? t.ch - 1 : t.ch, "after") : t);
        for (var a = 0; a < 5; a++) {
          var o = !1, u = Ut(e, t), s = !i || i == t ? u : Ut(e, i);
          n = {
            left: Math.min(u.left, s.left),
            top: Math.min(u.top, s.top) - r,
            right: Math.max(u.left, s.left),
            bottom: Math.max(u.bottom, s.bottom) + r
          };
          var f = qn(e, n), v = e.doc.scrollTop, y = e.doc.scrollLeft;
          if (f.scrollTop != null && (ci(e, f.scrollTop), Math.abs(e.doc.scrollTop - v) > 1 && (o = !0)), f.scrollLeft != null && (Lr(e, f.scrollLeft), Math.abs(e.doc.scrollLeft - y) > 1 && (o = !0)), !o)
            break;
        }
        return n;
      }
      function Wu(e, t) {
        var i = qn(e, t);
        i.scrollTop != null && ci(e, i.scrollTop), i.scrollLeft != null && Lr(e, i.scrollLeft);
      }
      function qn(e, t) {
        var i = e.display, r = zr(e.display);
        t.top < 0 && (t.top = 0);
        var n = e.curOp && e.curOp.scrollTop != null ? e.curOp.scrollTop : i.scroller.scrollTop, a = Ln(e), o = {};
        t.bottom - t.top > a && (t.bottom = t.top + a);
        var u = e.doc.height + En(i), s = t.top < r, f = t.bottom > u - r;
        if (t.top < n)
          o.scrollTop = s ? 0 : t.top;
        else if (t.bottom > n + a) {
          var v = Math.min(t.top, (f ? u : t.bottom) - a);
          v != n && (o.scrollTop = v);
        }
        var y = e.options.fixedGutter ? 0 : i.gutters.offsetWidth, T = e.curOp && e.curOp.scrollLeft != null ? e.curOp.scrollLeft : i.scroller.scrollLeft - y, A = Sr(e) - i.gutters.offsetWidth, q = t.right - t.left > A;
        return q && (t.right = t.left + A), t.left < 10 ? o.scrollLeft = 0 : t.left < T ? o.scrollLeft = Math.max(0, t.left + y - (q ? 0 : 10)) : t.right > A + T - 3 && (o.scrollLeft = t.right + (q ? 0 : 10) - A), o;
      }
      function Un(e, t) {
        t != null && (Yi(e), e.curOp.scrollTop = (e.curOp.scrollTop == null ? e.doc.scrollTop : e.curOp.scrollTop) + t);
      }
      function qr(e) {
        Yi(e);
        var t = e.getCursor();
        e.curOp.scrollToPos = { from: t, to: t, margin: e.options.cursorScrollMargin };
      }
      function fi(e, t, i) {
        (t != null || i != null) && Yi(e), t != null && (e.curOp.scrollLeft = t), i != null && (e.curOp.scrollTop = i);
      }
      function _u(e, t) {
        Yi(e), e.curOp.scrollToPos = t;
      }
      function Yi(e) {
        var t = e.curOp.scrollToPos;
        if (t) {
          e.curOp.scrollToPos = null;
          var i = eo(e, t.from), r = eo(e, t.to);
          uo(e, i, r, t.margin);
        }
      }
      function uo(e, t, i, r) {
        var n = qn(e, {
          left: Math.min(t.left, i.left),
          top: Math.min(t.top, i.top) - r,
          right: Math.max(t.right, i.right),
          bottom: Math.max(t.bottom, i.bottom) + r
        });
        fi(e, n.scrollLeft, n.scrollTop);
      }
      function ci(e, t) {
        Math.abs(e.doc.scrollTop - t) < 2 || (M || jn(e, { top: t }), so(e, t, !0), M && jn(e), pi(e, 100));
      }
      function so(e, t, i) {
        t = Math.max(0, Math.min(e.display.scroller.scrollHeight - e.display.scroller.clientHeight, t)), !(e.display.scroller.scrollTop == t && !i) && (e.doc.scrollTop = t, e.display.scrollbars.setScrollTop(t), e.display.scroller.scrollTop != t && (e.display.scroller.scrollTop = t));
      }
      function Lr(e, t, i, r) {
        t = Math.max(0, Math.min(t, e.display.scroller.scrollWidth - e.display.scroller.clientWidth)), !((i ? t == e.doc.scrollLeft : Math.abs(e.doc.scrollLeft - t) < 2) && !r) && (e.doc.scrollLeft = t, go(e), e.display.scroller.scrollLeft != t && (e.display.scroller.scrollLeft = t), e.display.scrollbars.setScrollLeft(t));
      }
      function hi(e) {
        var t = e.display, i = t.gutters.offsetWidth, r = Math.round(e.doc.height + En(e.display));
        return {
          clientHeight: t.scroller.clientHeight,
          viewHeight: t.wrapper.clientHeight,
          scrollWidth: t.scroller.scrollWidth,
          clientWidth: t.scroller.clientWidth,
          viewWidth: t.wrapper.clientWidth,
          barLeft: e.options.fixedGutter ? i : 0,
          docHeight: r,
          scrollHeight: r + Zt(e) + t.barHeight,
          nativeBarWidth: t.nativeBarWidth,
          gutterWidth: i
        };
      }
      var Tr = function(e, t, i) {
        this.cm = i;
        var r = this.vert = L("div", [L("div", null, null, "min-width: 1px")], "CodeMirror-vscrollbar"), n = this.horiz = L("div", [L("div", null, null, "height: 100%; min-height: 1px")], "CodeMirror-hscrollbar");
        r.tabIndex = n.tabIndex = -1, e(r), e(n), x(r, "scroll", function() {
          r.clientHeight && t(r.scrollTop, "vertical");
        }), x(n, "scroll", function() {
          n.clientWidth && t(n.scrollLeft, "horizontal");
        }), this.checkedZeroWidth = !1, B && z < 8 && (this.horiz.style.minHeight = this.vert.style.minWidth = "18px");
      };
      Tr.prototype.update = function(e) {
        var t = e.scrollWidth > e.clientWidth + 1, i = e.scrollHeight > e.clientHeight + 1, r = e.nativeBarWidth;
        if (i) {
          this.vert.style.display = "block", this.vert.style.bottom = t ? r + "px" : "0";
          var n = e.viewHeight - (t ? r : 0);
          this.vert.firstChild.style.height = Math.max(0, e.scrollHeight - e.clientHeight + n) + "px";
        } else
          this.vert.scrollTop = 0, this.vert.style.display = "", this.vert.firstChild.style.height = "0";
        if (t) {
          this.horiz.style.display = "block", this.horiz.style.right = i ? r + "px" : "0", this.horiz.style.left = e.barLeft + "px";
          var a = e.viewWidth - e.barLeft - (i ? r : 0);
          this.horiz.firstChild.style.width = Math.max(0, e.scrollWidth - e.clientWidth + a) + "px";
        } else
          this.horiz.style.display = "", this.horiz.firstChild.style.width = "0";
        return !this.checkedZeroWidth && e.clientHeight > 0 && (r == 0 && this.zeroWidthHack(), this.checkedZeroWidth = !0), { right: i ? r : 0, bottom: t ? r : 0 };
      }, Tr.prototype.setScrollLeft = function(e) {
        this.horiz.scrollLeft != e && (this.horiz.scrollLeft = e), this.disableHoriz && this.enableZeroWidthBar(this.horiz, this.disableHoriz, "horiz");
      }, Tr.prototype.setScrollTop = function(e) {
        this.vert.scrollTop != e && (this.vert.scrollTop = e), this.disableVert && this.enableZeroWidthBar(this.vert, this.disableVert, "vert");
      }, Tr.prototype.zeroWidthHack = function() {
        var e = G && !de ? "12px" : "18px";
        this.horiz.style.height = this.vert.style.width = e, this.horiz.style.visibility = this.vert.style.visibility = "hidden", this.disableHoriz = new Ve(), this.disableVert = new Ve();
      }, Tr.prototype.enableZeroWidthBar = function(e, t, i) {
        e.style.visibility = "";
        function r() {
          var n = e.getBoundingClientRect(), a = i == "vert" ? document.elementFromPoint(n.right - 1, (n.top + n.bottom) / 2) : document.elementFromPoint((n.right + n.left) / 2, n.bottom - 1);
          a != e ? e.style.visibility = "hidden" : t.set(1e3, r);
        }
        t.set(1e3, r);
      }, Tr.prototype.clear = function() {
        var e = this.horiz.parentNode;
        e.removeChild(this.horiz), e.removeChild(this.vert);
      };
      var di = function() {
      };
      di.prototype.update = function() {
        return { bottom: 0, right: 0 };
      }, di.prototype.setScrollLeft = function() {
      }, di.prototype.setScrollTop = function() {
      }, di.prototype.clear = function() {
      };
      function Ur(e, t) {
        t || (t = hi(e));
        var i = e.display.barWidth, r = e.display.barHeight;
        fo(e, t);
        for (var n = 0; n < 4 && i != e.display.barWidth || r != e.display.barHeight; n++)
          i != e.display.barWidth && e.options.lineWrapping && Ki(e), fo(e, hi(e)), i = e.display.barWidth, r = e.display.barHeight;
      }
      function fo(e, t) {
        var i = e.display, r = i.scrollbars.update(t);
        i.sizer.style.paddingRight = (i.barWidth = r.right) + "px", i.sizer.style.paddingBottom = (i.barHeight = r.bottom) + "px", i.heightForcer.style.borderBottom = r.bottom + "px solid transparent", r.right && r.bottom ? (i.scrollbarFiller.style.display = "block", i.scrollbarFiller.style.height = r.bottom + "px", i.scrollbarFiller.style.width = r.right + "px") : i.scrollbarFiller.style.display = "", r.bottom && e.options.coverGutterNextToScrollbar && e.options.fixedGutter ? (i.gutterFiller.style.display = "block", i.gutterFiller.style.height = r.bottom + "px", i.gutterFiller.style.width = t.gutterWidth + "px") : i.gutterFiller.style.display = "";
      }
      var co = { native: Tr, null: di };
      function ho(e) {
        e.display.scrollbars && (e.display.scrollbars.clear(), e.display.scrollbars.addClass && Le(e.display.wrapper, e.display.scrollbars.addClass)), e.display.scrollbars = new co[e.options.scrollbarStyle](function(t) {
          e.display.wrapper.insertBefore(t, e.display.scrollbarFiller), x(t, "mousedown", function() {
            e.state.focused && setTimeout(function() {
              return e.display.input.focus();
            }, 0);
          }), t.setAttribute("cm-not-content", "true");
        }, function(t, i) {
          i == "horizontal" ? Lr(e, t) : ci(e, t);
        }, e), e.display.scrollbars.addClass && it(e.display.wrapper, e.display.scrollbars.addClass);
      }
      var qu = 0;
      function Br(e) {
        e.curOp = {
          cm: e,
          viewChanged: !1,
          // Flag that indicates that lines might need to be redrawn
          startHeight: e.doc.height,
          // Used to detect need to update scrollbar
          forceUpdate: !1,
          // Used to force a redraw
          updateInput: 0,
          // Whether to reset the input textarea
          typing: !1,
          // Whether this reset should be careful to leave existing text (for compositing)
          changeObjs: null,
          // Accumulated changes, for firing change events
          cursorActivityHandlers: null,
          // Set of handlers to fire cursorActivity on
          cursorActivityCalled: 0,
          // Tracks which cursorActivity handlers have been called already
          selectionChanged: !1,
          // Whether the selection needs to be redrawn
          updateMaxLine: !1,
          // Set when the widest line needs to be determined anew
          scrollLeft: null,
          scrollTop: null,
          // Intermediate scroll position, not pushed to DOM yet
          scrollToPos: null,
          // Used to scroll to a specific position
          focus: !1,
          id: ++qu,
          // Unique ID
          markArrays: null
          // Used by addMarkedSpan
        }, yu(e.curOp);
      }
      function Mr(e) {
        var t = e.curOp;
        t && bu(t, function(i) {
          for (var r = 0; r < i.ops.length; r++)
            i.ops[r].cm.curOp = null;
          Uu(i);
        });
      }
      function Uu(e) {
        for (var t = e.ops, i = 0; i < t.length; i++)
          Gu(t[i]);
        for (var r = 0; r < t.length; r++)
          ju(t[r]);
        for (var n = 0; n < t.length; n++)
          Ku(t[n]);
        for (var a = 0; a < t.length; a++)
          Xu(t[a]);
        for (var o = 0; o < t.length; o++)
          Yu(t[o]);
      }
      function Gu(e) {
        var t = e.cm, i = t.display;
        Qu(t), e.updateMaxLine && Fn(t), e.mustUpdate = e.viewChanged || e.forceUpdate || e.scrollTop != null || e.scrollToPos && (e.scrollToPos.from.line < i.viewFrom || e.scrollToPos.to.line >= i.viewTo) || i.maxLineChanged && t.options.lineWrapping, e.update = e.mustUpdate && new Zi(t, e.mustUpdate && { top: e.scrollTop, ensure: e.scrollToPos }, e.forceUpdate);
      }
      function ju(e) {
        e.updatedDisplay = e.mustUpdate && Gn(e.cm, e.update);
      }
      function Ku(e) {
        var t = e.cm, i = t.display;
        e.updatedDisplay && Ki(t), e.barMeasure = hi(t), i.maxLineChanged && !t.options.lineWrapping && (e.adjustWidthTo = Ka(t, i.maxLine, i.maxLine.text.length).left + 3, t.display.sizerWidth = e.adjustWidthTo, e.barMeasure.scrollWidth = Math.max(i.scroller.clientWidth, i.sizer.offsetLeft + e.adjustWidthTo + Zt(t) + t.display.barWidth), e.maxScrollLeft = Math.max(0, i.sizer.offsetLeft + e.adjustWidthTo - Sr(t))), (e.updatedDisplay || e.selectionChanged) && (e.preparedSelection = i.input.prepareSelection());
      }
      function Xu(e) {
        var t = e.cm;
        e.adjustWidthTo != null && (t.display.sizer.style.minWidth = e.adjustWidthTo + "px", e.maxScrollLeft < t.doc.scrollLeft && Lr(t, Math.min(t.display.scroller.scrollLeft, e.maxScrollLeft), !0), t.display.maxLineChanged = !1);
        var i = e.focus && e.focus == Ue(j(t));
        e.preparedSelection && t.display.input.showSelection(e.preparedSelection, i), (e.updatedDisplay || e.startHeight != t.doc.height) && Ur(t, e.barMeasure), e.updatedDisplay && Xn(t, e.barMeasure), e.selectionChanged && zn(t), t.state.focused && e.updateInput && t.display.input.reset(e.typing), i && oo(e.cm);
      }
      function Yu(e) {
        var t = e.cm, i = t.display, r = t.doc;
        if (e.updatedDisplay && po(t, e.update), i.wheelStartX != null && (e.scrollTop != null || e.scrollLeft != null || e.scrollToPos) && (i.wheelStartX = i.wheelStartY = null), e.scrollTop != null && so(t, e.scrollTop, e.forceScroll), e.scrollLeft != null && Lr(t, e.scrollLeft, !0, !0), e.scrollToPos) {
          var n = zu(
            t,
            Oe(r, e.scrollToPos.from),
            Oe(r, e.scrollToPos.to),
            e.scrollToPos.margin
          );
          Pu(t, n);
        }
        var a = e.maybeHiddenMarkers, o = e.maybeUnhiddenMarkers;
        if (a)
          for (var u = 0; u < a.length; ++u)
            a[u].lines.length || me(a[u], "hide");
        if (o)
          for (var s = 0; s < o.length; ++s)
            o[s].lines.length && me(o[s], "unhide");
        i.wrapper.offsetHeight && (r.scrollTop = t.display.scroller.scrollTop), e.changeObjs && me(t, "changes", t, e.changeObjs), e.update && e.update.finish();
      }
      function Ht(e, t) {
        if (e.curOp)
          return t();
        Br(e);
        try {
          return t();
        } finally {
          Mr(e);
        }
      }
      function mt(e, t) {
        return function() {
          if (e.curOp)
            return t.apply(e, arguments);
          Br(e);
          try {
            return t.apply(e, arguments);
          } finally {
            Mr(e);
          }
        };
      }
      function Et(e) {
        return function() {
          if (this.curOp)
            return e.apply(this, arguments);
          Br(this);
          try {
            return e.apply(this, arguments);
          } finally {
            Mr(this);
          }
        };
      }
      function xt(e) {
        return function() {
          var t = this.cm;
          if (!t || t.curOp)
            return e.apply(this, arguments);
          Br(t);
          try {
            return e.apply(this, arguments);
          } finally {
            Mr(t);
          }
        };
      }
      function pi(e, t) {
        e.doc.highlightFrontier < e.display.viewTo && e.state.highlight.set(t, $e(Zu, e));
      }
      function Zu(e) {
        var t = e.doc;
        if (!(t.highlightFrontier >= e.display.viewTo)) {
          var i = +/* @__PURE__ */ new Date() + e.options.workTime, r = ii(e, t.highlightFrontier), n = [];
          t.iter(r.line, Math.min(t.first + t.size, e.display.viewTo + 500), function(a) {
            if (r.line >= e.display.viewFrom) {
              var o = a.styles, u = a.text.length > e.options.maxHighlightLength ? Cr(t.mode, r.state) : null, s = Da(e, a, r, !0);
              u && (r.state = u), a.styles = s.styles;
              var f = a.styleClasses, v = s.classes;
              v ? a.styleClasses = v : f && (a.styleClasses = null);
              for (var y = !o || o.length != a.styles.length || f != v && (!f || !v || f.bgClass != v.bgClass || f.textClass != v.textClass), T = 0; !y && T < o.length; ++T)
                y = o[T] != a.styles[T];
              y && n.push(r.line), a.stateAfter = r.save(), r.nextLine();
            } else
              a.text.length <= e.options.maxHighlightLength && Dn(e, a.text, r), a.stateAfter = r.line % 5 == 0 ? r.save() : null, r.nextLine();
            if (+/* @__PURE__ */ new Date() > i)
              return pi(e, e.options.workDelay), !0;
          }), t.highlightFrontier = r.line, t.modeFrontier = Math.max(t.modeFrontier, r.line), n.length && Ht(e, function() {
            for (var a = 0; a < n.length; a++)
              cr(e, n[a], "text");
          });
        }
      }
      var Zi = function(e, t, i) {
        var r = e.display;
        this.viewport = t, this.visible = Xi(r, e.doc, t), this.editorIsHidden = !r.wrapper.offsetWidth, this.wrapperHeight = r.wrapper.clientHeight, this.wrapperWidth = r.wrapper.clientWidth, this.oldDisplayWidth = Sr(e), this.force = i, this.dims = In(e), this.events = [];
      };
      Zi.prototype.signal = function(e, t) {
        Ie(e, t) && this.events.push(arguments);
      }, Zi.prototype.finish = function() {
        for (var e = 0; e < this.events.length; e++)
          me.apply(null, this.events[e]);
      };
      function Qu(e) {
        var t = e.display;
        !t.scrollbarsClipped && t.scroller.offsetWidth && (t.nativeBarWidth = t.scroller.offsetWidth - t.scroller.clientWidth, t.heightForcer.style.height = Zt(e) + "px", t.sizer.style.marginBottom = -t.nativeBarWidth + "px", t.sizer.style.borderRightWidth = Zt(e) + "px", t.scrollbarsClipped = !0);
      }
      function $u(e) {
        if (e.hasFocus())
          return null;
        var t = Ue(j(e));
        if (!t || !be(e.display.lineDiv, t))
          return null;
        var i = { activeElt: t };
        if (window.getSelection) {
          var r = Te(e).getSelection();
          r.anchorNode && r.extend && be(e.display.lineDiv, r.anchorNode) && (i.anchorNode = r.anchorNode, i.anchorOffset = r.anchorOffset, i.focusNode = r.focusNode, i.focusOffset = r.focusOffset);
        }
        return i;
      }
      function Ju(e) {
        if (!(!e || !e.activeElt || e.activeElt == Ue(_e(e.activeElt))) && (e.activeElt.focus(), !/^(INPUT|TEXTAREA)$/.test(e.activeElt.nodeName) && e.anchorNode && be(document.body, e.anchorNode) && be(document.body, e.focusNode))) {
          var t = e.activeElt.ownerDocument, i = t.defaultView.getSelection(), r = t.createRange();
          r.setEnd(e.anchorNode, e.anchorOffset), r.collapse(!1), i.removeAllRanges(), i.addRange(r), i.extend(e.focusNode, e.focusOffset);
        }
      }
      function Gn(e, t) {
        var i = e.display, r = e.doc;
        if (t.editorIsHidden)
          return hr(e), !1;
        if (!t.force && t.visible.from >= i.viewFrom && t.visible.to <= i.viewTo && (i.updateLineNumbers == null || i.updateLineNumbers >= i.viewTo) && i.renderedView == i.view && no(e) == 0)
          return !1;
        vo(e) && (hr(e), t.dims = In(e));
        var n = r.first + r.size, a = Math.max(t.visible.from - e.options.viewportMargin, r.first), o = Math.min(n, t.visible.to + e.options.viewportMargin);
        i.viewFrom < a && a - i.viewFrom < 20 && (a = Math.max(r.first, i.viewFrom)), i.viewTo > o && i.viewTo - o < 20 && (o = Math.min(n, i.viewTo)), er && (a = kn(e.doc, a), o = Na(e.doc, o));
        var u = a != i.viewFrom || o != i.viewTo || i.lastWrapHeight != t.wrapperHeight || i.lastWrapWidth != t.wrapperWidth;
        Hu(e, a, o), i.viewOffset = tr(we(e.doc, i.viewFrom)), e.display.mover.style.top = i.viewOffset + "px";
        var s = no(e);
        if (!u && s == 0 && !t.force && i.renderedView == i.view && (i.updateLineNumbers == null || i.updateLineNumbers >= i.viewTo))
          return !1;
        var f = $u(e);
        return s > 4 && (i.lineDiv.style.display = "none"), Vu(e, i.updateLineNumbers, t.dims), s > 4 && (i.lineDiv.style.display = ""), i.renderedView = i.view, Ju(f), Ee(i.cursorDiv), Ee(i.selectionDiv), i.gutters.style.height = i.sizer.style.minHeight = 0, u && (i.lastWrapHeight = t.wrapperHeight, i.lastWrapWidth = t.wrapperWidth, pi(e, 400)), i.updateLineNumbers = null, !0;
      }
      function po(e, t) {
        for (var i = t.viewport, r = !0; ; r = !1) {
          if (!r || !e.options.lineWrapping || t.oldDisplayWidth == Sr(e)) {
            if (i && i.top != null && (i = { top: Math.min(e.doc.height + En(e.display) - Ln(e), i.top) }), t.visible = Xi(e.display, e.doc, i), t.visible.from >= e.display.viewFrom && t.visible.to <= e.display.viewTo)
              break;
          } else r && (t.visible = Xi(e.display, e.doc, i));
          if (!Gn(e, t))
            break;
          Ki(e);
          var n = hi(e);
          si(e), Ur(e, n), Xn(e, n), t.force = !1;
        }
        t.signal(e, "update", e), (e.display.viewFrom != e.display.reportedViewFrom || e.display.viewTo != e.display.reportedViewTo) && (t.signal(e, "viewportChange", e, e.display.viewFrom, e.display.viewTo), e.display.reportedViewFrom = e.display.viewFrom, e.display.reportedViewTo = e.display.viewTo);
      }
      function jn(e, t) {
        var i = new Zi(e, t);
        if (Gn(e, i)) {
          Ki(e), po(e, i);
          var r = hi(e);
          si(e), Ur(e, r), Xn(e, r), i.finish();
        }
      }
      function Vu(e, t, i) {
        var r = e.display, n = e.options.lineNumbers, a = r.lineDiv, o = a.firstChild;
        function u(q) {
          var Y = q.nextSibling;
          return te && G && e.display.currentWheelTarget == q ? q.style.display = "none" : q.parentNode.removeChild(q), Y;
        }
        for (var s = r.view, f = r.viewFrom, v = 0; v < s.length; v++) {
          var y = s[v];
          if (!y.hidden) if (!y.node || y.node.parentNode != a) {
            var T = Fu(e, y, f, i);
            a.insertBefore(T, o);
          } else {
            for (; o != y.node; )
              o = u(o);
            var A = n && t != null && t <= f && y.lineNumber;
            y.changes && (We(y.changes, "gutter") > -1 && (A = !1), za(e, y, f, i)), A && (Ee(y.lineNumber), y.lineNumber.appendChild(document.createTextNode(mn(e.options, f)))), o = y.node.nextSibling;
          }
          f += y.size;
        }
        for (; o; )
          o = u(o);
      }
      function Kn(e) {
        var t = e.gutters.offsetWidth;
        e.sizer.style.marginLeft = t + "px", vt(e, "gutterChanged", e);
      }
      function Xn(e, t) {
        e.display.sizer.style.minHeight = t.docHeight + "px", e.display.heightForcer.style.top = t.docHeight + "px", e.display.gutters.style.height = t.docHeight + e.display.barHeight + Zt(e) + "px";
      }
      function go(e) {
        var t = e.display, i = t.view;
        if (!(!t.alignWidgets && (!t.gutters.firstChild || !e.options.fixedGutter))) {
          for (var r = Hn(t) - t.scroller.scrollLeft + e.doc.scrollLeft, n = t.gutters.offsetWidth, a = r + "px", o = 0; o < i.length; o++)
            if (!i[o].hidden) {
              e.options.fixedGutter && (i[o].gutter && (i[o].gutter.style.left = a), i[o].gutterBackground && (i[o].gutterBackground.style.left = a));
              var u = i[o].alignable;
              if (u)
                for (var s = 0; s < u.length; s++)
                  u[s].style.left = a;
            }
          e.options.fixedGutter && (t.gutters.style.left = r + n + "px");
        }
      }
      function vo(e) {
        if (!e.options.lineNumbers)
          return !1;
        var t = e.doc, i = mn(e.options, t.first + t.size - 1), r = e.display;
        if (i.length != r.lineNumChars) {
          var n = r.measure.appendChild(L(
            "div",
            [L("div", i)],
            "CodeMirror-linenumber CodeMirror-gutter-elt"
          )), a = n.firstChild.offsetWidth, o = n.offsetWidth - a;
          return r.lineGutter.style.width = "", r.lineNumInnerWidth = Math.max(a, r.lineGutter.offsetWidth - o) + 1, r.lineNumWidth = r.lineNumInnerWidth + o, r.lineNumChars = r.lineNumInnerWidth ? i.length : -1, r.lineGutter.style.width = r.lineNumWidth + "px", Kn(e.display), !0;
        }
        return !1;
      }
      function Yn(e, t) {
        for (var i = [], r = !1, n = 0; n < e.length; n++) {
          var a = e[n], o = null;
          if (typeof a != "string" && (o = a.style, a = a.className), a == "CodeMirror-linenumbers")
            if (t)
              r = !0;
            else
              continue;
          i.push({ className: a, style: o });
        }
        return t && !r && i.push({ className: "CodeMirror-linenumbers", style: null }), i;
      }
      function mo(e) {
        var t = e.gutters, i = e.gutterSpecs;
        Ee(t), e.lineGutter = null;
        for (var r = 0; r < i.length; ++r) {
          var n = i[r], a = n.className, o = n.style, u = t.appendChild(L("div", null, "CodeMirror-gutter " + a));
          o && (u.style.cssText = o), a == "CodeMirror-linenumbers" && (e.lineGutter = u, u.style.width = (e.lineNumWidth || 1) + "px");
        }
        t.style.display = i.length ? "" : "none", Kn(e);
      }
      function gi(e) {
        mo(e.display), Tt(e), go(e);
      }
      function es(e, t, i, r) {
        var n = this;
        this.input = i, n.scrollbarFiller = L("div", null, "CodeMirror-scrollbar-filler"), n.scrollbarFiller.setAttribute("cm-not-content", "true"), n.gutterFiller = L("div", null, "CodeMirror-gutter-filler"), n.gutterFiller.setAttribute("cm-not-content", "true"), n.lineDiv = ee("div", null, "CodeMirror-code"), n.selectionDiv = L("div", null, null, "position: relative; z-index: 1"), n.cursorDiv = L("div", null, "CodeMirror-cursors"), n.measure = L("div", null, "CodeMirror-measure"), n.lineMeasure = L("div", null, "CodeMirror-measure"), n.lineSpace = ee(
          "div",
          [n.measure, n.lineMeasure, n.selectionDiv, n.cursorDiv, n.lineDiv],
          null,
          "position: relative; outline: none"
        );
        var a = ee("div", [n.lineSpace], "CodeMirror-lines");
        n.mover = L("div", [a], null, "position: relative"), n.sizer = L("div", [n.mover], "CodeMirror-sizer"), n.sizerWidth = null, n.heightForcer = L("div", null, null, "position: absolute; height: " + qe + "px; width: 1px;"), n.gutters = L("div", null, "CodeMirror-gutters"), n.lineGutter = null, n.scroller = L("div", [n.sizer, n.heightForcer, n.gutters], "CodeMirror-scroll"), n.scroller.setAttribute("tabIndex", "-1"), n.wrapper = L("div", [n.scrollbarFiller, n.gutterFiller, n.scroller], "CodeMirror"), K && he === 105 && (n.wrapper.style.clipPath = "inset(0px)"), n.wrapper.setAttribute("translate", "no"), B && z < 8 && (n.gutters.style.zIndex = -1, n.scroller.style.paddingRight = 0), !te && !(M && U) && (n.scroller.draggable = !0), e && (e.appendChild ? e.appendChild(n.wrapper) : e(n.wrapper)), n.viewFrom = n.viewTo = t.first, n.reportedViewFrom = n.reportedViewTo = t.first, n.view = [], n.renderedView = null, n.externalMeasured = null, n.viewOffset = 0, n.lastWrapHeight = n.lastWrapWidth = 0, n.updateLineNumbers = null, n.nativeBarWidth = n.barHeight = n.barWidth = 0, n.scrollbarsClipped = !1, n.lineNumWidth = n.lineNumInnerWidth = n.lineNumChars = null, n.alignWidgets = !1, n.cachedCharWidth = n.cachedTextHeight = n.cachedPaddingH = null, n.maxLine = null, n.maxLineLength = 0, n.maxLineChanged = !1, n.wheelDX = n.wheelDY = n.wheelStartX = n.wheelStartY = null, n.shift = !1, n.selForContextMenu = null, n.activeTouch = null, n.gutterSpecs = Yn(r.gutters, r.lineNumbers), mo(n), i.init(n);
      }
      var Qi = 0, ir = null;
      B ? ir = -0.53 : M ? ir = 15 : K ? ir = -0.7 : Se && (ir = -1 / 3);
      function xo(e) {
        var t = e.wheelDeltaX, i = e.wheelDeltaY;
        return t == null && e.detail && e.axis == e.HORIZONTAL_AXIS && (t = e.detail), i == null && e.detail && e.axis == e.VERTICAL_AXIS ? i = e.detail : i == null && (i = e.wheelDelta), { x: t, y: i };
      }
      function ts(e) {
        var t = xo(e);
        return t.x *= ir, t.y *= ir, t;
      }
      function yo(e, t) {
        K && he == 102 && (e.display.chromeScrollHack == null ? e.display.sizer.style.pointerEvents = "none" : clearTimeout(e.display.chromeScrollHack), e.display.chromeScrollHack = setTimeout(function() {
          e.display.chromeScrollHack = null, e.display.sizer.style.pointerEvents = "";
        }, 100));
        var i = xo(t), r = i.x, n = i.y, a = ir;
        t.deltaMode === 0 && (r = t.deltaX, n = t.deltaY, a = 1);
        var o = e.display, u = o.scroller, s = u.scrollWidth > u.clientWidth, f = u.scrollHeight > u.clientHeight;
        if (r && s || n && f) {
          if (n && G && te) {
            e: for (var v = t.target, y = o.view; v != u; v = v.parentNode)
              for (var T = 0; T < y.length; T++)
                if (y[T].node == v) {
                  e.display.currentWheelTarget = v;
                  break e;
                }
          }
          if (r && !M && !ne && a != null) {
            n && f && ci(e, Math.max(0, u.scrollTop + n * a)), Lr(e, Math.max(0, u.scrollLeft + r * a)), (!n || n && f) && Ae(t), o.wheelStartX = null;
            return;
          }
          if (n && a != null) {
            var A = n * a, q = e.doc.scrollTop, Y = q + o.wrapper.clientHeight;
            A < 0 ? q = Math.max(0, q + A - 50) : Y = Math.min(e.doc.height, Y + A + 50), jn(e, { top: q, bottom: Y });
          }
          Qi < 20 && t.deltaMode !== 0 && (o.wheelStartX == null ? (o.wheelStartX = u.scrollLeft, o.wheelStartY = u.scrollTop, o.wheelDX = r, o.wheelDY = n, setTimeout(function() {
            if (o.wheelStartX != null) {
              var V = u.scrollLeft - o.wheelStartX, oe = u.scrollTop - o.wheelStartY, pe = oe && o.wheelDY && oe / o.wheelDY || V && o.wheelDX && V / o.wheelDX;
              o.wheelStartX = o.wheelStartY = null, pe && (ir = (ir * Qi + pe) / (Qi + 1), ++Qi);
            }
          }, 200)) : (o.wheelDX += r, o.wheelDY += n));
        }
      }
      var Wt = function(e, t) {
        this.ranges = e, this.primIndex = t;
      };
      Wt.prototype.primary = function() {
        return this.ranges[this.primIndex];
      }, Wt.prototype.equals = function(e) {
        if (e == this)
          return !0;
        if (e.primIndex != this.primIndex || e.ranges.length != this.ranges.length)
          return !1;
        for (var t = 0; t < this.ranges.length; t++) {
          var i = this.ranges[t], r = e.ranges[t];
          if (!xn(i.anchor, r.anchor) || !xn(i.head, r.head))
            return !1;
        }
        return !0;
      }, Wt.prototype.deepCopy = function() {
        for (var e = [], t = 0; t < this.ranges.length; t++)
          e[t] = new je(yn(this.ranges[t].anchor), yn(this.ranges[t].head));
        return new Wt(e, this.primIndex);
      }, Wt.prototype.somethingSelected = function() {
        for (var e = 0; e < this.ranges.length; e++)
          if (!this.ranges[e].empty())
            return !0;
        return !1;
      }, Wt.prototype.contains = function(e, t) {
        t || (t = e);
        for (var i = 0; i < this.ranges.length; i++) {
          var r = this.ranges[i];
          if (Me(t, r.from()) >= 0 && Me(e, r.to()) <= 0)
            return i;
        }
        return -1;
      };
      var je = function(e, t) {
        this.anchor = e, this.head = t;
      };
      je.prototype.from = function() {
        return Oi(this.anchor, this.head);
      }, je.prototype.to = function() {
        return Mi(this.anchor, this.head);
      }, je.prototype.empty = function() {
        return this.head.line == this.anchor.line && this.head.ch == this.anchor.ch;
      };
      function Gt(e, t, i) {
        var r = e && e.options.selectionsMayTouch, n = t[i];
        t.sort(function(T, A) {
          return Me(T.from(), A.from());
        }), i = We(t, n);
        for (var a = 1; a < t.length; a++) {
          var o = t[a], u = t[a - 1], s = Me(u.to(), o.from());
          if (r && !o.empty() ? s > 0 : s >= 0) {
            var f = Oi(u.from(), o.from()), v = Mi(u.to(), o.to()), y = u.empty() ? o.from() == o.head : u.from() == u.head;
            a <= i && --i, t.splice(--a, 2, new je(y ? v : f, y ? f : v));
          }
        }
        return new Wt(t, i);
      }
      function dr(e, t) {
        return new Wt([new je(e, t || e)], 0);
      }
      function pr(e) {
        return e.text ? J(
          e.from.line + e.text.length - 1,
          Pe(e.text).length + (e.text.length == 1 ? e.from.ch : 0)
        ) : e.to;
      }
      function Do(e, t) {
        if (Me(e, t.from) < 0)
          return e;
        if (Me(e, t.to) <= 0)
          return pr(t);
        var i = e.line + t.text.length - (t.to.line - t.from.line) - 1, r = e.ch;
        return e.line == t.to.line && (r += pr(t).ch - t.to.ch), J(i, r);
      }
      function Zn(e, t) {
        for (var i = [], r = 0; r < e.sel.ranges.length; r++) {
          var n = e.sel.ranges[r];
          i.push(new je(
            Do(n.anchor, t),
            Do(n.head, t)
          ));
        }
        return Gt(e.cm, i, e.sel.primIndex);
      }
      function bo(e, t, i) {
        return e.line == t.line ? J(i.line, e.ch - t.ch + i.ch) : J(i.line + (e.line - t.line), e.ch);
      }
      function rs(e, t, i) {
        for (var r = [], n = J(e.first, 0), a = n, o = 0; o < t.length; o++) {
          var u = t[o], s = bo(u.from, n, a), f = bo(pr(u), n, a);
          if (n = u.to, a = f, i == "around") {
            var v = e.sel.ranges[o], y = Me(v.head, v.anchor) < 0;
            r[o] = new je(y ? f : s, y ? s : f);
          } else
            r[o] = new je(s, s);
        }
        return new Wt(r, e.sel.primIndex);
      }
      function Qn(e) {
        e.doc.mode = ti(e.options, e.doc.modeOption), vi(e);
      }
      function vi(e) {
        e.doc.iter(function(t) {
          t.stateAfter && (t.stateAfter = null), t.styles && (t.styles = null);
        }), e.doc.modeFrontier = e.doc.highlightFrontier = e.doc.first, pi(e, 100), e.state.modeGen++, e.curOp && Tt(e);
      }
      function Co(e, t) {
        return t.from.ch == 0 && t.to.ch == 0 && Pe(t.text) == "" && (!e.cm || e.cm.options.wholeLineUpdateBefore);
      }
      function $n(e, t, i, r) {
        function n(pe) {
          return i ? i[pe] : null;
        }
        function a(pe, le, ve) {
          fu(pe, le, ve, r), vt(pe, "change", pe, t);
        }
        function o(pe, le) {
          for (var ve = [], Fe = pe; Fe < le; ++Fe)
            ve.push(new Hr(f[Fe], n(Fe), r));
          return ve;
        }
        var u = t.from, s = t.to, f = t.text, v = we(e, u.line), y = we(e, s.line), T = Pe(f), A = n(f.length - 1), q = s.line - u.line;
        if (t.full)
          e.insert(0, o(0, f.length)), e.remove(f.length, e.size - f.length);
        else if (Co(e, t)) {
          var Y = o(0, f.length - 1);
          a(y, y.text, A), q && e.remove(u.line, q), Y.length && e.insert(u.line, Y);
        } else if (v == y)
          if (f.length == 1)
            a(v, v.text.slice(0, u.ch) + T + v.text.slice(s.ch), A);
          else {
            var V = o(1, f.length - 1);
            V.push(new Hr(T + v.text.slice(s.ch), A, r)), a(v, v.text.slice(0, u.ch) + f[0], n(0)), e.insert(u.line + 1, V);
          }
        else if (f.length == 1)
          a(v, v.text.slice(0, u.ch) + f[0] + y.text.slice(s.ch), n(0)), e.remove(u.line + 1, q);
        else {
          a(v, v.text.slice(0, u.ch) + f[0], n(0)), a(y, T + y.text.slice(s.ch), A);
          var oe = o(1, f.length - 1);
          q > 1 && e.remove(u.line + 1, q - 1), e.insert(u.line + 1, oe);
        }
        vt(e, "change", e, t);
      }
      function gr(e, t, i) {
        function r(n, a, o) {
          if (n.linked)
            for (var u = 0; u < n.linked.length; ++u) {
              var s = n.linked[u];
              if (s.doc != a) {
                var f = o && s.sharedHist;
                i && !f || (t(s.doc, f), r(s.doc, n, f));
              }
            }
        }
        r(e, null, !0);
      }
      function wo(e, t) {
        if (t.cm)
          throw new Error("This document is already in use.");
        e.doc = t, t.cm = e, Rn(e), Qn(e), ko(e), e.options.direction = t.direction, e.options.lineWrapping || Fn(e), e.options.mode = t.modeOption, Tt(e);
      }
      function ko(e) {
        (e.doc.direction == "rtl" ? it : Le)(e.display.lineDiv, "CodeMirror-rtl");
      }
      function is(e) {
        Ht(e, function() {
          ko(e), Tt(e);
        });
      }
      function $i(e) {
        this.done = [], this.undone = [], this.undoDepth = e ? e.undoDepth : 1 / 0, this.lastModTime = this.lastSelTime = 0, this.lastOp = this.lastSelOp = null, this.lastOrigin = this.lastSelOrigin = null, this.generation = this.maxGeneration = e ? e.maxGeneration : 1;
      }
      function Jn(e, t) {
        var i = { from: yn(t.from), to: pr(t), text: wr(e, t.from, t.to) };
        return Ao(e, i, t.from.line, t.to.line + 1), gr(e, function(r) {
          return Ao(r, i, t.from.line, t.to.line + 1);
        }, !0), i;
      }
      function So(e) {
        for (; e.length; ) {
          var t = Pe(e);
          if (t.ranges)
            e.pop();
          else
            break;
        }
      }
      function ns(e, t) {
        if (t)
          return So(e.done), Pe(e.done);
        if (e.done.length && !Pe(e.done).ranges)
          return Pe(e.done);
        if (e.done.length > 1 && !e.done[e.done.length - 2].ranges)
          return e.done.pop(), Pe(e.done);
      }
      function Fo(e, t, i, r) {
        var n = e.history;
        n.undone.length = 0;
        var a = +/* @__PURE__ */ new Date(), o, u;
        if ((n.lastOp == r || n.lastOrigin == t.origin && t.origin && (t.origin.charAt(0) == "+" && n.lastModTime > a - (e.cm ? e.cm.options.historyEventDelay : 500) || t.origin.charAt(0) == "*")) && (o = ns(n, n.lastOp == r)))
          u = Pe(o.changes), Me(t.from, t.to) == 0 && Me(t.from, u.to) == 0 ? u.to = pr(t) : o.changes.push(Jn(e, t));
        else {
          var s = Pe(n.done);
          for ((!s || !s.ranges) && Ji(e.sel, n.done), o = {
            changes: [Jn(e, t)],
            generation: n.generation
          }, n.done.push(o); n.done.length > n.undoDepth; )
            n.done.shift(), n.done[0].ranges || n.done.shift();
        }
        n.done.push(i), n.generation = ++n.maxGeneration, n.lastModTime = n.lastSelTime = a, n.lastOp = n.lastSelOp = r, n.lastOrigin = n.lastSelOrigin = t.origin, u || me(e, "historyAdded");
      }
      function as(e, t, i, r) {
        var n = t.charAt(0);
        return n == "*" || n == "+" && i.ranges.length == r.ranges.length && i.somethingSelected() == r.somethingSelected() && /* @__PURE__ */ new Date() - e.history.lastSelTime <= (e.cm ? e.cm.options.historyEventDelay : 500);
      }
      function os(e, t, i, r) {
        var n = e.history, a = r && r.origin;
        i == n.lastSelOp || a && n.lastSelOrigin == a && (n.lastModTime == n.lastSelTime && n.lastOrigin == a || as(e, a, Pe(n.done), t)) ? n.done[n.done.length - 1] = t : Ji(t, n.done), n.lastSelTime = +/* @__PURE__ */ new Date(), n.lastSelOrigin = a, n.lastSelOp = i, r && r.clearRedo !== !1 && So(n.undone);
      }
      function Ji(e, t) {
        var i = Pe(t);
        i && i.ranges && i.equals(e) || t.push(e);
      }
      function Ao(e, t, i, r) {
        var n = t["spans_" + e.id], a = 0;
        e.iter(Math.max(e.first, i), Math.min(e.first + e.size, r), function(o) {
          o.markedSpans && ((n || (n = t["spans_" + e.id] = {}))[a] = o.markedSpans), ++a;
        });
      }
      function ls(e) {
        if (!e)
          return null;
        for (var t, i = 0; i < e.length; ++i)
          e[i].marker.explicitlyCleared ? t || (t = e.slice(0, i)) : t && t.push(e[i]);
        return t ? t.length ? t : null : e;
      }
      function us(e, t) {
        var i = t["spans_" + e.id];
        if (!i)
          return null;
        for (var r = [], n = 0; n < t.text.length; ++n)
          r.push(ls(i[n]));
        return r;
      }
      function Eo(e, t) {
        var i = us(e, t), r = Cn(e, t);
        if (!i)
          return r;
        if (!r)
          return i;
        for (var n = 0; n < i.length; ++n) {
          var a = i[n], o = r[n];
          if (a && o)
            e: for (var u = 0; u < o.length; ++u) {
              for (var s = o[u], f = 0; f < a.length; ++f)
                if (a[f].marker == s.marker)
                  continue e;
              a.push(s);
            }
          else o && (i[n] = o);
        }
        return i;
      }
      function Gr(e, t, i) {
        for (var r = [], n = 0; n < e.length; ++n) {
          var a = e[n];
          if (a.ranges) {
            r.push(i ? Wt.prototype.deepCopy.call(a) : a);
            continue;
          }
          var o = a.changes, u = [];
          r.push({ changes: u });
          for (var s = 0; s < o.length; ++s) {
            var f = o[s], v = void 0;
            if (u.push({ from: f.from, to: f.to, text: f.text }), t)
              for (var y in f)
                (v = y.match(/^spans_(\d+)$/)) && We(t, Number(v[1])) > -1 && (Pe(u)[y] = f[y], delete f[y]);
          }
        }
        return r;
      }
      function Vn(e, t, i, r) {
        if (r) {
          var n = e.anchor;
          if (i) {
            var a = Me(t, n) < 0;
            a != Me(i, n) < 0 ? (n = t, t = i) : a != Me(t, i) < 0 && (t = i);
          }
          return new je(n, t);
        } else
          return new je(i || t, t);
      }
      function Vi(e, t, i, r, n) {
        n == null && (n = e.cm && (e.cm.display.shift || e.extend)), kt(e, new Wt([Vn(e.sel.primary(), t, i, n)], 0), r);
      }
      function Lo(e, t, i) {
        for (var r = [], n = e.cm && (e.cm.display.shift || e.extend), a = 0; a < e.sel.ranges.length; a++)
          r[a] = Vn(e.sel.ranges[a], t[a], null, n);
        var o = Gt(e.cm, r, e.sel.primIndex);
        kt(e, o, i);
      }
      function ea(e, t, i, r) {
        var n = e.sel.ranges.slice(0);
        n[t] = i, kt(e, Gt(e.cm, n, e.sel.primIndex), r);
      }
      function To(e, t, i, r) {
        kt(e, dr(t, i), r);
      }
      function ss(e, t, i) {
        var r = {
          ranges: t.ranges,
          update: function(n) {
            this.ranges = [];
            for (var a = 0; a < n.length; a++)
              this.ranges[a] = new je(
                Oe(e, n[a].anchor),
                Oe(e, n[a].head)
              );
          },
          origin: i && i.origin
        };
        return me(e, "beforeSelectionChange", e, r), e.cm && me(e.cm, "beforeSelectionChange", e.cm, r), r.ranges != t.ranges ? Gt(e.cm, r.ranges, r.ranges.length - 1) : t;
      }
      function Bo(e, t, i) {
        var r = e.history.done, n = Pe(r);
        n && n.ranges ? (r[r.length - 1] = t, en(e, t, i)) : kt(e, t, i);
      }
      function kt(e, t, i) {
        en(e, t, i), os(e, e.sel, e.cm ? e.cm.curOp.id : NaN, i);
      }
      function en(e, t, i) {
        (Ie(e, "beforeSelectionChange") || e.cm && Ie(e.cm, "beforeSelectionChange")) && (t = ss(e, t, i));
        var r = i && i.bias || (Me(t.primary().head, e.sel.primary().head) < 0 ? -1 : 1);
        Mo(e, No(e, t, r, !0)), !(i && i.scroll === !1) && e.cm && e.cm.getOption("readOnly") != "nocursor" && qr(e.cm);
      }
      function Mo(e, t) {
        t.equals(e.sel) || (e.sel = t, e.cm && (e.cm.curOp.updateInput = 1, e.cm.curOp.selectionChanged = !0, De(e.cm)), vt(e, "cursorActivity", e));
      }
      function Oo(e) {
        Mo(e, No(e, e.sel, null, !1));
      }
      function No(e, t, i, r) {
        for (var n, a = 0; a < t.ranges.length; a++) {
          var o = t.ranges[a], u = t.ranges.length == e.sel.ranges.length && e.sel.ranges[a], s = tn(e, o.anchor, u && u.anchor, i, r), f = o.head == o.anchor ? s : tn(e, o.head, u && u.head, i, r);
          (n || s != o.anchor || f != o.head) && (n || (n = t.ranges.slice(0, a)), n[a] = new je(s, f));
        }
        return n ? Gt(e.cm, n, t.primIndex) : t;
      }
      function jr(e, t, i, r, n) {
        var a = we(e, t.line);
        if (a.markedSpans)
          for (var o = 0; o < a.markedSpans.length; ++o) {
            var u = a.markedSpans[o], s = u.marker, f = "selectLeft" in s ? !s.selectLeft : s.inclusiveLeft, v = "selectRight" in s ? !s.selectRight : s.inclusiveRight;
            if ((u.from == null || (f ? u.from <= t.ch : u.from < t.ch)) && (u.to == null || (v ? u.to >= t.ch : u.to > t.ch))) {
              if (n && (me(s, "beforeCursorEnter"), s.explicitlyCleared))
                if (a.markedSpans) {
                  --o;
                  continue;
                } else
                  break;
              if (!s.atomic)
                continue;
              if (i) {
                var y = s.find(r < 0 ? 1 : -1), T = void 0;
                if ((r < 0 ? v : f) && (y = Io(e, y, -r, y && y.line == t.line ? a : null)), y && y.line == t.line && (T = Me(y, i)) && (r < 0 ? T < 0 : T > 0))
                  return jr(e, y, t, r, n);
              }
              var A = s.find(r < 0 ? -1 : 1);
              return (r < 0 ? f : v) && (A = Io(e, A, r, A.line == t.line ? a : null)), A ? jr(e, A, t, r, n) : null;
            }
          }
        return t;
      }
      function tn(e, t, i, r, n) {
        var a = r || 1, o = jr(e, t, i, a, n) || !n && jr(e, t, i, a, !0) || jr(e, t, i, -a, n) || !n && jr(e, t, i, -a, !0);
        return o || (e.cantEdit = !0, J(e.first, 0));
      }
      function Io(e, t, i, r) {
        return i < 0 && t.ch == 0 ? t.line > e.first ? Oe(e, J(t.line - 1)) : null : i > 0 && t.ch == (r || we(e, t.line)).text.length ? t.line < e.first + e.size - 1 ? J(t.line + 1, 0) : null : new J(t.line, t.ch + i);
      }
      function Ho(e) {
        e.setSelection(J(e.firstLine(), 0), J(e.lastLine()), st);
      }
      function Ro(e, t, i) {
        var r = {
          canceled: !1,
          from: t.from,
          to: t.to,
          text: t.text,
          origin: t.origin,
          cancel: function() {
            return r.canceled = !0;
          }
        };
        return i && (r.update = function(n, a, o, u) {
          n && (r.from = Oe(e, n)), a && (r.to = Oe(e, a)), o && (r.text = o), u !== void 0 && (r.origin = u);
        }), me(e, "beforeChange", e, r), e.cm && me(e.cm, "beforeChange", e.cm, r), r.canceled ? (e.cm && (e.cm.curOp.updateInput = 2), null) : { from: r.from, to: r.to, text: r.text, origin: r.origin };
      }
      function Kr(e, t, i) {
        if (e.cm) {
          if (!e.cm.curOp)
            return mt(e.cm, Kr)(e, t, i);
          if (e.cm.state.suppressEdits)
            return;
        }
        if (!((Ie(e, "beforeChange") || e.cm && Ie(e.cm, "beforeChange")) && (t = Ro(e, t, !0), !t))) {
          var r = Aa && !i && ou(e, t.from, t.to);
          if (r)
            for (var n = r.length - 1; n >= 0; --n)
              Po(e, { from: r[n].from, to: r[n].to, text: n ? [""] : t.text, origin: t.origin });
          else
            Po(e, t);
        }
      }
      function Po(e, t) {
        if (!(t.text.length == 1 && t.text[0] == "" && Me(t.from, t.to) == 0)) {
          var i = Zn(e, t);
          Fo(e, t, i, e.cm ? e.cm.curOp.id : NaN), mi(e, t, i, Cn(e, t));
          var r = [];
          gr(e, function(n, a) {
            !a && We(r, n.history) == -1 && (qo(n.history, t), r.push(n.history)), mi(n, t, null, Cn(n, t));
          });
        }
      }
      function rn(e, t, i) {
        var r = e.cm && e.cm.state.suppressEdits;
        if (!(r && !i)) {
          for (var n = e.history, a, o = e.sel, u = t == "undo" ? n.done : n.undone, s = t == "undo" ? n.undone : n.done, f = 0; f < u.length && (a = u[f], !(i ? a.ranges && !a.equals(e.sel) : !a.ranges)); f++)
            ;
          if (f != u.length) {
            for (n.lastOrigin = n.lastSelOrigin = null; ; )
              if (a = u.pop(), a.ranges) {
                if (Ji(a, s), i && !a.equals(e.sel)) {
                  kt(e, a, { clearRedo: !1 });
                  return;
                }
                o = a;
              } else if (r) {
                u.push(a);
                return;
              } else
                break;
            var v = [];
            Ji(o, s), s.push({ changes: v, generation: n.generation }), n.generation = a.generation || ++n.maxGeneration;
            for (var y = Ie(e, "beforeChange") || e.cm && Ie(e.cm, "beforeChange"), T = function(Y) {
              var V = a.changes[Y];
              if (V.origin = t, y && !Ro(e, V, !1))
                return u.length = 0, {};
              v.push(Jn(e, V));
              var oe = Y ? Zn(e, V) : Pe(u);
              mi(e, V, oe, Eo(e, V)), !Y && e.cm && e.cm.scrollIntoView({ from: V.from, to: pr(V) });
              var pe = [];
              gr(e, function(le, ve) {
                !ve && We(pe, le.history) == -1 && (qo(le.history, V), pe.push(le.history)), mi(le, V, null, Eo(le, V));
              });
            }, A = a.changes.length - 1; A >= 0; --A) {
              var q = T(A);
              if (q) return q.v;
            }
          }
        }
      }
      function zo(e, t) {
        if (t != 0 && (e.first += t, e.sel = new Wt(ze(e.sel.ranges, function(n) {
          return new je(
            J(n.anchor.line + t, n.anchor.ch),
            J(n.head.line + t, n.head.ch)
          );
        }), e.sel.primIndex), e.cm)) {
          Tt(e.cm, e.first, e.first - t, t);
          for (var i = e.cm.display, r = i.viewFrom; r < i.viewTo; r++)
            cr(e.cm, r, "gutter");
        }
      }
      function mi(e, t, i, r) {
        if (e.cm && !e.cm.curOp)
          return mt(e.cm, mi)(e, t, i, r);
        if (t.to.line < e.first) {
          zo(e, t.text.length - 1 - (t.to.line - t.from.line));
          return;
        }
        if (!(t.from.line > e.lastLine())) {
          if (t.from.line < e.first) {
            var n = t.text.length - 1 - (e.first - t.from.line);
            zo(e, n), t = {
              from: J(e.first, 0),
              to: J(t.to.line + n, t.to.ch),
              text: [Pe(t.text)],
              origin: t.origin
            };
          }
          var a = e.lastLine();
          t.to.line > a && (t = {
            from: t.from,
            to: J(a, we(e, a).text.length),
            text: [t.text[0]],
            origin: t.origin
          }), t.removed = wr(e, t.from, t.to), i || (i = Zn(e, t)), e.cm ? fs(e.cm, t, r) : $n(e, t, r), en(e, i, st), e.cantEdit && tn(e, J(e.firstLine(), 0)) && (e.cantEdit = !1);
        }
      }
      function fs(e, t, i) {
        var r = e.doc, n = e.display, a = t.from, o = t.to, u = !1, s = a.line;
        e.options.lineWrapping || (s = Ye(qt(we(r, a.line))), r.iter(s, o.line + 1, function(A) {
          if (A == n.maxLine)
            return u = !0, !0;
        })), r.sel.contains(t.from, t.to) > -1 && De(e), $n(r, t, i, io(e)), e.options.lineWrapping || (r.iter(s, a.line + t.text.length, function(A) {
          var q = zi(A);
          q > n.maxLineLength && (n.maxLine = A, n.maxLineLength = q, n.maxLineChanged = !0, u = !1);
        }), u && (e.curOp.updateMaxLine = !0)), Vl(r, a.line), pi(e, 400);
        var f = t.text.length - (o.line - a.line) - 1;
        t.full ? Tt(e) : a.line == o.line && t.text.length == 1 && !Co(e.doc, t) ? cr(e, a.line, "text") : Tt(e, a.line, o.line + 1, f);
        var v = Ie(e, "changes"), y = Ie(e, "change");
        if (y || v) {
          var T = {
            from: a,
            to: o,
            text: t.text,
            removed: t.removed,
            origin: t.origin
          };
          y && vt(e, "change", e, T), v && (e.curOp.changeObjs || (e.curOp.changeObjs = [])).push(T);
        }
        e.display.selForContextMenu = null;
      }
      function Xr(e, t, i, r, n) {
        var a;
        r || (r = i), Me(r, i) < 0 && (a = [r, i], i = a[0], r = a[1]), typeof t == "string" && (t = e.splitLines(t)), Kr(e, { from: i, to: r, text: t, origin: n });
      }
      function Wo(e, t, i, r) {
        i < e.line ? e.line += r : t < e.line && (e.line = t, e.ch = 0);
      }
      function _o(e, t, i, r) {
        for (var n = 0; n < e.length; ++n) {
          var a = e[n], o = !0;
          if (a.ranges) {
            a.copied || (a = e[n] = a.deepCopy(), a.copied = !0);
            for (var u = 0; u < a.ranges.length; u++)
              Wo(a.ranges[u].anchor, t, i, r), Wo(a.ranges[u].head, t, i, r);
            continue;
          }
          for (var s = 0; s < a.changes.length; ++s) {
            var f = a.changes[s];
            if (i < f.from.line)
              f.from = J(f.from.line + r, f.from.ch), f.to = J(f.to.line + r, f.to.ch);
            else if (t <= f.to.line) {
              o = !1;
              break;
            }
          }
          o || (e.splice(0, n + 1), n = 0);
        }
      }
      function qo(e, t) {
        var i = t.from.line, r = t.to.line, n = t.text.length - (r - i) - 1;
        _o(e.done, i, r, n), _o(e.undone, i, r, n);
      }
      function xi(e, t, i, r) {
        var n = t, a = t;
        return typeof t == "number" ? a = we(e, xa(e, t)) : n = Ye(t), n == null ? null : (r(a, n) && e.cm && cr(e.cm, n, i), a);
      }
      function yi(e) {
        this.lines = e, this.parent = null;
        for (var t = 0, i = 0; i < e.length; ++i)
          e[i].parent = this, t += e[i].height;
        this.height = t;
      }
      yi.prototype = {
        chunkSize: function() {
          return this.lines.length;
        },
        // Remove the n lines at offset 'at'.
        removeInner: function(e, t) {
          for (var i = e, r = e + t; i < r; ++i) {
            var n = this.lines[i];
            this.height -= n.height, cu(n), vt(n, "delete");
          }
          this.lines.splice(e, t);
        },
        // Helper used to collapse a small branch into a single leaf.
        collapse: function(e) {
          e.push.apply(e, this.lines);
        },
        // Insert the given array of lines at offset 'at', count them as
        // having the given height.
        insertInner: function(e, t, i) {
          this.height += i, this.lines = this.lines.slice(0, e).concat(t).concat(this.lines.slice(e));
          for (var r = 0; r < t.length; ++r)
            t[r].parent = this;
        },
        // Used to iterate over a part of the tree.
        iterN: function(e, t, i) {
          for (var r = e + t; e < r; ++e)
            if (i(this.lines[e]))
              return !0;
        }
      };
      function Di(e) {
        this.children = e;
        for (var t = 0, i = 0, r = 0; r < e.length; ++r) {
          var n = e[r];
          t += n.chunkSize(), i += n.height, n.parent = this;
        }
        this.size = t, this.height = i, this.parent = null;
      }
      Di.prototype = {
        chunkSize: function() {
          return this.size;
        },
        removeInner: function(e, t) {
          this.size -= t;
          for (var i = 0; i < this.children.length; ++i) {
            var r = this.children[i], n = r.chunkSize();
            if (e < n) {
              var a = Math.min(t, n - e), o = r.height;
              if (r.removeInner(e, a), this.height -= o - r.height, n == a && (this.children.splice(i--, 1), r.parent = null), (t -= a) == 0)
                break;
              e = 0;
            } else
              e -= n;
          }
          if (this.size - t < 25 && (this.children.length > 1 || !(this.children[0] instanceof yi))) {
            var u = [];
            this.collapse(u), this.children = [new yi(u)], this.children[0].parent = this;
          }
        },
        collapse: function(e) {
          for (var t = 0; t < this.children.length; ++t)
            this.children[t].collapse(e);
        },
        insertInner: function(e, t, i) {
          this.size += t.length, this.height += i;
          for (var r = 0; r < this.children.length; ++r) {
            var n = this.children[r], a = n.chunkSize();
            if (e <= a) {
              if (n.insertInner(e, t, i), n.lines && n.lines.length > 50) {
                for (var o = n.lines.length % 25 + 25, u = o; u < n.lines.length; ) {
                  var s = new yi(n.lines.slice(u, u += 25));
                  n.height -= s.height, this.children.splice(++r, 0, s), s.parent = this;
                }
                n.lines = n.lines.slice(0, o), this.maybeSpill();
              }
              break;
            }
            e -= a;
          }
        },
        // When a node has grown, check whether it should be split.
        maybeSpill: function() {
          if (!(this.children.length <= 10)) {
            var e = this;
            do {
              var t = e.children.splice(e.children.length - 5, 5), i = new Di(t);
              if (e.parent) {
                e.size -= i.size, e.height -= i.height;
                var n = We(e.parent.children, e);
                e.parent.children.splice(n + 1, 0, i);
              } else {
                var r = new Di(e.children);
                r.parent = e, e.children = [r, i], e = r;
              }
              i.parent = e.parent;
            } while (e.children.length > 10);
            e.parent.maybeSpill();
          }
        },
        iterN: function(e, t, i) {
          for (var r = 0; r < this.children.length; ++r) {
            var n = this.children[r], a = n.chunkSize();
            if (e < a) {
              var o = Math.min(t, a - e);
              if (n.iterN(e, o, i))
                return !0;
              if ((t -= o) == 0)
                break;
              e = 0;
            } else
              e -= a;
          }
        }
      };
      var bi = function(e, t, i) {
        if (i)
          for (var r in i)
            i.hasOwnProperty(r) && (this[r] = i[r]);
        this.doc = e, this.node = t;
      };
      bi.prototype.clear = function() {
        var e = this.doc.cm, t = this.line.widgets, i = this.line, r = Ye(i);
        if (!(r == null || !t)) {
          for (var n = 0; n < t.length; ++n)
            t[n] == this && t.splice(n--, 1);
          t.length || (i.widgets = null);
          var a = li(this);
          Xt(i, Math.max(0, i.height - a)), e && (Ht(e, function() {
            Uo(e, i, -a), cr(e, r, "widget");
          }), vt(e, "lineWidgetCleared", e, this, r));
        }
      }, bi.prototype.changed = function() {
        var e = this, t = this.height, i = this.doc.cm, r = this.line;
        this.height = null;
        var n = li(this) - t;
        n && (fr(this.doc, r) || Xt(r, r.height + n), i && Ht(i, function() {
          i.curOp.forceUpdate = !0, Uo(i, r, n), vt(i, "lineWidgetChanged", i, e, Ye(r));
        }));
      }, et(bi);
      function Uo(e, t, i) {
        tr(t) < (e.curOp && e.curOp.scrollTop || e.doc.scrollTop) && Un(e, i);
      }
      function cs(e, t, i, r) {
        var n = new bi(e, i, r), a = e.cm;
        return a && n.noHScroll && (a.display.alignWidgets = !0), xi(e, t, "widget", function(o) {
          var u = o.widgets || (o.widgets = []);
          if (n.insertAt == null ? u.push(n) : u.splice(Math.min(u.length, Math.max(0, n.insertAt)), 0, n), n.line = o, a && !fr(e, o)) {
            var s = tr(o) < e.scrollTop;
            Xt(o, o.height + li(n)), s && Un(a, n.height), a.curOp.forceUpdate = !0;
          }
          return !0;
        }), a && vt(a, "lineWidgetAdded", a, n, typeof t == "number" ? t : Ye(t)), n;
      }
      var Go = 0, vr = function(e, t) {
        this.lines = [], this.type = t, this.doc = e, this.id = ++Go;
      };
      vr.prototype.clear = function() {
        if (!this.explicitlyCleared) {
          var e = this.doc.cm, t = e && !e.curOp;
          if (t && Br(e), Ie(this, "clear")) {
            var i = this.find();
            i && vt(this, "clear", i.from, i.to);
          }
          for (var r = null, n = null, a = 0; a < this.lines.length; ++a) {
            var o = this.lines[a], u = ni(o.markedSpans, this);
            e && !this.collapsed ? cr(e, Ye(o), "text") : e && (u.to != null && (n = Ye(o)), u.from != null && (r = Ye(o))), o.markedSpans = ru(o.markedSpans, u), u.from == null && this.collapsed && !fr(this.doc, o) && e && Xt(o, zr(e.display));
          }
          if (e && this.collapsed && !e.options.lineWrapping)
            for (var s = 0; s < this.lines.length; ++s) {
              var f = qt(this.lines[s]), v = zi(f);
              v > e.display.maxLineLength && (e.display.maxLine = f, e.display.maxLineLength = v, e.display.maxLineChanged = !0);
            }
          r != null && e && this.collapsed && Tt(e, r, n + 1), this.lines.length = 0, this.explicitlyCleared = !0, this.atomic && this.doc.cantEdit && (this.doc.cantEdit = !1, e && Oo(e.doc)), e && vt(e, "markerCleared", e, this, r, n), t && Mr(e), this.parent && this.parent.clear();
        }
      }, vr.prototype.find = function(e, t) {
        e == null && this.type == "bookmark" && (e = 1);
        for (var i, r, n = 0; n < this.lines.length; ++n) {
          var a = this.lines[n], o = ni(a.markedSpans, this);
          if (o.from != null && (i = J(t ? a : Ye(a), o.from), e == -1))
            return i;
          if (o.to != null && (r = J(t ? a : Ye(a), o.to), e == 1))
            return r;
        }
        return i && { from: i, to: r };
      }, vr.prototype.changed = function() {
        var e = this, t = this.find(-1, !0), i = this, r = this.doc.cm;
        !t || !r || Ht(r, function() {
          var n = t.line, a = Ye(t.line), o = Tn(r, a);
          if (o && (Za(o), r.curOp.selectionChanged = r.curOp.forceUpdate = !0), r.curOp.updateMaxLine = !0, !fr(i.doc, n) && i.height != null) {
            var u = i.height;
            i.height = null;
            var s = li(i) - u;
            s && Xt(n, n.height + s);
          }
          vt(r, "markerChanged", r, e);
        });
      }, vr.prototype.attachLine = function(e) {
        if (!this.lines.length && this.doc.cm) {
          var t = this.doc.cm.curOp;
          (!t.maybeHiddenMarkers || We(t.maybeHiddenMarkers, this) == -1) && (t.maybeUnhiddenMarkers || (t.maybeUnhiddenMarkers = [])).push(this);
        }
        this.lines.push(e);
      }, vr.prototype.detachLine = function(e) {
        if (this.lines.splice(We(this.lines, e), 1), !this.lines.length && this.doc.cm) {
          var t = this.doc.cm.curOp;
          (t.maybeHiddenMarkers || (t.maybeHiddenMarkers = [])).push(this);
        }
      }, et(vr);
      function Yr(e, t, i, r, n) {
        if (r && r.shared)
          return hs(e, t, i, r, n);
        if (e.cm && !e.cm.curOp)
          return mt(e.cm, Yr)(e, t, i, r, n);
        var a = new vr(e, n), o = Me(t, i);
        if (r && nt(r, a, !1), o > 0 || o == 0 && a.clearWhenEmpty !== !1)
          return a;
        if (a.replacedWith && (a.collapsed = !0, a.widgetNode = ee("span", [a.replacedWith], "CodeMirror-widget"), r.handleMouseEvents || a.widgetNode.setAttribute("cm-ignore-events", "true"), r.insertLeft && (a.widgetNode.insertLeft = !0)), a.collapsed) {
          if (Oa(e, t.line, t, i, a) || t.line != i.line && Oa(e, i.line, t, i, a))
            throw new Error("Inserting collapsed marker partially overlapping an existing one");
          tu();
        }
        a.addToHistory && Fo(e, { from: t, to: i, origin: "markText" }, e.sel, NaN);
        var u = t.line, s = e.cm, f;
        if (e.iter(u, i.line + 1, function(y) {
          s && a.collapsed && !s.options.lineWrapping && qt(y) == s.display.maxLine && (f = !0), a.collapsed && u != t.line && Xt(y, 0), iu(y, new Ii(
            a,
            u == t.line ? t.ch : null,
            u == i.line ? i.ch : null
          ), e.cm && e.cm.curOp), ++u;
        }), a.collapsed && e.iter(t.line, i.line + 1, function(y) {
          fr(e, y) && Xt(y, 0);
        }), a.clearOnEnter && x(a, "beforeCursorEnter", function() {
          return a.clear();
        }), a.readOnly && (eu(), (e.history.done.length || e.history.undone.length) && e.clearHistory()), a.collapsed && (a.id = ++Go, a.atomic = !0), s) {
          if (f && (s.curOp.updateMaxLine = !0), a.collapsed)
            Tt(s, t.line, i.line + 1);
          else if (a.className || a.startStyle || a.endStyle || a.css || a.attributes || a.title)
            for (var v = t.line; v <= i.line; v++)
              cr(s, v, "text");
          a.atomic && Oo(s.doc), vt(s, "markerAdded", s, a);
        }
        return a;
      }
      var Ci = function(e, t) {
        this.markers = e, this.primary = t;
        for (var i = 0; i < e.length; ++i)
          e[i].parent = this;
      };
      Ci.prototype.clear = function() {
        if (!this.explicitlyCleared) {
          this.explicitlyCleared = !0;
          for (var e = 0; e < this.markers.length; ++e)
            this.markers[e].clear();
          vt(this, "clear");
        }
      }, Ci.prototype.find = function(e, t) {
        return this.primary.find(e, t);
      }, et(Ci);
      function hs(e, t, i, r, n) {
        r = nt(r), r.shared = !1;
        var a = [Yr(e, t, i, r, n)], o = a[0], u = r.widgetNode;
        return gr(e, function(s) {
          u && (r.widgetNode = u.cloneNode(!0)), a.push(Yr(s, Oe(s, t), Oe(s, i), r, n));
          for (var f = 0; f < s.linked.length; ++f)
            if (s.linked[f].isParent)
              return;
          o = Pe(a);
        }), new Ci(a, o);
      }
      function jo(e) {
        return e.findMarks(J(e.first, 0), e.clipPos(J(e.lastLine())), function(t) {
          return t.parent;
        });
      }
      function ds(e, t) {
        for (var i = 0; i < t.length; i++) {
          var r = t[i], n = r.find(), a = e.clipPos(n.from), o = e.clipPos(n.to);
          if (Me(a, o)) {
            var u = Yr(e, a, o, r.primary, r.primary.type);
            r.markers.push(u), u.parent = r;
          }
        }
      }
      function ps(e) {
        for (var t = function(r) {
          var n = e[r], a = [n.primary.doc];
          gr(n.primary.doc, function(s) {
            return a.push(s);
          });
          for (var o = 0; o < n.markers.length; o++) {
            var u = n.markers[o];
            We(a, u.doc) == -1 && (u.parent = null, n.markers.splice(o--, 1));
          }
        }, i = 0; i < e.length; i++) t(i);
      }
      var gs = 0, Bt = function(e, t, i, r, n) {
        if (!(this instanceof Bt))
          return new Bt(e, t, i, r, n);
        i == null && (i = 0), Di.call(this, [new yi([new Hr("", null)])]), this.first = i, this.scrollTop = this.scrollLeft = 0, this.cantEdit = !1, this.cleanGeneration = 1, this.modeFrontier = this.highlightFrontier = i;
        var a = J(i, 0);
        this.sel = dr(a), this.history = new $i(null), this.id = ++gs, this.modeOption = t, this.lineSep = r, this.direction = n == "rtl" ? "rtl" : "ltr", this.extend = !1, typeof e == "string" && (e = this.splitLines(e)), $n(this, { from: a, to: a, text: e }), kt(this, dr(a), st);
      };
      Bt.prototype = O(Di.prototype, {
        constructor: Bt,
        // Iterate over the document. Supports two forms -- with only one
        // argument, it calls that for each line in the document. With
        // three, it iterates over the range given by the first two (with
        // the second being non-inclusive).
        iter: function(e, t, i) {
          i ? this.iterN(e - this.first, t - e, i) : this.iterN(this.first, this.first + this.size, e);
        },
        // Non-public interface for adding and removing lines.
        insert: function(e, t) {
          for (var i = 0, r = 0; r < t.length; ++r)
            i += t[r].height;
          this.insertInner(e - this.first, t, i);
        },
        remove: function(e, t) {
          this.removeInner(e - this.first, t);
        },
        // From here, the methods are part of the public interface. Most
        // are also available from CodeMirror (editor) instances.
        getValue: function(e) {
          var t = vn(this, this.first, this.first + this.size);
          return e === !1 ? t : t.join(e || this.lineSeparator());
        },
        setValue: xt(function(e) {
          var t = J(this.first, 0), i = this.first + this.size - 1;
          Kr(this, {
            from: t,
            to: J(i, we(this, i).text.length),
            text: this.splitLines(e),
            origin: "setValue",
            full: !0
          }, !0), this.cm && fi(this.cm, 0, 0), kt(this, dr(t), st);
        }),
        replaceRange: function(e, t, i, r) {
          t = Oe(this, t), i = i ? Oe(this, i) : t, Xr(this, e, t, i, r);
        },
        getRange: function(e, t, i) {
          var r = wr(this, Oe(this, e), Oe(this, t));
          return i === !1 ? r : i === "" ? r.join("") : r.join(i || this.lineSeparator());
        },
        getLine: function(e) {
          var t = this.getLineHandle(e);
          return t && t.text;
        },
        getLineHandle: function(e) {
          if (ri(this, e))
            return we(this, e);
        },
        getLineNumber: function(e) {
          return Ye(e);
        },
        getLineHandleVisualStart: function(e) {
          return typeof e == "number" && (e = we(this, e)), qt(e);
        },
        lineCount: function() {
          return this.size;
        },
        firstLine: function() {
          return this.first;
        },
        lastLine: function() {
          return this.first + this.size - 1;
        },
        clipPos: function(e) {
          return Oe(this, e);
        },
        getCursor: function(e) {
          var t = this.sel.primary(), i;
          return e == null || e == "head" ? i = t.head : e == "anchor" ? i = t.anchor : e == "end" || e == "to" || e === !1 ? i = t.to() : i = t.from(), i;
        },
        listSelections: function() {
          return this.sel.ranges;
        },
        somethingSelected: function() {
          return this.sel.somethingSelected();
        },
        setCursor: xt(function(e, t, i) {
          To(this, Oe(this, typeof e == "number" ? J(e, t || 0) : e), null, i);
        }),
        setSelection: xt(function(e, t, i) {
          To(this, Oe(this, e), Oe(this, t || e), i);
        }),
        extendSelection: xt(function(e, t, i) {
          Vi(this, Oe(this, e), t && Oe(this, t), i);
        }),
        extendSelections: xt(function(e, t) {
          Lo(this, ya(this, e), t);
        }),
        extendSelectionsBy: xt(function(e, t) {
          var i = ze(this.sel.ranges, e);
          Lo(this, ya(this, i), t);
        }),
        setSelections: xt(function(e, t, i) {
          if (e.length) {
            for (var r = [], n = 0; n < e.length; n++)
              r[n] = new je(
                Oe(this, e[n].anchor),
                Oe(this, e[n].head || e[n].anchor)
              );
            t == null && (t = Math.min(e.length - 1, this.sel.primIndex)), kt(this, Gt(this.cm, r, t), i);
          }
        }),
        addSelection: xt(function(e, t, i) {
          var r = this.sel.ranges.slice(0);
          r.push(new je(Oe(this, e), Oe(this, t || e))), kt(this, Gt(this.cm, r, r.length - 1), i);
        }),
        getSelection: function(e) {
          for (var t = this.sel.ranges, i, r = 0; r < t.length; r++) {
            var n = wr(this, t[r].from(), t[r].to());
            i = i ? i.concat(n) : n;
          }
          return e === !1 ? i : i.join(e || this.lineSeparator());
        },
        getSelections: function(e) {
          for (var t = [], i = this.sel.ranges, r = 0; r < i.length; r++) {
            var n = wr(this, i[r].from(), i[r].to());
            e !== !1 && (n = n.join(e || this.lineSeparator())), t[r] = n;
          }
          return t;
        },
        replaceSelection: function(e, t, i) {
          for (var r = [], n = 0; n < this.sel.ranges.length; n++)
            r[n] = e;
          this.replaceSelections(r, t, i || "+input");
        },
        replaceSelections: xt(function(e, t, i) {
          for (var r = [], n = this.sel, a = 0; a < n.ranges.length; a++) {
            var o = n.ranges[a];
            r[a] = { from: o.from(), to: o.to(), text: this.splitLines(e[a]), origin: i };
          }
          for (var u = t && t != "end" && rs(this, r, t), s = r.length - 1; s >= 0; s--)
            Kr(this, r[s]);
          u ? Bo(this, u) : this.cm && qr(this.cm);
        }),
        undo: xt(function() {
          rn(this, "undo");
        }),
        redo: xt(function() {
          rn(this, "redo");
        }),
        undoSelection: xt(function() {
          rn(this, "undo", !0);
        }),
        redoSelection: xt(function() {
          rn(this, "redo", !0);
        }),
        setExtending: function(e) {
          this.extend = e;
        },
        getExtending: function() {
          return this.extend;
        },
        historySize: function() {
          for (var e = this.history, t = 0, i = 0, r = 0; r < e.done.length; r++)
            e.done[r].ranges || ++t;
          for (var n = 0; n < e.undone.length; n++)
            e.undone[n].ranges || ++i;
          return { undo: t, redo: i };
        },
        clearHistory: function() {
          var e = this;
          this.history = new $i(this.history), gr(this, function(t) {
            return t.history = e.history;
          }, !0);
        },
        markClean: function() {
          this.cleanGeneration = this.changeGeneration(!0);
        },
        changeGeneration: function(e) {
          return e && (this.history.lastOp = this.history.lastSelOp = this.history.lastOrigin = null), this.history.generation;
        },
        isClean: function(e) {
          return this.history.generation == (e || this.cleanGeneration);
        },
        getHistory: function() {
          return {
            done: Gr(this.history.done),
            undone: Gr(this.history.undone)
          };
        },
        setHistory: function(e) {
          var t = this.history = new $i(this.history);
          t.done = Gr(e.done.slice(0), null, !0), t.undone = Gr(e.undone.slice(0), null, !0);
        },
        setGutterMarker: xt(function(e, t, i) {
          return xi(this, e, "gutter", function(r) {
            var n = r.gutterMarkers || (r.gutterMarkers = {});
            return n[t] = i, !i && p(n) && (r.gutterMarkers = null), !0;
          });
        }),
        clearGutter: xt(function(e) {
          var t = this;
          this.iter(function(i) {
            i.gutterMarkers && i.gutterMarkers[e] && xi(t, i, "gutter", function() {
              return i.gutterMarkers[e] = null, p(i.gutterMarkers) && (i.gutterMarkers = null), !0;
            });
          });
        }),
        lineInfo: function(e) {
          var t;
          if (typeof e == "number") {
            if (!ri(this, e) || (t = e, e = we(this, e), !e))
              return null;
          } else if (t = Ye(e), t == null)
            return null;
          return {
            line: t,
            handle: e,
            text: e.text,
            gutterMarkers: e.gutterMarkers,
            textClass: e.textClass,
            bgClass: e.bgClass,
            wrapClass: e.wrapClass,
            widgets: e.widgets
          };
        },
        addLineClass: xt(function(e, t, i) {
          return xi(this, e, t == "gutter" ? "gutter" : "class", function(r) {
            var n = t == "text" ? "textClass" : t == "background" ? "bgClass" : t == "gutter" ? "gutterClass" : "wrapClass";
            if (!r[n])
              r[n] = i;
            else {
              if (ae(i).test(r[n]))
                return !1;
              r[n] += " " + i;
            }
            return !0;
          });
        }),
        removeLineClass: xt(function(e, t, i) {
          return xi(this, e, t == "gutter" ? "gutter" : "class", function(r) {
            var n = t == "text" ? "textClass" : t == "background" ? "bgClass" : t == "gutter" ? "gutterClass" : "wrapClass", a = r[n];
            if (a)
              if (i == null)
                r[n] = null;
              else {
                var o = a.match(ae(i));
                if (!o)
                  return !1;
                var u = o.index + o[0].length;
                r[n] = a.slice(0, o.index) + (!o.index || u == a.length ? "" : " ") + a.slice(u) || null;
              }
            else return !1;
            return !0;
          });
        }),
        addLineWidget: xt(function(e, t, i) {
          return cs(this, e, t, i);
        }),
        removeLineWidget: function(e) {
          e.clear();
        },
        markText: function(e, t, i) {
          return Yr(this, Oe(this, e), Oe(this, t), i, i && i.type || "range");
        },
        setBookmark: function(e, t) {
          var i = {
            replacedWith: t && (t.nodeType == null ? t.widget : t),
            insertLeft: t && t.insertLeft,
            clearWhenEmpty: !1,
            shared: t && t.shared,
            handleMouseEvents: t && t.handleMouseEvents
          };
          return e = Oe(this, e), Yr(this, e, e, i, "bookmark");
        },
        findMarksAt: function(e) {
          e = Oe(this, e);
          var t = [], i = we(this, e.line).markedSpans;
          if (i)
            for (var r = 0; r < i.length; ++r) {
              var n = i[r];
              (n.from == null || n.from <= e.ch) && (n.to == null || n.to >= e.ch) && t.push(n.marker.parent || n.marker);
            }
          return t;
        },
        findMarks: function(e, t, i) {
          e = Oe(this, e), t = Oe(this, t);
          var r = [], n = e.line;
          return this.iter(e.line, t.line + 1, function(a) {
            var o = a.markedSpans;
            if (o)
              for (var u = 0; u < o.length; u++) {
                var s = o[u];
                !(s.to != null && n == e.line && e.ch >= s.to || s.from == null && n != e.line || s.from != null && n == t.line && s.from >= t.ch) && (!i || i(s.marker)) && r.push(s.marker.parent || s.marker);
              }
            ++n;
          }), r;
        },
        getAllMarks: function() {
          var e = [];
          return this.iter(function(t) {
            var i = t.markedSpans;
            if (i)
              for (var r = 0; r < i.length; ++r)
                i[r].from != null && e.push(i[r].marker);
          }), e;
        },
        posFromIndex: function(e) {
          var t, i = this.first, r = this.lineSeparator().length;
          return this.iter(function(n) {
            var a = n.text.length + r;
            if (a > e)
              return t = e, !0;
            e -= a, ++i;
          }), Oe(this, J(i, t));
        },
        indexFromPos: function(e) {
          e = Oe(this, e);
          var t = e.ch;
          if (e.line < this.first || e.ch < 0)
            return 0;
          var i = this.lineSeparator().length;
          return this.iter(this.first, e.line, function(r) {
            t += r.text.length + i;
          }), t;
        },
        copy: function(e) {
          var t = new Bt(
            vn(this, this.first, this.first + this.size),
            this.modeOption,
            this.first,
            this.lineSep,
            this.direction
          );
          return t.scrollTop = this.scrollTop, t.scrollLeft = this.scrollLeft, t.sel = this.sel, t.extend = !1, e && (t.history.undoDepth = this.history.undoDepth, t.setHistory(this.getHistory())), t;
        },
        linkedDoc: function(e) {
          e || (e = {});
          var t = this.first, i = this.first + this.size;
          e.from != null && e.from > t && (t = e.from), e.to != null && e.to < i && (i = e.to);
          var r = new Bt(vn(this, t, i), e.mode || this.modeOption, t, this.lineSep, this.direction);
          return e.sharedHist && (r.history = this.history), (this.linked || (this.linked = [])).push({ doc: r, sharedHist: e.sharedHist }), r.linked = [{ doc: this, isParent: !0, sharedHist: e.sharedHist }], ds(r, jo(this)), r;
        },
        unlinkDoc: function(e) {
          if (e instanceof tt && (e = e.doc), this.linked)
            for (var t = 0; t < this.linked.length; ++t) {
              var i = this.linked[t];
              if (i.doc == e) {
                this.linked.splice(t, 1), e.unlinkDoc(this), ps(jo(this));
                break;
              }
            }
          if (e.history == this.history) {
            var r = [e.id];
            gr(e, function(n) {
              return r.push(n.id);
            }, !0), e.history = new $i(null), e.history.done = Gr(this.history.done, r), e.history.undone = Gr(this.history.undone, r);
          }
        },
        iterLinkedDocs: function(e) {
          gr(this, e);
        },
        getMode: function() {
          return this.mode;
        },
        getEditor: function() {
          return this.cm;
        },
        splitLines: function(e) {
          return this.lineSep ? e.split(this.lineSep) : yr(e);
        },
        lineSeparator: function() {
          return this.lineSep || `
`;
        },
        setDirection: xt(function(e) {
          e != "rtl" && (e = "ltr"), e != this.direction && (this.direction = e, this.iter(function(t) {
            return t.order = null;
          }), this.cm && is(this.cm));
        })
      }), Bt.prototype.eachLine = Bt.prototype.iter;
      var Ko = 0;
      function vs(e) {
        var t = this;
        if (Xo(t), !(ce(t, e) || rr(t.display, e))) {
          Ae(e), B && (Ko = +/* @__PURE__ */ new Date());
          var i = Ar(t, e, !0), r = e.dataTransfer.files;
          if (!(!i || t.isReadOnly()))
            if (r && r.length && window.FileReader && window.File)
              for (var n = r.length, a = Array(n), o = 0, u = function() {
                ++o == n && mt(t, function() {
                  i = Oe(t.doc, i);
                  var A = {
                    from: i,
                    to: i,
                    text: t.doc.splitLines(
                      a.filter(function(q) {
                        return q != null;
                      }).join(t.doc.lineSeparator())
                    ),
                    origin: "paste"
                  };
                  Kr(t.doc, A), Bo(t.doc, dr(Oe(t.doc, i), Oe(t.doc, pr(A))));
                })();
              }, s = function(A, q) {
                if (t.options.allowDropFileTypes && We(t.options.allowDropFileTypes, A.type) == -1) {
                  u();
                  return;
                }
                var Y = new FileReader();
                Y.onerror = function() {
                  return u();
                }, Y.onload = function() {
                  var V = Y.result;
                  if (/[\x00-\x08\x0e-\x1f]{2}/.test(V)) {
                    u();
                    return;
                  }
                  a[q] = V, u();
                }, Y.readAsText(A);
              }, f = 0; f < r.length; f++)
                s(r[f], f);
            else {
              if (t.state.draggingText && t.doc.sel.contains(i) > -1) {
                t.state.draggingText(e), setTimeout(function() {
                  return t.display.input.focus();
                }, 20);
                return;
              }
              try {
                var v = e.dataTransfer.getData("Text");
                if (v) {
                  var y;
                  if (t.state.draggingText && !t.state.draggingText.copy && (y = t.listSelections()), en(t.doc, dr(i, i)), y)
                    for (var T = 0; T < y.length; ++T)
                      Xr(t.doc, "", y[T].anchor, y[T].head, "drag");
                  t.replaceSelection(v, "around", "paste"), t.display.input.focus();
                }
              } catch {
              }
            }
        }
      }
      function ms(e, t) {
        if (B && (!e.state.draggingText || +/* @__PURE__ */ new Date() - Ko < 100)) {
          Ge(t);
          return;
        }
        if (!(ce(e, t) || rr(e.display, t)) && (t.dataTransfer.setData("Text", e.getSelection()), t.dataTransfer.effectAllowed = "copyMove", t.dataTransfer.setDragImage && !Se)) {
          var i = L("img", null, null, "position: fixed; left: 0; top: 0;");
          i.src = "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==", ne && (i.width = i.height = 1, e.display.wrapper.appendChild(i), i._top = i.offsetTop), t.dataTransfer.setDragImage(i, 0, 0), ne && i.parentNode.removeChild(i);
        }
      }
      function xs(e, t) {
        var i = Ar(e, t);
        if (i) {
          var r = document.createDocumentFragment();
          Pn(e, i, r), e.display.dragCursor || (e.display.dragCursor = L("div", null, "CodeMirror-cursors CodeMirror-dragcursors"), e.display.lineSpace.insertBefore(e.display.dragCursor, e.display.cursorDiv)), Ne(e.display.dragCursor, r);
        }
      }
      function Xo(e) {
        e.display.dragCursor && (e.display.lineSpace.removeChild(e.display.dragCursor), e.display.dragCursor = null);
      }
      function Yo(e) {
        if (document.getElementsByClassName) {
          for (var t = document.getElementsByClassName("CodeMirror"), i = [], r = 0; r < t.length; r++) {
            var n = t[r].CodeMirror;
            n && i.push(n);
          }
          i.length && i[0].operation(function() {
            for (var a = 0; a < i.length; a++)
              e(i[a]);
          });
        }
      }
      var Zo = !1;
      function ys() {
        Zo || (Ds(), Zo = !0);
      }
      function Ds() {
        var e;
        x(window, "resize", function() {
          e == null && (e = setTimeout(function() {
            e = null, Yo(bs);
          }, 100));
        }), x(window, "blur", function() {
          return Yo(_r);
        });
      }
      function bs(e) {
        var t = e.display;
        t.cachedCharWidth = t.cachedTextHeight = t.cachedPaddingH = null, t.scrollbarsClipped = !1, e.setSize();
      }
      for (var mr = {
        3: "Pause",
        8: "Backspace",
        9: "Tab",
        13: "Enter",
        16: "Shift",
        17: "Ctrl",
        18: "Alt",
        19: "Pause",
        20: "CapsLock",
        27: "Esc",
        32: "Space",
        33: "PageUp",
        34: "PageDown",
        35: "End",
        36: "Home",
        37: "Left",
        38: "Up",
        39: "Right",
        40: "Down",
        44: "PrintScrn",
        45: "Insert",
        46: "Delete",
        59: ";",
        61: "=",
        91: "Mod",
        92: "Mod",
        93: "Mod",
        106: "*",
        107: "=",
        109: "-",
        110: ".",
        111: "/",
        145: "ScrollLock",
        173: "-",
        186: ";",
        187: "=",
        188: ",",
        189: "-",
        190: ".",
        191: "/",
        192: "`",
        219: "[",
        220: "\\",
        221: "]",
        222: "'",
        224: "Mod",
        63232: "Up",
        63233: "Down",
        63234: "Left",
        63235: "Right",
        63272: "Delete",
        63273: "Home",
        63275: "End",
        63276: "PageUp",
        63277: "PageDown",
        63302: "Insert"
      }, wi = 0; wi < 10; wi++)
        mr[wi + 48] = mr[wi + 96] = String(wi);
      for (var nn = 65; nn <= 90; nn++)
        mr[nn] = String.fromCharCode(nn);
      for (var ki = 1; ki <= 12; ki++)
        mr[ki + 111] = mr[ki + 63235] = "F" + ki;
      var nr = {};
      nr.basic = {
        Left: "goCharLeft",
        Right: "goCharRight",
        Up: "goLineUp",
        Down: "goLineDown",
        End: "goLineEnd",
        Home: "goLineStartSmart",
        PageUp: "goPageUp",
        PageDown: "goPageDown",
        Delete: "delCharAfter",
        Backspace: "delCharBefore",
        "Shift-Backspace": "delCharBefore",
        Tab: "defaultTab",
        "Shift-Tab": "indentAuto",
        Enter: "newlineAndIndent",
        Insert: "toggleOverwrite",
        Esc: "singleSelection"
      }, nr.pcDefault = {
        "Ctrl-A": "selectAll",
        "Ctrl-D": "deleteLine",
        "Ctrl-Z": "undo",
        "Shift-Ctrl-Z": "redo",
        "Ctrl-Y": "redo",
        "Ctrl-Home": "goDocStart",
        "Ctrl-End": "goDocEnd",
        "Ctrl-Up": "goLineUp",
        "Ctrl-Down": "goLineDown",
        "Ctrl-Left": "goGroupLeft",
        "Ctrl-Right": "goGroupRight",
        "Alt-Left": "goLineStart",
        "Alt-Right": "goLineEnd",
        "Ctrl-Backspace": "delGroupBefore",
        "Ctrl-Delete": "delGroupAfter",
        "Ctrl-S": "save",
        "Ctrl-F": "find",
        "Ctrl-G": "findNext",
        "Shift-Ctrl-G": "findPrev",
        "Shift-Ctrl-F": "replace",
        "Shift-Ctrl-R": "replaceAll",
        "Ctrl-[": "indentLess",
        "Ctrl-]": "indentMore",
        "Ctrl-U": "undoSelection",
        "Shift-Ctrl-U": "redoSelection",
        "Alt-U": "redoSelection",
        fallthrough: "basic"
      }, nr.emacsy = {
        "Ctrl-F": "goCharRight",
        "Ctrl-B": "goCharLeft",
        "Ctrl-P": "goLineUp",
        "Ctrl-N": "goLineDown",
        "Ctrl-A": "goLineStart",
        "Ctrl-E": "goLineEnd",
        "Ctrl-V": "goPageDown",
        "Shift-Ctrl-V": "goPageUp",
        "Ctrl-D": "delCharAfter",
        "Ctrl-H": "delCharBefore",
        "Alt-Backspace": "delWordBefore",
        "Ctrl-K": "killLine",
        "Ctrl-T": "transposeChars",
        "Ctrl-O": "openLine"
      }, nr.macDefault = {
        "Cmd-A": "selectAll",
        "Cmd-D": "deleteLine",
        "Cmd-Z": "undo",
        "Shift-Cmd-Z": "redo",
        "Cmd-Y": "redo",
        "Cmd-Home": "goDocStart",
        "Cmd-Up": "goDocStart",
        "Cmd-End": "goDocEnd",
        "Cmd-Down": "goDocEnd",
        "Alt-Left": "goGroupLeft",
        "Alt-Right": "goGroupRight",
        "Cmd-Left": "goLineLeft",
        "Cmd-Right": "goLineRight",
        "Alt-Backspace": "delGroupBefore",
        "Ctrl-Alt-Backspace": "delGroupAfter",
        "Alt-Delete": "delGroupAfter",
        "Cmd-S": "save",
        "Cmd-F": "find",
        "Cmd-G": "findNext",
        "Shift-Cmd-G": "findPrev",
        "Cmd-Alt-F": "replace",
        "Shift-Cmd-Alt-F": "replaceAll",
        "Cmd-[": "indentLess",
        "Cmd-]": "indentMore",
        "Cmd-Backspace": "delWrappedLineLeft",
        "Cmd-Delete": "delWrappedLineRight",
        "Cmd-U": "undoSelection",
        "Shift-Cmd-U": "redoSelection",
        "Ctrl-Up": "goDocStart",
        "Ctrl-Down": "goDocEnd",
        fallthrough: ["basic", "emacsy"]
      }, nr.default = G ? nr.macDefault : nr.pcDefault;
      function Cs(e) {
        var t = e.split(/-(?!$)/);
        e = t[t.length - 1];
        for (var i, r, n, a, o = 0; o < t.length - 1; o++) {
          var u = t[o];
          if (/^(cmd|meta|m)$/i.test(u))
            a = !0;
          else if (/^a(lt)?$/i.test(u))
            i = !0;
          else if (/^(c|ctrl|control)$/i.test(u))
            r = !0;
          else if (/^s(hift)?$/i.test(u))
            n = !0;
          else
            throw new Error("Unrecognized modifier name: " + u);
        }
        return i && (e = "Alt-" + e), r && (e = "Ctrl-" + e), a && (e = "Cmd-" + e), n && (e = "Shift-" + e), e;
      }
      function ws(e) {
        var t = {};
        for (var i in e)
          if (e.hasOwnProperty(i)) {
            var r = e[i];
            if (/^(name|fallthrough|(de|at)tach)$/.test(i))
              continue;
            if (r == "...") {
              delete e[i];
              continue;
            }
            for (var n = ze(i.split(" "), Cs), a = 0; a < n.length; a++) {
              var o = void 0, u = void 0;
              a == n.length - 1 ? (u = n.join(" "), o = r) : (u = n.slice(0, a + 1).join(" "), o = "...");
              var s = t[u];
              if (!s)
                t[u] = o;
              else if (s != o)
                throw new Error("Inconsistent bindings for " + u);
            }
            delete e[i];
          }
        for (var f in t)
          e[f] = t[f];
        return e;
      }
      function Zr(e, t, i, r) {
        t = an(t);
        var n = t.call ? t.call(e, r) : t[e];
        if (n === !1)
          return "nothing";
        if (n === "...")
          return "multi";
        if (n != null && i(n))
          return "handled";
        if (t.fallthrough) {
          if (Object.prototype.toString.call(t.fallthrough) != "[object Array]")
            return Zr(e, t.fallthrough, i, r);
          for (var a = 0; a < t.fallthrough.length; a++) {
            var o = Zr(e, t.fallthrough[a], i, r);
            if (o)
              return o;
          }
        }
      }
      function Qo(e) {
        var t = typeof e == "string" ? e : mr[e.keyCode];
        return t == "Ctrl" || t == "Alt" || t == "Shift" || t == "Mod";
      }
      function $o(e, t, i) {
        var r = e;
        return t.altKey && r != "Alt" && (e = "Alt-" + e), (ye ? t.metaKey : t.ctrlKey) && r != "Ctrl" && (e = "Ctrl-" + e), (ye ? t.ctrlKey : t.metaKey) && r != "Mod" && (e = "Cmd-" + e), !i && t.shiftKey && r != "Shift" && (e = "Shift-" + e), e;
      }
      function Jo(e, t) {
        if (ne && e.keyCode == 34 && e.char)
          return !1;
        var i = mr[e.keyCode];
        return i == null || e.altGraphKey ? !1 : (e.keyCode == 3 && e.code && (i = e.code), $o(i, e, t));
      }
      function an(e) {
        return typeof e == "string" ? nr[e] : e;
      }
      function Qr(e, t) {
        for (var i = e.doc.sel.ranges, r = [], n = 0; n < i.length; n++) {
          for (var a = t(i[n]); r.length && Me(a.from, Pe(r).to) <= 0; ) {
            var o = r.pop();
            if (Me(o.from, a.from) < 0) {
              a.from = o.from;
              break;
            }
          }
          r.push(a);
        }
        Ht(e, function() {
          for (var u = r.length - 1; u >= 0; u--)
            Xr(e.doc, "", r[u].from, r[u].to, "+delete");
          qr(e);
        });
      }
      function ta(e, t, i) {
        var r = l(e.text, t + i, i);
        return r < 0 || r > e.text.length ? null : r;
      }
      function ra(e, t, i) {
        var r = ta(e, t.ch, i);
        return r == null ? null : new J(t.line, r, i < 0 ? "after" : "before");
      }
      function ia(e, t, i, r, n) {
        if (e) {
          t.doc.direction == "rtl" && (n = -n);
          var a = b(i, t.doc.direction);
          if (a) {
            var o = n < 0 ? Pe(a) : a[0], u = n < 0 == (o.level == 1), s = u ? "after" : "before", f;
            if (o.level > 0 || t.doc.direction == "rtl") {
              var v = Pr(t, i);
              f = n < 0 ? i.text.length - 1 : 0;
              var y = Qt(t, v, f).top;
              f = d(function(T) {
                return Qt(t, v, T).top == y;
              }, n < 0 == (o.level == 1) ? o.from : o.to - 1, f), s == "before" && (f = ta(i, f, 1));
            } else
              f = n < 0 ? o.to : o.from;
            return new J(r, f, s);
          }
        }
        return new J(r, n < 0 ? i.text.length : 0, n < 0 ? "before" : "after");
      }
      function ks(e, t, i, r) {
        var n = b(t, e.doc.direction);
        if (!n)
          return ra(t, i, r);
        i.ch >= t.text.length ? (i.ch = t.text.length, i.sticky = "before") : i.ch <= 0 && (i.ch = 0, i.sticky = "after");
        var a = k(n, i.ch, i.sticky), o = n[a];
        if (e.doc.direction == "ltr" && o.level % 2 == 0 && (r > 0 ? o.to > i.ch : o.from < i.ch))
          return ra(t, i, r);
        var u = function(oe, pe) {
          return ta(t, oe instanceof J ? oe.ch : oe, pe);
        }, s, f = function(oe) {
          return e.options.lineWrapping ? (s = s || Pr(e, t), ro(e, t, s, oe)) : { begin: 0, end: t.text.length };
        }, v = f(i.sticky == "before" ? u(i, -1) : i.ch);
        if (e.doc.direction == "rtl" || o.level == 1) {
          var y = o.level == 1 == r < 0, T = u(i, y ? 1 : -1);
          if (T != null && (y ? T <= o.to && T <= v.end : T >= o.from && T >= v.begin)) {
            var A = y ? "before" : "after";
            return new J(i.line, T, A);
          }
        }
        var q = function(oe, pe, le) {
          for (var ve = function(Qe, yt) {
            return yt ? new J(i.line, u(Qe, 1), "before") : new J(i.line, Qe, "after");
          }; oe >= 0 && oe < n.length; oe += pe) {
            var Fe = n[oe], ke = pe > 0 == (Fe.level != 1), Re = ke ? le.begin : u(le.end, -1);
            if (Fe.from <= Re && Re < Fe.to || (Re = ke ? Fe.from : u(Fe.to, -1), le.begin <= Re && Re < le.end))
              return ve(Re, ke);
          }
        }, Y = q(a + r, r, v);
        if (Y)
          return Y;
        var V = r > 0 ? v.end : u(v.begin, -1);
        return V != null && !(r > 0 && V == t.text.length) && (Y = q(r > 0 ? 0 : n.length - 1, r, f(V)), Y) ? Y : null;
      }
      var Si = {
        selectAll: Ho,
        singleSelection: function(e) {
          return e.setSelection(e.getCursor("anchor"), e.getCursor("head"), st);
        },
        killLine: function(e) {
          return Qr(e, function(t) {
            if (t.empty()) {
              var i = we(e.doc, t.head.line).text.length;
              return t.head.ch == i && t.head.line < e.lastLine() ? { from: t.head, to: J(t.head.line + 1, 0) } : { from: t.head, to: J(t.head.line, i) };
            } else
              return { from: t.from(), to: t.to() };
          });
        },
        deleteLine: function(e) {
          return Qr(e, function(t) {
            return {
              from: J(t.from().line, 0),
              to: Oe(e.doc, J(t.to().line + 1, 0))
            };
          });
        },
        delLineLeft: function(e) {
          return Qr(e, function(t) {
            return {
              from: J(t.from().line, 0),
              to: t.from()
            };
          });
        },
        delWrappedLineLeft: function(e) {
          return Qr(e, function(t) {
            var i = e.charCoords(t.head, "div").top + 5, r = e.coordsChar({ left: 0, top: i }, "div");
            return { from: r, to: t.from() };
          });
        },
        delWrappedLineRight: function(e) {
          return Qr(e, function(t) {
            var i = e.charCoords(t.head, "div").top + 5, r = e.coordsChar({ left: e.display.lineDiv.offsetWidth + 100, top: i }, "div");
            return { from: t.from(), to: r };
          });
        },
        undo: function(e) {
          return e.undo();
        },
        redo: function(e) {
          return e.redo();
        },
        undoSelection: function(e) {
          return e.undoSelection();
        },
        redoSelection: function(e) {
          return e.redoSelection();
        },
        goDocStart: function(e) {
          return e.extendSelection(J(e.firstLine(), 0));
        },
        goDocEnd: function(e) {
          return e.extendSelection(J(e.lastLine()));
        },
        goLineStart: function(e) {
          return e.extendSelectionsBy(
            function(t) {
              return Vo(e, t.head.line);
            },
            { origin: "+move", bias: 1 }
          );
        },
        goLineStartSmart: function(e) {
          return e.extendSelectionsBy(
            function(t) {
              return el(e, t.head);
            },
            { origin: "+move", bias: 1 }
          );
        },
        goLineEnd: function(e) {
          return e.extendSelectionsBy(
            function(t) {
              return Ss(e, t.head.line);
            },
            { origin: "+move", bias: -1 }
          );
        },
        goLineRight: function(e) {
          return e.extendSelectionsBy(function(t) {
            var i = e.cursorCoords(t.head, "div").top + 5;
            return e.coordsChar({ left: e.display.lineDiv.offsetWidth + 100, top: i }, "div");
          }, It);
        },
        goLineLeft: function(e) {
          return e.extendSelectionsBy(function(t) {
            var i = e.cursorCoords(t.head, "div").top + 5;
            return e.coordsChar({ left: 0, top: i }, "div");
          }, It);
        },
        goLineLeftSmart: function(e) {
          return e.extendSelectionsBy(function(t) {
            var i = e.cursorCoords(t.head, "div").top + 5, r = e.coordsChar({ left: 0, top: i }, "div");
            return r.ch < e.getLine(r.line).search(/\S/) ? el(e, t.head) : r;
          }, It);
        },
        goLineUp: function(e) {
          return e.moveV(-1, "line");
        },
        goLineDown: function(e) {
          return e.moveV(1, "line");
        },
        goPageUp: function(e) {
          return e.moveV(-1, "page");
        },
        goPageDown: function(e) {
          return e.moveV(1, "page");
        },
        goCharLeft: function(e) {
          return e.moveH(-1, "char");
        },
        goCharRight: function(e) {
          return e.moveH(1, "char");
        },
        goColumnLeft: function(e) {
          return e.moveH(-1, "column");
        },
        goColumnRight: function(e) {
          return e.moveH(1, "column");
        },
        goWordLeft: function(e) {
          return e.moveH(-1, "word");
        },
        goGroupRight: function(e) {
          return e.moveH(1, "group");
        },
        goGroupLeft: function(e) {
          return e.moveH(-1, "group");
        },
        goWordRight: function(e) {
          return e.moveH(1, "word");
        },
        delCharBefore: function(e) {
          return e.deleteH(-1, "codepoint");
        },
        delCharAfter: function(e) {
          return e.deleteH(1, "char");
        },
        delWordBefore: function(e) {
          return e.deleteH(-1, "word");
        },
        delWordAfter: function(e) {
          return e.deleteH(1, "word");
        },
        delGroupBefore: function(e) {
          return e.deleteH(-1, "group");
        },
        delGroupAfter: function(e) {
          return e.deleteH(1, "group");
        },
        indentAuto: function(e) {
          return e.indentSelection("smart");
        },
        indentMore: function(e) {
          return e.indentSelection("add");
        },
        indentLess: function(e) {
          return e.indentSelection("subtract");
        },
        insertTab: function(e) {
          return e.replaceSelection("	");
        },
        insertSoftTab: function(e) {
          for (var t = [], i = e.listSelections(), r = e.options.tabSize, n = 0; n < i.length; n++) {
            var a = i[n].from(), o = Ke(e.getLine(a.line), a.ch, r);
            t.push(dt(r - o % r));
          }
          e.replaceSelections(t);
        },
        defaultTab: function(e) {
          e.somethingSelected() ? e.indentSelection("add") : e.execCommand("insertTab");
        },
        // Swap the two chars left and right of each selection's head.
        // Move cursor behind the two swapped characters afterwards.
        //
        // Doesn't consider line feeds a character.
        // Doesn't scan more than one line above to find a character.
        // Doesn't do anything on an empty line.
        // Doesn't do anything with non-empty selections.
        transposeChars: function(e) {
          return Ht(e, function() {
            for (var t = e.listSelections(), i = [], r = 0; r < t.length; r++)
              if (t[r].empty()) {
                var n = t[r].head, a = we(e.doc, n.line).text;
                if (a) {
                  if (n.ch == a.length && (n = new J(n.line, n.ch - 1)), n.ch > 0)
                    n = new J(n.line, n.ch + 1), e.replaceRange(
                      a.charAt(n.ch - 1) + a.charAt(n.ch - 2),
                      J(n.line, n.ch - 2),
                      n,
                      "+transpose"
                    );
                  else if (n.line > e.doc.first) {
                    var o = we(e.doc, n.line - 1).text;
                    o && (n = new J(n.line, 1), e.replaceRange(
                      a.charAt(0) + e.doc.lineSeparator() + o.charAt(o.length - 1),
                      J(n.line - 1, o.length - 1),
                      n,
                      "+transpose"
                    ));
                  }
                }
                i.push(new je(n, n));
              }
            e.setSelections(i);
          });
        },
        newlineAndIndent: function(e) {
          return Ht(e, function() {
            for (var t = e.listSelections(), i = t.length - 1; i >= 0; i--)
              e.replaceRange(e.doc.lineSeparator(), t[i].anchor, t[i].head, "+input");
            t = e.listSelections();
            for (var r = 0; r < t.length; r++)
              e.indentLine(t[r].from().line, null, !0);
            qr(e);
          });
        },
        openLine: function(e) {
          return e.replaceSelection(`
`, "start");
        },
        toggleOverwrite: function(e) {
          return e.toggleOverwrite();
        }
      };
      function Vo(e, t) {
        var i = we(e.doc, t), r = qt(i);
        return r != i && (t = Ye(r)), ia(!0, e, r, t, 1);
      }
      function Ss(e, t) {
        var i = we(e.doc, t), r = uu(i);
        return r != i && (t = Ye(r)), ia(!0, e, i, t, -1);
      }
      function el(e, t) {
        var i = Vo(e, t.line), r = we(e.doc, i.line), n = b(r, e.doc.direction);
        if (!n || n[0].level == 0) {
          var a = Math.max(i.ch, r.text.search(/\S/)), o = t.line == i.line && t.ch <= a && t.ch;
          return J(i.line, o ? 0 : a, i.sticky);
        }
        return i;
      }
      function on(e, t, i) {
        if (typeof t == "string" && (t = Si[t], !t))
          return !1;
        e.display.input.ensurePolled();
        var r = e.display.shift, n = !1;
        try {
          e.isReadOnly() && (e.state.suppressEdits = !0), i && (e.display.shift = !1), n = t(e) != Je;
        } finally {
          e.display.shift = r, e.state.suppressEdits = !1;
        }
        return n;
      }
      function Fs(e, t, i) {
        for (var r = 0; r < e.state.keyMaps.length; r++) {
          var n = Zr(t, e.state.keyMaps[r], i, e);
          if (n)
            return n;
        }
        return e.options.extraKeys && Zr(t, e.options.extraKeys, i, e) || Zr(t, e.options.keyMap, i, e);
      }
      var As = new Ve();
      function Fi(e, t, i, r) {
        var n = e.state.keySeq;
        if (n) {
          if (Qo(t))
            return "handled";
          if (/\'$/.test(t) ? e.state.keySeq = null : As.set(50, function() {
            e.state.keySeq == n && (e.state.keySeq = null, e.display.input.reset());
          }), tl(e, n + " " + t, i, r))
            return !0;
        }
        return tl(e, t, i, r);
      }
      function tl(e, t, i, r) {
        var n = Fs(e, t, r);
        return n == "multi" && (e.state.keySeq = t), n == "handled" && vt(e, "keyHandled", e, t, i), (n == "handled" || n == "multi") && (Ae(i), zn(e)), !!n;
      }
      function rl(e, t) {
        var i = Jo(t, !0);
        return i ? t.shiftKey && !e.state.keySeq ? Fi(e, "Shift-" + i, t, function(r) {
          return on(e, r, !0);
        }) || Fi(e, i, t, function(r) {
          if (typeof r == "string" ? /^go[A-Z]/.test(r) : r.motion)
            return on(e, r);
        }) : Fi(e, i, t, function(r) {
          return on(e, r);
        }) : !1;
      }
      function Es(e, t, i) {
        return Fi(e, "'" + i + "'", t, function(r) {
          return on(e, r, !0);
        });
      }
      var na = null;
      function il(e) {
        var t = this;
        if (!(e.target && e.target != t.display.input.getField()) && (t.curOp.focus = Ue(j(t)), !ce(t, e))) {
          B && z < 11 && e.keyCode == 27 && (e.returnValue = !1);
          var i = e.keyCode;
          t.display.shift = i == 16 || e.shiftKey;
          var r = rl(t, e);
          ne && (na = r ? i : null, !r && i == 88 && !pn && (G ? e.metaKey : e.ctrlKey) && t.replaceSelection("", null, "cut")), M && !G && !r && i == 46 && e.shiftKey && !e.ctrlKey && document.execCommand && document.execCommand("cut"), i == 18 && !/\bCodeMirror-crosshair\b/.test(t.display.lineDiv.className) && Ls(t);
        }
      }
      function Ls(e) {
        var t = e.display.lineDiv;
        it(t, "CodeMirror-crosshair");
        function i(r) {
          (r.keyCode == 18 || !r.altKey) && (Le(t, "CodeMirror-crosshair"), ie(document, "keyup", i), ie(document, "mouseover", i));
        }
        x(document, "keyup", i), x(document, "mouseover", i);
      }
      function nl(e) {
        e.keyCode == 16 && (this.doc.sel.shift = !1), ce(this, e);
      }
      function al(e) {
        var t = this;
        if (!(e.target && e.target != t.display.input.getField()) && !(rr(t.display, e) || ce(t, e) || e.ctrlKey && !e.altKey || G && e.metaKey)) {
          var i = e.keyCode, r = e.charCode;
          if (ne && i == na) {
            na = null, Ae(e);
            return;
          }
          if (!(ne && (!e.which || e.which < 10) && rl(t, e))) {
            var n = String.fromCharCode(r ?? i);
            n != "\b" && (Es(t, e, n) || t.display.input.onKeyPress(e));
          }
        }
      }
      var Ts = 400, aa = function(e, t, i) {
        this.time = e, this.pos = t, this.button = i;
      };
      aa.prototype.compare = function(e, t, i) {
        return this.time + Ts > e && Me(t, this.pos) == 0 && i == this.button;
      };
      var Ai, Ei;
      function Bs(e, t) {
        var i = +/* @__PURE__ */ new Date();
        return Ei && Ei.compare(i, e, t) ? (Ai = Ei = null, "triple") : Ai && Ai.compare(i, e, t) ? (Ei = new aa(i, e, t), Ai = null, "double") : (Ai = new aa(i, e, t), Ei = null, "single");
      }
      function ol(e) {
        var t = this, i = t.display;
        if (!(ce(t, e) || i.activeTouch && i.input.supportsTouch())) {
          if (i.input.ensurePolled(), i.shift = e.shiftKey, rr(i, e)) {
            te || (i.scroller.draggable = !1, setTimeout(function() {
              return i.scroller.draggable = !0;
            }, 100));
            return;
          }
          if (!oa(t, e)) {
            var r = Ar(t, e), n = at(e), a = r ? Bs(r, n) : "single";
            Te(t).focus(), n == 1 && t.state.selectingText && t.state.selectingText(e), !(r && Ms(t, n, r, a, e)) && (n == 1 ? r ? Ns(t, r, a, e) : lt(e) == i.scroller && Ae(e) : n == 2 ? (r && Vi(t.doc, r), setTimeout(function() {
              return i.input.focus();
            }, 20)) : n == 3 && (Xe ? t.display.input.onContextMenu(e) : Wn(t)));
          }
        }
      }
      function Ms(e, t, i, r, n) {
        var a = "Click";
        return r == "double" ? a = "Double" + a : r == "triple" && (a = "Triple" + a), a = (t == 1 ? "Left" : t == 2 ? "Middle" : "Right") + a, Fi(e, $o(a, n), n, function(o) {
          if (typeof o == "string" && (o = Si[o]), !o)
            return !1;
          var u = !1;
          try {
            e.isReadOnly() && (e.state.suppressEdits = !0), u = o(e, i) != Je;
          } finally {
            e.state.suppressEdits = !1;
          }
          return u;
        });
      }
      function Os(e, t, i) {
        var r = e.getOption("configureMouse"), n = r ? r(e, t, i) : {};
        if (n.unit == null) {
          var a = se ? i.shiftKey && i.metaKey : i.altKey;
          n.unit = a ? "rectangle" : t == "single" ? "char" : t == "double" ? "word" : "line";
        }
        return (n.extend == null || e.doc.extend) && (n.extend = e.doc.extend || i.shiftKey), n.addNew == null && (n.addNew = G ? i.metaKey : i.ctrlKey), n.moveOnDrag == null && (n.moveOnDrag = !(G ? i.altKey : i.ctrlKey)), n;
      }
      function Ns(e, t, i, r) {
        B ? setTimeout($e(oo, e), 0) : e.curOp.focus = Ue(j(e));
        var n = Os(e, i, r), a = e.doc.sel, o;
        e.options.dragDrop && Kt && !e.isReadOnly() && i == "single" && (o = a.contains(t)) > -1 && (Me((o = a.ranges[o]).from(), t) < 0 || t.xRel > 0) && (Me(o.to(), t) > 0 || t.xRel < 0) ? Is(e, r, t, n) : Hs(e, r, t, n);
      }
      function Is(e, t, i, r) {
        var n = e.display, a = !1, o = mt(e, function(f) {
          te && (n.scroller.draggable = !1), e.state.draggingText = !1, e.state.delayingBlurEvent && (e.hasFocus() ? e.state.delayingBlurEvent = !1 : Wn(e)), ie(n.wrapper.ownerDocument, "mouseup", o), ie(n.wrapper.ownerDocument, "mousemove", u), ie(n.scroller, "dragstart", s), ie(n.scroller, "drop", o), a || (Ae(f), r.addNew || Vi(e.doc, i, null, null, r.extend), te && !Se || B && z == 9 ? setTimeout(function() {
            n.wrapper.ownerDocument.body.focus({ preventScroll: !0 }), n.input.focus();
          }, 20) : n.input.focus());
        }), u = function(f) {
          a = a || Math.abs(t.clientX - f.clientX) + Math.abs(t.clientY - f.clientY) >= 10;
        }, s = function() {
          return a = !0;
        };
        te && (n.scroller.draggable = !0), e.state.draggingText = o, o.copy = !r.moveOnDrag, x(n.wrapper.ownerDocument, "mouseup", o), x(n.wrapper.ownerDocument, "mousemove", u), x(n.scroller, "dragstart", s), x(n.scroller, "drop", o), e.state.delayingBlurEvent = !0, setTimeout(function() {
          return n.input.focus();
        }, 20), n.scroller.dragDrop && n.scroller.dragDrop();
      }
      function ll(e, t, i) {
        if (i == "char")
          return new je(t, t);
        if (i == "word")
          return e.findWordAt(t);
        if (i == "line")
          return new je(J(t.line, 0), Oe(e.doc, J(t.line + 1, 0)));
        var r = i(e, t);
        return new je(r.from, r.to);
      }
      function Hs(e, t, i, r) {
        B && Wn(e);
        var n = e.display, a = e.doc;
        Ae(t);
        var o, u, s = a.sel, f = s.ranges;
        if (r.addNew && !r.extend ? (u = a.sel.contains(i), u > -1 ? o = f[u] : o = new je(i, i)) : (o = a.sel.primary(), u = a.sel.primIndex), r.unit == "rectangle")
          r.addNew || (o = new je(i, i)), i = Ar(e, t, !0, !0), u = -1;
        else {
          var v = ll(e, i, r.unit);
          r.extend ? o = Vn(o, v.anchor, v.head, r.extend) : o = v;
        }
        r.addNew ? u == -1 ? (u = f.length, kt(
          a,
          Gt(e, f.concat([o]), u),
          { scroll: !1, origin: "*mouse" }
        )) : f.length > 1 && f[u].empty() && r.unit == "char" && !r.extend ? (kt(
          a,
          Gt(e, f.slice(0, u).concat(f.slice(u + 1)), 0),
          { scroll: !1, origin: "*mouse" }
        ), s = a.sel) : ea(a, u, o, Ce) : (u = 0, kt(a, new Wt([o], 0), Ce), s = a.sel);
        var y = i;
        function T(le) {
          if (Me(y, le) != 0)
            if (y = le, r.unit == "rectangle") {
              for (var ve = [], Fe = e.options.tabSize, ke = Ke(we(a, i.line).text, i.ch, Fe), Re = Ke(we(a, le.line).text, le.ch, Fe), Qe = Math.min(ke, Re), yt = Math.max(ke, Re), rt = Math.min(i.line, le.line), Rt = Math.min(e.lastLine(), Math.max(i.line, le.line)); rt <= Rt; rt++) {
                var Mt = we(a, rt).text, ct = wt(Mt, Qe, Fe);
                Qe == yt ? ve.push(new je(J(rt, ct), J(rt, ct))) : Mt.length > ct && ve.push(new je(J(rt, ct), J(rt, wt(Mt, yt, Fe))));
              }
              ve.length || ve.push(new je(i, i)), kt(
                a,
                Gt(e, s.ranges.slice(0, u).concat(ve), u),
                { origin: "*mouse", scroll: !1 }
              ), e.scrollIntoView(le);
            } else {
              var Ot = o, Ct = ll(e, le, r.unit), gt = Ot.anchor, ht;
              Me(Ct.anchor, gt) > 0 ? (ht = Ct.head, gt = Oi(Ot.from(), Ct.anchor)) : (ht = Ct.anchor, gt = Mi(Ot.to(), Ct.head));
              var ot = s.ranges.slice(0);
              ot[u] = Rs(e, new je(Oe(a, gt), ht)), kt(a, Gt(e, ot, u), Ce);
            }
        }
        var A = n.wrapper.getBoundingClientRect(), q = 0;
        function Y(le) {
          var ve = ++q, Fe = Ar(e, le, !0, r.unit == "rectangle");
          if (Fe)
            if (Me(Fe, y) != 0) {
              e.curOp.focus = Ue(j(e)), T(Fe);
              var ke = Xi(n, a);
              (Fe.line >= ke.to || Fe.line < ke.from) && setTimeout(mt(e, function() {
                q == ve && Y(le);
              }), 150);
            } else {
              var Re = le.clientY < A.top ? -20 : le.clientY > A.bottom ? 20 : 0;
              Re && setTimeout(mt(e, function() {
                q == ve && (n.scroller.scrollTop += Re, Y(le));
              }), 50);
            }
        }
        function V(le) {
          e.state.selectingText = !1, q = 1 / 0, le && (Ae(le), n.input.focus()), ie(n.wrapper.ownerDocument, "mousemove", oe), ie(n.wrapper.ownerDocument, "mouseup", pe), a.history.lastSelOrigin = null;
        }
        var oe = mt(e, function(le) {
          le.buttons === 0 || !at(le) ? V(le) : Y(le);
        }), pe = mt(e, V);
        e.state.selectingText = pe, x(n.wrapper.ownerDocument, "mousemove", oe), x(n.wrapper.ownerDocument, "mouseup", pe);
      }
      function Rs(e, t) {
        var i = t.anchor, r = t.head, n = we(e.doc, i.line);
        if (Me(i, r) == 0 && i.sticky == r.sticky)
          return t;
        var a = b(n);
        if (!a)
          return t;
        var o = k(a, i.ch, i.sticky), u = a[o];
        if (u.from != i.ch && u.to != i.ch)
          return t;
        var s = o + (u.from == i.ch == (u.level != 1) ? 0 : 1);
        if (s == 0 || s == a.length)
          return t;
        var f;
        if (r.line != i.line)
          f = (r.line - i.line) * (e.doc.direction == "ltr" ? 1 : -1) > 0;
        else {
          var v = k(a, r.ch, r.sticky), y = v - o || (r.ch - i.ch) * (u.level == 1 ? -1 : 1);
          v == s - 1 || v == s ? f = y < 0 : f = y > 0;
        }
        var T = a[s + (f ? -1 : 0)], A = f == (T.level == 1), q = A ? T.from : T.to, Y = A ? "after" : "before";
        return i.ch == q && i.sticky == Y ? t : new je(new J(i.line, q, Y), r);
      }
      function ul(e, t, i, r) {
        var n, a;
        if (t.touches)
          n = t.touches[0].clientX, a = t.touches[0].clientY;
        else
          try {
            n = t.clientX, a = t.clientY;
          } catch {
            return !1;
          }
        if (n >= Math.floor(e.display.gutters.getBoundingClientRect().right))
          return !1;
        r && Ae(t);
        var o = e.display, u = o.lineDiv.getBoundingClientRect();
        if (a > u.bottom || !Ie(e, i))
          return Be(t);
        a -= u.top - o.viewOffset;
        for (var s = 0; s < e.display.gutterSpecs.length; ++s) {
          var f = o.gutters.childNodes[s];
          if (f && f.getBoundingClientRect().right >= n) {
            var v = kr(e.doc, a), y = e.display.gutterSpecs[s];
            return me(e, i, e, v, y.className, t), Be(t);
          }
        }
      }
      function oa(e, t) {
        return ul(e, t, "gutterClick", !0);
      }
      function sl(e, t) {
        rr(e.display, t) || Ps(e, t) || ce(e, t, "contextmenu") || Xe || e.display.input.onContextMenu(t);
      }
      function Ps(e, t) {
        return Ie(e, "gutterContextMenu") ? ul(e, t, "gutterContextMenu", !1) : !1;
      }
      function fl(e) {
        e.display.wrapper.className = e.display.wrapper.className.replace(/\s*cm-s-\S+/g, "") + e.options.theme.replace(/(^|\s)\s*/g, " cm-s-"), ui(e);
      }
      var $r = { toString: function() {
        return "CodeMirror.Init";
      } }, cl = {}, ln = {};
      function zs(e) {
        var t = e.optionHandlers;
        function i(r, n, a, o) {
          e.defaults[r] = n, a && (t[r] = o ? function(u, s, f) {
            f != $r && a(u, s, f);
          } : a);
        }
        e.defineOption = i, e.Init = $r, i("value", "", function(r, n) {
          return r.setValue(n);
        }, !0), i("mode", null, function(r, n) {
          r.doc.modeOption = n, Qn(r);
        }, !0), i("indentUnit", 2, Qn, !0), i("indentWithTabs", !1), i("smartIndent", !0), i("tabSize", 4, function(r) {
          vi(r), ui(r), Tt(r);
        }, !0), i("lineSeparator", null, function(r, n) {
          if (r.doc.lineSep = n, !!n) {
            var a = [], o = r.doc.first;
            r.doc.iter(function(s) {
              for (var f = 0; ; ) {
                var v = s.text.indexOf(n, f);
                if (v == -1)
                  break;
                f = v + n.length, a.push(J(o, v));
              }
              o++;
            });
            for (var u = a.length - 1; u >= 0; u--)
              Xr(r.doc, n, a[u], J(a[u].line, a[u].ch + n.length));
          }
        }), i("specialChars", /[\u0000-\u001f\u007f-\u009f\u00ad\u061c\u200b\u200e\u200f\u2028\u2029\u202d\u202e\u2066\u2067\u2069\ufeff\ufff9-\ufffc]/g, function(r, n, a) {
          r.state.specialChars = new RegExp(n.source + (n.test("	") ? "" : "|	"), "g"), a != $r && r.refresh();
        }), i("specialCharPlaceholder", pu, function(r) {
          return r.refresh();
        }, !0), i("electricChars", !0), i("inputStyle", U ? "contenteditable" : "textarea", function() {
          throw new Error("inputStyle can not (yet) be changed in a running editor");
        }, !0), i("spellcheck", !1, function(r, n) {
          return r.getInputField().spellcheck = n;
        }, !0), i("autocorrect", !1, function(r, n) {
          return r.getInputField().autocorrect = n;
        }, !0), i("autocapitalize", !1, function(r, n) {
          return r.getInputField().autocapitalize = n;
        }, !0), i("rtlMoveVisually", !Z), i("wholeLineUpdateBefore", !0), i("theme", "default", function(r) {
          fl(r), gi(r);
        }, !0), i("keyMap", "default", function(r, n, a) {
          var o = an(n), u = a != $r && an(a);
          u && u.detach && u.detach(r, o), o.attach && o.attach(r, u || null);
        }), i("extraKeys", null), i("configureMouse", null), i("lineWrapping", !1, _s, !0), i("gutters", [], function(r, n) {
          r.display.gutterSpecs = Yn(n, r.options.lineNumbers), gi(r);
        }, !0), i("fixedGutter", !0, function(r, n) {
          r.display.gutters.style.left = n ? Hn(r.display) + "px" : "0", r.refresh();
        }, !0), i("coverGutterNextToScrollbar", !1, function(r) {
          return Ur(r);
        }, !0), i("scrollbarStyle", "native", function(r) {
          ho(r), Ur(r), r.display.scrollbars.setScrollTop(r.doc.scrollTop), r.display.scrollbars.setScrollLeft(r.doc.scrollLeft);
        }, !0), i("lineNumbers", !1, function(r, n) {
          r.display.gutterSpecs = Yn(r.options.gutters, n), gi(r);
        }, !0), i("firstLineNumber", 1, gi, !0), i("lineNumberFormatter", function(r) {
          return r;
        }, gi, !0), i("showCursorWhenSelecting", !1, si, !0), i("resetSelectionOnContextMenu", !0), i("lineWiseCopyCut", !0), i("pasteLinesPerSelection", !0), i("selectionsMayTouch", !1), i("readOnly", !1, function(r, n) {
          n == "nocursor" && (_r(r), r.display.input.blur()), r.display.input.readOnlyChanged(n);
        }), i("screenReaderLabel", null, function(r, n) {
          n = n === "" ? null : n, r.display.input.screenReaderLabelChanged(n);
        }), i("disableInput", !1, function(r, n) {
          n || r.display.input.reset();
        }, !0), i("dragDrop", !0, Ws), i("allowDropFileTypes", null), i("cursorBlinkRate", 530), i("cursorScrollMargin", 0), i("cursorHeight", 1, si, !0), i("singleCursorHeightPerLine", !0, si, !0), i("workTime", 100), i("workDelay", 100), i("flattenSpans", !0, vi, !0), i("addModeClass", !1, vi, !0), i("pollInterval", 100), i("undoDepth", 200, function(r, n) {
          return r.doc.history.undoDepth = n;
        }), i("historyEventDelay", 1250), i("viewportMargin", 10, function(r) {
          return r.refresh();
        }, !0), i("maxHighlightLength", 1e4, vi, !0), i("moveInputWithCursor", !0, function(r, n) {
          n || r.display.input.resetPosition();
        }), i("tabindex", null, function(r, n) {
          return r.display.input.getField().tabIndex = n || "";
        }), i("autofocus", null), i("direction", "ltr", function(r, n) {
          return r.doc.setDirection(n);
        }, !0), i("phrases", null);
      }
      function Ws(e, t, i) {
        var r = i && i != $r;
        if (!t != !r) {
          var n = e.display.dragFunctions, a = t ? x : ie;
          a(e.display.scroller, "dragstart", n.start), a(e.display.scroller, "dragenter", n.enter), a(e.display.scroller, "dragover", n.over), a(e.display.scroller, "dragleave", n.leave), a(e.display.scroller, "drop", n.drop);
        }
      }
      function _s(e) {
        e.options.lineWrapping ? (it(e.display.wrapper, "CodeMirror-wrap"), e.display.sizer.style.minWidth = "", e.display.sizerWidth = null) : (Le(e.display.wrapper, "CodeMirror-wrap"), Fn(e)), Rn(e), Tt(e), ui(e), setTimeout(function() {
          return Ur(e);
        }, 100);
      }
      function tt(e, t) {
        var i = this;
        if (!(this instanceof tt))
          return new tt(e, t);
        this.options = t = t ? nt(t) : {}, nt(cl, t, !1);
        var r = t.value;
        typeof r == "string" ? r = new Bt(r, t.mode, null, t.lineSeparator, t.direction) : t.mode && (r.modeOption = t.mode), this.doc = r;
        var n = new tt.inputStyles[t.inputStyle](this), a = this.display = new es(e, r, n, t);
        a.wrapper.CodeMirror = this, fl(this), t.lineWrapping && (this.display.wrapper.className += " CodeMirror-wrap"), ho(this), this.state = {
          keyMaps: [],
          // stores maps added by addKeyMap
          overlays: [],
          // highlighting overlays, as added by addOverlay
          modeGen: 0,
          // bumped when mode/overlay changes, used to invalidate highlighting info
          overwrite: !1,
          delayingBlurEvent: !1,
          focused: !1,
          suppressEdits: !1,
          // used to disable editing during key handlers when in readOnly mode
          pasteIncoming: -1,
          cutIncoming: -1,
          // help recognize paste/cut edits in input.poll
          selectingText: !1,
          draggingText: !1,
          highlight: new Ve(),
          // stores highlight worker timeout
          keySeq: null,
          // Unfinished key sequence
          specialChars: null
        }, t.autofocus && !U && a.input.focus(), B && z < 11 && setTimeout(function() {
          return i.display.input.reset(!0);
        }, 20), qs(this), ys(), Br(this), this.curOp.forceUpdate = !0, wo(this, r), t.autofocus && !U || this.hasFocus() ? setTimeout(function() {
          i.hasFocus() && !i.state.focused && _n(i);
        }, 20) : _r(this);
        for (var o in ln)
          ln.hasOwnProperty(o) && ln[o](this, t[o], $r);
        vo(this), t.finishInit && t.finishInit(this);
        for (var u = 0; u < la.length; ++u)
          la[u](this);
        Mr(this), te && t.lineWrapping && getComputedStyle(a.lineDiv).textRendering == "optimizelegibility" && (a.lineDiv.style.textRendering = "auto");
      }
      tt.defaults = cl, tt.optionHandlers = ln;
      function qs(e) {
        var t = e.display;
        x(t.scroller, "mousedown", mt(e, ol)), B && z < 11 ? x(t.scroller, "dblclick", mt(e, function(s) {
          if (!ce(e, s)) {
            var f = Ar(e, s);
            if (!(!f || oa(e, s) || rr(e.display, s))) {
              Ae(s);
              var v = e.findWordAt(f);
              Vi(e.doc, v.anchor, v.head);
            }
          }
        })) : x(t.scroller, "dblclick", function(s) {
          return ce(e, s) || Ae(s);
        }), x(t.scroller, "contextmenu", function(s) {
          return sl(e, s);
        }), x(t.input.getField(), "contextmenu", function(s) {
          t.scroller.contains(s.target) || sl(e, s);
        });
        var i, r = { end: 0 };
        function n() {
          t.activeTouch && (i = setTimeout(function() {
            return t.activeTouch = null;
          }, 1e3), r = t.activeTouch, r.end = +/* @__PURE__ */ new Date());
        }
        function a(s) {
          if (s.touches.length != 1)
            return !1;
          var f = s.touches[0];
          return f.radiusX <= 1 && f.radiusY <= 1;
        }
        function o(s, f) {
          if (f.left == null)
            return !0;
          var v = f.left - s.left, y = f.top - s.top;
          return v * v + y * y > 400;
        }
        x(t.scroller, "touchstart", function(s) {
          if (!ce(e, s) && !a(s) && !oa(e, s)) {
            t.input.ensurePolled(), clearTimeout(i);
            var f = +/* @__PURE__ */ new Date();
            t.activeTouch = {
              start: f,
              moved: !1,
              prev: f - r.end <= 300 ? r : null
            }, s.touches.length == 1 && (t.activeTouch.left = s.touches[0].pageX, t.activeTouch.top = s.touches[0].pageY);
          }
        }), x(t.scroller, "touchmove", function() {
          t.activeTouch && (t.activeTouch.moved = !0);
        }), x(t.scroller, "touchend", function(s) {
          var f = t.activeTouch;
          if (f && !rr(t, s) && f.left != null && !f.moved && /* @__PURE__ */ new Date() - f.start < 300) {
            var v = e.coordsChar(t.activeTouch, "page"), y;
            !f.prev || o(f, f.prev) ? y = new je(v, v) : !f.prev.prev || o(f, f.prev.prev) ? y = e.findWordAt(v) : y = new je(J(v.line, 0), Oe(e.doc, J(v.line + 1, 0))), e.setSelection(y.anchor, y.head), e.focus(), Ae(s);
          }
          n();
        }), x(t.scroller, "touchcancel", n), x(t.scroller, "scroll", function() {
          t.scroller.clientHeight && (ci(e, t.scroller.scrollTop), Lr(e, t.scroller.scrollLeft, !0), me(e, "scroll", e));
        }), x(t.scroller, "mousewheel", function(s) {
          return yo(e, s);
        }), x(t.scroller, "DOMMouseScroll", function(s) {
          return yo(e, s);
        }), x(t.wrapper, "scroll", function() {
          return t.wrapper.scrollTop = t.wrapper.scrollLeft = 0;
        }), t.dragFunctions = {
          enter: function(s) {
            ce(e, s) || Ge(s);
          },
          over: function(s) {
            ce(e, s) || (xs(e, s), Ge(s));
          },
          start: function(s) {
            return ms(e, s);
          },
          drop: mt(e, vs),
          leave: function(s) {
            ce(e, s) || Xo(e);
          }
        };
        var u = t.input.getField();
        x(u, "keyup", function(s) {
          return nl.call(e, s);
        }), x(u, "keydown", mt(e, il)), x(u, "keypress", mt(e, al)), x(u, "focus", function(s) {
          return _n(e, s);
        }), x(u, "blur", function(s) {
          return _r(e, s);
        });
      }
      var la = [];
      tt.defineInitHook = function(e) {
        return la.push(e);
      };
      function Li(e, t, i, r) {
        var n = e.doc, a;
        i == null && (i = "add"), i == "smart" && (n.mode.indent ? a = ii(e, t).state : i = "prev");
        var o = e.options.tabSize, u = we(n, t), s = Ke(u.text, null, o);
        u.stateAfter && (u.stateAfter = null);
        var f = u.text.match(/^\s*/)[0], v;
        if (!r && !/\S/.test(u.text))
          v = 0, i = "not";
        else if (i == "smart" && (v = n.mode.indent(a, u.text.slice(f.length), u.text), v == Je || v > 150)) {
          if (!r)
            return;
          i = "prev";
        }
        i == "prev" ? t > n.first ? v = Ke(we(n, t - 1).text, null, o) : v = 0 : i == "add" ? v = s + e.options.indentUnit : i == "subtract" ? v = s - e.options.indentUnit : typeof i == "number" && (v = s + i), v = Math.max(0, v);
        var y = "", T = 0;
        if (e.options.indentWithTabs)
          for (var A = Math.floor(v / o); A; --A)
            T += o, y += "	";
        if (T < v && (y += dt(v - T)), y != f)
          return Xr(n, y, J(t, 0), J(t, f.length), "+input"), u.stateAfter = null, !0;
        for (var q = 0; q < n.sel.ranges.length; q++) {
          var Y = n.sel.ranges[q];
          if (Y.head.line == t && Y.head.ch < f.length) {
            var V = J(t, f.length);
            ea(n, q, new je(V, V));
            break;
          }
        }
      }
      var jt = null;
      function un(e) {
        jt = e;
      }
      function ua(e, t, i, r, n) {
        var a = e.doc;
        e.display.shift = !1, r || (r = a.sel);
        var o = +/* @__PURE__ */ new Date() - 200, u = n == "paste" || e.state.pasteIncoming > o, s = yr(t), f = null;
        if (u && r.ranges.length > 1)
          if (jt && jt.text.join(`
`) == t) {
            if (r.ranges.length % jt.text.length == 0) {
              f = [];
              for (var v = 0; v < jt.text.length; v++)
                f.push(a.splitLines(jt.text[v]));
            }
          } else s.length == r.ranges.length && e.options.pasteLinesPerSelection && (f = ze(s, function(oe) {
            return [oe];
          }));
        for (var y = e.curOp.updateInput, T = r.ranges.length - 1; T >= 0; T--) {
          var A = r.ranges[T], q = A.from(), Y = A.to();
          A.empty() && (i && i > 0 ? q = J(q.line, q.ch - i) : e.state.overwrite && !u ? Y = J(Y.line, Math.min(we(a, Y.line).text.length, Y.ch + Pe(s).length)) : u && jt && jt.lineWise && jt.text.join(`
`) == s.join(`
`) && (q = Y = J(q.line, 0)));
          var V = {
            from: q,
            to: Y,
            text: f ? f[T % f.length] : s,
            origin: n || (u ? "paste" : e.state.cutIncoming > o ? "cut" : "+input")
          };
          Kr(e.doc, V), vt(e, "inputRead", e, V);
        }
        t && !u && dl(e, t), qr(e), e.curOp.updateInput < 2 && (e.curOp.updateInput = y), e.curOp.typing = !0, e.state.pasteIncoming = e.state.cutIncoming = -1;
      }
      function hl(e, t) {
        var i = e.clipboardData && e.clipboardData.getData("Text");
        if (i)
          return e.preventDefault(), !t.isReadOnly() && !t.options.disableInput && t.hasFocus() && Ht(t, function() {
            return ua(t, i, 0, null, "paste");
          }), !0;
      }
      function dl(e, t) {
        if (!(!e.options.electricChars || !e.options.smartIndent))
          for (var i = e.doc.sel, r = i.ranges.length - 1; r >= 0; r--) {
            var n = i.ranges[r];
            if (!(n.head.ch > 100 || r && i.ranges[r - 1].head.line == n.head.line)) {
              var a = e.getModeAt(n.head), o = !1;
              if (a.electricChars) {
                for (var u = 0; u < a.electricChars.length; u++)
                  if (t.indexOf(a.electricChars.charAt(u)) > -1) {
                    o = Li(e, n.head.line, "smart");
                    break;
                  }
              } else a.electricInput && a.electricInput.test(we(e.doc, n.head.line).text.slice(0, n.head.ch)) && (o = Li(e, n.head.line, "smart"));
              o && vt(e, "electricInput", e, n.head.line);
            }
          }
      }
      function pl(e) {
        for (var t = [], i = [], r = 0; r < e.doc.sel.ranges.length; r++) {
          var n = e.doc.sel.ranges[r].head.line, a = { anchor: J(n, 0), head: J(n + 1, 0) };
          i.push(a), t.push(e.getRange(a.anchor, a.head));
        }
        return { text: t, ranges: i };
      }
      function sa(e, t, i, r) {
        e.setAttribute("autocorrect", i ? "on" : "off"), e.setAttribute("autocapitalize", r ? "on" : "off"), e.setAttribute("spellcheck", !!t);
      }
      function gl() {
        var e = L("textarea", null, null, "position: absolute; bottom: -1em; padding: 0; width: 1px; height: 1em; min-height: 1em; outline: none"), t = L("div", [e], null, "overflow: hidden; position: relative; width: 3px; height: 0px;");
        return te ? e.style.width = "1000px" : e.setAttribute("wrap", "off"), W && (e.style.border = "1px solid black"), t;
      }
      function Us(e) {
        var t = e.optionHandlers, i = e.helpers = {};
        e.prototype = {
          constructor: e,
          focus: function() {
            Te(this).focus(), this.display.input.focus();
          },
          setOption: function(r, n) {
            var a = this.options, o = a[r];
            a[r] == n && r != "mode" || (a[r] = n, t.hasOwnProperty(r) && mt(this, t[r])(this, n, o), me(this, "optionChange", this, r));
          },
          getOption: function(r) {
            return this.options[r];
          },
          getDoc: function() {
            return this.doc;
          },
          addKeyMap: function(r, n) {
            this.state.keyMaps[n ? "push" : "unshift"](an(r));
          },
          removeKeyMap: function(r) {
            for (var n = this.state.keyMaps, a = 0; a < n.length; ++a)
              if (n[a] == r || n[a].name == r)
                return n.splice(a, 1), !0;
          },
          addOverlay: Et(function(r, n) {
            var a = r.token ? r : e.getMode(this.options, r);
            if (a.startState)
              throw new Error("Overlays may not be stateful.");
            bt(
              this.state.overlays,
              {
                mode: a,
                modeSpec: r,
                opaque: n && n.opaque,
                priority: n && n.priority || 0
              },
              function(o) {
                return o.priority;
              }
            ), this.state.modeGen++, Tt(this);
          }),
          removeOverlay: Et(function(r) {
            for (var n = this.state.overlays, a = 0; a < n.length; ++a) {
              var o = n[a].modeSpec;
              if (o == r || typeof r == "string" && o.name == r) {
                n.splice(a, 1), this.state.modeGen++, Tt(this);
                return;
              }
            }
          }),
          indentLine: Et(function(r, n, a) {
            typeof n != "string" && typeof n != "number" && (n == null ? n = this.options.smartIndent ? "smart" : "prev" : n = n ? "add" : "subtract"), ri(this.doc, r) && Li(this, r, n, a);
          }),
          indentSelection: Et(function(r) {
            for (var n = this.doc.sel.ranges, a = -1, o = 0; o < n.length; o++) {
              var u = n[o];
              if (u.empty())
                u.head.line > a && (Li(this, u.head.line, r, !0), a = u.head.line, o == this.doc.sel.primIndex && qr(this));
              else {
                var s = u.from(), f = u.to(), v = Math.max(a, s.line);
                a = Math.min(this.lastLine(), f.line - (f.ch ? 0 : 1)) + 1;
                for (var y = v; y < a; ++y)
                  Li(this, y, r);
                var T = this.doc.sel.ranges;
                s.ch == 0 && n.length == T.length && T[o].from().ch > 0 && ea(this.doc, o, new je(s, T[o].to()), st);
              }
            }
          }),
          // Fetch the parser token for a given character. Useful for hacks
          // that want to inspect the mode state (say, for completion).
          getTokenAt: function(r, n) {
            return ka(this, r, n);
          },
          getLineTokens: function(r, n) {
            return ka(this, J(r), n, !0);
          },
          getTokenTypeAt: function(r) {
            r = Oe(this.doc, r);
            var n = ba(this, we(this.doc, r.line)), a = 0, o = (n.length - 1) / 2, u = r.ch, s;
            if (u == 0)
              s = n[2];
            else
              for (; ; ) {
                var f = a + o >> 1;
                if ((f ? n[f * 2 - 1] : 0) >= u)
                  o = f;
                else if (n[f * 2 + 1] < u)
                  a = f + 1;
                else {
                  s = n[f * 2 + 2];
                  break;
                }
              }
            var v = s ? s.indexOf("overlay ") : -1;
            return v < 0 ? s : v == 0 ? null : s.slice(0, v - 1);
          },
          getModeAt: function(r) {
            var n = this.doc.mode;
            return n.innerMode ? e.innerMode(n, this.getTokenAt(r).state).mode : n;
          },
          getHelper: function(r, n) {
            return this.getHelpers(r, n)[0];
          },
          getHelpers: function(r, n) {
            var a = [];
            if (!i.hasOwnProperty(n))
              return a;
            var o = i[n], u = this.getModeAt(r);
            if (typeof u[n] == "string")
              o[u[n]] && a.push(o[u[n]]);
            else if (u[n])
              for (var s = 0; s < u[n].length; s++) {
                var f = o[u[n][s]];
                f && a.push(f);
              }
            else u.helperType && o[u.helperType] ? a.push(o[u.helperType]) : o[u.name] && a.push(o[u.name]);
            for (var v = 0; v < o._global.length; v++) {
              var y = o._global[v];
              y.pred(u, this) && We(a, y.val) == -1 && a.push(y.val);
            }
            return a;
          },
          getStateAfter: function(r, n) {
            var a = this.doc;
            return r = xa(a, r ?? a.first + a.size - 1), ii(this, r + 1, n).state;
          },
          cursorCoords: function(r, n) {
            var a, o = this.doc.sel.primary();
            return r == null ? a = o.head : typeof r == "object" ? a = Oe(this.doc, r) : a = r ? o.from() : o.to(), Ut(this, a, n || "page");
          },
          charCoords: function(r, n) {
            return Ui(this, Oe(this.doc, r), n || "page");
          },
          coordsChar: function(r, n) {
            return r = Va(this, r, n || "page"), On(this, r.left, r.top);
          },
          lineAtHeight: function(r, n) {
            return r = Va(this, { top: r, left: 0 }, n || "page").top, kr(this.doc, r + this.display.viewOffset);
          },
          heightAtLine: function(r, n, a) {
            var o = !1, u;
            if (typeof r == "number") {
              var s = this.doc.first + this.doc.size - 1;
              r < this.doc.first ? r = this.doc.first : r > s && (r = s, o = !0), u = we(this.doc, r);
            } else
              u = r;
            return qi(this, u, { top: 0, left: 0 }, n || "page", a || o).top + (o ? this.doc.height - tr(u) : 0);
          },
          defaultTextHeight: function() {
            return zr(this.display);
          },
          defaultCharWidth: function() {
            return Wr(this.display);
          },
          getViewport: function() {
            return { from: this.display.viewFrom, to: this.display.viewTo };
          },
          addWidget: function(r, n, a, o, u) {
            var s = this.display;
            r = Ut(this, Oe(this.doc, r));
            var f = r.bottom, v = r.left;
            if (n.style.position = "absolute", n.setAttribute("cm-ignore-events", "true"), this.display.input.setUneditable(n), s.sizer.appendChild(n), o == "over")
              f = r.top;
            else if (o == "above" || o == "near") {
              var y = Math.max(s.wrapper.clientHeight, this.doc.height), T = Math.max(s.sizer.clientWidth, s.lineSpace.clientWidth);
              (o == "above" || r.bottom + n.offsetHeight > y) && r.top > n.offsetHeight ? f = r.top - n.offsetHeight : r.bottom + n.offsetHeight <= y && (f = r.bottom), v + n.offsetWidth > T && (v = T - n.offsetWidth);
            }
            n.style.top = f + "px", n.style.left = n.style.right = "", u == "right" ? (v = s.sizer.clientWidth - n.offsetWidth, n.style.right = "0px") : (u == "left" ? v = 0 : u == "middle" && (v = (s.sizer.clientWidth - n.offsetWidth) / 2), n.style.left = v + "px"), a && Wu(this, { left: v, top: f, right: v + n.offsetWidth, bottom: f + n.offsetHeight });
          },
          triggerOnKeyDown: Et(il),
          triggerOnKeyPress: Et(al),
          triggerOnKeyUp: nl,
          triggerOnMouseDown: Et(ol),
          execCommand: function(r) {
            if (Si.hasOwnProperty(r))
              return Si[r].call(null, this);
          },
          triggerElectric: Et(function(r) {
            dl(this, r);
          }),
          findPosH: function(r, n, a, o) {
            var u = 1;
            n < 0 && (u = -1, n = -n);
            for (var s = Oe(this.doc, r), f = 0; f < n && (s = fa(this.doc, s, u, a, o), !s.hitSide); ++f)
              ;
            return s;
          },
          moveH: Et(function(r, n) {
            var a = this;
            this.extendSelectionsBy(function(o) {
              return a.display.shift || a.doc.extend || o.empty() ? fa(a.doc, o.head, r, n, a.options.rtlMoveVisually) : r < 0 ? o.from() : o.to();
            }, It);
          }),
          deleteH: Et(function(r, n) {
            var a = this.doc.sel, o = this.doc;
            a.somethingSelected() ? o.replaceSelection("", null, "+delete") : Qr(this, function(u) {
              var s = fa(o, u.head, r, n, !1);
              return r < 0 ? { from: s, to: u.head } : { from: u.head, to: s };
            });
          }),
          findPosV: function(r, n, a, o) {
            var u = 1, s = o;
            n < 0 && (u = -1, n = -n);
            for (var f = Oe(this.doc, r), v = 0; v < n; ++v) {
              var y = Ut(this, f, "div");
              if (s == null ? s = y.left : y.left = s, f = vl(this, y, u, a), f.hitSide)
                break;
            }
            return f;
          },
          moveV: Et(function(r, n) {
            var a = this, o = this.doc, u = [], s = !this.display.shift && !o.extend && o.sel.somethingSelected();
            if (o.extendSelectionsBy(function(v) {
              if (s)
                return r < 0 ? v.from() : v.to();
              var y = Ut(a, v.head, "div");
              v.goalColumn != null && (y.left = v.goalColumn), u.push(y.left);
              var T = vl(a, y, r, n);
              return n == "page" && v == o.sel.primary() && Un(a, Ui(a, T, "div").top - y.top), T;
            }, It), u.length)
              for (var f = 0; f < o.sel.ranges.length; f++)
                o.sel.ranges[f].goalColumn = u[f];
          }),
          // Find the word at the given position (as returned by coordsChar).
          findWordAt: function(r) {
            var n = this.doc, a = we(n, r.line).text, o = r.ch, u = r.ch;
            if (a) {
              var s = this.getHelper(r, "wordChars");
              (r.sticky == "before" || u == a.length) && o ? --o : ++u;
              for (var f = a.charAt(o), v = h(f, s) ? function(y) {
                return h(y, s);
              } : /\s/.test(f) ? function(y) {
                return /\s/.test(y);
              } : function(y) {
                return !/\s/.test(y) && !h(y);
              }; o > 0 && v(a.charAt(o - 1)); )
                --o;
              for (; u < a.length && v(a.charAt(u)); )
                ++u;
            }
            return new je(J(r.line, o), J(r.line, u));
          },
          toggleOverwrite: function(r) {
            r != null && r == this.state.overwrite || ((this.state.overwrite = !this.state.overwrite) ? it(this.display.cursorDiv, "CodeMirror-overwrite") : Le(this.display.cursorDiv, "CodeMirror-overwrite"), me(this, "overwriteToggle", this, this.state.overwrite));
          },
          hasFocus: function() {
            return this.display.input.getField() == Ue(j(this));
          },
          isReadOnly: function() {
            return !!(this.options.readOnly || this.doc.cantEdit);
          },
          scrollTo: Et(function(r, n) {
            fi(this, r, n);
          }),
          getScrollInfo: function() {
            var r = this.display.scroller;
            return {
              left: r.scrollLeft,
              top: r.scrollTop,
              height: r.scrollHeight - Zt(this) - this.display.barHeight,
              width: r.scrollWidth - Zt(this) - this.display.barWidth,
              clientHeight: Ln(this),
              clientWidth: Sr(this)
            };
          },
          scrollIntoView: Et(function(r, n) {
            r == null ? (r = { from: this.doc.sel.primary().head, to: null }, n == null && (n = this.options.cursorScrollMargin)) : typeof r == "number" ? r = { from: J(r, 0), to: null } : r.from == null && (r = { from: r, to: null }), r.to || (r.to = r.from), r.margin = n || 0, r.from.line != null ? _u(this, r) : uo(this, r.from, r.to, r.margin);
          }),
          setSize: Et(function(r, n) {
            var a = this, o = function(s) {
              return typeof s == "number" || /^\d+$/.test(String(s)) ? s + "px" : s;
            };
            r != null && (this.display.wrapper.style.width = o(r)), n != null && (this.display.wrapper.style.height = o(n)), this.options.lineWrapping && Qa(this);
            var u = this.display.viewFrom;
            this.doc.iter(u, this.display.viewTo, function(s) {
              if (s.widgets) {
                for (var f = 0; f < s.widgets.length; f++)
                  if (s.widgets[f].noHScroll) {
                    cr(a, u, "widget");
                    break;
                  }
              }
              ++u;
            }), this.curOp.forceUpdate = !0, me(this, "refresh", this);
          }),
          operation: function(r) {
            return Ht(this, r);
          },
          startOperation: function() {
            return Br(this);
          },
          endOperation: function() {
            return Mr(this);
          },
          refresh: Et(function() {
            var r = this.display.cachedTextHeight;
            Tt(this), this.curOp.forceUpdate = !0, ui(this), fi(this, this.doc.scrollLeft, this.doc.scrollTop), Kn(this.display), (r == null || Math.abs(r - zr(this.display)) > 0.5 || this.options.lineWrapping) && Rn(this), me(this, "refresh", this);
          }),
          swapDoc: Et(function(r) {
            var n = this.doc;
            return n.cm = null, this.state.selectingText && this.state.selectingText(), wo(this, r), ui(this), this.display.input.reset(), fi(this, r.scrollLeft, r.scrollTop), this.curOp.forceScroll = !0, vt(this, "swapDoc", this, n), n;
          }),
          phrase: function(r) {
            var n = this.options.phrases;
            return n && Object.prototype.hasOwnProperty.call(n, r) ? n[r] : r;
          },
          getInputField: function() {
            return this.display.input.getField();
          },
          getWrapperElement: function() {
            return this.display.wrapper;
          },
          getScrollerElement: function() {
            return this.display.scroller;
          },
          getGutterElement: function() {
            return this.display.gutters;
          }
        }, et(e), e.registerHelper = function(r, n, a) {
          i.hasOwnProperty(r) || (i[r] = e[r] = { _global: [] }), i[r][n] = a;
        }, e.registerGlobalHelper = function(r, n, a, o) {
          e.registerHelper(r, n, o), i[r]._global.push({ pred: a, val: o });
        };
      }
      function fa(e, t, i, r, n) {
        var a = t, o = i, u = we(e, t.line), s = n && e.direction == "rtl" ? -i : i;
        function f() {
          var pe = t.line + s;
          return pe < e.first || pe >= e.first + e.size ? !1 : (t = new J(pe, t.ch, t.sticky), u = we(e, pe));
        }
        function v(pe) {
          var le;
          if (r == "codepoint") {
            var ve = u.text.charCodeAt(t.ch + (i > 0 ? 0 : -1));
            if (isNaN(ve))
              le = null;
            else {
              var Fe = i > 0 ? ve >= 55296 && ve < 56320 : ve >= 56320 && ve < 57343;
              le = new J(t.line, Math.max(0, Math.min(u.text.length, t.ch + i * (Fe ? 2 : 1))), -i);
            }
          } else n ? le = ks(e.cm, u, t, i) : le = ra(u, t, i);
          if (le == null)
            if (!pe && f())
              t = ia(n, e.cm, u, t.line, s);
            else
              return !1;
          else
            t = le;
          return !0;
        }
        if (r == "char" || r == "codepoint")
          v();
        else if (r == "column")
          v(!0);
        else if (r == "word" || r == "group")
          for (var y = null, T = r == "group", A = e.cm && e.cm.getHelper(t, "wordChars"), q = !0; !(i < 0 && !v(!q)); q = !1) {
            var Y = u.text.charAt(t.ch) || `
`, V = h(Y, A) ? "w" : T && Y == `
` ? "n" : !T || /\s/.test(Y) ? null : "p";
            if (T && !q && !V && (V = "s"), y && y != V) {
              i < 0 && (i = 1, v(), t.sticky = "after");
              break;
            }
            if (V && (y = V), i > 0 && !v(!q))
              break;
          }
        var oe = tn(e, t, a, o, !0);
        return xn(a, oe) && (oe.hitSide = !0), oe;
      }
      function vl(e, t, i, r) {
        var n = e.doc, a = t.left, o;
        if (r == "page") {
          var u = Math.min(e.display.wrapper.clientHeight, Te(e).innerHeight || n(e).documentElement.clientHeight), s = Math.max(u - 0.5 * zr(e.display), 3);
          o = (i > 0 ? t.bottom : t.top) + i * s;
        } else r == "line" && (o = i > 0 ? t.bottom + 3 : t.top - 3);
        for (var f; f = On(e, a, o), !!f.outside; ) {
          if (i < 0 ? o <= 0 : o >= n.height) {
            f.hitSide = !0;
            break;
          }
          o += i * 5;
        }
        return f;
      }
      var Ze = function(e) {
        this.cm = e, this.lastAnchorNode = this.lastAnchorOffset = this.lastFocusNode = this.lastFocusOffset = null, this.polling = new Ve(), this.composing = null, this.gracePeriod = !1, this.readDOMTimeout = null;
      };
      Ze.prototype.init = function(e) {
        var t = this, i = this, r = i.cm, n = i.div = e.lineDiv;
        n.contentEditable = !0, sa(n, r.options.spellcheck, r.options.autocorrect, r.options.autocapitalize);
        function a(u) {
          for (var s = u.target; s; s = s.parentNode) {
            if (s == n)
              return !0;
            if (/\bCodeMirror-(?:line)?widget\b/.test(s.className))
              break;
          }
          return !1;
        }
        x(n, "paste", function(u) {
          !a(u) || ce(r, u) || hl(u, r) || z <= 11 && setTimeout(mt(r, function() {
            return t.updateFromDOM();
          }), 20);
        }), x(n, "compositionstart", function(u) {
          t.composing = { data: u.data, done: !1 };
        }), x(n, "compositionupdate", function(u) {
          t.composing || (t.composing = { data: u.data, done: !1 });
        }), x(n, "compositionend", function(u) {
          t.composing && (u.data != t.composing.data && t.readFromDOMSoon(), t.composing.done = !0);
        }), x(n, "touchstart", function() {
          return i.forceCompositionEnd();
        }), x(n, "input", function() {
          t.composing || t.readFromDOMSoon();
        });
        function o(u) {
          if (!(!a(u) || ce(r, u))) {
            if (r.somethingSelected())
              un({ lineWise: !1, text: r.getSelections() }), u.type == "cut" && r.replaceSelection("", null, "cut");
            else if (r.options.lineWiseCopyCut) {
              var s = pl(r);
              un({ lineWise: !0, text: s.text }), u.type == "cut" && r.operation(function() {
                r.setSelections(s.ranges, 0, st), r.replaceSelection("", null, "cut");
              });
            } else
              return;
            if (u.clipboardData) {
              u.clipboardData.clearData();
              var f = jt.text.join(`
`);
              if (u.clipboardData.setData("Text", f), u.clipboardData.getData("Text") == f) {
                u.preventDefault();
                return;
              }
            }
            var v = gl(), y = v.firstChild;
            sa(y), r.display.lineSpace.insertBefore(v, r.display.lineSpace.firstChild), y.value = jt.text.join(`
`);
            var T = Ue(_e(n));
            w(y), setTimeout(function() {
              r.display.lineSpace.removeChild(v), T.focus(), T == n && i.showPrimarySelection();
            }, 50);
          }
        }
        x(n, "copy", o), x(n, "cut", o);
      }, Ze.prototype.screenReaderLabelChanged = function(e) {
        e ? this.div.setAttribute("aria-label", e) : this.div.removeAttribute("aria-label");
      }, Ze.prototype.prepareSelection = function() {
        var e = ao(this.cm, !1);
        return e.focus = Ue(_e(this.div)) == this.div, e;
      }, Ze.prototype.showSelection = function(e, t) {
        !e || !this.cm.display.view.length || ((e.focus || t) && this.showPrimarySelection(), this.showMultipleSelections(e));
      }, Ze.prototype.getSelection = function() {
        return this.cm.display.wrapper.ownerDocument.getSelection();
      }, Ze.prototype.showPrimarySelection = function() {
        var e = this.getSelection(), t = this.cm, i = t.doc.sel.primary(), r = i.from(), n = i.to();
        if (t.display.viewTo == t.display.viewFrom || r.line >= t.display.viewTo || n.line < t.display.viewFrom) {
          e.removeAllRanges();
          return;
        }
        var a = sn(t, e.anchorNode, e.anchorOffset), o = sn(t, e.focusNode, e.focusOffset);
        if (!(a && !a.bad && o && !o.bad && Me(Oi(a, o), r) == 0 && Me(Mi(a, o), n) == 0)) {
          var u = t.display.view, s = r.line >= t.display.viewFrom && ml(t, r) || { node: u[0].measure.map[2], offset: 0 }, f = n.line < t.display.viewTo && ml(t, n);
          if (!f) {
            var v = u[u.length - 1].measure, y = v.maps ? v.maps[v.maps.length - 1] : v.map;
            f = { node: y[y.length - 1], offset: y[y.length - 2] - y[y.length - 3] };
          }
          if (!s || !f) {
            e.removeAllRanges();
            return;
          }
          var T = e.rangeCount && e.getRangeAt(0), A;
          try {
            A = $(s.node, s.offset, f.offset, f.node);
          } catch {
          }
          A && (!M && t.state.focused ? (e.collapse(s.node, s.offset), A.collapsed || (e.removeAllRanges(), e.addRange(A))) : (e.removeAllRanges(), e.addRange(A)), T && e.anchorNode == null ? e.addRange(T) : M && this.startGracePeriod()), this.rememberSelection();
        }
      }, Ze.prototype.startGracePeriod = function() {
        var e = this;
        clearTimeout(this.gracePeriod), this.gracePeriod = setTimeout(function() {
          e.gracePeriod = !1, e.selectionChanged() && e.cm.operation(function() {
            return e.cm.curOp.selectionChanged = !0;
          });
        }, 20);
      }, Ze.prototype.showMultipleSelections = function(e) {
        Ne(this.cm.display.cursorDiv, e.cursors), Ne(this.cm.display.selectionDiv, e.selection);
      }, Ze.prototype.rememberSelection = function() {
        var e = this.getSelection();
        this.lastAnchorNode = e.anchorNode, this.lastAnchorOffset = e.anchorOffset, this.lastFocusNode = e.focusNode, this.lastFocusOffset = e.focusOffset;
      }, Ze.prototype.selectionInEditor = function() {
        var e = this.getSelection();
        if (!e.rangeCount)
          return !1;
        var t = e.getRangeAt(0).commonAncestorContainer;
        return be(this.div, t);
      }, Ze.prototype.focus = function() {
        this.cm.options.readOnly != "nocursor" && ((!this.selectionInEditor() || Ue(_e(this.div)) != this.div) && this.showSelection(this.prepareSelection(), !0), this.div.focus());
      }, Ze.prototype.blur = function() {
        this.div.blur();
      }, Ze.prototype.getField = function() {
        return this.div;
      }, Ze.prototype.supportsTouch = function() {
        return !0;
      }, Ze.prototype.receivedFocus = function() {
        var e = this, t = this;
        this.selectionInEditor() ? setTimeout(function() {
          return e.pollSelection();
        }, 20) : Ht(this.cm, function() {
          return t.cm.curOp.selectionChanged = !0;
        });
        function i() {
          t.cm.state.focused && (t.pollSelection(), t.polling.set(t.cm.options.pollInterval, i));
        }
        this.polling.set(this.cm.options.pollInterval, i);
      }, Ze.prototype.selectionChanged = function() {
        var e = this.getSelection();
        return e.anchorNode != this.lastAnchorNode || e.anchorOffset != this.lastAnchorOffset || e.focusNode != this.lastFocusNode || e.focusOffset != this.lastFocusOffset;
      }, Ze.prototype.pollSelection = function() {
        if (!(this.readDOMTimeout != null || this.gracePeriod || !this.selectionChanged())) {
          var e = this.getSelection(), t = this.cm;
          if (X && K && this.cm.display.gutterSpecs.length && Gs(e.anchorNode)) {
            this.cm.triggerOnKeyDown({ type: "keydown", keyCode: 8, preventDefault: Math.abs }), this.blur(), this.focus();
            return;
          }
          if (!this.composing) {
            this.rememberSelection();
            var i = sn(t, e.anchorNode, e.anchorOffset), r = sn(t, e.focusNode, e.focusOffset);
            i && r && Ht(t, function() {
              kt(t.doc, dr(i, r), st), (i.bad || r.bad) && (t.curOp.selectionChanged = !0);
            });
          }
        }
      }, Ze.prototype.pollContent = function() {
        this.readDOMTimeout != null && (clearTimeout(this.readDOMTimeout), this.readDOMTimeout = null);
        var e = this.cm, t = e.display, i = e.doc.sel.primary(), r = i.from(), n = i.to();
        if (r.ch == 0 && r.line > e.firstLine() && (r = J(r.line - 1, we(e.doc, r.line - 1).length)), n.ch == we(e.doc, n.line).text.length && n.line < e.lastLine() && (n = J(n.line + 1, 0)), r.line < t.viewFrom || n.line > t.viewTo - 1)
          return !1;
        var a, o, u;
        r.line == t.viewFrom || (a = Er(e, r.line)) == 0 ? (o = Ye(t.view[0].line), u = t.view[0].node) : (o = Ye(t.view[a].line), u = t.view[a - 1].node.nextSibling);
        var s = Er(e, n.line), f, v;
        if (s == t.view.length - 1 ? (f = t.viewTo - 1, v = t.lineDiv.lastChild) : (f = Ye(t.view[s + 1].line) - 1, v = t.view[s + 1].node.previousSibling), !u)
          return !1;
        for (var y = e.doc.splitLines(js(e, u, v, o, f)), T = wr(e.doc, J(o, 0), J(f, we(e.doc, f).text.length)); y.length > 1 && T.length > 1; )
          if (Pe(y) == Pe(T))
            y.pop(), T.pop(), f--;
          else if (y[0] == T[0])
            y.shift(), T.shift(), o++;
          else
            break;
        for (var A = 0, q = 0, Y = y[0], V = T[0], oe = Math.min(Y.length, V.length); A < oe && Y.charCodeAt(A) == V.charCodeAt(A); )
          ++A;
        for (var pe = Pe(y), le = Pe(T), ve = Math.min(
          pe.length - (y.length == 1 ? A : 0),
          le.length - (T.length == 1 ? A : 0)
        ); q < ve && pe.charCodeAt(pe.length - q - 1) == le.charCodeAt(le.length - q - 1); )
          ++q;
        if (y.length == 1 && T.length == 1 && o == r.line)
          for (; A && A > r.ch && pe.charCodeAt(pe.length - q - 1) == le.charCodeAt(le.length - q - 1); )
            A--, q++;
        y[y.length - 1] = pe.slice(0, pe.length - q).replace(/^\u200b+/, ""), y[0] = y[0].slice(A).replace(/\u200b+$/, "");
        var Fe = J(o, A), ke = J(f, T.length ? Pe(T).length - q : 0);
        if (y.length > 1 || y[0] || Me(Fe, ke))
          return Xr(e.doc, y, Fe, ke, "+input"), !0;
      }, Ze.prototype.ensurePolled = function() {
        this.forceCompositionEnd();
      }, Ze.prototype.reset = function() {
        this.forceCompositionEnd();
      }, Ze.prototype.forceCompositionEnd = function() {
        this.composing && (clearTimeout(this.readDOMTimeout), this.composing = null, this.updateFromDOM(), this.div.blur(), this.div.focus());
      }, Ze.prototype.readFromDOMSoon = function() {
        var e = this;
        this.readDOMTimeout == null && (this.readDOMTimeout = setTimeout(function() {
          if (e.readDOMTimeout = null, e.composing)
            if (e.composing.done)
              e.composing = null;
            else
              return;
          e.updateFromDOM();
        }, 80));
      }, Ze.prototype.updateFromDOM = function() {
        var e = this;
        (this.cm.isReadOnly() || !this.pollContent()) && Ht(this.cm, function() {
          return Tt(e.cm);
        });
      }, Ze.prototype.setUneditable = function(e) {
        e.contentEditable = "false";
      }, Ze.prototype.onKeyPress = function(e) {
        e.charCode == 0 || this.composing || (e.preventDefault(), this.cm.isReadOnly() || mt(this.cm, ua)(this.cm, String.fromCharCode(e.charCode == null ? e.keyCode : e.charCode), 0));
      }, Ze.prototype.readOnlyChanged = function(e) {
        this.div.contentEditable = String(e != "nocursor");
      }, Ze.prototype.onContextMenu = function() {
      }, Ze.prototype.resetPosition = function() {
      }, Ze.prototype.needsContentAttribute = !0;
      function ml(e, t) {
        var i = Tn(e, t.line);
        if (!i || i.hidden)
          return null;
        var r = we(e.doc, t.line), n = ja(i, r, t.line), a = b(r, e.doc.direction), o = "left";
        if (a) {
          var u = k(a, t.ch);
          o = u % 2 ? "right" : "left";
        }
        var s = Ya(n.map, t.ch, o);
        return s.offset = s.collapse == "right" ? s.end : s.start, s;
      }
      function Gs(e) {
        for (var t = e; t; t = t.parentNode)
          if (/CodeMirror-gutter-wrapper/.test(t.className))
            return !0;
        return !1;
      }
      function Jr(e, t) {
        return t && (e.bad = !0), e;
      }
      function js(e, t, i, r, n) {
        var a = "", o = !1, u = e.doc.lineSeparator(), s = !1;
        function f(A) {
          return function(q) {
            return q.id == A;
          };
        }
        function v() {
          o && (a += u, s && (a += u), o = s = !1);
        }
        function y(A) {
          A && (v(), a += A);
        }
        function T(A) {
          if (A.nodeType == 1) {
            var q = A.getAttribute("cm-text");
            if (q) {
              y(q);
              return;
            }
            var Y = A.getAttribute("cm-marker"), V;
            if (Y) {
              var oe = e.findMarks(J(r, 0), J(n + 1, 0), f(+Y));
              oe.length && (V = oe[0].find(0)) && y(wr(e.doc, V.from, V.to).join(u));
              return;
            }
            if (A.getAttribute("contenteditable") == "false")
              return;
            var pe = /^(pre|div|p|li|table|br)$/i.test(A.nodeName);
            if (!/^br$/i.test(A.nodeName) && A.textContent.length == 0)
              return;
            pe && v();
            for (var le = 0; le < A.childNodes.length; le++)
              T(A.childNodes[le]);
            /^(pre|p)$/i.test(A.nodeName) && (s = !0), pe && (o = !0);
          } else A.nodeType == 3 && y(A.nodeValue.replace(/\u200b/g, "").replace(/\u00a0/g, " "));
        }
        for (; T(t), t != i; )
          t = t.nextSibling, s = !1;
        return a;
      }
      function sn(e, t, i) {
        var r;
        if (t == e.display.lineDiv) {
          if (r = e.display.lineDiv.childNodes[i], !r)
            return Jr(e.clipPos(J(e.display.viewTo - 1)), !0);
          t = null, i = 0;
        } else
          for (r = t; ; r = r.parentNode) {
            if (!r || r == e.display.lineDiv)
              return null;
            if (r.parentNode && r.parentNode == e.display.lineDiv)
              break;
          }
        for (var n = 0; n < e.display.view.length; n++) {
          var a = e.display.view[n];
          if (a.node == r)
            return Ks(a, t, i);
        }
      }
      function Ks(e, t, i) {
        var r = e.text.firstChild, n = !1;
        if (!t || !be(r, t))
          return Jr(J(Ye(e.line), 0), !0);
        if (t == r && (n = !0, t = r.childNodes[i], i = 0, !t)) {
          var a = e.rest ? Pe(e.rest) : e.line;
          return Jr(J(Ye(a), a.text.length), n);
        }
        var o = t.nodeType == 3 ? t : null, u = t;
        for (!o && t.childNodes.length == 1 && t.firstChild.nodeType == 3 && (o = t.firstChild, i && (i = o.nodeValue.length)); u.parentNode != r; )
          u = u.parentNode;
        var s = e.measure, f = s.maps;
        function v(V, oe, pe) {
          for (var le = -1; le < (f ? f.length : 0); le++)
            for (var ve = le < 0 ? s.map : f[le], Fe = 0; Fe < ve.length; Fe += 3) {
              var ke = ve[Fe + 2];
              if (ke == V || ke == oe) {
                var Re = Ye(le < 0 ? e.line : e.rest[le]), Qe = ve[Fe] + pe;
                return (pe < 0 || ke != V) && (Qe = ve[Fe + (pe ? 1 : 0)]), J(Re, Qe);
              }
            }
        }
        var y = v(o, u, i);
        if (y)
          return Jr(y, n);
        for (var T = u.nextSibling, A = o ? o.nodeValue.length - i : 0; T; T = T.nextSibling) {
          if (y = v(T, T.firstChild, 0), y)
            return Jr(J(y.line, y.ch - A), n);
          A += T.textContent.length;
        }
        for (var q = u.previousSibling, Y = i; q; q = q.previousSibling) {
          if (y = v(q, q.firstChild, -1), y)
            return Jr(J(y.line, y.ch + Y), n);
          Y += q.textContent.length;
        }
      }
      var ut = function(e) {
        this.cm = e, this.prevInput = "", this.pollingFast = !1, this.polling = new Ve(), this.hasSelection = !1, this.composing = null, this.resetting = !1;
      };
      ut.prototype.init = function(e) {
        var t = this, i = this, r = this.cm;
        this.createField(e);
        var n = this.textarea;
        e.wrapper.insertBefore(this.wrapper, e.wrapper.firstChild), W && (n.style.width = "0px"), x(n, "input", function() {
          B && z >= 9 && t.hasSelection && (t.hasSelection = null), i.poll();
        }), x(n, "paste", function(o) {
          ce(r, o) || hl(o, r) || (r.state.pasteIncoming = +/* @__PURE__ */ new Date(), i.fastPoll());
        });
        function a(o) {
          if (!ce(r, o)) {
            if (r.somethingSelected())
              un({ lineWise: !1, text: r.getSelections() });
            else if (r.options.lineWiseCopyCut) {
              var u = pl(r);
              un({ lineWise: !0, text: u.text }), o.type == "cut" ? r.setSelections(u.ranges, null, st) : (i.prevInput = "", n.value = u.text.join(`
`), w(n));
            } else
              return;
            o.type == "cut" && (r.state.cutIncoming = +/* @__PURE__ */ new Date());
          }
        }
        x(n, "cut", a), x(n, "copy", a), x(e.scroller, "paste", function(o) {
          if (!(rr(e, o) || ce(r, o))) {
            if (!n.dispatchEvent) {
              r.state.pasteIncoming = +/* @__PURE__ */ new Date(), i.focus();
              return;
            }
            var u = new Event("paste");
            u.clipboardData = o.clipboardData, n.dispatchEvent(u);
          }
        }), x(e.lineSpace, "selectstart", function(o) {
          rr(e, o) || Ae(o);
        }), x(n, "compositionstart", function() {
          var o = r.getCursor("from");
          i.composing && i.composing.range.clear(), i.composing = {
            start: o,
            range: r.markText(o, r.getCursor("to"), { className: "CodeMirror-composing" })
          };
        }), x(n, "compositionend", function() {
          i.composing && (i.poll(), i.composing.range.clear(), i.composing = null);
        });
      }, ut.prototype.createField = function(e) {
        this.wrapper = gl(), this.textarea = this.wrapper.firstChild;
        var t = this.cm.options;
        sa(this.textarea, t.spellcheck, t.autocorrect, t.autocapitalize);
      }, ut.prototype.screenReaderLabelChanged = function(e) {
        e ? this.textarea.setAttribute("aria-label", e) : this.textarea.removeAttribute("aria-label");
      }, ut.prototype.prepareSelection = function() {
        var e = this.cm, t = e.display, i = e.doc, r = ao(e);
        if (e.options.moveInputWithCursor) {
          var n = Ut(e, i.sel.primary().head, "div"), a = t.wrapper.getBoundingClientRect(), o = t.lineDiv.getBoundingClientRect();
          r.teTop = Math.max(0, Math.min(
            t.wrapper.clientHeight - 10,
            n.top + o.top - a.top
          )), r.teLeft = Math.max(0, Math.min(
            t.wrapper.clientWidth - 10,
            n.left + o.left - a.left
          ));
        }
        return r;
      }, ut.prototype.showSelection = function(e) {
        var t = this.cm, i = t.display;
        Ne(i.cursorDiv, e.cursors), Ne(i.selectionDiv, e.selection), e.teTop != null && (this.wrapper.style.top = e.teTop + "px", this.wrapper.style.left = e.teLeft + "px");
      }, ut.prototype.reset = function(e) {
        if (!(this.contextMenuPending || this.composing && e)) {
          var t = this.cm;
          if (this.resetting = !0, t.somethingSelected()) {
            this.prevInput = "";
            var i = t.getSelection();
            this.textarea.value = i, t.state.focused && w(this.textarea), B && z >= 9 && (this.hasSelection = i);
          } else e || (this.prevInput = this.textarea.value = "", B && z >= 9 && (this.hasSelection = null));
          this.resetting = !1;
        }
      }, ut.prototype.getField = function() {
        return this.textarea;
      }, ut.prototype.supportsTouch = function() {
        return !1;
      }, ut.prototype.focus = function() {
        if (this.cm.options.readOnly != "nocursor" && (!U || Ue(_e(this.textarea)) != this.textarea))
          try {
            this.textarea.focus();
          } catch {
          }
      }, ut.prototype.blur = function() {
        this.textarea.blur();
      }, ut.prototype.resetPosition = function() {
        this.wrapper.style.top = this.wrapper.style.left = 0;
      }, ut.prototype.receivedFocus = function() {
        this.slowPoll();
      }, ut.prototype.slowPoll = function() {
        var e = this;
        this.pollingFast || this.polling.set(this.cm.options.pollInterval, function() {
          e.poll(), e.cm.state.focused && e.slowPoll();
        });
      }, ut.prototype.fastPoll = function() {
        var e = !1, t = this;
        t.pollingFast = !0;
        function i() {
          var r = t.poll();
          !r && !e ? (e = !0, t.polling.set(60, i)) : (t.pollingFast = !1, t.slowPoll());
        }
        t.polling.set(20, i);
      }, ut.prototype.poll = function() {
        var e = this, t = this.cm, i = this.textarea, r = this.prevInput;
        if (this.contextMenuPending || this.resetting || !t.state.focused || dn(i) && !r && !this.composing || t.isReadOnly() || t.options.disableInput || t.state.keySeq)
          return !1;
        var n = i.value;
        if (n == r && !t.somethingSelected())
          return !1;
        if (B && z >= 9 && this.hasSelection === n || G && /[\uf700-\uf7ff]/.test(n))
          return t.display.input.reset(), !1;
        if (t.doc.sel == t.display.selForContextMenu) {
          var a = n.charCodeAt(0);
          if (a == 8203 && !r && (r = "​"), a == 8666)
            return this.reset(), this.cm.execCommand("undo");
        }
        for (var o = 0, u = Math.min(r.length, n.length); o < u && r.charCodeAt(o) == n.charCodeAt(o); )
          ++o;
        return Ht(t, function() {
          ua(
            t,
            n.slice(o),
            r.length - o,
            null,
            e.composing ? "*compose" : null
          ), n.length > 1e3 || n.indexOf(`
`) > -1 ? i.value = e.prevInput = "" : e.prevInput = n, e.composing && (e.composing.range.clear(), e.composing.range = t.markText(
            e.composing.start,
            t.getCursor("to"),
            { className: "CodeMirror-composing" }
          ));
        }), !0;
      }, ut.prototype.ensurePolled = function() {
        this.pollingFast && this.poll() && (this.pollingFast = !1);
      }, ut.prototype.onKeyPress = function() {
        B && z >= 9 && (this.hasSelection = null), this.fastPoll();
      }, ut.prototype.onContextMenu = function(e) {
        var t = this, i = t.cm, r = i.display, n = t.textarea;
        t.contextMenuPending && t.contextMenuPending();
        var a = Ar(i, e), o = r.scroller.scrollTop;
        if (!a || ne)
          return;
        var u = i.options.resetSelectionOnContextMenu;
        u && i.doc.sel.contains(a) == -1 && mt(i, kt)(i.doc, dr(a), st);
        var s = n.style.cssText, f = t.wrapper.style.cssText, v = t.wrapper.offsetParent.getBoundingClientRect();
        t.wrapper.style.cssText = "position: static", n.style.cssText = `position: absolute; width: 30px; height: 30px;
      top: ` + (e.clientY - v.top - 5) + "px; left: " + (e.clientX - v.left - 5) + `px;
      z-index: 1000; background: ` + (B ? "rgba(255, 255, 255, .05)" : "transparent") + `;
      outline: none; border-width: 0; outline: none; overflow: hidden; opacity: .05; filter: alpha(opacity=5);`;
        var y;
        te && (y = n.ownerDocument.defaultView.scrollY), r.input.focus(), te && n.ownerDocument.defaultView.scrollTo(null, y), r.input.reset(), i.somethingSelected() || (n.value = t.prevInput = " "), t.contextMenuPending = A, r.selForContextMenu = i.doc.sel, clearTimeout(r.detectingSelectAll);
        function T() {
          if (n.selectionStart != null) {
            var Y = i.somethingSelected(), V = "​" + (Y ? n.value : "");
            n.value = "⇚", n.value = V, t.prevInput = Y ? "" : "​", n.selectionStart = 1, n.selectionEnd = V.length, r.selForContextMenu = i.doc.sel;
          }
        }
        function A() {
          if (t.contextMenuPending == A && (t.contextMenuPending = !1, t.wrapper.style.cssText = f, n.style.cssText = s, B && z < 9 && r.scrollbars.setScrollTop(r.scroller.scrollTop = o), n.selectionStart != null)) {
            (!B || B && z < 9) && T();
            var Y = 0, V = function() {
              r.selForContextMenu == i.doc.sel && n.selectionStart == 0 && n.selectionEnd > 0 && t.prevInput == "​" ? mt(i, Ho)(i) : Y++ < 10 ? r.detectingSelectAll = setTimeout(V, 500) : (r.selForContextMenu = null, r.input.reset());
            };
            r.detectingSelectAll = setTimeout(V, 200);
          }
        }
        if (B && z >= 9 && T(), Xe) {
          Ge(e);
          var q = function() {
            ie(window, "mouseup", q), setTimeout(A, 20);
          };
          x(window, "mouseup", q);
        } else
          setTimeout(A, 50);
      }, ut.prototype.readOnlyChanged = function(e) {
        e || this.reset(), this.textarea.disabled = e == "nocursor", this.textarea.readOnly = !!e;
      }, ut.prototype.setUneditable = function() {
      }, ut.prototype.needsContentAttribute = !1;
      function Xs(e, t) {
        if (t = t ? nt(t) : {}, t.value = e.value, !t.tabindex && e.tabIndex && (t.tabindex = e.tabIndex), !t.placeholder && e.placeholder && (t.placeholder = e.placeholder), t.autofocus == null) {
          var i = Ue(_e(e));
          t.autofocus = i == e || e.getAttribute("autofocus") != null && i == document.body;
        }
        function r() {
          e.value = u.getValue();
        }
        var n;
        if (e.form && (x(e.form, "submit", r), !t.leaveSubmitMethodAlone)) {
          var a = e.form;
          n = a.submit;
          try {
            var o = a.submit = function() {
              r(), a.submit = n, a.submit(), a.submit = o;
            };
          } catch {
          }
        }
        t.finishInit = function(s) {
          s.save = r, s.getTextArea = function() {
            return e;
          }, s.toTextArea = function() {
            s.toTextArea = isNaN, r(), e.parentNode.removeChild(s.getWrapperElement()), e.style.display = "", e.form && (ie(e.form, "submit", r), !t.leaveSubmitMethodAlone && typeof e.form.submit == "function" && (e.form.submit = n));
          };
        }, e.style.display = "none";
        var u = tt(
          function(s) {
            return e.parentNode.insertBefore(s, e.nextSibling);
          },
          t
        );
        return u;
      }
      function Ys(e) {
        e.off = ie, e.on = x, e.wheelEventPixels = ts, e.Doc = Bt, e.splitLines = yr, e.countColumn = Ke, e.findColumn = wt, e.isWordChar = E, e.Pass = Je, e.signal = me, e.Line = Hr, e.changeEnd = pr, e.scrollbarModel = co, e.Pos = J, e.cmpPos = Me, e.modes = zt, e.mimeModes = At, e.resolveMode = br, e.getMode = ti, e.modeExtensions = Vt, e.extendMode = Ql, e.copyState = Cr, e.startState = ma, e.innerMode = gn, e.commands = Si, e.keyMap = nr, e.keyName = Jo, e.isModifierKey = Qo, e.lookupKey = Zr, e.normalizeKeyMap = ws, e.StringStream = ft, e.SharedTextMarker = Ci, e.TextMarker = vr, e.LineWidget = bi, e.e_preventDefault = Ae, e.e_stopPropagation = He, e.e_stop = Ge, e.addClass = it, e.contains = be, e.rmClass = Le, e.keyNames = mr;
      }
      zs(tt), Us(tt);
      var Zs = "iter insert remove copy getEditor constructor".split(" ");
      for (var fn in Bt.prototype)
        Bt.prototype.hasOwnProperty(fn) && We(Zs, fn) < 0 && (tt.prototype[fn] = /* @__PURE__ */ (function(e) {
          return function() {
            return e.apply(this.doc, arguments);
          };
        })(Bt.prototype[fn]));
      return et(Bt), tt.inputStyles = { textarea: ut, contenteditable: Ze }, tt.defineMode = function(e) {
        !tt.defaults.mode && e != "null" && (tt.defaults.mode = e), Jt.apply(this, arguments);
      }, tt.defineMIME = Dr, tt.defineMode("null", function() {
        return { token: function(e) {
          return e.skipToEnd();
        } };
      }), tt.defineMIME("text/plain", "null"), tt.defineExtension = function(e, t) {
        tt.prototype[e] = t;
      }, tt.defineDocExtension = function(e, t) {
        Bt.prototype[e] = t;
      }, tt.fromTextArea = Xs, Ys(tt), tt.version = "5.65.21", tt;
    }));
  })(cn)), cn.exports;
}
var yl = { exports: {} }, Dl;
function Vs() {
  return Dl || (Dl = 1, (function(ue, xe) {
    (function(F) {
      F(_t());
    })(function(F) {
      var _ = /^(\s*)(>[> ]*|[*+-] \[[x ]\]\s|[*+-]\s|(\d+)([.)]))(\s*)/, M = /^(\s*)(>[> ]*|[*+-] \[[x ]\]|[*+-]|(\d+)[.)])(\s*)$/, R = /[*+-]\s/;
      F.commands.newlineAndIndentContinueMarkdownList = function(P) {
        if (P.getOption("disableInput")) return F.Pass;
        for (var B = P.listSelections(), z = [], te = 0; te < B.length; te++) {
          var Q = B[te].head, K = P.getStateAfter(Q.line), he = F.innerMode(P.getMode(), K);
          if (he.mode.name !== "markdown" && he.mode.helperType !== "markdown") {
            P.execCommand("newlineAndIndent");
            return;
          } else
            K = he.state;
          var ne = K.list !== !1, Se = K.quote !== 0, de = P.getLine(Q.line), ge = _.exec(de), W = /^\s*$/.test(de.slice(0, Q.ch));
          if (!B[te].empty() || !ne && !Se || !ge || W) {
            P.execCommand("newlineAndIndent");
            return;
          }
          if (M.test(de)) {
            var X = Se && />\s*$/.test(de), U = !/>\s*$/.test(de);
            (X || U) && P.replaceRange("", {
              line: Q.line,
              ch: 0
            }, {
              line: Q.line,
              ch: Q.ch + 1
            }), z[te] = `
`;
          } else {
            var G = ge[1], se = ge[5], Z = !(R.test(ge[2]) || ge[2].indexOf(">") >= 0), fe = Z ? parseInt(ge[3], 10) + 1 + ge[4] : ge[2].replace("x", " ");
            z[te] = `
` + G + fe + se, Z && N(P, Q);
          }
        }
        P.replaceSelections(z);
      };
      function N(P, B) {
        var z = B.line, te = 0, Q = 0, K = _.exec(P.getLine(z)), he = K[1];
        do {
          te += 1;
          var ne = z + te, Se = P.getLine(ne), de = _.exec(Se);
          if (de) {
            var ge = de[1], W = parseInt(K[3], 10) + te - Q, X = parseInt(de[3], 10), U = X;
            if (he === ge && !isNaN(X))
              W === X && (U = X + 1), W > X && (U = W + 1), P.replaceRange(
                Se.replace(_, ge + U + de[4] + de[5]),
                {
                  line: ne,
                  ch: 0
                },
                {
                  line: ne,
                  ch: Se.length
                }
              );
            else {
              if (he.length > ge.length || he.length < ge.length && te === 1) return;
              Q += 1;
            }
          }
        } while (de);
      }
    });
  })()), yl.exports;
}
var bl = {}, Cl;
function ef() {
  if (Cl) return bl;
  Cl = 1;
  var ue = _t();
  return ue.commands.tabAndIndentMarkdownList = function(xe) {
    var F = xe.listSelections(), _ = F[0].head, M = xe.getStateAfter(_.line), R = M.list !== !1;
    if (R) {
      xe.execCommand("indentMore");
      return;
    }
    if (xe.options.indentWithTabs)
      xe.execCommand("insertTab");
    else {
      var N = Array(xe.options.tabSize + 1).join(" ");
      xe.replaceSelection(N);
    }
  }, ue.commands.shiftTabAndUnindentMarkdownList = function(xe) {
    var F = xe.listSelections(), _ = F[0].head, M = xe.getStateAfter(_.line), R = M.list !== !1;
    if (R) {
      xe.execCommand("indentLess");
      return;
    }
    if (xe.options.indentWithTabs)
      xe.execCommand("insertTab");
    else {
      var N = Array(xe.options.tabSize + 1).join(" ");
      xe.replaceSelection(N);
    }
  }, bl;
}
var wl = { exports: {} }, kl;
function tf() {
  return kl || (kl = 1, (function(ue, xe) {
    (function(F) {
      F(_t());
    })(function(F) {
      F.defineOption("fullScreen", !1, function(R, N, P) {
        P == F.Init && (P = !1), !P != !N && (N ? _(R) : M(R));
      });
      function _(R) {
        var N = R.getWrapperElement();
        R.state.fullScreenRestore = {
          scrollTop: window.pageYOffset,
          scrollLeft: window.pageXOffset,
          width: N.style.width,
          height: N.style.height
        }, N.style.width = "", N.style.height = "auto", N.className += " CodeMirror-fullscreen", document.documentElement.style.overflow = "hidden", R.refresh();
      }
      function M(R) {
        var N = R.getWrapperElement();
        N.className = N.className.replace(/\s*CodeMirror-fullscreen\b/, ""), document.documentElement.style.overflow = "";
        var P = R.state.fullScreenRestore;
        N.style.width = P.width, N.style.height = P.height, window.scrollTo(P.scrollLeft, P.scrollTop), R.refresh();
      }
    });
  })()), wl.exports;
}
var Sl = { exports: {} }, Fl = { exports: {} }, Al;
function Xl() {
  return Al || (Al = 1, (function(ue, xe) {
    (function(F) {
      F(_t());
    })(function(F) {
      var _ = {
        autoSelfClosers: {
          area: !0,
          base: !0,
          br: !0,
          col: !0,
          command: !0,
          embed: !0,
          frame: !0,
          hr: !0,
          img: !0,
          input: !0,
          keygen: !0,
          link: !0,
          meta: !0,
          param: !0,
          source: !0,
          track: !0,
          wbr: !0,
          menuitem: !0
        },
        implicitlyClosed: {
          dd: !0,
          li: !0,
          optgroup: !0,
          option: !0,
          p: !0,
          rp: !0,
          rt: !0,
          tbody: !0,
          td: !0,
          tfoot: !0,
          th: !0,
          tr: !0
        },
        contextGrabbers: {
          dd: { dd: !0, dt: !0 },
          dt: { dd: !0, dt: !0 },
          li: { li: !0 },
          option: { option: !0, optgroup: !0 },
          optgroup: { optgroup: !0 },
          p: {
            address: !0,
            article: !0,
            aside: !0,
            blockquote: !0,
            dir: !0,
            div: !0,
            dl: !0,
            fieldset: !0,
            footer: !0,
            form: !0,
            h1: !0,
            h2: !0,
            h3: !0,
            h4: !0,
            h5: !0,
            h6: !0,
            header: !0,
            hgroup: !0,
            hr: !0,
            menu: !0,
            nav: !0,
            ol: !0,
            p: !0,
            pre: !0,
            section: !0,
            table: !0,
            ul: !0
          },
          rp: { rp: !0, rt: !0 },
          rt: { rp: !0, rt: !0 },
          tbody: { tbody: !0, tfoot: !0 },
          td: { td: !0, th: !0 },
          tfoot: { tbody: !0 },
          th: { td: !0, th: !0 },
          thead: { tbody: !0, tfoot: !0 },
          tr: { tr: !0 }
        },
        doNotIndent: { pre: !0 },
        allowUnquoted: !0,
        allowMissing: !0,
        caseFold: !0
      }, M = {
        autoSelfClosers: {},
        implicitlyClosed: {},
        contextGrabbers: {},
        doNotIndent: {},
        allowUnquoted: !1,
        allowMissing: !1,
        allowMissingTagName: !1,
        caseFold: !1
      };
      F.defineMode("xml", function(R, N) {
        var P = R.indentUnit, B = {}, z = N.htmlMode ? _ : M;
        for (var te in z) B[te] = z[te];
        for (var te in N) B[te] = N[te];
        var Q, K;
        function he(L, ee) {
          function $(it) {
            return ee.tokenize = it, it(L, ee);
          }
          var be = L.next();
          if (be == "<")
            return L.eat("!") ? L.eat("[") ? L.match("CDATA[") ? $(de("atom", "]]>")) : null : L.match("--") ? $(de("comment", "-->")) : L.match("DOCTYPE", !0, !0) ? (L.eatWhile(/[\w\._\-]/), $(ge(1))) : null : L.eat("?") ? (L.eatWhile(/[\w\._\-]/), ee.tokenize = de("meta", "?>"), "meta") : (Q = L.eat("/") ? "closeTag" : "openTag", ee.tokenize = ne, "tag bracket");
          if (be == "&") {
            var Ue;
            return L.eat("#") ? L.eat("x") ? Ue = L.eatWhile(/[a-fA-F\d]/) && L.eat(";") : Ue = L.eatWhile(/[\d]/) && L.eat(";") : Ue = L.eatWhile(/[\w\.\-:]/) && L.eat(";"), Ue ? "atom" : "error";
          } else
            return L.eatWhile(/[^&<]/), null;
        }
        he.isInText = !0;
        function ne(L, ee) {
          var $ = L.next();
          if ($ == ">" || $ == "/" && L.eat(">"))
            return ee.tokenize = he, Q = $ == ">" ? "endTag" : "selfcloseTag", "tag bracket";
          if ($ == "=")
            return Q = "equals", null;
          if ($ == "<") {
            ee.tokenize = he, ee.state = se, ee.tagName = ee.tagStart = null;
            var be = ee.tokenize(L, ee);
            return be ? be + " tag error" : "tag error";
          } else return /[\'\"]/.test($) ? (ee.tokenize = Se($), ee.stringStartCol = L.column(), ee.tokenize(L, ee)) : (L.match(/^[^\s\u00a0=<>\"\']*[^\s\u00a0=<>\"\'\/]/), "word");
        }
        function Se(L) {
          var ee = function($, be) {
            for (; !$.eol(); )
              if ($.next() == L) {
                be.tokenize = ne;
                break;
              }
            return "string";
          };
          return ee.isInAttribute = !0, ee;
        }
        function de(L, ee) {
          return function($, be) {
            for (; !$.eol(); ) {
              if ($.match(ee)) {
                be.tokenize = he;
                break;
              }
              $.next();
            }
            return L;
          };
        }
        function ge(L) {
          return function(ee, $) {
            for (var be; (be = ee.next()) != null; ) {
              if (be == "<")
                return $.tokenize = ge(L + 1), $.tokenize(ee, $);
              if (be == ">")
                if (L == 1) {
                  $.tokenize = he;
                  break;
                } else
                  return $.tokenize = ge(L - 1), $.tokenize(ee, $);
            }
            return "meta";
          };
        }
        function W(L) {
          return L && L.toLowerCase();
        }
        function X(L, ee, $) {
          this.prev = L.context, this.tagName = ee || "", this.indent = L.indented, this.startOfLine = $, (B.doNotIndent.hasOwnProperty(ee) || L.context && L.context.noIndent) && (this.noIndent = !0);
        }
        function U(L) {
          L.context && (L.context = L.context.prev);
        }
        function G(L, ee) {
          for (var $; ; ) {
            if (!L.context || ($ = L.context.tagName, !B.contextGrabbers.hasOwnProperty(W($)) || !B.contextGrabbers[W($)].hasOwnProperty(W(ee))))
              return;
            U(L);
          }
        }
        function se(L, ee, $) {
          return L == "openTag" ? ($.tagStart = ee.column(), Z) : L == "closeTag" ? fe : se;
        }
        function Z(L, ee, $) {
          return L == "word" ? ($.tagName = ee.current(), K = "tag", ae) : B.allowMissingTagName && L == "endTag" ? (K = "tag bracket", ae(L, ee, $)) : (K = "error", Z);
        }
        function fe(L, ee, $) {
          if (L == "word") {
            var be = ee.current();
            return $.context && $.context.tagName != be && B.implicitlyClosed.hasOwnProperty(W($.context.tagName)) && U($), $.context && $.context.tagName == be || B.matchClosing === !1 ? (K = "tag", ye) : (K = "tag error", Xe);
          } else return B.allowMissingTagName && L == "endTag" ? (K = "tag bracket", ye(L, ee, $)) : (K = "error", Xe);
        }
        function ye(L, ee, $) {
          return L != "endTag" ? (K = "error", ye) : (U($), se);
        }
        function Xe(L, ee, $) {
          return K = "error", ye(L, ee, $);
        }
        function ae(L, ee, $) {
          if (L == "word")
            return K = "attribute", Le;
          if (L == "endTag" || L == "selfcloseTag") {
            var be = $.tagName, Ue = $.tagStart;
            return $.tagName = $.tagStart = null, L == "selfcloseTag" || B.autoSelfClosers.hasOwnProperty(W(be)) ? G($, be) : (G($, be), $.context = new X($, be, Ue == $.indented)), se;
          }
          return K = "error", ae;
        }
        function Le(L, ee, $) {
          return L == "equals" ? Ee : (B.allowMissing || (K = "error"), ae(L, ee, $));
        }
        function Ee(L, ee, $) {
          return L == "string" ? Ne : L == "word" && B.allowUnquoted ? (K = "string", ae) : (K = "error", ae(L, ee, $));
        }
        function Ne(L, ee, $) {
          return L == "string" ? Ne : ae(L, ee, $);
        }
        return {
          startState: function(L) {
            var ee = {
              tokenize: he,
              state: se,
              indented: L || 0,
              tagName: null,
              tagStart: null,
              context: null
            };
            return L != null && (ee.baseIndent = L), ee;
          },
          token: function(L, ee) {
            if (!ee.tagName && L.sol() && (ee.indented = L.indentation()), L.eatSpace()) return null;
            Q = null;
            var $ = ee.tokenize(L, ee);
            return ($ || Q) && $ != "comment" && (K = null, ee.state = ee.state(Q || $, L, ee), K && ($ = K == "error" ? $ + " error" : K)), $;
          },
          indent: function(L, ee, $) {
            var be = L.context;
            if (L.tokenize.isInAttribute)
              return L.tagStart == L.indented ? L.stringStartCol + 1 : L.indented + P;
            if (be && be.noIndent) return F.Pass;
            if (L.tokenize != ne && L.tokenize != he)
              return $ ? $.match(/^(\s*)/)[0].length : 0;
            if (L.tagName)
              return B.multilineTagIndentPastTag !== !1 ? L.tagStart + L.tagName.length + 2 : L.tagStart + P * (B.multilineTagIndentFactor || 1);
            if (B.alignCDATA && /<!\[CDATA\[/.test(ee)) return 0;
            var Ue = ee && /^<(\/)?([\w_:\.-]*)/.exec(ee);
            if (Ue && Ue[1])
              for (; be; )
                if (be.tagName == Ue[2]) {
                  be = be.prev;
                  break;
                } else if (B.implicitlyClosed.hasOwnProperty(W(be.tagName)))
                  be = be.prev;
                else
                  break;
            else if (Ue)
              for (; be; ) {
                var it = B.contextGrabbers[W(be.tagName)];
                if (it && it.hasOwnProperty(W(Ue[2])))
                  be = be.prev;
                else
                  break;
              }
            for (; be && be.prev && !be.startOfLine; )
              be = be.prev;
            return be ? be.indent + P : L.baseIndent || 0;
          },
          electricInput: /<\/[\s\w:]+>$/,
          blockCommentStart: "<!--",
          blockCommentEnd: "-->",
          configuration: B.htmlMode ? "html" : "xml",
          helperType: B.htmlMode ? "html" : "xml",
          skipAttribute: function(L) {
            L.state == Ee && (L.state = ae);
          },
          xmlCurrentTag: function(L) {
            return L.tagName ? { name: L.tagName, close: L.type == "closeTag" } : null;
          },
          xmlCurrentContext: function(L) {
            for (var ee = [], $ = L.context; $; $ = $.prev)
              ee.push($.tagName);
            return ee.reverse();
          }
        };
      }), F.defineMIME("text/xml", "xml"), F.defineMIME("application/xml", "xml"), F.mimeModes.hasOwnProperty("text/html") || F.defineMIME("text/html", { name: "xml", htmlMode: !0 });
    });
  })()), Fl.exports;
}
var El = { exports: {} }, Ll;
function rf() {
  return Ll || (Ll = 1, (function(ue, xe) {
    (function(F) {
      F(_t());
    })(function(F) {
      F.modeInfo = [
        { name: "APL", mime: "text/apl", mode: "apl", ext: ["dyalog", "apl"] },
        { name: "PGP", mimes: ["application/pgp", "application/pgp-encrypted", "application/pgp-keys", "application/pgp-signature"], mode: "asciiarmor", ext: ["asc", "pgp", "sig"] },
        { name: "ASN.1", mime: "text/x-ttcn-asn", mode: "asn.1", ext: ["asn", "asn1"] },
        { name: "Asterisk", mime: "text/x-asterisk", mode: "asterisk", file: /^extensions\.conf$/i },
        { name: "Brainfuck", mime: "text/x-brainfuck", mode: "brainfuck", ext: ["b", "bf"] },
        { name: "C", mime: "text/x-csrc", mode: "clike", ext: ["c", "h", "ino"] },
        { name: "C++", mime: "text/x-c++src", mode: "clike", ext: ["cpp", "c++", "cc", "cxx", "hpp", "h++", "hh", "hxx"], alias: ["cpp"] },
        { name: "Cobol", mime: "text/x-cobol", mode: "cobol", ext: ["cob", "cpy", "cbl"] },
        { name: "C#", mime: "text/x-csharp", mode: "clike", ext: ["cs"], alias: ["csharp", "cs"] },
        { name: "Clojure", mime: "text/x-clojure", mode: "clojure", ext: ["clj", "cljc", "cljx"] },
        { name: "ClojureScript", mime: "text/x-clojurescript", mode: "clojure", ext: ["cljs"] },
        { name: "Closure Stylesheets (GSS)", mime: "text/x-gss", mode: "css", ext: ["gss"] },
        { name: "CMake", mime: "text/x-cmake", mode: "cmake", ext: ["cmake", "cmake.in"], file: /^CMakeLists\.txt$/ },
        { name: "CoffeeScript", mimes: ["application/vnd.coffeescript", "text/coffeescript", "text/x-coffeescript"], mode: "coffeescript", ext: ["coffee"], alias: ["coffee", "coffee-script"] },
        { name: "Common Lisp", mime: "text/x-common-lisp", mode: "commonlisp", ext: ["cl", "lisp", "el"], alias: ["lisp"] },
        { name: "Cypher", mime: "application/x-cypher-query", mode: "cypher", ext: ["cyp", "cypher"] },
        { name: "Cython", mime: "text/x-cython", mode: "python", ext: ["pyx", "pxd", "pxi"] },
        { name: "Crystal", mime: "text/x-crystal", mode: "crystal", ext: ["cr"] },
        { name: "CSS", mime: "text/css", mode: "css", ext: ["css"] },
        { name: "CQL", mime: "text/x-cassandra", mode: "sql", ext: ["cql"] },
        { name: "D", mime: "text/x-d", mode: "d", ext: ["d"] },
        { name: "Dart", mimes: ["application/dart", "text/x-dart"], mode: "dart", ext: ["dart"] },
        { name: "diff", mime: "text/x-diff", mode: "diff", ext: ["diff", "patch"] },
        { name: "Django", mime: "text/x-django", mode: "django" },
        { name: "Dockerfile", mime: "text/x-dockerfile", mode: "dockerfile", file: /^Dockerfile$/ },
        { name: "DTD", mime: "application/xml-dtd", mode: "dtd", ext: ["dtd"] },
        { name: "Dylan", mime: "text/x-dylan", mode: "dylan", ext: ["dylan", "dyl", "intr"] },
        { name: "EBNF", mime: "text/x-ebnf", mode: "ebnf" },
        { name: "ECL", mime: "text/x-ecl", mode: "ecl", ext: ["ecl"] },
        { name: "edn", mime: "application/edn", mode: "clojure", ext: ["edn"] },
        { name: "Eiffel", mime: "text/x-eiffel", mode: "eiffel", ext: ["e"] },
        { name: "Elm", mime: "text/x-elm", mode: "elm", ext: ["elm"] },
        { name: "Embedded JavaScript", mime: "application/x-ejs", mode: "htmlembedded", ext: ["ejs"] },
        { name: "Embedded Ruby", mime: "application/x-erb", mode: "htmlembedded", ext: ["erb"] },
        { name: "Erlang", mime: "text/x-erlang", mode: "erlang", ext: ["erl"] },
        { name: "Esper", mime: "text/x-esper", mode: "sql" },
        { name: "Factor", mime: "text/x-factor", mode: "factor", ext: ["factor"] },
        { name: "FCL", mime: "text/x-fcl", mode: "fcl" },
        { name: "Forth", mime: "text/x-forth", mode: "forth", ext: ["forth", "fth", "4th"] },
        { name: "Fortran", mime: "text/x-fortran", mode: "fortran", ext: ["f", "for", "f77", "f90", "f95"] },
        { name: "F#", mime: "text/x-fsharp", mode: "mllike", ext: ["fs"], alias: ["fsharp"] },
        { name: "Gas", mime: "text/x-gas", mode: "gas", ext: ["s"] },
        { name: "Gherkin", mime: "text/x-feature", mode: "gherkin", ext: ["feature"] },
        { name: "GitHub Flavored Markdown", mime: "text/x-gfm", mode: "gfm", file: /^(readme|contributing|history)\.md$/i },
        { name: "Go", mime: "text/x-go", mode: "go", ext: ["go"] },
        { name: "Groovy", mime: "text/x-groovy", mode: "groovy", ext: ["groovy", "gradle"], file: /^Jenkinsfile$/ },
        { name: "HAML", mime: "text/x-haml", mode: "haml", ext: ["haml"] },
        { name: "Haskell", mime: "text/x-haskell", mode: "haskell", ext: ["hs"] },
        { name: "Haskell (Literate)", mime: "text/x-literate-haskell", mode: "haskell-literate", ext: ["lhs"] },
        { name: "Haxe", mime: "text/x-haxe", mode: "haxe", ext: ["hx"] },
        { name: "HXML", mime: "text/x-hxml", mode: "haxe", ext: ["hxml"] },
        { name: "ASP.NET", mime: "application/x-aspx", mode: "htmlembedded", ext: ["aspx"], alias: ["asp", "aspx"] },
        { name: "HTML", mime: "text/html", mode: "htmlmixed", ext: ["html", "htm", "handlebars", "hbs"], alias: ["xhtml"] },
        { name: "HTTP", mime: "message/http", mode: "http" },
        { name: "IDL", mime: "text/x-idl", mode: "idl", ext: ["pro"] },
        { name: "Pug", mime: "text/x-pug", mode: "pug", ext: ["jade", "pug"], alias: ["jade"] },
        { name: "Java", mime: "text/x-java", mode: "clike", ext: ["java"] },
        { name: "Java Server Pages", mime: "application/x-jsp", mode: "htmlembedded", ext: ["jsp"], alias: ["jsp"] },
        {
          name: "JavaScript",
          mimes: ["text/javascript", "text/ecmascript", "application/javascript", "application/x-javascript", "application/ecmascript"],
          mode: "javascript",
          ext: ["js"],
          alias: ["ecmascript", "js", "node"]
        },
        { name: "JSON", mimes: ["application/json", "application/x-json"], mode: "javascript", ext: ["json", "map"], alias: ["json5"] },
        { name: "JSON-LD", mime: "application/ld+json", mode: "javascript", ext: ["jsonld"], alias: ["jsonld"] },
        { name: "JSX", mime: "text/jsx", mode: "jsx", ext: ["jsx"] },
        { name: "Jinja2", mime: "text/jinja2", mode: "jinja2", ext: ["j2", "jinja", "jinja2"] },
        { name: "Julia", mime: "text/x-julia", mode: "julia", ext: ["jl"], alias: ["jl"] },
        { name: "Kotlin", mime: "text/x-kotlin", mode: "clike", ext: ["kt"] },
        { name: "LESS", mime: "text/x-less", mode: "css", ext: ["less"] },
        { name: "LiveScript", mime: "text/x-livescript", mode: "livescript", ext: ["ls"], alias: ["ls"] },
        { name: "Lua", mime: "text/x-lua", mode: "lua", ext: ["lua"] },
        { name: "Markdown", mime: "text/x-markdown", mode: "markdown", ext: ["markdown", "md", "mkd"] },
        { name: "mIRC", mime: "text/mirc", mode: "mirc" },
        { name: "MariaDB SQL", mime: "text/x-mariadb", mode: "sql" },
        { name: "Mathematica", mime: "text/x-mathematica", mode: "mathematica", ext: ["m", "nb", "wl", "wls"] },
        { name: "Modelica", mime: "text/x-modelica", mode: "modelica", ext: ["mo"] },
        { name: "MUMPS", mime: "text/x-mumps", mode: "mumps", ext: ["mps"] },
        { name: "MS SQL", mime: "text/x-mssql", mode: "sql" },
        { name: "mbox", mime: "application/mbox", mode: "mbox", ext: ["mbox"] },
        { name: "MySQL", mime: "text/x-mysql", mode: "sql" },
        { name: "Nginx", mime: "text/x-nginx-conf", mode: "nginx", file: /nginx.*\.conf$/i },
        { name: "NSIS", mime: "text/x-nsis", mode: "nsis", ext: ["nsh", "nsi"] },
        {
          name: "NTriples",
          mimes: ["application/n-triples", "application/n-quads", "text/n-triples"],
          mode: "ntriples",
          ext: ["nt", "nq"]
        },
        { name: "Objective-C", mime: "text/x-objectivec", mode: "clike", ext: ["m"], alias: ["objective-c", "objc"] },
        { name: "Objective-C++", mime: "text/x-objectivec++", mode: "clike", ext: ["mm"], alias: ["objective-c++", "objc++"] },
        { name: "OCaml", mime: "text/x-ocaml", mode: "mllike", ext: ["ml", "mli", "mll", "mly"] },
        { name: "Octave", mime: "text/x-octave", mode: "octave", ext: ["m"] },
        { name: "Oz", mime: "text/x-oz", mode: "oz", ext: ["oz"] },
        { name: "Pascal", mime: "text/x-pascal", mode: "pascal", ext: ["p", "pas"] },
        { name: "PEG.js", mime: "null", mode: "pegjs", ext: ["jsonld"] },
        { name: "Perl", mime: "text/x-perl", mode: "perl", ext: ["pl", "pm"] },
        { name: "PHP", mimes: ["text/x-php", "application/x-httpd-php", "application/x-httpd-php-open"], mode: "php", ext: ["php", "php3", "php4", "php5", "php7", "phtml"] },
        { name: "Pig", mime: "text/x-pig", mode: "pig", ext: ["pig"] },
        { name: "Plain Text", mime: "text/plain", mode: "null", ext: ["txt", "text", "conf", "def", "list", "log"] },
        { name: "PLSQL", mime: "text/x-plsql", mode: "sql", ext: ["pls"] },
        { name: "PostgreSQL", mime: "text/x-pgsql", mode: "sql" },
        { name: "PowerShell", mime: "application/x-powershell", mode: "powershell", ext: ["ps1", "psd1", "psm1"] },
        { name: "Properties files", mime: "text/x-properties", mode: "properties", ext: ["properties", "ini", "in"], alias: ["ini", "properties"] },
        { name: "ProtoBuf", mime: "text/x-protobuf", mode: "protobuf", ext: ["proto"] },
        { name: "Python", mime: "text/x-python", mode: "python", ext: ["BUILD", "bzl", "py", "pyw"], file: /^(BUCK|BUILD)$/ },
        { name: "Puppet", mime: "text/x-puppet", mode: "puppet", ext: ["pp"] },
        { name: "Q", mime: "text/x-q", mode: "q", ext: ["q"] },
        { name: "R", mime: "text/x-rsrc", mode: "r", ext: ["r", "R"], alias: ["rscript"] },
        { name: "reStructuredText", mime: "text/x-rst", mode: "rst", ext: ["rst"], alias: ["rst"] },
        { name: "RPM Changes", mime: "text/x-rpm-changes", mode: "rpm" },
        { name: "RPM Spec", mime: "text/x-rpm-spec", mode: "rpm", ext: ["spec"] },
        { name: "Ruby", mime: "text/x-ruby", mode: "ruby", ext: ["rb"], alias: ["jruby", "macruby", "rake", "rb", "rbx"] },
        { name: "Rust", mime: "text/x-rustsrc", mode: "rust", ext: ["rs"] },
        { name: "SAS", mime: "text/x-sas", mode: "sas", ext: ["sas"] },
        { name: "Sass", mime: "text/x-sass", mode: "sass", ext: ["sass"] },
        { name: "Scala", mime: "text/x-scala", mode: "clike", ext: ["scala"] },
        { name: "Scheme", mime: "text/x-scheme", mode: "scheme", ext: ["scm", "ss"] },
        { name: "SCSS", mime: "text/x-scss", mode: "css", ext: ["scss"] },
        { name: "Shell", mimes: ["text/x-sh", "application/x-sh"], mode: "shell", ext: ["sh", "ksh", "bash"], alias: ["bash", "sh", "zsh"], file: /^PKGBUILD$/ },
        { name: "Sieve", mime: "application/sieve", mode: "sieve", ext: ["siv", "sieve"] },
        { name: "Slim", mimes: ["text/x-slim", "application/x-slim"], mode: "slim", ext: ["slim"] },
        { name: "Smalltalk", mime: "text/x-stsrc", mode: "smalltalk", ext: ["st"] },
        { name: "Smarty", mime: "text/x-smarty", mode: "smarty", ext: ["tpl"] },
        { name: "Solr", mime: "text/x-solr", mode: "solr" },
        { name: "SML", mime: "text/x-sml", mode: "mllike", ext: ["sml", "sig", "fun", "smackspec"] },
        { name: "Soy", mime: "text/x-soy", mode: "soy", ext: ["soy"], alias: ["closure template"] },
        { name: "SPARQL", mime: "application/sparql-query", mode: "sparql", ext: ["rq", "sparql"], alias: ["sparul"] },
        { name: "Spreadsheet", mime: "text/x-spreadsheet", mode: "spreadsheet", alias: ["excel", "formula"] },
        { name: "SQL", mime: "text/x-sql", mode: "sql", ext: ["sql"] },
        { name: "SQLite", mime: "text/x-sqlite", mode: "sql" },
        { name: "Squirrel", mime: "text/x-squirrel", mode: "clike", ext: ["nut"] },
        { name: "Stylus", mime: "text/x-styl", mode: "stylus", ext: ["styl"] },
        { name: "Swift", mime: "text/x-swift", mode: "swift", ext: ["swift"] },
        { name: "sTeX", mime: "text/x-stex", mode: "stex" },
        { name: "LaTeX", mime: "text/x-latex", mode: "stex", ext: ["text", "ltx", "tex"], alias: ["tex"] },
        { name: "SystemVerilog", mime: "text/x-systemverilog", mode: "verilog", ext: ["v", "sv", "svh"] },
        { name: "Tcl", mime: "text/x-tcl", mode: "tcl", ext: ["tcl"] },
        { name: "Textile", mime: "text/x-textile", mode: "textile", ext: ["textile"] },
        { name: "TiddlyWiki", mime: "text/x-tiddlywiki", mode: "tiddlywiki" },
        { name: "Tiki wiki", mime: "text/tiki", mode: "tiki" },
        { name: "TOML", mime: "text/x-toml", mode: "toml", ext: ["toml"] },
        { name: "Tornado", mime: "text/x-tornado", mode: "tornado" },
        { name: "troff", mime: "text/troff", mode: "troff", ext: ["1", "2", "3", "4", "5", "6", "7", "8", "9"] },
        { name: "TTCN", mime: "text/x-ttcn", mode: "ttcn", ext: ["ttcn", "ttcn3", "ttcnpp"] },
        { name: "TTCN_CFG", mime: "text/x-ttcn-cfg", mode: "ttcn-cfg", ext: ["cfg"] },
        { name: "Turtle", mime: "text/turtle", mode: "turtle", ext: ["ttl"] },
        { name: "TypeScript", mime: "application/typescript", mode: "javascript", ext: ["ts"], alias: ["ts"] },
        { name: "TypeScript-JSX", mime: "text/typescript-jsx", mode: "jsx", ext: ["tsx"], alias: ["tsx"] },
        { name: "Twig", mime: "text/x-twig", mode: "twig" },
        { name: "Web IDL", mime: "text/x-webidl", mode: "webidl", ext: ["webidl"] },
        { name: "VB.NET", mime: "text/x-vb", mode: "vb", ext: ["vb"] },
        { name: "VBScript", mime: "text/vbscript", mode: "vbscript", ext: ["vbs"] },
        { name: "Velocity", mime: "text/velocity", mode: "velocity", ext: ["vtl"] },
        { name: "Verilog", mime: "text/x-verilog", mode: "verilog", ext: ["v"] },
        { name: "VHDL", mime: "text/x-vhdl", mode: "vhdl", ext: ["vhd", "vhdl"] },
        { name: "Vue.js Component", mimes: ["script/x-vue", "text/x-vue"], mode: "vue", ext: ["vue"] },
        { name: "XML", mimes: ["application/xml", "text/xml"], mode: "xml", ext: ["xml", "xsl", "xsd", "svg"], alias: ["rss", "wsdl", "xsd"] },
        { name: "XQuery", mime: "application/xquery", mode: "xquery", ext: ["xy", "xquery"] },
        { name: "Yacas", mime: "text/x-yacas", mode: "yacas", ext: ["ys"] },
        { name: "YAML", mimes: ["text/x-yaml", "text/yaml"], mode: "yaml", ext: ["yaml", "yml"], alias: ["yml"] },
        { name: "Z80", mime: "text/x-z80", mode: "z80", ext: ["z80"] },
        { name: "mscgen", mime: "text/x-mscgen", mode: "mscgen", ext: ["mscgen", "mscin", "msc"] },
        { name: "xu", mime: "text/x-xu", mode: "mscgen", ext: ["xu"] },
        { name: "msgenny", mime: "text/x-msgenny", mode: "mscgen", ext: ["msgenny"] },
        { name: "WebAssembly", mime: "text/webassembly", mode: "wast", ext: ["wat", "wast"] }
      ];
      for (var _ = 0; _ < F.modeInfo.length; _++) {
        var M = F.modeInfo[_];
        M.mimes && (M.mime = M.mimes[0]);
      }
      F.findModeByMIME = function(R) {
        R = R.toLowerCase();
        for (var N = 0; N < F.modeInfo.length; N++) {
          var P = F.modeInfo[N];
          if (P.mime == R) return P;
          if (P.mimes) {
            for (var B = 0; B < P.mimes.length; B++)
              if (P.mimes[B] == R) return P;
          }
        }
        if (/\+xml$/.test(R)) return F.findModeByMIME("application/xml");
        if (/\+json$/.test(R)) return F.findModeByMIME("application/json");
      }, F.findModeByExtension = function(R) {
        R = R.toLowerCase();
        for (var N = 0; N < F.modeInfo.length; N++) {
          var P = F.modeInfo[N];
          if (P.ext) {
            for (var B = 0; B < P.ext.length; B++)
              if (P.ext[B] == R) return P;
          }
        }
      }, F.findModeByFileName = function(R) {
        for (var N = 0; N < F.modeInfo.length; N++) {
          var P = F.modeInfo[N];
          if (P.file && P.file.test(R)) return P;
        }
        var B = R.lastIndexOf("."), z = B > -1 && R.substring(B + 1, R.length);
        if (z) return F.findModeByExtension(z);
      }, F.findModeByName = function(R) {
        R = R.toLowerCase();
        for (var N = 0; N < F.modeInfo.length; N++) {
          var P = F.modeInfo[N];
          if (P.name.toLowerCase() == R) return P;
          if (P.alias) {
            for (var B = 0; B < P.alias.length; B++)
              if (P.alias[B].toLowerCase() == R) return P;
          }
        }
      };
    });
  })()), El.exports;
}
var Tl;
function Yl() {
  return Tl || (Tl = 1, (function(ue, xe) {
    (function(F) {
      F(_t(), Xl(), rf());
    })(function(F) {
      F.defineMode("markdown", function(_, M) {
        var R = F.getMode(_, "text/html"), N = R.name == "null";
        function P(w) {
          if (F.findModeByName) {
            var c = F.findModeByName(w);
            c && (w = c.mime || c.mimes[0]);
          }
          var j = F.getMode(_, w);
          return j.name == "null" ? null : j;
        }
        M.highlightFormatting === void 0 && (M.highlightFormatting = !1), M.maxBlockquoteDepth === void 0 && (M.maxBlockquoteDepth = 0), M.taskLists === void 0 && (M.taskLists = !1), M.strikethrough === void 0 && (M.strikethrough = !1), M.emoji === void 0 && (M.emoji = !1), M.fencedCodeBlockHighlighting === void 0 && (M.fencedCodeBlockHighlighting = !0), M.fencedCodeBlockDefaultMode === void 0 && (M.fencedCodeBlockDefaultMode = "text/plain"), M.xml === void 0 && (M.xml = !0), M.tokenTypeOverrides === void 0 && (M.tokenTypeOverrides = {});
        var B = {
          header: "header",
          code: "comment",
          quote: "quote",
          list1: "variable-2",
          list2: "variable-3",
          list3: "keyword",
          hr: "hr",
          image: "image",
          imageAltText: "image-alt-text",
          imageMarker: "image-marker",
          formatting: "formatting",
          linkInline: "link",
          linkEmail: "link",
          linkText: "link",
          linkHref: "string",
          em: "em",
          strong: "strong",
          strikethrough: "strikethrough",
          emoji: "builtin"
        };
        for (var z in B)
          B.hasOwnProperty(z) && M.tokenTypeOverrides[z] && (B[z] = M.tokenTypeOverrides[z]);
        var te = /^([*\-_])(?:\s*\1){2,}\s*$/, Q = /^(?:[*\-+]|^[0-9]+([.)]))\s+/, K = /^\[(x| )\](?=\s)/i, he = M.allowAtxHeaderWithoutSpace ? /^(#+)/ : /^(#+)(?: |$)/, ne = /^ {0,3}(?:\={1,}|-{2,})\s*$/, Se = /^[^#!\[\]*_\\<>` "'(~:]+/, de = /^(~~~+|```+)[ \t]*([\w\/+#-]*)[^\n`]*$/, ge = /^\s*\[[^\]]+?\]:.*$/, W = /[!"#$%&'()*+,\-.\/:;<=>?@\[\\\]^_`{|}~\xA1\xA7\xAB\xB6\xB7\xBB\xBF\u037E\u0387\u055A-\u055F\u0589\u058A\u05BE\u05C0\u05C3\u05C6\u05F3\u05F4\u0609\u060A\u060C\u060D\u061B\u061E\u061F\u066A-\u066D\u06D4\u0700-\u070D\u07F7-\u07F9\u0830-\u083E\u085E\u0964\u0965\u0970\u0AF0\u0DF4\u0E4F\u0E5A\u0E5B\u0F04-\u0F12\u0F14\u0F3A-\u0F3D\u0F85\u0FD0-\u0FD4\u0FD9\u0FDA\u104A-\u104F\u10FB\u1360-\u1368\u1400\u166D\u166E\u169B\u169C\u16EB-\u16ED\u1735\u1736\u17D4-\u17D6\u17D8-\u17DA\u1800-\u180A\u1944\u1945\u1A1E\u1A1F\u1AA0-\u1AA6\u1AA8-\u1AAD\u1B5A-\u1B60\u1BFC-\u1BFF\u1C3B-\u1C3F\u1C7E\u1C7F\u1CC0-\u1CC7\u1CD3\u2010-\u2027\u2030-\u2043\u2045-\u2051\u2053-\u205E\u207D\u207E\u208D\u208E\u2308-\u230B\u2329\u232A\u2768-\u2775\u27C5\u27C6\u27E6-\u27EF\u2983-\u2998\u29D8-\u29DB\u29FC\u29FD\u2CF9-\u2CFC\u2CFE\u2CFF\u2D70\u2E00-\u2E2E\u2E30-\u2E42\u3001-\u3003\u3008-\u3011\u3014-\u301F\u3030\u303D\u30A0\u30FB\uA4FE\uA4FF\uA60D-\uA60F\uA673\uA67E\uA6F2-\uA6F7\uA874-\uA877\uA8CE\uA8CF\uA8F8-\uA8FA\uA8FC\uA92E\uA92F\uA95F\uA9C1-\uA9CD\uA9DE\uA9DF\uAA5C-\uAA5F\uAADE\uAADF\uAAF0\uAAF1\uABEB\uFD3E\uFD3F\uFE10-\uFE19\uFE30-\uFE52\uFE54-\uFE61\uFE63\uFE68\uFE6A\uFE6B\uFF01-\uFF03\uFF05-\uFF0A\uFF0C-\uFF0F\uFF1A\uFF1B\uFF1F\uFF20\uFF3B-\uFF3D\uFF3F\uFF5B\uFF5D\uFF5F-\uFF65]|\uD800[\uDD00-\uDD02\uDF9F\uDFD0]|\uD801\uDD6F|\uD802[\uDC57\uDD1F\uDD3F\uDE50-\uDE58\uDE7F\uDEF0-\uDEF6\uDF39-\uDF3F\uDF99-\uDF9C]|\uD804[\uDC47-\uDC4D\uDCBB\uDCBC\uDCBE-\uDCC1\uDD40-\uDD43\uDD74\uDD75\uDDC5-\uDDC9\uDDCD\uDDDB\uDDDD-\uDDDF\uDE38-\uDE3D\uDEA9]|\uD805[\uDCC6\uDDC1-\uDDD7\uDE41-\uDE43\uDF3C-\uDF3E]|\uD809[\uDC70-\uDC74]|\uD81A[\uDE6E\uDE6F\uDEF5\uDF37-\uDF3B\uDF44]|\uD82F\uDC9F|\uD836[\uDE87-\uDE8B]/, X = "    ";
        function U(w, c, j) {
          return c.f = c.inline = j, j(w, c);
        }
        function G(w, c, j) {
          return c.f = c.block = j, j(w, c);
        }
        function se(w) {
          return !w || !/\S/.test(w.string);
        }
        function Z(w) {
          if (w.linkTitle = !1, w.linkHref = !1, w.linkText = !1, w.em = !1, w.strong = !1, w.strikethrough = !1, w.quote = 0, w.indentedCode = !1, w.f == ye) {
            var c = N;
            if (!c) {
              var j = F.innerMode(R, w.htmlState);
              c = j.mode.name == "xml" && j.state.tagStart === null && !j.state.context && j.state.tokenize.isInText;
            }
            c && (w.f = Ee, w.block = fe, w.htmlState = null);
          }
          return w.trailingSpace = 0, w.trailingSpaceNewLine = !1, w.prevLine = w.thisLine, w.thisLine = { stream: null }, null;
        }
        function fe(w, c) {
          var j = w.column() === c.indentation, _e = se(c.prevLine.stream), Te = c.indentedCode, $e = c.prevLine.hr, nt = c.list !== !1, Ke = (c.listStack[c.listStack.length - 1] || 0) + 3;
          c.indentedCode = !1;
          var Ve = c.indentation;
          if (c.indentationDiff === null && (c.indentationDiff = c.indentation, nt)) {
            for (c.list = null; Ve < c.listStack[c.listStack.length - 1]; )
              c.listStack.pop(), c.listStack.length ? c.indentation = c.listStack[c.listStack.length - 1] : c.list = !1;
            c.list !== !1 && (c.indentationDiff = Ve - c.listStack[c.listStack.length - 1]);
          }
          var We = !_e && !$e && !c.prevLine.header && (!nt || !Te) && !c.prevLine.fencedCodeEnd, qe = (c.list === !1 || $e || _e) && c.indentation <= Ke && w.match(te), Je = null;
          if (c.indentationDiff >= 4 && (Te || c.prevLine.fencedCodeEnd || c.prevLine.header || _e))
            return w.skipToEnd(), c.indentedCode = !0, B.code;
          if (w.eatSpace())
            return null;
          if (j && c.indentation <= Ke && (Je = w.match(he)) && Je[1].length <= 6)
            return c.quote = 0, c.header = Je[1].length, c.thisLine.header = !0, M.highlightFormatting && (c.formatting = "header"), c.f = c.inline, ae(c);
          if (c.indentation <= Ke && w.eat(">"))
            return c.quote = j ? 1 : c.quote + 1, M.highlightFormatting && (c.formatting = "quote"), w.eatSpace(), ae(c);
          if (!qe && !c.setext && j && c.indentation <= Ke && (Je = w.match(Q))) {
            var st = Je[1] ? "ol" : "ul";
            return c.indentation = Ve + w.current().length, c.list = !0, c.quote = 0, c.listStack.push(c.indentation), c.em = !1, c.strong = !1, c.code = !1, c.strikethrough = !1, M.taskLists && w.match(K, !1) && (c.taskList = !0), c.f = c.inline, M.highlightFormatting && (c.formatting = ["list", "list-" + st]), ae(c);
          } else {
            if (j && c.indentation <= Ke && (Je = w.match(de, !0)))
              return c.quote = 0, c.fencedEndRE = new RegExp(Je[1] + "+ *$"), c.localMode = M.fencedCodeBlockHighlighting && P(Je[2] || M.fencedCodeBlockDefaultMode), c.localMode && (c.localState = F.startState(c.localMode)), c.f = c.block = Xe, M.highlightFormatting && (c.formatting = "code-block"), c.code = -1, ae(c);
            if (
              // if setext set, indicates line after ---/===
              c.setext || // line before ---/===
              (!We || !nt) && !c.quote && c.list === !1 && !c.code && !qe && !ge.test(w.string) && (Je = w.lookAhead(1)) && (Je = Je.match(ne))
            )
              return c.setext ? (c.header = c.setext, c.setext = 0, w.skipToEnd(), M.highlightFormatting && (c.formatting = "header")) : (c.header = Je[0].charAt(0) == "=" ? 1 : 2, c.setext = c.header), c.thisLine.header = !0, c.f = c.inline, ae(c);
            if (qe)
              return w.skipToEnd(), c.hr = !0, c.thisLine.hr = !0, B.hr;
            if (w.peek() === "[")
              return U(w, c, be);
          }
          return U(w, c, c.inline);
        }
        function ye(w, c) {
          var j = R.token(w, c.htmlState);
          if (!N) {
            var _e = F.innerMode(R, c.htmlState);
            (_e.mode.name == "xml" && _e.state.tagStart === null && !_e.state.context && _e.state.tokenize.isInText || c.md_inside && w.current().indexOf(">") > -1) && (c.f = Ee, c.block = fe, c.htmlState = null);
          }
          return j;
        }
        function Xe(w, c) {
          var j = c.listStack[c.listStack.length - 1] || 0, _e = c.indentation < j, Te = j + 3;
          if (c.fencedEndRE && c.indentation <= Te && (_e || w.match(c.fencedEndRE))) {
            M.highlightFormatting && (c.formatting = "code-block");
            var $e;
            return _e || ($e = ae(c)), c.localMode = c.localState = null, c.block = fe, c.f = Ee, c.fencedEndRE = null, c.code = 0, c.thisLine.fencedCodeEnd = !0, _e ? G(w, c, c.block) : $e;
          } else return c.localMode ? c.localMode.token(w, c.localState) : (w.skipToEnd(), B.code);
        }
        function ae(w) {
          var c = [];
          if (w.formatting) {
            c.push(B.formatting), typeof w.formatting == "string" && (w.formatting = [w.formatting]);
            for (var j = 0; j < w.formatting.length; j++)
              c.push(B.formatting + "-" + w.formatting[j]), w.formatting[j] === "header" && c.push(B.formatting + "-" + w.formatting[j] + "-" + w.header), w.formatting[j] === "quote" && (!M.maxBlockquoteDepth || M.maxBlockquoteDepth >= w.quote ? c.push(B.formatting + "-" + w.formatting[j] + "-" + w.quote) : c.push("error"));
          }
          if (w.taskOpen)
            return c.push("meta"), c.length ? c.join(" ") : null;
          if (w.taskClosed)
            return c.push("property"), c.length ? c.join(" ") : null;
          if (w.linkHref ? c.push(B.linkHref, "url") : (w.strong && c.push(B.strong), w.em && c.push(B.em), w.strikethrough && c.push(B.strikethrough), w.emoji && c.push(B.emoji), w.linkText && c.push(B.linkText), w.code && c.push(B.code), w.image && c.push(B.image), w.imageAltText && c.push(B.imageAltText, "link"), w.imageMarker && c.push(B.imageMarker)), w.header && c.push(B.header, B.header + "-" + w.header), w.quote && (c.push(B.quote), !M.maxBlockquoteDepth || M.maxBlockquoteDepth >= w.quote ? c.push(B.quote + "-" + w.quote) : c.push(B.quote + "-" + M.maxBlockquoteDepth)), w.list !== !1) {
            var _e = (w.listStack.length - 1) % 3;
            _e ? _e === 1 ? c.push(B.list2) : c.push(B.list3) : c.push(B.list1);
          }
          return w.trailingSpaceNewLine ? c.push("trailing-space-new-line") : w.trailingSpace && c.push("trailing-space-" + (w.trailingSpace % 2 ? "a" : "b")), c.length ? c.join(" ") : null;
        }
        function Le(w, c) {
          if (w.match(Se, !0))
            return ae(c);
        }
        function Ee(w, c) {
          var j = c.text(w, c);
          if (typeof j < "u")
            return j;
          if (c.list)
            return c.list = null, ae(c);
          if (c.taskList) {
            var _e = w.match(K, !0)[1] === " ";
            return _e ? c.taskOpen = !0 : c.taskClosed = !0, M.highlightFormatting && (c.formatting = "task"), c.taskList = !1, ae(c);
          }
          if (c.taskOpen = !1, c.taskClosed = !1, c.header && w.match(/^#+$/, !0))
            return M.highlightFormatting && (c.formatting = "header"), ae(c);
          var Te = w.next();
          if (c.linkTitle) {
            c.linkTitle = !1;
            var $e = Te;
            Te === "(" && ($e = ")"), $e = ($e + "").replace(/([.?*+^\[\]\\(){}|-])/g, "\\$1");
            var nt = "^\\s*(?:[^" + $e + "\\\\]+|\\\\\\\\|\\\\.)" + $e;
            if (w.match(new RegExp(nt), !0))
              return B.linkHref;
          }
          if (Te === "`") {
            var Ke = c.formatting;
            M.highlightFormatting && (c.formatting = "code"), w.eatWhile("`");
            var Ve = w.current().length;
            if (c.code == 0 && (!c.quote || Ve == 1))
              return c.code = Ve, ae(c);
            if (Ve == c.code) {
              var We = ae(c);
              return c.code = 0, We;
            } else
              return c.formatting = Ke, ae(c);
          } else if (c.code)
            return ae(c);
          if (Te === "\\" && (w.next(), M.highlightFormatting)) {
            var qe = ae(c), Je = B.formatting + "-escape";
            return qe ? qe + " " + Je : Je;
          }
          if (Te === "!" && w.match(/\[[^\]]*\] ?(?:\(|\[)/, !1))
            return c.imageMarker = !0, c.image = !0, M.highlightFormatting && (c.formatting = "image"), ae(c);
          if (Te === "[" && c.imageMarker && w.match(/[^\]]*\](\(.*?\)| ?\[.*?\])/, !1))
            return c.imageMarker = !1, c.imageAltText = !0, M.highlightFormatting && (c.formatting = "image"), ae(c);
          if (Te === "]" && c.imageAltText) {
            M.highlightFormatting && (c.formatting = "image");
            var qe = ae(c);
            return c.imageAltText = !1, c.image = !1, c.inline = c.f = L, qe;
          }
          if (Te === "[" && !c.image)
            return c.linkText && w.match(/^.*?\]/) || (c.linkText = !0, M.highlightFormatting && (c.formatting = "link")), ae(c);
          if (Te === "]" && c.linkText) {
            M.highlightFormatting && (c.formatting = "link");
            var qe = ae(c);
            return c.linkText = !1, c.inline = c.f = w.match(/\(.*?\)| ?\[.*?\]/, !1) ? L : Ee, qe;
          }
          if (Te === "<" && w.match(/^(https?|ftps?):\/\/(?:[^\\>]|\\.)+>/, !1)) {
            c.f = c.inline = Ne, M.highlightFormatting && (c.formatting = "link");
            var qe = ae(c);
            return qe ? qe += " " : qe = "", qe + B.linkInline;
          }
          if (Te === "<" && w.match(/^[^> \\]+@(?:[^\\>]|\\.)+>/, !1)) {
            c.f = c.inline = Ne, M.highlightFormatting && (c.formatting = "link");
            var qe = ae(c);
            return qe ? qe += " " : qe = "", qe + B.linkEmail;
          }
          if (M.xml && Te === "<" && w.match(/^(!--|\?|!\[CDATA\[|[a-z][a-z0-9-]*(?:\s+[a-z_:.\-]+(?:\s*=\s*[^>]+)?)*\s*(?:>|$))/i, !1)) {
            var st = w.string.indexOf(">", w.pos);
            if (st != -1) {
              var Ce = w.string.substring(w.start, st);
              /markdown\s*=\s*('|"){0,1}1('|"){0,1}/.test(Ce) && (c.md_inside = !0);
            }
            return w.backUp(1), c.htmlState = F.startState(R), G(w, c, ye);
          }
          if (M.xml && Te === "<" && w.match(/^\/\w*?>/))
            return c.md_inside = !1, "tag";
          if (Te === "*" || Te === "_") {
            for (var It = 1, wt = w.pos == 1 ? " " : w.string.charAt(w.pos - 2); It < 3 && w.eat(Te); ) It++;
            var Ft = w.peek() || " ", dt = !/\s/.test(Ft) && (!W.test(Ft) || /\s/.test(wt) || W.test(wt)), Pe = !/\s/.test(wt) && (!W.test(wt) || /\s/.test(Ft) || W.test(Ft)), ze = null, bt = null;
            if (It % 2 && (!c.em && dt && (Te === "*" || !Pe || W.test(wt)) ? ze = !0 : c.em == Te && Pe && (Te === "*" || !dt || W.test(Ft)) && (ze = !1)), It > 1 && (!c.strong && dt && (Te === "*" || !Pe || W.test(wt)) ? bt = !0 : c.strong == Te && Pe && (Te === "*" || !dt || W.test(Ft)) && (bt = !1)), bt != null || ze != null) {
              M.highlightFormatting && (c.formatting = ze == null ? "strong" : bt == null ? "em" : "strong em"), ze === !0 && (c.em = Te), bt === !0 && (c.strong = Te);
              var We = ae(c);
              return ze === !1 && (c.em = !1), bt === !1 && (c.strong = !1), We;
            }
          } else if (Te === " " && (w.eat("*") || w.eat("_"))) {
            if (w.peek() === " ")
              return ae(c);
            w.backUp(1);
          }
          if (M.strikethrough) {
            if (Te === "~" && w.eatWhile(Te)) {
              if (c.strikethrough) {
                M.highlightFormatting && (c.formatting = "strikethrough");
                var We = ae(c);
                return c.strikethrough = !1, We;
              } else if (w.match(/^[^\s]/, !1))
                return c.strikethrough = !0, M.highlightFormatting && (c.formatting = "strikethrough"), ae(c);
            } else if (Te === " " && w.match("~~", !0)) {
              if (w.peek() === " ")
                return ae(c);
              w.backUp(2);
            }
          }
          if (M.emoji && Te === ":" && w.match(/^(?:[a-z_\d+][a-z_\d+-]*|\-[a-z_\d+][a-z_\d+-]*):/)) {
            c.emoji = !0, M.highlightFormatting && (c.formatting = "emoji");
            var lr = ae(c);
            return c.emoji = !1, lr;
          }
          return Te === " " && (w.match(/^ +$/, !1) ? c.trailingSpace++ : c.trailingSpace && (c.trailingSpaceNewLine = !0)), ae(c);
        }
        function Ne(w, c) {
          var j = w.next();
          if (j === ">") {
            c.f = c.inline = Ee, M.highlightFormatting && (c.formatting = "link");
            var _e = ae(c);
            return _e ? _e += " " : _e = "", _e + B.linkInline;
          }
          return w.match(/^[^>]+/, !0), B.linkInline;
        }
        function L(w, c) {
          if (w.eatSpace())
            return null;
          var j = w.next();
          return j === "(" || j === "[" ? (c.f = c.inline = $(j === "(" ? ")" : "]"), M.highlightFormatting && (c.formatting = "link-string"), c.linkHref = !0, ae(c)) : "error";
        }
        var ee = {
          ")": /^(?:[^\\\(\)]|\\.|\((?:[^\\\(\)]|\\.)*\))*?(?=\))/,
          "]": /^(?:[^\\\[\]]|\\.|\[(?:[^\\\[\]]|\\.)*\])*?(?=\])/
        };
        function $(w) {
          return function(c, j) {
            var _e = c.next();
            if (_e === w) {
              j.f = j.inline = Ee, M.highlightFormatting && (j.formatting = "link-string");
              var Te = ae(j);
              return j.linkHref = !1, Te;
            }
            return c.match(ee[w]), j.linkHref = !0, ae(j);
          };
        }
        function be(w, c) {
          return w.match(/^([^\]\\]|\\.)*\]:/, !1) ? (c.f = Ue, w.next(), M.highlightFormatting && (c.formatting = "link"), c.linkText = !0, ae(c)) : U(w, c, Ee);
        }
        function Ue(w, c) {
          if (w.match("]:", !0)) {
            c.f = c.inline = it, M.highlightFormatting && (c.formatting = "link");
            var j = ae(c);
            return c.linkText = !1, j;
          }
          return w.match(/^([^\]\\]|\\.)+/, !0), B.linkText;
        }
        function it(w, c) {
          return w.eatSpace() ? null : (w.match(/^[^\s]+/, !0), w.peek() === void 0 ? c.linkTitle = !0 : w.match(/^(?:\s+(?:"(?:[^"\\]|\\.)+"|'(?:[^'\\]|\\.)+'|\((?:[^)\\]|\\.)+\)))?/, !0), c.f = c.inline = Ee, B.linkHref + " url");
        }
        var Pt = {
          startState: function() {
            return {
              f: fe,
              prevLine: { stream: null },
              thisLine: { stream: null },
              block: fe,
              htmlState: null,
              indentation: 0,
              inline: Ee,
              text: Le,
              formatting: !1,
              linkText: !1,
              linkHref: !1,
              linkTitle: !1,
              code: 0,
              em: !1,
              strong: !1,
              header: 0,
              setext: 0,
              hr: !1,
              taskList: !1,
              list: !1,
              listStack: [],
              quote: 0,
              trailingSpace: 0,
              trailingSpaceNewLine: !1,
              strikethrough: !1,
              emoji: !1,
              fencedEndRE: null
            };
          },
          copyState: function(w) {
            return {
              f: w.f,
              prevLine: w.prevLine,
              thisLine: w.thisLine,
              block: w.block,
              htmlState: w.htmlState && F.copyState(R, w.htmlState),
              indentation: w.indentation,
              localMode: w.localMode,
              localState: w.localMode ? F.copyState(w.localMode, w.localState) : null,
              inline: w.inline,
              text: w.text,
              formatting: !1,
              linkText: w.linkText,
              linkTitle: w.linkTitle,
              linkHref: w.linkHref,
              code: w.code,
              em: w.em,
              strong: w.strong,
              strikethrough: w.strikethrough,
              emoji: w.emoji,
              header: w.header,
              setext: w.setext,
              hr: w.hr,
              taskList: w.taskList,
              list: w.list,
              listStack: w.listStack.slice(0),
              quote: w.quote,
              indentedCode: w.indentedCode,
              trailingSpace: w.trailingSpace,
              trailingSpaceNewLine: w.trailingSpaceNewLine,
              md_inside: w.md_inside,
              fencedEndRE: w.fencedEndRE
            };
          },
          token: function(w, c) {
            if (c.formatting = !1, w != c.thisLine.stream) {
              if (c.header = 0, c.hr = !1, w.match(/^\s*$/, !0))
                return Z(c), null;
              if (c.prevLine = c.thisLine, c.thisLine = { stream: w }, c.taskList = !1, c.trailingSpace = 0, c.trailingSpaceNewLine = !1, !c.localState && (c.f = c.block, c.f != ye)) {
                var j = w.match(/^\s*/, !0)[0].replace(/\t/g, X).length;
                if (c.indentation = j, c.indentationDiff = null, j > 0) return null;
              }
            }
            return c.f(w, c);
          },
          innerMode: function(w) {
            return w.block == ye ? { state: w.htmlState, mode: R } : w.localState ? { state: w.localState, mode: w.localMode } : { state: w, mode: Pt };
          },
          indent: function(w, c, j) {
            return w.block == ye && R.indent ? R.indent(w.htmlState, c, j) : w.localState && w.localMode.indent ? w.localMode.indent(w.localState, c, j) : F.Pass;
          },
          blankLine: Z,
          getType: ae,
          blockCommentStart: "<!--",
          blockCommentEnd: "-->",
          closeBrackets: "()[]{}''\"\"``",
          fold: "markdown"
        };
        return Pt;
      }, "xml"), F.defineMIME("text/markdown", "markdown"), F.defineMIME("text/x-markdown", "markdown");
    });
  })()), Sl.exports;
}
var Bl = { exports: {} }, Ml;
function Zl() {
  return Ml || (Ml = 1, (function(ue, xe) {
    (function(F) {
      F(_t());
    })(function(F) {
      F.overlayMode = function(_, M, R) {
        return {
          startState: function() {
            return {
              base: F.startState(_),
              overlay: F.startState(M),
              basePos: 0,
              baseCur: null,
              overlayPos: 0,
              overlayCur: null,
              streamSeen: null
            };
          },
          copyState: function(N) {
            return {
              base: F.copyState(_, N.base),
              overlay: F.copyState(M, N.overlay),
              basePos: N.basePos,
              baseCur: null,
              overlayPos: N.overlayPos,
              overlayCur: null
            };
          },
          token: function(N, P) {
            return (N != P.streamSeen || Math.min(P.basePos, P.overlayPos) < N.start) && (P.streamSeen = N, P.basePos = P.overlayPos = N.start), N.start == P.basePos && (P.baseCur = _.token(N, P.base), P.basePos = N.pos), N.start == P.overlayPos && (N.pos = N.start, P.overlayCur = M.token(N, P.overlay), P.overlayPos = N.pos), N.pos = Math.min(P.basePos, P.overlayPos), P.overlayCur == null ? P.baseCur : P.baseCur != null && P.overlay.combineTokens || R && P.overlay.combineTokens == null ? P.baseCur + " " + P.overlayCur : P.overlayCur;
          },
          indent: _.indent && function(N, P, B) {
            return _.indent(N.base, P, B);
          },
          electricChars: _.electricChars,
          innerMode: function(N) {
            return { state: N.base, mode: _ };
          },
          blankLine: function(N) {
            var P, B;
            return _.blankLine && (P = _.blankLine(N.base)), M.blankLine && (B = M.blankLine(N.overlay)), B == null ? P : R && P != null ? P + " " + B : B;
          }
        };
      };
    });
  })()), Bl.exports;
}
var Ol = { exports: {} }, Nl;
function nf() {
  return Nl || (Nl = 1, (function(ue, xe) {
    (function(F) {
      F(_t());
    })(function(F) {
      F.defineOption("placeholder", "", function(z, te, Q) {
        var K = Q && Q != F.Init;
        if (te && !K)
          z.on("blur", N), z.on("change", P), z.on("swapDoc", P), F.on(z.getInputField(), "compositionupdate", z.state.placeholderCompose = function() {
            R(z);
          }), P(z);
        else if (!te && K) {
          z.off("blur", N), z.off("change", P), z.off("swapDoc", P), F.off(z.getInputField(), "compositionupdate", z.state.placeholderCompose), _(z);
          var he = z.getWrapperElement();
          he.className = he.className.replace(" CodeMirror-empty", "");
        }
        te && !z.hasFocus() && N(z);
      });
      function _(z) {
        z.state.placeholder && (z.state.placeholder.parentNode.removeChild(z.state.placeholder), z.state.placeholder = null);
      }
      function M(z) {
        _(z);
        var te = z.state.placeholder = document.createElement("pre");
        te.style.cssText = "height: 0; overflow: visible", te.style.direction = z.getOption("direction"), te.className = "CodeMirror-placeholder CodeMirror-line-like";
        var Q = z.getOption("placeholder");
        typeof Q == "string" && (Q = document.createTextNode(Q)), te.appendChild(Q), z.display.lineSpace.insertBefore(te, z.display.lineSpace.firstChild);
      }
      function R(z) {
        setTimeout(function() {
          var te = !1;
          if (z.lineCount() == 1) {
            var Q = z.getInputField();
            te = Q.nodeName == "TEXTAREA" ? !z.getLine(0).length : !/[^\u200b]/.test(Q.querySelector(".CodeMirror-line").textContent);
          }
          te ? M(z) : _(z);
        }, 20);
      }
      function N(z) {
        B(z) && M(z);
      }
      function P(z) {
        var te = z.getWrapperElement(), Q = B(z);
        te.className = te.className.replace(" CodeMirror-empty", "") + (Q ? " CodeMirror-empty" : ""), Q ? M(z) : _(z);
      }
      function B(z) {
        return z.lineCount() === 1 && z.getLine(0) === "";
      }
    });
  })()), Ol.exports;
}
var Il = { exports: {} }, Hl;
function af() {
  return Hl || (Hl = 1, (function(ue, xe) {
    (function(F) {
      F(_t());
    })(function(F) {
      F.defineOption("autoRefresh", !1, function(R, N) {
        R.state.autoRefresh && (M(R, R.state.autoRefresh), R.state.autoRefresh = null), N && R.display.wrapper.offsetHeight == 0 && _(R, R.state.autoRefresh = { delay: N.delay || 250 });
      });
      function _(R, N) {
        function P() {
          R.display.wrapper.offsetHeight ? (M(R, N), R.display.lastWrapHeight != R.display.wrapper.clientHeight && R.refresh()) : N.timeout = setTimeout(P, N.delay);
        }
        N.timeout = setTimeout(P, N.delay), N.hurry = function() {
          clearTimeout(N.timeout), N.timeout = setTimeout(P, 50);
        }, F.on(window, "mouseup", N.hurry), F.on(window, "keyup", N.hurry);
      }
      function M(R, N) {
        clearTimeout(N.timeout), F.off(window, "mouseup", N.hurry), F.off(window, "keyup", N.hurry);
      }
    });
  })()), Il.exports;
}
var Rl = { exports: {} }, Pl;
function of() {
  return Pl || (Pl = 1, (function(ue, xe) {
    (function(F) {
      F(_t());
    })(function(F) {
      F.defineOption("styleSelectedText", !1, function(K, he, ne) {
        var Se = ne && ne != F.Init;
        he && !Se ? (K.state.markedSelection = [], K.state.markedSelectionStyle = typeof he == "string" ? he : "CodeMirror-selectedtext", te(K), K.on("cursorActivity", _), K.on("change", M)) : !he && Se && (K.off("cursorActivity", _), K.off("change", M), z(K), K.state.markedSelection = K.state.markedSelectionStyle = null);
      });
      function _(K) {
        K.state.markedSelection && K.operation(function() {
          Q(K);
        });
      }
      function M(K) {
        K.state.markedSelection && K.state.markedSelection.length && K.operation(function() {
          z(K);
        });
      }
      var R = 8, N = F.Pos, P = F.cmpPos;
      function B(K, he, ne, Se) {
        if (P(he, ne) != 0)
          for (var de = K.state.markedSelection, ge = K.state.markedSelectionStyle, W = he.line; ; ) {
            var X = W == he.line ? he : N(W, 0), U = W + R, G = U >= ne.line, se = G ? ne : N(U, 0), Z = K.markText(X, se, { className: ge });
            if (Se == null ? de.push(Z) : de.splice(Se++, 0, Z), G) break;
            W = U;
          }
      }
      function z(K) {
        for (var he = K.state.markedSelection, ne = 0; ne < he.length; ++ne) he[ne].clear();
        he.length = 0;
      }
      function te(K) {
        z(K);
        for (var he = K.listSelections(), ne = 0; ne < he.length; ne++)
          B(K, he[ne].from(), he[ne].to());
      }
      function Q(K) {
        if (!K.somethingSelected()) return z(K);
        if (K.listSelections().length > 1) return te(K);
        var he = K.getCursor("start"), ne = K.getCursor("end"), Se = K.state.markedSelection;
        if (!Se.length) return B(K, he, ne);
        var de = Se[0].find(), ge = Se[Se.length - 1].find();
        if (!de || !ge || ne.line - he.line <= R || P(he, ge.to) >= 0 || P(ne, de.from) <= 0)
          return te(K);
        for (; P(he, de.from) > 0; )
          Se.shift().clear(), de = Se[0].find();
        for (P(he, de.from) < 0 && (de.to.line - he.line < R ? (Se.shift().clear(), B(K, he, de.to, 0)) : B(K, he, de.from, 0)); P(ne, ge.to) < 0; )
          Se.pop().clear(), ge = Se[Se.length - 1].find();
        P(ne, ge.to) > 0 && (ne.line - ge.from.line < R ? (Se.pop().clear(), B(K, ge.from, ne)) : B(K, ge.to, ne));
      }
    });
  })()), Rl.exports;
}
var zl = { exports: {} }, Wl;
function lf() {
  return Wl || (Wl = 1, (function(ue, xe) {
    (function(F) {
      F(_t());
    })(function(F) {
      var _ = F.Pos;
      function M(W) {
        var X = W.flags;
        return X ?? (W.ignoreCase ? "i" : "") + (W.global ? "g" : "") + (W.multiline ? "m" : "");
      }
      function R(W, X) {
        for (var U = M(W), G = U, se = 0; se < X.length; se++) G.indexOf(X.charAt(se)) == -1 && (G += X.charAt(se));
        return U == G ? W : new RegExp(W.source, G);
      }
      function N(W) {
        return /\\s|\\n|\n|\\W|\\D|\[\^/.test(W.source);
      }
      function P(W, X, U) {
        X = R(X, "g");
        for (var G = U.line, se = U.ch, Z = W.lastLine(); G <= Z; G++, se = 0) {
          X.lastIndex = se;
          var fe = W.getLine(G), ye = X.exec(fe);
          if (ye)
            return {
              from: _(G, ye.index),
              to: _(G, ye.index + ye[0].length),
              match: ye
            };
        }
      }
      function B(W, X, U) {
        if (!N(X)) return P(W, X, U);
        X = R(X, "gm");
        for (var G, se = 1, Z = U.line, fe = W.lastLine(); Z <= fe; ) {
          for (var ye = 0; ye < se && !(Z > fe); ye++) {
            var Xe = W.getLine(Z++);
            G = G == null ? Xe : G + `
` + Xe;
          }
          se = se * 2, X.lastIndex = U.ch;
          var ae = X.exec(G);
          if (ae) {
            var Le = G.slice(0, ae.index).split(`
`), Ee = ae[0].split(`
`), Ne = U.line + Le.length - 1, L = Le[Le.length - 1].length;
            return {
              from: _(Ne, L),
              to: _(
                Ne + Ee.length - 1,
                Ee.length == 1 ? L + Ee[0].length : Ee[Ee.length - 1].length
              ),
              match: ae
            };
          }
        }
      }
      function z(W, X, U) {
        for (var G, se = 0; se <= W.length; ) {
          X.lastIndex = se;
          var Z = X.exec(W);
          if (!Z) break;
          var fe = Z.index + Z[0].length;
          if (fe > W.length - U) break;
          (!G || fe > G.index + G[0].length) && (G = Z), se = Z.index + 1;
        }
        return G;
      }
      function te(W, X, U) {
        X = R(X, "g");
        for (var G = U.line, se = U.ch, Z = W.firstLine(); G >= Z; G--, se = -1) {
          var fe = W.getLine(G), ye = z(fe, X, se < 0 ? 0 : fe.length - se);
          if (ye)
            return {
              from: _(G, ye.index),
              to: _(G, ye.index + ye[0].length),
              match: ye
            };
        }
      }
      function Q(W, X, U) {
        if (!N(X)) return te(W, X, U);
        X = R(X, "gm");
        for (var G, se = 1, Z = W.getLine(U.line).length - U.ch, fe = U.line, ye = W.firstLine(); fe >= ye; ) {
          for (var Xe = 0; Xe < se && fe >= ye; Xe++) {
            var ae = W.getLine(fe--);
            G = G == null ? ae : ae + `
` + G;
          }
          se *= 2;
          var Le = z(G, X, Z);
          if (Le) {
            var Ee = G.slice(0, Le.index).split(`
`), Ne = Le[0].split(`
`), L = fe + Ee.length, ee = Ee[Ee.length - 1].length;
            return {
              from: _(L, ee),
              to: _(
                L + Ne.length - 1,
                Ne.length == 1 ? ee + Ne[0].length : Ne[Ne.length - 1].length
              ),
              match: Le
            };
          }
        }
      }
      var K, he;
      String.prototype.normalize ? (K = function(W) {
        return W.normalize("NFD").toLowerCase();
      }, he = function(W) {
        return W.normalize("NFD");
      }) : (K = function(W) {
        return W.toLowerCase();
      }, he = function(W) {
        return W;
      });
      function ne(W, X, U, G) {
        if (W.length == X.length) return U;
        for (var se = 0, Z = U + Math.max(0, W.length - X.length); ; ) {
          if (se == Z) return se;
          var fe = se + Z >> 1, ye = G(W.slice(0, fe)).length;
          if (ye == U) return fe;
          ye > U ? Z = fe : se = fe + 1;
        }
      }
      function Se(W, X, U, G) {
        if (!X.length) return null;
        var se = G ? K : he, Z = se(X).split(/\r|\n\r?/);
        e: for (var fe = U.line, ye = U.ch, Xe = W.lastLine() + 1 - Z.length; fe <= Xe; fe++, ye = 0) {
          var ae = W.getLine(fe).slice(ye), Le = se(ae);
          if (Z.length == 1) {
            var Ee = Le.indexOf(Z[0]);
            if (Ee == -1) continue e;
            var U = ne(ae, Le, Ee, se) + ye;
            return {
              from: _(fe, ne(ae, Le, Ee, se) + ye),
              to: _(fe, ne(ae, Le, Ee + Z[0].length, se) + ye)
            };
          } else {
            var Ne = Le.length - Z[0].length;
            if (Le.slice(Ne) != Z[0]) continue e;
            for (var L = 1; L < Z.length - 1; L++)
              if (se(W.getLine(fe + L)) != Z[L]) continue e;
            var ee = W.getLine(fe + Z.length - 1), $ = se(ee), be = Z[Z.length - 1];
            if ($.slice(0, be.length) != be) continue e;
            return {
              from: _(fe, ne(ae, Le, Ne, se) + ye),
              to: _(fe + Z.length - 1, ne(ee, $, be.length, se))
            };
          }
        }
      }
      function de(W, X, U, G) {
        if (!X.length) return null;
        var se = G ? K : he, Z = se(X).split(/\r|\n\r?/);
        e: for (var fe = U.line, ye = U.ch, Xe = W.firstLine() - 1 + Z.length; fe >= Xe; fe--, ye = -1) {
          var ae = W.getLine(fe);
          ye > -1 && (ae = ae.slice(0, ye));
          var Le = se(ae);
          if (Z.length == 1) {
            var Ee = Le.lastIndexOf(Z[0]);
            if (Ee == -1) continue e;
            return {
              from: _(fe, ne(ae, Le, Ee, se)),
              to: _(fe, ne(ae, Le, Ee + Z[0].length, se))
            };
          } else {
            var Ne = Z[Z.length - 1];
            if (Le.slice(0, Ne.length) != Ne) continue e;
            for (var L = 1, U = fe - Z.length + 1; L < Z.length - 1; L++)
              if (se(W.getLine(U + L)) != Z[L]) continue e;
            var ee = W.getLine(fe + 1 - Z.length), $ = se(ee);
            if ($.slice($.length - Z[0].length) != Z[0]) continue e;
            return {
              from: _(fe + 1 - Z.length, ne(ee, $, ee.length - Z[0].length, se)),
              to: _(fe, ne(ae, Le, Ne.length, se))
            };
          }
        }
      }
      function ge(W, X, U, G) {
        this.atOccurrence = !1, this.afterEmptyMatch = !1, this.doc = W, U = U ? W.clipPos(U) : _(0, 0), this.pos = { from: U, to: U };
        var se;
        typeof G == "object" ? se = G.caseFold : (se = G, G = null), typeof X == "string" ? (se == null && (se = !1), this.matches = function(Z, fe) {
          return (Z ? de : Se)(W, X, fe, se);
        }) : (X = R(X, "gm"), !G || G.multiline !== !1 ? this.matches = function(Z, fe) {
          return (Z ? Q : B)(W, X, fe);
        } : this.matches = function(Z, fe) {
          return (Z ? te : P)(W, X, fe);
        });
      }
      ge.prototype = {
        findNext: function() {
          return this.find(!1);
        },
        findPrevious: function() {
          return this.find(!0);
        },
        find: function(W) {
          var X = this.doc.clipPos(W ? this.pos.from : this.pos.to);
          if (this.afterEmptyMatch && this.atOccurrence && (X = _(X.line, X.ch), W ? (X.ch--, X.ch < 0 && (X.line--, X.ch = (this.doc.getLine(X.line) || "").length)) : (X.ch++, X.ch > (this.doc.getLine(X.line) || "").length && (X.ch = 0, X.line++)), F.cmpPos(X, this.doc.clipPos(X)) != 0))
            return this.atOccurrence = !1;
          var U = this.matches(W, X);
          if (this.afterEmptyMatch = U && F.cmpPos(U.from, U.to) == 0, U)
            return this.pos = U, this.atOccurrence = !0, this.pos.match || !0;
          var G = _(W ? this.doc.firstLine() : this.doc.lastLine() + 1, 0);
          return this.pos = { from: G, to: G }, this.atOccurrence = !1;
        },
        from: function() {
          if (this.atOccurrence) return this.pos.from;
        },
        to: function() {
          if (this.atOccurrence) return this.pos.to;
        },
        replace: function(W, X) {
          if (this.atOccurrence) {
            var U = F.splitLines(W);
            this.doc.replaceRange(U, this.pos.from, this.pos.to, X), this.pos.to = _(
              this.pos.from.line + U.length - 1,
              U[U.length - 1].length + (U.length == 1 ? this.pos.from.ch : 0)
            );
          }
        }
      }, F.defineExtension("getSearchCursor", function(W, X, U) {
        return new ge(this.doc, W, X, U);
      }), F.defineDocExtension("getSearchCursor", function(W, X, U) {
        return new ge(this, W, X, U);
      }), F.defineExtension("selectMatches", function(W, X) {
        for (var U = [], G = this.getSearchCursor(W, this.getCursor("from"), X); G.findNext() && !(F.cmpPos(G.to(), this.getCursor("to")) > 0); )
          U.push({ anchor: G.from(), head: G.to() });
        U.length && this.setSelections(U, 0);
      });
    });
  })()), zl.exports;
}
var _l = { exports: {} }, ql;
function uf() {
  return ql || (ql = 1, (function(ue, xe) {
    (function(F) {
      F(_t(), Yl(), Zl());
    })(function(F) {
      var _ = /^((?:(?:aaas?|about|acap|adiumxtra|af[ps]|aim|apt|attachment|aw|beshare|bitcoin|bolo|callto|cap|chrome(?:-extension)?|cid|coap|com-eventbrite-attendee|content|crid|cvs|data|dav|dict|dlna-(?:playcontainer|playsingle)|dns|doi|dtn|dvb|ed2k|facetime|feed|file|finger|fish|ftp|geo|gg|git|gizmoproject|go|gopher|gtalk|h323|hcp|https?|iax|icap|icon|im|imap|info|ipn|ipp|irc[6s]?|iris(?:\.beep|\.lwz|\.xpc|\.xpcs)?|itms|jar|javascript|jms|keyparc|lastfm|ldaps?|magnet|mailto|maps|market|message|mid|mms|ms-help|msnim|msrps?|mtqp|mumble|mupdate|mvn|news|nfs|nih?|nntp|notes|oid|opaquelocktoken|palm|paparazzi|platform|pop|pres|proxy|psyc|query|res(?:ource)?|rmi|rsync|rtmp|rtsp|secondlife|service|session|sftp|sgn|shttp|sieve|sips?|skype|sm[bs]|snmp|soap\.beeps?|soldat|spotify|ssh|steam|svn|tag|teamspeak|tel(?:net)?|tftp|things|thismessage|tip|tn3270|tv|udp|unreal|urn|ut2004|vemmi|ventrilo|view-source|webcal|wss?|wtai|wyciwyg|xcon(?:-userid)?|xfire|xmlrpc\.beeps?|xmpp|xri|ymsgr|z39\.50[rs]?):(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]|\([^\s()<>]*\))+(?:\([^\s()<>]*\)|[^\s`*!()\[\]{};:'".,<>?«»“”‘’]))/i;
      F.defineMode("gfm", function(M, R) {
        var N = 0;
        function P(Q) {
          return Q.code = !1, null;
        }
        var B = {
          startState: function() {
            return {
              code: !1,
              codeBlock: !1,
              ateSpace: !1
            };
          },
          copyState: function(Q) {
            return {
              code: Q.code,
              codeBlock: Q.codeBlock,
              ateSpace: Q.ateSpace
            };
          },
          token: function(Q, K) {
            if (K.combineTokens = null, K.codeBlock)
              return Q.match(/^```+/) ? (K.codeBlock = !1, null) : (Q.skipToEnd(), null);
            if (Q.sol() && (K.code = !1), Q.sol() && Q.match(/^```+/))
              return Q.skipToEnd(), K.codeBlock = !0, null;
            if (Q.peek() === "`") {
              Q.next();
              var he = Q.pos;
              Q.eatWhile("`");
              var ne = 1 + Q.pos - he;
              return K.code ? ne === N && (K.code = !1) : (N = ne, K.code = !0), null;
            } else if (K.code)
              return Q.next(), null;
            if (Q.eatSpace())
              return K.ateSpace = !0, null;
            if ((Q.sol() || K.ateSpace) && (K.ateSpace = !1, R.gitHubSpice !== !1)) {
              if (Q.match(/^(?:[a-zA-Z0-9\-_]+\/)?(?:[a-zA-Z0-9\-_]+@)?(?=.{0,6}\d)(?:[a-f0-9]{7,40}\b)/))
                return K.combineTokens = !0, "link";
              if (Q.match(/^(?:[a-zA-Z0-9\-_]+\/)?(?:[a-zA-Z0-9\-_]+)?#[0-9]+\b/))
                return K.combineTokens = !0, "link";
            }
            return Q.match(_) && Q.string.slice(Q.start - 2, Q.start) != "](" && (Q.start == 0 || /\W/.test(Q.string.charAt(Q.start - 1))) ? (K.combineTokens = !0, "link") : (Q.next(), null);
          },
          blankLine: P
        }, z = {
          taskLists: !0,
          strikethrough: !0,
          emoji: !0
        };
        for (var te in R)
          z[te] = R[te];
        return z.name = "markdown", F.overlayMode(F.getMode(M, z), B);
      }, "markdown"), F.defineMIME("text/x-gfm", "gfm");
    });
  })()), _l.exports;
}
function sf(ue) {
  throw new Error('Could not dynamically require "' + ue + '". Please configure the dynamicRequireTargets or/and ignoreDynamicRequires option of @rollup/plugin-commonjs appropriately for this require call to work.');
}
var da = { exports: {} };
const ff = {}, cf = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: ff
}, Symbol.toStringTag, { value: "Module" })), hf = /* @__PURE__ */ $s(cf);
var Ul;
function df() {
  return Ul || (Ul = 1, (function(ue) {
    var xe;
    (function() {
      xe = function(F, _, M, R) {
        R = R || {}, this.dictionary = null, this.rules = {}, this.dictionaryTable = /* @__PURE__ */ new Map(), this.compoundRules = [], this.compoundRuleCodes = {}, this.replacementTable = [], this.flags = R.flags || {}, this.memoized = {}, this.loaded = !1;
        var N = this, P, B, z, te, Q;
        F && (N.dictionary = F, _ && M ? Se() : (typeof window < "u" ? (R.dictionaryPath ? P = R.dictionaryPath : P = "typo/dictionaries", window.chrome && window.chrome.runtime && window.chrome.runtime.getURL ? P = window.chrome.runtime.getURL(P) : window.browser && window.browser.runtime && window.browser.runtime.getURL && (P = window.browser.runtime.getURL(P))) : typeof __dirname < "u" ? P = __dirname + "/dictionaries" : P = "./dictionaries", _ || K(P + "/" + F + "/" + F + ".aff", he), M || K(P + "/" + F + "/" + F + ".dic", ne)));
        function K(de, ge) {
          var W = N._readFile(de, null, R?.asyncLoad);
          R?.asyncLoad ? W.then(function(X) {
            ge(X);
          }) : ge(W);
        }
        function he(de) {
          _ = de, M && Se();
        }
        function ne(de) {
          M = de, _ && Se();
        }
        function Se() {
          for (N.rules = N._parseAFF(_), N.compoundRuleCodes = {}, B = 0, te = N.compoundRules.length; B < te; B++) {
            var de = N.compoundRules[B];
            for (z = 0, Q = de.length; z < Q; z++)
              N.compoundRuleCodes[de[z]] = [];
          }
          "ONLYINCOMPOUND" in N.flags && (N.compoundRuleCodes[N.flags.ONLYINCOMPOUND] = []), N.dictionaryTable = N._parseDIC(M);
          for (B in N.compoundRuleCodes)
            N.compoundRuleCodes[B].length === 0 && delete N.compoundRuleCodes[B];
          for (B = 0, te = N.compoundRules.length; B < te; B++) {
            var ge = N.compoundRules[B], W = "";
            for (z = 0, Q = ge.length; z < Q; z++) {
              var X = ge[z];
              X in N.compoundRuleCodes ? W += "(" + N.compoundRuleCodes[X].join("|") + ")" : W += X;
            }
            N.compoundRules[B] = new RegExp("^" + W + "$", "i");
          }
          N.loaded = !0, R?.asyncLoad && R?.loadedCallback && R.loadedCallback(N);
        }
        return this;
      }, xe.prototype = {
        /**
         * Loads a Typo instance from a hash of all of the Typo properties.
         *
         * @param {object} obj A hash of Typo properties, probably gotten from a JSON.parse(JSON.stringify(typo_instance)).
         */
        load: function(F) {
          for (var _ in F)
            F.hasOwnProperty(_) && (this[_] = F[_]);
          return this;
        },
        /**
         * Read the contents of a file.
         *
         * @param {string} path The path (relative) to the file.
         * @param {string} [charset="ISO8859-1"] The expected charset of the file
         * @param {boolean} async If true, the file will be read asynchronously. For node.js this does nothing, all
         *        files are read synchronously.
         * @returns {string} The file data if async is false, otherwise a promise object. If running node.js, the data is
         *          always returned.
         */
        _readFile: function(F, _, M) {
          var R;
          if (_ = _ || "utf8", typeof XMLHttpRequest < "u") {
            var N = new XMLHttpRequest();
            if (N.open("GET", F, !!M), (R = N.overrideMimeType) === null || R === void 0 || R.call(N, "text/plain; charset=" + _), M) {
              var P = new Promise(function(z, te) {
                N.onload = function() {
                  N.status === 200 ? z(N.responseText) : te(N.statusText);
                }, N.onerror = function() {
                  te(N.statusText);
                };
              });
              return N.send(null), P;
            } else
              return N.send(null), N.responseText;
          } else if (typeof sf < "u") {
            var B = hf;
            try {
              if (B.existsSync(F))
                return B.readFileSync(F, _);
              console.log("Path " + F + " does not exist.");
            } catch (z) {
              console.log(z);
            }
            return "";
          }
          return "";
        },
        /**
         * Parse the rules out from a .aff file.
         *
         * @param {string} data The contents of the affix file.
         * @returns object The rules from the file.
         */
        _parseAFF: function(F) {
          var _ = {}, M, R, N, P, B, z, te, Q, K = F.split(/\r?\n/);
          for (B = 0, te = K.length; B < te; B++)
            if (M = this._removeAffixComments(K[B]), M = M.trim(), !!M) {
              var he = M.split(/\s+/), ne = he[0];
              if (ne === "PFX" || ne === "SFX") {
                var Se = he[1], de = he[2];
                N = parseInt(he[3], 10);
                var ge = [];
                for (z = B + 1, Q = B + 1 + N; z < Q; z++) {
                  R = K[z], P = R.split(/\s+/);
                  var W = P[2], X = P[3].split("/"), U = X[0];
                  U === "0" && (U = "");
                  var G = this.parseRuleCodes(X[1]), se = P[4], Z = {
                    add: U
                  };
                  G.length > 0 && (Z.continuationClasses = G), se !== "." && (ne === "SFX" ? Z.match = new RegExp(se + "$") : Z.match = new RegExp("^" + se)), W != "0" && (ne === "SFX" ? Z.remove = new RegExp(W + "$") : Z.remove = W), ge.push(Z);
                }
                _[Se] = { type: ne, combineable: de === "Y", entries: ge }, B += N;
              } else if (ne === "COMPOUNDRULE") {
                for (N = parseInt(he[1], 10), z = B + 1, Q = B + 1 + N; z < Q; z++)
                  M = K[z], P = M.split(/\s+/), this.compoundRules.push(P[1]);
                B += N;
              } else ne === "REP" ? (P = M.split(/\s+/), P.length === 3 && this.replacementTable.push([P[1], P[2]])) : this.flags[ne] = he[1];
            }
          return _;
        },
        /**
         * Removes comments.
         *
         * @param {string} data A line from an affix file.
         * @return {string} The cleaned-up line.
         */
        _removeAffixComments: function(F) {
          return F.match(/^\s*#/) ? "" : F;
        },
        /**
         * Parses the words out from the .dic file.
         *
         * @param {string} data The data from the dictionary file.
         * @returns {Map} The lookup table containing all of the words and
         *                 word forms from the dictionary.
         */
        _parseDIC: function(F) {
          F = this._removeDicComments(F);
          var _ = F.split(/\r?\n/), M = /* @__PURE__ */ new Map();
          function R(Le, Ee) {
            M.has(Le) || M.set(Le, null), Ee.length > 0 && (M.get(Le) === null && M.set(Le, []), M.get(Le).push(Ee));
          }
          for (var N = 1, P = _.length; N < P; N++) {
            var B = _[N];
            if (B) {
              var z = B.replace(/\s.*$/, ""), te = z.split("/", 2), Q = te[0];
              if (te.length > 1) {
                var K = this.parseRuleCodes(te[1]);
                (!("NEEDAFFIX" in this.flags) || K.indexOf(this.flags.NEEDAFFIX) === -1) && R(Q, K);
                for (var he = 0, ne = K.length; he < ne; he++) {
                  var Se = K[he], de = this.rules[Se];
                  if (de)
                    for (var ge = this._applyRule(Q, de), W = 0, X = ge.length; W < X; W++) {
                      var U = ge[W];
                      if (R(U, []), de.combineable)
                        for (var G = he + 1; G < ne; G++) {
                          var se = K[G], Z = this.rules[se];
                          if (Z && Z.combineable && de.type != Z.type)
                            for (var fe = this._applyRule(U, Z), ye = 0, Xe = fe.length; ye < Xe; ye++) {
                              var ae = fe[ye];
                              R(ae, []);
                            }
                        }
                    }
                  Se in this.compoundRuleCodes && this.compoundRuleCodes[Se].push(Q);
                }
              } else
                R(Q.trim(), []);
            }
          }
          return M;
        },
        /**
         * Removes comment lines and then cleans up blank lines and trailing whitespace.
         *
         * @param {string} data The data from a .dic file.
         * @return {string} The cleaned-up data.
         */
        _removeDicComments: function(F) {
          return F = F.replace(/^\t.*$/mg, ""), F;
        },
        parseRuleCodes: function(F) {
          if (F)
            if ("FLAG" in this.flags)
              if (this.flags.FLAG === "long") {
                for (var _ = [], M = 0, R = F.length; M < R; M += 2)
                  _.push(F.substr(M, 2));
                return _;
              } else return this.flags.FLAG === "num" ? F.split(",") : this.flags.FLAG === "UTF-8" ? Array.from(F) : F.split("");
            else return F.split("");
          else return [];
        },
        /**
         * Applies an affix rule to a word.
         *
         * @param {string} word The base word.
         * @param {Object} rule The affix rule.
         * @returns {string[]} The new words generated by the rule.
         */
        _applyRule: function(F, _) {
          for (var M = _.entries, R = [], N = 0, P = M.length; N < P; N++) {
            var B = M[N];
            if (!B.match || F.match(B.match)) {
              var z = F;
              if (B.remove && (z = z.replace(B.remove, "")), _.type === "SFX" ? z = z + B.add : z = B.add + z, R.push(z), "continuationClasses" in B)
                for (var te = 0, Q = B.continuationClasses.length; te < Q; te++) {
                  var K = this.rules[B.continuationClasses[te]];
                  K && (R = R.concat(this._applyRule(z, K)));
                }
            }
          }
          return R;
        },
        /**
         * Checks whether a word or a capitalization variant exists in the current dictionary.
         * The word is trimmed and several variations of capitalizations are checked.
         * If you want to check a word without any changes made to it, call checkExact()
         *
         * @see http://blog.stevenlevithan.com/archives/faster-trim-javascript re:trimming function
         *
         * @param {string} aWord The word to check.
         * @returns {boolean}
         */
        check: function(F) {
          if (!this.loaded)
            throw "Dictionary not loaded.";
          if (!F)
            return !1;
          var _ = F.replace(/^\s\s*/, "").replace(/\s\s*$/, "");
          if (this.checkExact(_))
            return !0;
          if (_.toUpperCase() === _) {
            var M = _[0] + _.substring(1).toLowerCase();
            if (this.hasFlag(M, "KEEPCASE"))
              return !1;
            if (this.checkExact(M) || this.checkExact(_.toLowerCase()))
              return !0;
          }
          var R = _[0].toLowerCase() + _.substring(1);
          if (R !== _) {
            if (this.hasFlag(R, "KEEPCASE"))
              return !1;
            if (this.checkExact(R))
              return !0;
          }
          return !1;
        },
        /**
         * Checks whether a word exists in the current dictionary.
         *
         * @param {string} word The word to check.
         * @returns {boolean}
         */
        checkExact: function(F) {
          if (!this.loaded)
            throw "Dictionary not loaded.";
          var _ = this.dictionaryTable.get(F), M, R;
          if (typeof _ > "u") {
            if ("COMPOUNDMIN" in this.flags && F.length >= this.flags.COMPOUNDMIN) {
              for (M = 0, R = this.compoundRules.length; M < R; M++)
                if (F.match(this.compoundRules[M]))
                  return !0;
            }
          } else {
            if (_ === null)
              return !0;
            if (typeof _ == "object") {
              for (M = 0, R = _.length; M < R; M++)
                if (!this.hasFlag(F, "ONLYINCOMPOUND", _[M]))
                  return !0;
            }
          }
          return !1;
        },
        /**
         * Looks up whether a given word is flagged with a given flag.
         *
         * @param {string} word The word in question.
         * @param {string} flag The flag in question.
         * @return {boolean}
         */
        hasFlag: function(F, _, M) {
          if (!this.loaded)
            throw "Dictionary not loaded.";
          return !!(_ in this.flags && (typeof M > "u" && (M = Array.prototype.concat.apply([], this.dictionaryTable.get(F))), M && M.indexOf(this.flags[_]) !== -1));
        },
        /**
         * Returns a list of suggestions for a misspelled word.
         *
         * @see http://www.norvig.com/spell-correct.html for the basis of this suggestor.
         * This suggestor is primitive, but it works.
         *
         * @param {string} word The misspelling.
         * @param {number} [limit=5] The maximum number of suggestions to return.
         * @returns {string[]} The array of suggestions.
         */
        alphabet: "",
        suggest: function(F, _) {
          if (!this.loaded)
            throw "Dictionary not loaded.";
          if (_ = _ || 5, this.memoized.hasOwnProperty(F)) {
            var M = this.memoized[F].limit;
            if (_ <= M || this.memoized[F].suggestions.length < M)
              return this.memoized[F].suggestions.slice(0, _);
          }
          if (this.check(F))
            return [];
          for (var R = 0, N = this.replacementTable.length; R < N; R++) {
            var P = this.replacementTable[R];
            if (F.indexOf(P[0]) !== -1) {
              var B = F.replace(P[0], P[1]);
              if (this.check(B))
                return [B];
            }
          }
          if (!this.alphabet) {
            this.alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", "TRY" in this.flags && (this.alphabet += this.flags.TRY), "WORDCHARS" in this.flags && (this.alphabet += this.flags.WORDCHARS);
            var z = this.alphabet.split("");
            z.sort();
            for (var te = {}, R = 0; R < z.length; R++)
              te[z[R]] = !0;
            this.alphabet = "";
            for (var R in te)
              this.alphabet += R;
          }
          var Q = this;
          function K(ne, Se) {
            var de = {}, ge, W, X, U, G = Q.alphabet.length;
            for (var se in ne)
              for (ge = 0, X = se.length + 1; ge < X; ge++) {
                var Z = [se.substring(0, ge), se.substring(ge)];
                if (Z[1] && (U = Z[0] + Z[1].substring(1), (!Se || Q.check(U)) && (U in de ? de[U] += 1 : de[U] = 1)), Z[1].length > 1 && Z[1][1] !== Z[1][0] && (U = Z[0] + Z[1][1] + Z[1][0] + Z[1].substring(2), (!Se || Q.check(U)) && (U in de ? de[U] += 1 : de[U] = 1)), Z[1]) {
                  var fe = Z[1].substring(0, 1).toUpperCase() === Z[1].substring(0, 1) ? "uppercase" : "lowercase";
                  for (W = 0; W < G; W++) {
                    var ye = Q.alphabet[W];
                    fe === "uppercase" && (ye = ye.toUpperCase()), ye != Z[1].substring(0, 1) && (U = Z[0] + ye + Z[1].substring(1), (!Se || Q.check(U)) && (U in de ? de[U] += 1 : de[U] = 1));
                  }
                }
                if (Z[1])
                  for (W = 0; W < G; W++) {
                    var fe = Z[0].substring(-1).toUpperCase() === Z[0].substring(-1) && Z[1].substring(0, 1).toUpperCase() === Z[1].substring(0, 1) ? "uppercase" : "lowercase", ye = Q.alphabet[W];
                    fe === "uppercase" && (ye = ye.toUpperCase()), U = Z[0] + ye + Z[1], (!Se || Q.check(U)) && (U in de ? de[U] += 1 : de[U] = 1);
                  }
              }
            return de;
          }
          function he(ne) {
            var Se, de = K((Se = {}, Se[ne] = !0, Se)), ge = K(de, !0), W = ge;
            for (var X in de)
              Q.check(X) && (X in W ? W[X] += de[X] : W[X] = de[X]);
            var U, G = [];
            for (U in W)
              W.hasOwnProperty(U) && (Q.hasFlag(U, "PRIORITYSUGGEST") && (W[U] += 1e3), G.push([U, W[U]]));
            function se(Xe, ae) {
              var Le = Xe[1], Ee = ae[1];
              return Le < Ee ? -1 : Le > Ee ? 1 : ae[0].localeCompare(Xe[0]);
            }
            G.sort(se).reverse();
            var Z = [], fe = "lowercase";
            ne.toUpperCase() === ne ? fe = "uppercase" : ne.substr(0, 1).toUpperCase() + ne.substr(1).toLowerCase() === ne && (fe = "capitalized");
            var ye = _;
            for (U = 0; U < Math.min(ye, G.length); U++)
              fe === "uppercase" ? G[U][0] = G[U][0].toUpperCase() : fe === "capitalized" && (G[U][0] = G[U][0].substr(0, 1).toUpperCase() + G[U][0].substr(1)), !Q.hasFlag(G[U][0], "NOSUGGEST") && Z.indexOf(G[U][0]) === -1 ? Z.push(G[U][0]) : ye++;
            return Z;
          }
          return this.memoized[F] = {
            suggestions: he(F),
            limit: _
          }, this.memoized[F].suggestions;
        }
      };
    })(), ue.exports = xe;
  })(da)), da.exports;
}
var pa, Gl;
function pf() {
  if (Gl) return pa;
  Gl = 1;
  var ue = df();
  function xe(F) {
    if (F = F || {}, typeof F.codeMirrorInstance != "function" || typeof F.codeMirrorInstance.defineMode != "function") {
      console.log("CodeMirror Spell Checker: You must provide an instance of CodeMirror via the option `codeMirrorInstance`");
      return;
    }
    String.prototype.includes || (String.prototype.includes = function() {
      return String.prototype.indexOf.apply(this, arguments) !== -1;
    }), F.codeMirrorInstance.defineMode("spell-checker", function(_) {
      if (!xe.aff_loading) {
        xe.aff_loading = !0;
        var M = new XMLHttpRequest();
        M.open("GET", "https://cdn.jsdelivr.net/codemirror.spell-checker/latest/en_US.aff", !0), M.onload = function() {
          M.readyState === 4 && M.status === 200 && (xe.aff_data = M.responseText, xe.num_loaded++, xe.num_loaded == 2 && (xe.typo = new ue("en_US", xe.aff_data, xe.dic_data, {
            platform: "any"
          })));
        }, M.send(null);
      }
      if (!xe.dic_loading) {
        xe.dic_loading = !0;
        var R = new XMLHttpRequest();
        R.open("GET", "https://cdn.jsdelivr.net/codemirror.spell-checker/latest/en_US.dic", !0), R.onload = function() {
          R.readyState === 4 && R.status === 200 && (xe.dic_data = R.responseText, xe.num_loaded++, xe.num_loaded == 2 && (xe.typo = new ue("en_US", xe.aff_data, xe.dic_data, {
            platform: "any"
          })));
        }, R.send(null);
      }
      var N = '!"#$%&()*+,-./:;<=>?@[\\]^_`{|}~ ', P = {
        token: function(z) {
          var te = z.peek(), Q = "";
          if (N.includes(te))
            return z.next(), null;
          for (; (te = z.peek()) != null && !N.includes(te); )
            Q += te, z.next();
          return xe.typo && !xe.typo.check(Q) ? "spell-error" : null;
        }
      }, B = F.codeMirrorInstance.getMode(
        _,
        _.backdrop || "text/plain"
      );
      return F.codeMirrorInstance.overlayMode(B, P, !0);
    });
  }
  return xe.num_loaded = 0, xe.aff_loading = !1, xe.dic_loading = !1, xe.aff_data = "", xe.dic_data = "", xe.typo, pa = xe, pa;
}
var ga = {}, jl;
function gf() {
  return jl || (jl = 1, (function(ue) {
    function xe(O, H) {
      for (var E = 0; E < H.length; E++) {
        var h = H[E];
        h.enumerable = h.enumerable || !1, h.configurable = !0, "value" in h && (h.writable = !0), Object.defineProperty(O, B(h.key), h);
      }
    }
    function F(O, H, E) {
      return E && xe(O, E), Object.defineProperty(O, "prototype", {
        writable: !1
      }), O;
    }
    function _() {
      return _ = Object.assign ? Object.assign.bind() : function(O) {
        for (var H = 1; H < arguments.length; H++) {
          var E = arguments[H];
          for (var h in E)
            Object.prototype.hasOwnProperty.call(E, h) && (O[h] = E[h]);
        }
        return O;
      }, _.apply(this, arguments);
    }
    function M(O, H) {
      if (O) {
        if (typeof O == "string") return R(O, H);
        var E = Object.prototype.toString.call(O).slice(8, -1);
        if (E === "Object" && O.constructor && (E = O.constructor.name), E === "Map" || E === "Set") return Array.from(O);
        if (E === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(E)) return R(O, H);
      }
    }
    function R(O, H) {
      (H == null || H > O.length) && (H = O.length);
      for (var E = 0, h = new Array(H); E < H; E++) h[E] = O[E];
      return h;
    }
    function N(O, H) {
      var E = typeof Symbol < "u" && O[Symbol.iterator] || O["@@iterator"];
      if (E) return (E = E.call(O)).next.bind(E);
      if (Array.isArray(O) || (E = M(O)) || H) {
        E && (O = E);
        var h = 0;
        return function() {
          return h >= O.length ? {
            done: !0
          } : {
            done: !1,
            value: O[h++]
          };
        };
      }
      throw new TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
    }
    function P(O, H) {
      if (typeof O != "object" || O === null) return O;
      var E = O[Symbol.toPrimitive];
      if (E !== void 0) {
        var h = E.call(O, H);
        if (typeof h != "object") return h;
        throw new TypeError("@@toPrimitive must return a primitive value.");
      }
      return String(O);
    }
    function B(O) {
      var H = P(O, "string");
      return typeof H == "symbol" ? H : String(H);
    }
    function z() {
      return {
        async: !1,
        baseUrl: null,
        breaks: !1,
        extensions: null,
        gfm: !0,
        headerIds: !0,
        headerPrefix: "",
        highlight: null,
        hooks: null,
        langPrefix: "language-",
        mangle: !0,
        pedantic: !1,
        renderer: null,
        sanitize: !1,
        sanitizer: null,
        silent: !1,
        smartypants: !1,
        tokenizer: null,
        walkTokens: null,
        xhtml: !1
      };
    }
    ue.defaults = z();
    function te(O) {
      ue.defaults = O;
    }
    var Q = /[&<>"']/, K = new RegExp(Q.source, "g"), he = /[<>"']|&(?!(#\d{1,7}|#[Xx][a-fA-F0-9]{1,6}|\w+);)/, ne = new RegExp(he.source, "g"), Se = {
      "&": "&amp;",
      "<": "&lt;",
      ">": "&gt;",
      '"': "&quot;",
      "'": "&#39;"
    }, de = function(H) {
      return Se[H];
    };
    function ge(O, H) {
      if (H) {
        if (Q.test(O))
          return O.replace(K, de);
      } else if (he.test(O))
        return O.replace(ne, de);
      return O;
    }
    var W = /&(#(?:\d+)|(?:#x[0-9A-Fa-f]+)|(?:\w+));?/ig;
    function X(O) {
      return O.replace(W, function(H, E) {
        return E = E.toLowerCase(), E === "colon" ? ":" : E.charAt(0) === "#" ? E.charAt(1) === "x" ? String.fromCharCode(parseInt(E.substring(2), 16)) : String.fromCharCode(+E.substring(1)) : "";
      });
    }
    var U = /(^|[^\[])\^/g;
    function G(O, H) {
      O = typeof O == "string" ? O : O.source, H = H || "";
      var E = {
        replace: function(p, g) {
          return g = g.source || g, g = g.replace(U, "$1"), O = O.replace(p, g), E;
        },
        getRegex: function() {
          return new RegExp(O, H);
        }
      };
      return E;
    }
    var se = /[^\w:]/g, Z = /^$|^[a-z][a-z0-9+.-]*:|^[?#]/i;
    function fe(O, H, E) {
      if (O) {
        var h;
        try {
          h = decodeURIComponent(X(E)).replace(se, "").toLowerCase();
        } catch {
          return null;
        }
        if (h.indexOf("javascript:") === 0 || h.indexOf("vbscript:") === 0 || h.indexOf("data:") === 0)
          return null;
      }
      H && !Z.test(E) && (E = Ee(H, E));
      try {
        E = encodeURI(E).replace(/%25/g, "%");
      } catch {
        return null;
      }
      return E;
    }
    var ye = {}, Xe = /^[^:]+:\/*[^/]*$/, ae = /^([^:]+:)[\s\S]*$/, Le = /^([^:]+:\/*[^/]*)[\s\S]*$/;
    function Ee(O, H) {
      ye[" " + O] || (Xe.test(O) ? ye[" " + O] = O + "/" : ye[" " + O] = ee(O, "/", !0)), O = ye[" " + O];
      var E = O.indexOf(":") === -1;
      return H.substring(0, 2) === "//" ? E ? H : O.replace(ae, "$1") + H : H.charAt(0) === "/" ? E ? H : O.replace(Le, "$1") + H : O + H;
    }
    var Ne = {
      exec: function() {
      }
    };
    function L(O, H) {
      var E = O.replace(/\|/g, function(g, C, l) {
        for (var d = !1, m = C; --m >= 0 && l[m] === "\\"; )
          d = !d;
        return d ? "|" : " |";
      }), h = E.split(/ \|/), p = 0;
      if (h[0].trim() || h.shift(), h.length > 0 && !h[h.length - 1].trim() && h.pop(), h.length > H)
        h.splice(H);
      else
        for (; h.length < H; )
          h.push("");
      for (; p < h.length; p++)
        h[p] = h[p].trim().replace(/\\\|/g, "|");
      return h;
    }
    function ee(O, H, E) {
      var h = O.length;
      if (h === 0)
        return "";
      for (var p = 0; p < h; ) {
        var g = O.charAt(h - p - 1);
        if (g === H && !E)
          p++;
        else if (g !== H && E)
          p++;
        else
          break;
      }
      return O.slice(0, h - p);
    }
    function $(O, H) {
      if (O.indexOf(H[1]) === -1)
        return -1;
      for (var E = O.length, h = 0, p = 0; p < E; p++)
        if (O[p] === "\\")
          p++;
        else if (O[p] === H[0])
          h++;
        else if (O[p] === H[1] && (h--, h < 0))
          return p;
      return -1;
    }
    function be(O) {
      O && O.sanitize && !O.silent && console.warn("marked(): sanitize and sanitizer parameters are deprecated since version 0.7.0, should not be used and will be removed in the future. Read more here: https://marked.js.org/#/USING_ADVANCED.md#options");
    }
    function Ue(O, H) {
      if (H < 1)
        return "";
      for (var E = ""; H > 1; )
        H & 1 && (E += O), H >>= 1, O += O;
      return E + O;
    }
    function it(O, H, E, h) {
      var p = H.href, g = H.title ? ge(H.title) : null, C = O[1].replace(/\\([\[\]])/g, "$1");
      if (O[0].charAt(0) !== "!") {
        h.state.inLink = !0;
        var l = {
          type: "link",
          raw: E,
          href: p,
          title: g,
          text: C,
          tokens: h.inlineTokens(C)
        };
        return h.state.inLink = !1, l;
      }
      return {
        type: "image",
        raw: E,
        href: p,
        title: g,
        text: ge(C)
      };
    }
    function Pt(O, H) {
      var E = O.match(/^(\s+)(?:```)/);
      if (E === null)
        return H;
      var h = E[1];
      return H.split(`
`).map(function(p) {
        var g = p.match(/^\s+/);
        if (g === null)
          return p;
        var C = g[0];
        return C.length >= h.length ? p.slice(h.length) : p;
      }).join(`
`);
    }
    var w = /* @__PURE__ */ (function() {
      function O(E) {
        this.options = E || ue.defaults;
      }
      var H = O.prototype;
      return H.space = function(h) {
        var p = this.rules.block.newline.exec(h);
        if (p && p[0].length > 0)
          return {
            type: "space",
            raw: p[0]
          };
      }, H.code = function(h) {
        var p = this.rules.block.code.exec(h);
        if (p) {
          var g = p[0].replace(/^ {1,4}/gm, "");
          return {
            type: "code",
            raw: p[0],
            codeBlockStyle: "indented",
            text: this.options.pedantic ? g : ee(g, `
`)
          };
        }
      }, H.fences = function(h) {
        var p = this.rules.block.fences.exec(h);
        if (p) {
          var g = p[0], C = Pt(g, p[3] || "");
          return {
            type: "code",
            raw: g,
            lang: p[2] ? p[2].trim().replace(this.rules.inline._escapes, "$1") : p[2],
            text: C
          };
        }
      }, H.heading = function(h) {
        var p = this.rules.block.heading.exec(h);
        if (p) {
          var g = p[2].trim();
          if (/#$/.test(g)) {
            var C = ee(g, "#");
            (this.options.pedantic || !C || / $/.test(C)) && (g = C.trim());
          }
          return {
            type: "heading",
            raw: p[0],
            depth: p[1].length,
            text: g,
            tokens: this.lexer.inline(g)
          };
        }
      }, H.hr = function(h) {
        var p = this.rules.block.hr.exec(h);
        if (p)
          return {
            type: "hr",
            raw: p[0]
          };
      }, H.blockquote = function(h) {
        var p = this.rules.block.blockquote.exec(h);
        if (p) {
          var g = p[0].replace(/^ *>[ \t]?/gm, ""), C = this.lexer.state.top;
          this.lexer.state.top = !0;
          var l = this.lexer.blockTokens(g);
          return this.lexer.state.top = C, {
            type: "blockquote",
            raw: p[0],
            tokens: l,
            text: g
          };
        }
      }, H.list = function(h) {
        var p = this.rules.block.list.exec(h);
        if (p) {
          var g, C, l, d, m, D, k, I, b, S, x, re, ie = p[1].trim(), me = ie.length > 1, ce = {
            type: "list",
            raw: "",
            ordered: me,
            start: me ? +ie.slice(0, -1) : "",
            loose: !1,
            items: []
          };
          ie = me ? "\\d{1,9}\\" + ie.slice(-1) : "\\" + ie, this.options.pedantic && (ie = me ? ie : "[*+-]");
          for (var De = new RegExp("^( {0,3}" + ie + ")((?:[	 ][^\\n]*)?(?:\\n|$))"); h && (re = !1, !(!(p = De.exec(h)) || this.rules.block.hr.test(h))); ) {
            if (g = p[0], h = h.substring(g.length), I = p[2].split(`
`, 1)[0].replace(/^\t+/, function(at) {
              return " ".repeat(3 * at.length);
            }), b = h.split(`
`, 1)[0], this.options.pedantic ? (d = 2, x = I.trimLeft()) : (d = p[2].search(/[^ ]/), d = d > 4 ? 1 : d, x = I.slice(d), d += p[1].length), D = !1, !I && /^ *$/.test(b) && (g += b + `
`, h = h.substring(b.length + 1), re = !0), !re)
              for (var Ie = new RegExp("^ {0," + Math.min(3, d - 1) + "}(?:[*+-]|\\d{1,9}[.)])((?:[ 	][^\\n]*)?(?:\\n|$))"), et = new RegExp("^ {0," + Math.min(3, d - 1) + "}((?:- *){3,}|(?:_ *){3,}|(?:\\* *){3,})(?:\\n+|$)"), Ae = new RegExp("^ {0," + Math.min(3, d - 1) + "}(?:```|~~~)"), He = new RegExp("^ {0," + Math.min(3, d - 1) + "}#"); h && (S = h.split(`
`, 1)[0], b = S, this.options.pedantic && (b = b.replace(/^ {1,4}(?=( {4})*[^ ])/g, "  ")), !(Ae.test(b) || He.test(b) || Ie.test(b) || et.test(h))); ) {
                if (b.search(/[^ ]/) >= d || !b.trim())
                  x += `
` + b.slice(d);
                else {
                  if (D || I.search(/[^ ]/) >= 4 || Ae.test(I) || He.test(I) || et.test(I))
                    break;
                  x += `
` + b;
                }
                !D && !b.trim() && (D = !0), g += S + `
`, h = h.substring(S.length + 1), I = b.slice(d);
              }
            ce.loose || (k ? ce.loose = !0 : /\n *\n *$/.test(g) && (k = !0)), this.options.gfm && (C = /^\[[ xX]\] /.exec(x), C && (l = C[0] !== "[ ] ", x = x.replace(/^\[[ xX]\] +/, ""))), ce.items.push({
              type: "list_item",
              raw: g,
              task: !!C,
              checked: l,
              loose: !1,
              text: x
            }), ce.raw += g;
          }
          ce.items[ce.items.length - 1].raw = g.trimRight(), ce.items[ce.items.length - 1].text = x.trimRight(), ce.raw = ce.raw.trimRight();
          var Be = ce.items.length;
          for (m = 0; m < Be; m++)
            if (this.lexer.state.top = !1, ce.items[m].tokens = this.lexer.blockTokens(ce.items[m].text, []), !ce.loose) {
              var Ge = ce.items[m].tokens.filter(function(at) {
                return at.type === "space";
              }), lt = Ge.length > 0 && Ge.some(function(at) {
                return /\n.*\n/.test(at.raw);
              });
              ce.loose = lt;
            }
          if (ce.loose)
            for (m = 0; m < Be; m++)
              ce.items[m].loose = !0;
          return ce;
        }
      }, H.html = function(h) {
        var p = this.rules.block.html.exec(h);
        if (p) {
          var g = {
            type: "html",
            raw: p[0],
            pre: !this.options.sanitizer && (p[1] === "pre" || p[1] === "script" || p[1] === "style"),
            text: p[0]
          };
          if (this.options.sanitize) {
            var C = this.options.sanitizer ? this.options.sanitizer(p[0]) : ge(p[0]);
            g.type = "paragraph", g.text = C, g.tokens = this.lexer.inline(C);
          }
          return g;
        }
      }, H.def = function(h) {
        var p = this.rules.block.def.exec(h);
        if (p) {
          var g = p[1].toLowerCase().replace(/\s+/g, " "), C = p[2] ? p[2].replace(/^<(.*)>$/, "$1").replace(this.rules.inline._escapes, "$1") : "", l = p[3] ? p[3].substring(1, p[3].length - 1).replace(this.rules.inline._escapes, "$1") : p[3];
          return {
            type: "def",
            tag: g,
            raw: p[0],
            href: C,
            title: l
          };
        }
      }, H.table = function(h) {
        var p = this.rules.block.table.exec(h);
        if (p) {
          var g = {
            type: "table",
            header: L(p[1]).map(function(k) {
              return {
                text: k
              };
            }),
            align: p[2].replace(/^ *|\| *$/g, "").split(/ *\| */),
            rows: p[3] && p[3].trim() ? p[3].replace(/\n[ \t]*$/, "").split(`
`) : []
          };
          if (g.header.length === g.align.length) {
            g.raw = p[0];
            var C = g.align.length, l, d, m, D;
            for (l = 0; l < C; l++)
              /^ *-+: *$/.test(g.align[l]) ? g.align[l] = "right" : /^ *:-+: *$/.test(g.align[l]) ? g.align[l] = "center" : /^ *:-+ *$/.test(g.align[l]) ? g.align[l] = "left" : g.align[l] = null;
            for (C = g.rows.length, l = 0; l < C; l++)
              g.rows[l] = L(g.rows[l], g.header.length).map(function(k) {
                return {
                  text: k
                };
              });
            for (C = g.header.length, d = 0; d < C; d++)
              g.header[d].tokens = this.lexer.inline(g.header[d].text);
            for (C = g.rows.length, d = 0; d < C; d++)
              for (D = g.rows[d], m = 0; m < D.length; m++)
                D[m].tokens = this.lexer.inline(D[m].text);
            return g;
          }
        }
      }, H.lheading = function(h) {
        var p = this.rules.block.lheading.exec(h);
        if (p)
          return {
            type: "heading",
            raw: p[0],
            depth: p[2].charAt(0) === "=" ? 1 : 2,
            text: p[1],
            tokens: this.lexer.inline(p[1])
          };
      }, H.paragraph = function(h) {
        var p = this.rules.block.paragraph.exec(h);
        if (p) {
          var g = p[1].charAt(p[1].length - 1) === `
` ? p[1].slice(0, -1) : p[1];
          return {
            type: "paragraph",
            raw: p[0],
            text: g,
            tokens: this.lexer.inline(g)
          };
        }
      }, H.text = function(h) {
        var p = this.rules.block.text.exec(h);
        if (p)
          return {
            type: "text",
            raw: p[0],
            text: p[0],
            tokens: this.lexer.inline(p[0])
          };
      }, H.escape = function(h) {
        var p = this.rules.inline.escape.exec(h);
        if (p)
          return {
            type: "escape",
            raw: p[0],
            text: ge(p[1])
          };
      }, H.tag = function(h) {
        var p = this.rules.inline.tag.exec(h);
        if (p)
          return !this.lexer.state.inLink && /^<a /i.test(p[0]) ? this.lexer.state.inLink = !0 : this.lexer.state.inLink && /^<\/a>/i.test(p[0]) && (this.lexer.state.inLink = !1), !this.lexer.state.inRawBlock && /^<(pre|code|kbd|script)(\s|>)/i.test(p[0]) ? this.lexer.state.inRawBlock = !0 : this.lexer.state.inRawBlock && /^<\/(pre|code|kbd|script)(\s|>)/i.test(p[0]) && (this.lexer.state.inRawBlock = !1), {
            type: this.options.sanitize ? "text" : "html",
            raw: p[0],
            inLink: this.lexer.state.inLink,
            inRawBlock: this.lexer.state.inRawBlock,
            text: this.options.sanitize ? this.options.sanitizer ? this.options.sanitizer(p[0]) : ge(p[0]) : p[0]
          };
      }, H.link = function(h) {
        var p = this.rules.inline.link.exec(h);
        if (p) {
          var g = p[2].trim();
          if (!this.options.pedantic && /^</.test(g)) {
            if (!/>$/.test(g))
              return;
            var C = ee(g.slice(0, -1), "\\");
            if ((g.length - C.length) % 2 === 0)
              return;
          } else {
            var l = $(p[2], "()");
            if (l > -1) {
              var d = p[0].indexOf("!") === 0 ? 5 : 4, m = d + p[1].length + l;
              p[2] = p[2].substring(0, l), p[0] = p[0].substring(0, m).trim(), p[3] = "";
            }
          }
          var D = p[2], k = "";
          if (this.options.pedantic) {
            var I = /^([^'"]*[^\s])\s+(['"])(.*)\2/.exec(D);
            I && (D = I[1], k = I[3]);
          } else
            k = p[3] ? p[3].slice(1, -1) : "";
          return D = D.trim(), /^</.test(D) && (this.options.pedantic && !/>$/.test(g) ? D = D.slice(1) : D = D.slice(1, -1)), it(p, {
            href: D && D.replace(this.rules.inline._escapes, "$1"),
            title: k && k.replace(this.rules.inline._escapes, "$1")
          }, p[0], this.lexer);
        }
      }, H.reflink = function(h, p) {
        var g;
        if ((g = this.rules.inline.reflink.exec(h)) || (g = this.rules.inline.nolink.exec(h))) {
          var C = (g[2] || g[1]).replace(/\s+/g, " ");
          if (C = p[C.toLowerCase()], !C) {
            var l = g[0].charAt(0);
            return {
              type: "text",
              raw: l,
              text: l
            };
          }
          return it(g, C, g[0], this.lexer);
        }
      }, H.emStrong = function(h, p, g) {
        g === void 0 && (g = "");
        var C = this.rules.inline.emStrong.lDelim.exec(h);
        if (C && !(C[3] && g.match(/(?:[0-9A-Za-z\xAA\xB2\xB3\xB5\xB9\xBA\xBC-\xBE\xC0-\xD6\xD8-\xF6\xF8-\u02C1\u02C6-\u02D1\u02E0-\u02E4\u02EC\u02EE\u0370-\u0374\u0376\u0377\u037A-\u037D\u037F\u0386\u0388-\u038A\u038C\u038E-\u03A1\u03A3-\u03F5\u03F7-\u0481\u048A-\u052F\u0531-\u0556\u0559\u0560-\u0588\u05D0-\u05EA\u05EF-\u05F2\u0620-\u064A\u0660-\u0669\u066E\u066F\u0671-\u06D3\u06D5\u06E5\u06E6\u06EE-\u06FC\u06FF\u0710\u0712-\u072F\u074D-\u07A5\u07B1\u07C0-\u07EA\u07F4\u07F5\u07FA\u0800-\u0815\u081A\u0824\u0828\u0840-\u0858\u0860-\u086A\u0870-\u0887\u0889-\u088E\u08A0-\u08C9\u0904-\u0939\u093D\u0950\u0958-\u0961\u0966-\u096F\u0971-\u0980\u0985-\u098C\u098F\u0990\u0993-\u09A8\u09AA-\u09B0\u09B2\u09B6-\u09B9\u09BD\u09CE\u09DC\u09DD\u09DF-\u09E1\u09E6-\u09F1\u09F4-\u09F9\u09FC\u0A05-\u0A0A\u0A0F\u0A10\u0A13-\u0A28\u0A2A-\u0A30\u0A32\u0A33\u0A35\u0A36\u0A38\u0A39\u0A59-\u0A5C\u0A5E\u0A66-\u0A6F\u0A72-\u0A74\u0A85-\u0A8D\u0A8F-\u0A91\u0A93-\u0AA8\u0AAA-\u0AB0\u0AB2\u0AB3\u0AB5-\u0AB9\u0ABD\u0AD0\u0AE0\u0AE1\u0AE6-\u0AEF\u0AF9\u0B05-\u0B0C\u0B0F\u0B10\u0B13-\u0B28\u0B2A-\u0B30\u0B32\u0B33\u0B35-\u0B39\u0B3D\u0B5C\u0B5D\u0B5F-\u0B61\u0B66-\u0B6F\u0B71-\u0B77\u0B83\u0B85-\u0B8A\u0B8E-\u0B90\u0B92-\u0B95\u0B99\u0B9A\u0B9C\u0B9E\u0B9F\u0BA3\u0BA4\u0BA8-\u0BAA\u0BAE-\u0BB9\u0BD0\u0BE6-\u0BF2\u0C05-\u0C0C\u0C0E-\u0C10\u0C12-\u0C28\u0C2A-\u0C39\u0C3D\u0C58-\u0C5A\u0C5D\u0C60\u0C61\u0C66-\u0C6F\u0C78-\u0C7E\u0C80\u0C85-\u0C8C\u0C8E-\u0C90\u0C92-\u0CA8\u0CAA-\u0CB3\u0CB5-\u0CB9\u0CBD\u0CDD\u0CDE\u0CE0\u0CE1\u0CE6-\u0CEF\u0CF1\u0CF2\u0D04-\u0D0C\u0D0E-\u0D10\u0D12-\u0D3A\u0D3D\u0D4E\u0D54-\u0D56\u0D58-\u0D61\u0D66-\u0D78\u0D7A-\u0D7F\u0D85-\u0D96\u0D9A-\u0DB1\u0DB3-\u0DBB\u0DBD\u0DC0-\u0DC6\u0DE6-\u0DEF\u0E01-\u0E30\u0E32\u0E33\u0E40-\u0E46\u0E50-\u0E59\u0E81\u0E82\u0E84\u0E86-\u0E8A\u0E8C-\u0EA3\u0EA5\u0EA7-\u0EB0\u0EB2\u0EB3\u0EBD\u0EC0-\u0EC4\u0EC6\u0ED0-\u0ED9\u0EDC-\u0EDF\u0F00\u0F20-\u0F33\u0F40-\u0F47\u0F49-\u0F6C\u0F88-\u0F8C\u1000-\u102A\u103F-\u1049\u1050-\u1055\u105A-\u105D\u1061\u1065\u1066\u106E-\u1070\u1075-\u1081\u108E\u1090-\u1099\u10A0-\u10C5\u10C7\u10CD\u10D0-\u10FA\u10FC-\u1248\u124A-\u124D\u1250-\u1256\u1258\u125A-\u125D\u1260-\u1288\u128A-\u128D\u1290-\u12B0\u12B2-\u12B5\u12B8-\u12BE\u12C0\u12C2-\u12C5\u12C8-\u12D6\u12D8-\u1310\u1312-\u1315\u1318-\u135A\u1369-\u137C\u1380-\u138F\u13A0-\u13F5\u13F8-\u13FD\u1401-\u166C\u166F-\u167F\u1681-\u169A\u16A0-\u16EA\u16EE-\u16F8\u1700-\u1711\u171F-\u1731\u1740-\u1751\u1760-\u176C\u176E-\u1770\u1780-\u17B3\u17D7\u17DC\u17E0-\u17E9\u17F0-\u17F9\u1810-\u1819\u1820-\u1878\u1880-\u1884\u1887-\u18A8\u18AA\u18B0-\u18F5\u1900-\u191E\u1946-\u196D\u1970-\u1974\u1980-\u19AB\u19B0-\u19C9\u19D0-\u19DA\u1A00-\u1A16\u1A20-\u1A54\u1A80-\u1A89\u1A90-\u1A99\u1AA7\u1B05-\u1B33\u1B45-\u1B4C\u1B50-\u1B59\u1B83-\u1BA0\u1BAE-\u1BE5\u1C00-\u1C23\u1C40-\u1C49\u1C4D-\u1C7D\u1C80-\u1C88\u1C90-\u1CBA\u1CBD-\u1CBF\u1CE9-\u1CEC\u1CEE-\u1CF3\u1CF5\u1CF6\u1CFA\u1D00-\u1DBF\u1E00-\u1F15\u1F18-\u1F1D\u1F20-\u1F45\u1F48-\u1F4D\u1F50-\u1F57\u1F59\u1F5B\u1F5D\u1F5F-\u1F7D\u1F80-\u1FB4\u1FB6-\u1FBC\u1FBE\u1FC2-\u1FC4\u1FC6-\u1FCC\u1FD0-\u1FD3\u1FD6-\u1FDB\u1FE0-\u1FEC\u1FF2-\u1FF4\u1FF6-\u1FFC\u2070\u2071\u2074-\u2079\u207F-\u2089\u2090-\u209C\u2102\u2107\u210A-\u2113\u2115\u2119-\u211D\u2124\u2126\u2128\u212A-\u212D\u212F-\u2139\u213C-\u213F\u2145-\u2149\u214E\u2150-\u2189\u2460-\u249B\u24EA-\u24FF\u2776-\u2793\u2C00-\u2CE4\u2CEB-\u2CEE\u2CF2\u2CF3\u2CFD\u2D00-\u2D25\u2D27\u2D2D\u2D30-\u2D67\u2D6F\u2D80-\u2D96\u2DA0-\u2DA6\u2DA8-\u2DAE\u2DB0-\u2DB6\u2DB8-\u2DBE\u2DC0-\u2DC6\u2DC8-\u2DCE\u2DD0-\u2DD6\u2DD8-\u2DDE\u2E2F\u3005-\u3007\u3021-\u3029\u3031-\u3035\u3038-\u303C\u3041-\u3096\u309D-\u309F\u30A1-\u30FA\u30FC-\u30FF\u3105-\u312F\u3131-\u318E\u3192-\u3195\u31A0-\u31BF\u31F0-\u31FF\u3220-\u3229\u3248-\u324F\u3251-\u325F\u3280-\u3289\u32B1-\u32BF\u3400-\u4DBF\u4E00-\uA48C\uA4D0-\uA4FD\uA500-\uA60C\uA610-\uA62B\uA640-\uA66E\uA67F-\uA69D\uA6A0-\uA6EF\uA717-\uA71F\uA722-\uA788\uA78B-\uA7CA\uA7D0\uA7D1\uA7D3\uA7D5-\uA7D9\uA7F2-\uA801\uA803-\uA805\uA807-\uA80A\uA80C-\uA822\uA830-\uA835\uA840-\uA873\uA882-\uA8B3\uA8D0-\uA8D9\uA8F2-\uA8F7\uA8FB\uA8FD\uA8FE\uA900-\uA925\uA930-\uA946\uA960-\uA97C\uA984-\uA9B2\uA9CF-\uA9D9\uA9E0-\uA9E4\uA9E6-\uA9FE\uAA00-\uAA28\uAA40-\uAA42\uAA44-\uAA4B\uAA50-\uAA59\uAA60-\uAA76\uAA7A\uAA7E-\uAAAF\uAAB1\uAAB5\uAAB6\uAAB9-\uAABD\uAAC0\uAAC2\uAADB-\uAADD\uAAE0-\uAAEA\uAAF2-\uAAF4\uAB01-\uAB06\uAB09-\uAB0E\uAB11-\uAB16\uAB20-\uAB26\uAB28-\uAB2E\uAB30-\uAB5A\uAB5C-\uAB69\uAB70-\uABE2\uABF0-\uABF9\uAC00-\uD7A3\uD7B0-\uD7C6\uD7CB-\uD7FB\uF900-\uFA6D\uFA70-\uFAD9\uFB00-\uFB06\uFB13-\uFB17\uFB1D\uFB1F-\uFB28\uFB2A-\uFB36\uFB38-\uFB3C\uFB3E\uFB40\uFB41\uFB43\uFB44\uFB46-\uFBB1\uFBD3-\uFD3D\uFD50-\uFD8F\uFD92-\uFDC7\uFDF0-\uFDFB\uFE70-\uFE74\uFE76-\uFEFC\uFF10-\uFF19\uFF21-\uFF3A\uFF41-\uFF5A\uFF66-\uFFBE\uFFC2-\uFFC7\uFFCA-\uFFCF\uFFD2-\uFFD7\uFFDA-\uFFDC]|\uD800[\uDC00-\uDC0B\uDC0D-\uDC26\uDC28-\uDC3A\uDC3C\uDC3D\uDC3F-\uDC4D\uDC50-\uDC5D\uDC80-\uDCFA\uDD07-\uDD33\uDD40-\uDD78\uDD8A\uDD8B\uDE80-\uDE9C\uDEA0-\uDED0\uDEE1-\uDEFB\uDF00-\uDF23\uDF2D-\uDF4A\uDF50-\uDF75\uDF80-\uDF9D\uDFA0-\uDFC3\uDFC8-\uDFCF\uDFD1-\uDFD5]|\uD801[\uDC00-\uDC9D\uDCA0-\uDCA9\uDCB0-\uDCD3\uDCD8-\uDCFB\uDD00-\uDD27\uDD30-\uDD63\uDD70-\uDD7A\uDD7C-\uDD8A\uDD8C-\uDD92\uDD94\uDD95\uDD97-\uDDA1\uDDA3-\uDDB1\uDDB3-\uDDB9\uDDBB\uDDBC\uDE00-\uDF36\uDF40-\uDF55\uDF60-\uDF67\uDF80-\uDF85\uDF87-\uDFB0\uDFB2-\uDFBA]|\uD802[\uDC00-\uDC05\uDC08\uDC0A-\uDC35\uDC37\uDC38\uDC3C\uDC3F-\uDC55\uDC58-\uDC76\uDC79-\uDC9E\uDCA7-\uDCAF\uDCE0-\uDCF2\uDCF4\uDCF5\uDCFB-\uDD1B\uDD20-\uDD39\uDD80-\uDDB7\uDDBC-\uDDCF\uDDD2-\uDE00\uDE10-\uDE13\uDE15-\uDE17\uDE19-\uDE35\uDE40-\uDE48\uDE60-\uDE7E\uDE80-\uDE9F\uDEC0-\uDEC7\uDEC9-\uDEE4\uDEEB-\uDEEF\uDF00-\uDF35\uDF40-\uDF55\uDF58-\uDF72\uDF78-\uDF91\uDFA9-\uDFAF]|\uD803[\uDC00-\uDC48\uDC80-\uDCB2\uDCC0-\uDCF2\uDCFA-\uDD23\uDD30-\uDD39\uDE60-\uDE7E\uDE80-\uDEA9\uDEB0\uDEB1\uDF00-\uDF27\uDF30-\uDF45\uDF51-\uDF54\uDF70-\uDF81\uDFB0-\uDFCB\uDFE0-\uDFF6]|\uD804[\uDC03-\uDC37\uDC52-\uDC6F\uDC71\uDC72\uDC75\uDC83-\uDCAF\uDCD0-\uDCE8\uDCF0-\uDCF9\uDD03-\uDD26\uDD36-\uDD3F\uDD44\uDD47\uDD50-\uDD72\uDD76\uDD83-\uDDB2\uDDC1-\uDDC4\uDDD0-\uDDDA\uDDDC\uDDE1-\uDDF4\uDE00-\uDE11\uDE13-\uDE2B\uDE80-\uDE86\uDE88\uDE8A-\uDE8D\uDE8F-\uDE9D\uDE9F-\uDEA8\uDEB0-\uDEDE\uDEF0-\uDEF9\uDF05-\uDF0C\uDF0F\uDF10\uDF13-\uDF28\uDF2A-\uDF30\uDF32\uDF33\uDF35-\uDF39\uDF3D\uDF50\uDF5D-\uDF61]|\uD805[\uDC00-\uDC34\uDC47-\uDC4A\uDC50-\uDC59\uDC5F-\uDC61\uDC80-\uDCAF\uDCC4\uDCC5\uDCC7\uDCD0-\uDCD9\uDD80-\uDDAE\uDDD8-\uDDDB\uDE00-\uDE2F\uDE44\uDE50-\uDE59\uDE80-\uDEAA\uDEB8\uDEC0-\uDEC9\uDF00-\uDF1A\uDF30-\uDF3B\uDF40-\uDF46]|\uD806[\uDC00-\uDC2B\uDCA0-\uDCF2\uDCFF-\uDD06\uDD09\uDD0C-\uDD13\uDD15\uDD16\uDD18-\uDD2F\uDD3F\uDD41\uDD50-\uDD59\uDDA0-\uDDA7\uDDAA-\uDDD0\uDDE1\uDDE3\uDE00\uDE0B-\uDE32\uDE3A\uDE50\uDE5C-\uDE89\uDE9D\uDEB0-\uDEF8]|\uD807[\uDC00-\uDC08\uDC0A-\uDC2E\uDC40\uDC50-\uDC6C\uDC72-\uDC8F\uDD00-\uDD06\uDD08\uDD09\uDD0B-\uDD30\uDD46\uDD50-\uDD59\uDD60-\uDD65\uDD67\uDD68\uDD6A-\uDD89\uDD98\uDDA0-\uDDA9\uDEE0-\uDEF2\uDFB0\uDFC0-\uDFD4]|\uD808[\uDC00-\uDF99]|\uD809[\uDC00-\uDC6E\uDC80-\uDD43]|\uD80B[\uDF90-\uDFF0]|[\uD80C\uD81C-\uD820\uD822\uD840-\uD868\uD86A-\uD86C\uD86F-\uD872\uD874-\uD879\uD880-\uD883][\uDC00-\uDFFF]|\uD80D[\uDC00-\uDC2E]|\uD811[\uDC00-\uDE46]|\uD81A[\uDC00-\uDE38\uDE40-\uDE5E\uDE60-\uDE69\uDE70-\uDEBE\uDEC0-\uDEC9\uDED0-\uDEED\uDF00-\uDF2F\uDF40-\uDF43\uDF50-\uDF59\uDF5B-\uDF61\uDF63-\uDF77\uDF7D-\uDF8F]|\uD81B[\uDE40-\uDE96\uDF00-\uDF4A\uDF50\uDF93-\uDF9F\uDFE0\uDFE1\uDFE3]|\uD821[\uDC00-\uDFF7]|\uD823[\uDC00-\uDCD5\uDD00-\uDD08]|\uD82B[\uDFF0-\uDFF3\uDFF5-\uDFFB\uDFFD\uDFFE]|\uD82C[\uDC00-\uDD22\uDD50-\uDD52\uDD64-\uDD67\uDD70-\uDEFB]|\uD82F[\uDC00-\uDC6A\uDC70-\uDC7C\uDC80-\uDC88\uDC90-\uDC99]|\uD834[\uDEE0-\uDEF3\uDF60-\uDF78]|\uD835[\uDC00-\uDC54\uDC56-\uDC9C\uDC9E\uDC9F\uDCA2\uDCA5\uDCA6\uDCA9-\uDCAC\uDCAE-\uDCB9\uDCBB\uDCBD-\uDCC3\uDCC5-\uDD05\uDD07-\uDD0A\uDD0D-\uDD14\uDD16-\uDD1C\uDD1E-\uDD39\uDD3B-\uDD3E\uDD40-\uDD44\uDD46\uDD4A-\uDD50\uDD52-\uDEA5\uDEA8-\uDEC0\uDEC2-\uDEDA\uDEDC-\uDEFA\uDEFC-\uDF14\uDF16-\uDF34\uDF36-\uDF4E\uDF50-\uDF6E\uDF70-\uDF88\uDF8A-\uDFA8\uDFAA-\uDFC2\uDFC4-\uDFCB\uDFCE-\uDFFF]|\uD837[\uDF00-\uDF1E]|\uD838[\uDD00-\uDD2C\uDD37-\uDD3D\uDD40-\uDD49\uDD4E\uDE90-\uDEAD\uDEC0-\uDEEB\uDEF0-\uDEF9]|\uD839[\uDFE0-\uDFE6\uDFE8-\uDFEB\uDFED\uDFEE\uDFF0-\uDFFE]|\uD83A[\uDC00-\uDCC4\uDCC7-\uDCCF\uDD00-\uDD43\uDD4B\uDD50-\uDD59]|\uD83B[\uDC71-\uDCAB\uDCAD-\uDCAF\uDCB1-\uDCB4\uDD01-\uDD2D\uDD2F-\uDD3D\uDE00-\uDE03\uDE05-\uDE1F\uDE21\uDE22\uDE24\uDE27\uDE29-\uDE32\uDE34-\uDE37\uDE39\uDE3B\uDE42\uDE47\uDE49\uDE4B\uDE4D-\uDE4F\uDE51\uDE52\uDE54\uDE57\uDE59\uDE5B\uDE5D\uDE5F\uDE61\uDE62\uDE64\uDE67-\uDE6A\uDE6C-\uDE72\uDE74-\uDE77\uDE79-\uDE7C\uDE7E\uDE80-\uDE89\uDE8B-\uDE9B\uDEA1-\uDEA3\uDEA5-\uDEA9\uDEAB-\uDEBB]|\uD83C[\uDD00-\uDD0C]|\uD83E[\uDFF0-\uDFF9]|\uD869[\uDC00-\uDEDF\uDF00-\uDFFF]|\uD86D[\uDC00-\uDF38\uDF40-\uDFFF]|\uD86E[\uDC00-\uDC1D\uDC20-\uDFFF]|\uD873[\uDC00-\uDEA1\uDEB0-\uDFFF]|\uD87A[\uDC00-\uDFE0]|\uD87E[\uDC00-\uDE1D]|\uD884[\uDC00-\uDF4A])/))) {
          var l = C[1] || C[2] || "";
          if (!l || l && (g === "" || this.rules.inline.punctuation.exec(g))) {
            var d = C[0].length - 1, m, D, k = d, I = 0, b = C[0][0] === "*" ? this.rules.inline.emStrong.rDelimAst : this.rules.inline.emStrong.rDelimUnd;
            for (b.lastIndex = 0, p = p.slice(-1 * h.length + d); (C = b.exec(p)) != null; )
              if (m = C[1] || C[2] || C[3] || C[4] || C[5] || C[6], !!m) {
                if (D = m.length, C[3] || C[4]) {
                  k += D;
                  continue;
                } else if ((C[5] || C[6]) && d % 3 && !((d + D) % 3)) {
                  I += D;
                  continue;
                }
                if (k -= D, !(k > 0)) {
                  D = Math.min(D, D + k + I);
                  var S = h.slice(0, d + C.index + (C[0].length - m.length) + D);
                  if (Math.min(d, D) % 2) {
                    var x = S.slice(1, -1);
                    return {
                      type: "em",
                      raw: S,
                      text: x,
                      tokens: this.lexer.inlineTokens(x)
                    };
                  }
                  var re = S.slice(2, -2);
                  return {
                    type: "strong",
                    raw: S,
                    text: re,
                    tokens: this.lexer.inlineTokens(re)
                  };
                }
              }
          }
        }
      }, H.codespan = function(h) {
        var p = this.rules.inline.code.exec(h);
        if (p) {
          var g = p[2].replace(/\n/g, " "), C = /[^ ]/.test(g), l = /^ /.test(g) && / $/.test(g);
          return C && l && (g = g.substring(1, g.length - 1)), g = ge(g, !0), {
            type: "codespan",
            raw: p[0],
            text: g
          };
        }
      }, H.br = function(h) {
        var p = this.rules.inline.br.exec(h);
        if (p)
          return {
            type: "br",
            raw: p[0]
          };
      }, H.del = function(h) {
        var p = this.rules.inline.del.exec(h);
        if (p)
          return {
            type: "del",
            raw: p[0],
            text: p[2],
            tokens: this.lexer.inlineTokens(p[2])
          };
      }, H.autolink = function(h, p) {
        var g = this.rules.inline.autolink.exec(h);
        if (g) {
          var C, l;
          return g[2] === "@" ? (C = ge(this.options.mangle ? p(g[1]) : g[1]), l = "mailto:" + C) : (C = ge(g[1]), l = C), {
            type: "link",
            raw: g[0],
            text: C,
            href: l,
            tokens: [{
              type: "text",
              raw: C,
              text: C
            }]
          };
        }
      }, H.url = function(h, p) {
        var g;
        if (g = this.rules.inline.url.exec(h)) {
          var C, l;
          if (g[2] === "@")
            C = ge(this.options.mangle ? p(g[0]) : g[0]), l = "mailto:" + C;
          else {
            var d;
            do
              d = g[0], g[0] = this.rules.inline._backpedal.exec(g[0])[0];
            while (d !== g[0]);
            C = ge(g[0]), g[1] === "www." ? l = "http://" + g[0] : l = g[0];
          }
          return {
            type: "link",
            raw: g[0],
            text: C,
            href: l,
            tokens: [{
              type: "text",
              raw: C,
              text: C
            }]
          };
        }
      }, H.inlineText = function(h, p) {
        var g = this.rules.inline.text.exec(h);
        if (g) {
          var C;
          return this.lexer.state.inRawBlock ? C = this.options.sanitize ? this.options.sanitizer ? this.options.sanitizer(g[0]) : ge(g[0]) : g[0] : C = ge(this.options.smartypants ? p(g[0]) : g[0]), {
            type: "text",
            raw: g[0],
            text: C
          };
        }
      }, O;
    })(), c = {
      newline: /^(?: *(?:\n|$))+/,
      code: /^( {4}[^\n]+(?:\n(?: *(?:\n|$))*)?)+/,
      fences: /^ {0,3}(`{3,}(?=[^`\n]*(?:\n|$))|~{3,})([^\n]*)(?:\n|$)(?:|([\s\S]*?)(?:\n|$))(?: {0,3}\1[~`]* *(?=\n|$)|$)/,
      hr: /^ {0,3}((?:-[\t ]*){3,}|(?:_[ \t]*){3,}|(?:\*[ \t]*){3,})(?:\n+|$)/,
      heading: /^ {0,3}(#{1,6})(?=\s|$)(.*)(?:\n+|$)/,
      blockquote: /^( {0,3}> ?(paragraph|[^\n]*)(?:\n|$))+/,
      list: /^( {0,3}bull)([ \t][^\n]+?)?(?:\n|$)/,
      html: "^ {0,3}(?:<(script|pre|style|textarea)[\\s>][\\s\\S]*?(?:</\\1>[^\\n]*\\n+|$)|comment[^\\n]*(\\n+|$)|<\\?[\\s\\S]*?(?:\\?>\\n*|$)|<![A-Z][\\s\\S]*?(?:>\\n*|$)|<!\\[CDATA\\[[\\s\\S]*?(?:\\]\\]>\\n*|$)|</?(tag)(?: +|\\n|/?>)[\\s\\S]*?(?:(?:\\n *)+\\n|$)|<(?!script|pre|style|textarea)([a-z][\\w-]*)(?:attribute)*? */?>(?=[ \\t]*(?:\\n|$))[\\s\\S]*?(?:(?:\\n *)+\\n|$)|</(?!script|pre|style|textarea)[a-z][\\w-]*\\s*>(?=[ \\t]*(?:\\n|$))[\\s\\S]*?(?:(?:\\n *)+\\n|$))",
      def: /^ {0,3}\[(label)\]: *(?:\n *)?([^<\s][^\s]*|<.*?>)(?:(?: +(?:\n *)?| *\n *)(title))? *(?:\n+|$)/,
      table: Ne,
      lheading: /^((?:.|\n(?!\n))+?)\n {0,3}(=+|-+) *(?:\n+|$)/,
      // regex template, placeholders will be replaced according to different paragraph
      // interruption rules of commonmark and the original markdown spec:
      _paragraph: /^([^\n]+(?:\n(?!hr|heading|lheading|blockquote|fences|list|html|table| +\n)[^\n]+)*)/,
      text: /^[^\n]+/
    };
    c._label = /(?!\s*\])(?:\\.|[^\[\]\\])+/, c._title = /(?:"(?:\\"?|[^"\\])*"|'[^'\n]*(?:\n[^'\n]+)*\n?'|\([^()]*\))/, c.def = G(c.def).replace("label", c._label).replace("title", c._title).getRegex(), c.bullet = /(?:[*+-]|\d{1,9}[.)])/, c.listItemStart = G(/^( *)(bull) */).replace("bull", c.bullet).getRegex(), c.list = G(c.list).replace(/bull/g, c.bullet).replace("hr", "\\n+(?=\\1?(?:(?:- *){3,}|(?:_ *){3,}|(?:\\* *){3,})(?:\\n+|$))").replace("def", "\\n+(?=" + c.def.source + ")").getRegex(), c._tag = "address|article|aside|base|basefont|blockquote|body|caption|center|col|colgroup|dd|details|dialog|dir|div|dl|dt|fieldset|figcaption|figure|footer|form|frame|frameset|h[1-6]|head|header|hr|html|iframe|legend|li|link|main|menu|menuitem|meta|nav|noframes|ol|optgroup|option|p|param|section|source|summary|table|tbody|td|tfoot|th|thead|title|tr|track|ul", c._comment = /<!--(?!-?>)[\s\S]*?(?:-->|$)/, c.html = G(c.html, "i").replace("comment", c._comment).replace("tag", c._tag).replace("attribute", / +[a-zA-Z:_][\w.:-]*(?: *= *"[^"\n]*"| *= *'[^'\n]*'| *= *[^\s"'=<>`]+)?/).getRegex(), c.paragraph = G(c._paragraph).replace("hr", c.hr).replace("heading", " {0,3}#{1,6} ").replace("|lheading", "").replace("|table", "").replace("blockquote", " {0,3}>").replace("fences", " {0,3}(?:`{3,}(?=[^`\\n]*\\n)|~{3,})[^\\n]*\\n").replace("list", " {0,3}(?:[*+-]|1[.)]) ").replace("html", "</?(?:tag)(?: +|\\n|/?>)|<(?:script|pre|style|textarea|!--)").replace("tag", c._tag).getRegex(), c.blockquote = G(c.blockquote).replace("paragraph", c.paragraph).getRegex(), c.normal = _({}, c), c.gfm = _({}, c.normal, {
      table: "^ *([^\\n ].*\\|.*)\\n {0,3}(?:\\| *)?(:?-+:? *(?:\\| *:?-+:? *)*)(?:\\| *)?(?:\\n((?:(?! *\\n|hr|heading|blockquote|code|fences|list|html).*(?:\\n|$))*)\\n*|$)"
      // Cells
    }), c.gfm.table = G(c.gfm.table).replace("hr", c.hr).replace("heading", " {0,3}#{1,6} ").replace("blockquote", " {0,3}>").replace("code", " {4}[^\\n]").replace("fences", " {0,3}(?:`{3,}(?=[^`\\n]*\\n)|~{3,})[^\\n]*\\n").replace("list", " {0,3}(?:[*+-]|1[.)]) ").replace("html", "</?(?:tag)(?: +|\\n|/?>)|<(?:script|pre|style|textarea|!--)").replace("tag", c._tag).getRegex(), c.gfm.paragraph = G(c._paragraph).replace("hr", c.hr).replace("heading", " {0,3}#{1,6} ").replace("|lheading", "").replace("table", c.gfm.table).replace("blockquote", " {0,3}>").replace("fences", " {0,3}(?:`{3,}(?=[^`\\n]*\\n)|~{3,})[^\\n]*\\n").replace("list", " {0,3}(?:[*+-]|1[.)]) ").replace("html", "</?(?:tag)(?: +|\\n|/?>)|<(?:script|pre|style|textarea|!--)").replace("tag", c._tag).getRegex(), c.pedantic = _({}, c.normal, {
      html: G(`^ *(?:comment *(?:\\n|\\s*$)|<(tag)[\\s\\S]+?</\\1> *(?:\\n{2,}|\\s*$)|<tag(?:"[^"]*"|'[^']*'|\\s[^'"/>\\s]*)*?/?> *(?:\\n{2,}|\\s*$))`).replace("comment", c._comment).replace(/tag/g, "(?!(?:a|em|strong|small|s|cite|q|dfn|abbr|data|time|code|var|samp|kbd|sub|sup|i|b|u|mark|ruby|rt|rp|bdi|bdo|span|br|wbr|ins|del|img)\\b)\\w+(?!:|[^\\w\\s@]*@)\\b").getRegex(),
      def: /^ *\[([^\]]+)\]: *<?([^\s>]+)>?(?: +(["(][^\n]+[")]))? *(?:\n+|$)/,
      heading: /^(#{1,6})(.*)(?:\n+|$)/,
      fences: Ne,
      // fences not supported
      lheading: /^(.+?)\n {0,3}(=+|-+) *(?:\n+|$)/,
      paragraph: G(c.normal._paragraph).replace("hr", c.hr).replace("heading", ` *#{1,6} *[^
]`).replace("lheading", c.lheading).replace("blockquote", " {0,3}>").replace("|fences", "").replace("|list", "").replace("|html", "").getRegex()
    });
    var j = {
      escape: /^\\([!"#$%&'()*+,\-./:;<=>?@\[\]\\^_`{|}~])/,
      autolink: /^<(scheme:[^\s\x00-\x1f<>]*|email)>/,
      url: Ne,
      tag: "^comment|^</[a-zA-Z][\\w:-]*\\s*>|^<[a-zA-Z][\\w-]*(?:attribute)*?\\s*/?>|^<\\?[\\s\\S]*?\\?>|^<![a-zA-Z]+\\s[\\s\\S]*?>|^<!\\[CDATA\\[[\\s\\S]*?\\]\\]>",
      // CDATA section
      link: /^!?\[(label)\]\(\s*(href)(?:\s+(title))?\s*\)/,
      reflink: /^!?\[(label)\]\[(ref)\]/,
      nolink: /^!?\[(ref)\](?:\[\])?/,
      reflinkSearch: "reflink|nolink(?!\\()",
      emStrong: {
        lDelim: /^(?:\*+(?:([punct_])|[^\s*]))|^_+(?:([punct*])|([^\s_]))/,
        //        (1) and (2) can only be a Right Delimiter. (3) and (4) can only be Left.  (5) and (6) can be either Left or Right.
        //          () Skip orphan inside strong                                      () Consume to delim     (1) #***                (2) a***#, a***                             (3) #***a, ***a                 (4) ***#              (5) #***#                 (6) a***a
        rDelimAst: /^(?:[^_*\\]|\\.)*?\_\_(?:[^_*\\]|\\.)*?\*(?:[^_*\\]|\\.)*?(?=\_\_)|(?:[^*\\]|\\.)+(?=[^*])|[punct_](\*+)(?=[\s]|$)|(?:[^punct*_\s\\]|\\.)(\*+)(?=[punct_\s]|$)|[punct_\s](\*+)(?=[^punct*_\s])|[\s](\*+)(?=[punct_])|[punct_](\*+)(?=[punct_])|(?:[^punct*_\s\\]|\\.)(\*+)(?=[^punct*_\s])/,
        rDelimUnd: /^(?:[^_*\\]|\\.)*?\*\*(?:[^_*\\]|\\.)*?\_(?:[^_*\\]|\\.)*?(?=\*\*)|(?:[^_\\]|\\.)+(?=[^_])|[punct*](\_+)(?=[\s]|$)|(?:[^punct*_\s\\]|\\.)(\_+)(?=[punct*\s]|$)|[punct*\s](\_+)(?=[^punct*_\s])|[\s](\_+)(?=[punct*])|[punct*](\_+)(?=[punct*])/
        // ^- Not allowed for _
      },
      code: /^(`+)([^`]|[^`][\s\S]*?[^`])\1(?!`)/,
      br: /^( {2,}|\\)\n(?!\s*$)/,
      del: Ne,
      text: /^(`+|[^`])(?:(?= {2,}\n)|[\s\S]*?(?:(?=[\\<!\[`*_]|\b_|$)|[^ ](?= {2,}\n)))/,
      punctuation: /^([\spunctuation])/
    };
    j._punctuation = "!\"#$%&'()+\\-.,/:;<=>?@\\[\\]`^{|}~", j.punctuation = G(j.punctuation).replace(/punctuation/g, j._punctuation).getRegex(), j.blockSkip = /\[[^\]]*?\]\([^\)]*?\)|`[^`]*?`|<[^>]*?>/g, j.escapedEmSt = /(?:^|[^\\])(?:\\\\)*\\[*_]/g, j._comment = G(c._comment).replace("(?:-->|$)", "-->").getRegex(), j.emStrong.lDelim = G(j.emStrong.lDelim).replace(/punct/g, j._punctuation).getRegex(), j.emStrong.rDelimAst = G(j.emStrong.rDelimAst, "g").replace(/punct/g, j._punctuation).getRegex(), j.emStrong.rDelimUnd = G(j.emStrong.rDelimUnd, "g").replace(/punct/g, j._punctuation).getRegex(), j._escapes = /\\([!"#$%&'()*+,\-./:;<=>?@\[\]\\^_`{|}~])/g, j._scheme = /[a-zA-Z][a-zA-Z0-9+.-]{1,31}/, j._email = /[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+(@)[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+(?![-_])/, j.autolink = G(j.autolink).replace("scheme", j._scheme).replace("email", j._email).getRegex(), j._attribute = /\s+[a-zA-Z:_][\w.:-]*(?:\s*=\s*"[^"]*"|\s*=\s*'[^']*'|\s*=\s*[^\s"'=<>`]+)?/, j.tag = G(j.tag).replace("comment", j._comment).replace("attribute", j._attribute).getRegex(), j._label = /(?:\[(?:\\.|[^\[\]\\])*\]|\\.|`[^`]*`|[^\[\]\\`])*?/, j._href = /<(?:\\.|[^\n<>\\])+>|[^\s\x00-\x1f]*/, j._title = /"(?:\\"?|[^"\\])*"|'(?:\\'?|[^'\\])*'|\((?:\\\)?|[^)\\])*\)/, j.link = G(j.link).replace("label", j._label).replace("href", j._href).replace("title", j._title).getRegex(), j.reflink = G(j.reflink).replace("label", j._label).replace("ref", c._label).getRegex(), j.nolink = G(j.nolink).replace("ref", c._label).getRegex(), j.reflinkSearch = G(j.reflinkSearch, "g").replace("reflink", j.reflink).replace("nolink", j.nolink).getRegex(), j.normal = _({}, j), j.pedantic = _({}, j.normal, {
      strong: {
        start: /^__|\*\*/,
        middle: /^__(?=\S)([\s\S]*?\S)__(?!_)|^\*\*(?=\S)([\s\S]*?\S)\*\*(?!\*)/,
        endAst: /\*\*(?!\*)/g,
        endUnd: /__(?!_)/g
      },
      em: {
        start: /^_|\*/,
        middle: /^()\*(?=\S)([\s\S]*?\S)\*(?!\*)|^_(?=\S)([\s\S]*?\S)_(?!_)/,
        endAst: /\*(?!\*)/g,
        endUnd: /_(?!_)/g
      },
      link: G(/^!?\[(label)\]\((.*?)\)/).replace("label", j._label).getRegex(),
      reflink: G(/^!?\[(label)\]\s*\[([^\]]*)\]/).replace("label", j._label).getRegex()
    }), j.gfm = _({}, j.normal, {
      escape: G(j.escape).replace("])", "~|])").getRegex(),
      _extended_email: /[A-Za-z0-9._+-]+(@)[a-zA-Z0-9-_]+(?:\.[a-zA-Z0-9-_]*[a-zA-Z0-9])+(?![-_])/,
      url: /^((?:ftp|https?):\/\/|www\.)(?:[a-zA-Z0-9\-]+\.?)+[^\s<]*|^email/,
      _backpedal: /(?:[^?!.,:;*_'"~()&]+|\([^)]*\)|&(?![a-zA-Z0-9]+;$)|[?!.,:;*_'"~)]+(?!$))+/,
      del: /^(~~?)(?=[^\s~])([\s\S]*?[^\s~])\1(?=[^~]|$)/,
      text: /^([`~]+|[^`~])(?:(?= {2,}\n)|(?=[a-zA-Z0-9.!#$%&'*+\/=?_`{\|}~-]+@)|[\s\S]*?(?:(?=[\\<!\[`*~_]|\b_|https?:\/\/|ftp:\/\/|www\.|$)|[^ ](?= {2,}\n)|[^a-zA-Z0-9.!#$%&'*+\/=?_`{\|}~-](?=[a-zA-Z0-9.!#$%&'*+\/=?_`{\|}~-]+@)))/
    }), j.gfm.url = G(j.gfm.url, "i").replace("email", j.gfm._extended_email).getRegex(), j.breaks = _({}, j.gfm, {
      br: G(j.br).replace("{2,}", "*").getRegex(),
      text: G(j.gfm.text).replace("\\b_", "\\b_| {2,}\\n").replace(/\{2,\}/g, "*").getRegex()
    });
    function _e(O) {
      return O.replace(/---/g, "—").replace(/--/g, "–").replace(/(^|[-\u2014/(\[{"\s])'/g, "$1‘").replace(/'/g, "’").replace(/(^|[-\u2014/(\[{\u2018\s])"/g, "$1“").replace(/"/g, "”").replace(/\.{3}/g, "…");
    }
    function Te(O) {
      var H = "", E, h, p = O.length;
      for (E = 0; E < p; E++)
        h = O.charCodeAt(E), Math.random() > 0.5 && (h = "x" + h.toString(16)), H += "&#" + h + ";";
      return H;
    }
    var $e = /* @__PURE__ */ (function() {
      function O(E) {
        this.tokens = [], this.tokens.links = /* @__PURE__ */ Object.create(null), this.options = E || ue.defaults, this.options.tokenizer = this.options.tokenizer || new w(), this.tokenizer = this.options.tokenizer, this.tokenizer.options = this.options, this.tokenizer.lexer = this, this.inlineQueue = [], this.state = {
          inLink: !1,
          inRawBlock: !1,
          top: !0
        };
        var h = {
          block: c.normal,
          inline: j.normal
        };
        this.options.pedantic ? (h.block = c.pedantic, h.inline = j.pedantic) : this.options.gfm && (h.block = c.gfm, this.options.breaks ? h.inline = j.breaks : h.inline = j.gfm), this.tokenizer.rules = h;
      }
      O.lex = function(h, p) {
        var g = new O(p);
        return g.lex(h);
      }, O.lexInline = function(h, p) {
        var g = new O(p);
        return g.inlineTokens(h);
      };
      var H = O.prototype;
      return H.lex = function(h) {
        h = h.replace(/\r\n|\r/g, `
`), this.blockTokens(h, this.tokens);
        for (var p; p = this.inlineQueue.shift(); )
          this.inlineTokens(p.src, p.tokens);
        return this.tokens;
      }, H.blockTokens = function(h, p) {
        var g = this;
        p === void 0 && (p = []), this.options.pedantic ? h = h.replace(/\t/g, "    ").replace(/^ +$/gm, "") : h = h.replace(/^( *)(\t+)/gm, function(k, I, b) {
          return I + "    ".repeat(b.length);
        });
        for (var C, l, d, m; h; )
          if (!(this.options.extensions && this.options.extensions.block && this.options.extensions.block.some(function(k) {
            return (C = k.call({
              lexer: g
            }, h, p)) ? (h = h.substring(C.raw.length), p.push(C), !0) : !1;
          }))) {
            if (C = this.tokenizer.space(h)) {
              h = h.substring(C.raw.length), C.raw.length === 1 && p.length > 0 ? p[p.length - 1].raw += `
` : p.push(C);
              continue;
            }
            if (C = this.tokenizer.code(h)) {
              h = h.substring(C.raw.length), l = p[p.length - 1], l && (l.type === "paragraph" || l.type === "text") ? (l.raw += `
` + C.raw, l.text += `
` + C.text, this.inlineQueue[this.inlineQueue.length - 1].src = l.text) : p.push(C);
              continue;
            }
            if (C = this.tokenizer.fences(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.heading(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.hr(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.blockquote(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.list(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.html(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.def(h)) {
              h = h.substring(C.raw.length), l = p[p.length - 1], l && (l.type === "paragraph" || l.type === "text") ? (l.raw += `
` + C.raw, l.text += `
` + C.raw, this.inlineQueue[this.inlineQueue.length - 1].src = l.text) : this.tokens.links[C.tag] || (this.tokens.links[C.tag] = {
                href: C.href,
                title: C.title
              });
              continue;
            }
            if (C = this.tokenizer.table(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.lheading(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (d = h, this.options.extensions && this.options.extensions.startBlock && (function() {
              var k = 1 / 0, I = h.slice(1), b = void 0;
              g.options.extensions.startBlock.forEach(function(S) {
                b = S.call({
                  lexer: this
                }, I), typeof b == "number" && b >= 0 && (k = Math.min(k, b));
              }), k < 1 / 0 && k >= 0 && (d = h.substring(0, k + 1));
            })(), this.state.top && (C = this.tokenizer.paragraph(d))) {
              l = p[p.length - 1], m && l.type === "paragraph" ? (l.raw += `
` + C.raw, l.text += `
` + C.text, this.inlineQueue.pop(), this.inlineQueue[this.inlineQueue.length - 1].src = l.text) : p.push(C), m = d.length !== h.length, h = h.substring(C.raw.length);
              continue;
            }
            if (C = this.tokenizer.text(h)) {
              h = h.substring(C.raw.length), l = p[p.length - 1], l && l.type === "text" ? (l.raw += `
` + C.raw, l.text += `
` + C.text, this.inlineQueue.pop(), this.inlineQueue[this.inlineQueue.length - 1].src = l.text) : p.push(C);
              continue;
            }
            if (h) {
              var D = "Infinite loop on byte: " + h.charCodeAt(0);
              if (this.options.silent) {
                console.error(D);
                break;
              } else
                throw new Error(D);
            }
          }
        return this.state.top = !0, p;
      }, H.inline = function(h, p) {
        return p === void 0 && (p = []), this.inlineQueue.push({
          src: h,
          tokens: p
        }), p;
      }, H.inlineTokens = function(h, p) {
        var g = this;
        p === void 0 && (p = []);
        var C, l, d, m = h, D, k, I;
        if (this.tokens.links) {
          var b = Object.keys(this.tokens.links);
          if (b.length > 0)
            for (; (D = this.tokenizer.rules.inline.reflinkSearch.exec(m)) != null; )
              b.includes(D[0].slice(D[0].lastIndexOf("[") + 1, -1)) && (m = m.slice(0, D.index) + "[" + Ue("a", D[0].length - 2) + "]" + m.slice(this.tokenizer.rules.inline.reflinkSearch.lastIndex));
        }
        for (; (D = this.tokenizer.rules.inline.blockSkip.exec(m)) != null; )
          m = m.slice(0, D.index) + "[" + Ue("a", D[0].length - 2) + "]" + m.slice(this.tokenizer.rules.inline.blockSkip.lastIndex);
        for (; (D = this.tokenizer.rules.inline.escapedEmSt.exec(m)) != null; )
          m = m.slice(0, D.index + D[0].length - 2) + "++" + m.slice(this.tokenizer.rules.inline.escapedEmSt.lastIndex), this.tokenizer.rules.inline.escapedEmSt.lastIndex--;
        for (; h; )
          if (k || (I = ""), k = !1, !(this.options.extensions && this.options.extensions.inline && this.options.extensions.inline.some(function(x) {
            return (C = x.call({
              lexer: g
            }, h, p)) ? (h = h.substring(C.raw.length), p.push(C), !0) : !1;
          }))) {
            if (C = this.tokenizer.escape(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.tag(h)) {
              h = h.substring(C.raw.length), l = p[p.length - 1], l && C.type === "text" && l.type === "text" ? (l.raw += C.raw, l.text += C.text) : p.push(C);
              continue;
            }
            if (C = this.tokenizer.link(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.reflink(h, this.tokens.links)) {
              h = h.substring(C.raw.length), l = p[p.length - 1], l && C.type === "text" && l.type === "text" ? (l.raw += C.raw, l.text += C.text) : p.push(C);
              continue;
            }
            if (C = this.tokenizer.emStrong(h, m, I)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.codespan(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.br(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.del(h)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (C = this.tokenizer.autolink(h, Te)) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (!this.state.inLink && (C = this.tokenizer.url(h, Te))) {
              h = h.substring(C.raw.length), p.push(C);
              continue;
            }
            if (d = h, this.options.extensions && this.options.extensions.startInline && (function() {
              var x = 1 / 0, re = h.slice(1), ie = void 0;
              g.options.extensions.startInline.forEach(function(me) {
                ie = me.call({
                  lexer: this
                }, re), typeof ie == "number" && ie >= 0 && (x = Math.min(x, ie));
              }), x < 1 / 0 && x >= 0 && (d = h.substring(0, x + 1));
            })(), C = this.tokenizer.inlineText(d, _e)) {
              h = h.substring(C.raw.length), C.raw.slice(-1) !== "_" && (I = C.raw.slice(-1)), k = !0, l = p[p.length - 1], l && l.type === "text" ? (l.raw += C.raw, l.text += C.text) : p.push(C);
              continue;
            }
            if (h) {
              var S = "Infinite loop on byte: " + h.charCodeAt(0);
              if (this.options.silent) {
                console.error(S);
                break;
              } else
                throw new Error(S);
            }
          }
        return p;
      }, F(O, null, [{
        key: "rules",
        get: function() {
          return {
            block: c,
            inline: j
          };
        }
      }]), O;
    })(), nt = /* @__PURE__ */ (function() {
      function O(E) {
        this.options = E || ue.defaults;
      }
      var H = O.prototype;
      return H.code = function(h, p, g) {
        var C = (p || "").match(/\S*/)[0];
        if (this.options.highlight) {
          var l = this.options.highlight(h, C);
          l != null && l !== h && (g = !0, h = l);
        }
        return h = h.replace(/\n$/, "") + `
`, C ? '<pre><code class="' + this.options.langPrefix + ge(C) + '">' + (g ? h : ge(h, !0)) + `</code></pre>
` : "<pre><code>" + (g ? h : ge(h, !0)) + `</code></pre>
`;
      }, H.blockquote = function(h) {
        return `<blockquote>
` + h + `</blockquote>
`;
      }, H.html = function(h) {
        return h;
      }, H.heading = function(h, p, g, C) {
        if (this.options.headerIds) {
          var l = this.options.headerPrefix + C.slug(g);
          return "<h" + p + ' id="' + l + '">' + h + "</h" + p + `>
`;
        }
        return "<h" + p + ">" + h + "</h" + p + `>
`;
      }, H.hr = function() {
        return this.options.xhtml ? `<hr/>
` : `<hr>
`;
      }, H.list = function(h, p, g) {
        var C = p ? "ol" : "ul", l = p && g !== 1 ? ' start="' + g + '"' : "";
        return "<" + C + l + `>
` + h + "</" + C + `>
`;
      }, H.listitem = function(h) {
        return "<li>" + h + `</li>
`;
      }, H.checkbox = function(h) {
        return "<input " + (h ? 'checked="" ' : "") + 'disabled="" type="checkbox"' + (this.options.xhtml ? " /" : "") + "> ";
      }, H.paragraph = function(h) {
        return "<p>" + h + `</p>
`;
      }, H.table = function(h, p) {
        return p && (p = "<tbody>" + p + "</tbody>"), `<table>
<thead>
` + h + `</thead>
` + p + `</table>
`;
      }, H.tablerow = function(h) {
        return `<tr>
` + h + `</tr>
`;
      }, H.tablecell = function(h, p) {
        var g = p.header ? "th" : "td", C = p.align ? "<" + g + ' align="' + p.align + '">' : "<" + g + ">";
        return C + h + ("</" + g + `>
`);
      }, H.strong = function(h) {
        return "<strong>" + h + "</strong>";
      }, H.em = function(h) {
        return "<em>" + h + "</em>";
      }, H.codespan = function(h) {
        return "<code>" + h + "</code>";
      }, H.br = function() {
        return this.options.xhtml ? "<br/>" : "<br>";
      }, H.del = function(h) {
        return "<del>" + h + "</del>";
      }, H.link = function(h, p, g) {
        if (h = fe(this.options.sanitize, this.options.baseUrl, h), h === null)
          return g;
        var C = '<a href="' + h + '"';
        return p && (C += ' title="' + p + '"'), C += ">" + g + "</a>", C;
      }, H.image = function(h, p, g) {
        if (h = fe(this.options.sanitize, this.options.baseUrl, h), h === null)
          return g;
        var C = '<img src="' + h + '" alt="' + g + '"';
        return p && (C += ' title="' + p + '"'), C += this.options.xhtml ? "/>" : ">", C;
      }, H.text = function(h) {
        return h;
      }, O;
    })(), Ke = /* @__PURE__ */ (function() {
      function O() {
      }
      var H = O.prototype;
      return H.strong = function(h) {
        return h;
      }, H.em = function(h) {
        return h;
      }, H.codespan = function(h) {
        return h;
      }, H.del = function(h) {
        return h;
      }, H.html = function(h) {
        return h;
      }, H.text = function(h) {
        return h;
      }, H.link = function(h, p, g) {
        return "" + g;
      }, H.image = function(h, p, g) {
        return "" + g;
      }, H.br = function() {
        return "";
      }, O;
    })(), Ve = /* @__PURE__ */ (function() {
      function O() {
        this.seen = {};
      }
      var H = O.prototype;
      return H.serialize = function(h) {
        return h.toLowerCase().trim().replace(/<[!\/a-z].*?>/ig, "").replace(/[\u2000-\u206F\u2E00-\u2E7F\\'!"#$%&()*+,./:;<=>?@[\]^`{|}~]/g, "").replace(/\s/g, "-");
      }, H.getNextSafeSlug = function(h, p) {
        var g = h, C = 0;
        if (this.seen.hasOwnProperty(g)) {
          C = this.seen[h];
          do
            C++, g = h + "-" + C;
          while (this.seen.hasOwnProperty(g));
        }
        return p || (this.seen[h] = C, this.seen[g] = 0), g;
      }, H.slug = function(h, p) {
        p === void 0 && (p = {});
        var g = this.serialize(h);
        return this.getNextSafeSlug(g, p.dryrun);
      }, O;
    })(), We = /* @__PURE__ */ (function() {
      function O(E) {
        this.options = E || ue.defaults, this.options.renderer = this.options.renderer || new nt(), this.renderer = this.options.renderer, this.renderer.options = this.options, this.textRenderer = new Ke(), this.slugger = new Ve();
      }
      O.parse = function(h, p) {
        var g = new O(p);
        return g.parse(h);
      }, O.parseInline = function(h, p) {
        var g = new O(p);
        return g.parseInline(h);
      };
      var H = O.prototype;
      return H.parse = function(h, p) {
        p === void 0 && (p = !0);
        var g = "", C, l, d, m, D, k, I, b, S, x, re, ie, me, ce, De, Ie, et, Ae, He, Be = h.length;
        for (C = 0; C < Be; C++) {
          if (x = h[C], this.options.extensions && this.options.extensions.renderers && this.options.extensions.renderers[x.type] && (He = this.options.extensions.renderers[x.type].call({
            parser: this
          }, x), He !== !1 || !["space", "hr", "heading", "code", "table", "blockquote", "list", "html", "paragraph", "text"].includes(x.type))) {
            g += He || "";
            continue;
          }
          switch (x.type) {
            case "space":
              continue;
            case "hr": {
              g += this.renderer.hr();
              continue;
            }
            case "heading": {
              g += this.renderer.heading(this.parseInline(x.tokens), x.depth, X(this.parseInline(x.tokens, this.textRenderer)), this.slugger);
              continue;
            }
            case "code": {
              g += this.renderer.code(x.text, x.lang, x.escaped);
              continue;
            }
            case "table": {
              for (b = "", I = "", m = x.header.length, l = 0; l < m; l++)
                I += this.renderer.tablecell(this.parseInline(x.header[l].tokens), {
                  header: !0,
                  align: x.align[l]
                });
              for (b += this.renderer.tablerow(I), S = "", m = x.rows.length, l = 0; l < m; l++) {
                for (k = x.rows[l], I = "", D = k.length, d = 0; d < D; d++)
                  I += this.renderer.tablecell(this.parseInline(k[d].tokens), {
                    header: !1,
                    align: x.align[d]
                  });
                S += this.renderer.tablerow(I);
              }
              g += this.renderer.table(b, S);
              continue;
            }
            case "blockquote": {
              S = this.parse(x.tokens), g += this.renderer.blockquote(S);
              continue;
            }
            case "list": {
              for (re = x.ordered, ie = x.start, me = x.loose, m = x.items.length, S = "", l = 0; l < m; l++)
                De = x.items[l], Ie = De.checked, et = De.task, ce = "", De.task && (Ae = this.renderer.checkbox(Ie), me ? De.tokens.length > 0 && De.tokens[0].type === "paragraph" ? (De.tokens[0].text = Ae + " " + De.tokens[0].text, De.tokens[0].tokens && De.tokens[0].tokens.length > 0 && De.tokens[0].tokens[0].type === "text" && (De.tokens[0].tokens[0].text = Ae + " " + De.tokens[0].tokens[0].text)) : De.tokens.unshift({
                  type: "text",
                  text: Ae
                }) : ce += Ae), ce += this.parse(De.tokens, me), S += this.renderer.listitem(ce, et, Ie);
              g += this.renderer.list(S, re, ie);
              continue;
            }
            case "html": {
              g += this.renderer.html(x.text);
              continue;
            }
            case "paragraph": {
              g += this.renderer.paragraph(this.parseInline(x.tokens));
              continue;
            }
            case "text": {
              for (S = x.tokens ? this.parseInline(x.tokens) : x.text; C + 1 < Be && h[C + 1].type === "text"; )
                x = h[++C], S += `
` + (x.tokens ? this.parseInline(x.tokens) : x.text);
              g += p ? this.renderer.paragraph(S) : S;
              continue;
            }
            default: {
              var Ge = 'Token with "' + x.type + '" type was not found.';
              if (this.options.silent) {
                console.error(Ge);
                return;
              } else
                throw new Error(Ge);
            }
          }
        }
        return g;
      }, H.parseInline = function(h, p) {
        p = p || this.renderer;
        var g = "", C, l, d, m = h.length;
        for (C = 0; C < m; C++) {
          if (l = h[C], this.options.extensions && this.options.extensions.renderers && this.options.extensions.renderers[l.type] && (d = this.options.extensions.renderers[l.type].call({
            parser: this
          }, l), d !== !1 || !["escape", "html", "link", "image", "strong", "em", "codespan", "br", "del", "text"].includes(l.type))) {
            g += d || "";
            continue;
          }
          switch (l.type) {
            case "escape": {
              g += p.text(l.text);
              break;
            }
            case "html": {
              g += p.html(l.text);
              break;
            }
            case "link": {
              g += p.link(l.href, l.title, this.parseInline(l.tokens, p));
              break;
            }
            case "image": {
              g += p.image(l.href, l.title, l.text);
              break;
            }
            case "strong": {
              g += p.strong(this.parseInline(l.tokens, p));
              break;
            }
            case "em": {
              g += p.em(this.parseInline(l.tokens, p));
              break;
            }
            case "codespan": {
              g += p.codespan(l.text);
              break;
            }
            case "br": {
              g += p.br();
              break;
            }
            case "del": {
              g += p.del(this.parseInline(l.tokens, p));
              break;
            }
            case "text": {
              g += p.text(l.text);
              break;
            }
            default: {
              var D = 'Token with "' + l.type + '" type was not found.';
              if (this.options.silent) {
                console.error(D);
                return;
              } else
                throw new Error(D);
            }
          }
        }
        return g;
      }, O;
    })(), qe = /* @__PURE__ */ (function() {
      function O(E) {
        this.options = E || ue.defaults;
      }
      var H = O.prototype;
      return H.preprocess = function(h) {
        return h;
      }, H.postprocess = function(h) {
        return h;
      }, O;
    })();
    qe.passThroughHooks = /* @__PURE__ */ new Set(["preprocess", "postprocess"]);
    function Je(O, H, E) {
      return function(h) {
        if (h.message += `
Please report this to https://github.com/markedjs/marked.`, O) {
          var p = "<p>An error occurred:</p><pre>" + ge(h.message + "", !0) + "</pre>";
          if (H)
            return Promise.resolve(p);
          if (E) {
            E(null, p);
            return;
          }
          return p;
        }
        if (H)
          return Promise.reject(h);
        if (E) {
          E(h);
          return;
        }
        throw h;
      };
    }
    function st(O, H) {
      return function(E, h, p) {
        typeof h == "function" && (p = h, h = null);
        var g = _({}, h);
        h = _({}, Ce.defaults, g);
        var C = Je(h.silent, h.async, p);
        if (typeof E > "u" || E === null)
          return C(new Error("marked(): input parameter is undefined or null"));
        if (typeof E != "string")
          return C(new Error("marked(): input parameter is of type " + Object.prototype.toString.call(E) + ", string expected"));
        if (be(h), h.hooks && (h.hooks.options = h), p) {
          var l = h.highlight, d;
          try {
            h.hooks && (E = h.hooks.preprocess(E)), d = O(E, h);
          } catch (b) {
            return C(b);
          }
          var m = function(S) {
            var x;
            if (!S)
              try {
                h.walkTokens && Ce.walkTokens(d, h.walkTokens), x = H(d, h), h.hooks && (x = h.hooks.postprocess(x));
              } catch (re) {
                S = re;
              }
            return h.highlight = l, S ? C(S) : p(null, x);
          };
          if (!l || l.length < 3 || (delete h.highlight, !d.length)) return m();
          var D = 0;
          Ce.walkTokens(d, function(b) {
            b.type === "code" && (D++, setTimeout(function() {
              l(b.text, b.lang, function(S, x) {
                if (S)
                  return m(S);
                x != null && x !== b.text && (b.text = x, b.escaped = !0), D--, D === 0 && m();
              });
            }, 0));
          }), D === 0 && m();
          return;
        }
        if (h.async)
          return Promise.resolve(h.hooks ? h.hooks.preprocess(E) : E).then(function(b) {
            return O(b, h);
          }).then(function(b) {
            return h.walkTokens ? Promise.all(Ce.walkTokens(b, h.walkTokens)).then(function() {
              return b;
            }) : b;
          }).then(function(b) {
            return H(b, h);
          }).then(function(b) {
            return h.hooks ? h.hooks.postprocess(b) : b;
          }).catch(C);
        try {
          h.hooks && (E = h.hooks.preprocess(E));
          var k = O(E, h);
          h.walkTokens && Ce.walkTokens(k, h.walkTokens);
          var I = H(k, h);
          return h.hooks && (I = h.hooks.postprocess(I)), I;
        } catch (b) {
          return C(b);
        }
      };
    }
    function Ce(O, H, E) {
      return st($e.lex, We.parse)(O, H, E);
    }
    Ce.options = Ce.setOptions = function(O) {
      return Ce.defaults = _({}, Ce.defaults, O), te(Ce.defaults), Ce;
    }, Ce.getDefaults = z, Ce.defaults = ue.defaults, Ce.use = function() {
      for (var O = Ce.defaults.extensions || {
        renderers: {},
        childTokens: {}
      }, H = arguments.length, E = new Array(H), h = 0; h < H; h++)
        E[h] = arguments[h];
      E.forEach(function(p) {
        var g = _({}, p);
        if (g.async = Ce.defaults.async || g.async || !1, p.extensions && (p.extensions.forEach(function(l) {
          if (!l.name)
            throw new Error("extension name required");
          if (l.renderer) {
            var d = O.renderers[l.name];
            d ? O.renderers[l.name] = function() {
              for (var m = arguments.length, D = new Array(m), k = 0; k < m; k++)
                D[k] = arguments[k];
              var I = l.renderer.apply(this, D);
              return I === !1 && (I = d.apply(this, D)), I;
            } : O.renderers[l.name] = l.renderer;
          }
          if (l.tokenizer) {
            if (!l.level || l.level !== "block" && l.level !== "inline")
              throw new Error("extension level must be 'block' or 'inline'");
            O[l.level] ? O[l.level].unshift(l.tokenizer) : O[l.level] = [l.tokenizer], l.start && (l.level === "block" ? O.startBlock ? O.startBlock.push(l.start) : O.startBlock = [l.start] : l.level === "inline" && (O.startInline ? O.startInline.push(l.start) : O.startInline = [l.start]));
          }
          l.childTokens && (O.childTokens[l.name] = l.childTokens);
        }), g.extensions = O), p.renderer && (function() {
          var l = Ce.defaults.renderer || new nt(), d = function(k) {
            var I = l[k];
            l[k] = function() {
              for (var b = arguments.length, S = new Array(b), x = 0; x < b; x++)
                S[x] = arguments[x];
              var re = p.renderer[k].apply(l, S);
              return re === !1 && (re = I.apply(l, S)), re;
            };
          };
          for (var m in p.renderer)
            d(m);
          g.renderer = l;
        })(), p.tokenizer && (function() {
          var l = Ce.defaults.tokenizer || new w(), d = function(k) {
            var I = l[k];
            l[k] = function() {
              for (var b = arguments.length, S = new Array(b), x = 0; x < b; x++)
                S[x] = arguments[x];
              var re = p.tokenizer[k].apply(l, S);
              return re === !1 && (re = I.apply(l, S)), re;
            };
          };
          for (var m in p.tokenizer)
            d(m);
          g.tokenizer = l;
        })(), p.hooks && (function() {
          var l = Ce.defaults.hooks || new qe(), d = function(k) {
            var I = l[k];
            qe.passThroughHooks.has(k) ? l[k] = function(b) {
              if (Ce.defaults.async)
                return Promise.resolve(p.hooks[k].call(l, b)).then(function(x) {
                  return I.call(l, x);
                });
              var S = p.hooks[k].call(l, b);
              return I.call(l, S);
            } : l[k] = function() {
              for (var b = arguments.length, S = new Array(b), x = 0; x < b; x++)
                S[x] = arguments[x];
              var re = p.hooks[k].apply(l, S);
              return re === !1 && (re = I.apply(l, S)), re;
            };
          };
          for (var m in p.hooks)
            d(m);
          g.hooks = l;
        })(), p.walkTokens) {
          var C = Ce.defaults.walkTokens;
          g.walkTokens = function(l) {
            var d = [];
            return d.push(p.walkTokens.call(this, l)), C && (d = d.concat(C.call(this, l))), d;
          };
        }
        Ce.setOptions(g);
      });
    }, Ce.walkTokens = function(O, H) {
      for (var E = [], h = function() {
        var l = g.value;
        switch (E = E.concat(H.call(Ce, l)), l.type) {
          case "table": {
            for (var d = N(l.header), m; !(m = d()).done; ) {
              var D = m.value;
              E = E.concat(Ce.walkTokens(D.tokens, H));
            }
            for (var k = N(l.rows), I; !(I = k()).done; )
              for (var b = I.value, S = N(b), x; !(x = S()).done; ) {
                var re = x.value;
                E = E.concat(Ce.walkTokens(re.tokens, H));
              }
            break;
          }
          case "list": {
            E = E.concat(Ce.walkTokens(l.items, H));
            break;
          }
          default:
            Ce.defaults.extensions && Ce.defaults.extensions.childTokens && Ce.defaults.extensions.childTokens[l.type] ? Ce.defaults.extensions.childTokens[l.type].forEach(function(ie) {
              E = E.concat(Ce.walkTokens(l[ie], H));
            }) : l.tokens && (E = E.concat(Ce.walkTokens(l.tokens, H)));
        }
      }, p = N(O), g; !(g = p()).done; )
        h();
      return E;
    }, Ce.parseInline = st($e.lexInline, We.parseInline), Ce.Parser = We, Ce.parser = We.parse, Ce.Renderer = nt, Ce.TextRenderer = Ke, Ce.Lexer = $e, Ce.lexer = $e.lex, Ce.Tokenizer = w, Ce.Slugger = Ve, Ce.Hooks = qe, Ce.parse = Ce;
    var It = Ce.options, wt = Ce.setOptions, Ft = Ce.use, dt = Ce.walkTokens, Pe = Ce.parseInline, ze = Ce, bt = We.parse, lr = $e.lex;
    ue.Hooks = qe, ue.Lexer = $e, ue.Parser = We, ue.Renderer = nt, ue.Slugger = Ve, ue.TextRenderer = Ke, ue.Tokenizer = w, ue.getDefaults = z, ue.lexer = lr, ue.marked = Ce, ue.options = It, ue.parse = ze, ue.parseInline = Pe, ue.parser = bt, ue.setOptions = wt, ue.use = Ft, ue.walkTokens = dt;
  })(ga)), ga;
}
var va, Kl;
function vf() {
  if (Kl) return va;
  Kl = 1;
  var ue = _t();
  Vs(), ef(), tf(), Yl(), Zl(), nf(), af(), of(), lf(), uf(), Xl();
  var xe = pf(), F = gf().marked, _ = /Mac/.test(navigator.platform), M = new RegExp(/(<a.*?https?:\/\/.*?[^a]>)+?/g), R = {
    toggleBold: X,
    toggleItalic: U,
    drawLink: it,
    toggleHeadingSmaller: fe,
    toggleHeadingBigger: ye,
    drawImage: Pt,
    toggleBlockquote: Z,
    toggleOrderedList: $,
    toggleUnorderedList: ee,
    toggleCheckList: be,
    toggleCodeBlock: se,
    togglePreview: Ve,
    toggleStrikethrough: G,
    toggleHeading1: Xe,
    toggleHeading2: ae,
    toggleHeading3: Le,
    toggleHeading4: Ee,
    toggleHeading5: Ne,
    toggleHeading6: L,
    cleanBlock: Ue,
    drawTable: _e,
    drawHorizontalRule: Te,
    undo: $e,
    redo: nt,
    toggleSideBySide: Ke,
    toggleFullScreen: W
  }, N = {
    toggleBold: "Cmd-B",
    toggleItalic: "Cmd-I",
    drawLink: "Cmd-K",
    toggleHeadingSmaller: "Cmd-H",
    toggleHeadingBigger: "Shift-Cmd-H",
    toggleHeading1: "Ctrl+Alt+1",
    toggleHeading2: "Ctrl+Alt+2",
    toggleHeading3: "Ctrl+Alt+3",
    toggleHeading4: "Ctrl+Alt+4",
    toggleHeading5: "Ctrl+Alt+5",
    toggleHeading6: "Ctrl+Alt+6",
    cleanBlock: "Cmd-E",
    drawImage: "Cmd-Alt-I",
    toggleBlockquote: "Cmd-'",
    toggleOrderedList: "Cmd-Alt-L",
    toggleUnorderedList: "Cmd-L",
    toggleCheckList: "Shift-Cmd-L",
    toggleCodeBlock: "Cmd-Alt-C",
    togglePreview: "Cmd-P",
    toggleSideBySide: "F9",
    toggleFullScreen: "F11"
  }, P = function(l) {
    for (var d in R)
      if (R[d] === l)
        return d;
    return null;
  }, B = function() {
    var l = !1;
    return (function(d) {
      (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(d) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw-(n|u)|c55\/|capi|ccwa|cdm-|cell|chtm|cldc|cmd-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc-s|devi|dica|dmob|do(c|p)o|ds(12|-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(-|_)|g1 u|g560|gene|gf-5|g-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd-(m|p|t)|hei-|hi(pt|ta)|hp( i|ip)|hs-c|ht(c(-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i-(20|go|ma)|i230|iac( |-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|-[a-w])|libw|lynx|m1-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|-([1-8]|c))|phil|pire|pl(ay|uc)|pn-2|po(ck|rt|se)|prox|psio|pt-g|qa-a|qc(07|12|21|32|60|-[2-7]|i-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h-|oo|p-)|sdk\/|se(c(-|0|1)|47|mc|nd|ri)|sgh-|shar|sie(-|m)|sk-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h-|v-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl-|tdg-|tel(i|m)|tim-|t-mo|to(pl|sh)|ts(70|m-|m3|m5)|tx-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas-|your|zeto|zte-/i.test(d.substr(0, 4))) && (l = !0);
    })(navigator.userAgent || navigator.vendor || window.opera), l;
  };
  function z(l) {
    for (var d; (d = M.exec(l)) !== null; ) {
      var m = d[0];
      if (m.indexOf("target=") === -1) {
        var D = m.replace(/>$/, ' target="_blank">');
        l = l.replace(m, D);
      }
    }
    return l;
  }
  function te(l) {
    for (var d = new DOMParser(), m = d.parseFromString(l, "text/html"), D = m.getElementsByTagName("li"), k = 0; k < D.length; k++)
      for (var I = D[k], b = 0; b < I.children.length; b++) {
        var S = I.children[b];
        S instanceof HTMLInputElement && S.type === "checkbox" && (I.style.marginLeft = "-1.5em", I.style.listStyleType = "none");
      }
    return m.documentElement.innerHTML;
  }
  function Q(l) {
    return _ ? l = l.replace("Ctrl", "Cmd") : l = l.replace("Cmd", "Ctrl"), l;
  }
  function K(l, d, m, D) {
    var k = he(l, !1, d, m, "button", D);
    k.classList.add("easymde-dropdown"), k.onclick = function() {
      k.focus();
    };
    var I = document.createElement("div");
    I.className = "easymde-dropdown-content";
    for (var b = 0; b < l.children.length; b++) {
      var S = l.children[b], x;
      typeof S == "string" && S in bt ? x = he(bt[S], !0, d, m, "button", D) : x = he(S, !0, d, m, "button", D), x.addEventListener("click", function(re) {
        re.stopPropagation();
      }, !1), I.appendChild(x);
    }
    return k.appendChild(I), k;
  }
  function he(l, d, m, D, k, I) {
    l = l || {};
    var b = document.createElement(k);
    if (l.attributes)
      for (var S in l.attributes)
        Object.prototype.hasOwnProperty.call(l.attributes, S) && b.setAttribute(S, l.attributes[S]);
    var x = I.options.toolbarButtonClassPrefix ? I.options.toolbarButtonClassPrefix + "-" : "";
    b.className = x + l.name, b.setAttribute("type", k), m = m ?? !0, l.text && (b.innerText = l.text), l.name && l.name in D && (R[l.name] = l.action), l.title && m && (b.title = Se(l.title, l.action, D), _ && (b.title = b.title.replace("Ctrl", "⌘"), b.title = b.title.replace("Alt", "⌥"))), l.title && b.setAttribute("aria-label", l.title), l.noDisable && b.classList.add("no-disable"), l.noMobile && b.classList.add("no-mobile");
    var re = [];
    typeof l.className < "u" && (re = l.className.split(" "));
    for (var ie = [], me = 0; me < re.length; me++) {
      var ce = re[me];
      ce.match(/^fa([srlb]|(-[\w-]*)|$)/) ? ie.push(ce) : b.classList.add(ce);
    }
    if (b.tabIndex = -1, ie.length > 0) {
      for (var De = document.createElement("i"), Ie = 0; Ie < ie.length; Ie++) {
        var et = ie[Ie];
        De.classList.add(et);
      }
      b.appendChild(De);
    }
    return typeof l.icon < "u" && (b.innerHTML = l.icon), l.action && d && (typeof l.action == "function" ? b.onclick = function(Ae) {
      Ae.preventDefault(), l.action(I);
    } : typeof l.action == "string" && (b.onclick = function(Ae) {
      Ae.preventDefault(), window.open(l.action, "_blank");
    })), b;
  }
  function ne() {
    var l = document.createElement("i");
    return l.className = "separator", l.innerHTML = "|", l;
  }
  function Se(l, d, m) {
    var D, k = l;
    return d && (D = P(d), m[D] && (k += " (" + Q(m[D]) + ")")), k;
  }
  function de(l, d) {
    d = d || l.getCursor("start");
    var m = l.getTokenAt(d);
    if (!m.type) return {};
    for (var D = m.type.split(" "), k = {}, I, b, S = 0; S < D.length; S++)
      I = D[S], I === "strong" ? k.bold = !0 : I === "variable-2" ? (b = l.getLine(d.line), /^\s*\d+\.\s/.test(b) ? k["ordered-list"] = !0 : /^\s*- \[[ xX]]\s/.test(b) ? k["check-list"] = !0 : k["unordered-list"] = !0) : I === "atom" ? k.quote = !0 : I === "em" ? k.italic = !0 : I === "quote" ? k.quote = !0 : I === "strikethrough" ? k.strikethrough = !0 : I === "comment" ? k.code = !0 : I === "link" && !k.image ? k.link = !0 : I === "image" ? k.image = !0 : I.match(/^header(-[1-6])?$/) && (k[I.replace("header", "heading")] = !0);
    return k;
  }
  var ge = "";
  function W(l) {
    var d = l.codemirror;
    d.setOption("fullScreen", !d.getOption("fullScreen")), d.getOption("fullScreen") ? (ge = document.body.style.overflow, document.body.style.overflow = "hidden") : document.body.style.overflow = ge;
    var m = d.getWrapperElement(), D = m.nextSibling;
    if (D.classList.contains("editor-preview-active-side"))
      if (l.options.sideBySideFullscreen === !1) {
        var k = m.parentNode;
        d.getOption("fullScreen") ? k.classList.remove("sided--no-fullscreen") : k.classList.add("sided--no-fullscreen");
      } else
        Ke(l);
    if (l.options.onToggleFullScreen && l.options.onToggleFullScreen(d.getOption("fullScreen") || !1), typeof l.options.maxHeight < "u" && (d.getOption("fullScreen") ? (d.getScrollerElement().style.removeProperty("height"), D.style.removeProperty("height")) : (d.getScrollerElement().style.height = l.options.maxHeight, l.setPreviewMaxHeight())), l.toolbar_div.classList.toggle("fullscreen"), l.toolbarElements && l.toolbarElements.fullscreen) {
      var I = l.toolbarElements.fullscreen;
      I.classList.toggle("active");
    }
  }
  function X(l) {
    Ce(l, "bold", l.options.blockStyles.bold);
  }
  function U(l) {
    Ce(l, "italic", l.options.blockStyles.italic);
  }
  function G(l) {
    Ce(l, "strikethrough", "~~");
  }
  function se(l) {
    var d = l.options.blockStyles.code;
    function m(pt) {
      if (typeof pt != "object")
        throw "fencing_line() takes a 'line' object (not a line number, or line text).  Got: " + typeof pt + ": " + pt;
      return pt.styles && pt.styles[2] && pt.styles[2].indexOf("formatting-code-block") !== -1;
    }
    function D(pt) {
      return pt.state.base.base || pt.state.base;
    }
    function k(pt, sr, zt, At, Jt) {
      zt = zt || pt.getLineHandle(sr), At = At || pt.getTokenAt({
        line: sr,
        ch: 1
      }), Jt = Jt || !!zt.text && pt.getTokenAt({
        line: sr,
        ch: zt.text.length - 1
      });
      var Dr = At.type ? At.type.split(" ") : [];
      return Jt && D(Jt).indentedCode ? "indented" : Dr.indexOf("comment") === -1 ? !1 : D(At).fencedChars || D(Jt).fencedChars || m(zt) ? "fenced" : "single";
    }
    function I(pt, sr, zt, At) {
      var Jt = sr.line + 1, Dr = zt.line + 1, br = sr.line !== zt.line, ti = At + `
`, Vt = `
` + At;
      br && Dr++, br && zt.ch === 0 && (Vt = At + `
`, Dr--), We(pt, !1, [ti, Vt]), pt.setSelection({
        line: Jt,
        ch: 0
      }, {
        line: Dr,
        ch: 0
      });
    }
    var b = l.codemirror, S = b.getCursor("start"), x = b.getCursor("end"), re = b.getTokenAt({
      line: S.line,
      ch: S.ch || 1
    }), ie = b.getLineHandle(S.line), me = k(b, S.line, ie, re), ce, De, Ie;
    if (me === "single") {
      var et = ie.text.slice(0, S.ch).replace("`", ""), Ae = ie.text.slice(S.ch).replace("`", "");
      b.replaceRange(et + Ae, {
        line: S.line,
        ch: 0
      }, {
        line: S.line,
        ch: 99999999999999
      }), S.ch--, S !== x && x.ch--, b.setSelection(S, x), b.focus();
    } else if (me === "fenced")
      if (S.line !== x.line || S.ch !== x.ch) {
        for (ce = S.line; ce >= 0 && (ie = b.getLineHandle(ce), !m(ie)); ce--)
          ;
        var He = b.getTokenAt({
          line: ce,
          ch: 1
        }), Be = D(He).fencedChars, Ge, lt, at, Kt;
        m(b.getLineHandle(S.line)) ? (Ge = "", lt = S.line) : m(b.getLineHandle(S.line - 1)) ? (Ge = "", lt = S.line - 1) : (Ge = Be + `
`, lt = S.line), m(b.getLineHandle(x.line)) ? (at = "", Kt = x.line, x.ch === 0 && (Kt += 1)) : x.ch !== 0 && m(b.getLineHandle(x.line + 1)) ? (at = "", Kt = x.line + 1) : (at = Be + `
`, Kt = x.line + 1), x.ch === 0 && (Kt -= 1), b.operation(function() {
          b.replaceRange(at, {
            line: Kt,
            ch: 0
          }, {
            line: Kt + (at ? 0 : 1),
            ch: 0
          }), b.replaceRange(Ge, {
            line: lt,
            ch: 0
          }, {
            line: lt + (Ge ? 0 : 1),
            ch: 0
          });
        }), b.setSelection({
          line: lt + (Ge ? 1 : 0),
          ch: 0
        }, {
          line: Kt + (Ge ? 1 : -1),
          ch: 0
        }), b.focus();
      } else {
        var ur = S.line;
        if (m(b.getLineHandle(S.line)) && (k(b, S.line + 1) === "fenced" ? (ce = S.line, ur = S.line + 1) : (De = S.line, ur = S.line - 1)), ce === void 0)
          for (ce = ur; ce >= 0 && (ie = b.getLineHandle(ce), !m(ie)); ce--)
            ;
        if (De === void 0)
          for (Ie = b.lineCount(), De = ur; De < Ie && (ie = b.getLineHandle(De), !m(ie)); De++)
            ;
        b.operation(function() {
          b.replaceRange("", {
            line: ce,
            ch: 0
          }, {
            line: ce + 1,
            ch: 0
          }), b.replaceRange("", {
            line: De - 1,
            ch: 0
          }, {
            line: De,
            ch: 0
          });
        }), b.focus();
      }
    else if (me === "indented") {
      if (S.line !== x.line || S.ch !== x.ch)
        ce = S.line, De = x.line, x.ch === 0 && De--;
      else {
        for (ce = S.line; ce >= 0; ce--)
          if (ie = b.getLineHandle(ce), !ie.text.match(/^\s*$/) && k(b, ce, ie) !== "indented") {
            ce += 1;
            break;
          }
        for (Ie = b.lineCount(), De = S.line; De < Ie; De++)
          if (ie = b.getLineHandle(De), !ie.text.match(/^\s*$/) && k(b, De, ie) !== "indented") {
            De -= 1;
            break;
          }
      }
      var Bi = b.getLineHandle(De + 1), Ir = Bi && b.getTokenAt({
        line: De + 1,
        ch: Bi.text.length - 1
      }), hn = Ir && D(Ir).indentedCode;
      hn && b.replaceRange(`
`, {
        line: De + 1,
        ch: 0
      });
      for (var yr = ce; yr <= De; yr++)
        b.indentLine(yr, "subtract");
      b.focus();
    } else {
      var dn = S.line === x.line && S.ch === x.ch && S.ch === 0, pn = S.line !== x.line;
      dn || pn ? I(b, S, x, d) : We(b, !1, ["`", "`"]);
    }
  }
  function Z(l) {
    Je(l.codemirror, "quote");
  }
  function fe(l) {
    qe(l.codemirror, "smaller");
  }
  function ye(l) {
    qe(l.codemirror, "bigger");
  }
  function Xe(l) {
    qe(l.codemirror, void 0, 1);
  }
  function ae(l) {
    qe(l.codemirror, void 0, 2);
  }
  function Le(l) {
    qe(l.codemirror, void 0, 3);
  }
  function Ee(l) {
    qe(l.codemirror, void 0, 4);
  }
  function Ne(l) {
    qe(l.codemirror, void 0, 5);
  }
  function L(l) {
    qe(l.codemirror, void 0, 6);
  }
  function ee(l) {
    var d = l.codemirror, m = "*";
    ["-", "+", "*"].includes(l.options.unorderedListStyle) && (m = l.options.unorderedListStyle), Je(d, "unordered-list", m);
  }
  function $(l) {
    Je(l.codemirror, "ordered-list");
  }
  function be(l) {
    Je(l.codemirror, "check-list");
  }
  function Ue(l) {
    It(l.codemirror);
  }
  function it(l) {
    var d = l.options, m = "https://";
    if (d.promptURLs) {
      var D = prompt(d.promptTexts.link, m);
      if (!D)
        return !1;
      m = w(D);
    }
    st(l, "link", d.insertTexts.link, m);
  }
  function Pt(l) {
    var d = l.options, m = "https://";
    if (d.promptURLs) {
      var D = prompt(d.promptTexts.image, m);
      if (!D)
        return !1;
      m = w(D);
    }
    st(l, "image", d.insertTexts.image, m);
  }
  function w(l) {
    return encodeURI(l).replace(/([\\()])/g, "\\$1");
  }
  function c(l) {
    l.openBrowseFileWindow();
  }
  function j(l, d) {
    var m = l.codemirror, D = de(m), k = l.options, I = d.substr(d.lastIndexOf("/") + 1), b = I.substring(I.lastIndexOf(".") + 1).replace(/\?.*$/, "").toLowerCase();
    if (["png", "jpg", "jpeg", "gif", "svg", "apng", "avif", "webp"].includes(b))
      We(m, D.image, k.insertTexts.uploadedImage, d);
    else {
      var S = k.insertTexts.link;
      S[0] = "[" + I, We(m, D.link, S, d);
    }
    l.updateStatusBar("upload-image", l.options.imageTexts.sbOnUploaded.replace("#image_name#", I)), setTimeout(function() {
      l.updateStatusBar("upload-image", l.options.imageTexts.sbInit);
    }, 1e3);
  }
  function _e(l) {
    var d = l.codemirror, m = de(d), D = l.options;
    We(d, m.table, D.insertTexts.table);
  }
  function Te(l) {
    var d = l.codemirror, m = de(d), D = l.options;
    We(d, m.image, D.insertTexts.horizontalRule);
  }
  function $e(l) {
    var d = l.codemirror;
    d.undo(), d.focus();
  }
  function nt(l) {
    var d = l.codemirror;
    d.redo(), d.focus();
  }
  function Ke(l) {
    var d = l.codemirror, m = d.getWrapperElement(), D = m.nextSibling, k = l.toolbarElements && l.toolbarElements["side-by-side"], I = !1, b = m.parentNode;
    D.classList.contains("editor-preview-active-side") ? (l.options.sideBySideFullscreen === !1 && b.classList.remove("sided--no-fullscreen"), D.classList.remove("editor-preview-active-side"), k && k.classList.remove("active"), m.classList.remove("CodeMirror-sided")) : (setTimeout(function() {
      d.getOption("fullScreen") || (l.options.sideBySideFullscreen === !1 ? b.classList.add("sided--no-fullscreen") : W(l)), D.classList.add("editor-preview-active-side");
    }, 1), k && k.classList.add("active"), m.classList.add("CodeMirror-sided"), I = !0);
    var S = m.lastChild;
    if (S.classList.contains("editor-preview-active")) {
      S.classList.remove("editor-preview-active");
      var x = l.toolbarElements.preview, re = l.toolbar_div;
      x.classList.remove("active"), re.classList.remove("disabled-for-preview");
    }
    var ie = function() {
      var ce = l.options.previewRender(l.value(), D);
      ce != null && (D.innerHTML = ce);
    };
    if (d.sideBySideRenderingFunction || (d.sideBySideRenderingFunction = ie), I) {
      var me = l.options.previewRender(l.value(), D);
      me != null && (D.innerHTML = me), d.on("update", d.sideBySideRenderingFunction);
    } else
      d.off("update", d.sideBySideRenderingFunction);
    d.refresh();
  }
  function Ve(l) {
    var d = l.codemirror, m = d.getWrapperElement(), D = l.toolbar_div, k = l.options.toolbar ? l.toolbarElements.preview : !1, I = m.lastChild, b = d.getWrapperElement().nextSibling;
    if (b.classList.contains("editor-preview-active-side") && Ke(l), !I || !I.classList.contains("editor-preview-full")) {
      if (I = document.createElement("div"), I.className = "editor-preview-full", l.options.previewClass)
        if (Array.isArray(l.options.previewClass))
          for (var S = 0; S < l.options.previewClass.length; S++)
            I.classList.add(l.options.previewClass[S]);
        else typeof l.options.previewClass == "string" && I.classList.add(l.options.previewClass);
      m.appendChild(I);
    }
    I.classList.contains("editor-preview-active") ? (I.classList.remove("editor-preview-active"), k && (k.classList.remove("active"), D.classList.remove("disabled-for-preview"))) : (setTimeout(function() {
      I.classList.add("editor-preview-active");
    }, 1), k && (k.classList.add("active"), D.classList.add("disabled-for-preview")));
    var x = l.options.previewRender(l.value(), I);
    x !== null && (I.innerHTML = x);
  }
  function We(l, d, m, D) {
    if (!l.getWrapperElement().lastChild.classList.contains("editor-preview-active")) {
      var k, I = m[0], b = m[1], S = {}, x = {};
      Object.assign(S, l.getCursor("start")), Object.assign(x, l.getCursor("end")), D && (I = I.replace("#url#", D), b = b.replace("#url#", D)), d ? (k = l.getLine(S.line), I = k.slice(0, S.ch), b = k.slice(S.ch), l.replaceRange(I + b, {
        line: S.line,
        ch: 0
      })) : (k = l.getSelection(), l.replaceSelection(I + k + b), S.ch += I.length, S !== x && (x.ch += I.length)), l.setSelection(S, x), l.focus();
    }
  }
  function qe(l, d, m) {
    if (!l.getWrapperElement().lastChild.classList.contains("editor-preview-active")) {
      for (var D = l.getCursor("start"), k = l.getCursor("end"), I = D.line; I <= k.line; I++)
        (function(b) {
          var S = l.getLine(b), x = S.search(/[^#]/);
          d !== void 0 ? x <= 0 ? d == "bigger" ? S = "###### " + S : S = "# " + S : x == 6 && d == "smaller" ? S = S.substr(7) : x == 1 && d == "bigger" ? S = S.substr(2) : d == "bigger" ? S = S.substr(1) : S = "#" + S : x <= 0 ? S = "#".repeat(m) + " " + S : x == m ? S = S.substr(x + 1) : S = "#".repeat(m) + " " + S.substr(x + 1), l.replaceRange(S, {
            line: b,
            ch: 0
          }, {
            line: b,
            ch: 99999999999999
          });
        })(I);
      l.focus();
    }
  }
  function Je(l, d, m) {
    if (!l.getWrapperElement().lastChild.classList.contains("editor-preview-active")) {
      var D = /^(\s*)(\*|-|\+|\d*\.)(\s+)/, k = /^\s*/, I = de(l), b = l.getCursor("start"), S = l.getCursor("end"), x = {
        quote: /^(\s*)>\s+/,
        "unordered-list": D,
        "ordered-list": D,
        "check-list": /^(\s*)(- \[[ xX]])(\s+)/
      }, re = function(He, Be) {
        var Ge = {
          quote: ">",
          "unordered-list": m,
          "ordered-list": "%%i.",
          "check-list": "- [ ]"
        };
        return Ge[He].replace("%%i", Be);
      }, ie = function(He, Be) {
        var Ge = {
          quote: ">",
          "unordered-list": "\\" + m,
          "ordered-list": "\\d+.",
          "check-list": "- \\[[ xX]]"
        }, lt = new RegExp(Ge[He]);
        return Be && lt.test(Be);
      }, me = function(He, Be, Ge) {
        var lt = D.exec(Be), at = re(He, ce);
        return lt !== null ? (ie(He, lt[2]) && (at = ""), Be = lt[1] + at + lt[3] + Be.replace(k, "").replace(x[He], "$1")) : Be = at + " " + Be, Be;
      }, ce = 1, De = ["unordered-list", "ordered-list", "check-list"], Ie = Object.keys(I)[0];
      if (!De.includes(Ie)) {
        var et = l.getLine(b.line);
        /^\s*- \[[ xX]]\s/.test(et) ? Ie = "check-list" : /^\s*\d+\.\s/.test(et) ? Ie = "ordered-list" : /^\s*[*\-+]\s/.test(et) && (Ie = "unordered-list");
      }
      for (var Ae = b.line; Ae <= S.line; Ae++)
        (function(He) {
          var Be = l.getLine(He);
          I[d] ? Be = Be.replace(x[d], "$1") : De.includes(Ie) && De.includes(d) ? (Be = Be.replace(x[Ie], "$1"), Be = me(d, Be), ce += 1) : (Be = me(d, Be), ce += 1), l.replaceRange(Be, {
            line: He,
            ch: 0
          }, {
            line: He,
            ch: 99999999999999
          });
        })(Ae);
      l.focus();
    }
  }
  function st(l, d, m, D) {
    if (!(!l.codemirror || l.isPreviewActive())) {
      var k = l.codemirror, I = de(k), b = I[d];
      if (!b) {
        We(k, b, m, D);
        return;
      }
      var S = k.getCursor("start"), x = k.getCursor("end"), re = k.getLine(S.line), ie = re.slice(0, S.ch), me = re.slice(S.ch);
      d == "link" ? ie = ie.replace(/(.*)[^!]\[/, "$1") : d == "image" && (ie = ie.replace(/(.*)!\[$/, "$1")), me = me.replace(/]\(.*?\)/, ""), k.replaceRange(ie + me, {
        line: S.line,
        ch: 0
      }, {
        line: S.line,
        ch: 99999999999999
      }), S.ch -= m[0].length, S !== x && (x.ch -= m[0].length), k.setSelection(S, x), k.focus();
    }
  }
  function Ce(l, d, m, D) {
    if (!(!l.codemirror || l.isPreviewActive())) {
      D = typeof D > "u" ? m : D;
      var k = l.codemirror, I = de(k), b, S = m, x = D, re = k.getCursor("start"), ie = k.getCursor("end");
      I[d] ? (b = k.getLine(re.line), S = b.slice(0, re.ch), x = b.slice(re.ch), d == "bold" ? (S = S.replace(/(\*\*|__)(?![\s\S]*(\*\*|__))/, ""), x = x.replace(/(\*\*|__)/, "")) : d == "italic" ? (S = S.replace(/(\*|_)(?![\s\S]*(\*|_))/, ""), x = x.replace(/(\*|_)/, "")) : d == "strikethrough" && (S = S.replace(/(\*\*|~~)(?![\s\S]*(\*\*|~~))/, ""), x = x.replace(/(\*\*|~~)/, "")), k.replaceRange(S + x, {
        line: re.line,
        ch: 0
      }, {
        line: re.line,
        ch: 99999999999999
      }), d == "bold" || d == "strikethrough" ? (re.ch -= 2, re !== ie && (ie.ch -= 2)) : d == "italic" && (re.ch -= 1, re !== ie && (ie.ch -= 1))) : (b = k.getSelection(), d == "bold" ? (b = b.split("**").join(""), b = b.split("__").join("")) : d == "italic" ? (b = b.split("*").join(""), b = b.split("_").join("")) : d == "strikethrough" && (b = b.split("~~").join("")), k.replaceSelection(S + b + x), re.ch += m.length, ie.ch = re.ch + b.length), k.setSelection(re, ie), k.focus();
    }
  }
  function It(l) {
    if (!l.getWrapperElement().lastChild.classList.contains("editor-preview-active"))
      for (var d = l.getCursor("start"), m = l.getCursor("end"), D, k = d.line; k <= m.line; k++)
        D = l.getLine(k), D = D.replace(/^[ ]*([# ]+|\*|-|[> ]+|[0-9]+(.|\)))[ ]*/, ""), l.replaceRange(D, {
          line: k,
          ch: 0
        }, {
          line: k,
          ch: 99999999999999
        });
  }
  function wt(l, d) {
    if (Math.abs(l) < 1024)
      return "" + l + d[0];
    var m = 0;
    do
      l /= 1024, ++m;
    while (Math.abs(l) >= 1024 && m < d.length);
    return "" + l.toFixed(1) + d[m];
  }
  function Ft(l, d) {
    for (var m in d)
      Object.prototype.hasOwnProperty.call(d, m) && (d[m] instanceof Array ? l[m] = d[m].concat(l[m] instanceof Array ? l[m] : []) : d[m] !== null && typeof d[m] == "object" && d[m].constructor === Object ? l[m] = Ft(l[m] || {}, d[m]) : l[m] = d[m]);
    return l;
  }
  function dt(l) {
    for (var d = 1; d < arguments.length; d++)
      l = Ft(l, arguments[d]);
    return l;
  }
  function Pe(l) {
    var d = /[a-zA-Z0-9_\u00A0-\u02AF\u0392-\u03c9\u0410-\u04F9]+|[\u4E00-\u9FFF\u3400-\u4dbf\uf900-\ufaff\u3040-\u309f\uac00-\ud7af]+/g, m = l.match(d), D = 0;
    if (m === null) return D;
    for (var k = 0; k < m.length; k++)
      m[k].charCodeAt(0) >= 19968 ? D += m[k].length : D += 1;
    return D;
  }
  var ze = {
    bold: "fa fa-bold",
    italic: "fa fa-italic",
    strikethrough: "fa fa-strikethrough",
    heading: "fa fa-header fa-heading",
    "heading-smaller": "fa fa-header fa-heading header-smaller",
    "heading-bigger": "fa fa-header fa-heading header-bigger",
    "heading-1": "fa fa-header fa-heading header-1",
    "heading-2": "fa fa-header fa-heading header-2",
    "heading-3": "fa fa-header fa-heading header-3",
    code: "fa fa-code",
    quote: "fa fa-quote-left",
    "ordered-list": "fa fa-list-ol",
    "unordered-list": "fa fa-list-ul",
    "check-list": "fa fa-check-square-o",
    "clean-block": "fa fa-eraser",
    link: "fa fa-link",
    image: "fa fa-image",
    "upload-image": "fa fa-image",
    table: "fa fa-table",
    "horizontal-rule": "fa fa-minus",
    preview: "fa fa-eye",
    "side-by-side": "fa fa-columns",
    fullscreen: "fa fa-arrows-alt",
    guide: "fa fa-question-circle",
    undo: "fa fa-undo",
    redo: "fa fa-repeat fa-redo"
  }, bt = {
    bold: {
      name: "bold",
      action: X,
      className: ze.bold,
      title: "Bold",
      default: !0
    },
    italic: {
      name: "italic",
      action: U,
      className: ze.italic,
      title: "Italic",
      default: !0
    },
    strikethrough: {
      name: "strikethrough",
      action: G,
      className: ze.strikethrough,
      title: "Strikethrough"
    },
    heading: {
      name: "heading",
      action: fe,
      className: ze.heading,
      title: "Heading",
      default: !0
    },
    "heading-smaller": {
      name: "heading-smaller",
      action: fe,
      className: ze["heading-smaller"],
      title: "Smaller Heading"
    },
    "heading-bigger": {
      name: "heading-bigger",
      action: ye,
      className: ze["heading-bigger"],
      title: "Bigger Heading"
    },
    "heading-1": {
      name: "heading-1",
      action: Xe,
      className: ze["heading-1"],
      title: "Big Heading"
    },
    "heading-2": {
      name: "heading-2",
      action: ae,
      className: ze["heading-2"],
      title: "Medium Heading"
    },
    "heading-3": {
      name: "heading-3",
      action: Le,
      className: ze["heading-3"],
      title: "Small Heading"
    },
    "separator-1": {
      name: "separator-1"
    },
    code: {
      name: "code",
      action: se,
      className: ze.code,
      title: "Code"
    },
    quote: {
      name: "quote",
      action: Z,
      className: ze.quote,
      title: "Quote",
      default: !0
    },
    "unordered-list": {
      name: "unordered-list",
      action: ee,
      className: ze["unordered-list"],
      title: "Generic List",
      default: !0
    },
    "ordered-list": {
      name: "ordered-list",
      action: $,
      className: ze["ordered-list"],
      title: "Numbered List",
      default: !0
    },
    "check-list": {
      name: "check-list",
      action: be,
      className: ze["check-list"],
      title: "Check List",
      default: !0
    },
    "clean-block": {
      name: "clean-block",
      action: Ue,
      className: ze["clean-block"],
      title: "Clean block"
    },
    "separator-2": {
      name: "separator-2"
    },
    link: {
      name: "link",
      action: it,
      className: ze.link,
      title: "Create Link",
      default: !0
    },
    image: {
      name: "image",
      action: Pt,
      className: ze.image,
      title: "Insert Image",
      default: !0
    },
    "upload-image": {
      name: "upload-image",
      action: c,
      className: ze["upload-image"],
      title: "Import an image"
    },
    table: {
      name: "table",
      action: _e,
      className: ze.table,
      title: "Insert Table"
    },
    "horizontal-rule": {
      name: "horizontal-rule",
      action: Te,
      className: ze["horizontal-rule"],
      title: "Insert Horizontal Line"
    },
    "separator-3": {
      name: "separator-3"
    },
    preview: {
      name: "preview",
      action: Ve,
      className: ze.preview,
      noDisable: !0,
      title: "Toggle Preview",
      default: !0
    },
    "side-by-side": {
      name: "side-by-side",
      action: Ke,
      className: ze["side-by-side"],
      noDisable: !0,
      noMobile: !0,
      title: "Toggle Side by Side",
      default: !0
    },
    fullscreen: {
      name: "fullscreen",
      action: W,
      className: ze.fullscreen,
      noDisable: !0,
      noMobile: !0,
      title: "Toggle Fullscreen",
      default: !0
    },
    "separator-4": {
      name: "separator-4"
    },
    guide: {
      name: "guide",
      action: "https://www.markdownguide.org/basic-syntax/",
      className: ze.guide,
      noDisable: !0,
      title: "Markdown Guide",
      default: !0
    },
    "separator-5": {
      name: "separator-5"
    },
    undo: {
      name: "undo",
      action: $e,
      className: ze.undo,
      noDisable: !0,
      title: "Undo"
    },
    redo: {
      name: "redo",
      action: nt,
      className: ze.redo,
      noDisable: !0,
      title: "Redo"
    }
  }, lr = {
    link: ["[", "](#url#)"],
    image: ["![", "](#url#)"],
    uploadedImage: ["![](#url#)", ""],
    // uploadedImage: ['![](#url#)\n', ''], // TODO: New line insertion doesn't work here.
    table: ["", `

| Column 1 | Column 2 | Column 3 |
| -------- | -------- | -------- |
| Text     | Text     | Text     |

`],
    horizontalRule: ["", `

-----

`]
  }, O = {
    link: "URL for the link:",
    image: "URL of the image:"
  }, H = {
    locale: "en-US",
    format: {
      hour: "2-digit",
      minute: "2-digit"
    }
  }, E = {
    bold: "**",
    code: "```",
    italic: "*"
  }, h = {
    sbInit: "Attach files by drag and dropping or pasting from clipboard.",
    sbOnDragEnter: "Drop image to upload it.",
    sbOnDrop: "Uploading image #images_names#...",
    sbProgress: "Uploading #file_name#: #progress#%",
    sbOnUploaded: "Uploaded #image_name#",
    sizeUnits: " B, KB, MB"
  }, p = {
    noFileGiven: "You must select a file.",
    typeNotAllowed: "This image type is not allowed.",
    fileTooLarge: `Image #image_name# is too big (#image_size#).
Maximum file size is #image_max_size#.`,
    importError: "Something went wrong when uploading the image #image_name#."
  };
  function g(l) {
    l = l || {}, l.parent = this;
    var d = !0;
    if (l.autoDownloadFontAwesome === !1 && (d = !1), l.autoDownloadFontAwesome !== !0)
      for (var m = document.styleSheets, D = 0; D < m.length; D++)
        m[D].href && m[D].href.indexOf("//maxcdn.bootstrapcdn.com/font-awesome/") > -1 && (d = !1);
    if (d) {
      var k = document.createElement("link");
      k.rel = "stylesheet", k.href = "https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css", document.getElementsByTagName("head")[0].appendChild(k);
    }
    if (l.element)
      this.element = l.element;
    else if (l.element === null) {
      console.log("EasyMDE: Error. No element was found.");
      return;
    }
    if (l.toolbar === void 0) {
      l.toolbar = [];
      for (var I in bt)
        Object.prototype.hasOwnProperty.call(bt, I) && (I.indexOf("separator-") != -1 && l.toolbar.push("|"), (bt[I].default === !0 || l.showIcons && l.showIcons.constructor === Array && l.showIcons.indexOf(I) != -1) && l.toolbar.push(I));
    }
    if (Object.prototype.hasOwnProperty.call(l, "previewClass") || (l.previewClass = "editor-preview"), Object.prototype.hasOwnProperty.call(l, "status") || (l.status = ["autosave", "lines", "words", "cursor"], l.uploadImage && l.status.unshift("upload-image")), l.previewRender || (l.previewRender = function(S) {
      return this.parent.markdown(S);
    }), l.parsingConfig = dt({
      highlightFormatting: !0
      // needed for toggleCodeBlock to detect types of code
    }, l.parsingConfig || {}), l.insertTexts = dt({}, lr, l.insertTexts || {}), l.promptTexts = dt({}, O, l.promptTexts || {}), l.blockStyles = dt({}, E, l.blockStyles || {}), l.autosave != null && (l.autosave.timeFormat = dt({}, H, l.autosave.timeFormat || {})), l.iconClassMap = dt({}, ze, l.iconClassMap || {}), l.shortcuts = dt({}, N, l.shortcuts || {}), l.maxHeight = l.maxHeight || void 0, l.direction = l.direction || "ltr", typeof l.maxHeight < "u" ? l.minHeight = l.maxHeight : l.minHeight = l.minHeight || "300px", l.errorCallback = l.errorCallback || function(S) {
      alert(S);
    }, l.uploadImage = l.uploadImage || !1, l.imageMaxSize = l.imageMaxSize || 2097152, l.imageAccept = l.imageAccept || "image/png, image/jpeg, image/gif, image/avif", l.imageTexts = dt({}, h, l.imageTexts || {}), l.errorMessages = dt({}, p, l.errorMessages || {}), l.imagePathAbsolute = l.imagePathAbsolute || !1, l.imageCSRFName = l.imageCSRFName || "csrfmiddlewaretoken", l.imageCSRFHeader = l.imageCSRFHeader || !1, l.imageInputName = l.imageInputName || "image", l.autosave != null && l.autosave.unique_id != null && l.autosave.unique_id != "" && (l.autosave.uniqueId = l.autosave.unique_id), l.overlayMode && l.overlayMode.combine === void 0 && (l.overlayMode.combine = !0), this.options = l, this.render(), l.initialValue && (!this.options.autosave || this.options.autosave.foundSavedValue !== !0) && this.value(l.initialValue), l.uploadImage) {
      var b = this;
      this.codemirror.on("dragenter", function(S, x) {
        b.updateStatusBar("upload-image", b.options.imageTexts.sbOnDragEnter), x.stopPropagation(), x.preventDefault();
      }), this.codemirror.on("dragend", function(S, x) {
        b.updateStatusBar("upload-image", b.options.imageTexts.sbInit), x.stopPropagation(), x.preventDefault();
      }), this.codemirror.on("dragleave", function(S, x) {
        b.updateStatusBar("upload-image", b.options.imageTexts.sbInit), x.stopPropagation(), x.preventDefault();
      }), this.codemirror.on("dragover", function(S, x) {
        b.updateStatusBar("upload-image", b.options.imageTexts.sbOnDragEnter), x.stopPropagation(), x.preventDefault();
      }), this.codemirror.on("drop", function(S, x) {
        x.stopPropagation(), x.preventDefault(), l.imageUploadFunction ? b.uploadImagesUsingCustomFunction(l.imageUploadFunction, x.dataTransfer.files) : b.uploadImages(x.dataTransfer.files);
      }), this.codemirror.on("paste", function(S, x) {
        l.imageUploadFunction ? b.uploadImagesUsingCustomFunction(l.imageUploadFunction, x.clipboardData.files) : b.uploadImages(x.clipboardData.files);
      });
    }
  }
  g.prototype.uploadImages = function(l, d, m) {
    if (l.length !== 0) {
      for (var D = [], k = 0; k < l.length; k++)
        D.push(l[k].name), this.uploadImage(l[k], d, m);
      this.updateStatusBar("upload-image", this.options.imageTexts.sbOnDrop.replace("#images_names#", D.join(", ")));
    }
  }, g.prototype.uploadImagesUsingCustomFunction = function(l, d) {
    if (d.length !== 0) {
      for (var m = [], D = 0; D < d.length; D++)
        m.push(d[D].name), this.uploadImageUsingCustomFunction(l, d[D]);
      this.updateStatusBar("upload-image", this.options.imageTexts.sbOnDrop.replace("#images_names#", m.join(", ")));
    }
  }, g.prototype.updateStatusBar = function(l, d) {
    if (this.gui.statusbar) {
      var m = this.gui.statusbar.getElementsByClassName(l);
      m.length === 1 ? this.gui.statusbar.getElementsByClassName(l)[0].textContent = d : m.length === 0 ? console.log("EasyMDE: status bar item " + l + " was not found.") : console.log("EasyMDE: Several status bar items named " + l + " was found.");
    }
  }, g.prototype.markdown = function(l) {
    if (F) {
      var d;
      if (this.options && this.options.renderingConfig && this.options.renderingConfig.markedOptions ? d = this.options.renderingConfig.markedOptions : d = {}, this.options && this.options.renderingConfig && this.options.renderingConfig.singleLineBreaks === !1 ? d.breaks = !1 : d.breaks = !0, this.options && this.options.renderingConfig && this.options.renderingConfig.codeSyntaxHighlighting === !0) {
        var m = this.options.renderingConfig.hljs || window.hljs;
        m && (d.highlight = function(k, I) {
          return I && m.getLanguage(I) ? m.highlight(I, k).value : m.highlightAuto(k).value;
        });
      }
      F.use(d);
      var D = F.parse(l);
      return this.options.renderingConfig && typeof this.options.renderingConfig.sanitizerFunction == "function" && (D = this.options.renderingConfig.sanitizerFunction.call(this, D)), D = z(D), D = te(D), D;
    }
  }, g.prototype.render = function(l) {
    if (l || (l = this.element || document.getElementsByTagName("textarea")[0]), this._rendered && this._rendered === l)
      return;
    this.element = l;
    var d = this.options, m = this, D = {};
    for (var k in d.shortcuts)
      d.shortcuts[k] !== null && R[k] !== null && (function(Ae) {
        D[Q(d.shortcuts[Ae])] = function() {
          var He = R[Ae];
          typeof He == "function" ? He(m) : typeof He == "string" && window.open(He, "_blank");
        };
      })(k);
    D.Enter = "newlineAndIndentContinueMarkdownList", D.Tab = "tabAndIndentMarkdownList", D["Shift-Tab"] = "shiftTabAndUnindentMarkdownList", D.Esc = function(Ae) {
      Ae.getOption("fullScreen") && W(m);
    }, this.documentOnKeyDown = function(Ae) {
      Ae = Ae || window.event, Ae.keyCode == 27 && m.codemirror.getOption("fullScreen") && W(m);
    }, document.addEventListener("keydown", this.documentOnKeyDown, !1);
    var I, b;
    d.overlayMode ? (ue.defineMode("overlay-mode", function(Ae) {
      return ue.overlayMode(ue.getMode(Ae, d.spellChecker !== !1 ? "spell-checker" : "gfm"), d.overlayMode.mode, d.overlayMode.combine);
    }), I = "overlay-mode", b = d.parsingConfig, b.gitHubSpice = !1) : (I = d.parsingConfig, I.name = "gfm", I.gitHubSpice = !1), d.spellChecker !== !1 && (I = "spell-checker", b = d.parsingConfig, b.name = "gfm", b.gitHubSpice = !1, typeof d.spellChecker == "function" ? d.spellChecker({
      codeMirrorInstance: ue
    }) : xe({
      codeMirrorInstance: ue
    }));
    function S(Ae, He, Be) {
      return {
        addNew: !1
      };
    }
    if (this.codemirror = ue.fromTextArea(l, {
      mode: I,
      backdrop: b,
      theme: d.theme != null ? d.theme : "easymde",
      tabSize: d.tabSize != null ? d.tabSize : 2,
      indentUnit: d.tabSize != null ? d.tabSize : 2,
      indentWithTabs: d.indentWithTabs !== !1,
      lineNumbers: d.lineNumbers === !0,
      autofocus: d.autofocus === !0,
      extraKeys: D,
      direction: d.direction,
      lineWrapping: d.lineWrapping !== !1,
      allowDropFileTypes: ["text/plain"],
      placeholder: d.placeholder || l.getAttribute("placeholder") || "",
      styleSelectedText: d.styleSelectedText != null ? d.styleSelectedText : !B(),
      scrollbarStyle: d.scrollbarStyle != null ? d.scrollbarStyle : "native",
      configureMouse: S,
      inputStyle: d.inputStyle != null ? d.inputStyle : B() ? "contenteditable" : "textarea",
      spellcheck: d.nativeSpellcheck != null ? d.nativeSpellcheck : !0,
      autoRefresh: d.autoRefresh != null ? d.autoRefresh : !1
    }), this.codemirror.getScrollerElement().style.minHeight = d.minHeight, typeof d.maxHeight < "u" && (this.codemirror.getScrollerElement().style.height = d.maxHeight), d.forceSync === !0) {
      var x = this.codemirror;
      x.on("change", function() {
        x.save();
      });
    }
    this.gui = {};
    var re = document.createElement("div");
    re.classList.add("EasyMDEContainer"), re.setAttribute("role", "application");
    var ie = this.codemirror.getWrapperElement();
    ie.parentNode.insertBefore(re, ie), re.appendChild(ie), d.toolbar !== !1 && (this.gui.toolbar = this.createToolbar()), d.status !== !1 && (this.gui.statusbar = this.createStatusbar()), d.autosave != null && d.autosave.enabled === !0 && (this.autosave(), this.codemirror.on("change", function() {
      clearTimeout(m._autosave_timeout), m._autosave_timeout = setTimeout(function() {
        m.autosave();
      }, m.options.autosave.submit_delay || m.options.autosave.delay || 1e3);
    }));
    function me(Ae, He) {
      var Be, Ge = window.getComputedStyle(document.querySelector(".CodeMirror-sizer")).width.replace("px", "");
      return Ae < Ge ? Be = He + "px" : Be = He / Ae * 100 + "%", Be;
    }
    var ce = this;
    function De(Ae, He) {
      var Be = new URL(He.url, document.baseURI).href;
      Ae.setAttribute("data-img-src", Be), Ae.setAttribute("style", "--bg-image:url(" + Be + ");--width:" + He.naturalWidth + "px;--height:" + me(He.naturalWidth, He.naturalHeight)), ce.codemirror.setSize();
    }
    function Ie() {
      d.previewImagesInEditor && re.querySelectorAll(".cm-image-marker").forEach(function(Ae) {
        var He = Ae.parentElement;
        if (He.innerText.match(/^!\[.*?\]\(.*\)/g) && !He.hasAttribute("data-img-src")) {
          var Be = He.innerText.match(/!\[.*?\]\((.*?)\)/);
          if (window.EMDEimagesCache || (window.EMDEimagesCache = {}), Be && Be.length >= 2) {
            var Ge = Be[1];
            if (d.imagesPreviewHandler) {
              var lt = d.imagesPreviewHandler(Be[1]);
              typeof lt == "string" && (Ge = lt);
            }
            if (window.EMDEimagesCache[Ge])
              De(He, window.EMDEimagesCache[Ge]);
            else {
              window.EMDEimagesCache[Ge] = {};
              var at = document.createElement("img");
              at.onload = function() {
                window.EMDEimagesCache[Ge] = {
                  naturalWidth: at.naturalWidth,
                  naturalHeight: at.naturalHeight,
                  url: Ge
                }, De(He, window.EMDEimagesCache[Ge]);
              }, at.src = Ge;
            }
          }
        }
      });
    }
    this.codemirror.on("update", function() {
      Ie();
    }), this.gui.sideBySide = this.createSideBySide(), this._rendered = this.element, (d.autofocus === !0 || l.autofocus) && this.codemirror.focus();
    var et = this.codemirror;
    setTimeout((function() {
      et.refresh();
    }).bind(et), 0);
  }, g.prototype.cleanup = function() {
    document.removeEventListener("keydown", this.documentOnKeyDown);
  };
  function C() {
    if (typeof localStorage == "object")
      try {
        localStorage.setItem("smde_localStorage", 1), localStorage.removeItem("smde_localStorage");
      } catch {
        return !1;
      }
    else
      return !1;
    return !0;
  }
  return g.prototype.autosave = function() {
    if (C()) {
      var l = this;
      if (this.options.autosave.uniqueId == null || this.options.autosave.uniqueId == "") {
        console.log("EasyMDE: You must set a uniqueId to use the autosave feature");
        return;
      }
      this.options.autosave.binded !== !0 && (l.element.form != null && l.element.form != null && l.element.form.addEventListener("submit", function() {
        clearTimeout(l.autosaveTimeoutId), l.autosaveTimeoutId = void 0, localStorage.removeItem("smde_" + l.options.autosave.uniqueId);
      }), this.options.autosave.binded = !0), this.options.autosave.loaded !== !0 && (typeof localStorage.getItem("smde_" + this.options.autosave.uniqueId) == "string" && localStorage.getItem("smde_" + this.options.autosave.uniqueId) != "" && (this.codemirror.setValue(localStorage.getItem("smde_" + this.options.autosave.uniqueId)), this.options.autosave.foundSavedValue = !0), this.options.autosave.loaded = !0);
      var d = l.value();
      d !== "" ? localStorage.setItem("smde_" + this.options.autosave.uniqueId, d) : localStorage.removeItem("smde_" + this.options.autosave.uniqueId);
      var m = document.getElementById("autosaved");
      if (m != null && m != null && m != "") {
        var D = /* @__PURE__ */ new Date(), k = new Intl.DateTimeFormat([this.options.autosave.timeFormat.locale, "en-US"], this.options.autosave.timeFormat.format).format(D), I = this.options.autosave.text == null ? "Autosaved: " : this.options.autosave.text;
        m.innerHTML = I + k;
      }
    } else
      console.log("EasyMDE: localStorage not available, cannot autosave");
  }, g.prototype.clearAutosavedValue = function() {
    if (C()) {
      if (this.options.autosave == null || this.options.autosave.uniqueId == null || this.options.autosave.uniqueId == "") {
        console.log("EasyMDE: You must set a uniqueId to clear the autosave value");
        return;
      }
      localStorage.removeItem("smde_" + this.options.autosave.uniqueId);
    } else
      console.log("EasyMDE: localStorage not available, cannot autosave");
  }, g.prototype.openBrowseFileWindow = function(l, d) {
    var m = this, D = this.gui.toolbar.getElementsByClassName("imageInput")[0];
    D.click();
    function k(I) {
      m.options.imageUploadFunction ? m.uploadImagesUsingCustomFunction(m.options.imageUploadFunction, I.target.files) : m.uploadImages(I.target.files, l, d), D.removeEventListener("change", k);
    }
    D.addEventListener("change", k);
  }, g.prototype.uploadImage = function(l, d, m) {
    var D = this;
    d = d || function(re) {
      j(D, re);
    };
    function k(x) {
      D.updateStatusBar("upload-image", x), setTimeout(function() {
        D.updateStatusBar("upload-image", D.options.imageTexts.sbInit);
      }, 1e4), m && typeof m == "function" && m(x), D.options.errorCallback(x);
    }
    function I(x) {
      var re = D.options.imageTexts.sizeUnits.split(",");
      return x.replace("#image_name#", l.name).replace("#image_size#", wt(l.size, re)).replace("#image_max_size#", wt(D.options.imageMaxSize, re));
    }
    if (l.size > this.options.imageMaxSize) {
      k(I(this.options.errorMessages.fileTooLarge));
      return;
    }
    var b = new FormData();
    b.append("image", l), D.options.imageCSRFToken && !D.options.imageCSRFHeader && b.append(D.options.imageCSRFName, D.options.imageCSRFToken);
    var S = new XMLHttpRequest();
    S.upload.onprogress = function(x) {
      if (x.lengthComputable) {
        var re = "" + Math.round(x.loaded * 100 / x.total);
        D.updateStatusBar("upload-image", D.options.imageTexts.sbProgress.replace("#file_name#", l.name).replace("#progress#", re));
      }
    }, S.open("POST", this.options.imageUploadEndpoint), D.options.imageCSRFToken && D.options.imageCSRFHeader && S.setRequestHeader(D.options.imageCSRFName, D.options.imageCSRFToken), S.onload = function() {
      try {
        var x = JSON.parse(this.responseText);
      } catch {
        console.error("EasyMDE: The server did not return a valid json."), k(I(D.options.errorMessages.importError));
        return;
      }
      this.status === 200 && x && !x.error && x.data && x.data.filePath ? d((D.options.imagePathAbsolute ? "" : window.location.origin + "/") + x.data.filePath) : x.error && x.error in D.options.errorMessages ? k(I(D.options.errorMessages[x.error])) : x.error ? k(I(x.error)) : (console.error("EasyMDE: Received an unexpected response after uploading the image." + this.status + " (" + this.statusText + ")"), k(I(D.options.errorMessages.importError)));
    }, S.onerror = function(x) {
      console.error("EasyMDE: An unexpected error occurred when trying to upload the image." + x.target.status + " (" + x.target.statusText + ")"), k(D.options.errorMessages.importError);
    }, S.send(b);
  }, g.prototype.uploadImageUsingCustomFunction = function(l, d) {
    var m = this;
    function D(b) {
      j(m, b);
    }
    function k(b) {
      var S = I(b);
      m.updateStatusBar("upload-image", S), setTimeout(function() {
        m.updateStatusBar("upload-image", m.options.imageTexts.sbInit);
      }, 1e4), m.options.errorCallback(S);
    }
    function I(b) {
      var S = m.options.imageTexts.sizeUnits.split(",");
      return b.replace("#image_name#", d.name).replace("#image_size#", wt(d.size, S)).replace("#image_max_size#", wt(m.options.imageMaxSize, S));
    }
    l.apply(this, [d, D, k]);
  }, g.prototype.setPreviewMaxHeight = function() {
    var l = this.codemirror, d = l.getWrapperElement(), m = d.nextSibling, D = parseInt(window.getComputedStyle(d).paddingTop), k = parseInt(window.getComputedStyle(d).borderTopWidth), I = parseInt(this.options.maxHeight), b = I + D * 2 + k * 2, S = b.toString() + "px";
    m.style.height = S;
  }, g.prototype.createSideBySide = function() {
    var l = this.codemirror, d = l.getWrapperElement(), m = d.nextSibling;
    if (!m || !m.classList.contains("editor-preview-side")) {
      if (m = document.createElement("div"), m.className = "editor-preview-side", this.options.previewClass)
        if (Array.isArray(this.options.previewClass))
          for (var D = 0; D < this.options.previewClass.length; D++)
            m.classList.add(this.options.previewClass[D]);
        else typeof this.options.previewClass == "string" && m.classList.add(this.options.previewClass);
      d.parentNode.insertBefore(m, d.nextSibling);
    }
    if (typeof this.options.maxHeight < "u" && this.setPreviewMaxHeight(), this.options.syncSideBySidePreviewScroll === !1) return m;
    var k = !1, I = !1;
    return l.on("scroll", function(b) {
      if (k) {
        k = !1;
        return;
      }
      I = !0;
      var S = b.getScrollInfo().height - b.getScrollInfo().clientHeight, x = parseFloat(b.getScrollInfo().top) / S, re = (m.scrollHeight - m.clientHeight) * x;
      m.scrollTop = re;
    }), m.onscroll = function() {
      if (I) {
        I = !1;
        return;
      }
      k = !0;
      var b = m.scrollHeight - m.clientHeight, S = parseFloat(m.scrollTop) / b, x = (l.getScrollInfo().height - l.getScrollInfo().clientHeight) * S;
      l.scrollTo(0, x);
    }, m;
  }, g.prototype.createToolbar = function(l) {
    if (l = l || this.options.toolbar, !(!l || l.length === 0)) {
      var d;
      for (d = 0; d < l.length; d++)
        bt[l[d]] != null && (l[d] = bt[l[d]]);
      var m = document.createElement("div");
      m.className = "editor-toolbar", m.setAttribute("role", "toolbar");
      var D = this, k = {};
      for (D.toolbar = l, d = 0; d < l.length; d++)
        if (!(l[d].name == "guide" && D.options.toolbarGuideIcon === !1) && !(D.options.hideIcons && D.options.hideIcons.indexOf(l[d].name) != -1) && !((l[d].name == "fullscreen" || l[d].name == "side-by-side") && B())) {
          if (l[d] === "|") {
            for (var I = !1, b = d + 1; b < l.length; b++)
              l[b] !== "|" && (!D.options.hideIcons || D.options.hideIcons.indexOf(l[b].name) == -1) && (I = !0);
            if (!I)
              continue;
          }
          (function(re) {
            var ie;
            if (re === "|" ? ie = ne() : re.children ? ie = K(re, D.options.toolbarTips, D.options.shortcuts, D) : ie = he(re, !0, D.options.toolbarTips, D.options.shortcuts, "button", D), k[re.name || re] = ie, m.appendChild(ie), re.name === "upload-image") {
              var me = document.createElement("input");
              me.className = "imageInput", me.type = "file", me.multiple = !0, me.name = D.options.imageInputName, me.accept = D.options.imageAccept, me.style.display = "none", me.style.opacity = 0, m.appendChild(me);
            }
          })(l[d]);
        }
      D.toolbar_div = m, D.toolbarElements = k;
      var S = this.codemirror;
      S.on("cursorActivity", function() {
        var re = de(S);
        for (var ie in k)
          (function(me) {
            var ce = k[me];
            re[me] ? ce.classList.add("active") : me != "fullscreen" && me != "side-by-side" && ce.classList.remove("active");
          })(ie);
      });
      var x = S.getWrapperElement();
      return x.parentNode.insertBefore(m, x), m;
    }
  }, g.prototype.createStatusbar = function(l) {
    l = l || this.options.status;
    var d = this.options, m = this.codemirror;
    if (!(!l || l.length === 0)) {
      var D = [], k, I, b, S;
      for (k = 0; k < l.length; k++)
        if (I = void 0, b = void 0, S = void 0, typeof l[k] == "object")
          D.push({
            className: l[k].className,
            defaultValue: l[k].defaultValue,
            onUpdate: l[k].onUpdate,
            onActivity: l[k].onActivity
          });
        else {
          var x = l[k];
          x === "words" ? (S = function(De) {
            De.innerHTML = Pe(m.getValue());
          }, I = function(De) {
            De.innerHTML = Pe(m.getValue());
          }) : x === "lines" ? (S = function(De) {
            De.innerHTML = m.lineCount();
          }, I = function(De) {
            De.innerHTML = m.lineCount();
          }) : x === "cursor" ? (S = function(De) {
            De.innerHTML = "1:1";
          }, b = function(De) {
            var Ie = m.getCursor(), et = Ie.line + 1, Ae = Ie.ch + 1;
            De.innerHTML = et + ":" + Ae;
          }) : x === "autosave" ? S = function(De) {
            d.autosave != null && d.autosave.enabled === !0 && De.setAttribute("id", "autosaved");
          } : x === "upload-image" && (S = function(De) {
            De.innerHTML = d.imageTexts.sbInit;
          }), D.push({
            className: x,
            defaultValue: S,
            onUpdate: I,
            onActivity: b
          });
        }
      var re = document.createElement("div");
      for (re.className = "editor-statusbar", k = 0; k < D.length; k++) {
        var ie = D[k], me = document.createElement("span");
        me.className = ie.className, typeof ie.defaultValue == "function" && ie.defaultValue(me), typeof ie.onUpdate == "function" && this.codemirror.on("update", /* @__PURE__ */ (function(De, Ie) {
          return function() {
            Ie.onUpdate(De);
          };
        })(me, ie)), typeof ie.onActivity == "function" && this.codemirror.on("cursorActivity", /* @__PURE__ */ (function(De, Ie) {
          return function() {
            Ie.onActivity(De);
          };
        })(me, ie)), re.appendChild(me);
      }
      var ce = this.codemirror.getWrapperElement();
      return ce.parentNode.insertBefore(re, ce.nextSibling), re;
    }
  }, g.prototype.value = function(l) {
    var d = this.codemirror;
    if (l === void 0)
      return d.getValue();
    if (d.getDoc().setValue(l), this.isPreviewActive()) {
      var m = d.getWrapperElement(), D = m.lastChild, k = this.options.previewRender(l, D);
      k !== null && (D.innerHTML = k);
    }
    return this;
  }, g.toggleBold = X, g.toggleItalic = U, g.toggleStrikethrough = G, g.toggleBlockquote = Z, g.toggleHeadingSmaller = fe, g.toggleHeadingBigger = ye, g.toggleHeading1 = Xe, g.toggleHeading2 = ae, g.toggleHeading3 = Le, g.toggleHeading4 = Ee, g.toggleHeading5 = Ne, g.toggleHeading6 = L, g.toggleCodeBlock = se, g.toggleUnorderedList = ee, g.toggleOrderedList = $, g.toggleCheckList = be, g.cleanBlock = Ue, g.drawLink = it, g.drawImage = Pt, g.drawUploadedImage = c, g.drawTable = _e, g.drawHorizontalRule = Te, g.undo = $e, g.redo = nt, g.togglePreview = Ve, g.toggleSideBySide = Ke, g.toggleFullScreen = W, g.prototype.toggleBold = function() {
    X(this);
  }, g.prototype.toggleItalic = function() {
    U(this);
  }, g.prototype.toggleStrikethrough = function() {
    G(this);
  }, g.prototype.toggleBlockquote = function() {
    Z(this);
  }, g.prototype.toggleHeadingSmaller = function() {
    fe(this);
  }, g.prototype.toggleHeadingBigger = function() {
    ye(this);
  }, g.prototype.toggleHeading1 = function() {
    Xe(this);
  }, g.prototype.toggleHeading2 = function() {
    ae(this);
  }, g.prototype.toggleHeading3 = function() {
    Le(this);
  }, g.prototype.toggleHeading4 = function() {
    Ee(this);
  }, g.prototype.toggleHeading5 = function() {
    Ne(this);
  }, g.prototype.toggleHeading6 = function() {
    L(this);
  }, g.prototype.toggleCodeBlock = function() {
    se(this);
  }, g.prototype.toggleUnorderedList = function() {
    ee(this);
  }, g.prototype.toggleOrderedList = function() {
    $(this);
  }, g.prototype.toggleCheckList = function() {
    be(this);
  }, g.prototype.cleanBlock = function() {
    Ue(this);
  }, g.prototype.drawLink = function() {
    it(this);
  }, g.prototype.drawImage = function() {
    Pt(this);
  }, g.prototype.drawUploadedImage = function() {
    c(this);
  }, g.prototype.drawTable = function() {
    _e(this);
  }, g.prototype.drawHorizontalRule = function() {
    Te(this);
  }, g.prototype.undo = function() {
    $e(this);
  }, g.prototype.redo = function() {
    nt(this);
  }, g.prototype.togglePreview = function() {
    Ve(this);
  }, g.prototype.toggleSideBySide = function() {
    Ke(this);
  }, g.prototype.toggleFullScreen = function() {
    W(this);
  }, g.prototype.isPreviewActive = function() {
    var l = this.codemirror, d = l.getWrapperElement(), m = d.lastChild;
    return m.classList.contains("editor-preview-active");
  }, g.prototype.isSideBySideActive = function() {
    var l = this.codemirror, d = l.getWrapperElement(), m = d.nextSibling;
    return m.classList.contains("editor-preview-active-side");
  }, g.prototype.isFullscreenActive = function() {
    var l = this.codemirror;
    return l.getOption("fullScreen");
  }, g.prototype.getState = function() {
    var l = this.codemirror;
    return de(l);
  }, g.prototype.toTextArea = function() {
    var l = this.codemirror, d = l.getWrapperElement(), m = d.parentNode;
    m && (this.gui.toolbar && m.removeChild(this.gui.toolbar), this.gui.statusbar && m.removeChild(this.gui.statusbar), this.gui.sideBySide && m.removeChild(this.gui.sideBySide)), m.parentNode.insertBefore(d, m), m.remove(), l.toTextArea(), this.autosaveTimeoutId && (clearTimeout(this.autosaveTimeoutId), this.autosaveTimeoutId = void 0, this.clearAutosavedValue());
  }, va = g, va;
}
var mf = vf();
const or = /* @__PURE__ */ Qs(mf), xf = (ue) => !["false", "0", "off", "none", "textarea"].includes(String(ue ?? "").toLowerCase()), yf = (ue) => {
  ue.dispatchEvent(new Event("input", { bubbles: !0 })), ue.dispatchEvent(new Event("change", { bubbles: !0 }));
}, Df = [
  { name: "bold", action: or.toggleBold, text: "B", title: "Negrito" },
  { name: "italic", action: or.toggleItalic, text: "I", title: "Italico" },
  { name: "heading", action: or.toggleHeadingSmaller, text: "H", title: "Titulo" },
  "|",
  { name: "quote", action: or.toggleBlockquote, text: "Quote", title: "Citacao" },
  { name: "unordered-list", action: or.toggleUnorderedList, text: "Lista", title: "Lista simples" },
  { name: "ordered-list", action: or.toggleOrderedList, text: "1.", title: "Lista numerada" },
  "|",
  { name: "link", action: or.drawLink, text: "Link", title: "Link" },
  { name: "preview", action: or.togglePreview, text: "Preview", title: "Preview" }
], bf = (ue) => {
  if (ue.dataset.sampauiEditorReady === "true" || !xf(ue.dataset.sampauiEditor))
    return;
  ue.dataset.sampauiEditorReady = "true";
  const xe = new or({
    element: ue,
    autoDownloadFontAwesome: !1,
    forceSync: !0,
    lineWrapping: !0,
    spellChecker: !1,
    status: !1,
    minHeight: ue.dataset.sampauiEditorMinHeight || "180px",
    placeholder: ue.getAttribute("placeholder") || void 0,
    toolbar: Df
  });
  xe.codemirror.on("change", () => {
    xe.codemirror.save(), yf(ue);
  }), ue.disabled && xe.codemirror.setOption("readOnly", "nocursor"), ue.sampauiEditor = xe;
}, Ti = (ue = document) => {
  ue.querySelectorAll('textarea[data-sampaui-editor="easymde"]').forEach(bf);
};
document.readyState === "loading" ? document.addEventListener("DOMContentLoaded", () => Ti()) : Ti();
document.addEventListener("livewire:navigated", () => Ti());
document.addEventListener("livewire:load", () => Ti());
window.SampaUI = {
  ...window.SampaUI || {},
  initEditors: Ti
};
