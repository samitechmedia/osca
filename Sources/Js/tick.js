(function() {
  var $, Tick, Tick_Flip, Tick_Scroll,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; },
    __hasProp = Object.prototype.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor; child.__super__ = parent.prototype; return child; };

  $ = jQuery;

  $.fn.ticker = function(options) {
    var el, _i, _len, _results;
    if (typeof String.prototype.trim === 'function') {
      _results = [];
      for (_i = 0, _len = this.length; _i < _len; _i++) {
        el = this[_i];
        el = $(el);
        if (el.hasClass('tick-flip')) {
          _results.push(new Tick_Flip($(el), options));
        } else if (el.hasClass('tick-scroll')) {
          _results.push(new Tick_Scroll($(el), options));
        } else if (el.hasClass('tick-custom-scroll')) {
          _results.push(new Tick_Custom_Scroll($(el), options));
        } else {
          _results.push(new Tick(el, options));
        }
      }
      return _results;
    }
  };

  /*
  
    The acutal Ticker logic. The stored value is
    represented by a span/element per digit (and separator).
  
    Attributes
  
      options     object    all runtime options
      element     object    the element that is used for this ticker
      value       int       whatever value you pass in to the ticker
      separators  array     a list of the all separators that were found inbetween all digits
                            all digits are represented by an empty element
      running     boolean   indicates whether the ticker has been started
      increment   function  callback used to update @value on every tick
  
    Options
  
      incremental   mixed     can be either a fixed numeric value that gets added to the base value on each tick or
                              a function that gets called with the current value and must return the updated number
      delay (ms)    int       the time after which the target value is being increased
      separators    boolean   if true, all arbitrary characters inbetween digits are wrapped in seperated elements
                              if false, these characters are stripped out
      autostart     boolean   whether or not to start the ticker when instantiated
  
    Events
  
      onStart     
      onTick      
      onStop
  */

  Tick = (function() {

    function Tick(element, options) {
      this.element = element;
      if (options == null) options = {};
      this.running = false;
      this.options = {
        delay: options.delay || 1000,
        separators: options.separators != null ? options.separators : false,
        autostart: options.autostart != null ? options.autostart : true
      };
      this.increment = this.build_increment_callback(options.incremental);
      this.value = Number(this.element.html().replace(/[^\d]/g, ''));
      this.separators = this.element.html().trim().split(/[\d]/i);
      this.element.addClass('tick-active');
      if (this.options.autostart) this.start();
    }

    Tick.prototype.build_increment_callback = function(option) {
      if ((option != null) && {}.toString.call(option) === '[object Function]') {
        return option;
      } else if (typeof option === 'number') {
        return function(val) {
          return val + option;
        };
      } else {
        return function(val) {
          return val + 1;
        };
      }
    };

    Tick.prototype.render = function() {
      var container, containers, digits, i, _len, _ref, _results;
      digits = String(this.value).split('');
      containers = this.element.children(':not(.tick-separator)');
      if (digits.length !== containers.length) {
        for (i = 0, _ref = digits.length - containers.length; 0 <= _ref ? i < _ref : i > _ref; 0 <= _ref ? i++ : i--) {
          if (this.options.separators && this.separators[i]) {
            this.build_separator(this.separators[i]);
          }
          containers.push(this.build_container(i, _ref - 1));
        }
      }
      _results = [];
      for (i = 0, _len = containers.length; i < _len; i++) {
        container = containers[i];
        _results.push(this.update_container(container, digits[i], i, _len - 1));
      }
      return _results;
    };

    /*
        These methods will create all visible elements and manipulate the output
    */

    Tick.prototype.build_container = function(i) {
      return $('<span></span>').appendTo(this.element);
    };

    Tick.prototype.build_separator = function(content) {
      return $("<span class='tick-separator'>" + content + "</span>").appendTo(this.element);
    };

    Tick.prototype.update_container = function(container, digit) {
      return $(container).html(digit);
    };

    Tick.prototype.refresh_delay = function(new_delay) {
      clearTimeout(this.timer);
      this.options.delay = new_delay;
      return this.set_timer();
    };

    Tick.prototype.set_timer = function() {
      var _this = this;
      if (this.running) {
        return this.timer = setTimeout(function() {
          return _this.tick();
        }, this.options.delay);
      }
    };

    /*
        Events
    */

    Tick.prototype.tick = function() {
      this.value = this.increment(this.value);
      this.render();
      return this.set_timer();
    };

    /*
        Controls for the ticker
    */

    Tick.prototype.start = function() {
      this.element.empty();
      this.render();
      this.running = true;
      return this.set_timer();
    };

    Tick.prototype.stop = function() {
      clearTimeout(this.timer);
      return this.running = false;
    };

    return Tick;

  })();

  /*
    CSS3 Transforms browser support:
    https://developer.mozilla.org/en/CSS/transform#Browser_compatibility
  */

  Tick_Flip = (function(_super) {

    __extends(Tick_Flip, _super);

    function Tick_Flip() {
      this.lower = __bind(this.lower, this);
      Tick_Flip.__super__.constructor.apply(this, arguments);
    }

    Tick_Flip.prototype.build_container = function(i) {
      var val;
      val = String(this.value).split('')[i];
      return $("<span class='tick-wrapper'>        <span class='tick-old'>" + val + "</span>        <span class='tick-old-move'>" + val + "</span>        <span class='tick-new'></span>        <span class='tick-new-move'>" + val + "</span>      </span>").appendTo(this.element);
    };

    Tick_Flip.prototype.flip = function(target, digit, scale, duration, onComplete) {
      var _this = this;
      target.css({
        borderSpacing: 100
      });
      return target.stop(true, true).addClass('tick-moving').animate({
        borderSpacing: 0
      }, {
        duration: duration,
        easing: 'easeInCubic',
        step: function(now, fx) {
          var val;
          val = scale(now);
          return target.css({
            '-webkit-transform': "scaleY(" + val + ")",
            '-moz-transform': "scaleY(" + val + ")",
            '-ms-transform': "scaleY(" + val + ")",
            '-o-transform': "scaleY(" + val + ")",
            'transform': "scaleY(" + val + ")"
          });
        },
        complete: function() {
          target.html(digit).css({
            borderSpacing: '',
            '-webkit-transform': '',
            '-moz-transform': '',
            '-ms-transform': '',
            '-o-transform': '',
            'transform': ''
          }).removeClass('tick-moving');
          return onComplete();
        }
      });
    };

    Tick_Flip.prototype.upper = function(now) {
      return now / 100;
    };

    Tick_Flip.prototype.lower = function(now) {
      return 1 - this.upper(now);
    };

    Tick_Flip.prototype.update_container = function(container, digit) {
      var parts;
      parts = $(container).children();
      if (this.running && parts.eq(2).html() !== digit) {
        this.flip(parts.eq(1), digit, this.upper, this.options.delay / 4, function() {});
        this.flip(parts.eq(3).html(digit), digit, this.lower, this.options.delay / 3, function() {
          return parts.eq(0).html(digit);
        });
      }
      return parts.eq(2).html(digit);
    };

    return Tick_Flip;

  })(Tick);

  Tick_Scroll = (function(_super) {

    __extends(Tick_Scroll, _super);

    function Tick_Scroll() {
      Tick_Scroll.__super__.constructor.apply(this, arguments);
    }

    Tick_Scroll.prototype.build_container = function(i) {
      return $('<span class="tick-wheel"><span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span></span>').appendTo(this.element);
    };

    Tick_Scroll.prototype.update_container = function(container, digit) {
      if (this.running) {
        return $(container).animate({
          top: digit * -96
        }, this.options.delay);
      } else {
        return $(container).css({
          top: digit * -96
        });
      }
    };

    return Tick_Scroll;

  })(Tick);
  
  Tick_Custom_Scroll = (function(_super) {
	var step;
	
    __extends(Tick_Custom_Scroll, _super);

    function Tick_Custom_Scroll() {
      Tick_Custom_Scroll.__super__.constructor.apply(this, arguments);
    }

    Tick_Custom_Scroll.prototype.build_container = function(i, last) {
		if ( i === last ) {
			return $('<span class="tick-custom-scroll">&nbsp;&nbsp;<span class="inner-tick-scroll"><span>0</span><span>9</span><span>8</span><span>7</span><span>6</span><span>5</span><span>4</span><span>3</span><span>2</span><span>1</span><span>0</span></span></span>').appendTo(this.element);
		}
		return $('<span></span>').appendTo(this.element);
    };

    Tick_Custom_Scroll.prototype.update_container = function(container, digit, i, last) {				
		var that = this,
			digit = +digit;
			
		step = step || parseInt( $(container).css('line-height') );
		
		if (this.running) {
			if ( i === last ) {
				var $_el = $(container).find('.inner-tick-scroll');
				
				$_el.is(':animated') && $_el.stop(true);
				
				var delay = that.options.delay,
					currentPos = parseInt( $_el.css('bottom') ),
					currentNum = Math.abs(currentPos / step) % 10,
					isUp = digit > currentNum,
					path = ( isUp ? digit - currentNum : digit + 10 - currentNum ) * step,
					v = path / delay;
					
				if (isUp) {
					$_el.animate({
						bottom: -digit * step
					}, {
						duration: delay,
						easing  : 'linear'
					});
				}
				else {
					$_el.animate({
						bottom: -10 * step
					}, {
						duration: Math.abs( ( -10 * step - currentPos ) / v ),
						easing  : 'linear',
						complete: function(){
							$(this).css('bottom', 0);
							that.incrementPrev( $(container) );
						}
					})
					.animate({
						bottom: -digit * step
					}, {
						duration: (digit * step) / v,
						easing  : 'linear'
					});
				}				
			}
		} else {
			if ( i === last) {
				return $(container).find('.inner-tick-scroll').css({
					bottom: digit * -step
				});
			}
			return $(container).html(digit);
		}		
    };
		
    Tick_Custom_Scroll.prototype.incrementPrev = function($el){
		var $prevEl = this.getPrev($el);
		if ($prevEl.length) {
			var newNum = (+$prevEl.text()) + 1;
			if (newNum > 9) {
				$prevEl.text(0);
				this.incrementPrev($prevEl);
			}
			else $prevEl.text(newNum);
		}	
	}
	
	Tick_Custom_Scroll.prototype.getPrev = function($el){
		var $prev = $el.prev();
		if ( $prev.length && $prev.is('.tick-separator') ) {
			$prev = this.getPrev($prev);
		}
		return $prev;
	}
	
	return Tick_Custom_Scroll;

  })(Tick);

}).call(this);


