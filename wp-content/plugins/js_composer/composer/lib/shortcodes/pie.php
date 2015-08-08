<?php
class WPBakeryShortCode_Vc_Pie extends WPBakeryShortCode {
    public function __construct($settings) {
        parent::__construct($settings);
        $this->addAction('wp_enqueue_scripts', 'jsScripts');
    }

    public function jsScripts() {
        wp_register_script('progressCircle', $this->assetURL('lib/progress-circle/ProgressCircle.js'));
        wp_register_script('vc_pie', $this->assetURL('js/jquery.vc_chart.js'), array('jquery', 'waypoints', 'progressCircle'));
        //wp_enqueue_script('vc_pie');
    }

}