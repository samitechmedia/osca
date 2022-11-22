<!----All Ticker scripts below------------------------------->

var flipCounter = function(d, options){

	// Default values
	var defaults = {
		value: 0,
		inc: 1,
		pace: 1000,
		auto: true,
		tFH: 22,
		bFH: 23,
		fW: 28,
		bOffset: 220
	};
	
	var o = options || {},
	doc = window.document,
	divId = typeof d !== 'undefined' && d !== '' ? d : 'flip-counter',
	div = doc.getElementById(divId);
	
	for (var opt in defaults) o[opt] = (opt in o) ? o[opt] : defaults[opt];

	var digitsOld = [], digitsNew = [], subStart, subEnd, x, y, nextCount = null, newDigit, newComma,
	best = {
		q: null,
		pace: 0,
		inc: 0
	};
	
	/**
	 * Sets the value of the counter and animates the digits to new value.
	 * 
	 * Example: myCounter.setValue(500); would set the value of the counter to 500,
	 * no matter what value it was previously.
	 *
	 * @param {int} n
	 *   New counter value
	 */
	this.setValue = function(n){
		if (isNumber(n)){
			x = o.value;
			y = n;
			o.value = n;
			digitCheck(x,y);
		}
		return this;
	};
	
	/**
	 * Sets the increment for the counter. Does NOT animate digits.
	 */
	this.setIncrement = function(n){
		o.inc = isNumber(n) ? n : defaults.inc;
		return this;
	};
	
	/**
	 * Sets the pace of the counter. Only affects counter when auto == true.
	 *
	 * @param {int} n
	 *   New pace for counter in milliseconds
	 */
	this.setPace = function(n){
		o.pace = isNumber(n) ? n : defaults.pace;
		return this;
	};
	
	/**
	 * Sets counter to auto-incrememnt (true) or not (false).
	 *
	 * @param {bool} a
	 *   Should counter auto-increment, true or false
	 */
	this.setAuto = function(a){
		if (a && ! o.atuo){
			o.auto = true;
			doCount();
		}
		if (! a && o.auto){
			if (nextCount) clearNext();
			o.auto = false;
		}
		return this;
	};
	
	/**
	 * Increments counter by one animation based on set 'inc' value.
	 */
	this.step = function(){
		if (! o.auto) doCount();
		return this;
	};
	
	/**
	 * Adds a number to the counter value, not affecting the 'inc' or 'pace' of the counter.
	 *
	 * @param {int} n
	 *   Number to add to counter value
	 */
	this.add = function(n){
		if (isNumber(n)){
			x = o.value;
			o.value += n;
			y = o.value;
			digitCheck(x,y);
		}
		return this;
	};
	
	/**
	 * Subtracts a number from the counter value, not affecting the 'inc' or 'pace' of the counter.
	 *
	 * @param {int} n
	 *   Number to subtract from counter value
	 */
	this.subtract = function(n){
		if (isNumber(n)){
			x = o.value;
			o.value -= n;
			if (o.value >= 0){
				y = o.value;
			}
			else{
				y = "0";
				o.value = 0;
			}
			digitCheck(x,y);
		}
		return this;
	};
	
	/**
	 * Increments counter to given value, animating by current pace and increment.
	 *
	 * @param {int} n
	 *   Number to increment to
	 * @param {int} t (optional)
	 *   Time duration in seconds - makes increment a 'smart' increment
	 * @param {int} p (optional)
	 *   Desired pace for counter if 'smart' increment
	 */
	this.incrementTo = function(n, t, p){
		if (nextCount) clearNext();
		
		// Smart increment
		if (typeof t != 'undefined'){
			var time = isNumber(t) ? t * 1000 : 10000,
			pace = typeof p != 'undefined' && isNumber(p) ? p : o.pace,
			diff = typeof n != 'undefined' && isNumber(n) ? n - o.value : 0,
			cycles, inc, check, i = 0;
			best.q = null;
			
			// Initial best guess
			pace = (time / diff > pace) ? Math.round((time / diff) / 10) * 10 : pace;
			cycles = Math.floor(time / pace);
			inc = Math.floor(diff / cycles);
			
			check = checkSmartValues(diff, cycles, inc, pace, time);
			
			if (diff > 0){
				while (check.result === false && i < 100){				
					pace += 10;
					cycles = Math.floor(time / pace);
					inc = Math.floor(diff / cycles);
					
					check = checkSmartValues(diff, cycles, inc, pace, time);					
					i++;
				}
				
				if (i == 100){
					// Could not find optimal settings, use best found so far
					o.inc = best.inc;
					o.pace = best.pace;
				}
				else{
					// Optimal settings found, use those
					o.inc = inc;
					o.pace = pace;
				}
				
				doIncrement(n, true, cycles);
			}
		
		}
		// Regular increment
		else{
			doIncrement(n);
		}
		
	}
	
	/**
	 * Gets current value of counter.
	 */
	this.getValue = function(){
		return o.value;
	}
	
	/**
	 * Stops all running increments.
	 */
	this.stop = function(){
		if (nextCount) clearNext();
		return this;
	}
	
	//---------------------------------------------------------------------------//
	
	function doCount(){
		x = o.value;
		o.value += o.inc;
		y = o.value;
		digitCheck(x,y);
		if (o.auto === true) nextCount = setTimeout(doCount, o.pace);
	}
	
	function doIncrement(n, s, c){
		var val = o.value,
		smart = (typeof s == 'undefined') ? false : s,
		cycles = (typeof c == 'undefined') ? 1 : c;
		
		if (smart === true) cycles--;
		
		if (val != n){
			x = o.value,
			o.auto = true;

			if (val + o.inc <= n && cycles != 0) val += o.inc
			else val = n;
			
			o.value = val;
			y = o.value;
			
			digitCheck(x,y);
			nextCount = setTimeout(function(){doIncrement(n, smart, cycles)}, o.pace);
		}
		else o.auto = false;
	}
	
	function digitCheck(x,y){
		digitsOld = splitToArray(x);
		digitsNew = splitToArray(y);
		var diff,
		xlen = digitsOld.length,
		ylen = digitsNew.length;
		if (ylen > xlen){
			diff = ylen - xlen;
			while (diff > 0){
				addDigit(ylen - diff + 1, digitsNew[ylen - diff]);
				diff--;
			}
		}
		if (ylen < xlen){
			diff = xlen - ylen;
			while (diff > 0){
				removeDigit(xlen - diff);
				diff--;
			}
		}
		for (var i = 0; i < xlen; i++){
			if (digitsNew[i] != digitsOld[i]){
				animateDigit(i, digitsOld[i], digitsNew[i]);
			}
		}
	}
	
	function animateDigit(n, oldDigit, newDigit){
		var speed, step = 0, w, a,
		bp = [
			'-' + o.fW + 'px -' + (oldDigit * o.tFH) + 'px',
			(o.fW * -2) + 'px -' + (oldDigit * o.tFH) + 'px',
			'0 -' + (newDigit * o.tFH) + 'px',
			'-' + o.fW + 'px -' + (oldDigit * o.bFH + o.bOffset) + 'px',
			(o.fW * -2) + 'px -' + (newDigit * o.bFH + o.bOffset) + 'px',
			(o.fW * -3) + 'px -' + (newDigit * o.bFH + o.bOffset) + 'px',
			'0 -' + (newDigit * o.bFH + o.bOffset) + 'px'
		];

		if (o.auto === true && o.pace <= 300){
			switch (n){
				case 0:
					speed = o.pace/6;
					break;
				case 1:
					speed = o.pace/5;
					break;
				case 2:
					speed = o.pace/4;
					break;
				case 3:
					speed = o.pace/3;
					break;
				default:
					speed = o.pace/1.5;
					break;
			}
		}
		else{
			speed = 80;
		}
		// Cap on slowest animation can go
		speed = (speed > 80) ? 80 : speed;
		
		function animate(){
			if (step < 7){
				w = step < 3 ? 't' : 'b';
				a = doc.getElementById(divId + "_" + w + "_d" + n);
				if (a) a.style.backgroundPosition = bp[step];
				step++;
				if (step != 3) setTimeout(animate, speed);
				else animate();
			}
		}
		
		animate();
	}
	
	// Creates array of digits for easier manipulation
	function splitToArray(input){
		return input.toString().split("").reverse();
	}

	// Adds new digit
	function addDigit(len, digit){
		var li = Number(len) - 1;
		newDigit = doc.createElement("ul");
		newDigit.className = 'cd';
		newDigit.id = divId + '_d' + li;
		newDigit.innerHTML = '<li class="t" id="' + divId + '_t_d' + li + '"></li><li class="b" id="' + divId + '_b_d' + li + '"></li>';
		
		if (li % 3 == 0){
			newComma = doc.createElement("ul");
			newComma.className = 'cd';
			newComma.innerHTML = '<li class="s"></li>';
			div.insertBefore(newComma, div.firstChild);
		}
		
		div.insertBefore(newDigit, div.firstChild);
		doc.getElementById(divId + "_t_d" + li).style.backgroundPosition = '0 -' + (digit * o.tFH) + 'px';
		doc.getElementById(divId + "_b_d" + li).style.backgroundPosition = '0 -' + (digit * o.bFH + o.bOffset) + 'px';
	}
	
	// Removes digit
	function removeDigit(id){
		var remove = doc.getElementById(divId + "_d" + id);
		div.removeChild(remove);

		// Check for leading comma
		var first = div.firstChild.firstChild;
		if ((" " + first.className + " ").indexOf(" s ") > -1 ){
			remove = first.parentNode;
			div.removeChild(remove);
		}
	}

	// Sets the correct digits on load
	function initialDigitCheck(init){
		// Creates the right number of digits
		var initial = init.toString(),
		count = initial.length,
		bit = 1, i;
		for (i = 0; i < count; i++){
			newDigit = doc.createElement("ul");
			newDigit.className = 'cd';
			newDigit.id = divId + '_d' + i;
			newDigit.innerHTML = newDigit.innerHTML = '<li class="t" id="' + divId + '_t_d' + i + '"></li><li class="b" id="' + divId + '_b_d' + i + '"></li>';
			div.insertBefore(newDigit, div.firstChild);
			if (bit != (count) && bit % 3 == 0){
				newComma = doc.createElement("ul");
				newComma.className = 'cd';
				newComma.innerHTML = '<li class="s"></li>';
				div.insertBefore(newComma, div.firstChild);
			}
			bit++;
		}
		// Sets them to the right number
		var digits = splitToArray(initial);
		for (i = 0; i < count; i++){
			doc.getElementById(divId + "_t_d" + i).style.backgroundPosition = '0 -' + (digits[i] * o.tFH) + 'px';
			doc.getElementById(divId + "_b_d" + i).style.backgroundPosition = '0 -' + (digits[i] * o.bFH + o.bOffset) + 'px';
		}
		// Do first animation
		if (o.auto === true) nextCount = setTimeout(doCount, o.pace);
	}
	
	// Checks values for smart increment and creates debug text
	function checkSmartValues(diff, cycles, inc, pace, time){
		var r = {result: true}, q;
		// Test conditions, all must pass to continue:
		// 1: Unrounded inc value needs to be at least 1
		r.cond1 = (diff / cycles >= 1) ? true : false;
		// 2: Don't want to overshoot the target number
		r.cond2 = (cycles * inc <= diff) ? true : false;
		// 3: Want to be within 10 of the target number
		r.cond3 = (Math.abs(cycles * inc - diff) <= 10) ? true : false;
		// 4: Total time should be within 100ms of target time.
		r.cond4 = (Math.abs(cycles * pace - time) <= 100) ? true : false;
		// 5: Calculated time should not be over target time
		r.cond5 = (cycles * pace <= time) ? true : false;
		
		// Keep track of 'good enough' values in case can't find best one within 100 loops
		if (r.cond1 && r.cond2 && r.cond4 && r.cond5){
			q = Math.abs(diff - (cycles * inc)) + Math.abs(cycles * pace - time);
			if (best.q === null) best.q = q;
			if (q <= best.q){
				best.pace = pace;
				best.inc = inc;
			}
		}
		
		for (var i = 1; i <= 5; i++){
			if (r['cond' + i] === false){
				r.result = false;
			}			
		}
		return r;
	}
	
	// http://stackoverflow.com/questions/18082/validate-numbers-in-javascript-isnumeric/1830844
	function isNumber(n) {
		return !isNaN(parseFloat(n)) && isFinite(n);
	}
	
	function clearNext(){
		clearTimeout(nextCount);
		nextCount = null;
	}
	
	// Start it up
	initialDigitCheck(o.value);
};

