<!doctype html>
<html lang="en">
<html>
<head>
<title>WAFLASH</title>
<link rel="stylesheet" href="style.css">
<script>
		var gameConfig = {
			swfUrl: "https://www.gameslol.net/data/1285.swf"		
		}
</script>
</head>
<body>
<div id="waflashContainer">
<canvas class="waflashCanvas" id="canvas" tabindex="1"></canvas>
<div id="waflashStatus" style="display: none;">Playing...</div>
<script>
		var ua = navigator.userAgent.toLowerCase();
		if ( (navigator.appName == 'Netscape' && ua.indexOf('trident') != -1) || (ua.indexOf("msie") != -1)) {
    		var waf = document.getElementById('waflashStatus');
			waf.style.display = 'block';
			waf.innerText = '인터넷 익스플로어(IE) 에서는 게임이 실행되지 않습니다 !\n크롬, 엣지등의 다른 브라우저를 이용해주세요.';
			gtag('event', 'connect_from_ie', {'event_category': 'error', 'event_label': ua });
		}
	</script>
<script type="module" crossorigin="anonymous">
		let is_mobile = /Mobi/i.test(window.navigator.userAgent);
		if (is_mobile) {
			function scrollToSubject() {
				try {
					window.scrollTo({
						top: 100,
						left: 0,
						behavior: 'smooth'
					});
				} catch (e) {}
			}
			scrollToSubject();
			window.addEventListener("orientationchange", function() {
				setTimeout(scrollToSubject, 100);
			});
		} else {
			document.getElementById('canvas').focus();
		}
		document.getElementById('canvas').addEventListener("keydown", function(ev) {
			ev.preventDefault();
			ev.stopPropagation();
		});
		document.getElementById('canvas').addEventListener("click", function() {
			document.getElementById('canvas').focus();
		});
		document.addEventListener("mousedown", (function() {
			const canvasElement = document.getElementById('canvas');
			let focused = false;
			return function(ev) {
				if (ev.target == canvasElement) {
					if (!focused) {
						canvasElement.focus();
						focused = true;
					}
				} else {
					if (focused) {
						focused = false;
					}
				}
				return true;
			}
		})());
		
		var golddate=Date;
		Date.now=function(){
			var a=new golddate();
			a.setFullYear('2022'); a.setMonth('06'); a.setDate('01');
			return a.getTime();
		}
		
		import {
			createWaflash
		} from './js/waflash-player.min.js?15';
		createWaflash(gameConfig.swfUrl, window.wafOptions || {});
	</script>
</div>
</body>
</html>