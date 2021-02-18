(function($, undefined){
		
	/**
	*  acf
	*
	*  description
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
		
	// The global acf object
	var acf = {};
	
	// Set as a browser global
	window.acf = acf;
	
	/** @var object Data sent from PHP */
	acf.data = {};
	
	
	/**
	*  get
	*
	*  Gets a specific data value
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	string name
	*  @return	mixed
	*/
	
	acf.get = function( name ){
		return this.data[name] || null;
	};
	
	
	/**
	*  has
	*
	*  Returns `true` if the data exists and is not null
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	string name
	*  @return	boolean
	*/
	
	acf.has = function( name ){
		return this.get(name) !== null;
	};
	
	
	/**
	*  set
	*
	*  Sets a specific data value
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	string name
	*  @param	mixed value
	*  @return	this
	*/
	
	acf.set = function( name, value ){
		this.data[ name ] = value;
		return this;
	};
	
	
	/**
	*  uniqueId
	*
	*  Returns a unique ID
	*
	*  @date	9/11/17
	*  @since	5.6.3
	*
	*  @param	string prefix Optional prefix.
	*  @return	string
	*/
	
	var idCounter = 0;
	acf.uniqueId = function(prefix){
		var id = ++idCounter + '';
		return prefix ? prefix + id : id;
	};
	
	/**
	*  acf.uniqueArray
	*
	*  Returns a new array with only unique values
	*  Credit: https://stackoverflow.com/questions/1960473/get-all-unique-values-in-an-array-remove-duplicates
	*
	*  @date	23/3/18
	*  @since	5.6.9
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.uniqueArray = function( array ){
		function onlyUnique(value, index, self) { 
		    return self.indexOf(value) === index;
		}
		return array.filter( onlyUnique );
	};
	
	/**
	*  uniqid
	*
	*  Returns a unique ID (PHP version)
	*
	*  @date	9/11/17
	*  @since	5.6.3
	*  @source	http://locutus.io/php/misc/uniqid/
	*
	*  @param	string prefix Optional prefix.
	*  @return	string
	*/
	
	var uniqidSeed = '';
	acf.uniqid = function(prefix, moreEntropy){
		//  discuss at: http://locutus.io/php/uniqid/
		// original by: Kevin van Zonneveld (http://kvz.io)
		//  revised by: Kankrelune (http://www.webfaktory.info/)
		//      note 1: Uses an internal counter (in locutus global) to avoid collision
		//   example 1: var $id = uniqid()
		//   example 1: var $result = $id.length === 13
		//   returns 1: true
		//   example 2: var $id = uniqid('foo')
		//   example 2: var $result = $id.length === (13 + 'foo'.length)
		//   returns 2: true
		//   example 3: var $id = uniqid('bar', true)
		//   example 3: var $result = $id.length === (23 + 'bar'.length)
		//   returns 3: true
		if (typeof prefix === 'undefined') {
			prefix = '';
		}
		
		var retId;
		var formatSeed = function(seed, reqWidth) {
			seed = parseInt(seed, 10).toString(16); // to hex str
			if (reqWidth < seed.length) { // so long we split
				return seed.slice(seed.length - reqWidth);
			}
			if (reqWidth > seed.length) { // so short we pad
				return Array(1 + (reqWidth - seed.length)).join('0') + seed;
			}
			return seed;
		};
		
		if (!uniqidSeed) { // init seed with big random int
			uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
		}
		uniqidSeed++;
		
		retId = prefix; // start with prefix, add current milliseconds hex string
		retId += formatSeed(parseInt(new Date().getTime() / 1000, 10), 8);
		retId += formatSeed(uniqidSeed, 5); // add seed hex string
		if (moreEntropy) {
			// for more entropy we add a float lower to 10
			retId += (Math.random() * 10).toFixed(8).toString();
		}
		
		return retId;
	};
	
	
	/**
	*  strReplace
	*
	*  Performs a string replace
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	string search
	*  @param	string replace
	*  @param	string subject
	*  @return	string
	*/
	
	acf.strReplace = function( search, replace, subject ){
		return subject.split(search).join(replace);
	};
	
	
	/**
	*  strCamelCase
	*
	*  Converts a string into camelCase
	*  Thanks to https://stackoverflow.com/questions/2970525/converting-any-string-into-camel-case
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	string str
	*  @return	string
	*/
	
	acf.strCamelCase = function( str ){
		var matches = str.match( /([a-zA-Z0-9]+)/g );
		return matches ? matches.map(function( s, i ){
			var c = s.charAt(0);
			return ( i === 0 ? c.toLowerCase() : c.toUpperCase() ) + s.slice(1);
		}).join('') : '';
	};

	/**
	*  strPascalCase
	*
	*  Converts a string into PascalCase
	*  Thanks to https://stackoverflow.com/questions/1026069/how-do-i-make-the-first-letter-of-a-string-uppercase-in-javascript
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	string str
	*  @return	string
	*/
	
	acf.strPascalCase = function( str ){
		var camel = acf.strCamelCase( str );
		return camel.charAt(0).toUpperCase() + camel.slice(1); 
	};
	
	/**
	*  acf.strSlugify
	*
	*  Converts a string into a HTML class friendly slug
	*
	*  @date	21/3/18
	*  @since	5.6.9
	*
	*  @param	string str
	*  @return	string
	*/
	
	acf.strSlugify = function( str ){
		return acf.strReplace( '_', '-', str.toLowerCase() );
	};
	
	
	acf.strSanitize = function( str ){
		
		// chars (https://jsperf.com/replace-foreign-characters)
		var map = {
            "À": "A",
            "Á": "A",
            "Â": "A",
            "Ã": "A",
            "Ä": "A",
            "Å": "A",
            "Æ": "AE",
            "Ç": "C",
            "È": "E",
            "É": "E",
            "Ê": "E",
            "Ë": "E",
            "Ì": "I",
            "Í": "I",
            "Î": "I",
            "Ï": "I",
            "Ð": "D",
            "Ñ": "N",
            "Ò": "O",
            "Ó": "O",
            "Ô": "O",
            "Õ": "O",
            "Ö": "O",
            "Ø": "O",
            "Ù": "U",
            "Ú": "U",
            "Û": "U",
            "Ü": "U",
            "Ý": "Y",
            "ß": "s",
            "à": "a",
            "á": "a",
            "â": "a",
            "ã": "a",
            "ä": "a",
            "å": "a",
            "æ": "ae",
            "ç": "c",
            "è": "e",
            "é": "e",
            "ê": "e",
            "ë": "e",
            "ì": "i",
            "í": "i",
            "î": "i",
            "ï": "i",
            "ñ": "n",
            "ò": "o",
            "ó": "o",
            "ô": "o",
            "õ": "o",
            "ö": "o",
            "ø": "o",
            "ù": "u",
            "ú": "u",
            "û": "u",
            "ü": "u",
            "ý": "y",
            "ÿ": "y",
            "Ā": "A",
            "ā": "a",
            "Ă": "A",
            "ă": "a",
            "Ą": "A",
            "ą": "a",
            "Ć": "C",
            "ć": "c",
            "Ĉ": "C",
            "ĉ": "c",
            "Ċ": "C",
            "ċ": "c",
            "Č": "C",
            "č": "c",
            "Ď": "D",
            "ď": "d",
            "Đ": "D",
            "đ": "d",
            "Ē": "E",
            "ē": "e",
            "Ĕ": "E",
            "ĕ": "e",
            "Ė": "E",
            "ė": "e",
            "Ę": "E",
            "ę": "e",
            "Ě": "E",
            "ě": "e",
            "Ĝ": "G",
            "ĝ": "g",
            "Ğ": "G",
            "ğ": "g",
            "Ġ": "G",
            "ġ": "g",
            "Ģ": "G",
            "ģ": "g",
            "Ĥ": "H",
            "ĥ": "h",
            "Ħ": "H",
            "ħ": "h",
            "Ĩ": "I",
            "ĩ": "i",
            "Ī": "I",
            "ī": "i",
            "Ĭ": "I",
            "ĭ": "i",
            "Į": "I",
            "į": "i",
            "İ": "I",
            "ı": "i",
            "Ĳ": "IJ",
            "ĳ": "ij",
            "Ĵ": "J",
            "ĵ": "j",
            "Ķ": "K",
            "ķ": "k",
            "Ĺ": "L",
            "ĺ": "l",
            "Ļ": "L",
            "ļ": "l",
            "Ľ": "L",
            "ľ": "l",
            "Ŀ": "L",
            "ŀ": "l",
            "Ł": "l",
            "ł": "l",
            "Ń": "N",
            "ń": "n",
            "Ņ": "N",
            "ņ": "n",
            "Ň": "N",
            "ň": "n",
            "ŉ": "n",
            "Ō": "O",
            "ō": "o",
            "Ŏ": "O",
            "ŏ": "o",
            "Ő": "O",
            "ő": "o",
            "Œ": "OE",
            "œ": "oe",
            "Ŕ": "R",
            "ŕ": "r",
            "Ŗ": "R",
            "ŗ": "r",
            "Ř": "R",
            "ř": "r",
            "Ś": "S",
            "ś": "s",
            "Ŝ": "S",
            "ŝ": "s",
            "Ş": "S",
            "ş": "s",
            "Š": "S",
            "š": "s",
            "Ţ": "T",
            "ţ": "t",
            "Ť": "T",
            "ť": "t",
            "Ŧ": "T",
            "ŧ": "t",
            "Ũ": "U",
            "ũ": "u",
            "Ū": "U",
            "ū": "u",
            "Ŭ": "U",
            "ŭ": "u",
            "Ů": "U",
            "ů": "u",
            "Ű": "U",
            "ű": "u",
            "Ų": "U",
            "ų": "u",
            "Ŵ": "W",
            "ŵ": "w",
            "Ŷ": "Y",
            "ŷ": "y",
            "Ÿ": "Y",
            "Ź": "Z",
            "ź": "z",
            "Ż": "Z",
            "ż": "z",
            "Ž": "Z",
            "ž": "z",
            "ſ": "s",
            "ƒ": "f",
            "Ơ": "O",
            "ơ": "o",
            "Ư": "U",
            "ư": "u",
            "Ǎ": "A",
            "ǎ": "a",
            "Ǐ": "I",
            "ǐ": "i",
            "Ǒ": "O",
            "ǒ": "o",
            "Ǔ": "U",
            "ǔ": "u",
            "Ǖ": "U",
            "ǖ": "u",
            "Ǘ": "U",
            "ǘ": "u",
            "Ǚ": "U",
            "ǚ": "u",
            "Ǜ": "U",
            "ǜ": "u",
            "Ǻ": "A",
            "ǻ": "a",
            "Ǽ": "AE",
            "ǽ": "ae",
            "Ǿ": "O",
            "ǿ": "o",
            
            // extra
            ' ': '_',
			"'": '',
			'?': '',
			'/': '',
			'\\': '',
			'.': '',
			',': '',
			'`': '',
			'>': '',
			'<': '',
			'"': '',
			'[': '',
			']': '',
			'|': '',
			'{': '',
			'}': '',
			'(': '',
			')': ''
        };
		
		// vars
		var nonWord = /\W/g;
        var mapping = function (c) {
            return (map[c] !== undefined) ? map[c] : c;
        };
        
        // replace
        str = str.replace(nonWord, mapping);
	    
	    // lowercase
	    str = str.toLowerCase();
	    
	    // return
	    return str;	
	};
	
	/**
	*  acf.strMatch
	*
	*  Returns the number of characters that match between two strings
	*
	*  @date	1/2/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.strMatch = function( s1, s2 ){
		
		// vars
		var val = 0;
		var min = Math.min( s1.length, s2.length );
		
		// loop
		for( var i = 0; i < min; i++ ) {
			if( s1[i] !== s2[i] ) {
				break;
			}
			val++;
		}
		
		// return
		return val;
	};

	/**
	 * Escapes HTML entities from a string.
	 *
	 * @date	08/06/2020
	 * @since	5.9.0
	 *
	 * @param	string string The input string.
	 * @return	string
	 */
	acf.strEscape = function( string ){
		var htmlEscapes = {
			'&': '&amp;',
			'<': '&lt;',
			'>': '&gt;',
			'"': '&quot;',
			"'": '&#39;'
		};
		return ('' + string).replace(/[&<>"']/g, function( chr ) {
			return htmlEscapes[ chr ];
		});
	};

	// Tests.
	//console.log( acf.strEscape('Test 1') );
	//console.log( acf.strEscape('Test & 1') );
	//console.log( acf.strEscape('Test\'s &amp; 1') );
	//console.log( acf.strEscape('<script>js</script>') );

	/**
	 * Unescapes HTML entities from a string.
	 *
	 * @date	08/06/2020
	 * @since	5.9.0
	 *
	 * @param	string string The input string.
	 * @return	string
	 */
	acf.strUnescape = function( string ){
		var htmlUnescapes = {
			'&amp;': '&',
			'&lt;': '<',
			'&gt;': '>',
			'&quot;': '"',
			'&#39;': "'"
		};
		return ('' + string).replace(/&amp;|&lt;|&gt;|&quot;|&#39;/g, function( entity ) {
			return htmlUnescapes[ entity ];
		});
	};
	
	// Tests.
	//console.log( acf.strUnescape( acf.strEscape('Test 1') ) );
	//console.log( acf.strUnescape( acf.strEscape('Test & 1') ) );
	//console.log( acf.strUnescape( acf.strEscape('Test\'s &amp; 1') ) );
	//console.log( acf.strUnescape( acf.strEscape('<script>js</script>') ) );

	/**
	 * Escapes HTML entities from a string.
	 *
	 * @date	08/06/2020
	 * @since	5.9.0
	 *
	 * @param	string string The input string.
	 * @return	string
	 */
	acf.escAttr = acf.strEscape;

	/**
	 * Encodes <script> tags for safe HTML output.
	 *
	 * @date	08/06/2020
	 * @since	5.9.0
	 *
	 * @param	string string The input string.
	 * @return	string
	 */
	acf.escHtml = function( string ){
		return ('' + string).replace(/<script|<\/script/g, function( html ) {
			return acf.strEscape( html );
		});
	};

	// Tests.
	//console.log( acf.escHtml('<script>js</script>') );
	//console.log( acf.escHtml( acf.strEscape('<script>js</script>') ) );
	//console.log( acf.escHtml( '<script>js1</script><script>js2</script>' ) );

	/**
	*  acf.decode
	*
	*  description
	*
	*  @date	13/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.decode = function( string ){
		return $('<textarea/>').html( string ).text();
	};

	

	/**
	*  parseArgs
	*
	*  Merges together defaults and args much like the WP wp_parse_args function
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	object args
	*  @param	object defaults
	*  @return	object
	*/
	
	acf.parseArgs = function( args, defaults ){
		if( typeof args !== 'object' ) args = {};
		if( typeof defaults !== 'object' ) defaults = {};
		return $.extend({}, defaults, args);
	}
	
	/**
	*  __
	*
	*  Retrieve the translation of $text.
	*
	*  @date	16/4/18
	*  @since	5.6.9
	*
	*  @param	string text Text to translate.
	*  @return	string Translated text.
	*/
	
	if( window.acfL10n == undefined ) {
		acfL10n = {};
	}
	
	acf.__ = function( text ){
		return acfL10n[ text ] || text;
	};
	
	/**
	*  _x
	*
	*  Retrieve translated string with gettext context.
	*
	*  @date	16/4/18
	*  @since	5.6.9
	*
	*  @param	string text Text to translate.
	*  @param	string context Context information for the translators.
	*  @return	string Translated text.
	*/
	
	acf._x = function( text, context ){
		return acfL10n[ text + '.' + context ] || acfL10n[ text ] || text;
	};
	
	/**
	*  _n
	*
	*  Retrieve the plural or single form based on the amount. 
	*
	*  @date	16/4/18
	*  @since	5.6.9
	*
	*  @param	string single Single text to translate.
	*  @param	string plural Plural text to translate.
	*  @param	int number The number to compare against.
	*  @return	string Translated text.
	*/
	
	acf._n = function( single, plural, number ){
		if( number == 1 ) {
			return acf.__(single);
		} else {
			return acf.__(plural);
		}
	};
	
	acf.isArray = function( a ){
		return Array.isArray(a);
	};
	
	acf.isObject = function( a ){
		return ( typeof a === 'object' );
	}
	
	/**
	*  serialize
	*
	*  description
	*
	*  @date	24/12/17
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	var buildObject = function( obj, name, value ){
		
		// replace [] with placeholder
		name = name.replace('[]', '[%%index%%]');
		
		// vars
		var keys = name.match(/([^\[\]])+/g);
		if( !keys ) return;
		var length = keys.length;
		var ref = obj;
		
		// loop
		for( var i = 0; i < length; i++ ) {
			
			// vars
			var key = String( keys[i] );
			
			// value
			if( i == length - 1 ) {
				
				// %%index%%
				if( key === '%%index%%' ) {
					ref.push( value );
				
				// default
				} else {
					ref[ key ] = value;
				}
				
			// path
			} else {
				
				// array
				if( keys[i+1] === '%%index%%' ) {
					if( !acf.isArray(ref[ key ]) ) {
						ref[ key ] = [];
					}
				
				// object	
				} else {
					if( !acf.isObject(ref[ key ]) ) {
						ref[ key ] = {};
					}
				}
				
				// crawl
				ref = ref[ key ];
			}
		}
	};
	
	acf.serialize = function( $el, prefix ){
			
		// vars
		var obj = {};
		var inputs = acf.serializeArray( $el );
		
		// prefix
		if( prefix !== undefined ) {
			
			// filter and modify
			inputs = inputs.filter(function( item ){
				return item.name.indexOf(prefix) === 0;
			}).map(function( item ){
				item.name = item.name.slice(prefix.length);
				return item;
			});
		}
		
		// loop
		for( var i = 0; i < inputs.length; i++ ) {
			buildObject( obj, inputs[i].name, inputs[i].value );
		}
		
		// return
		return obj;
	};
	
	/**
	*  acf.serializeArray
	*
	*  Similar to $.serializeArray() but works with a parent wrapping element.
	*
	*  @date	19/8/18
	*  @since	5.7.3
	*
	*  @param	jQuery $el The element or form to serialize.
	*  @return	array
	*/
	
	acf.serializeArray = function( $el ){
		return $el.find('select, textarea, input').serializeArray();
	}
	
	/**
	*  acf.serializeForAjax
	*
	*  Returns an object containing name => value data ready to be encoded for Ajax.
	*
	*  @date	17/12/18
	*  @since	5.8.0
	*
	*  @param	jQUery $el The element or form to serialize.
	*  @return	object
	*/
	acf.serializeForAjax = function( $el ){
			
		// vars
		var data = {};
		var index = {};
		
		// Serialize inputs.
		var inputs = acf.serializeArray( $el );
		
		// Loop over inputs and build data.
		inputs.map(function( item ){
			
			// Append to array.
			if( item.name.slice(-2) === '[]' ) {
				data[ item.name ] = data[ item.name ] || [];
				data[ item.name ].push( item.value );
			// Append	
			} else {
				data[ item.name ] = item.value;
			}
		});
		
		// return
		return data;
	};
	
	/**
	*  addAction
	*
	*  Wrapper for acf.hooks.addAction
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	this
	*/
	
/*
	var prefixAction = function( action ){
		return 'acf_' + action;
	}
*/
	
	acf.addAction = function( action, callback, priority, context ){
		//action = prefixAction(action);
		acf.hooks.addAction.apply(this, arguments);
		return this;
	};
	
	
	/**
	*  removeAction
	*
	*  Wrapper for acf.hooks.removeAction
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	this
	*/
	
	acf.removeAction = function( action, callback ){
		//action = prefixAction(action);
		acf.hooks.removeAction.apply(this, arguments);
		return this;
	};
	
	
	/**
	*  doAction
	*
	*  Wrapper for acf.hooks.doAction
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	this
	*/
	
	var actionHistory = {};
	//var currentAction = false;
	acf.doAction = function( action ){
		//action = prefixAction(action);
		//currentAction = action;
		actionHistory[ action ] = 1;
		acf.hooks.doAction.apply(this, arguments);
		actionHistory[ action ] = 0;
		return this;
	};
	
	
	/**
	*  doingAction
	*
	*  Return true if doing action
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	this
	*/
	
	acf.doingAction = function( action ){
		//action = prefixAction(action);
		return (actionHistory[ action ] === 1);
	};
	
	
	/**
	*  didAction
	*
	*  Wrapper for acf.hooks.doAction
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	this
	*/
	
	acf.didAction = function( action ){
		//action = prefixAction(action);
		return (actionHistory[ action ] !== undefined);
	};
	
	/**
	*  currentAction
	*
	*  Wrapper for acf.hooks.doAction
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	this
	*/
	
	acf.currentAction = function(){
		for( var k in actionHistory ) {
			if( actionHistory[k] ) {
				return k;
			}
		}
		return false;
	};
	
	/**
	*  addFilter
	*
	*  Wrapper for acf.hooks.addFilter
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	this
	*/
	
	acf.addFilter = function( action ){
		//action = prefixAction(action);
		acf.hooks.addFilter.apply(this, arguments);
		return this;
	};
	
	
	/**
	*  removeFilter
	*
	*  Wrapper for acf.hooks.removeFilter
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	this
	*/
	
	acf.removeFilter = function( action ){
		//action = prefixAction(action);
		acf.hooks.removeFilter.apply(this, arguments);
		return this;
	};
	
	
	/**
	*  applyFilters
	*
	*  Wrapper for acf.hooks.applyFilters
	*
	*  @date	14/12/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	this
	*/
	
	acf.applyFilters = function( action ){
		//action = prefixAction(action);
		return acf.hooks.applyFilters.apply(this, arguments);
	};
	
	
	/**
	*  getArgs
	*
	*  description
	*
	*  @date	15/12/17
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.arrayArgs = function( args ){
		return Array.prototype.slice.call( args );
	};
	
	
	/**
	*  extendArgs
	*
	*  description
	*
	*  @date	15/12/17
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
/*
	acf.extendArgs = function( ){
		var args = Array.prototype.slice.call( arguments );
		var realArgs = args.shift();
			
		Array.prototype.push.call(arguments, 'bar')
		return Array.prototype.push.apply( args, arguments );
	};
*/
	
	// Preferences
	// - use try/catch to avoid JS error if cookies are disabled on front-end form
	try {
		var preferences = JSON.parse(localStorage.getItem('acf')) || {};
	} catch(e) {
		var preferences = {};
	}
	
	
	/**
	*  getPreferenceName
	*
	*  Gets the true preference name. 
	*  Converts "this.thing" to "thing-123" if editing post 123.
	*
	*  @date	11/11/17
	*  @since	5.6.5
	*
	*  @param	string name
	*  @return	string
	*/
	
	var getPreferenceName = function( name ){
		if( name.substr(0, 5) === 'this.' ) {
			name = name.substr(5) + '-' + acf.get('post_id');
		}
		return name;
	};
	
	
	/**
	*  acf.getPreference
	*
	*  Gets a preference setting or null if not set.
	*
	*  @date	11/11/17
	*  @since	5.6.5
	*
	*  @param	string name
	*  @return	mixed
	*/
	
	acf.getPreference = function( name ){
		name = getPreferenceName( name );
		return preferences[ name ] || null;
	}
	
	
	/**
	*  acf.setPreference
	*
	*  Sets a preference setting.
	*
	*  @date	11/11/17
	*  @since	5.6.5
	*
	*  @param	string name
	*  @param	mixed value
	*  @return	n/a
	*/
	
	acf.setPreference = function( name, value ){
		name = getPreferenceName( name );
		if( value === null ) {
			delete preferences[ name ];
		} else {
			preferences[ name ] = value;
		}
		localStorage.setItem('acf', JSON.stringify(preferences));
	}
	
	
	/**
	*  acf.removePreference
	*
	*  Removes a preference setting.
	*
	*  @date	11/11/17
	*  @since	5.6.5
	*
	*  @param	string name
	*  @return	n/a
	*/
	
	acf.removePreference = function( name ){ 
		acf.setPreference(name, null);
	};
	
	
	/**
	*  remove
	*
	*  Removes an element with fade effect
	*
	*  @date	1/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.remove = function( props ){
		
		// allow jQuery
		if( props instanceof jQuery ) {
			props = {
				target: props
			};
		}
		
		// defaults
		props = acf.parseArgs(props, {
			target: false,
			endHeight: 0,
			complete: function(){}
		});
		
		// action
		acf.doAction('remove', props.target);
		
		// tr
		if( props.target.is('tr') ) {
			removeTr( props );
		
		// div
		} else {
			removeDiv( props );
		}
		
	};
	
	/**
	*  removeDiv
	*
	*  description
	*
	*  @date	16/2/18
	*  @since	5.6.9
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	var removeDiv = function( props ){
		
		// vars
		var $el = props.target;
		var height = $el.height();
		var width = $el.width();
		var margin = $el.css('margin');
		var outerHeight = $el.outerHeight(true);
		var style = $el.attr('style') + ''; // needed to copy
		
		// wrap
		$el.wrap('<div class="acf-temp-remove" style="height:' + outerHeight + 'px"></div>');
		var $wrap = $el.parent();
		
		// set pos
		$el.css({
			height:		height,
			width:		width,
			margin:		margin,
			position:	'absolute'
		});
		
		// fade wrap
		setTimeout(function(){
			
			$wrap.css({
				opacity:	0,
				height:		props.endHeight
			});
			
		}, 50);
		
		// remove
		setTimeout(function(){
			
			$el.attr('style', style);
			$wrap.remove();
			props.complete();
		
		}, 301);
	};
	
	/**
	*  removeTr
	*
	*  description
	*
	*  @date	16/2/18
	*  @since	5.6.9
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	var removeTr = function( props ){
		
		// vars
		var $tr = props.target;
		var height = $tr.height();
		var children = $tr.children().length;
		
		// create dummy td
		var $td = $('<td class="acf-temp-remove" style="padding:0; height:' + height + 'px" colspan="' + children + '"></td>');
		
		// fade away tr
		$tr.addClass('acf-remove-element');
		
		// update HTML after fade animation
		setTimeout(function(){
			$tr.html( $td );
		}, 251);
		
		// allow .acf-temp-remove to exist before changing CSS
		setTimeout(function(){
			
			// remove class
			$tr.removeClass('acf-remove-element');
			
			// collapse
			$td.css({
				height: props.endHeight
			});			
				
		}, 300);
		
		// remove
		setTimeout(function(){
			
			$tr.remove();
			props.complete();
		
		}, 451);
	};
	
	/**
	*  duplicate
	*
	*  description
	*
	*  @date	3/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.duplicate = function( args ){
		
		// allow jQuery
		if( args instanceof jQuery ) {
			args = {
				target: args
			};
		}
				
		// defaults
		args = acf.parseArgs(args, {
			target: false,
			search: '',
			replace: '',
			rename: true,
			before: function( $el ){},
			after: function( $el, $el2 ){},
			append: function( $el, $el2 ){ 
				$el.after( $el2 );
			}
		});
		
		// compatibility
		args.target = args.target || args.$el;
				
		// vars
		var $el = args.target;
		
		// search
		args.search = args.search || $el.attr('data-id');
		args.replace = args.replace || acf.uniqid();
		
		// before
		// - allow acf to modify DOM
		// - fixes bug where select field option is not selected
		args.before( $el );
		acf.doAction('before_duplicate', $el);
		
		// clone
		var $el2 = $el.clone();
		
		// rename
		if( args.rename ) {
			acf.rename({
				target:		$el2,
				search:		args.search,
				replace:	args.replace,
				replacer:	( typeof args.rename === 'function' ? args.rename : null )
			});
		}
		
		// remove classes
		$el2.removeClass('acf-clone');
		$el2.find('.ui-sortable').removeClass('ui-sortable');
		
		// after
		// - allow acf to modify DOM
		args.after( $el, $el2 );
		acf.doAction('after_duplicate', $el, $el2 );
		
		// append
		args.append( $el, $el2 );
		
		/**
		 * Fires after an element has been duplicated and appended to the DOM.
		 *
		 * @date	30/10/19
		 * @since	5.8.7
		 *
		 * @param	jQuery $el The original element.
		 * @param	jQuery $el2 The duplicated element.
		 */
		acf.doAction('duplicate', $el, $el2 );
		
		// append
		acf.doAction('append', $el2);
		
		// return
		return $el2;
	};
	
	/**
	*  rename
	*
	*  description
	*
	*  @date	7/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.rename = function( args ){
		
		// Allow jQuery param.
		if( args instanceof jQuery ) {
			args = {
				target: args
			};
		}
		
		// Apply default args.
		args = acf.parseArgs(args, {
			target: false,
			destructive: false,
			search: '',
			replace: '',
			replacer: null
		});
		
		// Extract args.
		var $el = args.target;
		
		// Provide backup for empty args.
		if( !args.search ) {
			args.search = $el.attr('data-id');
		}
		if( !args.replace ) {
			args.replace = acf.uniqid('acf');
		}
		if( !args.replacer ) {
			args.replacer = function( name, value, search, replace ){
				return value.replace( search, replace );
			};
		}
		
		// Callback function for jQuery replacing.
		var withReplacer = function( name ){
			return function( i, value ){
				return args.replacer( name, value, args.search, args.replace );
			}	
		};
		
		// Destructive Replace.
		if( args.destructive ) {
			var html = acf.strReplace( args.search, args.replace, $el.outerHTML() );
			$el.replaceWith( html );
			
		// Standard Replace.
		} else {
			$el.attr('data-id', args.replace);
			$el.find('[id*="' + args.search + '"]').attr('id', withReplacer('id'));
			$el.find('[for*="' + args.search + '"]').attr('for', withReplacer('for'));
			$el.find('[name*="' + args.search + '"]').attr('name', withReplacer('name'));
		}
		
		// return
		return $el;
	};
	
	
	/**
	*  acf.prepareForAjax
	*
	*  description
	*
	*  @date	4/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.prepareForAjax = function( data ){
		
		// required
		data.nonce = acf.get('nonce');
		data.post_id = acf.get('post_id');
		
		// language
		if( acf.has('language') ) {
			data.lang = acf.get('language');
		}
		
		// filter for 3rd party customization
		data = acf.applyFilters('prepare_for_ajax', data);	
		
		// return
		return data;
	};
	
	
	/**
	*  acf.startButtonLoading
	*
	*  description
	*
	*  @date	5/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.startButtonLoading = function( $el ){
		$el.prop('disabled', true);
		$el.after(' <i class="acf-loading"></i>');
	}
	
	acf.stopButtonLoading = function( $el ){
		$el.prop('disabled', false);
		$el.next('.acf-loading').remove();
	}
	
	
	/**
	*  acf.showLoading
	*
	*  description
	*
	*  @date	12/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.showLoading = function( $el ){
		$el.append('<div class="acf-loading-overlay"><i class="acf-loading"></i></div>');
	};
	
	acf.hideLoading = function( $el ){
		$el.children('.acf-loading-overlay').remove();
	};
	
	
	/**
	*  acf.updateUserSetting
	*
	*  description
	*
	*  @date	5/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.updateUserSetting = function( name, value ){
		
		var ajaxData = {
			action: 'acf/ajax/user_setting',
			name: name,
			value: value
		};
		
		$.ajax({
	    	url: acf.get('ajaxurl'),
	    	data: acf.prepareForAjax(ajaxData),
			type: 'post',
			dataType: 'html'
		});
		
	};
	
	
	/**
	*  acf.val
	*
	*  description
	*
	*  @date	8/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.val = function( $input, value, silent ){
		
		// vars
		var prevValue = $input.val();
		
		// bail if no change
		if( value === prevValue ) {
			return false
		}
		
		// update value
		$input.val( value );
		
		// prevent select elements displaying blank value if option doesn't exist
		if( $input.is('select') && $input.val() === null ) {
			$input.val( prevValue );
			return false;
		}
		
		// update with trigger
		if( silent !== true ) {
			$input.trigger('change');
		}
		
		// return
		return true;	
	};
	
	/**
	*  acf.show
	*
	*  description
	*
	*  @date	9/2/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.show = function( $el, lockKey ){
		
		// unlock
		if( lockKey ) {
			acf.unlock($el, 'hidden', lockKey);
		}
		
		// bail early if $el is still locked
		if( acf.isLocked($el, 'hidden') ) {
			//console.log( 'still locked', getLocks( $el, 'hidden' ));
			return false;
		}
		
		// $el is hidden, remove class and return true due to change in visibility
		if( $el.hasClass('acf-hidden') ) {
			$el.removeClass('acf-hidden');
			return true;
		
		// $el is visible, return false due to no change in visibility
		} else {
			return false;
		}
	};
	
	
	/**
	*  acf.hide
	*
	*  description
	*
	*  @date	9/2/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.hide = function( $el, lockKey ){
		
		// lock
		if( lockKey ) {
			acf.lock($el, 'hidden', lockKey);
		}
		
		// $el is hidden, return false due to no change in visibility
		if( $el.hasClass('acf-hidden') ) {
			return false;
		
		// $el is visible, add class and return true due to change in visibility
		} else {
			$el.addClass('acf-hidden');
			return true;
		}
	};
	
	
	/**
	*  acf.isHidden
	*
	*  description
	*
	*  @date	9/2/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.isHidden = function( $el ){
		return $el.hasClass('acf-hidden');
	};
	
	
	/**
	*  acf.isVisible
	*
	*  description
	*
	*  @date	9/2/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.isVisible = function( $el ){
		return !acf.isHidden( $el );
	};
	
	
	/**
	*  enable
	*
	*  description
	*
	*  @date	12/3/18
	*  @since	5.6.9
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	var enable = function( $el, lockKey ){
		
		// check class. Allow .acf-disabled to overrule all JS
		if( $el.hasClass('acf-disabled') ) {
			return false;
		}
		
		// unlock
		if( lockKey ) {
			acf.unlock($el, 'disabled', lockKey);
		}
		
		// bail early if $el is still locked
		if( acf.isLocked($el, 'disabled') ) {
			return false;
		}
		
		// $el is disabled, remove prop and return true due to change
		if( $el.prop('disabled') ) {
			$el.prop('disabled', false);
			return true;
		
		// $el is enabled, return false due to no change
		} else {
			return false;
		}
	};
	
	/**
	*  acf.enable
	*
	*  description
	*
	*  @date	9/2/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.enable = function( $el, lockKey ){
		
		// enable single input
		if( $el.attr('name') ) {
			return enable( $el, lockKey );
		}
		
		// find and enable child inputs
		// return true if any inputs have changed
		var results = false;
		$el.find('[name]').each(function(){
			var result = enable( $(this), lockKey );
			if( result ) {
				results = true;
			}
		});
		return results;
	};
	
	
	/**
	*  disable
	*
	*  description
	*
	*  @date	12/3/18
	*  @since	5.6.9
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	var disable = function( $el, lockKey ){
		
		// lock
		if( lockKey ) {
			acf.lock($el, 'disabled', lockKey);
		}
		
		// $el is disabled, return false due to no change
		if( $el.prop('disabled') ) {
			return false;
		
		// $el is enabled, add prop and return true due to change
		} else {
			$el.prop('disabled', true);
			return true;
		}
	};
	
	
	/**
	*  acf.disable
	*
	*  description
	*
	*  @date	9/2/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.disable = function( $el, lockKey ){
		
		// disable single input
		if( $el.attr('name') ) {
			return disable( $el, lockKey );
		}
		
		// find and enable child inputs
		// return true if any inputs have changed
		var results = false;
		$el.find('[name]').each(function(){
			var result = disable( $(this), lockKey );
			if( result ) {
				results = true;
			}
		});
		return results;
	};
	
	
	/**
	*  acf.isset
	*
	*  description
	*
	*  @date	10/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.isset = function( obj /*, level1, level2, ... */ ) {
		for( var i = 1; i < arguments.length; i++ ) {
			if( !obj || !obj.hasOwnProperty(arguments[i]) ) {
				return false;
			}
			obj = obj[ arguments[i] ];
		}
		return true;
	};
	
	/**
	*  acf.isget
	*
	*  description
	*
	*  @date	10/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.isget = function( obj /*, level1, level2, ... */ ) {
		for( var i = 1; i < arguments.length; i++ ) {
			if( !obj || !obj.hasOwnProperty(arguments[i]) ) {
				return null;
			}
			obj = obj[ arguments[i] ];
		}
		return obj;
	};
	
	/**
	*  acf.getFileInputData
	*
	*  description
	*
	*  @date	10/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.getFileInputData = function( $input, callback ){
		
		// vars
		var value = $input.val();
		
		// bail early if no value
		if( !value ) {
			return false;
		}
		
		// data
		var data = {
			url: value
		};
		
		// modern browsers
		var file = acf.isget( $input[0], 'files', 0);
		if( file ){
			
			// update data
			data.size = file.size;
			data.type = file.type;
			
			// image
			if( file.type.indexOf('image') > -1 ) {
				
				// vars
				var windowURL = window.URL || window.webkitURL;
				var img = new Image();
				
				img.onload = function() {
					
					// update
					data.width = this.width;
					data.height = this.height;
					
					callback( data );
				};
				img.src = windowURL.createObjectURL( file );
			} else {
				callback( data );
			}
		} else {
			callback( data );
		}		
	};
	
	/**
	*  acf.isAjaxSuccess
	*
	*  description
	*
	*  @date	18/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.isAjaxSuccess = function( json ){
		return ( json && json.success );
	};
	
	/**
	*  acf.getAjaxMessage
	*
	*  description
	*
	*  @date	18/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.getAjaxMessage = function( json ){
		return acf.isget( json, 'data', 'message' );
	};
	
	/**
	*  acf.getAjaxError
	*
	*  description
	*
	*  @date	18/1/18
	*  @since	5.6.5
	*
	*  @param	type $var Description. Default.
	*  @return	type Description.
	*/
	
	acf.getAjaxError = function( json ){
		return acf.isget( json, 'data', 'error' );
	};
	
	/**
	 * Returns the error message from an XHR object.
	 *
	 * @date	17/3/20
	 * @since	5.8.9
	 *
	 * @param	object xhr The XHR object.
	 * @return	(string)
	 */
	acf.getXhrError = function( xhr ){
		if( xhr.responseJSON && xhr.responseJSON.message ) {
			return xhr.responseJSON.message;
		} else if( xhr.statusText ) {
			return xhr.statusText;
		}
		return "";
	};
	
	/**
	*  acf.renderSelect
	*
	*  Renders the innter html for a select field.
	*
	*  @date	19/2/18
	*  @since	5.6.9
	*
	*  @param	jQuery $select The select element.
	*  @param	array choices An array of choices.
	*  @return	void
	*/
	
	acf.renderSelect = function( $select, choices ){
		
		// vars
		var value = $select.val();
		var values = [];
		
		// callback
		var crawl = function( items ){
			
			// vars
			var itemsHtml = '';
			
			// loop
			items.map(function( item ){
				
				// vars
				var text = item.text || item.label || '';
				var id = item.id || item.value || '';
				
				// append
				values.push(id);
				
				//  optgroup
				if( item.children ) {
					itemsHtml += '<optgroup label="' + acf.escAttr(text) + '">' + crawl( item.children ) + '</optgroup>';
				
				// option
				} else {
					itemsHtml += '<option value="' + acf.escAttr(id) + '"' + (item.disabled ? ' disabled="disabled"' : '') + '>' + acf.strEscape(text) + '</option>';
				}
			});
			
			// return
			return itemsHtml;
		};
		
		// update HTML
		$select.html( crawl(choices) );
		
		// update value
		if( values.indexOf(value) > -1 ){
			$select.val( value );
		}
		
		// return selected value
		return $select.val();
	};
	
	/**
	*  acf.lock
	*
	*  Creates a "lock" on an element for a given type and key
	*
	*  @date	22/2/18
	*  @since	5.6.9
	*
	*  @param	jQuery $el The element to lock.
	*  @param	string type The type of lock such as "condition" or "visibility".
	*  @param	string key The key that will be used to unlock.
	*  @return	void
	*/
	
	var getLocks = function( $el, type ){
		return $el.data('acf-lock-'+type) || [];
	};
	
	var setLocks = function( $el, type, locks ){
		$el.data('acf-lock-'+type, locks);
	}
	
	acf.lock = function( $el, type, key ){
		var locks = getLocks( $el, type );
		var i = locks.indexOf(key);
		if( i < 0 ) {
			locks.push( key );
			setLocks( $el, type, locks );
		}
	};
	
	/**
	*  acf.unlock
	*
	*  Unlocks a "lock" on an element for a given type and key
	*
	*  @date	22/2/18
	*  @since	5.6.9
	*
	*  @param	jQuery $el The element to lock.
	*  @param	string type The type of lock such as "condition" or "visibility".
	*  @param	string key The key that will be used to unlock.
	*  @return	void
	*/
	
	acf.unlock = function( $el, type, key ){
		var locks = getLocks( $el, type );
		var i = locks.indexOf(key);
		if( i > -1 ) {
			locks.splice(i, 1);
			setLocks( $el, type, locks );
		}
		
		// return true if is unlocked (no locks)
		return (locks.length === 0);
	};
	
	/**
	*  acf.isLocked
	*
	*  Returns true if a lock exists for a given type
	*
	*  @date	22/2/18
	*  @since	5.6.9
	*
	*  @param	jQuery $el The element to lock.
	*  @param	string type The type of lock such as "condition" or "visibility".
	*  @return	void
	*/
	
	acf.isLocked = function( $el, type ){
		return ( getLocks( $el, type ).length > 0 );
	};
	
	/**
	*  acf.isGutenberg
	*
	*  Returns true if the Gutenberg editor is being used.
	*
	*  @date	14/11/18
	*  @since	5.8.0
	*
	*  @param	vois
	*  @return	bool
	*/
	acf.isGutenberg = function(){
		return !!( window.wp && wp.data && wp.data.select && wp.data.select( 'core/editor' ) );
	};
	
	/**
	*  acf.objectToArray
	*
	*  Returns an array of items from the given object.
	*
	*  @date	20/11/18
	*  @since	5.8.0
	*
	*  @param	object obj The object of items.
	*  @return	array
	*/
	acf.objectToArray = function( obj ){
		return Object.keys( obj ).map(function( key ){
			return obj[key];
		});
	};
	
	/**
	 * acf.debounce
	 *
	 * Returns a debounced version of the passed function which will postpone its execution until after `wait` milliseconds have elapsed since the last time it was invoked.
	 *
	 * @date	28/8/19
	 * @since	5.8.1
	 *
	 * @param	function callback The callback function.
	 * @return	int wait The number of milliseconds to wait.
	 */
	acf.debounce = function( callback, wait ){
		var timeout;
		return function(){
			var context = this;
			var args = arguments;
			var later = function(){
				callback.apply( context, args );
			};
			clearTimeout( timeout );
			timeout = setTimeout( later, wait );
		};
	};
	
	/**
	 * acf.throttle
	 *
	 * Returns a throttled version of the passed function which will allow only one execution per `limit` time period.
	 *
	 * @date	28/8/19
	 * @since	5.8.1
	 *
	 * @param	function callback The callback function.
	 * @return	int wait The number of milliseconds to wait.
	 */
	acf.throttle = function( callback, limit ){
		var busy = false;
		return function(){
			if( busy ) return;
			busy = true;
			setTimeout(function(){
				busy = false;
			}, limit);
			callback.apply( this, arguments );
		};
	};
	
	/**
	 * acf.isInView
	 *
	 * Returns true if the given element is in view.
	 *
	 * @date	29/8/19
	 * @since	5.8.1
	 *
	 * @param	elem el The dom element to inspect.
	 * @return	bool
	 */
	acf.isInView = function( el ){
		if( el instanceof jQuery ) {
			el = el[0];
		}
		var rect = el.getBoundingClientRect();
		return (
			rect.top !== rect.bottom &&
			rect.top >= 0 &&
			rect.left >= 0 &&
			rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
			rect.right <= (window.innerWidth || document.documentElement.clientWidth)
		);
	};
	
	/**
	 * acf.onceInView
	 *
	 * Watches for a dom element to become visible in the browser and then excecutes the passed callback.
	 *
	 * @date	28/8/19
	 * @since	5.8.1
	 *
	 * @param	dom el The dom element to inspect.
	 * @param	function callback The callback function.
	 */
	acf.onceInView = (function() {
		
		// Define list.
		var items = [];
		var id = 0;
		
		// Define check function.
		var check = function() {
			items.forEach(function( item ){
				if( acf.isInView(item.el) ) {
					item.callback.apply( this );
					pop( item.id );
				}
			});
		};
		
		// And create a debounced version.
		var debounced = acf.debounce( check, 300 );
		
		// Define add function.
		var push = function( el, callback ) {
			
			// Add event listener.
			if( !items.length ) {
				$(window).on( 'scroll resize', debounced ).on( 'acfrefresh orientationchange', check );
			}
			
			// Append to list.
			items.push({ id: id++, el: el, callback: callback });
		}
		
		// Define remove function.
		var pop = function( id ) {
			
			// Remove from list.
			items = items.filter(function(item) {
				return (item.id !== id);
			});
			
			// Clean up listener.
			if( !items.length ) {
				$(window).off( 'scroll resize', debounced ).off( 'acfrefresh orientationchange', check );
			}
		}
		
		// Define returned function.
		return function( el, callback ){
			
			// Allow jQuery object.
			if( el instanceof jQuery )
				el = el[0];
			
			// Execute callback if already in view or add to watch list.
			if( acf.isInView(el) ) {
				callback.apply( this );
			} else {
				push( el, callback );
			}
		}
	})();
	
	/**
	 * acf.once
	 *
	 * Creates a function that is restricted to invoking `func` once.
	 *
	 * @date	2/9/19
	 * @since	5.8.1
	 *
	 * @param	function func The function to restrict.
	 * @return	function
	 */
	acf.once = function( func ){
		var i = 0;
		return function(){
			if( i++ > 0 ) {
				return (func = undefined);
			}
			return func.apply(this, arguments);
		}
	}

	 /**
     * Focuses attention to a specific element.
     *
     * @date	05/05/2020
     * @since	5.9.0
     *
     * @param	jQuery $el The jQuery element to focus.
     * @return	void
     */
    acf.focusAttention = function( $el ){
		var wait = 1000;

        // Apply class to focus attention.
		$el.addClass( 'acf-attention -focused' );
		
		// Scroll to element if needed.
		var scrollTime = 500;
		if( !acf.isInView( $el ) ) {
			$( 'body, html' ).animate({
				scrollTop: $el.offset().top - ( $(window).height() / 2 )
			}, scrollTime);
			wait += scrollTime;
		}

		// Remove class after $wait amount of time.
		var fadeTime = 250;
        setTimeout(function(){
            $el.removeClass( '-focused' );
            setTimeout(function(){
                $el.removeClass( 'acf-attention' );
            }, fadeTime);
        }, wait);
	};
	
	/**
     * Description
     *
     * @date	05/05/2020
     * @since	5.9.0
     *
     * @param	type Var Description.
     * @return	type Description.
     */
    acf.onFocus = function( $el, callback ){

		// Only run once per element.
		// if( $el.data('acf.onFocus') ) {
		// 	return false;
		// }

		// Vars.
        var ignoreBlur = false;
		var focus = false;
		
		// Functions.
        var onFocus = function(){
            ignoreBlur = true;
            setTimeout(function(){
                ignoreBlur = false;
            }, 1);
            setFocus( true );
        };
        var onBlur = function(){
            if( !ignoreBlur ) {
                setFocus( false );
            }
        };
        var addEvents = function(){
			$(document).on('click', onBlur);
			//$el.on('acfBlur', onBlur);
            $el.on('blur', 'input, select, textarea', onBlur);
        };
        var removeEvents = function(){
			$(document).off('click', onBlur);
			//$el.off('acfBlur', onBlur);
            $el.off('blur', 'input, select, textarea', onBlur);
        };
        var setFocus = function( value ){
            if( focus === value ) {
                return;
            }
            if( value ) {
                addEvents();
            } else {
                removeEvents();
            }
            focus = value;
            callback( value );
		};
		
		// Add events and set data.
		$el.on('click', onFocus);
		//$el.on('acfFocus', onFocus);
		$el.on('focus', 'input, select, textarea', onFocus);
		//$el.data('acf.onFocus', true);
    };
	
	/*
	*  exists
	*
	*  This function will return true if a jQuery selection exists
	*
	*  @type	function
	*  @date	8/09/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	(boolean)
	*/
	
	$.fn.exists = function() {
		return $(this).length>0;
	};
	
	
	/*
	*  outerHTML
	*
	*  This function will return a string containing the HTML of the selected element
	*
	*  @type	function
	*  @date	19/11/2013
	*  @since	5.0.0
	*
	*  @param	$.fn
	*  @return	(string)
	*/
	
	$.fn.outerHTML = function() {
	    return $(this).get(0).outerHTML;
	};
	
	/*
	*  indexOf
	*
	*  This function will provide compatibility for ie8
	*
	*  @type	function
	*  @date	5/3/17
	*  @since	5.5.10
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	if( !Array.prototype.indexOf ) {
		
	    Array.prototype.indexOf = function(val) {
	        return $.inArray(val, this);
	    };
	    
	}
	
	/**
	 * Returns true if value is a number or a numeric string. 
	 *
	 * @date	30/11/20
	 * @since	5.9.4
	 * @link	https://stackoverflow.com/questions/9716468/pure-javascript-a-function-like-jquerys-isnumeric/9716488#9716488
	 *
	 * @param	mixed n The variable being evaluated.
	 * @return	bool.
	 */
	acf.isNumeric = function( n ){
		return !isNaN(parseFloat(n)) && isFinite(n);
	}
	
	/**
	 * Triggers a "refresh" action used by various Components to redraw the DOM.
	 *
	 * @date	26/05/2020
	 * @since	5.9.0
	 *
	 * @param	void
	 * @return	void
	 */
	acf.refresh = acf.debounce(function(){
		$( window ).trigger('acfrefresh');
		acf.doAction('refresh');
	}, 0);
	
	// Set up actions from events
	$(document).ready(function(){
		acf.doAction('ready');
	});
	
	$(window).on('load', function(){
		
		// Use timeout to ensure action runs after Gutenberg has modified DOM elements during "DOMContentLoaded".
		setTimeout(function(){
			acf.doAction('load');
		});
	});
	
	$(window).on('beforeunload', function(){
		acf.doAction('unload');
	});
	
	$(window).on('resize', function(){
		acf.doAction('resize');
	});
	
	$(document).on('sortstart', function( event, ui ) {
		acf.doAction('sortstart', ui.item, ui.placeholder);
	});
	
	$(document).on('sortstop', function( event, ui ) {
		acf.doAction('sortstop', ui.item, ui.placeholder);
	});
	
})(jQuery);