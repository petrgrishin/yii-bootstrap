<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

namespace PetrGrishin\Asset\Bootstrap;


use Yii;
use CApplicationComponent;
use CClientScript;
use CAssetManager;

class BootstrapAsset extends CApplicationComponent {

    public function init() {
        parent::init();
        $assetPath = $this->getAssetManager()->publish('/vendor/twbs/bootstrap/dist/');
        $this->getClientScript()->registerCssFile($assetPath . 'css/bootstrap.min.css');
        $this->getClientScript()->registerCssFile($assetPath . 'css/bootstrap-theme.min.css');
        $this->getClientScript()->registerScriptFile($assetPath . 'js/bootstrap.min.js');
    }

    /**
     * @return CAssetManager
     */
    protected function getAssetManager() {
        return $this->getApp()->getComponent('assetManager');
    }

    /**
     * @return CClientScript
     */
    protected function getClientScript() {
        return $this->getApp()->getComponent('clientScript');
    }

    protected function getApp() {
        return Yii::app();
    }
}
 