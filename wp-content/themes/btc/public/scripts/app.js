(self.webpackChunk=self.webpackChunk||[]).push([[742],{361:function(e,t,n){"use strict";n(609);var i=n(575),r=n.n(i),o=n(913),a=n.n(o),c=function(e){return"".concat(e.charAt(0).toLowerCase()).concat(e.replace(/[\W_]/g,"|").split("|").map((function(e){return"".concat(e.charAt(0).toUpperCase()).concat(e.slice(1))})).join("").slice(1))},s=function(){function e(t){r()(this,e),this.routes=t}return a()(e,[{key:"fire",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"init",n=arguments.length>2?arguments[2]:void 0;document.dispatchEvent(new CustomEvent("routed",{bubbles:!0,detail:{route:e,fn:t}}));var i=""!==e&&this.routes[e]&&"function"==typeof this.routes[e][t];i&&this.routes[e][t](n)}},{key:"loadEvents",value:function(){var e=this;this.fire("common"),document.body.className.toLowerCase().replace(/-/g,"_").split(/\s+/).map(c).forEach((function(t){e.fire(t),e.fire(t,"finalize")})),this.fire("common","finalize")}}]),e}(),u=n(30),l=function(){var e=document.querySelector(".mobile-nav-button--open"),t=document.querySelector(".mobile-nav-button--close");function n(){var e=document.querySelector(".mobile-navigation");e.classList.contains("mobile-nav--closed")?(0,u.Z)({targets:e,easing:"easeInOutCirc",opacity:[0,1],duration:500,begin:function(){e.classList.remove("mobile-nav--closed","hidden"),e.classList.add("mobile-nav--open","flex")}}):(0,u.Z)({targets:e,easing:"easeInOutCirc",opacity:[1,0],duration:500,complete:function(){e.classList.add("mobile-nav--closed","hidden"),e.classList.remove("mobile-nav--open","flex")}})}e.addEventListener("click",(function(){(0,u.Z)({targets:".mobile-nav-button--open svg",easing:"easeInOutCirc",scale:[.75,1.25,1],duration:500,rotate:[180,0],complete:function(){n()}})})),t.addEventListener("click",(function(){(0,u.Z)({targets:".mobile-nav-button--close svg",easing:"easeInOutCirc",scale:[.75,1.25,1],duration:500,rotate:[180,0],complete:function(){n()}})})),document.onkeydown=function(e){("key"in(e=e||window.event)?"Escape"===e.key||"Esc"===e.key:27===e.keyCode)&&n()};var i=document.querySelector(".menu-item-has-children a"),r=document.querySelector(".menu-item-has-children .sub-menu");i.addEventListener("click",(function(e){e.preventDefault(),r.getAttribute("aria-expanded")&&"false"!==r.getAttribute("aria-expanded")?"true"===r.getAttribute("aria-expanded")&&(r.setAttribute("aria-expanded","false"),(0,u.Z)({targets:r,easing:"easeInOutCirc",translateY:[0,20],opacity:[1,0],duration:500,complete:function(){r.style.display="none"}})):(r.setAttribute("aria-expanded","true"),(0,u.Z)({targets:r,easing:"easeInOutCirc",translateY:[20,0],opacity:[0,1],duration:500,begin:function(){r.style.display="grid"}}))}))},d=function(){var e=document.querySelector(".brand"),t=document.querySelector(".mobile-nav-button--open"),n=document.querySelector("#menu-primary").children,i=Array.from([e,t,n]);(0,u.Z)({targets:i,translateY:[-100,0],opacity:[0,1],delay:u.Z.stagger(100),easing:"easeInOutCirc",duration:500})},f=function(){var e=document.querySelectorAll(".how-to-steps");(0,u.Z)({targets:e,keyframes:[{translateX:"75%",right:"75%"},{translateX:"50%",right:"50%"},{translateX:"25%",right:"25%"},{translateX:"50%",right:"50%"}],delay:u.Z.stagger(500,{easing:"linear"}),direction:"alternate",easing:"linear",duration:15e3,loop:!0})},m=function(){var e=document.querySelectorAll(".success-story"),t=new IntersectionObserver((function(e){e.forEach((function(e){!0===e.isIntersecting&&e.target.querySelectorAll(".success-number").forEach((function(e){if(void 0!==e){var t=new Intl.NumberFormat("en-US",{style:"currency",currency:"USD",maximumSignificantDigits:3}),n={progress:"0"};(0,u.Z)({targets:n,progress:function(){return e.innerHTML.slice(1).replace(",","")},update:function(){e.innerHTML=t.format(n.progress)},easing:"easeInOutSine",round:1,duration:1e3})}}))}))}),{threshold:[.5]});e.forEach((function(e){t.observe(e)}))},g={init:function(){l(),d(),f(),m()},finalize:function(){}},p=n(718),y=n.n(p),v=new s({common:g,home:{init:function(){var e=document.querySelector(".hero");e.innerHTML=e.textContent.replace(/\S/g,"<span class='letter'>$&</span>"),(0,u.Z)({targets:".hero .letter",opacity:[0,1],easing:"easeOutExpo",delay:function(e,t){return 70*t}});var t=document.querySelector(".btc-pattern-hero");(0,u.Z)({targets:t,translateX:["-50%","-60%"],direction:"alternate",easing:"linear",duration:15e3,loop:!0})},finalize:function(){}},singleLoanGallery:{init:function(){new(y())(document.querySelector(".cocoen"))},finalize:function(){}}});jQuery((function(){v.loadEvents()}))},255:function(){},88:function(){},609:function(e){"use strict";e.exports=window.jQuery}},0,[[361,546,941],[255,546,941],[88,546,941]]]);
//# sourceMappingURL=app.js.map