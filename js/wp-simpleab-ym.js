/* Yandex.Metrika 64950046 simpleab start */
document.addEventListener('yacounter64950046inited', function () {
    console.log('simpleab 2 the yaCounter64950046 counter can be used');
});
jQuery(document).on('yacounter64950046inited', function () {
	console.log('simpleab 3 counter yaCounter64950046 is ready to use');
});
//jQuery(document).on('yacounter64950046inited', function () {
	//console.log('simpleab 1 counter yaCounter64950046 is ready to use');
//});
//}).ready(function($) {
//jQuery(document).ready(function($) {
jQuery(function($) {
	console.log('simpleab start');
	window.yaParams = {};
	if ($('body').hasClass('wz-simpleab')) {
		let simpleab_label_a = 'default-a';
		let simpleab_label_b = 'default-b';
		$('.elementor-section[data-simpleab-label-a][data-simpleab-label-b]').each(function(){
			simpleab_label_a = $(this).data('simpleab-label-a');
			simpleab_label_b = $(this).data('simpleab-label-b');
		});
		console.log('simpleab data simpleab_label_a:' + simpleab_label_a);
		console.log('simpleab data simpleab_label_b:' + simpleab_label_b);
		let wz_sibpleab = $.simpleAB({
			classCount: 2,
			className: 'wz-simpleab',
			labels: {1:simpleab_label_a, 2:simpleab_label_b}
		});
		console.log('simpleab wz_sibpleab.className: ' + wz_sibpleab.className);
		console.log('simpleab wz_sibpleab.selectedClass: ' + wz_sibpleab.selectedClass);
		window.yaParams = {ab_test: wz_sibpleab.selectedClass};
		console.log('simpleab window.yaParams.ab_test: ' + window.yaParams.ab_test);
		$('body').addClass(wz_sibpleab.selectedClass);
		console.log('simpleab $(body).attr(class): ' + $('body').attr('class'));
	}
	console.log('simpleab end');
	console.log('simpleab Yandex.Metrika 64950046 start');
	//(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	//m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	//(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
	(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
	//console.log('simpleab Yandex.Metrika 64950046 window.yaParams.ab_test: ' + window.yaParams.ab_test);
	//console.log('simpleab Yandex.Metrika 64950046 window.yaParams.ab_test: ' + window.yaParams);
	console.log('simpleab Yandex.Metrika 64950046 window.yaParams: ' + JSON.stringify(window.yaParams, null, 2));
	//ym(64950046, "init", {triggerEvent: true});
	//console.log('simpleab Yandex.Metrika 64950046 triggerEvent');
	ym(64950046, "init", {
		accurateTrackBounce:true,
		clickmap:true,
		params:window.yaParams,
		trackLinks:true,
        webvisor:true,
		triggerEvent:true
	});
	console.log('simpleab Yandex.Metrika 64950046 end');
});
/* End Yandex.Metrika  64950046 simpleab end */