<?php

namespace Codepoet\OpcacheProfilerBundle\DataCollector;

use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * OpcacheDataCollector
 *
 * @author Benjamin Bender <bb@codepoet.de>
 */
class OpcacheDataCollector extends DataCollector
{
    /**
     * @var array
     */
    protected $data;


    /**
     * {@inheritDoc}
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        // This is needed to support the PHP 5.5 opcache as well as the old ZendOptimizer+-extension.
        if (function_exists('opcache_get_status')) {
            $status  = opcache_get_status();
            $config  = opcache_get_configuration();
            $version = $config['version']['opcache_product_name'] . ' ' . $config['version']['version'];
            $stats   = $status['opcache_statistics'];
        } elseif (function_exists('accelerator_get_status')) {
            $status  = accelerator_get_status();
            $config  = accelerator_get_configuration();
            $version = $config['version']['accelerator_product_name'] . ' ' . $config['version']['version'];
            $stats   = $status['accelerator_statistics'];
        }

        $filelist = array();

        foreach ($status['scripts'] as $key => $data) {
            $filelist[$key] = $data;
            $filelist[$key]['name'] = basename($key);
        }

        $this->data = array(
            'version'   => $version,
            'ini'       => $config['directives'],
            'filelist'  => $filelist,
            'status'    => $status,
            'stats'     => $stats
        );
    }

    /**
     * @return array
     */
    public function getVersion()
    {
        return $this->data['version'];
    }

    /**
     * @return array
     */
    public function getIni()
    {
        return $this->data['ini'];
    }

    /**
     * @return array
     */
    public function getFileList()
    {
        return $this->data['filelist'];
    }

    /**
     * @return array
     */
    public function getStatus()
    {
        return $this->data['status'];
    }

    /**
     * @return array
     */
    public function getStats()
    {
        return $this->data['stats'];
    }


    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'opcache';
    }
}