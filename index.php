<!doctype html>
<!-- =================================================================================================================== -->
<html lang="en">

<!-- =================================================================================================================== -->
<head>
	<meta charset="utf-8">

	<title>nestedSortable jQuery Plugin</title>
	<meta name="description" content="Demo page of the nestedSortable jQuery Plugin">
	<meta name="author" content="Manuele J Sarfatti">

	<script>

		(function(){
			if (!/*@cc_on!@*/0) return;
			var e = ("abbr article aside audio canvas command datalist details figure figcaption footer "+
				"header hgroup mark meter nav output progress section summary time video").split(' '),
			i=e.length;
			while (i--) {
			document.createElement(e[i])
			}
		})(document.documentElement,'className');

	</script>

	<style type="text/css">

		html {
			background-color: #eee;
		}

		body {
			-webkit-border-radius: 10px;
			   -moz-border-radius: 10px;
			        border-radius: 10px;
			color: #444;
			background-color: #fff;
			font-size: 13px;
			font-family: Freesans, sans-serif;
			padding: 2em 4em;
			width: 860px;
			margin: 15px auto;
			box-shadow:				1px 1px 8px #444;
			-mox-box-shadow:		1px 1px 8px #444;
			-webkit-box-shadow:		1px -1px 8px #444;
		}

		a, a:visited {
			color: #4183C4;
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
		}

		pre, code {
			font-size: 12px;
		}

		pre {
			width: 100%;
			overflow: auto;
		}

		small {
			font-size: 90%;
		}

		small code {
			font-size: 11px;
		}

		.placeholder {
			outline: 1px dashed #4183C4;
			/*-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			margin: -1px;*/
		}

		.mjs-nestedSortable-error {
			background: #fbe3e4;
			border-color: transparent;
		}

		ol {
			margin: 0;
			padding: 0;
			padding-left: 30px;
		}

		ol.sortable, ol.sortable ol {
			margin: 0 0 0 25px;
			padding: 0;
			list-style-type: none;
		}

		ol.sortable {
			margin: 4em 0;
		}

		.sortable li {
			margin: 5px 0 0 0;
			padding: 0;
		}

		.sortable li div  {
			border: 1px solid #d4d4d4;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			border-color: #D4D4D4 #D4D4D4 #BCBCBC;
			padding: 6px;
			margin: 0;
			cursor: move;
			background: #f6f6f6;
			background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #ededed 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f6f6f6), color-stop(100%,#ededed));
			background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
			background: -o-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
			background: -ms-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
			background: linear-gradient(to bottom,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
		}

		.sortable li.mjs-nestedSortable-branch div {
			background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #f0ece9 100%);
			background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#f0ece9 100%);

		}

		.sortable li.mjs-nestedSortable-leaf div {
			background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #bcccbc 100%);
			background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#bcccbc 100%);

		}

		li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
			border-color: #999;
			background: #fafafa;
		}

		.disclose {
			cursor: pointer;
			width: 10px;
			display: none;
		}

		.sortable li.mjs-nestedSortable-collapsed > ol {
			display: none;
		}

		.sortable li.mjs-nestedSortable-branch > div > .disclose {
			display: inline-block;
		}

		.sortable li.mjs-nestedSortable-collapsed > div > .disclose > span:before {
			content: '+ ';
		}

		.sortable li.mjs-nestedSortable-expanded > div > .disclose > span:before {
			content: '- ';
		}

		h1 {
			font-size: 2em;
			margin-bottom: 0;
		}

		h2 {
			font-size: 1.2em;
			font-weight: normal;
			font-style: italic;
			margin-top: .2em;
			margin-bottom: 1.5em;
		}

		h3 {
			font-size: 1em;
			margin: 1em 0 .3em;;
		}

		p, ol, ul, pre, form {
			margin-top: 0;
			margin-bottom: 1em;
		}

		dl {
			margin: 0;
		}

		dd {
			margin: 0;
			padding: 0 0 0 1.5em;
		}

		code {
			background: #e5e5e5;
		}

		input {
			vertical-align: text-bottom;
		}

		.notice {
			color: #c33;
		}

	</style>


<!-- =================================================================================================================== -->
<body>

<header>
	<h1>nestedSortable jQuery Plugin</h1>
	<h2>2.0</h2>
</header>

<section>
	<p>
		This is the demo page for the nestedSortable jQuery plugin.
	<p>
		<strong>Follow the development, read the docs and download the latest version directly from the 
		<a href="https://github.com/mjsarfatti/nestedSortable">GitHub page</a>.</strong>
	</p>
</section> <!-- END section -->