$(document).ready(function(){
	$( '.tick:eq(0)' ).ticker(
        { 
    incremental : 1 /*function(currentValue) {
                     // currentValue really is the current value of the ticker
                     // this is because the code inside the ticker plugin, that triggers
                     // your function, will take care of passing it as a parameter in
                     return currentValue + random_generator(1, 100);
                  },*/,

    delay       : 900,
    separators  : true
  });  
  
	$( '.tick:eq(1)' ).ticker(
        { 
    incremental : 1 /*function(currentValue) {
                     // currentValue really is the current value of the ticker
                     // this is because the code inside the ticker plugin, that triggers
                     // your function, will take care of passing it as a parameter in
                     return currentValue + random_generator(1, 100);
                  },*/,

    delay       : 700,
    separators  : true
  }); 
  
	$( '.tick:eq(2)' ).ticker(
        { 
    incremental : 1 /*function(currentValue) {
                     // currentValue really is the current value of the ticker
                     // this is because the code inside the ticker plugin, that triggers
                     // your function, will take care of passing it as a parameter in
                     return currentValue + random_generator(1, 100);
                  },*/,

    delay       : 1300,
    separators  : true
  });
  	$( '.tick:eq(3)' ).ticker(
        { 
    incremental : 1 /*function(currentValue) {
                     // currentValue really is the current value of the ticker
                     // this is because the code inside the ticker plugin, that triggers
                     // your function, will take care of passing it as a parameter in
                     return currentValue + random_generator(1, 100);
                  },*/,

    delay       : 1000,
    separators  : true
  });
  	$( '.tick:eq(4)' ).ticker(
        { 
    incremental : 1 /*function(currentValue) {
                     // currentValue really is the current value of the ticker
                     // this is because the code inside the ticker plugin, that triggers
                     // your function, will take care of passing it as a parameter in
                     return currentValue + random_generator(1, 100);
                  },*/,

    delay       : 1100,
    separators  : true
  });
  	$( '.tick:eq(5)' ).ticker(
        { 
    incremental : 1 /*function(currentValue) {
                     // currentValue really is the current value of the ticker
                     // this is because the code inside the ticker plugin, that triggers
                     // your function, will take care of passing it as a parameter in
                     return currentValue + random_generator(1, 100);
                  },*/,

    delay       : 600,
    separators  : true
  });  
  
$( '.tick:eq(6)' ).ticker(
        { 
    incremental : 1 /*function(currentValue) {
                     // currentValue really is the current value of the ticker
                     // this is because the code inside the ticker plugin, that triggers
                     // your function, will take care of passing it as a parameter in
                     return currentValue + random_generator(1, 100);
                  },*/,

    delay       : 750,
    separators  : true
  });    
  
  
  
  
  
  
  
  
  	
	
	
});