//end base apple countdown script=====================================================================================================================================================================

function getTimestamp(str) {
  		var d = str.match(/\d+/g); // extract date parts
  		return +new Date(d[0], d[1] - 1, d[2], d[3], d[4], d[5]); // build Date object
	}

	function countDownTrigger(id, days, hours, minutes, seconds, hours_zero, minutes_zero, seconds_zero, days_zero, days_zero_zero)
	{
		if(seconds.getValue() == 0)
		{
			if(seconds_zero.getValue() == 0)
			{
				if(minutes.getValue() == 0)
				{
					if(minutes_zero.getValue() == 0)
					{
						if(hours.getValue() == 0)
						{
							if(hours_zero.getValue() == 0)
							{
								if(days.getValue() == 0)
								{
									if(days_zero.getValue() == 0)
									{
										if(days_zero_zero.getValue() == 0)
										{
											days_zero_zero.setValue(0);
										}
										else
										{
											days_zero_zero.setValue(days_zero_zero.getValue()-1);
											days_zero.setValue(9);
											days.setValue(9);
											hours_zero.setValue(2);
											hours.setValue(3);
											minutes_zero.setValue(5);
											minutes.setValue(9);
											seconds_zero.setValue(5);
											seconds.setValue(9);
										}

									}
									else
									{
										days_zero.setValue(days_zero.getValue()-1);
										days.setValue(9);
										hours_zero.setValue(2);
										hours.setValue(3);
										minutes_zero.setValue(5);
										minutes.setValue(9);
										seconds_zero.setValue(5);
										seconds.setValue(9);
									}
								}
								else
								{
									days.setValue(days.getValue()-1);
									hours_zero.setValue(2);
									hours.setValue(3);
									minutes_zero.setValue(5);
									minutes.setValue(9);
									seconds_zero.setValue(5);
									seconds.setValue(9);
								}
							}
							else
							{
								hours_zero.setValue(hours_zero.getValue()-1);
								hours.setValue(9);
								minutes_zero.setValue(5);
								minutes.setValue(9);
								seconds_zero.setValue(5);
								seconds.setValue(9);
							}
						}
						else
						{
							hours.setValue(hours.getValue()-1);
							minutes_zero.setValue(5);
							minutes.setValue(9);
							seconds_zero.setValue(5);
							seconds.setValue(9);
						}
					}
					else
					{
						minutes_zero.setValue(minutes_zero.getValue()-1);
						minutes.setValue(9);
						seconds_zero.setValue(5);
						seconds.setValue(9);
					}
				}
				else
				{
					minutes.setValue(minutes.getValue()-1);
					seconds_zero.setValue(5);
					seconds.setValue(9);
				}
			}
			else
			{
				seconds_zero.setValue(seconds_zero.getValue()-1);
				seconds.setValue(9);
			}
		}
		else
		{
			seconds.setValue(seconds.getValue()-1);
		}
	}

	function countDown(finalDateGMT, id)
	{
		var timestamp_then = getTimestamp(finalDateGMT);
		var timestamp_now = new Date().getTime();
		var timestamp_diff = Math.round((timestamp_then - timestamp_now)/1000)-(new Date().getTimezoneOffset()*60);
		$('div#'+id).html('<ul style="list-style-type: none; padding: 0px; margin: 0px; display: inline"><li style="font-size: 13px; font-weight: bold; margin-right: 18px; float: left; width: 158px; background: #000; border-radius: 5px; color: #fff; text-align: center; padding: 5px 0px">Days:</li><li style="font-size: 13px; font-weight: bold; margin-right: 18px; float: left; width: 103px; background: #000; border-radius: 5px; color: #fff; text-align: center; padding: 5px 0px">Hours:</li><li style="font-size: 13px; font-weight: bold; margin-right: 18px; float: left; width: 103px; background: #000; border-radius: 5px; color: #fff; text-align: center; padding: 5px 0px">Minutes:</li><li style="font-size: 13px; font-weight: bold; float: left; width: 103px; background: #000; border-radius: 5px; color: #fff; text-align: center; padding: 5px 0px">Seconds:</li></ul><div style="clear: both;" id="'+id+'-days-zero-zero" class="flip-counter"></div><div id="'+id+'-days-zero" class="flip-counter"></div><div id="'+id+'-days" class="flip-counter last"></div><div id="'+id+'-hours-zero" class="flip-counter"></div><div id="'+id+'-hours" class="flip-counter last"></div><div id="'+id+'-minutes-zero" class="flip-counter"></div><div id="'+id+'-minutes" class="flip-counter last"></div><div id="'+id+'-seconds-zero" class="flip-counter"></div><div id="'+id+'-seconds" class="flip-counter last"></div>');
		if(timestamp_diff < 1)
		{
		var days = new flipCounter(id+'-days', {value: 0, auto: false});
		var hours = new flipCounter(id+'-hours', {value: 0, auto: false});
		var minutes = new flipCounter(id+'-minutes', {value: 0, auto: false});
		var seconds = new flipCounter(id+'-seconds', {value: 0, auto: false});
		var hours_zero = new flipCounter(id+'-hours-zero', {value: 0, auto: false});
		var minutes_zero = new flipCounter(id+'-minutes-zero', {value: 0, auto: false});
		var seconds_zero = new flipCounter(id+'-seconds-zero', {value: 0, auto: false});
		var days_zero = new flipCounter(id+'-days-zero', {value: 0, auto: false});
		var days_zero_zero = new flipCounter(id+'-days-zero-zero', {value: 0, auto: false});
		}
		else
		{
		var days_zero_zero_left = Math.floor(timestamp_diff/(3600*24*100));
		timestamp_diff = timestamp_diff - (days_zero_zero_left*(3600*24*100));
		var days_zero_left = Math.floor(timestamp_diff/(3600*24*10));
		timestamp_diff = timestamp_diff - (days_zero_left*(3600*24*10));
		var days_left = Math.floor(timestamp_diff/(3600*24));
		timestamp_diff = timestamp_diff - (days_left*(3600*24));
		var hours_zero_left = Math.floor(timestamp_diff/36000);
		timestamp_diff = timestamp_diff - (hours_zero_left*36000);
		var hours_left = Math.floor(timestamp_diff/3600);
		timestamp_diff = timestamp_diff - (hours_left*3600);
		var minutes_zero_left = Math.floor(timestamp_diff/600);
		timestamp_diff = timestamp_diff - (minutes_zero_left*600);
		var minutes_left = Math.floor(timestamp_diff/60);
		timestamp_diff = timestamp_diff - (minutes_left*60);
		var seconds_zero_left = Math.floor(timestamp_diff/10);
		timestamp_diff = timestamp_diff - (seconds_zero_left*10);
		var seconds_left = timestamp_diff;
		var days = new flipCounter(id+'-days', {value: days_left, auto: false});
		var hours = new flipCounter(id+'-hours', {value: hours_left, auto: false});
		var minutes = new flipCounter(id+'-minutes', {value: minutes_left, auto: false});
		var seconds = new flipCounter(id+'-seconds', {value: seconds_left, auto: false});
		var hours_zero = new flipCounter(id+'-hours-zero', {value: hours_zero_left, auto: false});
		var minutes_zero = new flipCounter(id+'-minutes-zero', {value: minutes_zero_left, auto: false});
		var seconds_zero = new flipCounter(id+'-seconds-zero', {value: seconds_zero_left, auto: false});
		var days_zero = new flipCounter(id+'-days-zero', {value: days_zero_left, auto: false});
		var days_zero_zero = new flipCounter(id+'-days-zero-zero', {value: days_zero_zero_left, auto: false});
		}
		$('div#'+id+' .flip-counter.last ul:last-child').css({'margin-right': '15px'});
		setInterval(function(){ 
			countDownTrigger(id, days, hours, minutes, seconds, hours_zero, minutes_zero, seconds_zero, days_zero, days_zero_zero);
		}, 1000);
		
	}

