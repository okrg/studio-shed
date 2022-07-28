(() => {
  var __create = Object.create;
  var __defProp = Object.defineProperty;
  var __getOwnPropDesc = Object.getOwnPropertyDescriptor;
  var __getOwnPropNames = Object.getOwnPropertyNames;
  var __getProtoOf = Object.getPrototypeOf;
  var __hasOwnProp = Object.prototype.hasOwnProperty;
  var __markAsModule = (target) => __defProp(target, "__esModule", { value: true });
  var __commonJS = (cb, mod) => function __require() {
    return mod || (0, cb[Object.keys(cb)[0]])((mod = { exports: {} }).exports, mod), mod.exports;
  };
  var __reExport = (target, module, desc) => {
    if (module && typeof module === "object" || typeof module === "function") {
      for (let key of __getOwnPropNames(module))
        if (!__hasOwnProp.call(target, key) && key !== "default")
          __defProp(target, key, { get: () => module[key], enumerable: !(desc = __getOwnPropDesc(module, key)) || desc.enumerable });
    }
    return target;
  };
  var __toModule = (module) => {
    return __reExport(__markAsModule(__defProp(module != null ? __create(__getProtoOf(module)) : {}, "default", module && module.__esModule && "default" in module ? { get: () => module.default, enumerable: true } : { value: module, enumerable: true })), module);
  };

  // node_modules/ev-emitter/ev-emitter.js
  var require_ev_emitter = __commonJS({
    "node_modules/ev-emitter/ev-emitter.js"(exports, module) {
      (function(global, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory();
        } else {
          global.EvEmitter = factory();
        }
      })(typeof window != "undefined" ? window : exports, function() {
        function EvEmitter() {
        }
        let proto = EvEmitter.prototype;
        proto.on = function(eventName, listener) {
          if (!eventName || !listener)
            return this;
          let events = this._events = this._events || {};
          let listeners = events[eventName] = events[eventName] || [];
          if (!listeners.includes(listener)) {
            listeners.push(listener);
          }
          return this;
        };
        proto.once = function(eventName, listener) {
          if (!eventName || !listener)
            return this;
          this.on(eventName, listener);
          let onceEvents = this._onceEvents = this._onceEvents || {};
          let onceListeners = onceEvents[eventName] = onceEvents[eventName] || {};
          onceListeners[listener] = true;
          return this;
        };
        proto.off = function(eventName, listener) {
          let listeners = this._events && this._events[eventName];
          if (!listeners || !listeners.length)
            return this;
          let index = listeners.indexOf(listener);
          if (index != -1) {
            listeners.splice(index, 1);
          }
          return this;
        };
        proto.emitEvent = function(eventName, args) {
          let listeners = this._events && this._events[eventName];
          if (!listeners || !listeners.length)
            return this;
          listeners = listeners.slice(0);
          args = args || [];
          let onceListeners = this._onceEvents && this._onceEvents[eventName];
          for (let listener of listeners) {
            let isOnce = onceListeners && onceListeners[listener];
            if (isOnce) {
              this.off(eventName, listener);
              delete onceListeners[listener];
            }
            listener.apply(this, args);
          }
          return this;
        };
        proto.allOff = function() {
          delete this._events;
          delete this._onceEvents;
          return this;
        };
        return EvEmitter;
      });
    }
  });

  // node_modules/get-size/get-size.js
  var require_get_size = __commonJS({
    "node_modules/get-size/get-size.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory();
        } else {
          window2.getSize = factory();
        }
      })(window, function factory() {
        function getStyleSize(value) {
          let num = parseFloat(value);
          let isValid = value.indexOf("%") == -1 && !isNaN(num);
          return isValid && num;
        }
        let measurements = [
          "paddingLeft",
          "paddingRight",
          "paddingTop",
          "paddingBottom",
          "marginLeft",
          "marginRight",
          "marginTop",
          "marginBottom",
          "borderLeftWidth",
          "borderRightWidth",
          "borderTopWidth",
          "borderBottomWidth"
        ];
        let measurementsLength = measurements.length;
        function getZeroSize() {
          let size2 = {
            width: 0,
            height: 0,
            innerWidth: 0,
            innerHeight: 0,
            outerWidth: 0,
            outerHeight: 0
          };
          measurements.forEach((measurement) => {
            size2[measurement] = 0;
          });
          return size2;
        }
        function getSize(elem) {
          if (typeof elem == "string")
            elem = document.querySelector(elem);
          let isElement = elem && typeof elem == "object" && elem.nodeType;
          if (!isElement)
            return;
          let style = getComputedStyle(elem);
          if (style.display == "none")
            return getZeroSize();
          let size2 = {};
          size2.width = elem.offsetWidth;
          size2.height = elem.offsetHeight;
          let isBorderBox = size2.isBorderBox = style.boxSizing == "border-box";
          measurements.forEach((measurement) => {
            let value = style[measurement];
            let num = parseFloat(value);
            size2[measurement] = !isNaN(num) ? num : 0;
          });
          let paddingWidth = size2.paddingLeft + size2.paddingRight;
          let paddingHeight = size2.paddingTop + size2.paddingBottom;
          let marginWidth = size2.marginLeft + size2.marginRight;
          let marginHeight = size2.marginTop + size2.marginBottom;
          let borderWidth = size2.borderLeftWidth + size2.borderRightWidth;
          let borderHeight = size2.borderTopWidth + size2.borderBottomWidth;
          let styleWidth = getStyleSize(style.width);
          if (styleWidth !== false) {
            size2.width = styleWidth + (isBorderBox ? 0 : paddingWidth + borderWidth);
          }
          let styleHeight = getStyleSize(style.height);
          if (styleHeight !== false) {
            size2.height = styleHeight + (isBorderBox ? 0 : paddingHeight + borderHeight);
          }
          size2.innerWidth = size2.width - (paddingWidth + borderWidth);
          size2.innerHeight = size2.height - (paddingHeight + borderHeight);
          size2.outerWidth = size2.width + marginWidth;
          size2.outerHeight = size2.height + marginHeight;
          return size2;
        }
        return getSize;
      });
    }
  });

  // node_modules/fizzy-ui-utils/utils.js
  var require_utils = __commonJS({
    "node_modules/fizzy-ui-utils/utils.js"(exports, module) {
      (function(global, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(global);
        } else {
          global.fizzyUIUtils = factory(global);
        }
      })(exports, function factory(global) {
        let utils2 = {};
        utils2.extend = function(a, b) {
          return Object.assign(a, b);
        };
        utils2.modulo = function(num, div) {
          return (num % div + div) % div;
        };
        utils2.makeArray = function(obj) {
          if (Array.isArray(obj))
            return obj;
          if (obj === null || obj === void 0)
            return [];
          let isArrayLike = typeof obj == "object" && typeof obj.length == "number";
          if (isArrayLike)
            return [...obj];
          return [obj];
        };
        utils2.removeFrom = function(ary, obj) {
          let index = ary.indexOf(obj);
          if (index != -1) {
            ary.splice(index, 1);
          }
        };
        utils2.getParent = function(elem, selector) {
          while (elem.parentNode && elem != document.body) {
            elem = elem.parentNode;
            if (elem.matches(selector))
              return elem;
          }
        };
        utils2.getQueryElement = function(elem) {
          if (typeof elem == "string") {
            return document.querySelector(elem);
          }
          return elem;
        };
        utils2.handleEvent = function(event) {
          let method = "on" + event.type;
          if (this[method]) {
            this[method](event);
          }
        };
        utils2.filterFindElements = function(elems, selector) {
          elems = utils2.makeArray(elems);
          return elems.filter((elem) => elem instanceof HTMLElement).reduce((ffElems, elem) => {
            if (!selector) {
              ffElems.push(elem);
              return ffElems;
            }
            if (elem.matches(selector)) {
              ffElems.push(elem);
            }
            let childElems = elem.querySelectorAll(selector);
            ffElems = ffElems.concat(...childElems);
            return ffElems;
          }, []);
        };
        utils2.debounceMethod = function(_class, methodName, threshold) {
          threshold = threshold || 100;
          let method = _class.prototype[methodName];
          let timeoutName = methodName + "Timeout";
          _class.prototype[methodName] = function() {
            clearTimeout(this[timeoutName]);
            let args = arguments;
            this[timeoutName] = setTimeout(() => {
              method.apply(this, args);
              delete this[timeoutName];
            }, threshold);
          };
        };
        utils2.docReady = function(onDocReady) {
          let readyState = document.readyState;
          if (readyState == "complete" || readyState == "interactive") {
            setTimeout(onDocReady);
          } else {
            document.addEventListener("DOMContentLoaded", onDocReady);
          }
        };
        utils2.toDashed = function(str) {
          return str.replace(/(.)([A-Z])/g, function(match, $1, $2) {
            return $1 + "-" + $2;
          }).toLowerCase();
        };
        let console2 = global.console;
        utils2.htmlInit = function(WidgetClass, namespace) {
          utils2.docReady(function() {
            let dashedNamespace = utils2.toDashed(namespace);
            let dataAttr = "data-" + dashedNamespace;
            let dataAttrElems = document.querySelectorAll(`[${dataAttr}]`);
            let jQuery = global.jQuery;
            [...dataAttrElems].forEach((elem) => {
              let attr = elem.getAttribute(dataAttr);
              let options;
              try {
                options = attr && JSON.parse(attr);
              } catch (error2) {
                if (console2) {
                  console2.error(`Error parsing ${dataAttr} on ${elem.className}: ${error2}`);
                }
                return;
              }
              let instance = new WidgetClass(elem, options);
              if (jQuery) {
                jQuery.data(elem, namespace, instance);
              }
            });
          });
        };
        return utils2;
      });
    }
  });

  // node_modules/flickity/js/cell.js
  var require_cell = __commonJS({
    "node_modules/flickity/js/cell.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(require_get_size());
        } else {
          window2.Flickity = window2.Flickity || {};
          window2.Flickity.Cell = factory(window2.getSize);
        }
      })(typeof window != "undefined" ? window : exports, function factory(getSize) {
        const cellClassName = "flickity-cell";
        function Cell(elem) {
          this.element = elem;
          this.element.classList.add(cellClassName);
          this.x = 0;
          this.unselect();
        }
        let proto = Cell.prototype;
        proto.destroy = function() {
          this.unselect();
          this.element.classList.remove(cellClassName);
          this.element.style.transform = "";
          this.element.removeAttribute("aria-hidden");
        };
        proto.getSize = function() {
          this.size = getSize(this.element);
        };
        proto.select = function() {
          this.element.classList.add("is-selected");
          this.element.removeAttribute("aria-hidden");
        };
        proto.unselect = function() {
          this.element.classList.remove("is-selected");
          this.element.setAttribute("aria-hidden", "true");
        };
        proto.remove = function() {
          this.element.remove();
        };
        return Cell;
      });
    }
  });

  // node_modules/flickity/js/slide.js
  var require_slide = __commonJS({
    "node_modules/flickity/js/slide.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory();
        } else {
          window2.Flickity = window2.Flickity || {};
          window2.Flickity.Slide = factory();
        }
      })(typeof window != "undefined" ? window : exports, function factory() {
        function Slide(beginMargin, endMargin, cellAlign) {
          this.beginMargin = beginMargin;
          this.endMargin = endMargin;
          this.cellAlign = cellAlign;
          this.cells = [];
          this.outerWidth = 0;
          this.height = 0;
        }
        let proto = Slide.prototype;
        proto.addCell = function(cell) {
          this.cells.push(cell);
          this.outerWidth += cell.size.outerWidth;
          this.height = Math.max(cell.size.outerHeight, this.height);
          if (this.cells.length === 1) {
            this.x = cell.x;
            this.firstMargin = cell.size[this.beginMargin];
          }
        };
        proto.updateTarget = function() {
          let lastCell = this.getLastCell();
          let lastMargin = lastCell ? lastCell.size[this.endMargin] : 0;
          let slideWidth = this.outerWidth - (this.firstMargin + lastMargin);
          this.target = this.x + this.firstMargin + slideWidth * this.cellAlign;
        };
        proto.getLastCell = function() {
          return this.cells[this.cells.length - 1];
        };
        proto.select = function() {
          this.cells.forEach((cell) => cell.select());
        };
        proto.unselect = function() {
          this.cells.forEach((cell) => cell.unselect());
        };
        proto.getCellElements = function() {
          return this.cells.map((cell) => cell.element);
        };
        return Slide;
      });
    }
  });

  // node_modules/flickity/js/animate.js
  var require_animate = __commonJS({
    "node_modules/flickity/js/animate.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(require_utils());
        } else {
          window2.Flickity = window2.Flickity || {};
          window2.Flickity.animatePrototype = factory(window2.fizzyUIUtils);
        }
      })(typeof window != "undefined" ? window : exports, function factory(utils2) {
        let proto = {};
        proto.startAnimation = function() {
          if (this.isAnimating)
            return;
          this.isAnimating = true;
          this.restingFrames = 0;
          this.animate();
        };
        proto.animate = function() {
          this.applyDragForce();
          this.applySelectedAttraction();
          let previousX = this.x;
          this.integratePhysics();
          this.positionSlider();
          this.settle(previousX);
          if (this.isAnimating)
            requestAnimationFrame(() => this.animate());
        };
        proto.positionSlider = function() {
          let x = this.x;
          if (this.isWrapping) {
            x = utils2.modulo(x, this.slideableWidth) - this.slideableWidth;
            this.shiftWrapCells(x);
          }
          this.setTranslateX(x, this.isAnimating);
          this.dispatchScrollEvent();
        };
        proto.setTranslateX = function(x, is3d) {
          x += this.cursorPosition;
          if (this.options.rightToLeft)
            x = -x;
          let translateX = this.getPositionValue(x);
          this.slider.style.transform = is3d ? `translate3d(${translateX},0,0)` : `translateX(${translateX})`;
        };
        proto.dispatchScrollEvent = function() {
          let firstSlide = this.slides[0];
          if (!firstSlide)
            return;
          let positionX = -this.x - firstSlide.target;
          let progress = positionX / this.slidesWidth;
          this.dispatchEvent("scroll", null, [progress, positionX]);
        };
        proto.positionSliderAtSelected = function() {
          if (!this.cells.length)
            return;
          this.x = -this.selectedSlide.target;
          this.velocity = 0;
          this.positionSlider();
        };
        proto.getPositionValue = function(position) {
          if (this.options.percentPosition) {
            return Math.round(position / this.size.innerWidth * 1e4) * 0.01 + "%";
          } else {
            return Math.round(position) + "px";
          }
        };
        proto.settle = function(previousX) {
          let isResting = !this.isPointerDown && Math.round(this.x * 100) === Math.round(previousX * 100);
          if (isResting)
            this.restingFrames++;
          if (this.restingFrames > 2) {
            this.isAnimating = false;
            delete this.isFreeScrolling;
            this.positionSlider();
            this.dispatchEvent("settle", null, [this.selectedIndex]);
          }
        };
        proto.shiftWrapCells = function(x) {
          let beforeGap = this.cursorPosition + x;
          this._shiftCells(this.beforeShiftCells, beforeGap, -1);
          let afterGap = this.size.innerWidth - (x + this.slideableWidth + this.cursorPosition);
          this._shiftCells(this.afterShiftCells, afterGap, 1);
        };
        proto._shiftCells = function(cells, gap, shift) {
          cells.forEach((cell) => {
            let cellShift = gap > 0 ? shift : 0;
            this._wrapShiftCell(cell, cellShift);
            gap -= cell.size.outerWidth;
          });
        };
        proto._unshiftCells = function(cells) {
          if (!cells || !cells.length)
            return;
          cells.forEach((cell) => this._wrapShiftCell(cell, 0));
        };
        proto._wrapShiftCell = function(cell, shift) {
          this._renderCellPosition(cell, cell.x + this.slideableWidth * shift);
        };
        proto.integratePhysics = function() {
          this.x += this.velocity;
          this.velocity *= this.getFrictionFactor();
        };
        proto.applyForce = function(force) {
          this.velocity += force;
        };
        proto.getFrictionFactor = function() {
          return 1 - this.options[this.isFreeScrolling ? "freeScrollFriction" : "friction"];
        };
        proto.getRestingPosition = function() {
          return this.x + this.velocity / (1 - this.getFrictionFactor());
        };
        proto.applyDragForce = function() {
          if (!this.isDraggable || !this.isPointerDown)
            return;
          let dragVelocity = this.dragX - this.x;
          let dragForce = dragVelocity - this.velocity;
          this.applyForce(dragForce);
        };
        proto.applySelectedAttraction = function() {
          let dragDown = this.isDraggable && this.isPointerDown;
          if (dragDown || this.isFreeScrolling || !this.slides.length)
            return;
          let distance = this.selectedSlide.target * -1 - this.x;
          let force = distance * this.options.selectedAttraction;
          this.applyForce(force);
        };
        return proto;
      });
    }
  });

  // node_modules/flickity/js/core.js
  var require_core = __commonJS({
    "node_modules/flickity/js/core.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(window2, require_ev_emitter(), require_get_size(), require_utils(), require_cell(), require_slide(), require_animate());
        } else {
          let _Flickity = window2.Flickity;
          window2.Flickity = factory(window2, window2.EvEmitter, window2.getSize, window2.fizzyUIUtils, _Flickity.Cell, _Flickity.Slide, _Flickity.animatePrototype);
        }
      })(typeof window != "undefined" ? window : exports, function factory(window2, EvEmitter, getSize, utils2, Cell, Slide, animatePrototype) {
        const { getComputedStyle: getComputedStyle2, console: console2 } = window2;
        let { jQuery } = window2;
        let GUID = 0;
        let instances = {};
        function Flickity2(element, options) {
          let queryElement = utils2.getQueryElement(element);
          if (!queryElement) {
            if (console2)
              console2.error(`Bad element for Flickity: ${queryElement || element}`);
            return;
          }
          this.element = queryElement;
          if (this.element.flickityGUID) {
            let instance = instances[this.element.flickityGUID];
            if (instance)
              instance.option(options);
            return instance;
          }
          if (jQuery) {
            this.$element = jQuery(this.element);
          }
          this.options = { ...this.constructor.defaults };
          this.option(options);
          this._create();
        }
        Flickity2.defaults = {
          accessibility: true,
          cellAlign: "center",
          freeScrollFriction: 0.075,
          friction: 0.28,
          namespaceJQueryEvents: true,
          percentPosition: true,
          resize: true,
          selectedAttraction: 0.025,
          setGallerySize: true
        };
        Flickity2.create = {};
        let proto = Flickity2.prototype;
        Object.assign(proto, EvEmitter.prototype);
        proto._create = function() {
          let { resize, watchCSS, rightToLeft } = this.options;
          let id = this.guid = ++GUID;
          this.element.flickityGUID = id;
          instances[id] = this;
          this.selectedIndex = 0;
          this.restingFrames = 0;
          this.x = 0;
          this.velocity = 0;
          this.beginMargin = rightToLeft ? "marginRight" : "marginLeft";
          this.endMargin = rightToLeft ? "marginLeft" : "marginRight";
          this.viewport = document.createElement("div");
          this.viewport.className = "flickity-viewport";
          this._createSlider();
          this.focusableElems = [this.element];
          if (resize || watchCSS) {
            window2.addEventListener("resize", this);
          }
          for (let eventName in this.options.on) {
            let listener = this.options.on[eventName];
            this.on(eventName, listener);
          }
          for (let method in Flickity2.create) {
            Flickity2.create[method].call(this);
          }
          if (watchCSS) {
            this.watchCSS();
          } else {
            this.activate();
          }
        };
        proto.option = function(opts) {
          Object.assign(this.options, opts);
        };
        proto.activate = function() {
          if (this.isActive)
            return;
          this.isActive = true;
          this.element.classList.add("flickity-enabled");
          if (this.options.rightToLeft) {
            this.element.classList.add("flickity-rtl");
          }
          this.getSize();
          let cellElems = this._filterFindCellElements(this.element.children);
          this.slider.append(...cellElems);
          this.viewport.append(this.slider);
          this.element.append(this.viewport);
          this.reloadCells();
          if (this.options.accessibility) {
            this.element.tabIndex = 0;
            this.element.addEventListener("keydown", this);
          }
          this.emitEvent("activate");
          this.selectInitialIndex();
          this.isInitActivated = true;
          this.dispatchEvent("ready");
        };
        proto._createSlider = function() {
          let slider = document.createElement("div");
          slider.className = "flickity-slider";
          this.slider = slider;
        };
        proto._filterFindCellElements = function(elems) {
          return utils2.filterFindElements(elems, this.options.cellSelector);
        };
        proto.reloadCells = function() {
          this.cells = this._makeCells(this.slider.children);
          this.positionCells();
          this._updateWrapShiftCells();
          this.setGallerySize();
        };
        proto._makeCells = function(elems) {
          let cellElems = this._filterFindCellElements(elems);
          return cellElems.map((cellElem) => new Cell(cellElem));
        };
        proto.getLastCell = function() {
          return this.cells[this.cells.length - 1];
        };
        proto.getLastSlide = function() {
          return this.slides[this.slides.length - 1];
        };
        proto.positionCells = function() {
          this._sizeCells(this.cells);
          this._positionCells(0);
        };
        proto._positionCells = function(index) {
          index = index || 0;
          this.maxCellHeight = index ? this.maxCellHeight || 0 : 0;
          let cellX = 0;
          if (index > 0) {
            let startCell = this.cells[index - 1];
            cellX = startCell.x + startCell.size.outerWidth;
          }
          this.cells.slice(index).forEach((cell) => {
            cell.x = cellX;
            this._renderCellPosition(cell, cellX);
            cellX += cell.size.outerWidth;
            this.maxCellHeight = Math.max(cell.size.outerHeight, this.maxCellHeight);
          });
          this.slideableWidth = cellX;
          this.updateSlides();
          this._containSlides();
          this.slidesWidth = this.cells.length ? this.getLastSlide().target - this.slides[0].target : 0;
        };
        proto._renderCellPosition = function(cell, x) {
          let sideOffset = this.options.rightToLeft ? -1 : 1;
          let renderX = x * sideOffset;
          if (this.options.percentPosition)
            renderX *= this.size.innerWidth / cell.size.width;
          let positionValue = this.getPositionValue(renderX);
          cell.element.style.transform = `translateX( ${positionValue} )`;
        };
        proto._sizeCells = function(cells) {
          cells.forEach((cell) => cell.getSize());
        };
        proto.updateSlides = function() {
          this.slides = [];
          if (!this.cells.length)
            return;
          let { beginMargin, endMargin } = this;
          let slide = new Slide(beginMargin, endMargin, this.cellAlign);
          this.slides.push(slide);
          let canCellFit = this._getCanCellFit();
          this.cells.forEach((cell, i) => {
            if (!slide.cells.length) {
              slide.addCell(cell);
              return;
            }
            let slideWidth = slide.outerWidth - slide.firstMargin + (cell.size.outerWidth - cell.size[endMargin]);
            if (canCellFit(i, slideWidth)) {
              slide.addCell(cell);
            } else {
              slide.updateTarget();
              slide = new Slide(beginMargin, endMargin, this.cellAlign);
              this.slides.push(slide);
              slide.addCell(cell);
            }
          });
          slide.updateTarget();
          this.updateSelectedSlide();
        };
        proto._getCanCellFit = function() {
          let { groupCells } = this.options;
          if (!groupCells)
            return () => false;
          if (typeof groupCells == "number") {
            let number = parseInt(groupCells, 10);
            return (i) => i % number !== 0;
          }
          let percent = 1;
          let percentMatch = typeof groupCells == "string" && groupCells.match(/^(\d+)%$/);
          if (percentMatch)
            percent = parseInt(percentMatch[1], 10) / 100;
          let groupWidth = (this.size.innerWidth + 1) * percent;
          return (i, slideWidth) => slideWidth <= groupWidth;
        };
        proto._init = proto.reposition = function() {
          this.positionCells();
          this.positionSliderAtSelected();
        };
        proto.getSize = function() {
          this.size = getSize(this.element);
          this.setCellAlign();
          this.cursorPosition = this.size.innerWidth * this.cellAlign;
        };
        let cellAlignShorthands = {
          left: 0,
          center: 0.5,
          right: 1
        };
        proto.setCellAlign = function() {
          let { cellAlign, rightToLeft } = this.options;
          let shorthand = cellAlignShorthands[cellAlign];
          this.cellAlign = shorthand !== void 0 ? shorthand : cellAlign;
          if (rightToLeft)
            this.cellAlign = 1 - this.cellAlign;
        };
        proto.setGallerySize = function() {
          if (!this.options.setGallerySize)
            return;
          let height = this.options.adaptiveHeight && this.selectedSlide ? this.selectedSlide.height : this.maxCellHeight;
          this.viewport.style.height = `${height}px`;
        };
        proto._updateWrapShiftCells = function() {
          this.isWrapping = this.getIsWrapping();
          if (!this.isWrapping)
            return;
          this._unshiftCells(this.beforeShiftCells);
          this._unshiftCells(this.afterShiftCells);
          let beforeGapX = this.cursorPosition;
          let lastIndex = this.cells.length - 1;
          this.beforeShiftCells = this._getGapCells(beforeGapX, lastIndex, -1);
          let afterGapX = this.size.innerWidth - this.cursorPosition;
          this.afterShiftCells = this._getGapCells(afterGapX, 0, 1);
        };
        proto.getIsWrapping = function() {
          let { wrapAround } = this.options;
          if (!wrapAround || this.slides.length < 2)
            return false;
          if (wrapAround !== "fill")
            return true;
          let gapWidth = this.slideableWidth - this.size.innerWidth;
          if (gapWidth > this.size.innerWidth)
            return true;
          for (let cell of this.cells) {
            if (cell.size.outerWidth > gapWidth)
              return false;
          }
          return true;
        };
        proto._getGapCells = function(gapX, cellIndex, increment) {
          let cells = [];
          while (gapX > 0) {
            let cell = this.cells[cellIndex];
            if (!cell)
              break;
            cells.push(cell);
            cellIndex += increment;
            gapX -= cell.size.outerWidth;
          }
          return cells;
        };
        proto._containSlides = function() {
          let isContaining = this.options.contain && !this.isWrapping && this.cells.length;
          if (!isContaining)
            return;
          let contentWidth = this.slideableWidth - this.getLastCell().size[this.endMargin];
          let isContentSmaller = contentWidth < this.size.innerWidth;
          if (isContentSmaller) {
            this.slides.forEach((slide) => {
              slide.target = contentWidth * this.cellAlign;
            });
          } else {
            let beginBound = this.cursorPosition + this.cells[0].size[this.beginMargin];
            let endBound = contentWidth - this.size.innerWidth * (1 - this.cellAlign);
            this.slides.forEach((slide) => {
              slide.target = Math.max(slide.target, beginBound);
              slide.target = Math.min(slide.target, endBound);
            });
          }
        };
        proto.dispatchEvent = function(type, event, args) {
          let emitArgs = event ? [event].concat(args) : args;
          this.emitEvent(type, emitArgs);
          if (jQuery && this.$element) {
            type += this.options.namespaceJQueryEvents ? ".flickity" : "";
            let $event = type;
            if (event) {
              let jQEvent = new jQuery.Event(event);
              jQEvent.type = type;
              $event = jQEvent;
            }
            this.$element.trigger($event, args);
          }
        };
        const unidraggerEvents = [
          "dragStart",
          "dragMove",
          "dragEnd",
          "pointerDown",
          "pointerMove",
          "pointerEnd",
          "staticClick"
        ];
        let _emitEvent = proto.emitEvent;
        proto.emitEvent = function(eventName, args) {
          if (eventName === "staticClick") {
            let clickedCell = this.getParentCell(args[0].target);
            let cellElem = clickedCell && clickedCell.element;
            let cellIndex = clickedCell && this.cells.indexOf(clickedCell);
            args = args.concat(cellElem, cellIndex);
          }
          _emitEvent.call(this, eventName, args);
          let isUnidraggerEvent = unidraggerEvents.includes(eventName);
          if (!isUnidraggerEvent || !jQuery || !this.$element)
            return;
          eventName += this.options.namespaceJQueryEvents ? ".flickity" : "";
          let event = args.shift(0);
          let jQEvent = new jQuery.Event(event);
          jQEvent.type = eventName;
          this.$element.trigger(jQEvent, args);
        };
        proto.select = function(index, isWrap, isInstant) {
          if (!this.isActive)
            return;
          index = parseInt(index, 10);
          this._wrapSelect(index);
          if (this.isWrapping || isWrap) {
            index = utils2.modulo(index, this.slides.length);
          }
          if (!this.slides[index])
            return;
          let prevIndex = this.selectedIndex;
          this.selectedIndex = index;
          this.updateSelectedSlide();
          if (isInstant) {
            this.positionSliderAtSelected();
          } else {
            this.startAnimation();
          }
          if (this.options.adaptiveHeight) {
            this.setGallerySize();
          }
          this.dispatchEvent("select", null, [index]);
          if (index !== prevIndex) {
            this.dispatchEvent("change", null, [index]);
          }
        };
        proto._wrapSelect = function(index) {
          if (!this.isWrapping)
            return;
          const { selectedIndex, slideableWidth, slides: { length } } = this;
          if (!this.isDragSelect) {
            let wrapIndex = utils2.modulo(index, length);
            let delta = Math.abs(wrapIndex - selectedIndex);
            let backWrapDelta = Math.abs(wrapIndex + length - selectedIndex);
            let forewardWrapDelta = Math.abs(wrapIndex - length - selectedIndex);
            if (backWrapDelta < delta) {
              index += length;
            } else if (forewardWrapDelta < delta) {
              index -= length;
            }
          }
          if (index < 0) {
            this.x -= slideableWidth;
          } else if (index >= length) {
            this.x += slideableWidth;
          }
        };
        proto.previous = function(isWrap, isInstant) {
          this.select(this.selectedIndex - 1, isWrap, isInstant);
        };
        proto.next = function(isWrap, isInstant) {
          this.select(this.selectedIndex + 1, isWrap, isInstant);
        };
        proto.updateSelectedSlide = function() {
          let slide = this.slides[this.selectedIndex];
          if (!slide)
            return;
          this.unselectSelectedSlide();
          this.selectedSlide = slide;
          slide.select();
          this.selectedCells = slide.cells;
          this.selectedElements = slide.getCellElements();
          this.selectedCell = slide.cells[0];
          this.selectedElement = this.selectedElements[0];
        };
        proto.unselectSelectedSlide = function() {
          if (this.selectedSlide)
            this.selectedSlide.unselect();
        };
        proto.selectInitialIndex = function() {
          let initialIndex = this.options.initialIndex;
          if (this.isInitActivated) {
            this.select(this.selectedIndex, false, true);
            return;
          }
          if (initialIndex && typeof initialIndex == "string") {
            let cell = this.queryCell(initialIndex);
            if (cell) {
              this.selectCell(initialIndex, false, true);
              return;
            }
          }
          let index = 0;
          if (initialIndex && this.slides[initialIndex]) {
            index = initialIndex;
          }
          this.select(index, false, true);
        };
        proto.selectCell = function(value, isWrap, isInstant) {
          let cell = this.queryCell(value);
          if (!cell)
            return;
          let index = this.getCellSlideIndex(cell);
          this.select(index, isWrap, isInstant);
        };
        proto.getCellSlideIndex = function(cell) {
          let cellSlide = this.slides.find((slide) => slide.cells.includes(cell));
          return this.slides.indexOf(cellSlide);
        };
        proto.getCell = function(elem) {
          for (let cell of this.cells) {
            if (cell.element === elem)
              return cell;
          }
        };
        proto.getCells = function(elems) {
          elems = utils2.makeArray(elems);
          return elems.map((elem) => this.getCell(elem)).filter(Boolean);
        };
        proto.getCellElements = function() {
          return this.cells.map((cell) => cell.element);
        };
        proto.getParentCell = function(elem) {
          let cell = this.getCell(elem);
          if (cell)
            return cell;
          let closest = elem.closest(".flickity-slider > *");
          return this.getCell(closest);
        };
        proto.getAdjacentCellElements = function(adjCount, index) {
          if (!adjCount)
            return this.selectedSlide.getCellElements();
          index = index === void 0 ? this.selectedIndex : index;
          let len = this.slides.length;
          if (1 + adjCount * 2 >= len) {
            return this.getCellElements();
          }
          let cellElems = [];
          for (let i = index - adjCount; i <= index + adjCount; i++) {
            let slideIndex = this.isWrapping ? utils2.modulo(i, len) : i;
            let slide = this.slides[slideIndex];
            if (slide) {
              cellElems = cellElems.concat(slide.getCellElements());
            }
          }
          return cellElems;
        };
        proto.queryCell = function(selector) {
          if (typeof selector == "number") {
            return this.cells[selector];
          }
          let isSelectorString = typeof selector == "string" && !selector.match(/^[#.]?[\d/]/);
          if (isSelectorString) {
            selector = this.element.querySelector(selector);
          }
          return this.getCell(selector);
        };
        proto.uiChange = function() {
          this.emitEvent("uiChange");
        };
        proto.onresize = function() {
          this.watchCSS();
          this.resize();
        };
        utils2.debounceMethod(Flickity2, "onresize", 150);
        proto.resize = function() {
          if (!this.isActive || this.isAnimating || this.isDragging)
            return;
          this.getSize();
          if (this.isWrapping) {
            this.x = utils2.modulo(this.x, this.slideableWidth);
          }
          this.positionCells();
          this._updateWrapShiftCells();
          this.setGallerySize();
          this.emitEvent("resize");
          let selectedElement = this.selectedElements && this.selectedElements[0];
          this.selectCell(selectedElement, false, true);
        };
        proto.watchCSS = function() {
          if (!this.options.watchCSS)
            return;
          let afterContent = getComputedStyle2(this.element, ":after").content;
          if (afterContent.includes("flickity")) {
            this.activate();
          } else {
            this.deactivate();
          }
        };
        proto.onkeydown = function(event) {
          let { activeElement } = document;
          let handler3 = Flickity2.keyboardHandlers[event.key];
          if (!this.options.accessibility || !activeElement || !handler3)
            return;
          let isFocused = this.focusableElems.some((elem) => activeElement === elem);
          if (isFocused)
            handler3.call(this);
        };
        Flickity2.keyboardHandlers = {
          ArrowLeft: function() {
            this.uiChange();
            let leftMethod = this.options.rightToLeft ? "next" : "previous";
            this[leftMethod]();
          },
          ArrowRight: function() {
            this.uiChange();
            let rightMethod = this.options.rightToLeft ? "previous" : "next";
            this[rightMethod]();
          }
        };
        proto.focus = function() {
          this.element.focus({ preventScroll: true });
        };
        proto.deactivate = function() {
          if (!this.isActive)
            return;
          this.element.classList.remove("flickity-enabled");
          this.element.classList.remove("flickity-rtl");
          this.unselectSelectedSlide();
          this.cells.forEach((cell) => cell.destroy());
          this.viewport.remove();
          this.element.append(...this.slider.children);
          if (this.options.accessibility) {
            this.element.removeAttribute("tabIndex");
            this.element.removeEventListener("keydown", this);
          }
          this.isActive = false;
          this.emitEvent("deactivate");
        };
        proto.destroy = function() {
          this.deactivate();
          window2.removeEventListener("resize", this);
          this.allOff();
          this.emitEvent("destroy");
          if (jQuery && this.$element) {
            jQuery.removeData(this.element, "flickity");
          }
          delete this.element.flickityGUID;
          delete instances[this.guid];
        };
        Object.assign(proto, animatePrototype);
        Flickity2.data = function(elem) {
          elem = utils2.getQueryElement(elem);
          if (elem)
            return instances[elem.flickityGUID];
        };
        utils2.htmlInit(Flickity2, "flickity");
        let { jQueryBridget } = window2;
        if (jQuery && jQueryBridget) {
          jQueryBridget("flickity", Flickity2, jQuery);
        }
        Flickity2.setJQuery = function(jq) {
          jQuery = jq;
        };
        Flickity2.Cell = Cell;
        Flickity2.Slide = Slide;
        return Flickity2;
      });
    }
  });

  // node_modules/unidragger/unidragger.js
  var require_unidragger = __commonJS({
    "node_modules/unidragger/unidragger.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(window2, require_ev_emitter());
        } else {
          window2.Unidragger = factory(window2, window2.EvEmitter);
        }
      })(typeof window != "undefined" ? window : exports, function factory(window2, EvEmitter) {
        function Unidragger() {
        }
        let proto = Unidragger.prototype = Object.create(EvEmitter.prototype);
        proto.handleEvent = function(event) {
          let method = "on" + event.type;
          if (this[method]) {
            this[method](event);
          }
        };
        let startEvent, activeEvents;
        if ("ontouchstart" in window2) {
          startEvent = "touchstart";
          activeEvents = ["touchmove", "touchend", "touchcancel"];
        } else if (window2.PointerEvent) {
          startEvent = "pointerdown";
          activeEvents = ["pointermove", "pointerup", "pointercancel"];
        } else {
          startEvent = "mousedown";
          activeEvents = ["mousemove", "mouseup"];
        }
        proto.touchActionValue = "none";
        proto.bindHandles = function() {
          this._bindHandles("addEventListener", this.touchActionValue);
        };
        proto.unbindHandles = function() {
          this._bindHandles("removeEventListener", "");
        };
        proto._bindHandles = function(bindMethod, touchAction) {
          this.handles.forEach((handle) => {
            handle[bindMethod](startEvent, this);
            handle[bindMethod]("click", this);
            if (window2.PointerEvent)
              handle.style.touchAction = touchAction;
          });
        };
        proto.bindActivePointerEvents = function() {
          activeEvents.forEach((eventName) => {
            window2.addEventListener(eventName, this);
          });
        };
        proto.unbindActivePointerEvents = function() {
          activeEvents.forEach((eventName) => {
            window2.removeEventListener(eventName, this);
          });
        };
        proto.withPointer = function(methodName, event) {
          if (event.pointerId === this.pointerIdentifier) {
            this[methodName](event, event);
          }
        };
        proto.withTouch = function(methodName, event) {
          let touch;
          for (let changedTouch of event.changedTouches) {
            if (changedTouch.identifier === this.pointerIdentifier) {
              touch = changedTouch;
            }
          }
          if (touch)
            this[methodName](event, touch);
        };
        proto.onmousedown = function(event) {
          this.pointerDown(event, event);
        };
        proto.ontouchstart = function(event) {
          this.pointerDown(event, event.changedTouches[0]);
        };
        proto.onpointerdown = function(event) {
          this.pointerDown(event, event);
        };
        const cursorNodes = ["TEXTAREA", "INPUT", "SELECT", "OPTION"];
        const clickTypes = ["radio", "checkbox", "button", "submit", "image", "file"];
        proto.pointerDown = function(event, pointer) {
          let isCursorNode = cursorNodes.includes(event.target.nodeName);
          let isClickType = clickTypes.includes(event.target.type);
          let isOkayElement = !isCursorNode || isClickType;
          let isOkay = !this.isPointerDown && !event.button && isOkayElement;
          if (!isOkay)
            return;
          this.isPointerDown = true;
          this.pointerIdentifier = pointer.pointerId !== void 0 ? pointer.pointerId : pointer.identifier;
          this.pointerDownPointer = {
            pageX: pointer.pageX,
            pageY: pointer.pageY
          };
          this.bindActivePointerEvents();
          this.emitEvent("pointerDown", [event, pointer]);
        };
        proto.onmousemove = function(event) {
          this.pointerMove(event, event);
        };
        proto.onpointermove = function(event) {
          this.withPointer("pointerMove", event);
        };
        proto.ontouchmove = function(event) {
          this.withTouch("pointerMove", event);
        };
        proto.pointerMove = function(event, pointer) {
          let moveVector = {
            x: pointer.pageX - this.pointerDownPointer.pageX,
            y: pointer.pageY - this.pointerDownPointer.pageY
          };
          this.emitEvent("pointerMove", [event, pointer, moveVector]);
          let isDragStarting = !this.isDragging && this.hasDragStarted(moveVector);
          if (isDragStarting)
            this.dragStart(event, pointer);
          if (this.isDragging)
            this.dragMove(event, pointer, moveVector);
        };
        proto.hasDragStarted = function(moveVector) {
          return Math.abs(moveVector.x) > 3 || Math.abs(moveVector.y) > 3;
        };
        proto.dragStart = function(event, pointer) {
          this.isDragging = true;
          this.isPreventingClicks = true;
          this.emitEvent("dragStart", [event, pointer]);
        };
        proto.dragMove = function(event, pointer, moveVector) {
          this.emitEvent("dragMove", [event, pointer, moveVector]);
        };
        proto.onmouseup = function(event) {
          this.pointerUp(event, event);
        };
        proto.onpointerup = function(event) {
          this.withPointer("pointerUp", event);
        };
        proto.ontouchend = function(event) {
          this.withTouch("pointerUp", event);
        };
        proto.pointerUp = function(event, pointer) {
          this.pointerDone();
          this.emitEvent("pointerUp", [event, pointer]);
          if (this.isDragging) {
            this.dragEnd(event, pointer);
          } else {
            this.staticClick(event, pointer);
          }
        };
        proto.dragEnd = function(event, pointer) {
          this.isDragging = false;
          setTimeout(() => delete this.isPreventingClicks);
          this.emitEvent("dragEnd", [event, pointer]);
        };
        proto.pointerDone = function() {
          this.isPointerDown = false;
          delete this.pointerIdentifier;
          this.unbindActivePointerEvents();
          this.emitEvent("pointerDone");
        };
        proto.onpointercancel = function(event) {
          this.withPointer("pointerCancel", event);
        };
        proto.ontouchcancel = function(event) {
          this.withTouch("pointerCancel", event);
        };
        proto.pointerCancel = function(event, pointer) {
          this.pointerDone();
          this.emitEvent("pointerCancel", [event, pointer]);
        };
        proto.onclick = function(event) {
          if (this.isPreventingClicks)
            event.preventDefault();
        };
        proto.staticClick = function(event, pointer) {
          let isMouseup = event.type === "mouseup";
          if (isMouseup && this.isIgnoringMouseUp)
            return;
          this.emitEvent("staticClick", [event, pointer]);
          if (isMouseup) {
            this.isIgnoringMouseUp = true;
            setTimeout(() => {
              delete this.isIgnoringMouseUp;
            }, 400);
          }
        };
        return Unidragger;
      });
    }
  });

  // node_modules/flickity/js/drag.js
  var require_drag = __commonJS({
    "node_modules/flickity/js/drag.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(window2, require_core(), require_unidragger(), require_utils());
        } else {
          window2.Flickity = factory(window2, window2.Flickity, window2.Unidragger, window2.fizzyUIUtils);
        }
      })(typeof window != "undefined" ? window : exports, function factory(window2, Flickity2, Unidragger, utils2) {
        Object.assign(Flickity2.defaults, {
          draggable: ">1",
          dragThreshold: 3
        });
        let proto = Flickity2.prototype;
        Object.assign(proto, Unidragger.prototype);
        proto.touchActionValue = "";
        Flickity2.create.drag = function() {
          this.on("activate", this.onActivateDrag);
          this.on("uiChange", this._uiChangeDrag);
          this.on("deactivate", this.onDeactivateDrag);
          this.on("cellChange", this.updateDraggable);
          this.on("pointerDown", this.handlePointerDown);
          this.on("pointerUp", this.handlePointerUp);
          this.on("pointerDown", this.handlePointerDone);
          this.on("dragStart", this.handleDragStart);
          this.on("dragMove", this.handleDragMove);
          this.on("dragEnd", this.handleDragEnd);
          this.on("staticClick", this.handleStaticClick);
        };
        proto.onActivateDrag = function() {
          this.handles = [this.viewport];
          this.bindHandles();
          this.updateDraggable();
        };
        proto.onDeactivateDrag = function() {
          this.unbindHandles();
          this.element.classList.remove("is-draggable");
        };
        proto.updateDraggable = function() {
          if (this.options.draggable === ">1") {
            this.isDraggable = this.slides.length > 1;
          } else {
            this.isDraggable = this.options.draggable;
          }
          this.element.classList.toggle("is-draggable", this.isDraggable);
        };
        proto._uiChangeDrag = function() {
          delete this.isFreeScrolling;
        };
        proto.handlePointerDown = function(event) {
          if (!this.isDraggable) {
            this.bindActivePointerEvents(event);
            return;
          }
          let isTouchStart = event.type === "touchstart";
          let isTouchPointer = event.pointerType === "touch";
          let isFocusNode = event.target.matches("input, textarea, select");
          if (!isTouchStart && !isTouchPointer && !isFocusNode)
            event.preventDefault();
          if (!isFocusNode)
            this.focus();
          if (document.activeElement !== this.element)
            document.activeElement.blur();
          this.dragX = this.x;
          this.viewport.classList.add("is-pointer-down");
          this.pointerDownScroll = getScrollPosition();
          window2.addEventListener("scroll", this);
          this.bindActivePointerEvents(event);
        };
        proto.hasDragStarted = function(moveVector) {
          return Math.abs(moveVector.x) > this.options.dragThreshold;
        };
        proto.handlePointerUp = function() {
          delete this.isTouchScrolling;
          this.viewport.classList.remove("is-pointer-down");
        };
        proto.handlePointerDone = function() {
          window2.removeEventListener("scroll", this);
          delete this.pointerDownScroll;
        };
        proto.handleDragStart = function() {
          if (!this.isDraggable)
            return;
          this.dragStartPosition = this.x;
          this.startAnimation();
          window2.removeEventListener("scroll", this);
        };
        proto.handleDragMove = function(event, pointer, moveVector) {
          if (!this.isDraggable)
            return;
          event.preventDefault();
          this.previousDragX = this.dragX;
          let direction = this.options.rightToLeft ? -1 : 1;
          if (this.isWrapping)
            moveVector.x %= this.slideableWidth;
          let dragX = this.dragStartPosition + moveVector.x * direction;
          if (!this.isWrapping) {
            let originBound = Math.max(-this.slides[0].target, this.dragStartPosition);
            dragX = dragX > originBound ? (dragX + originBound) * 0.5 : dragX;
            let endBound = Math.min(-this.getLastSlide().target, this.dragStartPosition);
            dragX = dragX < endBound ? (dragX + endBound) * 0.5 : dragX;
          }
          this.dragX = dragX;
          this.dragMoveTime = new Date();
        };
        proto.handleDragEnd = function() {
          if (!this.isDraggable)
            return;
          let { freeScroll } = this.options;
          if (freeScroll)
            this.isFreeScrolling = true;
          let index = this.dragEndRestingSelect();
          if (freeScroll && !this.isWrapping) {
            let restingX = this.getRestingPosition();
            this.isFreeScrolling = -restingX > this.slides[0].target && -restingX < this.getLastSlide().target;
          } else if (!freeScroll && index === this.selectedIndex) {
            index += this.dragEndBoostSelect();
          }
          delete this.previousDragX;
          this.isDragSelect = this.isWrapping;
          this.select(index);
          delete this.isDragSelect;
        };
        proto.dragEndRestingSelect = function() {
          let restingX = this.getRestingPosition();
          let distance = Math.abs(this.getSlideDistance(-restingX, this.selectedIndex));
          let positiveResting = this._getClosestResting(restingX, distance, 1);
          let negativeResting = this._getClosestResting(restingX, distance, -1);
          return positiveResting.distance < negativeResting.distance ? positiveResting.index : negativeResting.index;
        };
        proto._getClosestResting = function(restingX, distance, increment) {
          let index = this.selectedIndex;
          let minDistance = Infinity;
          let condition = this.options.contain && !this.isWrapping ? (dist, minDist) => dist <= minDist : (dist, minDist) => dist < minDist;
          while (condition(distance, minDistance)) {
            index += increment;
            minDistance = distance;
            distance = this.getSlideDistance(-restingX, index);
            if (distance === null)
              break;
            distance = Math.abs(distance);
          }
          return {
            distance: minDistance,
            index: index - increment
          };
        };
        proto.getSlideDistance = function(x, index) {
          let len = this.slides.length;
          let isWrapAround = this.options.wrapAround && len > 1;
          let slideIndex = isWrapAround ? utils2.modulo(index, len) : index;
          let slide = this.slides[slideIndex];
          if (!slide)
            return null;
          let wrap = isWrapAround ? this.slideableWidth * Math.floor(index / len) : 0;
          return x - (slide.target + wrap);
        };
        proto.dragEndBoostSelect = function() {
          if (this.previousDragX === void 0 || !this.dragMoveTime || new Date() - this.dragMoveTime > 100) {
            return 0;
          }
          let distance = this.getSlideDistance(-this.dragX, this.selectedIndex);
          let delta = this.previousDragX - this.dragX;
          if (distance > 0 && delta > 0) {
            return 1;
          } else if (distance < 0 && delta < 0) {
            return -1;
          }
          return 0;
        };
        proto.onscroll = function() {
          let scroll = getScrollPosition();
          let scrollMoveX = this.pointerDownScroll.x - scroll.x;
          let scrollMoveY = this.pointerDownScroll.y - scroll.y;
          if (Math.abs(scrollMoveX) > 3 || Math.abs(scrollMoveY) > 3) {
            this.pointerDone();
          }
        };
        function getScrollPosition() {
          return {
            x: window2.pageXOffset,
            y: window2.pageYOffset
          };
        }
        return Flickity2;
      });
    }
  });

  // node_modules/flickity/js/prev-next-button.js
  var require_prev_next_button = __commonJS({
    "node_modules/flickity/js/prev-next-button.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(require_core());
        } else {
          factory(window2.Flickity);
        }
      })(typeof window != "undefined" ? window : exports, function factory(Flickity2) {
        const svgURI = "http://www.w3.org/2000/svg";
        function PrevNextButton(increment, direction, arrowShape) {
          this.increment = increment;
          this.direction = direction;
          this.isPrevious = increment === "previous";
          this.isLeft = direction === "left";
          this._create(arrowShape);
        }
        PrevNextButton.prototype._create = function(arrowShape) {
          let element = this.element = document.createElement("button");
          element.className = `flickity-button flickity-prev-next-button ${this.increment}`;
          let label = this.isPrevious ? "Previous" : "Next";
          element.setAttribute("type", "button");
          element.setAttribute("aria-label", label);
          this.disable();
          let svg = this.createSVG(label, arrowShape);
          element.append(svg);
        };
        PrevNextButton.prototype.createSVG = function(label, arrowShape) {
          let svg = document.createElementNS(svgURI, "svg");
          svg.setAttribute("class", "flickity-button-icon");
          svg.setAttribute("viewBox", "0 0 100 100");
          let title = document.createElementNS(svgURI, "title");
          title.append(label);
          let path = document.createElementNS(svgURI, "path");
          let pathMovements = getArrowMovements(arrowShape);
          path.setAttribute("d", pathMovements);
          path.setAttribute("class", "arrow");
          if (!this.isLeft) {
            path.setAttribute("transform", "translate(100, 100) rotate(180)");
          }
          svg.append(title, path);
          return svg;
        };
        function getArrowMovements(shape) {
          if (typeof shape == "string")
            return shape;
          let { x0, x1, x2, x3, y1, y2 } = shape;
          return `M ${x0}, 50
    L ${x1}, ${y1 + 50}
    L ${x2}, ${y2 + 50}
    L ${x3}, 50
    L ${x2}, ${50 - y2}
    L ${x1}, ${50 - y1}
    Z`;
        }
        PrevNextButton.prototype.enable = function() {
          this.element.removeAttribute("disabled");
        };
        PrevNextButton.prototype.disable = function() {
          this.element.setAttribute("disabled", true);
        };
        Object.assign(Flickity2.defaults, {
          prevNextButtons: true,
          arrowShape: {
            x0: 10,
            x1: 60,
            y1: 50,
            x2: 70,
            y2: 40,
            x3: 30
          }
        });
        Flickity2.create.prevNextButtons = function() {
          if (!this.options.prevNextButtons)
            return;
          let { rightToLeft, arrowShape } = this.options;
          let prevDirection = rightToLeft ? "right" : "left";
          let nextDirection = rightToLeft ? "left" : "right";
          this.prevButton = new PrevNextButton("previous", prevDirection, arrowShape);
          this.nextButton = new PrevNextButton("next", nextDirection, arrowShape);
          this.focusableElems.push(this.prevButton.element);
          this.focusableElems.push(this.nextButton.element);
          this.handlePrevButtonClick = () => {
            this.uiChange();
            this.previous();
          };
          this.handleNextButtonClick = () => {
            this.uiChange();
            this.next();
          };
          this.on("activate", this.activatePrevNextButtons);
          this.on("select", this.updatePrevNextButtons);
        };
        let proto = Flickity2.prototype;
        proto.updatePrevNextButtons = function() {
          let lastIndex = this.slides.length ? this.slides.length - 1 : 0;
          this.updatePrevNextButton(this.prevButton, 0);
          this.updatePrevNextButton(this.nextButton, lastIndex);
        };
        proto.updatePrevNextButton = function(button, disabledIndex) {
          if (this.isWrapping && this.slides.length > 1) {
            button.enable();
            return;
          }
          let isEnabled = this.selectedIndex !== disabledIndex;
          button[isEnabled ? "enable" : "disable"]();
          let isDisabledFocused = !isEnabled && document.activeElement === button.element;
          if (isDisabledFocused)
            this.focus();
        };
        proto.activatePrevNextButtons = function() {
          this.prevButton.element.addEventListener("click", this.handlePrevButtonClick);
          this.nextButton.element.addEventListener("click", this.handleNextButtonClick);
          this.element.append(this.prevButton.element, this.nextButton.element);
          this.on("deactivate", this.deactivatePrevNextButtons);
        };
        proto.deactivatePrevNextButtons = function() {
          this.prevButton.element.remove();
          this.nextButton.element.remove();
          this.prevButton.element.removeEventListener("click", this.handlePrevButtonClick);
          this.nextButton.element.removeEventListener("click", this.handleNextButtonClick);
          this.off("deactivate", this.deactivatePrevNextButtons);
        };
        Flickity2.PrevNextButton = PrevNextButton;
        return Flickity2;
      });
    }
  });

  // node_modules/flickity/js/page-dots.js
  var require_page_dots = __commonJS({
    "node_modules/flickity/js/page-dots.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(require_core(), require_utils());
        } else {
          factory(window2.Flickity, window2.fizzyUIUtils);
        }
      })(typeof window != "undefined" ? window : exports, function factory(Flickity2, utils2) {
        function PageDots() {
          this.holder = document.createElement("div");
          this.holder.className = "flickity-page-dots";
          this.dots = [];
        }
        PageDots.prototype.setDots = function(slidesLength) {
          let delta = slidesLength - this.dots.length;
          if (delta > 0) {
            this.addDots(delta);
          } else if (delta < 0) {
            this.removeDots(-delta);
          }
        };
        PageDots.prototype.addDots = function(count) {
          let newDots = new Array(count).fill().map((item, i) => {
            let dot = document.createElement("button");
            dot.setAttribute("type", "button");
            let num = i + 1 + this.dots.length;
            dot.className = "flickity-page-dot";
            dot.textContent = `View slide ${num}`;
            return dot;
          });
          this.holder.append(...newDots);
          this.dots = this.dots.concat(newDots);
        };
        PageDots.prototype.removeDots = function(count) {
          let removeDots = this.dots.splice(this.dots.length - count, count);
          removeDots.forEach((dot) => dot.remove());
        };
        PageDots.prototype.updateSelected = function(index) {
          if (this.selectedDot) {
            this.selectedDot.classList.remove("is-selected");
            this.selectedDot.removeAttribute("aria-current");
          }
          if (!this.dots.length)
            return;
          this.selectedDot = this.dots[index];
          this.selectedDot.classList.add("is-selected");
          this.selectedDot.setAttribute("aria-current", "step");
        };
        Flickity2.PageDots = PageDots;
        Object.assign(Flickity2.defaults, {
          pageDots: true
        });
        Flickity2.create.pageDots = function() {
          if (!this.options.pageDots)
            return;
          this.pageDots = new PageDots();
          this.handlePageDotsClick = this.onPageDotsClick.bind(this);
          this.on("activate", this.activatePageDots);
          this.on("select", this.updateSelectedPageDots);
          this.on("cellChange", this.updatePageDots);
          this.on("resize", this.updatePageDots);
          this.on("deactivate", this.deactivatePageDots);
        };
        let proto = Flickity2.prototype;
        proto.activatePageDots = function() {
          this.pageDots.setDots(this.slides.length);
          this.focusableElems.push(...this.pageDots.dots);
          this.pageDots.holder.addEventListener("click", this.handlePageDotsClick);
          this.element.append(this.pageDots.holder);
        };
        proto.onPageDotsClick = function(event) {
          let index = this.pageDots.dots.indexOf(event.target);
          if (index === -1)
            return;
          this.uiChange();
          this.select(index);
        };
        proto.updateSelectedPageDots = function() {
          this.pageDots.updateSelected(this.selectedIndex);
        };
        proto.updatePageDots = function() {
          this.pageDots.dots.forEach((dot) => {
            utils2.removeFrom(this.focusableElems, dot);
          });
          this.pageDots.setDots(this.slides.length);
          this.focusableElems.push(...this.pageDots.dots);
        };
        proto.deactivatePageDots = function() {
          this.pageDots.holder.remove();
          this.pageDots.holder.removeEventListener("click", this.handlePageDotsClick);
        };
        Flickity2.PageDots = PageDots;
        return Flickity2;
      });
    }
  });

  // node_modules/flickity/js/player.js
  var require_player = __commonJS({
    "node_modules/flickity/js/player.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(require_core());
        } else {
          factory(window2.Flickity);
        }
      })(typeof window != "undefined" ? window : exports, function factory(Flickity2) {
        function Player(autoPlay, onTick) {
          this.autoPlay = autoPlay;
          this.onTick = onTick;
          this.state = "stopped";
          this.onVisibilityChange = this.visibilityChange.bind(this);
          this.onVisibilityPlay = this.visibilityPlay.bind(this);
        }
        Player.prototype.play = function() {
          if (this.state === "playing")
            return;
          let isPageHidden = document.hidden;
          if (isPageHidden) {
            document.addEventListener("visibilitychange", this.onVisibilityPlay);
            return;
          }
          this.state = "playing";
          document.addEventListener("visibilitychange", this.onVisibilityChange);
          this.tick();
        };
        Player.prototype.tick = function() {
          if (this.state !== "playing")
            return;
          let time = typeof this.autoPlay == "number" ? this.autoPlay : 3e3;
          this.clear();
          this.timeout = setTimeout(() => {
            this.onTick();
            this.tick();
          }, time);
        };
        Player.prototype.stop = function() {
          this.state = "stopped";
          this.clear();
          document.removeEventListener("visibilitychange", this.onVisibilityChange);
        };
        Player.prototype.clear = function() {
          clearTimeout(this.timeout);
        };
        Player.prototype.pause = function() {
          if (this.state === "playing") {
            this.state = "paused";
            this.clear();
          }
        };
        Player.prototype.unpause = function() {
          if (this.state === "paused")
            this.play();
        };
        Player.prototype.visibilityChange = function() {
          let isPageHidden = document.hidden;
          this[isPageHidden ? "pause" : "unpause"]();
        };
        Player.prototype.visibilityPlay = function() {
          this.play();
          document.removeEventListener("visibilitychange", this.onVisibilityPlay);
        };
        Object.assign(Flickity2.defaults, {
          pauseAutoPlayOnHover: true
        });
        Flickity2.create.player = function() {
          this.player = new Player(this.options.autoPlay, () => {
            this.next(true);
          });
          this.on("activate", this.activatePlayer);
          this.on("uiChange", this.stopPlayer);
          this.on("pointerDown", this.stopPlayer);
          this.on("deactivate", this.deactivatePlayer);
        };
        let proto = Flickity2.prototype;
        proto.activatePlayer = function() {
          if (!this.options.autoPlay)
            return;
          this.player.play();
          this.element.addEventListener("mouseenter", this);
        };
        proto.playPlayer = function() {
          this.player.play();
        };
        proto.stopPlayer = function() {
          this.player.stop();
        };
        proto.pausePlayer = function() {
          this.player.pause();
        };
        proto.unpausePlayer = function() {
          this.player.unpause();
        };
        proto.deactivatePlayer = function() {
          this.player.stop();
          this.element.removeEventListener("mouseenter", this);
        };
        proto.onmouseenter = function() {
          if (!this.options.pauseAutoPlayOnHover)
            return;
          this.player.pause();
          this.element.addEventListener("mouseleave", this);
        };
        proto.onmouseleave = function() {
          this.player.unpause();
          this.element.removeEventListener("mouseleave", this);
        };
        Flickity2.Player = Player;
        return Flickity2;
      });
    }
  });

  // node_modules/flickity/js/add-remove-cell.js
  var require_add_remove_cell = __commonJS({
    "node_modules/flickity/js/add-remove-cell.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(require_core(), require_utils());
        } else {
          factory(window2.Flickity, window2.fizzyUIUtils);
        }
      })(typeof window != "undefined" ? window : exports, function factory(Flickity2, utils2) {
        function getCellsFragment(cells) {
          let fragment = document.createDocumentFragment();
          cells.forEach((cell) => fragment.appendChild(cell.element));
          return fragment;
        }
        let proto = Flickity2.prototype;
        proto.insert = function(elems, index) {
          let cells = this._makeCells(elems);
          if (!cells || !cells.length)
            return;
          let len = this.cells.length;
          index = index === void 0 ? len : index;
          let fragment = getCellsFragment(cells);
          let isAppend = index === len;
          if (isAppend) {
            this.slider.appendChild(fragment);
          } else {
            let insertCellElement = this.cells[index].element;
            this.slider.insertBefore(fragment, insertCellElement);
          }
          if (index === 0) {
            this.cells = cells.concat(this.cells);
          } else if (isAppend) {
            this.cells = this.cells.concat(cells);
          } else {
            let endCells = this.cells.splice(index, len - index);
            this.cells = this.cells.concat(cells).concat(endCells);
          }
          this._sizeCells(cells);
          this.cellChange(index);
          this.positionSliderAtSelected();
        };
        proto.append = function(elems) {
          this.insert(elems, this.cells.length);
        };
        proto.prepend = function(elems) {
          this.insert(elems, 0);
        };
        proto.remove = function(elems) {
          let cells = this.getCells(elems);
          if (!cells || !cells.length)
            return;
          let minCellIndex = this.cells.length - 1;
          cells.forEach((cell) => {
            cell.remove();
            let index = this.cells.indexOf(cell);
            minCellIndex = Math.min(index, minCellIndex);
            utils2.removeFrom(this.cells, cell);
          });
          this.cellChange(minCellIndex);
          this.positionSliderAtSelected();
        };
        proto.cellSizeChange = function(elem) {
          let cell = this.getCell(elem);
          if (!cell)
            return;
          cell.getSize();
          let index = this.cells.indexOf(cell);
          this.cellChange(index);
        };
        proto.cellChange = function(changedCellIndex) {
          let prevSelectedElem = this.selectedElement;
          this._positionCells(changedCellIndex);
          this._updateWrapShiftCells();
          this.setGallerySize();
          let cell = this.getCell(prevSelectedElem);
          if (cell)
            this.selectedIndex = this.getCellSlideIndex(cell);
          this.selectedIndex = Math.min(this.slides.length - 1, this.selectedIndex);
          this.emitEvent("cellChange", [changedCellIndex]);
          this.select(this.selectedIndex);
        };
        return Flickity2;
      });
    }
  });

  // node_modules/flickity/js/lazyload.js
  var require_lazyload = __commonJS({
    "node_modules/flickity/js/lazyload.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(require_core(), require_utils());
        } else {
          factory(window2.Flickity, window2.fizzyUIUtils);
        }
      })(typeof window != "undefined" ? window : exports, function factory(Flickity2, utils2) {
        const lazyAttr = "data-flickity-lazyload";
        const lazySrcAttr = `${lazyAttr}-src`;
        const lazySrcsetAttr = `${lazyAttr}-srcset`;
        const imgSelector = `img[${lazyAttr}], img[${lazySrcAttr}], img[${lazySrcsetAttr}], source[${lazySrcsetAttr}]`;
        Flickity2.create.lazyLoad = function() {
          this.on("select", this.lazyLoad);
          this.handleLazyLoadComplete = this.onLazyLoadComplete.bind(this);
        };
        let proto = Flickity2.prototype;
        proto.lazyLoad = function() {
          let { lazyLoad } = this.options;
          if (!lazyLoad)
            return;
          let adjCount = typeof lazyLoad == "number" ? lazyLoad : 0;
          this.getAdjacentCellElements(adjCount).map(getCellLazyImages).flat().forEach((img) => new LazyLoader(img, this.handleLazyLoadComplete));
        };
        function getCellLazyImages(cellElem) {
          if (cellElem.matches("img")) {
            let cellAttr = cellElem.getAttribute(lazyAttr);
            let cellSrcAttr = cellElem.getAttribute(lazySrcAttr);
            let cellSrcsetAttr = cellElem.getAttribute(lazySrcsetAttr);
            if (cellAttr || cellSrcAttr || cellSrcsetAttr) {
              return cellElem;
            }
          }
          return [...cellElem.querySelectorAll(imgSelector)];
        }
        proto.onLazyLoadComplete = function(img, event) {
          let cell = this.getParentCell(img);
          let cellElem = cell && cell.element;
          this.cellSizeChange(cellElem);
          this.dispatchEvent("lazyLoad", event, cellElem);
        };
        function LazyLoader(img, onComplete) {
          this.img = img;
          this.onComplete = onComplete;
          this.load();
        }
        LazyLoader.prototype.handleEvent = utils2.handleEvent;
        LazyLoader.prototype.load = function() {
          this.img.addEventListener("load", this);
          this.img.addEventListener("error", this);
          let src = this.img.getAttribute(lazyAttr) || this.img.getAttribute(lazySrcAttr);
          let srcset = this.img.getAttribute(lazySrcsetAttr);
          this.img.src = src;
          if (srcset)
            this.img.setAttribute("srcset", srcset);
          this.img.removeAttribute(lazyAttr);
          this.img.removeAttribute(lazySrcAttr);
          this.img.removeAttribute(lazySrcsetAttr);
        };
        LazyLoader.prototype.onload = function(event) {
          this.complete(event, "flickity-lazyloaded");
        };
        LazyLoader.prototype.onerror = function(event) {
          this.complete(event, "flickity-lazyerror");
        };
        LazyLoader.prototype.complete = function(event, className) {
          this.img.removeEventListener("load", this);
          this.img.removeEventListener("error", this);
          let mediaElem = this.img.parentNode.matches("picture") ? this.img.parentNode : this.img;
          mediaElem.classList.add(className);
          this.onComplete(this.img, event);
        };
        Flickity2.LazyLoader = LazyLoader;
        return Flickity2;
      });
    }
  });

  // node_modules/imagesloaded/imagesloaded.js
  var require_imagesloaded = __commonJS({
    "node_modules/imagesloaded/imagesloaded.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(window2, require_ev_emitter());
        } else {
          window2.imagesLoaded = factory(window2, window2.EvEmitter);
        }
      })(typeof window !== "undefined" ? window : exports, function factory(window2, EvEmitter) {
        let $ = window2.jQuery;
        let console2 = window2.console;
        function makeArray(obj) {
          if (Array.isArray(obj))
            return obj;
          let isArrayLike = typeof obj == "object" && typeof obj.length == "number";
          if (isArrayLike)
            return [...obj];
          return [obj];
        }
        function ImagesLoaded(elem, options, onAlways) {
          if (!(this instanceof ImagesLoaded)) {
            return new ImagesLoaded(elem, options, onAlways);
          }
          let queryElem = elem;
          if (typeof elem == "string") {
            queryElem = document.querySelectorAll(elem);
          }
          if (!queryElem) {
            console2.error(`Bad element for imagesLoaded ${queryElem || elem}`);
            return;
          }
          this.elements = makeArray(queryElem);
          this.options = {};
          if (typeof options == "function") {
            onAlways = options;
          } else {
            Object.assign(this.options, options);
          }
          if (onAlways)
            this.on("always", onAlways);
          this.getImages();
          if ($)
            this.jqDeferred = new $.Deferred();
          setTimeout(this.check.bind(this));
        }
        ImagesLoaded.prototype = Object.create(EvEmitter.prototype);
        ImagesLoaded.prototype.getImages = function() {
          this.images = [];
          this.elements.forEach(this.addElementImages, this);
        };
        const elementNodeTypes = [1, 9, 11];
        ImagesLoaded.prototype.addElementImages = function(elem) {
          if (elem.nodeName === "IMG") {
            this.addImage(elem);
          }
          if (this.options.background === true) {
            this.addElementBackgroundImages(elem);
          }
          let { nodeType } = elem;
          if (!nodeType || !elementNodeTypes.includes(nodeType))
            return;
          let childImgs = elem.querySelectorAll("img");
          for (let img of childImgs) {
            this.addImage(img);
          }
          if (typeof this.options.background == "string") {
            let children = elem.querySelectorAll(this.options.background);
            for (let child of children) {
              this.addElementBackgroundImages(child);
            }
          }
        };
        const reURL = /url\((['"])?(.*?)\1\)/gi;
        ImagesLoaded.prototype.addElementBackgroundImages = function(elem) {
          let style = getComputedStyle(elem);
          if (!style)
            return;
          let matches = reURL.exec(style.backgroundImage);
          while (matches !== null) {
            let url = matches && matches[2];
            if (url) {
              this.addBackground(url, elem);
            }
            matches = reURL.exec(style.backgroundImage);
          }
        };
        ImagesLoaded.prototype.addImage = function(img) {
          let loadingImage = new LoadingImage(img);
          this.images.push(loadingImage);
        };
        ImagesLoaded.prototype.addBackground = function(url, elem) {
          let background = new Background(url, elem);
          this.images.push(background);
        };
        ImagesLoaded.prototype.check = function() {
          this.progressedCount = 0;
          this.hasAnyBroken = false;
          if (!this.images.length) {
            this.complete();
            return;
          }
          let onProgress = (image, elem, message) => {
            setTimeout(() => {
              this.progress(image, elem, message);
            });
          };
          this.images.forEach(function(loadingImage) {
            loadingImage.once("progress", onProgress);
            loadingImage.check();
          });
        };
        ImagesLoaded.prototype.progress = function(image, elem, message) {
          this.progressedCount++;
          this.hasAnyBroken = this.hasAnyBroken || !image.isLoaded;
          this.emitEvent("progress", [this, image, elem]);
          if (this.jqDeferred && this.jqDeferred.notify) {
            this.jqDeferred.notify(this, image);
          }
          if (this.progressedCount === this.images.length) {
            this.complete();
          }
          if (this.options.debug && console2) {
            console2.log(`progress: ${message}`, image, elem);
          }
        };
        ImagesLoaded.prototype.complete = function() {
          let eventName = this.hasAnyBroken ? "fail" : "done";
          this.isComplete = true;
          this.emitEvent(eventName, [this]);
          this.emitEvent("always", [this]);
          if (this.jqDeferred) {
            let jqMethod = this.hasAnyBroken ? "reject" : "resolve";
            this.jqDeferred[jqMethod](this);
          }
        };
        function LoadingImage(img) {
          this.img = img;
        }
        LoadingImage.prototype = Object.create(EvEmitter.prototype);
        LoadingImage.prototype.check = function() {
          let isComplete = this.getIsImageComplete();
          if (isComplete) {
            this.confirm(this.img.naturalWidth !== 0, "naturalWidth");
            return;
          }
          this.proxyImage = new Image();
          if (this.img.crossOrigin) {
            this.proxyImage.crossOrigin = this.img.crossOrigin;
          }
          this.proxyImage.addEventListener("load", this);
          this.proxyImage.addEventListener("error", this);
          this.img.addEventListener("load", this);
          this.img.addEventListener("error", this);
          this.proxyImage.src = this.img.currentSrc || this.img.src;
        };
        LoadingImage.prototype.getIsImageComplete = function() {
          return this.img.complete && this.img.naturalWidth;
        };
        LoadingImage.prototype.confirm = function(isLoaded, message) {
          this.isLoaded = isLoaded;
          let { parentNode } = this.img;
          let elem = parentNode.nodeName === "PICTURE" ? parentNode : this.img;
          this.emitEvent("progress", [this, elem, message]);
        };
        LoadingImage.prototype.handleEvent = function(event) {
          let method = "on" + event.type;
          if (this[method]) {
            this[method](event);
          }
        };
        LoadingImage.prototype.onload = function() {
          this.confirm(true, "onload");
          this.unbindEvents();
        };
        LoadingImage.prototype.onerror = function() {
          this.confirm(false, "onerror");
          this.unbindEvents();
        };
        LoadingImage.prototype.unbindEvents = function() {
          this.proxyImage.removeEventListener("load", this);
          this.proxyImage.removeEventListener("error", this);
          this.img.removeEventListener("load", this);
          this.img.removeEventListener("error", this);
        };
        function Background(url, element) {
          this.url = url;
          this.element = element;
          this.img = new Image();
        }
        Background.prototype = Object.create(LoadingImage.prototype);
        Background.prototype.check = function() {
          this.img.addEventListener("load", this);
          this.img.addEventListener("error", this);
          this.img.src = this.url;
          let isComplete = this.getIsImageComplete();
          if (isComplete) {
            this.confirm(this.img.naturalWidth !== 0, "naturalWidth");
            this.unbindEvents();
          }
        };
        Background.prototype.unbindEvents = function() {
          this.img.removeEventListener("load", this);
          this.img.removeEventListener("error", this);
        };
        Background.prototype.confirm = function(isLoaded, message) {
          this.isLoaded = isLoaded;
          this.emitEvent("progress", [this, this.element, message]);
        };
        ImagesLoaded.makeJQueryPlugin = function(jQuery) {
          jQuery = jQuery || window2.jQuery;
          if (!jQuery)
            return;
          $ = jQuery;
          $.fn.imagesLoaded = function(options, onAlways) {
            let instance = new ImagesLoaded(this, options, onAlways);
            return instance.jqDeferred.promise($(this));
          };
        };
        ImagesLoaded.makeJQueryPlugin();
        return ImagesLoaded;
      });
    }
  });

  // node_modules/flickity/js/imagesloaded.js
  var require_imagesloaded2 = __commonJS({
    "node_modules/flickity/js/imagesloaded.js"(exports, module) {
      (function(window2, factory) {
        if (typeof module == "object" && module.exports) {
          module.exports = factory(require_core(), require_imagesloaded());
        } else {
          factory(window2.Flickity, window2.imagesLoaded);
        }
      })(typeof window != "undefined" ? window : exports, function factory(Flickity2, imagesLoaded) {
        Flickity2.create.imagesLoaded = function() {
          this.on("activate", this.imagesLoaded);
        };
        Flickity2.prototype.imagesLoaded = function() {
          if (!this.options.imagesLoaded)
            return;
          let onImagesLoadedProgress = (instance, image) => {
            let cell = this.getParentCell(image.img);
            this.cellSizeChange(cell && cell.element);
            if (!this.options.freeScroll)
              this.positionSliderAtSelected();
          };
          imagesLoaded(this.slider).on("progress", onImagesLoadedProgress);
        };
        return Flickity2;
      });
    }
  });

  // node_modules/flickity/js/index.js
  var require_js = __commonJS({
    "node_modules/flickity/js/index.js"(exports, module) {
      if (typeof module == "object" && module.exports) {
        const Flickity2 = require_core();
        require_drag();
        require_prev_next_button();
        require_page_dots();
        require_player();
        require_add_remove_cell();
        require_lazyload();
        require_imagesloaded2();
        module.exports = Flickity2;
      }
    }
  });

  // node_modules/lazysizes/lazysizes.js
  var require_lazysizes = __commonJS({
    "node_modules/lazysizes/lazysizes.js"(exports, module) {
      (function(window2, factory) {
        var lazySizes = factory(window2, window2.document, Date);
        window2.lazySizes = lazySizes;
        if (typeof module == "object" && module.exports) {
          module.exports = lazySizes;
        }
      })(typeof window != "undefined" ? window : {}, function l(window2, document2, Date2) {
        "use strict";
        var lazysizes, lazySizesCfg;
        (function() {
          var prop;
          var lazySizesDefaults = {
            lazyClass: "lazyload",
            loadedClass: "lazyloaded",
            loadingClass: "lazyloading",
            preloadClass: "lazypreload",
            errorClass: "lazyerror",
            autosizesClass: "lazyautosizes",
            fastLoadedClass: "ls-is-cached",
            iframeLoadMode: 0,
            srcAttr: "data-src",
            srcsetAttr: "data-srcset",
            sizesAttr: "data-sizes",
            minSize: 40,
            customMedia: {},
            init: true,
            expFactor: 1.5,
            hFac: 0.8,
            loadMode: 2,
            loadHidden: true,
            ricTimeout: 0,
            throttleDelay: 125
          };
          lazySizesCfg = window2.lazySizesConfig || window2.lazysizesConfig || {};
          for (prop in lazySizesDefaults) {
            if (!(prop in lazySizesCfg)) {
              lazySizesCfg[prop] = lazySizesDefaults[prop];
            }
          }
        })();
        if (!document2 || !document2.getElementsByClassName) {
          return {
            init: function() {
            },
            cfg: lazySizesCfg,
            noSupport: true
          };
        }
        var docElem = document2.documentElement;
        var supportPicture = window2.HTMLPictureElement;
        var _addEventListener = "addEventListener";
        var _getAttribute = "getAttribute";
        var addEventListener = window2[_addEventListener].bind(window2);
        var setTimeout2 = window2.setTimeout;
        var requestAnimationFrame2 = window2.requestAnimationFrame || setTimeout2;
        var requestIdleCallback = window2.requestIdleCallback;
        var regPicture = /^picture$/i;
        var loadEvents = ["load", "error", "lazyincluded", "_lazyloaded"];
        var regClassCache = {};
        var forEach = Array.prototype.forEach;
        var hasClass = function(ele, cls) {
          if (!regClassCache[cls]) {
            regClassCache[cls] = new RegExp("(\\s|^)" + cls + "(\\s|$)");
          }
          return regClassCache[cls].test(ele[_getAttribute]("class") || "") && regClassCache[cls];
        };
        var addClass = function(ele, cls) {
          if (!hasClass(ele, cls)) {
            ele.setAttribute("class", (ele[_getAttribute]("class") || "").trim() + " " + cls);
          }
        };
        var removeClass = function(ele, cls) {
          var reg;
          if (reg = hasClass(ele, cls)) {
            ele.setAttribute("class", (ele[_getAttribute]("class") || "").replace(reg, " "));
          }
        };
        var addRemoveLoadEvents = function(dom, fn, add2) {
          var action = add2 ? _addEventListener : "removeEventListener";
          if (add2) {
            addRemoveLoadEvents(dom, fn);
          }
          loadEvents.forEach(function(evt) {
            dom[action](evt, fn);
          });
        };
        var triggerEvent = function(elem, name, detail, noBubbles, noCancelable) {
          var event = document2.createEvent("Event");
          if (!detail) {
            detail = {};
          }
          detail.instance = lazysizes;
          event.initEvent(name, !noBubbles, !noCancelable);
          event.detail = detail;
          elem.dispatchEvent(event);
          return event;
        };
        var updatePolyfill = function(el, full) {
          var polyfill;
          if (!supportPicture && (polyfill = window2.picturefill || lazySizesCfg.pf)) {
            if (full && full.src && !el[_getAttribute]("srcset")) {
              el.setAttribute("srcset", full.src);
            }
            polyfill({ reevaluate: true, elements: [el] });
          } else if (full && full.src) {
            el.src = full.src;
          }
        };
        var getCSS = function(elem, style) {
          return (getComputedStyle(elem, null) || {})[style];
        };
        var getWidth = function(elem, parent, width) {
          width = width || elem.offsetWidth;
          while (width < lazySizesCfg.minSize && parent && !elem._lazysizesWidth) {
            width = parent.offsetWidth;
            parent = parent.parentNode;
          }
          return width;
        };
        var rAF = function() {
          var running, waiting;
          var firstFns = [];
          var secondFns = [];
          var fns = firstFns;
          var run = function() {
            var runFns = fns;
            fns = firstFns.length ? secondFns : firstFns;
            running = true;
            waiting = false;
            while (runFns.length) {
              runFns.shift()();
            }
            running = false;
          };
          var rafBatch = function(fn, queue2) {
            if (running && !queue2) {
              fn.apply(this, arguments);
            } else {
              fns.push(fn);
              if (!waiting) {
                waiting = true;
                (document2.hidden ? setTimeout2 : requestAnimationFrame2)(run);
              }
            }
          };
          rafBatch._lsFlush = run;
          return rafBatch;
        }();
        var rAFIt = function(fn, simple) {
          return simple ? function() {
            rAF(fn);
          } : function() {
            var that = this;
            var args = arguments;
            rAF(function() {
              fn.apply(that, args);
            });
          };
        };
        var throttle2 = function(fn) {
          var running;
          var lastTime = 0;
          var gDelay = lazySizesCfg.throttleDelay;
          var rICTimeout = lazySizesCfg.ricTimeout;
          var run = function() {
            running = false;
            lastTime = Date2.now();
            fn();
          };
          var idleCallback = requestIdleCallback && rICTimeout > 49 ? function() {
            requestIdleCallback(run, { timeout: rICTimeout });
            if (rICTimeout !== lazySizesCfg.ricTimeout) {
              rICTimeout = lazySizesCfg.ricTimeout;
            }
          } : rAFIt(function() {
            setTimeout2(run);
          }, true);
          return function(isPriority) {
            var delay;
            if (isPriority = isPriority === true) {
              rICTimeout = 33;
            }
            if (running) {
              return;
            }
            running = true;
            delay = gDelay - (Date2.now() - lastTime);
            if (delay < 0) {
              delay = 0;
            }
            if (isPriority || delay < 9) {
              idleCallback();
            } else {
              setTimeout2(idleCallback, delay);
            }
          };
        };
        var debounce2 = function(func) {
          var timeout, timestamp;
          var wait = 99;
          var run = function() {
            timeout = null;
            func();
          };
          var later = function() {
            var last = Date2.now() - timestamp;
            if (last < wait) {
              setTimeout2(later, wait - last);
            } else {
              (requestIdleCallback || run)(run);
            }
          };
          return function() {
            timestamp = Date2.now();
            if (!timeout) {
              timeout = setTimeout2(later, wait);
            }
          };
        };
        var loader = function() {
          var preloadElems, isCompleted, resetPreloadingTimer, loadMode, started;
          var eLvW, elvH, eLtop, eLleft, eLright, eLbottom, isBodyHidden;
          var regImg = /^img$/i;
          var regIframe = /^iframe$/i;
          var supportScroll = "onscroll" in window2 && !/(gle|ing)bot/.test(navigator.userAgent);
          var shrinkExpand = 0;
          var currentExpand = 0;
          var isLoading = 0;
          var lowRuns = -1;
          var resetPreloading = function(e) {
            isLoading--;
            if (!e || isLoading < 0 || !e.target) {
              isLoading = 0;
            }
          };
          var isVisible = function(elem) {
            if (isBodyHidden == null) {
              isBodyHidden = getCSS(document2.body, "visibility") == "hidden";
            }
            return isBodyHidden || !(getCSS(elem.parentNode, "visibility") == "hidden" && getCSS(elem, "visibility") == "hidden");
          };
          var isNestedVisible = function(elem, elemExpand) {
            var outerRect;
            var parent = elem;
            var visible = isVisible(elem);
            eLtop -= elemExpand;
            eLbottom += elemExpand;
            eLleft -= elemExpand;
            eLright += elemExpand;
            while (visible && (parent = parent.offsetParent) && parent != document2.body && parent != docElem) {
              visible = (getCSS(parent, "opacity") || 1) > 0;
              if (visible && getCSS(parent, "overflow") != "visible") {
                outerRect = parent.getBoundingClientRect();
                visible = eLright > outerRect.left && eLleft < outerRect.right && eLbottom > outerRect.top - 1 && eLtop < outerRect.bottom + 1;
              }
            }
            return visible;
          };
          var checkElements = function() {
            var eLlen, i, rect, autoLoadElem, loadedSomething, elemExpand, elemNegativeExpand, elemExpandVal, beforeExpandVal, defaultExpand, preloadExpand, hFac;
            var lazyloadElems = lazysizes.elements;
            if ((loadMode = lazySizesCfg.loadMode) && isLoading < 8 && (eLlen = lazyloadElems.length)) {
              i = 0;
              lowRuns++;
              for (; i < eLlen; i++) {
                if (!lazyloadElems[i] || lazyloadElems[i]._lazyRace) {
                  continue;
                }
                if (!supportScroll || lazysizes.prematureUnveil && lazysizes.prematureUnveil(lazyloadElems[i])) {
                  unveilElement(lazyloadElems[i]);
                  continue;
                }
                if (!(elemExpandVal = lazyloadElems[i][_getAttribute]("data-expand")) || !(elemExpand = elemExpandVal * 1)) {
                  elemExpand = currentExpand;
                }
                if (!defaultExpand) {
                  defaultExpand = !lazySizesCfg.expand || lazySizesCfg.expand < 1 ? docElem.clientHeight > 500 && docElem.clientWidth > 500 ? 500 : 370 : lazySizesCfg.expand;
                  lazysizes._defEx = defaultExpand;
                  preloadExpand = defaultExpand * lazySizesCfg.expFactor;
                  hFac = lazySizesCfg.hFac;
                  isBodyHidden = null;
                  if (currentExpand < preloadExpand && isLoading < 1 && lowRuns > 2 && loadMode > 2 && !document2.hidden) {
                    currentExpand = preloadExpand;
                    lowRuns = 0;
                  } else if (loadMode > 1 && lowRuns > 1 && isLoading < 6) {
                    currentExpand = defaultExpand;
                  } else {
                    currentExpand = shrinkExpand;
                  }
                }
                if (beforeExpandVal !== elemExpand) {
                  eLvW = innerWidth + elemExpand * hFac;
                  elvH = innerHeight + elemExpand;
                  elemNegativeExpand = elemExpand * -1;
                  beforeExpandVal = elemExpand;
                }
                rect = lazyloadElems[i].getBoundingClientRect();
                if ((eLbottom = rect.bottom) >= elemNegativeExpand && (eLtop = rect.top) <= elvH && (eLright = rect.right) >= elemNegativeExpand * hFac && (eLleft = rect.left) <= eLvW && (eLbottom || eLright || eLleft || eLtop) && (lazySizesCfg.loadHidden || isVisible(lazyloadElems[i])) && (isCompleted && isLoading < 3 && !elemExpandVal && (loadMode < 3 || lowRuns < 4) || isNestedVisible(lazyloadElems[i], elemExpand))) {
                  unveilElement(lazyloadElems[i]);
                  loadedSomething = true;
                  if (isLoading > 9) {
                    break;
                  }
                } else if (!loadedSomething && isCompleted && !autoLoadElem && isLoading < 4 && lowRuns < 4 && loadMode > 2 && (preloadElems[0] || lazySizesCfg.preloadAfterLoad) && (preloadElems[0] || !elemExpandVal && (eLbottom || eLright || eLleft || eLtop || lazyloadElems[i][_getAttribute](lazySizesCfg.sizesAttr) != "auto"))) {
                  autoLoadElem = preloadElems[0] || lazyloadElems[i];
                }
              }
              if (autoLoadElem && !loadedSomething) {
                unveilElement(autoLoadElem);
              }
            }
          };
          var throttledCheckElements = throttle2(checkElements);
          var switchLoadingClass = function(e) {
            var elem = e.target;
            if (elem._lazyCache) {
              delete elem._lazyCache;
              return;
            }
            resetPreloading(e);
            addClass(elem, lazySizesCfg.loadedClass);
            removeClass(elem, lazySizesCfg.loadingClass);
            addRemoveLoadEvents(elem, rafSwitchLoadingClass);
            triggerEvent(elem, "lazyloaded");
          };
          var rafedSwitchLoadingClass = rAFIt(switchLoadingClass);
          var rafSwitchLoadingClass = function(e) {
            rafedSwitchLoadingClass({ target: e.target });
          };
          var changeIframeSrc = function(elem, src) {
            var loadMode2 = elem.getAttribute("data-load-mode") || lazySizesCfg.iframeLoadMode;
            if (loadMode2 == 0) {
              elem.contentWindow.location.replace(src);
            } else if (loadMode2 == 1) {
              elem.src = src;
            }
          };
          var handleSources = function(source) {
            var customMedia;
            var sourceSrcset = source[_getAttribute](lazySizesCfg.srcsetAttr);
            if (customMedia = lazySizesCfg.customMedia[source[_getAttribute]("data-media") || source[_getAttribute]("media")]) {
              source.setAttribute("media", customMedia);
            }
            if (sourceSrcset) {
              source.setAttribute("srcset", sourceSrcset);
            }
          };
          var lazyUnveil = rAFIt(function(elem, detail, isAuto, sizes, isImg) {
            var src, srcset, parent, isPicture, event, firesLoad;
            if (!(event = triggerEvent(elem, "lazybeforeunveil", detail)).defaultPrevented) {
              if (sizes) {
                if (isAuto) {
                  addClass(elem, lazySizesCfg.autosizesClass);
                } else {
                  elem.setAttribute("sizes", sizes);
                }
              }
              srcset = elem[_getAttribute](lazySizesCfg.srcsetAttr);
              src = elem[_getAttribute](lazySizesCfg.srcAttr);
              if (isImg) {
                parent = elem.parentNode;
                isPicture = parent && regPicture.test(parent.nodeName || "");
              }
              firesLoad = detail.firesLoad || "src" in elem && (srcset || src || isPicture);
              event = { target: elem };
              addClass(elem, lazySizesCfg.loadingClass);
              if (firesLoad) {
                clearTimeout(resetPreloadingTimer);
                resetPreloadingTimer = setTimeout2(resetPreloading, 2500);
                addRemoveLoadEvents(elem, rafSwitchLoadingClass, true);
              }
              if (isPicture) {
                forEach.call(parent.getElementsByTagName("source"), handleSources);
              }
              if (srcset) {
                elem.setAttribute("srcset", srcset);
              } else if (src && !isPicture) {
                if (regIframe.test(elem.nodeName)) {
                  changeIframeSrc(elem, src);
                } else {
                  elem.src = src;
                }
              }
              if (isImg && (srcset || isPicture)) {
                updatePolyfill(elem, { src });
              }
            }
            if (elem._lazyRace) {
              delete elem._lazyRace;
            }
            removeClass(elem, lazySizesCfg.lazyClass);
            rAF(function() {
              var isLoaded = elem.complete && elem.naturalWidth > 1;
              if (!firesLoad || isLoaded) {
                if (isLoaded) {
                  addClass(elem, lazySizesCfg.fastLoadedClass);
                }
                switchLoadingClass(event);
                elem._lazyCache = true;
                setTimeout2(function() {
                  if ("_lazyCache" in elem) {
                    delete elem._lazyCache;
                  }
                }, 9);
              }
              if (elem.loading == "lazy") {
                isLoading--;
              }
            }, true);
          });
          var unveilElement = function(elem) {
            if (elem._lazyRace) {
              return;
            }
            var detail;
            var isImg = regImg.test(elem.nodeName);
            var sizes = isImg && (elem[_getAttribute](lazySizesCfg.sizesAttr) || elem[_getAttribute]("sizes"));
            var isAuto = sizes == "auto";
            if ((isAuto || !isCompleted) && isImg && (elem[_getAttribute]("src") || elem.srcset) && !elem.complete && !hasClass(elem, lazySizesCfg.errorClass) && hasClass(elem, lazySizesCfg.lazyClass)) {
              return;
            }
            detail = triggerEvent(elem, "lazyunveilread").detail;
            if (isAuto) {
              autoSizer.updateElem(elem, true, elem.offsetWidth);
            }
            elem._lazyRace = true;
            isLoading++;
            lazyUnveil(elem, detail, isAuto, sizes, isImg);
          };
          var afterScroll = debounce2(function() {
            lazySizesCfg.loadMode = 3;
            throttledCheckElements();
          });
          var altLoadmodeScrollListner = function() {
            if (lazySizesCfg.loadMode == 3) {
              lazySizesCfg.loadMode = 2;
            }
            afterScroll();
          };
          var onload = function() {
            if (isCompleted) {
              return;
            }
            if (Date2.now() - started < 999) {
              setTimeout2(onload, 999);
              return;
            }
            isCompleted = true;
            lazySizesCfg.loadMode = 3;
            throttledCheckElements();
            addEventListener("scroll", altLoadmodeScrollListner, true);
          };
          return {
            _: function() {
              started = Date2.now();
              lazysizes.elements = document2.getElementsByClassName(lazySizesCfg.lazyClass);
              preloadElems = document2.getElementsByClassName(lazySizesCfg.lazyClass + " " + lazySizesCfg.preloadClass);
              addEventListener("scroll", throttledCheckElements, true);
              addEventListener("resize", throttledCheckElements, true);
              addEventListener("pageshow", function(e) {
                if (e.persisted) {
                  var loadingElements = document2.querySelectorAll("." + lazySizesCfg.loadingClass);
                  if (loadingElements.length && loadingElements.forEach) {
                    requestAnimationFrame2(function() {
                      loadingElements.forEach(function(img) {
                        if (img.complete) {
                          unveilElement(img);
                        }
                      });
                    });
                  }
                }
              });
              if (window2.MutationObserver) {
                new MutationObserver(throttledCheckElements).observe(docElem, { childList: true, subtree: true, attributes: true });
              } else {
                docElem[_addEventListener]("DOMNodeInserted", throttledCheckElements, true);
                docElem[_addEventListener]("DOMAttrModified", throttledCheckElements, true);
                setInterval(throttledCheckElements, 999);
              }
              addEventListener("hashchange", throttledCheckElements, true);
              ["focus", "mouseover", "click", "load", "transitionend", "animationend"].forEach(function(name) {
                document2[_addEventListener](name, throttledCheckElements, true);
              });
              if (/d$|^c/.test(document2.readyState)) {
                onload();
              } else {
                addEventListener("load", onload);
                document2[_addEventListener]("DOMContentLoaded", throttledCheckElements);
                setTimeout2(onload, 2e4);
              }
              if (lazysizes.elements.length) {
                checkElements();
                rAF._lsFlush();
              } else {
                throttledCheckElements();
              }
            },
            checkElems: throttledCheckElements,
            unveil: unveilElement,
            _aLSL: altLoadmodeScrollListner
          };
        }();
        var autoSizer = function() {
          var autosizesElems;
          var sizeElement = rAFIt(function(elem, parent, event, width) {
            var sources, i, len;
            elem._lazysizesWidth = width;
            width += "px";
            elem.setAttribute("sizes", width);
            if (regPicture.test(parent.nodeName || "")) {
              sources = parent.getElementsByTagName("source");
              for (i = 0, len = sources.length; i < len; i++) {
                sources[i].setAttribute("sizes", width);
              }
            }
            if (!event.detail.dataAttr) {
              updatePolyfill(elem, event.detail);
            }
          });
          var getSizeElement = function(elem, dataAttr, width) {
            var event;
            var parent = elem.parentNode;
            if (parent) {
              width = getWidth(elem, parent, width);
              event = triggerEvent(elem, "lazybeforesizes", { width, dataAttr: !!dataAttr });
              if (!event.defaultPrevented) {
                width = event.detail.width;
                if (width && width !== elem._lazysizesWidth) {
                  sizeElement(elem, parent, event, width);
                }
              }
            }
          };
          var updateElementsSizes = function() {
            var i;
            var len = autosizesElems.length;
            if (len) {
              i = 0;
              for (; i < len; i++) {
                getSizeElement(autosizesElems[i]);
              }
            }
          };
          var debouncedUpdateElementsSizes = debounce2(updateElementsSizes);
          return {
            _: function() {
              autosizesElems = document2.getElementsByClassName(lazySizesCfg.autosizesClass);
              addEventListener("resize", debouncedUpdateElementsSizes);
            },
            checkElems: debouncedUpdateElementsSizes,
            updateElem: getSizeElement
          };
        }();
        var init2 = function() {
          if (!init2.i && document2.getElementsByClassName) {
            init2.i = true;
            autoSizer._();
            loader._();
          }
        };
        setTimeout2(function() {
          if (lazySizesCfg.init) {
            init2();
          }
        });
        lazysizes = {
          cfg: lazySizesCfg,
          autoSizer,
          loader,
          init: init2,
          uP: updatePolyfill,
          aC: addClass,
          rC: removeClass,
          hC: hasClass,
          fire: triggerEvent,
          gW: getWidth,
          rAF
        };
        return lazysizes;
      });
    }
  });

  // node_modules/js-cookie/dist/js.cookie.mjs
  function assign(target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];
      for (var key in source) {
        target[key] = source[key];
      }
    }
    return target;
  }
  var defaultConverter = {
    read: function(value) {
      if (value[0] === '"') {
        value = value.slice(1, -1);
      }
      return value.replace(/(%[\dA-F]{2})+/gi, decodeURIComponent);
    },
    write: function(value) {
      return encodeURIComponent(value).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g, decodeURIComponent);
    }
  };
  function init(converter, defaultAttributes) {
    function set3(key, value, attributes) {
      if (typeof document === "undefined") {
        return;
      }
      attributes = assign({}, defaultAttributes, attributes);
      if (typeof attributes.expires === "number") {
        attributes.expires = new Date(Date.now() + attributes.expires * 864e5);
      }
      if (attributes.expires) {
        attributes.expires = attributes.expires.toUTCString();
      }
      key = encodeURIComponent(key).replace(/%(2[346B]|5E|60|7C)/g, decodeURIComponent).replace(/[()]/g, escape);
      var stringifiedAttributes = "";
      for (var attributeName in attributes) {
        if (!attributes[attributeName]) {
          continue;
        }
        stringifiedAttributes += "; " + attributeName;
        if (attributes[attributeName] === true) {
          continue;
        }
        stringifiedAttributes += "=" + attributes[attributeName].split(";")[0];
      }
      return document.cookie = key + "=" + converter.write(value, key) + stringifiedAttributes;
    }
    function get3(key) {
      if (typeof document === "undefined" || arguments.length && !key) {
        return;
      }
      var cookies = document.cookie ? document.cookie.split("; ") : [];
      var jar = {};
      for (var i = 0; i < cookies.length; i++) {
        var parts = cookies[i].split("=");
        var value = parts.slice(1).join("=");
        try {
          var foundKey = decodeURIComponent(parts[0]);
          jar[foundKey] = converter.read(value, foundKey);
          if (key === foundKey) {
            break;
          }
        } catch (e) {
        }
      }
      return key ? jar[key] : jar;
    }
    return Object.create({
      set: set3,
      get: get3,
      remove: function(key, attributes) {
        set3(key, "", assign({}, attributes, {
          expires: -1
        }));
      },
      withAttributes: function(attributes) {
        return init(this.converter, assign({}, this.attributes, attributes));
      },
      withConverter: function(converter2) {
        return init(assign({}, this.converter, converter2), this.attributes);
      }
    }, {
      attributes: { value: Object.freeze(defaultAttributes) },
      converter: { value: Object.freeze(converter) }
    });
  }
  var api = init(defaultConverter, { path: "/" });
  var js_cookie_default = api;

  // src/_bundle/main.js
  var import_flickity = __toModule(require_js());

  // node_modules/alpinejs/dist/module.esm.js
  var flushPending = false;
  var flushing = false;
  var queue = [];
  function scheduler(callback) {
    queueJob(callback);
  }
  function queueJob(job) {
    if (!queue.includes(job))
      queue.push(job);
    queueFlush();
  }
  function dequeueJob(job) {
    let index = queue.indexOf(job);
    if (index !== -1)
      queue.splice(index, 1);
  }
  function queueFlush() {
    if (!flushing && !flushPending) {
      flushPending = true;
      queueMicrotask(flushJobs);
    }
  }
  function flushJobs() {
    flushPending = false;
    flushing = true;
    for (let i = 0; i < queue.length; i++) {
      queue[i]();
    }
    queue.length = 0;
    flushing = false;
  }
  var reactive;
  var effect;
  var release;
  var raw;
  var shouldSchedule = true;
  function disableEffectScheduling(callback) {
    shouldSchedule = false;
    callback();
    shouldSchedule = true;
  }
  function setReactivityEngine(engine) {
    reactive = engine.reactive;
    release = engine.release;
    effect = (callback) => engine.effect(callback, { scheduler: (task) => {
      if (shouldSchedule) {
        scheduler(task);
      } else {
        task();
      }
    } });
    raw = engine.raw;
  }
  function overrideEffect(override) {
    effect = override;
  }
  function elementBoundEffect(el) {
    let cleanup2 = () => {
    };
    let wrappedEffect = (callback) => {
      let effectReference = effect(callback);
      if (!el._x_effects) {
        el._x_effects = new Set();
        el._x_runEffects = () => {
          el._x_effects.forEach((i) => i());
        };
      }
      el._x_effects.add(effectReference);
      cleanup2 = () => {
        if (effectReference === void 0)
          return;
        el._x_effects.delete(effectReference);
        release(effectReference);
      };
      return effectReference;
    };
    return [wrappedEffect, () => {
      cleanup2();
    }];
  }
  var onAttributeAddeds = [];
  var onElRemoveds = [];
  var onElAddeds = [];
  function onElAdded(callback) {
    onElAddeds.push(callback);
  }
  function onElRemoved(el, callback) {
    if (typeof callback === "function") {
      if (!el._x_cleanups)
        el._x_cleanups = [];
      el._x_cleanups.push(callback);
    } else {
      callback = el;
      onElRemoveds.push(callback);
    }
  }
  function onAttributesAdded(callback) {
    onAttributeAddeds.push(callback);
  }
  function onAttributeRemoved(el, name, callback) {
    if (!el._x_attributeCleanups)
      el._x_attributeCleanups = {};
    if (!el._x_attributeCleanups[name])
      el._x_attributeCleanups[name] = [];
    el._x_attributeCleanups[name].push(callback);
  }
  function cleanupAttributes(el, names) {
    if (!el._x_attributeCleanups)
      return;
    Object.entries(el._x_attributeCleanups).forEach(([name, value]) => {
      if (names === void 0 || names.includes(name)) {
        value.forEach((i) => i());
        delete el._x_attributeCleanups[name];
      }
    });
  }
  var observer = new MutationObserver(onMutate);
  var currentlyObserving = false;
  function startObservingMutations() {
    observer.observe(document, { subtree: true, childList: true, attributes: true, attributeOldValue: true });
    currentlyObserving = true;
  }
  function stopObservingMutations() {
    flushObserver();
    observer.disconnect();
    currentlyObserving = false;
  }
  var recordQueue = [];
  var willProcessRecordQueue = false;
  function flushObserver() {
    recordQueue = recordQueue.concat(observer.takeRecords());
    if (recordQueue.length && !willProcessRecordQueue) {
      willProcessRecordQueue = true;
      queueMicrotask(() => {
        processRecordQueue();
        willProcessRecordQueue = false;
      });
    }
  }
  function processRecordQueue() {
    onMutate(recordQueue);
    recordQueue.length = 0;
  }
  function mutateDom(callback) {
    if (!currentlyObserving)
      return callback();
    stopObservingMutations();
    let result = callback();
    startObservingMutations();
    return result;
  }
  var isCollecting = false;
  var deferredMutations = [];
  function deferMutations() {
    isCollecting = true;
  }
  function flushAndStopDeferringMutations() {
    isCollecting = false;
    onMutate(deferredMutations);
    deferredMutations = [];
  }
  function onMutate(mutations) {
    if (isCollecting) {
      deferredMutations = deferredMutations.concat(mutations);
      return;
    }
    let addedNodes = [];
    let removedNodes = [];
    let addedAttributes = new Map();
    let removedAttributes = new Map();
    for (let i = 0; i < mutations.length; i++) {
      if (mutations[i].target._x_ignoreMutationObserver)
        continue;
      if (mutations[i].type === "childList") {
        mutations[i].addedNodes.forEach((node) => node.nodeType === 1 && addedNodes.push(node));
        mutations[i].removedNodes.forEach((node) => node.nodeType === 1 && removedNodes.push(node));
      }
      if (mutations[i].type === "attributes") {
        let el = mutations[i].target;
        let name = mutations[i].attributeName;
        let oldValue = mutations[i].oldValue;
        let add2 = () => {
          if (!addedAttributes.has(el))
            addedAttributes.set(el, []);
          addedAttributes.get(el).push({ name, value: el.getAttribute(name) });
        };
        let remove = () => {
          if (!removedAttributes.has(el))
            removedAttributes.set(el, []);
          removedAttributes.get(el).push(name);
        };
        if (el.hasAttribute(name) && oldValue === null) {
          add2();
        } else if (el.hasAttribute(name)) {
          remove();
          add2();
        } else {
          remove();
        }
      }
    }
    removedAttributes.forEach((attrs, el) => {
      cleanupAttributes(el, attrs);
    });
    addedAttributes.forEach((attrs, el) => {
      onAttributeAddeds.forEach((i) => i(el, attrs));
    });
    for (let node of removedNodes) {
      if (addedNodes.includes(node))
        continue;
      onElRemoveds.forEach((i) => i(node));
      if (node._x_cleanups) {
        while (node._x_cleanups.length)
          node._x_cleanups.pop()();
      }
    }
    addedNodes.forEach((node) => {
      node._x_ignoreSelf = true;
      node._x_ignore = true;
    });
    for (let node of addedNodes) {
      if (removedNodes.includes(node))
        continue;
      if (!node.isConnected)
        continue;
      delete node._x_ignoreSelf;
      delete node._x_ignore;
      onElAddeds.forEach((i) => i(node));
      node._x_ignore = true;
      node._x_ignoreSelf = true;
    }
    addedNodes.forEach((node) => {
      delete node._x_ignoreSelf;
      delete node._x_ignore;
    });
    addedNodes = null;
    removedNodes = null;
    addedAttributes = null;
    removedAttributes = null;
  }
  function scope(node) {
    return mergeProxies(closestDataStack(node));
  }
  function addScopeToNode(node, data2, referenceNode) {
    node._x_dataStack = [data2, ...closestDataStack(referenceNode || node)];
    return () => {
      node._x_dataStack = node._x_dataStack.filter((i) => i !== data2);
    };
  }
  function refreshScope(element, scope2) {
    let existingScope = element._x_dataStack[0];
    Object.entries(scope2).forEach(([key, value]) => {
      existingScope[key] = value;
    });
  }
  function closestDataStack(node) {
    if (node._x_dataStack)
      return node._x_dataStack;
    if (typeof ShadowRoot === "function" && node instanceof ShadowRoot) {
      return closestDataStack(node.host);
    }
    if (!node.parentNode) {
      return [];
    }
    return closestDataStack(node.parentNode);
  }
  function mergeProxies(objects) {
    let thisProxy = new Proxy({}, {
      ownKeys: () => {
        return Array.from(new Set(objects.flatMap((i) => Object.keys(i))));
      },
      has: (target, name) => {
        return objects.some((obj) => obj.hasOwnProperty(name));
      },
      get: (target, name) => {
        return (objects.find((obj) => {
          if (obj.hasOwnProperty(name)) {
            let descriptor = Object.getOwnPropertyDescriptor(obj, name);
            if (descriptor.get && descriptor.get._x_alreadyBound || descriptor.set && descriptor.set._x_alreadyBound) {
              return true;
            }
            if ((descriptor.get || descriptor.set) && descriptor.enumerable) {
              let getter = descriptor.get;
              let setter = descriptor.set;
              let property = descriptor;
              getter = getter && getter.bind(thisProxy);
              setter = setter && setter.bind(thisProxy);
              if (getter)
                getter._x_alreadyBound = true;
              if (setter)
                setter._x_alreadyBound = true;
              Object.defineProperty(obj, name, {
                ...property,
                get: getter,
                set: setter
              });
            }
            return true;
          }
          return false;
        }) || {})[name];
      },
      set: (target, name, value) => {
        let closestObjectWithKey = objects.find((obj) => obj.hasOwnProperty(name));
        if (closestObjectWithKey) {
          closestObjectWithKey[name] = value;
        } else {
          objects[objects.length - 1][name] = value;
        }
        return true;
      }
    });
    return thisProxy;
  }
  function initInterceptors(data2) {
    let isObject2 = (val) => typeof val === "object" && !Array.isArray(val) && val !== null;
    let recurse = (obj, basePath = "") => {
      Object.entries(Object.getOwnPropertyDescriptors(obj)).forEach(([key, { value, enumerable }]) => {
        if (enumerable === false || value === void 0)
          return;
        let path = basePath === "" ? key : `${basePath}.${key}`;
        if (typeof value === "object" && value !== null && value._x_interceptor) {
          obj[key] = value.initialize(data2, path, key);
        } else {
          if (isObject2(value) && value !== obj && !(value instanceof Element)) {
            recurse(value, path);
          }
        }
      });
    };
    return recurse(data2);
  }
  function interceptor(callback, mutateObj = () => {
  }) {
    let obj = {
      initialValue: void 0,
      _x_interceptor: true,
      initialize(data2, path, key) {
        return callback(this.initialValue, () => get(data2, path), (value) => set(data2, path, value), path, key);
      }
    };
    mutateObj(obj);
    return (initialValue) => {
      if (typeof initialValue === "object" && initialValue !== null && initialValue._x_interceptor) {
        let initialize = obj.initialize.bind(obj);
        obj.initialize = (data2, path, key) => {
          let innerValue = initialValue.initialize(data2, path, key);
          obj.initialValue = innerValue;
          return initialize(data2, path, key);
        };
      } else {
        obj.initialValue = initialValue;
      }
      return obj;
    };
  }
  function get(obj, path) {
    return path.split(".").reduce((carry, segment) => carry[segment], obj);
  }
  function set(obj, path, value) {
    if (typeof path === "string")
      path = path.split(".");
    if (path.length === 1)
      obj[path[0]] = value;
    else if (path.length === 0)
      throw error;
    else {
      if (obj[path[0]])
        return set(obj[path[0]], path.slice(1), value);
      else {
        obj[path[0]] = {};
        return set(obj[path[0]], path.slice(1), value);
      }
    }
  }
  var magics = {};
  function magic(name, callback) {
    magics[name] = callback;
  }
  function injectMagics(obj, el) {
    Object.entries(magics).forEach(([name, callback]) => {
      Object.defineProperty(obj, `$${name}`, {
        get() {
          let [utilities, cleanup2] = getElementBoundUtilities(el);
          utilities = { interceptor, ...utilities };
          onElRemoved(el, cleanup2);
          return callback(el, utilities);
        },
        enumerable: false
      });
    });
    return obj;
  }
  function tryCatch(el, expression, callback, ...args) {
    try {
      return callback(...args);
    } catch (e) {
      handleError(e, el, expression);
    }
  }
  function handleError(error2, el, expression = void 0) {
    Object.assign(error2, { el, expression });
    console.warn(`Alpine Expression Error: ${error2.message}

${expression ? 'Expression: "' + expression + '"\n\n' : ""}`, el);
    setTimeout(() => {
      throw error2;
    }, 0);
  }
  var shouldAutoEvaluateFunctions = true;
  function dontAutoEvaluateFunctions(callback) {
    let cache = shouldAutoEvaluateFunctions;
    shouldAutoEvaluateFunctions = false;
    callback();
    shouldAutoEvaluateFunctions = cache;
  }
  function evaluate(el, expression, extras = {}) {
    let result;
    evaluateLater(el, expression)((value) => result = value, extras);
    return result;
  }
  function evaluateLater(...args) {
    return theEvaluatorFunction(...args);
  }
  var theEvaluatorFunction = normalEvaluator;
  function setEvaluator(newEvaluator) {
    theEvaluatorFunction = newEvaluator;
  }
  function normalEvaluator(el, expression) {
    let overriddenMagics = {};
    injectMagics(overriddenMagics, el);
    let dataStack = [overriddenMagics, ...closestDataStack(el)];
    if (typeof expression === "function") {
      return generateEvaluatorFromFunction(dataStack, expression);
    }
    let evaluator = generateEvaluatorFromString(dataStack, expression, el);
    return tryCatch.bind(null, el, expression, evaluator);
  }
  function generateEvaluatorFromFunction(dataStack, func) {
    return (receiver = () => {
    }, { scope: scope2 = {}, params = [] } = {}) => {
      let result = func.apply(mergeProxies([scope2, ...dataStack]), params);
      runIfTypeOfFunction(receiver, result);
    };
  }
  var evaluatorMemo = {};
  function generateFunctionFromString(expression, el) {
    if (evaluatorMemo[expression]) {
      return evaluatorMemo[expression];
    }
    let AsyncFunction = Object.getPrototypeOf(async function() {
    }).constructor;
    let rightSideSafeExpression = /^[\n\s]*if.*\(.*\)/.test(expression) || /^(let|const)\s/.test(expression) ? `(() => { ${expression} })()` : expression;
    const safeAsyncFunction = () => {
      try {
        return new AsyncFunction(["__self", "scope"], `with (scope) { __self.result = ${rightSideSafeExpression} }; __self.finished = true; return __self.result;`);
      } catch (error2) {
        handleError(error2, el, expression);
        return Promise.resolve();
      }
    };
    let func = safeAsyncFunction();
    evaluatorMemo[expression] = func;
    return func;
  }
  function generateEvaluatorFromString(dataStack, expression, el) {
    let func = generateFunctionFromString(expression, el);
    return (receiver = () => {
    }, { scope: scope2 = {}, params = [] } = {}) => {
      func.result = void 0;
      func.finished = false;
      let completeScope = mergeProxies([scope2, ...dataStack]);
      if (typeof func === "function") {
        let promise = func(func, completeScope).catch((error2) => handleError(error2, el, expression));
        if (func.finished) {
          runIfTypeOfFunction(receiver, func.result, completeScope, params, el);
          func.result = void 0;
        } else {
          promise.then((result) => {
            runIfTypeOfFunction(receiver, result, completeScope, params, el);
          }).catch((error2) => handleError(error2, el, expression)).finally(() => func.result = void 0);
        }
      }
    };
  }
  function runIfTypeOfFunction(receiver, value, scope2, params, el) {
    if (shouldAutoEvaluateFunctions && typeof value === "function") {
      let result = value.apply(scope2, params);
      if (result instanceof Promise) {
        result.then((i) => runIfTypeOfFunction(receiver, i, scope2, params)).catch((error2) => handleError(error2, el, value));
      } else {
        receiver(result);
      }
    } else {
      receiver(value);
    }
  }
  var prefixAsString = "x-";
  function prefix(subject = "") {
    return prefixAsString + subject;
  }
  function setPrefix(newPrefix) {
    prefixAsString = newPrefix;
  }
  var directiveHandlers = {};
  function directive(name, callback) {
    directiveHandlers[name] = callback;
  }
  function directives(el, attributes, originalAttributeOverride) {
    let transformedAttributeMap = {};
    let directives2 = Array.from(attributes).map(toTransformedAttributes((newName, oldName) => transformedAttributeMap[newName] = oldName)).filter(outNonAlpineAttributes).map(toParsedDirectives(transformedAttributeMap, originalAttributeOverride)).sort(byPriority);
    return directives2.map((directive2) => {
      return getDirectiveHandler(el, directive2);
    });
  }
  function attributesOnly(attributes) {
    return Array.from(attributes).map(toTransformedAttributes()).filter((attr) => !outNonAlpineAttributes(attr));
  }
  var isDeferringHandlers = false;
  var directiveHandlerStacks = new Map();
  var currentHandlerStackKey = Symbol();
  function deferHandlingDirectives(callback) {
    isDeferringHandlers = true;
    let key = Symbol();
    currentHandlerStackKey = key;
    directiveHandlerStacks.set(key, []);
    let flushHandlers = () => {
      while (directiveHandlerStacks.get(key).length)
        directiveHandlerStacks.get(key).shift()();
      directiveHandlerStacks.delete(key);
    };
    let stopDeferring = () => {
      isDeferringHandlers = false;
      flushHandlers();
    };
    callback(flushHandlers);
    stopDeferring();
  }
  function getElementBoundUtilities(el) {
    let cleanups = [];
    let cleanup2 = (callback) => cleanups.push(callback);
    let [effect3, cleanupEffect] = elementBoundEffect(el);
    cleanups.push(cleanupEffect);
    let utilities = {
      Alpine: alpine_default,
      effect: effect3,
      cleanup: cleanup2,
      evaluateLater: evaluateLater.bind(evaluateLater, el),
      evaluate: evaluate.bind(evaluate, el)
    };
    let doCleanup = () => cleanups.forEach((i) => i());
    return [utilities, doCleanup];
  }
  function getDirectiveHandler(el, directive2) {
    let noop = () => {
    };
    let handler3 = directiveHandlers[directive2.type] || noop;
    let [utilities, cleanup2] = getElementBoundUtilities(el);
    onAttributeRemoved(el, directive2.original, cleanup2);
    let fullHandler = () => {
      if (el._x_ignore || el._x_ignoreSelf)
        return;
      handler3.inline && handler3.inline(el, directive2, utilities);
      handler3 = handler3.bind(handler3, el, directive2, utilities);
      isDeferringHandlers ? directiveHandlerStacks.get(currentHandlerStackKey).push(handler3) : handler3();
    };
    fullHandler.runCleanups = cleanup2;
    return fullHandler;
  }
  var startingWith = (subject, replacement) => ({ name, value }) => {
    if (name.startsWith(subject))
      name = name.replace(subject, replacement);
    return { name, value };
  };
  var into = (i) => i;
  function toTransformedAttributes(callback = () => {
  }) {
    return ({ name, value }) => {
      let { name: newName, value: newValue } = attributeTransformers.reduce((carry, transform) => {
        return transform(carry);
      }, { name, value });
      if (newName !== name)
        callback(newName, name);
      return { name: newName, value: newValue };
    };
  }
  var attributeTransformers = [];
  function mapAttributes(callback) {
    attributeTransformers.push(callback);
  }
  function outNonAlpineAttributes({ name }) {
    return alpineAttributeRegex().test(name);
  }
  var alpineAttributeRegex = () => new RegExp(`^${prefixAsString}([^:^.]+)\\b`);
  function toParsedDirectives(transformedAttributeMap, originalAttributeOverride) {
    return ({ name, value }) => {
      let typeMatch = name.match(alpineAttributeRegex());
      let valueMatch = name.match(/:([a-zA-Z0-9\-:]+)/);
      let modifiers = name.match(/\.[^.\]]+(?=[^\]]*$)/g) || [];
      let original = originalAttributeOverride || transformedAttributeMap[name] || name;
      return {
        type: typeMatch ? typeMatch[1] : null,
        value: valueMatch ? valueMatch[1] : null,
        modifiers: modifiers.map((i) => i.replace(".", "")),
        expression: value,
        original
      };
    };
  }
  var DEFAULT = "DEFAULT";
  var directiveOrder = [
    "ignore",
    "ref",
    "data",
    "id",
    "bind",
    "init",
    "for",
    "mask",
    "model",
    "modelable",
    "transition",
    "show",
    "if",
    DEFAULT,
    "teleport",
    "element"
  ];
  function byPriority(a, b) {
    let typeA = directiveOrder.indexOf(a.type) === -1 ? DEFAULT : a.type;
    let typeB = directiveOrder.indexOf(b.type) === -1 ? DEFAULT : b.type;
    return directiveOrder.indexOf(typeA) - directiveOrder.indexOf(typeB);
  }
  function dispatch(el, name, detail = {}) {
    el.dispatchEvent(new CustomEvent(name, {
      detail,
      bubbles: true,
      composed: true,
      cancelable: true
    }));
  }
  var tickStack = [];
  var isHolding = false;
  function nextTick(callback = () => {
  }) {
    queueMicrotask(() => {
      isHolding || setTimeout(() => {
        releaseNextTicks();
      });
    });
    return new Promise((res) => {
      tickStack.push(() => {
        callback();
        res();
      });
    });
  }
  function releaseNextTicks() {
    isHolding = false;
    while (tickStack.length)
      tickStack.shift()();
  }
  function holdNextTicks() {
    isHolding = true;
  }
  function walk(el, callback) {
    if (typeof ShadowRoot === "function" && el instanceof ShadowRoot) {
      Array.from(el.children).forEach((el2) => walk(el2, callback));
      return;
    }
    let skip = false;
    callback(el, () => skip = true);
    if (skip)
      return;
    let node = el.firstElementChild;
    while (node) {
      walk(node, callback, false);
      node = node.nextElementSibling;
    }
  }
  function warn(message, ...args) {
    console.warn(`Alpine Warning: ${message}`, ...args);
  }
  function start() {
    if (!document.body)
      warn("Unable to initialize. Trying to load Alpine before `<body>` is available. Did you forget to add `defer` in Alpine's `<script>` tag?");
    dispatch(document, "alpine:init");
    dispatch(document, "alpine:initializing");
    startObservingMutations();
    onElAdded((el) => initTree(el, walk));
    onElRemoved((el) => destroyTree(el));
    onAttributesAdded((el, attrs) => {
      directives(el, attrs).forEach((handle) => handle());
    });
    let outNestedComponents = (el) => !closestRoot(el.parentElement, true);
    Array.from(document.querySelectorAll(allSelectors())).filter(outNestedComponents).forEach((el) => {
      initTree(el);
    });
    dispatch(document, "alpine:initialized");
  }
  var rootSelectorCallbacks = [];
  var initSelectorCallbacks = [];
  function rootSelectors() {
    return rootSelectorCallbacks.map((fn) => fn());
  }
  function allSelectors() {
    return rootSelectorCallbacks.concat(initSelectorCallbacks).map((fn) => fn());
  }
  function addRootSelector(selectorCallback) {
    rootSelectorCallbacks.push(selectorCallback);
  }
  function addInitSelector(selectorCallback) {
    initSelectorCallbacks.push(selectorCallback);
  }
  function closestRoot(el, includeInitSelectors = false) {
    return findClosest(el, (element) => {
      const selectors = includeInitSelectors ? allSelectors() : rootSelectors();
      if (selectors.some((selector) => element.matches(selector)))
        return true;
    });
  }
  function findClosest(el, callback) {
    if (!el)
      return;
    if (callback(el))
      return el;
    if (el._x_teleportBack)
      el = el._x_teleportBack;
    if (!el.parentElement)
      return;
    return findClosest(el.parentElement, callback);
  }
  function isRoot(el) {
    return rootSelectors().some((selector) => el.matches(selector));
  }
  function initTree(el, walker = walk) {
    deferHandlingDirectives(() => {
      walker(el, (el2, skip) => {
        directives(el2, el2.attributes).forEach((handle) => handle());
        el2._x_ignore && skip();
      });
    });
  }
  function destroyTree(root) {
    walk(root, (el) => cleanupAttributes(el));
  }
  function setClasses(el, value) {
    if (Array.isArray(value)) {
      return setClassesFromString(el, value.join(" "));
    } else if (typeof value === "object" && value !== null) {
      return setClassesFromObject(el, value);
    } else if (typeof value === "function") {
      return setClasses(el, value());
    }
    return setClassesFromString(el, value);
  }
  function setClassesFromString(el, classString) {
    let split = (classString2) => classString2.split(" ").filter(Boolean);
    let missingClasses = (classString2) => classString2.split(" ").filter((i) => !el.classList.contains(i)).filter(Boolean);
    let addClassesAndReturnUndo = (classes) => {
      el.classList.add(...classes);
      return () => {
        el.classList.remove(...classes);
      };
    };
    classString = classString === true ? classString = "" : classString || "";
    return addClassesAndReturnUndo(missingClasses(classString));
  }
  function setClassesFromObject(el, classObject) {
    let split = (classString) => classString.split(" ").filter(Boolean);
    let forAdd = Object.entries(classObject).flatMap(([classString, bool]) => bool ? split(classString) : false).filter(Boolean);
    let forRemove = Object.entries(classObject).flatMap(([classString, bool]) => !bool ? split(classString) : false).filter(Boolean);
    let added = [];
    let removed = [];
    forRemove.forEach((i) => {
      if (el.classList.contains(i)) {
        el.classList.remove(i);
        removed.push(i);
      }
    });
    forAdd.forEach((i) => {
      if (!el.classList.contains(i)) {
        el.classList.add(i);
        added.push(i);
      }
    });
    return () => {
      removed.forEach((i) => el.classList.add(i));
      added.forEach((i) => el.classList.remove(i));
    };
  }
  function setStyles(el, value) {
    if (typeof value === "object" && value !== null) {
      return setStylesFromObject(el, value);
    }
    return setStylesFromString(el, value);
  }
  function setStylesFromObject(el, value) {
    let previousStyles = {};
    Object.entries(value).forEach(([key, value2]) => {
      previousStyles[key] = el.style[key];
      if (!key.startsWith("--")) {
        key = kebabCase(key);
      }
      el.style.setProperty(key, value2);
    });
    setTimeout(() => {
      if (el.style.length === 0) {
        el.removeAttribute("style");
      }
    });
    return () => {
      setStyles(el, previousStyles);
    };
  }
  function setStylesFromString(el, value) {
    let cache = el.getAttribute("style", value);
    el.setAttribute("style", value);
    return () => {
      el.setAttribute("style", cache || "");
    };
  }
  function kebabCase(subject) {
    return subject.replace(/([a-z])([A-Z])/g, "$1-$2").toLowerCase();
  }
  function once(callback, fallback = () => {
  }) {
    let called = false;
    return function() {
      if (!called) {
        called = true;
        callback.apply(this, arguments);
      } else {
        fallback.apply(this, arguments);
      }
    };
  }
  directive("transition", (el, { value, modifiers, expression }, { evaluate: evaluate2 }) => {
    if (typeof expression === "function")
      expression = evaluate2(expression);
    if (!expression) {
      registerTransitionsFromHelper(el, modifiers, value);
    } else {
      registerTransitionsFromClassString(el, expression, value);
    }
  });
  function registerTransitionsFromClassString(el, classString, stage) {
    registerTransitionObject(el, setClasses, "");
    let directiveStorageMap = {
      enter: (classes) => {
        el._x_transition.enter.during = classes;
      },
      "enter-start": (classes) => {
        el._x_transition.enter.start = classes;
      },
      "enter-end": (classes) => {
        el._x_transition.enter.end = classes;
      },
      leave: (classes) => {
        el._x_transition.leave.during = classes;
      },
      "leave-start": (classes) => {
        el._x_transition.leave.start = classes;
      },
      "leave-end": (classes) => {
        el._x_transition.leave.end = classes;
      }
    };
    directiveStorageMap[stage](classString);
  }
  function registerTransitionsFromHelper(el, modifiers, stage) {
    registerTransitionObject(el, setStyles);
    let doesntSpecify = !modifiers.includes("in") && !modifiers.includes("out") && !stage;
    let transitioningIn = doesntSpecify || modifiers.includes("in") || ["enter"].includes(stage);
    let transitioningOut = doesntSpecify || modifiers.includes("out") || ["leave"].includes(stage);
    if (modifiers.includes("in") && !doesntSpecify) {
      modifiers = modifiers.filter((i, index) => index < modifiers.indexOf("out"));
    }
    if (modifiers.includes("out") && !doesntSpecify) {
      modifiers = modifiers.filter((i, index) => index > modifiers.indexOf("out"));
    }
    let wantsAll = !modifiers.includes("opacity") && !modifiers.includes("scale");
    let wantsOpacity = wantsAll || modifiers.includes("opacity");
    let wantsScale = wantsAll || modifiers.includes("scale");
    let opacityValue = wantsOpacity ? 0 : 1;
    let scaleValue = wantsScale ? modifierValue(modifiers, "scale", 95) / 100 : 1;
    let delay = modifierValue(modifiers, "delay", 0);
    let origin = modifierValue(modifiers, "origin", "center");
    let property = "opacity, transform";
    let durationIn = modifierValue(modifiers, "duration", 150) / 1e3;
    let durationOut = modifierValue(modifiers, "duration", 75) / 1e3;
    let easing = `cubic-bezier(0.4, 0.0, 0.2, 1)`;
    if (transitioningIn) {
      el._x_transition.enter.during = {
        transformOrigin: origin,
        transitionDelay: delay,
        transitionProperty: property,
        transitionDuration: `${durationIn}s`,
        transitionTimingFunction: easing
      };
      el._x_transition.enter.start = {
        opacity: opacityValue,
        transform: `scale(${scaleValue})`
      };
      el._x_transition.enter.end = {
        opacity: 1,
        transform: `scale(1)`
      };
    }
    if (transitioningOut) {
      el._x_transition.leave.during = {
        transformOrigin: origin,
        transitionDelay: delay,
        transitionProperty: property,
        transitionDuration: `${durationOut}s`,
        transitionTimingFunction: easing
      };
      el._x_transition.leave.start = {
        opacity: 1,
        transform: `scale(1)`
      };
      el._x_transition.leave.end = {
        opacity: opacityValue,
        transform: `scale(${scaleValue})`
      };
    }
  }
  function registerTransitionObject(el, setFunction, defaultValue = {}) {
    if (!el._x_transition)
      el._x_transition = {
        enter: { during: defaultValue, start: defaultValue, end: defaultValue },
        leave: { during: defaultValue, start: defaultValue, end: defaultValue },
        in(before = () => {
        }, after = () => {
        }) {
          transition(el, setFunction, {
            during: this.enter.during,
            start: this.enter.start,
            end: this.enter.end
          }, before, after);
        },
        out(before = () => {
        }, after = () => {
        }) {
          transition(el, setFunction, {
            during: this.leave.during,
            start: this.leave.start,
            end: this.leave.end
          }, before, after);
        }
      };
  }
  window.Element.prototype._x_toggleAndCascadeWithTransitions = function(el, value, show, hide) {
    let clickAwayCompatibleShow = () => {
      document.visibilityState === "visible" ? requestAnimationFrame(show) : setTimeout(show);
    };
    if (value) {
      if (el._x_transition && (el._x_transition.enter || el._x_transition.leave)) {
        el._x_transition.enter && (Object.entries(el._x_transition.enter.during).length || Object.entries(el._x_transition.enter.start).length || Object.entries(el._x_transition.enter.end).length) ? el._x_transition.in(show) : clickAwayCompatibleShow();
      } else {
        el._x_transition ? el._x_transition.in(show) : clickAwayCompatibleShow();
      }
      return;
    }
    el._x_hidePromise = el._x_transition ? new Promise((resolve, reject) => {
      el._x_transition.out(() => {
      }, () => resolve(hide));
      el._x_transitioning.beforeCancel(() => reject({ isFromCancelledTransition: true }));
    }) : Promise.resolve(hide);
    queueMicrotask(() => {
      let closest = closestHide(el);
      if (closest) {
        if (!closest._x_hideChildren)
          closest._x_hideChildren = [];
        closest._x_hideChildren.push(el);
      } else {
        queueMicrotask(() => {
          let hideAfterChildren = (el2) => {
            let carry = Promise.all([
              el2._x_hidePromise,
              ...(el2._x_hideChildren || []).map(hideAfterChildren)
            ]).then(([i]) => i());
            delete el2._x_hidePromise;
            delete el2._x_hideChildren;
            return carry;
          };
          hideAfterChildren(el).catch((e) => {
            if (!e.isFromCancelledTransition)
              throw e;
          });
        });
      }
    });
  };
  function closestHide(el) {
    let parent = el.parentNode;
    if (!parent)
      return;
    return parent._x_hidePromise ? parent : closestHide(parent);
  }
  function transition(el, setFunction, { during, start: start2, end } = {}, before = () => {
  }, after = () => {
  }) {
    if (el._x_transitioning)
      el._x_transitioning.cancel();
    if (Object.keys(during).length === 0 && Object.keys(start2).length === 0 && Object.keys(end).length === 0) {
      before();
      after();
      return;
    }
    let undoStart, undoDuring, undoEnd;
    performTransition(el, {
      start() {
        undoStart = setFunction(el, start2);
      },
      during() {
        undoDuring = setFunction(el, during);
      },
      before,
      end() {
        undoStart();
        undoEnd = setFunction(el, end);
      },
      after,
      cleanup() {
        undoDuring();
        undoEnd();
      }
    });
  }
  function performTransition(el, stages) {
    let interrupted, reachedBefore, reachedEnd;
    let finish = once(() => {
      mutateDom(() => {
        interrupted = true;
        if (!reachedBefore)
          stages.before();
        if (!reachedEnd) {
          stages.end();
          releaseNextTicks();
        }
        stages.after();
        if (el.isConnected)
          stages.cleanup();
        delete el._x_transitioning;
      });
    });
    el._x_transitioning = {
      beforeCancels: [],
      beforeCancel(callback) {
        this.beforeCancels.push(callback);
      },
      cancel: once(function() {
        while (this.beforeCancels.length) {
          this.beforeCancels.shift()();
        }
        ;
        finish();
      }),
      finish
    };
    mutateDom(() => {
      stages.start();
      stages.during();
    });
    holdNextTicks();
    requestAnimationFrame(() => {
      if (interrupted)
        return;
      let duration = Number(getComputedStyle(el).transitionDuration.replace(/,.*/, "").replace("s", "")) * 1e3;
      let delay = Number(getComputedStyle(el).transitionDelay.replace(/,.*/, "").replace("s", "")) * 1e3;
      if (duration === 0)
        duration = Number(getComputedStyle(el).animationDuration.replace("s", "")) * 1e3;
      mutateDom(() => {
        stages.before();
      });
      reachedBefore = true;
      requestAnimationFrame(() => {
        if (interrupted)
          return;
        mutateDom(() => {
          stages.end();
        });
        releaseNextTicks();
        setTimeout(el._x_transitioning.finish, duration + delay);
        reachedEnd = true;
      });
    });
  }
  function modifierValue(modifiers, key, fallback) {
    if (modifiers.indexOf(key) === -1)
      return fallback;
    const rawValue = modifiers[modifiers.indexOf(key) + 1];
    if (!rawValue)
      return fallback;
    if (key === "scale") {
      if (isNaN(rawValue))
        return fallback;
    }
    if (key === "duration") {
      let match = rawValue.match(/([0-9]+)ms/);
      if (match)
        return match[1];
    }
    if (key === "origin") {
      if (["top", "right", "left", "center", "bottom"].includes(modifiers[modifiers.indexOf(key) + 2])) {
        return [rawValue, modifiers[modifiers.indexOf(key) + 2]].join(" ");
      }
    }
    return rawValue;
  }
  var isCloning = false;
  function skipDuringClone(callback, fallback = () => {
  }) {
    return (...args) => isCloning ? fallback(...args) : callback(...args);
  }
  function clone(oldEl, newEl) {
    if (!newEl._x_dataStack)
      newEl._x_dataStack = oldEl._x_dataStack;
    isCloning = true;
    dontRegisterReactiveSideEffects(() => {
      cloneTree(newEl);
    });
    isCloning = false;
  }
  function cloneTree(el) {
    let hasRunThroughFirstEl = false;
    let shallowWalker = (el2, callback) => {
      walk(el2, (el3, skip) => {
        if (hasRunThroughFirstEl && isRoot(el3))
          return skip();
        hasRunThroughFirstEl = true;
        callback(el3, skip);
      });
    };
    initTree(el, shallowWalker);
  }
  function dontRegisterReactiveSideEffects(callback) {
    let cache = effect;
    overrideEffect((callback2, el) => {
      let storedEffect = cache(callback2);
      release(storedEffect);
      return () => {
      };
    });
    callback();
    overrideEffect(cache);
  }
  function bind(el, name, value, modifiers = []) {
    if (!el._x_bindings)
      el._x_bindings = reactive({});
    el._x_bindings[name] = value;
    name = modifiers.includes("camel") ? camelCase(name) : name;
    switch (name) {
      case "value":
        bindInputValue(el, value);
        break;
      case "style":
        bindStyles(el, value);
        break;
      case "class":
        bindClasses(el, value);
        break;
      default:
        bindAttribute(el, name, value);
        break;
    }
  }
  function bindInputValue(el, value) {
    if (el.type === "radio") {
      if (el.attributes.value === void 0) {
        el.value = value;
      }
      if (window.fromModel) {
        el.checked = checkedAttrLooseCompare(el.value, value);
      }
    } else if (el.type === "checkbox") {
      if (Number.isInteger(value)) {
        el.value = value;
      } else if (!Number.isInteger(value) && !Array.isArray(value) && typeof value !== "boolean" && ![null, void 0].includes(value)) {
        el.value = String(value);
      } else {
        if (Array.isArray(value)) {
          el.checked = value.some((val) => checkedAttrLooseCompare(val, el.value));
        } else {
          el.checked = !!value;
        }
      }
    } else if (el.tagName === "SELECT") {
      updateSelect(el, value);
    } else {
      if (el.value === value)
        return;
      el.value = value;
    }
  }
  function bindClasses(el, value) {
    if (el._x_undoAddedClasses)
      el._x_undoAddedClasses();
    el._x_undoAddedClasses = setClasses(el, value);
  }
  function bindStyles(el, value) {
    if (el._x_undoAddedStyles)
      el._x_undoAddedStyles();
    el._x_undoAddedStyles = setStyles(el, value);
  }
  function bindAttribute(el, name, value) {
    if ([null, void 0, false].includes(value) && attributeShouldntBePreservedIfFalsy(name)) {
      el.removeAttribute(name);
    } else {
      if (isBooleanAttr(name))
        value = name;
      setIfChanged(el, name, value);
    }
  }
  function setIfChanged(el, attrName, value) {
    if (el.getAttribute(attrName) != value) {
      el.setAttribute(attrName, value);
    }
  }
  function updateSelect(el, value) {
    const arrayWrappedValue = [].concat(value).map((value2) => {
      return value2 + "";
    });
    Array.from(el.options).forEach((option) => {
      option.selected = arrayWrappedValue.includes(option.value);
    });
  }
  function camelCase(subject) {
    return subject.toLowerCase().replace(/-(\w)/g, (match, char) => char.toUpperCase());
  }
  function checkedAttrLooseCompare(valueA, valueB) {
    return valueA == valueB;
  }
  function isBooleanAttr(attrName) {
    const booleanAttributes = [
      "disabled",
      "checked",
      "required",
      "readonly",
      "hidden",
      "open",
      "selected",
      "autofocus",
      "itemscope",
      "multiple",
      "novalidate",
      "allowfullscreen",
      "allowpaymentrequest",
      "formnovalidate",
      "autoplay",
      "controls",
      "loop",
      "muted",
      "playsinline",
      "default",
      "ismap",
      "reversed",
      "async",
      "defer",
      "nomodule"
    ];
    return booleanAttributes.includes(attrName);
  }
  function attributeShouldntBePreservedIfFalsy(name) {
    return !["aria-pressed", "aria-checked", "aria-expanded", "aria-selected"].includes(name);
  }
  function getBinding(el, name, fallback) {
    if (el._x_bindings && el._x_bindings[name] !== void 0)
      return el._x_bindings[name];
    let attr = el.getAttribute(name);
    if (attr === null)
      return typeof fallback === "function" ? fallback() : fallback;
    if (isBooleanAttr(name)) {
      return !![name, "true"].includes(attr);
    }
    if (attr === "")
      return true;
    return attr;
  }
  function debounce(func, wait) {
    var timeout;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        func.apply(context, args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }
  function throttle(func, limit) {
    let inThrottle;
    return function() {
      let context = this, args = arguments;
      if (!inThrottle) {
        func.apply(context, args);
        inThrottle = true;
        setTimeout(() => inThrottle = false, limit);
      }
    };
  }
  function plugin(callback) {
    callback(alpine_default);
  }
  var stores = {};
  var isReactive = false;
  function store(name, value) {
    if (!isReactive) {
      stores = reactive(stores);
      isReactive = true;
    }
    if (value === void 0) {
      return stores[name];
    }
    stores[name] = value;
    if (typeof value === "object" && value !== null && value.hasOwnProperty("init") && typeof value.init === "function") {
      stores[name].init();
    }
    initInterceptors(stores[name]);
  }
  function getStores() {
    return stores;
  }
  var binds = {};
  function bind2(name, object) {
    binds[name] = typeof object !== "function" ? () => object : object;
  }
  function injectBindingProviders(obj) {
    Object.entries(binds).forEach(([name, callback]) => {
      Object.defineProperty(obj, name, {
        get() {
          return (...args) => {
            return callback(...args);
          };
        }
      });
    });
    return obj;
  }
  var datas = {};
  function data(name, callback) {
    datas[name] = callback;
  }
  function injectDataProviders(obj, context) {
    Object.entries(datas).forEach(([name, callback]) => {
      Object.defineProperty(obj, name, {
        get() {
          return (...args) => {
            return callback.bind(context)(...args);
          };
        },
        enumerable: false
      });
    });
    return obj;
  }
  var Alpine = {
    get reactive() {
      return reactive;
    },
    get release() {
      return release;
    },
    get effect() {
      return effect;
    },
    get raw() {
      return raw;
    },
    version: "3.10.0",
    flushAndStopDeferringMutations,
    dontAutoEvaluateFunctions,
    disableEffectScheduling,
    setReactivityEngine,
    closestDataStack,
    skipDuringClone,
    addRootSelector,
    addInitSelector,
    addScopeToNode,
    deferMutations,
    mapAttributes,
    evaluateLater,
    setEvaluator,
    mergeProxies,
    findClosest,
    closestRoot,
    interceptor,
    transition,
    setStyles,
    mutateDom,
    directive,
    throttle,
    debounce,
    evaluate,
    initTree,
    nextTick,
    prefixed: prefix,
    prefix: setPrefix,
    plugin,
    magic,
    store,
    start,
    clone,
    bound: getBinding,
    $data: scope,
    data,
    bind: bind2
  };
  var alpine_default = Alpine;
  function makeMap(str, expectsLowerCase) {
    const map = Object.create(null);
    const list = str.split(",");
    for (let i = 0; i < list.length; i++) {
      map[list[i]] = true;
    }
    return expectsLowerCase ? (val) => !!map[val.toLowerCase()] : (val) => !!map[val];
  }
  var PatchFlagNames = {
    [1]: `TEXT`,
    [2]: `CLASS`,
    [4]: `STYLE`,
    [8]: `PROPS`,
    [16]: `FULL_PROPS`,
    [32]: `HYDRATE_EVENTS`,
    [64]: `STABLE_FRAGMENT`,
    [128]: `KEYED_FRAGMENT`,
    [256]: `UNKEYED_FRAGMENT`,
    [512]: `NEED_PATCH`,
    [1024]: `DYNAMIC_SLOTS`,
    [2048]: `DEV_ROOT_FRAGMENT`,
    [-1]: `HOISTED`,
    [-2]: `BAIL`
  };
  var slotFlagsText = {
    [1]: "STABLE",
    [2]: "DYNAMIC",
    [3]: "FORWARDED"
  };
  var specialBooleanAttrs = `itemscope,allowfullscreen,formnovalidate,ismap,nomodule,novalidate,readonly`;
  var isBooleanAttr2 = /* @__PURE__ */ makeMap(specialBooleanAttrs + `,async,autofocus,autoplay,controls,default,defer,disabled,hidden,loop,open,required,reversed,scoped,seamless,checked,muted,multiple,selected`);
  var EMPTY_OBJ = false ? Object.freeze({}) : {};
  var EMPTY_ARR = false ? Object.freeze([]) : [];
  var extend = Object.assign;
  var hasOwnProperty = Object.prototype.hasOwnProperty;
  var hasOwn = (val, key) => hasOwnProperty.call(val, key);
  var isArray = Array.isArray;
  var isMap = (val) => toTypeString(val) === "[object Map]";
  var isString = (val) => typeof val === "string";
  var isSymbol = (val) => typeof val === "symbol";
  var isObject = (val) => val !== null && typeof val === "object";
  var objectToString = Object.prototype.toString;
  var toTypeString = (value) => objectToString.call(value);
  var toRawType = (value) => {
    return toTypeString(value).slice(8, -1);
  };
  var isIntegerKey = (key) => isString(key) && key !== "NaN" && key[0] !== "-" && "" + parseInt(key, 10) === key;
  var cacheStringFunction = (fn) => {
    const cache = Object.create(null);
    return (str) => {
      const hit = cache[str];
      return hit || (cache[str] = fn(str));
    };
  };
  var camelizeRE = /-(\w)/g;
  var camelize = cacheStringFunction((str) => {
    return str.replace(camelizeRE, (_, c) => c ? c.toUpperCase() : "");
  });
  var hyphenateRE = /\B([A-Z])/g;
  var hyphenate = cacheStringFunction((str) => str.replace(hyphenateRE, "-$1").toLowerCase());
  var capitalize = cacheStringFunction((str) => str.charAt(0).toUpperCase() + str.slice(1));
  var toHandlerKey = cacheStringFunction((str) => str ? `on${capitalize(str)}` : ``);
  var hasChanged = (value, oldValue) => value !== oldValue && (value === value || oldValue === oldValue);
  var targetMap = new WeakMap();
  var effectStack = [];
  var activeEffect;
  var ITERATE_KEY = Symbol(false ? "iterate" : "");
  var MAP_KEY_ITERATE_KEY = Symbol(false ? "Map key iterate" : "");
  function isEffect(fn) {
    return fn && fn._isEffect === true;
  }
  function effect2(fn, options = EMPTY_OBJ) {
    if (isEffect(fn)) {
      fn = fn.raw;
    }
    const effect3 = createReactiveEffect(fn, options);
    if (!options.lazy) {
      effect3();
    }
    return effect3;
  }
  function stop(effect3) {
    if (effect3.active) {
      cleanup(effect3);
      if (effect3.options.onStop) {
        effect3.options.onStop();
      }
      effect3.active = false;
    }
  }
  var uid = 0;
  function createReactiveEffect(fn, options) {
    const effect3 = function reactiveEffect() {
      if (!effect3.active) {
        return fn();
      }
      if (!effectStack.includes(effect3)) {
        cleanup(effect3);
        try {
          enableTracking();
          effectStack.push(effect3);
          activeEffect = effect3;
          return fn();
        } finally {
          effectStack.pop();
          resetTracking();
          activeEffect = effectStack[effectStack.length - 1];
        }
      }
    };
    effect3.id = uid++;
    effect3.allowRecurse = !!options.allowRecurse;
    effect3._isEffect = true;
    effect3.active = true;
    effect3.raw = fn;
    effect3.deps = [];
    effect3.options = options;
    return effect3;
  }
  function cleanup(effect3) {
    const { deps } = effect3;
    if (deps.length) {
      for (let i = 0; i < deps.length; i++) {
        deps[i].delete(effect3);
      }
      deps.length = 0;
    }
  }
  var shouldTrack = true;
  var trackStack = [];
  function pauseTracking() {
    trackStack.push(shouldTrack);
    shouldTrack = false;
  }
  function enableTracking() {
    trackStack.push(shouldTrack);
    shouldTrack = true;
  }
  function resetTracking() {
    const last = trackStack.pop();
    shouldTrack = last === void 0 ? true : last;
  }
  function track(target, type, key) {
    if (!shouldTrack || activeEffect === void 0) {
      return;
    }
    let depsMap = targetMap.get(target);
    if (!depsMap) {
      targetMap.set(target, depsMap = new Map());
    }
    let dep = depsMap.get(key);
    if (!dep) {
      depsMap.set(key, dep = new Set());
    }
    if (!dep.has(activeEffect)) {
      dep.add(activeEffect);
      activeEffect.deps.push(dep);
      if (false) {
        activeEffect.options.onTrack({
          effect: activeEffect,
          target,
          type,
          key
        });
      }
    }
  }
  function trigger(target, type, key, newValue, oldValue, oldTarget) {
    const depsMap = targetMap.get(target);
    if (!depsMap) {
      return;
    }
    const effects = new Set();
    const add2 = (effectsToAdd) => {
      if (effectsToAdd) {
        effectsToAdd.forEach((effect3) => {
          if (effect3 !== activeEffect || effect3.allowRecurse) {
            effects.add(effect3);
          }
        });
      }
    };
    if (type === "clear") {
      depsMap.forEach(add2);
    } else if (key === "length" && isArray(target)) {
      depsMap.forEach((dep, key2) => {
        if (key2 === "length" || key2 >= newValue) {
          add2(dep);
        }
      });
    } else {
      if (key !== void 0) {
        add2(depsMap.get(key));
      }
      switch (type) {
        case "add":
          if (!isArray(target)) {
            add2(depsMap.get(ITERATE_KEY));
            if (isMap(target)) {
              add2(depsMap.get(MAP_KEY_ITERATE_KEY));
            }
          } else if (isIntegerKey(key)) {
            add2(depsMap.get("length"));
          }
          break;
        case "delete":
          if (!isArray(target)) {
            add2(depsMap.get(ITERATE_KEY));
            if (isMap(target)) {
              add2(depsMap.get(MAP_KEY_ITERATE_KEY));
            }
          }
          break;
        case "set":
          if (isMap(target)) {
            add2(depsMap.get(ITERATE_KEY));
          }
          break;
      }
    }
    const run = (effect3) => {
      if (false) {
        effect3.options.onTrigger({
          effect: effect3,
          target,
          key,
          type,
          newValue,
          oldValue,
          oldTarget
        });
      }
      if (effect3.options.scheduler) {
        effect3.options.scheduler(effect3);
      } else {
        effect3();
      }
    };
    effects.forEach(run);
  }
  var isNonTrackableKeys = /* @__PURE__ */ makeMap(`__proto__,__v_isRef,__isVue`);
  var builtInSymbols = new Set(Object.getOwnPropertyNames(Symbol).map((key) => Symbol[key]).filter(isSymbol));
  var get2 = /* @__PURE__ */ createGetter();
  var shallowGet = /* @__PURE__ */ createGetter(false, true);
  var readonlyGet = /* @__PURE__ */ createGetter(true);
  var shallowReadonlyGet = /* @__PURE__ */ createGetter(true, true);
  var arrayInstrumentations = {};
  ["includes", "indexOf", "lastIndexOf"].forEach((key) => {
    const method = Array.prototype[key];
    arrayInstrumentations[key] = function(...args) {
      const arr = toRaw(this);
      for (let i = 0, l = this.length; i < l; i++) {
        track(arr, "get", i + "");
      }
      const res = method.apply(arr, args);
      if (res === -1 || res === false) {
        return method.apply(arr, args.map(toRaw));
      } else {
        return res;
      }
    };
  });
  ["push", "pop", "shift", "unshift", "splice"].forEach((key) => {
    const method = Array.prototype[key];
    arrayInstrumentations[key] = function(...args) {
      pauseTracking();
      const res = method.apply(this, args);
      resetTracking();
      return res;
    };
  });
  function createGetter(isReadonly = false, shallow = false) {
    return function get3(target, key, receiver) {
      if (key === "__v_isReactive") {
        return !isReadonly;
      } else if (key === "__v_isReadonly") {
        return isReadonly;
      } else if (key === "__v_raw" && receiver === (isReadonly ? shallow ? shallowReadonlyMap : readonlyMap : shallow ? shallowReactiveMap : reactiveMap).get(target)) {
        return target;
      }
      const targetIsArray = isArray(target);
      if (!isReadonly && targetIsArray && hasOwn(arrayInstrumentations, key)) {
        return Reflect.get(arrayInstrumentations, key, receiver);
      }
      const res = Reflect.get(target, key, receiver);
      if (isSymbol(key) ? builtInSymbols.has(key) : isNonTrackableKeys(key)) {
        return res;
      }
      if (!isReadonly) {
        track(target, "get", key);
      }
      if (shallow) {
        return res;
      }
      if (isRef(res)) {
        const shouldUnwrap = !targetIsArray || !isIntegerKey(key);
        return shouldUnwrap ? res.value : res;
      }
      if (isObject(res)) {
        return isReadonly ? readonly(res) : reactive2(res);
      }
      return res;
    };
  }
  var set2 = /* @__PURE__ */ createSetter();
  var shallowSet = /* @__PURE__ */ createSetter(true);
  function createSetter(shallow = false) {
    return function set3(target, key, value, receiver) {
      let oldValue = target[key];
      if (!shallow) {
        value = toRaw(value);
        oldValue = toRaw(oldValue);
        if (!isArray(target) && isRef(oldValue) && !isRef(value)) {
          oldValue.value = value;
          return true;
        }
      }
      const hadKey = isArray(target) && isIntegerKey(key) ? Number(key) < target.length : hasOwn(target, key);
      const result = Reflect.set(target, key, value, receiver);
      if (target === toRaw(receiver)) {
        if (!hadKey) {
          trigger(target, "add", key, value);
        } else if (hasChanged(value, oldValue)) {
          trigger(target, "set", key, value, oldValue);
        }
      }
      return result;
    };
  }
  function deleteProperty(target, key) {
    const hadKey = hasOwn(target, key);
    const oldValue = target[key];
    const result = Reflect.deleteProperty(target, key);
    if (result && hadKey) {
      trigger(target, "delete", key, void 0, oldValue);
    }
    return result;
  }
  function has(target, key) {
    const result = Reflect.has(target, key);
    if (!isSymbol(key) || !builtInSymbols.has(key)) {
      track(target, "has", key);
    }
    return result;
  }
  function ownKeys(target) {
    track(target, "iterate", isArray(target) ? "length" : ITERATE_KEY);
    return Reflect.ownKeys(target);
  }
  var mutableHandlers = {
    get: get2,
    set: set2,
    deleteProperty,
    has,
    ownKeys
  };
  var readonlyHandlers = {
    get: readonlyGet,
    set(target, key) {
      if (false) {
        console.warn(`Set operation on key "${String(key)}" failed: target is readonly.`, target);
      }
      return true;
    },
    deleteProperty(target, key) {
      if (false) {
        console.warn(`Delete operation on key "${String(key)}" failed: target is readonly.`, target);
      }
      return true;
    }
  };
  var shallowReactiveHandlers = extend({}, mutableHandlers, {
    get: shallowGet,
    set: shallowSet
  });
  var shallowReadonlyHandlers = extend({}, readonlyHandlers, {
    get: shallowReadonlyGet
  });
  var toReactive = (value) => isObject(value) ? reactive2(value) : value;
  var toReadonly = (value) => isObject(value) ? readonly(value) : value;
  var toShallow = (value) => value;
  var getProto = (v) => Reflect.getPrototypeOf(v);
  function get$1(target, key, isReadonly = false, isShallow = false) {
    target = target["__v_raw"];
    const rawTarget = toRaw(target);
    const rawKey = toRaw(key);
    if (key !== rawKey) {
      !isReadonly && track(rawTarget, "get", key);
    }
    !isReadonly && track(rawTarget, "get", rawKey);
    const { has: has2 } = getProto(rawTarget);
    const wrap = isShallow ? toShallow : isReadonly ? toReadonly : toReactive;
    if (has2.call(rawTarget, key)) {
      return wrap(target.get(key));
    } else if (has2.call(rawTarget, rawKey)) {
      return wrap(target.get(rawKey));
    } else if (target !== rawTarget) {
      target.get(key);
    }
  }
  function has$1(key, isReadonly = false) {
    const target = this["__v_raw"];
    const rawTarget = toRaw(target);
    const rawKey = toRaw(key);
    if (key !== rawKey) {
      !isReadonly && track(rawTarget, "has", key);
    }
    !isReadonly && track(rawTarget, "has", rawKey);
    return key === rawKey ? target.has(key) : target.has(key) || target.has(rawKey);
  }
  function size(target, isReadonly = false) {
    target = target["__v_raw"];
    !isReadonly && track(toRaw(target), "iterate", ITERATE_KEY);
    return Reflect.get(target, "size", target);
  }
  function add(value) {
    value = toRaw(value);
    const target = toRaw(this);
    const proto = getProto(target);
    const hadKey = proto.has.call(target, value);
    if (!hadKey) {
      target.add(value);
      trigger(target, "add", value, value);
    }
    return this;
  }
  function set$1(key, value) {
    value = toRaw(value);
    const target = toRaw(this);
    const { has: has2, get: get3 } = getProto(target);
    let hadKey = has2.call(target, key);
    if (!hadKey) {
      key = toRaw(key);
      hadKey = has2.call(target, key);
    } else if (false) {
      checkIdentityKeys(target, has2, key);
    }
    const oldValue = get3.call(target, key);
    target.set(key, value);
    if (!hadKey) {
      trigger(target, "add", key, value);
    } else if (hasChanged(value, oldValue)) {
      trigger(target, "set", key, value, oldValue);
    }
    return this;
  }
  function deleteEntry(key) {
    const target = toRaw(this);
    const { has: has2, get: get3 } = getProto(target);
    let hadKey = has2.call(target, key);
    if (!hadKey) {
      key = toRaw(key);
      hadKey = has2.call(target, key);
    } else if (false) {
      checkIdentityKeys(target, has2, key);
    }
    const oldValue = get3 ? get3.call(target, key) : void 0;
    const result = target.delete(key);
    if (hadKey) {
      trigger(target, "delete", key, void 0, oldValue);
    }
    return result;
  }
  function clear() {
    const target = toRaw(this);
    const hadItems = target.size !== 0;
    const oldTarget = false ? isMap(target) ? new Map(target) : new Set(target) : void 0;
    const result = target.clear();
    if (hadItems) {
      trigger(target, "clear", void 0, void 0, oldTarget);
    }
    return result;
  }
  function createForEach(isReadonly, isShallow) {
    return function forEach(callback, thisArg) {
      const observed = this;
      const target = observed["__v_raw"];
      const rawTarget = toRaw(target);
      const wrap = isShallow ? toShallow : isReadonly ? toReadonly : toReactive;
      !isReadonly && track(rawTarget, "iterate", ITERATE_KEY);
      return target.forEach((value, key) => {
        return callback.call(thisArg, wrap(value), wrap(key), observed);
      });
    };
  }
  function createIterableMethod(method, isReadonly, isShallow) {
    return function(...args) {
      const target = this["__v_raw"];
      const rawTarget = toRaw(target);
      const targetIsMap = isMap(rawTarget);
      const isPair = method === "entries" || method === Symbol.iterator && targetIsMap;
      const isKeyOnly = method === "keys" && targetIsMap;
      const innerIterator = target[method](...args);
      const wrap = isShallow ? toShallow : isReadonly ? toReadonly : toReactive;
      !isReadonly && track(rawTarget, "iterate", isKeyOnly ? MAP_KEY_ITERATE_KEY : ITERATE_KEY);
      return {
        next() {
          const { value, done } = innerIterator.next();
          return done ? { value, done } : {
            value: isPair ? [wrap(value[0]), wrap(value[1])] : wrap(value),
            done
          };
        },
        [Symbol.iterator]() {
          return this;
        }
      };
    };
  }
  function createReadonlyMethod(type) {
    return function(...args) {
      if (false) {
        const key = args[0] ? `on key "${args[0]}" ` : ``;
        console.warn(`${capitalize(type)} operation ${key}failed: target is readonly.`, toRaw(this));
      }
      return type === "delete" ? false : this;
    };
  }
  var mutableInstrumentations = {
    get(key) {
      return get$1(this, key);
    },
    get size() {
      return size(this);
    },
    has: has$1,
    add,
    set: set$1,
    delete: deleteEntry,
    clear,
    forEach: createForEach(false, false)
  };
  var shallowInstrumentations = {
    get(key) {
      return get$1(this, key, false, true);
    },
    get size() {
      return size(this);
    },
    has: has$1,
    add,
    set: set$1,
    delete: deleteEntry,
    clear,
    forEach: createForEach(false, true)
  };
  var readonlyInstrumentations = {
    get(key) {
      return get$1(this, key, true);
    },
    get size() {
      return size(this, true);
    },
    has(key) {
      return has$1.call(this, key, true);
    },
    add: createReadonlyMethod("add"),
    set: createReadonlyMethod("set"),
    delete: createReadonlyMethod("delete"),
    clear: createReadonlyMethod("clear"),
    forEach: createForEach(true, false)
  };
  var shallowReadonlyInstrumentations = {
    get(key) {
      return get$1(this, key, true, true);
    },
    get size() {
      return size(this, true);
    },
    has(key) {
      return has$1.call(this, key, true);
    },
    add: createReadonlyMethod("add"),
    set: createReadonlyMethod("set"),
    delete: createReadonlyMethod("delete"),
    clear: createReadonlyMethod("clear"),
    forEach: createForEach(true, true)
  };
  var iteratorMethods = ["keys", "values", "entries", Symbol.iterator];
  iteratorMethods.forEach((method) => {
    mutableInstrumentations[method] = createIterableMethod(method, false, false);
    readonlyInstrumentations[method] = createIterableMethod(method, true, false);
    shallowInstrumentations[method] = createIterableMethod(method, false, true);
    shallowReadonlyInstrumentations[method] = createIterableMethod(method, true, true);
  });
  function createInstrumentationGetter(isReadonly, shallow) {
    const instrumentations = shallow ? isReadonly ? shallowReadonlyInstrumentations : shallowInstrumentations : isReadonly ? readonlyInstrumentations : mutableInstrumentations;
    return (target, key, receiver) => {
      if (key === "__v_isReactive") {
        return !isReadonly;
      } else if (key === "__v_isReadonly") {
        return isReadonly;
      } else if (key === "__v_raw") {
        return target;
      }
      return Reflect.get(hasOwn(instrumentations, key) && key in target ? instrumentations : target, key, receiver);
    };
  }
  var mutableCollectionHandlers = {
    get: createInstrumentationGetter(false, false)
  };
  var shallowCollectionHandlers = {
    get: createInstrumentationGetter(false, true)
  };
  var readonlyCollectionHandlers = {
    get: createInstrumentationGetter(true, false)
  };
  var shallowReadonlyCollectionHandlers = {
    get: createInstrumentationGetter(true, true)
  };
  var reactiveMap = new WeakMap();
  var shallowReactiveMap = new WeakMap();
  var readonlyMap = new WeakMap();
  var shallowReadonlyMap = new WeakMap();
  function targetTypeMap(rawType) {
    switch (rawType) {
      case "Object":
      case "Array":
        return 1;
      case "Map":
      case "Set":
      case "WeakMap":
      case "WeakSet":
        return 2;
      default:
        return 0;
    }
  }
  function getTargetType(value) {
    return value["__v_skip"] || !Object.isExtensible(value) ? 0 : targetTypeMap(toRawType(value));
  }
  function reactive2(target) {
    if (target && target["__v_isReadonly"]) {
      return target;
    }
    return createReactiveObject(target, false, mutableHandlers, mutableCollectionHandlers, reactiveMap);
  }
  function readonly(target) {
    return createReactiveObject(target, true, readonlyHandlers, readonlyCollectionHandlers, readonlyMap);
  }
  function createReactiveObject(target, isReadonly, baseHandlers, collectionHandlers, proxyMap) {
    if (!isObject(target)) {
      if (false) {
        console.warn(`value cannot be made reactive: ${String(target)}`);
      }
      return target;
    }
    if (target["__v_raw"] && !(isReadonly && target["__v_isReactive"])) {
      return target;
    }
    const existingProxy = proxyMap.get(target);
    if (existingProxy) {
      return existingProxy;
    }
    const targetType = getTargetType(target);
    if (targetType === 0) {
      return target;
    }
    const proxy = new Proxy(target, targetType === 2 ? collectionHandlers : baseHandlers);
    proxyMap.set(target, proxy);
    return proxy;
  }
  function toRaw(observed) {
    return observed && toRaw(observed["__v_raw"]) || observed;
  }
  function isRef(r) {
    return Boolean(r && r.__v_isRef === true);
  }
  magic("nextTick", () => nextTick);
  magic("dispatch", (el) => dispatch.bind(dispatch, el));
  magic("watch", (el, { evaluateLater: evaluateLater2, effect: effect3 }) => (key, callback) => {
    let evaluate2 = evaluateLater2(key);
    let firstTime = true;
    let oldValue;
    let effectReference = effect3(() => evaluate2((value) => {
      JSON.stringify(value);
      if (!firstTime) {
        queueMicrotask(() => {
          callback(value, oldValue);
          oldValue = value;
        });
      } else {
        oldValue = value;
      }
      firstTime = false;
    }));
    el._x_effects.delete(effectReference);
  });
  magic("store", getStores);
  magic("data", (el) => scope(el));
  magic("root", (el) => closestRoot(el));
  magic("refs", (el) => {
    if (el._x_refs_proxy)
      return el._x_refs_proxy;
    el._x_refs_proxy = mergeProxies(getArrayOfRefObject(el));
    return el._x_refs_proxy;
  });
  function getArrayOfRefObject(el) {
    let refObjects = [];
    let currentEl = el;
    while (currentEl) {
      if (currentEl._x_refs)
        refObjects.push(currentEl._x_refs);
      currentEl = currentEl.parentNode;
    }
    return refObjects;
  }
  var globalIdMemo = {};
  function findAndIncrementId(name) {
    if (!globalIdMemo[name])
      globalIdMemo[name] = 0;
    return ++globalIdMemo[name];
  }
  function closestIdRoot(el, name) {
    return findClosest(el, (element) => {
      if (element._x_ids && element._x_ids[name])
        return true;
    });
  }
  function setIdRoot(el, name) {
    if (!el._x_ids)
      el._x_ids = {};
    if (!el._x_ids[name])
      el._x_ids[name] = findAndIncrementId(name);
  }
  magic("id", (el) => (name, key = null) => {
    let root = closestIdRoot(el, name);
    let id = root ? root._x_ids[name] : findAndIncrementId(name);
    return key ? `${name}-${id}-${key}` : `${name}-${id}`;
  });
  magic("el", (el) => el);
  warnMissingPluginMagic("Focus", "focus", "focus");
  warnMissingPluginMagic("Persist", "persist", "persist");
  function warnMissingPluginMagic(name, magicName, slug) {
    magic(magicName, (el) => warn(`You can't use [$${directiveName}] without first installing the "${name}" plugin here: https://alpinejs.dev/plugins/${slug}`, el));
  }
  directive("modelable", (el, { expression }, { effect: effect3, evaluateLater: evaluateLater2 }) => {
    let func = evaluateLater2(expression);
    let innerGet = () => {
      let result;
      func((i) => result = i);
      return result;
    };
    let evaluateInnerSet = evaluateLater2(`${expression} = __placeholder`);
    let innerSet = (val) => evaluateInnerSet(() => {
    }, { scope: { __placeholder: val } });
    let initialValue = innerGet();
    innerSet(initialValue);
    queueMicrotask(() => {
      if (!el._x_model)
        return;
      el._x_removeModelListeners["default"]();
      let outerGet = el._x_model.get;
      let outerSet = el._x_model.set;
      effect3(() => innerSet(outerGet()));
      effect3(() => outerSet(innerGet()));
    });
  });
  directive("teleport", (el, { expression }, { cleanup: cleanup2 }) => {
    if (el.tagName.toLowerCase() !== "template")
      warn("x-teleport can only be used on a <template> tag", el);
    let target = document.querySelector(expression);
    if (!target)
      warn(`Cannot find x-teleport element for selector: "${expression}"`);
    let clone2 = el.content.cloneNode(true).firstElementChild;
    el._x_teleport = clone2;
    clone2._x_teleportBack = el;
    if (el._x_forwardEvents) {
      el._x_forwardEvents.forEach((eventName) => {
        clone2.addEventListener(eventName, (e) => {
          e.stopPropagation();
          el.dispatchEvent(new e.constructor(e.type, e));
        });
      });
    }
    addScopeToNode(clone2, {}, el);
    mutateDom(() => {
      target.appendChild(clone2);
      initTree(clone2);
      clone2._x_ignore = true;
    });
    cleanup2(() => clone2.remove());
  });
  var handler = () => {
  };
  handler.inline = (el, { modifiers }, { cleanup: cleanup2 }) => {
    modifiers.includes("self") ? el._x_ignoreSelf = true : el._x_ignore = true;
    cleanup2(() => {
      modifiers.includes("self") ? delete el._x_ignoreSelf : delete el._x_ignore;
    });
  };
  directive("ignore", handler);
  directive("effect", (el, { expression }, { effect: effect3 }) => effect3(evaluateLater(el, expression)));
  function on(el, event, modifiers, callback) {
    let listenerTarget = el;
    let handler3 = (e) => callback(e);
    let options = {};
    let wrapHandler = (callback2, wrapper) => (e) => wrapper(callback2, e);
    if (modifiers.includes("dot"))
      event = dotSyntax(event);
    if (modifiers.includes("camel"))
      event = camelCase2(event);
    if (modifiers.includes("passive"))
      options.passive = true;
    if (modifiers.includes("capture"))
      options.capture = true;
    if (modifiers.includes("window"))
      listenerTarget = window;
    if (modifiers.includes("document"))
      listenerTarget = document;
    if (modifiers.includes("prevent"))
      handler3 = wrapHandler(handler3, (next, e) => {
        e.preventDefault();
        next(e);
      });
    if (modifiers.includes("stop"))
      handler3 = wrapHandler(handler3, (next, e) => {
        e.stopPropagation();
        next(e);
      });
    if (modifiers.includes("self"))
      handler3 = wrapHandler(handler3, (next, e) => {
        e.target === el && next(e);
      });
    if (modifiers.includes("away") || modifiers.includes("outside")) {
      listenerTarget = document;
      handler3 = wrapHandler(handler3, (next, e) => {
        if (el.contains(e.target))
          return;
        if (e.target.isConnected === false)
          return;
        if (el.offsetWidth < 1 && el.offsetHeight < 1)
          return;
        if (el._x_isShown === false)
          return;
        next(e);
      });
    }
    if (modifiers.includes("once")) {
      handler3 = wrapHandler(handler3, (next, e) => {
        next(e);
        listenerTarget.removeEventListener(event, handler3, options);
      });
    }
    handler3 = wrapHandler(handler3, (next, e) => {
      if (isKeyEvent(event)) {
        if (isListeningForASpecificKeyThatHasntBeenPressed(e, modifiers)) {
          return;
        }
      }
      next(e);
    });
    if (modifiers.includes("debounce")) {
      let nextModifier = modifiers[modifiers.indexOf("debounce") + 1] || "invalid-wait";
      let wait = isNumeric(nextModifier.split("ms")[0]) ? Number(nextModifier.split("ms")[0]) : 250;
      handler3 = debounce(handler3, wait);
    }
    if (modifiers.includes("throttle")) {
      let nextModifier = modifiers[modifiers.indexOf("throttle") + 1] || "invalid-wait";
      let wait = isNumeric(nextModifier.split("ms")[0]) ? Number(nextModifier.split("ms")[0]) : 250;
      handler3 = throttle(handler3, wait);
    }
    listenerTarget.addEventListener(event, handler3, options);
    return () => {
      listenerTarget.removeEventListener(event, handler3, options);
    };
  }
  function dotSyntax(subject) {
    return subject.replace(/-/g, ".");
  }
  function camelCase2(subject) {
    return subject.toLowerCase().replace(/-(\w)/g, (match, char) => char.toUpperCase());
  }
  function isNumeric(subject) {
    return !Array.isArray(subject) && !isNaN(subject);
  }
  function kebabCase2(subject) {
    return subject.replace(/([a-z])([A-Z])/g, "$1-$2").replace(/[_\s]/, "-").toLowerCase();
  }
  function isKeyEvent(event) {
    return ["keydown", "keyup"].includes(event);
  }
  function isListeningForASpecificKeyThatHasntBeenPressed(e, modifiers) {
    let keyModifiers = modifiers.filter((i) => {
      return !["window", "document", "prevent", "stop", "once"].includes(i);
    });
    if (keyModifiers.includes("debounce")) {
      let debounceIndex = keyModifiers.indexOf("debounce");
      keyModifiers.splice(debounceIndex, isNumeric((keyModifiers[debounceIndex + 1] || "invalid-wait").split("ms")[0]) ? 2 : 1);
    }
    if (keyModifiers.length === 0)
      return false;
    if (keyModifiers.length === 1 && keyToModifiers(e.key).includes(keyModifiers[0]))
      return false;
    const systemKeyModifiers = ["ctrl", "shift", "alt", "meta", "cmd", "super"];
    const selectedSystemKeyModifiers = systemKeyModifiers.filter((modifier) => keyModifiers.includes(modifier));
    keyModifiers = keyModifiers.filter((i) => !selectedSystemKeyModifiers.includes(i));
    if (selectedSystemKeyModifiers.length > 0) {
      const activelyPressedKeyModifiers = selectedSystemKeyModifiers.filter((modifier) => {
        if (modifier === "cmd" || modifier === "super")
          modifier = "meta";
        return e[`${modifier}Key`];
      });
      if (activelyPressedKeyModifiers.length === selectedSystemKeyModifiers.length) {
        if (keyToModifiers(e.key).includes(keyModifiers[0]))
          return false;
      }
    }
    return true;
  }
  function keyToModifiers(key) {
    if (!key)
      return [];
    key = kebabCase2(key);
    let modifierToKeyMap = {
      ctrl: "control",
      slash: "/",
      space: "-",
      spacebar: "-",
      cmd: "meta",
      esc: "escape",
      up: "arrow-up",
      down: "arrow-down",
      left: "arrow-left",
      right: "arrow-right",
      period: ".",
      equal: "="
    };
    modifierToKeyMap[key] = key;
    return Object.keys(modifierToKeyMap).map((modifier) => {
      if (modifierToKeyMap[modifier] === key)
        return modifier;
    }).filter((modifier) => modifier);
  }
  directive("model", (el, { modifiers, expression }, { effect: effect3, cleanup: cleanup2 }) => {
    let evaluate2 = evaluateLater(el, expression);
    let assignmentExpression = `${expression} = rightSideOfExpression($event, ${expression})`;
    let evaluateAssignment = evaluateLater(el, assignmentExpression);
    var event = el.tagName.toLowerCase() === "select" || ["checkbox", "radio"].includes(el.type) || modifiers.includes("lazy") ? "change" : "input";
    let assigmentFunction = generateAssignmentFunction(el, modifiers, expression);
    let removeListener = on(el, event, modifiers, (e) => {
      evaluateAssignment(() => {
      }, { scope: {
        $event: e,
        rightSideOfExpression: assigmentFunction
      } });
    });
    if (!el._x_removeModelListeners)
      el._x_removeModelListeners = {};
    el._x_removeModelListeners["default"] = removeListener;
    cleanup2(() => el._x_removeModelListeners["default"]());
    let evaluateSetModel = evaluateLater(el, `${expression} = __placeholder`);
    el._x_model = {
      get() {
        let result;
        evaluate2((value) => result = value);
        return result;
      },
      set(value) {
        evaluateSetModel(() => {
        }, { scope: { __placeholder: value } });
      }
    };
    el._x_forceModelUpdate = () => {
      evaluate2((value) => {
        if (value === void 0 && expression.match(/\./))
          value = "";
        window.fromModel = true;
        mutateDom(() => bind(el, "value", value));
        delete window.fromModel;
      });
    };
    effect3(() => {
      if (modifiers.includes("unintrusive") && document.activeElement.isSameNode(el))
        return;
      el._x_forceModelUpdate();
    });
  });
  function generateAssignmentFunction(el, modifiers, expression) {
    if (el.type === "radio") {
      mutateDom(() => {
        if (!el.hasAttribute("name"))
          el.setAttribute("name", expression);
      });
    }
    return (event, currentValue) => {
      return mutateDom(() => {
        if (event instanceof CustomEvent && event.detail !== void 0) {
          return event.detail || event.target.value;
        } else if (el.type === "checkbox") {
          if (Array.isArray(currentValue)) {
            let newValue = modifiers.includes("number") ? safeParseNumber(event.target.value) : event.target.value;
            return event.target.checked ? currentValue.concat([newValue]) : currentValue.filter((el2) => !checkedAttrLooseCompare2(el2, newValue));
          } else {
            return event.target.checked;
          }
        } else if (el.tagName.toLowerCase() === "select" && el.multiple) {
          return modifiers.includes("number") ? Array.from(event.target.selectedOptions).map((option) => {
            let rawValue = option.value || option.text;
            return safeParseNumber(rawValue);
          }) : Array.from(event.target.selectedOptions).map((option) => {
            return option.value || option.text;
          });
        } else {
          let rawValue = event.target.value;
          return modifiers.includes("number") ? safeParseNumber(rawValue) : modifiers.includes("trim") ? rawValue.trim() : rawValue;
        }
      });
    };
  }
  function safeParseNumber(rawValue) {
    let number = rawValue ? parseFloat(rawValue) : null;
    return isNumeric2(number) ? number : rawValue;
  }
  function checkedAttrLooseCompare2(valueA, valueB) {
    return valueA == valueB;
  }
  function isNumeric2(subject) {
    return !Array.isArray(subject) && !isNaN(subject);
  }
  directive("cloak", (el) => queueMicrotask(() => mutateDom(() => el.removeAttribute(prefix("cloak")))));
  addInitSelector(() => `[${prefix("init")}]`);
  directive("init", skipDuringClone((el, { expression }, { evaluate: evaluate2 }) => {
    if (typeof expression === "string") {
      return !!expression.trim() && evaluate2(expression, {}, false);
    }
    return evaluate2(expression, {}, false);
  }));
  directive("text", (el, { expression }, { effect: effect3, evaluateLater: evaluateLater2 }) => {
    let evaluate2 = evaluateLater2(expression);
    effect3(() => {
      evaluate2((value) => {
        mutateDom(() => {
          el.textContent = value;
        });
      });
    });
  });
  directive("html", (el, { expression }, { effect: effect3, evaluateLater: evaluateLater2 }) => {
    let evaluate2 = evaluateLater2(expression);
    effect3(() => {
      evaluate2((value) => {
        mutateDom(() => {
          el.innerHTML = value;
          el._x_ignoreSelf = true;
          initTree(el);
          delete el._x_ignoreSelf;
        });
      });
    });
  });
  mapAttributes(startingWith(":", into(prefix("bind:"))));
  directive("bind", (el, { value, modifiers, expression, original }, { effect: effect3 }) => {
    if (!value) {
      return applyBindingsObject(el, expression, original, effect3);
    }
    if (value === "key")
      return storeKeyForXFor(el, expression);
    let evaluate2 = evaluateLater(el, expression);
    effect3(() => evaluate2((result) => {
      if (result === void 0 && expression.match(/\./))
        result = "";
      mutateDom(() => bind(el, value, result, modifiers));
    }));
  });
  function applyBindingsObject(el, expression, original, effect3) {
    let bindingProviders = {};
    injectBindingProviders(bindingProviders);
    let getBindings = evaluateLater(el, expression);
    let cleanupRunners = [];
    while (cleanupRunners.length)
      cleanupRunners.pop()();
    getBindings((bindings) => {
      let attributes = Object.entries(bindings).map(([name, value]) => ({ name, value }));
      let staticAttributes = attributesOnly(attributes);
      attributes = attributes.map((attribute) => {
        if (staticAttributes.find((attr) => attr.name === attribute.name)) {
          return {
            name: `x-bind:${attribute.name}`,
            value: `"${attribute.value}"`
          };
        }
        return attribute;
      });
      directives(el, attributes, original).map((handle) => {
        cleanupRunners.push(handle.runCleanups);
        handle();
      });
    }, { scope: bindingProviders });
  }
  function storeKeyForXFor(el, expression) {
    el._x_keyExpression = expression;
  }
  addRootSelector(() => `[${prefix("data")}]`);
  directive("data", skipDuringClone((el, { expression }, { cleanup: cleanup2 }) => {
    expression = expression === "" ? "{}" : expression;
    let magicContext = {};
    injectMagics(magicContext, el);
    let dataProviderContext = {};
    injectDataProviders(dataProviderContext, magicContext);
    let data2 = evaluate(el, expression, { scope: dataProviderContext });
    if (data2 === void 0)
      data2 = {};
    injectMagics(data2, el);
    let reactiveData = reactive(data2);
    initInterceptors(reactiveData);
    let undo = addScopeToNode(el, reactiveData);
    reactiveData["init"] && evaluate(el, reactiveData["init"]);
    cleanup2(() => {
      reactiveData["destroy"] && evaluate(el, reactiveData["destroy"]);
      undo();
    });
  }));
  directive("show", (el, { modifiers, expression }, { effect: effect3 }) => {
    let evaluate2 = evaluateLater(el, expression);
    if (!el._x_doHide)
      el._x_doHide = () => {
        mutateDom(() => el.style.display = "none");
      };
    if (!el._x_doShow)
      el._x_doShow = () => {
        mutateDom(() => {
          if (el.style.length === 1 && el.style.display === "none") {
            el.removeAttribute("style");
          } else {
            el.style.removeProperty("display");
          }
        });
      };
    let hide = () => {
      el._x_doHide();
      el._x_isShown = false;
    };
    let show = () => {
      el._x_doShow();
      el._x_isShown = true;
    };
    let clickAwayCompatibleShow = () => setTimeout(show);
    let toggle = once((value) => value ? show() : hide(), (value) => {
      if (typeof el._x_toggleAndCascadeWithTransitions === "function") {
        el._x_toggleAndCascadeWithTransitions(el, value, show, hide);
      } else {
        value ? clickAwayCompatibleShow() : hide();
      }
    });
    let oldValue;
    let firstTime = true;
    effect3(() => evaluate2((value) => {
      if (!firstTime && value === oldValue)
        return;
      if (modifiers.includes("immediate"))
        value ? clickAwayCompatibleShow() : hide();
      toggle(value);
      oldValue = value;
      firstTime = false;
    }));
  });
  directive("for", (el, { expression }, { effect: effect3, cleanup: cleanup2 }) => {
    let iteratorNames = parseForExpression(expression);
    let evaluateItems = evaluateLater(el, iteratorNames.items);
    let evaluateKey = evaluateLater(el, el._x_keyExpression || "index");
    el._x_prevKeys = [];
    el._x_lookup = {};
    effect3(() => loop(el, iteratorNames, evaluateItems, evaluateKey));
    cleanup2(() => {
      Object.values(el._x_lookup).forEach((el2) => el2.remove());
      delete el._x_prevKeys;
      delete el._x_lookup;
    });
  });
  function loop(el, iteratorNames, evaluateItems, evaluateKey) {
    let isObject2 = (i) => typeof i === "object" && !Array.isArray(i);
    let templateEl = el;
    evaluateItems((items) => {
      if (isNumeric3(items) && items >= 0) {
        items = Array.from(Array(items).keys(), (i) => i + 1);
      }
      if (items === void 0)
        items = [];
      let lookup = el._x_lookup;
      let prevKeys = el._x_prevKeys;
      let scopes = [];
      let keys = [];
      if (isObject2(items)) {
        items = Object.entries(items).map(([key, value]) => {
          let scope2 = getIterationScopeVariables(iteratorNames, value, key, items);
          evaluateKey((value2) => keys.push(value2), { scope: { index: key, ...scope2 } });
          scopes.push(scope2);
        });
      } else {
        for (let i = 0; i < items.length; i++) {
          let scope2 = getIterationScopeVariables(iteratorNames, items[i], i, items);
          evaluateKey((value) => keys.push(value), { scope: { index: i, ...scope2 } });
          scopes.push(scope2);
        }
      }
      let adds = [];
      let moves = [];
      let removes = [];
      let sames = [];
      for (let i = 0; i < prevKeys.length; i++) {
        let key = prevKeys[i];
        if (keys.indexOf(key) === -1)
          removes.push(key);
      }
      prevKeys = prevKeys.filter((key) => !removes.includes(key));
      let lastKey = "template";
      for (let i = 0; i < keys.length; i++) {
        let key = keys[i];
        let prevIndex = prevKeys.indexOf(key);
        if (prevIndex === -1) {
          prevKeys.splice(i, 0, key);
          adds.push([lastKey, i]);
        } else if (prevIndex !== i) {
          let keyInSpot = prevKeys.splice(i, 1)[0];
          let keyForSpot = prevKeys.splice(prevIndex - 1, 1)[0];
          prevKeys.splice(i, 0, keyForSpot);
          prevKeys.splice(prevIndex, 0, keyInSpot);
          moves.push([keyInSpot, keyForSpot]);
        } else {
          sames.push(key);
        }
        lastKey = key;
      }
      for (let i = 0; i < removes.length; i++) {
        let key = removes[i];
        if (!!lookup[key]._x_effects) {
          lookup[key]._x_effects.forEach(dequeueJob);
        }
        lookup[key].remove();
        lookup[key] = null;
        delete lookup[key];
      }
      for (let i = 0; i < moves.length; i++) {
        let [keyInSpot, keyForSpot] = moves[i];
        let elInSpot = lookup[keyInSpot];
        let elForSpot = lookup[keyForSpot];
        let marker = document.createElement("div");
        mutateDom(() => {
          elForSpot.after(marker);
          elInSpot.after(elForSpot);
          elForSpot._x_currentIfEl && elForSpot.after(elForSpot._x_currentIfEl);
          marker.before(elInSpot);
          elInSpot._x_currentIfEl && elInSpot.after(elInSpot._x_currentIfEl);
          marker.remove();
        });
        refreshScope(elForSpot, scopes[keys.indexOf(keyForSpot)]);
      }
      for (let i = 0; i < adds.length; i++) {
        let [lastKey2, index] = adds[i];
        let lastEl = lastKey2 === "template" ? templateEl : lookup[lastKey2];
        if (lastEl._x_currentIfEl)
          lastEl = lastEl._x_currentIfEl;
        let scope2 = scopes[index];
        let key = keys[index];
        let clone2 = document.importNode(templateEl.content, true).firstElementChild;
        addScopeToNode(clone2, reactive(scope2), templateEl);
        mutateDom(() => {
          lastEl.after(clone2);
          initTree(clone2);
        });
        if (typeof key === "object") {
          warn("x-for key cannot be an object, it must be a string or an integer", templateEl);
        }
        lookup[key] = clone2;
      }
      for (let i = 0; i < sames.length; i++) {
        refreshScope(lookup[sames[i]], scopes[keys.indexOf(sames[i])]);
      }
      templateEl._x_prevKeys = keys;
    });
  }
  function parseForExpression(expression) {
    let forIteratorRE = /,([^,\}\]]*)(?:,([^,\}\]]*))?$/;
    let stripParensRE = /^\s*\(|\)\s*$/g;
    let forAliasRE = /([\s\S]*?)\s+(?:in|of)\s+([\s\S]*)/;
    let inMatch = expression.match(forAliasRE);
    if (!inMatch)
      return;
    let res = {};
    res.items = inMatch[2].trim();
    let item = inMatch[1].replace(stripParensRE, "").trim();
    let iteratorMatch = item.match(forIteratorRE);
    if (iteratorMatch) {
      res.item = item.replace(forIteratorRE, "").trim();
      res.index = iteratorMatch[1].trim();
      if (iteratorMatch[2]) {
        res.collection = iteratorMatch[2].trim();
      }
    } else {
      res.item = item;
    }
    return res;
  }
  function getIterationScopeVariables(iteratorNames, item, index, items) {
    let scopeVariables = {};
    if (/^\[.*\]$/.test(iteratorNames.item) && Array.isArray(item)) {
      let names = iteratorNames.item.replace("[", "").replace("]", "").split(",").map((i) => i.trim());
      names.forEach((name, i) => {
        scopeVariables[name] = item[i];
      });
    } else if (/^\{.*\}$/.test(iteratorNames.item) && !Array.isArray(item) && typeof item === "object") {
      let names = iteratorNames.item.replace("{", "").replace("}", "").split(",").map((i) => i.trim());
      names.forEach((name) => {
        scopeVariables[name] = item[name];
      });
    } else {
      scopeVariables[iteratorNames.item] = item;
    }
    if (iteratorNames.index)
      scopeVariables[iteratorNames.index] = index;
    if (iteratorNames.collection)
      scopeVariables[iteratorNames.collection] = items;
    return scopeVariables;
  }
  function isNumeric3(subject) {
    return !Array.isArray(subject) && !isNaN(subject);
  }
  function handler2() {
  }
  handler2.inline = (el, { expression }, { cleanup: cleanup2 }) => {
    let root = closestRoot(el);
    if (!root._x_refs)
      root._x_refs = {};
    root._x_refs[expression] = el;
    cleanup2(() => delete root._x_refs[expression]);
  };
  directive("ref", handler2);
  directive("if", (el, { expression }, { effect: effect3, cleanup: cleanup2 }) => {
    let evaluate2 = evaluateLater(el, expression);
    let show = () => {
      if (el._x_currentIfEl)
        return el._x_currentIfEl;
      let clone2 = el.content.cloneNode(true).firstElementChild;
      addScopeToNode(clone2, {}, el);
      mutateDom(() => {
        el.after(clone2);
        initTree(clone2);
      });
      el._x_currentIfEl = clone2;
      el._x_undoIf = () => {
        walk(clone2, (node) => {
          if (!!node._x_effects) {
            node._x_effects.forEach(dequeueJob);
          }
        });
        clone2.remove();
        delete el._x_currentIfEl;
      };
      return clone2;
    };
    let hide = () => {
      if (!el._x_undoIf)
        return;
      el._x_undoIf();
      delete el._x_undoIf;
    };
    effect3(() => evaluate2((value) => {
      value ? show() : hide();
    }));
    cleanup2(() => el._x_undoIf && el._x_undoIf());
  });
  directive("id", (el, { expression }, { evaluate: evaluate2 }) => {
    let names = evaluate2(expression);
    names.forEach((name) => setIdRoot(el, name));
  });
  mapAttributes(startingWith("@", into(prefix("on:"))));
  directive("on", skipDuringClone((el, { value, modifiers, expression }, { cleanup: cleanup2 }) => {
    let evaluate2 = expression ? evaluateLater(el, expression) : () => {
    };
    if (el.tagName.toLowerCase() === "template") {
      if (!el._x_forwardEvents)
        el._x_forwardEvents = [];
      if (!el._x_forwardEvents.includes(value))
        el._x_forwardEvents.push(value);
    }
    let removeListener = on(el, value, modifiers, (e) => {
      evaluate2(() => {
      }, { scope: { $event: e }, params: [e] });
    });
    cleanup2(() => removeListener());
  }));
  warnMissingPluginDirective("Collapse", "collapse", "collapse");
  warnMissingPluginDirective("Intersect", "intersect", "intersect");
  warnMissingPluginDirective("Focus", "trap", "focus");
  warnMissingPluginDirective("Mask", "mask", "mask");
  function warnMissingPluginDirective(name, directiveName2, slug) {
    directive(directiveName2, (el) => warn(`You can't use [x-${directiveName2}] without first installing the "${name}" plugin here: https://alpinejs.dev/plugins/${slug}`, el));
  }
  alpine_default.setEvaluator(normalEvaluator);
  alpine_default.setReactivityEngine({ reactive: reactive2, effect: effect2, release: stop, raw: toRaw });
  var src_default = alpine_default;
  var module_default = src_default;

  // node_modules/@alpinejs/intersect/dist/module.esm.js
  function src_default2(Alpine2) {
    Alpine2.directive("intersect", (el, { value, expression, modifiers }, { evaluateLater: evaluateLater2, cleanup: cleanup2 }) => {
      let evaluate2 = evaluateLater2(expression);
      let options = {
        rootMargin: getRootMargin(modifiers),
        threshold: getThreshhold(modifiers)
      };
      let observer2 = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting === (value === "leave"))
            return;
          evaluate2();
          modifiers.includes("once") && observer2.disconnect();
        });
      }, options);
      observer2.observe(el);
      cleanup2(() => {
        observer2.disconnect();
      });
    });
  }
  function getThreshhold(modifiers) {
    if (modifiers.includes("full"))
      return 0.99;
    if (modifiers.includes("half"))
      return 0.5;
    if (!modifiers.includes("threshold"))
      return 0;
    let threshold = modifiers[modifiers.indexOf("threshold") + 1];
    if (threshold === "100")
      return 1;
    if (threshold === "0")
      return 0;
    return Number(`.${threshold}`);
  }
  function getLengthValue(rawValue) {
    let match = rawValue.match(/^(-?[0-9]+)(px|%)?$/);
    return match ? match[1] + (match[2] || "px") : void 0;
  }
  function getRootMargin(modifiers) {
    const key = "margin";
    const fallback = "0px 0px 0px 0px";
    const index = modifiers.indexOf(key);
    if (index === -1)
      return fallback;
    let values = [];
    for (let i = 1; i < 5; i++) {
      values.push(getLengthValue(modifiers[index + i] || ""));
    }
    values = values.filter((v) => v !== void 0);
    return values.length ? values.join(" ").trim() : fallback;
  }
  var module_default2 = src_default2;

  // node_modules/lightgallery/lightgallery.es5.js
  var __assign = function() {
    __assign = Object.assign || function __assign4(t) {
      for (var s, i = 1, n = arguments.length; i < n; i++) {
        s = arguments[i];
        for (var p in s)
          if (Object.prototype.hasOwnProperty.call(s, p))
            t[p] = s[p];
      }
      return t;
    };
    return __assign.apply(this, arguments);
  };
  function __spreadArrays() {
    for (var s = 0, i = 0, il = arguments.length; i < il; i++)
      s += arguments[i].length;
    for (var r = Array(s), k = 0, i = 0; i < il; i++)
      for (var a = arguments[i], j = 0, jl = a.length; j < jl; j++, k++)
        r[k] = a[j];
    return r;
  }
  var lGEvents = {
    afterAppendSlide: "lgAfterAppendSlide",
    init: "lgInit",
    hasVideo: "lgHasVideo",
    containerResize: "lgContainerResize",
    updateSlides: "lgUpdateSlides",
    afterAppendSubHtml: "lgAfterAppendSubHtml",
    beforeOpen: "lgBeforeOpen",
    afterOpen: "lgAfterOpen",
    slideItemLoad: "lgSlideItemLoad",
    beforeSlide: "lgBeforeSlide",
    afterSlide: "lgAfterSlide",
    posterClick: "lgPosterClick",
    dragStart: "lgDragStart",
    dragMove: "lgDragMove",
    dragEnd: "lgDragEnd",
    beforeNextSlide: "lgBeforeNextSlide",
    beforePrevSlide: "lgBeforePrevSlide",
    beforeClose: "lgBeforeClose",
    afterClose: "lgAfterClose",
    rotateLeft: "lgRotateLeft",
    rotateRight: "lgRotateRight",
    flipHorizontal: "lgFlipHorizontal",
    flipVertical: "lgFlipVertical",
    autoplay: "lgAutoplay",
    autoplayStart: "lgAutoplayStart",
    autoplayStop: "lgAutoplayStop"
  };
  var lightGalleryCoreSettings = {
    mode: "lg-slide",
    easing: "ease",
    speed: 400,
    licenseKey: "0000-0000-000-0000",
    height: "100%",
    width: "100%",
    addClass: "",
    startClass: "lg-start-zoom",
    backdropDuration: 300,
    container: "",
    startAnimationDuration: 400,
    zoomFromOrigin: true,
    hideBarsDelay: 0,
    showBarsAfter: 1e4,
    slideDelay: 0,
    supportLegacyBrowser: true,
    allowMediaOverlap: false,
    videoMaxSize: "1280-720",
    loadYouTubePoster: true,
    defaultCaptionHeight: 0,
    ariaLabelledby: "",
    ariaDescribedby: "",
    resetScrollPosition: true,
    hideScrollbar: false,
    closable: true,
    swipeToClose: true,
    closeOnTap: true,
    showCloseIcon: true,
    showMaximizeIcon: false,
    loop: true,
    escKey: true,
    keyPress: true,
    trapFocus: true,
    controls: true,
    slideEndAnimation: true,
    hideControlOnEnd: false,
    mousewheel: false,
    getCaptionFromTitleOrAlt: true,
    appendSubHtmlTo: ".lg-sub-html",
    subHtmlSelectorRelative: false,
    preload: 2,
    numberOfSlideItemsInDom: 10,
    selector: "",
    selectWithin: "",
    nextHtml: "",
    prevHtml: "",
    index: 0,
    iframeWidth: "100%",
    iframeHeight: "100%",
    iframeMaxWidth: "100%",
    iframeMaxHeight: "100%",
    download: true,
    counter: true,
    appendCounterTo: ".lg-toolbar",
    swipeThreshold: 50,
    enableSwipe: true,
    enableDrag: true,
    dynamic: false,
    dynamicEl: [],
    extraProps: [],
    exThumbImage: "",
    isMobile: void 0,
    mobileSettings: {
      controls: false,
      showCloseIcon: false,
      download: false
    },
    plugins: [],
    strings: {
      closeGallery: "Close gallery",
      toggleMaximize: "Toggle maximize",
      previousSlide: "Previous slide",
      nextSlide: "Next slide",
      download: "Download",
      playVideo: "Play video"
    }
  };
  function initLgPolyfills() {
    (function() {
      if (typeof window.CustomEvent === "function")
        return false;
      function CustomEvent2(event, params) {
        params = params || {
          bubbles: false,
          cancelable: false,
          detail: null
        };
        var evt = document.createEvent("CustomEvent");
        evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
        return evt;
      }
      window.CustomEvent = CustomEvent2;
    })();
    (function() {
      if (!Element.prototype.matches) {
        Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
      }
    })();
  }
  var lgQuery = function() {
    function lgQuery2(selector) {
      this.cssVenderPrefixes = [
        "TransitionDuration",
        "TransitionTimingFunction",
        "Transform",
        "Transition"
      ];
      this.selector = this._getSelector(selector);
      this.firstElement = this._getFirstEl();
      return this;
    }
    lgQuery2.generateUUID = function() {
      return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0, v = c == "x" ? r : r & 3 | 8;
        return v.toString(16);
      });
    };
    lgQuery2.prototype._getSelector = function(selector, context) {
      if (context === void 0) {
        context = document;
      }
      if (typeof selector !== "string") {
        return selector;
      }
      context = context || document;
      var fl = selector.substring(0, 1);
      if (fl === "#") {
        return context.querySelector(selector);
      } else {
        return context.querySelectorAll(selector);
      }
    };
    lgQuery2.prototype._each = function(func) {
      if (!this.selector) {
        return this;
      }
      if (this.selector.length !== void 0) {
        [].forEach.call(this.selector, func);
      } else {
        func(this.selector, 0);
      }
      return this;
    };
    lgQuery2.prototype._setCssVendorPrefix = function(el, cssProperty, value) {
      var property = cssProperty.replace(/-([a-z])/gi, function(s, group1) {
        return group1.toUpperCase();
      });
      if (this.cssVenderPrefixes.indexOf(property) !== -1) {
        el.style[property.charAt(0).toLowerCase() + property.slice(1)] = value;
        el.style["webkit" + property] = value;
        el.style["moz" + property] = value;
        el.style["ms" + property] = value;
        el.style["o" + property] = value;
      } else {
        el.style[property] = value;
      }
    };
    lgQuery2.prototype._getFirstEl = function() {
      if (this.selector && this.selector.length !== void 0) {
        return this.selector[0];
      } else {
        return this.selector;
      }
    };
    lgQuery2.prototype.isEventMatched = function(event, eventName) {
      var eventNamespace = eventName.split(".");
      return event.split(".").filter(function(e) {
        return e;
      }).every(function(e) {
        return eventNamespace.indexOf(e) !== -1;
      });
    };
    lgQuery2.prototype.attr = function(attr, value) {
      if (value === void 0) {
        if (!this.firstElement) {
          return "";
        }
        return this.firstElement.getAttribute(attr);
      }
      this._each(function(el) {
        el.setAttribute(attr, value);
      });
      return this;
    };
    lgQuery2.prototype.find = function(selector) {
      return $LG(this._getSelector(selector, this.selector));
    };
    lgQuery2.prototype.first = function() {
      if (this.selector && this.selector.length !== void 0) {
        return $LG(this.selector[0]);
      } else {
        return $LG(this.selector);
      }
    };
    lgQuery2.prototype.eq = function(index) {
      return $LG(this.selector[index]);
    };
    lgQuery2.prototype.parent = function() {
      return $LG(this.selector.parentElement);
    };
    lgQuery2.prototype.get = function() {
      return this._getFirstEl();
    };
    lgQuery2.prototype.removeAttr = function(attributes) {
      var attrs = attributes.split(" ");
      this._each(function(el) {
        attrs.forEach(function(attr) {
          return el.removeAttribute(attr);
        });
      });
      return this;
    };
    lgQuery2.prototype.wrap = function(className) {
      if (!this.firstElement) {
        return this;
      }
      var wrapper = document.createElement("div");
      wrapper.className = className;
      this.firstElement.parentNode.insertBefore(wrapper, this.firstElement);
      this.firstElement.parentNode.removeChild(this.firstElement);
      wrapper.appendChild(this.firstElement);
      return this;
    };
    lgQuery2.prototype.addClass = function(classNames) {
      if (classNames === void 0) {
        classNames = "";
      }
      this._each(function(el) {
        classNames.split(" ").forEach(function(className) {
          if (className) {
            el.classList.add(className);
          }
        });
      });
      return this;
    };
    lgQuery2.prototype.removeClass = function(classNames) {
      this._each(function(el) {
        classNames.split(" ").forEach(function(className) {
          if (className) {
            el.classList.remove(className);
          }
        });
      });
      return this;
    };
    lgQuery2.prototype.hasClass = function(className) {
      if (!this.firstElement) {
        return false;
      }
      return this.firstElement.classList.contains(className);
    };
    lgQuery2.prototype.hasAttribute = function(attribute) {
      if (!this.firstElement) {
        return false;
      }
      return this.firstElement.hasAttribute(attribute);
    };
    lgQuery2.prototype.toggleClass = function(className) {
      if (!this.firstElement) {
        return this;
      }
      if (this.hasClass(className)) {
        this.removeClass(className);
      } else {
        this.addClass(className);
      }
      return this;
    };
    lgQuery2.prototype.css = function(property, value) {
      var _this = this;
      this._each(function(el) {
        _this._setCssVendorPrefix(el, property, value);
      });
      return this;
    };
    lgQuery2.prototype.on = function(events, listener) {
      var _this = this;
      if (!this.selector) {
        return this;
      }
      events.split(" ").forEach(function(event) {
        if (!Array.isArray(lgQuery2.eventListeners[event])) {
          lgQuery2.eventListeners[event] = [];
        }
        lgQuery2.eventListeners[event].push(listener);
        _this.selector.addEventListener(event.split(".")[0], listener);
      });
      return this;
    };
    lgQuery2.prototype.once = function(event, listener) {
      var _this = this;
      this.on(event, function() {
        _this.off(event);
        listener(event);
      });
      return this;
    };
    lgQuery2.prototype.off = function(event) {
      var _this = this;
      if (!this.selector) {
        return this;
      }
      Object.keys(lgQuery2.eventListeners).forEach(function(eventName) {
        if (_this.isEventMatched(event, eventName)) {
          lgQuery2.eventListeners[eventName].forEach(function(listener) {
            _this.selector.removeEventListener(eventName.split(".")[0], listener);
          });
          lgQuery2.eventListeners[eventName] = [];
        }
      });
      return this;
    };
    lgQuery2.prototype.trigger = function(event, detail) {
      if (!this.firstElement) {
        return this;
      }
      var customEvent = new CustomEvent(event.split(".")[0], {
        detail: detail || null
      });
      this.firstElement.dispatchEvent(customEvent);
      return this;
    };
    lgQuery2.prototype.load = function(url) {
      var _this = this;
      fetch(url).then(function(res) {
        return res.text();
      }).then(function(html) {
        _this.selector.innerHTML = html;
      });
      return this;
    };
    lgQuery2.prototype.html = function(html) {
      if (html === void 0) {
        if (!this.firstElement) {
          return "";
        }
        return this.firstElement.innerHTML;
      }
      this._each(function(el) {
        el.innerHTML = html;
      });
      return this;
    };
    lgQuery2.prototype.append = function(html) {
      this._each(function(el) {
        if (typeof html === "string") {
          el.insertAdjacentHTML("beforeend", html);
        } else {
          el.appendChild(html);
        }
      });
      return this;
    };
    lgQuery2.prototype.prepend = function(html) {
      this._each(function(el) {
        el.insertAdjacentHTML("afterbegin", html);
      });
      return this;
    };
    lgQuery2.prototype.remove = function() {
      this._each(function(el) {
        el.parentNode.removeChild(el);
      });
      return this;
    };
    lgQuery2.prototype.empty = function() {
      this._each(function(el) {
        el.innerHTML = "";
      });
      return this;
    };
    lgQuery2.prototype.scrollTop = function(scrollTop) {
      if (scrollTop !== void 0) {
        document.body.scrollTop = scrollTop;
        document.documentElement.scrollTop = scrollTop;
        return this;
      } else {
        return window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
      }
    };
    lgQuery2.prototype.scrollLeft = function(scrollLeft) {
      if (scrollLeft !== void 0) {
        document.body.scrollLeft = scrollLeft;
        document.documentElement.scrollLeft = scrollLeft;
        return this;
      } else {
        return window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft || 0;
      }
    };
    lgQuery2.prototype.offset = function() {
      if (!this.firstElement) {
        return {
          left: 0,
          top: 0
        };
      }
      var rect = this.firstElement.getBoundingClientRect();
      var bodyMarginLeft = $LG("body").style().marginLeft;
      return {
        left: rect.left - parseFloat(bodyMarginLeft) + this.scrollLeft(),
        top: rect.top + this.scrollTop()
      };
    };
    lgQuery2.prototype.style = function() {
      if (!this.firstElement) {
        return {};
      }
      return this.firstElement.currentStyle || window.getComputedStyle(this.firstElement);
    };
    lgQuery2.prototype.width = function() {
      var style = this.style();
      return this.firstElement.clientWidth - parseFloat(style.paddingLeft) - parseFloat(style.paddingRight);
    };
    lgQuery2.prototype.height = function() {
      var style = this.style();
      return this.firstElement.clientHeight - parseFloat(style.paddingTop) - parseFloat(style.paddingBottom);
    };
    lgQuery2.eventListeners = {};
    return lgQuery2;
  }();
  function $LG(selector) {
    initLgPolyfills();
    return new lgQuery(selector);
  }
  var defaultDynamicOptions = [
    "src",
    "sources",
    "subHtml",
    "subHtmlUrl",
    "html",
    "video",
    "poster",
    "slideName",
    "responsive",
    "srcset",
    "sizes",
    "iframe",
    "downloadUrl",
    "download",
    "width",
    "facebookShareUrl",
    "tweetText",
    "iframeTitle",
    "twitterShareUrl",
    "pinterestShareUrl",
    "pinterestText",
    "fbHtml",
    "disqusIdentifier",
    "disqusUrl"
  ];
  function convertToData(attr) {
    if (attr === "href") {
      return "src";
    }
    attr = attr.replace("data-", "");
    attr = attr.charAt(0).toLowerCase() + attr.slice(1);
    attr = attr.replace(/-([a-z])/g, function(g) {
      return g[1].toUpperCase();
    });
    return attr;
  }
  var utils = {
    getSize: function(el, container, spacing, defaultLgSize) {
      if (spacing === void 0) {
        spacing = 0;
      }
      var LGel = $LG(el);
      var lgSize = LGel.attr("data-lg-size") || defaultLgSize;
      if (!lgSize) {
        return;
      }
      var isResponsiveSizes = lgSize.split(",");
      if (isResponsiveSizes[1]) {
        var wWidth = window.innerWidth;
        for (var i = 0; i < isResponsiveSizes.length; i++) {
          var size_1 = isResponsiveSizes[i];
          var responsiveWidth = parseInt(size_1.split("-")[2], 10);
          if (responsiveWidth > wWidth) {
            lgSize = size_1;
            break;
          }
          if (i === isResponsiveSizes.length - 1) {
            lgSize = size_1;
          }
        }
      }
      var size2 = lgSize.split("-");
      var width = parseInt(size2[0], 10);
      var height = parseInt(size2[1], 10);
      var cWidth = container.width();
      var cHeight = container.height() - spacing;
      var maxWidth = Math.min(cWidth, width);
      var maxHeight = Math.min(cHeight, height);
      var ratio = Math.min(maxWidth / width, maxHeight / height);
      return { width: width * ratio, height: height * ratio };
    },
    getTransform: function(el, container, top, bottom, imageSize) {
      if (!imageSize) {
        return;
      }
      var LGel = $LG(el).find("img").first();
      if (!LGel.get()) {
        return;
      }
      var containerRect = container.get().getBoundingClientRect();
      var wWidth = containerRect.width;
      var wHeight = container.height() - (top + bottom);
      var elWidth = LGel.width();
      var elHeight = LGel.height();
      var elStyle = LGel.style();
      var x = (wWidth - elWidth) / 2 - LGel.offset().left + (parseFloat(elStyle.paddingLeft) || 0) + (parseFloat(elStyle.borderLeft) || 0) + $LG(window).scrollLeft() + containerRect.left;
      var y = (wHeight - elHeight) / 2 - LGel.offset().top + (parseFloat(elStyle.paddingTop) || 0) + (parseFloat(elStyle.borderTop) || 0) + $LG(window).scrollTop() + top;
      var scX = elWidth / imageSize.width;
      var scY = elHeight / imageSize.height;
      var transform = "translate3d(" + (x *= -1) + "px, " + (y *= -1) + "px, 0) scale3d(" + scX + ", " + scY + ", 1)";
      return transform;
    },
    getIframeMarkup: function(iframeWidth, iframeHeight, iframeMaxWidth, iframeMaxHeight, src, iframeTitle) {
      var title = iframeTitle ? 'title="' + iframeTitle + '"' : "";
      return '<div class="lg-video-cont lg-has-iframe" style="width:' + iframeWidth + "; max-width:" + iframeMaxWidth + "; height: " + iframeHeight + "; max-height:" + iframeMaxHeight + '">\n                    <iframe class="lg-object" frameborder="0" ' + title + ' src="' + src + '"  allowfullscreen="true"></iframe>\n                </div>';
    },
    getImgMarkup: function(index, src, altAttr, srcset, sizes, sources) {
      var srcsetAttr = srcset ? 'srcset="' + srcset + '"' : "";
      var sizesAttr = sizes ? 'sizes="' + sizes + '"' : "";
      var imgMarkup = "<img " + altAttr + " " + srcsetAttr + "  " + sizesAttr + ' class="lg-object lg-image" data-index="' + index + '" src="' + src + '" />';
      var sourceTag = "";
      if (sources) {
        var sourceObj = typeof sources === "string" ? JSON.parse(sources) : sources;
        sourceTag = sourceObj.map(function(source) {
          var attrs = "";
          Object.keys(source).forEach(function(key) {
            attrs += " " + key + '="' + source[key] + '"';
          });
          return "<source " + attrs + "></source>";
        });
      }
      return "" + sourceTag + imgMarkup;
    },
    getResponsiveSrc: function(srcItms) {
      var rsWidth = [];
      var rsSrc = [];
      var src = "";
      for (var i = 0; i < srcItms.length; i++) {
        var _src = srcItms[i].split(" ");
        if (_src[0] === "") {
          _src.splice(0, 1);
        }
        rsSrc.push(_src[0]);
        rsWidth.push(_src[1]);
      }
      var wWidth = window.innerWidth;
      for (var j = 0; j < rsWidth.length; j++) {
        if (parseInt(rsWidth[j], 10) > wWidth) {
          src = rsSrc[j];
          break;
        }
      }
      return src;
    },
    isImageLoaded: function(img) {
      if (!img)
        return false;
      if (!img.complete) {
        return false;
      }
      if (img.naturalWidth === 0) {
        return false;
      }
      return true;
    },
    getVideoPosterMarkup: function(_poster, dummyImg, videoContStyle, playVideoString, _isVideo) {
      var videoClass = "";
      if (_isVideo && _isVideo.youtube) {
        videoClass = "lg-has-youtube";
      } else if (_isVideo && _isVideo.vimeo) {
        videoClass = "lg-has-vimeo";
      } else {
        videoClass = "lg-has-html5";
      }
      return '<div class="lg-video-cont ' + videoClass + '" style="' + videoContStyle + '">\n                <div class="lg-video-play-button">\n                <svg\n                    viewBox="0 0 20 20"\n                    preserveAspectRatio="xMidYMid"\n                    focusable="false"\n                    aria-labelledby="' + playVideoString + '"\n                    role="img"\n                    class="lg-video-play-icon"\n                >\n                    <title>' + playVideoString + '</title>\n                    <polygon class="lg-video-play-icon-inner" points="1,0 20,10 1,20"></polygon>\n                </svg>\n                <svg class="lg-video-play-icon-bg" viewBox="0 0 50 50" focusable="false">\n                    <circle cx="50%" cy="50%" r="20"></circle></svg>\n                <svg class="lg-video-play-icon-circle" viewBox="0 0 50 50" focusable="false">\n                    <circle cx="50%" cy="50%" r="20"></circle>\n                </svg>\n            </div>\n            ' + (dummyImg || "") + '\n            <img class="lg-object lg-video-poster" src="' + _poster + '" />\n        </div>';
    },
    getFocusableElements: function(container) {
      var elements = container.querySelectorAll('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])');
      var visibleElements = [].filter.call(elements, function(element) {
        var style = window.getComputedStyle(element);
        return style.display !== "none" && style.visibility !== "hidden";
      });
      return visibleElements;
    },
    getDynamicOptions: function(items, extraProps, getCaptionFromTitleOrAlt, exThumbImage) {
      var dynamicElements = [];
      var availableDynamicOptions = __spreadArrays(defaultDynamicOptions, extraProps);
      [].forEach.call(items, function(item) {
        var dynamicEl = {};
        for (var i = 0; i < item.attributes.length; i++) {
          var attr = item.attributes[i];
          if (attr.specified) {
            var dynamicAttr = convertToData(attr.name);
            var label = "";
            if (availableDynamicOptions.indexOf(dynamicAttr) > -1) {
              label = dynamicAttr;
            }
            if (label) {
              dynamicEl[label] = attr.value;
            }
          }
        }
        var currentItem = $LG(item);
        var alt = currentItem.find("img").first().attr("alt");
        var title = currentItem.attr("title");
        var thumb = exThumbImage ? currentItem.attr(exThumbImage) : currentItem.find("img").first().attr("src");
        dynamicEl.thumb = thumb;
        if (getCaptionFromTitleOrAlt && !dynamicEl.subHtml) {
          dynamicEl.subHtml = title || alt || "";
        }
        dynamicEl.alt = alt || title || "";
        dynamicElements.push(dynamicEl);
      });
      return dynamicElements;
    },
    isMobile: function() {
      return /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    },
    isVideo: function(src, isHTML5VIdeo, index) {
      if (!src) {
        if (isHTML5VIdeo) {
          return {
            html5: true
          };
        } else {
          console.error("lightGallery :- data-src is not provided on slide item " + (index + 1) + ". Please make sure the selector property is properly configured. More info - https://www.lightgalleryjs.com/demos/html-markup/");
          return;
        }
      }
      var youtube = src.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com|be-nocookie\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-\_\%]+)([\&|?][\S]*)*/i);
      var vimeo = src.match(/\/\/(?:www\.)?(?:player\.)?vimeo.com\/(?:video\/)?([0-9a-z\-_]+)(.*)?/i);
      var wistia = src.match(/https?:\/\/(.+)?(wistia\.com|wi\.st)\/(medias|embed)\/([0-9a-z\-_]+)(.*)/);
      if (youtube) {
        return {
          youtube
        };
      } else if (vimeo) {
        return {
          vimeo
        };
      } else if (wistia) {
        return {
          wistia
        };
      }
    }
  };
  var lgId = 0;
  var LightGallery = function() {
    function LightGallery2(element, options) {
      this.lgOpened = false;
      this.index = 0;
      this.plugins = [];
      this.lGalleryOn = false;
      this.lgBusy = false;
      this.currentItemsInDom = [];
      this.prevScrollTop = 0;
      this.bodyPaddingRight = 0;
      this.isDummyImageRemoved = false;
      this.dragOrSwipeEnabled = false;
      this.mediaContainerPosition = {
        top: 0,
        bottom: 0
      };
      if (!element) {
        return this;
      }
      lgId++;
      this.lgId = lgId;
      this.el = element;
      this.LGel = $LG(element);
      this.generateSettings(options);
      this.buildModules();
      if (this.settings.dynamic && this.settings.dynamicEl !== void 0 && !Array.isArray(this.settings.dynamicEl)) {
        throw "When using dynamic mode, you must also define dynamicEl as an Array.";
      }
      this.galleryItems = this.getItems();
      this.normalizeSettings();
      this.init();
      this.validateLicense();
      return this;
    }
    LightGallery2.prototype.generateSettings = function(options) {
      this.settings = __assign(__assign({}, lightGalleryCoreSettings), options);
      if (this.settings.isMobile && typeof this.settings.isMobile === "function" ? this.settings.isMobile() : utils.isMobile()) {
        var mobileSettings = __assign(__assign({}, this.settings.mobileSettings), this.settings.mobileSettings);
        this.settings = __assign(__assign({}, this.settings), mobileSettings);
      }
    };
    LightGallery2.prototype.normalizeSettings = function() {
      if (this.settings.slideEndAnimation) {
        this.settings.hideControlOnEnd = false;
      }
      if (!this.settings.closable) {
        this.settings.swipeToClose = false;
      }
      this.zoomFromOrigin = this.settings.zoomFromOrigin;
      if (this.settings.dynamic) {
        this.zoomFromOrigin = false;
      }
      if (!this.settings.container) {
        this.settings.container = document.body;
      }
      this.settings.preload = Math.min(this.settings.preload, this.galleryItems.length);
    };
    LightGallery2.prototype.init = function() {
      var _this = this;
      this.addSlideVideoInfo(this.galleryItems);
      this.buildStructure();
      this.LGel.trigger(lGEvents.init, {
        instance: this
      });
      if (this.settings.keyPress) {
        this.keyPress();
      }
      setTimeout(function() {
        _this.enableDrag();
        _this.enableSwipe();
        _this.triggerPosterClick();
      }, 50);
      this.arrow();
      if (this.settings.mousewheel) {
        this.mousewheel();
      }
      if (!this.settings.dynamic) {
        this.openGalleryOnItemClick();
      }
    };
    LightGallery2.prototype.openGalleryOnItemClick = function() {
      var _this = this;
      var _loop_1 = function(index2) {
        var element = this_1.items[index2];
        var $element = $LG(element);
        var uuid = lgQuery.generateUUID();
        $element.attr("data-lg-id", uuid).on("click.lgcustom-item-" + uuid, function(e) {
          e.preventDefault();
          var currentItemIndex = _this.settings.index || index2;
          _this.openGallery(currentItemIndex, element);
        });
      };
      var this_1 = this;
      for (var index = 0; index < this.items.length; index++) {
        _loop_1(index);
      }
    };
    LightGallery2.prototype.buildModules = function() {
      var _this = this;
      this.settings.plugins.forEach(function(plugin2) {
        _this.plugins.push(new plugin2(_this, $LG));
      });
    };
    LightGallery2.prototype.validateLicense = function() {
      if (!this.settings.licenseKey) {
        console.error("Please provide a valid license key");
      } else if (this.settings.licenseKey === "0000-0000-000-0000") {
        console.warn("lightGallery: " + this.settings.licenseKey + " license key is not valid for production use");
      }
    };
    LightGallery2.prototype.getSlideItem = function(index) {
      return $LG(this.getSlideItemId(index));
    };
    LightGallery2.prototype.getSlideItemId = function(index) {
      return "#lg-item-" + this.lgId + "-" + index;
    };
    LightGallery2.prototype.getIdName = function(id) {
      return id + "-" + this.lgId;
    };
    LightGallery2.prototype.getElementById = function(id) {
      return $LG("#" + this.getIdName(id));
    };
    LightGallery2.prototype.manageSingleSlideClassName = function() {
      if (this.galleryItems.length < 2) {
        this.outer.addClass("lg-single-item");
      } else {
        this.outer.removeClass("lg-single-item");
      }
    };
    LightGallery2.prototype.buildStructure = function() {
      var _this = this;
      var container = this.$container && this.$container.get();
      if (container) {
        return;
      }
      var controls = "";
      var subHtmlCont = "";
      if (this.settings.controls) {
        controls = '<button type="button" id="' + this.getIdName("lg-prev") + '" aria-label="' + this.settings.strings["previousSlide"] + '" class="lg-prev lg-icon"> ' + this.settings.prevHtml + ' </button>\n                <button type="button" id="' + this.getIdName("lg-next") + '" aria-label="' + this.settings.strings["nextSlide"] + '" class="lg-next lg-icon"> ' + this.settings.nextHtml + " </button>";
      }
      if (this.settings.appendSubHtmlTo !== ".lg-item") {
        subHtmlCont = '<div class="lg-sub-html" role="status" aria-live="polite"></div>';
      }
      var addClasses = "";
      if (this.settings.allowMediaOverlap) {
        addClasses += "lg-media-overlap ";
      }
      var ariaLabelledby = this.settings.ariaLabelledby ? 'aria-labelledby="' + this.settings.ariaLabelledby + '"' : "";
      var ariaDescribedby = this.settings.ariaDescribedby ? 'aria-describedby="' + this.settings.ariaDescribedby + '"' : "";
      var containerClassName = "lg-container " + this.settings.addClass + " " + (document.body !== this.settings.container ? "lg-inline" : "");
      var closeIcon = this.settings.closable && this.settings.showCloseIcon ? '<button type="button" aria-label="' + this.settings.strings["closeGallery"] + '" id="' + this.getIdName("lg-close") + '" class="lg-close lg-icon"></button>' : "";
      var maximizeIcon = this.settings.showMaximizeIcon ? '<button type="button" aria-label="' + this.settings.strings["toggleMaximize"] + '" id="' + this.getIdName("lg-maximize") + '" class="lg-maximize lg-icon"></button>' : "";
      var template = '\n        <div class="' + containerClassName + '" id="' + this.getIdName("lg-container") + '" tabindex="-1" aria-modal="true" ' + ariaLabelledby + " " + ariaDescribedby + ' role="dialog"\n        >\n            <div id="' + this.getIdName("lg-backdrop") + '" class="lg-backdrop"></div>\n\n            <div id="' + this.getIdName("lg-outer") + '" class="lg-outer lg-use-css3 lg-css3 lg-hide-items ' + addClasses + ' ">\n\n              <div id="' + this.getIdName("lg-content") + '" class="lg-content">\n                <div id="' + this.getIdName("lg-inner") + '" class="lg-inner">\n                </div>\n                ' + controls + '\n              </div>\n                <div id="' + this.getIdName("lg-toolbar") + '" class="lg-toolbar lg-group">\n                    ' + maximizeIcon + "\n                    " + closeIcon + "\n                    </div>\n                    " + (this.settings.appendSubHtmlTo === ".lg-outer" ? subHtmlCont : "") + '\n                <div id="' + this.getIdName("lg-components") + '" class="lg-components">\n                    ' + (this.settings.appendSubHtmlTo === ".lg-sub-html" ? subHtmlCont : "") + "\n                </div>\n            </div>\n        </div>\n        ";
      $LG(this.settings.container).append(template);
      if (document.body !== this.settings.container) {
        $LG(this.settings.container).css("position", "relative");
      }
      this.outer = this.getElementById("lg-outer");
      this.$lgComponents = this.getElementById("lg-components");
      this.$backdrop = this.getElementById("lg-backdrop");
      this.$container = this.getElementById("lg-container");
      this.$inner = this.getElementById("lg-inner");
      this.$content = this.getElementById("lg-content");
      this.$toolbar = this.getElementById("lg-toolbar");
      this.$backdrop.css("transition-duration", this.settings.backdropDuration + "ms");
      var outerClassNames = this.settings.mode + " ";
      this.manageSingleSlideClassName();
      if (this.settings.enableDrag) {
        outerClassNames += "lg-grab ";
      }
      this.outer.addClass(outerClassNames);
      this.$inner.css("transition-timing-function", this.settings.easing);
      this.$inner.css("transition-duration", this.settings.speed + "ms");
      if (this.settings.download) {
        this.$toolbar.append('<a id="' + this.getIdName("lg-download") + '" target="_blank" rel="noopener" aria-label="' + this.settings.strings["download"] + '" download class="lg-download lg-icon"></a>');
      }
      this.counter();
      $LG(window).on("resize.lg.global" + this.lgId + " orientationchange.lg.global" + this.lgId, function() {
        _this.refreshOnResize();
      });
      this.hideBars();
      this.manageCloseGallery();
      this.toggleMaximize();
      this.initModules();
    };
    LightGallery2.prototype.refreshOnResize = function() {
      if (this.lgOpened) {
        var currentGalleryItem = this.galleryItems[this.index];
        var __slideVideoInfo = currentGalleryItem.__slideVideoInfo;
        this.mediaContainerPosition = this.getMediaContainerPosition();
        var _a = this.mediaContainerPosition, top_1 = _a.top, bottom = _a.bottom;
        this.currentImageSize = utils.getSize(this.items[this.index], this.outer, top_1 + bottom, __slideVideoInfo && this.settings.videoMaxSize);
        if (__slideVideoInfo) {
          this.resizeVideoSlide(this.index, this.currentImageSize);
        }
        if (this.zoomFromOrigin && !this.isDummyImageRemoved) {
          var imgStyle = this.getDummyImgStyles(this.currentImageSize);
          this.outer.find(".lg-current .lg-dummy-img").first().attr("style", imgStyle);
        }
        this.LGel.trigger(lGEvents.containerResize);
      }
    };
    LightGallery2.prototype.resizeVideoSlide = function(index, imageSize) {
      var lgVideoStyle = this.getVideoContStyle(imageSize);
      var currentSlide = this.getSlideItem(index);
      currentSlide.find(".lg-video-cont").attr("style", lgVideoStyle);
    };
    LightGallery2.prototype.updateSlides = function(items, index) {
      if (this.index > items.length - 1) {
        this.index = items.length - 1;
      }
      if (items.length === 1) {
        this.index = 0;
      }
      if (!items.length) {
        this.closeGallery();
        return;
      }
      var currentSrc = this.galleryItems[index].src;
      this.galleryItems = items;
      this.updateControls();
      this.$inner.empty();
      this.currentItemsInDom = [];
      var _index = 0;
      this.galleryItems.some(function(galleryItem, itemIndex) {
        if (galleryItem.src === currentSrc) {
          _index = itemIndex;
          return true;
        }
        return false;
      });
      this.currentItemsInDom = this.organizeSlideItems(_index, -1);
      this.loadContent(_index, true);
      this.getSlideItem(_index).addClass("lg-current");
      this.index = _index;
      this.updateCurrentCounter(_index);
      this.LGel.trigger(lGEvents.updateSlides);
    };
    LightGallery2.prototype.getItems = function() {
      this.items = [];
      if (!this.settings.dynamic) {
        if (this.settings.selector === "this") {
          this.items.push(this.el);
        } else if (this.settings.selector) {
          if (typeof this.settings.selector === "string") {
            if (this.settings.selectWithin) {
              var selectWithin = $LG(this.settings.selectWithin);
              this.items = selectWithin.find(this.settings.selector).get();
            } else {
              this.items = this.el.querySelectorAll(this.settings.selector);
            }
          } else {
            this.items = this.settings.selector;
          }
        } else {
          this.items = this.el.children;
        }
        return utils.getDynamicOptions(this.items, this.settings.extraProps, this.settings.getCaptionFromTitleOrAlt, this.settings.exThumbImage);
      } else {
        return this.settings.dynamicEl || [];
      }
    };
    LightGallery2.prototype.shouldHideScrollbar = function() {
      return this.settings.hideScrollbar && document.body === this.settings.container;
    };
    LightGallery2.prototype.hideScrollbar = function() {
      if (!this.shouldHideScrollbar()) {
        return;
      }
      this.bodyPaddingRight = parseFloat($LG("body").style().paddingRight);
      var bodyRect = document.documentElement.getBoundingClientRect();
      var scrollbarWidth = window.innerWidth - bodyRect.width;
      $LG(document.body).css("padding-right", scrollbarWidth + this.bodyPaddingRight + "px");
      $LG(document.body).addClass("lg-overlay-open");
    };
    LightGallery2.prototype.resetScrollBar = function() {
      if (!this.shouldHideScrollbar()) {
        return;
      }
      $LG(document.body).css("padding-right", this.bodyPaddingRight + "px");
      $LG(document.body).removeClass("lg-overlay-open");
    };
    LightGallery2.prototype.openGallery = function(index, element) {
      var _this = this;
      if (index === void 0) {
        index = this.settings.index;
      }
      if (this.lgOpened)
        return;
      this.lgOpened = true;
      this.outer.removeClass("lg-hide-items");
      this.hideScrollbar();
      this.$container.addClass("lg-show");
      var itemsToBeInsertedToDom = this.getItemsToBeInsertedToDom(index, index);
      this.currentItemsInDom = itemsToBeInsertedToDom;
      var items = "";
      itemsToBeInsertedToDom.forEach(function(item) {
        items = items + ('<div id="' + item + '" class="lg-item"></div>');
      });
      this.$inner.append(items);
      this.addHtml(index);
      var transform = "";
      this.mediaContainerPosition = this.getMediaContainerPosition();
      var _a = this.mediaContainerPosition, top = _a.top, bottom = _a.bottom;
      if (!this.settings.allowMediaOverlap) {
        this.setMediaContainerPosition(top, bottom);
      }
      var __slideVideoInfo = this.galleryItems[index].__slideVideoInfo;
      if (this.zoomFromOrigin && element) {
        this.currentImageSize = utils.getSize(element, this.outer, top + bottom, __slideVideoInfo && this.settings.videoMaxSize);
        transform = utils.getTransform(element, this.outer, top, bottom, this.currentImageSize);
      }
      if (!this.zoomFromOrigin || !transform) {
        this.outer.addClass(this.settings.startClass);
        this.getSlideItem(index).removeClass("lg-complete");
      }
      var timeout = this.settings.zoomFromOrigin ? 100 : this.settings.backdropDuration;
      setTimeout(function() {
        _this.outer.addClass("lg-components-open");
      }, timeout);
      this.index = index;
      this.LGel.trigger(lGEvents.beforeOpen);
      this.getSlideItem(index).addClass("lg-current");
      this.lGalleryOn = false;
      this.prevScrollTop = $LG(window).scrollTop();
      setTimeout(function() {
        if (_this.zoomFromOrigin && transform) {
          var currentSlide_1 = _this.getSlideItem(index);
          currentSlide_1.css("transform", transform);
          setTimeout(function() {
            currentSlide_1.addClass("lg-start-progress lg-start-end-progress").css("transition-duration", _this.settings.startAnimationDuration + "ms");
            _this.outer.addClass("lg-zoom-from-image");
          });
          setTimeout(function() {
            currentSlide_1.css("transform", "translate3d(0, 0, 0)");
          }, 100);
        }
        setTimeout(function() {
          _this.$backdrop.addClass("in");
          _this.$container.addClass("lg-show-in");
        }, 10);
        setTimeout(function() {
          if (_this.settings.trapFocus && document.body === _this.settings.container) {
            _this.trapFocus();
          }
        }, _this.settings.backdropDuration + 50);
        if (!_this.zoomFromOrigin || !transform) {
          setTimeout(function() {
            _this.outer.addClass("lg-visible");
          }, _this.settings.backdropDuration);
        }
        _this.slide(index, false, false, false);
        _this.LGel.trigger(lGEvents.afterOpen);
      });
      if (document.body === this.settings.container) {
        $LG("html").addClass("lg-on");
      }
    };
    LightGallery2.prototype.getMediaContainerPosition = function() {
      if (this.settings.allowMediaOverlap) {
        return {
          top: 0,
          bottom: 0
        };
      }
      var top = this.$toolbar.get().clientHeight || 0;
      var subHtml = this.outer.find(".lg-components .lg-sub-html").get();
      var captionHeight = this.settings.defaultCaptionHeight || subHtml && subHtml.clientHeight || 0;
      var thumbContainer = this.outer.find(".lg-thumb-outer").get();
      var thumbHeight = thumbContainer ? thumbContainer.clientHeight : 0;
      var bottom = thumbHeight + captionHeight;
      return {
        top,
        bottom
      };
    };
    LightGallery2.prototype.setMediaContainerPosition = function(top, bottom) {
      if (top === void 0) {
        top = 0;
      }
      if (bottom === void 0) {
        bottom = 0;
      }
      this.$content.css("top", top + "px").css("bottom", bottom + "px");
    };
    LightGallery2.prototype.hideBars = function() {
      var _this = this;
      setTimeout(function() {
        _this.outer.removeClass("lg-hide-items");
        if (_this.settings.hideBarsDelay > 0) {
          _this.outer.on("mousemove.lg click.lg touchstart.lg", function() {
            _this.outer.removeClass("lg-hide-items");
            clearTimeout(_this.hideBarTimeout);
            _this.hideBarTimeout = setTimeout(function() {
              _this.outer.addClass("lg-hide-items");
            }, _this.settings.hideBarsDelay);
          });
          _this.outer.trigger("mousemove.lg");
        }
      }, this.settings.showBarsAfter);
    };
    LightGallery2.prototype.initPictureFill = function($img) {
      if (this.settings.supportLegacyBrowser) {
        try {
          picturefill({
            elements: [$img.get()]
          });
        } catch (e) {
          console.warn("lightGallery :- If you want srcset or picture tag to be supported for older browser please include picturefil javascript library in your document.");
        }
      }
    };
    LightGallery2.prototype.counter = function() {
      if (this.settings.counter) {
        var counterHtml = '<div class="lg-counter" role="status" aria-live="polite">\n                <span id="' + this.getIdName("lg-counter-current") + '" class="lg-counter-current">' + (this.index + 1) + ' </span> /\n                <span id="' + this.getIdName("lg-counter-all") + '" class="lg-counter-all">' + this.galleryItems.length + " </span></div>";
        this.outer.find(this.settings.appendCounterTo).append(counterHtml);
      }
    };
    LightGallery2.prototype.addHtml = function(index) {
      var subHtml;
      var subHtmlUrl;
      if (this.galleryItems[index].subHtmlUrl) {
        subHtmlUrl = this.galleryItems[index].subHtmlUrl;
      } else {
        subHtml = this.galleryItems[index].subHtml;
      }
      if (!subHtmlUrl) {
        if (subHtml) {
          var fL = subHtml.substring(0, 1);
          if (fL === "." || fL === "#") {
            if (this.settings.subHtmlSelectorRelative && !this.settings.dynamic) {
              subHtml = $LG(this.items).eq(index).find(subHtml).first().html();
            } else {
              subHtml = $LG(subHtml).first().html();
            }
          }
        } else {
          subHtml = "";
        }
      }
      if (this.settings.appendSubHtmlTo !== ".lg-item") {
        if (subHtmlUrl) {
          this.outer.find(".lg-sub-html").load(subHtmlUrl);
        } else {
          this.outer.find(".lg-sub-html").html(subHtml);
        }
      } else {
        var currentSlide = $LG(this.getSlideItemId(index));
        if (subHtmlUrl) {
          currentSlide.load(subHtmlUrl);
        } else {
          currentSlide.append('<div class="lg-sub-html">' + subHtml + "</div>");
        }
      }
      if (typeof subHtml !== "undefined" && subHtml !== null) {
        if (subHtml === "") {
          this.outer.find(this.settings.appendSubHtmlTo).addClass("lg-empty-html");
        } else {
          this.outer.find(this.settings.appendSubHtmlTo).removeClass("lg-empty-html");
        }
      }
      this.LGel.trigger(lGEvents.afterAppendSubHtml, {
        index
      });
    };
    LightGallery2.prototype.preload = function(index) {
      for (var i = 1; i <= this.settings.preload; i++) {
        if (i >= this.galleryItems.length - index) {
          break;
        }
        this.loadContent(index + i, false);
      }
      for (var j = 1; j <= this.settings.preload; j++) {
        if (index - j < 0) {
          break;
        }
        this.loadContent(index - j, false);
      }
    };
    LightGallery2.prototype.getDummyImgStyles = function(imageSize) {
      if (!imageSize)
        return "";
      return "width:" + imageSize.width + "px;\n                margin-left: -" + imageSize.width / 2 + "px;\n                margin-top: -" + imageSize.height / 2 + "px;\n                height:" + imageSize.height + "px";
    };
    LightGallery2.prototype.getVideoContStyle = function(imageSize) {
      if (!imageSize)
        return "";
      return "width:" + imageSize.width + "px;\n                height:" + imageSize.height + "px";
    };
    LightGallery2.prototype.getDummyImageContent = function($currentSlide, index, alt) {
      var $currentItem;
      if (!this.settings.dynamic) {
        $currentItem = $LG(this.items).eq(index);
      }
      if ($currentItem) {
        var _dummyImgSrc = void 0;
        if (!this.settings.exThumbImage) {
          _dummyImgSrc = $currentItem.find("img").first().attr("src");
        } else {
          _dummyImgSrc = $currentItem.attr(this.settings.exThumbImage);
        }
        if (!_dummyImgSrc)
          return "";
        var imgStyle = this.getDummyImgStyles(this.currentImageSize);
        var dummyImgContent = "<img " + alt + ' style="' + imgStyle + '" class="lg-dummy-img" src="' + _dummyImgSrc + '" />';
        $currentSlide.addClass("lg-first-slide");
        this.outer.addClass("lg-first-slide-loading");
        return dummyImgContent;
      }
      return "";
    };
    LightGallery2.prototype.setImgMarkup = function(src, $currentSlide, index) {
      var currentGalleryItem = this.galleryItems[index];
      var alt = currentGalleryItem.alt, srcset = currentGalleryItem.srcset, sizes = currentGalleryItem.sizes, sources = currentGalleryItem.sources;
      var imgContent = "";
      var altAttr = alt ? 'alt="' + alt + '"' : "";
      if (this.isFirstSlideWithZoomAnimation()) {
        imgContent = this.getDummyImageContent($currentSlide, index, altAttr);
      } else {
        imgContent = utils.getImgMarkup(index, src, altAttr, srcset, sizes, sources);
      }
      var imgMarkup = '<picture class="lg-img-wrap"> ' + imgContent + "</picture>";
      $currentSlide.prepend(imgMarkup);
    };
    LightGallery2.prototype.onSlideObjectLoad = function($slide, isHTML5VideoWithoutPoster, onLoad, onError) {
      var mediaObject = $slide.find(".lg-object").first();
      if (utils.isImageLoaded(mediaObject.get()) || isHTML5VideoWithoutPoster) {
        onLoad();
      } else {
        mediaObject.on("load.lg error.lg", function() {
          onLoad && onLoad();
        });
        mediaObject.on("error.lg", function() {
          onError && onError();
        });
      }
    };
    LightGallery2.prototype.onLgObjectLoad = function(currentSlide, index, delay, speed, isFirstSlide, isHTML5VideoWithoutPoster) {
      var _this = this;
      this.onSlideObjectLoad(currentSlide, isHTML5VideoWithoutPoster, function() {
        _this.triggerSlideItemLoad(currentSlide, index, delay, speed, isFirstSlide);
      }, function() {
        currentSlide.addClass("lg-complete lg-complete_");
        currentSlide.html('<span class="lg-error-msg">Oops... Failed to load content...</span>');
      });
    };
    LightGallery2.prototype.triggerSlideItemLoad = function($currentSlide, index, delay, speed, isFirstSlide) {
      var _this = this;
      var currentGalleryItem = this.galleryItems[index];
      var _speed = isFirstSlide && this.getSlideType(currentGalleryItem) === "video" && !currentGalleryItem.poster ? speed : 0;
      setTimeout(function() {
        $currentSlide.addClass("lg-complete lg-complete_");
        _this.LGel.trigger(lGEvents.slideItemLoad, {
          index,
          delay: delay || 0,
          isFirstSlide
        });
      }, _speed);
    };
    LightGallery2.prototype.isFirstSlideWithZoomAnimation = function() {
      return !!(!this.lGalleryOn && this.zoomFromOrigin && this.currentImageSize);
    };
    LightGallery2.prototype.addSlideVideoInfo = function(items) {
      var _this = this;
      items.forEach(function(element, index) {
        element.__slideVideoInfo = utils.isVideo(element.src, !!element.video, index);
        if (element.__slideVideoInfo && _this.settings.loadYouTubePoster && !element.poster && element.__slideVideoInfo.youtube) {
          element.poster = "//img.youtube.com/vi/" + element.__slideVideoInfo.youtube[1] + "/maxresdefault.jpg";
        }
      });
    };
    LightGallery2.prototype.loadContent = function(index, rec) {
      var _this = this;
      var currentGalleryItem = this.galleryItems[index];
      var $currentSlide = $LG(this.getSlideItemId(index));
      var poster = currentGalleryItem.poster, srcset = currentGalleryItem.srcset, sizes = currentGalleryItem.sizes, sources = currentGalleryItem.sources;
      var src = currentGalleryItem.src;
      var video = currentGalleryItem.video;
      var _html5Video = video && typeof video === "string" ? JSON.parse(video) : video;
      if (currentGalleryItem.responsive) {
        var srcDyItms = currentGalleryItem.responsive.split(",");
        src = utils.getResponsiveSrc(srcDyItms) || src;
      }
      var videoInfo = currentGalleryItem.__slideVideoInfo;
      var lgVideoStyle = "";
      var iframe = !!currentGalleryItem.iframe;
      var isFirstSlide = !this.lGalleryOn;
      var delay = 0;
      if (isFirstSlide) {
        if (this.zoomFromOrigin && this.currentImageSize) {
          delay = this.settings.startAnimationDuration + 10;
        } else {
          delay = this.settings.backdropDuration + 10;
        }
      }
      if (!$currentSlide.hasClass("lg-loaded")) {
        if (videoInfo) {
          var _a = this.mediaContainerPosition, top_2 = _a.top, bottom = _a.bottom;
          var videoSize = utils.getSize(this.items[index], this.outer, top_2 + bottom, videoInfo && this.settings.videoMaxSize);
          lgVideoStyle = this.getVideoContStyle(videoSize);
        }
        if (iframe) {
          var markup = utils.getIframeMarkup(this.settings.iframeWidth, this.settings.iframeHeight, this.settings.iframeMaxWidth, this.settings.iframeMaxHeight, src, currentGalleryItem.iframeTitle);
          $currentSlide.prepend(markup);
        } else if (poster) {
          var dummyImg = "";
          var hasStartAnimation = isFirstSlide && this.zoomFromOrigin && this.currentImageSize;
          if (hasStartAnimation) {
            dummyImg = this.getDummyImageContent($currentSlide, index, "");
          }
          var markup = utils.getVideoPosterMarkup(poster, dummyImg || "", lgVideoStyle, this.settings.strings["playVideo"], videoInfo);
          $currentSlide.prepend(markup);
        } else if (videoInfo) {
          var markup = '<div class="lg-video-cont " style="' + lgVideoStyle + '"></div>';
          $currentSlide.prepend(markup);
        } else {
          this.setImgMarkup(src, $currentSlide, index);
          if (srcset || sources) {
            var $img = $currentSlide.find(".lg-object");
            this.initPictureFill($img);
          }
        }
        if (poster || videoInfo) {
          this.LGel.trigger(lGEvents.hasVideo, {
            index,
            src,
            html5Video: _html5Video,
            hasPoster: !!poster
          });
        }
        this.LGel.trigger(lGEvents.afterAppendSlide, { index });
        if (this.lGalleryOn && this.settings.appendSubHtmlTo === ".lg-item") {
          this.addHtml(index);
        }
      }
      var _speed = 0;
      if (delay && !$LG(document.body).hasClass("lg-from-hash")) {
        _speed = delay;
      }
      if (this.isFirstSlideWithZoomAnimation()) {
        setTimeout(function() {
          $currentSlide.removeClass("lg-start-end-progress lg-start-progress").removeAttr("style");
        }, this.settings.startAnimationDuration + 100);
        if (!$currentSlide.hasClass("lg-loaded")) {
          setTimeout(function() {
            if (_this.getSlideType(currentGalleryItem) === "image") {
              var alt = currentGalleryItem.alt;
              var altAttr = alt ? 'alt="' + alt + '"' : "";
              $currentSlide.find(".lg-img-wrap").append(utils.getImgMarkup(index, src, altAttr, srcset, sizes, currentGalleryItem.sources));
              if (srcset || sources) {
                var $img2 = $currentSlide.find(".lg-object");
                _this.initPictureFill($img2);
              }
            }
            if (_this.getSlideType(currentGalleryItem) === "image" || _this.getSlideType(currentGalleryItem) === "video" && poster) {
              _this.onLgObjectLoad($currentSlide, index, delay, _speed, true, false);
              _this.onSlideObjectLoad($currentSlide, !!(videoInfo && videoInfo.html5 && !poster), function() {
                _this.loadContentOnFirstSlideLoad(index, $currentSlide, _speed);
              }, function() {
                _this.loadContentOnFirstSlideLoad(index, $currentSlide, _speed);
              });
            }
          }, this.settings.startAnimationDuration + 100);
        }
      }
      $currentSlide.addClass("lg-loaded");
      if (!this.isFirstSlideWithZoomAnimation() || this.getSlideType(currentGalleryItem) === "video" && !poster) {
        this.onLgObjectLoad($currentSlide, index, delay, _speed, isFirstSlide, !!(videoInfo && videoInfo.html5 && !poster));
      }
      if ((!this.zoomFromOrigin || !this.currentImageSize) && $currentSlide.hasClass("lg-complete_") && !this.lGalleryOn) {
        setTimeout(function() {
          $currentSlide.addClass("lg-complete");
        }, this.settings.backdropDuration);
      }
      this.lGalleryOn = true;
      if (rec === true) {
        if (!$currentSlide.hasClass("lg-complete_")) {
          $currentSlide.find(".lg-object").first().on("load.lg error.lg", function() {
            _this.preload(index);
          });
        } else {
          this.preload(index);
        }
      }
    };
    LightGallery2.prototype.loadContentOnFirstSlideLoad = function(index, $currentSlide, speed) {
      var _this = this;
      setTimeout(function() {
        $currentSlide.find(".lg-dummy-img").remove();
        $currentSlide.removeClass("lg-first-slide");
        _this.outer.removeClass("lg-first-slide-loading");
        _this.isDummyImageRemoved = true;
        _this.preload(index);
      }, speed + 300);
    };
    LightGallery2.prototype.getItemsToBeInsertedToDom = function(index, prevIndex, numberOfItems) {
      var _this = this;
      if (numberOfItems === void 0) {
        numberOfItems = 0;
      }
      var itemsToBeInsertedToDom = [];
      var possibleNumberOfItems = Math.max(numberOfItems, 3);
      possibleNumberOfItems = Math.min(possibleNumberOfItems, this.galleryItems.length);
      var prevIndexItem = "lg-item-" + this.lgId + "-" + prevIndex;
      if (this.galleryItems.length <= 3) {
        this.galleryItems.forEach(function(_element, index2) {
          itemsToBeInsertedToDom.push("lg-item-" + _this.lgId + "-" + index2);
        });
        return itemsToBeInsertedToDom;
      }
      if (index < (this.galleryItems.length - 1) / 2) {
        for (var idx = index; idx > index - possibleNumberOfItems / 2 && idx >= 0; idx--) {
          itemsToBeInsertedToDom.push("lg-item-" + this.lgId + "-" + idx);
        }
        var numberOfExistingItems = itemsToBeInsertedToDom.length;
        for (var idx = 0; idx < possibleNumberOfItems - numberOfExistingItems; idx++) {
          itemsToBeInsertedToDom.push("lg-item-" + this.lgId + "-" + (index + idx + 1));
        }
      } else {
        for (var idx = index; idx <= this.galleryItems.length - 1 && idx < index + possibleNumberOfItems / 2; idx++) {
          itemsToBeInsertedToDom.push("lg-item-" + this.lgId + "-" + idx);
        }
        var numberOfExistingItems = itemsToBeInsertedToDom.length;
        for (var idx = 0; idx < possibleNumberOfItems - numberOfExistingItems; idx++) {
          itemsToBeInsertedToDom.push("lg-item-" + this.lgId + "-" + (index - idx - 1));
        }
      }
      if (this.settings.loop) {
        if (index === this.galleryItems.length - 1) {
          itemsToBeInsertedToDom.push("lg-item-" + this.lgId + "-" + 0);
        } else if (index === 0) {
          itemsToBeInsertedToDom.push("lg-item-" + this.lgId + "-" + (this.galleryItems.length - 1));
        }
      }
      if (itemsToBeInsertedToDom.indexOf(prevIndexItem) === -1) {
        itemsToBeInsertedToDom.push("lg-item-" + this.lgId + "-" + prevIndex);
      }
      return itemsToBeInsertedToDom;
    };
    LightGallery2.prototype.organizeSlideItems = function(index, prevIndex) {
      var _this = this;
      var itemsToBeInsertedToDom = this.getItemsToBeInsertedToDom(index, prevIndex, this.settings.numberOfSlideItemsInDom);
      itemsToBeInsertedToDom.forEach(function(item) {
        if (_this.currentItemsInDom.indexOf(item) === -1) {
          _this.$inner.append('<div id="' + item + '" class="lg-item"></div>');
        }
      });
      this.currentItemsInDom.forEach(function(item) {
        if (itemsToBeInsertedToDom.indexOf(item) === -1) {
          $LG("#" + item).remove();
        }
      });
      return itemsToBeInsertedToDom;
    };
    LightGallery2.prototype.getPreviousSlideIndex = function() {
      var prevIndex = 0;
      try {
        var currentItemId = this.outer.find(".lg-current").first().attr("id");
        prevIndex = parseInt(currentItemId.split("-")[3]) || 0;
      } catch (error2) {
        prevIndex = 0;
      }
      return prevIndex;
    };
    LightGallery2.prototype.setDownloadValue = function(index) {
      if (this.settings.download) {
        var currentGalleryItem = this.galleryItems[index];
        var hideDownloadBtn = currentGalleryItem.downloadUrl === false || currentGalleryItem.downloadUrl === "false";
        if (hideDownloadBtn) {
          this.outer.addClass("lg-hide-download");
        } else {
          var $download = this.getElementById("lg-download");
          this.outer.removeClass("lg-hide-download");
          $download.attr("href", currentGalleryItem.downloadUrl || currentGalleryItem.src);
          if (currentGalleryItem.download) {
            $download.attr("download", currentGalleryItem.download);
          }
        }
      }
    };
    LightGallery2.prototype.makeSlideAnimation = function(direction, currentSlideItem, previousSlideItem) {
      var _this = this;
      if (this.lGalleryOn) {
        previousSlideItem.addClass("lg-slide-progress");
      }
      setTimeout(function() {
        _this.outer.addClass("lg-no-trans");
        _this.outer.find(".lg-item").removeClass("lg-prev-slide lg-next-slide");
        if (direction === "prev") {
          currentSlideItem.addClass("lg-prev-slide");
          previousSlideItem.addClass("lg-next-slide");
        } else {
          currentSlideItem.addClass("lg-next-slide");
          previousSlideItem.addClass("lg-prev-slide");
        }
        setTimeout(function() {
          _this.outer.find(".lg-item").removeClass("lg-current");
          currentSlideItem.addClass("lg-current");
          _this.outer.removeClass("lg-no-trans");
        }, 50);
      }, this.lGalleryOn ? this.settings.slideDelay : 0);
    };
    LightGallery2.prototype.slide = function(index, fromTouch, fromThumb, direction) {
      var _this = this;
      var prevIndex = this.getPreviousSlideIndex();
      this.currentItemsInDom = this.organizeSlideItems(index, prevIndex);
      if (this.lGalleryOn && prevIndex === index) {
        return;
      }
      var numberOfGalleryItems = this.galleryItems.length;
      if (!this.lgBusy) {
        if (this.settings.counter) {
          this.updateCurrentCounter(index);
        }
        var currentSlideItem = this.getSlideItem(index);
        var previousSlideItem_1 = this.getSlideItem(prevIndex);
        var currentGalleryItem = this.galleryItems[index];
        var videoInfo = currentGalleryItem.__slideVideoInfo;
        this.outer.attr("data-lg-slide-type", this.getSlideType(currentGalleryItem));
        this.setDownloadValue(index);
        if (videoInfo) {
          var _a = this.mediaContainerPosition, top_3 = _a.top, bottom = _a.bottom;
          var videoSize = utils.getSize(this.items[index], this.outer, top_3 + bottom, videoInfo && this.settings.videoMaxSize);
          this.resizeVideoSlide(index, videoSize);
        }
        this.LGel.trigger(lGEvents.beforeSlide, {
          prevIndex,
          index,
          fromTouch: !!fromTouch,
          fromThumb: !!fromThumb
        });
        this.lgBusy = true;
        clearTimeout(this.hideBarTimeout);
        this.arrowDisable(index);
        if (!direction) {
          if (index < prevIndex) {
            direction = "prev";
          } else if (index > prevIndex) {
            direction = "next";
          }
        }
        if (!fromTouch) {
          this.makeSlideAnimation(direction, currentSlideItem, previousSlideItem_1);
        } else {
          this.outer.find(".lg-item").removeClass("lg-prev-slide lg-current lg-next-slide");
          var touchPrev = void 0;
          var touchNext = void 0;
          if (numberOfGalleryItems > 2) {
            touchPrev = index - 1;
            touchNext = index + 1;
            if (index === 0 && prevIndex === numberOfGalleryItems - 1) {
              touchNext = 0;
              touchPrev = numberOfGalleryItems - 1;
            } else if (index === numberOfGalleryItems - 1 && prevIndex === 0) {
              touchNext = 0;
              touchPrev = numberOfGalleryItems - 1;
            }
          } else {
            touchPrev = 0;
            touchNext = 1;
          }
          if (direction === "prev") {
            this.getSlideItem(touchNext).addClass("lg-next-slide");
          } else {
            this.getSlideItem(touchPrev).addClass("lg-prev-slide");
          }
          currentSlideItem.addClass("lg-current");
        }
        if (!this.lGalleryOn) {
          this.loadContent(index, true);
        } else {
          setTimeout(function() {
            _this.loadContent(index, true);
            if (_this.settings.appendSubHtmlTo !== ".lg-item") {
              _this.addHtml(index);
            }
          }, this.settings.speed + 50 + (fromTouch ? 0 : this.settings.slideDelay));
        }
        setTimeout(function() {
          _this.lgBusy = false;
          previousSlideItem_1.removeClass("lg-slide-progress");
          _this.LGel.trigger(lGEvents.afterSlide, {
            prevIndex,
            index,
            fromTouch,
            fromThumb
          });
        }, (this.lGalleryOn ? this.settings.speed + 100 : 100) + (fromTouch ? 0 : this.settings.slideDelay));
      }
      this.index = index;
    };
    LightGallery2.prototype.updateCurrentCounter = function(index) {
      this.getElementById("lg-counter-current").html(index + 1 + "");
    };
    LightGallery2.prototype.updateCounterTotal = function() {
      this.getElementById("lg-counter-all").html(this.galleryItems.length + "");
    };
    LightGallery2.prototype.getSlideType = function(item) {
      if (item.__slideVideoInfo) {
        return "video";
      } else if (item.iframe) {
        return "iframe";
      } else {
        return "image";
      }
    };
    LightGallery2.prototype.touchMove = function(startCoords, endCoords, e) {
      var distanceX = endCoords.pageX - startCoords.pageX;
      var distanceY = endCoords.pageY - startCoords.pageY;
      var allowSwipe = false;
      if (this.swipeDirection) {
        allowSwipe = true;
      } else {
        if (Math.abs(distanceX) > 15) {
          this.swipeDirection = "horizontal";
          allowSwipe = true;
        } else if (Math.abs(distanceY) > 15) {
          this.swipeDirection = "vertical";
          allowSwipe = true;
        }
      }
      if (!allowSwipe) {
        return;
      }
      var $currentSlide = this.getSlideItem(this.index);
      if (this.swipeDirection === "horizontal") {
        e === null || e === void 0 ? void 0 : e.preventDefault();
        this.outer.addClass("lg-dragging");
        this.setTranslate($currentSlide, distanceX, 0);
        var width = $currentSlide.get().offsetWidth;
        var slideWidthAmount = width * 15 / 100;
        var gutter = slideWidthAmount - Math.abs(distanceX * 10 / 100);
        this.setTranslate(this.outer.find(".lg-prev-slide").first(), -width + distanceX - gutter, 0);
        this.setTranslate(this.outer.find(".lg-next-slide").first(), width + distanceX + gutter, 0);
      } else if (this.swipeDirection === "vertical") {
        if (this.settings.swipeToClose) {
          e === null || e === void 0 ? void 0 : e.preventDefault();
          this.$container.addClass("lg-dragging-vertical");
          var opacity = 1 - Math.abs(distanceY) / window.innerHeight;
          this.$backdrop.css("opacity", opacity);
          var scale = 1 - Math.abs(distanceY) / (window.innerWidth * 2);
          this.setTranslate($currentSlide, 0, distanceY, scale, scale);
          if (Math.abs(distanceY) > 100) {
            this.outer.addClass("lg-hide-items").removeClass("lg-components-open");
          }
        }
      }
    };
    LightGallery2.prototype.touchEnd = function(endCoords, startCoords, event) {
      var _this = this;
      var distance;
      if (this.settings.mode !== "lg-slide") {
        this.outer.addClass("lg-slide");
      }
      setTimeout(function() {
        _this.$container.removeClass("lg-dragging-vertical");
        _this.outer.removeClass("lg-dragging lg-hide-items").addClass("lg-components-open");
        var triggerClick = true;
        if (_this.swipeDirection === "horizontal") {
          distance = endCoords.pageX - startCoords.pageX;
          var distanceAbs = Math.abs(endCoords.pageX - startCoords.pageX);
          if (distance < 0 && distanceAbs > _this.settings.swipeThreshold) {
            _this.goToNextSlide(true);
            triggerClick = false;
          } else if (distance > 0 && distanceAbs > _this.settings.swipeThreshold) {
            _this.goToPrevSlide(true);
            triggerClick = false;
          }
        } else if (_this.swipeDirection === "vertical") {
          distance = Math.abs(endCoords.pageY - startCoords.pageY);
          if (_this.settings.closable && _this.settings.swipeToClose && distance > 100) {
            _this.closeGallery();
            return;
          } else {
            _this.$backdrop.css("opacity", 1);
          }
        }
        _this.outer.find(".lg-item").removeAttr("style");
        if (triggerClick && Math.abs(endCoords.pageX - startCoords.pageX) < 5) {
          var target = $LG(event.target);
          if (_this.isPosterElement(target)) {
            _this.LGel.trigger(lGEvents.posterClick);
          }
        }
        _this.swipeDirection = void 0;
      });
      setTimeout(function() {
        if (!_this.outer.hasClass("lg-dragging") && _this.settings.mode !== "lg-slide") {
          _this.outer.removeClass("lg-slide");
        }
      }, this.settings.speed + 100);
    };
    LightGallery2.prototype.enableSwipe = function() {
      var _this = this;
      var startCoords = {};
      var endCoords = {};
      var isMoved = false;
      var isSwiping = false;
      if (this.settings.enableSwipe) {
        this.$inner.on("touchstart.lg", function(e) {
          _this.dragOrSwipeEnabled = true;
          var $item = _this.getSlideItem(_this.index);
          if (($LG(e.target).hasClass("lg-item") || $item.get().contains(e.target)) && !_this.outer.hasClass("lg-zoomed") && !_this.lgBusy && e.targetTouches.length === 1) {
            isSwiping = true;
            _this.touchAction = "swipe";
            _this.manageSwipeClass();
            startCoords = {
              pageX: e.targetTouches[0].pageX,
              pageY: e.targetTouches[0].pageY
            };
          }
        });
        this.$inner.on("touchmove.lg", function(e) {
          if (isSwiping && _this.touchAction === "swipe" && e.targetTouches.length === 1) {
            endCoords = {
              pageX: e.targetTouches[0].pageX,
              pageY: e.targetTouches[0].pageY
            };
            _this.touchMove(startCoords, endCoords, e);
            isMoved = true;
          }
        });
        this.$inner.on("touchend.lg", function(event) {
          if (_this.touchAction === "swipe") {
            if (isMoved) {
              isMoved = false;
              _this.touchEnd(endCoords, startCoords, event);
            } else if (isSwiping) {
              var target = $LG(event.target);
              if (_this.isPosterElement(target)) {
                _this.LGel.trigger(lGEvents.posterClick);
              }
            }
            _this.touchAction = void 0;
            isSwiping = false;
          }
        });
      }
    };
    LightGallery2.prototype.enableDrag = function() {
      var _this = this;
      var startCoords = {};
      var endCoords = {};
      var isDraging = false;
      var isMoved = false;
      if (this.settings.enableDrag) {
        this.outer.on("mousedown.lg", function(e) {
          _this.dragOrSwipeEnabled = true;
          var $item = _this.getSlideItem(_this.index);
          if ($LG(e.target).hasClass("lg-item") || $item.get().contains(e.target)) {
            if (!_this.outer.hasClass("lg-zoomed") && !_this.lgBusy) {
              e.preventDefault();
              if (!_this.lgBusy) {
                _this.manageSwipeClass();
                startCoords = {
                  pageX: e.pageX,
                  pageY: e.pageY
                };
                isDraging = true;
                _this.outer.get().scrollLeft += 1;
                _this.outer.get().scrollLeft -= 1;
                _this.outer.removeClass("lg-grab").addClass("lg-grabbing");
                _this.LGel.trigger(lGEvents.dragStart);
              }
            }
          }
        });
        $LG(window).on("mousemove.lg.global" + this.lgId, function(e) {
          if (isDraging && _this.lgOpened) {
            isMoved = true;
            endCoords = {
              pageX: e.pageX,
              pageY: e.pageY
            };
            _this.touchMove(startCoords, endCoords);
            _this.LGel.trigger(lGEvents.dragMove);
          }
        });
        $LG(window).on("mouseup.lg.global" + this.lgId, function(event) {
          if (!_this.lgOpened) {
            return;
          }
          var target = $LG(event.target);
          if (isMoved) {
            isMoved = false;
            _this.touchEnd(endCoords, startCoords, event);
            _this.LGel.trigger(lGEvents.dragEnd);
          } else if (_this.isPosterElement(target)) {
            _this.LGel.trigger(lGEvents.posterClick);
          }
          if (isDraging) {
            isDraging = false;
            _this.outer.removeClass("lg-grabbing").addClass("lg-grab");
          }
        });
      }
    };
    LightGallery2.prototype.triggerPosterClick = function() {
      var _this = this;
      this.$inner.on("click.lg", function(event) {
        if (!_this.dragOrSwipeEnabled && _this.isPosterElement($LG(event.target))) {
          _this.LGel.trigger(lGEvents.posterClick);
        }
      });
    };
    LightGallery2.prototype.manageSwipeClass = function() {
      var _touchNext = this.index + 1;
      var _touchPrev = this.index - 1;
      if (this.settings.loop && this.galleryItems.length > 2) {
        if (this.index === 0) {
          _touchPrev = this.galleryItems.length - 1;
        } else if (this.index === this.galleryItems.length - 1) {
          _touchNext = 0;
        }
      }
      this.outer.find(".lg-item").removeClass("lg-next-slide lg-prev-slide");
      if (_touchPrev > -1) {
        this.getSlideItem(_touchPrev).addClass("lg-prev-slide");
      }
      this.getSlideItem(_touchNext).addClass("lg-next-slide");
    };
    LightGallery2.prototype.goToNextSlide = function(fromTouch) {
      var _this = this;
      var _loop = this.settings.loop;
      if (fromTouch && this.galleryItems.length < 3) {
        _loop = false;
      }
      if (!this.lgBusy) {
        if (this.index + 1 < this.galleryItems.length) {
          this.index++;
          this.LGel.trigger(lGEvents.beforeNextSlide, {
            index: this.index
          });
          this.slide(this.index, !!fromTouch, false, "next");
        } else {
          if (_loop) {
            this.index = 0;
            this.LGel.trigger(lGEvents.beforeNextSlide, {
              index: this.index
            });
            this.slide(this.index, !!fromTouch, false, "next");
          } else if (this.settings.slideEndAnimation && !fromTouch) {
            this.outer.addClass("lg-right-end");
            setTimeout(function() {
              _this.outer.removeClass("lg-right-end");
            }, 400);
          }
        }
      }
    };
    LightGallery2.prototype.goToPrevSlide = function(fromTouch) {
      var _this = this;
      var _loop = this.settings.loop;
      if (fromTouch && this.galleryItems.length < 3) {
        _loop = false;
      }
      if (!this.lgBusy) {
        if (this.index > 0) {
          this.index--;
          this.LGel.trigger(lGEvents.beforePrevSlide, {
            index: this.index,
            fromTouch
          });
          this.slide(this.index, !!fromTouch, false, "prev");
        } else {
          if (_loop) {
            this.index = this.galleryItems.length - 1;
            this.LGel.trigger(lGEvents.beforePrevSlide, {
              index: this.index,
              fromTouch
            });
            this.slide(this.index, !!fromTouch, false, "prev");
          } else if (this.settings.slideEndAnimation && !fromTouch) {
            this.outer.addClass("lg-left-end");
            setTimeout(function() {
              _this.outer.removeClass("lg-left-end");
            }, 400);
          }
        }
      }
    };
    LightGallery2.prototype.keyPress = function() {
      var _this = this;
      $LG(window).on("keydown.lg.global" + this.lgId, function(e) {
        if (_this.lgOpened && _this.settings.escKey === true && e.keyCode === 27) {
          e.preventDefault();
          if (_this.settings.allowMediaOverlap && _this.outer.hasClass("lg-can-toggle") && _this.outer.hasClass("lg-components-open")) {
            _this.outer.removeClass("lg-components-open");
          } else {
            _this.closeGallery();
          }
        }
        if (_this.lgOpened && _this.galleryItems.length > 1) {
          if (e.keyCode === 37) {
            e.preventDefault();
            _this.goToPrevSlide();
          }
          if (e.keyCode === 39) {
            e.preventDefault();
            _this.goToNextSlide();
          }
        }
      });
    };
    LightGallery2.prototype.arrow = function() {
      var _this = this;
      this.getElementById("lg-prev").on("click.lg", function() {
        _this.goToPrevSlide();
      });
      this.getElementById("lg-next").on("click.lg", function() {
        _this.goToNextSlide();
      });
    };
    LightGallery2.prototype.arrowDisable = function(index) {
      if (!this.settings.loop && this.settings.hideControlOnEnd) {
        var $prev = this.getElementById("lg-prev");
        var $next = this.getElementById("lg-next");
        if (index + 1 === this.galleryItems.length) {
          $next.attr("disabled", "disabled").addClass("disabled");
        } else {
          $next.removeAttr("disabled").removeClass("disabled");
        }
        if (index === 0) {
          $prev.attr("disabled", "disabled").addClass("disabled");
        } else {
          $prev.removeAttr("disabled").removeClass("disabled");
        }
      }
    };
    LightGallery2.prototype.setTranslate = function($el, xValue, yValue, scaleX, scaleY) {
      if (scaleX === void 0) {
        scaleX = 1;
      }
      if (scaleY === void 0) {
        scaleY = 1;
      }
      $el.css("transform", "translate3d(" + xValue + "px, " + yValue + "px, 0px) scale3d(" + scaleX + ", " + scaleY + ", 1)");
    };
    LightGallery2.prototype.mousewheel = function() {
      var _this = this;
      var lastCall = 0;
      this.outer.on("wheel.lg", function(e) {
        if (!e.deltaY || _this.galleryItems.length < 2) {
          return;
        }
        e.preventDefault();
        var now = new Date().getTime();
        if (now - lastCall < 1e3) {
          return;
        }
        lastCall = now;
        if (e.deltaY > 0) {
          _this.goToNextSlide();
        } else if (e.deltaY < 0) {
          _this.goToPrevSlide();
        }
      });
    };
    LightGallery2.prototype.isSlideElement = function(target) {
      return target.hasClass("lg-outer") || target.hasClass("lg-item") || target.hasClass("lg-img-wrap");
    };
    LightGallery2.prototype.isPosterElement = function(target) {
      var playButton = this.getSlideItem(this.index).find(".lg-video-play-button").get();
      return target.hasClass("lg-video-poster") || target.hasClass("lg-video-play-button") || playButton && playButton.contains(target.get());
    };
    LightGallery2.prototype.toggleMaximize = function() {
      var _this = this;
      this.getElementById("lg-maximize").on("click.lg", function() {
        _this.$container.toggleClass("lg-inline");
        _this.refreshOnResize();
      });
    };
    LightGallery2.prototype.invalidateItems = function() {
      for (var index = 0; index < this.items.length; index++) {
        var element = this.items[index];
        var $element = $LG(element);
        $element.off("click.lgcustom-item-" + $element.attr("data-lg-id"));
      }
    };
    LightGallery2.prototype.trapFocus = function() {
      var _this = this;
      this.$container.get().focus({
        preventScroll: true
      });
      $LG(window).on("keydown.lg.global" + this.lgId, function(e) {
        if (!_this.lgOpened) {
          return;
        }
        var isTabPressed = e.key === "Tab" || e.keyCode === 9;
        if (!isTabPressed) {
          return;
        }
        var focusableEls = utils.getFocusableElements(_this.$container.get());
        var firstFocusableEl = focusableEls[0];
        var lastFocusableEl = focusableEls[focusableEls.length - 1];
        if (e.shiftKey) {
          if (document.activeElement === firstFocusableEl) {
            lastFocusableEl.focus();
            e.preventDefault();
          }
        } else {
          if (document.activeElement === lastFocusableEl) {
            firstFocusableEl.focus();
            e.preventDefault();
          }
        }
      });
    };
    LightGallery2.prototype.manageCloseGallery = function() {
      var _this = this;
      if (!this.settings.closable)
        return;
      var mousedown = false;
      this.getElementById("lg-close").on("click.lg", function() {
        _this.closeGallery();
      });
      if (this.settings.closeOnTap) {
        this.outer.on("mousedown.lg", function(e) {
          var target = $LG(e.target);
          if (_this.isSlideElement(target)) {
            mousedown = true;
          } else {
            mousedown = false;
          }
        });
        this.outer.on("mousemove.lg", function() {
          mousedown = false;
        });
        this.outer.on("mouseup.lg", function(e) {
          var target = $LG(e.target);
          if (_this.isSlideElement(target) && mousedown) {
            if (!_this.outer.hasClass("lg-dragging")) {
              _this.closeGallery();
            }
          }
        });
      }
    };
    LightGallery2.prototype.closeGallery = function(force) {
      var _this = this;
      if (!this.lgOpened || !this.settings.closable && !force) {
        return 0;
      }
      this.LGel.trigger(lGEvents.beforeClose);
      if (this.settings.resetScrollPosition && !this.settings.hideScrollbar) {
        $LG(window).scrollTop(this.prevScrollTop);
      }
      var currentItem = this.items[this.index];
      var transform;
      if (this.zoomFromOrigin && currentItem) {
        var _a = this.mediaContainerPosition, top_4 = _a.top, bottom = _a.bottom;
        var _b = this.galleryItems[this.index], __slideVideoInfo = _b.__slideVideoInfo, poster = _b.poster;
        var imageSize = utils.getSize(currentItem, this.outer, top_4 + bottom, __slideVideoInfo && poster && this.settings.videoMaxSize);
        transform = utils.getTransform(currentItem, this.outer, top_4, bottom, imageSize);
      }
      if (this.zoomFromOrigin && transform) {
        this.outer.addClass("lg-closing lg-zoom-from-image");
        this.getSlideItem(this.index).addClass("lg-start-end-progress").css("transition-duration", this.settings.startAnimationDuration + "ms").css("transform", transform);
      } else {
        this.outer.addClass("lg-hide-items");
        this.outer.removeClass("lg-zoom-from-image");
      }
      this.destroyModules();
      this.lGalleryOn = false;
      this.isDummyImageRemoved = false;
      this.zoomFromOrigin = this.settings.zoomFromOrigin;
      clearTimeout(this.hideBarTimeout);
      this.hideBarTimeout = false;
      $LG("html").removeClass("lg-on");
      this.outer.removeClass("lg-visible lg-components-open");
      this.$backdrop.removeClass("in").css("opacity", 0);
      var removeTimeout = this.zoomFromOrigin && transform ? Math.max(this.settings.startAnimationDuration, this.settings.backdropDuration) : this.settings.backdropDuration;
      this.$container.removeClass("lg-show-in");
      setTimeout(function() {
        if (_this.zoomFromOrigin && transform) {
          _this.outer.removeClass("lg-zoom-from-image");
        }
        _this.$container.removeClass("lg-show");
        _this.resetScrollBar();
        _this.$backdrop.removeAttr("style").css("transition-duration", _this.settings.backdropDuration + "ms");
        _this.outer.removeClass("lg-closing " + _this.settings.startClass);
        _this.getSlideItem(_this.index).removeClass("lg-start-end-progress");
        _this.$inner.empty();
        if (_this.lgOpened) {
          _this.LGel.trigger(lGEvents.afterClose, {
            instance: _this
          });
        }
        if (_this.$container.get()) {
          _this.$container.get().blur();
        }
        _this.lgOpened = false;
      }, removeTimeout + 100);
      return removeTimeout + 100;
    };
    LightGallery2.prototype.initModules = function() {
      this.plugins.forEach(function(module) {
        try {
          module.init();
        } catch (err) {
          console.warn("lightGallery:- make sure lightGallery module is properly initiated");
        }
      });
    };
    LightGallery2.prototype.destroyModules = function(destroy) {
      this.plugins.forEach(function(module) {
        try {
          if (destroy) {
            module.destroy();
          } else {
            module.closeGallery && module.closeGallery();
          }
        } catch (err) {
          console.warn("lightGallery:- make sure lightGallery module is properly destroyed");
        }
      });
    };
    LightGallery2.prototype.refresh = function(galleryItems) {
      if (!this.settings.dynamic) {
        this.invalidateItems();
      }
      if (galleryItems) {
        this.galleryItems = galleryItems;
      } else {
        this.galleryItems = this.getItems();
      }
      this.updateControls();
      this.openGalleryOnItemClick();
      this.LGel.trigger(lGEvents.updateSlides);
    };
    LightGallery2.prototype.updateControls = function() {
      this.addSlideVideoInfo(this.galleryItems);
      this.updateCounterTotal();
      this.manageSingleSlideClassName();
    };
    LightGallery2.prototype.destroy = function() {
      var _this = this;
      var closeTimeout = this.closeGallery(true);
      setTimeout(function() {
        _this.destroyModules(true);
        if (!_this.settings.dynamic) {
          _this.invalidateItems();
        }
        $LG(window).off(".lg.global" + _this.lgId);
        _this.LGel.off(".lg");
        _this.$container.remove();
      }, closeTimeout);
      return closeTimeout;
    };
    return LightGallery2;
  }();

  // node_modules/lightgallery/plugins/thumbnail/lg-thumbnail.es5.js
  var __assign2 = function() {
    __assign2 = Object.assign || function __assign4(t) {
      for (var s, i = 1, n = arguments.length; i < n; i++) {
        s = arguments[i];
        for (var p in s)
          if (Object.prototype.hasOwnProperty.call(s, p))
            t[p] = s[p];
      }
      return t;
    };
    return __assign2.apply(this, arguments);
  };
  var thumbnailsSettings = {
    thumbnail: true,
    animateThumb: true,
    currentPagerPosition: "middle",
    alignThumbnails: "middle",
    thumbWidth: 100,
    thumbHeight: "80px",
    thumbMargin: 5,
    appendThumbnailsTo: ".lg-components",
    toggleThumb: false,
    enableThumbDrag: true,
    enableThumbSwipe: true,
    thumbnailSwipeThreshold: 10,
    loadYouTubeThumbnail: true,
    youTubeThumbSize: 1,
    thumbnailPluginStrings: {
      toggleThumbnails: "Toggle thumbnails"
    }
  };
  var lGEvents2 = {
    afterAppendSlide: "lgAfterAppendSlide",
    init: "lgInit",
    hasVideo: "lgHasVideo",
    containerResize: "lgContainerResize",
    updateSlides: "lgUpdateSlides",
    afterAppendSubHtml: "lgAfterAppendSubHtml",
    beforeOpen: "lgBeforeOpen",
    afterOpen: "lgAfterOpen",
    slideItemLoad: "lgSlideItemLoad",
    beforeSlide: "lgBeforeSlide",
    afterSlide: "lgAfterSlide",
    posterClick: "lgPosterClick",
    dragStart: "lgDragStart",
    dragMove: "lgDragMove",
    dragEnd: "lgDragEnd",
    beforeNextSlide: "lgBeforeNextSlide",
    beforePrevSlide: "lgBeforePrevSlide",
    beforeClose: "lgBeforeClose",
    afterClose: "lgAfterClose",
    rotateLeft: "lgRotateLeft",
    rotateRight: "lgRotateRight",
    flipHorizontal: "lgFlipHorizontal",
    flipVertical: "lgFlipVertical",
    autoplay: "lgAutoplay",
    autoplayStart: "lgAutoplayStart",
    autoplayStop: "lgAutoplayStop"
  };
  var Thumbnail = function() {
    function Thumbnail2(instance, $LG2) {
      this.thumbOuterWidth = 0;
      this.thumbTotalWidth = 0;
      this.translateX = 0;
      this.thumbClickable = false;
      this.core = instance;
      this.$LG = $LG2;
      return this;
    }
    Thumbnail2.prototype.init = function() {
      this.settings = __assign2(__assign2({}, thumbnailsSettings), this.core.settings);
      this.thumbOuterWidth = 0;
      this.thumbTotalWidth = this.core.galleryItems.length * (this.settings.thumbWidth + this.settings.thumbMargin);
      this.translateX = 0;
      this.setAnimateThumbStyles();
      if (!this.core.settings.allowMediaOverlap) {
        this.settings.toggleThumb = false;
      }
      if (this.settings.thumbnail) {
        this.build();
        if (this.settings.animateThumb) {
          if (this.settings.enableThumbDrag) {
            this.enableThumbDrag();
          }
          if (this.settings.enableThumbSwipe) {
            this.enableThumbSwipe();
          }
          this.thumbClickable = false;
        } else {
          this.thumbClickable = true;
        }
        this.toggleThumbBar();
        this.thumbKeyPress();
      }
    };
    Thumbnail2.prototype.build = function() {
      var _this = this;
      this.setThumbMarkup();
      this.manageActiveClassOnSlideChange();
      this.$lgThumb.first().on("click.lg touchend.lg", function(e) {
        var $target = _this.$LG(e.target);
        if (!$target.hasAttribute("data-lg-item-id")) {
          return;
        }
        setTimeout(function() {
          if (_this.thumbClickable && !_this.core.lgBusy) {
            var index = parseInt($target.attr("data-lg-item-id"));
            _this.core.slide(index, false, true, false);
          }
        }, 50);
      });
      this.core.LGel.on(lGEvents2.beforeSlide + ".thumb", function(event) {
        var index = event.detail.index;
        _this.animateThumb(index);
      });
      this.core.LGel.on(lGEvents2.beforeOpen + ".thumb", function() {
        _this.thumbOuterWidth = _this.core.outer.get().offsetWidth;
      });
      this.core.LGel.on(lGEvents2.updateSlides + ".thumb", function() {
        _this.rebuildThumbnails();
      });
      this.core.LGel.on(lGEvents2.containerResize + ".thumb", function() {
        if (!_this.core.lgOpened)
          return;
        setTimeout(function() {
          _this.thumbOuterWidth = _this.core.outer.get().offsetWidth;
          _this.animateThumb(_this.core.index);
          _this.thumbOuterWidth = _this.core.outer.get().offsetWidth;
        }, 50);
      });
    };
    Thumbnail2.prototype.setThumbMarkup = function() {
      var thumbOuterClassNames = "lg-thumb-outer ";
      if (this.settings.alignThumbnails) {
        thumbOuterClassNames += "lg-thumb-align-" + this.settings.alignThumbnails;
      }
      var html = '<div class="' + thumbOuterClassNames + '">\n        <div class="lg-thumb lg-group">\n        </div>\n        </div>';
      this.core.outer.addClass("lg-has-thumb");
      if (this.settings.appendThumbnailsTo === ".lg-components") {
        this.core.$lgComponents.append(html);
      } else {
        this.core.outer.append(html);
      }
      this.$thumbOuter = this.core.outer.find(".lg-thumb-outer").first();
      this.$lgThumb = this.core.outer.find(".lg-thumb").first();
      if (this.settings.animateThumb) {
        this.core.outer.find(".lg-thumb").css("transition-duration", this.core.settings.speed + "ms").css("width", this.thumbTotalWidth + "px").css("position", "relative");
      }
      this.setThumbItemHtml(this.core.galleryItems);
    };
    Thumbnail2.prototype.enableThumbDrag = function() {
      var _this = this;
      var thumbDragUtils = {
        cords: {
          startX: 0,
          endX: 0
        },
        isMoved: false,
        newTranslateX: 0,
        startTime: new Date(),
        endTime: new Date(),
        touchMoveTime: 0
      };
      var isDragging = false;
      this.$thumbOuter.addClass("lg-grab");
      this.core.outer.find(".lg-thumb").first().on("mousedown.lg.thumb", function(e) {
        if (_this.thumbTotalWidth > _this.thumbOuterWidth) {
          e.preventDefault();
          thumbDragUtils.cords.startX = e.pageX;
          thumbDragUtils.startTime = new Date();
          _this.thumbClickable = false;
          isDragging = true;
          _this.core.outer.get().scrollLeft += 1;
          _this.core.outer.get().scrollLeft -= 1;
          _this.$thumbOuter.removeClass("lg-grab").addClass("lg-grabbing");
        }
      });
      this.$LG(window).on("mousemove.lg.thumb.global" + this.core.lgId, function(e) {
        if (!_this.core.lgOpened)
          return;
        if (isDragging) {
          thumbDragUtils.cords.endX = e.pageX;
          thumbDragUtils = _this.onThumbTouchMove(thumbDragUtils);
        }
      });
      this.$LG(window).on("mouseup.lg.thumb.global" + this.core.lgId, function() {
        if (!_this.core.lgOpened)
          return;
        if (thumbDragUtils.isMoved) {
          thumbDragUtils = _this.onThumbTouchEnd(thumbDragUtils);
        } else {
          _this.thumbClickable = true;
        }
        if (isDragging) {
          isDragging = false;
          _this.$thumbOuter.removeClass("lg-grabbing").addClass("lg-grab");
        }
      });
    };
    Thumbnail2.prototype.enableThumbSwipe = function() {
      var _this = this;
      var thumbDragUtils = {
        cords: {
          startX: 0,
          endX: 0
        },
        isMoved: false,
        newTranslateX: 0,
        startTime: new Date(),
        endTime: new Date(),
        touchMoveTime: 0
      };
      this.$lgThumb.on("touchstart.lg", function(e) {
        if (_this.thumbTotalWidth > _this.thumbOuterWidth) {
          e.preventDefault();
          thumbDragUtils.cords.startX = e.targetTouches[0].pageX;
          _this.thumbClickable = false;
          thumbDragUtils.startTime = new Date();
        }
      });
      this.$lgThumb.on("touchmove.lg", function(e) {
        if (_this.thumbTotalWidth > _this.thumbOuterWidth) {
          e.preventDefault();
          thumbDragUtils.cords.endX = e.targetTouches[0].pageX;
          thumbDragUtils = _this.onThumbTouchMove(thumbDragUtils);
        }
      });
      this.$lgThumb.on("touchend.lg", function() {
        if (thumbDragUtils.isMoved) {
          thumbDragUtils = _this.onThumbTouchEnd(thumbDragUtils);
        } else {
          _this.thumbClickable = true;
        }
      });
    };
    Thumbnail2.prototype.rebuildThumbnails = function() {
      var _this = this;
      this.$thumbOuter.addClass("lg-rebuilding-thumbnails");
      setTimeout(function() {
        _this.thumbTotalWidth = _this.core.galleryItems.length * (_this.settings.thumbWidth + _this.settings.thumbMargin);
        _this.$lgThumb.css("width", _this.thumbTotalWidth + "px");
        _this.$lgThumb.empty();
        _this.setThumbItemHtml(_this.core.galleryItems);
        _this.animateThumb(_this.core.index);
      }, 50);
      setTimeout(function() {
        _this.$thumbOuter.removeClass("lg-rebuilding-thumbnails");
      }, 200);
    };
    Thumbnail2.prototype.setTranslate = function(value) {
      this.$lgThumb.css("transform", "translate3d(-" + value + "px, 0px, 0px)");
    };
    Thumbnail2.prototype.getPossibleTransformX = function(left) {
      if (left > this.thumbTotalWidth - this.thumbOuterWidth) {
        left = this.thumbTotalWidth - this.thumbOuterWidth;
      }
      if (left < 0) {
        left = 0;
      }
      return left;
    };
    Thumbnail2.prototype.animateThumb = function(index) {
      this.$lgThumb.css("transition-duration", this.core.settings.speed + "ms");
      if (this.settings.animateThumb) {
        var position = 0;
        switch (this.settings.currentPagerPosition) {
          case "left":
            position = 0;
            break;
          case "middle":
            position = this.thumbOuterWidth / 2 - this.settings.thumbWidth / 2;
            break;
          case "right":
            position = this.thumbOuterWidth - this.settings.thumbWidth;
        }
        this.translateX = (this.settings.thumbWidth + this.settings.thumbMargin) * index - 1 - position;
        if (this.translateX > this.thumbTotalWidth - this.thumbOuterWidth) {
          this.translateX = this.thumbTotalWidth - this.thumbOuterWidth;
        }
        if (this.translateX < 0) {
          this.translateX = 0;
        }
        this.setTranslate(this.translateX);
      }
    };
    Thumbnail2.prototype.onThumbTouchMove = function(thumbDragUtils) {
      thumbDragUtils.newTranslateX = this.translateX;
      thumbDragUtils.isMoved = true;
      thumbDragUtils.touchMoveTime = new Date().valueOf();
      thumbDragUtils.newTranslateX -= thumbDragUtils.cords.endX - thumbDragUtils.cords.startX;
      thumbDragUtils.newTranslateX = this.getPossibleTransformX(thumbDragUtils.newTranslateX);
      this.setTranslate(thumbDragUtils.newTranslateX);
      this.$thumbOuter.addClass("lg-dragging");
      return thumbDragUtils;
    };
    Thumbnail2.prototype.onThumbTouchEnd = function(thumbDragUtils) {
      thumbDragUtils.isMoved = false;
      thumbDragUtils.endTime = new Date();
      this.$thumbOuter.removeClass("lg-dragging");
      var touchDuration = thumbDragUtils.endTime.valueOf() - thumbDragUtils.startTime.valueOf();
      var distanceXnew = thumbDragUtils.cords.endX - thumbDragUtils.cords.startX;
      var speedX = Math.abs(distanceXnew) / touchDuration;
      if (speedX > 0.15 && thumbDragUtils.endTime.valueOf() - thumbDragUtils.touchMoveTime < 30) {
        speedX += 1;
        if (speedX > 2) {
          speedX += 1;
        }
        speedX = speedX + speedX * (Math.abs(distanceXnew) / this.thumbOuterWidth);
        this.$lgThumb.css("transition-duration", Math.min(speedX - 1, 2) + "settings");
        distanceXnew = distanceXnew * speedX;
        this.translateX = this.getPossibleTransformX(this.translateX - distanceXnew);
        this.setTranslate(this.translateX);
      } else {
        this.translateX = thumbDragUtils.newTranslateX;
      }
      if (Math.abs(thumbDragUtils.cords.endX - thumbDragUtils.cords.startX) < this.settings.thumbnailSwipeThreshold) {
        this.thumbClickable = true;
      }
      return thumbDragUtils;
    };
    Thumbnail2.prototype.getThumbHtml = function(thumb, index) {
      var slideVideoInfo = this.core.galleryItems[index].__slideVideoInfo || {};
      var thumbImg;
      if (slideVideoInfo.youtube) {
        if (this.settings.loadYouTubeThumbnail) {
          thumbImg = "//img.youtube.com/vi/" + slideVideoInfo.youtube[1] + "/" + this.settings.youTubeThumbSize + ".jpg";
        } else {
          thumbImg = thumb;
        }
      } else {
        thumbImg = thumb;
      }
      return '<div data-lg-item-id="' + index + '" class="lg-thumb-item ' + (index === this.core.index ? " active" : "") + '" \n        style="width:' + this.settings.thumbWidth + "px; height: " + this.settings.thumbHeight + ";\n            margin-right: " + this.settings.thumbMargin + 'px;">\n            <img data-lg-item-id="' + index + '" src="' + thumbImg + '" />\n        </div>';
    };
    Thumbnail2.prototype.getThumbItemHtml = function(items) {
      var thumbList = "";
      for (var i = 0; i < items.length; i++) {
        thumbList += this.getThumbHtml(items[i].thumb, i);
      }
      return thumbList;
    };
    Thumbnail2.prototype.setThumbItemHtml = function(items) {
      var thumbList = this.getThumbItemHtml(items);
      this.$lgThumb.html(thumbList);
    };
    Thumbnail2.prototype.setAnimateThumbStyles = function() {
      if (this.settings.animateThumb) {
        this.core.outer.addClass("lg-animate-thumb");
      }
    };
    Thumbnail2.prototype.manageActiveClassOnSlideChange = function() {
      var _this = this;
      this.core.LGel.on(lGEvents2.beforeSlide + ".thumb", function(event) {
        var $thumb = _this.core.outer.find(".lg-thumb-item");
        var index = event.detail.index;
        $thumb.removeClass("active");
        $thumb.eq(index).addClass("active");
      });
    };
    Thumbnail2.prototype.toggleThumbBar = function() {
      var _this = this;
      if (this.settings.toggleThumb) {
        this.core.outer.addClass("lg-can-toggle");
        this.core.$toolbar.append('<button type="button" aria-label="' + this.settings.thumbnailPluginStrings["toggleThumbnails"] + '" class="lg-toggle-thumb lg-icon"></button>');
        this.core.outer.find(".lg-toggle-thumb").first().on("click.lg", function() {
          _this.core.outer.toggleClass("lg-components-open");
        });
      }
    };
    Thumbnail2.prototype.thumbKeyPress = function() {
      var _this = this;
      this.$LG(window).on("keydown.lg.thumb.global" + this.core.lgId, function(e) {
        if (!_this.core.lgOpened || !_this.settings.toggleThumb)
          return;
        if (e.keyCode === 38) {
          e.preventDefault();
          _this.core.outer.addClass("lg-components-open");
        } else if (e.keyCode === 40) {
          e.preventDefault();
          _this.core.outer.removeClass("lg-components-open");
        }
      });
    };
    Thumbnail2.prototype.destroy = function() {
      if (this.settings.thumbnail) {
        this.$LG(window).off(".lg.thumb.global" + this.core.lgId);
        this.core.LGel.off(".lg.thumb");
        this.core.LGel.off(".thumb");
        this.$thumbOuter.remove();
        this.core.outer.removeClass("lg-has-thumb");
      }
    };
    return Thumbnail2;
  }();

  // node_modules/lightgallery/plugins/zoom/lg-zoom.es5.js
  var __assign3 = function() {
    __assign3 = Object.assign || function __assign4(t) {
      for (var s, i = 1, n = arguments.length; i < n; i++) {
        s = arguments[i];
        for (var p in s)
          if (Object.prototype.hasOwnProperty.call(s, p))
            t[p] = s[p];
      }
      return t;
    };
    return __assign3.apply(this, arguments);
  };
  var zoomSettings = {
    scale: 1,
    zoom: true,
    actualSize: true,
    showZoomInOutIcons: false,
    actualSizeIcons: {
      zoomIn: "lg-zoom-in",
      zoomOut: "lg-zoom-out"
    },
    enableZoomAfter: 300,
    zoomPluginStrings: {
      zoomIn: "Zoom in",
      zoomOut: "Zoom out",
      viewActualSize: "View actual size"
    }
  };
  var lGEvents3 = {
    afterAppendSlide: "lgAfterAppendSlide",
    init: "lgInit",
    hasVideo: "lgHasVideo",
    containerResize: "lgContainerResize",
    updateSlides: "lgUpdateSlides",
    afterAppendSubHtml: "lgAfterAppendSubHtml",
    beforeOpen: "lgBeforeOpen",
    afterOpen: "lgAfterOpen",
    slideItemLoad: "lgSlideItemLoad",
    beforeSlide: "lgBeforeSlide",
    afterSlide: "lgAfterSlide",
    posterClick: "lgPosterClick",
    dragStart: "lgDragStart",
    dragMove: "lgDragMove",
    dragEnd: "lgDragEnd",
    beforeNextSlide: "lgBeforeNextSlide",
    beforePrevSlide: "lgBeforePrevSlide",
    beforeClose: "lgBeforeClose",
    afterClose: "lgAfterClose",
    rotateLeft: "lgRotateLeft",
    rotateRight: "lgRotateRight",
    flipHorizontal: "lgFlipHorizontal",
    flipVertical: "lgFlipVertical",
    autoplay: "lgAutoplay",
    autoplayStart: "lgAutoplayStart",
    autoplayStop: "lgAutoplayStop"
  };
  var Zoom = function() {
    function Zoom2(instance, $LG2) {
      this.core = instance;
      this.$LG = $LG2;
      this.settings = __assign3(__assign3({}, zoomSettings), this.core.settings);
      return this;
    }
    Zoom2.prototype.buildTemplates = function() {
      var zoomIcons = this.settings.showZoomInOutIcons ? '<button id="' + this.core.getIdName("lg-zoom-in") + '" type="button" aria-label="' + this.settings.zoomPluginStrings["zoomIn"] + '" class="lg-zoom-in lg-icon"></button><button id="' + this.core.getIdName("lg-zoom-out") + '" type="button" aria-label="' + this.settings.zoomPluginStrings["zoomIn"] + '" class="lg-zoom-out lg-icon"></button>' : "";
      if (this.settings.actualSize) {
        zoomIcons += '<button id="' + this.core.getIdName("lg-actual-size") + '" type="button" aria-label="' + this.settings.zoomPluginStrings["viewActualSize"] + '" class="' + this.settings.actualSizeIcons.zoomIn + ' lg-icon"></button>';
      }
      this.core.outer.addClass("lg-use-transition-for-zoom");
      this.core.$toolbar.first().append(zoomIcons);
    };
    Zoom2.prototype.enableZoom = function(event) {
      var _this = this;
      var _speed = this.settings.enableZoomAfter + event.detail.delay;
      if (this.$LG("body").first().hasClass("lg-from-hash") && event.detail.delay) {
        _speed = 0;
      } else {
        this.$LG("body").first().removeClass("lg-from-hash");
      }
      this.zoomableTimeout = setTimeout(function() {
        if (!_this.isImageSlide()) {
          return;
        }
        _this.core.getSlideItem(event.detail.index).addClass("lg-zoomable");
        if (event.detail.index === _this.core.index) {
          _this.setZoomEssentials();
        }
      }, _speed + 30);
    };
    Zoom2.prototype.enableZoomOnSlideItemLoad = function() {
      this.core.LGel.on(lGEvents3.slideItemLoad + ".zoom", this.enableZoom.bind(this));
    };
    Zoom2.prototype.getModifier = function(rotateValue, axis, el) {
      var originalRotate = rotateValue;
      rotateValue = Math.abs(rotateValue);
      var transformValues = this.getCurrentTransform(el);
      if (!transformValues) {
        return 1;
      }
      var modifier = 1;
      if (axis === "X") {
        var flipHorizontalValue = Math.sign(parseFloat(transformValues[0]));
        if (rotateValue === 0 || rotateValue === 180) {
          modifier = 1;
        } else if (rotateValue === 90) {
          if (originalRotate === -90 && flipHorizontalValue === 1 || originalRotate === 90 && flipHorizontalValue === -1) {
            modifier = -1;
          } else {
            modifier = 1;
          }
        }
        modifier = modifier * flipHorizontalValue;
      } else {
        var flipVerticalValue = Math.sign(parseFloat(transformValues[3]));
        if (rotateValue === 0 || rotateValue === 180) {
          modifier = 1;
        } else if (rotateValue === 90) {
          var sinX = parseFloat(transformValues[1]);
          var sinMinusX = parseFloat(transformValues[2]);
          modifier = Math.sign(sinX * sinMinusX * originalRotate * flipVerticalValue);
        }
        modifier = modifier * flipVerticalValue;
      }
      return modifier;
    };
    Zoom2.prototype.getImageSize = function($image, rotateValue, axis) {
      var imageSizes = {
        y: "offsetHeight",
        x: "offsetWidth"
      };
      if (Math.abs(rotateValue) === 90) {
        if (axis === "x") {
          axis = "y";
        } else {
          axis = "x";
        }
      }
      return $image[imageSizes[axis]];
    };
    Zoom2.prototype.getDragCords = function(e, rotateValue) {
      if (rotateValue === 90) {
        return {
          x: e.pageY,
          y: e.pageX
        };
      } else {
        return {
          x: e.pageX,
          y: e.pageY
        };
      }
    };
    Zoom2.prototype.getSwipeCords = function(e, rotateValue) {
      var x = e.targetTouches[0].pageX;
      var y = e.targetTouches[0].pageY;
      if (rotateValue === 90) {
        return {
          x: y,
          y: x
        };
      } else {
        return {
          x,
          y
        };
      }
    };
    Zoom2.prototype.getDragAllowedAxises = function(rotateValue, scale) {
      scale = scale || this.scale || 1;
      var allowY = this.imageYSize * scale > this.containerRect.height;
      var allowX = this.imageXSize * scale > this.containerRect.width;
      if (rotateValue === 90) {
        return {
          allowX: allowY,
          allowY: allowX
        };
      } else {
        return {
          allowX,
          allowY
        };
      }
    };
    Zoom2.prototype.getCurrentTransform = function(el) {
      if (!el) {
        return;
      }
      var st = window.getComputedStyle(el, null);
      var tm = st.getPropertyValue("-webkit-transform") || st.getPropertyValue("-moz-transform") || st.getPropertyValue("-ms-transform") || st.getPropertyValue("-o-transform") || st.getPropertyValue("transform") || "none";
      if (tm !== "none") {
        return tm.split("(")[1].split(")")[0].split(",");
      }
      return;
    };
    Zoom2.prototype.getCurrentRotation = function(el) {
      if (!el) {
        return 0;
      }
      var values = this.getCurrentTransform(el);
      if (values) {
        return Math.round(Math.atan2(parseFloat(values[1]), parseFloat(values[0])) * (180 / Math.PI));
      }
      return 0;
    };
    Zoom2.prototype.setZoomEssentials = function() {
      var $image = this.core.getSlideItem(this.core.index).find(".lg-image").first();
      var rotateEl = this.core.getSlideItem(this.core.index).find(".lg-img-rotate").first().get();
      this.rotateValue = this.getCurrentRotation(rotateEl);
      this.imageYSize = this.getImageSize($image.get(), this.rotateValue, "y");
      this.imageXSize = this.getImageSize($image.get(), this.rotateValue, "x");
      this.containerRect = this.core.outer.get().getBoundingClientRect();
      this.modifierX = this.getModifier(this.rotateValue, "X", rotateEl);
      this.modifierY = this.getModifier(this.rotateValue, "Y", rotateEl);
    };
    Zoom2.prototype.zoomImage = function(scale) {
      var offsetX = (this.containerRect.width - this.imageXSize) / 2 + this.containerRect.left;
      var _a = this.core.mediaContainerPosition, top = _a.top, bottom = _a.bottom;
      var topBottomSpacing = Math.abs(top - bottom) / 2;
      var offsetY = (this.containerRect.height - this.imageYSize - topBottomSpacing * this.modifierX) / 2 + this.scrollTop + this.containerRect.top;
      var originalX;
      var originalY;
      if (scale === 1) {
        this.positionChanged = false;
      }
      var dragAllowedAxises = this.getDragAllowedAxises(Math.abs(this.rotateValue), scale);
      var allowY = dragAllowedAxises.allowY, allowX = dragAllowedAxises.allowX;
      if (this.positionChanged) {
        originalX = this.left / (this.scale - 1);
        originalY = this.top / (this.scale - 1);
        this.pageX = Math.abs(originalX) + offsetX;
        this.pageY = Math.abs(originalY) + offsetY;
        this.positionChanged = false;
      }
      var possibleSwipeCords = this.getPossibleSwipeDragCords(this.rotateValue, scale);
      var _x = offsetX - this.pageX;
      var _y = offsetY - this.pageY;
      var x = (scale - 1) * _x;
      var y = (scale - 1) * _y;
      if (allowX) {
        if (this.isBeyondPossibleLeft(x, possibleSwipeCords.minX)) {
          x = possibleSwipeCords.minX;
        } else if (this.isBeyondPossibleRight(x, possibleSwipeCords.maxX)) {
          x = possibleSwipeCords.maxX;
        }
      } else {
        if (scale > 1) {
          if (x < possibleSwipeCords.minX) {
            x = possibleSwipeCords.minX;
          } else if (x > possibleSwipeCords.maxX) {
            x = possibleSwipeCords.maxX;
          }
        }
      }
      if (allowY) {
        if (this.isBeyondPossibleTop(y, possibleSwipeCords.minY)) {
          y = possibleSwipeCords.minY;
        } else if (this.isBeyondPossibleBottom(y, possibleSwipeCords.maxY)) {
          y = possibleSwipeCords.maxY;
        }
      } else {
        if (scale > 1) {
          if (y < possibleSwipeCords.minY) {
            y = possibleSwipeCords.minY;
          } else if (y > possibleSwipeCords.maxY) {
            y = possibleSwipeCords.maxY;
          }
        }
      }
      this.setZoomStyles({
        x,
        y,
        scale
      });
    };
    Zoom2.prototype.setZoomStyles = function(style) {
      var $image = this.core.getSlideItem(this.core.index).find(".lg-image").first();
      var $dummyImage = this.core.outer.find(".lg-current .lg-dummy-img").first();
      var $imageWrap = $image.parent();
      this.scale = style.scale;
      $image.css("transform", "scale3d(" + style.scale + ", " + style.scale + ", 1)");
      $dummyImage.css("transform", "scale3d(" + style.scale + ", " + style.scale + ", 1)");
      var transform = "translate3d(" + style.x + "px, " + style.y + "px, 0)";
      $imageWrap.css("transform", transform);
      this.left = style.x;
      this.top = style.y;
    };
    Zoom2.prototype.setActualSize = function(index, event) {
      var _this = this;
      if (!this.isImageSlide() || this.core.outer.hasClass("lg-first-slide-loading")) {
        return;
      }
      var scale = this.getCurrentImageActualSizeScale();
      if (this.core.outer.hasClass("lg-zoomed")) {
        this.scale = 1;
      } else {
        this.scale = this.getScale(scale);
      }
      this.setPageCords(event);
      this.beginZoom(this.scale);
      this.zoomImage(this.scale);
      setTimeout(function() {
        _this.core.outer.removeClass("lg-grabbing").addClass("lg-grab");
      }, 10);
    };
    Zoom2.prototype.getNaturalWidth = function(index) {
      var $image = this.core.getSlideItem(index).find(".lg-image").first();
      var naturalWidth = this.core.galleryItems[index].width;
      return naturalWidth ? parseFloat(naturalWidth) : $image.get().naturalWidth;
    };
    Zoom2.prototype.getActualSizeScale = function(naturalWidth, width) {
      var _scale;
      var scale;
      if (naturalWidth > width) {
        _scale = naturalWidth / width;
        scale = _scale || 2;
      } else {
        scale = 1;
      }
      return scale;
    };
    Zoom2.prototype.getCurrentImageActualSizeScale = function() {
      var $image = this.core.getSlideItem(this.core.index).find(".lg-image").first();
      var width = $image.get().offsetWidth;
      var naturalWidth = this.getNaturalWidth(this.core.index) || width;
      return this.getActualSizeScale(naturalWidth, width);
    };
    Zoom2.prototype.getPageCords = function(event) {
      var cords = {};
      if (event) {
        cords.x = event.pageX || event.targetTouches[0].pageX;
        cords.y = event.pageY || event.targetTouches[0].pageY;
      } else {
        var containerRect = this.core.outer.get().getBoundingClientRect();
        cords.x = containerRect.width / 2 + containerRect.left;
        cords.y = containerRect.height / 2 + this.scrollTop + containerRect.top;
      }
      return cords;
    };
    Zoom2.prototype.setPageCords = function(event) {
      var pageCords = this.getPageCords(event);
      this.pageX = pageCords.x;
      this.pageY = pageCords.y;
    };
    Zoom2.prototype.beginZoom = function(scale) {
      this.core.outer.removeClass("lg-zoom-drag-transition lg-zoom-dragging");
      if (scale > 1) {
        this.core.outer.addClass("lg-zoomed");
        var $actualSize = this.core.getElementById("lg-actual-size");
        $actualSize.removeClass(this.settings.actualSizeIcons.zoomIn).addClass(this.settings.actualSizeIcons.zoomOut);
      } else {
        this.resetZoom();
      }
      return scale > 1;
    };
    Zoom2.prototype.getScale = function(scale) {
      var actualSizeScale = this.getCurrentImageActualSizeScale();
      if (scale < 1) {
        scale = 1;
      } else if (scale > actualSizeScale) {
        scale = actualSizeScale;
      }
      return scale;
    };
    Zoom2.prototype.init = function() {
      var _this = this;
      if (!this.settings.zoom) {
        return;
      }
      this.buildTemplates();
      this.enableZoomOnSlideItemLoad();
      var tapped = null;
      this.core.outer.on("dblclick.lg", function(event) {
        if (!_this.$LG(event.target).hasClass("lg-image")) {
          return;
        }
        _this.setActualSize(_this.core.index, event);
      });
      this.core.outer.on("touchstart.lg", function(event) {
        var $target = _this.$LG(event.target);
        if (event.targetTouches.length === 1 && $target.hasClass("lg-image")) {
          if (!tapped) {
            tapped = setTimeout(function() {
              tapped = null;
            }, 300);
          } else {
            clearTimeout(tapped);
            tapped = null;
            event.preventDefault();
            _this.setActualSize(_this.core.index, event);
          }
        }
      });
      this.core.LGel.on(lGEvents3.containerResize + ".zoom " + lGEvents3.rotateRight + ".zoom " + lGEvents3.rotateLeft + ".zoom " + lGEvents3.flipHorizontal + ".zoom " + lGEvents3.flipVertical + ".zoom", function() {
        if (!_this.core.lgOpened || !_this.isImageSlide())
          return;
        _this.setPageCords();
        _this.setZoomEssentials();
        _this.zoomImage(_this.scale);
      });
      this.$LG(window).on("scroll.lg.zoom.global" + this.core.lgId, function() {
        if (!_this.core.lgOpened)
          return;
        _this.scrollTop = _this.$LG(window).scrollTop();
      });
      this.core.getElementById("lg-zoom-out").on("click.lg", function() {
        if (_this.core.outer.find(".lg-current .lg-image").get()) {
          _this.scale -= _this.settings.scale;
          _this.scale = _this.getScale(_this.scale);
          _this.beginZoom(_this.scale);
          _this.zoomImage(_this.scale);
        }
      });
      this.core.getElementById("lg-zoom-in").on("click.lg", function() {
        _this.zoomIn();
      });
      this.core.getElementById("lg-actual-size").on("click.lg", function() {
        _this.setActualSize(_this.core.index);
      });
      this.core.LGel.on(lGEvents3.beforeOpen + ".zoom", function() {
        _this.core.outer.find(".lg-item").removeClass("lg-zoomable");
      });
      this.core.LGel.on(lGEvents3.afterOpen + ".zoom", function() {
        _this.scrollTop = _this.$LG(window).scrollTop();
        _this.pageX = _this.core.outer.width() / 2;
        _this.pageY = _this.core.outer.height() / 2 + _this.scrollTop;
        _this.scale = 1;
      });
      this.core.LGel.on(lGEvents3.afterSlide + ".zoom", function(event) {
        var prevIndex = event.detail.prevIndex;
        _this.scale = 1;
        _this.positionChanged = false;
        _this.resetZoom(prevIndex);
        if (_this.isImageSlide()) {
          _this.setZoomEssentials();
        }
      });
      this.zoomDrag();
      this.pinchZoom();
      this.zoomSwipe();
      this.zoomableTimeout = false;
      this.positionChanged = false;
    };
    Zoom2.prototype.zoomIn = function(scale) {
      if (!this.isImageSlide()) {
        return;
      }
      if (scale) {
        this.scale = scale;
      } else {
        this.scale += this.settings.scale;
      }
      this.scale = this.getScale(this.scale);
      this.beginZoom(this.scale);
      this.zoomImage(this.scale);
    };
    Zoom2.prototype.resetZoom = function(index) {
      this.core.outer.removeClass("lg-zoomed lg-zoom-drag-transition");
      var $actualSize = this.core.getElementById("lg-actual-size");
      var $item = this.core.getSlideItem(index !== void 0 ? index : this.core.index);
      $actualSize.removeClass(this.settings.actualSizeIcons.zoomOut).addClass(this.settings.actualSizeIcons.zoomIn);
      $item.find(".lg-img-wrap").first().removeAttr("style");
      $item.find(".lg-image").first().removeAttr("style");
      this.scale = 1;
      this.left = 0;
      this.top = 0;
      this.setPageCords();
    };
    Zoom2.prototype.getTouchDistance = function(e) {
      return Math.sqrt((e.targetTouches[0].pageX - e.targetTouches[1].pageX) * (e.targetTouches[0].pageX - e.targetTouches[1].pageX) + (e.targetTouches[0].pageY - e.targetTouches[1].pageY) * (e.targetTouches[0].pageY - e.targetTouches[1].pageY));
    };
    Zoom2.prototype.pinchZoom = function() {
      var _this = this;
      var startDist = 0;
      var pinchStarted = false;
      var initScale = 1;
      var $item = this.core.getSlideItem(this.core.index);
      this.core.$inner.on("touchstart.lg", function(e) {
        $item = _this.core.getSlideItem(_this.core.index);
        if (!_this.isImageSlide()) {
          return;
        }
        if (e.targetTouches.length === 2 && !_this.core.outer.hasClass("lg-first-slide-loading") && (_this.$LG(e.target).hasClass("lg-item") || $item.get().contains(e.target))) {
          initScale = _this.scale || 1;
          _this.core.outer.removeClass("lg-zoom-drag-transition lg-zoom-dragging");
          _this.core.touchAction = "pinch";
          startDist = _this.getTouchDistance(e);
        }
      });
      this.core.$inner.on("touchmove.lg", function(e) {
        if (e.targetTouches.length === 2 && _this.core.touchAction === "pinch" && (_this.$LG(e.target).hasClass("lg-item") || $item.get().contains(e.target))) {
          e.preventDefault();
          var endDist = _this.getTouchDistance(e);
          var distance = startDist - endDist;
          if (!pinchStarted && Math.abs(distance) > 5) {
            pinchStarted = true;
          }
          if (pinchStarted) {
            _this.scale = Math.max(1, initScale + -distance * 8e-3);
            _this.zoomImage(_this.scale);
          }
        }
      });
      this.core.$inner.on("touchend.lg", function(e) {
        if (_this.core.touchAction === "pinch" && (_this.$LG(e.target).hasClass("lg-item") || $item.get().contains(e.target))) {
          pinchStarted = false;
          startDist = 0;
          if (_this.scale <= 1) {
            _this.resetZoom();
          } else {
            _this.scale = _this.getScale(_this.scale);
            _this.zoomImage(_this.scale);
            _this.core.outer.addClass("lg-zoomed");
          }
          _this.core.touchAction = void 0;
        }
      });
    };
    Zoom2.prototype.touchendZoom = function(startCoords, endCoords, allowX, allowY, touchDuration, rotateValue) {
      var distanceXnew = endCoords.x - startCoords.x;
      var distanceYnew = endCoords.y - startCoords.y;
      var speedX = Math.abs(distanceXnew) / touchDuration + 1;
      var speedY = Math.abs(distanceYnew) / touchDuration + 1;
      if (speedX > 2) {
        speedX += 1;
      }
      if (speedY > 2) {
        speedY += 1;
      }
      distanceXnew = distanceXnew * speedX;
      distanceYnew = distanceYnew * speedY;
      var _LGel = this.core.getSlideItem(this.core.index).find(".lg-img-wrap").first();
      var distance = {};
      distance.x = this.left + distanceXnew * this.modifierX;
      distance.y = this.top + distanceYnew * this.modifierY;
      var possibleSwipeCords = this.getPossibleSwipeDragCords(rotateValue);
      if (Math.abs(distanceXnew) > 15 || Math.abs(distanceYnew) > 15) {
        if (allowY) {
          if (this.isBeyondPossibleTop(distance.y, possibleSwipeCords.minY)) {
            distance.y = possibleSwipeCords.minY;
          } else if (this.isBeyondPossibleBottom(distance.y, possibleSwipeCords.maxY)) {
            distance.y = possibleSwipeCords.maxY;
          }
        }
        if (allowX) {
          if (this.isBeyondPossibleLeft(distance.x, possibleSwipeCords.minX)) {
            distance.x = possibleSwipeCords.minX;
          } else if (this.isBeyondPossibleRight(distance.x, possibleSwipeCords.maxX)) {
            distance.x = possibleSwipeCords.maxX;
          }
        }
        if (allowY) {
          this.top = distance.y;
        } else {
          distance.y = this.top;
        }
        if (allowX) {
          this.left = distance.x;
        } else {
          distance.x = this.left;
        }
        this.setZoomSwipeStyles(_LGel, distance);
        this.positionChanged = true;
      }
    };
    Zoom2.prototype.getZoomSwipeCords = function(startCoords, endCoords, allowX, allowY, possibleSwipeCords) {
      var distance = {};
      if (allowY) {
        distance.y = this.top + (endCoords.y - startCoords.y) * this.modifierY;
        if (this.isBeyondPossibleTop(distance.y, possibleSwipeCords.minY)) {
          var diffMinY = possibleSwipeCords.minY - distance.y;
          distance.y = possibleSwipeCords.minY - diffMinY / 6;
        } else if (this.isBeyondPossibleBottom(distance.y, possibleSwipeCords.maxY)) {
          var diffMaxY = distance.y - possibleSwipeCords.maxY;
          distance.y = possibleSwipeCords.maxY + diffMaxY / 6;
        }
      } else {
        distance.y = this.top;
      }
      if (allowX) {
        distance.x = this.left + (endCoords.x - startCoords.x) * this.modifierX;
        if (this.isBeyondPossibleLeft(distance.x, possibleSwipeCords.minX)) {
          var diffMinX = possibleSwipeCords.minX - distance.x;
          distance.x = possibleSwipeCords.minX - diffMinX / 6;
        } else if (this.isBeyondPossibleRight(distance.x, possibleSwipeCords.maxX)) {
          var difMaxX = distance.x - possibleSwipeCords.maxX;
          distance.x = possibleSwipeCords.maxX + difMaxX / 6;
        }
      } else {
        distance.x = this.left;
      }
      return distance;
    };
    Zoom2.prototype.isBeyondPossibleLeft = function(x, minX) {
      return x >= minX;
    };
    Zoom2.prototype.isBeyondPossibleRight = function(x, maxX) {
      return x <= maxX;
    };
    Zoom2.prototype.isBeyondPossibleTop = function(y, minY) {
      return y >= minY;
    };
    Zoom2.prototype.isBeyondPossibleBottom = function(y, maxY) {
      return y <= maxY;
    };
    Zoom2.prototype.isImageSlide = function() {
      var currentItem = this.core.galleryItems[this.core.index];
      return this.core.getSlideType(currentItem) === "image";
    };
    Zoom2.prototype.getPossibleSwipeDragCords = function(rotateValue, scale) {
      var dataScale = scale || this.scale || 1;
      var elDataScale = Math.abs(dataScale);
      var _a = this.core.mediaContainerPosition, top = _a.top, bottom = _a.bottom;
      var topBottomSpacing = Math.abs(top - bottom) / 2;
      var minY = (this.imageYSize - this.containerRect.height) / 2 + topBottomSpacing * this.modifierX;
      var maxY = this.containerRect.height - this.imageYSize * elDataScale + minY;
      var minX = (this.imageXSize - this.containerRect.width) / 2;
      var maxX = this.containerRect.width - this.imageXSize * elDataScale + minX;
      var possibleSwipeCords = {
        minY,
        maxY,
        minX,
        maxX
      };
      if (Math.abs(rotateValue) === 90) {
        possibleSwipeCords = {
          minY: minX,
          maxY: maxX,
          minX: minY,
          maxX: maxY
        };
      }
      return possibleSwipeCords;
    };
    Zoom2.prototype.setZoomSwipeStyles = function(LGel, distance) {
      LGel.css("transform", "translate3d(" + distance.x + "px, " + distance.y + "px, 0)");
    };
    Zoom2.prototype.zoomSwipe = function() {
      var _this = this;
      var startCoords = {};
      var endCoords = {};
      var isMoved = false;
      var allowX = false;
      var allowY = false;
      var startTime = new Date();
      var endTime = new Date();
      var possibleSwipeCords;
      var _LGel;
      var $item = this.core.getSlideItem(this.core.index);
      this.core.$inner.on("touchstart.lg", function(e) {
        if (!_this.isImageSlide()) {
          return;
        }
        $item = _this.core.getSlideItem(_this.core.index);
        if ((_this.$LG(e.target).hasClass("lg-item") || $item.get().contains(e.target)) && e.targetTouches.length === 1 && _this.core.outer.hasClass("lg-zoomed")) {
          e.preventDefault();
          startTime = new Date();
          _this.core.touchAction = "zoomSwipe";
          _LGel = _this.core.getSlideItem(_this.core.index).find(".lg-img-wrap").first();
          var dragAllowedAxises = _this.getDragAllowedAxises(Math.abs(_this.rotateValue));
          allowY = dragAllowedAxises.allowY;
          allowX = dragAllowedAxises.allowX;
          if (allowX || allowY) {
            startCoords = _this.getSwipeCords(e, Math.abs(_this.rotateValue));
          }
          possibleSwipeCords = _this.getPossibleSwipeDragCords(_this.rotateValue);
          _this.core.outer.addClass("lg-zoom-dragging lg-zoom-drag-transition");
        }
      });
      this.core.$inner.on("touchmove.lg", function(e) {
        if (e.targetTouches.length === 1 && _this.core.touchAction === "zoomSwipe" && (_this.$LG(e.target).hasClass("lg-item") || $item.get().contains(e.target))) {
          e.preventDefault();
          _this.core.touchAction = "zoomSwipe";
          endCoords = _this.getSwipeCords(e, Math.abs(_this.rotateValue));
          var distance = _this.getZoomSwipeCords(startCoords, endCoords, allowX, allowY, possibleSwipeCords);
          if (Math.abs(endCoords.x - startCoords.x) > 15 || Math.abs(endCoords.y - startCoords.y) > 15) {
            isMoved = true;
            _this.setZoomSwipeStyles(_LGel, distance);
          }
        }
      });
      this.core.$inner.on("touchend.lg", function(e) {
        if (_this.core.touchAction === "zoomSwipe" && (_this.$LG(e.target).hasClass("lg-item") || $item.get().contains(e.target))) {
          _this.core.touchAction = void 0;
          _this.core.outer.removeClass("lg-zoom-dragging");
          if (!isMoved) {
            return;
          }
          isMoved = false;
          endTime = new Date();
          var touchDuration = endTime.valueOf() - startTime.valueOf();
          _this.touchendZoom(startCoords, endCoords, allowX, allowY, touchDuration, _this.rotateValue);
        }
      });
    };
    Zoom2.prototype.zoomDrag = function() {
      var _this = this;
      var startCoords = {};
      var endCoords = {};
      var isDragging = false;
      var isMoved = false;
      var allowX = false;
      var allowY = false;
      var startTime;
      var endTime;
      var possibleSwipeCords;
      var _LGel;
      this.core.outer.on("mousedown.lg.zoom", function(e) {
        if (!_this.isImageSlide()) {
          return;
        }
        var $item = _this.core.getSlideItem(_this.core.index);
        if (_this.$LG(e.target).hasClass("lg-item") || $item.get().contains(e.target)) {
          startTime = new Date();
          _LGel = _this.core.getSlideItem(_this.core.index).find(".lg-img-wrap").first();
          var dragAllowedAxises = _this.getDragAllowedAxises(Math.abs(_this.rotateValue));
          allowY = dragAllowedAxises.allowY;
          allowX = dragAllowedAxises.allowX;
          if (_this.core.outer.hasClass("lg-zoomed")) {
            if (_this.$LG(e.target).hasClass("lg-object") && (allowX || allowY)) {
              e.preventDefault();
              startCoords = _this.getDragCords(e, Math.abs(_this.rotateValue));
              possibleSwipeCords = _this.getPossibleSwipeDragCords(_this.rotateValue);
              isDragging = true;
              _this.core.outer.get().scrollLeft += 1;
              _this.core.outer.get().scrollLeft -= 1;
              _this.core.outer.removeClass("lg-grab").addClass("lg-grabbing lg-zoom-drag-transition lg-zoom-dragging");
            }
          }
        }
      });
      this.$LG(window).on("mousemove.lg.zoom.global" + this.core.lgId, function(e) {
        if (isDragging) {
          isMoved = true;
          endCoords = _this.getDragCords(e, Math.abs(_this.rotateValue));
          var distance = _this.getZoomSwipeCords(startCoords, endCoords, allowX, allowY, possibleSwipeCords);
          _this.setZoomSwipeStyles(_LGel, distance);
        }
      });
      this.$LG(window).on("mouseup.lg.zoom.global" + this.core.lgId, function(e) {
        if (isDragging) {
          endTime = new Date();
          isDragging = false;
          _this.core.outer.removeClass("lg-zoom-dragging");
          if (isMoved && (startCoords.x !== endCoords.x || startCoords.y !== endCoords.y)) {
            endCoords = _this.getDragCords(e, Math.abs(_this.rotateValue));
            var touchDuration = endTime.valueOf() - startTime.valueOf();
            _this.touchendZoom(startCoords, endCoords, allowX, allowY, touchDuration, _this.rotateValue);
          }
          isMoved = false;
        }
        _this.core.outer.removeClass("lg-grabbing").addClass("lg-grab");
      });
    };
    Zoom2.prototype.closeGallery = function() {
      this.resetZoom();
    };
    Zoom2.prototype.destroy = function() {
      this.$LG(window).off(".lg.zoom.global" + this.core.lgId);
      this.core.LGel.off(".lg.zoom");
      this.core.LGel.off(".zoom");
      clearTimeout(this.zoomableTimeout);
      this.zoomableTimeout = false;
    };
    return Zoom2;
  }();

  // src/_bundle/main.js
  var import_lazysizes = __toModule(require_lazysizes());
  module_default.plugin(module_default2);
  window.Alpine = module_default;
  window.Cookies = js_cookie_default;
  window.Components = {};
  window.Components.navManager = function() {
    return {
      mobileMenu: false,
      adusFlyout: false,
      studiosFlyout: false,
      inspirationFlyout: false,
      moreFlyout: false,
      adusMobile: false,
      studiosMobile: false,
      inspirationMobile: false,
      moreMobile: false
    };
  };
  window.Components.interiorKitManager = function() {
    return {
      kitSection: "sm"
    };
  };
  window.Components.processManager = function() {
    return {
      visibleSection: false,
      tocSiteVisit() {
        console.log("push");
      }
    };
  };
  window.Components.signatureManager = function() {
    return {
      showCurated: false,
      showBoreas10x12: false,
      showBoreas12x16: false,
      showSolitude10x12: false,
      showSolitude12x16: false,
      showPagodaLeft10x12: false,
      showPagodaLeft12x16: false,
      showPagodaRight10x12: false,
      showPagodaRight12x16: false,
      visibleSection: false
    };
  };
  window.Components.summitManager = function() {
    return {
      showCurated: false,
      visibleSection: false
    };
  };
  window.Components.portlandManager = function() {
    return {
      showCurated: false,
      visibleSection: false
    };
  };
  window.addEventListener("DOMContentLoaded", () => {
    module_default.start();
  });
})();
/*!
 * Flickity v3.0.0
 * Touch, responsive, flickable carousels
 *
 * Licensed GPLv3 for open source use
 * or Flickity Commercial License for commercial use
 *
 * https://flickity.metafizzy.co
 * Copyright 2015-2022 Metafizzy
 */
/*!
 * Infinite Scroll v2.0.4
 * measure size of elements
 * MIT license
 */
/*!
 * Unidragger v3.0.1
 * Draggable base class
 * MIT license
 */
/*!
 * imagesLoaded v5.0.0
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */
/*!
 * lightgallery | 2.5.0 | June 13th 2022
 * http://www.lightgalleryjs.com/
 * Copyright (c) 2020 Sachin Neravath;
 * @license GPLv3
 */
/*! *****************************************************************************
Copyright (c) Microsoft Corporation.

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
PERFORMANCE OF THIS SOFTWARE.
***************************************************************************** */
/*! js-cookie v3.0.1 | MIT */
