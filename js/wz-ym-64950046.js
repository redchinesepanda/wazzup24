/* Yandex.Metrika 64950046 start */
console.log('Yandex.Metrika 64950046 start');
console.log('Yandex.Metrika 64950046 navigator.userAgent: ' + navigator.userAgent);
if (typeof navigator.userAgent !== "undefined") {
	if (navigator.userAgent.indexOf('Lighthouse') < 0) {
		getAnalytics();
	}
} else {
	getAnalytics();
}
function getAnalytics() {
	console.log('Yandex.Metrika 64950046 getAnalytics start');
	(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
	ym(64950046, "init", {
		clickmap:true,
		trackLinks:true,
		accurateTrackBounce:true,
        webvisor:true
		/*accurateTrackBounce:true,
		params:window.yaParams*/
	});
	console.log('Yandex.Metrika 64950046 getAnalytics end');
}
console.log('Yandex.Metrika 64950046 end0');
/* Yandex.Metrika 64950046 end */