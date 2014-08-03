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

    private $vendorPath;

    public function init() {
        parent::init();
        $vendorPath = $this->getVendorPath();
        $assetPath = $this->getAssetManager()->publish($vendorPath . '/twbs/bootstrap/dist/');
        $this->getClientScript()->registerCssFile($assetPath . '/css/bootstrap.min.css');
        $this->getClientScript()->registerCssFile($assetPath . '/css/bootstrap-theme.min.css');
        $this->getClientScript()->registerScriptFile($assetPath . '/js/bootstrap.min.js');
    }

    public function setVendorPath($vendorPath) {
        $this->vendorPath = $vendorPath;
        return $this;
    }

    protected function getVendorPath() {
        return $this->vendorPath ?: sprintf('%s/..', \Yii::getPathOfAlias('application'));
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
 