<section id="demo">
	<ol class="sortable">
		<li id="list_1"><div><span class="disclose"><span></span></span>Item 1</div>
			<ol>
				<li id="list_2"><div><span class="disclose"><span></span></span>Sub Item 1.1</div>
					<ol>
						<li id="list_3"><div><span class="disclose"><span></span></span>Sub Item 1.2</div>
					</ol>
			</ol>
		<li id="list_4"><div><span class="disclose"><span></span></span>Item 2</div>
		<li id="list_5"><div><span class="disclose"><span></span></span>Item 3</div>
			<ol>
				<li id="list_6" class="mjs-nestedSortable-no-nesting"><div><span class="disclose"><span></span></span>Sub Item 3.1 (no nesting)</div>
				<li id="list_7"><div><span class="disclose"><span></span></span>Sub Item 3.2</div>
					<ol>
						<li id="list_8"><div><span class="disclose"><span></span></span>Sub Item 3.2.1</div>
					</ol>
			</ol>
		<li id="list_9"><div><span class="disclose"><span></span></span>Item 4</div>
		<li id="list_10"><div><span class="disclose"><span></span></span>Item 5</div>
	</ol>

	<h3>Try the custom methods:</h3>

	<p><br />
		<input type="submit" name="serialize" id="serialize" value="Serialize" />
	<pre id="serializeOutput"></pre>

	<p>
		<input type="submit" name="toArray" id="toArray" value="To array" />
	<pre id="toArrayOutput"></pre>

	<p>
		<input type="submit" name="toHierarchy" id="toHierarchy" value="To hierarchy" />
	<pre id="toHierarchyOutput"></pre>
	<p>
		<em>Note: This demo has the <code>maxLevels</code> option set to '3'.</em>
	</p>
</section> <!-- END #demo -->


<section id="license">
	<h4>License</h4>
	<p>
		This work is licensed under the MIT License.<br>
		Which means you can do pretty much whatever you want with it.
	<p>
		Nonetheless if this plugin saved you money, saved you time or saved your life please take a moment to think about the work I've been doing for you and consider sharing a bit of your joy with me. Your donation, however small, will be greatly appreciated.<br>
		Thank you.
	</p>

	<!-- Paypal Donate Button -->
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_donations">
	<input type="hidden" name="business" value="RSJEW3N9PRMYY">
	<input type="hidden" name="lc" value="GB">
	<input type="hidden" name="item_name" value="nestedSortable">
	<input type="hidden" name="item_number" value="002">
	<input type="hidden" name="currency_code" value="EUR">
	<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHosted">
	<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_GB/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
	<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/it_IT/i/scr/pixel.gif" width="1" height="1">
	<!--<a href="/">contact me</a>-->
	</form>
	<!-- END Paypal Donate Button -->

	<p>
		© <?= 2010 == date('Y') ? date('Y') : '2010&ndash;'.date('Y'); ?> Manuele J Sarfatti
	</p>
</section> <!-- END #documentation -->

<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="jquery.ui.touch-punch.js"></script>
<script type="text/javascript" src="jquery.mjs.nestedSortable.js"></script>

<script>

	$(document).ready(function(){

		$('ol.sortable').nestedSortable({
			forcePlaceholderSize: true,
			handle: 'div',
			helper:	'clone',
			items: 'li',
			opacity: .6,
			placeholder: 'placeholder',
			revert: 250,
			tabSize: 25,
			tolerance: 'pointer',
			toleranceElement: '> div',
			maxLevels: 3,

			isTree: true,
			expandOnHover: 700,
			startCollapsed: true
		});

		$('.disclose').on('click', function() {
			$(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
		})

		$('#serialize').click(function(){
			serialized = $('ol.sortable').nestedSortable('serialize');
			$('#serializeOutput').text(serialized+'\n\n');
		})

		$('#toHierarchy').click(function(e){
			hiered = $('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
			hiered = dump(hiered);
			(typeof($('#toHierarchyOutput')[0].textContent) != 'undefined') ?
			$('#toHierarchyOutput')[0].textContent = hiered : $('#toHierarchyOutput')[0].innerText = hiered;
		})

		$('#toArray').click(function(e){
			arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
			arraied = dump(arraied);
			(typeof($('#toArrayOutput')[0].textContent) != 'undefined') ?
			$('#toArrayOutput')[0].textContent = arraied : $('#toArrayOutput')[0].innerText = arraied;
		})

	});

	function dump(arr,level) {
		var dumped_text = "";
		if(!level) level = 0;

		//The padding given at the beginning of the line.
		var level_padding = "";
		for(var j=0;j<level+1;j++) level_padding += "    ";

		if(typeof(arr) == 'object') { //Array/Hashes/Objects
			for(var item in arr) {
				var value = arr[item];

				if(typeof(value) == 'object') { //If it is an array,
					dumped_text += level_padding + "'" + item + "' ...\n";
					dumped_text += dump(value,level+1);
				} else {
					dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
				}
			}
		} else { //Strings/Chars/Numbers etc.
			dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
		}
		return dumped_text;
	}

</script>

<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://mjsarfatti.com/piwik/" : "http://mjsarfatti.com/piwik/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://mjsarfatti.com/piwik/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->