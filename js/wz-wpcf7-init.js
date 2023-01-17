/* wz-wpcf7-init start */
console.log('wz-wpcf7-init start');
//console.log('wz-wpcf7-init wpcf7: ' + wpcf7);
//console.log('wz-wpcf7-init wpcf7: ' + JSON.stringify(wpcf7, null, 2) );
//document.addEventListener( 'DOMContentLoaded', event => {
/*document.addEventListener( 'DOMContentLoaded', function(event) {
	console.log('wz-wpcf7-init DOMContentLoaded start');
	let forms = document.querySelectorAll( '.wpcf7 > form' );
	console.log('wz-wpcf7-init forms: ' + forms);
	console.log('wz-wpcf7-init forms: ' + JSON.stringify(forms, null, 2) );
	forms.forEach( form => wpcf7.init( form ) );
	console.log('wz-wpcf7-init DOMContentLoaded end');
});*/
/*document.addEventListener( 'DOMContentLoaded', () => { wz_wpcf7_init(); });
function wz_wpcf7_init() {
	console.log('wz-wpcf7-init DOMContentLoaded start');
	let forms = document.querySelectorAll( '.wpcf7 > form' );
	console.log('wz-wpcf7-init forms: ' + forms);
	console.log('wz-wpcf7-init forms: ' + JSON.stringify(forms, null, 2) );
	forms.forEach( form => wpcf7.init( form ) );
	console.log('wz-wpcf7-init DOMContentLoaded end');
}*/
window.document.dispatchEvent(new Event("DOMContentLoaded"));
console.log('wz-wpcf7-init end');
/* wz-wpcf7-init end */
