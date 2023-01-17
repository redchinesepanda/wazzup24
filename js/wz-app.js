document.addEventListener('DOMContentLoaded', function() {
	function setCookie(name, value, options) {
		options = options || {};
		var expires = options.expires;
		if (typeof expires == "number" && expires) {
			var d = new Date();
			d.setTime(d.getTime() + expires * 1000);
			expires = options.expires = d;
		}
		if (expires && expires.toUTCString) {
			options.expires = expires.toUTCString();
		}
		value = encodeURIComponent(value);
		var updatedCookie = name + "=" + value;
		for (var propName in options) {
			updatedCookie += "; " + propName;
			var propValue = options[propName];
			if (propValue !== true) {
				updatedCookie += "=" + propValue;
			}
		}
		console.log('app.wazzup24.com setCookie updatedCookie: ' + updatedCookie);
		document.cookie = updatedCookie;
	}
	function getCookie(name) {
		let matches = document.cookie.match(new RegExp(
			"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		));
		return matches ? decodeURIComponent(matches[1]) : undefined;
	}
	let params = new URLSearchParams(document.location.search);
	console.log('wz-app params: ' + params);
	let __ref = params.get('__ref');
	console.log('wz-app __ref: ' + __ref);
	if (__ref !== null) {
		console.log('wz-app window.location.hostname: ' + window.location.hostname);
		setCookie('__ref2', __ref, {domain: '.' + window.location.hostname, path: '/', expires: 90*86400});
		console.log('wz-app getCookie(\'__ref\'): ' + getCookie('__ref'));
	}
});