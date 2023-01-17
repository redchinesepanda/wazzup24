<?php

/*
 * Класс WZLcg для хранения аргументов шорткодов lcg, lcg-meta для передачи в шорткод elementor-template и приеме через lcg-param, lcg-param-currency
 * [lcg title1="Hello"][elementor-template id='614'][/lcg]
 * [lcg-param title1]
 * [lcg-param title1 rur]
 * [lcg-param-currency title1 rur]
 * [lcg-meta wz-section-integration-text='wz-section-integration-title'][elementor-template id="15862"][/lcg-meta]
 */
class WZLcg {
	public function __construct() {
		//if( current_user_can('administrator') ) {
		//	$this->setDebug(true);
		//}
		/*
		 * Шорткод lcg передача параметра
		 * [lcg title1="Hello"][elementor-template id='614'][/lcg]
		 */
		add_shortcode('lcg', array($this, 'lcgShortcodeHandler'));
		add_shortcode('lcg-meta', array($this, 'lcgMetaShortcodeHandler'));
		/*
		 * Шорткод lcg-param, lcg-param-currency прием параметра
		 * [lcg-param title1]
		 * [lcg-param title1 rur]
		 * [lcg-param-currency title1 rur]
		 */
		add_shortcode('lcg-param', array($this, 'lcgAttrShortcodeHandler'));
		/*
		 * Шорткод lcg передача в параметре названия мета поля, а значение мета-поля передается далее во вложенный шорткод
		 * [lcg-meta wz-section-integration-text='wz-section-integration-title'][elementor-template id="15862"][/lcg-meta]
		 */
		add_shortcode('lcg-param-currency', array($this, 'lcgAttrShortcodeHandler'));
	}
	private function lcgGetPostID():int {
		$message = array('<pre>');
		array_push($message, 'WZLcg::lcgGetPostID');
		$post_id = 0;
		if (array_key_exists('post_id', $_GET)) {
			array_push($message, '$_GET[post_id]: ' . $_GET['post_id']);
			$post_id = $_GET['post_id'];
		} else {
			$post = get_post();
			$post_id = $post->ID;
		}
		array_push($message, 'post_id: ' . $post_id);
		array_push($message, '</pre>');
		$this->lcgEcho($message);
		return $post_id;
	}
	private function lcgGetMeta(int $post_id, array $lcgMetaAttrs):array {
		$message = array('<pre>');
		array_push($message, 'WZLcg::lcgGetMeta');
		array_push($message, 'post_id: ' . $post_id);
		$metaAttrs = array();
		if ($post_id) {
			foreach ($lcgMetaAttrs as $lcgMetaAttrKey => $lcgMetaAttrValue) {
				array_push($message, 'lcgMetaAttrKey: ' . print_r($lcgMetaAttrKey, true));
				array_push($message, 'lcgMetaAttrValue: ' . print_r($lcgMetaAttrValue, true));
				$meta_value = get_post_meta($post_id, $lcgMetaAttrValue, true );
				array_push($message, 'meta_value: ' . print_r($meta_value, true));
				$metaAttrs[$lcgMetaAttrKey] = $meta_value;
			}
		}
		//$this->setAttrs($metaAttrs);
		array_push($message, 'metaAttrs: ' . print_r($metaAttrs, true));
		array_push($message, '</pre>');
		$this->lcgEcho($message);
		return $metaAttrs;
	}
	public function lcgMetaShortcodeHandler(array $lcgMetaAttrs, string $lcgMetaContent):string {
		$message = array('<pre>');
		array_push($message, 'WZLcg::lcgMetaShortcodeHandler');
		array_push($message, 'lcgMetaAttrs: ' . print_r($lcgMetaAttrs, true));
		$value = 'meta not set';
		$post_id = $this->lcgGetPostID();
		array_push($message, 'post_id: ' . print_r($post_id, true));
		if ($post_id) {
			$this->setAttrs($this->lcgGetMeta($post_id, $lcgMetaAttrs));
		}
		array_push($message, '$this->getAttrs(): ' . print_r($this->getAttrs(), true));
		$this->setContent($lcgMetaContent);
		array_push($message, '</pre>');
		$this->lcgEcho($message);
		return $this->getContent();
	}
	//public static function lcgShortcodeHandler($lcgAttrs, $lcgContent): string {
	public function lcgShortcodeHandler(array $lcgAttrs, string $lcgContent): string {
		$this->setAttrs($lcgAttrs);
		$this->setContent($lcgContent);
		return $this->getContent();
	}
	public function lcgAttrShortcodeHandler(array $shortcodeAttrs): string {
		$message = array('<pre>');
		array_push($message, 'WZLcg::lcgAttrShortcodeHandler');
		array_push($message, 'shortcodeAttrs: ' . print_r($shortcodeAttrs, true));
		$value = (string) 'attr not set';
		/* new */
		/*if (array_key_exists('attr', $shortcodeAttrs)) {
			array_push($message, '$this->getAttrs(): ' . print_r($this->getAttrs(), true));
			if (array_key_exists($shortcodeAttrs['attr'], $this->getAttrs())) {
				$value = $this->getAttrs()[$shortcodeAttrs['attr']];
			}
		}*/
		/* old */
		if (!empty($shortcodeAttrs) ) {
            array_push($message, '$shortcodeAttrs[0]: ' . print_r($shortcodeAttrs[0], true));
            array_push($message, '$this->getAttrs(): ' . print_r($this->getAttrs(), true));
			if (array_key_exists($shortcodeAttrs[0], $this->getAttrs())) {
				$value = __((string) $this->getAttrs()[$shortcodeAttrs[0]], 'astra');
                array_push($message, '$value: ' . print_r($value, true));
				if (!empty($shortcodeAttrs[1])) {
					if (in_array($shortcodeAttrs[1], array('rur', 'kzt'))) {
						$value = mb_substr($value, 0, -2) . '<span class="currency">' . mb_substr($value, -1) . '</span>';
					} else {
						$value = '<span class="currency">' . mb_substr($value, 0, 1) . '</span>' . mb_substr($value, 1);
					}
				}
			} else {
				$value = '(' . $shortcodeAttrs[0] . ')';
			}
		}
		array_push($message, '</pre>');
		$this->lcgEcho($message);
		return $value;
	}
	private function lcgEcho(array $message) {
		if($this->getDebug()){
			echo implode('<br />', $message);
		}
	}
	public $attrs = array();
	public function getAttrs(): array {
	    return $this->attrs;
	}
	public function setAttrs(array $attrs): void {
		$message = array('<pre>');
		array_push($message, 'WZLcg::setAttrs');
		array_push($message, 'attrs: ' . print_r($attrs, true));
		array_push($message, '</pre>');
		$this->lcgEcho($message);
	    $this->attrs = $attrs;
	}
	public $content = '';
	public function getContent(): string {
	    return $this->content;
	}
	public function setContent(string $content): void {
	    $this->content = do_shortcode($content, false);
	}
	public $debug = false;
	public function getDebug(): bool {
	    return $this->debug;
	}
	public function setDebug(bool $debug): void {
	    $this->debug = $debug;
	}
}

?>