function jackpotTrigger(full, decimal, zero, start_amount,increment,now)
{
	var diff = new Date().getTime()-now;
	increment = (diff/1000)*increment;
	var new_value = start_amount+increment;
	var full_value = Math.floor(new_value);
	var zero_value = Math.floor((new_value-full_value)*10);
	var decimal_value = Math.floor((new_value-(zero_value/10)-full_value)*100);
	full.setValue(full_value);
	decimal.setValue(decimal_value);
	zero.setValue(zero_value);
}

function jackpot(startDateGMT, id, start_amount, daily_increment, currency, speed)
{
	//calculate start amount
	var timestamp_startdate = getTimestamp(startDateGMT)-(new Date().getTimezoneOffset()*60000);
	var timestamp_now = new Date().getTime();
	var timestamp_diff = (timestamp_now - timestamp_startdate)/(3600*24*1000);
	if(timestamp_diff < 0)
		var start = start_amount;
	else
		var start = start_amount + (daily_increment*timestamp_diff);
	var start_full = Math.floor(start);
	var start_zero = Math.floor((start-start_full)*10);
	var start_decimal = Math.floor((start-(start_zero/10)-start_full)*100);

	//calculate increment per second
	var increment = daily_increment/(3600*24);

	//display currency
	if(currency == 1)
		var currency_html = '<div class="flip-counter"><ul class="cd"><li class="usd"></li></ul></div>';
	else if(currency == 2)
		var currency_html = '<div class="flip-counter"><ul class="cd"><li class="gbp"></li></ul></div>';
	else if(currency == 3)
		var currency_html = '<div class="flip-counter"><ul class="cd"><li class="eur"></li></ul></div>';
	else
		var currency_html = '';

	//display jackpot
	$('div#'+id).html(currency_html+'<div id="'+id+'-full" class="flip-counter"></div><div class="flip-counter"><ul class="cd"><li class="dot"></li></ul></div><div id="'+id+'-zero" class="flip-counter"></div><div id="'+id+'-decimal" class="flip-counter"></div>');
	var full = new flipCounter(id+'-full', {value: start_full, auto: false});
	var zero = new flipCounter(id+'-zero', {value: start_zero, auto: false});
	var decimal = new flipCounter(id+'-decimal', {value: start_decimal, auto: false});
	if(timestamp_diff > 0)
	{
		setInterval(function(){jackpotTrigger(full, decimal, zero, start, increment, timestamp_now);}, speed);
	}
}

$(document).ready(function(){
    $.ajax({
        method: "GET",
        url: "/assets/jackpots/jackpot_include.php",
        data: { ticker: "true"},
        success: function(data){
            console.log(typeof(data));
            var jackpotShow = parseInt(data);
            jackpot('2015-10-05 00:00:00', 'ticker-new', jackpotShow, 1000, 1,1000);

        }
    })
});
