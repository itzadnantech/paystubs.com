;(function() {
    "use strict";
    
    /**
     * @license
     * Copyright 2015 Google Inc. All Rights Reserved.
     *
     * Licensed under the Apache License, Version 2.0 (the "License");
     * you may not use this file except in compliance with the License.
     * You may obtain a copy of the License at
     *
     *      http://www.apache.org/licenses/LICENSE-2.0
     *
     * Unless required by applicable law or agreed to in writing, software
     * distributed under the License is distributed on an "AS IS" BASIS,
     * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     * See the License for the specific language governing permissions and
     * limitations under the License.
     */
    
    /**
     * A component handler interface using the revealing module design pattern.
     * More details on this design pattern here:
     * https://github.com/jasonmayes/mdl-component-design-pattern
     *
     * @author Jason Mayes.
     */
    /* exported componentHandler */
    
    // Pre-defining the componentHandler interface, for closure documentation and
    // static verification.
    var componentHandler = {
      /**
       * Searches existing DOM for elements of our component type and upgrades them
       * if they have not already been upgraded.
       *
       * @param {string=} optJsClass the programatic name of the element class we
       * need to create a new instance of.
       * @param {string=} optCssClass the name of the CSS class elements of this
       * type will have.
       */
      upgradeDom: function(optJsClass, optCssClass) {},
      /**
       * Upgrades a specific element rather than all in the DOM.
       *
       * @param {!Element} element The element we wish to upgrade.
       * @param {string=} optJsClass Optional name of the class we want to upgrade
       * the element to.
       */
      upgradeElement: function(element, optJsClass) {},
      /**
       * Upgrades a specific list of elements rather than all in the DOM.
       *
       * @param {!Element|!Array<!Element>|!NodeList|!HTMLCollection} elements
       * The elements we wish to upgrade.
       */
      upgradeElements: function(elements) {},
      /**
       * Upgrades all registered components found in the current DOM. This is
       * automatically called on window load.
       */
      upgradeAllRegistered: function() {},
      /**
       * Allows user to be alerted to any upgrades that are performed for a given
       * component type
       *
       * @param {string} jsClass The class name of the MDL component we wish
       * to hook into for any upgrades performed.
       * @param {function(!HTMLElement)} callback The function to call upon an
       * upgrade. This function should expect 1 parameter - the HTMLElement which
       * got upgraded.
       */
      registerUpgradedCallback: function(jsClass, callback) {},
      /**
       * Registers a class for future use and attempts to upgrade existing DOM.
       *
       * @param {componentHandler.ComponentConfigPublic} config the registration configuration
       */
      register: function(config) {},
      /**
       * Downgrade either a given node, an array of nodes, or a NodeList.
       *
       * @param {!Node|!Array<!Node>|!NodeList} nodes
       */
      downgradeElements: function(nodes) {}
    };
    
    componentHandler = (function() {
      'use strict';
    
      /** @type {!Array<componentHandler.ComponentConfig>} */
      var registeredComponents_ = [];
    
      /** @type {!Array<componentHandler.Component>} */
      var createdComponents_ = [];
    
      var componentConfigProperty_ = 'mdlComponentConfigInternal_';
    
      /**
       * Searches registered components for a class we are interested in using.
       * Optionally replaces a match with passed object if specified.
       *
       * @param {string} name The name of a class we want to use.
       * @param {componentHandler.ComponentConfig=} optReplace Optional object to replace match with.
       * @return {!Object|boolean}
       * @private
       */
      function findRegisteredClass_(name, optReplace) {
        for (var i = 0; i < registeredComponents_.length; i++) {
          if (registeredComponents_[i].className === name) {
            if (typeof optReplace !== 'undefined') {
              registeredComponents_[i] = optReplace;
            }
            return registeredComponents_[i];
          }
        }
        return false;
      }
    
      /**
       * Returns an array of the classNames of the upgraded classes on the element.
       *
       * @param {!Element} element The element to fetch data from.
       * @return {!Array<string>}
       * @private
       */
      function getUpgradedListOfElement_(element) {
        var dataUpgraded = element.getAttribute('data-upgraded');
        // Use `['']` as default value to conform the `,name,name...` style.
        return dataUpgraded === null ? [''] : dataUpgraded.split(',');
      }
    
      /**
       * Returns true if the given element has already been upgraded for the given
       * class.
       *
       * @param {!Element} element The element we want to check.
       * @param {string} jsClass The class to check for.
       * @returns {boolean}
       * @private
       */
      function isElementUpgraded_(element, jsClass) {
        var upgradedList = getUpgradedListOfElement_(element);
        return upgradedList.indexOf(jsClass) !== -1;
      }
    
      /**
       * Create an event object.
       *
       * @param {string} eventType The type name of the event.
       * @param {boolean} bubbles Whether the event should bubble up the DOM.
       * @param {boolean} cancelable Whether the event can be canceled.
       * @returns {!Event}
       */
      function createEvent_(eventType, bubbles, cancelable) {
        if ('CustomEvent' in window && typeof window.CustomEvent === 'function') {
          return new CustomEvent(eventType, {
            bubbles: bubbles,
            cancelable: cancelable
          });
        } else {
          var ev = document.createEvent('Events');
          ev.initEvent(eventType, bubbles, cancelable);
          return ev;
        }
      }
    
      /**
       * Searches existing DOM for elements of our component type and upgrades them
       * if they have not already been upgraded.
       *
       * @param {string=} optJsClass the programatic name of the element class we
       * need to create a new instance of.
       * @param {string=} optCssClass the name of the CSS class elements of this
       * type will have.
       */
      function upgradeDomInternal(optJsClass, optCssClass) {
        if (typeof optJsClass === 'undefined' &&
            typeof optCssClass === 'undefined') {
          for (var i = 0; i < registeredComponents_.length; i++) {
            upgradeDomInternal(registeredComponents_[i].className,
                registeredComponents_[i].cssClass);
          }
        } else {
          var jsClass = /** @type {string} */ (optJsClass);
          if (typeof optCssClass === 'undefined') {
            var registeredClass = findRegisteredClass_(jsClass);
            if (registeredClass) {
              optCssClass = registeredClass.cssClass;
            }
          }
    
          var elements = document.querySelectorAll('.' + optCssClass);
          for (var n = 0; n < elements.length; n++) {
            upgradeElementInternal(elements[n], jsClass);
          }
        }
      }
    
      /**
       * Upgrades a specific element rather than all in the DOM.
       *
       * @param {!Element} element The element we wish to upgrade.
       * @param {string=} optJsClass Optional name of the class we want to upgrade
       * the element to.
       */
      function upgradeElementInternal(element, optJsClass) {
        // Verify argument type.
        if (!(typeof element === 'object' && element instanceof Element)) {
          throw new Error('Invalid argument provided to upgrade MDL element.');
        }
        // Allow upgrade to be canceled by canceling emitted event.
        var upgradingEv = createEvent_('mdl-componentupgrading', true, true);
        element.dispatchEvent(upgradingEv);
        if (upgradingEv.defaultPrevented) {
          return;
        }
    
        var upgradedList = getUpgradedListOfElement_(element);
        var classesToUpgrade = [];
        // If jsClass is not provided scan the registered components to find the
        // ones matching the element's CSS classList.
        if (!optJsClass) {
          var classList = element.classList;
          registeredComponents_.forEach(function(component) {
            // Match CSS & Not to be upgraded & Not upgraded.
            if (classList.contains(component.cssClass) &&
                classesToUpgrade.indexOf(component) === -1 &&
                !isElementUpgraded_(element, component.className)) {
              classesToUpgrade.push(component);
            }
          });
        } else if (!isElementUpgraded_(element, optJsClass)) {
          classesToUpgrade.push(findRegisteredClass_(optJsClass));
        }
    
        // Upgrade the element for each classes.
        for (var i = 0, n = classesToUpgrade.length, registeredClass; i < n; i++) {
          registeredClass = classesToUpgrade[i];
          if (registeredClass) {
            // Mark element as upgraded.
            upgradedList.push(registeredClass.className);
            element.setAttribute('data-upgraded', upgradedList.join(','));
            var instance = new registeredClass.classConstructor(element);
            instance[componentConfigProperty_] = registeredClass;
            createdComponents_.push(instance);
            // Call any callbacks the user has registered with this component type.
            for (var j = 0, m = registeredClass.callbacks.length; j < m; j++) {
              registeredClass.callbacks[j](element);
            }
    
            if (registeredClass.widget) {
              // Assign per element instance for control over API
              element[registeredClass.className] = instance;
            }
          } else {
            throw new Error(
              'Unable to find a registered component for the given class.');
          }
    
          var upgradedEv = createEvent_('mdl-componentupgraded', true, false);
          element.dispatchEvent(upgradedEv);
        }
      }
    
      /**
       * Upgrades a specific list of elements rather than all in the DOM.
       *
       * @param {!Element|!Array<!Element>|!NodeList|!HTMLCollection} elements
       * The elements we wish to upgrade.
       */
      function upgradeElementsInternal(elements) {
        if (!Array.isArray(elements)) {
          if (elements instanceof Element) {
            elements = [elements];
          } else {
            elements = Array.prototype.slice.call(elements);
          }
        }
        for (var i = 0, n = elements.length, element; i < n; i++) {
          element = elements[i];
          if (element instanceof HTMLElement) {
            upgradeElementInternal(element);
            if (element.children.length > 0) {
              upgradeElementsInternal(element.children);
            }
          }
        }
      }
    
      /**
       * Registers a class for future use and attempts to upgrade existing DOM.
       *
       * @param {componentHandler.ComponentConfigPublic} config
       */
      function registerInternal(config) {
        // In order to support both Closure-compiled and uncompiled code accessing
        // this method, we need to allow for both the dot and array syntax for
        // property access. You'll therefore see the `foo.bar || foo['bar']`
        // pattern repeated across this method.
        var widgetMissing = (typeof config.widget === 'undefined' &&
            typeof config['widget'] === 'undefined');
        var widget = true;
    
        if (!widgetMissing) {
          widget = config.widget || config['widget'];
        }
    
        var newConfig = /** @type {componentHandler.ComponentConfig} */ ({
          classConstructor: config.constructor || config['constructor'],
          className: config.classAsString || config['classAsString'],
          cssClass: config.cssClass || config['cssClass'],
          widget: widget,
          callbacks: []
        });
    
        registeredComponents_.forEach(function(item) {
          if (item.cssClass === newConfig.cssClass) {
            throw new Error('The provided cssClass has already been registered: ' + item.cssClass);
          }
          if (item.className === newConfig.className) {
            throw new Error('The provided className has already been registered');
          }
        });
    
        if (config.constructor.prototype
            .hasOwnProperty(componentConfigProperty_)) {
          throw new Error(
              'MDL component classes must not have ' + componentConfigProperty_ +
              ' defined as a property.');
        }
    
        var found = findRegisteredClass_(config.classAsString, newConfig);
    
        if (!found) {
          registeredComponents_.push(newConfig);
        }
      }
    
      /**
       * Allows user to be alerted to any upgrades that are performed for a given
       * component type
       *
       * @param {string} jsClass The class name of the MDL component we wish
       * to hook into for any upgrades performed.
       * @param {function(!HTMLElement)} callback The function to call upon an
       * upgrade. This function should expect 1 parameter - the HTMLElement which
       * got upgraded.
       */
      function registerUpgradedCallbackInternal(jsClass, callback) {
        var regClass = findRegisteredClass_(jsClass);
        if (regClass) {
          regClass.callbacks.push(callback);
        }
      }
    
      /**
       * Upgrades all registered components found in the current DOM. This is
       * automatically called on window load.
       */
      function upgradeAllRegisteredInternal() {
        for (var n = 0; n < registeredComponents_.length; n++) {
          upgradeDomInternal(registeredComponents_[n].className);
        }
      }
    
      /**
       * Check the component for the downgrade method.
       * Execute if found.
       * Remove component from createdComponents list.
       *
       * @param {?componentHandler.Component} component
       */
      function deconstructComponentInternal(component) {
        if (component) {
          var componentIndex = createdComponents_.indexOf(component);
          createdComponents_.splice(componentIndex, 1);
    
          var upgrades = component.element_.getAttribute('data-upgraded').split(',');
          var componentPlace = upgrades.indexOf(component[componentConfigProperty_].classAsString);
          upgrades.splice(componentPlace, 1);
          component.element_.setAttribute('data-upgraded', upgrades.join(','));
    
          var ev = createEvent_('mdl-componentdowngraded', true, false);
          component.element_.dispatchEvent(ev);
        }
      }
    
      /**
       * Downgrade either a given node, an array of nodes, or a NodeList.
       *
       * @param {!Node|!Array<!Node>|!NodeList} nodes
       */
      function downgradeNodesInternal(nodes) {
        /**
         * Auxiliary function to downgrade a single node.
         * @param  {!Node} node the node to be downgraded
         */
        var downgradeNode = function(node) {
          createdComponents_.filter(function(item) {
            return item.element_ === node;
          }).forEach(deconstructComponentInternal);
        };
        if (nodes instanceof Array || nodes instanceof NodeList) {
          for (var n = 0; n < nodes.length; n++) {
            downgradeNode(nodes[n]);
          }
        } else if (nodes instanceof Node) {
          downgradeNode(nodes);
        } else {
          throw new Error('Invalid argument provided to downgrade MDL nodes.');
        }
      }
    
      // Now return the functions that should be made public with their publicly
      // facing names...
      return {
        upgradeDom: upgradeDomInternal,
        upgradeElement: upgradeElementInternal,
        upgradeElements: upgradeElementsInternal,
        upgradeAllRegistered: upgradeAllRegisteredInternal,
        registerUpgradedCallback: registerUpgradedCallbackInternal,
        register: registerInternal,
        downgradeElements: downgradeNodesInternal
      };
    })();
    
    /**
     * Describes the type of a registered component type managed by
     * componentHandler. Provided for benefit of the Closure compiler.
     *
     * @typedef {{
     *   constructor: Function,
     *   classAsString: string,
     *   cssClass: string,
     *   widget: (string|boolean|undefined)
     * }}
     */
    componentHandler.ComponentConfigPublic;  // jshint ignore:line
    
    /**
     * Describes the type of a registered component type managed by
     * componentHandler. Provided for benefit of the Closure compiler.
     *
     * @typedef {{
     *   constructor: !Function,
     *   className: string,
     *   cssClass: string,
     *   widget: (string|boolean),
     *   callbacks: !Array<function(!HTMLElement)>
     * }}
     */
    componentHandler.ComponentConfig;  // jshint ignore:line
    
    /**
     * Created component (i.e., upgraded element) type as managed by
     * componentHandler. Provided for benefit of the Closure compiler.
     *
     * @typedef {{
     *   element_: !HTMLElement,
     *   className: string,
     *   classAsString: string,
     *   cssClass: string,
     *   widget: string
     * }}
     */
    componentHandler.Component;  // jshint ignore:line
    
    // Export all symbols, for the benefit of Closure compiler.
    // No effect on uncompiled code.
    componentHandler['upgradeDom'] = componentHandler.upgradeDom;
    componentHandler['upgradeElement'] = componentHandler.upgradeElement;
    componentHandler['upgradeElements'] = componentHandler.upgradeElements;
    componentHandler['upgradeAllRegistered'] =
        componentHandler.upgradeAllRegistered;
    componentHandler['registerUpgradedCallback'] =
        componentHandler.registerUpgradedCallback;
    componentHandler['register'] = componentHandler.register;
    componentHandler['downgradeElements'] = componentHandler.downgradeElements;
    window.componentHandler = componentHandler;
    window['componentHandler'] = componentHandler;
    
    window.addEventListener('load', function() {
      'use strict';
    
      /**
       * Performs a "Cutting the mustard" test. If the browser supports the features
       * tested, adds a mdl-js class to the <html> element. It then upgrades all MDL
       * components requiring JavaScript.
       */
      if ('classList' in document.createElement('div') &&
          'querySelector' in document &&
          'addEventListener' in window && Array.prototype.forEach) {
        document.documentElement.classList.add('mdl-js');
        componentHandler.upgradeAllRegistered();
      } else {
        /**
         * Dummy function to avoid JS errors.
         */
        componentHandler.upgradeElement = function() {};
        /**
         * Dummy function to avoid JS errors.
         */
        componentHandler.register = function() {};
      }
    });
    
    // Source: https://github.com/darius/requestAnimationFrame/blob/master/requestAnimationFrame.js
    // Adapted from https://gist.github.com/paulirish/1579671 which derived from
    // http://paulirish.com/2011/requestanimationframe-for-smart-animating/
    // http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating
    // requestAnimationFrame polyfill by Erik Möller.
    // Fixes from Paul Irish, Tino Zijdel, Andrew Mao, Klemen Slavič, Darius Bacon
    // MIT license
    if (!Date.now) {
        /**
         * Date.now polyfill.
         * @return {number} the current Date
         */
        Date.now = function () {
            return new Date().getTime();
        };
        Date['now'] = Date.now;
    }
    var vendors = [
        'webkit',
        'moz'
    ];
    for (var i = 0; i < vendors.length && !window.requestAnimationFrame; ++i) {
        var vp = vendors[i];
        window.requestAnimationFrame = window[vp + 'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vp + 'CancelAnimationFrame'] || window[vp + 'CancelRequestAnimationFrame'];
        window['requestAnimationFrame'] = window.requestAnimationFrame;
        window['cancelAnimationFrame'] = window.cancelAnimationFrame;
    }
    if (/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent) || !window.requestAnimationFrame || !window.cancelAnimationFrame) {
        var lastTime = 0;
        /**
         * requestAnimationFrame polyfill.
         * @param  {!Function} callback the callback function.
         */
        window.requestAnimationFrame = function (callback) {
            var now = Date.now();
            var nextTime = Math.max(lastTime + 16, now);
            return setTimeout(function () {
                callback(lastTime = nextTime);
            }, nextTime - now);
        };
        window.cancelAnimationFrame = clearTimeout;
        window['requestAnimationFrame'] = window.requestAnimationFrame;
        window['cancelAnimationFrame'] = window.cancelAnimationFrame;
    }

    var MaterialTooltip = function MaterialTooltip(element) {
        this.element_ = element;
        // Initialize instance.
        this.init();
    };
    window['MaterialTooltip'] = MaterialTooltip;
    /**
       * Store constants in one place so they can be updated easily.
       *
       * @enum {string | number}
       * @private
       */
    MaterialTooltip.prototype.Constant_ = {};
    /**
       * Store strings for class names defined by this component that are used in
       * JavaScript. This allows us to simply change it in one place should we
       * decide to modify at a later date.
       *
       * @enum {string}
       * @private
       */
    MaterialTooltip.prototype.CssClasses_ = {
        IS_ACTIVE: 'is-active',
        BOTTOM: 'mdl-tooltip--bottom',
        LEFT: 'mdl-tooltip--left',
        RIGHT: 'mdl-tooltip--right',
        TOP: 'mdl-tooltip--top'
    };
    /**
       * Handle mouseenter for tooltip.
       *
       * @param {Event} event The event that fired.
       * @private
       */
    MaterialTooltip.prototype.handleMouseEnter_ = function (event) {
        var props = event.target.getBoundingClientRect();
        var left = props.left + props.width / 2;
        var top = props.top + props.height / 2;
        var marginLeft = -1 * (this.element_.offsetWidth / 2);
        var marginTop = -1 * (this.element_.offsetHeight / 2);
        if (this.element_.classList.contains(this.CssClasses_.LEFT) || this.element_.classList.contains(this.CssClasses_.RIGHT)) {
            left = props.width / 2;
            if (top + marginTop < 0) {
                this.element_.style.top = '0';
                this.element_.style.marginTop = '0';
            } else {
                this.element_.style.top = top + 'px';
                this.element_.style.marginTop = marginTop + 'px';
            }
        } else {
            if (left + marginLeft < 0) {
                this.element_.style.left = '0';
                this.element_.style.marginLeft = '0';
            } else {
                this.element_.style.left = left + 'px';
                this.element_.style.marginLeft = marginLeft + 'px';
            }
        }
        if (this.element_.classList.contains(this.CssClasses_.TOP)) {
            this.element_.style.top = props.top - this.element_.offsetHeight - 10 + 'px';
        } else if (this.element_.classList.contains(this.CssClasses_.RIGHT)) {
            this.element_.style.left = props.left + props.width + 10 + 'px';
        } else if (this.element_.classList.contains(this.CssClasses_.LEFT)) {
            this.element_.style.left = props.left - this.element_.offsetWidth - 10 + 'px';
        } else {
            this.element_.style.top = props.top + props.height + 10 + 'px';
        }
        this.element_.classList.add(this.CssClasses_.IS_ACTIVE);
    };
    /**
       * Hide tooltip on mouseleave or scroll
       *
       * @private
       */
    MaterialTooltip.prototype.hideTooltip_ = function () {
        this.element_.classList.remove(this.CssClasses_.IS_ACTIVE);
    };
    /**
       * Initialize element.
       */
    MaterialTooltip.prototype.init = function () {
        if (this.element_) {
            var forElId = this.element_.getAttribute('for') || this.element_.getAttribute('data-mdl-for');
            if (forElId) {
                this.forElement_ = document.getElementById(forElId);
            }
            if (this.forElement_) {
                // It's left here because it prevents accidental text selection on Android
                if (!this.forElement_.hasAttribute('tabindex')) {
                    this.forElement_.setAttribute('tabindex', '0');
                }
                this.boundMouseEnterHandler = this.handleMouseEnter_.bind(this);
                this.boundMouseLeaveAndScrollHandler = this.hideTooltip_.bind(this);
                this.forElement_.addEventListener('mouseenter', this.boundMouseEnterHandler, false);
                this.forElement_.addEventListener('touchend', this.boundMouseEnterHandler, false);
                this.forElement_.addEventListener('mouseleave', this.boundMouseLeaveAndScrollHandler, false);
                window.addEventListener('scroll', this.boundMouseLeaveAndScrollHandler, true);
                window.addEventListener('touchstart', this.boundMouseLeaveAndScrollHandler);
            }
        }
    };
    // The component registers itself. It can assume componentHandler is available
    // in the global scope.
    componentHandler.register({
        constructor: MaterialTooltip,
        classAsString: 'MaterialTooltip',
        cssClass: 'mdl-tooltip'
    });
}());